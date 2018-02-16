<?php
//var_dump( $_GET );

use Gc7\Blog\App;
use Gc7\Blog\Table\Article;

$post = Article::find( $_GET[ 'id' ] );
if ( ! $post ) {
	App::notFound();
}
$app->setTitle( $post->titre );

//var_dump($post);
?>
<div class="container">

	<h1><?= $post->titre ?></h1>

	<h3><em><?= $post->categorie ?></em></h3>

	<p><?= $post->contenu ?></p>

</div>
