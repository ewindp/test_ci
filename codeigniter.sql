/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 10.4.21-MariaDB : Database - codeigniter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`codeigniter` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `codeigniter`;

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(17) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `timestamps` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `products` */

insert  into `products`(`id`,`title`,`description`,`image`,`status`,`timestamps`) values 
(1,'PRODUCT A','DESCRIPTION A',NULL,1,'2022-07-21 16:26:06'),
(2,'PRODUCT B','DESCRIPTION B',NULL,1,'2022-07-21 16:26:06'),
(3,'PRODUCT C','DESCRIPTION C',NULL,1,'2022-07-21 16:26:06'),
(4,'PRODUCT D','DESCRIPTION D',NULL,1,'2022-07-21 16:26:06'),
(5,'PRODUCT E','DESCRIPTION E',NULL,1,'2022-07-21 16:26:06'),
(6,'PRODUCT F','DESCRIPTION F',NULL,1,'2022-07-21 16:26:06');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `active` int(1) DEFAULT 0,
  `verified` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`name`,`active`,`verified`) values 
(1,'aaa','AAA',1,1),
(2,'bbb','BBB',1,1),
(3,'ccc','CCC',0,0);

/*Table structure for table `users_products` */

DROP TABLE IF EXISTS `users_products`;

CREATE TABLE `users_products` (
  `id` int(17) NOT NULL AUTO_INCREMENT,
  `id_product` int(17) DEFAULT NULL,
  `id_user` int(17) DEFAULT NULL,
  `price` double DEFAULT 0,
  `qty` int(17) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `users_products` */

insert  into `users_products`(`id`,`id_product`,`id_user`,`price`,`qty`) values 
(1,1,1,10,10),
(2,1,2,20,10),
(3,1,3,30,10),
(4,2,1,15,10),
(5,2,2,20,10),
(6,2,3,25,10),
(7,3,1,20,10),
(8,3,2,25,10),
(9,3,3,35,10);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
