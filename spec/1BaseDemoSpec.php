<?php
//require 'Tests/1_Demo/Demo.php';

use Kahlan\Plugin\Stub;

//Kahlan\Matcher::register('Demo', 'Tests/1_Demo/Demo');

describe( "Demo ToBe", function () {

	describe( "Examples", function () {

		it( "makes an expectation", function () {
			expect( 123 )->toBe( 123 );
		} );

		it( 'should addition 1+1', function () {
			expect( 1 + 1 )->toBe( 2 );
		} );

		it( 'matches Closure() to 5', function () {
			$a = function () {
				return 5;
			};
			$b = (int) ( 2 * 2.5 );
			expect( $a() )->toBe( $b );
		} );


	} );

	describe( 'show test on a callback function', function () {

		it( 'show $f()is a Closure', function () {
			$f     = function () {
				return TRUE;
			};
			$class = get_class( $f );
			expect( $f() )->toBe( TRUE );
			expect( $f )->toBeAnInstanceOf( $class );
		} );

		it( 'show when $f() return FALSE', function () {
			$f = function () {
				return '123';
			};

			expect( $f() )->toContain( '23' );
			expect( $f() )->toHaveLength( 3 );
		} );

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


