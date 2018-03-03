<?php

$posts = $app->getTable( 'Post' )->all();
//var_dump( $_GET['id'] );
?>
<h1>Édition de l'article n°<?= $_GET[ 'id' ] ?></h1>

<table class="table">
	<thead>
	<tr>
		<td>ID</td>
		<td>Titre</td>
		<td>Actions</td>
	</tr>
	</thead>
	<tbody>
	<?php foreach ( $posts as $post ): ?>
		<tr>
			<td><?= $post->id ?></td>
			<td><?= $post->titre ?></td>
			<td>
				<button class="btn btn-primary btn-inverse-primary"><a href="?a=posts.edit&id=<?= $post->id ?>">Editer</a>
				</button>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
