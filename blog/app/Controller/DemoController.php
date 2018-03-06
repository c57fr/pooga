<?php namespace App\Controller;

use Core\Database\QueryBuilder;


/**
 * Class DemoController
 * @package App\Controller
 *
 * Design PAttern nommé Fluent ou chaînage
 */
class DemoController extends AppController {

	public function index () {
		$query = new QueryBuilder();

		echo $query
			->select( 'id', 'titre', 'contenu' )
			->from( 'articles', 'posts' )
			->where( 'id = 2' )
			->where( 'posts.category_id = 1' )
			->where( 'posts.date > NOW()' );
	}
}
