<?php namespace App\Controller\Admin;

// 2doli À suppr (Normalement chargé par l'auto-loader)
require 'blog/core/auth/DBAuth.php';

use Core\Auth\DBAuth;
use App;

class AppController extends \App\Controller\AppController {

	public function __construct () {

		parent::__construct();
		$app  = App::getInstance();
		$auth = new DBAuth( $app->getDB() );

		if ( !$auth->logged() ) {
			//$user= new \App\Controller\Admin\UsersController();
			//$user->login();
			//$this->forbiden();
			header('Location: /?a=login');
			//require './blog/public/index.php?a=users.login';
		}
	}
}
