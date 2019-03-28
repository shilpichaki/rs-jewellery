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

	public function allocation()
    {
        return view('order.allocation');
    }

    public function receive()
    {
        return view('order.receive');
    }
}
