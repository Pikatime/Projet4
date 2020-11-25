<?php
class Comment {
    public $id;
    public $articleId;
    public $content;

    function __construct($id, $articleId, $content) {
        $this->id = $id;
        $this->articleId = $articleId;
        $this->content = $content;
    }
}