<?php
    $article = new Article;
    $art = $article->findOneArticle($_GET['id']);
?>

<div class='container'>
    <h1> <?= $art['articlesById']['nom'] ?> </h1>
    <small> Ajouté le <?= $art['articlesById']['date'] ." par  ". $art['articlesById']['username']   ?></small>
    <hr>
    <p> <?= $art['articlesById']['content'] ?> </p>
</div>

<div class='container'>
    <div>
        <h2> Commentaires </h2><hr>
        <div class='commentaires'>
            <?php for ($i = 0; $i < count($art['commentaires']); $i++): ?>
                <h3> <?= $art['commentaires'][$i]['titre'] ?> </h3>
                <p> <?= $art['commentaires'][$i]['content'] ?> </p>
                <p> Ecrit par : <?= $art['commentaires'][$i]['username']. " le ". $art['commentaires'][$i]['date_com'] ?> <p>
                <hr>
            <?php endfor;?>
        </div>
    </div>
</div>
