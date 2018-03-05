<?php namespace DP\Factory;

interface DoorInterface {

	public function getDescription();

	public function getWidth (): float;

	public function getHeight (): float;
}
