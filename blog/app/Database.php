<?php namespace Blog\App;

use PDO;


class Database {

	/**
	 * @var string
	 */
	private $dbName;

	/**
	 * @var string
	 */
	private $dbUser;

	/**
	 * @var string
	 */
	private $dbPass;

	/**
	 * @var string
	 */
	private $dbHost;


	public function __construct( array $params = [
		'dbName' => 'pooga',
		'dbUser' => 'root',
		'dbPass' => '',
		'dbHost' => 'localhost'
	] )
	{
		$this->dbName = $params[ 'dbName' ];
		$this->dbUser = $params[ 'dbUser' ];
		$this->dbPass = $params[ 'dbPass' ];
		$this->dbHost = $params[ 'dbHost' ];
	}
	
	private function getPDO()
	{
		$pdo = new PDO(
			'mysql:dbname=' . $this->dbName . '; host=' . $this->dbHost,
			$this->dbUser,
			$this->dbPass
		);
		$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

		return $pdo;
	}

	public function query( $statement )
	{
		return $this->getPDO()
		            ->query( $statement )
		            ->fetchAll( \PDO::FETCH_OBJ );
	}
}
