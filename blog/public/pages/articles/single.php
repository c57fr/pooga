<?php
$post = App::getInstance()->getTable('Post')->find($_GET{'id'});
App::getInstance()->setTitle($post->titre);
?>

<h1><?= $post->titre; ?></h1>
<p><em><?= $post->categorie ?></em></p>
<p><?= $post->contenu ?></p>
