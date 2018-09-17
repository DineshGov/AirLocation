-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Lun 16 Avril 2018 à 12:57
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `airlocation`
--
DROP DATABASE IF EXISTS `airlocation`;
CREATE DATABASE IF NOT EXISTS `airlocation` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `airlocation`;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `idUser` smallint(3) NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_owner` boolean NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `idUser` (`idUser`);

  
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `idUser` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

  
  
--
-- Structure de la table logements
--

drop table if exists `logements`;
create table `logements`(
	`idLogement` smallint(3),
	`ville` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
	`dateArr` date,
	`dateDep` date,
	`capacité` smallint(3) NOT NULL,
	`idProprio` smallint(3) NOT NULL,
	`longitude` float,
	`latitude` float,
	`typeLogement` varchar (25),
	`prix` float,
	`description` text,
	`nomLogement` varchar(100)
)ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
--	Propriétés de la table logements
--
alter table `logements`
	add primary key(`idLogement`),
	add unique key(`idLogement`),
	add foreign key (`idProprio`) references `users` (`idUser`) on delete cascade;

	
--
-- structure de la table reservations
--

drop table if exists `reservations`;
create table reservations(
	`idLogement` smallint(3) NOT NULL,
	`idUser` smallint(3) NOT NULL,
	`nbVoyageur` integer NOT NULL,
	`dateArr` date,
	`dateDep` date
)ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


--
--	Propriétés de la table reservations
--
alter table `reservations`
	add primary key(`idLogement`,`idUser`),
	add unique key(`idLogement`,`idUser`),	
	add foreign key (`idLogement`) references `logements` (`idLogement`) on delete cascade,
	add foreign key (`idUser`) references `users` (`idUser`) on delete cascade;