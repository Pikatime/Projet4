<?php

include_once('./models/article.model.php');
include_once('./database.php');

function listArticles() {
    $listArticles = [
        new Article("1", "Article 1", "Description article 1", "Date creation article 1"),
        new Article("2", "Article 2", "Description article 2", "Date creation article 1")
    ];
    include_once('./views/list-articles.php');
}

function createArticle() {
    try{
        $request=Database::getConnection()->exec('INSERT INTO article(title, description, date)
        VALUES (\'"Article 3"\',\'"Description article 3"\',\'2020-11-11\')');
        var_dump($request);
    }
    catch(Exception $errorConnection){
        die('Erreur de connexion :'.$errorConnection->getMessage());
    }
    
}

function updateArticle() {}

function deleteArticle() {}