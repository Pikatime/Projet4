<?php
require '../src/DAO/DAO.php';
require '../src/DAO/ArticleDAO.php';
require '../src/DAO/CommentDAO.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
    <?php
        $article = new Article();
        $articles = $article->getArticle($_GET['articleId']);// récupère l'Id de l'article de manière dynamique
        $article=$articles->fetch()
    ?>

    <div>
        <h2><?=htmlspecialchars($article->title);?></h2>
        <p><?=htmlspecialchars($article->content);?></p>
        <p><?=htmlspecialchars($article->author);?></p>
        <p><?=htmlspecialchars($article->createdAt);?></p>
    </div>

    <br>
    <?php
    $articles->closeCursor();//Finalise une serie de fetch, bonne pratique
    ?>

    <a href = "home.php">Retour à l'accueil</a>

    <div id="comments" class="text-left" style="margin-left:50px">
        <h3>Commentaires</h3>
        <?php
        $comment = new Comment();
        $comments = $comment->getCommentsFromArticles($_GET['articleId']);
        while($comment = $comments->fetch())
        {
            ?>
            <h4><?=htmlspecialchars($comment->pseudo);?></h4>
            <p><?=htmlspecialchars($comment->content);?></p>
            <p><?=htmlspecialchars($comment->createdAt);?></p>
            <?php
        }
        $comments->closeCursor();
        ?>
    </div>
    
</body>
</html>