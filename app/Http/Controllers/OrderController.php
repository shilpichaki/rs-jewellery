<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Design;

class OrderController extends Controller
{
	public function create()
	{
		return view('order.create')
			->withDesigns(Design::all());
	}

	public function store(Request $request)
	{
		dd($request);
		// echo '<pre>';
		// print_r($request->design);
		// echo '</pre>';
	}
}
