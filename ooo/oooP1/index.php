<h1>Page 1 Ooo</h1>

<?php

function div ( $x, $y ) {
	if ( ! $y ) {
		throw new Exception( $x . ' / ' . $y . ' = IMPOSSIBLE (Division par zéro interdite !)' );
	}

	return $x / $y;
}

try {
	$res = div( 10, 0 );
} catch ( Exception $e ) {
	echo $e->getMessage();
}

