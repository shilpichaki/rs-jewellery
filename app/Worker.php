<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $fillable = ['name'];

    public function AllocationRecieveTransaction()
    {
    	return $this->hasMany(AllocationReceiveTransaction::class);
    }
}
