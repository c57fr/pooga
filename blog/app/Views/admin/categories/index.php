<h1>Admin des categories</h1>

<p><a href="?a=admin.categories.add" class="btn btn-success">Ajouter une categorie</a>
<table class="table">
	<thead>
	<tr>
		<td>ID</td>
		<td>Nom</td>
	</tr>
	</thead>
	<tbody>
	<?php foreach ( $categories as $category ): ?>
		<tr>
			<td><?= $category->id ?></td>
			<td><?= $category->titre ?></td>
			<td>

				<button class="btn btn-primary btn-inverse-primary"><a href="?a=admin.categories.edit&id=<?= $category->id ?>">
						<i class="fa fa-edit" aria-hidden="true"></i></a>
				</button>
				
				<form action="?a=admin.categories.delete" method="POST" style="display: inline-block">
					<input type="hidden" name="id" value="<?= $category->id ?>">
					<button type="submit" class="btn btn-danger btn-inverse-danger">
						<i class="fa fa-trash" aria-hidden="true"></i></a>
					</button>
				</form>

			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>
