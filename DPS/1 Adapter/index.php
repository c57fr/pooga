<?php namespace Adapter\GA; ?>
	<h1 style="margin-top: 30px">Design Pattern Adapter</h1>
	<a href="https://www.grafikart.fr/formations/programmation-objet-php/pattern-adapter" target="_blank">Vu /
		GA</a> (Adapter du système de cache Doctrine)
	<hr>

	<?php

use Doctrine\Common\Cache\FilesystemCache;

require dirname( __DIR__ ) . '/autoloader.php';
require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';

$h             = new Hello();
$doctrineCache = new FilesystemCache( __DIR__ . '/cache' );
$cacheAdapter  = new DoctrineCacheAdapter( $doctrineCache );

echo $h->sayHello( $cacheAdapter ) . '<br>';
