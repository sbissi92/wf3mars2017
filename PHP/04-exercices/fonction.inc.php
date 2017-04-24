<?php
// voici une fonction qui permet de retourner le prix d'un fruit en fonction d'un poids.

function calcul($fruit,$poids) {
    switch($fruit) {
        case 'cerises' : $prix_kg = 5.76; break;
        case 'bananes' : $prix_kg = 1.09; break;
        case 'pommes' : $prix_kg = 1.61; break;
        case 'peches' : $prix_kg = 3.23; break;
        default : return 'fruit inexistant';

    }
    $resultat = $poids * $prix_kg / 1000;  //calcule le prix total selon un poids donné en grammes.

    return 'les' . $fruit . 'coûtent' . $resultat . ' euro pour ' .$poids .'grammes';

}
// echo calcul('cerises', 1500);