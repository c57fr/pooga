<?php

use Gc7\Blog\App;
use Gc7\Blog\Database;

$app = App::getInstance();
const BASE_DIR = './blog/';

$p = $_GET[ 'p' ] ?? 'home';
//var_dump($_GET);

// Initialisation des objets
$db = new Database();

ob_start();
if ( $p === 'home' ) {
	require BASE_DIR . 'pages/home.php';
}
elseif ( $p === 'article' ) {
	require BASE_DIR . 'pages/article.php';
}
elseif ( $p === 'categorie' ) {
	require BASE_DIR . 'pages/categorie.php';
}
elseif ( $p === 'test' ) {
	require BASE_DIR . 'public/test.php';
}
elseif ( $p === '404' ) {
	echo '<h1>Cette page n\'existe pas !</h1>';
}
$content = ob_get_clean();

require BASE_DIR . 'pages/template/default.php';
