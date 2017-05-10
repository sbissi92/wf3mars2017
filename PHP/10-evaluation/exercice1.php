<?php
// ---------------------traitement-----------------

$affichage = '';

// array en php:
$aray = array('prénom'=>'mariem','nom'=>'sbissi','adresse'=>'11 rue pierre de ronsard','code postal'=>'95170','ville'=>'deuil la barre','email'=>'mariemsbissi@gmail.com','téléphone'=>'0627125501','date de naissance'=>'1992-05-07');
// boucle foreach pour parcourir les indices accompagnés de leurs valeurs : $key = indice et $ vvalue = valeur:
foreach ($aray as $key => $value) {

    // condition dans la boucle pour inverser la date de naissance du format anglais au format français à l'afichage:
        if ($key == 'date_de_naissance') {
            // la classe datetime pour transformation du format date: 
            $date = new DateTime($value);
            $value = $date->format('d-m-Y');
        }
           
// (affichage en liste <li>):
        $affichage .= "<li>$key : $value</li>";

}


// -----------------------affichage------------------------
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
    <ul>
        <div><?php echo $affichage; ?></div>
    </ul>
</body>
</html>