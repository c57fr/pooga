<?php namespace Gc7\Blog\Table;


class Posts extends Table {

	public function getUrl()
	{
		//return 'article/'.URLify::filter( $this->titre );
		return '?p=article&id=' . $this->id;
	}

	public function getExtrait()
	{
		return substr( $this->contenu, 0, 79 ) . '... <i><a href="' . $this->getURL() . '"><br>Lire plus</a></i>';
	}

	public static function find( $id )
	{
		return self::query( '
SELECT  ba.id, ba.titre, ba.contenu, bc.id AS categorie_id, bc.categorie FROM ' . static::$table . ' ba
LEFT JOIN blog_categories bc
	ON ba.categorie_id = bc.id
WHERE ba.id = ?
', [ $id ], TRUE );
	}

	public static function getLast()
	{
		return self::query( '

SELECT ba.id, ba.titre, ba.contenu, bc.categorie FROM blog_articles ba
LEFT JOIN blog_categories bc
	ON categorie_id = bc.id
ORDER BY ba.date DESC
' );
	}

	public static function dernierParCategorie( $category_id )
	{
		return self::query( '
SELECT ba.id, ba.titre, ba.contenu, bc.categorie FROM blog_articles ba
	LEFT JOIN blog_categories bc
	ON categorie_id = bc.id
WHERE categorie_id = ?
ORDER BY ba.date DESC
', [ $category_id ] );
	}
}
