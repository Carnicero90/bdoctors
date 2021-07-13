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
Route::get('test', 'Api\UserController@test');
Route::get('/test-api', 'Api\UserController@index');
Route::get('sponsored', 'Api\UserController@sponsoredUsers');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
