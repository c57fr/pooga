<?php namespace Test\Demo;


class Asset {
	
	public static function path ( $filename ) {
		//$path = explode( '.', $filename );
		$json = json_decode( file_get_contents( __DIR__ . '/' . $filename ), TRUE );
		if ( self::isLocal() ) {
			return 'http://localhost:3000/Tests/1_Demo/assets/' . $filename;
		}

		return $json[ 'app' ][ 'css' ];
	}
	
	public static function isLocal () {
		var_dump($_SERVER);
		return strpos( $_SERVER[ 'SERVER_NAME' ], '127.0.0.1' ) !== FALSE;
	}

}
