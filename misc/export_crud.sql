-- MySQL dump 10.13  Distrib 5.7.31, for Linux (x86_64)
--
-- Host: localhost    Database: crud_exercise
-- ------------------------------------------------------
-- Server version	5.7.31-0ubuntu0.18.04.1

 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT ;
 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS ;
 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION ;
 SET NAMES utf8 ;
 SET @OLD_TIME_ZONE=@@TIME_ZONE ;
 SET TIME_ZONE='+00:00' ;
 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 ;
 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 ;
 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' ;
 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 ;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
 SET @saved_cs_client     = @@character_set_client ;
 SET character_set_client = utf8 ;
CREATE TABLE `classes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classes_FK` (`teacher_id`),
  CONSTRAINT `classes_FK` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 SET character_set_client = @saved_cs_client ;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
 ALTER TABLE `classes` DISABLE KEYS ;
 ALTER TABLE `classes` ENABLE KEYS ;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
 SET @saved_cs_client     = @@character_set_client ;
 SET character_set_client = utf8 ;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `teacher_id` int(10) unsigned NOT NULL,
  `class_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `students_FK` (`teacher_id`),
  KEY `students_FK_1` (`class_id`),
  CONSTRAINT `students_FK` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `students_FK_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
 SET character_set_client = @saved_cs_client ;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
 ALTER TABLE `students` DISABLE KEYS ;
 ALTER TABLE `students` ENABLE KEYS ;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
 SET @saved_cs_client     = @@character_set_client ;
 SET character_set_client = utf8 ;
CREATE TABLE `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
 SET character_set_client = @saved_cs_client ;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
 ALTER TABLE `teachers` DISABLE KEYS ;
INSERT INTO `teachers` VALUES (1,'Koen','Koen@becode.org'),(2,'Tim','tim@becode.org'),(3,'Sicco','sicco@becode.org'),(4,'Manuele','manuele@becode.org'),(5,'Nick','nick@becode.org');
 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'crud_exercise'
--
 SET TIME_ZONE=@OLD_TIME_ZONE ;

 SET SQL_MODE=@OLD_SQL_MODE ;
 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS ;
 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS ;
 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT ;
 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS ;
 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION ;
 SET SQL_NOTES=@OLD_SQL_NOTES ;


