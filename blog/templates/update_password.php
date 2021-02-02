<?php $this->title = 'Modifier mot mot de passe'; ?>

<body>
    <div class="title_page">
        <h1>MODIFIER LE MOT DE PASSE <h1>
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
            <p>Le mot de passe de <?= $this->session->get('pseudo'); ?> sera modifié</p>
            <form method="post" action="../public/index.php?route=updatePassword">
                <label for="password">Nouveau mot de passe</label><br>
                <input type="password" id="password" name="password"><br>
                <input type="submit" value="Mettre à jour" id="submit" name="submit">
            </form>
        </div>
    </div>
</body>