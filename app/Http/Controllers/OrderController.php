<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Design;
use App\Order;

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

	public function allocation()
	{
		return view('order.allocation');
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

		// return redirect()->route('order.show', ['order' => $order->order_no]);

		return response()->json([
					'data' => $order,
					'code' => 201
				]);
	}
}
