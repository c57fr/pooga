<?php
//require 'Tests/1_Demo/Demo.php';

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

		it( 'passes if $closure echoes the expected output', function () {
			$closure = function () {
				echo 'Hello World!';
			};

			expect( $closure )->toEcho( 'Hello World!' );
		} );

	} );
} );
