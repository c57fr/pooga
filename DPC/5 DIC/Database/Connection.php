<?php namespace DIC\Database;

class Connection {

private $dbName;
private $dbUser;
private $dbPass;

private $uniqId;

/**
* Connection constructor.
*/
public function __construct ( $dbName, $dbUser, $dbPass, $tab=[] ) {
$this->dbName = $dbName;
$this->dbUser = $dbUser;
$this->dbPass = $dbPass;

$this->uniqId = uniqid( 'Cnx_', TRUE );
}
}
