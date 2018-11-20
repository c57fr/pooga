<?php namespace Gc7\Tuto;
//use Gc7\Tuto;
//require 'Interface/accueil/Session.php';

include 'autoloader.php';

$session = new Session();
$flash=new Flash($session);

echo $flash->get();

?>
Une autre (La quatrième !!!) page pour afficher le message Flash...<br><br>
(Passer par la page d'accueil pour le re-enregistrer ;-) !
