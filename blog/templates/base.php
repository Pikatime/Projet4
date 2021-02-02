<!DOCTYPE html> <!-- centralise la structure du base d'un fichier HTML -->
<html lang="fr">
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../public/css/title_menu_info4.css">
    <link rel="stylesheet" href="../public/css/accueil3.css">
    <link rel="stylesheet" href="../public/css/single.css">
    <link rel="stylesheet" href="../public/css/admin.css">
    <link rel="stylesheet" href="../public/css/forms.css">
    <link rel="stylesheet" href="../public/css/profile.css">
    <meta charset="UTF-8" />
    <title><?=$title ?></title>
</head>

<body>
    <header>
        <img class="banner" src=../public/img/banner.jpg alt="Bannière du site" />
    </header>
    <div id ="content" class="general_setup">
    <?= $content ?>
    </div>
</body>
</html>