<?php $this->title = 'Mon profil'; ?>

<body>
<div class="title_page">
        <h1> MON PROFIL </h1>
    </div>

    <div class="block_all_content">
        <div class="block_menu">
        <nav>
            <ul>
                <li class="menu"><a href="../public/index.php">Retour à l'accueil</a></li>
            </ul>
        </nav>
        </div>

        <div class="block_session_content profile_page" >
            <div class="info_session">
                <?= $this->session->show('update_password'); ?>
            </div>

            <div class=profile_content>
                <h2><?= $this->session->get('pseudo'); ?></h2>
                <p class="id_user"> <?= $this->session->get('id'); ?></p>
                <a class="action_profile" href="../public/index.php?route=updatePassword">Modifier mon mot de passe</a>
                <a class="action_profile" href="../public/index.php?route=deleteAccount">Supprimer le compte</a>
            </div>
        </div>
    </div>
</body>