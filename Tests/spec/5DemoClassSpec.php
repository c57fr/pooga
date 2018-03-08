<?php
//require 'Tests/1_Demo/Demo.php';

use Test\Demo\Demo;

describe( "Demos on a Class", function () {

	it( 'Show that $d is an object of Demo (A class)', function () {
		$d = new Demo();
		expect( $d )->toBeAnInstanceOf( '\Test\Demo\Demo' );
		expect( $d->a )->toBe( 5 );
	} );


} );

