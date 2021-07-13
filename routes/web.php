<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
// TOTEST
Route::get('/sendmessage/{id}', 'MessageController@create')->name('send-message');
// Route pagina dettaglio utenti
Route::post('/storemessage/{id}', 'MessageController@store')->name('store-message');
// END TOTEST

// TEST REVIEWS
Route::get('/sendreview/{id}', 'ReviewController@create')->name("send-review");
Route::post('/storereview/{id}', 'ReviewController@store')->name("store-review");
// END TEST REVIEWS

// TEST PROFILO PUBBLICO
Route::get('/bards/{id}', 'UserController@show')->name('profile');
// END TEST PROFILO PUBBLICO

Auth::routes();

/* ================
    SPONSORPLAN
=================== */

Route::prefix('premium') // TODO: prefisso arbitrario, poi vediamo quale scegliere

    ->group(function () {
        // View index dei piani di sponsorizzazione
        Route::get('index', 'SponsorplanController@index')
            ->name('sponsor-index');

        // View di dettaglio dei singoli piani di sponsorizzazione
        Route::get('{slug}', 'SponsorplanController@show')
            ->name('sponsor-show');

        //Pagina di sottoscrizione sponsorizzazione, da valutare se spostarla in 'admin'
        Route::get('buy/{id}', 'Admin\SponsorplanUserController@store')
            ->middleware('auth')
            ->name('sponsor-store');
    });

/* ================
    ADMIN
=================== */
Route::prefix('admin')

    ->namespace('Admin')

    ->name('admin.')

    ->middleware('auth')

    ->group(function () {

        // DASHBOARD
        Route::get('/dashboard', 'HomeController@index')->name('dashboard');

        // PROFILO
        Route::get('/profile', 'ProfileController@index')->name('profile-index');
        Route::post('/profile/store', 'ProfileController@createOrUpdate')->name('profile-store');

        // MESSAGGI
        Route::get('/messages', 'MessageController@index')->name('messages');
        Route::get('/messages/{id}', 'MessageController@show')->name('message-page');
        Route::delete('/messages/{id}', 'MessageController@destroy')->name("message-delete");

        // RECENSIONI
        Route::get('/reviews', 'ReviewController@index')->name('reviews');
        Route::get('/reviews/{id}', 'ReviewController@show')->name('reviews-dettails');
    });