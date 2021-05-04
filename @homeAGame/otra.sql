-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 04 mai 2021 à 12:23
-- Version du serveur :  5.7.31
-- Version de PHP : 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `otra`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(255) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf32_bin NOT NULL,
  `prenom` varchar(255) COLLATE utf32_bin NOT NULL,
  `email` varchar(255) COLLATE utf32_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf32_bin NOT NULL,
  `role` varchar(150) COLLATE utf32_bin NOT NULL DEFAULT 'admin',
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nom`, `prenom`, `email`, `mdp`, `role`) VALUES
(1, 'Fayolle', 'Enceulau', 'Fe@gmail.com', 'test', 'admin'),
(2, 'delavega', 'pedro', 'pedro@gmail.com', '$2y$12$If3eDxS5Ffhcu4ISjwcGyu87EXS/4jtj.mde/tU8of4XR32HUKawm', 'admin'),
(3, 'gourcuf', 'yohan', 'yg@gmail.com', 'test', 'admin'),
(5, 'Pignouf', 'Denis', 'MP@venum.com', '$2b$12$MkafI1bGTxkSuFSq7uifPOOZCfdySbCm/GUq4RaeO6K.Kz2nPqCK2', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `classement`
--

DROP TABLE IF EXISTS `classement`;
CREATE TABLE IF NOT EXISTS `classement` (
  `idClassement` int(150) NOT NULL AUTO_INCREMENT,
  `id` int(150) NOT NULL,
  `Score` int(255) NOT NULL,
  PRIMARY KEY (`idClassement`),
  KEY `fk_id_idClassment` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `classement`
--

INSERT INTO `classement` (`idClassement`, `id`, `Score`) VALUES
(1, 4, 2147479999),
(2, 5, 45),
(3, 10, 450),
(4, 11, 1350),
(5, 12, 2950),
(6, 13, -4),
(7, 14, 900),
(8, 15, 1900),
(9, 16, 300),
(10, 17, 600),
(11, 18, 2147479999),
(12, 19, 2147479999);

-- --------------------------------------------------------

--
-- Structure de la table `defis`
--

DROP TABLE IF EXISTS `defis`;
CREATE TABLE IF NOT EXISTS `defis` (
  `idDefis` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf32_bin NOT NULL,
  `description` varchar(255) COLLATE utf32_bin NOT NULL,
  `date_fin` date NOT NULL,
  PRIMARY KEY (`idDefis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) COLLATE utf32_bin NOT NULL,
  `nom` text COLLATE utf32_bin NOT NULL,
  `prenom` text COLLATE utf32_bin NOT NULL,
  `mdp` varchar(255) COLLATE utf32_bin NOT NULL,
  `inscrit` varchar(255) COLLATE utf32_bin NOT NULL DEFAULT 'non',
  `role` varchar(150) COLLATE utf32_bin NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `nom`, `prenom`, `mdp`, `inscrit`, `role`) VALUES
(4, 'dzible@dz.com', 'DelChiappo', 'Thibaut', '$2y$10$k32ShYmbpj0EzUE9K5sd8eZP1eqrvdkc3BXl3L6hp6cu.y6zZ5vAC', 'non', 'user'),
(5, 'gege@bch.com', 'bouchard', 'gerard', '$2y$12$DTZoxOD/DQVwXnfptZO7O./bFxcv7XmhxyryRACYRwJ2U8JJmZUKK', 'non', 'user'),
(10, 'test@test.com', 'test', 'test', '$2y$12$U5wJeBkB7ZEfhH6d.WEZ.OHhIttybx/6SLgJ9aM/FnXlYPNYs05Mu', 'non', 'user'),
(11, 'VenumM@gmail.com', 'Venum', 'Michel', '$2y$12$KekHqg3aFcW6skKxHSWRvOEpFzo63i3L7pGJMhaBYn9wxcWNtO2a.', 'non', 'user'),
(12, 'Sachounettedu13@gmail.com', 'Hebert', 'Sacha', '$2y$12$OcFC6OviPI2.sVTFANr21eT//75enVtRVQB2BJQcnrES5W6V0gAr6', 'non', 'user'),
(13, 'Suchiro7@mauvaisefoi.com', 'Suchi', 'ro', '$2y$12$p2iRjWyNlYMAuEZ5Rt0ezOtJk2nCn/RbSVXI6CFgg3NUG45n8139q', 'non', 'user'),
(14, 'PD@gmail.com', 'Palermo', 'David', '$2y$12$yoKByDOInGP/eNE.W1fJneB91mjZoz/bVrxEzH96iC0GO8RWm20Vm', 'non', 'user'),
(15, 'Rami.n@gmail.com', 'Najar', 'Rami', '$2y$12$/R1xjfl4AHokiM0rFJqnaeiGuL2xLPEKUKMP1rU38zZepAX9uuCha', 'non', 'user'),
(16, 'hg@li.vo', 'Rogier', 'Hugo', '$2y$12$X7h6ZYuwXbphxEmfMxk4v.tsaTbn9pEFjIzKlHVvZbKi3ClyL5Sxq', 'non', 'user'),
(17, 'Delnegritodu13@gmail.com', 'Delnegro', 'ThÃ©o', '$2y$12$C3N4hvwbSVYdBPIB8ncTQOaOfRlRBiT0gsOUHYODJZRH92iDdrKW2', 'non', 'user'),
(18, 't.bhang2112@gmail.com', 'Bhang', 'ThÃ©o', '$2y$12$Y3Ij2gtXeo0RpgLoosQNHeIbrqHWo70/Cp3WhtgQs.ZDqxtJeJOie', 'non', 'user'),
(19, 'Fayolle.A@gmail.com', 'Fayolle', 'Ancelot', '$2y$12$cCL49OzoaQyZna4z4RB/feMI0TSPepvCznSYJpJkpJN80XubgCa.S', 'non', 'user');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `classement`
--
ALTER TABLE `classement`
  ADD CONSTRAINT `fk_id_idClassment` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
