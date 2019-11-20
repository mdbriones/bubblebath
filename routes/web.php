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

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);

	Route::get('carwashInformation', 'CarwashController@showService')->name('carwash.information');
	Route::post('saveCarwashService', 'CarwashController@store')->name('saveCarwashService');
	Route::get('carwashHistory', 'CarwashController@showCarwashHistory')->name('carwash.history');
	Route::get('carwashRecord', 'CarwashController@showRecord')->name('history.record');
	
	Route::get('shopInformation', 'ShopController@showShop')->name('shop.information');
	Route::post('saveShopService', 'ShopController@store')->name('saveShopService');

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	
	
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

