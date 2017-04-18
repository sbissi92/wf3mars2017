-- **************************
-- TRANSACTIONS
-- **************************

-- une transactions permet de lancer des requetes telles que des modifications et de les annuler si besoin,comme si vous pouviez faire un "ctrl+Z"dans votre base de donnée

-- transaction simple
START TRANSACTION; --démarre la transaction
    SELECT*FROM employes; --pour voir la table avant la modifications
    UPDATE employes SET prenom='ALLO' WHERE id_employes =739;

ROLLBACK; --donne l'ordre à MYsql d'annuler la transaction, l'employe reprennet son prenom
-- ou bien 
COMMIT --valide l'ensemble de la transaction

-- si on ne fait ni ROLLBACK ni COMMIT avant la déconnexion au SGBD, c'est un ROLLBACK qui s'effectue par défaut'


-- Transaction avancée:
START TRANSACTION;
  SAVEPOINT point1; --point de sauvegarde appelé point 1
  UPDATE employes SET prenom = "julien A" WHERE id_employes = 699;
  
  SAVEPOINT point2;
  UPDATE employes SET prenom = "julien B" WHERE id_employes = 699;


ROLLBACK TO point2; --pour annuler une partie de la transaction : retour au point 2==>on garde "julien A"en base
-- ou bien 
ROLLBACK; --pour annuler toute la transaction =>on garde "julien" en base
-- ou bien 
COMMIT; --pour valider les opérations de la transaction => on obtient "julien B" en base