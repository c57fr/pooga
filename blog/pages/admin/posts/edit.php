<?php
use \Core\HTML\BootstrapForm;

$post = $app->getTable('Post')->find($_GET[ 'id' ]);
//var_dump($post);
$form = new BootstrapForm( $post );
?>

<h1>Édition de l'article n°<?= $_GET[ 'id' ] ?></h1>
<form method="post">
	<?= $form->input( 'titre', 'Titre de l\'article' )
	    . $form->input( 'contenu', 'Contenu', [ 'type' => 'textarea' ] )
	    . $form->submit( 'Sauvegarder' ) ?>
</form>

