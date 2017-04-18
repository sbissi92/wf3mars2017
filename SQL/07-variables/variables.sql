-- les variables:
-- une variable est un espace mémoire nommé qui permet de conserver une valeur.
-- permet d'observer les variables systémes:
SHOW VARIABLES;
 SELECT @@version; --on met deux @ pour accéder à une variables systéme 

--  déterminer nos propres variables :
SET @ecole = 'WF3';  --déclare une variable ecole et lui affecte la valeur 'wf3'
SELECT @ecole; --on peut accéder au contenu de cette variable par son nom
