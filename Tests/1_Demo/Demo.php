<?php namespace Test\Demo;


use Exception;

class Demo {

	public $a = 5;

	public function saveUser ($data) {
		$user = new User($data);
		if ( $user->save() ) {
		}
		else {
			throw new Exception();
		}
	}

	public function randomFail () {
		$n = $this->random();
		if ( $n > 1 ) {
			throw new Exception();
		}
		else echo 'Oki ($n = ' . $n . ' !)';
	}
	
	private function random () {
		$r = random_int( 1, 2 );
		$r = 123;
		//$r = 7;
		//var_dump( [ $r . ' a été renvoyé par random()' ] );

		return $r;
	}

	public function randoma () {

		return 123;
	}

}
