<?php
use Gc7\Tuto\Session;
use Gc7\Tuto\Flash;

include 'autoloader.php';

//$session = new Session();
//var_dump(count($session));
//var_dump($session->offsetExists('oki'));
//$session->set('animal', 'chat');
//var_dump($session->get('animal'));
//var_dump($session['animal']); // grâce à ArrayAccess


$session = new Session();
$flash = new Flash($session);

$flash->set('Affichage d\'un message Flash... (Test)', 'success');
?>
<h4 style="text-align: center">
<a href="/?pg=autrePage_1.php">autrePage_1</a>
 | <a href="/?pg=autrePage_2.php">autrePage_2</a>
 | <a href="/?pg=autrePage_3.php">autrePage_3</a>
</h4>

<hr>
J'ai enregistré un message Flash...<br>
... Le voir sur l'une des 3 pages ci-dessus
