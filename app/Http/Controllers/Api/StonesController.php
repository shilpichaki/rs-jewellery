<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Design;
use DB;

class StonesController extends Controller
{
    public function alocationStonecount(Request $request)
    {
    	$leftCounts = json_decode($request->leftCount);

		$design = DB::table('designs')->where('design_no', '=', $request->designNumber)->first();

    	$desingStoneCount = $design->total_stone_count = json_decode($design->total_stone_count);

    	$totalRoundStoneCount = 0;
    	$totalBigStoneCount = 0;
    	$totalTbStoneCount = 0;

		for ($i=0; $i < 5; $i++) {
			foreach ($desingStoneCount as $stoneType => $stoneValue) {
				if($stoneType == 'round_stone') {
					$count = ($leftCounts[$i]*4) * $stoneValue[$i];
					$totalRoundStoneCount += $count;
				} else if($stoneType == 'big_stone') {
					$count = ($leftCounts[$i]*4) * $stoneValue[$i];
					$totalBigStoneCount += $count;
				} else if($stoneType == 'tb_stone') {
					$count = ($leftCounts[$i]*4) * $stoneValue[$i];
					$totalTbStoneCount += $count;
				}				 
			}
		}

		return response()->json([
			'data' => [
				'round_stone' => $totalRoundStoneCount,
				'big_stone' => $totalBigStoneCount,
				'tb_stone' => $totalTbStoneCount,
			],
			'code' => 200
		]);
    }
}
