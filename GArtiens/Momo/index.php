<h1 style="margin-top: 30px">Accueil Momo</h1>
<hr>
<?php
session_start();
$_SESSION[ 'id' ] = 1;

$bdd = new PDO( 'mysql:host=localhost;dbname=pooga', 'root', '' );
$bdd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
$bdd->setAttribute( PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ );

$req = $bdd->prepare( 'SELECT id, username, password FROM users WHERE id=?' );
$req->execute( [ htmlspecialchars( $_SESSION[ 'id' ] ) ] );
$rep = $req->fetch();

var_dump( $rep );

echo ucfirst( $rep->username );

$req2 = $bdd->query( 'SELECT id, username, password FROM users WHERE id=1' );
$rep2 = $req2->fetch();

var_dump( $rep2 );
