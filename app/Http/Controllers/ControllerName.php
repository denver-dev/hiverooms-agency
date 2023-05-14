<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\Referral;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class ControllerName extends Controller
{
    public function index(Request $request){

        // Search hotel keyword
        $going_to = $request->input('going_to');
        $check_in = $request->input('check_in');
        $check_out = $request->input('check_out');
        $traveler = $request->input('traveler');

        $hotel_client = new Client();
        $hotel_response = $hotel_client->request('POST', 'https://api.worldota.net/api/b2b/v3/search/multicomplete/', [
            'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
            'json' => [
                "query" => "'.$going_to.'",
                "language" => "en",
            ],
            'debug' => null,
            'error' => null,
            'status' => "ok",
        ]);

        $hotel_response = $hotel_response->getBody();
        $hotel_data = json_decode($hotel_response, true);

        // Search hotels from keyword's region
        $region_ids = [];
        foreach($hotel_data['data']['regions'] as $hotel_datas){
            $region_id = $hotel_datas['id'];
            array_push($region_ids, $region_id);
        }

        $region_client = new Client();
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
                ],
                'debug' => null,
                'error' => null,
                'status' => "ok",
            ]);

            $region_response = $region_response->getBody();
            $region_data = json_decode($region_response, true);
        }

        $ids = array_merge(
            array_column($hotel_data['data']['hotels'], 'id'),
            array_column($region_data['data']['hotels'], 'id')
        );

        $client = new Client();

        $results = [];
        foreach($ids as $id){
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
            $results[] = $data;
        }

        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('component._hotels', [
            'data' => $data,
            'hotels' => $results,
            'user' => $user,
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

    public function search_confirmation($hotel_id)
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
        return view('search-confirmation._search_confirmation', [
            'hotels' => $data,
            'user' => $user
        ]);
    }

    public function final_confirmation()
    {
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('final-confirmation._final_confirmation')->with('user', $user);
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
        $refers = DB::table('userS')
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
