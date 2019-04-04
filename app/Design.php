<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $fillable = [
    	'design_no',
        'rhodium',
        'markup_percentage',
        'misc_price',
        'price_4pcs',
		'stones',
		'total_stone_count',
        'picture',
        'unique_stone_colors'
    ];

    protected $hidden = [
    	'id'
    ];

    public function getRouteKeyName()
    {
    	return 'design_no';
    }
}
