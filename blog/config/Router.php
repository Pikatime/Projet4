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

    public function __construct()
    {
        $this->frontController = new FrontController();// FrontController() est systématiquement appelé dans run()
        $this->backController = new BackController();
        $this->errorController = new ErrorController();
    }

    public function run()
    {
        try
        {
            if(isset($_GET['route']))
            {
                if($_GET['route']==='article'){ //Renvoie vers single
                    $this->frontController->article($_GET['articleId']);
                }
                elseif($_GET['route'] === 'addArticle'){ //Permet l'ajout d'un nouvel article
                    $this->backController->AddArticle($_POST);// Création de la route via la method addArticle
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
            var_dump($e);
            $this->errorController->errorServer();
            
        }
    }
}