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

Route::get('/mentions', function () {
    return view('front.mentions');
});

Route::get('/contact', function () {
    return view('front.contact');
});

Route::group(['middleware' => ['auth', 'role']], function () {
    /*
     * TEACHER
     * */
    Route::get('admin', 'DashboardController@index');
    /*CRUD Articles*/
    Route::get('admin/post', 'PostController@index');
    Route::get('admin/post/{id}/edit', 'PostController@edit');
    Route::any('admin/post/{id}/update', 'PostController@update');
    Route::get('admin/post/{id}/delete', 'PostController@destroy');
    Route::get('admin/post/create', 'PostController@create');
    Route::any('admin/post/store', 'PostController@store');
    /*CRUD QCMs*/
    Route::get('admin/qcm', 'QcmController@index');
    Route::get('admin/qcm/{id}/edit', 'QcmController@edit');
    Route::any('admin/qcm/{id}/update', 'QcmController@update');
    Route::get('admin/qcm/{id}/delete', 'QcmController@destroy');
    Route::get('admin/qcm/create', 'QcmController@create');
    Route::any('admin/qcm/store', 'QcmController@store');
    Route::any('admin/choices/store', 'ChoiceController@store');
});
Route::group(['middleware' => ['auth']], function () {
    /*
     * STUDENT
     * */
    Route::get('student', 'StudDashboardController@index');
    Route::get('student/qcm', 'StudDashboardController@showStudQcms');
    Route::get('student/qcm/{id}/answer', 'StudDashboardController@answer');
    Route::any('student/qcm/{id}/update', 'StudDashboardController@update');
});

Route::any('login', 'Auth\LoginController@login');
Route::any('logout', 'Auth\LoginController@logout');

Route::get('/', 'FrontController@index')->name('index');
Route::get('/article/{id}', 'FrontController@showPost')->name('article');
Route::get('search', 'SearchController@getIndex');
Route::resource('comment', 'CommentController');

/*MAIL*/
Route::any('/send', 'EmailController@send');