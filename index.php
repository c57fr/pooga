<?php
/*
 *
 * // TODOLI @ finir !
 *
$fichierJson = "./zChoixApp/choixApp.json";
$choixApp    = json_decode( file_get_contents( $fichierJson ) );

var_dump( $choixApp );

echo 'App activée: ' . $choixApp->{'apps'}[ $choixApp->{'activeApp'} ]->{'name'} . '<hr>';

$choixApp->activeApp = 0;

echo 'App activée: ' . $choixApp->{'apps'}[ $choixApp->{'activeApp'} ]->{'name'} . '<hr>';

file_put_contents( $fichierJson, json_encode( $choixApp ) );


echo $choixApp->activeApp;

exit;
$file     = fopen( 'zChoixApp/appEnCours.txt', 'r+' );
$choixApp = trim( fgets( $file, 10 ) );
var_dump( $choixApp );
fclose( $file );

switch ( $choixApp ):
	case 'blog':
		echo 'blog';
		break;
	default:
		echo 'tests';
endswitch;
*/


// Lancement du Blog
require './blog/public/index.php';

// Lancement des différents petits tests
//require './divers/index.php';
