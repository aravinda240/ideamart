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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'DashboardController@index');

Route::group(['middleware' => 'auth:web'], function(){


//Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::put('/profile', 'ProfileController@update')->name('profile.update');

//Route::get('/otp_key', 'OtpController@index')->name('otpApiKey');


//Route::prefix('/'app_management)->group(function () {
//    Route::get('home', 'HomeController@index')->name('home');
//});

    Route::prefix('/')->group(function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');
        Route::get('otp_key', 'OtpController@index')->name('otpApiKey');
        Route::post('generate_common_key', 'OtpController@generateKey')->name('generateKey');
    });



    Route::prefix('/report_management')->group(function () {
        Route::get('/', 'ReportController@viewCommonReport')->name('viewCommonReport');
        Route::get('/daily/{appId?}/{fDate?}/{tDate?}', 'ReportController@viewDailyReport')->name('viewDailyReport');
        Route::get('/filterDaily/{appId?}/{fDate?}/{tDate?}', 'ReportController@filterDailyReport')->name('filterDailyReport');
    });

    Route::prefix('/category_management')->group(function () {
        Route::get('/{id?}', 'CategoryController@viewCategories')->name('viewCategories');
        Route::get('/delete/{id}', 'CategoryController@deleteCategory');
        Route::post('/add_category', 'CategoryController@addCategory')->name('addCategory');


//    Route::post('/add_content', 'CategoryController@addContent')->name('addContent');
//    Route::get('/filter_category/{appId?}', 'CategoryController@filterCategory')->name('filterCategory');
//    Route::get('/filter_content/{appId?}', 'CategoryController@filterContent')->name('filterContent');
//    Route::get('/get_category/{catId?}', 'CategoryController@getCategory')->name('getCategory');
//    Route::get('/contents', 'CategoryController@viewContents');
    });

    Route::prefix('/content_management')->group(function () {
        Route::get('/{id?}', 'ContentController@view')->name('viewContents');
        Route::get('/delete/{id}', 'ContentController@delete');
        Route::post('/add', 'ContentController@add')->name('addContent');
    });
//Route::prefix('/category_management')->group(function () {
//    Route::get('/', 'CategoryController@viewCategories')->name('viewCategories');
//    Route::post('/add_category', 'CategoryController@addCategory')->name('addCategory');
//    Route::post('/add_content', 'CategoryController@addContent')->name('addContent');
//    Route::get('/filter_category/{appId?}', 'CategoryController@filterCategory')->name('filterCategory');
//    Route::get('/filter_content/{appId?}', 'CategoryController@filterContent')->name('filterContent');
//    Route::get('/get_category/{catId?}', 'CategoryController@getCategory')->name('getCategory');
//    Route::get('/contents', 'CategoryController@viewContents')->name('viewContents');
//});

    Route::get('/about', function () {
        return view('about');
    })->name('about');

//Route::get('/new_application', function () {
//    return view('newApplication');
//})->name('newApplication');
//
//Route::get('/my_applications', function () {
//    return view('myApplications');
//})->name('myApplications');

    Route::get('/categories', function () {
        return view('categories');
    })->name('categories');

    Route::get('/content', function () {
        return view('content');
    })->name('content');

    Route::get('/application_report', function () {
        return view('applicationReport');
    })->name('applicationReport');

    Route::get('/daily_report', function () {
        return view('dailyReport');
    })->name('dailyReport');

    Route::prefix('/app_management')->group(function () {
        Route::get('/', 'AppController@index')->name('viewApps');
        Route::get('/create', 'AppController@createApp')->name('createApp');
        Route::post('/create', 'AppController@storeApp')->name('storeApp');
        Route::get('/edit/{id?}', 'AppController@viewApp')->name('viewApp');
        Route::get('/delete/{id}', 'AppController@delete');
        Route::post('/add_app_id_key', 'AppController@addAppIdKey')->name('addAppIdKey');
    });
});
