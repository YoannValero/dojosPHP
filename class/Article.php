<?php

class Article {

    private $db;

    public function __construct() {
        $this->db = App::getDatabase();
        
    }
    
    public function findAll() {
        
        $result = $this->db->pdo->query(
            "SELECT * FROM articles
            INNER JOIN users
            ON articles.id_user = users.id_user"
        );
        
        $articles = $result->fetchAll(PDO::FETCH_ASSOC);

        return $articles;
    }

    public function findByCategorie($categorie) {
    
    $categorie = $_GET['category'];
        
    $result = $this->db->pdo->prepare(
        "SELECT * FROM articles 
        INNER JOIN categorie 
        ON categorie.id_categorie = articles.id_categorie 
        INNER JOIN users
        ON articles.id_user = users.id_user
        WHERE categorie.nom_categorie = :nom");
    $result->execute([':nom' => $categorie]);
   
    $articlesByCategorie = $result->fetchAll(PDO::FETCH_ASSOC);

    return $articlesByCategorie;
    }
}
