<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('front.index');
});
Route::get('home', function () {
    return view('front.index');
});

Route::get('/mentions', function () {
    return view('front.mentions');
});

Route::get('/contact', function () {
    return view('front.contact');
});

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('admin', 'DashboardController@index');
    Route::get('admin/post', 'PostController@index');
    Route::get('admin/post/create', 'PostController@create');
    Route::get('post', 'PostController@store');
});

Route::any('login', 'Auth\LoginController@login');
Route::any('logout', 'Auth\LoginController@logout');

Route::get('/', 'FrontController@index')->name('index');
Route::get('/article/{id}', 'FrontController@showPost')->name('article');