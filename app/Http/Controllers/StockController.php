<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class StockController extends Controller
{
    public function show(Stock $stock)
    {
        return view('stock.show')->withStock($stock);
    }

    public function addStock(Request $request, Stock $stock)
    {
        $validatorRequestData = Validator::make($request->all(), [
            'stock_value' => 'required|integer|min:1',
            'vendor_id' => [
                'required',
                'integer',
                'min:1',
                'exists:vendors,id'
            ],
        ]);

        if ($validatorRequestData->fails()) {
            return redirect()
                ->route('stock.show', ['stock' => $stock->id])
                ->withErrors($validatorRequestData);
        }

        $stock->addStock($request->stock_value);
        Session::flash('vendor_id', $request->vendor_id);
        $stock->update();

        return redirect()->route('stock.show', ['stock' => $stock->id]);
    }
}
