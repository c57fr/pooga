<?php namespace Gc7\Helper;

use Stringy\Stringy as S;

class GC7Tip {

	/**
	 * Simple transformation rapide en camelCase de chaînes simples
	 * (Ne gère ni la casse des caractères, ni les accents)
	 *
	 * @param $word
	 *
	 * @return string
	 */
	public static function toCamelCase ( $str ) {

		return S::create( $str )->camelize();

	}

	/**
	 * Donne un caractère donné
	 *
	 * @param   $code
	 * @param   bool|FALSE $html (Affiche le code du caractère en survol du symbol
	 *
	 * @return  string
	 *
	 * @sample  Tous les symboles
	 *          for ( $i = 0; $i < 78884; $i ++ ) {
	              echo GC7Tip::uchr( $i,1 );
							}
 */
	public static function uchr ( $code, $html = FALSE ) {
		$str = html_entity_decode( '&#' . $code . ';', ENT_NOQUOTES, 'UTF-8' );

		return $html ? ( '<a title="' . $code . '">' . $str . '</a> ' ) : $str;
	}
	
	public static function nf ( $n, $d=2 ) {
		return number_format($n, $d, ',', ' ');
	}
}
