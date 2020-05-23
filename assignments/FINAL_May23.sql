-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: s20am_team10
-- ------------------------------------------------------
-- Server version	5.7.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Administrator`
--

DROP TABLE IF EXISTS `Administrator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Administrator` (
  `ADid` int(11) NOT NULL AUTO_INCREMENT,
  `ADfname` varchar(20) DEFAULT NULL,
  `ADmname` varchar(20) DEFAULT NULL,
  `ADlname` varchar(20) DEFAULT NULL,
  `ADemail` varchar(20) DEFAULT NULL,
  `ADpassword` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ADid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Administrator`
--

LOCK TABLES `Administrator` WRITE;
/*!40000 ALTER TABLE `Administrator` DISABLE KEYS */;
INSERT INTO `Administrator` VALUES (1,'Ms.','N/A','Important','admin','admin1');
/*!40000 ALTER TABLE `Administrator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Application`
--

DROP TABLE IF EXISTS `Application`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Application` (
  `Aapplication_id` int(11) NOT NULL AUTO_INCREMENT,
  `Acredit_hours` int(11) NOT NULL,
  `Anumber_of_hours` int(11) NOT NULL,
  `Aapplication_period` varchar(20) DEFAULT 'FALL',
  `Acurrent_position` varchar(50) NOT NULL,
  `Aresume` longblob NOT NULL,
  `Atranscript` longblob NOT NULL,
  `Areference_letter` longblob NOT NULL,
  `AprofileImage` longblob NOT NULL,
  `AprofileImageType` varchar(25) NOT NULL,
  `Astudent_id` int(11) NOT NULL,
  `AstudentJobs` varchar(100) NOT NULL,
  `Astatus` varchar(100) DEFAULT 'In Review',
  PRIMARY KEY (`Aapplication_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Application`
--

LOCK TABLES `Application` WRITE;
/*!40000 ALTER TABLE `Application` DISABLE KEYS */;
/*!40000 ALTER TABLE `Application` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Coordinator`
--

DROP TABLE IF EXISTS `Coordinator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Coordinator` (
  `Cid` int(11) NOT NULL AUTO_INCREMENT,
  `Cfname` char(20) DEFAULT NULL,
  `Cmname` char(20) DEFAULT NULL,
  `Clname` char(20) DEFAULT NULL,
  `Cemail` varchar(20) DEFAULT NULL,
  `Cpassword` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`Cid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Coordinator`
--

LOCK TABLES `Coordinator` WRITE;
/*!40000 ALTER TABLE `Coordinator` DISABLE KEYS */;
INSERT INTO `Coordinator` VALUES (1,'Mr.',NULL,'Important','coor','coor1');
/*!40000 ALTER TABLE `Coordinator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Course`
--

DROP TABLE IF EXISTS `Course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Course` (
  `Cid` int(11) NOT NULL AUTO_INCREMENT,
  `CjobTitle` varchar(2) DEFAULT NULL,
  `CclassName` varchar(20) DEFAULT NULL,
  `CclassCRN` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`Cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Course`
--

LOCK TABLES `Course` WRITE;
/*!40000 ALTER TABLE `Course` DISABLE KEYS */;
INSERT INTO `Course` VALUES (1,'TA','Database Management','27411'),(2,'IA','Database Management','27411'),(3,'TA','Computer Arch.','26014');
/*!40000 ALTER TABLE `Course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `FullStatMatrix`
--

DROP TABLE IF EXISTS `FullStatMatrix`;
/*!50001 DROP VIEW IF EXISTS `FullStatMatrix`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `FullStatMatrix` AS SELECT 
 1 AS `gender`,
 1 AS `gender_count`,
 1 AS `residency`,
 1 AS `total`,
 1 AS `average_major_GPA`,
 1 AS `average_overall_GPA`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `HonorStudents`
--

DROP TABLE IF EXISTS `HonorStudents`;
/*!50001 DROP VIEW IF EXISTS `HonorStudents`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `HonorStudents` AS SELECT 
 1 AS `Sid`,
 1 AS `Sfname`,
 1 AS `Smname`,
 1 AS `Slname`,
 1 AS `Semail`,
 1 AS `Sclassification`,
 1 AS `Sresidency_status`,
 1 AS `Sgender`,
 1 AS `Smajor_gpa`,
 1 AS `Sover_all_gpa`,
 1 AS `Spassword`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Role`
--

DROP TABLE IF EXISTS `Role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `RjobTitle` varchar(2) DEFAULT NULL,
  `RclassName` varchar(20) DEFAULT NULL,
  `RclassCRN` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Role`
--

LOCK TABLES `Role` WRITE;
/*!40000 ALTER TABLE `Role` DISABLE KEYS */;
INSERT INTO `Role` VALUES (1,'TA','Database Management','27411'),(2,'IA','Database Management','27411'),(3,'TA','Computer Arch.','26014');
/*!40000 ALTER TABLE `Role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `StatMatrix`
--

DROP TABLE IF EXISTS `StatMatrix`;
/*!50001 DROP VIEW IF EXISTS `StatMatrix`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `StatMatrix` AS SELECT 
 1 AS `residency`,
 1 AS `total`,
 1 AS `average_major_GPA`,
 1 AS `average_overall_GPA`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Student` (
  `Sid` int(11) NOT NULL AUTO_INCREMENT,
  `Sfname` char(20) DEFAULT NULL,
  `Smname` char(20) DEFAULT NULL,
  `Slname` char(20) DEFAULT NULL,
  `Semail` varchar(20) DEFAULT NULL,
  `Sclassification` varchar(20) DEFAULT NULL,
  `Sresidency_status` varchar(20) DEFAULT NULL,
  `Sgender` varchar(1) DEFAULT NULL,
  `Smajor_gpa` decimal(4,2) DEFAULT NULL,
  `Sover_all_gpa` decimal(4,2) DEFAULT NULL,
  `Spassword` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Sid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Student`
--

LOCK TABLES `Student` WRITE;
/*!40000 ALTER TABLE `Student` DISABLE KEYS */;
INSERT INTO `Student` VALUES (1,'user','N/A','user','user','undergraduate','in-state','F',3.33,3.33,'user1'),(2,'user','N/A','user','user0','undergraduate','in-state','F',3.33,3.33,'user0'),(3,'user2','N/A','user2','user2','undergraduate','in-state','M',3.40,2.22,'user2'),(4,'user3','N/A','user3','user3','undergraduate','in-state','F',3.40,2.22,'user3');
/*!40000 ALTER TABLE `Student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SuperUsers`
--

DROP TABLE IF EXISTS `SuperUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SuperUsers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Sfname` char(10) DEFAULT NULL,
  `Slname` char(10) DEFAULT NULL,
  `Susername` varchar(20) DEFAULT NULL,
  `Spassword` varchar(20) DEFAULT NULL,
  `Sstatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SuperUsers`
--

LOCK TABLES `SuperUsers` WRITE;
/*!40000 ALTER TABLE `SuperUsers` DISABLE KEYS */;
INSERT INTO `SuperUsers` VALUES (1,'Ms.','Important','admin','admin1','ADMIN'),(2,'Mr.','Important','coor','coor1','COORDINATOR'),(3,'Ms.','Important','coor2','coor2','COORDINATOR');
/*!40000 ALTER TABLE `SuperUsers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `TA`
--

DROP TABLE IF EXISTS `TA`;
/*!50001 DROP VIEW IF EXISTS `TA`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `TA` AS SELECT 
 1 AS `Sid`,
 1 AS `Sfname`,
 1 AS `Smname`,
 1 AS `Slname`,
 1 AS `Semail`,
 1 AS `Sclassification`,
 1 AS `Sresidency_status`,
 1 AS `Sgender`,
 1 AS `Smajor_gpa`,
 1 AS `Sover_all_gpa`,
 1 AS `Spassword`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `Undergraduate`
--

DROP TABLE IF EXISTS `Undergraduate`;
/*!50001 DROP VIEW IF EXISTS `Undergraduate`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `Undergraduate` AS SELECT 
 1 AS `Sid`,
 1 AS `Sfname`,
 1 AS `Smname`,
 1 AS `Slname`,
 1 AS `Semail`,
 1 AS `Sclassification`,
 1 AS `Sresidency_status`,
 1 AS `Sgender`,
 1 AS `Smajor_gpa`,
 1 AS `Sover_all_gpa`,
 1 AS `Spassword`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `FullStatMatrix`
--

/*!50001 DROP VIEW IF EXISTS `FullStatMatrix`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `FullStatMatrix` AS select `Student`.`Sgender` AS `gender`,count(`Student`.`Sgender`) AS `gender_count`,`Student`.`Sresidency_status` AS `residency`,count(`Student`.`Sresidency_status`) AS `total`,avg(`Student`.`Smajor_gpa`) AS `average_major_GPA`,avg(`Student`.`Sover_all_gpa`) AS `average_overall_GPA` from `Student` group by `Student`.`Sresidency_status`,`Student`.`Sgender` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `HonorStudents`
--

/*!50001 DROP VIEW IF EXISTS `HonorStudents`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `HonorStudents` AS select `Student`.`Sid` AS `Sid`,`Student`.`Sfname` AS `Sfname`,`Student`.`Smname` AS `Smname`,`Student`.`Slname` AS `Slname`,`Student`.`Semail` AS `Semail`,`Student`.`Sclassification` AS `Sclassification`,`Student`.`Sresidency_status` AS `Sresidency_status`,`Student`.`Sgender` AS `Sgender`,`Student`.`Smajor_gpa` AS `Smajor_gpa`,`Student`.`Sover_all_gpa` AS `Sover_all_gpa`,`Student`.`Spassword` AS `Spassword` from `Student` where ((`Student`.`Smajor_gpa` > 3.0) and (`Student`.`Sover_all_gpa` > 3.0)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `StatMatrix`
--

/*!50001 DROP VIEW IF EXISTS `StatMatrix`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `StatMatrix` AS select `Student`.`Sresidency_status` AS `residency`,count(`Student`.`Sresidency_status`) AS `total`,avg(`Student`.`Smajor_gpa`) AS `average_major_GPA`,avg(`Student`.`Sover_all_gpa`) AS `average_overall_GPA` from `Student` group by `Student`.`Sresidency_status` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `TA`
--

/*!50001 DROP VIEW IF EXISTS `TA`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `TA` AS select `Student`.`Sid` AS `Sid`,`Student`.`Sfname` AS `Sfname`,`Student`.`Smname` AS `Smname`,`Student`.`Slname` AS `Slname`,`Student`.`Semail` AS `Semail`,`Student`.`Sclassification` AS `Sclassification`,`Student`.`Sresidency_status` AS `Sresidency_status`,`Student`.`Sgender` AS `Sgender`,`Student`.`Smajor_gpa` AS `Smajor_gpa`,`Student`.`Sover_all_gpa` AS `Sover_all_gpa`,`Student`.`Spassword` AS `Spassword` from `Student` where ((`Student`.`Sclassification` like 'doctorate') or (`Student`.`Sclassification` like 'graduate')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `Undergraduate`
--

/*!50001 DROP VIEW IF EXISTS `Undergraduate`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = latin1 */;
/*!50001 SET character_set_results     = latin1 */;
/*!50001 SET collation_connection      = latin1_swedish_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`%` SQL SECURITY DEFINER */
/*!50001 VIEW `Undergraduate` AS select `Student`.`Sid` AS `Sid`,`Student`.`Sfname` AS `Sfname`,`Student`.`Smname` AS `Smname`,`Student`.`Slname` AS `Slname`,`Student`.`Semail` AS `Semail`,`Student`.`Sclassification` AS `Sclassification`,`Student`.`Sresidency_status` AS `Sresidency_status`,`Student`.`Sgender` AS `Sgender`,`Student`.`Smajor_gpa` AS `Smajor_gpa`,`Student`.`Sover_all_gpa` AS `Sover_all_gpa`,`Student`.`Spassword` AS `Spassword` from `Student` where (`Student`.`Sclassification` like 'undergraduate') */;
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

-- Dump completed on 2020-05-23 13:37:07
