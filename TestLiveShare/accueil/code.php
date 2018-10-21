<?= 'ICI le résultat de notre code en PHP... '; ?><i class="fa fa-smile-o" aria-hidden="true"></i><hr>
<?php

// ICI, vas-y...: for ($i= etc....)

for ($i = 0; $i <= 100; $i++) {

  if ($i == 51) echo "<h3 class='cadrecentre'>Ah, enfin, l'heure du 51... !!! Lol</h3>";

  echo $i . ' ';
}





// Note là, tu lui dis: tu pars de 0, tu ajoute 1 à chaque boucle, et tu le fais tant que $i > 100... bref, il va pas le faire du coup !!! ;-)

//Vaut mieux comprendre: Tant que $i < 100 ;-)..... et note c'est " ; " entre les expresqsions, pas ' ,' ;-)


