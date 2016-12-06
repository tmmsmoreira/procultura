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
Route::get('/', 'PagesController@soon');
Route::get('home', 'PagesController@home');
Route::get('images/{filename}','PagesController@uploadedImages');

Auth::routes();
Route::group(['middleware' => ['guest']], function() {
    Route::get('profiles', 'ProfilesControler@index');
});

// Admin
Route::group(['middleware' => ['admin']], function() {
    Route::get('admin', 'AdminController@home');
    Route::get('admin/users', 'UsersController@index');
    Route::resource('admin/agenda', 'Agenda\AdminController');
    Route::resource('admin/employments', 'Employments\AdminController');
});
