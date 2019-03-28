<?php

// Auth::loginUsingId(2);

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
})->middleware('auth')->name('dashboard');

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
 * show, add-design
 */
Route::get('/design', 'DesignController@index')->name('design.index');
Route::get('/design/add-design', 'DesignController@addDesign')->name('design.add-design');
Route::post('/design/add-design', 'DesignController@store')->name('design.store-design');
Route::get('/design/{design}', 'DesignController@show')->name('design.show');
Route::get('/design/{design}/edit', 'DesignController@edit')->name('design.edit');
Route::put('/design/{design}/update', 'DesignController@update')->name('design.update-design');

/**
 * Order
 * show, add-order
 */
Route::get('/order/create', 'OrderController@create')->name('order.create');
Route::get('/order/{order}', 'OrderController@show')->name('order.show');
Route::post('/order', 'OrderController@store')->name('order.store');