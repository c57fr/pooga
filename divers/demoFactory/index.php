<?php namespace Gc7\Divers\DemoFactory;

spl_autoload_register( function ( $class ) {
	$arr = explode( '\\', $class );
	include end( $arr ) . '.php';
} );

var_dump( CarFactory::create( 'BerLiNe' ) );
