<?php
namespace App\src\controller;
use App\config\Parameter;

class BackController extends Controller{

    public function addArticle(Parameter $post){// mise en place des conditions pour la création ou non d'un article via AddAticle
    if($post->get('submit')){
        $errors = $this->validation->validate($post, 'Article');
        if(!$errors){
            $this->articleDAO->addArticle($post);
            $this->session->set('add_article','Le nouvel article a bien été ajouté');
            header('Location: index.php');
        }
        var_dump($errors);
       return $this->view->render('add_article',[
        'post' => $post,
        'errors'=> $errors
        ]);
   
    }
    return $this->view->render('add_article');
    }

    public function editArticle(Parameter $post, $articleId){
        $article = $this->articleDAO->getArticle($articleId);
        if($post->get('submit')){
            $errors = $this->validation->validate($post, 'Article');
            if(!$errors){
                $this->articleDAO->editArticle($post,$articleId);
                $this->session->set('edit_article', 'L\'article a bien été modifié');
                header('Location: index.php');
            }
            return $this->view->render('edit_article', [
            'article'=>$article,
            'errors' =>$errors 
            ]); 
        }
        $post->set('id', $article->getId());
        $post->set('title', $article->getTitle());
        $post->set('content', $article->getContent());
        $post->set('author', $article->getAuthor());

        return $this->view->render('edit_article', [
            'post' => $post,
            'article'=> $article
        ]);
    }

    public function deleteArticle($articleId){
    $this->articleDAO->deleteArticle($articleId);
    $this->session->set('delete_article', 'L\'article a été supprimé');
    header('Location: index.php');
    }

    public function deleteComment($commentId){
        $this->commentDAO->deleteComment($commentId);
        $this->session->set('delete_comment', 'Le commentaire a été supprimé');
        header('Location: index.php');
    }

    public function profile(){
        return $this->view->render('profile');
    }

    public function updatePassword(Parameter $post){
        if($post->get('submit')){
            $this->userDAO->updatePassword($post, $this->session->get('pseudo'));
            $this->session->set('update_password', 'Le mot de passe a été mis à jour');
            header('Location: index.php?route=profile');
        }
        return $this->view->render('update_password');
    }

    public function logout(){
        $this->logoutOrDelete('logout');
    }

    public function deleteAccount(){
        $this->userDAO->deleteAccount($this->session->get('pseudo'));
        $this->logoutOrDelete('delete_account');
    }

    public function logoutOrDelete($param){
        $this->session->stop();
        $this->session->start();
        if($param === 'logout'){
            $this->session->set($param, 'A bientot');
        }else{
            $this->session->set($param, 'Votre compte a bien été supprimé');
        }
        header('Location: index.php');
    }

    public function administration(){
        return $this->view->render('administration');
    }
}
//session n'est pas appelé depuis backcontroller mais via controller car request permet d'accéder à parameter et session, et appeler depuis controller les rendra dispo pour les classes filles