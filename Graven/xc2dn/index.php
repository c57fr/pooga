<h1 style = "margin-top: 30px">Accueil Xc2Dn</h1>
<hr>
<?php

$json_source = file_get_contents(__DIR__.'/test.json');
$json_data = json_decode($json_source);
var_dump($json_data->menu);

echo 'PHP version = '. phpversion();
