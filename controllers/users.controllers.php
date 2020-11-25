<?php
include_once('./models/user.model.php');

function home() 
{
    echo "ici c'est home";
}

function listUsers() 
{
    $users = [
        new User("1", "test@test.test", ""),
        new User("2", "test2@test.test", ""),
    ];
    include_once('./views/list-users.php');
}

function createUser(){
    try{
        $request=Database::getConnection()->exec('INSERT INTO user(email, password)
        VALUES(\'email2@email.com\', \'""\')');
        var_dump($request);
    }

    catch(Exception $errorConnection){
        die('Erreur de connexion :'.$errorConnection->getMessage());

    }

}

function updateUser() {}

function deleteUser() {}

//$response = $bdd->query('SELECT * FORM jeux_video');
//while ($dataGame = $response->fetch());