<?php namespace Gc7;

use Psr\EventManager\EventInterface;

/**
 * Class Event
 */
class Event implements EventInterface {

	/**
	 * @var string
	 */
	private $name = '';

	/**
	 * @var mixed
	 */
	private $targets;

	/**
	 * @var []
	 */
	private $params = [ ];


	/**
	 * @var bool
	 */
	private $propagationStopped = FALSE;


	/**
	 * Get event name
	 *
	 * @return string
	 */
	public function getName ():string {
		return $this->name;
	}

	/**
	 * Get target/context from which event was triggered
	 *
	 * @return null|string|object
	 */
	public function getTarget () {
		return $this->target;
	}

	/**
	 * Get parameters passed to the event
	 *
	 * @return array
	 */
	public function getParams () {
		return $this->params;
	}

	/**
	 * Get a single parameter by name
	 *
	 * @param  string $name
	 *
	 * @return mixed
	 */
	public function getParam ( $name ) {
		return $this->params[ $name ] ?? null;
	}

	/**
	 * Set the event name
	 *
	 * @param  string $name
	 *
	 * @return void
	 */
	public function setName ( $name ):void {
		$this->name = $name;
	}

	/**
	 * Set the event target
	 *
	 * @param  null|string|object $target
	 *
	 * @return void
	 */
	public function setTarget ( $target ) {
		$this->target = $target;
	}

	/**
	 * Set event parameters
	 *
	 * @param  array $params
	 *
	 * @return void
	 */
	public function setParams ( array $params ) {
		$this->params = $params;
	}

	/**
	 * Indicate whether or not to stop propagating this event
	 *
	 * @param  bool $flag
	 */
	public function stopPropagation ( $flag ) {
		$this->propagationStopped = $flag;
	}

	/**
	 * Has this event indicated event propagation should stop?
	 *
	 * @return bool
	 */
	public function isPropagationStopped (): bool {
		return $this->propagationStopped;
	}
}
