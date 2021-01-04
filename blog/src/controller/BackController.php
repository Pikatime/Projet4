<?php
namespace App\src\controller;
use App\src\DAO\ArticleDAO;
use App\src\model\View;

class BackController{
    private $view;
    
    public function __construct()
    {
        $this->view = new View();
    }

    public function addArticle($post){// mise en place des conditions pour la création ou non d'un article via AddAticle
    if(isset($post['submit'])){
        $articleDAO = new ArticleDAO();
        $articleDAO->addArticle($post);
        header('Location: index.php');
    }

    return $this->view->render('add_article',[
        'post' => $post
    ]);
    }
}

