<?php namespace Tuto\lesTraits;

require dirname( __DIR__ ) . '/autoloader.php';
?>
	<h1><a href="https://www.grafikart.fr/formations/programmation-objet-php/traits-php" target="_blank">Les <?= ucfirst( \AutoMenu\AutoMenu::getAppName() ); ?>s</a></h1>
	<img src="./Trait/accueil/diagram.png" alt="Diagramme" width="100%"><br/><br/>
	<?php

$zoe = new Zoe( 'Zoe' );
// Le Trait Electricable impose de définir
// cette méthode dans Zoe, classe qui l'utilise
$zoe->setNrjInitiale( 50 );

echo '50 kms en elec:<br>';
$zoe->roulerElectric( 50 );
echo '<pre>';

print_r( $zoe );

$zoe->AllegeAff();

echo '200 kms en diesel:<br>';
$zoe->roulerAuDiesel( 200 );
print_r( $zoe );

echo '100 kms sans préciser le mode:<br>';
$zoe->rouler( 100 );
print_r( $zoe );

echo 'On recharge:<br>';
$zoe->recharger();
print_r( $zoe );
echo '</pre>';
