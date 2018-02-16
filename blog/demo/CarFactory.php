<?php namespace Gc7\Blog\Demo;

class CarFactory {

	public static function create( $type )
	{
		$classe = __NAMESPACE__ . '\Car' . ucfirst( strtolower( $type ) );

		return new $classe();
	}

}

var_dump( CarFactory::create( 'BerLiNe' ) );
