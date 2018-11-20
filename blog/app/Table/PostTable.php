<?php namespace App\Table;


use Core\Table\Table;

class PostTable extends Table {

	protected $table='articles';

	/**
	 * Récupère les derniers articles avec les catégories associées
	 * @return array
	 */
	public function last () {
		return $this->query( '
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre AS categorie
             FROM articles
             LEFT JOIN categories ON category_id = categories.id
             ORDER BY articles.date DESC' );
	}

	/**   * Récupère un article en liant la catégorie associée
	 *
	 * @param $id l'Id du post recherché
	 *
	 * @return \App\Entity\PostEntity
	 */
	public function findWithCategory ( $id ) {
		return $this->query( '
        SELECT articles.id, articles.titre, articles.contenu, articles.date, articles.category_id, categories.titre AS
        categorie
             FROM articles
             LEFT JOIN categories ON category_id = categories.id
              WHERE articles.id = ?',
		                     [ $id ], TRUE );
	}

	/**
	 * Récupère les derniers articles selon la catégorie
	 *
	 * @param $category_id int
	 *
	 * @return array
	 */
	public function lastByCategory ( $category_id ) {
		return $this->query( 'SELECT * FROM articles WHERE category_id = ? ORDER BY articles.date DESC', [ $category_id ] );
	}

}
