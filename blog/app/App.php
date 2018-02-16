<?php namespace Gc7\Blog;


class App {

	const DB_NAME = 'pooga';
	const DB_USER = 'root';
	const DB_PASS = '';
	const DB_HOST = 'localhost';

	private static $database;
	private static $title = 'POOGA';


	public static function getDb()
	{
		if ( null === self::$database ) {
			self::$database = new Database( [
				                                'dbName' => self::DB_NAME,
				                                'dbUser' => self::DB_USER,
				                                'dbPass' => self::DB_PASS,
				                                'dbHost' => self::DB_HOST
			                                ] );
		}

		return self::$database;
	}
	
	public static function notFound()
	{
		header( "HTTP/1.0 404 Not Found" );
		header( "Location:index.php?p=404" );
	}
	
	static public function getTitle()
	{
		return self::$title;
	}

	/**
	 * @param mixed $title
	 */
	public static function setTitle( $title )
	{
		self::$title = $title . ' | ' . self::$title;
	}

}
