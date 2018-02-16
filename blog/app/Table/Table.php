<?php namespace Gc7\Blog\Table;

use Gc7\Blog\Database;


class Table {

	protected $table;
	protected $db;

	public function __construct( Database $db )
	{
		$this->db = $db;
		if ( null === $this->table ) {
			$table       = explode( '\\', get_class( $this ) );
			$this->table = 'blog_' . strtolower( end( $table ) );
		}
	}
	
	public function all()
	{
		return $this->db->query( 'SELECT * FROM blog_posts' );

	}

}
