<?php

class Database
{
    static public function getConnection()
    {
        try{
            $connection = new PDO('mysql:host=localhost;dbname=projet4;charset=utf8', 'root', '');
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            var_dump($connection);
            return $connection; //Résoud le probleme de host=localhost
        }
        catch(Exception $errorConnection){
            die('Erreur de connexion :'.$errorConnection->getMessage());
        }
    }
}