<h1>Accueil <?= ucfirst( $_GET[ 'p' ] ) ?></h1>
<?php

$nbLances = 1e5;

$pFace = range( 1, 10 );

$s = range( 1, 7 );

$tirage = function ( $pFace ) {
	$res = array_rand( $pFace );
	$res = $res < 5 ? $res : 5;

	return $res;
};

for ( $i = 0; $i < $nbLances; $i ++ ) {
	$res = $tirage( $pFace );
	$s[ $res ] ++;
}

$somme = 0;
foreach ( $s as $k => $v ) {
	$somme += $v;
	echo $k . ' : ' . ( $v / $nbLances ) . ' <br>';
}

echo '<hr>' . Gc7\Helper\GC7Tip::nf( $i, 0 ) . ' lancés';
