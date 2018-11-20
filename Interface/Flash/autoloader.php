<?php

spl_autoload_register( function ( $class ) {
	$arr = explode( '\\', $class );
	include 'Interface/accueil/' . end( $arr ) . '.php';
} );
