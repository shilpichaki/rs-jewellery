<?php

namespace App\Enums;

abstract class UnitOfMeasurement
{
    private const  gm = 'gm';
    private const  kg = 'kg';
    private const  lt = 'lt';
    private const  ml = 'ml';
    private const  pcs = 'pcs';

    private static $unitOfMeasurements = [];

    private static function setUomList()
    {
    	array_push(self::$unitOfMeasurements, self::gm);
        array_push(self::$unitOfMeasurements, self::kg);
        array_push(self::$unitOfMeasurements, self::lt);
        array_push(self::$unitOfMeasurements, self::ml);
        array_push(self::$unitOfMeasurements, self::pcs);
    }

    public static function getUomList()
    {
    	self::setUomList();

    	return self::$unitOfMeasurements;
    }
}