<h1 style = "margin-top: 30px">Accueil Xc2Dn</h1>
<hr>
<?php

$json_source = file_get_contents(__DIR__.'/test.json');
$json_data = json_decode($json_source);
echo '<pre>';
// var_dump($json_data->menu);
print_r($json_data->menu);
echo'</pre>';

echo 'PHP version = '. phpversion();
