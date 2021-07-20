<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* ================
    VOTES
=================== */
Route::prefix('votes')
->group(function() {
    Route::get('index', 'Api\VoteController@index')->name('vote-index');
});
/* ================
    CATEGORIES
=================== */
Route::prefix('categories')
->group(function() {
    Route::get('index', 'Api\CategoryController@index')->name('category-index');
});


Route::get('search', 'Api\UserController@users')->name('search');
Route::get('sponsored', 'Api\UserController@sponsoredUsers');
Route::get('stats', 'Api\UserController@stats');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
