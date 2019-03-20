<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UnitOfMeasurement extends Model
{
    public static $units = [
        'gm',
        'kg',
        'lt',
        'unit'
    ];
}
