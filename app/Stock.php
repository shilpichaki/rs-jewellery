<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;
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

    public static function boot()
    {
        parent::boot();

        static::updating(function ($stock) {
            $stock->transactions()->attach(Auth::user()->id, ['vendor_id' => Session::get('vendor_id')]);
        });
    }

    public function transactions()
    {
        return $this->belongsToMany(User::class, 'raw_material_stock_transactions')
            ->withPivot('vendor_id')
            ->withTimestamps()
            ->latest('pivot_updated_at');
    }

    public function addStock(int $stock_value)
    {
        $this->stock_value += $stock_value;
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
