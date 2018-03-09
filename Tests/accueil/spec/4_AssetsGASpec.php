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

		Stub::on( Asset::class )->method( '::isLocal' )->andReturn( '' );

		expect( Asset::path( 'app.css' ) )->toBe( 'assets/css/app.5678.css' );

	} );

} );
