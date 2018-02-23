<?php use Gc7Ga\Gc7;

$appName   = ucfirst( \Gc7\Divers\AutoMenu\AutoMenu::getAppName() );
$Doss_Suiv = '__Dossier__Suivant';
$dossSuiv  = preg_replace( '/__/', ' ', $Doss_Suiv );

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="LC">
	<title><?= $page->title ?></title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="blog/public/css/style.css">
	<link rel="icon" href="./favicon.ico"/>
</head>

<body>

<span class="uri"><a href="./Gc7Ga/adminGc7.php"><?= $_SERVER[ 'REQUEST_URI' ] ?></a></span>

<div class="navbar navbar-inverse navbar-fixed-top">

	<a class="topbar-logo" href="/?c=<?= $Doss_Suiv ?>" title="<?= $dossSuiv ?>">
		<svg width="35" height="45">
			<svg viewBox="0 0 100.3 80.2" id="logo" width="100%" height="100%">
				<path fill="#FFF"
				      d="M87.5 5.7C74.8 11.5 62.3 17.6 50.2 24c-.1 0-.2-.1-.2-.1-12.2-6.4-24.5-12.4-37.2-18.2C8.6 3.8 4.3 1.9 0 .1c1.2 18.7 2.4 37.5 3.5 56.2 16.1 7.5 31.6 15.5 46.6 24 3.7-2.1 7.5-4.2 11.3-6.3 7.6-4.1 15.4-8.1 23.3-12 4-1.9 7.9-3.9 12-5.7 1.2-18.7 2.4-37.5 3.5-56.2-4.2 1.8-8.5 3.7-12.7 5.6zm-2.1 45c-8 3.9-15.9 7.9-23.7 12 .1-3.8.1-7.5.2-11.3 7.9-4.1 15.9-8.1 24-12-.2 3.8-.4 7.5-.5 11.3zm1-22.5C78.2 32 70 36 62 40.2c-4 2.1-8 4.2-11.9 6.3-.1 0-.2-.1-.2-.1-3.9-2.1-7.7-4.1-11.7-6.1-4-2.1-8-4.1-12.1-6.1.1 3.8.2 7.5.4 11.3 4 2 8 4 11.9 6.1.1 3.8.1 7.5.2 11.3-7.8-4.1-15.6-8.1-23.7-12-.5-11.2-1.1-22.5-1.6-33.7C25.8 22.7 38 28.8 49.9 35.1c.1 0 .1.1.2.1v.1h.1s.1 0 .1.1v-.1C62.2 29 74.4 22.9 87 17.1c-.2 3.6-.4 7.3-.6 11.1z"></path>
			</svg>
		</svg>
	</a>

	<div class="container">
		<a class="brand" href="/?p=accueil"><span class="siteName"><?= strtoupper($appName) ?></span></a>
		<?= $page->autoMenu ?>
	</div>
</div>

<div class="container" id="divers">
	<?= $content ?>
</div>

</body>
</html>
