<?php use AutoMenu\Gc7;
//unset($_GET['c']);
$appName   = ucfirst( AutoMenu\AutoMenu::getAppName() );
$Doss_Suiv = '__Dossier__Suivant';
$dossSuiv  = preg_replace( '/__/', ' ', $Doss_Suiv );
//var_dump($_GET);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="LC">
	<title><?= $page->title ?></title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="./agc7/assets/css/bootstrap400.min.css">
	<link rel="stylesheet" href="/agc7/assets/css/combined.css">
	<link rel="icon" href="/favicon.ico" />
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark navBarLeft fixed-top" style="justify-content:flex-start">

	<a class="navbar-brand" href="/?p=accueil"><span class="siteName"><?= strtoupper($appName) ?></span></a>
	<?= $page->autoMenu ?>

	<a class="topBarLogoGc7" href="/aGc7/AutoMenu/adminAM.php" title=" <?= $_SERVER[ 'REQUEST_URI' ] ?> " alt="Logo Gc7"><img
			src="./aGc7/assets/img/logo_c7_41x25_tr.png" alt=""></a>
	<a class="topBarLogoAM" href="/?c=c" title=" <?= $_SERVER[ 'REQUEST_URI' ] ?> "
	   alt="Logo Gc7"><?= \Gc7\Helper\GC7Tip::uchr( 10160 ) ?></a>

</nav>

<div class="container-fluid" id="divers">
	<?= $content ?>
</div>

</body>
</html>
