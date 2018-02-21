<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="LC">
	<title><?= App::getInstance()->title ?></title>

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<style>

	</style>
	<link rel="stylesheet" href="blog/public/css/style.css">
	<link rel="icon" href="./blog/public/pages/favicon.ico"/>
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<a class="brand" href="/"><span class="siteName"><?= \Gc7Ga\Gc7::$pageTitle ?></span></a>
		| <a href="/?c=tests" title="Click ici pour basculer en Tests">Change</a>
		| <a href="/?p=test" title="Click ici pour basculer en Tests">Test</a>
		<!--| <a href="/?c=admin" title="Click ici pour basculer en Tests">AdminGc7</a>-->
		| <a href="./Gc7Ga/adminGc7.php" title="Click ici pour basculer en Tests">AdminGc7</a>
	</div>
</div>

<div class="container">
	<?= $content ?>
</div>
<script type="text/javascript">
	window.cookieconsent_options = { "message": "Les cookies nous aident à assurer nos services. En utilisant nos services, vous acceptez l'utilisation des cookies.", "dismiss": "Okay", "learnMore": "More info", "link": "/info/cookies/", "theme": "dark-bottom" };
</script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
</body>
</html>
