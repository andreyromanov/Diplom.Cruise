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
Route::prefix('admin')->group(function() {

  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');

  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

  Route::get('/', 'Admin\DashboardController@index')->name('admin.dashboard');

  Route::get('/cruises_info', 'Admin\DashboardController@cruises');

  Route::get('/cruise_set/{value}', 'Admin\CruiseSetController@index');

  Route::get('/add_trip', 'Admin\CruiseSetController@AddTripForm');

  Route::post ('/trip_insert','Admin\CruiseSetController@AddTrip');

  Route::post ('/trip_delete','Admin\CruiseSetController@DeleteTrip');

  Route::get ('/trip_edit/{value}','Admin\CruiseSetController@EditTripForm');

  Route::post ('/trip_update','Admin\CruiseSetController@UpdateTrip');


  Route::get('/ships', 'Admin\CruiseSetController@ShowShips');

  Route::get('/add_ship', 'Admin\CruiseSetController@AddShipForm');

  Route::post ('/ship_insert','Admin\CruiseSetController@AddShip');

  Route::get('/ship_info/{value}', 'Admin\CruiseSetController@ShipInfo');


  Route::get('/orders', 'Admin\OrderAdminController@index');

  Route::get('/order_info/{value}', 'Admin\OrderAdminController@info');

  Route::get ('/order_info/confirm/{value1}/{value2}','Admin\OrderAdminController@confirm');

  Route::get ('/order_info/delete/{value1}/{value2}/{value3}/{value4}','Admin\OrderAdminController@delete');

  Route::get('/users', 'AdminController@users');

  Route::get('/users/{value}', 'AdminController@user_delete');



});

Route::get('/home', 'HomeController@index');

Route::get('/', function () {
  return view ('home');
});

Route::get('/info', function () {
  return view ('content.info');
});

Route::get('/home', 'TestController@index');
Route::get('/home', 'ManController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cruises', 'CruiseController@index');

Route::post ('/insert','OrderController@index');
Route::get('/order/{value}','OrderController@value');

Route::get('/profile/{value}','ProfileController@index');
Route::get('/profile/ticket/{value}','ProfileController@show');
Route::get ('/profile/cancel/{value1}/{value2}/{value3}/{value4}','ProfileController@delete');

Route::get('/ships', 'CruiseController@show');