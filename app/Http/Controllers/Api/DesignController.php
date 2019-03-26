<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Design;

class DesignController extends Controller
{
    public function show(Design $design)
    {
    	if($design != null) {
    		return response()->json([
    			'data' => $design,
    			'code' => 200
    		]);
    	} else {
            return response()->json([
                'data' => $design,
                'code' => 404
            ]); 
        }
    }
}
