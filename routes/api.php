<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/stock/{stock}', 'Api\StockController@show');
Route::get('/design/{design}', 'Api\DesignController@show');
Route::match(['post', 'put'], '/design/calculate-price', 'Api\DesignController@calculatePrice');

Route::post('/stones/alocation-stonecount', 'Api\StonesController@alocationStonecount');