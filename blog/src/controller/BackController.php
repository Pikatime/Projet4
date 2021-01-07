<?php
namespace App\src\controller;
use App\config\Parameter;

class BackController extends Controller{

    public function addArticle(Parameter $post){// mise en place des conditions pour la création ou non d'un article via AddAticle
    if($post->get('submit')){
        $this->articleDAO->addArticle($post);
        $this->session->set('add_article','Le nouvel article a bien été ajouté');
        header('Location: index.php');
    }
    return $this->view->render('add_article',[
        'post' => $post
    ]);
    }

    public function editArticle(Parameter $post, $articleId){
        $article = $this->articleDAO->getArticle($articleId);
        if($post->get('submit')){
            $this->articleDAO->editArticle($post,$articleId);
            $this->session->set('edit_article', 'L\'article a bien été modifié');
            header('Location: index.php');
        }

        return $this->view->render('edit_article', [
            'article'=>$article
        ]);
    }
}
//session n'est pas appelé depuis backcontroller mais via controller car request permet d'accéder à parameter et session, et appeler depuis controller les rendra dispo pour les classes filles

