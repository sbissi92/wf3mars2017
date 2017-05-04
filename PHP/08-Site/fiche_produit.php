<?php
require_once('inc/init.inc.php');







// ----------------------traitement----------------------------
$aside = '';

// 1-controler de l'existence du produit demandé :
if(isset($_GET['id_produit'])) { //si existe l'indice id_produit dans l'url
    // on requete en base le produit demandé pour vérifier son existence : 
    $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

    if($resultat->rowCount() <= 0) {
        header('location:boutique.php'); //si il n'ya pas de reésultat dans la requete c'est que le produit n'existe pas  : on oriente alors vers la boutique
    exit();     
    }

// 2- affichage du détail du produit :
$produit = $resultat->fetch(PDO::FETCH_ASSOC); //pas de while car qu'un seul produit

$contenu .= '<div class="row">
                <div class="col-lg-12">
                   <h1 class="page-header">'. $produit['titre'] .'</h1>
                </div>
             </div>';
$contenu .= '<div class="col-md-8">
                <img class="img-responsive" src="'. $produit['photo'] .'" alt="">
            </div>';
$contenu .= '<div class="col-md-4">
                <h3>description</h3>
                <p>'. $produit['description'] .'</p>

                <h3>détails</h3>
                <ul>
                   <li>catégorie : '. $produit['categorie'] .'</li>
                   <li>couleur : '. $produit['couleur'] .'</li>
                   <li>taille : '. $produit['taille'] .'</li>
                 </ul>  

                 <p class="lead">prix : '. $produit['prix'] .' €</p>
             </div>';

// 3- affichage du formulaire d'ajout au panier si stock > 0 :
$contenu .= '<div class="col-md-4">';
      if ($produit['stock'] > 0) {
        //   si il ya du stock ,on met le bouton d'ajout au panier
         $contenu .= '<form method="post" action="panier.php">';
            $contenu .= '<input type="hidden" name="id_produit" value="'. $produit['id_produit'] .'">';

            $contenu .= '<select name="quantite" id="quantite">';
               for ($i = 1; $i <= $produit['stock'] && $i <= 5; $i++) {
                   $contenu .= "<option>$i</option>";
               }

            $contenu .="</select>";
            $contenu .= '<input type="submit" name="ajout_panier" value="ajouter au panier" class="btn">';


         $contenu .= '</form>';
      }else {
          $contenu .= '<p>rupture de stock</p>';
      }
       // 4- Lien de retour vers la boutique
        $contenu .= '<p><a href="boutique.php?categorie='.$produit['categorie'].'">Retour vers votre sélection</a></p>';

      $contenu .= '</div>';
}else{
    // si l'indice id_produit n'est pas dans l'url 
    header('location:boutique.php'); //on le redirige vers la boutique 
    exit();
}
// -------------------exercice----------------------------------
/*
creer des suggestions de produits :afficher 2 produits (photo et titre) aléatoirement appartenant à la catégorie du produit affiché dans la page détaill.ces produits doivent etre différents du produit affiché.la photo est cliquable  et améne à la fiche produit. 

utilisez la variable $aside pour afficher le contenu .
*/
$suggestion = executeRequete("SELECT titre,photo,id_produit FROM produit WHERE id_produit <> :id_produit AND categorie = :categorie ORDER BY RAND() LIMIT 2", array('id_produit' => $produit['id_produit'], 'categorie' => $produit['categorie']));
while($affichage = $suggestion->fetch(PDO::FETCH_ASSOC)) {
    $aside .= '<a href="fiche_produit.php?id_produit='.$affichage['id_produit'].'"><img src="'.$affichage['photo'].'" width="50" height="50"></a>';
    $aside .= '<h4>'.$affichage['titre'].'</h4>';
}

// -----------------------affichage-----------------------------
require_once('inc/haut.inc.php');
echo $contenu_gauche;  //recevra le pop up de confirmation d'ajout au panier
?>
 <div class="row">
     <?php echo $contenu;   // affiche le détail d'un produit ?>
 </div>

 <div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">suggestions de produits</h3>
    </div>

    <?php echo $aside; //affiche les produits suggérés ?>
    </div>

    <script>
     $(document).ready(function(){
        //  affiche la fenetre modale :
        $("#myModal").modal("show");
     });
     </script>


<?php 
require_once('inc/bas.inc.php');