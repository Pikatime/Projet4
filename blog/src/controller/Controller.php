<?php
namespace App\src\controller;

use App\config\Request;
use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;

abstract class Controller{ //Il ne sera jamais instancié, donc possibilité de le passer en abstract
    protected $articleDAO; //protected plutôt que private ou public
    protected $commentDAO;
    protected $view;
    private $request;
    protected $get;
    protected $post;
    protected $session;

    public function __construct(){
        $this->articleDAO = new ArticleDAO;// juste ArticleDAO au lieu du chemin intégral grâce à use
        $this->commentDAO = new CommentDAO;
        $this->view = new View();
        $this->request = new Request();
        $this->get = $this->request->getGet();
        $this->post = $this->request->getPost();
        $this->session = $this->request->getSession();
    }
    
}