<?php
namespace App\src\DAO;
//use PDO;
//use Exception;

class ArticleDAO extends DAO { //class Article est étendu à la classe Database
   
    public function getArticles()// Récupère tous les articles
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article ORDER BY id DESC'; //On définit ce que contient $sql
        return $this->createQuery($sql); //On appelle et termine createQuery avec les parametres $sql prealablement definis
    }

    public function getArticle($articleId)//appel d'une article unique par son id
    {
        $sql = 'SELECT id, title, content, author, createdAt FROM article WHERE id=?';
        return $this->createQuery($sql,[$articleId]);
    }

}

//Methode dans modele qui permet de sauvegarder les donnees. 