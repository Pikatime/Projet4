<?php $this->title = 'Administration'; ?>
<body>
    <div class="title_page">
        <h1>PAGE D'ADMINISTRATION</h1>
    </div>

    <div class="block_all_content">
    <div class="block_menu">
        <nav>
            <ul>
                <li class="menu"><a href="../public/index.php">Retour à l'Accueil</a></li>
                <li class="menu"><a href="../public/index.php?route=addArticle">Nouvel article</a></li>
            </ul>
        </nav>
    </div> 
    
    <div class="block_session_content">
    <div class="info_session">
        <?= $this->session->show('add_article'); ?>
        <?= $this->session->show('edit_article'); ?>
        <?= $this->session->show('delete_article'); ?>
        <?= $this->session->show('delete_user'); ?>
    </div>
    
    <div class= "block_content content_admin"> 
        <h2 class="title_admin">Articles</h2>
        <table class="table_admin">
            <tr>
                <td class="title_table_admin">Id</td>
                <td class="title_table_admin">Titre</td>
                <td class="title_table_admin">Contenu</td>
                <td class="title_table_admin">Auteur</td>
                <td class="title_table_admin">Date</td>
                <td class="title_table_admin">Actions</td>
            </tr>
            <?php
            foreach ($articles as $article){
                ?>
                <tr>
                    <td class="content_table_admin"><?= htmlspecialchars($article->getId());?></td>
                    <td class="content_table_admin"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></td>
                    <td class="content_table_admin"><?= substr(htmlspecialchars($article->getContent()), 0, 150);?></td>
                    <td class="content_table_admin"><?= htmlspecialchars($article->getAuthor());?></td>
                    <td class="content_table_admin">Créé le : <?= htmlspecialchars($article->getCreatedAt());?></td>
                    <td class="content_table_admin actions_list">
                        <a class="choice_action_admin" href="../public/index.php?route=editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                        <a class="choice_action_admin" href="../public/index.php?route=deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>

        <h2 class="title_admin">Commentaires signalés</h2>
        <table class="table_admin">
            <tr class="tr_ad">
                <td class="title_table_admin">Id</td>
                <td class="title_table_admin">Pseudo</td>
                <td class="title_table_admin">Message</td>
                <td class="title_table_admin">Date</td>
                <td class="title_table_admin">Actions</td>
            </tr>
            <?php
            foreach ($comments as $comment){
                ?>
                <tr>
                    <td class="content_table_admin"><?= htmlspecialchars($comment->getId());?></td>
                    <td class="content_table_admin"><?= htmlspecialchars($comment->getPseudo());?></td>
                    <td class="content_table_admin"><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
                    <td class="content_table_admin">Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
                    <td class="content_table_admin actions_list">
                        <a class="choice_action_admin" href="../public/index.php?route=unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler le commentaire</a>
                        <a class="choice_action_admin" href="../public/index.php?route=deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>


        <h2 class="title_admin">Utilisateurs</h2>
        <table class="table_admin">
            <tr class="tr_ad">
                <td class="title_table_admin">Id</td>
                <td class="title_table_admin">Pseudo</td>
                <td class="title_table_admin">Date</td>
                <td class="title_table_admin">Rôle</td>
                <td class="title_table_admin">Actions</td>
            </tr>
            <?php
            foreach ($users as $user){
            ?>
                <tr>
                    <td class="content_table_admin"><?= htmlspecialchars($user->getId());?></td>
                    <td class="content_table_admin"><?= htmlspecialchars($user->getPseudo());?></td>
                    <td class="content_table_admin">Créé le : <?= htmlspecialchars($user->getCreatedAt());?></td>
                    <td class="content_table_admin"><?= htmlspecialchars($user->getRole());?></td>
                    <td class="content_table_admin actions_list">
                        <?php
                        if($user->getRole() != 'admin') { ?>
                        <a class="choice_action_admin" href="../public/index.php?route=deleteUser&userId=<?= $user->getId(); ?>">Supprimer</a>
                        <?php }
                        else {
                            ?>
                        Suppression impossible
                        <?php
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
    </div>
    </div>    
</body>