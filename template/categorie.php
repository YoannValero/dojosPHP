<h1 class="text-center"> Catégorie <?= $_GET['category']; ?> </h1>

<?php 
$article = new Article;
$result = $article->findByCategorie($_GET['category']); ?>

    <div class="container-fluid">
        <?php foreach ($result as $article) : ?>
                <h1> <?= $article['nom'] ?> </h1>
                <small> <?= $article['date'] ."   Ecrit par : ".$article['username']; ?></small>
                <p> <?= $article['content'] ?> </p>
                <a href="index.php?page=showArticle&id=<?= $article['id_article'] ?>"class="btn btn-success">Voir les commentaires</a>
                <hr>
        <?php endforeach ;?>
    </div>

    


