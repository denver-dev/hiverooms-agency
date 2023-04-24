<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use GuzzleHttp\Client;

class ControllerName extends Controller
{
    public function index(){
        return view('component._hotels');
    }

    public function dashboard(){
        $client = new Client();

        $response = $client->request('GET', 'https://api.worldota.net/api/b2b/v3/hotel/info/', [
            'auth' => ['5164', '4f8b3f0f-7186-48a1-9d2b-76cebfa35884'],
            'query' => [
                'data' => '{
                    "id":"city_hotel_berlin_east",
                    "language":"en"
                }',
            ]
        ]);

        // dd($response);

        return view('dashboard._dashboard', [
            'response' => $response->getBody(),
        ]);
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

    public function search_confirmation(){
        return view('search-confirmation._search_confirmation');
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

}
