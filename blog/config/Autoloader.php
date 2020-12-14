<?php
namespace App\config;

class Autoloader
{
    public static function register() //creation de la methode register 
    {
        spl_autoload_register([__CLASS__,'autoload']);
    }

    public static function autoload($class) //creation de la methode autoload
    {
        $class = str_replace('App', '', $class);
        $class = str_replace('\\', '/', $class);

        require '../'.$class.'.php';
    }
}