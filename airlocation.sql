-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  mer. 19 sep. 2018 à 19:18
-- Version du serveur :  5.7.23
-- Version de PHP :  7.1.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `airlocation`
--
DROP DATABASE `airlocation`;
CREATE DATABASE IF NOT EXISTS `airlocation` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `airlocation`;

-- --------------------------------------------------------

--
-- Structure de la table `logements`
--

DROP TABLE IF EXISTS `logements`;
CREATE TABLE IF NOT EXISTS `logements` (
  `idLogement` smallint(3) NOT NULL AUTO_INCREMENT,
  `idProprio` smallint(3) NOT NULL,
  `ville` varchar(100) COLLATE utf8_bin NOT NULL,
  `dateArr` date NOT NULL,
  `dateDep` date NOT NULL,
  `capacite` smallint(3) NOT NULL,
  `longitude` float NOT NULL,
  `latitude` float NOT NULL,
  `typeLogement` varchar(50) COLLATE utf8_bin NOT NULL,
  `prix` float NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `nomLogement` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idLogement`,`idProprio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `idUser` smallint(3) NOT NULL,
  `idLogement` smallint(3) NOT NULL,
  `nbrVoyageur` int(11) NOT NULL,
  `dateArr` date NOT NULL,
  `dateDep` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idUser` smallint(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(100) COLLATE utf8_bin NOT NULL,
  `nom` varchar(100) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(100) COLLATE utf8_bin NOT NULL,
  `is_owner` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `logements`
--
ALTER TABLE `logements`
  ADD CONSTRAINT `logements_ibfk_1` FOREIGN KEY (`idProprio`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

--
-- Contraintes pour la table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`idLogement`) REFERENCES `logements` (`idLogement`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;

INSERT INTO `users` (`idUser`, `login`, `password`, `nom`, `prenom`, `is_owner`) VALUES
(1, 'azerty', 'ab4f63f9ac65152575886860dde480a1', 'azerty', 'azerty', 1);

INSERT INTO `logements` (`idLogement`, `ville`, `dateArr`, `dateDep`, `capacite`, `idProprio`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES
(1, 'Paris', '2018-09-18', '2018-09-30', 4, 1, 2.26562, 48.8318, 'appartement', 61, 'L\'INTER-HOTEL PARISIANA à Paris jouit d\'un emplacement privilégié : situé dans un quartier populaire et vivant aux portes du 9ème arrondissement et à seulement 15 minutes de l\'Opéra Garnier. Il vous permet d\'accéder à tous les endroits de Paris ainsi qu\'aux nombreux points d\'intérêt de la capitale. ', 'Hôtel Parisiana'),
(2, 'Paris', '2018-09-18', '2018-09-30', 4, 1, 2.32578, 48.8845, 'appartement', 89, 'L\'équipe de l\'Ibis Paris Montmartre 18ème vous accueille à l\'entrée d\'un lieu enchanteur. Prenez le temps de flâner dans les rues de la Butte Montmartre vers le Sacré Coeur. Ou pour une vie nocturne animée, découvrez Pigalle et son fameux Moulin Rouge.', 'Hôtel Montmartre'),
(3,"Pantin","2018-05-27","2018-05-28",5,1,2.403295,48.891094,"hotel",50.5,"un hotel à pantin","Pantin"),
(4,"Lille","2018-05-27","2018-05-28",5,1,3.069272,50.636186,"hotel",50.5,"un hotel à lille","Lille"),
(5,"Gonesse","2018-05-27","2018-05-28",5,1,2.460192,48.979565,"hotel",50.5,"un hotel à gonesse","Gonesse"),
(6,"Marseille","2018-05-27","2018-05-28",5,1,5.371591,43.312007,"hotel",50.5,"un hotel à marseille","Marseille");

insert into reservations values(1,1,4,"2018-09-20","2018-09-22");
insert into reservations values(1,1,4,"2018-09-24","2018-09-26");
