<?php namespace DP\Factory;

class WoodenDoorFactory implements DoorFactoryInterface {

	public function makeDoor(): Door
	{
		return new WoodenDoor();
	}

	public function makeFittingExpert(): DoorFittingExpertInterface
	{
		return new Carpenter();
	}
}
