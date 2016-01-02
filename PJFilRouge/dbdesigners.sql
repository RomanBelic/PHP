-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Sam 02 Janvier 2016 à 12:31
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `dbdesigners`
--
CREATE DATABASE IF NOT EXISTS dbdesigners;
--
USE dbdesigners;
-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE IF NOT EXISTS `annonce` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Libelle` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Date` date NOT NULL,
  `idUser` int(11) NOT NULL,
  `Prix` float NOT NULL,
  `LogoAdress` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `annonce`
--

INSERT INTO `annonce` (`id`, `Libelle`, `Description`, `Date`, `idUser`, `Prix`, `LogoAdress`) VALUES
(1, 'Annonce 1', 'Creation d''un site de commerce online', '2015-12-31', 5, 100, 'logo1.jpg'),
(3, 'Annonce 2', 'Creation d''un logo', '2015-12-30', 1, 50, 'logo2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `login` varchar(250) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  `idUser` int(11) NOT NULL,
  PRIMARY KEY (`login`),
  UNIQUE KEY `login` (`login`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `userdata`
--

INSERT INTO `userdata` (`login`, `mdp`, `idUser`) VALUES
('test1', 'mdp', 1),
('test2', 'mdp', 2),
('test3', 'mdp', 3),
('test4', 'mdp', 4),
('test5', 'mdp', 5),
('test6', 'mdp', 6);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(250) NOT NULL,
  `Prenom` varchar(250) NOT NULL,
  `userType` int(11) NOT NULL,
  `Contact` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Site` varchar(250) NOT NULL,
  `DateInscription` date NOT NULL,
  `LogoAdress` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`),
  KEY `userType` (`userType`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `Nom`, `Prenom`, `userType`, `Contact`, `Description`, `Site`, `DateInscription`, `LogoAdress`) VALUES
(1, 'Cailot', 'Roch ', 2, 'test2', 'asasad', 'test3', '2015-12-31', 'test1.jpg'),
(2, 'Brodeur', 'Rabican ', 2, 'RabicanBrodeur@teleworm.us ', '', '', '2015-12-31', 'test2.jpg'),
(3, 'Jodoin', 'Troy', 2, 'TroyJodoin@jourrapide.com ', '', '', '2015-12-31', 'test3.jpg'),
(4, 'Abril', 'Jérôme ', 2, 'JeromeAbril@teleworm.us ', '', '', '2015-12-31', 'test5.jpg'),
(5, '! Osmotik', '', 1, 'http://www.osmotik.fr', 'Design graphique / Design management / Packaging', 'http://www.osmotik.fr', '2015-12-31', 'test6.jpg'),
(6, 'Agence Benjamin Robert', '', 1, 'agence.b.robert@gmail.com', 'Architecture commerciale / Architecture d''intérieur / Design industriel', 'http://www.adrianducerf-mobilier.com', '2015-12-31', 'test4.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
  `id` int(11) NOT NULL,
  `Libelle` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `usertype`
--

INSERT INTO `usertype` (`id`, `Libelle`) VALUES
(1, 'Designer'),
(2, 'Visiteur');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `fk_idUser` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `userdata`
--
ALTER TABLE `userdata`
  ADD CONSTRAINT `fk_idUser2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_UserType` FOREIGN KEY (`userType`) REFERENCES `usertype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
