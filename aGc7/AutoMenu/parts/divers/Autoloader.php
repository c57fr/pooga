<?php
Autoloader::register();

class Autoloader {

	public static function register()
	{
		spl_autoload_register( [ __CLASS__, 'autoload' ] );
	}

	public static function autoload( $class )
	{
		var_dump($class);
		//if (strpos($class, __NAMESPACE__, '\\')===0){
		//$class = str_replace( 'Gc7\\Divers', '', $class );
		//var_dump( $class );
		var_dump($class);
		require $class . '.php';
		//}
	}

}

define( 'GC7', 1 );
