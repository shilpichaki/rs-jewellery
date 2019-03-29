<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
use Illuminate\Http\Request;
use Session;

class Stock extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'raw_material_type',
        'threshold_value',
        'stock_value'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function getRouteKeyName() {
        return 'raw_material_type';
    }

    public static function boot()
    {
        parent::boot();

        static::updating(function ($stock) {
            $stock->transactions()->attach(Auth::user()->id, [
                'vendor_id' => Session::get('vendor_id'),
                'rate' => Session::get('rate'),
                'price' => Session::get('price'),
                'before' => json_encode(array_intersect_key($stock->fresh()->toArray(), $stock->getDirty())),
                'after' => json_encode($stock->getDirty())
            ]);
        });
    }

    public static function exists($materialType)
    {
        $stock = Stock::where('raw_material_type', $materialType)->first();

        return $stock == null ? null : $stock;
    }

    public static function createNewStockWithGivenStockValue(Request $request)
    {
        $newStock = Stock::create([
            'raw_material_type' => $request->material_type,
            'threshold_value' => $request->threshold_value,
            'stock_value' => $request->stock_value,
        ]);

        return $newStock;
    }

    public function logStockEntry(Request $request)
    {
        $this->transactions()->attach(Auth::user()->id, [
            'vendor_id' => $request->vendor_id,
            'before' => null,
            'after' => json_encode($this),
            'rate' => $request->today_rate,
            'price' => $request->price,
        ]);
    }

    public function transactions()
    {
        return $this->belongsToMany(User::class, 'raw_material_stock_transactions')
            ->withPivot(['vendor_id', 'before', 'after', 'rate', 'price'])
            ->withTimestamps()
            ->latest('pivot_updated_at')
            ->limit(1);
    }

    public function addStock(int $newStockValue)
    {
        $this->stock_value += $newStockValue;
        $this->update();
        return $this;
    }

    public function updateThresholdValue(int $newThresholdValue)
    {
        $this->threshold_value = $newThresholdValue;
        return $this;
    }

    public function deductStock(int $stock_value)
    {
        $newStock = $this->stock_value - $stock_value;

        if ($newStock > 0) {
            $this->stock_value -= $stock_value;
            return $this;
        }
        
        return null;
    }
}
