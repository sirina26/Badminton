-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 07 juin 2022 à 12:52
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `badminton2`
--
CREATE DATABASE IF NOT EXISTS `badminton2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `badminton2`;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

DROP TABLE IF EXISTS `adherent`;
CREATE TABLE IF NOT EXISTS `adherent` (
  `matriculeAdh` int(11) NOT NULL AUTO_INCREMENT,
  `nomAdh` char(50) CHARACTER SET latin1 NOT NULL,
  `prenomAdh` char(50) CHARACTER SET latin1 NOT NULL,
  `adresseAdh` varchar(100) CHARACTER SET latin1 NOT NULL,
  `villeAdh` char(100) CHARACTER SET latin1 NOT NULL,
  `cpAdh` int(11) NOT NULL,
  `niveauAdh` char(50) CHARACTER SET latin1 NOT NULL,
  `numType` int(11) NOT NULL,
  PRIMARY KEY (`matriculeAdh`),
  KEY `adherent_type_FK` (`numType`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`matriculeAdh`, `nomAdh`, `prenomAdh`, `adresseAdh`, `villeAdh`, `cpAdh`, `niveauAdh`, `numType`) VALUES
(1, 'MARCEAU', 'Sophie', '55 rue Marc Sangnier', 'Chatenay Malabry', 92290, 'Expert', 2),
(2, 'MURNEAU', 'Fred', '7 Rue Duvergier', 'Paris', 75019, 'Confirmé', 3),
(3, 'WOLFGANG', 'David', '62, Rue Sedaine', 'Paris', 75013, 'Débutant', 1),
(4, 'HIGGS', 'Alex', '69 rue du temple', 'Paris', 7505, 'Expert', 2),
(5, 'Dupont', 'Robert', '12 rue paradis', 'Paris', 75010, 'Confirmé', 1),
(6, 'HERFOR', 'Eric', '23 RUE DE LA BOETIE', 'Villepinte', 92345, 'Débutant', 2),
(7, 'REYS', 'Quentin', '59 rue La Boétie', 'Paris', 75014, 'Expert', 1),
(8, 'GAUTIER', 'Philip', '122 Faubourg Saint Honoré', 'Paris', 75019, 'Débutant', 1),
(9, 'VON TRIER', 'Lars', '56 rue des moulineux', 'Arceuil', 94356, 'Débutant', 2),
(10, 'COPOLLA', 'Sofia', '32 Place de la Madeleine', 'Paris', 75011, 'Confirmé', 1),
(11, 'NORTON', 'Edward', '98 rue La Boétie', 'Paris', 75016, 'Expert', 3),
(12, 'PETIT', 'Jean', '13 rue du patrimoine', 'PARIS', 75003, 'Confirmé', 3),
(13, 'Dupont', 'hhj', 'kjlj', 'ljlkj', 33, 'Débutant', 1),
(14, 'ds,f', 'lml', 'mlkmlk', 'klkl', 223, 'Expert', 2),
(15, 'Dupont', 'kl,', 'lmklmk', 'kll', 23, 'Expert', 2);

-- --------------------------------------------------------

--
-- Structure de la table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `num` varchar(14) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `club`
--

INSERT INTO `club` (`id`, `name`, `adresse`, `num`, `cp`, `email`) VALUES
(1, 't', 't', '1234', '01', 'E@e.fr');

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `numType` int(11) NOT NULL AUTO_INCREMENT,
  `libelleType` char(50) CHARACTER SET latin1 NOT NULL,
  `montantLicence` int(11) NOT NULL,
  PRIMARY KEY (`numType`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`numType`, `libelleType`, `montantLicence`) VALUES
(1, 'Salarié', 27),
(2, 'Etudiant', 20),
(3, 'Retraité', 23);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `numUser` int(11) NOT NULL AUTO_INCREMENT,
  `usernameUser` varchar(100) NOT NULL,
  `passUser` varchar(100) NOT NULL,
  PRIMARY KEY (`numUser`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`numUser`, `usernameUser`, `passUser`) VALUES
(2, 'bast', 'ien'),
(3, 'sirina', 'si'),
(18, 'toto', 'toto'),
(23, 'test', 'test'),
(25, 'test', 'test'),
(26, 'admin', '1234'),
(27, 'glpi', 'glpi'),
(28, 'admin', '1234'),
(29, 'glpi', 'glpi'),
(30, 't', 't'),
(31, 's', 's'),
(32, 'admin', '1234');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD CONSTRAINT `adherent_type_FK` FOREIGN KEY (`numType`) REFERENCES `type` (`numType`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
