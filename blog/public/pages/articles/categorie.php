<?php

$categorie = App::getInstance()->getTable('Category')->find($_GET['id']);
var_dump($categorie);
$articles =  App::getInstance()->getTable('Post')->findByCategory($_GET['id']);
var_dump($articles);
$categories = App::getInstance()->getTable('Category')->all();
var_dump($categories);

