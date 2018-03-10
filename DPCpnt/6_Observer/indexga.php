<?php
// ToDoLi Cf. Packagist League/Event
require dirname( __DIR__ ) . '/autoloader.php';
require dirname( dirname( __DIR__ ) ) . '/vendor/autoload.php';

use Event\Emitter;

$emitter = Emitter::getInstance();

$emitter->on( 'Comment.created', function ( $firstname, $lastname ) {
	echo $firstname . ' ' . $lastname . ' a posté un nouveau commentaire<br>';
} );

$emitter->emit( 'Comment.created', 'John', 'Doe' );

$user = new stdClass();
$emitter->emit( 'User.new', $user );


$pFace = [ ];
$pFace = range( 0, 10 );
unset( $pFace[ 0 ] );
var_dump( $pFace );

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
	echo $k . ' : ' . $v . ' ' . ( $v / 1000 ) . ' <br>';
}


echo $nb;

var_dump( $s );

//echo $k. ' '.$p.' < br>';
//
//
//foreach ( $dePipe as $k=>$d ) {
//	echo $d . ' ';
//}
//
//array_map( function () {
//
//}, $dePipe );
////$dePipe[5]=5;

