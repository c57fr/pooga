<h1><?= $form->titre ?></h1>
<form method="post">
	<?= $form->input( 'titre', 'Titre de l\'article' )
	    . $form->select( 'category_id', 'Categorie', $categories )
	    . $form->input( 'contenu', 'Contenu', [ 'type' => 'textarea' ] )
	    . $form->submit( 'Sauvegarder' ) ?>
</form>

