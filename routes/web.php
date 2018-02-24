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
    return view('home');
});

Route::get('/browse', function () {
    return view('browse');
})->name('browse');

Route::get('/user', function () {
    return view('user');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/settings', 'UserController@showSettings')->name('settings');

Route::get('/searchresults', 'HomeController@showSearchResults')->name('searchresults');
