-- MySQL dump 10.13  Distrib 5.7.14, for Win64 (x86_64)
--
-- Host: localhost    Database: silex
-- ------------------------------------------------------
-- Server version	5.7.14

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `perruques`
--

DROP TABLE IF EXISTS `perruques`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perruques` (
  `id`          INT(11)     NOT NULL AUTO_INCREMENT,
  `title`       VARCHAR(64) NOT NULL,
  `description` TEXT,
  `price`       DOUBLE               DEFAULT '0',
  `quantity`    INT(4) UNSIGNED      DEFAULT '0',
  `image_name`  VARCHAR(64)          DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `perruques_title_index` (`title`)
)
  ENGINE = MyISAM
  AUTO_INCREMENT = 11
  DEFAULT CHARSET = latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perruques`
--

LOCK TABLES `perruques` WRITE;
/*!40000 ALTER TABLE `perruques`
  DISABLE KEYS */;
INSERT INTO `perruques`
VALUES (9, 'Polnareff', 'C\'est moi qui lui ai tout appris', 220, 50, 'dc36eb90e2f30d899725ba8517cbcc13.jpeg'),
  (2, 'azaad', 'azdazd', 0, 0, '97264b4ab0e301bf411adf8c7b204091.png'),
  (3, 'azaad', 'azdazd', 0, 0, '97264b4ab0e301bf411adf8c7b204091.png'),
  (4, 'azaad', 'azdazd', 0, 0, 'b50026cf9078f5915db4d0d2264d8fce.png'),
  (5, 'Wig', 'the wig of the world even if thomas have drunk all beers', 2.2, 12,
   '97264b4ab0e301bf411adf8c7b204091.png'), (6, 'azaad', 'azdazd', 0, 0, 'b50026cf9078f5915db4d0d2264d8fce.png'),
  (10, 'The Trumpinator', 'Les blonds dominent le monde', 1, 100, '3c3ffade8fdfcd04fbff255a80afb567.jpeg');
/*!40000 ALTER TABLE `perruques`
  ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2018-07-26 16:53:58
