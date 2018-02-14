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

	/**
	 * @param params array assoc
	 *    ['dbName'=>..., 'dbUser'=>..., 'dbPass'=>..., 'dbHost'=>...]
	 * Chaque attribut est indépendant: On peut indiquer (que) celui souhaité
	 *
	 */
	public function __construct( Array $params = [] )
	{
		$this->dbName = $params[ 'dbName' ] ?? 'pooga';
		$this->dbUser = $params[ 'dbUser' ] ?? 'root';
		$this->dbPass = $params[ 'dbPass' ] ?? '';
		$this->dbHost = $params[ 'dbHost' ] ?? 'localhost';
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
