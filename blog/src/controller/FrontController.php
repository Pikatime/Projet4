<?php
namespace App\src\controller;

class FrontController extends Controller
{

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