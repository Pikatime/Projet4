<?php
namespace App\src\DAO;
//use PDO;
//use Exception;

class CommentDAO extends DAO
{
    public function getCommentsFromArticles($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id=? ORDER BY createdAt DESC'; //Récupération de tous les commentaires associés à un article
        return $this->createQuery($sql, [$articleId]);
    }

}