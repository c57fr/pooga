<?php

use Gc7Ga\Admin;

//require 'Gc7Ga/Gc7.php';
require 'Gc7Ga/Admin.php';

$adm = Admin::getInstance();
$adm->gereChange();

// Ne sera que qd 'c' demandé
$adm->getNotif();


//$appALancer = Gc7Ga\Gc7::getInstance();
//echo var_dump($adm->getNotif());
//$appALancer->gereChange();
//$adm->aff();


//echo '<h1>' . $appALancer->lancer() . '</h1>';

// Lancement du Blog
//require './blog/public/index.php';

// Lancement des différents petits tests
//require './divers/index.php';
//$appALancer->title= 'lologa';
//var_dump( $appALancer );
