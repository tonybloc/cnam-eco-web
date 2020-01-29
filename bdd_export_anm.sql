-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 29 jan. 2020 à 21:26
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db-demo-shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `user_tab`
--

DROP TABLE IF EXISTS `user_tab`;
CREATE TABLE IF NOT EXISTS `user_tab` (
  `UserId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant',
  `FirstName` varchar(92) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Prénom',
  `LastName` varchar(92) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nom',
  `Password` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mot de passe',
  `Email` varchar(64) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Adresse mail',
  `Phone` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Numéro de téléphone',
  `StreetNo` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Numéro de rue',
  `StreetName` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nom de rue',
  `City` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ville',
  `PostalCode` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Code postal',
  `Country` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Pays',
  `RoleId` int(10) UNSIGNED DEFAULT NULL COMMENT 'Identifiant du rôle',
  `Genre` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UNIQUE_EMAIL` (`Email`) USING BTREE,
  KEY `FK_USER_ROLE` (`RoleId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Utilisateur';

--
-- Déchargement des données de la table `user_tab`
--

INSERT INTO `user_tab` (`UserId`, `FirstName`, `LastName`, `Password`, `Email`, `Phone`, `StreetNo`, `StreetName`, `City`, `PostalCode`, `Country`, `RoleId`, `Genre`) VALUES
(9, 'Anthony', 'MOCHEL', '$2y$10$DgXxKNBnbOFU5Nq2acqcLOc1k3EiqJR5odRnPqNrGxTaKU1h2thuq', 'ei@ei.feo', '0638493728', 'ad', 'azd', 'EA', 'azd', 'ALLEMAGNE', 3001, 'Homme'),
(10, 'Jean', 'MOCHEL', '$2y$10$0YI8mwbL4hNY1UOImS5XN.8NLlktZ9HPI7iMDSXvArjKkRRxiFsX.', 'jean@moch.com', '0638493728', 'ad', 'azd', 'ea', 'azd', 'Allemagne', 3001, 'Homme'),
(11, 'Jean', 'DUPONT', '$2y$10$88JR54Ga.O/L/PScIqwxmeZUWLCDEHqMiOR/rFEnZh8WDk5N5dUvi', 'jean.dup@cfai-formation.fr', '0694832718', '1A', 'Rue du moulin', 'STRASBOURG', '67115', 'FRANCE', 3001, 'Homme'),
(13, 'Carole', 'TRESER', '$2y$10$fGOiwaR0VWnt.fsRc/duneY639lRmxrMnvLA/CcOFuzU4UGz9FqXi', 'ctreser@cfai-formation.fr', '0698473626', '3', 'Impasse des lyla', 'STRASBOURG', '67000', 'Allemagne', 3001, 'Femme');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `user_tab`
--
ALTER TABLE `user_tab`
  ADD CONSTRAINT `FK_USER_ROLE` FOREIGN KEY (`RoleId`) REFERENCES `role_tab` (`Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
