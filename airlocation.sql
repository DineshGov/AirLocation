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

