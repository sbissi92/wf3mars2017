-- ************************
-- tables virtuelles: vues
-- ************************
-- les vues ou tables virtuelles sont des objets de la base de donnée constitué d'un nom, et d'une requete de selection
-- une fois une vue définie on peut l'utiliser comme une tables ,laquelle serait constituée des données sélectionnées par la requete définissant la vue

USE entreprise;
-- création d'une vue:
CREATE VIEW vue_homme AS SELECT prenom, nom, sexe, service FROM employes WHERE sexe= 'm';
-- creer une table virtuelle ou vue remplie avec des données du select.
-- une seconde requete effectuée sur la vue:
SELECT prenom FROM vue_homme;  --on peut effectuer les opérations habituelles sur cette table virtuelle vue_homme
-- si il ya un changement dans la table d'origine la vue est corrigée dynamiquement car elle enregistre la requete select qui pointe vers la table d'origine.inversement.....
-- ilya interet à faire des vues en termes de gain de ressources ou quand il ya des requetes complexes à executer.

 SHOW TABLES; --cettes vue est visible dans la liste des tables avec cette instruction

--  pour supprimer
DROP VIEW vue_homme;

-- ************************
-- tables temporaires
-- ************************
-- pour creer:
CREATE TEMPORARY TABLE temp SELECT * FROM employes WHERE sexe = 'f';
-- crée une table temporaire avec les donnée du select précisés et elle s'efface quand on quitte la session et elel n'est pas visible dans la liste avec SHOW TABLES.

-- utiliser une table temporaire:
SELECT prenom FROM temp; --affiche les prénoms de la table temporaire temp

-- contrairement aux tables virtuelles,s'il ya un changement dans la table d'orgine, il n'est pas impacté dans la table temporaire car celle ci est une copie à un instant t: les données sont dupliquées.
