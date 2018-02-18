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
	<style>

	</style>
	<link rel="stylesheet" href="blog/public/css/style.css">
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<a class="brand" href="/?p=accueil"><span class="siteName">POOGA</span></a>
		<?= $page->autoMenu ?>
	</div>
</div>

<div class="container" id="divers">
	<?= $content ?>

</div>

</body>
</html>
