<?php namespace DP\Factory;


class Door {

	public function __construct ( float $width = null, float $height = null ) {
		$this->width  = $width ?? null;
		$this->height = $height ?? null;
	}

	public function getWidth (): float {
		return $this->width;
	}

	public function getHeight (): float {
		return $this->height;
	}
}
