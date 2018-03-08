<?php
//require 'Tests/1_Demo/Demo.php';

//use Kahlan\Plugin\Stub;
use Test\Demo\Demo;


describe( "Tuto GA", function () {
	describe( 'On a stubbed method', function () {

		it( "should get an Exception if randoma get more than 1", function () {

			$demo = new Demo();
			expect( $demo )->toBeAnInstanceOf( '\Test\Demo\Demo' );

			// Squeeze la function random() de Demo
			allow( $demo )->toReceive( 'randoma' )->andReturn( '3' );
			expect( $demo->randoma() )->toEqual( '3' );

		} );

	} );
} );
