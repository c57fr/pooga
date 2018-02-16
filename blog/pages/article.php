<?php
//var_dump( $_GET );

use Gc7\Blog\App;
use Gc7\Blog\Table\Article;
use Gc7\Blog\Table\Categorie;

$post = Article::find( $_GET[ 'id' ] );
if ( ! $post ) {
	App::notFound();
}
App::setTitle( $post->titre );

//var_dump($post);
?>
<div class="container">

	<h1><?= $post->titre ?></h1>

	<h3><?= $post->categorie ?></h3>

	<p><?= $post->contenu ?></p>

</div>
