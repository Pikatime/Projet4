<?php
require '../config/dev.php';
require '../vendor/autoload.php'; // Centralisation de l'appel à l'autoloader

try{
    if(isset($_GET['route'])) //function isset permet de déterminer su une variable est définie ou non
    {
        if($_GET['route']==='article'){ //Si la variable route est vraie est si elle est dans la BDD article
            require '../templates/single.php';
        }
        else {
            echo 'page inconnue'; //Sinon
        }
    }

    else{
        require '../templates/home.php'; //Si la variable est fausse
    }
}

catch(Exception $e)
{
    echo 'Erreur';
}