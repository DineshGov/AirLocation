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


INSERT INTO `users` (`idUser`, `login`, `password`, `nom`, `prenom`, `is_owner`) VALUES(1, 'Dinesh', 'ab4f63f9ac65152575886860dde480a1', 'Govind', 'Dinesh', 1);
INSERT INTO `users` (`idUser`, `login`, `password`, `nom`, `prenom`, `is_owner`) VALUES(2, 'Assan', 'ab4f63f9ac65152575886860dde480a1', 'Diomande', 'Assan', 1);
INSERT INTO `users` (`idUser`, `login`, `password`, `nom`, `prenom`, `is_owner`) VALUES(3, 'Slimane', 'ab4f63f9ac65152575886860dde480a1', 'Kouba', 'Slimane', 1);
INSERT INTO `users` (`idUser`, `login`, `password`, `nom`, `prenom`, `is_owner`) VALUES(4, 'JohnCena', '7682fe272099ea26efe39c890b33675b', 'Cena', 'John', 0);
INSERT INTO `users` (`idUser`, `login`, `password`, `nom`, `prenom`, `is_owner`) VALUES(5, 'Sangoku', '7682fe272099ea26efe39c890b33675b', 'Sensei', 'Sangoku', 0);
INSERT INTO `users` (`idUser`, `login`, `password`, `nom`, `prenom`, `is_owner`) VALUES(6, 'Naruto', '7682fe272099ea26efe39c890b33675b', 'Uzumaki', 'Naruto', 0);

INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(1, 1, 'Drancy', '2018-10-01', '2018-11-30', 10, 2.44624, 48.9227, 'Pavillon', 110, 'Grand pavillon situé en plein centre en face du parc Ladoucette.', 'Pavillon en plein centre ville');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(2, 1, 'Limoges', '2018-09-01', '2019-02-28', 2, 1.26479, 45.8357, 'Cabane', 10, 'Cabane située sur un arbre dans le parc en face de la gare de Limoges.', 'Cabane en bois');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(3, 1, 'Paris', '2018-10-01', '2019-08-30', 10, 2.3361, 48.867, 'Appartement', 1150, 'Très grand appartement très spacieux', 'Grand appartement en plein coeur de Paris');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(4, 1, 'Paris', '2018-09-21', '2018-09-30', 3, 2.29886, 48.8555, 'Tente', 12, 'Tente oubliée par un touriste', 'Tente sur le Champ de Mars');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(5, 2, 'Pantin', '2018-09-22', '2019-05-31', 6, 2.3988, 48.8919, 'Appartement', 130, 'Duplex situé en face d\'un stade', 'Duplex situé en face d\'un stade');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(6, 2, 'Paris', '2018-09-18', '2018-09-30', 4, 2.26562, 48.8318, 'appartement', 61, 'L\'INTER-HOTEL PARISIANA à Paris jouit d\'un emplacement privilégié : situé dans un quartier populaire et vivant aux portes du 9ème arrondissement et à seulement 15 minutes de l\'Opéra Garnier. Il vous permet d\'accéder à tous les endroits de Paris ainsi qu\'aux nombreux points d\'intérêt de la capitale. ', 'Hôtel Parisiana');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(7, 2, 'Pantin', '2018-05-27', '2018-05-28', 5, 2.4033, 48.8911, 'hotel', 50.5, 'un hotel à pantin', 'Pantin');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(8, 2, 'Lille', '2018-05-27', '2018-05-28', 5, 3.06927, 50.6362, 'hotel', 50.5, 'un hotel à lille', 'Lille');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(9, 3, 'Gonesse', '2018-05-27', '2018-05-28', 5, 2.46019, 48.9796, 'hotel', 50.5, 'un hotel à gonesse', 'Gonesse');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(10, 3, 'Marseille', '2018-05-27', '2018-05-28', 5, 5.37159, 43.312, 'hotel', 50.5, 'un hotel à marseille', 'Marseille');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(11, 3, 'Paris', '2018-09-22', '2019-08-31', 6, 2.30592, 48.8475, 'Appartement', 200, 'L\'équipe de l\'Ibis Paris Montmartre 18ème vous accueille à l\'entrée d\'un lieu enchanteur. Prenez le temps de flâner dans les rues de la Butte Montmartre vers le Sacré Coeur. Ou pour une vie nocturne animée, découvrez Pigalle et son fameux Moulin Rouge.', 'Hôtel Montmartre');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(12, 3, 'Paris', '2018-09-22', '2021-09-22', 10, 2.25098, 48.8658, 'Cabane', 3400, 'Cabane', 'Cabane');
INSERT INTO `logements` (`idLogement`, `idProprio`, `ville`, `dateArr`, `dateDep`, `capacite`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES(13, 3, 'Paris', '2018-09-22', '2018-10-12', 6, 2.39589, 48.8484, 'Pavillon', 130, 'Très grand pavillon très spacieux', 'Pavillon en plein centre ville');

INSERT INTO `reservations` (`idUser`, `idLogement`, `nbrVoyageur`, `dateArr`, `dateDep`) VALUES(5, 12, 2, '2018-09-22', '2018-09-28');
INSERT INTO `reservations` (`idUser`, `idLogement`, `nbrVoyageur`, `dateArr`, `dateDep`) VALUES(5, 1, 3, '2018-10-08', '2018-10-10');
INSERT INTO `reservations` (`idUser`, `idLogement`, `nbrVoyageur`, `dateArr`, `dateDep`) VALUES(6, 5, 2, '2018-10-16', '2018-10-17');
