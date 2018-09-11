<style>#divers {margin-top:30px;}</style>

<h1>Accueil Leknoppix</h1>
<p>Exemple d'utilisation des expression régulières avec preg_match()</p> 
<hr>

<?php

$arr = [ 'mot1', 'mot2', 'mot3' ];

$theTexte = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla earum, soluta, quisquam necessitatibus minima saepe in voluptatum quae ex, maxime voluptatem adipisci praesentium temporibus nobis tempora unde? Ullam, enim nam mot2 quisquam necessitatibus minima saepe in voluptatum quae ex, maxime.';

var_dump( preg_match( '/\b' . implode( '|', $arr ) . '\b/', $theTexte ) );
