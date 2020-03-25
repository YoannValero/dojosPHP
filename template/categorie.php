<h1 class="text-center"> Catégorie <?= $_GET['category']; ?> </h1>

<?php 
$article = new Article;
$result = $article->findByCategorie($_GET['category']); ?>

    <div class="container-fluid">
        <?php foreach ($result as $article) : ?>
                <h1> <?= $article['nom'] ?> </h1>
                <small> <?= $article['created_at'] ."   Ecrit par : ".$article['username']; ?></bold></small>
                <p> <?= $article['content'] ?> </p>
                <a href='' class="btn btn-success">Lire la suite</a>
        <?php endforeach ;?>
    </div>
    


