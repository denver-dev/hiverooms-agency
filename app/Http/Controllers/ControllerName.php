<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;
use Illuminate\Http\Client\Response;
use GuzzleHttp\Psr7\Request as Psr7Request;

class ControllerName extends Controller
{
    public function index(){

        $client = new Client();

        $ids = [
            'access_international_hotel_annex',
            'crowne_plaza_berlin_city_centre',
            'city_hotel_berlin_east',
        ];
        $results = [];

        foreach($ids as $id){
            $response = $client->request('GET', 'https://api.worldota.net/api/b2b/v3/hotel/info/', [
                'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
                'query' => [
                    'data' => '{
                        "id": "'.$id.'",
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

    public function dashboard(){

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

        echo $testResponse->getBody()->getContents();

        $ids = [
            'access_international_hotel_annex',
            'crowne_plaza_berlin_city_centre',
            'city_hotel_berlin_east',
        ];
        $results = [];

        foreach($ids as $id){
            $response = $client->request('GET', 'https://api.worldota.net/api/b2b/v3/hotel/info/', [
                'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
                'query' => [
                    'data' => '{
                        "id": "'.$id.'",
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

        return view('dashboard._dashboard');
    }

    public function profile(){
        return view('profile._profile');
    }

    public function transactions(){
        return view('transactions._transactions');
    }

    public function booking(){
        return view('booking-history._booking');
    }

    public function commission(){
        return view('commission._commission');
    }

    public function points(){
        return view('points._points');
    }

    public function create_booking(){
        return view('create-booking._create_booking');
    }

    public function search_results(){
        return view('search-results._search_results');
    }

    public function search_confirmation($hotel_id){

        $client = new Client();

            $response = $client->request('GET', 'https://api.worldota.net/api/b2b/v3/hotel/info/', [
                'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
                'query' => [
                    'data' => '{
                        "id": "'.$hotel_id.'",
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
            'hotels' => $data
        ]);
    }

    public function final_confirmation(){
        return view('final-confirmation._final_confirmation');
    }

    public function flights(){
        return view('flights._flights');
    }

    public function booking_success(){
        return view('booking-success._booking_success');
    }

    public function referral(){
        return view('referral._referral');
    }

}
