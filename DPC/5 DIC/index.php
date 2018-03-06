<?php namespace DIC; ?>
	<h1><a href="https://www.grafikart.fr/formations/programmation-objet-php/conteneur-injection-dependance"
	       target="_blank">DIC<span class="petit"> - <b>D</b>ependency <b>I</b>njection <b>C</b>ontainer</span></a>
	</h1>
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

		$this->uniqId = uniqid();
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
		$this->uniqId     = uniqid();
	}


}

$dic = new DIC();

$dic->set( 'Connection', function () {
	return new Connection ( 'pooga', 'root', '' );
} );


$dic->setFactory( 'Model', function () use ( $dic ) {
	return new Model( $dic->get( 'Connection' ) );
} );

var_dump( $dic->get( 'Model' ) );
var_dump( $dic->get( 'Model' ) );
var_dump( $dic->get( 'Model' ) );
