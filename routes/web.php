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

// Routes that will give you items dealing with the home page
Route::get('/', 'LandingController@index')->name('landing');
Route::get('/home', 'HomeController@show')->name('home');


//Routes that will give you items dealing with games
Route::get('/browse', 'GameController@show')->name('browse');

Route::resource('games','GameController');

//Routes that will give you items dealing with the user
Route::get('/user', 'UserController@index');//->name();
Route::get('/users/{username}', 'UserController@show')->name('profile');
Route::post('/users/friend/add', 'UserController@makeFriend')->name('Request Friend');
Route::post('/users/friend/delete', 'UserController@removeFriend')->name('Remove Friend');
Route::post('/users/borrow/request', 'UserController@borrowGame')->name('Borrow Game');
Route::post('/users/borrow/return', 'UserController@returnGame')->name('Return Game');

Route::resource('users','UserController');

// Authentication
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

// Notification Routes
Route::get('notification_read/{notification_id}', 'UserController@notificationRead');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/settings', 'UserController@showSettings')->name('settings');
Route::post('/user/update', 'UserController@update');

Route::get('/searchresults', 'HomeController@showSearchResults')->name('searchresults');

Route::post('/inventory/add', 'InventoryController@store')->name('Store Inventory');
Route::post('/inventory/delete', 'InventoryController@destroy')->name('Destroy Inventory');
