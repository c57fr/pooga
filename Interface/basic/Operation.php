<?php namespace Basic;


class Operation {
	

	/**
	 * @param NombreInterface $a
	 * @param NombreInterface $b
	 *
	 * @return int
	 */
	public static function somme ( NombreInterface $a, NombreInterface $b )  {

		return ( $a->getValue() + $b->getValeurNum() );
	}
}
