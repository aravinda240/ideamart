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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::prefix('ideamart')->group(function () {
        Route::post('sms', 'ApiController@imSms');
        Route::post('ussd', 'ApiController@imUssd');
        Route::post('subs', 'ApiController@imSubs');
    });
    Route::prefix('mspace')->group(function () {
        Route::post('sms', 'ApiController@msSms');
        Route::post('ussd', 'ApiController@msUssd');
        Route::post('subs', 'ApiController@msSubs');
    });



    Route::post('subscribe_app', 'ApiController@subscribeApp');
    Route::get('apps', 'AppController@index');
    Route::post('verify_otp', 'ApiController@verifyOtp');




    Route::post('check_status', 'ApiController@checkStatus');
    Route::post('base_size', 'ApiController@getBaseSizeExternal');

});
