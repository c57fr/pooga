<?php namespace DP\Factory;


class IronDoorFactory implements DoorFactoryInterface {

	public function makeDoor (): Door {
		return new IronDoor();
	}

	public function makeFittingExpert (): DoorFittingExpertInterface {
		return new Welder();
	}
}
