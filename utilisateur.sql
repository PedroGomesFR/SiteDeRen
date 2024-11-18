-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 11 nov. 2024 à 19:37
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `rencontreplus`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `ID_User` int NOT NULL AUTO_INCREMENT,
  `NomUtilisateur` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Nom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `Prenom` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `DateNaissance` date DEFAULT NULL,
  `Genre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `discription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `nbrLikes` int DEFAULT NULL,
  `nbrVueProfil` int DEFAULT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Pwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `DateInscrition` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_User`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
