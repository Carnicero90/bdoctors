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

/* ================
    GUEST
=================== */
/* -- MAIN -- */

Route::get('/', 'HomeController@home');

/* -- MESSAGES -- */
// --> send
Route::get('sendmessage/{id}', 'MessageController@create')
    ->name('send-message');
// --> store
Route::post('storemessage/{id}', 'MessageController@store')
    ->name('store-message');

/* -- REVIEWS -- */
// --> send
Route::get('/sendreview/{id}', 'ReviewController@create')
    ->name("send-review");
// --> store
Route::post('/storereview/{id}', 'ReviewController@store')
    ->name("store-review");

/* -- ADVSEARCH -- */
// --> index
Route::get('/advancedsearch', 'AdvancedSearchController@index')
    ->name('advanced-search');

/* -- USER -- */
// --> show
Route::get('/bards/{id}', 'UserController@show')
    ->name('profile');

/* -- CATEOGRIES --*/
// --> index
Route::get("/categories", "CategoryController@index")
    ->name("categories");
// --> show
Route::get("/categories/{slug}", "CategoryController@show")
    ->name("category-page");

/* ================
    AUTH
=================== */
Auth::routes();

/* ================
    SPONSORPLAN
=================== */
Route::prefix('premium')

    ->group(function () {
        // --> index
        Route::get('index', 'SponsorplanController@index')
            ->name('sponsor-index');
        // --> show
        Route::get('{slug}', 'SponsorplanController@show')
            ->name('sponsor-show');
        // -->store
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

        /* -- MAIN -- */
        Route::get('/dashboard', 'HomeController@index')
            ->name('dashboard');

        /* -- PROFILE --*/
        // --> index
        Route::get('/profile', 'ProfileController@index')
            ->name('profile-index');
        // --> store
        Route::post('profile/pic/store', 'ProfileController@changePic')
            ->name('pic-store');
        Route::post('/profile/store', 'ProfileController@createOrUpdate')
            ->name('profile-store');

        /* -- PAYMENT --*/
        // --> index
        Route::get('payment/{id}', 'PaymentController@index')->name('pay');
        // --> make
        Route::get('payment/make/{id}', 'PaymentController@make')->name('payment.make');


        /* -- MESSAGES --*/
        // --> index
        Route::get('/messages', 'MessageController@index')
            ->name('messages');
        // --> show 
        Route::get('/messages/{id}', 'MessageController@show')
            ->name('message-page');
        // --> store
        Route::post('/messages/{id}', 'MessageController@hide')
            ->name("message-hide");

        /* -- REVIEWS --*/
        // --> index
        Route::get('/reviews', 'ReviewController@index')
            ->name('reviews');
        // --> show
        Route::get('/reviews/{id}', 'ReviewController@show')
            ->name('reviews-dettails');

        /* -- STATISTICS --*/
        // --> index    
        Route::get('/statistics/{id}', 'StatisticController@index')
            ->name('statistics');

        /* -- SERVICES --*/
        // TOTEST
        // --> index    
        Route::get('/services', 'ServiceController@index')
            ->name('services');
        // --> store   
        Route::post('/services/create', 'ServiceController@create')
            ->name('service-create');
        // --> update
        Route::put('/services/update/{id}', 'ServiceController@update')
            ->name('service-update');
        // --> destroy   
        Route::delete('/services/delete/{id}', 'ServiceController@destroy')
            ->name('service-destroy');
    });

/* ================
   TEST
=================== */

use Carbon\CarbonPeriod;
use Carbon\Carbon;
// route per provare dd e dump a caso
Route::get('/prova', function () {
    dd(intval('true'));
});
