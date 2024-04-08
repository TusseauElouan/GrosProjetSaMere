CREATE VIEW emprunt_vue AS
SELECT 
    E.numero_emprunt AS emprunt_numero_emprunt, 
    E.numero_ouvrage, 
    E.date_emprunt, 
    E.numero_usager, 
    E.commentaire AS commentaire_emprunt, 
    U.numero_usager AS usager_numero_usager, 
    U.nom_usager, 
    U.prenom_usager, 
    U.ville_usager, 
    U.numero_bibliotheque AS usager_numero_bibliotheque, 
    U.commentaire AS commentaire_usager, 
    O.numero_ouvrage AS ouvrage_numero_ouvrage, 
    O.titre_ouvrage, 
    O.langue, 
    O.numero_bibliotheque AS ouvrage_numero_bibliotheque, 
    O.numero_auteur, 
    O.commentaire AS commentaire_ouvrage
FROM emprunt E
JOIN usager U ON E.numero_usager = U.numero_usager 
JOIN ouvrage O ON E.numero_ouvrage = O.numero_ouvrage;

CREATE VIEW retour_vue AS
SELECT *
FROM retour
JOIN emprunt_vue ON retour.numero_emprunt = emprunt_vue.emprunt_numero_emprunt;


CREATE VIEW transfert_vue AS 
SELECT 
    T.numero_transfert,
    T.numero_bibliotheque_origine AS numero_bibliotheque_origine_transfert,
    T.numero_bibliotheque_cible AS numero_bibliotheque_cible_transfert,
    B_origine.numero_bibliotheque AS numero_bibliotheque_origine,
    B_origine.ville_bibliotheque AS ville_bibliotheque_origine,
    B_origine.commentaire AS commentaire_bibliotheque_origine,
    B_cible.numero_bibliotheque AS numero_bibliotheque_cible,
    B_cible.ville_bibliotheque AS ville_bibliotheque_cible,
    B_cible.commentaire AS commentaire_bibliotheque_cible
FROM 
    transfert T
JOIN 
    bibliotheque B_origine ON T.numero_bibliotheque_origine = B_origine.numero_bibliotheque 
JOIN 
    bibliotheque B_cible ON T.numero_bibliotheque_cible = B_cible.numero_bibliotheque;