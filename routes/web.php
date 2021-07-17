<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\User;

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
// TOTEST
Route::get('/', 'HomeController@home');

// TOTEST
Route::get('/sendmessage/{id}', 'MessageController@create')->name('send-message');
// Route pagina dettaglio utenti
Route::post('/storemessage/{id}', 'MessageController@store')->name('store-message');
// END TOTEST

// TEST REVIEWS
Route::get('/sendreview/{id}', 'ReviewController@create')->name("send-review");
Route::post('/storereview/{id}', 'ReviewController@store')->name("store-review");
// END TEST REVIEWS

// PROFILO PUBBLICO USER
Route::get('/bards/{id}', 'UserController@show')->name('profile');

// CATEGORIE
Route::get("/categories", "CategoryController@index")->name("categories");
Route::get("/categories/{slug}", "CategoryController@show")->name("category-page");

Auth::routes();

// RICERCA AVANZATA
Route::get('/advancedsearch', 'AdvancedSearchController@index')->name('advanced-search');

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
        Route::post('/messages/{id}', 'MessageController@hide')->name("message-hide");

        // RECENSIONI
        Route::get('/reviews', 'ReviewController@index')->name('reviews');
        Route::get('/reviews/{id}', 'ReviewController@show')->name('reviews-dettails');

        // STATISTICHE
        Route::get('/statistics/{id}', 'StatisticController@index')->name('statistics');

        // PRESTAZIONI
        Route::get('/services', 'ServiceController@index')->name('services');
        Route::post('/services/{id}', 'ServiceController@createOrUpdate')->name('services-store');
        Route::put('/services/update/{id}', 'ServiceController@update')->name('service-update');
        Route::delete('/services/delete/{id}', 'ServiceController@destroy')->name('service-destroy');
    });

/* ================
   TEST
=================== */
// route per provare dd e dump a caso
Route::get('/prova', function() {
    return dd(Auth::user());
});