<?php

namespace App\config;
use App\src\controller\FrontController;
use App\src\controller\ErrorController;
use Exception;

class Router
{
    private $frontController;
    private $errorController;

    public function __construct()
    {
        $this->frontController = new FrontController();// FrontController() est systématiquement appelé dans run()
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
                    //require '../templates/single.php';
                }
                else{
                    //echo 'Page inconnue';
                    $this->errorController->errorNotFound();
                }
            }

            else{
                $this->frontController->home();
                //require '../templates/home.php';
            }
        }

        catch(Exception $e){
            //echo 'Erreur';
            $this->errorController->errorServer();
        }
    }
}