<?php
// **********************
// la superglobale $_POST
// **********************
// $_POST est une superglobal est donc un array disponible dans tous les contextes du script.
// c'est une méthode qui permet de récupérer des informations issues d'un formulaire.
// un formulaire est obligatoirement dans des balises form ,avec la désignation des attributs method (pour get ou post)et action (qui indique le fichier de destinatiion des données du formulaire). il contient un bouton de type submit qui déclenche l'envoi des données vers le serveur

// les attributs name du formulaire constituent les indices de l'array $_POST de réception.les données saisies dans les champs constituent les valeurs correspondantes.

print_r($_POST);

if(!empty($_POST)) { //not empty signifie que l'array $_POST n'est pas vide ,autrement dit que le formulaire a été posté    ;   il peut cependant avoir été posté avec des champs vides :les valeurs de l'array $_POST' sont vides mais il ya bien les indices 'prenom' et 'description' à l'intérieur.


    echo'prénom : ' . $_POST['prenom'] . '<br>';
    echo 'description : ' . $_POST['description'] . '<br>';

}











?>

<h1>formulaire</h1>
<form method="post" action="">
    <label for="prenom">prénom</label>
    <input type="text" id="prenom" name="prenom"><br>

    <label for="description">description</label>
    <textarea name="description" id="description"></textarea><br>
    <input type="submit" name="validation" value="envoyer">
</form>


