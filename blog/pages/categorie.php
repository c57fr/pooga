<?php
use Gc7\Blog\App;
use Gc7\Blog\Table\Article;
use Gc7\Blog\Table\Categorie;

//var_dump($_GET);

$categorie = Categorie::find( $_GET[ 'id' ] );
if ( ! $categorie ) {
	App::notFound();
}
$app->setTitle( $categorie->categorie );
$articles   = Article::dernierParCategorie( $_GET[ 'id' ] );
$categories = Categorie::all();

//var_dump( $categorie, $articles, $categories );
?>
<div class="container">
	<h1>Catégorie <b><?= $categorie->categorie ?></b></h1>

	<div class="row">

		<div class="col-sm-8">
			<?php
			//var_dump($articles);
			foreach ( $articles as $post ): ?>
				<h2><a href="<?= $post->url ?>"><?= $post->titre ?></a></h2>
				<h4><em><?= $post->categorie ?></em></h4>
				<p><?= $post->extrait ?></p>
			<?php endforeach; ?>
		</div>

		<div class="col-sm-4">
			<h3>Categories</h3>
			<ul>
				<?php
				foreach ( $categories as $categorie ) {
					echo '<li><a href="' . $categorie->url . '">' . $categorie->categorie . '</a></li>';
				}
				?>
			</ul>
		</div>

	</div>
</div>
