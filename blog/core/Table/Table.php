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
			//var_dump( $statement, $attributes );

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

	public function create ( $fields ) {
		//var_dump( $fields );

		$sqlParts   = [ ];
		$attributes = [ ];
		foreach ( $fields as $k => $v ) {
			$sqlParts[]   = $k . ' = ?';
			$attributes[] = $v;
		}
		$sqlParts = implode( ', ', $sqlParts );

		return $this->query( 'INSERT INTO ' . $this->table . ' SET ' . $sqlParts, $attributes, TRUE );
	}

	public function delete ( $id ) {

		return $this->query( 'DELETE FROM ' . $this->table . ' WHERE id = ?', [ $id ] );
	}

	public function update ( $id, $fields ) {
		//var_dump( (int) $id, $fields );

		$sqlParts   = [ ];
		$attributes = [ ];
		foreach ( $fields as $k => $v ) {
			$sqlParts[]   = $k . ' = ?';
			$attributes[] = $v;
		}
		$attributes[] = $id;

		$sqlParts = implode( ', ', $sqlParts );

		//var_dump( $sqlParts, $attributes );

		return $this->query( 'UPDATE ' . $this->table . ' SET ' . $sqlParts . ' WHERE id = ?', $attributes, TRUE );
	}

	public function  extract ( $key, $value ) {
		$records = $this->all();
		$return  = [ ];
		foreach ( $records as $v ) {
			$return [ $v->$key ] = $v->$value;
		}

		return $return;
	}

}
