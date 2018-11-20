<?php namespace DP\Factory;

class WoodenDoor extends Door implements DoorInterface {

	protected $width;
	protected $height;

	public function getDescription(){
		echo 'I am a wooden door<br/>';
	}

}
