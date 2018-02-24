<?php
//var_dump($_POST);
require 'Admin.php';
use Gc7Ga\Admin;
$adm = Admin::getInstance();

include 'assets/parts/header.php';

if ( isset( $_POST[ 'Nom_du_dossier' ] ) && ! empty( $_POST[ 'Nom_du_dossier' ] ) ) {
	$adm->newDossier( $_POST[ 'Nom_du_dossier' ] );
	unset( $_POST[ 'Nom_du_dossier' ] );
}

include 'assets/parts/mainForm.php';

// todoli Vériff de la cohérence json // folders

include 'assets/parts/mainActuels.php';


include 'assets/parts/footer.php';
