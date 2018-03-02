<?php namespace Core\Table;


use Core\Database\MysqlDatabase;

class Table {

	protected $table;
	protected $db;

	public function __construct ( $name, MysqlDatabase $db ) {
		$this->db = $db;
		if ( empty( $this->table ) ) {
			$this->table = $name;
		}
	}

	public function all () {
		return $this->query( 'SELECT * FROM ' . $this->table );
	}

	public function query ( $statement, $attributes = null, $one = FALSE ) {
		$entityClassName = str_replace( 'Table', 'Entity', get_class( $this ) );
		if ( $attributes ) {
			return $this->db->prepare(
				$statement,
				$attributes,
				$entityClassName,
				$one
			);
		}
		else {
			return $this->db->query(
				$statement,
				$entityClassName,
				$one
			);
		}
	}

	public function find ( $id ) {
		return $this->query( 'SELECT * FROM ' . $this->table . ' WHERE id = ?', [ $id ], TRUE );
	}
}
