<?php
// exercice : créer le formulaire indiqué au tableau , récupérer les données saisies et les afficher dans la meme page.

if(!empty($_POST)) {
    echo'ville : ' . $_POST['ville'] . '<br>';
    echo'code postal : ' . $_POST['code postal'] . '<br>';
    echo'adresse : ' . $_POST['adresse'] . '<br>';
}









?>

<form method="post" action="">
        <label for="ville">ville</label>
        <input type="text"><br>
        <label for="code postal">code postal</label>
        <input type="number"><br>
        <label for="adresse">adresse</label>
        <textarea name="adresse"></textarea><br>
        <input type="submit" value="valider">
</form>