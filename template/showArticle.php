<?php
    $article = new Article;
    $art = $article->findOneArticle($_GET['id']);
 ?>

    <div class='container'>
        <h1> <?= $art['nom'] ?> </h1>
        <small> <?= $art['created_at'] ?></small>
        <p> <?= $art['content'] ?> </p>
    </div>

    <div class='container'>
        <h1> Commentaires </h1>
    </div>
