<?php
// exercice
// réalisez un formulaire permettant de sélectionner un fruit dans un sélecteur et de saisir un poids quelquonque exprimé en grammes.$_COOKIE
// faire traitement du formulaire pour afficher le prix du fruit choisi selon le poids indiqué en passant par la fonction calcul.
// faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire aprés que celui ci soit validé.

include('fonction.inc.php');

if (!empty($_POST)) {

    echo calcul($_POST['fruit'], $_POST['poids']) . '';

}

?>





<form method="post" action="">
<select name="fruit" id="fruit">
    <option value="cerises" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'cerises') echo 'selected'; ?>>cerises</option>
    <option value="bananes" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'bananes') echo 'selected'; ?>>bananes</option>
    <option value="pommes" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'pommes') echo 'selected'; ?>>pommes</option>
    <option value="peches" <?php if(isset($_POST['fruit']) && $_POST['fruit'] == 'peches') echo 'selected'; ?>>peches</option>
</select>
<br>
<input type="number" id="poids" name="poids" value=" <?php echo $_POST['poids'] ?? ''; ?>"><br>
<input type="submit" value="valider">
</form>