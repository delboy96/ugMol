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
Route::any('/search', 'FrontEndController@search');
//Post single ruta
Route::get('/posts/{id}', 'PostsController@show')->name('post');
//Članak
Route::get('/articles/{id}', 'ArticlesController@showArticle')->name('clanak');
//Vesti(LATEST)
Route::get('/news/{id}', 'ArticlesController@showNews')->name('vest');
//Kontakt
Route::post('/contact', 'Api\ContactController@send')->name('contact');

//admir


//Admin rute
Route::group(['middleware' => 'admin'], function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    Route::get("/admin/users", "Admin\UsersController@index")->name("users.index");
    Route::get("/admin/users/create", "Admin\UsersController@create")->name("users.create");
    Route::get("/admin/users/{id}", "Admin\UsersController@show")->name("users.show");
    Route::post("/admin/users", "Admin\UsersController@store")->name("users.store");
    Route::post("/admin/users/{id}/update", "Admin\UsersController@update")->name("users.update");
    Route::get("/admin/users/{id}/delete", "Admin\UsersController@destroy")->name("users.delete");

    Route::get("/admin/posts", "Admin\PostsController@index")->name("posts.index");
    Route::get("/admin/posts/create", "Admin\PostsController@create")->name("posts.create");
    Route::get("/admin/posts/{id}", "Admin\PostsController@show")->name("posts.show");
    //
    Route::get("/admin/posts/{id}/edit", "Admin\PostsController@edit")->name("posts.edit");
    //
    Route::post("/admin/posts", "Admin\PostsController@store")->name("posts.store");
    Route::post("/admin/posts/{id}/update", "Admin\PostsController@update")->name("posts.update");
    Route::get("/admin/posts/{id}/delete", "Admin\PostsController@destroy")->name("posts.delete");

    //Članci
    Route::get("/admin/articles", "Admin\ArticlesController@indexArticle")->name("articles.index");
    Route::get("/admin/articles/create", "Admin\ArticlesController@createArticle")->name("articles.create");
    Route::get('/admin/articles/{id}', 'Admin\ArticlesController@showArticle')->name("articles.show");
    Route::post("/admin/articles", "Admin\ArticlesController@storeArticle")->name("articles.store");
    Route::post("/admin/articles/{id}/update", "Admin\ArticlesController@updateArticle")->name("articles.update");
    Route::get("/admin/articles/{id}/delete", "Admin\ArticlesController@destroyArticle")->name("articles.delete");

    //Vesti
    Route::get("/admin/news", "Admin\ArticlesController@indexNews")->name("news.index");
    Route::get("/admin/news/create", "Admin\ArticlesController@createNews")->name("news.create");
    Route::get('/admin/news/{id}', 'Admin\ArticlesController@showNews')->name("news.show");
    Route::post("/admin/news", "Admin\ArticlesController@storeNews")->name("news.store");
    Route::post("/admin/news/{id}/update", "Admin\ArticlesController@updateNews")->name("news.update");
    Route::get("/admin/news/{id}/delete", "Admin\ArticlesController@destroyNews")->name("news.delete");

    Route::get("/admin/roles", "Admin\RolesController@index")->name("roles.index");
    Route::get("/admin/roles/create", "Admin\RolesController@create")->name("roles.create");
    Route::get("/admin/roles/{id}", "Admin\RolesController@show")->name("roles.show");
    Route::post("/admin/roles", "Admin\RolesController@store")->name("roles.store");
    Route::post("/admin/roles/{id}/update", "Admin\RolesController@update")->name("roles.update");
    Route::get("/admin/roles/{id}/delete", "Admin\RolesController@destroy")->name("roles.delete");

});



