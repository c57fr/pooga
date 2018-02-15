<div class="container">
	<h1>Home Page</h1>
	<!--<a href="index.php?p=single">Single Page</a>-->
	<hr/>
	<?php foreach ( Gc7\Blog\App::getDb()
	                         ->query( 'SELECT * FROM blog_articles LIMIT 99', 'Gc7\Blog\Table\Article' ) as $post ): ?>

		<h2><a href="<?= $post->url ?>"><?= $post->titre ?></a></h2>
		<p><?= $post->extrait ?></p>

	<?php endforeach; ?>
</div>
