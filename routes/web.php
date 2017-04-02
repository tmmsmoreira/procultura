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
// ProCultura
Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'PagesController@soon');
    Route::get('home', 'PagesController@home');
    Route::resource('home/events', 'AgendaController');
    Route::post('subscribe', 'NewsletterController@store');
    Route::get('images/{filename}', 'PagesController@uploadedImages');
});

Auth::routes();
Route::group(['middleware' => ['guest']], function() {
    Route::get('profiles', 'ProfilesControler@index');
});

// Admin
Route::group(['middleware' => ['admin']], function() {
    Route::get('admin', 'AdminController@home')->name('admin');
    Route::get('admin/users', 'UsersController@index')->name('users');
    Route::resource('admin/events', 'AgendaController');
    Route::post('admin/events/delete', 'AgendaController@multiDestroy');
    Route::resource('admin/employments', 'EmploymentsController');
    Route::resource('admin/employments/delete', 'EmploymentsController@multiDestroy');
});
