<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Design;
use App\Order;

class OrderController extends Controller
{
	public function show(Order $order)
	{
		$order['designs'] = json_decode($order['designs']);

		return response()->json([
					'data' => $order,
					'code' => 200
				]); 
	}

	public function create()
	{
		return view('order.create')
			->withDesigns(Design::all());
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

		return response()->json([
					'data' => $order,
					'code' => 201
				]);
	}
}
