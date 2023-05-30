<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use Omnipay\Omnipay;
use GuzzleHttp\Client;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Payment;
use App\Models\Referral;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request as Psr7Request;

class ControllerName extends Controller
{
    private $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(config('paypal.client_id'));
        $this->gateway->setSecret(config('paypal.client_secret'));
        $this->gateway->setTestMode(true);
    }

    public function index(Request $request)
    {
        // Search hotel keyword
        $going_to = $request->input('going_to');
        $check_in = $request->input('check_in');
        $check_out = $request->input('check_out');
        setcookie('check_in', $check_in, time() + 86400, '/');
        setcookie('check_out', $check_out, time() + 86400, '/');
        $traveler = $request->input('traveler');

        $hotel_client = new Client();
        $hotel_response = $hotel_client->request('POST', 'https://api.worldota.net/api/b2b/v3/search/multicomplete/', [
            'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
            'json' => [
                "query" => "'.$going_to.'",
                "language" => "en",
            ]
        ]);

        $hotel_data = json_decode($hotel_response->getBody(), true);

        // Search hotels from keyword's region
        $region_ids = array_column($hotel_data['data']['regions'], 'id');

        $region_client = new Client();
        $results = [];
        $priceRes = [];

        foreach ($region_ids as $region_id) {
            $region_response = $region_client->request('POST', 'https://api.worldota.net/api/b2b/v3/search/serp/region/', [
                'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
                'json' => [
                    "checkin" => $check_in,
                    "checkout" => $check_out,
                    "guests" => [
                        [
                            "adults" => 2,
                            "children" => [],
                        ]
                    ],
                    "region_id" => $region_id,
                    "hotels_limit" => 5,
                    "currency" => "PHP"
                ]
            ]);

            $region_data = json_decode($region_response->getBody(), true);
            $ids = array_column($region_data['data']['hotels'], 'id');

            $client = new Client();
            foreach ($ids as $id) {
                $retryCount = 0;
                $retryLimit = 3;
                $retryDelay = 1; // seconds

                while ($retryCount < $retryLimit) {
                    try {
                        $response = $client->request('POST', 'https://api.worldota.net/api/b2b/v3/hotel/info/', [
                            'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
                            'headers' => [
                                'Content-Type' => 'application/json',
                            ],
                            'json' => [
                                'id' => $id,
                                'language' => 'en',
                            ]
                        ]);

                        $data = json_decode($response->getBody(), true);

                        foreach ($region_data['data']['hotels'] as $region_hotel) {
                            if ($region_hotel['id'] === $id) {
                                $rates = $region_hotel['rates'];
                                foreach ($rates as &$rate) {
                                    $rate['daily_prices'][0] += $rate['daily_prices'][0] * 0.075;
                                }

                                // Replace {size} with 1024x768 in the image URLs
                                $images = $data['data']['images'];
                                $sizePlaceholder = '{size}';
                                $replacement = '1024x768';

                                $processedImages = array_map(function ($image) use ($sizePlaceholder, $replacement) {
                                    return str_replace($sizePlaceholder, $replacement, $image);
                                }, $images);

                                $data['data']['images'] = $processedImages;

                                $data['data']['rates'] = $rates;
                                break;
                            }
                        }
                        $results[] = $data;

                        break;
                    } catch (ClientException $e) {
                        $statusCode = $e->getResponse()->getStatusCode();
                        if ($statusCode === 429) {
                            sleep($retryDelay);
                            $retryCount++;
                            continue;
                        } else {
                            // Handle other exceptions or errors
                            // ...
                        }
                    } catch (Exception $e) {
                        // Handle other exceptions or errors
                        // ...
                    }
                }
            }
        }

        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('component._hotels', [
            'data' => $data,
            'hotels' => $results,
            'user' => $user,
            'going_to' => $going_to,
            'check_in' => $check_in,
            'check_out' => $check_out,
        ]);
    }


    public function dashboard()
    {

        $client = new Client();

        $testResponse = $client->request('POST', 'https://api.worldota.net/api/b2b/v3/hotel/info/dump/', [
            'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
            'headers' => [
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'inventory' => 'all',
                'language' => 'en',
            ]
        ]);

        // echo $testResponse->getBody()->getContents();

        $ids = [
            'access_international_hotel_annex',
            'crowne_plaza_berlin_city_centre',
            'city_hotel_berlin_east',
        ];
        $results = [];

        foreach ($ids as $id) {
            $response = $client->request('GET', 'https://api.worldota.net/api/b2b/v3/hotel/info/', [
                'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
                'query' => [
                    'data' => '{
                        "id": "' . $id . '",
                        "language": "en"
                    }',
                ],
                'debug' => null,
                'error' => null,
                'status' => "ok",
            ]);

            $response = $response->getBody();
            $data = json_decode($response, true);
            // dd($data);
            $results[] = $data;
        }

        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('dashboard._dashboard')->with('user', $user);
    }

    public function profile()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('profile._profile')->with('user', $user);
    }

    public function transactions()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('transactions._transactions')->with('user', $user);
    }

    public function booking()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('booking-history._booking')->with('user', $user);
    }

    public function commission()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('commission._commission')->with('user', $user);
    }

    public function points()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('points._points')->with('user', $user);
    }

    public function create_booking()
    {
        $today = Carbon::now()->format('Y-m-d');
        $nextDay = Carbon::now()->addDay()->format('Y-m-d');
        $userId = Auth::user();
        $user = User::find($userId->id);
        // dd($today);
        return view('create-booking._create_booking', [
            'today' => $today,
            'nextDay' => $nextDay,
            'user' => $user,
        ]);
    }

    public function search_results()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('search-results._search_results')->with('user', $user);
    }

    public function search_confirmation($hotel_id, $check_in, $check_out)
    {
        $userId = Auth::user();
        $user = User::find($userId->id);

        $client = new Client();
        $response = $client->request('GET', 'https://api.worldota.net/api/b2b/v3/hotel/info/', [
            'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
            'query' => [
                'data' => '{
                        "id": "' . $hotel_id . '",
                        "language": "en"
                    }',
            ],
            'debug' => null,
            'error' => null,
            'status' => "ok",
        ]);

        $response = $response->getBody();
        $data = json_decode($response, true);

        $hotel_client = new Client();
        $hotel_response = $hotel_client->request('POST', 'https://api.worldota.net/api/b2b/v3/search/hp/', [
            'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
            'json' => [
                "checkin" => $check_in,
                "checkout" => $check_out,
                "language" => "en",
                "guests" => [
                    [
                        "adults" => 2,
                        "children" => [],
                    ]
                ],
                "id" => $hotel_id,
                "currency" => "PHP"
            ],
            'debug' => null,
            'error' => null,
            'status' => "ok",
        ]);

        $hotel_response = $hotel_response->getBody();
        $hotel_data = json_decode($hotel_response, true);

        $sizePlaceholder = '{size}';
        $replacement = '1024x768';
        $data['data']['images'] = array_map(function ($image) use ($sizePlaceholder, $replacement) {
            return str_replace($sizePlaceholder, $replacement, $image);
        }, $data['data']['images']);

        foreach ($data['data']['room_groups'] as &$roomGroup) {
            $roomGroup['images'] = array_map(function ($image) use ($sizePlaceholder, $replacement) {
                return str_replace($sizePlaceholder, $replacement, $image);
            }, $roomGroup['images']);
        }

        return view('search-confirmation._search_confirmation', [
            'hotels' => $data,
            'user' => $user,
            'hotel_data' => $hotel_data,
            'hotel_id' => $hotel_id,
            'check_in' => $check_in,
            'check_out' => $check_out,
        ]);
    }

    public function final_confirmation($hotel_id, $book_hash, $check_in, $check_out, $total_amount)
    {
        $userId = Auth::user();
        $user = User::find($userId->id);

        $check_in_date = Carbon::createFromDate($check_in);
        $check_out_date = Carbon::createFromDate($check_out);

        $check_in_format = $check_in_date->format('F d, Y');
        $check_out_format = $check_out_date->format('F d, Y');
        $nights = $check_in_date->diffInDays($check_out_date);

        $client = new Client();
        $response = $client->request('GET', 'https://api.worldota.net/api/b2b/v3/hotel/info/', [
            'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
            'query' => [
                'data' => '{
                        "id": "' . $hotel_id . '",
                        "language": "en"
                    }',
            ],
            'debug' => null,
            'error' => null,
            'status' => "ok",
        ]);

        $response = $response->getBody();
        $data = json_decode($response, true);

        return view('final-confirmation._final_confirmation', [
            'hotels' => $data,
            'user' => $user,
            'hotel_id' => $hotel_id,
            'book_hash' => $book_hash,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'check_in_format' => $check_in_format,
            'check_out_format' => $check_out_format,
            'nights' => $nights,
            'total_amount' => $total_amount,
        ]);
    }

    public function booking_store(Request $request)
    {
        // dd('hello');
        // $userId = Auth::user();
        // $user = User::find($userId->id);
        // $partner_order_id = 'hive' . $user->id . Str::random(12);
        // Highly recommended UUID
        // $partner_order_id = Str::uuid()->toString();

        // $booking = Booking::create([
        //     'user' => $user->id,
        //     'check_in' => $request->check_in,
        //     'check_out' => $request->check_out,
        //     'hotel_id' => $request->hotel_id,
        //     'guest_adult' => 2,
        //     'guest_children' => 0,
        //     'currency' => null,
        //     'residency' => null,
        //     'book_hash' => $request->book_hash,
        //     'partner_order_id' => $partner_order_id,
        // ]);

        // $client = new \GuzzleHttp\Client();

        // // For Paymaya Payment
        // $response = $client->request('POST', 'https://pg-sandbox.paymaya.com/payby/v2/paymaya/payments', [
        //     'headers' => [
        //         'accept' => 'application/json',
        //         'authorization' => 'Basic cGstcnB3YjVZUjZFZm5LaU1zbGRacVk0aGdwdkpqdXk4aGh4VzJiVkFBaXoyTjo=',
        //         'content-type' => 'application/json'
        //     ],
        //     'json' => [
        //         'totalAmount' => [
        //             'value' => 100,
        //             'currency' => 'PHP'
        //         ],
        //         'redirectUrl' => [
        //             'success' => 'https://www.merchantsite.com/success?id=567834590',
        //             'failure' => 'https://www.merchantsite.com/failure?id=567834590',
        //             'cancel' => 'https://www.merchantsite.com/cancel?id=567834590'
        //         ],
        //         'requestReferenceNumber' => '5b4a6d60-2165-4bc1-bb0e-e610d1a3f82d'
        //         ],
        // ]);

        // //For Gcash Payment
        // // Set your X-API-KEY with the API key from the Customer Area.
        // $client = new \Adyen\Client();
        // $client->setXApiKey("YOUR_X-API-KEY");
        // $service = new \Adyen\Service\Checkout($client);

        // $params = array(
        //     "amount" => array(
        //         "currency" => "PHP",
        //         "value" => 1000
        //     ),
        //     "reference" => "YOUR_ORDER_NUMBER",
        //     "paymentMethod" => array(
        //         "type" => "gcash"
        //     ),
        //     "returnUrl" => "https://your-company.com/checkout?shopperOrder=12xy..",
        //     "merchantAccount" => "YOUR_MERCHANT_ACCOUNT"
        // );
        // $result = $service->payments($params);
        $amount = preg_replace('/[^0-9.]/', '', $request->amount);
        // dd($request->amount);
        //For Paypal Payment
        try {
            $response = $this->gateway->purchase(
                array(
                    'amount' => $amount,
                    'currency' => config('paypal.currency'),
                    'returnUrl' => url('booking-success'),
                    'cancelUrl' => url('error')
                )
            )->send();

            if ($response->isRedirect()) {
                $response->redirect();
            } else {
                return $response->getMessage();
            }
        } catch (\Throwable $th) {
            return $th->getMessage();
        }

        // return view('booking-success._booking_success', [
        //     'user' => $user,
        // ]);
    }

    public function flights()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('flights._flights')->with('user', $user);
    }

    public function booking_success(Request $request)
    {
        $userId = Auth::user();
        $user = User::find($userId->id);

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(
                array(
                    'payer_id' => $request->input('PayerID'),
                    'transactionReference' => $request->input('paymentId')
                )
            );

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                Payment::create([
                    'payment_id' => $arr['id'],
                    'payer_id' => $arr['payer']['payer_info']['payer_id'],
                    'payer_email' => $arr['payer']['payer_info']['email'],
                    'amount' => $arr['transactions'][0]['amount']['total'],
                    'currency' => config('paypal.currency'),
                    'payment_status' => $arr['state'],
                ]);

                return view('booking-success._booking_success', [
                    'user' => $user,
                    'payment_id' => $arr['id'],
                ]);

            } else {
                return $response->getMessage();
            }
        } else {
            return 'Payment declined!!';
        }
    }

    public function referral()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        $refers = DB::table('users')
            ->join('packages', 'users.package_id', '=', 'packages.ID')
            ->select('users.*', 'packages.*', 'users.id as userId')
            ->where('users.id', '<>', $userId->id)
            ->get();
        $referred = DB::table('referrals')
            ->join('users', 'users.id', '=', 'referrals.referral_id')
            ->select('users.*', 'users.id as userId')
            ->where('referrals.user_id', '=', $userId->id)
            ->get();

        return view('referral._referral', [
            'user' => $user,
            'refers' => $refers,
            'referred' => $referred
        ]);
    }

    public function addingReferral(Request $request)
    {
        $referralCode = $request->input('referralCode');

        // Get the currently logged-in user
        $currentUser = Auth::user();

        // Find the user with the given referral code
        $user = User::find($referralCode);

        if ($user) {
            // Check if the referral code belongs to the current user
            if ($user->id === $currentUser->id) {
                $errorMessage = 'You cannot use your own referral code';
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }

            $checkReferralList = DB::table('referrals')
                ->where('user_id', $user->id)
                ->get();
            if ($checkReferralList->count() > 20) {
                $errorMessage = 'You have reached the maximum number of referrals';
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }

            $package = Package::find($user->package_id);

            if (!$package) {
                $errorMessage = 'Invalid package';
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }

            // Determine the commission and points based on the current user's level
            $userLevel = $currentUser->level;
            $commission = 0;
            $points = 0;
            $price = 0;

            switch ($userLevel) {
                case 0:
                    $commission = $package->package_price * 0.20;
                    break;
                case 1:
                    $commission = $package->package_price * 0.05;
                    break;
                case 2:
                    $commission = $package->package_price * 0.03;
                    break;
                case 3:
                    $commission = $package->package_price * 0.02;
                    break;
                case 4:
                    $commission = $package->package_price * 0.01;
                    break;
                case 5:
                    $commission = $package->package_price * 0.01;
                    break;
                case 6:
                    $commission = $package->package_price * 0.01;
                    break;
            }

            $points = $commission / 100;
            $price = $commission;

            // Update the current user's commission, points, and level
            $currentUser->commission = $commission;
            $currentUser->points = $points;
            $currentUser->price = $price;
            $currentUser->level = $userLevel + 1;

            $currentUser->save();

            // Check the referred user's level
            $referredUser = User::find($referralCode);

            if (!$referredUser || $referredUser->level !== 0) {
                $errorMessage = 'Invalid referred user';
                return redirect()->back()->withErrors($errorMessage)->withInput();
            }
            $referredPackage = Package::find($referredUser->package_id);
            // Determine the commission and points based on the referred user's level
            $referredLevel = $userLevel + 1;

            $referredComm = 0;
            $referredPoints = 0;
            $referredPrice = 0;

            switch ($referredLevel) {
                case 1:
                    $referredComm = $referredPackage->package_price * 0.5;
                    break;
                case 2:
                    $referredComm = $referredPackage->package_price * 0.03;
                    break;
                case 3:
                    $referredComm = $referredPackage->package_price * 0.02;
                    break;
                case 4:
                    $referredComm = $referredPackage->package_price * 0.01;
                    break;
                case 5:
                    $referredComm = $referredPackage->package_price * 0.01;
                    break;
                case 6:
                    $referredComm = $referredPackage->package_price * 0.01;
                    break;
            }

            $referredPoints = $referredComm / 100;
            $referredPrice = $referredComm;
            // Update the referred user's commission, points, and level
            $referredUser->commission = $referredComm;
            $referredUser->points = $referredPoints;
            $referredUser->price = $referredPrice;
            $referredUser->level = $referredLevel;
            $referredUser->save();

            Referral::create([
                'user_id' => $currentUser->id,
                'referral_id' => $referralCode
            ]);

            $successMessage = 'Referral added successfully';
            return redirect()->back()->with('success', $successMessage);
        } else {
            $errorMessage = 'Referral code not found';
            return redirect()->back()->withErrors($errorMessage)->withInput();
        }
    }

    public function addReferral(Request $request, $id)
    {


        $userId = Auth::user();
        $user = User::find($userId->id);
        //Check the referral List if the referred User already exists
        $checkReferralList = DB::table('referrals')
            ->where('user_id', '=', $userId->id)
            ->get();

        if ($checkReferralList->count() > 20) {
            return redirect()->back();
        }

        $package = Package::find($user->package_id);

        //check Current User Level
        $userLevel = $user->level;
        $level = $userLevel === 0 ? 1 : $userLevel;
        $commission = 0;
        switch ($level) {
            case 1:
                $commission = $package->package_price * 0.20;
                $points = $commission / 100;
                $price = $commission;
                break;
            case 2:
                $commission = $package->package_price * 0.05;
                $points = $commission / 100;
                $price = $commission;
                break;
            case 3:
                $commission = $package->package_price * 0.03;
                $points = $commission / 100;
                $price = $commission;
                break;
            case 4:
                $commission = $package->package_price * 0.02;
                $points = $commission / 100;
                $price = $commission;
                break;
            case 5:
                $commission = $package->package_price * 0.01;
                $points = $commission / 100;
                $price = $commission;
                break;
            case 6:
                $commission = $package->package_price * 0.01;
                $points = $commission / 100;
                $price = $commission;
                break;
            case 7:
                $commission = $package->package_price * 0.01;
                $points = $commission / 100;
                $price = $commission;
                break;
        }

        //Update Current User's Commission, Points, and level
        $user->commission = $commission;
        $user->points = $points;
        $user->price = $price;
        $user->level = $level;

        $user->save();


        //Check Referred User Level
        $referredUser = User::find($id);
        $referredUserLevel = $referredUser->level;
        $referredUserPackage = Package::find($referredUser->package_id);
        if ($referredUserLevel !== 0) {
            return redirect()->back();
        }

        $referredUserLevel = $level + 1;

        switch ($referredUserLevel) {
            case 1:
                $referredComm = $referredUserPackage->package_price * 0.20;
                $referredPoints = $referredComm / 100;
                $referredPrice = $referredComm;
                break;
            case 2:
                $referredComm = $referredUserPackage->package_price * 0.05;
                $referredPoints = $referredComm / 100;
                $referredPrice = $referredComm;
                break;
            case 3:
                $referredComm = $referredUserPackage->package_price * 0.03;
                $referredPoints = $referredComm / 100;
                $referredPrice = $referredComm;
                break;
            case 4:
                $referredComm = $referredUserPackage->package_price * 0.02;
                $referredPoints = $referredComm / 100;
                $referredPrice = $referredComm;
                break;
            case 5:
                $referredComm = $referredUserPackage->package_price * 0.01;
                $referredPoints = $referredComm / 100;
                $referredPrice = $referredComm;
                break;
            case 6:
                $referredComm = $referredUserPackage->package_price * 0.01;
                $referredPoints = $referredComm / 100;
                $referredPrice = $referredComm;
                break;
            case 7:
                $referredComm = $referredUserPackage->package_price * 0.01;
                $referredPoints = $referredComm / 100;
                $referredPrice = $referredComm;
                break;
        }

        $referredUser->commission = $referredComm;
        $referredUser->points = $referredPoints;
        $referredUser->price = $referredPrice;
        $referredUser->level = $referredUserLevel;

        $referredUser->save();

        Referral::create([
            'user_id' => $userId->id,
            'referral_id' => $id
        ]);

        return redirect()->back();
    }

    public function register()
    {
        $package = Package::all();
        return view('register._register')->with('packages', $package);
    }

}
