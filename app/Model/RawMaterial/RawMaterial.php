<?php

namespace App\Model\RawMaterial;

use Illuminate\Database\Eloquent\Model;

class RawMaterial extends Model
{
    protected $fillable = [
        'type',
        'description'
    ];
}
