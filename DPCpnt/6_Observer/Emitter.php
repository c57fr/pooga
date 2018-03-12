<?php namespace Event;


class Emitter {

	private static $_instance;
	/**
	 * Enregistre la liste des écouteurs
	 * @var Listener [][]
	 */
	private $listeners = [ ];

	/**
	 * Permet de récupérer l'instance de l'émetteur (Singleton)
	 *
	 * @return Emitter
	 */
	public static function getInstance ():Emitter {
		if ( ! self::$_instance ) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	/**
	 * Envoie un évènement
	 *
	 * @param string $event Nom de l'évènement
	 * @param        ...$args
	 */
	public function emit ( string $event, ...$args ) {

		if ( $this->hasListener( $event ) ) {
			foreach ( $this->listeners[ $event ] as $listener ) {
				//call_user_func_array( $listener, $args ); // remplacé par:
				$listener->handle( $args );
				if ( $listener->stopPropagation ) {
					break;
				}
			}
		}
	}

	/**
	 * Permet d'écouter un évènement
	 *
	 * @param string|string $event    Nom de l'évènement
	 * @param callable      $callable Fonction de rappel
	 * @param int           $priority
	 *
	 * @return Listener
	 */
	public function on ( string $event, Callable $callable, int $priority = 0 ):Listener {
		if ( ! $this->hasListener( $event ) ) {
			$this->listeners[ $event ] = [ ];
		}

		$this->checkDoubleCallableForEvent($event, $callable);

		$listener                    = new Listener( $callable, $priority );
		$this->listeners[ $event ][] = $listener;
		$this->sortListeners( $event );

		return $listener;
	}

	/**
	 * Permet d'écouter un même évènement une seule fois
	 *
	 * @param string|string $event    Nom de l'évènement
	 * @param callable      $callable Fonction de rappel
	 * @param int           $priority
	 *
	 * @return Listener
	 */
	public function once ( string $event, Callable $callable, int $priority = 0 ):Listener {
		return $this->on( $event, $callable, $priority )->once();
	}

	private function hasListener ( string $event ): bool {
		return array_key_exists( $event, $this->listeners );
	}

	private function sortListeners ( $event ) {
		uasort( $this->listeners[ $event ], function ( $a, $b ) {
			return $a->priority < $b->priority;
		} );
	}
	
	
	private function checkDoubleCallableForEvent ( string $event, callable $callable ):bool {
		foreach ( $this->listeners[ $event ] as $listener ) {
			if ( $listener->callback === $callable ) {
				throw new DoubleEventException();
			}
		}

		return FALSE;
	}
}
