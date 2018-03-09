<?php
use Kahlan\Plugin\Stub;
use Kahlan\Plugin\Monkey;
use Test\Demo\Asset;


describe( "Assets Path GA", function () {

	given( 'json', function () {
		return '{"app":{"js":"application-name","css":"assets/app.css"}}';
	} );

	beforeAll( function () {
		Monkey::patch( 'public_path', function () {
			return '';
		} );
		Monkey::patch( 'file_get_contents', function () {
			return $this->json;
		} );

	} );

	it( 'resolve correct path', function () {


		expect( $this->json )->toBe( '{"app":{"js":"application-name","css":"assets/app.css"}}' );
		expect( Asset::path( 'app.css' ) )->toBe( null );


	} );

} );
