<?php namespace Test\Demo;


class Asset {
	
	public static function path ( $filename ) {
		//$path = explode( '.', $filename );
		$json = json_decode( file_get_contents( __DIR__ . '/assets/' . $filename ), TRUE );
		if ( self::isLocal() ) {
			return 'http://localhost:3000/Tests/1_Demo/assets/' . $filename;
		}

		return $json[ 'app' ][ 'css' ];
	}
	
	public static function isLocal () {
		return preg_match( '/127.0.0|localhost/', $_SERVER[ 'HTTP_HOST' ] ) !== FALSE;
	}

}
