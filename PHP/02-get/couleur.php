<?php

// exercice:
/*  
dans le fichier listeFruits.php : créer 3 liens banane, kiwi et cerise.quand on clique sur les liens, on passe le nom du fruit dans l'url à la page couleur.php.
dans couleur.php: vous récupérez le nom du fruit et affichez sa couleur.
notez que vous ne passez pas la couleur dans l'url mais vous la déduisez dans couleur.php.
*/

if(isset($_GET['fruit'])){
    switch($_GET['fruit']){
        case 'banane' : echo 'la banane est jaune';break;
        case 'kiwi' : echo 'le kiwi est vert';break;
        default : echo 'le cerise est rouge';
    }

}else{
    echo'pas de choix';
}


