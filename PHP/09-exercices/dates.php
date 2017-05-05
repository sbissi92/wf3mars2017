<?php
// creer une fonction qui retourne la conversion d'une date fr en date us ou inversement.cette fonction   prend 2 parametres :une date valide et le format de conversion us ou fr. 
// 'vous validez que le parametre de format est bien us ou fr .la fonction retourne un message si ce nest pas le cas. 



function conversion ($date,$format) {
     if ($format = 'us'){
         return strftime('%Y-%m-%d',strtotime($date));
     } elseif ($format = 'fr') {
              return strftime('%d-%m-%Y',strtotime($date));
     }else {
             return 'format invalide';
   }
}
       echo conversion('07-05-2017','fr');
