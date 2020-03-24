<?php 

$article = new Article;
$result = $article->findByCategorie($_GET['category']);

var_dump($result);

?> 

<h1> Bonjour </h1>