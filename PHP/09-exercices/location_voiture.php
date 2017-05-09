<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

   2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

   3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. 

   4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/

// ------------traitement-----------------


function prixLoc ($nombresJours,$categorie){

     switch($categorie) {
        case 'A' : $prix = ($nombresJours*30);break;
        case 'B' : $prix = ($nombresJours*50);break;
        case 'C' : $prix = ($nombresJours*70);break;
        default: $prix = ($nombresJours*90);
    
}
    return $prix;
}


$categorie = array('A','B','C','D');
$nombresJours = intval($_POST['nombres_de_jours_de_location']);



if(!empty($_POST)){
   
   if ( !in_array($_POST['categories'],$categorie)) {
       $affichage = 'categorie non choisie';
   }

   if ($nombresJours <= 0) {
      $affichage = 'nombres de jours indéfini';
   }
   
   if(empty($affichage)){
    $affichage = 'la location de votre véhicule sera de '.prixLoc($nombresJours,$_POST['categories']).'euros pour '.$nombresJours.' jours';
    }
    }













// ------------ Affichage ----------------
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<form method="post" action="">
        <label for="categories de vehicules"></label>
            <select name="categories" id="categories">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
           </select> <br>

        <label for="nombres de jours de location"></label>
        <input type="text" id="nombres de jours de location" name="nombres_de_jours_de_location" value="0"><br>

        <input type="submit"  value="valider">

    </form>
    <div><?php echo $affichage ?></div>
</body>
</html>