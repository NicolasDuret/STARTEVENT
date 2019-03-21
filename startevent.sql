-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 21 mars 2019 à 09:07
-- Version du serveur :  5.7.23
-- Version de PHP :  7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `startevent`
--

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `event`
--

INSERT INTO `event` (`id`, `titre`, `description`) VALUES
(53, 'shdeyfb', 'eufhrugnthitnh ujruhnrubgevubgutrbhu'),
(52, 'Anniversaire Arnaud', 'Anniversaire Arnaud au camping'),
(51, 'Exemple', 'Repas de famille');

-- --------------------------------------------------------

--
-- Structure de la table `personnes`
--

DROP TABLE IF EXISTS `personnes`;
CREATE TABLE IF NOT EXISTS `personnes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) CHARACTER SET latin1 NOT NULL,
  `description` text CHARACTER SET latin1,
  `versement` int(11) NOT NULL,
  `difference` int(11) DEFAULT NULL,
  `idEvent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnes`
--

INSERT INTO `personnes` (`id`, `prenom`, `description`, `versement`, `difference`, `idEvent`) VALUES
(2, 'Maman', 'boissons', 20, NULL, 51),
(3, 'Arnaud', 'gateaux', 30, NULL, 51),
(4, 'Nathalie', 'fleurs', 15, NULL, 51),
(5, 'papa', 'alcool', 50, NULL, 51),
(6, 'Kenny', 'boissons', 20, NULL, 52),
(7, 'Arnaud', 'apero', 24, NULL, 52),
(8, 'Maxime', 'gateaux', 32, NULL, 52),
(9, 'Gusgus', 'boissons', 11, NULL, 53),
(10, 'nfue', 'zfz', 55, NULL, 53);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
