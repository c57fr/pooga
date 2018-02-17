<div class="container">
	<div class="row">
		<div class="col-sm-8">
			<h1>Home Page</h1>
			<hr/>
			<?php

			$posts = $app->getTable( 'Posts' );
			var_dump($posts);
			$posts = $posts->all();
			var_dump( $posts );
			//var_dump( $app->getTable( 'Categories' ));
			//var_dump( $app->getTable( 'Users' ));
			//
			//var_dump( $app->getDb( 'Posts' ));
			//var_dump( $app->getDb( 'Categories' ));
			//var_dump( $app->getDb( 'Users' ));
			/*
						$app->title= 'Articles';
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
			<?php
			*/
			?>
		</div>
	</div>
</div>
