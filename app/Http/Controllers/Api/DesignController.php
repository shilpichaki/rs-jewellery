<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Design;
use App\StonesRow;

class DesignController extends Controller
{
    public function show(Design $design)
    {
    	if($design != null) {
            $design['stones'] = json_decode($design['stones']);
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

    public function calculatePrice(Request $request)
    {
        $price4pcs = StonesRow::calculatePrice4Pcs(
            $request->stones, $request->rhodium, $request->misc_price, $request->markup_percentage
        );

        return response()->json([
            'data' => ['price' => $price4pcs],
            'code' => 200
        ]);
    }
}
