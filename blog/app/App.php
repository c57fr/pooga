<?php namespace Gc7\Blog;


class App {

	public         $title = 'POOGA';
	private static $_instance;
	private static $database;
	static         $confs;

	/**
	 * App constructor.
	 */
	private function __construct()
	{
		//$app    = $this->getInstance();
		self::$confs = Config::getInstance();
		//var_dump( self::$confs );
	}
	
	static public function getInstance()
	{
		if ( null === self::$_instance ) {
			self::$_instance = new App;
		}

		return self::$_instance;
	}


	public static function getDb()
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
