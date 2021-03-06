<?php
namespace App\src\DAO;
use PDO;
use Exception;

abstract class DAO //abstract rend l'instanciation de la classe Database impossible
{
    private $connection; //Cet attribue stock la connexion si elle existe, sinon renvoie null

    private function checkConnection()
    {
        if($this->connection=== null){// Si pas connecté à la BDD, se connecter à la BDD
            return $this->getConnection();
        }
        return $this->connection; // Si la connexion existe, elle est renvoyée directement
    }

    private function getConnection() //passage en private pour qu'il ne puisse pas être appelé n'importe où
    {
        try{
            $this->connection = new PDO(DB_HOST, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection; // Renvoie à la connexion à la BDD
        }

        catch(Exception $errorConnection)
        {
            die('Erreur de connexion:'.$errorConnection->getMessage());
        }
    }

    protected function createQuery($sql, $parameters = null) //createQuery fera appem à ma méthode getConnection et gérer les requêtes
    {
        if($parameters)// Si parametres est vrai
        {
            $result=$this->checkConnection()->prepare($sql);//$result se connecte à la BDD
            $result->execute($parameters); //excécution des parametres demandes
            return $result; //termine la fonction et retourne l'argument $result
        }
        $result=$this->checkConnection()->query($sql); //$result se connecte à la BDD et récupère les infos
        return $result; //termine la fonction et retourne l'argument $result
    }
}