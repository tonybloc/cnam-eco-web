-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 29 jan. 2020 à 22:03
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
-- Structure de la table `brand_tab`
--

DROP TABLE IF EXISTS `brand_tab`;
CREATE TABLE IF NOT EXISTS `brand_tab` (
  `No` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la marque',
  `Name` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nom de la marque',
  `Description` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Description de la marque',
  `Logo` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Logo',
  PRIMARY KEY (`No`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `brand_tab`
--

INSERT INTO `brand_tab` (`No`, `Name`, `Description`, `Logo`) VALUES
(1, 'CHANEL', 'Fournisseur de montre', ''),
(2, 'GUCCI', 'Fournisseur de montre', ''),
(3, 'TAGHEUER', 'Fournisseur de Montre', ''),
(6, 'CARTIER', 'Fournisseur de montre', ''),
(7, 'HERMES', 'Fournisseur de montre', ''),
(8, 'ROLEX', 'Fournisseur de montre', '');

-- --------------------------------------------------------

--
-- Structure de la table `product_category_tab`
--

DROP TABLE IF EXISTS `product_category_tab`;
CREATE TABLE IF NOT EXISTS `product_category_tab` (
  `Code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Code de la catégorie',
  `Name` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nom de la catégorie',
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `product_category_tab`
--

INSERT INTO `product_category_tab` (`Code`, `Name`) VALUES
(1, 'HORLOGERIE');

-- --------------------------------------------------------

--
-- Structure de la table `product_subcategory_tab`
--

DROP TABLE IF EXISTS `product_subcategory_tab`;
CREATE TABLE IF NOT EXISTS `product_subcategory_tab` (
  `Code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Code sous catégorie',
  `ParentGroupCode` int(10) UNSIGNED DEFAULT NULL COMMENT 'Code de la catégorie',
  `Name` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nom de la sous catégorie',
  PRIMARY KEY (`Code`),
  KEY `FK_CATEGORY_SUBCATEGORY` (`ParentGroupCode`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Sous-catégorie de produit';

--
-- Déchargement des données de la table `product_subcategory_tab`
--

INSERT INTO `product_subcategory_tab` (`Code`, `ParentGroupCode`, `Name`) VALUES
(1, 1, 'MONTRE A GOUSSET'),
(2, 1, 'MONTRE SMART WATCH'),
(3, 1, 'MONTRE SPORTIF'),
(4, 1, 'MONTRE STANDARD');

-- --------------------------------------------------------

--
-- Structure de la table `product_tab`
--

DROP TABLE IF EXISTS `product_tab`;
CREATE TABLE IF NOT EXISTS `product_tab` (
  `Code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Code produit',
  `Reference` varchar(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Référence fournisseur',
  `BrandNo` int(10) UNSIGNED DEFAULT NULL COMMENT 'Identifiant de la marque',
  `CodeSubCategory` int(10) UNSIGNED DEFAULT NULL COMMENT 'Code sous catégorie',
  `Title` varchar(128) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Intitiulé',
  `Description` text COLLATE utf8_unicode_ci COMMENT 'Description',
  `UnitPrice` float NOT NULL COMMENT 'Prix de vente (unitaire)',
  `Picture` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'Image',
  `Gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Genre',
  PRIMARY KEY (`Code`),
  KEY `FK_PRODUCT_BRAND` (`BrandNo`),
  KEY `FK_PRODUCT_SUBCATEGORY` (`CodeSubCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `product_tab`
--

INSERT INTO `product_tab` (`Code`, `Reference`, `BrandNo`, `CodeSubCategory`, `Title`, `Description`, `UnitPrice`, `Picture`, `Gender`) VALUES
(1, 'H6359', 1, 4, 'MONTRE PREMIÈRE ROCK', 'La montre Première évoque par son boîtier le design octogonal de la Place Vendôme. Un symbole de perfection architecturale et d’intemporalité qui résonne avec la féminité de cette montre.', 4550, 'https://www.chanel.com/wfj/product/medias/montre-premiere-rock/H6359-default-0-1540-grey-nocrop-1573107151517.jpg', 'Femme'),
(2, 'H5584', 1, 4, 'MONTRE PREMIÈRE ROCK', 'La montre Première évoque par son boîtier le design octogonal de la Place Vendôme. Un symbole de perfection architecturale et d’intemporalité qui résonne avec la féminité de cette montre.', 299.39, 'https://www.chanel.com/wfj/product/medias/montre-premiere-rock/H5584-default-0-1540-grey-nocrop-1532062951600.jpg', 'Femme'),
(3, '559787 I86A0 8759', 2, 4, 'Montre G-timeless, 40mm', 'Issue de la collection G-Timeless, cette montre automatique possède un bracelet en cuir et un cadran guilloché. Divers motifs de la Maison – l’abeille, l’étoile et la tête de félin – sont représentés sur le cadran. Le fond de boîte transparent permet d’admirer le mouvement de la montre.', 1490, 'https://media.gucci.com/style/DarkGray_Center_0_0_800x800/1536943511/559787_I86A0_8759_001_100_0000_Light-Montre-G-Timeless-40mm.jpg', 'Femme'),
(4, '561661 I18V0 8489', 2, 4, 'Montre G-Timeless, 38mm', 'Cette montre automatique classique issue de la collection G-Timeless associe le design traditionnel avec des codes inspirés de la nouvelle esthétique de Gucci. Divers motifs de la Maison – l’abeille, le triangle et le cœur – sont représentés sur le cadran. Le fond de boîte transparent permet d’admirer le mouvement de la montre', 1350, 'https://media.gucci.com/style/DarkGray_Center_0_0_800x800/1579617004/561661_I18V0_8489_001_100_0000_Light-Montre-G-Timeless-38mm.jpg', 'Femme'),
(5, '561662 I86L0 8650', 2, 4, 'Montre G-Timeless, 38mm', 'Cette montre automatique classique issue de la collection G-Timeless associe le design traditionnel avec des codes inspirés de la nouvelle esthétique de Gucci. Divers motifs de la Maison – l’abeille, le triangle et le cœur – sont représentés sur le cadran. Le fond de boîte transparent permet d’admirer le mouvement de la montre.', 1490, 'https://media.gucci.com/style/DarkGray_Center_0_0_800x800/1579517104/561662_I86L0_8650_001_100_0000_Light-Montre-G-Timeless-38mm.jpg', 'Femme'),
(6, '‎532015 I18A0 8480', 2, 4, 'Montre Eryx, 40mm', 'Plusieurs siècles de travail ont été nécessaires aux maîtres horlogers pour concevoir le mouvement automatique qui se remonte grâce aux mouvements naturels du poignet du porteur. La technique décorative utilisée sur le cadran souligne l’attention minutieuse accordée aux détails.', 1800, 'https://media.gucci.com/style/DarkGray_Center_0_0_800x800/1520415020/532015_I18A0_8480_001_100_0000_Light-Montre-Eryx-40mm.jpg', 'Homme'),
(7, '532011 I18A0 8489', 2, 4, 'Montre Eryx, 40mm', 'Plusieurs siècles de travail ont été nécessaires aux maîtres horlogers pour concevoir le mouvement automatique qui se remonte grâce aux mouvements naturels du poignet du porteur. La technique décorative utilisée sur le cadran souligne l’attention minutieuse accordée aux détails', 1700, 'https://media.gucci.com/style/DarkGray_Center_0_0_800x800/1521054910/532011_I18A0_8489_001_100_0000_Light-Montre-Eryx-40mm.jpg', 'Homme'),
(8, '559817 I8610 8757', 2, 4, 'Montre Gucci Dive, 45mm', 'Pour la collection Croisière 2019, la montre Gucci Dive associe le style décontracté d’un bracelet en caoutchouc embossé du logo avec un symbole emblématique de la Maison, le serpent royal. Le motif reptilien est bordé par une boîte en PVD or jaune.', 1350, 'https://media.gucci.com/style/DarkGray_Center_0_0_800x800/1541774095/559817_I8610_8757_001_100_0000_Light-Montre-Gucci-Dive-45mm.jpg', 'Homme'),
(9, 'W045777WW00', 7, 4, 'Montre Carré H, 38x38mm', 'Montre en acier poli et microbillé, cadran noir, centre guilloché opalin, tour d\'heure grainé, périphérie opaline, 38 x 38 mm, mouvement de Manufacture Hermès H1912, bracelet court en veau Barénia noir', 5900, 'https://assets.hermes.com/is/image/hermesproduct/montre-carre-h-38-x-38mm--045777WW00-front-1-300-0-720-720_b.jpg', 'Homme'),
(10, 'W046459WW00', 7, 4, 'Montre Carré H, 38x38', 'Ajouter au panier\r\nDescription produit\r\nMontre en acier poli et microbillé, cadran anthracite, 38 x 38 mm, mouvement de Manufacture Hermès H1912, bracelet long en sangle gris et jaune', 5900, 'https://assets.hermes.com/is/image/hermesproduct/montre-carre-h-38x-38mm--046459WW00-front-1-300-0-720-720_b.jpg', 'Homme'),
(11, '126333', 8, 4, 'DATEJUST 41', 'Influencée par la Datejust originale, la Datejust 41 voit sa date s’afficher dans un guichet à 3 heures et changer instantanément. Inventée en 1953, la loupe Cyclope placée sur le verre agrandit la taille de la date pour une meilleure lisibilité.', 11650, 'https://images.rolex.com/2019/catalogue/images/upright-bba-with-shadow/m126333-0010.png?impolicy=upright-majesty', 'Homme'),
(12, '228239', 8, 4, 'DAY-DATE 40', 'Lorsqu’elle est dévoilée en 1956, la première génération de Day-Date constitue une première mondiale : elle est la première montre-bracelet à afficher le jour de la semaine en toutes lettres sur le cadran. Portée par les personnes influentes, la Day-Date présente un arc de cercle affichant la date qui est disponible dans un vaste choix de langues.', 34400, 'https://images.rolex.com/2019/catalogue/images/upright-bba-with-shadow/m228239-0033.png?impolicy=upright-majesty', 'Homme'),
(13, 'SBF818000.11FT8031', 3, 2, 'TAG HEUER CONNECTED MODULAR', NULL, 1300, 'https://www.tagheuer.com/sites/default/files/styles/product_block_header/public/2017-12/SBF818000-11FT8031-2_0.png?itok=_0x_-2YT', 'Homme'),
(14, 'SBF8A8013.82FT6110', 3, 2, 'TAG HEUER CONNECTED MODULAR', NULL, 2150, 'https://www.tagheuer.com/sites/default/files/styles/product_block_header/public/2017-10/TAG-Heuer-Connected-Modular-45-Smartwatch-SBF8A8013.82FT6110.png?itok=aDnpyuLa', 'Homme');

-- --------------------------------------------------------

--
-- Structure de la table `role_tab`
--

DROP TABLE IF EXISTS `role_tab`;
CREATE TABLE IF NOT EXISTS `role_tab` (
  `Code` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant du rôle',
  `Title` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Intitulé du rôle',
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB AUTO_INCREMENT=3004 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Rôle de l''utilisateur';

--
-- Déchargement des données de la table `role_tab`
--

INSERT INTO `role_tab` (`Code`, `Title`) VALUES
(3001, 'VISITOR'),
(3002, 'MANAGER'),
(3003, 'ADMIN');

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

-- --------------------------------------------------------

--
-- Structure de la table `watch_detail_tab`
--

DROP TABLE IF EXISTS `watch_detail_tab`;
CREATE TABLE IF NOT EXISTS `watch_detail_tab` (
  `Code` int(10) UNSIGNED NOT NULL COMMENT 'Code produit',
  `Description` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Description fournisseur',
  `Box` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Boitier',
  `Lugs` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Crown` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Courrone',
  `Strap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Bracelet',
  `Hands` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Aiguille',
  `Bezel` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Crystal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Dial` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Montres';

--
-- Déchargement des données de la table `watch_detail_tab`
--

INSERT INTO `watch_detail_tab` (`Code`, `Description`, `Box`, `Lugs`, `Crown`, `Strap`, `Hands`, `Bezel`, `Crystal`, `Dial`) VALUES
(1, 'Une description du fournisseur', 'ROND', NULL, 'UNE', NULL, 'EOSOOS', NULL, NULL, NULL),
(2, 'une description du meilleur fournisseur ', NULL, 'SDS', 'EOEOOE', NULL, NULL, 'SDSDA', NULL, 'AFQSDE'),
(3, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'Une description', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product_subcategory_tab`
--
ALTER TABLE `product_subcategory_tab`
  ADD CONSTRAINT `FK_CATEGORY_SUBCATEGORY` FOREIGN KEY (`ParentGroupCode`) REFERENCES `product_category_tab` (`Code`);

--
-- Contraintes pour la table `product_tab`
--
ALTER TABLE `product_tab`
  ADD CONSTRAINT `FK_PRODUCT_BRAND` FOREIGN KEY (`BrandNo`) REFERENCES `brand_tab` (`No`),
  ADD CONSTRAINT `FK_PRODUCT_SUBCATEGORY` FOREIGN KEY (`CodeSubCategory`) REFERENCES `product_subcategory_tab` (`Code`);

--
-- Contraintes pour la table `user_tab`
--
ALTER TABLE `user_tab`
  ADD CONSTRAINT `FK_USER_ROLE` FOREIGN KEY (`RoleId`) REFERENCES `role_tab` (`Code`);

--
-- Contraintes pour la table `watch_detail_tab`
--
ALTER TABLE `watch_detail_tab`
  ADD CONSTRAINT `FK_17D5DE06D7279FA6` FOREIGN KEY (`Code`) REFERENCES `product_tab` (`Code`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
