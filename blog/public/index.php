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

//$pdo = null !== new PDO( 'mysql:host=localhost;dbname=pooga', 'root', '' );


// PHP Fatal Error. Second Argument Has To Be An Integer, But PDOException::getCode Returns A
// String.


//var_dump( $pdo );

//var_dump($page);

$a = $_GET[ 'a' ] ?? null;
$p = $_GET[ 'p' ] ?? 'home';


if ( $a ) {
	var_dump( $a );
	$page = explode( '.', $a );
	if ( $page[ 0 ] === 'admin' ) {
		$controller = 'App\Controller\\' . ucfirst( $page[ 0 ] ) . '\\' . ucfirst( $page[ 1 ] ) . 'Controller';
		$action     = $page[ 2 ];
		var_dump( $page, $controller, $action );
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
		try {
			$conn = new PDO( "mysql:host=localhost;dbname=pooga", 'root', '' );
			// set the PDO error mode to exception
			$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) {
			echo '<h1>Pour afficher la page du blog du tuto de GA, MySQL doit "tourner", et la BdD \'pooga\' doit y être
importée (<em>./blog/config/pooga.sql.gz</em>)</h1>';
			echo '<h2>Dans l\'attente...: <a href="/?c=c">Page suivante</a></h2>';
			//echo "Connection failed: " . $e->getMessage();
			exit();
		}

		$controller->index();
	}
	elseif ( $p === 'posts.show' ) {
		$controller->show();
	}
	elseif ( $p === 'posts.category' ) {
		$controller->categories();
	}
	elseif ( $p === 'demo.index' ) {
		$controller = new \App\Controller\DemoController();
		$controller->index();
	}
	elseif ( $p === '404' ) {
		echo '<h1>Oups.... Cette page n\'existe pas !</h1>';
	}
}
