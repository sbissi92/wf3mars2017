<?php
// afficher dans une table html la liste des restaurants avec les champs nom et téléphone et un champ supplémentaires "autres infos"avec un lien qui permet d'afficher le détail de chaque contact.
// afficher sous la table html le détail d'un contact quand on clique sur le lien "autres infos"



// -----------------traitement------------------------
$list = '';


$pdo = new PDO('mysql:host=localhost;dbname=restaurants','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


$variable = $pdo->query("SELECT * FROM restaurant");
	while ($ligne = $variable->fetch(PDO::FETCH_ASSOC)) {
		$list .= '<tr><td>'.$ligne['nom'].'</td><td>'.$ligne['telephone'].'</td><td><a href="?id='.$ligne['id_restaurant'].'">Autres infos</a></td></tr>';
	}



// ----------------affichage----------------------------
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

<table>
		<tr>
			<th>Nom</th>
			<th>Telephone</th>
			<th></th>
		</tr>
		<?php
			echo $list;
		?>
	
</table>
</body>
</html>