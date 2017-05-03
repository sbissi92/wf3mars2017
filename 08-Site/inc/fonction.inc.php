<?php

// ******************************************** Fonctions membres ********************************************

function internauteEstConnecte() {
    // Cette fonction indique si l'internaute est connecté : si la session 'membre' est définie, c'est que
    //l'internaute est passé par la page de connexion avec le bon mdp
    if (isset($_SESSION['membre'])) {
        return true;
    } else {
        return false;
    }

    // On peut écrire :
    // return isset($_SESSION['membre']); car isset() retourne déjà un true ou false  
}

function internauteEstConnecteEtEstAdmin () {
    // Cette fonction indique si le membre connecté est admin
    if (internauteEstConnecte() && $_SESSION['membre']['statut'] == 1) {
        return true;
    } else {
        return false;
    }
}

function executeRequete ($req,$param = array()) { // $param est un array vide par défaut ,il est donc optionnel 

// htmlspecialchars:
if (!empty($param)) {
    //si on a bien reçu un array on le traite:
    foreach($param as $indice => $valeur) {
        $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES); // transforme en entités html chaque caractéres spéciaux ,dont les quotes.
    }
}

//  la requêtepréparée :
global $pdo; // $pdo est déclarée dans l'espace global (fichier init.inc.php). il faut donc faire gloal $pdo pour l'utiliser dans l'espace local de cette fonction


$r = $pdo->prepare($req);
$succes = $r->execute($param);  // on exécute la requéte en lui passant l'array $param qui permet d'associer chaque marqueur à a valeur

//traitement erreur SQL éventuelle :
if (!$succes) { // si $succes vaut false ,il ya une erreur sur la requete 
  die('erreur sur la requetet sql' . $r->errorInfo() [2] ); //die arrete le script et affiche un message.ici on affiche le message d'erreur sql donné par errorInfo() . cette méthode retourne un array dans le message se situe à l'indice [2]. 

     }
     return $r; //retourne un objet pdostatement qui contient le résultat de la requete 
}