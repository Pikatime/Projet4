<form method="post" action="bddForm.php">
    <h5>Formulaire de contact</h5>
    <p>
        <input type="text" name="name" placeholder="Identifiant" />
        <input type="email" name="email" placeholder="Email" />
        <textarea name="message" placeholder="Votre Message" ></textarea>
    </p> 

</form>
<?php

if (!$listForms){
    exit;
}

foreach($listForms as $form){
    ?>
    <tr>
        <td><?php echo $form->id; ?></td>
        <td><?php echo $form->email; ?></td>
        <td><?php echo $form->formId; ?></td>
        <td><?php echo $form->content; ?></td>
        <td><?php echo $form->date; ?></td>
    </tr>
    <?php
}
?>
