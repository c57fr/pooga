<?php
use Kahlan\Plugin\Stub;
use Kahlan\Plugin\Monkey;
use Test\Demo\Asset;


describe( "Assets Path GA", function () {

	given( 'json', function () {
		return '{"app":{"js":"application-name","css":"assets/app.css"}}';
	} );

	allow( Asset::class )->toReceive( 'isLocal' )->andReturn( 'TRUE' );

	beforeAll( function () {
		Monkey::patch( 'public_path', function () {
			return '';
		} );
		Monkey::patch( 'file_get_contents', function () {
			return $this->json;
		} );

	} );

	it( 'resolve correct path', function () {


		expect( function () {

			$asset = new Asset();
			Stub::on( Asset::class )->method( 'isLocal', function () {
				return TRUE; // La 'vraie' methode marche pas en local
			} );

			$asset->path( 'assets/assets.json' );
		} )->toBe( function () {
			return 'http://localhost:3000/Tests/1_Demo/assets/assets.json';
		} );


		//expect( $this->json )->toBe( '{"app":{"js":"application-name","css":"assets/app.css"}}' );
		//expect( Asset::path( 'app.css' ) )->toBe( null );


	} );

} );
