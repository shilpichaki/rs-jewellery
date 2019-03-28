<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_no', 'party_name', 'issue_date', 'delivery_date','designs'];

    public function getRouteKeyName()
    {
    	return 'order_no';
    }
}
