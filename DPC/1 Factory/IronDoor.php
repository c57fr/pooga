<?php namespace DP\Factory;

class IronDoor extends Door implements DoorInterface {

	protected $width;
	protected $height;

	public function getDescription(){
		echo 'I am a iron door<br/>';
	}

}
