-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 avr. 2024 à 08:00
-- Version du serveur : 8.0.31
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bibliotheque_table`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

DROP TABLE IF EXISTS `auteur`;
CREATE TABLE IF NOT EXISTS `auteur` (
  `numero_auteur` int NOT NULL AUTO_INCREMENT,
  `nom_auteur` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom_auteur` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_auteur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `bibliotheque`
--

DROP TABLE IF EXISTS `bibliotheque`;
CREATE TABLE IF NOT EXISTS `bibliotheque` (
  `numero_bibliotheque` int NOT NULL AUTO_INCREMENT,
  `ville_bibliotheque` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_bibliotheque`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `commentaire` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_emprunt`),
  KEY `numero_ouvrage` (`numero_ouvrage`),
  KEY `numero_usager` (`numero_usager`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ouvrage`
--

DROP TABLE IF EXISTS `ouvrage`;
CREATE TABLE IF NOT EXISTS `ouvrage` (
  `numero_ouvrage` int NOT NULL AUTO_INCREMENT,
  `titre_ouvrage` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `langue` varchar(2) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero_bibliotheque` int DEFAULT NULL,
  `numero_auteur` int DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_ouvrage`),
  KEY `numero_bibliotheque` (`numero_bibliotheque`),
  KEY `numero_auteur` (`numero_auteur`)
) ;

-- --------------------------------------------------------

--
-- Structure de la table `retour`
--

DROP TABLE IF EXISTS `retour`;
CREATE TABLE IF NOT EXISTS `retour` (
  `numero_retour` int NOT NULL AUTO_INCREMENT,
  `numero_emprunt` int DEFAULT NULL,
  `date_retour` date DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_retour`),
  KEY `numero_emprunt` (`numero_emprunt`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `commentaire` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_transfert`),
  KEY `numero_bibliotheque_origine` (`numero_bibliotheque_origine`),
  KEY `numero_bibliotheque_cible` (`numero_bibliotheque_cible`),
  KEY `numero_ouvrage` (`numero_ouvrage`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `usager`
--

DROP TABLE IF EXISTS `usager`;
CREATE TABLE IF NOT EXISTS `usager` (
  `numero_usager` int NOT NULL AUTO_INCREMENT,
  `nom_usager` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prenom_usager` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ville_usager` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `numero_bibliotheque` int DEFAULT NULL,
  `commentaire` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`numero_usager`),
  KEY `numero_bibliotheque` (`numero_bibliotheque`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
