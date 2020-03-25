<section>
    <h1 class='text-center'> Nos articles </h1>
    <?php $query = new Article;
          $articles = $query->findAll();
          
    ?>
        <div class='container'>
        <?php foreach ($articles as $article) : ?>
            <h2> <i>Art.</i>   <?= $article['nom'] ?> </h2>
            <small> <?= $article['date'] ." Ecrit par : ".$article['username']; ?> </small>
            <p> <?= $article['content']; ?></p>
            <a href="index.php?page=showArticle&id=<?= $article['id_article'] ?>" class='btn btn-success'>Voir les commentaires</a>
            <hr>
        <?php endforeach ; ?>
        </div>
    

</section>