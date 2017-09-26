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
    Route::get('/', 'PagesController@home');
    Route::get('/about', 'PagesController@about');
    Route::get('/what-we-do', 'PagesController@whatWeDo');
    Route::get('/our-partners', 'PagesController@ourPartners');
    Route::get('/be-partner', 'PagesController@bePartner');
    Route::get('/terms-and-conditions', 'PagesController@terms');
    Route::get('/contacs', 'PagesController@home');
    Route::resource('events', 'AgendaController');
    Route::resource('jobs', 'JobsController');
    Route::resource('trainings', 'TrainingsController');
    Route::post('subscribe', 'NewsletterController@store');
    Route::get('images/{filename}', 'PagesController@uploadedImages');
});

Auth::routes();
/*Route::group(['middleware' => ['guest']], function() {
    Route::get('profiles', 'ProfilesControler@index');
});*/

// Admin
Route::group(['middleware' => ['admin']], function() {
    Route::get('admin', 'AdminController@home')->name('admin');
    Route::get('admin/users', 'UsersController@index')->name('users');
    Route::post('admin/newsletter/delete', 'NewsletterController@multiDestroy');
    Route::get('admin/newsletter/export', 'NewsletterController@export');
    Route::resource('admin/newsletter', 'NewsletterController');
    Route::post('admin/events/delete', 'AgendaController@multiDestroy');
    Route::resource('admin/events', 'AgendaController');
    Route::resource('admin/jobs', 'JobsController');
    Route::resource('admin/jobs/delete', 'JobsController@multiDestroy');
    Route::resource('admin/trainings', 'TrainingsController');
    Route::resource('admin/trainings/delete', 'TrainingsController@multiDestroy');
});
