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

// Global for body class
View::composer('*', function ($view) {
    View::share('viewName', $view->getName());
});


Route::get('/hotels', function () { 
    return view('component._hotels'); 
});

Route::get('/component', function () { 
    return view('component._sidebar'); 
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
