-- MySQL dump 10.17  Distrib 10.3.13-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: pucom
-- ------------------------------------------------------
-- Server version	10.3.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member`
(
    `username`   varchar(11) NOT NULL,
    `password`   varchar(255) NOT NULL,
    `name`       varchar(20)  NOT NULL,
    `email`      varchar(50)  NOT NULL,
    `phone`      varchar(13)  DEFAULT NULL,
    `postcode`   int(11)      DEFAULT NULL,
    `address`    varchar(100) DEFAULT NULL,
    `used_money` int(11)      DEFAULT 0,
    `membership` varchar(10)  DEFAULT 'FAMILY',
    PRIMARY KEY (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member`
    DISABLE KEYS */;
INSERT INTO `member`
VALUES ('abc', NULL, NULL, NULL, NULL, NULL, NULL, 0, 'FAMILY'),
       ('admin', '$2y$10$KBAxNT01/ptksN0fXoDzZO.P/bS41rL/Thqf70C5c93I7pfqLWO3a', '관리자', 'admin@pu.com', '010-1234-5678',
        31253, '충남 천안시 동남구 병천면 충절로 1600 (한국기술교육대학교) 은솔관', 0, 'FAMILY'),
       ('ddd', '$2y$10$9GSe/lUBMTwxe9QrGM.Fw.nebMjH.ZS3rCjnBouEw2YhkGa09vUq2', 'aaa', 'test@local.host', '', NULL, ' ',
        0, 'FAMILY');
/*!40000 ALTER TABLE `member`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_product`
--

DROP TABLE IF EXISTS `order_product`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_product`
(
    `order_num`   int(11) NOT NULL,
    `product_num` int(11) NOT NULL,
    `quantity`    int(11) DEFAULT NULL,
    PRIMARY KEY (`order_num`, `product_num`),
    KEY `product_num` (`product_num`),
    CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`order_num`) REFERENCES `orders` (`order_num`),
    CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`product_num`) REFERENCES `product` (`num`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_product`
--

LOCK TABLES `order_product` WRITE;
/*!40000 ALTER TABLE `order_product`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `order_product`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders`
(
    `order_num`  int(11)     NOT NULL AUTO_INCREMENT,
    `member`     varchar(11) NOT NULL,
    `order_date` timestamp   NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`order_num`),
    KEY `member` (`member`),
    CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`member`) REFERENCES `member` (`username`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `orders`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post`
(
    `post_num` int(11)     NOT NULL AUTO_INCREMENT,
    `title`    varchar(50) NOT NULL,
    `content`  text     DEFAULT NULL,
    `member`   varchar(11) NOT NULL,
    `wrt_date` datetime DEFAULT current_timestamp(),
    `hits`     int(11)  DEFAULT NULL,
    PRIMARY KEY (`post_num`),
    KEY `member` (`member`),
    CONSTRAINT `post_ibfk_1` FOREIGN KEY (`member`) REFERENCES `member` (`username`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post`
    DISABLE KEYS */;
INSERT INTO `post`
VALUES (1, 'test', 'aaaa', 'abc', '2019-06-08 20:44:07', 0),
       (2, 'second', 'data', 'abc', '2019-06-08 20:49:02', 1);
/*!40000 ALTER TABLE `post`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product`
(
    `num`         int(11)   NOT NULL AUTO_INCREMENT,
    `category`    int(11)            DEFAULT NULL,
    `name`        varchar(50)        DEFAULT NULL,
    `description` text               DEFAULT NULL,
    `price`       decimal(11, 2)     DEFAULT NULL,
    `img_url`     varchar(200)       DEFAULT NULL,
    `upload_date` timestamp NOT NULL DEFAULT current_timestamp(),
    `sales`       int(3)             DEFAULT NULL,
    `product_id`  int(11)            DEFAULT NULL,
    PRIMARY KEY (`num`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 6
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product`
    DISABLE KEYS */;
INSERT INTO `product`
VALUES (1, 300, 'LOGITECH G903', 'G903', 149.99, 'img/g903.jpg', '2019-06-08 13:20:40', 50, 903000),
       (2, 300, 'LOGITECH G703', 'G703', 119.00, 'img/g703.jpg', '2019-06-08 13:23:40', 70, 703000),
       (3, 300, 'LOGITECH G304', 'G304', 59.00, 'img/g304.jpg', '2019-06-08 13:24:50', 70, 304000),
       (4, 300, 'LOGITECH G102', 'G102 Black', 20.00, 'img/g102_b.png', '2019-06-08 13:25:07', 30, 102000),
       (5, 300, 'LOGITECH G102', 'G102 White', 20.00, 'img/g102_w.png', '2019-06-08 13:25:16', 30, 102011);
/*!40000 ALTER TABLE `product`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reply`
(
    `repl_num`  int(11) NOT NULL AUTO_INCREMENT,
    `post_num`  int(11) NOT NULL,
    `comm_date` date DEFAULT current_timestamp(),
    `content`   text DEFAULT NULL,
    PRIMARY KEY (`repl_num`),
    KEY `post_num` (`post_num`),
    CONSTRAINT `reply_ibfk_1` FOREIGN KEY (`post_num`) REFERENCES `post` (`post_num`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reply`
--

LOCK TABLES `reply` WRITE;
/*!40000 ALTER TABLE `reply`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `reply`
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

-- Dump completed on 2019-06-09 16:52:50
