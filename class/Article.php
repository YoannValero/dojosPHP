<?php

class Article {

    private $pdo;

    public function __construct() {
        $this->pdo = App::getDatabase();
    }
    
    public function findAll() {
        
        $result = $this->pdo->query("SELECT * FROM articles");
        $result->execute();
        $articles = $result->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }

    public function findByCategorie($categorie) {

    $result = $this->pdo->query("SELECT * FROM articles INNER JOIN categorie ON categorie.id_categorie = articles.id_categorie WHERE nom_categorie = 'bonheur'");
    $result->execute();
    $articlesByCategorie = $result->fetchAll(PDO::FETCH_ASSOC);

    var_dump($articlesByCategorie);
    return $articlesByCategorie;
    }
}
