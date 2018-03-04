<?php
use \Core\HTML\BootstrapForm;

$postTable = $app->getTable( 'Post' );

if ( ! empty( $_POST ) ) {

//var_dump( $_POST );
//var_dump($postTable);

	$result = $postTable->update( $_GET[ 'id' ], [
		'titre'       => $_POST[ 'titre' ],
		'contenu'     => $_POST[ 'contenu' ],
		'category_id' => $_POST[ 'category_id' ]
	] );

	if ( $result ) {
		?>
		<div class="alert alert-success">L'article a bien été enregistré !</div>
		<?php
	}
	else {
		?>
		<div class="alert alert-danger">>La sauvegarde n\'a pas pu être réalisée...</div>
		<?php
	}
}

$post = $postTable->find( $_GET[ 'id' ] );
//$this->dbg($post);

$categories = $app->getTable( 'Category' )->extract( 'id', 'titre' );
//$this->dbg($categories);

$form = new BootstrapForm( $post );
?>

<h1>Édition de l'article n°<?= $_GET[ 'id' ] ?></h1>
<form method="post">
	<?= $form->input( 'titre', 'Titre de l\'article' )
	    . $form->select( 'category_id', 'Categorie', $categories )
	    . $form->input( 'contenu', 'Contenu', [ 'type' => 'textarea' ] )
	    . $form->submit( 'Sauvegarder' ) ?>
</form>

