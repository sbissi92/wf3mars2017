-- *******************************
-- requetes préparées
-- *******************************

-- les requêtes préparées sont des req qui dissocient les phases analyse/intérpretation/exécution.
-- la préparation de la requete consiste à realiser les étapes d'analyse et d'interpretation.ensuite on efectue l'exécution à part.
-- la séparation des phases permet de faire des gains de performance quand une requete doit etre exécutée une multitude de fois. en effet,on n'exécute qune seule fois les 2 premiéres phases et X fois la derniére.

-- 1: requétes préparée sans marqueur:

-- 1° préparation:
PREPARE req FROM "SELECT * FROM employes WHERE service = 'commercial'"; --déclarer une requete préparée.

-- 2°:exécution de la requete: 
EXECUTE req;
-- on peut exécuter la requete plusieurs fois sans refaire le cycle analyse/interpretation ==>gain de performance.

-- 2: requete preparée avec marqueur "?":

-- 1° préparation:
PREPARE req2 FROM "SELECT * FROM employes WHERE prenom = ?"; --le "?" est un marqueur qui attend une valeur 

-- 2°:exécution de la requete: 
SET @prenom = 'Emilie';    --déclare et affecte la variable prenom.
EXECUTE req2 USING @prenom; --on exécute la requete en utilisant la variable prenom.



-- supprimer une requete préparée:
DROP PREPARE req2;

-- les requetes préparées ont une durée de vie courte : elles sont supprimés dés qu'on quitte la session.

