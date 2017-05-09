<?php
/* 
   Vous créez un tableau PHP contenant les pays suivants : France, Italie, Espagne, inconnu, Allemagne auxquels vous associez les valeurs Paris, Rome, Madrid, blablabla, Berlin.

   Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un paragraphe (où X remplace la capitale et Y le pays).

   Pour le pays "inconnu" vous afficherez "Ca n'existe pas !" à la place de la phrase précédente. 	


*/



// -----------------traitement----------------
$affichage='';
$pays = array ('france'=>'paris','italie'=>'rome','espagne'=>'madrid','inconnu'=>'blabla','allemagne'=>'berlin');

foreach ($pays as $capitales => $pay){
            if ($capitales == 'inconnu'){
                $affichage .= 'ça n\'existe pas!';
            }else{

        $affichage .= '<p> la capitale '.$pay.' se situe en '.$capitales.'</p>';
    }
}





// -----------------affichage-----------------
echo $affichage;