INSERT INTO auteur (nom_auteur, prenom_auteur, commentaire) VALUES ('Tractopelle', 'Elmo', 'Il est énorme et il est sec sec');

INSERT INTO bibliotheque (ville_bibliotheque, commentaire) VALUES ('Trignac', 'Très belle ville');

INSERT INTO emprunt (numero_ouvrage, date_emprunt, numero_usager, commentaire) VALUES (1, '2001-09-11', 1, 'Effectué entre deux tours');

INSERT INTO ouvrage (titre_ouvrage, langue, numero_bibliotheque, numero_auteur, commentaire) VALUES ('Avion', 'Français', 1, 1, 'Aucun');

INSERT INTO retour (numero_emprunt, date_retour, commentaire) VALUES (1, '2001-09-12', 'Très bon livre');

INSERT INTO transfert (numero_bibliotheque_origine, numero_bibliotheque_cible, numero_ouvrage, date_transfert, commentaire) VALUES (1, 1, 1, '2001-09-12', 'Aucun');

INSERT INTO usager (nom_usager, prenom_usager, ville_usager, numero_bibliotheque, commentaire) VALUES ('Chevalier', 'Clément', 'Trignac', 1, 'Aucun');



INSERT INTO auteur (nom_auteur, prenom_auteur, commentaire) VALUES ('Delechamp', 'Gabriel', 'Amoureux du CSS et des aquaparks ou des aquaboulevards');

INSERT INTO bibliotheque (ville_bibliotheque, commentaire) VALUES ('Saint-Nazaire', 'Très belle ville');

INSERT INTO emprunt (numero_ouvrage, date_emprunt, numero_usager, commentaire) VALUES (2, '2024-01-01', 2, 'Effectué dans un bâtiment');

INSERT INTO ouvrage (titre_ouvrage, langue, numero_bibliotheque, numero_auteur, commentaire) VALUES ('CSS', 'Français', 2, 2, 'Passionant');

INSERT INTO retour (numero_emprunt, date_retour, commentaire) VALUES (2, '2024-02-02', NULL);

INSERT INTO transfert (numero_bibliotheque_origine, numero_bibliotheque_cible, numero_ouvrage, date_transfert, commentaire) VALUES (2, 2, 2, '2024-02-02', 'Aucun');

INSERT INTO usager (nom_usager, prenom_usager, ville_usager, numero_bibliotheque, commentaire) VALUES ('Chevalier', 'Bastien', 'Saint-Nazaire', 2, 'Aucun');



INSERT INTO auteur (nom_auteur, prenom_auteur, commentaire) VALUES ('Foucher', 'Theo', 'Accro à fortnite');

INSERT INTO bibliotheque (ville_bibliotheque, commentaire) VALUES ('Trignac', 'Très belle ville');

INSERT INTO emprunt (numero_ouvrage, date_emprunt, numero_usager, commentaire) VALUES (3, '2024-01-03', 3, 'Effectué en ligne');

INSERT INTO ouvrage (titre_ouvrage, langue, numero_bibliotheque, numero_auteur, commentaire) VALUES ('Fortnite', 'Français', 3, 3, 'Dévleppoment des connaissances');

INSERT INTO retour (numero_emprunt, date_retour, commentaire) VALUES (3, '2024-01-04', NULL);

INSERT INTO transfert (numero_bibliotheque_origine, numero_bibliotheque_cible, numero_ouvrage, date_transfert, commentaire) VALUES (3, 3, 3, '2024-01-04', 'Aucun');

INSERT INTO usager (nom_usager, prenom_usager, ville_usager, numero_bibliotheque, commentaire) VALUES ('Le Gallic', 'Gwilherm', 'Trignac', 3, 'Aucun');



INSERT INTO auteur (nom_auteur, prenom_auteur, commentaire) VALUES ('Maillard', 'Félis', 'Accro à powfu');

INSERT INTO bibliotheque (ville_bibliotheque, commentaire) VALUES ('Saint-Nazaire', 'Très belle ville');

INSERT INTO emprunt (numero_ouvrage, date_emprunt, numero_usager,commentaire) VALUES (4, '2024-01-05', 4, 'Aucun');

INSERT INTO ouvrage (titre_ouvrage, langue, numero_bibliotheque, numero_auteur, commentaire) VALUES ('Musique', 'Anglais', 4, 4, 'Powfu le goat');

INSERT INTO retour (numero_emprunt, date_retour, commentaire) VALUES (4, '2024-01-06', NULL);

INSERT INTO transfert (numero_bibliotheque_origine, numero_bibliotheque_cible, numero_ouvrage, date_transfert, commentaire) VALUES (4, 4, 4, '2024-01-06', 'Aucun');

INSERT INTO usager (nom_usager, prenom_usager, ville_usager, numero_bibliotheque, commentaire) VALUES ('Camus', 'Theo', 'Trignac', 4, 'Aucun');



INSERT INTO auteur (nom_auteur, prenom_auteur, commentaire) VALUES ('Mars', 'Rayan', 'Accro à Brawl Stars');

INSERT INTO bibliotheque (ville_bibliotheque, commentaire) VALUES ('Saint-Nazaire', 'Très belle ville');

INSERT INTO emprunt (numero_ouvrage, date_emprunt, numero_usager,commentaire) VALUES (5, '2024-01-07', 5, 'Effectué en ligne');

INSERT INTO ouvrage (titre_ouvrage, langue, numero_bibliotheque, numero_auteur, commentaire) VALUES ('Brawl Stars', 'Français', 5, 5, 'Comment monter en trophées');

INSERT INTO retour (numero_emprunt, date_retour, commentaire) VALUES (5, '2024-01-08', NULL);

INSERT INTO transfert (numero_bibliotheque_origine, numero_bibliotheque_cible, numero_ouvrage, date_transfert, commentaire) VALUES (5, 5, 5, '2024-01-08', 'Aucun');

INSERT INTO usager (nom_usager, prenom_usager, ville_usager, numero_bibliotheque, commentaire) VALUES ('Tusseau', 'Elouan', 'Saint-Nazaire', 5, 'Aucun');