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

Route::pattern('id', '\d+');

Route::get('/', function () {
    return view('front.index');
});
Route::get('home', function () {
    return redirect('/');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('admin', 'DashboardController@index');
    Route::get('admin/post', 'PostController@index');
    Route::get('admin/post/{id}/edit', 'PostController@edit');
    Route::any('admin/post/{id}/update', 'PostController@update');
    Route::get('admin/post/create', 'PostController@create');
    Route::any('admin/post/store', 'PostController@store');
    Route::get('post', 'PostController@store');
});

Route::any('login', 'Auth\LoginController@login');
Route::any('logout', 'Auth\LoginController@logout');

Route::get('/', 'FrontController@index')->name('index');
Route::get('/article/{id}', 'FrontController@showPost')->name('article');