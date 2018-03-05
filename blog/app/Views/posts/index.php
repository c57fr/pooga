<div class="row">
	<div class="gc7Main">
		<?php foreach ( $posts as $post ): ?>
			<h2><a href="<?= $post->url; ?>"><?= $post->titre; ?></a></h2>
			<p><em><?= $post->categorie; ?></em></p>
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
</div>
