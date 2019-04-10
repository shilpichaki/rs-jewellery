<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Allocation extends Model
{
	protected $fillable = ['order_id', 'design_no', 'allocations'];

	public function Transactions()
	{
		return $this->hasMany(AllocationReceiveTransaction::class, 'allocation_id');
	}

    public static function sortAllocationsByWorkerName($allocations)
    {
    	foreach ($allocations as $designNo => $allocation) {
    		$newAllocationArray = [];

    		// creating/sorting allocations rows by index of worker id 
  			foreach ($allocation as $rowId => $value) {
          if($value['worker'] != null){
            $newAllocationArray[$value['worker']] = $value;            
          }
  			}

  			// re-assigning allocations[{design_no} by newArray of allocations sorted by index worker_in]
  			$allocations[$designNo] = $newAllocationArray;
  		}

  		return $allocations;
    }

    public static function storeAllocationsWithTransaction($allocations, $orderId)
    {
    	foreach ($allocations as $designNo => $allocation) {
  			$newAllocation = Allocation::create([
  				'order_id' => $orderId,
  				'design_no' => $designNo,
  				'allocations' => json_encode($allocation)
  			]);
  			foreach ($allocation as $workerId => $allocationValue) {
  				AllocationReceiveTransaction::create([
  					'allocation_id' => $newAllocation->id,
  					'worker_id' => $workerId,
  					'sets_allocated' => $allocationValue['allocation'],
  					'stones_allocated' => [
  						'round_stone' => $allocationValue['round_stone'],
  						'big_stone' => $allocationValue['big_stone'],
  						'tb_stone' => $allocationValue['tb_stone'],
  					],
  					'is_allocation' => true
  				]);
  			}
  		}
    }
}
