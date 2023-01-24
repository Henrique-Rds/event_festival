-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 24 jan. 2023 à 10:27
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `event_festival`
--

-- --------------------------------------------------------

--
-- Structure de la table `artistes`
--

DROP TABLE IF EXISTS `artistes`;
CREATE TABLE IF NOT EXISTS `artistes` (
  `Id_Artistes` int(11) NOT NULL AUTO_INCREMENT,
  `artiste_nom` varchar(50) NOT NULL,
  `artiste_nb_musique` int(11) DEFAULT '0',
  PRIMARY KEY (`Id_Artistes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `artiste_style_musical`
--

DROP TABLE IF EXISTS `artiste_style_musical`;
CREATE TABLE IF NOT EXISTS `artiste_style_musical` (
  `Id_Artistes` int(11) NOT NULL,
  `Id_Style_musical` int(11) NOT NULL,
  PRIMARY KEY (`Id_Artistes`,`Id_Style_musical`),
  KEY `Id_Style_musical` (`Id_Style_musical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `billet`
--

DROP TABLE IF EXISTS `billet`;
CREATE TABLE IF NOT EXISTS `billet` (
  `Id_Billet` int(11) NOT NULL AUTO_INCREMENT,
  `billet_numero` int(11) NOT NULL,
  `Id_Evenements` int(11) NOT NULL,
  `Id_Categorie` int(11) NOT NULL,
  `Id_Commande` int(11) NOT NULL,
  PRIMARY KEY (`Id_Billet`),
  KEY `Id_Evenements` (`Id_Evenements`),
  KEY `Id_Categorie` (`Id_Categorie`),
  KEY `Id_Commande` (`Id_Commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `Id_Categorie` int(11) NOT NULL AUTO_INCREMENT,
  `categorie_nom` varchar(50) NOT NULL,
  `categorie_description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `Id_Commande` int(11) NOT NULL AUTO_INCREMENT,
  `commande_numero` int(11) NOT NULL,
  `commande_date_commande` datetime DEFAULT CURRENT_TIMESTAMP,
  `commande_date_annulation` datetime DEFAULT NULL,
  `commande_date_confirmation` datetime DEFAULT NULL,
  `commande_date_paiement` datetime DEFAULT NULL,
  `Id_User` int(11) NOT NULL,
  PRIMARY KEY (`Id_Commande`),
  KEY `Id_User` (`Id_User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

DROP TABLE IF EXISTS `evenements`;
CREATE TABLE IF NOT EXISTS `evenements` (
  `Id_Evenements` int(11) NOT NULL AUTO_INCREMENT,
  `evenements_nom` varchar(50) NOT NULL,
  `evenements_date` datetime DEFAULT NULL,
  `evenements_duree` int(11) DEFAULT NULL,
  `evenements_place_dispo` int(11) DEFAULT '0',
  PRIMARY KEY (`Id_Evenements`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenements_artistes`
--

DROP TABLE IF EXISTS `evenements_artistes`;
CREATE TABLE IF NOT EXISTS `evenements_artistes` (
  `Id_Evenements` int(11) NOT NULL,
  `Id_Artistes` int(11) NOT NULL,
  PRIMARY KEY (`Id_Evenements`,`Id_Artistes`),
  KEY `Id_Artistes` (`Id_Artistes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `evenement_scene`
--

DROP TABLE IF EXISTS `evenement_scene`;
CREATE TABLE IF NOT EXISTS `evenement_scene` (
  `Id_Evenements` int(11) NOT NULL,
  `Id_Scenes` int(11) NOT NULL,
  PRIMARY KEY (`Id_Evenements`,`Id_Scenes`),
  KEY `Id_Scenes` (`Id_Scenes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `Id_Roles` int(11) NOT NULL AUTO_INCREMENT,
  `roles_libelle` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Roles`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`Id_Roles`, `roles_libelle`) VALUES
(1, 'festivalier');

-- --------------------------------------------------------

--
-- Structure de la table `scenes`
--

DROP TABLE IF EXISTS `scenes`;
CREATE TABLE IF NOT EXISTS `scenes` (
  `Id_Scenes` int(11) NOT NULL AUTO_INCREMENT,
  `scenes_nom` varchar(50) NOT NULL,
  `scenes_emplacement` smallint(6) DEFAULT '0',
  PRIMARY KEY (`Id_Scenes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `style_musical`
--

DROP TABLE IF EXISTS `style_musical`;
CREATE TABLE IF NOT EXISTS `style_musical` (
  `Id_Style_musical` int(11) NOT NULL AUTO_INCREMENT,
  `style_musical_libelle` varchar(50) NOT NULL,
  `style_musical_desc` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Id_Style_musical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user_style_musical`
--

DROP TABLE IF EXISTS `user_style_musical`;
CREATE TABLE IF NOT EXISTS `user_style_musical` (
  `Id_User` int(11) NOT NULL,
  `Id_Style_musical` int(11) NOT NULL,
  PRIMARY KEY (`Id_User`,`Id_Style_musical`),
  KEY `Id_Style_musical` (`Id_Style_musical`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id_User` int(11) NOT NULL AUTO_INCREMENT,
  `user_nom` varchar(50) NOT NULL,
  `user_prenom` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_mot_de_passe` varchar(50) NOT NULL,
  `user_adresse` varchar(50) NOT NULL,
  `user_date_naissance` date NOT NULL,
  `Id_Roles` int(11) NOT NULL,
  PRIMARY KEY (`Id_User`),
  UNIQUE KEY `user_email` (`user_email`),
  KEY `Id_Roles` (`Id_Roles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `artiste_style_musical`
--
ALTER TABLE `artiste_style_musical`
  ADD CONSTRAINT `artiste_style_musical_ibfk_1` FOREIGN KEY (`Id_Artistes`) REFERENCES `artistes` (`Id_Artistes`),
  ADD CONSTRAINT `artiste_style_musical_ibfk_2` FOREIGN KEY (`Id_Style_musical`) REFERENCES `style_musical` (`Id_Style_musical`);

--
-- Contraintes pour la table `billet`
--
ALTER TABLE `billet`
  ADD CONSTRAINT `billet_ibfk_1` FOREIGN KEY (`Id_Evenements`) REFERENCES `evenements` (`Id_Evenements`),
  ADD CONSTRAINT `billet_ibfk_2` FOREIGN KEY (`Id_Categorie`) REFERENCES `categorie` (`Id_Categorie`),
  ADD CONSTRAINT `billet_ibfk_3` FOREIGN KEY (`Id_Commande`) REFERENCES `commande` (`Id_Commande`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `utilisateur` (`Id_User`);

--
-- Contraintes pour la table `evenements_artistes`
--
ALTER TABLE `evenements_artistes`
  ADD CONSTRAINT `evenements_artistes_ibfk_1` FOREIGN KEY (`Id_Evenements`) REFERENCES `evenements` (`Id_Evenements`),
  ADD CONSTRAINT `evenements_artistes_ibfk_2` FOREIGN KEY (`Id_Artistes`) REFERENCES `artistes` (`Id_Artistes`);

--
-- Contraintes pour la table `evenement_scene`
--
ALTER TABLE `evenement_scene`
  ADD CONSTRAINT `evenement_scene_ibfk_1` FOREIGN KEY (`Id_Evenements`) REFERENCES `evenements` (`Id_Evenements`),
  ADD CONSTRAINT `evenement_scene_ibfk_2` FOREIGN KEY (`Id_Scenes`) REFERENCES `scenes` (`Id_Scenes`);

--
-- Contraintes pour la table `user_style_musical`
--
ALTER TABLE `user_style_musical`
  ADD CONSTRAINT `user_style_musical_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `utilisateur` (`Id_User`),
  ADD CONSTRAINT `user_style_musical_ibfk_2` FOREIGN KEY (`Id_Style_musical`) REFERENCES `style_musical` (`Id_Style_musical`);

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`Id_Roles`) REFERENCES `roles` (`Id_Roles`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
