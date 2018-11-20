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

function comp($a, $b) : string
{

  return '<strong>$a</strong> (' . $a . ') est '
    . (($a === $b) ? 'égal à' : (($a > $b) ? 'plus grand' : 'plus petit'))
    . ' <strong>$b</strong> (' . $b . ')';
}



