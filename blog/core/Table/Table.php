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

		$sql_parts  = [ ];
		$attributes = [ ];
		foreach ( $fields as $k => $v ) {
			$sql_parts[]  = $k . '= ?';
			$attributes[] = $v;
		}
		$attributes[] = (int) $id;

		//$values = '(' . implode( ', ', $attributes ) . ')';
		$sql_parts = implode( ', ', $sql_parts );

		//var_dump( $sql_parts, $attributes );


		return $this->query( 'UPDATE ' . $this->table . ' SET ' . $sql_parts . ' where id = ?', $attributes, TRUE );


		//, $fields[0],$fields[1],$id;
		//
		//echo( $sql );

	}

}
