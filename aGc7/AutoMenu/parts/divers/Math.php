<?php namespace Gc7;

/**
 * Class FormatN
 * @package Gc7
 */
class Math {

	//private static $suffix = ' €';
	const DEVISE = ' €';

	public static function withZero( int $n ) :string
	{
		return ( $n < 10 ) ? ( '0' . $n . self::DEVISE ) : $n . self::DEVISE;
	}

}
