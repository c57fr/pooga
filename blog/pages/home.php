<div class="container">
	<h1>Home Page</h1>
	<a href="index.php?p=single">Single Page</a>
	<hr/>
	<?php
	use Blog\App\Database;

	$db  = new Database();
	$res = $db->query( 'SELECT * FROM blog_articles' );

	foreach ( $res as $article ) {
		echo $article->titre . '<br>';
	}
	?>
</div>
