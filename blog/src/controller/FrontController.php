<?php
namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;

class FrontController
{
    private $articleDAO;
    private $commentDAO;

    public function __construct(){
        $this->articleDAO = new ArticleDAO;// juste ArticleDAO au lieu du chemin intégral grâce à use
        $this->commentDAO = new CommentDAO;
    }

    public function home(){
        $articles = $this->articleDAO->getArticles();
        require '../templates/home.php';
    }

    public function article($articleId){
        $articles = $this->articleDAO->getArticle($articleId);//récuprer l'id de l'article de maniere dynamique
        $comments = $this->commentDAO->getCommentsFromArticles($articleId);//$_GET['articleId'] est remplacé par $articleID
        require '../templates/single.php';
    
    }
}