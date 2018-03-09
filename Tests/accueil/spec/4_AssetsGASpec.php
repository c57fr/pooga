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

			Stub::on( Asset::class )->method( '::isLocal' )->andReturn( TRUE );


		expect( Asset::path( 'assets/assets.json' );
		} )->toBe( function () {
			return 'http://localhost:3000/Tests/1_Demo/assets/assets.json';
		} );


		//expect( $this->json )->toBe( '{"app":{"js":"application-name","css":"assets/app.css"}}' );
		//expect( Asset::path( 'app.css' ) )->toBe( null );


	} );

} );
