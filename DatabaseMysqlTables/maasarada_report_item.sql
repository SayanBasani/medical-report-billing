-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: maasarada
-- ------------------------------------------------------
-- Server version	8.0.43

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `report_item`
--

DROP TABLE IF EXISTS `report_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `report_item` (
  `test_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `result` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `normal_value` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `report_item_id` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `report_no` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `EXAMINATION_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `extrafield` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mainexamination` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=890 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `report_item`
--

LOCK TABLES `report_item` WRITE;
/*!40000 ALTER TABLE `report_item` DISABLE KEYS */;
INSERT INTO `report_item` VALUES ('S Typhi H Positive up to','asc','1/160','112',869,'n1','WIDAL TEST','','WidalAndInfectionPanel'),('S Typhi O Positive up to','','1/80','112',870,'n2','WIDAL TEST','','WidalAndInfectionPanel'),('S Paratyphi A(H)','asc','NEGATIVE','112',871,'n3','WIDAL TEST','','WidalAndInfectionPanel'),('S Paratyphi B(H)','','NEGATIVE','112',872,'n4','WIDAL TEST','','WidalAndInfectionPanel'),('A Diagnostic Titer of','','160 & 180','112',873,'n5','WIDAL TEST','','WidalAndInfectionPanel'),('M.P.(Malaria Parasite) Test','','','112',874,'n6','Malaria Parasite','','WidalAndInfectionPanel'),('N S - 1','','NON REACTIVE','112',875,'n7','DENGUE','','WidalAndInfectionPanel'),('I g G','','NON REACTIVE','112',876,'n8','DENGUE','','WidalAndInfectionPanel'),('I g M','','NON REACTIVE','112',877,'n9','DENGUE','','WidalAndInfectionPanel'),('SCRUB TYPHUS ANTIBODY','','NON REACTIVE','112',878,'n10','DENGUE','','WidalAndInfectionPanel'),('C R P (SERUM)','','Up to 6.0 mg/L','112',879,'n11','DENGUE','','WidalAndInfectionPanel'),('','sdv','sdv','113',880,'sdv','','',''),('','sdv','c ','113',881,'sd','','',''),('Sugar (Fasting)','','65 - 110 mg%','114',882,'K1','undefined','','KFT_Electrolytes'),('Sugar (Post-Prandial)','','80 - 140 mg%','114',883,'K2','undefined','','KFT_Electrolytes'),('Sodium','','135 - 155 mmol/L','114',884,'K3','undefined','','KFT_Electrolytes'),('Potassium','','3.5 - 5.5 mmol/L','114',885,'K4','undefined','','KFT_Electrolytes'),('Urea','','Up to 45 mg/dL','114',886,'K5','undefined','','KFT_Electrolytes'),('Creatinine','','0.6 - 1.2 mg/dL','114',887,'K6','undefined','','KFT_Electrolytes'),('Uric Acid','','3.6 - 7.2 mg/dL','114',888,'K7','undefined','','KFT_Electrolytes'),('Chloride','','98 - 115 mmol/L','114',889,'K8','undefined','','KFT_Electrolytes');
/*!40000 ALTER TABLE `report_item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-05 18:03:11
