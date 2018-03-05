<?php namespace App\Controller;


class PostsController extends AppController {
	
	/**
	 * PostsController constructor.
	 */
	public function __construct () {
		parent::__construct();
		$this->loadModel( 'Post' );
		$this->loadModel( 'Category' );
	}

	public function index () {
		$posts      = $this->Post->last();
		$categories = $this->Category->all();
		$this->render( 'posts.index', compact( 'posts', 'categories' ) );
	}

	public function categories () {
		$categorie = $this->Category->find( $_GET[ 'id' ] );

		if ( $categorie === FALSE ) {
			$this->notFound();
		}

		$articles   = $this->Post->lastByCategory( $_GET[ 'id' ] );
		$categories = $this->Category->all();

		$app        = \App::getInstance();
		$app->title = $categorie->titre . ' | ' . $app->title;

		$this->render( 'posts.category', compact( 'articles', 'categories', 'categorie' ) );
	}

	public function show () {

		$post = $this->Post->findWithCategory( $_GET{'id'} );

		if ( $post === FALSE ) {
			$app->notFound();
		}

		$app        = \App::getInstance();
		$app->title = $post->titre . ' | ' . $app->title;

		$categorie = new \stdClass();

		$categorie->url = '?p=posts.category&id=' . $post->category_id;

		$this->render( 'posts.show', compact( 'post', 'categorie' ) );
	}
}
