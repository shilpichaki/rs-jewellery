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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/design-aadhar', function () {
    return view('design-aadhar');
});

/**
 * Stock
 * show, add-stock
 */

Route::get('/stock', 'StockController@index')->name('stock.index');
Route::get('/stock/add-stock', 'StockController@create')->name('stock.create');
Route::post('/stock/add-stock', 'StockController@addStock')->name('stock.addstock');
Route::get('/stock/{stock}', 'StockController@show')->name('stock.show');

/**
 * Design
 * show, add-stock
 */
Route::get('/design/add-design', 'DesignController@addDesign')->name('design.add-design');
Route::post('/design/add-design', 'DesignController@store')->name('design.store-design');
