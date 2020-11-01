/*
SQLyog Community v13.0.1 (64 bit)
MySQL - 10.1.32-MariaDB : Database - esms_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `db_roles` */

DROP TABLE IF EXISTS `db_roles`;

CREATE TABLE `db_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(765) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `db_roles` */

insert  into `db_roles`(`id`,`name`) values 
(1,'Super_admin'),
(2,'Admin'),
(3,'Headmaster'),
(4,'Teacher'),
(5,'Guardian'),
(6,'Employee'),
(7,'Accountant'),
(8,'Student');

/*Table structure for table `db_sms_templates` */

DROP TABLE IF EXISTS `db_sms_templates`;

CREATE TABLE `db_sms_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(765) DEFAULT NULL,
  `body` varchar(765) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `db_sms_templates` */

insert  into `db_sms_templates`(`id`,`title`,`body`) values 
(1,'Holiday','Tomorrow will be an off day.');

/*Table structure for table `db_users` */

DROP TABLE IF EXISTS `db_users`;

CREATE TABLE `db_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation_id` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `password` varchar(765) DEFAULT NULL,
  `email` varchar(765) DEFAULT NULL,
  `username` varchar(765) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `db_users` */

insert  into `db_users`(`id`,`designation_id`,`role`,`password`,`email`,`username`) values 
(1,1,4,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','teacher@mail.com','teacher'),
(2,1,5,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','guardian@mail.com','guardian'),
(3,1,3,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','headmaster@mail.com','headmaster'),
(4,1,2,'$2y$10$AAD.l6BJp1fOuawnDwYMG.zF6c8vwAkdpbRkGbozlzh53qDUx9HWS','admin@mail.com','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
