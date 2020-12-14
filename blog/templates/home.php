<?php
require '../src/DAO/DAO.php';
require '../src/DAO/ArticleDAO.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Mon blog</title>
</head>

<body>
    <div>
        <h1>Mon blog</h1>
        <p>test</p>
        <?php
        /*$db = new Database();
        $db->checkConnection();*/
        $article = new Article();
        $articles = $article->getArticles();
        while($article=$articles->fetch())

        {
            ?>
            <div>
                <h2><a href="single.php?articleId=<?=htmlspecialchars($article->id);?>"><?=htmlspecialchars($article->title);?></a></h2><?php//ajout de l'identifiant de l'article puis, redirection vers la page single.php?>
                <p><?=htmlspecialchars($article->content);?></p>
                <p><?=htmlspecialchars($article->author);?></p>
                <p><?=htmlspecialchars($article->createdAt);?></p>
            </div>

            <br>
            <?php

        }
        $articles->closeCursor();
        //$db->checkConnection();
        ?>


    </div>
   
</body>
</html>