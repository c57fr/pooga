<?php namespace Core\Auth;

use Core\Database\MysqlDatabase;

class DBAuth {

	private $db;

	/**
	 * DBAuth constructor.
	 */
	public function   __construct ( MysqlDatabase $db ) {
		$this->db = $db;
	}

	/**
	 * @param $username
	 * @param $password
	 *
	 * @return boolean
	 */
	public function login ( $username, $password ) {
		$user = $this->db->prepare( 'SELECT * FROM users WHERE username = ?', [ $username ], null, TRUE );
		if ( $user ) {
			var_dump( $user->password, sha1( $password ) );

			return $user->password === sha1( $password );
		}

		return FALSE;
	}
	
	public function logged () {
		return isset( $_SESSION[ 'auth' ] );
	}

}
