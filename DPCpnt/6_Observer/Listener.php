<?php namespace Event;


class Listener {

	/**
	 * @var callable
	 */
	public $callback;
	/**
	 * @var int
	 */
	public $priority;

	/**
	 * Défini si le listener peut ête appelé plusieurs fois
	 *
	 * @var bool
	 */
	private $once = FALSE;

	/**
	 * Permet de stopper les évènements parents
	 *
	 * @var bool
	 */
	public $stopPropagation = FALSE;

	/**
	 * Permet de savoir combien de fois le listener a été appelé
	 *
	 * @var int
	 */
	private $calls = 0;

	/**
	 * Listener constructor.
	 *
	 * @param callable $callback
	 * @param int      $priority
	 */
	public function __construct ( callable $callback, int $priority ) {
		$this->callback = $callback;
		$this->priority = $priority;
	}

	public function handle ( array $args ) {
		if ( $this->once && $this->calls > 0 ) {
			return null;
		}
		$this->calls ++;

		return call_user_func_array( $this->callback, $args );
	}

	/**
	 * Permet d'indiquer que le listener ne peut être appellé qu'une fois
	 *
	 * @return Listener
	 */
	public function once ():Listener {
		$this->once = TRUE;

		return $this;
	}
	
	/**
	 * Permet de stopper l'éxecution des évènements suivants
	 *
	 * @return Listener
	 */
	public function stopPropagation ():Listener {
		$this->stopPropagation = TRUE;

		return $this;
	}
}
