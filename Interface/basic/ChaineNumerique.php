<?php
/**
 * Created by C7.
 * User: Li
 * Date: 06/03/2018
 * Time: 05:32
 */

namespace Basic;


class ChaineNumerique implements NombreInterface {

	private $valeurNum;

	/**
	 * @return mixed
	 */
	public function getValeurNum () {
		return $this->valeurNum;
	}

	/**
	 * @param mixed $valeurNum
	 */
	public function setValeurNum ( $valeurNum ) {
		$this->valeurNum = $valeurNum;
	}

	/**
	 * Must return numeric value as integer
	 * @return int
	 */
	public function getValue () {
		return $this->valeurNum;
	}
}
