<?php
include_once('./models/form.model.php');

function createForm() {
    try{
        $request=Database::getConnection()->exec('INSERT INTO form(email, formId, content, date)
        VALUES(\'"mail3@mail.com"\', \'"formId3"\', \'"Message 3"\', \'2020-11-16\')');
        var_dump($request);
    }

    catch(Exception $errorConnection){
        die('Erreur de connexion :'.$errorConnection->getMessage());
    }
    
}

function listForms() {
    $listForms = [
        new Form("1", "mail@mail.com", "idForm1", "Message 1", "Date creation article 1"),
        new Form("2", "mail2@mail.com", "ifForm2", "Message 2", "Date creation article 2")
    ];
    include_once('./views/list-form.php');

}

function deleteForm() {}
