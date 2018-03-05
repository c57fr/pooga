<?php namespace DP\Factory;


class DoorFactory {

	public static function makeDoor ( $width, $height ): Door {
		return new WoodenDoor( $width, $height );
	}
}
