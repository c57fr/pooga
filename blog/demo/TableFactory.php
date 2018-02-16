<?php


class ArticleTable {
}

class VoitureTable {
}

class UtilisateurTable {
}

class TableFactory {

	public static function create( $table )
	{
		$classe = ucfirst( $table ) . 'Table';

		return new $classe();
	}

}

var_dump( TableFactory::create( 'Article' ) );
var_dump( TableFactory::create( 'Voiture' ) );
