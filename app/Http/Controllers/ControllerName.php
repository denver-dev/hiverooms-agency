<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Referral;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Psr7\Request as Psr7Request;

class ControllerName extends Controller
{
    public function index(Request $request){

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

        foreach($region_ids as $region_id){
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
                ]
            ]);

            $region_data = json_decode($region_response->getBody(), true);
            $ids = array_column($region_data['data']['hotels'], 'id');

            $client = new Client();
            foreach ($ids as $id) {
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
                        $data['data']['rates'] = $region_hotel['rates'];
                        break;
                    }
                }
                $results[] = $data;
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

    public function create_booking(){
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
        // dd($hotel_id);
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
        // dd($data);

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
            ],
            'debug' => null,
            'error' => null,
            'status' => "ok",
        ]);

        $hotel_response = $hotel_response->getBody();
        $hotel_data = json_decode($hotel_response, true);
        // dd($hotel_data);

        return view('search-confirmation._search_confirmation', [
            'hotels' => $data,
            'user' => $user,
            'hotel_data' => $hotel_data,
            'hotel_id' => $hotel_id,
            'check_in' => $check_in,
            'check_out' => $check_out,
        ]);
    }

    public function final_confirmation($hotel_id, $book_hash, $check_in, $check_out)
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
        ]);
    }

    public function booking_store(Request $request)
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        $partner_order_id = 'hive' . $user->id . Str::random(12);
        // Highly recommended UUID
        // $partner_order_id = Str::uuid()->toString();

        $booking = Booking::create([
            'user' => $user->id,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'hotel_id' => $request->hotel_id,
            'guest_adult' => 2,
            'guest_children' => 0,
            'currency' => null,
            'residency' => null,
            'book_hash' => $request->book_hash,
            'partner_order_id' => $partner_order_id,
        ]);

        $hotel_client = new Client();
        $hotel_response = $hotel_client->request('POST', 'https://api.worldota.net/api/b2b/v3/hotel/order/booking/finish/', [
            'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
            'json' => [
                "user" => [
                    "email" => $user->email,
                    "phone" => $user->phone
                ],
                "partner" => [
                    "partner_order_id" => $partner_order_id,
                ],
                "language" => "en",
                "rooms" => [
                    [
                        "guests" => [
                            [
                                "first_name" => $user->firstName,
                                "last_name" => $user->lastName,
                            ],
                        ]
                    ]
                ],
                "payment_type" => [
                    "type" => "now",
                    "amount" => "10",
                    "currency_code" => "USD"
                ]
            ],
        ]);

        $hotel_response = $hotel_response->getBody();
        $hotel_data = json_decode($hotel_response, true);

        return view('booking-success._booking_success', [
            'user' => $user,
        ]);
    }

    public function flights()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('flights._flights')->with('user', $user);
    }

    public function booking_success()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('booking-success._booking_success')->with('user', $user);
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
