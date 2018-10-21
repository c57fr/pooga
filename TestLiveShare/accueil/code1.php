<?= 'ICI le résultat de notre code en PHP... '; ?><i class="fa fa-smile-o" aria-hidden="true"></i><hr>
<?php

// echo null ?? null ?? 7;

$a = 5;
$b = 2;

$arr = [$a, $b];

echo comp($a, $b);
sort($arr);

echo "<pre>";
print_r($arr);
echo "</pre>";

?>

Tu vois donc aussi la page en live :-) ?
oui je l'ai vu en actualisant 
-

OK, super, allez, test.... Un ch'tite bouclle qui va de 1 à 10100... @ toi de jouer !


<?php

echo "ICI, c'est du VRAI PHP !!!<hr>";
echo "j'ai constaté";


function comp($a, $b) : string
{

  return '<strong>$a</strong> (' . $a . ') est '
    . (($a === $b) ? 'égal à' : (($a > $b) ? 'plus grand' : 'plus petit'))
    . ' <strong>$b</strong> (' . $b . ')';
}



