<h1><a href="https://github.com/design-patterns-for-humans/French#-builder" target="_blank">Design Pattern Builder</a></h1><?php

include 'autoloader.php';
use DP\Builder\BurgerBuilder;

?>

<h3>Processus de fabrication en plusieurs étapes</h3>

<?php


$burger = ( new BurgerBuilder( 14 ) )
	->addPepperoni()
	->addLettuce()
	->addTomato()
	->build();

var_dump( $burger );
