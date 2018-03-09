<h2>Bizarrerie avec $_SERVER[ 'HTTP_HOST' ]</h2>
<?php

$hh     = $_SERVER[ 'HTTP_HOST' ];
$chaine = '//localhost:3000';

$srcs = [
	'Avec $_SERVER' => trim( $hh ),
	'Avec $chaine'  => trim( $chaine )
];

$isLocal = function ( $src ) {
	return strpos( $src, 'localhost' ) !== FALSE;
};

foreach ( $srcs as $k => $src ) {
	$vds[] = [
		$k          => $src,
		'isLocal()' => $isLocal( $src )
	];
}

var_dump( $vds );









use Test\Demo\Asset;

require dirname( __DIR__ ) . '/autoloader.php';
//require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';

// use Test\Demo\Demo; $d = new Demo(); echo $d->saveUser(); // Dans le test uniataire, renvoie une exception (Non catchée)
// var_dump( $d );

$asset = new Asset();

//var_dump( $asset::path( 'assets/assets.json' ) );
//
//var_dump( $asset::isLocal() );

?>
<!--<h2 style="margin-top: -5px"><!--30-->
<!--	<a href="https://www.grafikart.fr/tutoriels/php/tdd-kahlan-805" target="_blank">Tests unitaires avec Kahlan (GA)</a>-->
<!--</h2>-->
