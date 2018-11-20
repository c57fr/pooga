<style>#divers {margin-top:30px;}</style>

<?php
echo '$_SERVER[\'REQUEST_URI\']<pre>';

print_r( [
	'REQUEST_URI'=>$_SERVER['REQUEST_URI'],
	$_SERVER[ 'REQUEST_URI' ],
	'SERVER' => $_SERVER
	] );
	
echo '</pre>';
