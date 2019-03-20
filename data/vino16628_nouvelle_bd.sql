-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 20 mars 2019 à 03:55
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `vino16628`
--

-- --------------------------------------------------------

--
-- Structure de la table `vino_bouteille`
--

DROP TABLE IF EXISTS `vino_bouteille`;
CREATE TABLE IF NOT EXISTS `vino_bouteille` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `code_saq` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prix_saq` float DEFAULT NULL,
  `url_saq` varchar(200) DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `format` varchar(20) DEFAULT NULL,
  `garde_jusqua` varchar(200) DEFAULT NULL,
  `millesime` int(11) DEFAULT NULL,
  `type_id` int(11) UNSIGNED NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `date_achat` date DEFAULT NULL,
  `notes` varchar(200) DEFAULT NULL,
  `cellier_id` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  KEY `cellier_id` (`cellier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vino_bouteille`
--

INSERT INTO `vino_bouteille` (`id`, `nom`, `image`, `code_saq`, `pays`, `description`, `prix_saq`, `url_saq`, `url_img`, `format`, `garde_jusqua`, `millesime`, `type_id`, `quantite`, `date_achat`, `notes`, `cellier_id`) VALUES
(1, 'Borsao Seleccion', '//s7d9.scene7.com/is/image/SAQ/10324623_is?$saq-rech-prod-gril$', '10324623', 'Espagne', 'Vin rouge                           Espagne, 750 ml                  Code SAQ : 10324623', 11, 'https://www.saq.com/page/fr/saqcom/vin-rouge/borsao-seleccion/10324623', '//s7d9.scene7.com/is/image/SAQ/10324623_is?$saq-rech-prod-gril$', ' 750 ml', '2019-11-16', 1999, 1, 10, '2019-01-16', '', 1),
(2, 'Monasterio de Las Vinas Gran Reserva', '//s7d9.scene7.com/is/image/SAQ/10359156_is?$saq-rech-prod-gril$', '10359156', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 10359156', 19, 'https://www.saq.com/page/fr/saqcom/vin-rouge/monasterio-de-las-vinas-gran-reserva/10359156', '//s7d9.scene7.com/is/image/SAQ/10359156_is?$saq-rech-prod-gril$', ' 750 ml', '2019-10-14', 2000, 1, 12, '2019-01-16', NULL, 1),
(3, 'Castano Hecula', '//s7d9.scene7.com/is/image/SAQ/11676671_is?$saq-rech-prod-gril$', '11676671', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 11676671', 12, 'https://www.saq.com/page/fr/saqcom/vin-rouge/castano-hecula/11676671', '//s7d9.scene7.com/is/image/SAQ/11676671_is?$saq-rech-prod-gril$', ' 750 ml', '2019-08-15', 2001, 1, 11, '2019-01-16', NULL, 1),
(4, 'Campo Viejo Tempranillo Rioja', '//s7d9.scene7.com/is/image/SAQ/11462446_is?$saq-rech-prod-gril$', '11462446', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 11462446', 14, 'https://www.saq.com/page/fr/saqcom/vin-rouge/campo-viejo-tempranillo-rioja/11462446', '//s7d9.scene7.com/is/image/SAQ/11462446_is?$saq-rech-prod-gril$', ' 750 ml', '2020-02-22', 1987, 1, 11, '2019-01-16', NULL, 1),
(5, 'Bodegas Atalaya Laya 2017', '//s7d9.scene7.com/is/image/SAQ/12375942_is?$saq-rech-prod-gril$', '12375942', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12375942', 17, 'https://www.saq.com/page/fr/saqcom/vin-rouge/bodegas-atalaya-laya-2017/12375942', '//s7d9.scene7.com/is/image/SAQ/12375942_is?$saq-rech-prod-gril$', ' 750 ml', '2020-11-10', 2010, 1, 11, '2019-01-16', NULL, 1),
(6, 'Vin Vault Pinot Grigio', '//s7d9.scene7.com/is/image/SAQ/13467048_is?$saq-rech-prod-gril$', '13467048', 'États-Unis', 'Vin blanc\r\n         \r\n      \r\n      \r\n      États-Unis, 3 L\r\n      \r\n      \r\n      Code SAQ : 13467048', NULL, 'https://www.saq.com/page/fr/saqcom/vin-blanc/vin-vault-pinot-grigio/13467048', '//s7d9.scene7.com/is/image/SAQ/13467048_is?$saq-rech-prod-gril$', ' 3 L', '2019-12-14', 2015, 2, 11, '2019-01-16', NULL, 2),
(7, 'Huber Riesling Engelsberg 2017', '//s7d9.scene7.com/is/image/SAQ/13675841_is?$saq-rech-prod-gril$', '13675841', 'Autriche', 'Vin blanc\r\n         \r\n      \r\n      \r\n      Autriche, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13675841', 22, 'https://www.saq.com/page/fr/saqcom/vin-blanc/huber-riesling-engelsberg-2017/13675841', '//s7d9.scene7.com/is/image/SAQ/13675841_is?$saq-rech-prod-gril$', ' 750 ml', '2019-06-26', 2008, 2, 11, '2019-01-16', NULL, 2),
(8, 'Dominio de Tares Estay Castilla y Léon 2015', '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$', '13802571', 'Espagne', 'Vin rouge\r\n         \r\n      \r\n      \r\n      Espagne, 750 ml\r\n      \r\n      \r\n      Code SAQ : 13802571', 18, 'https://www.saq.com/page/fr/saqcom/vin-rouge/dominio-de-tares-estay-castilla-y-leon-2015/13802571', '//s7d9.scene7.com/is/image/SAQ/13802571_is?$saq-rech-prod-gril$', ' 750 ml', '2019-05-23', 2003, 1, 11, '2019-01-16', NULL, 2),
(9, 'Tessellae Old Vines Côtes du Roussillon 2016', '//s7d9.scene7.com/is/image/SAQ/12216562_is?$saq-rech-prod-gril$', '12216562', 'France', 'Vin rouge\r\n         \r\n      \r\n      \r\n      France, 750 ml\r\n      \r\n      \r\n      Code SAQ : 12216562', 21, 'https://www.saq.com/page/fr/saqcom/vin-rouge/tessellae-old-vines-cotes-du-roussillon-2016/12216562', '//s7d9.scene7.com/is/image/SAQ/12216562_is?$saq-rech-prod-gril$', ' 750 ml', '2019-07-26', 2008, 1, 11, '2019-01-16', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `vino_cellier`
--

DROP TABLE IF EXISTS `vino_cellier`;
CREATE TABLE IF NOT EXISTS `vino_cellier` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `usager_id` smallint(5) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usager_id` (`usager_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vino_cellier`
--

INSERT INTO `vino_cellier` (`id`, `nom`, `usager_id`) VALUES
(1, 'Cellier Tim', 4),
(2, 'Cellier Din', 2),
(3, 'Cellier Tim Chalet', 4),
(4, 'Cellier Campagne', 4),
(6, 'Cellier Nord', 4),
(8, 'test', 4);

-- --------------------------------------------------------

--
-- Structure de la table `vino_saq`
--

DROP TABLE IF EXISTS `vino_saq`;
CREATE TABLE IF NOT EXISTS `vino_saq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `code_saq` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prix_saq` float DEFAULT NULL,
  `url_saq` varchar(200) DEFAULT NULL,
  `url_img` varchar(200) DEFAULT NULL,
  `format` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vino_type`
--

DROP TABLE IF EXISTS `vino_type`;
CREATE TABLE IF NOT EXISTS `vino_type` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vino_type`
--

INSERT INTO `vino_type` (`id`, `type`) VALUES
(1, 'Vin rouge'),
(2, 'Vin blanc');

-- --------------------------------------------------------

--
-- Structure de la table `vino_usagers`
--

DROP TABLE IF EXISTS `vino_usagers`;
CREATE TABLE IF NOT EXISTS `vino_usagers` (
  `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(255) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `admin` varchar(3) NOT NULL DEFAULT 'non',
   PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vino_usagers`
--

INSERT INTO `vino_usagers` (`id`, `username`, `password`, `nom`, `prenom`, `admin`) VALUES
(1, 'Ivan', '202cb962ac59075b964b07152d234b70', 'Trembley', 'Ivan', 'non'),
(2, 'Din', 'caf1a3dfb505ffed0d024130f58c5cfa', 'Krol', 'Alex', 'oui'),
(3, 'Bob', '68053af2923e00204c3ca7c6a3150cf7', 'Dil', 'Mohamed', 'non'),
(4, 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'Tim', 'Elena', 'oui');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `vino_bouteille`
--
ALTER TABLE `vino_bouteille`
  ADD CONSTRAINT `vino_bouteille_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `vino_type` (`id`),
  ADD CONSTRAINT `vino_bouteille_ibfk_2` FOREIGN KEY (`cellier_id`) REFERENCES `vino_cellier` (`id`);

--
-- Contraintes pour la table `vino_cellier`
--
ALTER TABLE `vino_cellier`
  ADD CONSTRAINT `vino_cellier_ibfk_1` FOREIGN KEY (`usager_id`) REFERENCES `vino_usagers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
