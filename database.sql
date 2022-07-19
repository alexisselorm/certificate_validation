-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: dbschool
-- ------------------------------------------------------
-- Server version	8.0.29-0ubuntu0.22.04.2

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
-- Table structure for table `colleges`
--

DROP TABLE IF EXISTS `colleges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `colleges` (
  `collegeid` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `college_name` varchar(50) DEFAULT NULL,
  `college_code` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`collegeid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_db`
--

DROP TABLE IF EXISTS `course_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_db` (
  `courseid` int(6) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `scoring` tinyint(1) NOT NULL DEFAULT '0',
  `code` varchar(10) NOT NULL DEFAULT '',
  `title` varchar(200) NOT NULL DEFAULT '',
  `credits` int NOT NULL DEFAULT '3',
  `level` int NOT NULL DEFAULT '0',
  `deptid` int NOT NULL DEFAULT '0',
  `semester` int NOT NULL DEFAULT '0',
  `precode` int(5) unsigned zerofill DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `type` int NOT NULL DEFAULT '1',
  `related` int(5) unsigned zerofill DEFAULT NULL,
  `sheet_id` int(2) unsigned zerofill NOT NULL DEFAULT '01',
  `survey_type` varchar(11) NOT NULL,
  PRIMARY KEY (`courseid`) USING BTREE,
  UNIQUE KEY `code` (`code`) USING BTREE,
  KEY `indexcode` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=112901 DEFAULT CHARSET=latin1 COMMENT='Courses offered by departments';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_desc`
--

DROP TABLE IF EXISTS `course_desc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_desc` (
  `courseid` int(5) unsigned zerofill NOT NULL DEFAULT '00000',
  `description` text,
  KEY `courseid` (`courseid`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Descriptive test on each course';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `course_quota`
--

DROP TABLE IF EXISTS `course_quota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `course_quota` (
  `courseid` int(5) unsigned zerofill NOT NULL DEFAULT '00000',
  `quota` int DEFAULT NULL,
  `groups` int(2) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`courseid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Class size quotas';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departments` (
  `deptid` int NOT NULL AUTO_INCREMENT,
  `facultyid` int NOT NULL DEFAULT '0',
  `long_name` varchar(120) NOT NULL,
  `short_name` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`deptid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9507 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `faculty` (
  `facultyid` int(4) unsigned zerofill NOT NULL DEFAULT '0000',
  `long_name` varchar(100) NOT NULL DEFAULT '',
  `short_name` varchar(50) NOT NULL DEFAULT '',
  `collegeid` int(2) unsigned zerofill DEFAULT NULL,
  `type` varchar(15) NOT NULL DEFAULT 'Academic',
  `fte_norms` tinyint DEFAULT '0',
  PRIMARY KEY (`facultyid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Faculties in the institytion';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `halls`
--

DROP TABLE IF EXISTS `halls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `halls` (
  `hallid` varchar(8) NOT NULL DEFAULT '',
  `hall` varchar(50) NOT NULL DEFAULT '',
  `quota` int NOT NULL DEFAULT '0',
  `gender` char(1) DEFAULT NULL,
  `comments` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`hallid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Residential Halls';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `major_db`
--

DROP TABLE IF EXISTS `major_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `major_db` (
  `majorid` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `subjectid_1` int(4) unsigned zerofill DEFAULT '0000',
  `subjectid_2` int(4) unsigned zerofill DEFAULT '0000',
  `subjectid_3` int(4) unsigned zerofill DEFAULT '0000',
  `subjectid_4` int(4) unsigned zerofill DEFAULT '0000',
  `progid` varchar(6) NOT NULL DEFAULT '',
  `level` int NOT NULL DEFAULT '0',
  `comments` varchar(100) NOT NULL DEFAULT '',
  `deptid` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`majorid`) USING BTREE,
  KEY `progid` (`progid`,`level`) USING BTREE,
  KEY `majorcode` (`subjectid_1`,`subjectid_2`,`subjectid_3`,`subjectid_4`,`progid`,`level`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7345 DEFAULT CHARSET=latin1 COMMENT='Subject combinations for each programme at the various level';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `major_subjects`
--

DROP TABLE IF EXISTS `major_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `major_subjects` (
  `subjectid` int(4) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) NOT NULL DEFAULT '',
  `status` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`subjectid`)
) ENGINE=MyISAM AUTO_INCREMENT=201 DEFAULT CHARSET=latin1 COMMENT='Subjects offered in the institution';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `prog_db`
--

DROP TABLE IF EXISTS `prog_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prog_db` (
  `progid` varchar(6) NOT NULL DEFAULT '000000',
  `facultyid` int NOT NULL DEFAULT '0',
  `deptid` int NOT NULL DEFAULT '1',
  `long_name` varchar(100) NOT NULL DEFAULT '',
  `short_name` varchar(100) NOT NULL DEFAULT '',
  `major_combination` tinyint(1) NOT NULL DEFAULT '1',
  `prefix` varchar(7) NOT NULL DEFAULT '',
  `duration` varchar(10) NOT NULL DEFAULT '0',
  `progtype` tinyint(2) unsigned zerofill NOT NULL DEFAULT '01',
  `runtype` int(2) unsigned zerofill NOT NULL DEFAULT '00',
  `graduating_credit` int NOT NULL DEFAULT '0',
  `degreeid` int unsigned NOT NULL DEFAULT '0',
  `status` int DEFAULT NULL,
  PRIMARY KEY (`progid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Programmes offered in the institution';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `prog_runtypes`
--

DROP TABLE IF EXISTS `prog_runtypes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prog_runtypes` (
  `runtype` int(2) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `comment` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`runtype`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Methods of runing programmes';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `regdata`
--

DROP TABLE IF EXISTS `regdata`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `regdata` (
  `regid` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `regcode` varchar(26) NOT NULL DEFAULT '',
  `studid` int(15) unsigned zerofill NOT NULL DEFAULT '000000000000000',
  `courseid` int(6) unsigned zerofill NOT NULL DEFAULT '000000',
  `session` int NOT NULL DEFAULT '0',
  `regtype` int DEFAULT '0',
  `mycredits` tinyint unsigned NOT NULL,
  `audit` int DEFAULT '0',
  `groupnum` int(3) unsigned zerofill DEFAULT '000',
  PRIMARY KEY (`regid`) USING BTREE,
  UNIQUE KEY `regcode` (`regcode`) USING BTREE,
  UNIQUE KEY `regcode_2` (`regcode`) USING BTREE,
  UNIQUE KEY `regcode_3` (`regcode`) USING BTREE,
  KEY `group` (`groupnum`) USING BTREE,
  KEY `studid` (`studid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=18742 DEFAULT CHARSET=latin1 COMMENT='Registration data _ Backup';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `students_db`
--

DROP TABLE IF EXISTS `students_db`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students_db` (
  `studid` int(15) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `regno` varchar(30) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `mname` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `verified` tinyint(1) DEFAULT '0',
  `verification_date` datetime DEFAULT NULL,
  `title` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sex` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `marital_status` enum('Single','Married','Divorced','Widowed') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Single',
  `workplace_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `doa` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `doc` varchar(7) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `progid` varchar(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `majorid` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `level` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `entrylevel` char(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `entry_modeid` tinyint DEFAULT NULL,
  `hallid` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT 'NONE',
  `centreid` int(3) unsigned zerofill NOT NULL DEFAULT '001',
  `resident_status` varchar(12) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `room_no` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `non_res_add` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gps_address` varchar(20) DEFAULT NULL,
  `ssnit` varchar(13) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pob_town` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `pob_region` int(2) unsigned zerofill DEFAULT NULL,
  `nationality` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `nationalityid` tinyint(3) unsigned zerofill NOT NULL,
  `hometown` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `post_box` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `post_town` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `homeadd` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `homephone` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cellphone` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `previous_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `studyleave` int NOT NULL DEFAULT '0',
  `schoolid` int(3) unsigned zerofill DEFAULT '000',
  `applicant_id` int DEFAULT NULL,
  `paytype` char(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'NR',
  `taking_ssnit` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `loan_take_times` int DEFAULT NULL,
  `bank_branchid` int(3) unsigned zerofill DEFAULT NULL,
  `bank_account` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `completed` int NOT NULL DEFAULT '0',
  `graduate` int NOT NULL DEFAULT '0',
  `withdrawn` int DEFAULT NULL,
  `biometric_enrolment` bit(1) DEFAULT b'0',
  `biometric_enrolment_date` datetime DEFAULT NULL,
  `card_print` int NOT NULL DEFAULT '0' COMMENT 'indicates whether ID card has been printed',
  `cgpa` decimal(3,1) DEFAULT NULL,
  `cgpa_raw` decimal(5,4) DEFAULT NULL,
  `cert_no` char(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `idcardstatus` int NOT NULL,
  `disabilityid` int(2) unsigned zerofill DEFAULT '00',
  `ref_no` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admission_no` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT '',
  `teachers_regno` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `alt_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `inst_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`studid`) USING BTREE,
  UNIQUE KEY `regno` (`regno`) USING BTREE,
  UNIQUE KEY `cert_no` (`cert_no`) USING BTREE,
  UNIQUE KEY `applicant_id` (`applicant_id`) USING BTREE,
  UNIQUE KEY `regno_3` (`regno`,`inst_email`),
  UNIQUE KEY `regno_4` (`regno`,`email`),
  UNIQUE KEY `inst_email` (`inst_email`),
  KEY `status` (`status`) USING BTREE,
  KEY `lname` (`lname`) USING BTREE,
  KEY `fname` (`fname`) USING BTREE,
  KEY `mname` (`mname`) USING BTREE,
  KEY `regno_2` (`regno`),
  KEY `ref_no` (`ref_no`)
) ENGINE=InnoDB AUTO_INCREMENT=734193 DEFAULT CHARSET=utf8mb3 COMMENT='Students personal information';
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-07-19 16:55:17
