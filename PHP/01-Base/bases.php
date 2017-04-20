<style>h2{font-size: 15px; color: red;} </style>


<?php








// -------------------------------
echo '<h2> Les balises PHP </h2>';
// -------------------------------
?>

<?php
// pour ouvrir un passage en php,on utilise la balise précédente
// pour fermer un passage en php on utilise la suivante
?>

<strong>Bonjour</strong>
<!--en dehors des balises d'ouverture et de fermeture du php nous pouvons écrire du html-->



<?php
// --------------------------------------------------
echo '<h2> Ecriture et affichage </h2>';
// --------------------------------------------------

// echo est une instruction qui nous permet d'effectuer un affichage.notez que les instructions se terminent par un ";"
echo'<br>'; //on peut mettre des balises html dans un echo ,elles sont interprétée comme telles.

print'nous sommes jeudi'; //print est une autre instruction d'affichage'

// pour info ,il existe d'autres instructions d'affichage (cf plus loin:):
// print_r();
// var_dump();




 echo '<h2> variable : types / déclaration / affectation </h2>';

// définition : une variable est un espace mémoire nommé qui permet de conserver une valeur.
// en php on déclare une variable avec le signe $

$a = 127; //je déclare la variable a, et je lui affecte la valeur 127, le type de la variable a est integer (entier)

$b = 1.5; //un type double pour nombre à virgule

$a = 'une chaine de caracteres'; //type string 

$b = '127'; // type string 

$a = true; //type boolean qui prend que 2 valeurs possibles : trueou false


// -----------------------------
echo '<h2> concaténation </h2>';
// -----------------------------

$x = 'bonjour ';
$y = 'tout le monde';
echo $x . $y.'<br>'; // point de concaténation que l'on peut traduire par 'suivi de'

echo "$x $y <br>"; //on obtient le meme résultat sans concaténation (cf chapitre suivant pour l'explication de l'évaluation des variables dans les guillemets)

// concaténation lors de l'affectation:
$prenom1 = 'bruno'; // déclaration de la variable
$prenom1 = 'claire'; //ici la valeur "claire écrase la valeyr bruno
echo $prenom1 . '<br>'; //affiche claire

$prenom2 = 'bruno';
$prenom2 .= 'claire'; //on affecte la valeur claire à la variable en l'ajoutant à la valeure précedente grace à l'opérateur .=
echo $prenom2 . '<br'; //affiche brunoclaire


// -------------------------------------
echo '<h2> guillemets et quotes </h2>';
// -------------------------------------
$message = "aujourd'hui"; //ou bien :
$message = 'aujourd\'hui'; // dans les quotes on échappe les apostrophes avec l'anti-slash

$txt = 'bonjour';
echo "$txt tout le monde <br>"; //les variables sont évaluées quand celles sont présentes dans des guillemets, c'est leur contenu qui est affiché 
echo '$txt tout le monde <br>'; // dans des quotes simples on affiche littéralement le nom des variables : elles ne sont pas évaluées

//-------------------------------------------------
echo '<h2> constantes </h2>';
//-------------------------------------------------
//une constante permet de conserver une valeur qui ne peut pas (ou ne doit pas) etre modifié durant la durée du script.tres utile pour garder de maniére certaine la connexion à une BDD ou le chemin du site par example.

define("CAPITALE", "PARIS"); // par convention on écrit toujours le nom des constantes en majuscules, define permet de déclarer une constante dont on indique d'abord le nom puis la valeur'
echo CAPITALE . '<br>'; //affiche paris

//constantes magiques : 
echo __FILE__ . '<br>'; //affiche le chemiun complet du fichier dans lequel on est..
echo __FILE__ . '<br>'; // affiche la ligne à laquelle on est 


// -------------------------------------------
echo '<h2> opérateurs arithmétiques </h2>';
// -------------------------------------------
$a = 10;
$b = 2;

echo $a + $b . '<br>'; // 12
echo $a - $b . '<br>'; //8
echo $a * $b . '<br>'; //20
echo $a / $b . '<br>'; //5
echo $a % $b . '<br>'; //0

// --------------
// opérations et affectation combinées:
$a += $b; // $a vaut 12 car équivaut à $a = $a + $b soit 10 + 2
$a -= $b; // $a vaut 10 car équivaut à $a = $a - $b soit 12 - 2
$a *= $b; // $a vaut 20 
$a /= $b; // $a vaut 10 
$a %= $b; // $a vaut 0

// ------------------
// incrémenter/décrémenter
$i = 0;
$i++; // incrémentation de $i de +1 (vaut1)
$i--; //décrémentation de $i de -1 (vaut 0)

$k = ++$i;  // la variable est incrémenté de 1 puis elle est affecté à $k
echo $i . '<br>';//1
echo $k . '<br>';//1


$k = $i++; // la variable $i est d'abord affectée à $k puis incrémentée de 1 
echo $i . '<br>';//2
echo $k . '<br>';//1

// -----------------------------------------------------------------------
echo '<h2> structures conditionnelles et opérateurs de comparaison </h2>';
// -----------------------------------------------------------------------

$a = 10; $b = 5; $c = 2;

if ($a > $b) { // si la condition renvoie true , on exécute les accolades qui suivent:
     echo '$a est bien supérieur à $a <br>';
}else {  //sinon (si la condition renvoie false) on exécute le else:
    echo 'non , cest $b qui est supérieur à $a <br>';
}

// ------
if ($a > $b && $b > $c) { // && signifie ET
    echo 'les 2 conditions sont vraies <br>';
}

// -----
if ($a == 9 || $b > $c)  { // l'opérateur de comparaison est == et l'opérateur OU s'ecrit: ||
     echo 'ok pour une des deux conditions <br>';
}else {
    echo 'les deux conditions sont fausses <br>';
}

// ------
if ($a == 8) {
    echo 'réponse 1 <br>';
}else if ($a != 10) { //sinon si $a différent de 10 , on exécute les accolades qui suivent:
    echo 'réponse 2 <br>';
}else{ // sinon, si les conditions précédents sont fausses , on exécute les accolades qui suivent:
    echo 'réponse 3 <br>'; // on entre ici dans le else
}

// -------------
if ($a == 10 XOR $b == 6) {
    echo 'ok pour la condition exclusive <br>'; // si les 2 conditions sont vraies ou les 2 conditions sont fausses en meme temps, nous n'entrons pas dans les accolades'
}

//  pour que la condition s'exécute il faut que l'une soit ou alors que l'autre soit vraie, mais pas les deux en meme temps.


// ---------------------------------------------------------
// conditions ternaires (forme contractée de la condition) :
echo ($a == 10) ? '$a est égal à 10 <br>' : '$a est différent de 10 <br>';
//  le ? remplace le if, et le : remplace le eslse. si a vaut 10 on fait un echo du premier string , sinon du second.


// ------------------
// différence entre == et === :
$vara = 1; //intger
$varb = '1'; // simplexml_load_string

if ($vara == $varb) {
    echo 'il ya égalité en valeur ET en entre les 2 variables <br>';
}

// avec la présence du triple = , la comparaison ne fonctionne pas car les variables ne sont pas du meme type : ici on compare un integer avec un string 
// avec le double égal , on ne compare que la valeur: ici la comparaison est donc juste.

/*
= signe d'affectation 
== comparaison en valeur
=== comparaison en valeur et en type
*/

// -------------------
// empty() et isset():
// empty() : teste si c'est vide (c'est à dire 0, '', NULL, false ou non défini)
// isset() : teste si c'est défini et a une valeur non null

$var1 = 0;
$var2 = ''; //chaine vide sans espace

if (empty($var1)) echo 'on a 0, vide ,ou non définie <br>';
if (isset($var2)) echo 'var2 existe bien <br>';

// diférence entre empty et isset : si on met les lignes 209 ,210 entre commentaire pour les neutraliser ,empty reste vrai car $var1 n'est pas définie , alors que isset est faux car $var2 n'est pas définie.$_COOKIE

// empty sera utilisé pour vérifier par example que les champs d'un formulaire sont remplis.isset permettra par example de vérifier l'existence d'un indice dans un array avant de l'utiliser.

// phpinfo();

// ----------------------------------
echo '<h2> condition switch </h2>';
// ----------------------------------
// dans le switch ci-dessous, les "case" représentent les cas différents dans lesquels on peut potentiellement  tomber.
$couleur = 'jaune';

switch($couleur) {
    case 'bleu' : echo 'vous aimez le bleu'; break;
    case 'rouge' : echo 'vous aimez le rouge'; break;
    case 'vert' : echo 'vous aimez le vert '; break;
    default : echo 'vous n\'aimez ni le bleu ni le rouge ni le vert <br>';
}
// le switch compare la valeur de la variable entre parenthése à chaque case ,lorsque une valeur correspond on exécute l'instruction en regard du case ,puis le break qui indique qu'il faut sortir de la condition .le default correspond à un else : on l'exécute par défaut quand aucun case ne correspond.

// exercice: écrivez la condition qwitch ci-dessus avec des if...
$couleur = 'jaune';

if($couleur == 'bleu'){
    echo 'vous aimez le bleu';
}else if($couleur == 'rouge'){
    echo 'vous aimez le rouge';
}else if($couleur == 'vert'){
    echo 'vous aimez le vert';
}else{
    echo 'vous n\'aimez ni le bleu ni le rouge ni le vert';
}


// ----------------------------------
echo '<h2> fonctions prédéfinies </h2>';
// ----------------------------------
// une fonction prédéfinie permet de réaliser un traitement spécifique qui est prévu dans le langage .$_COOKIE

// ----------------------------------
echo '<h2>traitement des chaines de caractéres (strlen, strpos, substr)</h2>';
// ----------------------------------
$emaill = 'prenom@site.fr';

echo strpos($emaill, '@') . '<br>'; //strpos() indique la position 6 du caractére "@" dans la chaine $emaill
echo strpos('bonjour', '@');
var_dump(strpos('bonjour', '@'));
// quand jutilise une fonctions prédéfini,il faut se demander quels sont les arguments à lui fournir pour quelle s'exécute correctement et ce qu'elle peut retourner comme résultat.
// dans l'example se strpos() : succés => integer, echec => booléan false.

// ------------
$phrase = 'metez une phrase à cet endroit';
echo '<br>'.strlen($phrase) . '<br>'; //affiche la longueur du string : succés ==> integer,echec ==>false

// -----------
$texte = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore cupiditate cum sint doloremque laborum. Odio esse impedit deserunt, ducimus animi earum incidunt in consequatur reprehenderit debitis maiores veritatis, sapiente nihil!';
echo substr($texte, 0, 20) . '...<a href="">lire la suite</a>';
// on découpe une partie du texte et on lui concaténe un lien.on cas de succés=>string, echec=>false.

// -------------
echo str_replace('site', 'gmail', $emaill); 
// remplace 'site' par 'gmail' dans le string contenu dans $emaill

// ----------------
$message = '             hello world                ';
echo strtolower($message) . '<br>';  // passe  le string en miniscules 
echo strtoupper($message) . '<br>';  //passe le string en majuscules


echo strlen($message) . '<br>';
echo strlen(trim($message)) . '<br>';  // trim() permet de supprimer les espaces au début et à la fin d'un string

// --------------------------------------
echo '<h2> le manuel php en ligne </h2>';
// --------------------------------------

// hhtp://php.net/manual/fr/

// --------------------------
echo '<h2> gestion des dates </h2>';
// --------------------------------
echo date('d/m/Y H:i:s') . '<br>'; //affiche la date et heure de l'instant selon le format indiqué et on peut choisir les séparateurs.'
echo time() . '<br>'; // retournne le timestamp actuel = nombre de secondes écoulées depuis le 01/01/1970 à 00:00:00 (création théorique de UNIX).

// la fonction prédéfinie strtotime():
$dateJour = strtotime('10-01-2016'); // retourne le timestamp de la date indiquée
echo $dateJour . '<br>';

// la fonction strftime() :
$dateFormat = strftime('%Y-%m-%d', $dateJour); //transforme le timestamp donnée en date selon le format indiqué, ici YYYY-MM-DD
echo $dateFormat . '<br>'; //affiche 2016-01-10

// example de conversion de format de date:
// transformer 23-05-2015 en 2015-05-23:

echo strftime('%Y-%m-%d', strtotime('23-05-2015'));
echo '<br>';
// transformer 2015-05-23 en 23-05-2015 :
echo strftime('%d-%m-%Y', strtotime('2015-05-23'));
// cette méthode de transformation est limitée dans le temps(2038)..donc utiliser une autre méthode avec la classe DateTime :
$date = new DateTime('11-04-2017');
echo $date->format('Y-m-d');
// DateTime est une classe que l'on peut comparer à un plan ou un modele qui  sert à construire des objets "date".
// on construit un objet "date avec le mot new , en indiquant la date qui nous interesse entre parenthéses. $date est donc un objet "date".
// cet objet bénéficie de méthodes (=fonctions) offertes par la classe : il y a entre autres, la méthode format() qui permet de modifier le format d'une date.pour appeler cette méthode sur l'objet $date, on utilise la fléche ->.

