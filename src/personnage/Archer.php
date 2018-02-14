<?php
/**
 * Created by C7.
 * User: Li
 * Date: 14/02/2018
 * Time: 02:01
 */

namespace Gc7\Personnage;


/**
 * Class Archer
 * @package Gc7
 */
class Archer extends Personnage {

	/**
	 * @var int
	 */
	public $fleches = 3;
	/**
	 * @var int
	 */
	protected $vie = 40;

	/**
	 * Archer constructor.
	 */
	public function __construct( $name, $vie )
	{
		$this->vie=$vie/2;
		parent::__construct( strtoupper( $name ) );
	}
	
	public function attaque( Personnage $cible )
	{
		$cible->vie -= $this->atk;
		parent::attaque( $cible );

		$cible->empecherNegatif();
	}
}
