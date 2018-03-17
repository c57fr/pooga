<h1>Accueil Momo</h1>
<hr>
<?php


$bdd = new PDO("mysql:host=localhost;dbname=pooga", "root", "");
$bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$req = $bdd->prepare("SELECT id, username, password FROM users");
$req->execute();
$rep = $req->fetchAll();

var_dump($rep);
