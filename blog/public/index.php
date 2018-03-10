<?php
session_start();
//settings for xdebug reporting error
//ini_set( 'xdebug.collect_vars', 'on' );
//ini_set( 'xdebug.collect_params', '4' );
//ini_set('xdebug.dump_globals', 'on');
//ini_set('xdebug.dump.SERVER', 'REQUEST_URI');
ini_set( 'xdebug.show_local_vars', 'on' );

$abc=function(){
	throw new Exception();
};

try {
	$abc();
} catch ( Exception $e ) {
	echo '<h1>Pour afficher cette page, la BdD doit être installée</h1>';
}
echo 'Le blog...';
exit;
//Error reporting
//error_reporting( E_ALL );

define( 'ROOT', dirname( __DIR__ ) . '\\' );
//var_dump( ROOT );

require ROOT . 'app/App.php';
App::load();


$a = $_GET[ 'a' ] ?? null;
$p = $_GET[ 'p' ] ?? 'home';


if ( $a ) {
	//var_dump($a);
	$page = explode( '.', $a );
	if ( $page[ 0 ] === 'admin' ) {
		$controller = 'App\Controller\\' . ucfirst( $page[ 0 ] ) . '\\' . ucfirst( $page[ 1 ] ) . 'Controller';
		$action     = $page[ 2 ];
		//var_dump( $page, $controller, $action );
		$controller = new $controller();
		$controller->$action();
	}
	elseif ( $a === 'login' ) {
		$user = new \App\Controller\Admin\UsersController();
		$user->login();
	}
}
else {
	$controller = new App\Controller\PostsController();
	if ( $p === 'home' ) {
		$controller->index();
	}
	elseif ( $p === 'posts.show' ) {
		$controller->show();
	}
	elseif ( $p === 'posts.category' ) {
		$controller->categories();
	}
	elseif ( $p === 'demo.index' ) {
		$controller=new \App\Controller\DemoController();
		$controller->index();
	}
	elseif ( $p === 404 ) {
		echo '<h1>Oups.... Cette page n\'existe pas !</h1>';
	}
}
