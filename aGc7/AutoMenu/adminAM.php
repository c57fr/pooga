<?php namespace AutoMenu;

require './../../vendor/autoload.php';

//var_dump($_POST);

// todoli Vériff de la cohérence json // folders

include 'parts/header.php';
$adm = Admin::getInstance();
echo $adm->getCoherence();

if ( isset( $_POST[ 'Nom_du_dossier' ] ) && ! empty( $_POST[ 'Nom_du_dossier' ] ) ) {
	$adm->newDossier( $_POST[ 'Nom_du_dossier' ] );
	unset( $_POST[ 'Nom_du_dossier' ] );
}

include 'parts/mainForm.php';


include 'parts/mainActuels.php';


include 'parts/footer.php';
