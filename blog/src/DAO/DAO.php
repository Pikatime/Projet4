<?php
abstract class Database //abstract rend l'instanciation de la classe Database impossible
{
    const DB_HOST = 'mysql:host=localhost; dbname=blog; charset=utf8';
    const DB_USER = 'root';
    const DB_PASS = '';

    private $connection; //Cet attribue stock la connexion si elle existe, sinon renvoie null

    private function checkConnection()
    {
        if($this->connection=== null){// Si pas connecté à la BDD, se connecter à la BDD
            //var_dump('connexion inconnue'); Permet de vérifier que la method checkConnection fonctionne. Utilisable si checkConnection est public
            return $this->getConnection();
        }
        //var_dump('connexion deja existante'); Verifie que la methode fonctionne bien si $connetion est non null. Utilisable si checkConnection est public, et modifier home pour voir cela
        return $this->connection; // Si la connexion existe, elle est renvoyée directement
    }

    private function getConnection() //passage en private pour qu'il ne puisse pas être appelé n'importe où
    {
        try{
            $this->connection = new PDO(self::DB_HOST, self::DB_USER, self::DB_PASS);
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
            $result->setFetchMode(PDO::FETCH_CLASS,Article::class);//Instruction sur la manière d'afficher
            $result->execute($parameters); //excécution des parametres demandes
            return $result; //termine la fonction et retourne l'argument $result
        }
        $result=$this->checkConnection()->query($sql); //$result se connecte à la BDD et récupère les infos
        $result->setFetchMode(PDO::FETCH_CLASS, Article::class);
        return $result; //termine la fonction et retourne l'argument $result
    }
}