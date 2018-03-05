<?php
use \Core\HTML\BootstrapForm;

$postTable = $app->getTable( 'Post' );

if ( ! empty( $_POST ) ) {

var_dump( $_POST );
//var_dump($postTable);

$ctrl = (!empty($_POST[ 'titre']) && !empty($_POST[ 'contenu' ] ));

	$result = $postTable->create( [
		                              'titre'       => $_POST[ 'titre' ],
		                              'contenu'     => $_POST[ 'contenu' ],
		                              'category_id' => $_POST[ 'category_id' ]
	                              ] );

	if ( $result && $ctrl ) {
		header( 'Location: ?a=posts.edit&id=' . $app->getDb()->lastInsertId() );
		?>
		<div class="alert alert-success">L'article a bien été enregistré !</div>
		<?php
	}
	else {
		?>
		<div class="alert alert-danger">La sauvegarde n'a pas pu être réalisée...</div>
		<?php
	}
}

//$post = $postTable->find( $_GET[ 'id' ] );
//$this->dbg($post);

$categories = $app->getTable( 'Category' )->extract( 'id', 'titre' );
//$this->dbg($categories);

$form = new BootstrapForm( $_POST );
?>

<h1>Ajout d'un article</h1>
<form method="post">
	<?= $form->input( 'titre', 'Titre de l\'article' )
	    . $form->select( 'category_id', 'Categorie', $categories )
	    . $form->input( 'contenu', 'Contenu', [ 'type' => 'textarea' ] )
	    . $form->submit( 'Sauvegarder' ) ?>
</form>

