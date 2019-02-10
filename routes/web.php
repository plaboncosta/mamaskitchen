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

Route::get('/', 'HomeController@index')->name('welcome');

Auth::routes();


Route::post('reservation', 'ReservationController@reserve')->name('reservation.reserve');
Route::post('contact', 'ContactController@contact')->name('contact');


Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth', 'namespace' => 'Admin'], function(){
	Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
	Route::resource('slider', 'SliderController');
	Route::resource('category', 'CategoryController');
	Route::resource('item', 'ItemController');
	Route::get('reservation', 'ReservationController@index')->name('reservation.index');
	Route::post('reservation/{id}', 'ReservationController@status')->name('reservation.status');
	Route::delete('reservation/{id}', 'ReservationController@destroy')->name('reservation.destroy');
	Route::get('contact', 'ContactController@index')->name('contact.index');
	Route::get('contact/{id}', 'ContactController@show')->name('contact.show');
	Route::delete('contact/{id}', 'ContactController@destroy')->name('contact.destroy');
	Route::get('social', 'SocialController@index')->name('social.index');
	Route::put('social', 'SocialController@update')->name('social.update');
	Route::resource('about', 'AboutController');
	Route::get('settings', 'SettingsController@index')->name('settings.index');
	Route::put('settings', 'SettingsController@update')->name('settings.update');
});
