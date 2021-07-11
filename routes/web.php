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

//INIZIO ROUTES SENZA MIDDLEWARE MOMENTANEE PER TEST
Route::get('/dashboard', function () {
    return view('admin.dash.index');
});
Route::get('/destroy/{user_id}/{message_id}', 'MessageController@destroy')->name('destroy');
// Route::get('/dashboard', function () {
//     return view('admin.bards.index');
// });

Route::get('/edit', function () {
    return view('admin.bards.edit');
});
//FINE ROUTES MOMENTANEE PER TEST

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
