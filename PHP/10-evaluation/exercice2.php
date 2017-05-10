<?php
// -------------traitement-------------------
$affichage = '';

function conversion($montant,$devise){
    if($devise == 'euro'){
        $contenu = $montant * 1.085965;
        $return = array('contenu'=>$contenu,'devise'=>'euro');
    }elseif($devise == 'US'){
        $contenu = $montant / 1.085965;
        $return = array('contenu'=>$contenu,'devise'=>'US');
    }
    return $return;
}

if (!empty($_GET)){
    if(!is_numeric($_GET['montant']) || $_GET['montant'] <= 0 || empty($_GET['montant'])){
        $affichage .= '<p>montant incorrect</p>';
    }
    if (!empty($_GET['devise']) || ($_GET['devise'] != 'euro' && $_GET['devise'] != 'US')){
        $affichage .= '<p>devise non valide</p>';
    }
    if (empty($affichage)){
        $resultat = conversion($_GET['montant'],$_GET['devise']);
        $affichage .= "$resultat[devise]$resultat[montant] = $resultat[montant]";
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
        <div><?php echo $contenu; ?></div>
    </form>
</body>
</html>