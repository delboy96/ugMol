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

Route::get('/index', 'FrontEndController@index')->name('index');
Route::get('/contact', 'FrontEndController@contactForm')->name('contact');
Route::get('/about','FrontEndController@about')->name('about');
Route::get("/login", "FrontEndController@loginForm")->name('login');
Route::get("/register", "FrontEndController@registerForm")->name('register');

//Rute za log, reg i logout

Route::post("/login", "AuthController@login")->name('login');
Route::post("/register", "AuthController@register")->name('register');
Route::get("/logout", "AuthController@logout")->name('logout');

//Post rute

//na indexu gore treba latest() sa 3 poslednja posta
//i svi postovi u sredini all()s
Route::get('/posts/{id}', 'PostsController@show');

//Članci
Route::get('/clanak/{id}', 'ArticlesController@showArticle');

//Vesti (LATEST)
Route::get('/vest/{id}', 'ArticlesController@showNews');

