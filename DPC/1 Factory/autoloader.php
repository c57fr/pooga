<?php

spl_autoload_register( function ( $class ) {
	$arr = explode( '\\', $class );
	include end( $arr ) . '.php';
} );
