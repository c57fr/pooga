<?php
//use Kahlan\Plugin\Stub;
//use Kahlan\Plugin\Monkey;
use Event\DoubleEventException;
use Kahlan\Plugin\Double;
use Event\Emitter;
use Event\Listener;

describe( Emitter::class, function () {

	// Régénère l'instance entre chaque test
	// = Annule l'effet Singleton de la classe Emitter
	beforeEach( function () {
		$reflection = new ReflectionClass( Emitter::class );
		$instance   = $reflection->getProperty( '_instance' );
		$instance->setAccessible( TRUE );
		$instance->setValue( null, null );
		$instance->setAccessible( FALSE );
	} );

	given( 'emitter', function () {
		return Emitter::getInstance();
	} );


	it( 'shoult trigger events in the right order', function () {
		$listener = Double::instance();

		expect( $listener )->toReceive( 'onNewComment2' )->once();
		expect( $listener )->toReceive( 'onNewComment' )->once();

		$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment2' ], 200 );
		$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment' ], 5 );
		$this->emitter->emit( 'Comment.created' );
		//$this->emitter->emit( 'Comment.created' );
	} );


} );
