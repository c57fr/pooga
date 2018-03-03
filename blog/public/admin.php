<?php

define( 'ROOT', dirname( __DIR__ ) . '\\' );
//var_dump( ROOT );

require ROOT . 'app/App.php';
App::load();

$p = $_GET[ 'p' ] ?? 'home';

ob_start();
if ( $p === 'home' ) {
	require ROOT . 'pages/posts/home.php';
}
elseif ( $p === 'article' ) {
	require ROOT . 'pages/posts/show.php';
}
elseif ( $p === 'categorie' ) {
	require ROOT . 'pages/posts/category.php';
}
elseif ( $p === 404 ) {
	echo '<h1>Oups.... Cette page n\'existe pas !</h1>';
}
$content = ob_get_clean();
require ROOT . 'pages/templates/default.php';
