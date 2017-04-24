<?php

// de plus une fois le formulaire soumis vous vérifiez que le pseudo n'est pas vide si tel est le cas affichez un message d'erreur à l'internaute (dans formulaire 4.

if(!empty($_POST)){
    
    echo'pseudo : ' . $_POST['pseudo'] . '<br>';
    echo 'email : ' . $_POST['email'] . '<br>';
}else{
    echo 'champs vides!!';
}
