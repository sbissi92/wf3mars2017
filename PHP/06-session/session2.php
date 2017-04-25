<?php
// création ou ouverture de la session : 
session_start(); // LORSQUE j'esffectue un sessionstart la session n'est pas recréée car elle existe déja grace au session_start lancé dans le fichier session1.php. 

echo 'la session est accessible dans tous les scripts du site : ';
echo '<pre>'; print_r($_SESSION); echo '</pre>'; // affiche le contenu de la session 

// ce fichier session2.php n'a rien à voir avec l'autre , il n'ya pas d'inclusion . et pourtant il accéde à la session  en cours créée dans session1.php. notez que c'est l'identifiant de la session envoyé dans un cookie dans le poste de l'internaute par session1.php qui indique quelle session ouvrir dans session2.php.

