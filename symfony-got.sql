-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Octobre 2018 à 22:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `symfony-got`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `email`, `name`, `role`, `password`, `telephone`) VALUES
(2, 'jean@gmail.com', 'Jean', 'ROLE_USER', '$2y$13$uzd6DL57ZxZerCHgp9BQG.XkB0FyZauAuw2yzyeJuAUbW0sXMRMu.', '0154879644'),
(3, 'pierre@gmail.com', 'pierre', 'ROLE_USER', '$2y$13$ClbnnelJ79YqQWk/vnGKU.ukM/ohUExyTfxSh2DiD8GkkkgFVjVxG', '0548761255'),
(10, 'saida@gmail.com', 'saida', 'ROLE_USER', '$2y$13$59ax5hI/rbK5erQGtHs48OoXL/RRXrqZN.p75CBJQz9opOED7zqPS', '0671485915'),
(11, 'ahmed@gmail.com', 'AHMED', 'ROLE_ADMIN', '$2y$13$e23Y.fEJphmfil7zLWwXTOHWA.e1UV/ECGJ2wwMq2pNcLwZjI2EWG', '215444444'),
(12, 'anissa@gmail.com', 'ANISSA', 'ROLE_USER', '$2y$13$NL3cR2hcvnD0R/nkjiQwnOLUk5J4syHTZ6q2GdT6WY/ffEb2Lqvqm', '15488888');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
