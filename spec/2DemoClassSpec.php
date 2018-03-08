<?php
require 'Tests/1_Demo/Demo.php';

use Kahlan\Plugin\Stub;
use Tests\Demo\Demo;

describe( "Demos on a Class", function () {

	it( 'Show that $d is an object of Demo (A class)', function () {
		$d = new Demo();
		expect( $d )->toBeAnInstanceOf( '\Tests\Demo\Demo' );
		expect( $d->a )->toBe( 5 );
	} );


} );
//
//describe( 'Demo Throw Exception', function () {
//
//	it( 'should randomFail() get an Exception if random > 5', function () {
//		expect( function () {
//			$demo = new Demo();
//			// Squeeze la function random()
//			//\Kahlan\Allow( $demo )->method( 'randomFail', function () {
//			//	return 7;
//			//} );
//			$demo->randomFail();
//		} )->toThrow();
//
//	} );
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


