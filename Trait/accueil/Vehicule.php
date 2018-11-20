<?php namespace Tuto\lesTraits;

class Vehicule implements VehiculeInterface {

	protected $modele;
	protected $marque;
	protected $km = 0;

	/**
	 * Vehicule constructor.
	 *
	 * @param $marque
	 */
	public function __construct ( $modele = null ) {
		$this->modele = $modele;
		if ( $modele ) {
			$this->marque = $this->getMarque( $modele );
		}
	}

	public function rouler ( $km ) {
		$this->km += $km;
	}
	
	private function getMarque ( $modele ) {
		$data   = [
			'P102'   => 'PEUGEOT',
			'104'    => 'PEUGEOT',
			'404'    => 'PEUGEOT',
			'504'    => 'PEUGEOT',
			'608'    => 'PEUGEOT',
			'4L'     => 'RENAULT',
			'R5'     => 'RENAULT',
			'Zoe'    => 'RENAULT',
			'608'    => 'PEUGEOT',
			'1308GT' => 'SIMCA'
		];
		$trouve = array_search( $modele, array_keys( $data ) );

		return ( $trouve ) ? array_values( $data )[ $trouve ] : 'null';
	}
	
	public function AllegeAff () {
		unset( $this->modele );
		unset( $this->marque );
		unset( $this->roue );
	}

}
