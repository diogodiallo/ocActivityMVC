-- MySQL dump 10.13  Distrib 8.0.12, for osx10.13 (x86_64)
--
-- Host: localhost    Database: galerie
-- ------------------------------------------------------
-- Server version	8.0.12

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;



--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
SET character_set_client
= utf8mb4 ;
CREATE TABLE `comments`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT,
  `post_id` int
(11) DEFAULT NULL,
  `author` varchar
(150) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `
comments`
VALUES
  (1, 1, 'Jean', 'Je suis venu te voir pour parler. Le header passe bien maintenant?  Dernier teste effectuer avant soumission. Tout marche chez moi.                             ', '2019-02-27 20:55:52'),
  (2, 1, 'Louise', 'Tu as fait un bon travail.   Il faut continuer et amelioré!             ', '2019-02-27 20:56:30'),
  (3, 2, 'Marc', ' Il va falloir bien réfléchir pour mettre en place notre projet. La modification ouverte a tous est une erreur fatale a ne pas reproduire en réalité sur un vrai site (penser modération... Never Trust User Input)!!!                ', '2019-02-27 20:57:22'),
  (4, 2, 'Phine', 'Je suis un inspecteur de police de new york unité spéciale, et je viens suivre ton site pour apprendre le web.', '2019-02-27 22:43:02');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;





DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
SET character_set_client
= utf8mb4 ;
CREATE TABLE `posts`
(
  `id` int
(11) NOT NULL AUTO_INCREMENT,
  `title` varchar
(250) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id`),
  UNIQUE KEY `title`
(`title`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `
posts`
VALUES
  (1, 'PHP MVC', 'Gestion de blog en php avec le pattern MVC et l\'
utilisation de la programmation oriente objet.','2019-02-27 18:16:02'),(2,'Moderation du blog','Je suis entrain de faire une moderation du blog lors de l\'ajout de message par un utilisateur.','2019-02-27 18:17:34');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


