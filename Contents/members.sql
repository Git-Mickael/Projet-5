-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 24 jan. 2020 à 14:44
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
-- Base de données :  `projet_5`
--

-- --------------------------------------------------------

--
-- Structure de la table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id_Members` int(11) NOT NULL AUTO_INCREMENT,
  `Name_Members` varchar(255) NOT NULL,
  `Surname_Members` varchar(255) NOT NULL,
  `Password_Members` varchar(255) NOT NULL,
  `Email_Members` varchar(255) NOT NULL,
  `Phone_Members` int(11) NOT NULL,
  PRIMARY KEY (`id_Members`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `members`
--

INSERT INTO `members` (`id_Members`, `Name_Members`, `Surname_Members`, `Password_Members`, `Email_Members`, `Phone_Members`) VALUES
(1, 'Jean', 'Forteroche', 'chien', 'o@yo.com', 15262222),
(2, 'miky', 'mike', 'chat', 'test@aaa.com', 6203040);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
