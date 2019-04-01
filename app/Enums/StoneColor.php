<?php 
namespace app\Enums;

abstract class StoneColor
{
	private const RED = 'RED';
	private const GREEN = 'GREEN';
	private const BLUE = 'BLUE';
	private const SAFFRON = 'SAFFRON';
	private const BLACK = 'BLACK';
	private const CYAN = 'CYAN';

	private static $allColors = [];

	private static function setAllColors()
	{
    	array_push(self::$allColors, self::RED);
    	array_push(self::$allColors, self::GREEN);
    	array_push(self::$allColors, self::BLUE);
    	array_push(self::$allColors, self::SAFFRON);
    	array_push(self::$allColors, self::BLACK);
    	array_push(self::$allColors, self::CYAN);
	}

	public static function getAllColors()
	{
		self::setAllColors();

		return self::$allColors;
	}
}
 ?>