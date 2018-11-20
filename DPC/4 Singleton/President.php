<?php namespace DPC\Singleton;


class President {

	private static $_instance;

	public function __construct () {
		echo 'President créé<br>';
	}


	public static function getInstance ():President {
		if ( ! self::$_instance ) {

			self::$_instance = new self();
		}
		echo 'Instance President appelée<br>';

		return self::$_instance;
	}
}
