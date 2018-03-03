<?php

use Core\Config;
use Core\Database\MysqlDatabase;

class App extends \AutoMenu\Gc7 {

	public $title = 'Blog POOGA';

	private static $_instance;
	private        $db_instance;

	protected function __Construct () {
	}


	public static function load () {
		//session_start();
		require './vendor/autoload.php';

	}

	public static function getInstance () {
		if ( null === self::$_instance ) {
			self::$_instance = new App();
		}

		return self::$_instance;
	}

	/**
	 * @return string
	 */
	public function getTitle () {
		return $this->title;
	}
	

	/**
	 * @param string $title
	 */
	public function setTitle ( $title ) {
		$this->title = $title . ' | ' . $this->title;
	}

	/**
	 * Factory
	 *
	 * @param $name
	 *
	 * @return mixed
	 */
	public function getTable ( $name ) {
		$class_name = '\\App\\Table\\' . ucfirst( strtolower( $name ) ) . 'Table';

		return new $class_name( $name, $this->getDB() );
	}

	/**
	 * Factory
	 *
	 * @return MysqlDatabase
	 */
	public function getDB () {
		$config = Config::getInstance( "./blog/config/config.php" );
		if ( null === $this->db_instance ) {
			$this->db_instance = new MysqlDatabase( $config->get( 'db_name' ), $config->get( 'db_user' ), $config->get( 'db_host' ), $config->get( 'db_pass' ) );
		}

		return $this->db_instance;
	}


	public function notFound () {
		header( "HTTP/1.0 404 Not Found" );
		die( 'Page introuvable !' );
		//header( 'Location:index.php?p=404' );
	}

	public function forbiden () {
		header( "HTTP/1.0 403 Forbiden" );
		die( 'Accès interdit !' );
	}

}
