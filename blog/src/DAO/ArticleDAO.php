<?php
namespace App\src\DAO;
use App\config\Parameter;
use App\src\model\Article;

class ArticleDAO extends DAO { //class Article est étendu à la classe Database
    private function buildObject($row){ //transforme les résultats en obj basé sur la class Article
        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['author']);
        $article->setCreatedAt($row['createdAt']);

        return $article;
    }
    
    public function getArticles()// Récupère tous les articles
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC'; //On définit ce que contient $sql
        $result = $this->createQuery($sql); //On appelle et termine createQuery avec les parametres $sql prealablement definis
        $articles = [];
        foreach($result as $row){
            $articleId = $row['id'];
            $articles[$articleId] =  $this->buildObject($row); //appel de la method buildObject
        }
        $result->closeCursor();
        return $articles;
    }

    public function getArticle($articleId)//appel d'une article unique par son id
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article WHERE id=?';
        $result = $this->createQuery($sql,[$articleId]);
        $article = $result->fetch();
        $result->closeCursor();
        return $this->buildObject($article);
    }

    public function addArticle(Parameter $post)//création d'une requête INSERT
    {
    $sql = 'INSERT INTO article (title, content, author, createdAt) VALUES (?,?,?,NOW())';
    $this->createQuery($sql,[$post->get('title'), $post->get('content'), $post->get('author')]);
    }

    public function editArticle(Parameter $post, $articleId){
        $sql = 'UPDATE article SET title=:title, content=:content, author=:author WHERE id=:articleId';
        $this->createQuery($sql,[
            'title'=> $post->get('title'),
            'content'=> $post->get('content'),
            'author'=> $post->get('author'),
            'articleId'=>$articleId
        ]);
    }

    public function deleteArticle($articleId){
        $sql = 'DELETE FROM comment WHERE article_id=?';
        $this->createQuery($sql,[$articleId]);
        $sql = 'DELETE FROM article WHERE id=?';
        $this->createQuery($sql, [$articleId]);
    }

}

//Methode dans modele qui permet de sauvegarder les donnees. 