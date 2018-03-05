<?php namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;


class PostsController extends AppController {


	public function __construct () {
		parent::__construct();
		$this->loadModel( 'Post' );
	}

	public function index () {
		$posts = $this->Post->last();
		//var_dump($posts);

		$this->setTitle( 'Admin' );

		$this->render( 'admin.posts.index', compact( 'posts' ) );
	}

	public function add () {

		if ( ! empty( $_POST ) ) {

			//var_dump( $_POST );

			$ctrl = ( ! empty( $_POST[ 'titre' ] ) && ! empty( $_POST[ 'contenu' ] ) );

			$result = $this->Post->create( [
				                               'titre'       => $_POST[ 'titre' ],
				                               'contenu'     => $_POST[ 'contenu' ],
				                               'category_id' => $_POST[ 'category_id' ]
			                               ] );

			if ( $result && $ctrl ) {
				return $this->index();
			}
		}

		$this->loadModel( 'Category' );
		$categories = $this->Category->extract( 'id', 'titre' );

		$this->setTitle( 'Ajout' );


		$form = new BootstrapForm( $_POST );
		$form->titre = 'Ajout d\'un article';
		$this->render( 'admin.posts.edit', compact( 'form', 'categories' ) );
	}

	public function edit () {
		if ( ! empty( $_POST ) ) {

			$result = $this->Post->update( $_GET[ 'id' ], [
				'titre'       => $_POST[ 'titre' ],
				'contenu'     => $_POST[ 'contenu' ],
				'category_id' => $_POST[ 'category_id' ]
			] );

			if ( $result ) {
				return $this->index();
			}
		}

		$post = $this->Post->find( $_GET[ 'id' ] );

		$this->loadModel( 'Category' );
		$categories = $this->Category->extract( 'id', 'titre' );

		$this->setTitle( 'Édition' );


		$form = new BootstrapForm( $post );
		$form->titre = 'Édition d\'un article';
		$this->render( 'admin.posts.edit', compact( 'form', 'categories' ) );
	}

	public function delete () {

		if ( ! empty( $_POST ) ) {

			$result = $this->Post->delete( $_POST[ 'id' ] );

			return $this->index();
		}
	}
}
