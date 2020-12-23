<?php $this->title="Accueil"; ?> <!--structure de base du HTML -->


<body>
    <div>
        <h1>Mon blog</h1>
        <p>test</p>
        <?php
        foreach ($articles as $article)

        {
            ?>
            <div>
                <h2><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
                <p><?=htmlspecialchars($article->getContent());?></p>
                <p><?=htmlspecialchars($article->getAuthor());?></p>
                <p><?=htmlspecialchars($article->getCreatedAt());?></p>
            </div>

            <br>
            <?php

        }
        ?>
    </div>  
</body>
</html>