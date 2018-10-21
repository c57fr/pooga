<h1>Accueil <?= ucfirst(\AutoMenu\AutoMenu::getAppName()); ?><br>avec Visual Studio Code</h1>
<link rel="stylesheet" href="./TestLiveShare/accueil/css/live.css">

<div class="cadrecentre">
<!--
<h3><a href="https://insiders.liveshare.vsengsaas.visualstudio.com/join?4FCCCA256BFCD56406E3A3B0993ACFA30011">Lien de la session</a></h3>-->
<h3><a href="http://09543964.ngrok.io?c=TestLiveShare" target="_blank"><i class="fa fa-2x fa-code"></i><span> Voir la page en live</span></a></h3>
</div>
<p>Ici, on peut dial... Lol... Mais <?= 'aussi coder ;-) !' ?></p>

<hr>

<h2>Salut @ toi... Veux-tu faire un peu de PHP ?</h2>
<section>
<?php
include './TestLiveShare/accueil/code.php';
?>

Salut Momo <i class="fa fa-smile"></i>
<hr>

</section>