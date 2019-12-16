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

// Route::get('/home', 'HomeController@adminHome')->name('home');
Route::group(['middleware' => 'is_admin'], function () {
	Route::get('/home', 'HomeController@adminHome')->name('home')->middleware('is_admin');
	Route::get('carwashReceivables', 'ReceivablesController@carwash')->name('carwash.receivables');
	Route::post('updateRowReceivableCarwash', 'ReceivablesController@updatePaidCarwash');
	Route::get('shopReceivables', 'ReceivablesController@shop')->name('shop.receivables');
	Route::post('updateRowReceivableShop', 'ReceivablesController@updatePaidShop');

	Route::get('carwashReports', 'ReportsController@carwash')->name('carwash.reports');
	Route::get('shopReports', 'ReportsController@shop')->name('shop.reports');
	Route::get('showCarwashReport', 'ReportsController@showCarwashReport')->name('carwash.report');
	Route::get('showShopReport', 'ReportsController@showShopReport')->name('shop.report');

	Route::get('viewTodaySchedule', 'ScheduleController@viewToday')->name('schedule.viewToday');
	Route::get('todaySchedule', 'ScheduleController@showToday')->name('schedule.today');
	Route::post('saveGroup', 'ScheduleController@storeGroup')->name('saveGroup');
	Route::get('getTodaySched', 'ScheduleController@getTodaySched')->name('getTodaySched');
	Route::get('getWorkersToday', 'ScheduleController@getWorkersToday')->name('getWorkersToday');
	Route::put('updateGroup', 'ScheduleController@updateGroup')->name('updateGroup');
	Route::get('viewEditTodaySched', 'ScheduleController@viewEditTodaySched')->name('viewEditTodaySched');
	Route::delete('deleteWorker', 'ScheduleController@deleteWorker')->name('deleteWorker');
	Route::post('additionalWorker', 'ScheduleController@additionalWorker')->name('additionalWorker');

	Route::get('viewPastSched', 'ScheduleController@viewPast')->name('schedule.viewPastSched');
	Route::get('getPastSched', 'ScheduleController@getPastSched')->name('get_pastSchedule');

	Route::get('encodeStocks', 'OthersController@showEncodeStocks')->name('others.encodeStocks');
	Route::post('saveStocks', 'OthersController@saveStocks')->name('others.submitStocks');
	Route::put('updateStocks', 'OthersController@updateStocks')->name('others.updateStocks');
	Route::delete('deleteStocks', 'OthersController@deleteStocks')->name('others.deleteStocks');

	Route::get('outparts', 'OutpartsController@showOutworks')->name('others.outparts');
	Route::post('saveOutparts', 'OutpartsController@saveOutparts')->name('others.submitOutparts');
	Route::put('updateOutparts', 'OutpartsController@updateOutparts')->name('others.updateOutparts');
	Route::delete('deleteOutparts', 'OutpartsController@deleteOutparts')->name('others.deleteOutparts');

	Route::get('shares', 'SharesController@showShares')->name('others.shares');
	Route::get('getShares', 'SharesController@getShares')->name('others.getShares');

	Route::get('getChartData', 'ChartController@getChartData')->name('getChartData');
	Route::get('getReceivablesCarwash', 'ChartController@getReceivablesCarwash')->name('getReceivablesCarwash');
	Route::get('getReceivablesShop', 'ChartController@getReceivablesShop')->name('getReceivablesShop');
	Route::get('getTodayEmployees', 'ChartController@getTodayEmployees')->name('getTodayEmployees');
	
	Route::get('getDashboardStocksData', 'ChartController@getDashboardStocksData')->name('getDashboardStocksData');

	Route::post('create', 'ProfileController@create')->name('profile.create');
	Route::get('getAllUsers', 'ProfileController@getAllUsers')->name('getAllUsers');
});

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'UserController', ['except' => ['show']]);

	Route::get('carwashInformation', 'CarwashController@showService')->name('carwash.information');
	Route::post('saveCarwashService', 'CarwashController@store')->name('saveCarwashService');
	Route::get('carwashHistory', 'CarwashController@showCarwashHistory')->name('carwash.history');
	Route::get('carwashRecord', 'CarwashController@showRecord')->name('history.record');
	
	Route::get('shopInformation', 'ShopController@showShop')->name('shop.information');
	Route::post('saveShopService', 'ShopController@store')->name('saveShopService');
	Route::get('shopHistory', 'ShopController@showShopHistory')->name('shop.history');
	Route::get('shopRecord', 'ShopController@showShopRecord')->name('historyShop.record');

	

	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::post('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
	
	
	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
});

