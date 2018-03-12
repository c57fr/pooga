<?php
//use Kahlan\Plugin\Stub;
//use Kahlan\Plugin\Monkey;
use Event\DoubleEventException;
use Kahlan\Plugin\Double;
use Event\Emitter;

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

	// OK
	it( 'should be a singleton', function () {
		$instance = $this->emitter;
		expect( $instance )->toBeAnInstanceOf( Emitter::class );
		expect( $instance )->toBe( Emitter::getInstance() );
	} );

	describe( '->on()', function () {

		// OK
		it( 'should trigger the listened event with a variable passed by reference', function () {
			$calls = [ ];
			$this->emitter->on( 'Comment.created', function () use ( &$calls ) {
				$calls[] = 2;
			} );
			expect( count( $calls ) )->toBe( 0 );
			$this->emitter->emit( 'Comment.created' );
			expect( count( $calls ) )->toBe( 1 );
		} );

		// OK
		it( 'should trigger the listened event', function () {
			$listener = Double::instance();
			$comment  = [ 'name' => 'John' ];
			expect( $listener )->toReceive( 'onNewComment' )->times( 2 )->with( $comment );
			$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment' ] );
			$this->emitter->emit( 'Comment.created', $comment );
			$this->emitter->emit( 'Comment.created', $comment );
		} );

		// OK
		it( 'should prevent the same listener twice', function () {
			$listener = Double::instance();

			// Permet d'intercepter l'erreur
			$closure = function () use ( $listener ) {
				$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment' ] );
				$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment' ] );
			};
			expect( $closure )->toThrow( new DoubleEventException() );
			$this->emitter->emit( 'Comment.created' );
		} );


		it( 'should run the first event first', function () {
			$listener = Double::instance();
			expect( $listener )->toReceive( 'onNewComment1' )->ordered;
			expect( $listener )->toReceive( 'onNewComment2' )->ordered;
			$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment1' ] );
			$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment2' ] );
			$this->emitter->emit( 'Comment.created' );
			$this->emitter->emit( 'Comment.created' );
		} );


		it( 'shoult trigger events in the right order', function () {
			$listener = Double::instance();
			expect( $listener )->toReceive( 'onNewComment2' )->once()->ordered;
			expect( $listener )->toReceive( 'onNewComment' )->once()->ordered;
			$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment' ], 1 );
			$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment2' ], 200 );
			$this->emitter->emit( 'Comment.created' );
			$this->emitter->emit( 'Comment.created' );
		} );

	} );

	describe( '->once()', function () {

		// OK
		it( 'should trigger events once', function () {
			$listener = Double::instance();
			$comment  = [ 'name' => 'John' ];
			expect( $listener )->toReceive( 'onNewComment' )->once()->with( $comment );
			$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment' ] )->once();
			$this->emitter->emit( 'Comment.created', $comment );
			$this->emitter->emit( 'Comment.created', $comment );
		} );

	} );

	describe( 'Listener->stopPropagation()', function () {

		it( 'should stop next listener', function () {
			$listener = Double::instance();
			expect( $listener )->toReceive( 'onNewComment' )->once();
			expect( $listener )->not->toReceive( 'onNewComment2' )->once();
			$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment' ] )->stopPropagation();
			$this->emitter->on( 'Comment.created', [ $listener, 'onNewComment2' ] );
			$this->emitter->emit( 'Comment.created' );
		} );

	} );

} );
