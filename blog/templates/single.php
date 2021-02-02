<?php $this->title="Article";?>


<body>
    <div class="title_page">
        <h1>LA PLUME VIVANTE <br>
        <p class="subtitle">Une vie, une histoire</p></h1>
    </div>
    <div class="block_all_content">
        <div class="block_menu">
            <nav>
                <ul>
                    <?php if($this->session->get('role') === 'admin'){ ?>
                    <li class="menu"><a href="../public/index.php?route=editArticle&articleId=<?=$article->getId(); ?>">Modifier</a></li> 
                    <li class="menu"><a href="../public/index.php?route=deleteArticle&articleId=<?=$article->getId(); ?>">Supprimer</a></li>
                    <li class="menu"><a href="../public/index.php?route=administration"> Retour à l'administration</a></li>
                    <?php
                    } ?>
                    <li class="menu"><a href="../public/index.php">Retour à l'accueil</a></li>
                </ul>
            </nav>
        </div>

        <div class="block_session_content">
            <div>
                <h2><?= htmlspecialchars($article->getTitle());?></h2>
                <p><?= htmlspecialchars($article->getContent());?></p>
                <p><?= htmlspecialchars($article->getAuthor());?></p>
                <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
            </div>
            <br>

    
            <div id="comments" class="text-left" style="margin-left: 50px">
                <h3>Ajouter un commentaire</h3>
                <?php include('form_comment.php');?>
        
                <h3>Commentaires</h3>
                <?php
                foreach ($comments as $comment){
                ?>  
                    <div class="user_comment">
                        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
                        <p><?= htmlspecialchars($comment->getContent());?></p>
                        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>
                    
                        <div class="flag_action">
                        <?php
                        if($comment->isFlag()) {
                            ?>
                            <p>Ce commentaire a déjà été signalé</p>
                            <?php
                        } else {
                            ?>
                            <p><a class="click_action" href="../public/index.php?route=flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
                        <?php
                        }
                        ?>
                        <?php if($this->session->get('role') === 'admin'){ ?>
                            <a class= "click_action" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
                        <?php
                        } ?>
                        </div>
                    </div>    
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</body>
