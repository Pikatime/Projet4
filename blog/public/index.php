<?php

require '../config/dev.php';
require '../vendor/autoload.php'; // Centralisation de l'appel à l'autoloader

session_start();
$router = new App\config\Router();
$router->run();
