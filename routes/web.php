<?php

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

Auth::routes();
//home
Route::get('/home', 'HomeController@index')->name('home');

//farmer login
Route::post('/user/login', 'Auth\LoginController@login')->name('user.login');

//crops
Route::get('crops/monitor', 'CropsMonitoringController@showCrops')->name('crops.monitor')->middleware('auth');
Route::post('crops/monitor', 'CropsMonitoringController@storeMonitor')->name('store.monitor');
Route::get('crops/delete/{id}', 'CropsMonitoringController@deleteMonitor');
Route::get('crops/update/{id}', 'CropsMonitoringController@completeMonitor');
Route::get('/send', 'CropsMonitoringController@sendReminder');
Route::get('/croprequests', 'MerchantController@reviewRequest')->name('review.request')->middleware('auth');
Route::get('/accept/{id}/{user_id}', 'MerchantController@acceptRequest');
Route::get('/crops-record', 'CropsMonitoringController@showRecord')->name('crops.record')->middleware('auth');
Route::get('/delete/{id}', 'CropsMonitoringController@deleteMonitor');
Route::get('/accepted/request', 'MerchantController@displayAcceptedRequest')->name('accepted.request')->middleware('auth');

//weather(test)
Route::post('/get-coordinate', 'CropsMonitoringController@getCoordinate')->name('get.coordinate');
Route::get('/weather-info', "WeatherController@index")->middleware('auth');

//middleware
Route::get('merchant/home', 'MerchantController@merchantHome')->name('merchant.home')->middleware('auth')->middleware('is_merchant');

//merchant
Route::get('merchant/request', 'MerchantController@displayRequest')->name('display.request')->middleware('auth')->middleware('is_merchant');
Route::post('merchant/request', 'MerchantController@requestCrop')->name('store.request');
Route::get('merchant/delete/{id}', 'MerchantController@deleteRequest');



