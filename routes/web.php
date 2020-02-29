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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('crops/monitor', 'CropsMonitoringController@showCrops')->name('crops.monitor')->middleware('auth');
Route::post('crops/monitor', 'CropsMonitoringController@storeMonitor')->name('store.monitor');
Route::get('crops/delete/{id}', 'CropsMonitoringController@deleteMonitor');
Route::get('crops/update/{id}', 'CropsMonitoringController@completeMonitor');
Route::resource('crops', 'CropsController');
Route::get('/send', 'CropsMonitoringController@sendReminder');
//middleware
Route::get('merchant/home', 'MerchantController@merchantHome')->name('merchant.home')->middleware('auth')->middleware('is_merchant');


