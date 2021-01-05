<?php

namespace App\src\model;
use App\config\Request;

class View
{
    private $file;
    private $title;
    private $request;
    private $session;

    public function __construct(){
        $this->request = new Request();
        $this->session = $this->request->getSession();
    }

    public function render($template, $data = []) // génèrera le rendu des données acquises dans $template.php
    {
        $this->file = '../templates/'.$template.'.php';
        $content = $this->renderFile($this->file,$data);
        $view = $this->renderFile('../templates/base.php', [
            'title'=>$this->title,
            'content'=>$content,
            'session'=> $this->session
        ]);//appelle la fonction renderFile
        echo $view;
    }

    private function renderFile($file, $data){ //récupère les données nécessaires au fichier à rendre
        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        header('Location: index.php?route=notFound');
    }
}