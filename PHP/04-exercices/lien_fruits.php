<?php
// exercice
// faire 4  liens html avec le nom des fruits.
// QUAND ON CLIQUE SUR UN LIEN ON AFFICHE LE PRIX POUR 1000 grammes de ce fruit ,dans cette page lien_fruits.php.

include('fonction.inc.php');

if (isset($_GET['fruit'])){

    echo calcul($_GET['fruit'],1000);

}
?>
<br>
<a href="?fruit=cerises">cerise</a><br>
<a href="?fruit=bananes">banane</a><br>
<a href="?fruit=pommes">pomme</a><br>
<a href="?fruit=peches">peche</a><br>
