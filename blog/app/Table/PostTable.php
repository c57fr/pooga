<?php
/**
 * Created by PhpStorm.
 * User: mhamm
 * Date: 12/11/2016
 * Time: 11:47
 */

namespace App\Table;


use Core\Table\Table;

class PostTable extends Table
{
    protected $table ;

    /**
     * Réccupère les derniers articles
     * @return array
     */
    public function last(){
        return $this->query("
            SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
             FROM articles
             LEFT JOIN categories ON category_id = categories.id
             ORDER BY articles.date DESC ");
    }

    /**
     * Réccupère un article
     * @param $id l'Id du post recherché
     * @return array|mixed
     */
    public function find($id){
        return $this->query("
        SELECT articles.id, articles.titre, articles.contenu, articles.date, categories.titre as categorie
             FROM articles
             LEFT JOIN categories ON category_id = categories.id
              WHERE articles.id = ?",
            array($id),true);
    }

    public function findByCategory($id){
        return $this->query('SELECT * FROM articles WHERE category_id = ?', array($id));
    }
}