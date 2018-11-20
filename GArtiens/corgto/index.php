<h1 style = "margin-top: 30px">Accueil Corgto</h1>
<hr>
<?php

require 'User.php';
require 'Address.php';

$json_source = file_get_contents(__DIR__.'/users.json');
$userDB = json_decode($json_source);


echo 'Données sources concernant un utilisateur: ';
echo '<pre>';
print_r($userDB);
echo'</pre>';


$user = new User (
  $userDB->firstName,
  $userDB->lastName,
  $userDB->address
);

echo 'Voilà les renseignements concernant '.ucfirst($userDB->firstName). ' '.substr(strtoupper($userDB->lastName),0,1). '. (Model User)';

echo '<pre>';
print_r($user);
echo '</pre>';

$userLocation = $user->getUser();

echo 'Données json retournées par getUser(): ';
echo '<pre>';
print_r($userLocation);
echo '</pre>';


echo '<hr>PHP version = '. phpversion();
