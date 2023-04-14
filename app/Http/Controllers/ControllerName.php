<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ControllerName extends Controller
{
    public function index(){
        return view('component._hotels');
    }

    public function dashboard(){
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
