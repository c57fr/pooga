<h1>Admin des articles</h1>

<p><a href="?a=posts.add" class="btn btn-success">Ajouter un article</a> <a href="?a=categories.index"
                                                                            class="btn btn-success">Gérer les
		catégories</a></p>
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
			<td><?= $post->titre . '<div class="petit">' . $post->dateFr . '</div>' ?></td>
			<td>

				<button class="btn btn-primary btn-inverse-primary"><a href="?a=posts.edit&id=<?= $post->id ?>">
						<i class="fa fa-edit" aria-hidden="true"></i></a>
				</button>
				
				<form action="?a=posts.delete" method="POST" style="display: inline-block">
					<input type="hidden" name="id" value="<?= $post->id ?>">
					<button type="submit" class="btn btn-danger btn-inverse-danger">
						<i class="fa fa-trash" aria-hidden="true"></i></a>
					</button>
				</form>

			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
