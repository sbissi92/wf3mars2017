<?php
// exercice
// réalisez un formulaire permettant de sélectionner un fruit dans un sélecteur et de saisir un poids quelquonque exprimé en grammes.$_COOKIE
// faire traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué en passant par la fonction calcul.
// faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire aprés que celui ci soit validé.


include('fonction.inc.php');

if (isset($_POST['fruit'])){

    echo calcul($_POST['fruit'],1000);








?>
<form action=""></form>
<label for="fruit">fruits</label>
<select name="fruit" id="fruit">
    <option value="cerises">cerises</option>
    <option value="bananes">bananes</option>
    <option value="pommes">pommes</option>
    <option value="peches">peches</option>
</select>
<br>

<label for="poids">poids</label>
<input type="number" id="poids" name"poids"><br>
<input type="submit" value="valider">
</form>