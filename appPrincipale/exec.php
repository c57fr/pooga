<?php
require __DIR__ . '/../vendor/autoload.php';
//require $_SERVER[ 'DOCUMENT_ROOT' ] . '/vendor/autoload.php';
//var_dump(__DIR__);


$encart = <<<'EOT'
<p id="encart">
	<span class="smaller">
		</span><span class="policeGc7 fdBlanc sz05"> Auto<span class="maj">M</span>enu</span>
EOT;
$encart .= '<span style="font-size: .65em;margin-left: 20px;">'.\Gc7\Helper\GC7Tip::uchr( 10160 ).'</span>';
$encart .= <<<'EOT'
	</span>
</p>
EOT;

$content = $encart . '<h2>Pour dev, ce fichier remplace la page d\'accueil de votre appli principale.</h2>';
/*
//   Tests du chargement des différentes classes et fonction avec composer
//

use AutoMenu\TestAutoMenuClass;
use AutoMenu\Test\TestClass;
use Gc7\Helper\BootstrapForm;
use Gc7\Helper\GC7Tip;
use Gc7\Helper\Notif;

$inexistant ?? TestAutoMenuClass::aff(); // Classe TestAutoMenuClass : OK !
TestClass::aff(); // Classe Test : OK !

$a=0;
$a ?: testGc7(); // Fonction GC7 : OK !


echo Notif::aff( 'Notif GC7 : OK !' );


$form = new BootstrapForm( $_POST );
echo '<form method="post" action="#">
';
echo $form->input( 'username' )
     . $form->input( 'password' )
     . $form->submit()
     . '</form>';

$n = $form->date();
echo $n->format( 'd/m/Y - H:i:s' ).'<hr>';


$ch = 'Une chaîne___ de_caractères'; echo $ch. ' => '. GC7Tip::toCamelCase($ch).'<hr>';

*/


//use Gc7Ga\Admin;
//require 'Gc7Ga/Admin.php';

//$adm = Admin::getInstance();
//$adm->gereChange();


//////////////////////////////////////////////////////////////////////////////////
// Ne sera que qd (plus nécessaire)
//$adm->getNotif();


//$appALancer = Gc7Ga\Gc7::getInstance();
//echo var_dump($adm->getNotif());
//$appALancer->gereChange();
//$adm->aff();


//echo '<h1>' . $appALancer->lancer() . '</h1>';

// Lancement du Blog
//require './blog/public/index.php';

// Lancement des différents petits tests
//require './divers/index.php';
//$appALancer->title= 'lologa';
//var_dump( $appALancer );
