<?php
require './vendor/autoload.php';

define( 'ROOT', str_replace( '\\', '/', './blog' ) . '/' );
require ROOT . 'app/App.php';
var_dump( ROOT );

App::load();

$app = App::getInstance();

$p = $_GET[ 'p' ] ?? 'home';
//var_dump($_GET, $p);

// Initialisation des objets
//$db = new Database();

ob_start();
if ( $p === 'home' ) {
	require ROOT . 'pages/home.php';
}
elseif ( $p === 'article' ) {
	require ROOT . 'pages/article.php';
}
elseif ( $p === 'categorie' ) {
	require ROOT . 'pages/categorie.php';
}
elseif ( $p === 'test' ) {
	require ROOT . 'public/test.php';
}
elseif ( $p === '404' ) {
	echo '<h1>Cette page n\'existe pas !</h1>';
}
$content = ob_get_clean();

require ROOT . 'pages/template/default.php';
