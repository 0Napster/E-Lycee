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
Route::get('admin', function () {
    return view('admin.index');
})->middleware('auth');

Route::any('login', 'Auth\LoginController@login');
Route::any('logout', 'Auth\LoginController@logout');

Route::get('/', 'FrontController@index')->name('index');
Route::get('/article/{id}', 'FrontController@showPost')->name('article');