<?php $this->title = "Nouvel Article"; ?> <!-- cf base.php-->

<body>
    <div class="title_page">
        <h1>AJOUTER UN ARTICLE</h1>
    </div>
    <div class="block_all_content">
        <div class="block_menu">
            <nav>
                <ul>
                    <li class="menu"><a href="../public/index.php">Retour à l'accueil</a></li>
                </ul>
            </nav>
        </div>

        <div class="block_session_content">
                <?php include('form_article.php');?>
        </div>
    </div>
</body>