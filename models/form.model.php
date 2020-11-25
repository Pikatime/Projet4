<?php
class Form {
    public $id;
    public $email;
    public $formId;
    public $content;
    public $date;
    

    function __construct($id, $email, $formId, $content, $date){
        $this->id = $id;
        $this->email = $email;
        $this->formId = $formId;
        $this->content = $content;
        $this->date = $date;
    } 
}