<?php
var_dump($_GET);
$post=$db->prepare('SELECT * FROM blog_articles WHERE id = ? ', [$_GET['id']], 'Gc7\Blog\Table\Article')[0];
//var_dump($post);
?>
<div class="container">
	<h1><?= $post->titre ?></h1>
	<p><?= $post->contenu ?></p>
</div>
