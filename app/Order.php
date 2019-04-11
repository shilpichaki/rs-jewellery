<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['order_no', 'party_name', 'issue_date', 'delivery_date','designs'];

    // protected $casts = [
    //     'designs' => 'array'
    // ];

    public function getRouteKeyName()
    {
    	return 'order_no';
    }

    public function Allocations()
    {
    	return $this->hasMany(Allocation::class);
    }

    public static function getAssignedWorkersList($allocations)
    {
        $arr1 = [];
        foreach ($allocations as $aKey => $allocation) {
            $allocation['allocations'] = json_decode($allocation['allocations']);
            $arr2 = [];
            foreach ($allocation['allocations'] as $workerId => $oneAllocation) {
                array_push($arr2, $workerId);
            }
            $arr1[$allocation['design_no']] = $arr2;
        }
        return $arr1;
    }
}
