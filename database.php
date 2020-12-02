<?php

class Database
{
    //Mise en place de constantes vu que la manière de se connecter à la BDD ne changera pas
    const DB_HOST='mysql:host=localhost;dbname=projet4;charset=utf8';
    const DB_USER='root';
    const DB_PASS='';
    //Methode pr se co a la BDD
    static public function getConnection()
    {
        //Tentative de co à la BDD
        try{
            $connection = new PDO(self::DB_HOST,self::DB_USER,self::DB_PASS); //self fait référence à la classe et $this à l'objet. Les parametres ne changent pas, on utilise donc self
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            var_dump($connection);
            return 'Connexion OK';
            return $connection; //Résoud le probleme de host=localhost
        }
        catch(Exception $errorConnection){
            die('Erreur de connexion :'.$errorConnection->getMessage());
        }
    }
}