<?php namespace Test\Demo;


class Asset {
	
	public static function path ( $filename ) {
		$path = explode( '.', $filename );
		//var_dump( [ 'path' => $path ] );
		$json = json_decode( file_get_contents( __DIR__ . '/assets/assets.json' ), TRUE );
		//var_dump( [ 'json' => $json ] );
		$chemin = '/assets/' . $path[ 1 ] . '/';
		if ( self::isLocal() ) {
			$chemin = $_SERVER[ 'HTTP_HOST' ] . '/Tests/1_Demo' . $chemin;
		}

		return $chemin . $json[ $path[ 0 ] ][ $path[ 1 ] ];
	}

	public static function isLocal () {
		return preg_match( '/127.0.0|localhost/', $_SERVER[ 'HTTP_HOST' ] ) !== FALSE;
	}

}
