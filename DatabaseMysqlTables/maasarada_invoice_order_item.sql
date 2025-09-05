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
-- Table structure for table `invoice_order_item`
--

DROP TABLE IF EXISTS `invoice_order_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `invoice_order_item` (
  `order_item_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `item_code` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`order_item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4444 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice_order_item`
--

LOCK TABLES `invoice_order_item` WRITE;
/*!40000 ALTER TABLE `invoice_order_item` DISABLE KEYS */;
INSERT INTO `invoice_order_item` VALUES (4387,685,'1','abcddddd',1.00,55.00,55.00),(4388,692,'2','b',1.00,11.00,11.00),(4389,692,'2','v',1.00,44.00,44.00),(4395,693,'4','40',4.00,4.00,16.00),(4396,693,'1','1',1.00,1.00,1.00),(4397,693,'1','1',1.00,1.00,1.00),(4398,693,'2','2',33.00,0.00,0.00),(4399,693,'464','44',644.00,48.00,46.00),(4414,694,'s','s',0.00,55.00,55.00),(4415,694,'12','',0.00,0.00,0.00),(4416,694,'2','',0.00,0.00,0.00),(4417,694,'3','',0.00,0.00,0.00),(4418,694,'4','',0.00,0.00,0.00),(4419,694,'5','',0.00,0.00,0.00),(4420,694,'6','',0.00,0.00,0.00),(4421,694,'7','',0.00,0.00,0.00),(4422,694,'8','',0.00,0.00,0.00),(4423,694,'9','',0.00,0.00,0.00),(4424,694,'10','',0.00,0.00,0.00),(4425,694,'11','',0.00,0.00,0.00),(4426,694,'12','',0.00,0.00,0.00),(4427,694,'13','',0.00,0.00,0.00),(4428,694,'14','',0.00,0.00,0.00),(4429,694,'15','',0.00,0.00,0.00),(4430,694,'16','',0.00,0.00,0.00),(4431,694,'17','',0.00,0.00,0.00),(4432,694,'18','',0.00,0.00,0.00),(4433,694,'19','',0.00,0.00,0.00),(4434,694,'20','',0.00,0.00,0.00),(4435,694,'','',0.00,0.00,0.00),(4436,695,'1','dsffgk',5.00,55.00,55.00),(4439,696,'1','dsffgk',1.00,25.00,25.00),(4440,696,'2','vsv',1.00,25.00,25.00),(4441,0,'','',0.00,0.00,0.00),(4442,697,'1','dsffgk',2.00,22.00,44.00),(4443,697,'22','dsffgk',2.00,5.00,10.00);
/*!40000 ALTER TABLE `invoice_order_item` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-05 18:03:12
