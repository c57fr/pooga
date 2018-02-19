<?php

use Core\Database\MysqlDatabase;

class App {
	private static $_instance;
	private        $db_instance;

	public $title = 'Blog POOGA';

	private function __Construct()
	{

	}


	public static function load()
	{
		session_start();
		require './vendor/autoload.php';

	}

	public static function getInstance()
	{
		if ( empty( self::$_instance ) ) {
			self::$_instance = new App();
		}

		return self::$_instance;
	}

	public function getTable( $name )
	{
		$class_name = '\\App\\Table\\' . ucfirst( strtolower( $name ) ) . 'Table';

		return new $class_name( $name, $this->getDB() );
	}

	public function getDB()
	{
		$config = \Core\Config::getInstance( "./blog/app/config/config.php" );
		if ( empty( $this->db_instance ) ) {
			$this->db_instance = new MysqlDatabase( $config->get( 'db_name' ), $config->get( 'db_user' ), $config->get( 'db_host' ), $config->get( 'db_pass' ) );
		}

		return $this->db_instance;
	}


}
