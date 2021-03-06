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
Route::group(['middleware' => ['verify.shopify', 'billable']], function () {
    Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
    Route::resource('settings/get/data', 'App\Http\Controllers\SettingController');
    Route::resource('settings', 'App\Http\Controllers\SettingController');

});
Route::group(['middleware' => ['auth.webhook']], function () {
    Route::post('/uninstall', 'App\Http\Controllers\HomeController@uninstall')->name('uninstall');
    Route::post('customer/data-request', 'App\Http\Controllers\HomeController@customerDataRequest');
    Route::post('customer/redact', 'App\Http\Controllers\HomeController@customerRedact');
    Route::post('shop/redact', 'App\Http\Controllers\HomeController@shopRedact');
});
Route::get('policy', 'App\Http\Controllers\HomeController@policy')->name("policy");
