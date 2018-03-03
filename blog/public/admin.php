<?php
use Core\Auth\DBAuth;

if (!defined('ROOT'))
define( 'ROOT', dirname( __DIR__ ) . '\\' );
//var_dump( ROOT );

//require ROOT . 'app/App.php';
//App::load();

$p = $_GET[ 'p' ] ?? 'admin';

// Auth
$app  = App::getInstance();
$auth = new DBAuth( $app->getDB() );

ob_start();

//var_dump(isset( $_SESSION[ 'auth' ]));
if ( $p === 'admin' ) {

	if (! $auth->logged()){
		require ROOT . 'pages/users/login.php';
	}else {
		require ROOT . 'pages/admin/posts/index.php';
	}
}
elseif ( $p === 404 ) {
	echo '<h1>Oups.... Cette page n\'existe pas !</h1>';
}

$content = ob_get_clean();
require ROOT . 'pages/templates/default.php';
