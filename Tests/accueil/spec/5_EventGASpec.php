<?php
//use Kahlan\Plugin\Stub;
//use Kahlan\Plugin\Monkey;

use Event\Emitter;


describe( \Event\Emitter::class, function () {

	it( 'should be a singleton', function () {

		$instance = Emitter::getInstance();

		expect( $instance )->toBeAnInstanceOf( Emitter::class );
		expect( $instance )->toBe( Emitter::getInstance());

	} );

} );
