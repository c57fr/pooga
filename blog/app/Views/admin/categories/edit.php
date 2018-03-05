<h1><?= $form->titre ?></h1>
<form method="post">
	<?= $form->input( 'titre', 'Nom de la categorie' )
	    . $form->submit( 'Sauvegarder' ) ?>
</form>

