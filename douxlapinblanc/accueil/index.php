<h1>Accueil <?= ucfirst( \AutoMenu\AutoMenu::getAppName() ); ?></h1>

<?php

$pFace = [ ];
$pFace = range( 0, 10 );
unset( $pFace[ 0 ] );

$nb = 0;
$s  = range( 1, 7 );
unset( $s[ 0 ] );

for ( $i = - 1; $i < 99999; $i ++ ) {
$nb ++;
$res = array_rand( $pFace );
$res = $res < 6 ? $res : 6;
$s[ $res ] ++;
}

$somme = 0;
foreach ( $s as $k => $v ) {

$somme += $v;
echo $k . ' : ' . ( $v / 1000 ) . ' <br>';
}


echo $nb;
