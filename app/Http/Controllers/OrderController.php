<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Design;
use App\Order;
use App\Allocation;
use App\Worker;
use App\AllocationReceiveTransaction;

class OrderController extends Controller
{
    public function index()
    {
        return view('order.index')->withOrders(Order::all());
    }

	public function show(Order $order)
	{
		$designs = Design::all()->groupBy('design_no');

		$order->designs = json_decode($order['designs']);
		
		$totalOrderDesigns = count((array)$order->designs);

		return view('order.show')
			->withOrder($order)
			->withMasterDesigns($designs)
			->withTotalDesign($totalOrderDesigns);

		// $order = (array) $order;

		return response()->json([
					'data' => $order->designs,
					'code' => 200
				]); 
	}

	public function create()
	{
		return view('order.create')
			->withDesigns(Design::all());
	}

	public function receive()
	{
		return view('order.receive');
	}
	
  	public function store(Request $request)
  	{
		// dd($request);
		// echo '<pre>';
		// print_r($request->design);
		// echo '</pre>';

		$order = Order::create([
			'order_no' => $request->order_no,
			'party_name' => $request->party_name,
			'issue_date' => $request->issue_date,
			'delivery_date' => $request->delivery_date,
			'designs' => json_encode($request->designs),
		]);

		$order['designs'] = json_decode($order['designs']);

		return redirect()->route('order.show', ['order' => $order->order_no]);

		return response()->json([
					'data' => $order,
					'code' => 201
				]);
	}

	public function edit(Order $order)
	{
		$designs = Design::all()->groupBy('design_no');

		$order->designs = json_decode($order['designs']);
		
		$totalOrderDesigns = count((array)$order->designs);

		// return $order;

		return view('order.edit')
				->withOrder($order)
				->withMasterDesigns($designs)
				->withTotalDesign($totalOrderDesigns);
	}

	public function update(Order $order, Request $request)
	{
		$order->designs = json_encode($request->designs);
		$order->issue_date = $request->issue_date;
		$order->delivery_date = $request->delivery_date;
		$order->party_name = $request->party_name;

		$order->update();

		return redirect()->route('order.show', ['design' => $order->order_no]);
	}

	public function allocation(Order $order)
	{
		$order['designs'] = json_decode($order['designs']);

		$arr = [];
		foreach ($order->designs as $key => $value) {
			$arr1 = [];
			foreach ($value->oc as $k => $v) {
				array_push($arr1, $v->oqs);
			}
			$arr[$key] = ['max_set_count' => $arr1];
		}

		if(count($order->Allocations) != 0) {
			return view('order.editAllocation')
				->withOrder($order)
				->withAllocations($order->Allocations->groupBy('design_no'))
				->withWorkers(Worker::all())
				->withMaxSetCount($arr);
		} else {
			return view('order.newAllocation')
				->withOrder($order);	
		}		
	}
	
  	public function storeAllocation(Request $request)
  	{
  		// dd($request->allocation);
  		$allocations = Allocation::sortAllocationsByWorkerName($request->allocation);
  		
  		Allocation::storeAllocationsWithTransaction($allocations, $request->order_id);  		

		dd($allocations);
	}
}
