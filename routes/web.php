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
Route::resource('/portfolios', 'PortfolioController');
Route::resource('/transactions', 'TransactionsController');
Route::resource('/positions', 'PositionsController');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/yahoo/auth', 'YahooController@access_oauth');
Route::get('/crypto/getminerinfo', 'CryptoController@getMinerInfo');
Route::get('/crypto/test', 'CryptoController@test');
