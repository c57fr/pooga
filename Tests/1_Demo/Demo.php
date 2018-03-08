<?php namespace Test\Demo;


//use Exception;

class Demo {

	public $a = 5;

	public function saveUser ( $data ) {
		$u = new User( $data );
		if ( $this->saveUser() ) {

		}
		else {
			throw new Exception();

		}
	}

	public function randomFail () {
		$n = $this->random();
		if ( $n > 1 ) {
			//throw new Exception();
			echo 'ok';
		}
		else echo 'Oki ($n = ' . $n . ' !)';
	}
	
	private function random () {
		//$r = random_int( 1, 2 );
		$r = 2;
		//$r = 7;
		//var_dump( [ $r . ' a été renvoyé par random()' ] );

		return $r;
	}

	public function randoma () {
		//$r = random_int( 1, 2 );
		$r = '33';
		//$r = 7;
		//var_dump( [ $r . ' a été renvoyé par random()' ] );

		return $r;
	}

}
