<?php
require 'Autoloader.php';

use Gc7\Divers\AutoMenu\AutoMenu;

$p = $_GET[ 'p' ] ?? 'accueil';
//var_dump($_GET, $p);

$page = new AutoMenu( __DIR__ );
//var_dump( $page );

ob_start();

$page->action( $p );

$content = ob_get_clean();

require './divers/accueil/template.php';
