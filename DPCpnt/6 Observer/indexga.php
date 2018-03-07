<?php
// ToDoLi Cf. Packagist League/Event

use Event\Emitter;

require dirname( __DIR__ ) . '/autoloader.php';
require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';


$emitter = Emitter::getInstance();


$emitter->on( 'Comment.created', function ( $firstname, $lastname ) {
	echo $firstname . ' ' . $lastname . ' a posté un nouveau commentaire';
} );

$emitter->emit( 'Comment.created', 'John', 'Doe' );

$user = new stdClass();
$emitter->emit( 'User.new', $user );



//$emitter->on('User.new', function($user){
//	mail(...);
//});

//var_dump( $emitter );
//echo $emitter->getUniq();
