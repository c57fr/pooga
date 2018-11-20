<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="LC">
	<title>AdminGC7</title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
	-->
	<link rel="stylesheet" href="/aGc7/assets/css/combined.css">
	<link rel="icon" href="../../../favicon.ico"/>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="justify-content:flex-start">
	<a class="navbar-brand" href="/" title="Appli principale"><img
			src="/aGc7/assets/img/logo_c7_41x25_tr.png" alt="Logo Gc7"></a>
	<a class="navbar-brand" href="/aGc7/AutoMenu/adminAM.php" title="Accueil Admin">Admin</a>
	<a class="topBarLogoAM admin" href="/?c=c" title=" <?= $_SERVER[ 'REQUEST_URI' ] ?> " alt="Logo AM"
	   title="Passer au service suivant"><?= \Gc7\Helper\GC7Tip::uchr( 10160 ) ?></a>
</nav>
<div class="container-fluid" id="adminAM">

