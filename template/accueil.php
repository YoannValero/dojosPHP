<section>
    <h1> Nos articles </h1>
    <?php $query = new Article;
          $articles = $query->findAll();
    ?>
        <div class='container'>
        <?php foreach ($articles as $article) : ?>
            <h2> Nom de l'article :  <?= $article['nom'] ?> </h2>
            <small> <?= $article['created_at'] ." Ecrit par : ".$article['username']; ?> </small>
            <p> <?= $article['content']; ?></p>
            <a href='' class='btn btn-success'>Lire la suite</a>
        <?php endforeach ; ?>
        </div>
    

</section>