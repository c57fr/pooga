<?php namespace DP\Factory;


class Carpenter implements DoorFittingExpertInterface {
	
	public function getDescription () {
		echo 'Carpenter: &lt;&lt; I can only fit wooden doors &gt;&gt;<hr>';
	}
}
