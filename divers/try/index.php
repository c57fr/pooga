<?php

$div = function ( $x, $y ) {
	if ( ! $y ) {
		throw new InvalidArgumentException( $x . ' / ' . $y . ' = IMPOSSIBLE (En maths, division par zéro interdite !)' );
	}
	else {
		echo $x . ' / ' . $y . ' = ' . $x / $y . ' (Oki !)<br>';
	}

	return $x / $y;
};

$code = <<<'EOT'
<pre><code>
function div ( $x, $y ) {
	if ( ! $y ) {
		throw new Exception(
			$x . ' / ' . $y
			. ' = IMPOSSIBLE (En maths, division par zéro interdite !)'
		);
	}
	else {
		echo $x . ' / ' . $y . ' = ' . $x / $y . ' (Oki !)<br>';
	}

	return $x / $y;
}

try {
	$div( 10, 2 );
	$div( 10, 0 );
} catch ( Exception $e ) {
	echo $e->getMessage() . '<br><br>';
}

</code></pre>
EOT;

echo $code;

try {
	$div( 10, 2 );
	$div( 10, 0 );
} catch ( Exception $e ) {
	echo $e->getMessage() . '<br><br>';
}
