<?php
namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;

class FrontController
{
    private $articleDAO;
    private $commentDAO;
    private $view;

    public function __construct(){
        $this->articleDAO = new ArticleDAO;// juste ArticleDAO au lieu du chemin intégral grâce à use
        $this->commentDAO = new CommentDAO;
        $this->view = new View();
    }

    public function home(){
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home',[
            'articles'=>$articles
        ]);
    }

    public function article($articleId){
        $article = $this->articleDAO->getArticle($articleId);//récuprer l'id de l'article de maniere dynamique
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);//$_GET['articleId'] est remplacé par $articleID
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
            ]);    
    }
}