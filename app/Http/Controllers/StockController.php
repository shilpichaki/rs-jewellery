<?php

namespace App\Http\Controllers;

use App\Enums\RawMaterial;
use App\Enums\UnitOfMeasurement;
use App\Stock;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Auth;

class StockController extends Controller
{
    protected $rawMaterials = [];
    protected $unitOfMeasurement = [];

    public function __construct()
    {
        $this->addRawMaterials();
        $this->addunitOfMeasurement();
    }

    public function index()
    {
        $stocks = Stock::with('transactions')->get();
        // return $stocks;
        return view('stock.index')->withStocks($stocks);
    }

    public function show(Stock $stock)
    {
        return view('stock.show')->withStock($stock);
    }

    public function create()
    {
        return view('stock.create')
            ->withRawMaterial($this->rawMaterials)
            ->withUnitOfMeasurement($this->unitOfMeasurement);
    }

    public function addStock(Request $request)
    {
        $stock = Stock::exists($request->material_type);
        Session::flash('vendor_id', $request->vendor_id);

        if($stock) {
            $stock->addStock($request->stock_value);
        } else {
            Stock::createNewStockWithGivenStockValue($request)
                ->logStockEntry($request);
        }
        /*
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
        */
    }

    private function addRawMaterials()
    {
        array_push($this->rawMaterials, RawMaterial::WAX);
        array_push($this->rawMaterials, RawMaterial::INVESTMENT_POWDER);
        array_push($this->rawMaterials, RawMaterial::BRASS_METAL);
        array_push($this->rawMaterials, RawMaterial::ROUND_STONE);
        array_push($this->rawMaterials, RawMaterial::BIG_STONE);
        array_push($this->rawMaterials, RawMaterial::TOOLS);
        array_push($this->rawMaterials, RawMaterial::RUBBER);
        array_push($this->rawMaterials, RawMaterial::CHEMICAL);
        array_push($this->rawMaterials, RawMaterial::PACKAGING_MATERIAL);
    }

    private function addunitOfMeasurement()
    {
        array_push($this->unitOfMeasurement, UnitOfMeasurement::gm);
        array_push($this->unitOfMeasurement, UnitOfMeasurement::kg);
        array_push($this->unitOfMeasurement, UnitOfMeasurement::lt);
        array_push($this->unitOfMeasurement, UnitOfMeasurement::ml);
        array_push($this->unitOfMeasurement, UnitOfMeasurement::pcs);
    }

    public function addStockValue(int $newStockValue, Stock $stock)
    {
        $stock->stock_value += $newStockValue;
        return $stock;
    }
}
