<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h1>Home Page</h1>
			<hr/>
			<?php
			use Gc7\Blog\App;

			App::setTitle('Articles');
			foreach ( \Gc7\Blog\Table\Article::getLast() as $post ): ?>

				<h2><a href="<?= $post->url ?>"><?= $post->titre ?></a></h2>
				<h4><em><?= $post->categorie ?></em></h4>
				<p><?= $post->extrait ?></p>

			<?php endforeach; ?>
		</div>
		<div class="col-sm-4">
			<h3>Categories</h3>
			<ul>
				<?php
				foreach ( Gc7\Blog\Table\Categorie::all() as $categorie ) {
					echo '<li><a href="' . $categorie->url . '">' . $categorie->categorie . '</a></li>';
				}
				?>
			</ul>
		</div>
	</div>
</div>
