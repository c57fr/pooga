<?php namespace Basic;


class Nombre implements NombreInterface {

	private $nombre;

	/**
	 * @param mixed $nombre
	 */
	public function setNombre ( $nombre ) {
		$this->nombre = $nombre;
	}


	/**
	 * Must return numeric value as integer
	 * @return int
	 */
	public function getValue () :int {
	return $this->nombre;
	}
}
