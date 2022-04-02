-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 31 août 2021 à 15:33
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
-- Base de données : `vaiksasi`
--

-- --------------------------------------------------------

--
-- Structure de la table `bqutilisateur`
--

DROP TABLE IF EXISTS `bqutilisateur`;
CREATE TABLE IF NOT EXISTS `bqutilisateur` (
  `idBQU` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `montant` float NOT NULL DEFAULT '0',
  `retrait` float NOT NULL DEFAULT '0',
  `depot` float NOT NULL DEFAULT '0',
  `dateUp` date NOT NULL,
  PRIMARY KEY (`idBQU`),
  KEY `idUser` (`idUser`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categorievoitures`
--

DROP TABLE IF EXISTS `categorievoitures`;
CREATE TABLE IF NOT EXISTS `categorievoitures` (
  `idCategories` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`idCategories`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorievoitures`
--

INSERT INTO `categorievoitures` (`idCategories`, `nom`) VALUES
(1, 'citadine'),
(2, 'coupé'),
(3, 'berline'),
(4, 'break'),
(5, 'SUV'),
(6, 'Monospace'),
(7, 'Cabriolet');

-- --------------------------------------------------------

--
-- Structure de la table `comptebq`
--

DROP TABLE IF EXISTS `comptebq`;
CREATE TABLE IF NOT EXISTS `comptebq` (
  `idBQ` int(11) NOT NULL AUTO_INCREMENT,
  `montant` float NOT NULL DEFAULT '0',
  `depot` float NOT NULL DEFAULT '0',
  `dateUp` date NOT NULL,
  PRIMARY KEY (`idBQ`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `idConnexion` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  PRIMARY KEY (`idConnexion`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`idConnexion`, `email`, `contact`, `mdp`) VALUES
(1, 'koto@gmail.com', '0323232232', '123');

-- --------------------------------------------------------

--
-- Structure de la table `imageproduit`
--

DROP TABLE IF EXISTS `imageproduit`;
CREATE TABLE IF NOT EXISTS `imageproduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduit` int(11) NOT NULL,
  `pathImage` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProduit` (`idProduit`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `imageproduit`
--

INSERT INTO `imageproduit` (`id`, `idProduit`, `pathImage`) VALUES
(1, 1, 'atos1.jpg'),
(2, 1, 'atos2.jpg'),
(3, 2, '504.jpg'),
(4, 2, '5042.jpg'),
(5, 4, '404fam1.jpg'),
(6, 4, '404fam2.jpg'),
(7, 3, '504tsotra1.jpg'),
(8, 3, '504tsotra2.jpg'),
(9, 5, 'touareg1.jpg'),
(10, 5, 'touareg2.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_panier` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idProduitsV` int(11) NOT NULL,
  `prixAchat` float NOT NULL,
  `valider` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_panier`),
  KEY `idUser` (`idUser`),
  KEY `idProduitsV` (`idProduitsV`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id_panier`, `idUser`, `idProduitsV`, `prixAchat`, `valider`) VALUES
(2, 1, 1, 18000000, 0),
(3, 1, 2, 15000000, 0);

-- --------------------------------------------------------

--
-- Structure de la table `produitsvoiture`
--

DROP TABLE IF EXISTS `produitsvoiture`;
CREATE TABLE IF NOT EXISTS `produitsvoiture` (
  `idProduitsV` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `anne` int(11) NOT NULL,
  `places` int(11) NOT NULL,
  `descriptionPlus` varchar(250) NOT NULL,
  `prix` float NOT NULL,
  `disponibilite` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idProduitsV`),
  KEY `idUser` (`idUser`),
  KEY `idType` (`idType`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produitsvoiture`
--

INSERT INTO `produitsvoiture` (`idProduitsV`, `idUser`, `idType`, `idCategorie`, `nom`, `anne`, `places`, `descriptionPlus`, `prix`, `disponibilite`) VALUES
(1, 1, 1, 1, 'Hyundai Atos', 2007, 5, 'Fiara tsara kely sady mitsitsy mety tsara ho ana madama', 18000000, 1),
(2, 1, 2, 2, 'peugeot 504 coupé', 1973, 4, 'Voiture de collection tsara be. Devoir tsisy, papiers à jour tsara tonga dia mande.', 15000000, 1),
(3, 2, 1, 3, 'peugeot 504', 1973, 5, 'Fiara mbola tsara fa amidy fotsiny satri mibahana tanàna', 5000000, 1),
(4, 3, 1, 4, '404 familial', 1970, 8, 'Natao ho an fianakaviana', 3000000, 1),
(5, 4, 2, 5, 'VW Touareg', 2009, 5, 'Ho anao nahazo vola tao am Antares, ito misy touareg tonga d tsara be.', 20000000, 1),
(6, 3, 2, 6, 'renault espace', 2003, 7, 'Voiture familiale pour toute la famille.', 7000000, 1),
(7, 4, 2, 7, 'BMW Z4', 2003, 2, 'Voiture sportive, faible kilometrage', 60000000, 1);

-- --------------------------------------------------------

--
-- Structure de la table `typeannonces`
--

DROP TABLE IF EXISTS `typeannonces`;
CREATE TABLE IF NOT EXISTS `typeannonces` (
  `idTypeA` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`idTypeA`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `typeannonces`
--

INSERT INTO `typeannonces` (`idTypeA`, `nom`) VALUES
(1, 'vente'),
(2, 'location');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `sexe` varchar(2) NOT NULL DEFAULT 'M',
  `dateDeNaissance` date NOT NULL,
  `adresse` varchar(250) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUser`, `nom`, `prenom`, `email`, `contact`, `sexe`, `dateDeNaissance`, `adresse`) VALUES
(1, 'rakoto', 'jean', 'koto@gmail.com', '0323232232', 'M', '2001-12-12', 'ivato'),
(2, 'alfred', 'von', 'al@gmail.com', '03231616598', 'M', '2001-12-12', 'ivato'),
(3, 'Bat', 'Man', 'bat@gmail.com', '03333333333', 'M', '2001-12-12', 'ivato'),
(4, 'Rob', 'Bin', 'Rob@gmail.com', '0343433434', 'M', '2001-12-12', 'ivato');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
