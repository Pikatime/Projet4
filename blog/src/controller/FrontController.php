<?php
namespace App\src\controller;

use App\config\Parameter;

class FrontController extends Controller
{

    public function home(){
        $articles = $this->articleDAO->getArticles();
        return $this->view->render('home',[
            'articles'=>$articles
        ]);
    }

    public function article($articleId){
        $article = $this->articleDAO->getArticle($articleId);//récuprer l'id de l'article de maniere dynamique
        $comments = $this->commentDAO->getCommentsFromArticle($articleId);//$_GET['articleId'] est remplacé par $articleID
        return $this->view->render('single', [
            'article' => $article,
            'comments' => $comments
            ]);    
    }

    public function addComment(Parameter $post, $articleId){
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'Comment');
            if(!$errors) {
                $this->commentDAO->addComment($post, $articleId);
                $this->session->set('add_comment', 'Le nouveau commentaire a bien été ajouté');
                header('Location: ../public/index.php');
            }
            $article = $this->articleDAO->getArticle($articleId);
            $comments = $this->commentDAO->getCommentsFromArticle($articleId);
            return $this->view->render('single', [
                'article' => $article,
                'comments' => $comments,
                'post' => $post,
                'errors' => $errors
            ]);
        }
    }

    public function flagComment($commentId){
        $this->commentDAO->flagComment($commentId);
        $this->session->set('flag_comment', 'Le commentaire a bien été signalé');
        header('Location: ../public/index.php');
    }


    public function register(Parameter $post){
        if($post->get('submit')){
            $errors = $this->validation->validate($post, 'User');
            if($this->userDAO->CheckUser($post)){
                $errors['pseudo'] = $this->userDAO->checkUser($post);
            }

            if(!$errors){
                $this->userDAO->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée');
                header('Location: index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);
        }
        return $this->view->render('register');
    }
}