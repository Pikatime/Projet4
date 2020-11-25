<?php

include_once('./models/comment.model.php');

function createComment() {
    try{
        $request=Database::getConnection()->exec('INSERT INTO comment(articleId, content, date)
        VALUES(\'"Idarticle3"\', \'"test 3"\', \'2020-11-16\')');
    var_dump($request);
    }

    catch(Exception $errorConnection){
        die('Erreur de connexion :'.$errorConnection->getMessage());

    }

}

function listComments() {
    $listComments = [
        new Comment("1", "1", "good article"),
        new Comment("2", "1", "nice article"),
    ];
    include_once('./views/list-comments.php');
}

function deleteComment() {}
