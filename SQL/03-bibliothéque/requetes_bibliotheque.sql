-- ************************
création de la BDD
-- ************************

CREATE DATABASE bibliotheque;

USE bibliotheque;
-- copie/coller le contenu de biblio .sql dans la console

-- exercices:

-- quel est l'id_abonne de laura?
-- l'abonné d'id_abonne 2 est venu emprunter un livre à quelles dates?
-- combien d'emprunts ont été effectués en tout?
-- 'combien de livres sont sortis en 19 décmbre 2011?
-- une vie est de quel auteur?
-- de combien de livres d'alexandre DUMAS dispose-ton?
-- quel id_livre est le plus emprunté ?
-- quel id_abonne emprunte le plus de livres?

SELECT id_abonne FROM abonne WHERE prenom = 'laura';

SELECT date_sortie FROM emprunt WHERE id_abonne = 2;

SELECT COUNT(id_emprunt) FROM emprunt;

SELECT COUNT(date_sortie) FROM emprunt WHERE date_sortie ='2011-12-19';

SELECT auteur FROM livre WHERE titre = 'Une vie';

SELECT COUNT(id_livre) FROM livre WHERE auteur ='Alexandre DUMAS';

SELECT id_livre, COUNT(id_livre) AS nombre FROM emprunt GROUP BY id_livre ORDER BY nombre DESC LIMIT 0,1;

SELECT id_abonne, COUNT(id_emprunt) FROM emprunt GROUP BY id_abonne  ORDER BY(id_emprunt) DESC LIMIT 0,1;



-- le 18 avril:
-- ******************************
-- chapitre 1:requêtes imbriquées
-- ******************************

-- syntaxe: "aide mémoire" de la reqête imbriquée:
-- SELECT a FROM table_de_a WHERE b IN (SELECT b FROM table_de_b WHERE condition);

-- pour realiser une requete imbriquée il faut obligatoirement un champ commun entre les deux tables.

-- un champ null se teste avec IS NULL.

SELECT id_livre FROM emprunt WHERE date_rendu IS NULL;
-- affiche lid livre non rendu.
-- pour afficher les titres de ces livres non rendu :
SELECT titre FROM livre WHERE id_livre IN
            (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL);

-- aficher le n° des livres que chloé a emprunté
SELECT id_livre FROM emprunt WHERE id_abonne = (SELECT id_abonne FROM abonne WHERE prenom = 'chloe');
-- quand il nya qun seul resultat dans la requete imbriqué on met un signe '='.

-- exercice:
-- afficher le prénom des abonnés ayant emprunté un livre le 19-12-2011

SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE date_sortie='2011-12-19');

-- afficher le prénom des abonnées ayant emprunté un livre d'alphonse daudet
SELECT prenom FROM abonne WHERE id_abonne IN (SELECT id_abonne FROM emprunt WHERE id_livre 
IN (SELECT id_livre FROM livre where auteur='alphonse daudet') );

-- afficher les titres de livres que chloé a emprunté 

SELECT titre FROM livre WHERE id_livre IN (SELECT id_livre FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom='chloe') );


-- afficher les titres de livres que chloé n'a pas rendu'

SELECT titre FROM livre WHERE id_livre In (SELECT id_livre FROM emprunt WHERE date_rendu IS NULL AND id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom = 'chloe'));

-- COMBIEN de livre benoit a emprunté
SELECT COUNT(id_livre) FROM emprunt WHERE id_abonne IN (SELECT id_abonne FROM abonne WHERE prenom='benoit');

-- qui(prénom) a emprunté le plus de livres?

SELECT prenom FROM abonne WHERE id_abonne = (SELECT id_abonne FROM emprunt GROUP BY id_abonne ORDER BY COUNT(id_emprunt) DESC LIMIT 1);
-- remarque: on ne peut pas utiliser LIMIT dans un IN mais obligatoirement dans un "=".

-- **************************
-- chap2: jointures internes
-- **************************
-- différence entre une jointure et une requete imbriqué: une requete imbriquée est possible seulement dans le cas où les champs affichés (ceux qui sont dans le select) sont issus de la meme table.
-- avec une requete de jointure ,les champs selectionnés peuvent etre issues de tables différentes. une jointure est une requete permettant de faire des relations entre les différentes tables afin d'avoir des colonnes associés qui ne forme qu'un seul résultat.

-- afficher les dates de sortie et de rendu pour l'abonné guillaume'
SELECT a.prenom, e.date_sortie, e.date_rendu
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
WHERE a.prenom'guillaume';

-- 1er ligne: ce que je souhaite afficher
-- 2: la premiere table d'où viennent les informations'
-- 3: la seconde ......
-- 4: la jointure qui lie les 2 tables avec le champ commun 
-- 5: la ou les conditions supplémentaires

-- exercice
--  nous aimerions connaitre les mouvements des livres (titre date sortie et rendu ) écrits par alphonse daudet

SELECT l.titre, e.date_sortie, e.date_rendu
FROM livre l
INNER JOIN emprunt e
ON l.id_livre = e.id_livre
WHERE l.auteur='alphonse daudet';

-- qui a emprunté 'une vie' sur l'anné 2011?'
SELECT a.prenom, a.id_abonne
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
INNER JOIN livre l
ON l.id_livre = e.id_livre
WHERE l.titre ='une vie' AND e.date_sortie BETWEEN '2011-01-01'AND'2011-12-31';

-- afficher le nombre de livres empruntés par chaque abonné:
SELECT a.prenom, COUNT(e.id_emprunt) AS nombre
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne
GROUP BY a.prenom;

-- afficher qui a emprunté quel livre et à quelle date de sortie?
SELECT a.prenom, e.date_sortie, l.titre
FROM abonne a
INNER JOIN emprunt e
On a.id_abonne = e.id_abonne
INNER JOIN livre l
ON e.id_livre = l.id_livre;

-- afficher les prenoms des abonnes avec les id livres qu'ils ont empruntés'
SELECT a.prenom, e.id_livre
FROM abonne a
INNER JOIN emprunt e
ON a.id_abonne = e.id_abonne;


-- *************************
-- chap3:jointure externe 
-- *************************
-- une jointure externe permet de faire des requetes sans correspondance exigée entre les valeurs requetés.
-- exercice
-- AJOUTER vous dans la table abonne:
INSERT INTO abonne (prenom) VALUES('moi');

-- si on relance la derniére requete de jointure interne, nous n'apparaissons pas dans la liste car nous n'avons pas emprunté de livre.
-- pour y remédier ,nous faisons une jointure esterne:
SELECT a.prenom,e.id_livre
FROM abonne a
LEFT JOIN emprunt e
ON e.id_abonne = a.id_abonne;

-- la clause LEFT JOIN permet de rapatrier toutes les données dans la table considérée comme étant à auche de l'instruction LEFT JOIN (donc abonne dans notre cas),sans correspondance exigée dans l'autre table(emprunt ici).

-- voici le cas avec un livre supprimé de la bibliothéque (le livre une vie est supprimé):
DELETE FROM livre WHERE id_livre = 100;

-- on visualise les emprunts avec une jointure interne:
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt
INNER JOIN livre
On emprunt.id_livre = livre.id_livre;
-- on ne voit pas dans cette requete le livre"une vie "qui a été supprimé.

-- on fait la meme chose avec une jointure externe:
SELECT emprunt.id_emprunt, livre.titre
FROM emprunt
LEFT JOIN livre
On emprunt.id_livre = livre.id_livre;
-- ici tous les emprunts sont affichés, y compris eux pour les quelles le titre est supprimé et remplacé par null.





-- *****************
-- chap: union
-- *****************
-- UNION PERMET DE FUSIONNER LE R2SULTAT DE DEUX REQUETES DANS LA MEME LISTE DE resultat
-- ex: Si on supprime  guillaume de la table abonne ,on peut afficher à la fois tous les livres empruntés ,y compris ceux par des lecteurs désinscrits(on affiche null à la place de guillaume ) et tous les abonnés y compris ceux qui n'ont rien emprunté (on affiche NULL dans l'id_livre pour labonné 'moi'):

-- suppression:
DELETE FROM abonne WHERE id_abonne = 1;

-- requete sur les livres empruntés avec UNION:
(SELECT abonne.prenom, emprunt.id_livre FROM abonne LEFT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne)
UNION
(SELECT abonne.prenom, emprunt.id_livre FROM abonne RIGHT JOIN emprunt ON abonne.id_abonne = emprunt.id_abonne);