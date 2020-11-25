<table>
<?php

if(!$listComments){
    exit;
}

foreach($listComments as $comment){
    ?>
    <tr>
        <td><?php echo $comment->id; ?></td>
        <td><?php echo $comment->articleId; ?></td>
        <td><?php echo $comment->content; ?></td>
    </tr>
    <?php

}

?>
</table>