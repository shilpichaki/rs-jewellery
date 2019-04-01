<?php

namespace App\Enums;


abstract class RawMaterial
{
    private const WAX = 'WAX';
    private const INVESTMENT_POWDER = 'INVESTMENT POWDER';
    private const BRASS_METAL = 'BRASS METAL';
    private const ROUND_STONE = 'ROUND STONE';
    private const TB_STONE = 'TB STONE';
    private const BIG_STONE = 'BIG STONE';
    private const TOOLS = 'TOOLS';
    private const CHEMICAL = 'CHEMICAL';
    private const PACKAGING_MATERIAL = 'PACKAGING MATERIAL';
    private const RUBBER = 'RUBBER';

    private static $rawMaterials = [];
    private static $stoneTypes = [];

    private static function setRawMaterialList()
    {
    	array_push(self::$rawMaterials, self::WAX);
        array_push(self::$rawMaterials, self::INVESTMENT_POWDER);
        array_push(self::$rawMaterials, self::BRASS_METAL);
        array_push(self::$rawMaterials, self::ROUND_STONE);
        array_push(self::$rawMaterials, self::BIG_STONE);
        array_push(self::$rawMaterials, self::TB_STONE);
        array_push(self::$rawMaterials, self::TOOLS);
        array_push(self::$rawMaterials, self::RUBBER);
        array_push(self::$rawMaterials, self::CHEMICAL);
        array_push(self::$rawMaterials, self::PACKAGING_MATERIAL);
    }

    public static function getAllRawMaterials()
    {
    	self::setRawMaterialList();

    	return self::$rawMaterials;
    }

    private static function setStoneTypes()
    {
        array_push(self::$stoneTypes, self::ROUND_STONE);
        array_push(self::$stoneTypes, self::BIG_STONE);
        array_push(self::$stoneTypes, self::TB_STONE);
    }

    public static function getStoneTypes()
    {
    	self::setStoneTypes();

    	return self::$stoneTypes;
    }
}