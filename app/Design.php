<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    protected $fillable = [
    	'design_no',
		'stones',
		'picture',
    ];

    protected $hidden = [
    	'id'
    ];

    public function getRouteKeyName()
    {
    	return 'design_no';
    }
}
