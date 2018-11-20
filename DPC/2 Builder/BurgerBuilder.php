<?php namespace DP\Builder;


class BurgerBuilder {

	public $size;

	public $cheese    = FALSE;
	public $pepperoni = FALSE;
	public $lettuce   = FALSE;
	public $tomato    = FALSE;

	public function __construct ( int $size ) {
		$this->size = $size;
	}

	public function addPepperoni () {
		$this->pepperoni = TRUE;

		return $this;
	}

	public function addLettuce () {
		$this->lettuce = TRUE;

		return $this;
	}

	public function addCheese () {
		$this->cheese = TRUE;

		return $this;
	}

	public function addTomato () {
		$this->tomato = TRUE;

		return $this;
	}

	public function build (): Burger {
		return new Burger( $this );
	}
}
