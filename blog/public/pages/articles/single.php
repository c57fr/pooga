<?php
$post = App::getInstance()->getTable('Post')->find($_GET{'id'});
?>

<h1><?= $post->titre; ?></h1>
<p><?= $post->contenu ?></p>