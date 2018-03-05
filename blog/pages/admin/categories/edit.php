<?php
use \Core\HTML\BootstrapForm;

$table = $app->getTable( 'Category' );

if ( ! empty( $_POST ) ) {

	//var_dump( $_POST );
//var_dump($table);

	$result = $table->update( $_GET[ 'id' ], [
		'titre' => $_POST[ 'titre' ]
	] );

	if ( $result ) {
		?>
		<div class="alert alert-success">La catégorie a bien été modifiée !</div>
		<?php
	}
	else {
		?>
		<div class="alert alert-danger">>La sauvegarde n\'a pas pu être réalisée...</div>
		<?php
	}
}

$post = $table->find( $_GET[ 'id' ] );
//$this->dbg($post);

$categories = $app->getTable( 'Category' )->extract( 'id', 'titre' );
//$this->dbg($categories);

$form = new BootstrapForm( $post );
?>

<h1>Édition de la categorie n°<?= $_GET[ 'id' ] ?></h1>
<form method="post">
	<?= $form->input( 'titre', 'Nom de la categorie' )
	    . $form->submit( 'Sauvegarder' ) ?>
</form>

