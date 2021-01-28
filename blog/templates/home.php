<?php $this->title="Accueil"; ?> <!--structure de base du HTML -->


<body>
    <div>
        <h1>Mon blog</h1>
        <p>test</p>
        <?= $this->session->show('add_comment'); ?>
        <?= $this->session->show('flag_comment'); ?>
        <?= $this->session->show('delete_comment'); ?>
        <?= $this->session->show('register'); ?>
        <?= $this->session->show('login'); ?>
        <?= $this->session->show('logout'); ?>
        <?= $this->session->show('delete_account'); ?>

        <?php if($this->session->get('pseudo')){ ?>
            <a href="../public/index.php?route=logout">Déconnexion</a>
            <a href="../public/index.php?route=profile">Profil</a>
            <?php if($this->session->get('role') === 'admin'){ ?>
                <a href="../public/index.php?route=administration">Administration</a>
            <?php } ?>
            
            <?php
        }else{ ?>
            <a href="../public/index.php?route=register">Inscription</a>
            <a href="../public/index.php?route=login">Connexion</a>

        <?php
        } ?>

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