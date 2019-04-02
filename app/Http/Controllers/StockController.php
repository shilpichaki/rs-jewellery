<?php

namespace App\Http\Controllers;

use App\Enums\RawMaterial;
use App\Enums\UnitOfMeasurement;
use App\Stock;
use App\Vendor;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;

class StockController extends Controller
{
    protected $rawMaterials = [];
    protected $unitOfMeasurement = [];

    public function index()
    {
        $stocks = Stock::with('transactions')->get();
        
        return view('stock.index')->withStocks($stocks);
    }

    public function show(Stock $stock)
    {
        return view('stock.show')->withStock($stock);
    }

    public function create()
    {
        return view('stock.create')
            ->withRawMaterial(RawMaterial::getAllRawMaterials())
            ->withUnitOfMeasurement(UnitOfMeasurement::getUomList())
            ->withVendors(Vendor::all());
    }

    public function addStock(Request $request)
    {
        $errorMessages = [
            'in'      => 'The :attribute must be one of the following types: :values',
            'stock_value.required' => 'Please enter the amount of stock you want to add.',
        ];

        $validatorRequestData = Validator::make($request->all(), [
            'material_type' => 'required|string',
            'vendor_id' => [
                'required',
                'integer',
                'min:1',
                'exists:vendors,id'
            ],
            'unit_of_measurement' => [
                'required',
                Rule::in(UnitOfMeasurement::getUomList()),
            ],
//            'threshold_value' => 'integer|min:1',
            'stock_value' => 'required|integer|min:1',
            'today_rate' => 'required|integer|min:1',
            'price' => 'required|integer|min:1',
        ], $errorMessages);

        if ($validatorRequestData->fails()) {
            return redirect()
                ->back()
                ->withErrors($validatorRequestData);
        }

        $stock = Stock::exists($request->material_type);
        Session::flash('vendor_id', $request->vendor_id);
        Session::flash('rate', $request->today_rate);
        Session::flash('price', $request->price);

        if($stock) {
            $stock->updateThresholdValue($request->threshold_value);
            $stock->addStock($request->stock_value);
        } else {
            Stock::createNewStockWithGivenStockValue($request)
                ->logStockEntry($request);
        }

        return redirect()->back();
    }

    public function addStockValue(int $newStockValue, Stock $stock)
    {
        $stock->stock_value += $newStockValue;
        return $stock;
    }
}
