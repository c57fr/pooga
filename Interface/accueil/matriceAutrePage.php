<?php

$f = function ( $n ) {
	$arr = [ ( $n + 1 ) % 3 ?: 3, ( $n + 2 ) % 3 ?: 3 ];
	sort($arr);
	return $arr;
};
$lk1 = $f($n)[0];
$lk2 = $f($n)[1];
?>
	<h4 style="text-align: center">
		<a href="/">Accueil</a>
	| <a href="/?pg=autrePage_<?= $lk1 ?>>.php">autrePage_<?= $lk1 ?></a>
	| <a href="/?pg=autrePage_<?= $lk2 ?>>.php">autrePage_<?= $lk2 ?></a>
	</h4>
	<h1>autrePage_<?= $n ?></h1>

<?php
include 'autoloader.php';

use Gc7\Tuto\Session;
use Gc7\Tuto\Flash;

$session = new Session();
$flash   = new Flash( $session );

echo $flash->get();


