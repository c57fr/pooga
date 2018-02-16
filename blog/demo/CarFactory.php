<?php namespace Gc7\Blog\Demo;

class CarFactory {

	public static function create( $type )
	{
		$className = __NAMESPACE__ . '\Car' . ucfirst( strtolower( $type ) );

		return new $className();
	}

}

var_dump( CarFactory::create( 'BerLiNe' ) );
