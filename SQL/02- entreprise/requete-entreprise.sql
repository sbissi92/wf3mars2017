-- ouvrir la console SQL sous XAMPP et tapez:
        -- cd c:\xampp\mysql\bin
        --   mysql.exe -u root --password



-- ligne de commentaire en sql débute par --
-- les requetes ne sont pas sensible à la casse, mais une convention indique qu'il faut mettre les mots clés des requétes en majuscules.

--  1er chapitre:requêtes générales

 CREATE DATABASE entreprise; ==>
--  creer une nouvelle base de données appelée  "entreprise"

SHOW DATABASES; ==>
-- PERMET D'afficher les BDD disponibles

-- ne pas saisir dans la console:
DROP DATABASE entreprise; ==>
-- supprimer la BDD entreprise

DROP table employes; ==>
-- supprimer la table employes

TRUNCATE employes; ==>
-- vider la table employes de son contenu

-- on peut coller dans la console:
USE entreprise; ==>
-- se connecter à la BDD entreprise

SHOW TABLES; ==>
-- permet de lister les tables de la BDD en cours d'utilisation

DESC employes; ==>
-- 'observer la structure de la table ainsi que les champs (DESC pour describe)

-- chap 2 : requêtes de selection

SELECT nom, prenom FROM employes; ==>
-- affiche ou selectionne le nom et le prenom de la table employes: Select : selectionne les champs ,FROM: la table utilisée.
SELECT service FROM employes; ==>
-- affiche les services de l'entreprise 

-- DISTINCT
-- on a vu dans la requête précédente que les services sont affichés plusieurs fois. pour éliminer les doublons on utilise DISTINCT

SELECT DISTINCT service FROM employes;

-- all ou *

-- on peut afficher toutes les informations issues d'une table avec une"*" pour dire "all"

SELECT * FROM employes; ==>

-- affiche toute la table employe


-- clause WHERE
 SELECT prenom, nom FROM employes WHERE service = 'informatique'; ==>
--  affiche le nom et prenom des employés du service informatique.NOTEZ QUE LES NOMS DES CHAMPS DES TABLES NE PRENNET PAS DE quotes alors queles valeurs tel que 'informatique' prennet des quotes .cependant s'il s'agit d'un chiffre, on ne lui met pas de quote.

SELECT nom, prenom, date_embauche FROM employes WHERE date_embauche BETWEEN '2006-01-01' AND '2010-12-31'; ==>
-- affiche les employes dont la date d'embauche est entre 2006 et 2010

SELECT prenom FROM employes WHERE prenom LIKE 's%';==>
-- affiche les prénoms des employés commençant par s.le signe % est un joker qui remplace les autres caractéres

SELECT prenom FROM employes WHERE prenom LIKE '%-%';==>
-- affiche les prénoms qui contiennet un tiret. like est utilisé en autre pour les formulaires de recherche sur les sites.

-- opérateurs de comparaisons:
SELECT prenom, nom FROM employes WHERE service != 'informatique'; ==>
-- affiche le prenom et le nom employes nétant pas du services informatique

--  =, < ,  >,  <=,  >=,  != (pour différent de)

-- ORDER BY pour faire des tris: 
SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire; ==>
-- affiche les employes par salaire en ordre croissant par défaut.

 SELECT nom, prenom, service, salaire FROM employes ORDER BY salaire ASC, prenom DESC; ++>
--  ASC=pour un tri ascendant, DESC pour un tri descendant. ici on trie les salaires par ordre croissant puis  à salaire identique, les prenoms par ordre décroissant.

SELECT nom, prenom, salaire FROM employes ORDER BY salaire DESC LIMIT 0,1;
-- affiche l'employe ayant le salaire le plus élevé : on trie d'abord les salaires par ordre décroissant (pour avoir le plus élevé en premier),puis o,n limite le résultat au premier enregistrement avec limit 0,1. le 0 signifie le point de départ de LIMIT ,et le 1 signifie prendre 1 enregistrement.on utilise LIMIT dans la pagination sur les sites.

-- l'alias avec  AS
SELECT nom, prenomm, salaire * 12 AS salaire_annuel FROM employes; ==>
-- affiche le salaire sur 12mois des employes . salaire _annuel est un alias qui 'stocke' la valeur de ce qui précéde.

SELECT SUM(salaire * 12) FROM employes;
-- affiche le salaire total annuel des tous les employes. SUM permet d'additionner des valeurs de champs différents 

SELECT MIN(salaire) FROM employes; ==>
-- affiche le salaire le plus base
SELECT max(salaire)...........

SELECT prenom, MIN(salaire) FROM employes; ==>
-- ne donne pas le résultat attendu, car afiiche  le premier  prénom rencontré dans la table .il faut pour résoudre à cette question utiliser ORDER BY et LIMIT comme  au dessus:
SELECT prenom, salaire FROM employes ORDER BY salaire ASC LIMIT 0,1;

SELECT ROUND (AVG(salaire), 1) FROM employes; ==>
-- affiche à 1 chiffre aprés la virgule

SELECT COUNT (id_employes) FROM employes WHERE sexe = 'f'; ==>
-- affiche le nombre d'employées féminins'

SELECT prenom, service FROM employes WHERE service IN ('comptabilite', 'informatique'); ==>
-- affiche les employes appartenant à la comptabilité ou à l'informatique

SELECT prenom, service FROM employes WHERE service NOT IN ('comptabilite', 'informatique');
-- affiche les employés n'appartenant pas à la compta ou linfo

SELECT prenom, service, salaire FROM employes WHERE service = 'commercial' AND salaire <= 2000; ==>
-- affiche le prénom des commerçiaux dont le salaire est inférieur ou égal à 2000

SELECT prenom, service, salaire FROM employes WHERE (service = 'production' AND salaire = 1900) OR salaire = 2300; ==>
-- affiche les employes du service production dont le salaire est de 1900 ou dans les autres services ceux qui gagne 2300

SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service;
-- affiche le nombre d'employes par service. GROUP BY distribue les résultats du comptage par les services correspondants.

SELECT service, COUNT(id_employes) AS nombre FROM employes GROUP BY service HAVING nombre > 1; 
-- affiche les services où il ya plus d'un employé. having remplace where dans un groupe by.

-- chap3: requêtes d'insertion

SELECT * FROM employes;
-- on observe la table avant de la modifier

INSERT INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (8059, 'alexis', 'richy', 'm', 'informatique', '2011-12-28', 1800);
-- insertion d'un employe. notez que l'ordre des champs énoncé entre les 2 paires de parenthéses doit etre le meme pour que les valeurs correspondent.

-- une requete sans préciser les champs concernés:
INSERT INTO employes VALUES(8060, 'test', 'test', 'm', 'test', '2012-12-28', 1800, 'valeur en trop');
-- insertion d'un employe sans préciser la liste  des champs si et seulement si le nombre et l'ordre des valeurs attendues sont respéctés => ici erreur car il ya une valeur en trop!

-- chap3: requetes de modification:

UPDATE employes SET salaire = 1870 WHERE nom = 'cottet';
-- modifie le salaire de l'employe de nom cottet


UPDATE employes SET salaire = 1871 WHERE id_employes = 699;
-- il est recommandé de faire de modifiacations de données par les id car ils sont uniques.cela évite d'updater plusieurs enregistrements à la fois

UPDATE employes SET salaire = 1872, service = "autre" WHERE id_employes = 699;
-- on modifie 2 valeurs dans la meme requete

-- a ne pas faire (sauf cas contraire) : un UPDATE sans clause WHERE : 
UPDATE employes SET salaire = 1870;
-- ici les salaires de tous les employes passent à 1870


REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test', 'test', 'm', 'marketing' '2010-07-05', 2600);
-- l'id_employes 2000 n'existe pas donc replace se comporte comme un INSERT

REPLACE INTO employes (id_employes, prenom, nom, sexe, service, date_embauche, salaire) VALUES (2000, 'test2', 'test2', 'm', 'marketing' '2010-07-05', 2601);
-- se comporte comme un update

-- chap 4: requetes de supprssion

DELETE FROM employes WHERE id_employes = 900; 
-- suppression de l'employes dont l'id est 900 

DELETE FROM employes WHERE service = 'informatique' AND id_employes != 802;
-- supprimer tous les informaticiens sauf 1 dont l'id est 802'

DELETE FROM employes WHERE  id_employes = 388 OR id_employes = 990;
-- supprime 2 employes qui n'ont pas de point commun. il s'agit d'un or et non pas d'un and car un employe ne peut pas avoir 2 id_employes différents.

-- à ne pas faire: un delete sans clause where:
DELETE FROM employes;
-- evient à faire un truncate de table qui est irréversible




-- exercices:
-- 1 afficher le service de l'employé 547
-- la date d'embauche d'amandine
-- le nombre de comerciaux
-- afficher le cout des commerciaux sur un an
-- afficher le salaire moyen par service
-- afficher le nombre de recrutements sur l'année 2010 (3 syntaxes possible)
-- augmenter le salaire de chaque employé de 100 
-- afficher le nombre de services différents
-- afficher le nombre d'employés par service
-- afficher les infos de lemployé de service commercial ayant le salaire le plus elevé
-- afficher l'employé embauché en dernier



SELECT service FROM employes WHERE id_employes = 547;

SELECT date_embauche FROM employes WHERE prenom = "amandine";

SELECT COUNT(id_employes) FROM employes where service = 'commercial';

SELECT SUM(salaire * 12) FROM employes WHERE service = 'commercial';

SELECT AVG(salaire) FROM employes GROUP BY service;

SELECT COUNT(id_employes) FROM employes WHERE (date_embauche>='2010-01-01' AND date_embauche<='2010-12-31');
ou
SELECT COUNT(date_embauche) FROM employes WHERE date_embauche LIKE '2010%';
ou
SELECT COUNT(id_employes) FROM employes WHERE date_embauche BETWEEN '2010-01-01' AND '2010-12-31';

SELECT COUNT(DISTINCT service) FROM employes;

SELECT service,COUNT(id_employes) FROM employes GROUP BY service;

SELECT nom, prenom, date_embauche, salaire FROM employes WHERE service='commercial' AND salaire=(SELECT MAX(salaire) FROM employes WHERE service='commercial');

SELECT (id_employes) FROM employes WHERE (date_embauche)=(SELECT MAX(date_embauche) FROM employes);


7-update employes set salaire = salaire + 100;
10 SELECT nom....FROM employes WHERE service = 'commercial' ORDER BY salaire DESC LIMIT 0,1;

11 SELECT id_employes,nom...FROM employes ORDER bY DATE8EMBAUCHE desc limit 1;