<?php namespace DP\Factory;

/**
 * Class Welder (Soudeur)
 *
 * @package DP\Factory1
 */
class Welder implements DoorFittingExpertInterface {

	public function getDescription () {
		echo 'Welder: &lt;&lt; I can only fit iron doors &gt;&gt;<hr>';
	}
}
