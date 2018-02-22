<?php
//var_dump($_POST);

include 'assets/parts/header.php';

use Gc7Ga\Admin;

require 'Admin.php';

$adm = Admin::getInstance();

if (isset($_POST['Nom_du_service']) && !empty($_POST['Nom_du_service']) ){
//echo '<h1>New Service</h1>';
	echo $adm->newService($_POST['Nom_du_service']);
	unset($_POST['Nom_du_service']);
}

include 'assets/parts/mainForm.php';

include 'assets/parts/mainActuels.php';

$adm->aff();
include 'assets/parts/footer.php';
