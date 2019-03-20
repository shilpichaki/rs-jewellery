<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function show(Stock $stock)
    {
        return view('stock.show')->withStock($stock);
    }

    public function update(Request $request, Stock $stock)
    {
        $stock->stock_value = $request->stock_value;
        $stock->update();

        return response()->json($stock);
    }
}
