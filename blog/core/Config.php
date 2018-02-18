<?php namespace Gc7\Core;

class Config {

	private $settings = [ ];

	private static $_instance;


	/**
	 * Config constructor.
	 */
	private function __construct( $file )
	{
		//$this->id = uniqid();
		//var_dump( $file, dirname(  __DIR__ . '/config/' . $file ));
		$this->settings = require $file;
	}

	public static function getInstance( $file )
	{
		if ( null === self::$_instance ) {
			self::$_instance = new Config( $file );
		}

		return self::$_instance;
	}
	
	public function get( $key )
	{
		return $this->settings[ $key ] ?? null;
	}

	public function detailsKey( $key )
	{
		return '$' . $key . ' = ' . $this->get( $key );
	}

}
