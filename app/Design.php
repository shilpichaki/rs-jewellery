<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $fillable = [
    	'design_no',
		'stones',
		'picture',
        'rhodium',
        'price_5pcs',
        'unit_avg_price'
    ];

    protected $hidden = [
    	'id'
    ];

    public function getRouteKeyName()
    {
    	return 'design_no';
    }
}
