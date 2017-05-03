<?php
require_once('inc/init.inc.php');







// ----------------------traitement----------------------------
// 1- affichage des catégories de vetements:
$categories_des_produits = executeRequete("SELECT DISTINCT categorie FROM produit");
// la variable categorie des produit est un objet car il ya execute requete et pas un array! pour la transformer en aray on va faire une boucle while(fetch)assoc.
$contenu_gauche .= '<p class="lead>vetements</p>';
$contenu_gauche .= '<div class="list-group">';
    $contenu_gauche .= '<a href="?categorie=all" class="list-group-item" >toutes les catégories</a>';



// boucle while qui parcourt l'objet $categorie des produit pour en faire un array associatif'

while($cat = $categories_des_produits->fetch(PDO::FETCH_ASSOC)) {
    // pour voir ya quoi dans les crochets: echo '<pre>';print_r($cat); echo '</pre>';
     $contenu_gauche .= '<a href="?categorie='. $cat['categorie'].'" class="list-group-item">'. $cat['categorie'] . '</a>';
}

$contenu_gauche .= '</div>';
// 2-affichage des produits selon la catégorie choisie:
if(isset($_GET['categorie']) && $_GET['categorie'] != 'all') {
    // si on a choisi une categorie autre que "all" :
    $donnees = executeRequete("SELECT id_produit, reference, titre, photo, prix, description FROM produit WHERE categorie = :categorie",array(':categorie' => $_GET['categorie']));
}else{
    // sinon si on a demandé toutes les catégories :
    $donnees = executeRequete("SELECT id_produit, reference, titre, photo, prix, description FROM produit");
    // pas de clause WHERE car on veut toutes laes categories
}
while ($produit = $donnees->fetch(PDO::FETCH_ASSOC)) {
    $contenu_droite .= '<div class="col-sm-4 col-lg-4 col-md-4">';
      $contenu_droite .= '<div class="thumbnail">';
            $contenu_droite .= '<a href=""><img src="" width="130" height="100" ></a>';

            $contenu_droite .= '</div>';
        $contenu_droite .= '</div>';
}
// -----------------------affichage-----------------------------
require_once('inc/haut.inc.php');
?>

    <div class="row">
        <div class="col-md-3">
                <?php echo $contenu_gauche; ?>
        </div>

        <div class="col-md-9">
                 <?php echo $contenu_droite; ?>
        </div>
    </div>
 </div>

 <?php
 require_once('inc/bas.inc.php');
