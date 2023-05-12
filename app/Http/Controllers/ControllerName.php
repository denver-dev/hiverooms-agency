<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use Illuminate\Http\Client\Response;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class ControllerName extends Controller
{
    public function index()
    {

        $client = new Client();

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
        return view('component._hotels', [
            'data' => $data,
            'hotels' => $results,
        ]);
    }

    public function dashboard()
    {

        // $body = '{
        //         "checkin": "2023-06-25",
        //         "checkout": "2023-06-26",
        //         "residency": "gb",
        //         "language": "en",
        //         "guests": [
        //             {
        //             "adults": 2,
        //             "children": []
        //             }
        //         ],
        //         "id": "access_international_hotel_annex",
        //         "currency": "EUR"
        //         "requests_number": 10,
        // }';

        // $psr7Request = new Psr7Request(
        //     'POST',
        //     'https://api.worldota.net/api/b2b/v3/search/hp/',
        //     [
        //         'Authorization' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
        //         'Content-Type' => 'application/json',
        //     ],
        //     json_encode($body)
        // );

        // // dd($psr7Request);

        // $client = new Client();
        // $response = $client->send($psr7Request);


        // $client = new Client();
        // $headers = [
        //     'Content-Type' => 'application/json',
        //     'Authorization' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
        // ];
        // $body = '{
        //     "checkin": "2020-04-25",
        //     "checkout": "2020-04-26",
        //     "residency": "gb",
        //     "language": "en",
        //     "guests": [
        //         {
        //         "adults": 2,
        //         "children": []
        //         }
        //     ],
        //     "id": "access_international_hotel_annex",
        //     "currency": "EUR"
        // }';
        // $response = $client->post('https://api.worldota.net/api/b2b/v3/search/hp/', [
        //     'headers' => $headers,
        //     'body' => $body
        // ]);
        // return $response->getBody();

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
        $userId = Auth::user();
        $user = User::find($userId->id);
        return view('create-booking._create_booking')->with('user', $user);
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
        // dd($data);
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
        return view('referral._referral')->with('user', $user);
    }

    public function register(){
        return view('register._register');
    }

}
