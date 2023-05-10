/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.4.28-MariaDB : Database - todolist
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`todolist` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `todolist`;

/*Table structure for table `todolist` */

DROP TABLE IF EXISTS `todolist`;

CREATE TABLE `todolist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `isComplete` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `todolist` */

insert  into `todolist`(`id`,`name`,`date`,`userId`,`isComplete`) values (35,'Hugas hugas2','2023-05-09 00:00:00',13,NULL),(36,'Birthday ni Adriel','2023-05-02 00:00:00',13,NULL),(39,'Mang laba tayo with BOEK <3','2023-05-09 11:50:00',17,NULL),(44,'Hugas hugas2','2023-05-10 13:11:00',17,1),(45,'wazap','2023-05-30 13:29:00',17,1),(46,'wazap','2023-05-10 13:32:00',17,1),(47,'wa','2023-05-10 13:33:00',17,1),(48,'awd','2023-05-10 13:33:00',17,1),(49,'wew','2023-05-30 13:34:00',17,1),(50,'wazap','2023-05-10 13:35:00',17,1),(51,'awa','2023-05-10 13:36:00',17,1),(52,'wazap','2023-05-10 13:37:00',17,1),(53,'awd','2023-05-10 13:37:00',17,1);

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` blob DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`password`) values (17,'Kaykay','827ccb0eea8a706c4c34a16891f84e7b');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
