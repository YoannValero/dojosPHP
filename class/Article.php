<?php

class Article {

    public $db;

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

    public function findByUser($user) {
        $result = $this->db->pdo->prepare(
            "SELECT * FROM articles
            INNER JOIN users
            ON articles.id_user = users.id_user
            WHERE users.username = :nom"
        );
        $result->execute([':nom' => $user]);
        $articlesByUser = $result->fetchAll(PDO::FETCH_ASSOC);

        return $articlesByUser;
    }

    public function findOneArticle($id) {

        $comment = new Comment;

        $commentaires = $comment->findCommentsByArticle($id);

        $result = $this->db->pdo->prepare(
            "SELECT * FROM articles
            INNER JOIN users
            ON articles.id_user = users.id_user
            WHERE articles.id_article = :nom"
        );
        $result->execute([':nom' => $id]);
        $articlesById = $result->fetch(PDO::FETCH_ASSOC);

        return compact('articlesById','commentaires');

    }
}
