<h1 style="margin-top: 30px">Accueil <?= ucfirst( \AutoMenu\AutoMenu::getAppName() ); ?></h1>
<a href="https://discordapp.com/channels/85154866468487168/85154866468487168" target="_blank">Dials</a>
<hr>

<?php

function cmp($a, $b) {
  return (($a <=> $b).'</br>');
}

echo '1 <=> 2 = '. cmp(1,2);
echo '2 <=> 2 = '.cmp(2,2);
echo '3 <=> 2 = ' . cmp(3,2);
