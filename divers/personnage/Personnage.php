<?php namespace Gc7\Divers\Personnage;

/**
 * Class Personnage
 * @package Gc7
 */
class Personnage {

	//const MAX_VIE = 100; // Propre à chaque instance
	protected static $max_vie = 120; // Propre à chaque prersonnage

	/**
	 * @var int
	 */
	/**
	 * @var int
	 */
	/**
	 * @var int
	 */
	protected $vie = 80, $atk = 20, $nom;

	/**
	 * Personnage constructor.
	 *
	 * @param $nom
	 */
	public function __construct( $nom )
	{
		$this->nom = $nom;
	}

	/**
	 * @return mixed
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * @param mixed $nom
	 */
	public function setNom( $nom )
	{
		$this->nom = $nom;
	}

	/**
	 * @return int
	 */
	public function getVie()
	{
		return $this->vie;
	}

	/**
	 * @param int $vie
	 */
	public function setVie( $vie )
	{
		$this->vie = $vie;
	}

	/**
	 * @return int
	 */
	public function getAtk()
	{
		return $this->atk;
	}

	/**
	 * @param int $atk
	 */
	public function setAtk( $atk )
	{
		$this->atk = $atk;
	}


	/**
	 *
	 */
	public function crier()
	{
		echo 'LEEROY JENKINS';
	}
	
	/**
	 * @param null $pv
	 */
	public function regenerer( $pv = null )
	{
		if ( null === $pv ) {
			$this->vie = self::$max_vie;
		}
		else {
			$this->vie += $pv;
		}
	}
	
	/**
	 * @return string
	 */
	public function mort()
	{
		return $this->nom . ' est mort ? ' . ( ( $this->vie >= 0 ) ? 'Non' : 'Oui' );
	}

	/**
	 * @param Personnage $cible
	 */
	public function attaque( Personnage $cible )
	{
		$cible->vie -= $this->atk;
		$cible->empecherNegatif();
	}

	/**
	 *
	 */
	protected function empecherNegatif()
	{
		if ( $this->vie < 0 ) {
			$this->vie = 0;
		}
	}
}
