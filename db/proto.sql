-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: proto
-- ------------------------------------------------------
-- Server version	8.0.27-0ubuntu0.20.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8*/;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `proto`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `proto` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `proto`;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8*/;
CREATE TABLE `clients` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` char(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` char(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (3,'lll','$2y$10$kWgaw7SMgv3Q2cXG4Bdm8eS09Yo/LzqPZ1oG.0x.L1VA2xseZX9jS','test@mail.com'),(4,'anonym','$2y$10$Vu1OP7iecxN.moxs7VVqruav8kuQWtzrmzatOrl5UHnR957sDe4mS','aaa@ddd.yy'),(5,'one','$2y$10$zW4edaB1fekNUFz9kAKDEercsY51rd2Jw4xKuRaVzVi9BS2rHv0G2','aaa@ddd'),(6,'anonym','$2y$10$F7uUXYEpTDeXXQtS8/UfNevmlha3xjrlUTVP595fWmiWhTqmqN6.2','one@mail.com'),(7,'anonym','$2y$10$P3OMKpoelx50akmvFAUbEedL3tkJGFc0w7jrCsQ53ZO9HYTuDHQAe','www@aasd.ed'),(8,'anonym','$2y$10$GuPHEFJ0DVo2k4crJFSsieiudqlInnqg5KM.SoYLQr3TpEjBhtpTK','two@two.to'),(9,NULL,NULL,'try@this.co'),(10,NULL,NULL,'ttt@eee.ii'),(11,NULL,NULL,'oe@sss.s'),(12,NULL,NULL,'bob@mail.oo'),(13,NULL,NULL,'yjjjm@kkdkd.eee'),(14,NULL,NULL,'error@one.ee'),(15,NULL,NULL,'one@more.time'),(16,NULL,NULL,'r@am.re'),(17,NULL,NULL,'rrrr@rrr.rrr'),(18,NULL,NULL,'mistake@sss'),(19,NULL,NULL,'mistake@ss.e'),(20,NULL,NULL,'err@or.one'),(21,'anonym','$2y$10$a5uzgoURkZ3nq6c1fiOAqeHzFtVKhoYV1tl9cqANGerlAnHFo20.i','first@mail.com'),(22,NULL,NULL,'new_one@mail.co'),(23,'anonym','$2y$10$nBqgBZk68lYMDBfqjFtet.Ljk6I24utn6XbYvGYjBZaGBL5sslKLG','no@orders.co'),(24,NULL,NULL,'some@mail.ru'),(29,NULL,NULL,'rrr@dddd.ee'),(30,NULL,NULL,'silly@em.d'),(31,NULL,NULL,''),(32,NULL,NULL,'new@attempt.tt'),(33,'anonym','$2y$10$LKpZRUXr0UXfyp5uXra7rOnqy1CdtcFOwBMPctVprzVIdMIOs2qQy','fuck@fuck.co'),(34,NULL,NULL,'Fuck@email.nn'),(35,'new','$2y$10$J6xTmGf3LguQoGMZ6MD7zOKQ5rLURgaul6bUsE11igZyFEt0Q0qAa','new@mail.fr'),(36,'bob','$2y$10$jlv1bJEbBQ.KdJvyOLh.Bud77J4qv/4OmePYBfNE6mjw7L64PiABK','ua@aaa.ddd'),(37,'qlicw','$2y$10$EZMWfZUdl0hSi2xjvOHtQeUGVbN6Qc07Nn4YguXrjCk7b3lPkcPbq','alice@hhh.ss'),(38,'anonym','$2y$10$vsJtllSElAzndWkCUbXwq.Fl70NVrErr7DMCD/ZrffjA9il5Ho.8u','hui@mail.com'),(39,'bobbb','$2y$10$SDSWckcrrVrcJKacXwp1o.kI6kVQCWAi1Bqre0OEYAA.5Zsj6wOF2','bob@mail.fr');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8*/;
CREATE TABLE `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` char(30) NOT NULL,
  `unit_price` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `items`
--

LOCK TABLES `items` WRITE;
/*!40000 ALTER TABLE `items` DISABLE KEYS */;
INSERT INTO `items` VALUES (1,'product_a','100.50'),(8,'product_b','400.90'),(9,'product_c','199.90');
/*!40000 ALTER TABLE `items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8*/;
CREATE TABLE `order_items` (
  `order_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `amount` int DEFAULT NULL,
  KEY `order_id` (`order_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (2,1,99),(2,8,55),(7,1,555),(7,8,202),(7,9,11),(8,1,88),(8,8,33),(9,1,77),(10,1,77),(10,8,88),(11,1,77),(11,8,88),(12,1,77),(12,8,88),(16,8,88),(16,1,66),(17,1,66),(17,9,12),(20,1,44),(20,9,22),(21,1,113),(22,8,111),(23,1,333),(24,1,333),(25,1,333),(30,1,44),(31,1,44),(32,1,44),(33,1,99),(34,1,666),(35,1,44),(36,1,33);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8*/;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (24,5),(2,8),(7,8),(8,8),(35,8),(9,9),(21,9),(22,9),(10,10),(11,11),(12,12),(13,13),(14,14),(15,15),(16,16),(17,17),(36,17),(18,20),(20,21),(23,22),(25,22),(26,24),(30,29),(31,30),(32,31),(33,32),(34,34);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-25 13:46:41
