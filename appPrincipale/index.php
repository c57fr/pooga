<?php
//include $_SERVER[ 'DOCUMENT_ROOT' ] . '/appPrincipale/exec.php';
include 'exec.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="LC">
	<title>AutoMenu | Gc7</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="./agc7/assets/css/bootstrap400.min.css">
	<link rel="stylesheet" href="/agc7/assets/css/combined.css">

	<link rel="icon" href="../favicon.ico"/>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="justify-content:flex-start">
	<a href="/" style="font-size: 1.1em; margin-right: 7px"><?= \Gc7\Helper\GC7Tip::uchr( 10160 ) ?></a>
	<!--<a class="navbar-brand" href="/?c=c" title="Passer au service suivant">AutoMenu</a>-->
	<a class="navbar-brand" href="/" title="Accueil Admin">Exemple Menu</a>

	<a class="topBarLogoGc7" href="/aGc7/AutoMenu/adminAM.php" title=" <?= $_SERVER[ 'REQUEST_URI' ] ?> " alt="Logo Gc7"><img
			src="./aGc7/assets/img/logo_c7_41x25_tr.png" alt=""></a>
	<a class="topBarLogoAM" href="/?c=c" title=" <?= $_SERVER[ 'REQUEST_URI' ] ?> "
	   alt="Logo Gc7"><?= \Gc7\Helper\GC7Tip::uchr( 10160 ) ?></a>
</nav>
<div class="container-fluid">
	<?= $content ?>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<?php
echo $jsScript ?? null
?>


</body>
</html>

