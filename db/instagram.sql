-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 03 oct. 2023 à 14:32
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `instagram`
--

-- --------------------------------------------------------

--
-- Structure de la table `avatars`
--

DROP TABLE IF EXISTS `avatars`;
CREATE TABLE IF NOT EXISTS `avatars` (
  `id_avatars` int NOT NULL AUTO_INCREMENT,
  `avatars` varchar(150) DEFAULT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id_avatars`),
  UNIQUE KEY `id_users` (`id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `avatars`
--

INSERT INTO `avatars` (`id_avatars`, `avatars`, `id_users`) VALUES
(11, '651c25466b6b28.42248361.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comments` int NOT NULL AUTO_INCREMENT,
  `comments` varchar(150) NOT NULL,
  `dates` datetime NOT NULL,
  `id_pictures` int NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id_comments`),
  KEY `id_pictures` (`id_pictures`),
  KEY `id_users` (`id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id_comments`, `comments`, `dates`, `id_pictures`, `id_users`) VALUES
(42, 'Nice !', '0000-00-00 00:00:00', 38, 4);

-- --------------------------------------------------------

--
-- Structure de la table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id_users` int NOT NULL,
  `id_pictures` int NOT NULL,
  PRIMARY KEY (`id_users`,`id_pictures`),
  KEY `id_pictures` (`id_pictures`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `pictures`
--

DROP TABLE IF EXISTS `pictures`;
CREATE TABLE IF NOT EXISTS `pictures` (
  `id_pictures` int NOT NULL AUTO_INCREMENT,
  `pictures` varchar(200) NOT NULL,
  `id_users` int NOT NULL,
  PRIMARY KEY (`id_pictures`),
  UNIQUE KEY `pictures` (`pictures`),
  KEY `id_users` (`id_users`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `pictures`
--

INSERT INTO `pictures` (`id_pictures`, `pictures`, `id_users`) VALUES
(38, '651c258022c838.19196239.jpg', 4);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `pseudos` varchar(150) NOT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_users`, `username`, `pseudos`) VALUES
(4, 'username', 'pseudo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
