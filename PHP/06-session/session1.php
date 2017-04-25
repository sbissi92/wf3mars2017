<?php
// ************
// les  session
// ************

// le terme de session désigne la période de temps correspondant à la navigation continue de l'internaute sur un site : continue ,car si l'internaute ferme le navigateur ,la session s'interrompt.
// principe: un fichier temporaire appelé session est crée sur le serveur ,avec un identifiant unique .cette session est liée à un internaute car ,dans le même temps un cookie est déposé sur le poste de l'internaute avec l'identifiant . ce cookie se détruit lorsqu'on quitte le navigateur .
// on stocke entre autre dans une session les paniers d'achats ou les informations de connexion.ces infos sont accessibles dans tous les scripts du site grace à la session. 

// création ou ouverture d'une session: 
session_start(); //permet de creer un fichier de session sur le serveur ou de l'ouvrir sil existe deja.

// remplissage de la session: 
$_SESSION['pseudo'] = 'john';
$_SESSION['mdp'] = '1234';    //$_session est une superglobale donc un array 

echo '1- la session aprés remplissage : ';
echo '<pre>'; print_r($_SESSION); echo '</pre>';


// vider une partie de la sesion en cours:
unset($_SESSION['mdp']); // nous ouvons supprimer une partie de la session avec unset()

echo '<br> 2-la session aprés suppression du mdp: ';
echo '<pre>'; print_r($_SESSION); echo '</pre>';


// supprimer entiérement la session:
// session_destroy();  //suppression de la session mais il faut savoir que la session_destroy est d'abord vu par l'interpréteur qui ne l'exécute qu'à la fin su script .pour s'en covaincre ,vérifier que le fichier est supprimé dans le dossier xampp/tmp. 

echo '<br> 3- la session aprés suppression totale : ';
echo '<pre>'; print_r($_SESSION); echo '<pre>';