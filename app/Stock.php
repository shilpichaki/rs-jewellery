<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class Stock extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'raw_material_type',
        'threshold_value',
        'stock_value'
    ];

    public static function boot()
    {
        parent::boot();

        static::updating(function ($stock) {
            $stock->transactions()->attach(1, ['vendor_id' => 2]);
        });
    }

    public function transactions() {
        return $this->belongsToMany(User::class, 'raw_material_stock_transactions')
            ->withPivot('vendor_id')
            ->withTimestamps();
    }
}
