<?php // namespace DIC;
?><h2>DIC - Avec Reflexion</h2><?php
require __DIR__ . '/Database/Connection.php';
require dirname( __DIR__ ) . '/autoloader.php';

use DIC\Database\Connection;
use DIC\DICE;


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

class A {
	
}


class B {

	/**
	 * Instance de la classe A
	 * @var a
	 */
	private $a;
	/**
	 * @var string
	 */
	private $name;


	/**
	 * Bidon2 constructor.
	 */
	public function __construct ( $name = 'Salut les gens !', A $a ) {
		$this->A    = $a;
		$this->name = $name;
	}
}


$app = new DICE();


$connection = new Connection ( 'pooga', 'root', '' );

$app->setInstance( $connection );


// Instance unique
$app->set( 'Connection', function () {
	return new Connection ( 'pooga', 'root', '' );
} );

// Instances multiples
//$dic->setFactory( 'Model', function () use ( $dic ) {
//	return new Model( $dic->get( 'Connection' ) );
//} );

$app->set( 'B', function () {
	return new B( 'Test', new A() );
} );

var_dump( $app->get( 'Model' ) );
var_dump( $app->get( 'Model' ) );
var_dump( $app->get( 'Model' ) );
var_dump( $app->get( 'Model' ) );


var_dump( $app->get( 'B' ) );
var_dump( $app->get( 'B' ) );
var_dump( $app->get( 'B' ) );
var_dump( $app->get( 'B' ) );
var_dump( $app->get( 'B' ) );

//var_dump( $app->get( 'A' ) );
