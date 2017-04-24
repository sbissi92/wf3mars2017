<h1>page détail des articles</h1>

<?php
// *************************************
// la superglobale $_GET
// *************************************
// $_GET represente l'url: il s'agit d'une superglobale,et comme toutes les superglobales,d'un ARRAY.superglobale signifie qu'il est disponible dans tous les contextes du script, y compris dans les fonctions: il n'est pas nécessaire de faire global $_GET.

// les informations transitent dans l'url de la maniére suivante:
// page.php?indice1=valeur&indice2=valeur2 (sans espace)
// chaque indice de cet url correspondent à un indice de l'array $_GET,et chaque valeur aux valeurs correspondantes aux indices'. 

// print_r($_GET);echo '<br>';


if (isset($_GET['article']) && isset($_GET['couleur']) && isset ($_GET['prix'])) {
    // si existent les indices article, couleur et prix, on peut les afficher:
echo 'article : '.$_GET['article'].'<br>';
echo 'couleur : '.$_GET['couleur'].'<br>';
echo 'prix : '.$_GET['prix'].'<br>';
}else{
    echo 'aucun produit séléctionné';
}