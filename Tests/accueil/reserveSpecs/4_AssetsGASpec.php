<?php
use Kahlan\Plugin\Stub;
use Kahlan\Plugin\Monkey;
use Test\Demo\Asset;


describe( "Assets Path GA", function () {

	given( 'json', function () {
		return '{"app":{"js":"app.1234.js","css":"app.5678.css"}}';
	} );

	beforeAll( function () {

		Monkey::patch( 'public_path', function () {
			return '';
		} );

		Monkey::patch( 'file_get_contents', function () {
			return $this->json;
		} );

	} );

	it( 'resolve the correct path', function () {

		Stub::on( Asset::class )->method( '::isLocal' )->andReturn( FALSE );

		expect( Asset::path( 'app.css' ) )->toBe( '/assets/css/app.5678.css' );

	} );

	it( 'resolve the correct path if we are on localhost', function () {

		given( '$_SERVER["HTTP_HOST"]', function () {
			return '127.0.0.1';
		} );

		Stub::on( Asset::class )->method( '::isLocal' )->andReturn( TRUE );

		expect( Asset::path( 'app.css' ) )->toBe( '127.0.0.1:3000/Tests/1_Demo/assets/css/app.5678.css' );

	} );

} );
