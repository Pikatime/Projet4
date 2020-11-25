<table>
<?php
if(!$listArticles){
    exit;
}

foreach($listArticles as $article){
    ?>
    <tr>
        <td><?php echo $article->title; ?></td>
        <td><?php echo $article->id; ?></td>
        <td><?php echo $article->description; ?></td>
        <td><?php echo $article->date; ?></td>
    </tr>
    <?php
}
?>


</table>