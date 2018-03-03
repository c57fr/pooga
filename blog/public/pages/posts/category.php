<?php
$app = App::getInstance();

$categorie = $app->getTable( 'Category' )->find( $_GET[ 'id' ] );
if ( $categorie === FALSE ) {
	$app->notFound();
}
$articles   = $app->getTable( 'Post' )->findByCategory( $_GET[ 'id' ] );
$categories = $app->getTable( 'Category' )->all();

$app->title = $categorie->titre . ' | ' . $app->title;
?>

<h1><?= $categorie->titre ?></h1>

<div class="row">
	<div class="gc7Main">
		<?php foreach ( $articles as $post ): ?>
			<h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
			<p><?= $post->extrait; ?></p>
		<?php endforeach; ?>
	</div>

	<div class="gc7AsideD">
		<?php foreach ( $categories as $categorie ): ?>
			<ul>
				<li>
					<a href=<?= $categorie->url ?>><?= $categorie->titre ?></a>
				</li>
			</ul>
		<?php endforeach; ?>
	</div>
