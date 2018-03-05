<?php
use DP\SimpleFactory\CarFactory;
use DP\Factory\DoorFactory;
use DP\Factory\WoodenDoorFactory;
use DP\Factory\IronDoorFactory;

?>
	<h1><a href="https://github.com/design-patterns-for-humans/French#-simple-factory" target="_blank">Design Pattern
			Factory</a></h1>
<?php
require 'autoloader.php';

?>
	<h2>Simple Factory</h2>
<?php
var_dump( CarFactory::create( 'BerLiNe' ) );


?>
	<h2>Other Factory</h2>
<?php

$door = DoorFactory::makeDoor( 80, 200 );
echo 'Dimension: ' . $door->getDescription() . $door->getWidth() . ' x ' . $door->getHeight() . '<hr>';

?>
	<h2><a href="https://github.com/design-patterns-for-humans/French#-abstract-factory" target="_blank">Abstract
			Factory</a></h2>
	<p><em>Le bon spécialiste pour le bon type de porte...</em></p>
<?php

$woodenFactory = new WoodenDoorFactory();

$door   = $woodenFactory->makeDoor();
$expert = $woodenFactory->makeFittingExpert();

$door->getDescription();  // Output: I am a wooden door
$expert->getDescription(); // Output: I can only fit wooden doors

// Idem pour le Factory de porte en fer
$ironFactory = new IronDoorFactory();

$door   = $ironFactory->makeDoor();
$expert = $ironFactory->makeFittingExpert();

$door->getDescription();  // Output: I am an iron door
$expert->getDescription(); // Output: I can only fit iron doors
