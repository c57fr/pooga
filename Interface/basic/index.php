<h1>Exemple Basique</h1><?php

use Basic\Nombre;
use Basic\ChaineNumerique;
use Basic\Operation;

include 'autoloader.php';

$n = new Nombre();
$n->setNombre( 2 );

$vN = new ChaineNumerique();
$vN->setValeurNum( '3' );

var_dump( [
	          'n (' . get_class( $n ) . ')'   => $n->getValue(),
	          'vN (' . get_class( $vN ) . ')' => $vN->getValue()
          ] );

//echo '(Nombre) $n + (Nombre) $m = ' . Operation::somme( $n, $m ) . '<br>';
echo '(Nombre) $n + (ChaineNumerique) $vN = ' . Operation::somme( $n, $vN ) . '<hr>';
var_dump( Operation::somme( $n, $vN ));


