<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\BackController;
use App\src\controller\ErrorController;
use Exception;

class Router
{
    private $frontController;
    private $backController;
    private $errorController;
    private $request;

    public function __construct(){
        $this->request = new Request();
        $this->frontController = new FrontController();// FrontController() est systématiquement appelé dans run()
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
        
    }

    public function run(){
        $route = $this->request->getGet()->get('route');

        try
        {
            if(isset($route))
            {
                if($route==='article'){ //Renvoie vers single
                    $this->frontController->article($this->request->getGet()->get('articleId'));
                }
                elseif($route === 'addArticle'){ //Permet l'ajout d'un nouvel article
                    $this->backController->AddArticle($this->request->getPost());
                }
                elseif($route=== 'editArticle'){
                    $this->backController->editArticle($this->request->getPost(), $this->request->getGet()->get('articleId'));
                }
                else{
                    $this->errorController->errorNotFound();
                }
            }
            else{
                $this->frontController->home();
            }
        }

        catch(Exception $e){
            $this->errorController->errorServer();
            
        }
    }
}