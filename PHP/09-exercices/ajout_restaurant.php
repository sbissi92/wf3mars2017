<?php

/* 1- Créer une base de données "restaurants" avec une table "restaurant" :
	  id_restaurant PK AI INT(3)
	  nom VARCHAR(100)
	  adresse VARCHAR(255)
	  telephone VARCHAR(10)
	  type ENUM('gastronomique', 'brasserie', 'pizzeria', 'autre')
	  note INT(1)
	  avis TEXT

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un restaurant dans la bdd. Les champs type et note sont des menus déroulants que vous créez avec des boucles.
	
	3- Effectuer les vérifications nécessaires :
	   Le champ nom contient 2 caractères minimum
	   Le champ adresse ne doit pas être vide
	   Le téléphone doit contenir 10 chiffres
	   Le type doit être conforme à la liste des types de la bdd
	   La note est un nombre entre 0 et 5
	   L'avis ne doit être vide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter le restaurant à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/

// --------------traitement-------------
$affichage ='';
$aray = array ('gastronomique', 'brasserie', 'pizzeria', 'autre');

if (!empty($_POST)){

		if (strlen($_POST['nom'])<2){
		$affichage .= '<p>Nom trés court</p>';
		}
		if (strlen($_POST['adresse'])<1){
		$affichage .= '<p>entrer une adresse</p>';
		}
		if (!preg_match('#^[0-9]{10}$#',$_POST['telephone'])){
		$affichage .= '<p>entrer 10 chiffres</p>';
	    }
		if(!in_array($_POST['type'],$aray)){
			$affichage .= '<p>type non valider</p>';
		}
		if($_POST['note'] < 0 || $_POST['note'] > 5){
			$affichage .= '<p>note non validé</p>';
		}
		if(empty($_POST['avis'])){
			$affichage .= '<p>il faut remplir l\'avis</p>';
		}

}else{
	$affichage .= '<p>il faut remplir l\'avis</p>';
}







// --------------afichage---------------
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
   <form method="post" action"">
   		<label for="id_restaurant">id_restaurant</label>
		<input type="text"  name="id_restaurant"><br><br>
		<label for="nom">nom</label>
		<input type="text" id="nom" name="nom"><br><br>
		<label for="adresse">adresse</label>
		<input type="text" id="adresse" name="adresse"><br><br>
		<label for="telephone">telephone</label>
		<input type="number"  id="telephone" name="telephone"><br><br>
		<label for="type">type</label>
		<select name="type" id="type">
			<option value="gastronomique">gastronomique</option>
			<option value="brasserie">brasserie</option>
			<option value="pizzeria">pizzeria</option>
			<option value="autre">autre</option>
		</select><br><br>
		<label for="note">note</label>
		<select name="noteK" id="note">
			<option value="0">0</option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
		</select><br><br>
	    
		<label for="avis"></label>
		<input type="text"  id="avis"><br><br>

		<input type="submit" value="valider">
		<div><?php echo $affichage ?></div>
	
	</form>
</body>
</html>