<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StonesRow extends Model
{
    public static function calculateOneRowPrice($stoneRow)
    {
    	$totalStoneCount = 0;

    	for ($i=0; $i < 5; $i++) { 
    		$totalStoneCount += $stoneRow['quantity'][$i];
    	}
		
		$totalStoneCount = $totalStoneCount * 4;

    	$totalStoneCount = $totalStoneCount * ($stoneRow['stone_price'] + $stoneRow['labour_charge']);

    	return $totalStoneCount;
    }

    public static function calculateAllRowPrice($stoneRows)
    {
    	$total = 0;

    	foreach ($stoneRows as $stoneRowIndex => $stoneRow) {
    		$oneRowPrice = self::calculateOneRowPrice($stoneRow);
    		$total += $oneRowPrice;
    	}

    	return $total;
    }

    public static function calculatePrice4Pcs($stoneRows, $rhodiumPrice=0, $miscPrice=0, $markupPercentage = 0)
    {
    	$totalStonePrice = self::calculateAllRowPrice($stoneRows);

    	if($rhodiumPrice != 0) {
			$totalStonePrice += $rhodiumPrice;
    	}

    	if($miscPrice != 0) {
			$totalStonePrice += $miscPrice;
    	}

    	if($markupPercentage != 0) {
			$percentage = ($totalStonePrice * ($markupPercentage / 100)) + $totalStonePrice;   		
    	}

    	return $totalStonePrice;
    }

    public static function getAllStoneColors($stones)
    {
        $stoneColors = [];

        foreach ($stones as $key => $stone) {
            array_push($stoneColors, $stone['stone_color']);
        }

        return $stoneColors;
    }

    public static function getLastRowKey($stones)
    {
        $stonesCount = $stones ==  null ? 0 : sizeof($stones);

        $lastKey = 0;
        
        if($stonesCount > 0) {
            foreach ($stones as $key => $value) {
                $lastKey = $key;
            }
        }
        
        $lastKey++;

        return $lastKey;
    }
}
