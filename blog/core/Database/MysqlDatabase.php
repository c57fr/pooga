<?php namespace Gc7\Core\Database;
use PDO;


class MysqlDatabase extends Database {

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
	 * Ici, fait un peu doubmlon avec les modifs de GA en chapitre 13 (https://www.grafikart.fr/formations/programmation-objet-php/tp-tables)
	 *
	 */
	public function __construct( Array $params = [ ] )
	{
		$this->dbName = $params[ 'dbName' ] ?? 'pooga';
		$this->dbUser = $params[ 'dbUser' ] ?? 'root';
		$this->dbPass = $params[ 'dbPass' ] ?? '';
		$this->dbHost = $params[ 'dbHost' ] ?? 'localhost';
		//var_dump('Initialise DB');
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

	public function query( $statement, $className = null, $one = FALSE )
	{
		//var_dump( $statement, $className );

		$req = $this->getPDO()->query( $statement );
		if ( null === $className ) {
			$req->setFetchMode( PDO::FETCH_OBJ);
		}else{
			$req->setFetchMode( PDO::FETCH_CLASS, $className);
		}
		if ( $one ) {
			return $req->fetch();
		}
		else {
			return $req->fetchAll();
		}
	}

	public function prepare( $statement, $attributes, $className, $one = FALSE )
	{
		$req = $this->getPDO()->prepare( $statement );
		$req->execute( $attributes );
		$req->setFetchMode( PDO::FETCH_CLASS, $className );
		if ( $one ) {
			return $req->fetch();
		}
		else {
			return $req->fetchAll();
		}
	}
}
