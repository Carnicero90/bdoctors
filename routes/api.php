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
// TOTEST
<<<<<<< HEAD
Route::get('/votes', 'Api\VoteController@index');
Route::get('/users', 'Api\UserController@index');
Route::get('/messages', 'Api\MessageController@index');

Route::get('/cat/{slug}', 'Api\CategoryUserController@show');
// END TOTEST
=======
Route::get('test', 'Api\UserController@test');
Route::get('/test-api', 'Api\UserController@index');
>>>>>>> crud-start

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
