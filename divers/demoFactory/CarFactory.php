<?php namespace Gc7\Divers\DemoFactory;


class CarFactory {

	public static function create ( $type ) {
		$className = '\\' . __NAMESPACE__ . '\Car' . ucfirst( strtolower( $type ) );

		return new $className();
	}

}
