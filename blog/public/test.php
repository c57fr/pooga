<div class="container">
	<?php
	$app        = App::getInstance();
	$app->title = 'Test';

	$goodVar = $inexistanteVar ?? 2 ** 3;
	?>

	<h1>Page pour Test rapide</h1>


	<p>Un octet contient <?= $goodVar ?> bits... ;-)...</p>


</div>
