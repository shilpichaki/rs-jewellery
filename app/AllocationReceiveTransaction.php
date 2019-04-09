<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllocationReceiveTransaction extends Model
{
    protected $fillable = [
    	'allocation_id', 
    	'worker_id', 
    	'sets_allocated',
    	'stones_allocated', 
    	'sets_recieved',
    	'stones_recieved', 
    	'is_allocation', 
    	'is_recieve'
    ];

    protected $casts = [
    	'sets_allocated' => 'array',
    	'stones_allocated' => 'array',
    	'sets_recieved' => 'array',
    	'stones_recieved' => 'array',
    ];
}
