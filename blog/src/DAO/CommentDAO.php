<?php

class Comment extends Database
{
    public function getCommentsFromArticles($articleId)
    {
        $sql = 'SELECT id, pseudo, content, createdAt FROM comment WHERE article_id=? ORDER BY createdAt DESC'; //Récupération de tous les commentaires associés à un article
        return $this->createQuery($sql, [$articleId]);
    }

}