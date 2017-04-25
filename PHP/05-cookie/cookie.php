<?php
// *******************************
// les coukies
// *******************************

// un cookie est un petit fichier (4KO max) déposé par le serveur du site sur le poste de l'internaute et qui peut contenir des infos sous formes de textes
// les cookies sont automatiquement renvoyés au serveur web par le navigateur lorsque l'internaute navigue dans les pages concernées par les cookies.
// PHP peut trés facilement récupérer les données contenues dans un cookie : ses informations sont stokées dans la superglobale $_COOKIE.
// précaution à prendre avec les cookies : un cookie étant sauvegardé sur le poste de l'internaute, il peut être volé ou détourné. on n'y stocke donc pas de données sensibles (mot de passe, numméro de CB...). 

// application pratique : nous allons stocker la langue choisie par l'internaute dans un cookie.
// 1-affectation de la langue à la variable $langue:


if (isset($_GET['langue'])) {   //si une langue est passée dans l'url c'est que nous avons cliqué sur un lien
    $langue = $_GET['langue'];
}else if (isset($_COOKIE['langue'])) { //$_COOKIE est une superglobale dont l'indice correspond au nom du cookie, on entre dans le elseif si un cookie appelé "langue" a été envoyé par le client
    $langue = $_COOKIE['langue'];
}else{
    $langue ='fr';  //par défaut si aucun choix n'est fait et que n'existe pas le cookie alors on affecte 'fr'. 
}

// 2-envoi du cookie avec la langue

$un_an = 365 * 24 * 60 * 60;  //un an exprimé en secondes. 

setCookie('langue', $langue, time() + $un_an);   //setCookie('nom', 'valeur', 'date expiration en timestamp') permet de creer et d'envoyer le cookie vers le client. 


// 3-affichage de la langue
echo 'votre langue : ';
switch($langue) {
    case 'fr' : echo 'français'; break;
    case 'es' : echo 'espagnol'; break;
    case 'en' : echo 'englais'; break;
    case 'it' : echo 'italien'; break;

} 
?>

<h1>votre langue :</h1>
<ul>
    <li><a href="?langue=fr">Français</a></li>
    <li><a href="?langue=es">espagnol</a></li>
    <li><a href="?langue=en">englais</a></li>
    <li><a href="?langue=it">italien</a></li>
</ul>