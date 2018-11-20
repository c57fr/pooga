<h1><a href="https://github.com/design-patterns-for-humans/French#-prototype" target="_blank">Design Pattern
		Prototype</a></h1><?php

use DPC\Prototype\Sheep;

include 'autoloader.php';

$original = new Sheep( 'Jolly' );
echo $original->getName() . '<br>'; // Jolly
echo $original->getCategory() . '<br>'; // Mountain Sheep

// Clone and modify what is required
$cloned = clone $original;
$cloned->setName( 'Dolly' ) . '<br>';
echo $cloned->getName() . '<br>'; // Dolly
echo $cloned->getCategory() . '<br>'; // Mountain sheep
