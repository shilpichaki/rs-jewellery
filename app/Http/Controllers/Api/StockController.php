<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Stock;

class StockController extends Controller
{
    public function show(Stock $stock)
    {
        return response()->json([
        	'data' => $stock,
        	'code' => 200
        ]);
    }
}
