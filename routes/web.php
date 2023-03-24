<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerName;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Global for body class
View::composer('*', function ($view) {
    View::share('viewName', $view->getName());
});

Route::get('/hotels', [ControllerName::class, 'index'])->name('hotels.hotels');

Route::get('/dashboard', [ControllerName::class, 'dashboard'])->name('dashboard.dashboard');

Route::get('/profile', [ControllerName::class, 'profile'])->name('profile.profile');

Route::get('/transactions', [ControllerName::class, 'transactions'])->name('transactions.transactions');

Route::get('/booking-history', [ControllerName::class, 'booking'])->name('booking-history.booking');

Route::get('/commission', [ControllerName::class, 'commission'])->name('commission.commission');

Route::get('/points', [ControllerName::class, 'points'])->name('points.points');

Route::get('/create-booking', [ControllerName::class, 'create_booking'])->name('create-booking.create_booking');

Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/login', function () {
    return view('login._login');
});
