<?php
namespace App\src\controller;

class ErrorController extends Controller{

    public function errorNotFound(){ //Appelé dans Router.php
        return $this->view->render('error_404', []);
    }

    public function errorServer(){ //Appelé dans Router.php
        return $this->view->render('error_500', []);
    }
}