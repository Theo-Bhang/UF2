-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 30 avr. 2021 à 12:41
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nom`, `prenom`, `email`, `mdp`, `role`) VALUES
(1, 'Fayolle', 'Enceulau', 'Fe@gmail.com', 'test', 'admin'),
(2, 'Bhang', 'ThÃ©o', 'pedro@gmail.com', '$2y$12$If3eDxS5Ffhcu4ISjwcGyu87EXS/4jtj.mde/tU8of4XR32HUKawm', 'admin');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `nom`, `prenom`, `mdp`, `inscrit`, `role`) VALUES
(1, 'toto@toto.com', 'toto', 'tota', 'test', 'non', 'user'),
(2, 't.bhang2112@gmail.com', 'Bhang', 'ThÃ©o', '$2y$12$E81nhzEYfEDSi6k7CfBX7.nwIF1B/.NwCxpI2.a9SFBwPdxsxZg1C', 'non', 'user'),
(3, 'cONSCONSdu13@bing.fr', 'MOMO', 'Gregory', '$2y$12$jBMf25UUX18jTYWd1C381eC1rPSz8Q5WK9Vl77XmRI0WHWoN1ctpa', 'non', 'user'),
(4, 'dzible@dz.com', 'DelChiappo', 'Dzible', '$2y$12$D2i0OClPUrrsmfXKXspfNu4e691jvZxp9XS.0gT0s0fHjfWmOqTR.', 'non', 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
