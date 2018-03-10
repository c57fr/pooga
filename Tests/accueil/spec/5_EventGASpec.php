<?php
//use Kahlan\Plugin\Stub;
//use Kahlan\Plugin\Monkey;

use Event\Emitter;


describe( \Event\Emitter::class, function () {

	it( 'should be a singleton', function () {

		$instance1 = Emitter::getInstance();
		$instance2 = Emitter::getInstance();

		expect( $instance1 )->toBeAnInstanceOf( Emitter::class );
		expect( $instance2 )->toBeAnInstanceOf( Emitter::class );
		expect( $instance1 )->toBe( $instance2 );

	} );

} );
