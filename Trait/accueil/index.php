<?php namespace Tuto\lesTraits;

require dirname( __DIR__ ) . '/autoloader.php';
?>
	<h1><a href="https://www.grafikart.fr/formations/programmation-objet-php/traits-php"target="_blank"><?= ucfirst( \AutoMenu\AutoMenu::getAppName() ); ?></a></h1>
	<img src="./Trait/accueil/diagram.png" alt="Diagramme"><br>
	<?php

$zoe = new Zoe( 'Zoe' );
// Le Trait Electricable impose de définir
// cette méthode dans Zoe, classe qui l'utilise
$zoe->setNrjInitiale( 50 );

echo '50 kms en elec:<br>';
$zoe->roulerElectric( 50 );
var_dump( $zoe );

$zoe->AllegeAff();

echo '200 kms en diesel:<br>';
$zoe->roulerAuDiesel( 200 );
var_dump( $zoe );

echo '100 kms sans préciser le mode:<br>';
$zoe->rouler( 100 );
var_dump( $zoe );

echo 'On recharge:<br>';
$zoe->recharger();
var_dump( $zoe );
