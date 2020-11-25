<table>
<?php 

if(!$users) {
    exit;
}

foreach($users as $user) {
    ?>
    <tr><td><?php echo $user->id; ?></td><td><?php echo $user->email; ?></td></tr>
    <?php
}

?>
</table>