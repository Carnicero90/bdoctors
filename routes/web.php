<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/sendmessage', 'MessageController@show')->name('send-message');
// Route pagina dettaglio utenti
Route::post('/storemessage', 'MessageController@store')->name('store-message');
// END TOTEST

// TEST REVIEWS
Route::get('/sendreview', 'ReviewController@show')->name("send-review");
Route::post('/storereview', 'ReviewController@store')->name("store-review");
// END TEST REVIEWS

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('admin')

    ->namespace('Admin')

    ->name('admin.')

    ->middleware('auth')

    ->group(function () {
        // TOTEST
        Route::get('messages', 'MessageController@index')->name('messaggi');

    });
