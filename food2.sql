-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: food2
-- ------------------------------------------------------
-- Server version	8.0.39-1

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
-- Table structure for table `Address`
--

DROP TABLE IF EXISTS `Address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Address` (
  `address_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `pincode` int NOT NULL,
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `Address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Address`
--

LOCK TABLES `Address` WRITE;
/*!40000 ALTER TABLE `Address` DISABLE KEYS */;
INSERT INTO `Address` VALUES (1,1,'Karnataka','Bengaluru','Indiranagar',560038),(2,2,'Delhi','Delhi','Rohini',110085),(3,3,'Maharashtra','Mumbai','Powai',400076),(4,4,'Tamil Nadu','Chennai','Adyar',600020),(5,5,'Punjab','Ludhiana','Model Town',141001),(6,6,'West Bengal','Kolkata','Howrah',711101),(7,7,'Telangana','Hyderabad','Banjara Hills',500034),(8,8,'Gujarat','Surat','Ring Road',395003),(9,9,'Uttar Pradesh','Kanpur','Swaroop Nagar',208002),(10,10,'Madhya Pradesh','Bhopal','Arera Colony',462016),(11,11,'Rajasthan','Jodhpur','Sardarpura',342001),(12,12,'Kerala','Trivandrum','Kowdiar',695003),(13,13,'Goa','Vasco','Bogmalo Beach',403802),(14,14,'Haryana','Faridabad','Sector 21',121001),(15,15,'Andhra Pradesh','Guntur','Brodipet',522002),(16,16,'Uttarakhand','Haridwar','Ranipur',249401),(17,17,'Bihar','Gaya','Civil Lines',823001),(18,18,'Odisha','Cuttack','Buxi Bazaar',753001),(19,19,'Assam','Silchar','Tarapur',788003),(20,20,'Jharkhand','Dhanbad','Saraidhela',826001);
/*!40000 ALTER TABLE `Address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Drivers`
--

DROP TABLE IF EXISTS `Drivers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Drivers` (
  `driver_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `location` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`driver_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Drivers`
--

LOCK TABLES `Drivers` WRITE;
/*!40000 ALTER TABLE `Drivers` DISABLE KEYS */;
INSERT INTO `Drivers` VALUES (1,'Ravi','9123456789','Koramangala, Bengaluru','ravi@drivers.in'),(2,'Neetu','9098765432','Dwarka, Delhi','neetu@drivers.in'),(3,'Vikram','9812345678','Bandra, Mumbai','vikram@drivers.in'),(4,'Sunita','9823456789','Gachibowli, Hyderabad','sunita@drivers.in'),(5,'Ajay','9834567890','T Nagar, Chennai','ajay@drivers.in'),(6,'Meenakshi','9845678901','MG Road, Pune','meenakshi@drivers.in'),(7,'Kiran','9856789012','Salt Lake, Kolkata','kiran@drivers.in'),(8,'Shiv','9867890123','Palayam, Thiruvananthapuram','shiv@drivers.in'),(9,'Laxmi','9878901234','Sector 18, Noida','laxmi@drivers.in'),(10,'Anil','9889012345','Viman Nagar, Pune','anil@drivers.in'),(11,'Rekha','9890123456','BTM Layout, Bengaluru','rekha@drivers.in'),(12,'Farhan','9901234567','Kothrud, Pune','farhan@drivers.in'),(13,'Jyoti','9912345678','Hitech City, Hyderabad','jyoti@drivers.in'),(14,'Ashok','9923456789','Sector 15, Chandigarh','ashok@drivers.in'),(15,'Shanti','9934567890','Velachery, Chennai','shanti@drivers.in'),(16,'Ramesh','9945678901','New Alipore, Kolkata','ramesh@drivers.in'),(17,'Geeta','9956789012','Rajouri Garden, Delhi','geeta@drivers.in'),(18,'Tarun','9967890123','Sector 22, Gurgaon','tarun@drivers.in'),(19,'Preeti','9978901234','Juhu, Mumbai','preeti@drivers.in'),(20,'Hari','9989012345','Banjara Hills, Hyderabad','hari@drivers.in');
/*!40000 ALTER TABLE `Drivers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Menu`
--

DROP TABLE IF EXISTS `Menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Menu` (
  `menu_id` int NOT NULL AUTO_INCREMENT,
  `restaurant_id` int NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`menu_id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `Menu_ibfk_1` FOREIGN KEY (`restaurant_id`) REFERENCES `Restaurants` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Menu`
--

LOCK TABLES `Menu` WRITE;
/*!40000 ALTER TABLE `Menu` DISABLE KEYS */;
INSERT INTO `Menu` VALUES (1,1,'Veg Biryani',200.00),(2,2,'Grilled Chicken',350.00),(3,3,'Mutton Curry',400.00),(4,4,'Pav Bhaji',150.00),(5,5,'Chaat Platter',120.00),(6,6,'Aloo Parantha',80.00),(7,7,'Dosa',100.00),(8,8,'Thali',250.00),(9,9,'Chicken Kebab',350.00),(10,10,'Paneer Tikka',220.00),(11,11,'Cheese Pizza',450.00),(12,12,'Masala Dosa',130.00),(13,13,'Butter Chicken',320.00),(14,14,'Bhaji Pav',160.00),(15,15,'Samosa',30.00),(16,16,'Hyderabadi Biryani',350.00),(17,17,'Amritsari Kulcha',180.00),(18,18,'Butter Chicken',420.00),(19,19,'Grilled Chicken',350.00),(20,20,'Vada Pav',50.00);
/*!40000 ALTER TABLE `Menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Orders`
--

DROP TABLE IF EXISTS `Orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `restaurant_id` int NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `delivery_status` varchar(20) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `Orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  CONSTRAINT `Orders_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `Restaurants` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Orders`
--

LOCK TABLES `Orders` WRITE;
/*!40000 ALTER TABLE `Orders` DISABLE KEYS */;
INSERT INTO `Orders` VALUES (1,1,1,500.00,'Delivered'),(2,2,2,899.50,'Pending'),(3,3,3,1299.00,'Delivered'),(4,4,4,749.75,'In Progress'),(5,5,5,299.99,'Cancelled'),(6,6,6,249.49,'Delivered'),(7,7,7,1040.20,'Pending'),(8,8,8,359.99,'In Progress'),(9,9,9,449.99,'Cancelled'),(10,10,10,1320.10,'Delivered'),(11,11,11,773.30,'Pending'),(12,12,12,549.80,'In Progress'),(13,13,13,655.55,'Delivered'),(14,14,14,365.65,'Pending'),(15,15,15,945.45,'Delivered'),(16,16,16,780.80,'Cancelled'),(17,17,17,310.99,'Delivered'),(18,18,18,245.45,'Pending'),(19,19,19,599.99,'In Progress'),(20,20,20,1349.99,'Delivered');
/*!40000 ALTER TABLE `Orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Payment`
--

DROP TABLE IF EXISTS `Payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Payment` (
  `payment_id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`payment_id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Orders` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Payment`
--

LOCK TABLES `Payment` WRITE;
/*!40000 ALTER TABLE `Payment` DISABLE KEYS */;
INSERT INTO `Payment` VALUES (1,1,'UPI',500.00,'Completed'),(2,2,'Cash',899.50,'Pending'),(3,3,'Credit Card',1299.00,'Completed'),(4,4,'Net Banking',749.75,'In Progress'),(5,5,'UPI',299.99,'Failed'),(6,6,'Cash',249.49,'Completed'),(7,7,'Credit Card',1040.20,'Pending'),(8,8,'UPI',359.99,'In Progress'),(9,9,'Credit Card',449.99,'Failed'),(10,10,'Cash',1320.10,'Completed'),(11,11,'UPI',773.30,'Pending'),(12,12,'Net Banking',549.80,'In Progress'),(13,13,'Credit Card',655.55,'Completed'),(14,14,'Cash',365.65,'Pending'),(15,15,'UPI',945.45,'Completed'),(16,16,'Net Banking',780.80,'Failed'),(17,17,'Credit Card',310.99,'Completed'),(18,18,'UPI',245.45,'Pending'),(19,19,'Net Banking',599.99,'In Progress'),(20,20,'Cash',1349.99,'Completed');
/*!40000 ALTER TABLE `Payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Rating`
--

DROP TABLE IF EXISTS `Rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Rating` (
  `rating_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `restaurant_id` int NOT NULL,
  `rating` int NOT NULL,
  PRIMARY KEY (`rating_id`),
  KEY `user_id` (`user_id`),
  KEY `restaurant_id` (`restaurant_id`),
  CONSTRAINT `Rating_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`),
  CONSTRAINT `Rating_ibfk_2` FOREIGN KEY (`restaurant_id`) REFERENCES `Restaurants` (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Rating`
--

LOCK TABLES `Rating` WRITE;
/*!40000 ALTER TABLE `Rating` DISABLE KEYS */;
INSERT INTO `Rating` VALUES (1,1,1,5),(2,2,2,4),(3,3,3,5),(4,4,4,3),(5,5,5,4),(6,6,6,5),(7,7,7,4),(8,8,8,3),(9,9,9,2),(10,10,10,5),(11,11,11,4),(12,12,12,5),(13,13,13,3),(14,14,14,4),(15,15,15,5),(16,16,16,2),(17,17,17,5),(18,18,18,3),(19,19,19,4),(20,20,20,5);
/*!40000 ALTER TABLE `Rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Restaurants`
--

DROP TABLE IF EXISTS `Restaurants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Restaurants` (
  `restaurant_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`restaurant_id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Restaurants`
--

LOCK TABLES `Restaurants` WRITE;
/*!40000 ALTER TABLE `Restaurants` DISABLE KEYS */;
INSERT INTO `Restaurants` VALUES (1,'Spicy Treat','15 MG Road, Bengaluru','9876501234'),(2,'Grill House','23 Connaught Place, Delhi','8881234567'),(3,'Curry Bowl','78 Marine Drive, Mumbai','9992345678'),(4,'Street Food Hub','45 Anna Salai, Chennai','7771234567'),(5,'Chaat Bazaar','67 Sector 17, Chandigarh','6666543210'),(6,'Parantha Junction','34 Hazratganj, Lucknow','5559876543'),(7,'Dosa Cart','90 Brigade Road, Bengaluru','4448765432'),(8,'Royal Thali','12 Charminar, Hyderabad','3339876541'),(9,'Kebab Corner','89 Park Street, Kolkata','2225432109'),(10,'Paneer Hut','34 Lal Darwaza, Ahmedabad','1116549873'),(11,'Pizza King','78 Lajpat Nagar, Delhi','0001234567'),(12,'South Indian Delights','23 Besant Nagar, Chennai','8886543210'),(13,'Curry Kitchen','45 Carter Road, Mumbai','7771239874'),(14,'Bhaji Corner','67 Shivaji Park, Mumbai','6668765432'),(15,'Samosa Junction','89 MG Road, Pune','5556541234'),(16,'Biryani World','34 Banjara Hills, Hyderabad','4443216549'),(17,'Amritsari Kulcha','23 Mall Road, Amritsar','3336541234'),(18,'Butter Chicken Hub','78 Defence Colony, Delhi','2227891234'),(19,'Grilled Chicken Joint','12 Electronic City, Bengaluru','1113216547'),(20,'Vada Pav Corner','45 Juhu Beach, Mumbai','0006543210'),(26,'Parantha Junction','34 Hazratganj, Lucknow','5559876543'),(27,'Dosa Cart','90 Brigade Road, Bengaluru','4448765432'),(28,'Royal Thali','12 Charminar, Hyderabad','3339876541'),(29,'Kebab Corner','89 Park Street, Kolkata','2225432109'),(30,'Paneer Hut','34 Lal Darwaza, Ahmedabad','1116549873'),(31,'Pizza King','78 Lajpat Nagar, Delhi','0001234567'),(32,'South Indian Delights','23 Besant Nagar, Chennai','8886543210'),(33,'Curry Kitchen','45 Carter Road, Mumbai','7771239874'),(34,'Bhaji Corner','67 Shivaji Park, Mumbai','6668765432'),(35,'Samosa Junction','89 MG Road, Pune','5556541234'),(36,'Biryani World','34 Banjara Hills, Hyderabad','4443216549'),(37,'Amritsari Kulcha','23 Mall Road, Amritsar','3336541234'),(38,'Butter Chicken Hub','78 Defence Colony, Delhi','2227891234'),(39,'Grilled Chicken Joint','12 Electronic City, Bengaluru','1113216547'),(40,'Vada Pav Corner','45 Juhu Beach, Mumbai','0006543210');
/*!40000 ALTER TABLE `Restaurants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'Nikhil','nikhil.new@example.com','newpass123','9101122335'),(2,'Sonal','sonal.new@example.com','newpass456','9122233445'),(3,'Manish','manish.new@example.com','newpass789','9133344556'),(4,'Radhika','radhika.new@example.com','newpass101','9144455667'),(5,'Kabir','kabir.new@example.com','newpass202','9155566778'),(6,'Maya','maya.new@example.com','newpass303','9166677889'),(7,'Aditya','aditya.new@example.com','newpass404','9177788990'),(8,'Pooja','pooja.new@example.com','newpass505','9188899001'),(9,'Ravi','ravi.new@example.com','newpass606','9199900112'),(10,'Sanya','sanya.new@example.com','newpass707','9200011223'),(11,'Vikas','vikas.new@example.com','newpass808','9211122334'),(12,'Jaya','jaya.new@example.com','newpass909','9222233445'),(13,'Neeraj','neeraj.new@example.com','newpass010','9233344556'),(14,'Tanvi','tanvi.new@example.com','newpass111','9244455667'),(15,'Rohit','rohit.new@example.com','newpass212','9255566778'),(16,'Shreya','shreya.new@example.com','newpass313','9266677889'),(17,'Arvind','arvind.new@example.com','newpass414','9277788990'),(18,'Divya','divya.new@example.com','newpass515','9288899001'),(19,'Ishaan','ishaan.new@example.com','newpass616','9299900112'),(20,'Kritika','kritika.new@example.com','newpass717','9300011223');
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-10-13 13:30:37
