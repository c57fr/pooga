<h1>Design Pattern Builder</h1><?php

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
