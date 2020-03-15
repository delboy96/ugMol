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

Route::get('/', function () {
    return view('welcome');
});

//Rute za inicijalno prikazivanje stranica.

Route::get('/index', 'FrontEndController@index');
Route::get('/contact', 'FrontEndController@contactForm');
Route::get('/about','FrontEndController@about');
Route::get("/login", "FrontEndController@loginForm");
Route::get("/register", "FrontEndController@registerForm");

//Rute za log, reg i logout

Route::post("/login", "AuthController@login");
Route::post("/register", "AuthController@register");
Route::get("/logout", "AuthController@logout");


