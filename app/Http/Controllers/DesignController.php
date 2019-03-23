<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function addDesign()
    {
    	return view('design.add-design');
    }

    public function store()
    {
    	// $file = request()->file('picture');

    	// $ext = $file->extension();

    	// $path = $file->storeAs('pictures/' . Auth::user()->id, "avatar.{$ext}");

    	// echo $path;
    }
}
