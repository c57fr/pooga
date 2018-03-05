<?php
use \Core\HTML\BootstrapForm;

$table = $app->getTable( 'Category' );

if ( ! empty( $_POST ) ) {

	var_dump( $_POST );
//var_dump($table);

	$ctrl = ( ! empty( $_POST[ 'titre' ] ) );

	$result = $table->create( [ 'titre' => $_POST[ 'titre' ] ] );

	if ( $result && $ctrl ) {
		header( 'Location: ?a=categories.index&id=' . $app->getDb()->lastInsertId() );
		?>
		<div class="alert alert-success">La catégorie a bien été enregistrée !</div>
		<?php
	}
	else {
		?>
		<div class="alert alert-danger">La sauvegarde n'a pas pu être réalisée...</div>
		<?php
	}
}

$form = new BootstrapForm( $_POST );
?>

<h1>Ajout d'une catégorie</h1>
<form method="post">
	<?= $form->input( 'titre', 'Titre de la catégorie' )
	    . $form->submit( 'Sauvegarder' ) ?>
</form>

