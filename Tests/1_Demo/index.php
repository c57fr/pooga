<h2 style="margin-top: -5px"><!--30-->
	<a href="https://www.grafikart.fr/tutoriels/php/tdd-kahlan-805" target="_blank">Tests unitaires avec Kahlan (GA)</a>
</h2>
<?php
use Test\Demo\Asset;

require dirname( __DIR__ ) . '/autoloader.php';
//require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';

// use Test\Demo\Demo; $d = new Demo(); echo $d->saveUser(); // Dans le test uniataire, renvoie une exception (Non catchée)
// var_dump( $d );

$asset = new Asset();

echo $asset::path( 'app.css' );
