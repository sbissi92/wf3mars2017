<?php

/* 1- Créer une base de données "contacts" avec une table "contact" :
	  id_contact PK AI INT(3)
	  nom VARCHAR(20)
	  prenom VARCHAR(20)
	  telephone INT(10)
	  annee_rencontre (YEAR)
	  email VARCHAR(255)
	  type_contact ENUM('ami', 'famille', 'professionnel', 'autre')

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un contact dans la bdd. Le champ année est un menu déroulant de l'année en cours à 100 ans en arrière à rebours, et le type de contact est aussi un menu déroulant.
	
	3- Effectuer les vérifications nécessaires :
	   Les champs nom et prénom contiennent 2 caractères minimum, le téléphone 10 chiffres
	   L'année de rencontre doit être une année valide
	   Le type de contact doit être conforme à la liste des types de contacts
	   L'email doit être valide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	3- Ajouter les contacts à la BDD et afficher un message en cas de succès ou en cas d'échec.

*/
// -------------------------------------- Traitement --------------------------------------------
$affichage ='';

if (!empty($_POST)){
	
	if (strlen($_POST['nom'])<2){
		$affichage .= '<p>Nom trés court</p>';
	} 
	if (strlen($_POST['prenom'])<2){
		$affichage .= '<p>Prénom trés court</p>';
	}
	if (!preg_match('#^[0-9]{10}$#',$_POST['telephone'])){
		$affichage .= '<p>entrer des chiffres</p>';
	}
	if ($_POST['annee'] > date('Y') && $_POST['annee'] < (date('Y')-100)){
		$affichage .= '<p>Année invalide</p>';
	}
	if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
		$affichage .= '<p>Email invalide</p>';
	} 
	if ($_POST['type'] != 'famille' && $_POST['type'] != 'professionnel' && $_POST['type'] != 'autre') {
		$affichage .= '<p>Type invalide</p>';
    }
}else{
    $affichage.= '<p>Veuillez remplir le formulaire !</p>';
}

?>

<!-- --------------------------------------- Affichage ------------------------------------------ -->
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<h1>Création d'un nouveau contact</h1>
	<?php echo $affichage?>
	<form method="post" action="" style="display:inline-grid;">
		<label for="nom">Nom</label>
		<input type="text" id="nom" name="nom" value=""><br>
		<label for="prenom">Prénom</label>
		<input type="text" id="prenom" name="prenom" value=""><br>
		<label for="telephone">Téléphone</label>
		<input type="text" id="telephone" name="telephone" value=""><br>
		<label for="annee">Année de rencontre</label>
		<select name="annee" id="annee">
		<?php
			for ($i=date('Y');$i >= date('Y')-100; $i--) {
				echo '<option value="'.$i.'">'.$i.'</option>';
			}
		?>
		</select><br>
		<label for="email">Email</label>
		<input type="text" id="email" name="email" value=""><br>
		<label for="type">Type</label>
		<select name="type" id="type">
			<option value="famille">Famille</option>
			<option value="professionnel">Professionnel</option>
			<option value="autre">Autre</option>
		</select><br>
		<input type="submit" name="ajouter" value="Ajouter">
	</form>	
</body>
</html>