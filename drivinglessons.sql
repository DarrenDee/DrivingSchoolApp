-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: drivinglessons
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `instructors`
--

DROP TABLE IF EXISTS `instructors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instructors` (
  `instructorID` smallint(6) NOT NULL AUTO_INCREMENT,
  `firstname` char(15) NOT NULL,
  `surname` char(15) NOT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  PRIMARY KEY (`instructorID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `instructors`
--

LOCK TABLES `instructors` WRITE;
/*!40000 ALTER TABLE `instructors` DISABLE KEYS */;
INSERT INTO `instructors` VALUES (1,'Ben','Pratt','853549552','benpratt@gmail.com'),(2,'Ian','Williams','873549554','williamsian@yahoo.com'),(3,'John','Keegan','864522522','finnkeegan@gmail.com'),(4,'Liam','Carrick','873200198','LiamCarrick@yahoo.com'),(6,'Jim','Halpert','0854621452','halpertJim@gmail.com'),(7,'Max','Verstappen','0862566435','verstappenmax@gmail.com'),(8,'Kevin','McCallister','0855079544','McCallisterKevin@gmail.com');
/*!40000 ALTER TABLE `instructors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lessons` (
  `lessonNumber` smallint(6) NOT NULL AUTO_INCREMENT,
  `instructorID` smallint(6) NOT NULL,
  `studentID` smallint(6) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  PRIMARY KEY (`lessonNumber`),
  KEY `instructorID` (`instructorID`),
  KEY `studentID` (`studentID`),
  CONSTRAINT `lessons_ibfk_1` FOREIGN KEY (`instructorID`) REFERENCES `instructors` (`instructorID`),
  CONSTRAINT `lessons_ibfk_2` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (1,1,5,'2021-12-09','15:00:00'),(2,1,5,'2021-12-10','14:00:00'),(3,2,3,'2021-12-20','12:00:00'),(4,1,5,'2021-12-17','15:00:00'),(8,2,5,'2021-12-20','12:00:00'),(9,4,3,'2022-01-05','12:00:00'),(10,3,2,'2022-02-10','10:00:00'),(11,6,1,'2022-02-22','16:00:00'),(12,2,2,'2022-03-01','12:00:00'),(15,6,2,'2021-12-22','15:45:00'),(17,7,1,'2022-08-02','10:00:00'),(20,2,5,'2022-12-17','10:00:00'),(29,7,2,'2022-05-22','11:00:00'),(31,8,6,'2022-10-05','09:00:00'),(32,7,2,'2021-12-28','15:00:00'),(33,7,3,'2022-08-25','14:00:00'),(34,2,3,'2021-12-15','09:00:00'),(35,4,2,'2022-08-18','09:00:00'),(36,7,3,'2021-12-21','12:00:00'),(37,7,2,'2022-02-15','15:00:00'),(38,7,2,'2022-06-02','12:00:00'),(40,2,7,'2022-06-02','12:00:00');
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `studentID` smallint(6) NOT NULL AUTO_INCREMENT,
  `firstname` char(15) NOT NULL,
  `surname` char(15) NOT NULL,
  `phoneNumber` varchar(15) DEFAULT NULL,
  `email` char(30) DEFAULT NULL,
  `lessonsDone` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`studentID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'James','Deane','0852465912','deanejames@gmail.com',1),(2,'Andy','Bernard','0876543591','AndyBernard@gmail.com',0),(3,'Micheal','Scott','0856426448','scottMicheal@gmail.com',3),(5,'James','Sullivan','0895642558','SullivanJames@gmail.com',12),(6,'Harry','Kennedy','0854688687','harrykennedy@yahoo.co.uk',3),(7,'Fergus','Kennedy','0854624688','ferguskennedy@yahoo.co.uk',0),(8,'Owen','Murphy','0877482255','owenmurphy@gmail.com',8);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-15 17:15:31
