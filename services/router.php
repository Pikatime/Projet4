<?php

// j'ai besoin de récupérer le query parameters
// j'ai besoin d'extraire la valeur qui indique le controleur à utiliser

// utiliser $_GET
// query parameter à utiliser 'controller'
// si celui-ci n'est pas défini, par défaut, il sera 'home'

// avec la valeur du controleur, je pourrais appeler la bonne fonctions contenant le controleur

// RECUPERER $_GET['controller'] -> $controller()
include_once('./controllers/users.controllers.php');
include_once('./controllers/articles.controllers.php');
include_once('./controllers/comments.controllers.php');
include_once('./controllers/forms.controllers.php');


$controller = 'home';
try {
    $controller = $_GET['controller'];
    if (!$controller) {
        $controller = 'home';
    }
    if (is_callable($controller)) {
        $controller();
    } else {
        echo 'CONTROLLER DOES NOT EXIST';
    }
    

} catch (Exception $err) {
    echo 'CONTROLLER ERROR';
}

