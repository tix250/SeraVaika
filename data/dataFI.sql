-- MySQL dump 10.17  Distrib 10.3.23-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: VAIKSASI
-- ------------------------------------------------------
-- Server version	10.3.23-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `BqUtilisateur`
--

DROP TABLE IF EXISTS `BqUtilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BqUtilisateur` (
  `idBQU` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `montant` float NOT NULL DEFAULT 0,
  `retrait` float NOT NULL DEFAULT 0,
  `depot` float NOT NULL DEFAULT 0,
  `dateUp` datetime DEFAULT NULL,
  PRIMARY KEY (`idBQU`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `BqUtilisateur_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Utilisateur` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BqUtilisateur`
--

LOCK TABLES `BqUtilisateur` WRITE;
/*!40000 ALTER TABLE `BqUtilisateur` DISABLE KEYS */;
INSERT INTO `BqUtilisateur` VALUES (3,1,10000,0,10000,'2021-09-05 19:18:56'),(4,1,5000,5000,0,'2021-09-05 19:19:21'),(5,1,11000,0,6000,'2021-09-05 19:24:02'),(6,1,2000,9000,0,'2021-09-05 19:24:16');
/*!40000 ALTER TABLE `BqUtilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `CategorieVoitures`
--

DROP TABLE IF EXISTS `CategorieVoitures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `CategorieVoitures` (
  `idCategories` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`idCategories`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `CategorieVoitures`
--

LOCK TABLES `CategorieVoitures` WRITE;
/*!40000 ALTER TABLE `CategorieVoitures` DISABLE KEYS */;
INSERT INTO `CategorieVoitures` VALUES (3,'berline'),(4,'break'),(7,'Cabriolet'),(1,'citadine'),(2,'coupé'),(6,'Monospace'),(5,'SUV');
/*!40000 ALTER TABLE `CategorieVoitures` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Connexion`
--

DROP TABLE IF EXISTS `Connexion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Connexion` (
  `idConnexion` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `mdp` varchar(250) NOT NULL,
  PRIMARY KEY (`idConnexion`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `contact` (`contact`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Connexion`
--

LOCK TABLES `Connexion` WRITE;
/*!40000 ALTER TABLE `Connexion` DISABLE KEYS */;
INSERT INTO `Connexion` VALUES (1,'koto@gmail.com','0323232232','b736efda7342c257b42af16d6f7b8da01d5aa165');
/*!40000 ALTER TABLE `Connexion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Panier`
--

DROP TABLE IF EXISTS `Panier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Panier` (
  `idUser` int(11) NOT NULL,
  `idProduitsV` int(11) NOT NULL,
  `prixAchat` float NOT NULL,
  `valider` int(11) NOT NULL DEFAULT 0,
  `nombre` int(11) DEFAULT 1,
  UNIQUE KEY `idProduitsV` (`idProduitsV`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `Panier_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Utilisateur` (`idUser`),
  CONSTRAINT `Panier_ibfk_2` FOREIGN KEY (`idProduitsV`) REFERENCES `ProduitsVoiture` (`idProduitsV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Panier`
--

LOCK TABLES `Panier` WRITE;
/*!40000 ALTER TABLE `Panier` DISABLE KEYS */;
INSERT INTO `Panier` VALUES (1,1,18000000,0,6),(1,2,15000000,0,3);
/*!40000 ALTER TABLE `Panier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ProduitsVoiture`
--

DROP TABLE IF EXISTS `ProduitsVoiture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ProduitsVoiture` (
  `idProduitsV` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `anne` int(11) NOT NULL,
  `places` int(11) NOT NULL,
  `descriptionPlus` varchar(250) NOT NULL,
  `prix` float NOT NULL,
  `disponibilite` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`idProduitsV`),
  KEY `idUser` (`idUser`),
  KEY `idType` (`idType`),
  KEY `idCategorie` (`idCategorie`),
  CONSTRAINT `ProduitsVoiture_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Utilisateur` (`idUser`),
  CONSTRAINT `ProduitsVoiture_ibfk_2` FOREIGN KEY (`idType`) REFERENCES `TypeAnnonces` (`idTypeA`),
  CONSTRAINT `ProduitsVoiture_ibfk_3` FOREIGN KEY (`idCategorie`) REFERENCES `CategorieVoitures` (`idCategories`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ProduitsVoiture`
--

LOCK TABLES `ProduitsVoiture` WRITE;
/*!40000 ALTER TABLE `ProduitsVoiture` DISABLE KEYS */;
INSERT INTO `ProduitsVoiture` VALUES (1,1,1,1,'Hyundai Atos',2007,5,'Fiara tsara kely sady mitsitsy mety tsara ho ana madama',18000000,1),(2,1,2,2,'peugeot 504 coupé',1973,4,'Voiture de collection tsara be. Devoir tsisy, papiers à jour tsara tonga dia mande.',15000000,1),(3,2,1,3,'peugeot 504',1973,5,'Fiara mbola tsara fa amidy fotsiny satri mibahana tanàna',5000000,1),(4,3,1,4,'404 familial',1970,8,'Natao ho an fianakaviana',3000000,1),(5,4,2,5,'VW Touareg',2009,5,'Ho anao nahazo vola tao am Antares, ito misy touareg tonga d tsara be.',20000000,1),(6,3,2,6,'renault espace',2003,7,'Voiture familiale pour toute la famille.',7000000,1),(7,4,2,7,'BMW Z4',2003,2,'Voiture sportive, faible kilometrage',60000000,1);
/*!40000 ALTER TABLE `ProduitsVoiture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TypeAnnonces`
--

DROP TABLE IF EXISTS `TypeAnnonces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TypeAnnonces` (
  `idTypeA` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  PRIMARY KEY (`idTypeA`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TypeAnnonces`
--

LOCK TABLES `TypeAnnonces` WRITE;
/*!40000 ALTER TABLE `TypeAnnonces` DISABLE KEYS */;
INSERT INTO `TypeAnnonces` VALUES (2,'location'),(1,'vente');
/*!40000 ALTER TABLE `TypeAnnonces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Utilisateur`
--

DROP TABLE IF EXISTS `Utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Utilisateur` (
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Utilisateur`
--

LOCK TABLES `Utilisateur` WRITE;
/*!40000 ALTER TABLE `Utilisateur` DISABLE KEYS */;
INSERT INTO `Utilisateur` VALUES (1,'rakoto','jean','koto@gmail.com','0323232232','M','2001-12-12','ivato'),(2,'alfred','von','al@gmail.com','03231616598','M','2001-12-12','ivato'),(3,'Bat','Man','bat@gmail.com','03333333333','M','2001-12-12','ivato'),(4,'Rob','Bin','Rob@gmail.com','0343433434','M','2001-12-12','ivato');
/*!40000 ALTER TABLE `Utilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `carDetails`
--

DROP TABLE IF EXISTS `carDetails`;
/*!50001 DROP VIEW IF EXISTS `carDetails`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `carDetails` (
  `idProduitsV` tinyint NOT NULL,
  `idUser` tinyint NOT NULL,
  `idType` tinyint NOT NULL,
  `idCategorie` tinyint NOT NULL,
  `nom` tinyint NOT NULL,
  `anne` tinyint NOT NULL,
  `places` tinyint NOT NULL,
  `descriptionPlus` tinyint NOT NULL,
  `prix` tinyint NOT NULL,
  `disponibilite` tinyint NOT NULL,
  `idImg` tinyint NOT NULL,
  `imgName` tinyint NOT NULL,
  `annonce` tinyint NOT NULL,
  `nomProprio` tinyint NOT NULL,
  `categorie` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `compteBQ`
--

DROP TABLE IF EXISTS `compteBQ`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compteBQ` (
  `idBQ` int(11) NOT NULL AUTO_INCREMENT,
  `montant` float NOT NULL DEFAULT 0,
  `depot` float NOT NULL DEFAULT 0,
  `dateUp` date NOT NULL,
  PRIMARY KEY (`idBQ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compteBQ`
--

LOCK TABLES `compteBQ` WRITE;
/*!40000 ALTER TABLE `compteBQ` DISABLE KEYS */;
/*!40000 ALTER TABLE `compteBQ` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `imagePerso`
--

DROP TABLE IF EXISTS `imagePerso`;
/*!50001 DROP VIEW IF EXISTS `imagePerso`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `imagePerso` (
  `idUser` tinyint NOT NULL,
  `nom` tinyint NOT NULL,
  `prenom` tinyint NOT NULL,
  `email` tinyint NOT NULL,
  `contact` tinyint NOT NULL,
  `sexe` tinyint NOT NULL,
  `dateDeNaissance` tinyint NOT NULL,
  `adresse` tinyint NOT NULL,
  `image` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `imageProduit`
--

DROP TABLE IF EXISTS `imageProduit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imageProduit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idProduit` int(11) NOT NULL,
  `pathImage` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idProduit` (`idProduit`),
  CONSTRAINT `imageProduit_ibfk_1` FOREIGN KEY (`idProduit`) REFERENCES `ProduitsVoiture` (`idProduitsV`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imageProduit`
--

LOCK TABLES `imageProduit` WRITE;
/*!40000 ALTER TABLE `imageProduit` DISABLE KEYS */;
INSERT INTO `imageProduit` VALUES (1,1,'atos1.jpg'),(2,1,'atos2.jpg'),(3,2,'504.jpg'),(4,2,'5042.jpg'),(5,4,'404fam1.jpg'),(6,4,'404fam2.jpg'),(7,3,'504tsotra1.jpg'),(8,3,'504tsotra2.jpg'),(9,5,'touareg1.jpg'),(10,5,'touareg2.jpg'),(11,6,'espace1.jpg'),(12,6,'espace2.jpg'),(13,7,'z41.jpg'),(14,7,'z42.jpg');
/*!40000 ALTER TABLE `imageProduit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imageUtilisateur`
--

DROP TABLE IF EXISTS `imageUtilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imageUtilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  CONSTRAINT `imageUtilisateur_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `Utilisateur` (`idUser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imageUtilisateur`
--

LOCK TABLES `imageUtilisateur` WRITE;
/*!40000 ALTER TABLE `imageUtilisateur` DISABLE KEYS */;
INSERT INTO `imageUtilisateur` VALUES (1,1,'Capture.png'),(2,2,'Capture.png'),(3,3,'Capture.png');
/*!40000 ALTER TABLE `imageUtilisateur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `produitDetail`
--

DROP TABLE IF EXISTS `produitDetail`;
/*!50001 DROP VIEW IF EXISTS `produitDetail`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `produitDetail` (
  `pathImage` tinyint NOT NULL,
  `idProduitsV` tinyint NOT NULL,
  `idUser` tinyint NOT NULL,
  `nomUser` tinyint NOT NULL,
  `prenomUser` tinyint NOT NULL,
  `idType` tinyint NOT NULL,
  `idCategorie` tinyint NOT NULL,
  `nomVoiture` tinyint NOT NULL,
  `anne` tinyint NOT NULL,
  `places` tinyint NOT NULL,
  `descriptionPlus` tinyint NOT NULL,
  `prix` tinyint NOT NULL,
  `disponibilite` tinyint NOT NULL,
  `nomCategorie` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `statistique`
--

DROP TABLE IF EXISTS `statistique`;
/*!50001 DROP VIEW IF EXISTS `statistique`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `statistique` (
  `idProduitsV` tinyint NOT NULL,
  `idUser` tinyint NOT NULL,
  `idType` tinyint NOT NULL,
  `idCategorie` tinyint NOT NULL,
  `nomVoiture` tinyint NOT NULL,
  `anne` tinyint NOT NULL,
  `places` tinyint NOT NULL,
  `descriptionPlus` tinyint NOT NULL,
  `disponibilite` tinyint NOT NULL,
  `nomCategorie` tinyint NOT NULL,
  `nomTypeAnnonces` tinyint NOT NULL,
  `prixAchat` tinyint NOT NULL,
  `valider` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `carDetails`
--

/*!50001 DROP TABLE IF EXISTS `carDetails`*/;
/*!50001 DROP VIEW IF EXISTS `carDetails`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`etu1092`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `carDetails` AS select `ProduitsVoiture`.`idProduitsV` AS `idProduitsV`,`ProduitsVoiture`.`idUser` AS `idUser`,`ProduitsVoiture`.`idType` AS `idType`,`ProduitsVoiture`.`idCategorie` AS `idCategorie`,`ProduitsVoiture`.`nom` AS `nom`,`ProduitsVoiture`.`anne` AS `anne`,`ProduitsVoiture`.`places` AS `places`,`ProduitsVoiture`.`descriptionPlus` AS `descriptionPlus`,`ProduitsVoiture`.`prix` AS `prix`,`ProduitsVoiture`.`disponibilite` AS `disponibilite`,`imageProduit`.`id` AS `idImg`,`imageProduit`.`pathImage` AS `imgName`,`TypeAnnonces`.`nom` AS `annonce`,`Utilisateur`.`nom` AS `nomProprio`,`CategorieVoitures`.`nom` AS `categorie` from ((((`ProduitsVoiture` join `imageProduit`) join `Utilisateur`) join `TypeAnnonces`) join `CategorieVoitures`) where `ProduitsVoiture`.`idUser` = `Utilisateur`.`idUser` and `ProduitsVoiture`.`idType` = `TypeAnnonces`.`idTypeA` and `ProduitsVoiture`.`idCategorie` = `CategorieVoitures`.`idCategories` and `ProduitsVoiture`.`idProduitsV` = `imageProduit`.`idProduit` and `ProduitsVoiture`.`disponibilite` = 1 group by `ProduitsVoiture`.`idProduitsV` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `imagePerso`
--

/*!50001 DROP TABLE IF EXISTS `imagePerso`*/;
/*!50001 DROP VIEW IF EXISTS `imagePerso`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`etu1092`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `imagePerso` AS select `Utilisateur`.`idUser` AS `idUser`,`Utilisateur`.`nom` AS `nom`,`Utilisateur`.`prenom` AS `prenom`,`Utilisateur`.`email` AS `email`,`Utilisateur`.`contact` AS `contact`,`Utilisateur`.`sexe` AS `sexe`,`Utilisateur`.`dateDeNaissance` AS `dateDeNaissance`,`Utilisateur`.`adresse` AS `adresse`,`imageUtilisateur`.`image` AS `image` from (`Utilisateur` join `imageUtilisateur` on(`Utilisateur`.`idUser` = `imageUtilisateur`.`idUser`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `produitDetail`
--

/*!50001 DROP TABLE IF EXISTS `produitDetail`*/;
/*!50001 DROP VIEW IF EXISTS `produitDetail`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`etu1092`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `produitDetail` AS select `imageProduit`.`pathImage` AS `pathImage`,`ProduitsVoiture`.`idProduitsV` AS `idProduitsV`,`Utilisateur`.`idUser` AS `idUser`,`Utilisateur`.`nom` AS `nomUser`,`Utilisateur`.`prenom` AS `prenomUser`,`ProduitsVoiture`.`idType` AS `idType`,`ProduitsVoiture`.`idCategorie` AS `idCategorie`,`ProduitsVoiture`.`nom` AS `nomVoiture`,`ProduitsVoiture`.`anne` AS `anne`,`ProduitsVoiture`.`places` AS `places`,`ProduitsVoiture`.`descriptionPlus` AS `descriptionPlus`,`ProduitsVoiture`.`prix` AS `prix`,`ProduitsVoiture`.`disponibilite` AS `disponibilite`,`CategorieVoitures`.`nom` AS `nomCategorie` from (((`ProduitsVoiture` join `imageProduit` on(`imageProduit`.`idProduit` = `ProduitsVoiture`.`idProduitsV`)) join `Utilisateur` on(`Utilisateur`.`idUser` = `ProduitsVoiture`.`idUser`)) join `CategorieVoitures` on(`CategorieVoitures`.`idCategories` = `ProduitsVoiture`.`idCategorie`)) where `ProduitsVoiture`.`disponibilite` = 1 group by `ProduitsVoiture`.`idProduitsV` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `statistique`
--

/*!50001 DROP TABLE IF EXISTS `statistique`*/;
/*!50001 DROP VIEW IF EXISTS `statistique`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`etu1092`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `statistique` AS select `ProduitsVoiture`.`idProduitsV` AS `idProduitsV`,`ProduitsVoiture`.`idUser` AS `idUser`,`ProduitsVoiture`.`idType` AS `idType`,`ProduitsVoiture`.`idCategorie` AS `idCategorie`,`ProduitsVoiture`.`nom` AS `nomVoiture`,`ProduitsVoiture`.`anne` AS `anne`,`ProduitsVoiture`.`places` AS `places`,`ProduitsVoiture`.`descriptionPlus` AS `descriptionPlus`,`ProduitsVoiture`.`disponibilite` AS `disponibilite`,`CategorieVoitures`.`nom` AS `nomCategorie`,`TypeAnnonces`.`nom` AS `nomTypeAnnonces`,`Panier`.`prixAchat` AS `prixAchat`,`Panier`.`valider` AS `valider` from (((`ProduitsVoiture` join `CategorieVoitures` on(`ProduitsVoiture`.`idCategorie` = `CategorieVoitures`.`idCategories`)) join `TypeAnnonces` on(`ProduitsVoiture`.`idType` = `TypeAnnonces`.`idTypeA`)) join `Panier` on(`ProduitsVoiture`.`idProduitsV` = `Panier`.`idProduitsV`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-09-07  1:21:21
