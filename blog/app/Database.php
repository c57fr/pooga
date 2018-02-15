<?php namespace Gc7\Blog;

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
	 * @var
	 */
	private $pdo;

	/*
	 * @param array $params  assoc
	 *               ['dbName'=>..., 'dbUser'=>..., 'dbPass'=>..., 'dbHost'=>...]
	 *               Chaque attribut est indépendant: On peut indiquer (que) celui souhaité
	 *
	 */
	public function __construct( Array $params = [ ] )
	{
		$this->dbName = $params[ 'dbName' ] ?? 'pooga';
		$this->dbUser = $params[ 'dbUser' ] ?? 'root';
		$this->dbPass = $params[ 'dbPass' ] ?? '';
		$this->dbHost = $params[ 'dbHost' ] ?? 'localhost';
	}
	
	private function getPDO()
	{
		if ( null === $this->pdo ) {
			$pdo = new PDO(
				'mysql:dbname=' . $this->dbName . '; host=' . $this->dbHost,
				$this->dbUser,
				$this->dbPass
			);
			$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			$this->pdo = $pdo;
		}

		return $this->pdo;
	}

	public function query( $statement, $className )
	{
		//var_dump( 'QUERY' );

		return $this->getPDO()
		            ->query( $statement )
		            ->fetchAll( PDO::FETCH_CLASS, $className );
	}
	
	public function prepare( $statement, $attributes, $className )
	{
		$req = $this->getPDO()->prepare( $statement );
		$req->execute( $attributes );
		$datas = $req->fetchAll( PDO::FETCH_CLASS, $className );

		return $datas;
	}
}
