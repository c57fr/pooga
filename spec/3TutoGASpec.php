<?php
//require 'Tests/1_Demo/Demo.php';

use Kahlan\Plugin\Stub;

use Tests\Demo\Demo;

describe( "Tuto GA on a Class", function () {
	describe( 'testGA', function () {

		it( 'should randomFail() get an Exception if random > 5', function () {
			expect( function () {
				$demo = new Demo();
				//	// Squeeze la function random()
				//	//\Kahlan\Allow( $demo )->method( 'randomFail', function () {
				//	//	return 7;
				//	//} );
				$demo->randomFail();
			} )->toThrow();

		} );
	} );

} );
//
//describe( 'Demo Throw Exception', function () {
//
//
//} );
//
//describe( 'DemoUser', function () {
//	it( 'sould verif if save not done', function () {
//		expect( /**
//		 * @throws Exception
//		 */
//			function () {
//				$demo = new Demo();
//				Stub::on( \Tests\demo\User::class )->method( 'save', function () {
//					return FALSE;
//				} );
//				$demo->saveUser();
//			} )->toThrow();
//
//	} );
//} );


