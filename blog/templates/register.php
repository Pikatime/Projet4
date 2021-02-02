<?php $this->title = "Inscription"; ?>

<body>
    <div class="title_page">
        <h1>INSCRIPTION</h1>
    </div>

    <div class="block_all_content">
        <div class="block_menu">
            <nav>
                <ul>
                    <li class="menu"><a href = "../public/index.php">Retour à l'accueil</a></li>
                </ul>
            </nav>
        </div>

        <div class="block_session_content">
            <form method="post" action="../public/index.php?route=register">
                <label for="pseudo">Pseudo</label><br>
                <input type="text" id="pseudo" name="pseudo" value="<?= isset($post) ? htmlspecialchars($post->get('pseudo')): ''; ?>"><br>
                <?= isset($errors['pseudo']) ? $errors['pseudo'] : ''; ?>
                <label for="password">Mot de passe</label><br>
                <input type="password" id="password" name="password"><br>
                <?= isset($errors['password']) ? $errors['password'] : ''; ?>
                <input type="submit" value="Inscription" id="submit" name="submit">
            </form>
        </div>
    </div>
</body>