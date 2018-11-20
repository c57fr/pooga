<?php

spl_autoload_register( function ( $class ) {
	$arr = explode( '/', $class );
	//var_dump($arr);
	include end( $arr ) . '.php';
} );
