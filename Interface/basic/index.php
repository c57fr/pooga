<h1>Exemple Basique</h1><?php

use Basic\Nombre;
use Basic\ChaineNumerique;
use Basic\Operation;

include 'autoloader.php';

$n = new Nombre();
$n->setNombre( 22 );

$vN = new ChaineNumerique();
$vN->setValeurNum( '33' );

echo '<pre>';
print_r ( [
	          'n ('  . get_class( $n ) . ')'  => $n->getValue(),
	          'vN (' . get_class( $vN ) . ')' => $vN->getValue()
          ] );
echo '</pre>';

echo '(Nombre) $n + (ChaineNumerique) $vN = ' . Operation::somme( $n, $vN ) . '<hr>';
echo '<pre>';
var_dump( Operation::somme( $n, $vN ) );
echo '</pre>';
