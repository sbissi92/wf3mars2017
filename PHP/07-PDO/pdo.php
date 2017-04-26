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


        // *******************************
        // 04-while et fetch_assoc
        // *******************************

        echo '<h1>04. while et fetch_assoc<h1>';

        $resultat = $pdo->query("SELECT * FROM employes");
        echo 'Nombre d\'employés : ' . $resultat->rowCount() . '<br>';  //permet de compter le nombre de ligne retournées par la requête

        while ($contenu = $resultat->fetch(PDO::FETCH_ASSOC)) {  // fetch retourne la ligne suivante du jeu de résultat en array associatif . laboucle while permet de faire avancer le curseur dans le jeu de résultats, et s'arrete quand il est à la fin des résultats. 


             echo '<pre>'; print_r($contenu); echo '</pre>';  //on voit que $contenu est un array associatif qui contient les données de chaque ligne du jeu de résultats . le nom des indices correspondent aux noms des champs. 

             echo $contenu['id_employes'] . '<br>';
             echo $contenu['prenom'] . '<br>';
             echo $contenu['nom'] . '<br>';
             echo $contenu['sexe'] . '<br>';
             echo $contenu['service'] . '<br>';
             echo $contenu['date_embauche'] . '<br>';
             echo $contenu['salaire'] . '<br>';
        }
        //      echo '----------------------<br>';quand vous faites une requete qui ne sort qu'un seul résultat: pas de boucle  while, mais un fetch seul.
        // quand vous avez plusieurs résultats dans la requete : on fait une boucle whiile pour parcourir tous les résultats. 

        // *******************************
        // 05-fetchAll
        // *******************************

        echo '<h1>05- fetchAll</h1>';
        $resultat = $pdo->query("SELECT * FROM employes");
        $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);  //retourne toutes les lignes de résultats dans un tableau multidimentionnel sans faire de boucle : vous avez un array associatif à chaque indice numérique.marche aussi avec FETCH_NUM. 

        // echo '<pre>'; print_r($donnees); echo '<br>';
        // pour lire le contenu d'un array multidimentionnel, nous faisons des boucles foreach imbriquées: 
        echo '<strong>Double boucle foreach</strong><br>';

        foreach ($donnees as $contenu) { // $contenu est un sous array associatif
            foreach ($contenu as $indice =>  $valeur ){ //on parcourt donc chaque  sous array 
                echo $indice . 'correspond à ' . $valeur . '<br>';
            }
            echo '---------------<br>';
        }

        // *********
        // exercice
        // *********

        // afficher la liste des bases de données présentent sur votre SGBD dans une liste <ul><li>. 
        // pour mémoire, la requete SQL est SHOW DATABASES. 
         
         $resultat = $pdo->query("SHOW DATABASES");
         while ($databases = $resultat->fetch(PDO::FETCH_NUM)){

                echo "<li>$databases[0]</li>";
         }
         









         //***************************
         //07- table html
        //  **************************

        echo'<h1>07. Table HTML</h1>';
        $resultat = $pdo->query("SELECT * FROM employes");

        echo '<table border = "1">';
            // affichage de la ligne d'entêtes :
            echo '<tr>';
                for($i = 0; $i < $resultat->columnCount(); $i++) {
                        echo '<pre>'; print_r($resultat->getColumnMeta($i)); echo '</pre>';    // pour voir ce que retourne la méthode getColumnMeta() : un array avec notamment l'indice name qui contient le nom du champ

                        $colonne = $resultat->getColumnMeta ($i); // $colonne est un array qui contient l'indice name

                        echo '<th>' . $colonne['name'] . '</th>'; // l'indice name contient le nom du champ 
                      
                }

                echo '</tr>';
            

            // affichage des autres lignes :
            while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>';
                 foreach($ligne as $information){
                    //  echo '<pre>'; print_r($information); echo '</pre>';
                     echo '<td>' . $information . '</td>';
                 }
                echo '</tr>';
            }

            echo '</table>';

            // **********************
            // 08-requetes préparées
            // **********************

            echo '<h1>08.requete préparée : prepare() + bindParam() + execute ()';

            $nom = 'sennard';

            // préparation de la requête : 
            $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom "); //on prépare la requête sans l'exécuter, avec un marqueur nominatif écrit :nom

            // on donne une valeur au marqueur :nom 
            $resultat->bindParam(':nom', $nom, pdo::PARAM_STR); // je lie le marqueur :nom à la variable $nom. si on change le contenu de la variable, la valeur du marqueur changera automatiquement si on fait plusieurs execute. 

            //  on exécute la requete : 

        $resultat->execute();
        $donnees =$resultat->fetch(PDO::FETCH_ASSOC); // $donnees est un array associatif 
        echo implode($donnees, '-'); //implode transforme l'array en string

        /*
        prepare() renvoie toujours un objet PDOStatment
        execute() renvoie : 
                            succés : un objet PDOStatment
                            Echec  : false
    
         les requêtes préparées sont à préconiser si vous exécutez plusieurs fois la meme requete (par ex dans une boucle), et ainsi éviter le cycle complet analyse / interpretation /exécution de la requete. 

         par ailleurs ,les requetes préparées sont souvent utilisées pour assainir les données en forçant le type des valeurs communiquées aux marqueurs. 
        */

         
        //  **********************************
        //  09- requete préparée : prepare() + bindValue() + execute()


        echo '<h1>09. requête préparée : prepare() + bindValue() + execute()</h1>';

        $nom = 'Thoyer';

        // on prépare la requête :
        $resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom ");

        // on lie le marqueur à une valeur : 
        $resultat->bindValue(':nom', $nom, PDO::PARAM_STR); // bindvallue reçoit une variable ou un string. le marqueur pointe uniquement vers la valeur : si celle_ci change,il faudra refaire un bindvalue pour prendre en compte cette nouvelle valeur lors d'un prochain execute(). 

        // onexécute la requete:
        $resultat->execute();

        $donnees = $resultat->fetch(PDO::FETCH_ASSOC); // $donnees est un array associatif 
        echo implode($donnees, '-');

        // ...
        $nom = 'Durand';
        $resultat->execute();
        $donnees = $resultat->fetch(PDO::FETCH_ASSOC);
        echo implode($donnees, '-'); // en effet on obtient encore les informations de THOYER et non pas de echo Durand. 

