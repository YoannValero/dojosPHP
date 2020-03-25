<?php

class Comment {

    public $db;

    public function __construct() {
        $this->db = App::getDatabase();
    }

    public function findCommentsByArticle($article_id) {
        $result = $this->db->pdo->prepare(
            "SELECT * FROM commentaires 
            INNER JOIN users
            ON commentaires.id_user = users.id_user
            WHERE id_article = :id_article 
            ORDER BY commentaires.created_at DESC ");
        $result->execute([':id_article' => $article_id]);
        $commentaires = $result->fetchAll(PDO::FETCH_ASSOC);

        return $commentaires;
    }
}