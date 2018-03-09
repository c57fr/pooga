<?php namespace Test\Demo;


class Asset {
	
	public static function path ( $filename ) {
		//$path = explode( '.', $filename );
		$json = json_decode( file_get_contents( __DIR__ . '/' . $filename ), TRUE );
		if ( self::isLocal() ) {
			return 'ooohttp://localhost:3000/Tests/1_Demo/assets/' . $filename;
		}

		return $json[ 'app' ][ 'css' ];
	}
	
	public static function isLocal () {
		return strpos( $_SERVER[ 'HTTP_HOST' ], 'localhost' ) !== FALSE;
	}

}
