<?php
session_start();
//settings for xdebug reporting error
//ini_set( 'xdebug.collect_vars', 'on' );
//ini_set( 'xdebug.collect_params', '4' );
//ini_set('xdebug.dump_globals', 'on');
//ini_set('xdebug.dump.SERVER', 'REQUEST_URI');
ini_set( 'xdebug.show_local_vars', 'on' );

//Error reporting
//error_reporting( E_ALL );

define( 'ROOT', dirname( __DIR__ ) . '\\' );
//var_dump( ROOT );

require ROOT . 'app/App.php';
App::load();


$a = $_GET[ 'a' ] ?? null;
$p = $_GET[ 'p' ] ?? 'home';


if ( $a ) {
	$controller = new App\Controller\UsersController;
	$controller->login();
	//var_dump($a);
	require ROOT . './public/admin.php';
}
else {

	//ob_start();

	if ( $p === 'home' ) {
		$controller = new App\Controller\PostsController;
		$controller->index();
	}
	elseif ( $p === 'article' ) {
		$controller = new App\Controller\PostsController;
		$controller->show();
		//require ROOT . 'pages/posts/show.php';
	}
	elseif ( $p === 'categorie' ) {
		$controller = new App\Controller\PostsController;
		$controller->categories();
		//require ROOT . 'pages/posts/category.php';
	}
	elseif ( $p === 404 ) {
		echo '<h1>Oups.... Cette page n\'existe pas !</h1>';
	}


	//$content = ob_get_clean();
	//require ROOT . 'Views/templates/default.php';
}
