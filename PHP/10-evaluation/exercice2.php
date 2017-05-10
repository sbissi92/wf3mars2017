<?php
// -------------traitement-------------------

// déclaration de $affichage
$affichage = '';

// fonction de conversion de money
function conversion($montant,$devise){
    if($devise == 'euro'){ //si l'unité choisie est l'euro on converti en dollard
        $contenu = $montant * 1.085965;
        $return = array('contenu'=>$contenu,'devise'=>'US');
    // }else{si nn on converti en euro
        $contenu = $montant / 1.085965;
        $return = array('contenu'=>$contenu,'devise'=>'euro');
    }
    return $return;
}
// vérification des paramétres
if (!empty($_GET)){
    // il faut entré un montant et que  le montant entré soit en chiffres et supérieur à 0 
    if(!is_numeric($_GET['montant'])|| $_GET['montant'] <= 0 || empty($_GET['montant'])){
        $affichage .= '<p>montant incorrect</p>';
    }
    // l'unité choisie doit etre soit le dollad soit l'euro
    if (empty($_GET['devise']) || ($_GET['devise'] != 'euro' && $_GET['devise'] != 'US')){
        $affichage .= '<p>devise non valide</p>';
    }
    // si les paramétres entrés sont valide on appelle la fonction pour le calcul
    if (empty($affichage)){
        $resultat = conversion($_GET['montant'],$_GET['devise']);
        $resultat_unite =($_GET['devise'] == 'US')?'dollard' : 'euro';   //déclaration dune variable pour l'affichage des unités correctes'
        $affichage .= $_GET['montant'].''.$resultat_unite.' = '.$resultat['contenu'].''.$resultat['devise'];
    }
}


// -------------affichage--------------------
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
    <form method="get"  action="">
        <p>montant à convertir</p>
        <input type="text" name="montant">
        <p>devise</p>
        <div><input type="radio" name="devise" value="euro" checked>euro</div>
        <div><input type="radio" name="devise" value="US" checked>dollard</div><br>
        <input type="submit" value="conversion">

        <div><?php echo $affichage; ?></div>
        
    </form>
</body>
</html>