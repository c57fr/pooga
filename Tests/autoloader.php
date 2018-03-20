<?php

spl_autoload_register( function ( $class ) {
	$bt  = debug_backtrace()[ 1 ][ 'file' ];
	$arr = explode( '\\', $class );
	var_dump( dirname( $bt ) . '/' . end( $arr ) . '.php');
	include dirname( $bt ) . '/' . end( $arr ) . '.php';
} );
