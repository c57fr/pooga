<?php namespace DIC; ?>
	<h2>DIC - Connection & Model</h2>
	<?php
require dirname( __DIR__ ) . '/autoloader.php';


class Connection {

	private $dbName;
	private $dbUser;
	private $dbPass;

	private $uniqId;

	/**
	 * Connection constructor.
	 */
	public function __construct ( $dbName, $dbUser, $dbPass ) {
		$this->dbName = $dbName;
		$this->dbUser = $dbUser;
		$this->dbPass = $dbPass;

		$this->uniqId = uniqid( 'Cnx_', TRUE );
	}
}

class Model {

	private $connection;
	private $uniqId;

	/**
	 * Model constructor.
	 *
	 * @param $connection
	 */
	public function __construct ( Connection $connection ) {
		$this->connection = $connection;
		$this->uniqId     = uniqid( 'Model_', TRUE );
	}
}

$dic = new DIC();

// Instance unique
$dic->set( 'Connection', function () {
	return new Connection ( 'pooga', 'root', '' );
} );

// Instances multiples
$dic->setFactory( 'Model', function () use ( $dic ) {
	return new Model( $dic->get( 'Connection' ) );
} );

var_dump( $dic->get( 'Model' ) );
var_dump( $dic->get( 'Model' ) );
