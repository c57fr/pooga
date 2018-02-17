<?php

use Gc7\Core\Config;
use Gc7\Core\Database\MysqlDatabase;

class App {

	public         $title = 'POOGA';
	public static $_instance;
	private        $_dbInstance;

	/**
	 * App constructor.
	 */
	private function __construct()
	{
		//$app    = $this->getInstance();
		//self::$confs = Config::getInstance();
		//var_dump( self::$confs );
	}
	
	static public function getInstance()
	{
		if ( null === self::$_instance ) {
			self::$_instance = new App;
		}

		return self::$_instance;
	}

	/**
	 * session_start + autoload core
	 */
	public static function load()
	{
		//session_start();
		// Juste pour démo les classes de core
		// ne sont pas autoloadées par l'autoloader de composer
		//require ROOT.'core/Autoloader.php';
		//Gc7\Core\Autoloader::register();
	}

	public function getTable( $name )
	{
		$className = '\\Gc7\\Blog\\Table\\' . ucfirst( $name );
		var_dump( $className );

		return new $className( $this->getDb() );
	}

	public function getDb()
	{
		$config = Config::getInstance(ROOT.'config/config.php');
		if ( null === $this->_dbInstance ) {

			return $this->_dbInstance = new MysqlDatabase( [
				                                          $config->get( 'dbName' ),
				                                          $config->get( 'dbUser' ),
				                                          $config->get( 'dbPass' ),
				                                          $config->get( 'dbHost' )
			                                          ] );

		}

		return $this->_dbInstance;
		var_dump( $config );
	}

	public static function getDbUuu()
	{
		if ( null === self::$database ) {
			self::$database = new Database();
		}

		return self::$database;
	}

	//
	//publicstatic function notFound()
	//{
	//	header( "HTTP/1.0 404 Not Found" );
	//	header( "Location:index.php?p=404" );
	//}
	//
	//static public function getTitle()
	//{
	//	return self::$title;
	//}
	//

	/**
	 * @param mixed $title
	 */
	public function setTitle( $title )
	{
		$this->title = $title . ' | ' . $this->title;
	}

}
