<?php
// IMPORTANT: Lisez ce qui suit !

/* Ne pas modifier cette page sauf en (plus ou moins toute)
 *  connaissance de cause... lol !
 *
 * Par contre, vous pouvez immédiatement:
 *
 *    - Taper ce que vous voulez dans le fichier
 *      index.php posé dans le dossier accueil
 *
 *    - Crééer, à côté de ce dossier accueil, tout dossier
 *      'frère' que vous souhaitez, et y écrire au minimum
 *      un fichier index.php
 *
 * Bon usage, et bon prochain Git :-) !
 *
*/

use AutoMenu\AutoMenu;

$p = $_GET[ 'p' ] ?? 'accueil';
// Pour cibler une autre page que index.php du dossier
$pg = $_GET[ 'pg' ]?? null;

$page = new AutoMenu( __DIR__ );
//var_dump( $page );

ob_start();

$page->action( $p, $pg );

$content = ob_get_clean();

// Pour avoir un autre template pour ce dossier
// Inverser les 2 commentaires ci-dessous

//require $page->getFolder() . 'accueil/template.php';
require $_SERVER[ 'DOCUMENT_ROOT' ] . '/aGc7/AutoMenu/parts/divers/template.php';

class Demo {

}

$d = new Demo();



//todoli tuto routeur https://www.grafikart.fr/tutoriels/php/router-628

