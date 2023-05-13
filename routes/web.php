<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerName;
use App\Http\Controllers\AuthController;

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

Route::get('/search-results', [ControllerName::class, 'search_results'])->name('search-results.search_results');

Route::get('/search-confirmation/{hotel_id}', [ControllerName::class, 'search_confirmation'])->name('search-confirmation.search_confirmation');

Route::get('/final-confirmation', [ControllerName::class, 'final_confirmation'])->name('final-confirmation.final_confirmation');

Route::get('/booking-success', [ControllerName::class, 'booking_success'])->name('booking-success.booking_success');

Route::get('/flights', [ControllerName::class, 'flights'])->name('flights.flights');

Route::get('/referral', [ControllerName::class, 'referral'])->name('referral.referral');

Route::get('/addReferral/{id}', [ControllerName::class, 'addReferral'])->name('referral.addReferral');

Route::get('/register', [ControllerName::class, 'register'])->name('register.register');

Route::get('/', function () {
    return view('login._login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.login');

Route::post('/login', [AuthController::class, 'login'])->name('login.loginUser');

Route::post('/membership', [AuthController::class, 'register'])->name('register.membership');
// Route::get('/login', function () {
//     return view('login._login');
// });
