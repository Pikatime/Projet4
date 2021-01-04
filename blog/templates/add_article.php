<?php $this->title = "Nouvel Article"; ?> <!-- cf base.php-->
<h1> Ajout d'article</h1>
<p>bla</p>
<div>
    <form method="post" action="../public/index.php?route=addArticle">
        <label for="title">Titre</label></br>
        <input type="text" id="title" name="title"></br>
        <label for="content" name="Contenu ">Contenu</label></br>
        <textarea id="content" name="content"></textarea></br>
        <label for="author">Auteur</label><br>
        <input type="text" id="author" name="author"><br>
        <input type="submit" value="Envoyer" id="submit" name="submit">
    </form>
    <a href="..public/index.php"> Retour à l'accueil</a>
</div>
