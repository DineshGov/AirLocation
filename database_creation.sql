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
  `id` smallint(3) NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nom` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `prenom` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `is_owner` boolean NOT NULL 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `questionnaires`
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
