<?php
// ToDoLi Cf. Packagist League/Event
require dirname( __DIR__ ) . '/autoloader.php';
require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';

use Event\Emitter;

$emitter = Emitter::getInstance();

$emitter->on( 'Comment.created', function ( $firstname, $lastname ) {
	echo $firstname . ' ' . $lastname . ' a posté un nouveau commentaire<br>';
} );

$emitter->emit( 'Comment.created', 'John', 'Doe' );

$user = new stdClass();
$emitter->emit( 'User.new', $user );
