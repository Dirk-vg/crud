
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
 SET character_set_client = @saved_cs_client ;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
 ALTER TABLE `classes` DISABLE KEYS ;
INSERT INTO `classes` VALUES (1,'Lamarr','Antwerp',1),(2,'Giertz','Antwerp',3),(3,'Theano','Gent',4),(4,'Tesla','Liege',5);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
 SET character_set_client = @saved_cs_client ;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
 ALTER TABLE `students` DISABLE KEYS ;
INSERT INTO `students` VALUES (1,'Dirk','dirk@becode.org',1,1),(2,'Said','said@becode.org',1,1),(3,'Vinnie','vinnie@becode.org',1,1),(4,'Felix','felix@becode.org',3,2),(5,'Cis','cis@becode.org',3,2),(6,'Emmanuel','emmanuel@becode.org',3,2),(7,'Whitney','whitney@becode.org',3,2),(8,'Laura','laura@becode.org',1,1),(9,'Deni','deni@becode.org',1,1),(10,'Jos','jos@becode.org',4,4);
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
                            `class_id` int(10) unsigned NOT NULL,
                            PRIMARY KEY (`id`),
                            KEY `teachers_FK` (`class_id`),
                            CONSTRAINT `teachers_FK` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
 SET character_set_client = @saved_cs_client ;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
 ALTER TABLE `teachers` DISABLE KEYS ;
INSERT INTO `teachers` VALUES (1,'Koen','Koen@becode.org',1),(2,'Tim','tim@becode.org',1),(3,'Sicco','sicco@becode.org',2),(4,'Manuele','manuele@becode.org',3),(5,'Nick','nick@becode.org',4);
 ALTER TABLE `teachers` ENABLE KEYS ;
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


