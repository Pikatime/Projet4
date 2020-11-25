<?php
class Article {
    public $id;
    public $title;
    public $description;
    public $date;

    function __construct($id, $title, $description, $date) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->date = $date;
    }

}

//Methode dans modele qui permet de sauvegarder les donnees. 