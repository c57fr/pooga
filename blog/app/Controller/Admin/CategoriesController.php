<?php namespace App\Controller\Admin;


use Core\HTML\BootstrapForm;
use App\Controller\AppController;

class CategoriesController extends AppController {


	public function __construct () {
		parent::__construct();
		$this->loadModel( 'Category' );
	}

	public function index () {

		$categories = $this->Category->all();

		$this->setTitle( 'Categories' );

		$this->render( 'admin.categories.index', compact( 'categories' ) );
	}

	public function edit () {

		if ( ! empty( $_POST ) ) {

			$result = $this->Category->update( $_GET[ 'id' ], [
				'titre' => $_POST[ 'titre' ]
			] );

			if ( $result ) {
				return $this->index();
			}
		}

		$category = $this->Category->find( $_GET[ 'id' ] );

		$this->setTitle( 'Éd. Catégorie' );

		$form        = new BootstrapForm( $category );
		$form->titre = 'Édition de la catégorie n°' . $_GET[ 'id' ];

		$this->render( 'admin.categories.edit', compact( 'form' ) );

	}
	
	public function add () {

		if ( ! empty( $_POST ) ) {

			$ctrl = ( ! empty( $_POST[ 'titre' ] ) );

			$result = $this->Category->create( [ 'titre' => $_POST[ 'titre' ] ] );

			if ( $result && $ctrl ) {
				return $this->index();
			}
		}

		$this->setTitle( 'Ajout Catégorie' );

		$form        = new BootstrapForm( $_POST );
		$form->titre = 'Ajout d\'une catégorie';

		$this->render( 'admin.categories.edit', compact( 'form' ) );
	}
	
	public function delete () {

		if ( ! empty( $_POST ) ) {
			$result = $this->Category->delete( $_POST[ 'id' ] );

			if ( $result ) {
				return $this->index();
			}
		}
	}

}
