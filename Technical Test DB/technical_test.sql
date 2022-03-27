/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.4.21-MariaDB : Database - technical_test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`technical_test` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `technical_test`;

/*Table structure for table `barangs` */

DROP TABLE IF EXISTS `barangs`;

CREATE TABLE `barangs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) DEFAULT NULL,
  `lokasi` varchar(100) DEFAULT NULL,
  `tersedia` varchar(100) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `barangs` */

insert  into `barangs`(`id`,`nama_barang`,`lokasi`,`tersedia`,`satuan`,`keterangan`,`status`,`created_at`,`updated_at`) values 
(1,'ATK0 - Amplop Coklat Jaya','L0R0A','13','Pax','-','terpenuhi','2022-03-27 21:22:18',NULL),
(2,'ATK1 - Amplop Coklat Jaya','L1R1A','15','Pax','-','terpenuhi','2022-03-27 21:33:30',NULL),
(3,'ATK2 - Amplop Coklat Jaya','L2R2A','12','Pax','-','terpenuhi','2022-03-27 21:22:17',NULL),
(4,'ATK3 - Amplop Coklat Jaya','L3R3A','11','Pax','-','terpenuhi','2022-03-27 21:22:16',NULL),
(5,'ATK4 - Amplop Coklat Jaya','L4R4A','10','Pax','-','terpenuhi','2022-03-27 21:35:29',NULL),
(6,'ATK5 - Amplop Coklat Jaya','L5R5A','25','Pax','-','terpenuhi','2022-03-27 21:14:57',NULL),
(7,'ATK6 - Amplop Coklat Jaya','L6R6A','19','Pax','-','terpenuhi','2022-03-27 21:14:59',NULL),
(8,'ATK7 - Amplop Coklat Jaya','L7R7A','18','Pax','-','terpenuhi','2022-03-27 21:15:00',NULL),
(9,'ATK8 - Amplop Coklat Jaya','L8R8A','15','Pax','-','terpenuhi','2022-03-27 21:15:01',NULL),
(10,'ATK9 - Amplop Coklat Jaya','L9R9A','12','Pax','-','terpenuhi','2022-03-27 21:15:03',NULL),
(11,'ATK10 - Amplop Coklat Jaya','L10R10A','13','Pax','-','terpenuhi','2022-03-27 21:15:06',NULL);

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(100) DEFAULT NULL,
  `nama_customer` varchar(100) DEFAULT NULL,
  `departement` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

/*Data for the table `customers` */

insert  into `customers`(`id`,`nik`,`nama_customer`,`departement`,`created_at`,`updated_at`) values 
(1,'832771227775','Ahmad','IT','2022-03-26 08:14:09',NULL),
(2,'905024140331','Bagus','Security','2022-03-26 08:14:09',NULL),
(3,'564337340491','Dina','Event Organizer','2022-03-26 08:14:09',NULL),
(4,'124499570086','Jonathan','Man Power Supply','2022-03-26 08:14:09',NULL),
(5,'354369690405','Gita','Administrasi','2022-03-26 08:14:09',NULL),
(6,'233540594727','Tami','Finance','2022-03-26 08:14:09',NULL),
(7,'423426422575','Imam','Sekertaris','2022-03-26 08:14:09',NULL),
(8,'572787743343','Ghea','Training','2022-03-26 08:14:09',NULL),
(9,'323576989412','Ziva','Legal','2022-03-26 08:14:09',NULL),
(10,'688984451201','Risa','Bisinis','2022-03-26 08:14:09',NULL),
(11,'471189367825','Rahmat','Procurement','2022-03-26 08:14:09',NULL);

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permintaans` */

DROP TABLE IF EXISTS `permintaans`;

CREATE TABLE `permintaans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `kuantiti` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `permintaans` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`remember_token`,`created_at`,`updated_at`) values 
(1,'Jaka Dwi Pamungkas','jakadwipamungkas@gmail.com',NULL,'$2y$10$Zef2SuNqwUqP0KsvzMqJmORxksy9qXoB94rTnEZzNgUMq0XiO6sy.',NULL,'2022-03-26 01:25:46','2022-03-26 01:25:46');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
