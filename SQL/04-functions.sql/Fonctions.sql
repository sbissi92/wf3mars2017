-- *************************
-- Fonctions prédéfinies
-- *************************

-- dernier ID inséré:
INSERT INTO abonne (prenom) VALUES ('test');
SELECT LAST_INSERT_ID();   .-- permet d'afficher le dernier identifiant inséré

-- fonctions de dates:
SELECT *, DATE_FORMAT(date_rendu, '%d-%m-%y') AS date_rendu_fr FROM emprunt;
-- met les dates du champ date_rendu_fr au format françcais JJ-MM_AAAA

SELECT NOW(); --affiche la date et l'heure en cours'
SELECT DATE_FORMAT(NOW(), '%d-%m-%y %H:%i:%s');

SELECT CURDATE(); --retourne la date du jour au format YYYY-MM-DD
SELECT CURTIME(); --retourne l'heure courante au  format hh:mm:ss

-- crypter un mot de passe avec l'algorythme AES:
SELECT PASSWORD('mypass'); --affiche 'mypass' crypté par l'algorythme AES
INSERT INTO abonne (prenom) VALUES(PASSWORD('mypass')); --insére le mdp crypté en base


-- CONCATENATION:
SELECT CONCAT('a','b','c'); --concaténe les 3 chaînes  de caractéres
SELECT CONCAT_WS('-','a','b','c'); --concat with separator: concaténétion avec un séparateur

-- Fonctions sur les chaînes de caractéres:
SELECT SUBSTRING('bonjour', 1, 3); --affiche 'bon':compte 3 à partir de la position 1
SELECT TRIM('   bonjour    '); --supprime les espaces avant et aprés la chaine de caractéres

-- sources pour trouver des fonctions sql: sql.sh