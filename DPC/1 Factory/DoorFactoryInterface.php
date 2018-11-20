<?php namespace DP\Factory;


interface DoorFactoryInterface {

	public function makeDoor (): Door;

	public function makeFittingExpert (): DoorFittingExpertInterface;
}
