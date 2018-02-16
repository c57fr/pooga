<?php namespace Gc7\Blog;

class Config {

	private $settings = [ ];

	private static $_instance;


	/**
	 * Config constructor.
	 */
	private function __construct()
	{
		//$this->id = uniqid();
		$this->settings = require dirname( __DIR__ ) . '/config/config.php';
	}

	public static function getInstance()
	{
		if ( null === self::$_instance ) {
			self::$_instance = new Config();
		}

		return self::$_instance;
	}
	
	public function get( $key )
	{
		return $this->settings[ $key ] ?? null;
	}

	public function detailsKey($key)
	{
		return '$' . $key . ' = ' . $this->get($key);
	}

}
