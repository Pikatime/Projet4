<?php $this->title="La plume"; ?> <!--structure de base du HTML -->


<body>
    <div class="title_page general_setup">
        <h1>LA PLUME VIVANTE <br>
        <p class="subtitle">Une vie, une histoire</p></h1>
    </div>    

    <div class="block_all_content">
    <div class="block_menu">
    <nav>
        <ul>
            <?php if($this->session->get('pseudo')){ ?>
                <li class="menu"><a href="../public/index.php?route=logout">Déconnexion</a></li>
                <li class="menu"><a href="../public/index.php?route=profile">Profil</a></li>
                <?php if($this->session->get('role') === 'admin'){ ?>
                    <li class="menu"><a href="../public/index.php?route=administration">Administration</a></li>
                <?php } ?>
            
                <?php
            }else{ ?>
                <li class="menu"><a href="../public/index.php?route=register">Inscription</a></li>
                <li class="menu"><a href="../public/index.php?route=login">Connexion</a></li>

            <?php
            } ?>

        </ul>
    </nav>
    </div>
    <div class="block_session_content">
    <div class= "info_session">
        <?= $this->session->show('add_comment'); ?>
        <?= $this->session->show('flag_comment'); ?>
        <?= $this->session->show('delete_comment'); ?>
        <?= $this->session->show('register'); ?>
        <?= $this->session->show('login'); ?>
        <?= $this->session->show('logout'); ?>
        <?= $this->session->show('delete_account'); ?>
    </div>

    <div class="block_content">
    

        <?php
        foreach ($articles as $article)
        {
            ?>
            <div class="list_articles" >
                <h2 class="title_article"><a href="../public/index.php?route=article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
                <p class="content_article content_text"><?=htmlspecialchars($article->getContent());?></p>
                <p class="content_article content_infos"><?=htmlspecialchars($article->getAuthor());?></p>
                <p class="content_article content_infos"><?=htmlspecialchars($article->getCreatedAt());?></p>
            </div>
            <br>
            <?php
        }
        ?>
    </div>
    </div>
    </div>  
</body>
</html>