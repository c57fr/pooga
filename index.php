<?php
require __DIR__ . '/vendor/autoload.php';
use AutoMenu\Admin;
//use Gc7\Helper\GC7Tip;

$adm = Admin::getInstance();
$adm->start();

//$content = $adm::AccesAdmin();;

// Ne sera que qd (plus nécessaire)
//$adm->getNotif();


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
