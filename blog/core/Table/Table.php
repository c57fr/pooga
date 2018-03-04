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

		return $this->query( 'UPDATE ' . $this->table . ' SET ' . $sqlParts . ' where id = ?', $attributes, TRUE );
	}
	
	public function  extract ( $key, $value ) {
		$records = $this->all();
		$return =[];
		foreach($records as $v){
			$return [$v->$key] = $v->$value;
		}
		return $return;
}

}
