<?php namespace App\Controller\Admin;

use Core\HTML\BootstrapForm;
use Core\Auth\DBAuth;
use App;

class UsersController extends \App\Controller\AppController {

	public function login () {

		$errors = FALSE;

		if ( ! empty( $_POST ) ) {
			//echo 'Analyse du form';
			$app  = App::getInstance();
			$auth = new DBAuth( $app->getDB() );
			if ( $auth->login( $_POST[ 'username' ], $_POST[ 'password' ] ) ) {
				//var_dump( $auth );
				// Gestion différente avec automenu qui impose de passer par index.php
				// Donc, ce header n'est pas utile
				header( 'Location: /?a=admin.posts.index' );
			}
			else {
				$errors = TRUE;
			}
		}

		$form = new BootstrapForm( $_POST );
		$this->render( 'users.login', compact( 'form', 'errors' ) );

	}
}

