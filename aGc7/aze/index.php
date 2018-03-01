<?php

require './divers/Autoloader.php';

use Gc7\Divers\AutoMenu\AutoMenu;

$p = $_GET[ 'p' ] ?? 'accueil';

$page = new AutoMenu( __DIR__ );
//var_dump( $page );

ob_start();

$page->action( $p );

$content = ob_get_clean();

// Pour avoir un autre template pour ce dossier
// Inverser les 2 commentaires ci-dessous

//require $page->getFolder() . 'accueil/template.php';
require 'divers/accueil/template.php';
