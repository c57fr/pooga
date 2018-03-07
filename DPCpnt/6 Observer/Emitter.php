<?php namespace Event;


class Emitter {

	public static  $_uniq;
	private static $_instance;
	/**
	 * Enregistre la liste des écouteurs
	 * @var []
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
			self::$_uniq     = uniqid( 'Emitter_', TRUE );
		}

		return self::$_instance;
	}

	/**
	 * @return mixed
	 */
	public static function getUniq () {
		return self::$_uniq;
	}
	

	/**
	 * Permet d'écouter un évènement
	 *
	 * @param string   $event    Nom de l'évènement
	 * @param callable $callable Fonction de rappel
	 */
	public function on ( string $event, Callable $callable ) {

		if ( ! $this->hasListener( $event ) ) {
			$this->listeners[ $event ] = [ ];
		}
		$this->listeners[ $event ][] = $callable;
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
				call_user_func_array( $listener, $args );
			}

		}
		var_dump( $args );
	}

	private function hasListener ( string $event ): bool {
		return array_key_exists( $event, $this->listeners );
	}

}
