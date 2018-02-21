<?php
//settings for xdebug reporting error
//ini_set( 'xdebug.collect_vars', 'on' );
//ini_set( 'xdebug.collect_params', '4' );
//ini_set('xdebug.dump_globals', 'on');
//ini_set('xdebug.dump.SERVER', 'REQUEST_URI');
//ini_set( 'xdebug.show_local_vars', 'on' );

//Error reporting
//error_reporting( E_ALL );

define( 'ROOT', dirname( __DIR__ ) . '\\' );
//var_dump( ROOT );

require ROOT . "app/App.php";
App::load();

if ( isset( $_GET[ 'p' ] ) ) {
	$p = $_GET[ 'p' ];
}
else {
	$p = 'home';
}

ob_start();
if ( $p === 'home' ) {
	require ROOT . 'public/pages/articles/home.php';
}
elseif ( $p === 'article' ) {
	require ROOT . 'public/pages/articles/single.php';
}
elseif ( $p === 'categorie' ) {
	require ROOT . 'public/pages/articles/categorie.php';
}
elseif ( $p === 'test' ) {
	require './blog/public/test.php';
}
else {
	echo '<h1>Oups.... Cette page n\'existe pas !</h1>';
}
$content = ob_get_clean();
require ROOT . 'public/pages/templates/default.php';
