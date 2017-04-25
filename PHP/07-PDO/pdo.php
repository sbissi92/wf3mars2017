<?php
// ***************
// PDO 
// ***************
// l'extension PHP DATA Objects (PDO) définit une interfaces pour accéder à une base de données depuis php. 

// 01.connexion 
echo '<h1>01.connexion</h1>';
$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// $pdo est un objet issu de la classe prédéfinie PDO : il représente la connexion à la BDD.

// les arguments passés à PDO : 
        // -driver + serveur + nom de la base de données
        // -pseudo du SGBD
        // -mdp du SGBD
        // -options : option 1 pour générer l'affichage des erreurs, option 2 = commande à exécuter lors de la connexion au serveur qui définit le jeu de caractéres des échanges avec laBDD. 


        print_r($pdo);
        echo '<pre>'; print_r(get_class_methods($pdo)); echo '</pre>'; //permer d'afficher les méthodes disponibles dans l'objet $pdo

        //*****************************************
        // 02.exec() avec INSERT, UPDATE et DELETE
        // ****************************************
        echo '<h1>02. exec() avec INSERT, UPDATE et DELETE <h1>';

        $resultat = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire)
        VALUES('Jean', 'Tartempion', 'm', 'informatique', '2017-04-25', 300)");

        echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";

        // exec() est utilisé pour formuler des requetes ne retournant pas de jeu de résultats : INSERT, UPDATE et DELETE

        // valeur de retour : 
        // succés :un integer correspondant au nombre de lignes affectées
        // Echec : false

        echo "nombre d'enregistrement affectés par l'insert : $resultat <br>";
        echo 'dernier id généré : ' . $pdo->lastInsertID();

        // --------------------
        $resultat = $pdo->exec("UPDATE employes SET salaire =6000 WHERE id_employes = 350");
        echo"Nombre d'enregistrements affectés par l'UPDATE : $resultat <br>";

        // *******************************
        // 03- query() avec SELECT + fetch
        // *******************************
        echo '<h1>03. query() avec SELECT + fetch</h1>';
        $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
        // avec query : $result est un objet issu de la classe prédéfinie PDOStatement
        /* 
        au contraire d'exec(), query() est utilisé pour la formulation de requetes retournant un ou plusieurs résultats : SELECT.
        Valeur de retour : 
        succés : objet PDOStatement 
        Echec : false
        notez qu'avec query, on peut aussi utiliser INSERT, DELETE, et UPDATE.
        */
        echo '<pre>'; print_r($result); echo '</pre>';
        echo '<pre>'; print_r(get_class_methods($result)); echo '</pre>'; // on voit les nouvelles méthodes de la classe PDOStatement 

        // $result constitue le résultat de la requete sous forme inexploitable directement : il faurt donc le transformer par la méthode fetch() : 

        $employe = $result->fetch(PDO::FETCH_ASSOC); // la méthode fetch() avec le paramétre PDO::FETCH_ASSOC permet de transformer l'objet $result en un ARRAY associatif exploitable indexé avec le nom des champs de la requete. 


        echo '<pre>'; print_r($employe); echo '</pre>';
        echo "bonjour je suis $employe[prenom] $employe[nom] du service $employe[service] <br>";

        // ou encore faire un fetch selon l'une des méthodes suivantes :
        $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
        $employe = $result->fetch(PDO::FETCH_NUM);
        echo '<pre>'; print_r($employe); echo '</pre>';
        echo $employe[1]; //on accéde au prénom par l'indice 1 de l'array $employe

        $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
        $employe = $result->fetch(); // pour un mélange de fetch_assoc et fetch_num
        echo '<pre>'; print_r($employe); echo '</pre>';

        // ------------
        $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
        $employe = $result->fetch(PDO::FETCH_OBJ);  //retourne un nouvel objet avec les noms de champs comme propriété (=attribut) public.
        echo '<pre>'; print_r($employe); echo '</pre>';
        echo $employe->prenom;  // affiche la valeur de la propriété prenom de l'objet $employe'

        // attention :il faut choisir l'un des fetch que vous voulez exécuter sur un jeu de résultats , vous ne pouvez pas faire plusieurs fetch sur le meme résultat contenant qu'une seule.en effet ,cette méthode déplace un curseur de lecture sur le résultat suivant contenu dans le jeu de résultats: ainsi quand il n'y en a qu'un seul, on sort du jeu.

        // exercice: afficher le service de l'employé laura selon 2 méthodes différentes de votre choix.
          $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'laura'");
          $employe = $result->fetch(PDO::FETCH_ASSOC);
          echo '<pre>'; print_r($employe); echo '</pre>';
          echo $employe['service'];

        //   ou: 

         $result = $pdo->query("SELECT * FROM employes WHERE prenom = 'laura'");
          $employe = $result->fetch(PDO::FETCH_NUM);
          echo '<pre>'; print_r($employe); echo '</pre>';
          echo $employe[0];