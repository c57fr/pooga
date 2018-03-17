<h1>Accueil Momo</h1>
<hr>
<?php


$bdd = new PDO("mysql:host=localhost;dbname=pooga", "root", "");
$bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$bdd -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

$req = $bdd->prepare("SELECT id, username, password FROM users where id=?");
$req->execute([1]);
$rep = $req->fetch();

var_dump($rep);
