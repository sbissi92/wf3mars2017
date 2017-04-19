******************************
exercice
******************************
-- 1: qui conduit la voiture d'id_véhicule 503 ?
-- 2: qui (prenom) conduit  quel modéle?
-- 3: insérer vous dans la table conducteur puis afficher tous les conducteur meme ceux qui n'ont pas de véhicule affecté ainsi que les modéles de véhicules
-- 4: ajoutez l'enregistrement suivant:
INSERT INTO vehicule (marque, modele, couleur, immatriculation) Values ('Renault', 'Espace', 'noir', 'ZE-123-RT');
-- puis afficher tous les modéles de véhicule, y compris ceux qui n'ont pas de chauffeur affecté, et le prénom des conducteurs

-- 5: afficher les prénoms des conducteurs (y compris ceux qui n'ont pas de véhicule')et tous les modéles (y compris ceux qui n'ont pas chauffeur')


SELECT prenom FROM conducteur WHERE id_conducteur IN (SELECT id_conducteur FROM association_vehicule_conducteur WHERE id_vehicule = 503);

SELECT c.prenom, v.modele
FROM conducteur c
INNER JOIN association_vehicule_conducteur a
ON a.id_conducteur = c.id_conducteur
INNER JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;


INSERT INTO conducteur (prenom, nom)
Values ('mariem', 'sbissi');


SELECT c.prenom, c.nom, v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a
ON a.id_conducteur = c.id_conducteur
LEFT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;



SELECT c.prenom, v.modele
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a
ON a.id_conducteur = c.id_conducteur
RIGHT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule;



(SELECT c.prenom, c.nom, v.modele
FROM conducteur c
LEFT JOIN association_vehicule_conducteur a
ON a.id_conducteur = c.id_conducteur
LEFT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule)
UNION
(SELECT c.prenom, c.nom, v.modele
FROM conducteur c
RIGHT JOIN association_vehicule_conducteur a
ON a.id_conducteur = c.id_conducteur
RIGHT JOIN vehicule v
ON a.id_vehicule = v.id_vehicule);
