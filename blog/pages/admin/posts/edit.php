<?php
use \Core\HTML\BootstrapForm;

$postTable = $app->getTable( 'Post' );

if ( ! empty( $_POST ) ) {

//var_dump( $_POST );
//var_dump($postTable);

	$result = $postTable->update( $_GET[ 'id' ], [
		'titre'   => $_POST[ 'titre' ],
		'contenu' => $_POST[ 'contenu' ]
	] );

	if ( $result ) {
		?>
		<div class="alert alert-success">La sauvegarde a bien été réalisée !</div>
		<?php
	}
	else {
		?>
		<div class="alert alert-danger">>La sauvegarde n\'a pas pu être réalisée...</div>
		<?php
	}
}

$post = $postTable->find( $_GET[ 'id' ] );
//var_dump($post);

$form = new BootstrapForm( $post );
?>

<h1>Édition de l'article n°<?= $_GET[ 'id' ] ?></h1>
<form method="post">
	<?= $form->input( 'titre', 'Titre de l\'article' )
	    . $form->input( 'contenu', 'Contenu', [ 'type' => 'textarea' ] )
	    . $form->submit( 'Sauvegarder' ) ?>
</form>

