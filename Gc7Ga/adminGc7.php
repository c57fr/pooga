<?php
//var_dump($_POST);

include 'assets/parts/header.php';

use Gc7Ga\Admin;

require 'Admin.php';

$adm = Admin::getInstance();

if ( isset( $_POST[ 'Nom_du_dossier' ] ) && ! empty( $_POST[ 'Nom_du_dossier' ] ) ) {
	$adm->newDossier( $_POST[ 'Nom_du_dossier' ] );
	unset( $_POST[ 'Nom_du_dossier' ] );
}

include 'assets/parts/mainForm.php';

// todoli Dans liste, ajouter poubelle pour détruire dossier récursivemlent + enregistrement dans le json + modal pour confirm car action irréversible

include 'assets/parts/mainActuels.php';

$adm->aff();
include 'assets/parts/footer.php';
