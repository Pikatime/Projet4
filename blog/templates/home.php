<?php
require '../vendor/autoload.php';

use App\src\DAO\ArticleDAO; //facilite l'appel d'Article DAO lors d'un new

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
        $article = new ArticleDAO(); // juste ArticleDAO au lieu du chemin intégrale grâce à use
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