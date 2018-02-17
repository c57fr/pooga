<?php namespace Gc7\Core\Table;

use Gc7\Core\Database\Database;
use Gc7\Core\Database\MysqlDatabase;


class Table {

	//protected $table;
	protected $db;

	public function __construct( MysqlDatabase $db )
	{
		$this->db = $db;
		if ( null === $this->table ) {
			$table       = explode( '\\', get_class( $this ) );
			$this->table = 'blog_' . strtolower( end( $table ) );
			var_dump( $this->table );
		}
	}
	
	public function all()
	{
		return $this->db->query( 'SELECT * FROM blog_posts' );

	}

}
