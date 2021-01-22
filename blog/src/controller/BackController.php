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
}
//session n'est pas appelé depuis backcontroller mais via controller car request permet d'accéder à parameter et session, et appeler depuis controller les rendra dispo pour les classes filles

