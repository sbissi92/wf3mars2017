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
function executeRequete ($req,$param = array()) {   // $param est un array vide par defaut : il est donc optionnel
    // htmlspecialchars :
    if (!empty($param)){
        // Si on a bien reçu un array non vide on le traite
        foreach ($param as $indice => $valeur) {
            $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES);    // transforme en entité HTML chaque caractéres
        }                                                               // spécial, dont les quotes "'"
    }
    // La requête préparée :
    global $pdo;    // On récupére la variable globale $pdo déclarée à l'extérieur de la function
    $r = $pdo->prepare($req);
    $succes = $r->execute($param);  // On execute la requête en lui passant l'array $param qui permet d'associer
                                    // chaque marqueur à sa valeur
    // Traitement erreur SQL événtuelle :
    if (!$succes) { // si $succes vaut false, il y a une erreur sur la requête
        die("Erreur sur la requête SQL : $r->errorinfo()[2]");  // die arrête le script et affiche le message d'erreur :  
    }                                                           // On récupére l'erreur en clair se situant à l'indice 2
                                                                // de l'array renvoyé par la méthode errorinfo() de l'objet
                                                                // PDOStatement $r
    return $r;  // retourne l'objet PDOStatement qui contient le résultat de la requête
}                                   
// ******************************************** Fonctions du panier ********************************************
function creationDuPanier() {
    if (!isset($_SESSION['panier'])) {
        // si le panier n'existe pas dans la session, on le crée :
        $_SESSION['panier'] = array();  // le panier est un array vide
        $_SESSION['panier']['titre'] = array();
        $_SESSION['panier']['id_produit'] = array();
        $_SESSION['panier']['quantite'] = array();
        $_SESSION['panier']['prix'] = array();
    }
}
function ajouterProduitDansPanier($titre,$id_produit,$quantite,$prix) { // ces arguments sont en provenance de panier.php_ini_loaded_file
    creationDuPanier(); // pour créer la structure si elle n'existe pas
    $position_produit = array_search($id_produit,$_SESSION['panier']['id_produit']);    // array_search() retourne l'indice dans l'array
                                                                                        // $_SESSION['panier'] de l'id_produit s'il existe déja
                                                                                        // sinon retourne FALSE
    if ($position_produit === false) {
        // Si le produit n'est pas dans le panier, on l'y ajoute :
        $_SESSION['panier']['titre'][] = $titre;    // On ajoute à la fin du tableau la nouvelle valeur avec les crochets vides
        $_SESSION['panier']['id_produit'][] = $id_produit;
        $_SESSION['panier']['quantite'][] = $quantite;
        $_SESSION['panier']['prix'][] = $prix;
    } else {
        // si le produit existe, on ajoute la quentité nouvelle à la quantité déjà présente dans le panier
        $_SESSION['panier']['quantite']['position_produit'] += $quantite;
    }
}
function montantTotal() {
    $total = 0;    // contient le total de la commande
    for ($i=0; $i<sizeof($_SESSION['panier']['id_produit']);$i++) {
    // Tant que $i est inférieur au nombre de produits dans le panier, on additionne le prix fois la quentité :
        $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];  
    }
    return round($total,2); // On retourne le total arrondi à 2 chiffres aprés la virgule
}

// -------------
function retirerProduitDuPanier($id_produit_a_supprimer) {
    // on cherche la position du produit dans le panier :
    $position_produit = array_search($id_produit_a_supprimer, $_SESSION['panier']['id_produit']);
    // array_search renvoie la position du produit(integer) sinon false s'il n'y est pas 

    if ($position_produit !== false) {
        //  si le produit est bien dans le panier ,on coupe sa ligne : 
        array_splice($_SESSION['panier']['titre'], $position_produit, 1);
        // efface la portion du tableau à partir de l'indice indiqué par $position_produit et sur 1 ligne 

        array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
        array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
        array_splice($_SESSION['panier']['prix'], $position_produit, 1);
    }
}



// --------------
// exercice : créer une fonction qui retourne le nombre de produits différents dans la panier,et afficher le résultat à coté du lien "panier" dans le menu de navigation ,exemple : panier(3),si le panier est vide on affiche (0):


function totalPanier (){
    
    
// si le panier existe
    if (isset($_SESSION['panier'])){
        // on compte les id produit
        $totalArticles = sizeof($_SESSION['panier']['id_produit']);
        // on renvoi la valeur calculée
        return $totalArticles;
    }else{
        return 0;
    }
}

