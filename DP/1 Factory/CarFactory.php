<?php namespace DP\SimpleFactory;


class CarFactory {

	public static function create ( $type ) {
		$className = '\\' . __NAMESPACE__ . '\Car' . ucfirst( strtolower( $type ) );

		return new $className();
	}

}
