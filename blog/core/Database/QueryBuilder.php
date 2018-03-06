<?php namespace Core\Database;


class QueryBuilder {

	private $fields;
	private $from;
	private $conditions;

	public function select () {
		$this->select = func_get_args();

		return $this;
	}

	public function from ( $table, $alias = null ) {

		$alias        = ( ' AS ' . $alias ) ?? '';
		$this->from[] = $table . $alias;

		return $this;
	}

	public function where () {
		foreach ( func_get_args() as $arg ) {
			$this->conditions[] = $arg;

		}
		return $this;
	}
	
	public function __toString () {

		return 'SELECT ' . implode( ', ', $this->select )
		       . ' FROM ' . implode( ', ', $this->from )
		       . ' WHERE ' . implode( ' AND ', $this->conditions );
	}

}
