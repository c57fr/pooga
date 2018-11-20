<?php namespace DIC;


class DIC {

	private $regitry   = [ ];
	private $instances = [ ];
	private $factories = [ ];

	public function __construct () {
	}

	public function set ( $key, Callable $resolver ) {
		$this->regitry[ $key ] = $resolver;
	}

	public function setFactory ( $key, Callable $resolver ) {
		$this->factories[ $key ] = $resolver;
	}

	public function get ( $key ) {

		if ( isset( $this->factories[ $key ] ) ) {
			return $this->factories[ $key ]();
		}

		if ( ! isset( $this->instances[ $key ] ) ) {
			$this->instances[ $key ] = $this->regitry[ $key ]();
		}

		return $this->instances[ $key ];
	}
}
