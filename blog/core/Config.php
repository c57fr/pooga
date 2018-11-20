<?php namespace Core;


class Config {

	private        $settings = [ ];
	private static $_instance;


	private function __construct ( $file ) {
		$this->settings = require $file;

	}

	public static function getInstance ( $file ) {
		if ( null === self::$_instance ) {
			self::$_instance = new Config( $file );
		}

		return self::$_instance;
	}

	public function get ( $key ) {

		return $this->settings[ $key ] ?? null;
	}

}
