<?php
// ------------------traitement-------------------------
$pdo = new PDO('mysql:host=localhost;dbname=exercice_3', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
// déclaration de la variable d'affichage
$affichage = '';
$contenu = '';

// véricfication du formulaire

if ($_POST) { // au moin 5 caractéres pour les champs titre,acteur,directeur,producteur et storyline:
// strln = vérifier que c un string:
    if (empty($_POST['title']) || strlen($_POST['title']) < 5) {
        $affichage .= '<div>au moin 5 caractéres</div>';
    }
    if (empty($_POST['actors']) || strlen($_POST['actors']) < 5) {
        $affichage .= '<div>au moin 5 caractéres</div>';
    }
    if (empty($_POST['director']) || strlen($_POST['director']) < 5) {
        $affichage .= '<div>au moin 5 caractéres</div>';
    }
    if (empty($_POST['producer']) || strlen($_POST['producer']) < 5) {
        $affichage .= '<div>au moin 5 caractéres</div>';
    }
    if (empty($_POST['storyline']) || strlen($_POST['storyline']) < 5) {
        $affichage .= '<div>au moin 5 caractéres</div>';
    }
    if (empty($_POST['year_of_prod']) || $_POST['year_of_prod'] != 2017 || $_POST['year_of_prod'] != 2016 || $_POST['year_of_prod'] != 2015 || $_POST['year_of_prod'] != 2014) {
        $affichage .= '<div>Année de production non valide</div>';
    }
    if (empty($_POST['language']) || $_POST['language'] != 'français' || $_POST['language'] != 'anglais' || $_POST['language'] != 'arabe') {
        $affichage .= '<div>Language non valide</div>';
    }
    if (empty($_POST['category']) || $_POST['category'] != 'comedie' || $_POST['category'] != 'histoire' || $_POST['category'] != 'guerre'|| $_POST['category'] != 'drame') {
        $affichage .= '<div>Catégory non valide</div>';
    }
    // if (!filter_var($_POST['video'],FILTER_VALIDATE_URL)){
        // $affichage .= '<div>Lien incorrect!</div>';        
    // }
    
}

$query = $pdo->prepare('INSERT INTO movies (title,realisateur,annee) VALUES(:nom, :realisateur, :annee)');
		$query->bindParam(':title', $_POST['title'], PDO::PARAM_STR);
		$query->bindParam(':realisateur', $_POST['realisateur'], PDO::PARAM_STR);
		$query->bindParam(':annee', $_POST['annee'], PDO::PARAM_INT);
		

		$succes = $query->execute();

		if ($succes) {
			$contenu .= '<div>Le film est ajouté<div>';
		} else {
			$contenu .= '<div>Erreur d\'ajout de film<div>';
		}



















// ------------------affichage--------------------------
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

		<div><label for="title"></label>title</div>
		<input type="text" id="title" name="title"><br><br>

		<div><label for="actors"></label>actors</div>
		<input type="text" id="actors" name="actors"><br><br>

		<div><label for="director"></label>director</div>
		<input type="text" id="director" name="director"><br><br>

		<div><label for="producer"></label>producer</div>
		<input type="text" id="producer" name="producer"><br><br>

		<div><label for="year_of_prod"></label>year of production</div><br>
			<select id="year_of_prod" name="year_of_prod">
				<option value="2017">2017</option>
				<option value="2016">2016</option>
				<option value="2015">2015</option>
				<option value="2014">2014</option>
			</select><br><br>

		<div><label for="language">language</label></div><br>
			<select id="language" name="language">
				<option value="français">français</option>
				<option value="arabe">arabe</option>
				<option value="anglais">anglais</option>
			</select><br><br>

		<div><label for="category">category</label></div><br>
			<select id="category" name="category">
				<option value="comedie">comédie</option>
				<option value="drame">drame</option>
				<option value="guerre">guerre</option>
				<option value="histoire">histoire</option>
			</select><br><br>

		<div><label for="storyline">storyline</label></div>
		<input type="text" id="storyline" name="storyline"><br><br>

		<div><label for="video">bande d'annonce</label></div>
        <input type="text" name="video" id="video"><br><br>
         
		<input type="submit" value="valider">
    </form>	

</body>
</html>
<?php
