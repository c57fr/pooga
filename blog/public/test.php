<div class="container">
	<?php


	use Gc7\Blog\Demo\Car;
	use Gc7\Blog\Demo\CarCitadine;

	$app->setTitle( 'Test' );
	//var_dump( $app );


	$v = new Car;
	var_dump($v);

	$v = new CarCitadine;
	var_dump($v);


	//echo $app->settings->settings->dbUser;
	//echo $config->detailsKey('dbName');
	?>
</div>
