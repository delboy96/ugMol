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
Route::get('/about', 'FrontEndController@about')->name('about');
Route::get("/login", "FrontEndController@loginForm")->name('login');
Route::get("/register", "FrontEndController@registerForm")->name('register');

//Rute za log, reg i logout
Route::post("/login", "AuthController@login")->name('login');
Route::post("/register", "AuthController@register")->name('register');
Route::get("/logout", "AuthController@logout")->name('logout');

//Search ruta
Route::any('/search', 'FrontEndController@search')->name('search');
//Post single ruta
Route::get('/posts/{id}', 'PostsController@show')->name('post');
//Članak
Route::get('/articles/{id}', 'ArticlesController@showArticle')->name('clanak');
//Vesti(LATEST)
Route::get('/news/{id}', 'ArticlesController@showNews')->name('vest');
//Kontakt
Route::post('/contact', 'Api\ContactController@send')->name('contact-email');


//Admin rute
Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    // Korisnici
    Route::get("/users", "Admin\UsersController@index")->name("users.index");
    Route::get("/users/create", "Admin\UsersController@create")->name("users.create");
    Route::get("/users/{id}", "Admin\UsersController@show")->name("users.show");
    Route::get("/users/{id}/edit", "Admin\UsersController@edit")->name("users.edit");
    Route::get("/users/{id}/delete", "Admin\UsersController@delete")->name("users.del");
    Route::post("/users", "Admin\UsersController@store")->name("users.store");
    Route::put("/users/{id}", "Admin\UsersController@update")->name("users.update");
    Route::delete("/users/{id}", "Admin\UsersController@destroy")->name("users.delete");

    // Događaji
    Route::get("/posts", "Admin\PostsController@index")->name("posts.index");
    Route::get("/posts/create", "Admin\PostsController@create")->name("posts.create");
    Route::get("/posts/{id}", "Admin\PostsController@show")->name("posts.show");
    Route::get("/posts/{id}/edit", "Admin\PostsController@edit")->name("posts.edit");
    Route::get("/posts/{id}/delete", "Admin\PostsController@delete")->name("posts.del");
    Route::post("/posts", "Admin\PostsController@store")->name("posts.store");
    Route::put("/posts/{id}", "Admin\PostsController@update")->name("posts.update");
    Route::delete("/posts/{id}", "Admin\PostsController@destroy")->name("posts.delete");

    // Članci
    Route::get("/articles", "Admin\ArticlesController@indexArticle")->name("articles.index");
    Route::get("/articles/create", "Admin\ArticlesController@createArticle")->name("articles.create");
    Route::get('/articles/{id}', 'Admin\ArticlesController@showArticle')->name("articles.show");
    Route::get("/articles/{id}/edit", "Admin\ArticlesController@editArticle")->name("articles.edit");
    Route::get("/articles/{id}/delete", "Admin\ArticlesController@deleteArticle")->name("article.del");
    Route::post("/articles", "Admin\ArticlesController@storeArticle")->name("articles.store");
    Route::put("/articles/{id}", "Admin\ArticlesController@updateArticle")->name("articles.update");
    Route::delete("/articles/{id}", "Admin\ArticlesController@destroyArticle")->name("articles.delete");

    // Vesti
    Route::get("/news", "Admin\ArticlesController@indexNews")->name("news.index");
    Route::get("/news/create", "Admin\ArticlesController@createNews")->name("news.create");
    Route::get('/news/{id}', 'Admin\ArticlesController@showNews')->name("news.show");
    Route::get("/news/{id}/edit", "Admin\ArticlesController@editNews")->name("news.edit");
    Route::get("/news/{id}/delete", "Admin\ArticlesController@deleteNews")->name("news.del");
    Route::post("/news", "Admin\ArticlesController@storeNews")->name("news.store");
    Route::put("/news/{id}", "Admin\ArticlesController@updateNews")->name("news.update");
    Route::delete("/news/{id}", "Admin\ArticlesController@destroyNews")->name("news.delete");

    // Uloge
    Route::get("/roles", "Admin\RolesController@index")->name("roles.index");
    Route::get("/roles/create", "Admin\RolesController@create")->name("roles.create");
    Route::get("/roles/{id}", "Admin\RolesController@show")->name("roles.show");
    Route::get("/roles/{id}/edit", "Admin\RolesController@edit")->name("roles.edit");
    Route::get("/roles/{id}/delete", "Admin\RolesController@delete")->name("roles.del");
    Route::post("/roles", "Admin\RolesController@store")->name("roles.store");
    Route::put("/roles/{id}", "Admin\RolesController@update")->name("roles.update");
    Route::delete("/roles/{id}", "Admin\RolesController@destroy")->name("roles.delete");

    // Aktivnost
    Route::get("/activity", "AuthController@allActivity")->name("activity.index");
    Route::post("/activityFilter", "AuthController@filter")->name("activity.filter");
});

//    Route::resource('/Users', 'Admin\UsersController');
//
//    Route::apiResource('', '');
//
