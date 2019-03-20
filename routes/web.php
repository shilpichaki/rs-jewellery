<?php

Auth::loginUsingId(2);

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

/**
 * Stock
 * show, add-stock
 */
Route::get('/stock/{stock}', 'StockController@show')->name('stock.show');
Route::patch('/stock/{stock}/add-stock', 'StockController@addStock');
