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


// -----------------------------------------------------------------
// entrer une valeur dans une variable sous condition (php7):
$var1 = isset($maVar) ? $maVar : 'valeur par défaut'; //dans cette ternaire on affecte la valeur de $maVar à $var1 si elle existe.si  celle ci n'existe pas on lui affecte valeur par défaut.
echo $var1 . '<br>';  //affiche valeur par défaut

// EN VERSION PHP7:
$var2 = $maVar ?? 'valeur par défaut'; //on fait exactement la meme chose mais en plus court : le "??" signifie "soit l'un soit l'autre", "prend la premiére valeur qui existe"
echo $var2 . '<br>';

$var3 = $_GET['pays'] ?? $GET_['ville'] ?? 'pas d\'info'; //soit on prend le pays s'il existe ,sinon on prend la ville si elle existe si non la ville soit pas d'info.
echo $var3 . '<br>';

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



// -----------------------------------------------------------------
// entrer une valeur dans une variable sous condition (php7):
$var1 = isset($maVar) ? $maVar : 'valeur par défaut';









//-------------------------------------------
echo '<h2> Les fonctions utilisateurs </h2>';
//-------------------------------------------
// Les fonctions qui ne sont pas prédéfinies dans le langage sont déclarées puis exécutées par l'utilisateur.
// Déclaration d'une fonction :
function separation() {
    echo '<hr>';    // simple fonction permettant de tirer un trait dans la page web
}
// Appel de la fonction par son nom :
separation();   // ici on exécute la fonction
// ----------
// Fonction avec arguments : les arguments sont des paramètres fournis à la fonction qui lui permettent de compléter ou modifier le comportement initialement prévu.
function bonjour($qui) {    // $qui apparaît ici pour la première fois. Il s'agit d'une variable de réception qui reçoit la valeur d'un argument
    return 'Bonjour ' . $qui . '<br>'; // return permet de renvoyer ce qui suit à l'endroit où la fonction est appelée
    echo 'cette ligne ne sera pas exécutée'; // après un return on quitte la fonction donc on n'exécute pas le code qui suit
}
// Appel de la fonction :
echo bonjour('Pierre'); // on appelle la fonction en lui donnant le string 'Pierre' en argument -> affiche 'Bonjour Pierre'
$prenom = 'Etienne';
echo bonjour($prenom); // l'argument peut être une variable : affiche 'Bonjour Etienne'
// --------------
// Exercice
function appliqueTva($nombre) {
    return $nombre * 1.2;
}
// Ecrivez une fonction appliqueTva2 sur la base de la précédente mais en donnant la possibilité de calculer un nombre avec le taux de notre choix.
function appliqueTva2($nombre, $taux){ // on ne peut pas redéclarer une fonction avec le même nom
    echo 'Ma TVA est de ';
    return $nombre * $taux;
}
echo appliqueTva2(5 , 1.6) . '<br>'; // lorsqu'une fonction attend des arguments, il faut obligatoirement les lui donner
// --------------
// Exercice
function meteo($saison, $temperature){
    echo "Nous sommes en $saison et il fait $temperature degré(s) <br>";
}
meteo('hiver', 2);
meteo('printemps', 7);
// Créer une fonction meteo2 qui permet d'afficher "au printemps" quand il s'agit du printemps
// function meteo2($saison, $temperature){
//     if($saison == 'printemps'){
//     echo "Nous sommes au $saison et il fait $temperature degré(s) <br>";
    
//     }else{
//     echo "Nous sommes en $saison et il fait $temperature degré(s) <br>";
    
//     }
// }
function meteo2($saison, $temperature){
    if($saison == 'printemps'){
        $article = 'au';
    
    }else{
        $article ='en';
        
    }
    echo "Nous sommes $article $saison et il fait $temperature degré(s) <br>";
   
}
meteo2('hiver', 2);
meteo2('printemps', 7);
// $saison = 'printemps';
// $temperature =5;
// echo (($saison == 'printemps') ? "Nous sommes au $saison " : "Nous sommes en $saison ") . ("et il fait $temperature degré(s) <br>");
function meteo3($saison, $temperature){
    $article = ($saison == 'printemps') ? 'au' : 'en';
     echo "Nous sommes $article $saison et il fait $temperature degré(s) <br>";
}
meteo3('hiver', 0);
meteo3('printemps', 10);
// Exercice : 
function prixLitre(){
    return rand(1000, 2000)/1000;   // détermine un prix aléatoire entre 1 et 2€
    }  
// Ecrivez la fonction factureEssence() qui calcule le prix total de votre facture d'essence en fonction du nombre de litres que vous lui donnez. Cette fonction retourne la phrase "Votre facture est de X euros pour Y litres d'essence" (X et y sont variables).
// Dans cette fonction , utilisez la fonction prixLitre() qui vous retourne le prix du litre d'essence.
function factureEssence($litre){
    $prixTotal = prixLitre() * $litre;
    echo "Votre facture est de $prixTotal € pour $litre  litres d'essence";
}
factureEssence(30);
//-------------------------------------------
echo '<h2> Les variables locales et globales </h2>';
//-------------------------------------------
function jourSemaine() {
    $jour = 'vendredi';    // ici dans la fonction nous sommes dans un espace LOCAL. La variable $jour est donc LOCALE.
    return $jour;
}
//  A l'extérieur de la fonction je suis dans l'espace GLOBAL.
// echo $jour;    // je ne peux pas utiliser une variable locale dans l'espace global
echo jourSemaine() . '<br>';    // on peut cependant récupérer la valeur de $jour grâce au return qui est au sein de la fonction et à l'appel de cette fonction
// -------
$pays = 'France';   // variable globale
function affichagePays(){
    global $pays;   // le mot clé global permet de récupérer une variable provenant de l'espace global au sein de l'espace local de la fonction
    echo $pays; // on peut donc utiliser cette variable $pays
}
affichagePays();
//-------------------------------------------
echo '<h2> Les structures itératives : boucles </h2>';
//-------------------------------------------
// boucle while
$i = 0;     // valeur de départ de la boucle
while ($i < 3) {    // tant que $i est inférieur à 3 , j'exécute les accolades qui suivent'
    echo "$i---";
    $i++;         // on n'oublie pas d'incrémenter i pour que la boucle ne soit pas infinie (il faut que la condition puisse devenir false à un moment donné) 
}
echo'<br>';
$t = 0;
while ($t < 3){
    if($t < 2){
        echo "$t---";    
    }else{
        echo "$t";
    }
    $t++;
}
echo'<br>';
// --------
// Exercice : à l'aide d'une boucle while afficher dans un sélecteur les années depuis l'année en cours moins 100 ans et jusqu'à l'année en cours : 1917 => 2017
$year = 2017;
echo '<select>';
while($year > 1916){
    echo "<option>$year</option>";
    $year--;
}
echo '</select>';
echo '<br>';
// ------- 
$year = date('Y') - 100;
$year = 2017;
echo '<select>';
while($year >= date ('Y')) {
    echo "<option>$year</option>";
    $year--;
}
echo '</select>';
// ----------
//  Boucle do while
//  La boucle do while a la particularité de s'exécuter au moins une fois, puis tant que la condition de fin est vraie.
echo '<br> Boucle do while<br>';
do {
    echo 'un tour de boucle';
} while (false);    // on met la condition pour exécuter les tours ici à la place de false. Dans ce cas précis, on voit que l'on effectue un tour de boucle bien que la condition soit fausse.
// Notez la présence du ";" à la fin de la boucle do while (contrairement aux autres boucles itératives).
// ----------
//  Boucle for :
echo '<br>';
for ($j = 0; $j < 16; $j++) { // initialisation de la valeur de départ; condition d'entrée dans la boucle; incrémentation ou (décrémentation)
    print $j .'<br>';
}
// ----------
// Exercies :
// 1- Faire une boucle qui affiche 0 à 9 sur la même ligne
echo '<br>';
for ($h = 0; $h < 10; $h++){
    print $h;
}
// 2- Faites la même chose mais dans un tableau html
echo '<br>';
    echo '<table border ="1">';
        echo '<tr>';
            for ($h = 0; $h < 10;$h++){
                print "<td>$h</td>";
            }              
        echo '</tr>';
    echo '</table>';
// ------------------- Faire un tableau HTML de 10 lignes sur 10 à partir du tableau précédent
echo '<br>';
    echo '<br>';
    echo '<table border ="1">';
        for($k = 1; $k <=10; $k++){
            echo "<tr>";
            for ($h = 0; $h < 10; $h++){
                print "<td>$h</td>";
            } 
            echo '</tr>';
        }
                    
    echo '</table>';
// ------------------- Faire un tableau HTML de 10 lignes sur 10 à partir du tableau précédent
echo '<br>';
    echo '<br>';
    echo '<table border ="1">';
        // on fait une boucle pour les lignes :
        $k = 1; 
        while ($k <=10) {
            echo "<tr>";
            // on fait une boucle pour les colonnes :
            for ($h = 0; $h < 10; $h++){
                print "<td>$h</td>";
            } 
            $k++;
            echo '</tr>';
        }
                    
    echo '</table>';
    // -------------------Compter les cases jusqu'à 90
echo '<br>';
$contenu = 0;
    echo '<br>';
    echo '<table border ="1">';
        for($k = 1; $k <=10; $k++){
            echo "<tr>";
            
            for ($h = 0; $h < 10; $h++){
                print "<td>$contenu</td>";
                $contenu++;
            } 
            echo '</tr>';
        }
                    
    echo '</table>';
//-------------------------------------------
echo '<h2> Les arrays ou tableaux </h2>';
//-------------------------------------------
// On peut stocker dans un array une multitide de valeurs quelque soit leur type.
$liste = array('Grégoire', 'Nathalie', 'Emilie', 'François', 'Georges');    // déclaration d'un array appelé $liste contenant des prenoms
// echo $liste;    // ereur car on ne peut pas afficher directement le contenu d'un array
echo '<pre>'; var_dump($liste); echo '</pre>';
echo '<pre>'; print_r($liste); echo '</pre>';
// ces deux instructions d'affichage permettent d'indiquer le type de l'élément mis en argument, ainsi que son contenu. Les balises créées servent à faire une mise en forme. Notez que ces deux instructions ne sont utilisées qu'en phase de développement.
// Autre moyen d'affecter des erreurs dans un tableau :
$tab[] = 'France';    // permet d'ajouter la valeur 'France' dans le tableau $tab
$tab[] = 'Italie';
$tab[] = 'Espagne';
$tab[] = 'Portugal';
print_r($tab);    // pour voir le contenu du tableau
// Pour afficher la valeur 'Italie' qui se situe à l'indice 1 :
echo $tab[1] . '<br>';  // affiche Italie
// Tableau associatif : tableau dont les indices sont littéraux
$couleur = array("j" => "jaune", "b" =>"bleu", "v" =>"vert");   // on peut choisir le nom des indices
// Pour accéder à un élément du tableau associatif :
echo 'La seconde couleur de notre tableau est le  ' . $couleur['b'] . '<br>';   // affiche bleu
echo "La seconde couleur de notre tableau est le $couleur[b] <br>" ;    // affiche bleu. Un array écrit dans des guillements perd ses quotes autour de son indice
// ----------------
// Mesurer la taille d'un array :
echo 'Taille du tableau : ' . count($couleur) . '<br>'; // compte le nombre d'élément dans l'array $couleur, ici 3
echo 'Taille du tableau : ' . sizeof($couleur) . '<br>'; // compte le nombre d'élément dans l'array $couleur, ici 3
// ----------------
// Transformer un array en string :
$chaine = implode('-', $couleur);   // implode() rassemble les éléments d'un array en une chaîne séparés par le séparateur '-' ici
echo $chaine. '<br>';
$couleur2 = explode('-', $chaine);  // transforme une chaîne en array en séparant les éléments grâce au séparateur indiqué (ici un "-"). $couleur2 est un array. $couleur2 est un array aux indices numériques.
print_r($couleur2);
// ----------------
echo '<h2>La boucle foreach pour parcourir les arrays</h2>';
// La boucle foreach est un moyen simple de passer en revue un tableau. Elle fonctionne uniquement sur les arrays et les objets. Et elle a l'avantage d'être "automatique" , s'arrêtant quand il n'y a plus d'éléments.
foreach($tab as $valeur) {  // la variable $valeur (que l'on appelle comme on veut) récupère à chaque tour de boucle les valeurs qui sont parcourues dans l'array $tab. ["parcourt l'array $tab par ses valeurs"]
    echo $valeur .'<br>';
}
foreach($tab as $indice => $valeur) {   // on parcourt l'array $tab par ses indices auxquelles on associe les valeurs
// quand il ya 2 variables la 1 ere parcourt les colonne des indices et la seconde la colonne des valeurs .ces variables peuvent avoir n'importe quel nom.
    echo $indice . ' correspond à ' .$valeur . '<br>';
}

//-------------------------------------------
echo '<h2>les arrays multidimensionnels</h2>';
//-------------------------------------------
// nous parlons dun tableu multidimentionnel losque un tab est contenu dans un autre tab.CHAQUE TABLE représente une dimension.

// création d'un tab multi:
$tab_multi = array(
        0 => array('prenom' => 'julien', 'nom' => 'dupon', 'telephone' => '06 00 00 00'),
        1 => array('prenom' => 'nicolas', 'nom' => 'dupon', 'telephone' => '06 00 00 00'),
        2 => array('prenom' => 'pierre', 'nom' => 'dupon')

        );

        echo'<pre>'; print_r($tab_multi); echo '</pre>';

        // accéder à la valeur julien:
        echo $tab_multi[0]['prenom'] . '<br'; 
        // affiche julien :nous entrons d'abord à l'indice 0 pour aller ensuite dans l'autre tableau à l'indice 'prenom'.NOTEZ QUE 4PRENOM EST UN STRING. 

        // PARCOURIR LE TABLEAU MULTIDIMENTIONNEL AVEC UNE BOUCLE FOR:
        for ($i = 0; $i < count($tab_multi); $i++) {
            echo $tab_multi[$i]['prenom'] . '<br>';
        }
 
//  exercice : afficher les prénoms avec une boucle foreach :

foreach($tab_multi as $valeur){
    echo $valeur['prenom']. '<br>';
}

// correction:
foreach($tab_multi as $indice => $valeur){
    // premiére version en passant par l'indice:
    echo $tab_multi[$indice]['prenom'] .'<br>';

    // seconde en passant par la valeur:
    echo $valeur['prenom'].'<br>';
}

//-------------------------------------------
echo '<h2>les inclusions de fichiers</h2>';
//-------------------------------------------
echo 'premiére inclusion';
include('exemple.inc.php'); //on inclut le fichier dont le chemin est spécifié ici 

echo '<br>deuxiéme inclusion';
include_once('exemple.inc.php');  //avec le once, on vérifie d'abord si le fichier n'est pas déja inclus 2 fois le meme fichier)

echo'<br>troisiéme incllusion';
require('exemple.inc.php');  //require fait la meme chose que include mais génére une erreur de type fatale s'il ne parvient pas à inclure le fichier ,qui interrompt l'exécution du script. en revanche ,include génére une erreur de type warning dans ce cas,ce qui n'interrompt pas la suite de l'exécution du script

echo'<br>quatriéme  incllusion';
require_once ('exemple.inc.php'); //avec le once on vérifie d'abord si le fichier n'est pas déja inclus avant de faire l'inclusion'

//le ".inc" du nom du fichier inclus est là à titre indicatif pour préciser qu'il s'agit d'un fichier inclus et non pas d'un fichier directement utilisé.


// ***************************************
echo '<h2> introduction aux objets </h2>';
// ***************************************
// un objet est un autre type de données. un objet est issu d'une classe qui posséde des attributs (encore appelées propriétés) et des méthodes (équivalent de fonctions).
// l'objet crée à partir d'une classe, peut accéder à ces attributs et ces méthodes .

// example avec un personnage de type 'etudiant': 
class Etudiant {
    public $prenom = 'julien'; // public pour  préciser que l'élément est accessible partout et donc en dehors de la classe.$_COOKIE
    public $age = 25;    // $age est un attribut ou propriété
    public function pays () {  // méthode appelée pays
        return 'France';
    }
}

$objet = new Etudiant ();  // new permet de créer un nouvel objet : on instancie la classe etudiant en un objet appelé $objet. $objet est une instance de la classe etudiant. 

echo '<pre>'; print_r($objet); echo '</pre>'; //on regarde le contenu de $objet :on voit son type ,et la classe dont il est issu 

// afficher le prénom de l'étudiant $objet :
echo $objet->prenom . '<br>';  //nous pouvons accéder à une propriété d'un objet en mettant une fléche "->". affiche "julien"

// afficher le pays via la méthode pays() :
echo $objet->pays() . '<br>'; // on appelle la méthode pays () avec ses parenthéses : elle nous retourne 'France'

// contexte : sur un site, une classe panier contiendra les propriétés et les méthodes nécessaires au fonctionnement du panier d'achat :
class Panier {
    public function ajout_article($article) {
        // instructions qui ajoute le produit au panier 
        return "l'article $article a bien été ajouté au panier <br>";
    }
}

// lorsqu'on clique sur le bouton "ajout au panier" :
$panier = new Panier (); // on créer un panier vide dans un premier temps 
echo $panier->ajout_article('pull'); // puis on ajoute un Pull au panier en appellant la méthode ajout_article()

// ******************************************************************************************************************************************
