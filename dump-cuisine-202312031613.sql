-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: cuisine
-- ------------------------------------------------------
-- Server version	11.1.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Entrée'),(2,'Plat principal'),(3,'Dessert');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredients` (
  `id_ingredient` int(11) NOT NULL AUTO_INCREMENT,
  `nom_ingredient` varchar(255) NOT NULL,
  PRIMARY KEY (`id_ingredient`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES (1,'Laitue'),(2,'Pâtes'),(3,'Fruits'),(4,'Croûtons'),(5,'Parmesan'),(6,'Œufs'),(7,'Fromage'),(8,'Bacon'),(9,'Yaourt'),(10,'Miel');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recettes`
--

DROP TABLE IF EXISTS `recettes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recettes` (
  `id_recette` int(11) NOT NULL AUTO_INCREMENT,
  `nom_recette` varchar(255) NOT NULL,
  `instructions` text DEFAULT NULL,
  `temps_preparation` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `id_ingredient` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_recette`),
  KEY `id_categorie` (`id_categorie`),
  KEY `id_ingredient` (`id_ingredient`),
  CONSTRAINT `recettes_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`),
  CONSTRAINT `recettes_ibfk_2` FOREIGN KEY (`id_ingredient`) REFERENCES `ingredients` (`id_ingredient`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recettes`
--

LOCK TABLES `recettes` WRITE;
/*!40000 ALTER TABLE `recettes` DISABLE KEYS */;
INSERT INTO `recettes` VALUES (5,'Salade César','Mélanger la laitue, les croûtons, le parmesan et la sauce.',15,1,1),(6,'Pâtes Carbonara','Cuire les pâtes et mélanger avec des œufs, du fromage et du bacon.',20,2,2),(7,'Smoothie aux Fruits','Mixer des fruits avec du yaourt et du miel.',10,3,3);
/*!40000 ALTER TABLE `recettes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'cuisine'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-03 16:13:46
