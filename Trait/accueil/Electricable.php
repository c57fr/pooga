<?php namespace Tuto\LesTraits;


trait Electricable {

	protected $energy = 100;

	public function recharger () {
		$this->energy = 100;
	}

	private function polluer ( $km ) {
		echo 'Peu de pollution... (Pendant ' . $km . ' kilomètres)<br>';
	}

	public function rouler ( $km ) {
		parent::rouler( $km );
		self::polluer( $km );
		$this->energy -= $km / 5;
	}

	abstract public function setNrjInitiale ( $energy );

}
