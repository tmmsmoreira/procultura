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
//Route::group(['middleware' => ['web']], function () {
    Route::get('/', 'PagesController@home');
    Route::get('/about', 'PagesController@about');
    Route::get('/what-we-do', 'PagesController@whatWeDo');
    Route::get('/our-partners', 'PagesController@ourPartners');
    Route::get('/be-partner', 'PagesController@bePartner');
    Route::get('/terms-and-conditions', 'PagesController@terms');
    Route::get('/contacs', 'PagesController@home');

    Route::resource('events', 'AgendaController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('jobs', 'JobsController', ['only' => [
        'index', 'show'
    ]]);

    Route::resource('trainings', 'TrainingsController', ['only' => [
        'index', 'show'
    ]]);
    
    Route::post('subscribe', 'NewsletterController@store');
    Route::get('images/{filename}', 'PagesController@uploadedImages');
//});

Auth::routes();
/*Route::group(['middleware' => ['guest']], function() {
    Route::get('profiles', 'ProfilesControler@index');
});*/

// Admin
Route::group([
        'middleware' => ['admin'],
        'namespace' => 'Admin',
        'prefix' => 'admin'], function() {
    Route::get('/', 'AdminController@home')->name('admin');
    Route::get('users', 'UsersController@index')->name('admin.users.index');

    Route::post('newsletter/delete', 'NewsletterController@multiDestroy')->name('admin.newsletter.multi_destroy');
    Route::get('newsletter/export', 'NewsletterController@export')->name('admin.newsletter.export');
    Route::resource('newsletter', 'NewsletterController', [ 'as' => 'admin']);

    Route::resource('events', 'AgendaController', [ 'as' => 'admin']);
    Route::post('events/delete', 'AgendaController@multiDestroy')->name('admin.events.export');

    Route::resource('jobs', 'JobsController', [ 'as' => 'admin']);
    Route::post('jobs/delete', 'JobsController@multiDestroy')->name('admin.jobs.multi_destroy');

    Route::resource('trainings', 'TrainingsController', [ 'as' => 'admin']);
    Route::post('trainings/delete', 'TrainingsController@multiDestroy')->name('admin.trainings.multi_destroy');
});
