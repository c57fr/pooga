<h1>Exemple Basique</h1><?php

use Basic\Nombre;
use Basic\ChaineNumerique;
use Basic\Operation;

include 'autoloader.php';

$n = new Nombre();
$n->setNombre( 22 );

$vN = new ChaineNumerique();
$vN->setValeurNum( '33' );

var_dump( [
	          'n (' . get_class( $n ) . ')'   => $n->getValue(),
	          'vN (' . get_class( $vN ) . ')' => $vN->getValue()
          ] );

echo '(Nombre) $n + (ChaineNumerique) $vN = ' . Operation::somme( $n, $vN ) . '<hr>';
var_dump( Operation::somme( $n, $vN ) );

