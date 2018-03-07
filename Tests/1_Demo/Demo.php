<?php namespace Tests\Demo;


class Demo {

	public $a=5;

	public function saveUser ( $data ) {
		$u = new User( $data );
		if ( $this->saveUser() ) {

		}
		else {
			throw new \Exception();

		}
	}

	
	public function randomFail () {
		$n = $this->random();
		if ( $n > 5 ) {
			throw new \Exception('> 5 :-( !');
		}
	}
	
	private function random () {
		//$r = random_int( 1, 10 );
		$r = 3;
		var_dump($r);
		return $r;
	}
	
}
