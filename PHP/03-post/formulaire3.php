<?php
// exercice : réaliser un formulaire "pseudo" et "email" dans formulaire3 en récupérant et affichant les informations dans formulaire4.php
// de plus une fois le formulaire soumis vous vérifiez que le pseudo n'est pas vide si tel est le cas affichez un message d'erreur à l'internaute (dans formulaire 4.
 
?>

<form method="post" action="formulaire4.php">
        <label for="pseudo">pseudo</label>
        <input type="text" name="pseudo"><br>
        <label for="email">email</label>
        <input type="email" name="email"><br>
        <input type="submit" value="valider">
</form>
