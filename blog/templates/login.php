<?php $this->title = "Connexion"; ?>

<body>
    <div class="title_page">
            <h1> CONNEXION</h1>
    </div>

    <div class="block_all_content">
        <div class="block_menu">
        <nav>
            <ul>
                <li class="menu"><a href="../public/index.php">Retour à l'accueil</a></li>
            </ul>
        </nav>
        </div>

        <div class="info_session">
            <?= $this->session->show('error_login'); ?>
        </div>

        <div class="block_session_content">
            <form method="post" action="../public/index.php?route=login">
                <label for="pseudo">Pseudo</label><br>
                <input type="text" id="pseudo" name="pseudo"><br>
                <label for="password">Mot de passe</label><br>
                <input type="password" id="password" name="password"><br>
                <input type="submit" value="Connexion" id="submit" name="submit">
            </form>
        </div>    
    </div>
</body>