<?php

use Illuminate\Support\Facades\Route;

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

View::composer('*', function ($view) {
    View::share('viewName', $view->getName());
});



Route::get('/', function () {
    return view('layouts.app');
});

Route::get('/login', function () {
    return view('login._login');
});

Route::get('/dashboard', function () {
    return view('dashboard._dashboard');
});

Route::get('/travel', function () {
    return view('travel._travel');
});

