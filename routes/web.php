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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard.dashboard')->middleware('sidemenu');

/**
 * Stock
 * show, add-stock
 */

Route::get('/stock', 'StockController@index')->name('stock.index')->middleware(['sidemenu', 'auth']);
Route::get('/stock/add-stock', 'StockController@create')->name('stock.create')->middleware(['sidemenu', 'auth']);
Route::post('/stock/add-stock', 'StockController@addStock')->name('stock.addstock')->middleware(['sidemenu', 'auth']);
Route::get('/stock/{stock}', 'StockController@show')->name('stock.show')->middleware(['sidemenu', 'auth']);

/**
 * Design
 * show, add-design
 */
Route::get('/design', 'DesignController@index')->name('design.index')->middleware(['sidemenu', 'auth']);
Route::get('/design/add-design', 'DesignController@addDesign')->name('design.add-design')->middleware(['sidemenu', 'auth']);
Route::post('/design/add-design', 'DesignController@store')->name('design.store-design')->middleware(['sidemenu', 'auth']);
Route::get('/design/{design}', 'DesignController@show')->name('design.show')->middleware(['sidemenu', 'auth']);
Route::get('/design/{design}/edit', 'DesignController@edit')->name('design.edit')->middleware(['sidemenu', 'auth']);
Route::put('/design/{design}/update', 'DesignController@update')->name('design.update-design')->middleware(['sidemenu', 'auth']);

/**
 * Order
 * show, add-order
 */
Route::get('/order', 'OrderController@index')->name('order.index')->middleware(['sidemenu', 'auth']);
Route::get('/order/allocation', 'OrderController@allocation')->name('order.allocation')->middleware(['sidemenu', 'auth']);
Route::get('/order/receive', 'OrderController@receive')->name('order.receive')->middleware(['sidemenu', 'auth']);
Route::get('/order/create', 'OrderController@create')->name('order.create')->middleware(['sidemenu', 'auth']);
Route::get('/order/{order}', 'OrderController@show')->name('order.show')->middleware(['sidemenu', 'auth']);
Route::post('/order', 'OrderController@store')->name('order.store')->middleware(['sidemenu', 'auth']);
