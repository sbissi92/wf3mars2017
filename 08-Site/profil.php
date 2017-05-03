<?php
require_once('inc/init.inc.php');
// ------------------------traitement--------------------
// si visiteur non connecté on l'envoie vers connexion.php :
if (!internauteEstConnecte()) {
    header('location:connexion.php'); //nous l'invitions à se connecter
    exit();
}

$contenu .= '<p>bonjour'. $_SESSION['membre']['pseudo'] .' ! </p>';

//echo '<pre>'; print_r($_SESSION); echo '</pre>';

// oon affiche le statut du membre: 
if ($_SESSION['membre']['statut'] == 1) {
    $contenu .= '<p>vous etes un administrateur</p>';
}else {
    $contenu .= '<p>vous etes un membre</p>';
}

$contenu .= '<div><h3>voici vos informations de profil </h3>';
        $contenu .=  '<p>votre email : '. $_SESSION['membre']['email'] .' ! </p>';
         $contenu .=  '<p>votre adresse : '. $_SESSION['membre']['adresse'] .' ! </p>';
          $contenu .=  '<p>votr code postal : '. $_SESSION['membre']['code_postal'] .' ! </p>';
           $contenu .=  '<p>votr ville : '. $_SESSION['membre']['ville'] .' ! </p>';
$contenu .= '</div>';









// -------------------affichage----------------------------
require_once('inc/haut.inc.php');
echo $contenu;
require_once('inc/bas.inc.php');