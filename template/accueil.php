<section>
    <h1> Bonjour </h1>
    <?php $query = new Article;
          $articles = $query->findAll();

        foreach ($articles as $article) : ?>
             
            <h1> Nom de l'article :  <?= $article['nom'] ?> </h1>
        <?php endforeach ; ?>
    

</section>