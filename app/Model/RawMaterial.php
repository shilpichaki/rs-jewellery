<?php

namespace App\Model\RawMaterial;

use App\UnitOfMeasurement;
use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    public static $rawMaterials = [
        [
            'type' => 'WAX',
            'description' => 'lorem ipsum',
            'unit_of_measurement' => 'gm',
            'price' =>  5
        ],
        [
            'type' => 'Investment Powder',
            'description' => 'lorem ipsum',
            'unit_of_measurement' => 'gm',
            'price' =>  20
        ],
        [
            'type' => 'Brass metal',
            'description' => 'lorem ipsum',
            'unit_of_measurement' => 'gm',
            'price' =>  10
        ],
        [
            'type' => 'Stone',
            'description' => 'lorem ipsum',
            'unit_of_measurement' => 'unit',
            'price' =>  100
        ],
        [
            'type' => 'Tools',
            'description' => 'lorem ipsum',
            'unit_of_measurement' => 'unit',
            'price' =>  60
        ],
        [
            'type' => 'Chemical',
            'description' => 'lorem ipsum',
            'unit_of_measurement' => 'lt',
            'price' =>  15
        ],
        [
            'type' => 'Packaging Material',
            'description' => 'lorem ipsum',
            'unit_of_measurement' => 'gm',
            'price' =>  10
        ],
        [
            'type' => 'Rubber',
            'description' => 'lorem ipsum',
            'unit_of_measurement' => 'gm',
            'price' =>  20
        ],
    ];
}
