<?php namespace Blog;

const BASE_DIR = './src/blog/';

$p = $_GET[ 'p' ] ?? 'home';

//var_dump( $_GET );

ob_start();
if ( $p === 'home' ) {
	require BASE_DIR . 'pages/home.php';
}
elseif ( $p === 'single' ) {
	require BASE_DIR . 'pages/single.php';
}
$content = ob_get_clean();
require BASE_DIR . 'pages/template/default.php';
