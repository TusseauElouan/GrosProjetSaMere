-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 12 avr. 2024 à 12:45
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `numero_auteur` int NOT NULL AUTO_INCREMENT,
  `nom_auteur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom_auteur` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `commentaire` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `auteur`
--

INSERT INTO `auteur` (`numero_auteur`, `nom_auteur`, `prenom_auteur`, `commentaire`) VALUES
(1, 'Tractopelle', 'Elmo', 'Il est énorme et il est sec sec'),
(2, 'Delechamp', 'Gabriel', 'Amoureux du CSS et des aquaparks ou des aquaboulevards'),
(3, 'Foucher', 'Theo', 'Accro à fortnite'),
(4, 'Maillard', 'Félis', 'Accro à powfu'),
(5, 'Mars', 'Rayan', 'Accro à Brawl Stars');

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

DROP TABLE IF EXISTS `bibliotheque`;
CREATE TABLE IF NOT EXISTS `bibliotheque` (
  `numero_bibliotheque` int NOT NULL AUTO_INCREMENT,
  `ville_bibliotheque` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `commentaire` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_bibliotheque`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `bibliotheque`
--

INSERT INTO `bibliotheque` (`numero_bibliotheque`, `ville_bibliotheque`, `commentaire`) VALUES
(1, 'Trignac', 'Très belle ville'),
(2, 'Saint-Nazaire', 'Très belle ville'),
(3, 'Trignac', 'Très belle ville'),
(4, 'Saint-Nazaire', 'Très belle ville'),
(5, 'Saint-Nazaire', 'Très belle ville');

-- --------------------------------------------------------

--
-- Structure de la table `emprunt`
--

DROP TABLE IF EXISTS `emprunt`;
CREATE TABLE IF NOT EXISTS `emprunt` (
  `numero_emprunt` int NOT NULL AUTO_INCREMENT,
  `numero_ouvrage` int DEFAULT NULL,
  `date_emprunt` date DEFAULT NULL,
  `numero_usager` int DEFAULT NULL,
  `commentaire` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_emprunt`),
  KEY `numero_ouvrage` (`numero_ouvrage`),
  KEY `numero_usager` (`numero_usager`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `emprunt`
--

INSERT INTO `emprunt` (`numero_emprunt`, `numero_ouvrage`, `date_emprunt`, `numero_usager`, `commentaire`) VALUES
(1, 1, '2001-09-11', 1, 'Effectué entre deux tours'),
(2, 2, '2024-01-01', 2, 'Effectué dans un bâtiment'),
(3, 3, '2024-01-03', 3, 'Effectué en ligne'),
(4, 4, '2024-01-05', 4, 'Aucun'),
(5, 5, '2024-01-07', 5, 'Effectué en ligne');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `emprunt_vue`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `emprunt_vue`;
CREATE TABLE IF NOT EXISTS `emprunt_vue` (
`commentaire_emprunt` text
,`commentaire_ouvrage` text
,`commentaire_usager` text
,`date_emprunt` date
,`emprunt_numero_emprunt` int
,`langue` varchar(2)
,`nom_usager` varchar(255)
,`numero_auteur` int
,`numero_ouvrage` int
,`numero_usager` int
,`ouvrage_numero_bibliotheque` int
,`ouvrage_numero_ouvrage` int
,`prenom_usager` varchar(255)
,`titre_ouvrage` varchar(255)
,`usager_numero_bibliotheque` int
,`usager_numero_usager` int
,`ville_usager` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE IF NOT EXISTS `ouvrage` (
  `numero_ouvrage` int NOT NULL AUTO_INCREMENT,
  `titre_ouvrage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `langue` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero_bibliotheque` int DEFAULT NULL,
  `numero_auteur` int DEFAULT NULL,
  `commentaire` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_ouvrage`),
  KEY `numero_bibliotheque` (`numero_bibliotheque`),
  KEY `numero_auteur` (`numero_auteur`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `ouvrage`
--

INSERT INTO `ouvrage` (`numero_ouvrage`, `titre_ouvrage`, `langue`, `numero_bibliotheque`, `numero_auteur`, `commentaire`) VALUES
(1, 'Avion', 'Fr', 1, 1, 'Aucun'),
(2, 'CSS', 'Fr', 2, 2, 'Passionant'),
(3, 'Fortnite', 'Fr', 3, 3, 'Dévleppoment des connaissances'),
(4, 'Musique', 'An', 4, 4, 'Powfu le goat'),
(5, 'Brawl Stars', 'Fr', 5, 5, 'Comment monter en trophées');

-- --------------------------------------------------------

--
-- Structure de la table `retour`
--

DROP TABLE IF EXISTS `retour`;
CREATE TABLE IF NOT EXISTS `retour` (
  `numero_retour` int NOT NULL AUTO_INCREMENT,
  `numero_emprunt` int DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `commentaire` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_retour`),
  KEY `numero_emprunt` (`numero_emprunt`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `retour`
--

INSERT INTO `retour` (`numero_retour`, `numero_emprunt`, `date_retour`, `commentaire`) VALUES
(1, 1, '2001-09-12', 'Très bon livre'),
(2, 2, '2024-02-02', NULL),
(3, 3, '2024-01-04', NULL),
(4, 4, '2024-01-06', NULL),
(5, 5, '2024-01-08', NULL);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `retour_vue`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `retour_vue`;
CREATE TABLE IF NOT EXISTS `retour_vue` (
`commentaire` text
,`commentaire_emprunt` text
,`commentaire_ouvrage` text
,`commentaire_usager` text
,`date_emprunt` date
,`date_retour` date
,`emprunt_numero_emprunt` int
,`langue` varchar(2)
,`nom_usager` varchar(255)
,`numero_auteur` int
,`numero_emprunt` int
,`numero_ouvrage` int
,`numero_retour` int
,`numero_usager` int
,`ouvrage_numero_bibliotheque` int
,`ouvrage_numero_ouvrage` int
,`prenom_usager` varchar(255)
,`titre_ouvrage` varchar(255)
,`usager_numero_bibliotheque` int
,`usager_numero_usager` int
,`ville_usager` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure de la table `transfert`
--

DROP TABLE IF EXISTS `transfert`;
CREATE TABLE IF NOT EXISTS `transfert` (
  `numero_transfert` int NOT NULL AUTO_INCREMENT,
  `numero_bibliotheque_origine` int DEFAULT NULL,
  `numero_bibliotheque_cible` int DEFAULT NULL,
  `numero_ouvrage` int DEFAULT NULL,
  `date_transfert` date DEFAULT NULL,
  `commentaire` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_transfert`),
  KEY `numero_bibliotheque_origine` (`numero_bibliotheque_origine`),
  KEY `numero_bibliotheque_cible` (`numero_bibliotheque_cible`),
  KEY `numero_ouvrage` (`numero_ouvrage`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `transfert`
--

INSERT INTO `transfert` (`numero_transfert`, `numero_bibliotheque_origine`, `numero_bibliotheque_cible`, `numero_ouvrage`, `date_transfert`, `commentaire`) VALUES
(1, 1, 1, 1, '2001-09-12', 'Aucun'),
(2, 2, 2, 2, '2024-02-02', 'Aucun'),
(3, 3, 3, 3, '2024-01-04', 'Aucun'),
(4, 4, 4, 4, '2024-01-06', 'Aucun'),
(5, 5, 5, 5, '2024-01-08', 'Aucun');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `transfert_vue`
-- (Voir ci-dessous la vue réelle)
--
DROP VIEW IF EXISTS `transfert_vue`;
CREATE TABLE IF NOT EXISTS `transfert_vue` (
`commentaire_bibliotheque_cible` text
,`commentaire_bibliotheque_origine` text
,`date_transfert` date
,`numero_bibliotheque_cible` int
,`numero_bibliotheque_cible_transfert` int
,`numero_bibliotheque_origine` int
,`numero_bibliotheque_origine_transfert` int
,`numero_ouvrage` int
,`numero_transfert` int
,`transfert_commentaire` text
,`ville_bibliotheque_cible` varchar(255)
,`ville_bibliotheque_origine` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

DROP TABLE IF EXISTS `usager`;
CREATE TABLE IF NOT EXISTS `usager` (
  `numero_usager` int NOT NULL AUTO_INCREMENT,
  `nom_usager` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom_usager` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ville_usager` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero_bibliotheque` int DEFAULT NULL,
  `commentaire` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_usager`),
  KEY `numero_bibliotheque` (`numero_bibliotheque`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `usager`
--

INSERT INTO `usager` (`numero_usager`, `nom_usager`, `prenom_usager`, `ville_usager`, `numero_bibliotheque`, `commentaire`) VALUES
(1, 'Chevalier', 'Clément', 'Trignac', 1, 'Aucun'),
(2, 'Chevalier', 'Bastien', 'Saint-Nazaire', 2, 'Aucun'),
(3, 'Le Gallic', 'Gwilherm', 'Trignac', 3, 'Aucun'),
(4, 'Camus', 'Theo', 'Trignac', 4, 'Aucun'),
(5, 'Tusseau', 'Elouan', 'Saint-Nazaire', 5, 'Aucun');

-- --------------------------------------------------------

--
-- Structure de la vue `emprunt_vue`
--
DROP TABLE IF EXISTS `emprunt_vue`;

DROP VIEW IF EXISTS `emprunt_vue`;
CREATE ALGORITHM=UNDEFINED DEFINER=`user_bibliotheque`@`localhost` SQL SECURITY DEFINER VIEW `emprunt_vue`  AS SELECT `e`.`numero_emprunt` AS `emprunt_numero_emprunt`, `e`.`numero_ouvrage` AS `numero_ouvrage`, `e`.`date_emprunt` AS `date_emprunt`, `e`.`numero_usager` AS `numero_usager`, `e`.`commentaire` AS `commentaire_emprunt`, `u`.`numero_usager` AS `usager_numero_usager`, `u`.`nom_usager` AS `nom_usager`, `u`.`prenom_usager` AS `prenom_usager`, `u`.`ville_usager` AS `ville_usager`, `u`.`numero_bibliotheque` AS `usager_numero_bibliotheque`, `u`.`commentaire` AS `commentaire_usager`, `o`.`numero_ouvrage` AS `ouvrage_numero_ouvrage`, `o`.`titre_ouvrage` AS `titre_ouvrage`, `o`.`langue` AS `langue`, `o`.`numero_bibliotheque` AS `ouvrage_numero_bibliotheque`, `o`.`numero_auteur` AS `numero_auteur`, `o`.`commentaire` AS `commentaire_ouvrage` FROM ((`emprunt` `e` join `usager` `u` on((`e`.`numero_usager` = `u`.`numero_usager`))) join `ouvrage` `o` on((`e`.`numero_ouvrage` = `o`.`numero_ouvrage`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `retour_vue`
--
DROP TABLE IF EXISTS `retour_vue`;

DROP VIEW IF EXISTS `retour_vue`;
CREATE ALGORITHM=UNDEFINED DEFINER=`user_bibliotheque`@`localhost` SQL SECURITY DEFINER VIEW `retour_vue`  AS SELECT `retour`.`numero_retour` AS `numero_retour`, `retour`.`numero_emprunt` AS `numero_emprunt`, `retour`.`date_retour` AS `date_retour`, `retour`.`commentaire` AS `commentaire`, `emprunt_vue`.`emprunt_numero_emprunt` AS `emprunt_numero_emprunt`, `emprunt_vue`.`numero_ouvrage` AS `numero_ouvrage`, `emprunt_vue`.`date_emprunt` AS `date_emprunt`, `emprunt_vue`.`numero_usager` AS `numero_usager`, `emprunt_vue`.`commentaire_emprunt` AS `commentaire_emprunt`, `emprunt_vue`.`usager_numero_usager` AS `usager_numero_usager`, `emprunt_vue`.`nom_usager` AS `nom_usager`, `emprunt_vue`.`prenom_usager` AS `prenom_usager`, `emprunt_vue`.`ville_usager` AS `ville_usager`, `emprunt_vue`.`usager_numero_bibliotheque` AS `usager_numero_bibliotheque`, `emprunt_vue`.`commentaire_usager` AS `commentaire_usager`, `emprunt_vue`.`ouvrage_numero_ouvrage` AS `ouvrage_numero_ouvrage`, `emprunt_vue`.`titre_ouvrage` AS `titre_ouvrage`, `emprunt_vue`.`langue` AS `langue`, `emprunt_vue`.`ouvrage_numero_bibliotheque` AS `ouvrage_numero_bibliotheque`, `emprunt_vue`.`numero_auteur` AS `numero_auteur`, `emprunt_vue`.`commentaire_ouvrage` AS `commentaire_ouvrage` FROM (`retour` join `emprunt_vue` on((`retour`.`numero_emprunt` = `emprunt_vue`.`emprunt_numero_emprunt`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `transfert_vue`
--
DROP TABLE IF EXISTS `transfert_vue`;

DROP VIEW IF EXISTS `transfert_vue`;
CREATE ALGORITHM=UNDEFINED DEFINER=`user_bibliotheque`@`localhost` SQL SECURITY DEFINER VIEW `transfert_vue`  AS SELECT `t`.`numero_transfert` AS `numero_transfert`, `t`.`numero_bibliotheque_origine` AS `numero_bibliotheque_origine_transfert`, `t`.`numero_bibliotheque_cible` AS `numero_bibliotheque_cible_transfert`, `t`.`date_transfert` AS `date_transfert`, `t`.`commentaire` AS `transfert_commentaire`, `t`.`numero_ouvrage` AS `numero_ouvrage`, `b_origine`.`numero_bibliotheque` AS `numero_bibliotheque_origine`, `b_origine`.`ville_bibliotheque` AS `ville_bibliotheque_origine`, `b_origine`.`commentaire` AS `commentaire_bibliotheque_origine`, `b_cible`.`numero_bibliotheque` AS `numero_bibliotheque_cible`, `b_cible`.`ville_bibliotheque` AS `ville_bibliotheque_cible`, `b_cible`.`commentaire` AS `commentaire_bibliotheque_cible` FROM ((`transfert` `t` join `bibliotheque` `b_origine` on((`t`.`numero_bibliotheque_origine` = `b_origine`.`numero_bibliotheque`))) join `bibliotheque` `b_cible` on((`t`.`numero_bibliotheque_cible` = `b_cible`.`numero_bibliotheque`))) ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
