<?php namespace Tuto\lesTraits;


trait Dieselable {
	
	private function polluerDiesel () {
		echo 'VROOM, VROOM, je pollue un max :-(...<br>';
	}

	public function rouler ( $km ) {
		parent::rouler( $km );
		$this->polluerDiesel( $km );
	}

	public function roulerAuDiesel ( $km ) {
		$this->roulerDiesel( $km );
	}
}
