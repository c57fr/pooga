<?php namespace Tuto\lesTraits;


class Zoe extends Voiture {

	use Hybridable {
	}

	public function rouler ( $km ) {
		$this->roulerElectric( $km );
	}

	public function setNrjInitiale ( $energy ) {
		$this->energy = $energy;
	}
}
