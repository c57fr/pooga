<?php namespace DIC;


use AutoMenu\Gc7;

class DICE {

	private $registry  = [ ];
	private $instances = [ ];
	private $factories = [ ];

	public function __construct () {
		//var_dump( $this);
	}

	public function __destruct () {
		var_dump( [
			          "####################################################
   #                                                  #
   #                    Au FINAL                      #
   #                                                  #
   ####################################################
"
			                                                                   => $this,
			          "####################################################
   #                    REGISTRY                      #
   ####################################################"
			                                                                   => $this->registry,
			          "####################################################
   #                    INSTANCES                      #
   ####################################################"
			                                                                   => $this->instances,
			          "####################################################
   #                    FACTORIES                      #
   ####################################################" => $this->factories,
			          $this->instances['B']

		          ] );
	}


	public function set ( $key, Callable $resolver ) {
		$this->regitry[ $key ] = $resolver;
	}

	public function setFactory ( $key, Callable $resolver ) {
		$this->factories[ $key ] = $resolver;
	}
	
	public function setInstance ( $instance ) {

		$reflection = new \ReflectionClass( $instance );
		//var_dump( $reflection );
		// Si on veut nettoyer les NAMESPACES (NB: Rendre dynamique celui-ci aussi....)
		//$this->instances[ str_replace( 'DIC\\Database\\', '', $reflection->getName() ) ] = $instance;
		$this->instances[ $reflection->getName() ] = $instance;
	}

	public function get ( $key ) {

		if ( isset( $this->factories[ $key ] ) ) {
			return $this->factories[ $key ]();
		}

		if ( ! isset( $this->instances[ $key ] ) ) {
			if ( isset( $this->regitry[ $key ] ) ) {
				$this->instances[ $key ] = $this->regitry[ $key ]();
			}
			else {
				$reflected_class = new \ReflectionClass( $key );
				if ( $reflected_class->isInstantiable() ) {
					var_dump( $key );
					$constructor = $reflected_class->getConstructor();
					if ( $constructor ) {

						var_dump( $constructor );
						$parameters = $constructor->getParameters();
						var_dump( $parameters );

						$constructorParams = [ ];
						foreach ( $parameters as $param ) {
							if ( $param->getClass() ) {
								$constructorParams[] = $this->get( $param->getClass()->getName() );
							}
							else {
								$constructorParams[] = $param->getDefaultValue();
							}
						}
						var_dump( $constructorParams );


						$this->instances[ $key ] = $reflected_class->newInstanceArgs( $constructorParams );

						var_dump( $reflected_class );
					}
					else {
						$this->instances[ $key ] = $reflected_class->newInstance();
					}
				}
				else {
					throw new \Exception( $key . 'n\'est pas instanciable' . $key );
				}
			}
		}

		return $this->instances[ $key ];
	}
}
