-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 19 sep. 2018 à 07:14
-- Version du serveur :  5.7.21
-- Version de PHP :  7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--



CREATE TABLE IF NOT EXISTS `users` (
  `idUser` smallint(6) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_owner` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `idUser` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;



CREATE TABLE IF NOT EXISTS `logements` (
  `idLogement` smallint(3) NOT NULL,
  `ville` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `dateArr` date DEFAULT NULL,
  `dateDep` date DEFAULT NULL,
  `capacite` smallint(3) NOT NULL,
  `idProprio` smallint(3) NOT NULL,
  `longitude` float DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `typeLogement` varchar(25) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `description` text,
  `nomLogement` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idLogement`),
  UNIQUE KEY `idLogement` (`idLogement`),
  KEY `idProprio` (`idProprio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--


CREATE TABLE IF NOT EXISTS `reservations` (
  `idLogement` smallint(3) NOT NULL,
  `idUser` smallint(3) NOT NULL,
  `nbVoyageur` int(11) NOT NULL,
  `dateArr` date DEFAULT NULL,
  `dateDep` date DEFAULT NULL,
  PRIMARY KEY (`idLogement`,`idUser`),
  UNIQUE KEY `idLogement` (`idLogement`,`idUser`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


--
-- Déchargement des données de la table `users`
--





--
-- Déchargement des données de la table `logements`
--




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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `users` (`idUser`, `login`, `password`, `nom`, `prenom`, `is_owner`) VALUES
(1, 'slim', 'azerty', 'kouba', 'slimane', 1);


INSERT INTO `logements` (`idLogement`, `ville`, `dateArr`, `dateDep`, `capacite`, `idProprio`, `longitude`, `latitude`, `typeLogement`, `prix`, `description`, `nomLogement`) VALUES
(1, 'Paris', '2018-09-18', '2018-09-30', 4, 1, 2.26562, 48.8318, 'appartement', 61, 'L\'INTER-HOTEL PARISIANA à Paris jouit d\'un emplacement privilégié : situé dans un quartier populaire et vivant aux portes du 9ème arrondissement et à seulement 15 minutes de l\'Opéra Garnier. Il vous permet d\'accéder à tous les endroits de Paris ainsi qu\'aux nombreux points d\'intérêt de la capitale. ', 'Hôtel Parisiana'),
(2, 'Paris', '2018-09-18', '2018-09-30', 4, 1, 2.32578, 48.8845, 'appartement', 89, 'L\'équipe de l\'Ibis Paris Montmartre 18ème vous accueille à l\'entrée d\'un lieu enchanteur. Prenez le temps de flâner dans les rues de la Butte Montmartre vers le Sacré Coeur. Ou pour une vie nocturne animée, découvrez Pigalle et son fameux Moulin Rouge.', 'Hôtel Montmartre'),
(3,"Pantin","2018-05-27","2018-05-28",5,1,2.403295,48.891094,"hotel",50.5,"un hotel à pantin","Pantin"),
(4,"Lille","2018-05-27","2018-05-28",5,1,3.069272,50.636186,"hotel",50.5,"un hotel à lille","Lille");