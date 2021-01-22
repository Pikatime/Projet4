<?php
namespace App\src\model;

class User{
    private $id;
    private $pseudo;
    private $password;
    private $createdAt;

    public function setId($id){
        $this->id = $id;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function createdAt(){
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt){
    $this->createdAt = $createdAt;
    }
}