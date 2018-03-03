<?php
$app = App::getInstance();
$post = $app->getTable( 'Post' )->find( $_GET{'id'} );

if ( $post === FALSE ) {
	$app->notFound();
}
$app->title = $post->titre . ' | ' . $app->title;

$categorie = new stdClass();
$categorie->url = '?p=categorie&id='.$post->category_id;
?>


<h1><?= $post->titre; ?></h1>
<p><em><a href="<?= $categorie->url ?>"><?= $post->categorie ?></a></em></p>
<p><?= $post->contenu ?></p>
