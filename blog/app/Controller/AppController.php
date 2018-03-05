<?php namespace App\Controller;

use Core\Controller\Controller;

class AppController extends Controller {

	protected $template = 'default';
	protected $viewPath;
	public    $title;

	public function __construct () {
		$this->viewPath = ROOT . '/app/Views/';
	}
	
	protected function loadModel ( $modelName ) {
		$this->$modelName = \App::getInstance()->getTable( $modelName );
	}

	protected function setTitle ( $title ) {
		$app = \App::getInstance();
		$app->title=$title.' | ' .$app->title;
	}

}
