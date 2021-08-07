# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.29)
# Database: hielo
# Generation Time: 2020-10-30 10:32:26 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table abilities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `abilities`;

CREATE TABLE `abilities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table ability_role
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ability_role`;

CREATE TABLE `ability_role` (
  `role_id` bigint(20) unsigned NOT NULL,
  `ability_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`,`ability_id`),
  KEY `ability_role_ability_id_foreign` (`ability_id`),
  CONSTRAINT `ability_role_ability_id_foreign` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ability_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table activities
# ------------------------------------------------------------

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) unsigned NOT NULL,
  `subject_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `causer_id` int(10) unsigned NOT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activities_subject_id_index` (`subject_id`),
  KEY `activities_causer_id_index` (`causer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;

INSERT INTO `activities` (`id`, `subject_id`, `subject_type`, `causer_id`, `causer_type`, `description`, `created_at`, `updated_at`)
VALUES
	(1,35,'App\\User',81,'super-admin','updated','2020-10-30 10:30:32','2020-10-30 10:30:32');

/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bookmarks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bookmarks`;

CREATE TABLE `bookmarks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `bookmarks_post_id_author_id_unique` (`post_id`,`author_id`),
  KEY `bookmarks_author_id_foreign` (`author_id`),
  CONSTRAINT `bookmarks_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bookmarks_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `bookmarks` WRITE;
/*!40000 ALTER TABLE `bookmarks` DISABLE KEYS */;

INSERT INTO `bookmarks` (`id`, `author_id`, `post_id`, `status`, `created_at`, `updated_at`)
VALUES
	(1,41,21,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(2,43,22,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(3,45,23,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(4,47,24,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(5,49,25,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(6,51,26,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(7,53,27,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(8,55,28,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(9,57,29,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(10,59,30,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(11,61,31,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(12,63,32,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(13,65,33,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(14,67,34,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(15,69,35,'archieved','2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(16,71,36,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(17,73,37,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(18,75,38,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(19,77,39,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(20,79,40,NULL,'2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(21,101,2,'archieved','2020-10-28 10:52:23','2020-10-28 10:52:30');

/*!40000 ALTER TABLE `bookmarks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table comments
# ------------------------------------------------------------

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `author_id` bigint(20) unsigned NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `comments_post_id_foreign` (`post_id`),
  KEY `comments_author_id_foreign` (`author_id`),
  CONSTRAINT `comments_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;

INSERT INTO `comments` (`id`, `post_id`, `author_id`, `body`, `created_at`, `updated_at`)
VALUES
	(1,1,2,'Dolor illum sint repudiandae ducimus consequuntur.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(2,2,4,'Ut ipsum neque dolor sit rem iste praesentium.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(3,3,6,'Blanditiis totam eius dolorum iure ipsam.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(4,4,8,'Et sit dolorem modi et totam quo aut ipsa.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(5,5,10,'Et velit consequuntur distinctio magnam.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(6,6,12,'Necessitatibus ea laboriosam qui dignissimos eligendi voluptatem et.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(7,7,14,'Non voluptas labore et quasi.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(8,8,16,'Est amet sapiente eos placeat qui.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(9,9,18,'Et maxime ullam a.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(10,10,20,'Nemo sunt voluptatem tempore omnis.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(11,11,22,'Modi maxime sit ab voluptatem et nostrum impedit.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(12,12,24,'Iusto soluta vel earum fugiat minus libero voluptas.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(13,13,26,'Adipisci dolorem asperiores quia doloremque facere.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(14,14,28,'Hic accusantium quia quas cumque alias officia.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(15,15,30,'Quo architecto reprehenderit et.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(16,16,32,'Deleniti fuga nihil autem dolor facere quo.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(17,17,34,'Voluptates at neque enim porro veniam totam.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(18,18,36,'Impedit qui minus vel illum reiciendis eum.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(19,19,38,'Doloremque inventore hic earum dolor sit.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(20,20,40,'Optio cumque voluptates sed rerum repellat officiis et.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(24,81,2,'hahha sry','2020-10-28 13:27:36','2020-10-28 13:27:36'),
	(25,81,2,'testing final','2020-10-28 13:28:37','2020-10-28 13:28:37');

/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table follows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `follows`;

CREATE TABLE `follows` (
  `user_id` bigint(20) unsigned NOT NULL,
  `following_user_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`following_user_id`),
  KEY `follows_following_user_id_foreign` (`following_user_id`),
  CONSTRAINT `follows_following_user_id_foreign` FOREIGN KEY (`following_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `follows_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `follows` WRITE;
/*!40000 ALTER TABLE `follows` DISABLE KEYS */;

INSERT INTO `follows` (`user_id`, `following_user_id`, `created_at`, `updated_at`)
VALUES
	(101,2,NULL,NULL),
	(142,2,NULL,NULL);

/*!40000 ALTER TABLE `follows` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table likes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint(20) unsigned NOT NULL,
  `post_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `likes_post_id_author_id_unique` (`post_id`,`author_id`),
  KEY `likes_author_id_foreign` (`author_id`),
  CONSTRAINT `likes_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `likes_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;

INSERT INTO `likes` (`id`, `author_id`, `post_id`, `created_at`, `updated_at`)
VALUES
	(1,2,71,'2020-10-30 10:23:29','2020-10-30 10:23:29'),
	(2,2,9,'2020-10-30 10:23:42','2020-10-30 10:23:42');

/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2020_08_19_074806_create_posts_table',1),
	(5,'2020_08_23_121030_create_comments_table',1),
	(6,'2020_08_25_063757_create_tags_table',1),
	(7,'2020_08_25_140716_create_likes_table',1),
	(8,'2020_09_02_030707_create_follows_table',1),
	(9,'2020_09_05_042646_create_bookmarks_table',1),
	(10,'2020_09_09_042428_create_roles_table',1),
	(11,'2020_09_13_023347_create_activities_table',1),
	(12,'2020_09_14_051827_create_reports_table',1),
	(13,'2020_09_17_061539_create_notifications_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table notifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `notifications`;

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) unsigned NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`)
VALUES
	('553381a2-9e7a-47d4-8621-5f7597a6ffa6','App\\Notifications\\NewComment','App\\User',101,'{\"message\":\"Norma Bartoletti  commented in Nostrum maiores facere aut aut.\",\"link\":\"\\/posts\\/81\"}',NULL,'2020-10-28 13:27:36','2020-10-28 13:27:36'),
	('5725b986-059c-4ac7-95f3-39eeca6906d3','App\\Notifications\\NewComment','App\\User',142,'{\"message\":\"Norma Bartoletti  commented in Nostrum maiores facere aut aut.\",\"link\":\"\\/posts\\/81\"}',NULL,'2020-10-28 13:24:59','2020-10-28 13:24:59'),
	('5c1f735f-31de-4c65-9998-dc60644d9f4c','App\\Notifications\\PostPublished','App\\User',1,'{\"message\":\"Aung Htet Paing published a new post \\\"testing noti\\\"\",\"link\":\"\\/posts\\/82\"}',NULL,'2020-10-28 13:01:26','2020-10-28 13:01:26'),
	('71bd64fb-f9ab-4220-81c1-7160e4a3229c','App\\Notifications\\NewComment','App\\User',2,'{\"message\":\"Norma Bartoletti  commented in Nostrum maiores facere aut aut.\",\"link\":\"\\/posts\\/81\"}','2020-10-28 13:33:55','2020-10-28 13:24:59','2020-10-28 13:33:55'),
	('779de3f9-ff30-4ed4-8ca3-8cceec9243ce','App\\Notifications\\NewComment','App\\User',142,'{\"message\":\"Norma Bartoletti  commented in Nostrum maiores facere aut aut.\",\"link\":\"\\/posts\\/81\"}',NULL,'2020-10-28 13:27:36','2020-10-28 13:27:36'),
	('7c5cd7d6-0d49-4542-a4bd-4a21ae2efdd6','App\\Notifications\\NewComment','App\\User',101,'{\"message\":\"Norma Bartoletti  commented in \\\"Nostrum maiores facere aut aut.\\\"\",\"link\":\"\\/posts\\/81\"}',NULL,'2020-10-28 13:28:37','2020-10-28 13:28:37'),
	('fd2387d7-b49f-4317-8f24-6eb0801df800','App\\Notifications\\NewComment','App\\User',142,'{\"message\":\"Norma Bartoletti  commented in \\\"Nostrum maiores facere aut aut.\\\"\",\"link\":\"\\/posts\\/81\"}',NULL,'2020-10-28 13:28:37','2020-10-28 13:28:37');

/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table post_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `post_tag`;

CREATE TABLE `post_tag` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL,
  `tag_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_tag_post_id_tag_id_unique` (`post_id`,`tag_id`),
  KEY `post_tag_tag_id_foreign` (`tag_id`),
  CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `post_tag` WRITE;
/*!40000 ALTER TABLE `post_tag` DISABLE KEYS */;

INSERT INTO `post_tag` (`id`, `post_id`, `tag_id`, `created_at`, `updated_at`)
VALUES
	(1,71,31,NULL,NULL),
	(2,10,31,NULL,NULL),
	(3,9,31,NULL,NULL),
	(4,8,31,NULL,NULL),
	(5,7,31,NULL,NULL),
	(6,1,31,NULL,NULL),
	(7,2,31,NULL,NULL),
	(8,3,31,NULL,NULL),
	(9,4,31,NULL,NULL),
	(10,5,31,NULL,NULL),
	(11,6,31,NULL,NULL);

/*!40000 ALTER TABLE `post_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` bigint(20) unsigned NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured_image` blob NOT NULL,
  `published_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_author_id_foreign` (`author_id`),
  CONSTRAINT `posts_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `author_id`, `title`, `excerpt`, `content`, `featured_image`, `published_at`, `created_at`, `updated_at`)
VALUES
	(1,1,'Qui et non eius.','Accusantium sapiente aut error sint quos facilis odio.','Sapiente perferendis rerum ullam. Tempora aperiam et non qui. Et ea sint labore praesentium quidem est consequuntur magnam. Atque consequatur laboriosam omnis aliquam rerum ad.',X'66656174757265645F696D616765732F34656233383264343363326637656632633930373830656263633639333637642E6A7067','2020-10-28 10:26:04','2020-10-28 10:25:58','2020-10-28 10:25:58'),
	(2,3,'Voluptas qui quas eos.','Modi rerum voluptas numquam sed veniam sit delectus.','Sint fugit dicta quia ut. Voluptatibus ullam molestiae incidunt quia aut et temporibus. Cum veniam ut modi blanditiis quaerat ea quibusdam.',X'66656174757265645F696D616765732F64393535666139613866376236653164646161646566336663646663613032342E6A7067','2020-10-28 10:26:04','2020-10-28 10:26:04','2020-10-28 10:26:04'),
	(3,5,'Consequuntur repellendus excepturi quae nam quia qui provident.','Quae aut rerum enim.','Et dicta quaerat earum laudantium et commodi voluptates eos. Iusto esse cupiditate animi nihil provident fuga doloremque aut. Est consequatur doloribus odit quis. Velit numquam autem et optio assumenda fuga. Beatae rerum id saepe et a.',X'66656174757265645F696D616765732F66643430353964376636653231383739333964336266383430303465626339342E6A7067','2020-10-28 10:26:04','2020-10-28 10:26:10','2020-10-28 10:26:10'),
	(4,7,'Eos similique labore deserunt suscipit adipisci atque excepturi voluptas.','Est eum qui fugit voluptas exercitationem.','Vero aperiam architecto animi. Quae voluptatem ut eos qui iusto quam sit. Porro reprehenderit non assumenda est eos corrupti. Et non sit qui vero.',X'66656174757265645F696D616765732F66333330643762316566326435373638383866376565326661356339326134622E6A7067','2020-10-28 10:26:04','2020-10-28 10:26:15','2020-10-28 10:26:15'),
	(5,9,'Sequi debitis quibusdam ipsum corporis.','Eos voluptates eveniet possimus aut qui reprehenderit.','Hic ut quibusdam tempora placeat. Tempore at quam aut voluptatem. Et provident odit iusto molestiae placeat eaque nihil. Aliquam magni dignissimos est praesentium.',X'66656174757265645F696D616765732F62633963656438303030326264636333623136313432633834363730663661332E6A7067','2020-10-28 10:26:04','2020-10-28 10:26:21','2020-10-28 10:26:21'),
	(6,11,'Accusantium aut dolor veniam qui.','Nihil dolor ut et id dolore.','Quia tenetur numquam quod veniam nemo eaque eaque. Deleniti ea minima doloribus ab adipisci est architecto. Vel commodi ut aut minus enim consequatur dolorem sit. Ipsum qui quidem nobis ut accusamus repudiandae.',X'66656174757265645F696D616765732F34616465663939633561393034373366383764633866303666373534643866352E6A7067','2020-10-28 10:26:04','2020-10-28 10:26:27','2020-10-28 10:26:27'),
	(7,13,'Magni ut ut voluptas veritatis assumenda officiis.','Sit id in sapiente laudantium quia.','Ut velit nesciunt ut. Quibusdam provident est doloremque omnis sint. Ullam cumque nobis eum. Ex dolorem harum et quisquam.',X'66656174757265645F696D616765732F63306539613861616539303635353361376332653065386536343566346632332E6A7067','2020-10-28 10:26:04','2020-10-28 10:26:33','2020-10-28 10:26:33'),
	(8,15,'Porro eius sit fugit sit.','Ipsam assumenda quis atque repellendus quia amet.','Id quae repellendus sed et eos earum. Impedit dolores voluptatibus ex. Velit est assumenda et totam qui voluptatem dolorum sequi.',X'66656174757265645F696D616765732F35353335396436376237643733616364656661353138353030366165656238332E6A7067','2020-10-28 10:26:04','2020-10-28 10:26:39','2020-10-28 10:26:39'),
	(9,17,'Molestias natus labore pariatur itaque.','Nisi autem ex est fugiat.','Animi aut repudiandae placeat corrupti illum qui. Aliquam minima molestias nam velit quasi consequuntur repellat. Est aut sit non. Iure ratione maxime modi temporibus commodi non occaecati voluptas.',X'66656174757265645F696D616765732F65306631616663363333313161383137656361306634366135333732643361642E6A7067','2020-10-28 10:26:04','2020-10-28 10:26:45','2020-10-28 10:26:45'),
	(10,19,'Architecto veniam maxime porro provident quaerat harum cupiditate.','Odit id labore illum commodi.','Cum tenetur et nihil ut voluptas autem veniam. Eius ex ipsa nisi rerum qui est sit. Aperiam voluptate quod rerum ipsam ea. Enim eum praesentium veniam iusto quae.',X'66656174757265645F696D616765732F37303138653565363765653933643834396666666238376438653833633739612E6A7067','2020-10-28 10:26:04','2020-10-28 10:26:52','2020-10-28 10:26:52'),
	(11,21,'Ratione aut delectus dolor incidunt reprehenderit.','Rerum non blanditiis eum deleniti.','Repellat culpa quam quibusdam ex est suscipit quia consequuntur. Labore iste nostrum nesciunt ut. Sed voluptatum ex repellendus nisi maxime.',X'66656174757265645F696D616765732F34393266376561363434373662656163316537346661383331626335633831342E6A7067','2020-10-28 10:26:04','2020-10-28 10:26:59','2020-10-28 10:26:59'),
	(12,23,'Quo voluptatem et quidem nobis rerum excepturi adipisci enim.','Placeat suscipit explicabo aut neque molestias.','Sed sed delectus et velit ea natus distinctio et. Voluptatem enim totam vero doloremque placeat. Fugit excepturi aperiam odit quisquam qui sed quisquam. Officia corporis aut et voluptatem cum voluptas.',X'66656174757265645F696D616765732F64643961643234393332373232616534373062363832643861616661316337342E6A7067','2020-10-28 10:26:04','2020-10-28 10:27:05','2020-10-28 10:27:05'),
	(13,25,'Perspiciatis velit ut quidem enim magnam sed.','Suscipit ut quod temporibus ipsum sit.','Qui ad error facilis. Molestiae error a inventore consequuntur veritatis consectetur. Ipsa qui nam veritatis. Fugiat sit modi rerum cupiditate.',X'66656174757265645F696D616765732F61623437376435386465346236383065623462646361356436653164663734612E6A7067','2020-10-28 10:26:04','2020-10-28 10:27:11','2020-10-28 10:27:11'),
	(14,27,'Et ut qui illum consequuntur quis sit possimus quam.','Aut aspernatur ab ad.','Corporis quia beatae omnis. Molestiae rerum neque qui sunt eius. Delectus explicabo vel saepe omnis esse cum quod. Aliquid minus delectus perferendis doloribus ipsa ipsa.',X'66656174757265645F696D616765732F33303738316566316535363362393037393934353835636630623236323237352E6A7067','2020-10-28 10:26:04','2020-10-28 10:27:17','2020-10-28 10:27:17'),
	(15,29,'Harum sit repudiandae similique vel nesciunt reiciendis amet.','Minima molestiae eius nam rerum eveniet.','Non sed rerum ut ratione molestiae non. Autem et occaecati deleniti perspiciatis molestias dolores. Voluptas quis iure dolorum doloremque cumque porro.',X'66656174757265645F696D616765732F36613139633861333965643861613838383437373835336137353937346331312E6A7067','2020-10-28 10:26:04','2020-10-28 10:27:22','2020-10-28 10:27:22'),
	(16,31,'Ut non quo in soluta nostrum iusto.','Impedit officia eligendi architecto odit harum.','Assumenda dolores pariatur tempora pariatur esse aut dolorem. Eius assumenda consequatur mollitia praesentium possimus incidunt ipsum. Ex impedit adipisci eius placeat dolorem et.',X'66656174757265645F696D616765732F33326338313634613563636562656661663637353965346337633937373639372E6A7067','2020-10-28 10:26:04','2020-10-28 10:27:30','2020-10-28 10:27:30'),
	(17,33,'Eaque consequatur accusamus quisquam nisi.','Accusamus sunt id quo et aperiam molestias dolorum.','Aspernatur enim ut amet architecto atque et tenetur ut. Dolores quidem nam aliquam aut illum eos. Nihil nisi laudantium eos facere. Dolor nemo in quasi vel eaque repellendus in quae.',X'66656174757265645F696D616765732F38306335646235346461313531326234313133633435373938656536636433632E6A7067','2020-10-28 10:26:04','2020-10-28 10:27:36','2020-10-28 10:27:36'),
	(18,35,'Animi aliquid inventore sit natus fugiat.','Consectetur et et quod hic qui reprehenderit.','Et explicabo quo porro alias inventore aut. Quia ut laborum qui sunt neque harum temporibus. Et vel iusto voluptatem aut. Qui sint aut debitis eum et aut.',X'66656174757265645F696D616765732F34653935383439313865363462323761323965663430613131343863313632662E6A7067','2020-10-28 10:26:04','2020-10-28 10:27:42','2020-10-28 10:27:42'),
	(19,37,'Quasi voluptas qui ab quis non.','Illo non eos omnis possimus velit.','Tempora aliquid adipisci illo veritatis qui voluptas fugit omnis. Tenetur ipsam sunt vel enim nam iure iste. Maiores enim et laudantium sint rerum dicta vero.',X'66656174757265645F696D616765732F63623139333438386432653838306336336162373466383834666635366365642E6A7067','2020-10-28 10:26:04','2020-10-28 10:27:47','2020-10-28 10:27:47'),
	(20,39,'Quas tempore eum aspernatur laboriosam error recusandae non.','Architecto est et modi fugit id suscipit vel.','Voluptatem qui praesentium quia repellat. Possimus consectetur laudantium unde iure inventore aspernatur. In delectus rerum facilis recusandae reprehenderit non.',X'66656174757265645F696D616765732F62386635663836636334633662353333376630666338663565366662323236312E6A7067','2020-10-28 10:26:04','2020-10-28 10:27:52','2020-10-28 10:27:52'),
	(21,42,'Ab quo dolorem qui corrupti repellendus.','A non dolorum consequatur facere et.','Qui natus sit odio. Sapiente ex error id vel. Quo voluptatem cumque quis accusantium dolor placeat minima. Placeat non corrupti consectetur sed odio. Et possimus assumenda temporibus illum.',X'66656174757265645F696D616765732F34343063363831333339333065306137306235363030383361656432343834642E6A7067','2020-10-28 10:26:04','2020-10-28 10:28:02','2020-10-28 10:28:02'),
	(22,44,'Illum quia assumenda et minus provident.','Reprehenderit et corrupti dicta a consequatur.','Sit sint cumque eligendi tempora aut iste ab. Consequatur magnam error nam fuga. Consequatur consequatur maiores dolore qui voluptatibus. Sapiente nobis sit beatae deserunt nulla.',X'66656174757265645F696D616765732F34353762663663336131363437646361346663396132323164353066646332342E6A7067','2020-10-28 10:26:04','2020-10-28 10:28:07','2020-10-28 10:28:07'),
	(23,46,'Nihil laudantium nihil et officia explicabo magnam expedita.','Et sed voluptatibus voluptatem eius mollitia autem.','Doloremque sit ipsam qui aspernatur dolorem. Minima quam praesentium velit qui quo. Eligendi quisquam deserunt consequatur qui. Non deserunt quidem praesentium. Earum veritatis totam aut et.',X'66656174757265645F696D616765732F36306330323762343430613430356131346466623563303466626338326537342E6A7067','2020-10-28 10:26:04','2020-10-28 10:28:12','2020-10-28 10:28:12'),
	(24,48,'Et voluptas nihil eius et doloribus odio.','Non aut aut in nesciunt molestias.','Officiis illum doloribus praesentium veniam deleniti. Est omnis ipsam ab beatae suscipit blanditiis. Molestiae nobis eos soluta ea totam vel.',X'66656174757265645F696D616765732F37376561316239636665353530616235353365333137666237353163643635372E6A7067','2020-10-28 10:26:04','2020-10-28 10:28:18','2020-10-28 10:28:18'),
	(25,50,'Cupiditate molestiae dolorum aliquam veritatis.','Corporis similique ut est rerum tempora esse doloremque hic.','Quibusdam iste maxime adipisci amet ea doloremque. Vitae pariatur voluptatem alias ea et et eum. Quidem minima inventore sed. Illum est quam voluptatem officia.',X'66656174757265645F696D616765732F38633836623437646131343564363839306437353334363530393163326564362E6A7067','2020-10-28 10:26:04','2020-10-28 10:28:24','2020-10-28 10:28:24'),
	(26,52,'Totam esse aspernatur occaecati atque.','Enim aliquid placeat expedita voluptatem iusto dolor dolor.','Explicabo hic aspernatur laborum mollitia distinctio. Quo corrupti ea consequatur aut nisi incidunt eos. Neque aut magnam sint odit et inventore quae.',X'66656174757265645F696D616765732F61333837636465383764616264313737386161613236396638373934313363342E6A7067','2020-10-28 10:26:04','2020-10-28 10:28:29','2020-10-28 10:28:29'),
	(27,54,'Pariatur nam dolores consequuntur placeat ea.','Quos et fuga sequi quis aut sit.','Sunt reprehenderit et ducimus dolor ut voluptate voluptate. Ullam ullam vel harum sed nisi. Dignissimos odio suscipit eos sit alias nobis omnis.',X'66656174757265645F696D616765732F38383530343263616633666465646434343433313564643234303039613663362E6A7067','2020-10-28 10:26:04','2020-10-28 10:28:37','2020-10-28 10:28:37'),
	(28,56,'Delectus maxime corrupti consequatur qui vitae rerum et.','Culpa est distinctio mollitia doloremque enim molestias saepe nulla.','Non quod magni ullam a harum qui sit. Doloremque et atque officiis expedita. Repellat necessitatibus doloremque accusantium reprehenderit nesciunt autem harum. Minus eveniet molestias nam id voluptatem itaque reiciendis. Illum et optio voluptatum aut.',X'66656174757265645F696D616765732F33376236383533373839653565353336613461353236396666616436666337652E6A7067','2020-10-28 10:26:04','2020-10-28 10:28:44','2020-10-28 10:28:44'),
	(29,58,'Blanditiis sed natus ullam consequatur facere exercitationem dolor exercitationem.','Et dolorem in ipsam doloremque vel hic.','Corporis consequatur quisquam qui. Vel sed quod enim repellat eveniet.',X'66656174757265645F696D616765732F63396463333465646236366437386166643839366134383664326231656530312E6A7067','2020-10-28 10:26:04','2020-10-28 10:28:51','2020-10-28 10:28:51'),
	(30,60,'Eum dicta debitis ut nihil temporibus eius iusto autem.','Et minima accusamus temporibus vero.','Voluptatibus saepe in et dolor reprehenderit accusamus. Deserunt non vero et illo aut. Fugit consequatur qui natus veritatis ducimus aliquid saepe. Adipisci maiores rerum sit et qui sunt ut voluptatum.',X'66656174757265645F696D616765732F65366661313161333366383961396230313430313562663365356137343361352E6A7067','2020-10-28 10:26:04','2020-10-28 10:29:02','2020-10-28 10:29:02'),
	(31,62,'Ipsa consectetur itaque accusantium nemo sit aut dolor et.','Ut ut similique dicta ipsum.','Maxime id a voluptas est. Maiores nam odit minus et dolores delectus. Rerum error in eos molestiae tenetur.',X'66656174757265645F696D616765732F36333135666639306539383763643663323166633766643837666566363462302E6A7067','2020-10-28 10:26:04','2020-10-28 10:29:08','2020-10-28 10:29:08'),
	(32,64,'Voluptatem dolor quasi sunt.','Est nisi eligendi inventore voluptatem magni qui.','Facere quod iusto quasi natus. Nam aut voluptas rerum vitae enim non in. Quis qui maiores voluptatum molestiae. Aperiam id odit qui blanditiis nobis.',X'66656174757265645F696D616765732F61323336326661383931383435323331616633396566386331333330656561612E6A7067','2020-10-28 10:26:04','2020-10-28 10:29:14','2020-10-28 10:29:14'),
	(33,66,'Incidunt in dicta assumenda laudantium.','Voluptas dolor aliquid qui esse.','Enim esse ea error nam. Aut quisquam veniam magni. Sunt voluptas eligendi fugit fugit. Adipisci aspernatur iusto numquam maxime. Quibusdam fuga officia cumque dolorem error inventore qui.',X'66656174757265645F696D616765732F','2020-10-28 10:26:04','2020-10-28 10:29:23','2020-10-28 10:29:23'),
	(34,68,'Exercitationem dolorem et numquam accusantium asperiores.','Temporibus fugiat culpa assumenda.','Magnam consequatur officia est ad. Consequatur aspernatur amet veritatis aliquam numquam et dicta quibusdam. Corrupti incidunt illum aut aut. Ea provident officia esse quisquam.',X'66656174757265645F696D616765732F63353338333363666133623537383337326633633234633566623661653433612E6A7067','2020-10-28 10:26:04','2020-10-28 10:29:29','2020-10-28 10:29:29'),
	(35,70,'Fugit expedita voluptate ipsum nulla et voluptas non.','Temporibus itaque dolor atque eligendi.','Dolorum consequatur quibusdam in nobis eum sed amet commodi. Inventore maiores qui debitis illum. Rem quidem voluptatem cum ratione. Enim harum qui laboriosam quod deserunt.',X'66656174757265645F696D616765732F66386564303933646537303063303336646531316231663766643564336638322E6A7067','2020-10-28 10:26:04','2020-10-28 10:29:36','2020-10-28 10:29:36'),
	(36,72,'Iusto qui ea cupiditate sint.','Rerum nemo aperiam aut reiciendis est.','Quia nesciunt vel neque ipsum nostrum inventore ut. Accusantium qui est et quas. Qui dolorem quia enim qui aliquam vel dolorem illo. Corporis commodi omnis nesciunt veritatis mollitia consequuntur et.',X'66656174757265645F696D616765732F62666532623830386131666638383264633636613539633561363836626432352E6A7067','2020-10-28 10:26:04','2020-10-28 10:29:43','2020-10-28 10:29:43'),
	(37,74,'Et libero saepe aliquam dolor dolores quis aut.','Sunt natus minima autem est velit consequatur.','Ea nesciunt esse culpa ab quam ut velit possimus. Facere quod ut laborum maiores voluptatum repellendus. Sint aut iste id non.',X'66656174757265645F696D616765732F33366338373738323662363035653463356238626534343261616232366336622E6A7067','2020-10-28 10:26:04','2020-10-28 10:29:49','2020-10-28 10:29:49'),
	(38,76,'Est dolorem voluptas iste dolorum nemo.','Qui aut amet pariatur.','Et et et quae quo illum. Nulla nesciunt est sed totam veritatis et voluptas. Vel omnis aut omnis quo voluptatibus optio harum consequatur. Ut provident sed neque voluptate eum atque.',X'66656174757265645F696D616765732F37653338623231343566376161336165393063383062633732383061376263342E6A7067','2020-10-28 10:26:04','2020-10-28 10:29:55','2020-10-28 10:29:55'),
	(39,78,'Quam necessitatibus animi dolor ut.','Alias quos aut et officia molestiae qui sit.','Velit totam quaerat sed beatae quia ea. Reprehenderit iure minus voluptate quasi consequatur impedit. Dolore porro eaque ullam. Minima perspiciatis qui suscipit molestiae quas quidem et.',X'66656174757265645F696D616765732F66646435616332323065323437386538663039636666626563396231656666652E6A7067','2020-10-28 10:26:04','2020-10-28 10:30:02','2020-10-28 10:30:02'),
	(40,80,'Dignissimos cupiditate nihil accusantium et.','Nam occaecati perspiciatis ab eligendi labore.','Et a beatae ea ducimus aut omnis facilis. Harum praesentium aut velit et quisquam. Beatae quod dolorum voluptas asperiores.',X'66656174757265645F696D616765732F64393637346639323532316239333831353332643236323564653066383839612E6A7067','2020-10-28 10:26:04','2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(41,102,'Dolore illum voluptatum expedita reprehenderit.','Et nostrum est alias omnis nam illo deserunt quas.','Qui debitis aperiam aut ea quas ipsum dolorum. Et amet iure fugit voluptatum. Recusandae molestiae recusandae perspiciatis eligendi earum soluta aliquid quo. Incidunt voluptate et repellat debitis sed voluptatem.',X'66656174757265645F696D616765732F64333937666534323933303430373136326666626662326230313064383166652E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(42,103,'Recusandae rerum sit nemo aperiam nesciunt.','Qui possimus blanditiis quis ea nobis illo accusamus.','Est qui ut similique non nisi veniam. Ut distinctio delectus modi neque sit similique. Corrupti rerum a et.',X'66656174757265645F696D616765732F34613561666333396533643530633537613734366234626438383932323939652E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(43,104,'Harum ea sapiente ipsum repudiandae vel voluptatem asperiores.','Laudantium dolore eveniet sed enim non ducimus dolorum qui.','Eos alias suscipit quam aut. Quia eaque odit quia temporibus adipisci voluptas tempora. Numquam libero sed quod qui dignissimos voluptatem qui vel.',X'66656174757265645F696D616765732F33633639393230333365306362646134613032343361383739383862316664372E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(44,105,'Autem voluptatem et ut voluptatibus et quia.','Ea quis rerum ea voluptatum.','Autem exercitationem non ipsa. Ab vitae dolorem est odio incidunt. Saepe molestiae incidunt mollitia repellendus deserunt ut quia. Mollitia perspiciatis quam ut dicta vero cum.',X'66656174757265645F696D616765732F64633932646634613931666462363332633566333063646465356563623963632E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(45,106,'Consequatur asperiores fuga est occaecati est eveniet.','Sed commodi aut repudiandae nihil rerum.','Id quia sint nam voluptatibus quo. Quod dolor dolorem et. Pariatur qui est qui. Dolores neque architecto ut quas.',X'66656174757265645F696D616765732F39356264626134373734336237326232366264336337343332386664646363662E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(46,107,'Ullam iure placeat voluptates pariatur sit consectetur enim.','Dolor molestiae ut modi quos consequuntur facere.','Qui et rerum tenetur id recusandae quo consequatur. Optio impedit qui voluptatem omnis. Nulla velit quia aut voluptas nemo dicta incidunt velit. Ut sint itaque aut temporibus veniam molestiae. Aspernatur necessitatibus enim labore ut nihil voluptas et.',X'66656174757265645F696D616765732F32366264303937396332316431353731323466383162346263323430346332352E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(47,108,'Nesciunt velit explicabo mollitia ad.','Magnam cupiditate et neque laudantium culpa quasi repudiandae.','Sed ut unde non recusandae. Totam tempore porro est enim sit. Quas necessitatibus eum ipsum expedita aliquam velit.',X'66656174757265645F696D616765732F66373831303031323733303166373939373466373961633033613236393036352E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(48,109,'Eum ut ut dolores et.','Voluptatem veniam consequatur nostrum eveniet veritatis consectetur dolore mollitia.','Illum sunt ea deleniti facilis optio aperiam. A temporibus doloribus ducimus et magni voluptas dolorem provident. Suscipit delectus magni veritatis id ut expedita itaque.',X'66656174757265645F696D616765732F37613964366337306261353839353732313139303462353563653739393161382E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(49,110,'Nobis aut nihil sit.','Sunt quia esse optio facilis et quis.','Quod et inventore mollitia tempora nisi dolores omnis provident. Quia eveniet consectetur quas qui. Molestias eligendi eveniet quidem sed iure.',X'66656174757265645F696D616765732F30646132363939623364643361363433336132623164383737376133386535312E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(50,111,'Non dolorum maxime aut laborum dolore ipsum quaerat.','Qui aut eius qui illo hic ex placeat.','Incidunt quia nesciunt pariatur ducimus odit quidem odit. Sequi aut aperiam iste et. Qui consequatur et cupiditate atque consequatur. Sint facere magni ea. Dolorum occaecati repellat impedit numquam explicabo.',X'66656174757265645F696D616765732F62356339326562333761303166623037633332303162666533653561386637652E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(51,112,'Sint molestias odit et provident repellat.','Adipisci ut placeat non.','Est possimus veniam maiores aut. Voluptas facere saepe et. Dolorem distinctio rerum maxime quia omnis. A architecto quia harum laborum.',X'66656174757265645F696D616765732F32316333396165383132353133663930326633326333323966303266613561382E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:42','2020-10-28 10:35:42'),
	(52,113,'Id vitae voluptatibus architecto.','Aliquid assumenda qui repellendus beatae et accusantium minima.','Quo perferendis neque a aut nam reprehenderit. Molestiae eos assumenda itaque vel ut voluptatibus ut. Qui voluptate inventore ea omnis. Corporis ea dolor molestiae vel.',X'66656174757265645F696D616765732F31656463326535316563343737643638616333656362393334306566313638302E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:42','2020-10-28 10:35:42'),
	(53,114,'Saepe quidem impedit veritatis eum ut harum explicabo eveniet.','Dolorem nemo natus suscipit explicabo sunt dignissimos ullam temporibus.','Consequuntur est non iste consequatur. Illo odio voluptate omnis fugiat. Nobis quos cupiditate aut quaerat sed dignissimos. Veritatis et maiores est provident.',X'66656174757265645F696D616765732F31363031313161653066333137613463333038393633373666333934366430662E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:42','2020-10-28 10:35:42'),
	(54,115,'Rerum consectetur consectetur quia temporibus.','Iste itaque qui deserunt quasi ea dolore.','Quae sint ducimus sit impedit et. Consequatur velit vel maiores deleniti adipisci quia nesciunt. Hic amet molestiae incidunt ullam atque.',X'66656174757265645F696D616765732F64626465353665383437306263613932323037306363643438396136656261372E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:42','2020-10-28 10:35:42'),
	(55,116,'Laborum atque odit perferendis corrupti deserunt optio fuga voluptatem.','Doloremque nulla dolorum ut.','Qui aut quia quisquam blanditiis deleniti. Quos voluptatum est accusantium id ducimus distinctio repellat. In voluptatum qui id quia. Eum id autem soluta.',X'66656174757265645F696D616765732F62336463333930616266353432313566323966363865313537663631336336382E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:42','2020-10-28 10:35:42'),
	(56,117,'Consequatur unde modi aut amet culpa.','Ipsam voluptatem velit est fuga placeat.','Commodi et non exercitationem debitis necessitatibus mollitia. Et illum voluptate accusantium error. Non nulla fugit quod perferendis.',X'66656174757265645F696D616765732F65353738303862656433316161363138373731386530306535666133373766622E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:42','2020-10-28 10:35:42'),
	(57,118,'Est corrupti deleniti amet numquam facere quia.','Ea dolorem delectus voluptatem corporis.','Vel recusandae nesciunt dolor quia. Veritatis consequuntur maxime pariatur non excepturi hic porro similique. Enim optio praesentium ut porro mollitia fuga eius. Eos facilis cumque sed omnis.',X'66656174757265645F696D616765732F66383035356261393936656639306633643438663765613139636661303466332E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:42','2020-10-28 10:35:42'),
	(58,119,'Architecto accusamus quae eaque voluptatem animi est.','Inventore architecto ut qui quis voluptatibus.','Qui omnis molestias facilis. Minus est natus ratione rerum iure non. Dolore non qui sunt ducimus ratione et sunt. Sit magni repellendus a voluptatem et cumque non ea.',X'66656174757265645F696D616765732F37666537323532346433343936613131366666323334616236643933613966622E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:42','2020-10-28 10:35:42'),
	(59,120,'Quia cumque delectus id autem magnam voluptates.','Doloremque dolore omnis quis ratione eveniet laboriosam eum ipsa.','Molestiae veritatis soluta mollitia sit sequi. Pariatur quia sed quia sed saepe. Voluptas excepturi quisquam ut amet doloremque accusamus tenetur sit. Delectus eius ipsa qui qui.',X'66656174757265645F696D616765732F62326237366537646532663132356635316662373236653563323831633764302E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:42','2020-10-28 10:35:42'),
	(60,121,'Assumenda qui dignissimos nisi molestiae.','Ut praesentium nihil molestiae optio illum doloremque.','Quibusdam doloremque impedit atque voluptatem quae ab consequatur. Aliquid voluptatem ipsam sequi corporis minus. Odio perferendis magni ea magni.',X'66656174757265645F696D616765732F39373565623563623835383435343930633732663037383433636434393063612E6A7067','2020-10-28 10:26:04','2020-10-28 10:35:42','2020-10-28 10:35:42'),
	(61,122,'At neque corrupti sed officiis vitae enim et ut.','Qui consequuntur fugit ex ea ratione quia debitis iste.','Est corrupti consequatur cupiditate necessitatibus modi commodi nemo. Et beatae quam consectetur dolorem nobis optio voluptas.',X'66656174757265645F696D616765732F38386666653362663864646137333934646137323638636634336134393837392E6A7067','2020-10-28 10:26:04','2020-10-28 10:37:39','2020-10-28 10:37:39'),
	(62,123,'Et hic ut suscipit rerum dolores consequatur.','Tempore veritatis omnis debitis quaerat qui quia.','Voluptas veritatis dolorum eos. Rerum aspernatur ratione voluptas unde hic voluptatem ab. Et dolores voluptatem voluptatem culpa et quia odio. Expedita voluptas ducimus dolorem consequatur beatae autem.',X'66656174757265645F696D616765732F33623239353164353433623833313163386238376166373163353834626661632E6A7067','2020-10-28 10:26:04','2020-10-28 10:37:39','2020-10-28 10:37:39'),
	(63,124,'Nesciunt quis eaque quam perferendis provident suscipit.','Maiores sed quasi ipsum architecto voluptatem repudiandae.','Unde maiores maxime temporibus. Dolores earum ut mollitia quas cupiditate animi culpa.',X'66656174757265645F696D616765732F35663839376565663038623366353033343037626130346130303962396336342E6A7067','2020-10-28 10:26:04','2020-10-28 10:37:39','2020-10-28 10:37:39'),
	(64,125,'Corporis voluptatibus nihil ut in enim modi dolores.','Ratione ad dignissimos dolorem amet.','Saepe optio sed in est. Tempora porro nihil ratione voluptas suscipit expedita officiis. Dolorem voluptatem expedita error omnis. Officiis ut totam nostrum in magni explicabo repellendus.',X'66656174757265645F696D616765732F30333833353839366235616333393361613261623266656364646631316138372E6A7067','2020-10-28 10:26:04','2020-10-28 10:37:40','2020-10-28 10:37:40'),
	(65,126,'Et quia officia animi consectetur.','Porro omnis quis qui quia fugit temporibus ab.','Enim perferendis magnam nihil soluta qui. Sit necessitatibus eum molestiae ut sunt rerum sed. Eos vitae vero itaque harum officia mollitia. Voluptas perspiciatis possimus nulla omnis consequatur eos eligendi blanditiis.',X'66656174757265645F696D616765732F36373435363933353237613164656130346638633638633831323865643636332E6A7067','2020-10-28 10:26:04','2020-10-28 10:37:40','2020-10-28 10:37:40'),
	(66,127,'Hic pariatur maxime enim quaerat architecto quia nam qui.','Assumenda officia architecto qui ad ad modi harum.','Velit suscipit doloribus at voluptas qui et dignissimos. Ipsa quia quia consectetur in architecto facere. Quos tenetur id ea et quos vel. Sint laboriosam et iste quidem voluptate quia.',X'66656174757265645F696D616765732F30653861326433353131323362303861346333393563353035656237386435332E6A7067','2020-10-28 10:26:04','2020-10-28 10:37:40','2020-10-28 10:37:40'),
	(67,128,'Iste commodi esse hic vero.','Perspiciatis eius eaque magni ratione consequatur.','Quo voluptas aspernatur nisi dolorem eos. Nulla eaque quis in consequatur dolores. Dignissimos culpa sit id sunt. Consequuntur sit quasi nam error.',X'66656174757265645F696D616765732F36313137323665616163316162333431633765663936306132656333386237652E6A7067','2020-10-28 10:26:04','2020-10-28 10:37:40','2020-10-28 10:37:40'),
	(68,129,'Quidem quia nisi rem possimus.','Qui aut est deserunt omnis unde aspernatur ducimus dolorem.','Vel ut sed aut voluptatem et. Error id tempora laudantium in magnam hic cumque. Et amet mollitia nihil eos perferendis officia deserunt. Omnis quisquam vitae sit modi ut.',X'66656174757265645F696D616765732F30303931626234616239663464656466613163373437326432626435653935652E6A7067','2020-10-28 10:26:04','2020-10-28 10:37:40','2020-10-28 10:37:40'),
	(69,130,'Voluptates quidem consequatur necessitatibus fuga rem id blanditiis.','Nihil at qui voluptatum voluptates consequatur accusamus.','Quis quia quis consequatur ab. Eligendi saepe hic quasi repellat rerum. Et ut doloremque in facilis sed laborum ratione. Perspiciatis velit quae recusandae commodi et qui.',X'66656174757265645F696D616765732F33383234326231313737303563626339393639396239386236343762313334312E6A7067','2020-10-28 10:26:04','2020-10-28 10:37:40','2020-10-28 10:37:40'),
	(70,131,'Voluptatem animi ex totam ea eos omnis omnis.','Est et eos sed eveniet dolor labore itaque accusamus.','Numquam optio ut ipsam deserunt. Occaecati hic rem labore dolor esse non. Quo ea assumenda reiciendis consectetur. Fugiat et a et provident enim.',X'66656174757265645F696D616765732F35386636363230363735326362313361376639393238373834623634333362362E6A7067','2020-10-28 10:26:04','2020-10-28 10:37:40','2020-10-28 10:37:40'),
	(71,132,'Sed saepe animi aut nesciunt.','Aut quis illum aut magni impedit.','Est cum consequatur corporis modi consequatur soluta. Ratione nam enim doloremque autem quia voluptas. Omnis sit velit recusandae est ab vel hic.',X'66656174757265645F696D616765732F31373232666135303734613562613066323130366232346164373665363137322E6A7067','2020-10-28 10:40:30','2020-10-28 10:40:30','2020-10-28 10:40:30'),
	(72,133,'Vero ratione quas rerum.','Quam et quia velit ipsum vero assumenda.','Sed labore ipsam est aliquam repudiandae et. Eum aut omnis quis sunt non voluptas eligendi. Dicta aut dolorem consectetur odio velit dignissimos id.',X'66656174757265645F696D616765732F33316533323966613134343035646435303536323462373238393038363833622E6A7067','2020-11-28 10:40:30','2020-10-28 10:40:31','2020-10-28 10:40:31'),
	(73,134,'Nulla cumque commodi et minus id.','Qui aliquid facilis et quod voluptas soluta reiciendis.','Aut quos sed molestias doloribus atque. Non quisquam similique autem facilis qui. Voluptatem ipsum totam dolorem omnis. Reiciendis sed error rem sunt repudiandae aspernatur tempore. Deleniti et odit rerum non aut modi laborum alias.',X'66656174757265645F696D616765732F39393032626661653136346233363438326132663665653730333637633566352E6A7067','2020-11-28 10:40:30','2020-10-28 10:40:31','2020-10-28 10:40:31'),
	(74,135,'Ut tempora voluptatum error aut quo.','Eaque delectus et qui non numquam amet quis fugit.','Inventore ut quaerat pariatur et. Mollitia consequatur quos pariatur voluptatem fuga. Non eius non nobis.',X'66656174757265645F696D616765732F36643134636666383630386465373263333335333065376330626561383930332E6A7067','2020-11-28 10:40:30','2020-10-28 10:40:31','2020-10-28 10:40:31'),
	(75,136,'Laborum laborum et qui iure.','Eius recusandae architecto adipisci consequuntur quo et necessitatibus.','Unde beatae nobis sunt et consectetur. Expedita quisquam amet illum consectetur. Autem consequatur praesentium et ratione veniam hic autem.',X'66656174757265645F696D616765732F32653831303732323130323430386230613365373462326661396633363932302E6A7067','2020-11-28 10:40:30','2020-10-28 10:40:31','2020-10-28 10:40:31'),
	(76,137,'Explicabo laboriosam quia ea est natus eveniet.','Ut rerum ut modi aut aperiam.','Ratione voluptas quia natus ullam praesentium ab ipsum. Ut molestiae alias est. Odio magnam facere quibusdam.',X'66656174757265645F696D616765732F32663835663765386638663435336365383932323834313362363834616466332E6A7067','2020-11-28 10:40:30','2020-10-28 10:40:31','2020-10-28 10:40:31'),
	(77,138,'Aliquid velit dolor autem odio sed velit quisquam.','Enim minus ullam facilis sunt fuga autem.','Molestiae voluptatibus cumque est consequatur natus. Maxime veniam tempore quia distinctio. Voluptates in impedit accusamus aut autem eos ipsum.',X'66656174757265645F696D616765732F66663362643133323631373237663465643865656339626237616336393934352E6A7067','2020-11-28 10:40:30','2020-10-28 10:40:31','2020-10-28 10:40:31'),
	(78,139,'Aut asperiores optio minima rerum nesciunt minima.','Voluptatem laborum nesciunt beatae non dolorem.','Enim et impedit nam non dolores dolorem autem. Iusto molestias est dolorem accusamus ex. Accusamus cupiditate harum asperiores quo quas vel mollitia. Consequatur nobis ut incidunt rem dolorem libero.',X'66656174757265645F696D616765732F64656137333230653132623733643633653430613639616666373361663530642E6A7067','2020-11-28 10:40:30','2020-10-28 10:40:31','2020-10-28 10:40:31'),
	(79,140,'Debitis impedit sapiente accusamus suscipit temporibus tempora.','Quisquam numquam facilis et officiis voluptatem ut enim.','Esse inventore qui nesciunt et libero. Corrupti eum ab aut minus blanditiis nulla nam. In rerum et quisquam doloremque temporibus dolores praesentium omnis.',X'66656174757265645F696D616765732F33313834323261323165663661663930383561653535366639393131353266342E6A7067','2020-11-28 10:40:30','2020-10-28 10:40:31','2020-10-28 10:40:31'),
	(80,141,'Pariatur exercitationem quibusdam corporis in adipisci est aut.','Consectetur cum illo minima voluptas molestiae ut.','Est enim repellendus eum rerum tempore inventore. Id eos praesentium dolores velit est et. Ut magnam et voluptatem similique blanditiis numquam. Nulla perferendis id minima quae ipsum.',X'66656174757265645F696D616765732F38326633646430343365656566366330346332616337373033623931306261652E6A7067','2020-11-28 10:40:30','2020-10-28 10:40:31','2020-10-28 10:40:31'),
	(81,142,'Nostrum maiores facere aut aut.','Rerum necessitatibus tempore quis nihil et reprehenderit dicta.','Delectus dolor asperiores est voluptatem sint ut quisquam. Quis ut error delectus qui magni iusto labore et. Ad voluptas nihil quo consequatur doloremque.',X'66656174757265645F696D616765732F30346465386338366536336264653234396333666437636335313436643663382E6A7067','2020-10-28 10:52:02','2020-10-28 10:52:04','2020-10-28 10:52:04');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table reports
# ------------------------------------------------------------

DROP TABLE IF EXISTS `reports`;

CREATE TABLE `reports` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `subject_id` bigint(20) unsigned NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_user_id_index` (`user_id`),
  KEY `reports_subject_id_index` (`subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table role_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`)
VALUES
	(81,1,'2020-10-28 10:32:56','2020-10-28 10:32:56');

/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`)
VALUES
	(1,'super-admin','SuperAdmin','2020-10-28 10:32:56','2020-10-28 10:32:56');

/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tags_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Enrique Schamberger','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(2,'Dr. Patrick Lowe I','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(3,'Marjolaine Schulist','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(4,'Jaida Ernser Jr.','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(5,'Marcelino Koepp','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(6,'Felix Kuhlman','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(7,'Makayla Wiegand IV','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(8,'Jimmy Bednar','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(9,'Julia Luettgen','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(10,'Prof. Brain Jones','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(11,'Duane Quigley','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(12,'Sandra Purdy','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(13,'Jayden DuBuque DVM','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(14,'Jamaal Rodriguez III','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(15,'Miss Ivory Lynch','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(16,'Garrick Thompson V','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(17,'Diamond Gleason','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(18,'Darby Rosenbaum','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(19,'Felipa Cartwright','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(20,'Quincy Rolfson','2020-10-28 10:27:55','2020-10-28 10:27:55'),
	(21,'Buck Towne','2020-10-28 10:34:25','2020-10-28 10:34:25'),
	(22,'Marlin Dooley','2020-10-28 10:34:25','2020-10-28 10:34:25'),
	(23,'Mafalda Robel','2020-10-28 10:34:26','2020-10-28 10:34:26'),
	(24,'Stacey Pfeffer','2020-10-28 10:34:26','2020-10-28 10:34:26'),
	(25,'Mrs. Lilly Schamberger DDS','2020-10-28 10:34:26','2020-10-28 10:34:26'),
	(26,'Kaylee Crist DVM','2020-10-28 10:36:57','2020-10-28 10:36:57'),
	(27,'Jett Gerhold IV','2020-10-28 10:36:58','2020-10-28 10:36:58'),
	(28,'Elenor Kub','2020-10-28 10:36:58','2020-10-28 10:36:58'),
	(29,'Prof. Kaelyn Auer','2020-10-28 10:36:58','2020-10-28 10:36:58'),
	(30,'Idell Tillman III','2020-10-28 10:36:58','2020-10-28 10:36:58'),
	(31,'Mrs. Herta Champlin I','2020-10-28 10:39:51','2020-10-28 10:39:51'),
	(32,'Lora Upton','2020-10-28 10:39:52','2020-10-28 10:39:52'),
	(33,'Mr. Blaise Torphy','2020-10-28 10:39:52','2020-10-28 10:39:52'),
	(34,'Ms. Roslyn Stamm','2020-10-28 10:39:52','2020-10-28 10:39:52'),
	(35,'Dr. Luna Borer IV','2020-10-28 10:39:52','2020-10-28 10:39:52');

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_bio` text COLLATE utf8mb4_unicode_ci,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'avatars/default.jpg',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `short_bio`, `avatar`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Cindy Morar','randall.weimann@example.com','2020-10-28 10:32:56','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/c41a0ad8b3e7fe9ee9afb366c3ed0ddc.jpg','tjCYXvSpbLIWjIoJ1L4OUM2i2IG4jThmr4gTX719nFoyEq4asWX09PqQZBsT','2020-10-28 10:25:57','2020-10-28 10:25:57'),
	(2,'Norma Bartoletti','qrobel@example.net','2020-10-28 10:32:56','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/fbc6b412acb6dc549f1d8cf2bf6526af.jpg','e7WdSHpzodlarJUskZrfBJrduiHGAG43oCj5ztJzwCFiuFHLp9wwgFPabNoa','2020-10-28 10:26:00','2020-10-28 10:26:00'),
	(3,'Marge Thompson','ekessler@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/b019a7e9075ead8a6f9a638575cfb64d.jpg','yO9iUpNpCv','2020-10-28 10:26:04','2020-10-28 10:26:04'),
	(4,'Tatyana Beatty','swolff@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/216c3f218daed54cca52fb49df2c21cb.jpg','pxoqRrT0yP','2020-10-28 10:26:06','2020-10-28 10:26:06'),
	(5,'Breanna Kuhic','wpouros@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/0f24360f0a2d4e26094c411ff04bc7d0.jpg','yRQ6LbEDB3','2020-10-28 10:26:10','2020-10-28 10:26:10'),
	(6,'Jackie Ward','torey34@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/9503327bd8575601da963a0821abef47.jpg','g5nvbQ9dmD','2020-10-28 10:26:12','2020-10-28 10:26:12'),
	(7,'Margot Thiel','schultz.caleb@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/3b7614662a2822eb7460251dcb5b13d0.jpg','sLF8wixuT8','2020-10-28 10:26:15','2020-10-28 10:26:15'),
	(8,'Zola Balistreri','hailee66@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/5a8231f94474aefdb2dfd963de62962a.jpg','nMrXp7pFFM','2020-10-28 10:26:17','2020-10-28 10:26:17'),
	(9,'Alysha Strosin','hmcclure@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/8ba5a10078278fac1dd3f3ab12adf77e.jpg','p9HBHTC8AO','2020-10-28 10:26:21','2020-10-28 10:26:21'),
	(10,'Elody Mohr','kpollich@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/d911ac8f0c5c1e01a7e522b1ad8e4b6d.jpg','Np6l7tA9jg','2020-10-28 10:26:23','2020-10-28 10:26:23'),
	(11,'Kira Bosco','vmann@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/c1160bfd4be94924208934a778c42033.jpg','iwcm8xkqvc','2020-10-28 10:26:27','2020-10-28 10:26:27'),
	(12,'Daija Kreiger MD','chodkiewicz@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/6365e664c68f512f61e8826a97e7cd16.jpg','2nXIcgkY3I','2020-10-28 10:26:29','2020-10-28 10:26:29'),
	(13,'Burdette Denesik','uwitting@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/065ba23ac8bb7975c0734fafe409083f.jpg','MApQlOfwKZ','2020-10-28 10:26:33','2020-10-28 10:26:33'),
	(14,'Andres Daugherty','chyna09@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/5f7fb612009d4b1f0c197910bcccf14d.jpg','pfAmmQFAWN','2020-10-28 10:26:35','2020-10-28 10:26:35'),
	(15,'Tad VonRueden','holden.block@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/694a7c30c8f882ac63f163b4b64a423b.jpg','d9aT9QTjOv','2020-10-28 10:26:39','2020-10-28 10:26:39'),
	(16,'Arielle Grady','keeling.jamal@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/064b23490ab0660b1da25beb1f3788b1.jpg','kPMxZ932zK','2020-10-28 10:26:41','2020-10-28 10:26:41'),
	(17,'Julian Koss','lamar84@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/4da9c950d703a25e7f4fa2fb04f29b7e.jpg','czXJgnjoIq','2020-10-28 10:26:45','2020-10-28 10:26:45'),
	(18,'Neva Kemmer','dhuels@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/66418a7817e4429c3c61aa6a3704cb50.jpg','Zszf68EvJc','2020-10-28 10:26:47','2020-10-28 10:26:47'),
	(19,'Coleman Ondricka','jaclyn83@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/4fcfa15d23fdf450076425f7d2425034.jpg','e0o62TT5Fp','2020-10-28 10:26:52','2020-10-28 10:26:52'),
	(20,'Gina Reichert','champlin.audreanne@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/fd35be8c602796559dc7e4decf40b5ca.jpg','OcKUaWr4kk','2020-10-28 10:26:54','2020-10-28 10:26:54'),
	(21,'Neha Purdy','hackett.cheyenne@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/298bb0d36acf86c7516aea0b5bc2104d.jpg','D5QucH8g6t','2020-10-28 10:26:59','2020-10-28 10:26:59'),
	(22,'Dr. Gonzalo Cremin MD','leonora76@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/0b57d4b199b06487c608f94af4914226.jpg','O2XfpadDOH','2020-10-28 10:27:01','2020-10-28 10:27:01'),
	(23,'Juwan Sporer','ryan.lonny@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/546419c0c97c9904dfdc136d1fafec6c.jpg','hN23o0iCtk','2020-10-28 10:27:05','2020-10-28 10:27:05'),
	(24,'Earlene Bechtelar Sr.','fkunde@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/b7ae3b0a9c46d0843c47984c089a942a.jpg','BQsYbOz7pE','2020-10-28 10:27:07','2020-10-28 10:27:07'),
	(25,'Miss Camille Bahringer V','roma.wilderman@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/b0faa654de6beb2d6032c6fd84669668.jpg','JpTBCLryw9','2020-10-28 10:27:11','2020-10-28 10:27:11'),
	(26,'Lucio Walsh','xheidenreich@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/49e58980e4a3d1b0c7d243c5357c9e09.jpg','shfGdUvgq8','2020-10-28 10:27:13','2020-10-28 10:27:13'),
	(27,'Darby Sipes','gharber@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/b2bb214c39847fd3fbddedcd434a3983.jpg','NXFPoAVP9m','2020-10-28 10:27:16','2020-10-28 10:27:16'),
	(28,'Berry Emmerich','ayden.hoeger@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/3825655df04d915a232e0be86bf9b737.jpg','5zcz5X0Ylj','2020-10-28 10:27:18','2020-10-28 10:27:18'),
	(29,'Name McDermott III','hartmann.caesar@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/84fa76ebd7b144e2ea0983ce63a53489.jpg','At5fvX6q7E','2020-10-28 10:27:22','2020-10-28 10:27:22'),
	(30,'Jarret Kozey V','hschoen@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/02f81a062ec15f7a73f90242f2343b26.jpg','D1I607SvfF','2020-10-28 10:27:25','2020-10-28 10:27:25'),
	(31,'Jayme Dooley','walter.annie@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/a77991eb04d69446e9603c56388a0015.jpg','rKIT9haf07','2020-10-28 10:27:30','2020-10-28 10:27:30'),
	(32,'Chadrick Heaney','medhurst.brenna@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/8e559587f76469d245ffa85f044329ce.jpg','ebwvaWLEKQ','2020-10-28 10:27:31','2020-10-28 10:27:31'),
	(33,'Damon Oberbrunner','pbins@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/4d811322b46e7e7b3d44f7215b8ca7b9.jpg','mZiJoCjTHb','2020-10-28 10:27:36','2020-10-28 10:27:36'),
	(34,'Miss Kristin Kessler','jairo18@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/502df3e208da212c5d361d3111713397.jpg','ocULqClh59','2020-10-28 10:27:38','2020-10-28 10:27:38'),
	(35,'Abby Holland','annalise66@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/602cbeb895c8752bc23b3f8599d7eaff.jpg','KuWeVhJ7mE','2020-10-28 10:27:42','2020-10-30 10:30:32'),
	(36,'Kailyn Gottlieb','marguerite16@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/7ff2511e298eb8806cc49c8c20dd4f52.jpg','iYJy0CT2C2','2020-10-28 10:27:43','2020-10-28 10:27:43'),
	(37,'Princess Mante','moore.sean@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/37064ec80502e6aeb98257c9f0fda372.jpg','dOet9Bol7B','2020-10-28 10:27:47','2020-10-28 10:27:47'),
	(38,'Steve Baumbach','heidi.leuschke@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/3e994c510d449644b2dc4884535dd13b.jpg','uBCIZLSL3n','2020-10-28 10:27:49','2020-10-28 10:27:49'),
	(39,'Brooke Pollich','botsford.isaias@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/d84b0a26fc12e09647d8c007bf8f2401.jpg','chgWQDo641','2020-10-28 10:27:52','2020-10-28 10:27:52'),
	(40,'Karina Davis','flindgren@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/f38f9ff612490407454b75145eeb2d09.jpg','kScPo7YAdN','2020-10-28 10:27:54','2020-10-28 10:27:54'),
	(41,'Rosario Tillman','domenico.witting@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/27ebebd86f774ee1ab4760067b036048.jpg','vZomjIu7pf','2020-10-28 10:27:58','2020-10-28 10:27:58'),
	(42,'Colton Hoppe','evans.raynor@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/d8ead714da31a89c5416d253369e79b6.jpg','dqbrCU4Kgn','2020-10-28 10:28:02','2020-10-28 10:28:02'),
	(43,'Mrs. Myrtle Gleichner','larson.susanna@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/3bcba95e2b62adbc9c21e7432e5aa642.jpg','7kspI374T5','2020-10-28 10:28:04','2020-10-28 10:28:04'),
	(44,'Vada Waters','antonietta10@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/0a2b0f055d7f02896961412f1673995b.jpg','9yWg6r7oGJ','2020-10-28 10:28:07','2020-10-28 10:28:07'),
	(45,'Haleigh Pfannerstill','jayme29@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/af6c47840aa83d0ab77944261b2d4192.jpg','M6hVfTLEjg','2020-10-28 10:28:08','2020-10-28 10:28:08'),
	(46,'Dayana Veum','helene93@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/f5bae50d77ecb5df201e73b19bd4ed08.jpg','TS2Z5xem3J','2020-10-28 10:28:12','2020-10-28 10:28:12'),
	(47,'Yesenia Rohan','collier.krystel@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/ba3d75bd39ead065e40b568f2963c334.jpg','DntaditTI2','2020-10-28 10:28:14','2020-10-28 10:28:14'),
	(48,'Amos Huels MD','madeline76@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/b51cc78e9e42abdd8cc05d52e6f1b97c.jpg','g2B80GQcPn','2020-10-28 10:28:18','2020-10-28 10:28:18'),
	(49,'Prof. Norbert Sauer V','michele.murray@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/6912b264ec8c61c04dfa9e132323c067.jpg','V4pkMD6w1Y','2020-10-28 10:28:20','2020-10-28 10:28:20'),
	(50,'Dr. Dedric Hane Sr.','waters.fred@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/68813776ff1505a7e46dfabaacb85080.jpg','tHsvdlNZnI','2020-10-28 10:28:24','2020-10-28 10:28:24'),
	(51,'Tatyana Wiza','troy.johns@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/6b253f8ce89ac2458ac6639fd36b183b.jpg','lmD79PVw0k','2020-10-28 10:28:26','2020-10-28 10:28:26'),
	(52,'Jayme Kshlerin','julian79@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/a9344bf31db05d9301eb7f2261180e4b.jpg','EiKDhaNG3Z','2020-10-28 10:28:29','2020-10-28 10:28:29'),
	(53,'Hobart O\'Kon','ankunding.barbara@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/02b9bcd4558843c63b9db0dbd854a8fa.jpg','oTxrKaq3O7','2020-10-28 10:28:31','2020-10-28 10:28:31'),
	(54,'Adelia O\'Keefe','fgutkowski@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/2a69228f2b061b7a27c96927e02f6234.jpg','2MrDb3Pd7Z','2020-10-28 10:28:37','2020-10-28 10:28:37'),
	(55,'Mr. Chad Jerde IV','carmine22@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/c1656df371bb3d4c0543fda14a3083a5.jpg','P1qA5mjblP','2020-10-28 10:28:39','2020-10-28 10:28:39'),
	(56,'Ana Rowe III','vandervort.asia@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/7068f7ac4c572cdfef602d580b255389.jpg','DN2Eh1jpXG','2020-10-28 10:28:44','2020-10-28 10:28:44'),
	(57,'Fay King','kane.smitham@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/59315f54b9b194f73eed9cfca695153d.jpg','Wo4VZKrwLl','2020-10-28 10:28:45','2020-10-28 10:28:45'),
	(58,'Wayne Bashirian MD','csawayn@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/5d8cdb7ee7521c8add9831306c3b70b2.jpg','0XeJV3VNiw','2020-10-28 10:28:50','2020-10-28 10:28:50'),
	(59,'Gracie Brown','fabiola.mclaughlin@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/22dad3d5e38274ef17e47b7fec6877f5.jpg','451QAVlLdl','2020-10-28 10:28:58','2020-10-28 10:28:58'),
	(60,'Julien Swift','waters.wilhelm@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/3123983f1a06a1eb885bc64a64d1ec08.jpg','g2al1eYI6r','2020-10-28 10:29:02','2020-10-28 10:29:02'),
	(61,'Augusta Brakus MD','hayden.wolf@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/67d48201d2eaf658ef5d03443432b2c2.jpg','EQJorGtOfw','2020-10-28 10:29:04','2020-10-28 10:29:04'),
	(62,'Estell Gorczany','hagenes.amie@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/50b2327626cf65f568e55a9ec8575848.jpg','Bui2em1bWC','2020-10-28 10:29:08','2020-10-28 10:29:08'),
	(63,'Pete Lind','grant.berneice@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/86ba4fd19d72e94f7d8cd863d31e90d6.jpg','vIZHDMM53G','2020-10-28 10:29:10','2020-10-28 10:29:10'),
	(64,'Devon Kirlin','alena52@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/f06b875a44a866f5b991dc12d548afc5.jpg','sfnxXveAns','2020-10-28 10:29:14','2020-10-28 10:29:14'),
	(65,'Ruthe Sporer III','joesph16@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/b10e64e0d1dc67ed123f6e3236d3b686.jpg','sOdKd9NFzT','2020-10-28 10:29:16','2020-10-28 10:29:16'),
	(66,'Ms. Dovie Moen Sr.','joan.rath@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/a4f052838d6708c8ba1b75af836f52a7.jpg','QiITK2as6E','2020-10-28 10:29:23','2020-10-28 10:29:23'),
	(67,'Dortha Armstrong','eichmann.anthony@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/7a8a4a163c28e0ea4dbb8835c3920785.jpg','dpUVDMseMK','2020-10-28 10:29:25','2020-10-28 10:29:25'),
	(68,'Muhammad Sawayn','billy.feil@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/bce6187047a797d7e19d53aa46cd9fc9.jpg','FHvrmhzAWZ','2020-10-28 10:29:29','2020-10-28 10:29:29'),
	(69,'Haylie Pfeffer','qmonahan@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/07d84d40c381a889739ce15f231292d4.jpg','0vylTHKQlk','2020-10-28 10:29:31','2020-10-28 10:29:31'),
	(70,'Leatha Feeney','nettie.barrows@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/5255215f528088f9eb89ab5508811869.jpg','sGGfS3YvSJ','2020-10-28 10:29:36','2020-10-28 10:29:36'),
	(71,'Elissa Skiles Sr.','schumm.kelli@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/9a748ba8d1807ef2fa91ae12b8a1e767.jpg','AcHaitk3K8','2020-10-28 10:29:38','2020-10-28 10:29:38'),
	(72,'Dr. Dana Doyle DDS','cora19@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/cad6c4a74470fc338ff9ad007f2b6d1f.jpg','XRjA0PiBdn','2020-10-28 10:29:43','2020-10-28 10:29:43'),
	(73,'Alejandrin Skiles MD','qwilkinson@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/06afbc67116cb83cceddac806680f446.jpg','wNJmbet8d2','2020-10-28 10:29:45','2020-10-28 10:29:45'),
	(74,'Dr. Joany Fritsch V','dicki.laney@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/d0b8ff29564ac919814138db9d294cf5.jpg','iLwIjdfaM4','2020-10-28 10:29:49','2020-10-28 10:29:49'),
	(75,'Prof. Libbie Pacocha','bstehr@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/c6ee8ad1e947d603be601545ad680d5d.jpg','Wro4M5wnME','2020-10-28 10:29:51','2020-10-28 10:29:51'),
	(76,'Mr. Miller Schmeler PhD','katelyn17@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/c6bbdd245f9dba5e6d2325079d727e3f.jpg','Zm2JCdIliM','2020-10-28 10:29:55','2020-10-28 10:29:55'),
	(77,'Madison Pfannerstill','hailey.williamson@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/a3164e61915e0c35f17428fcbec3b9a6.jpg','FaDLv8K7jt','2020-10-28 10:29:57','2020-10-28 10:29:57'),
	(78,'Theresia Skiles','dvandervort@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/4731a10534d365fabc6a44f928a24512.jpg','2lz5ojJwmI','2020-10-28 10:30:02','2020-10-28 10:30:02'),
	(79,'Althea Langosh II','frida.hyatt@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/8abfb84ba935d6133c1a40bfe3640e19.jpg','ApN74itxu6','2020-10-28 10:30:34','2020-10-28 10:30:34'),
	(80,'Amira Grimes','dtromp@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/09d248905013af5df589d37ba8fd910f.jpg','RguVYRHTnI','2020-10-28 10:30:38','2020-10-28 10:30:38'),
	(81,'ahp','ahp@email.com','2020-10-28 10:32:56','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/default.jpg',NULL,'2020-10-28 10:32:56','2020-10-28 10:32:56'),
	(82,'Evelyn Mills','felicia95@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/b620fa49e90c508a0598ec814f263a5e.jpg','7YxR1Tx0XPVvBSEdup8erYmxzW9CXy97aNYR6fJVey9qEz5JGLWX8EEgPEd3','2020-10-28 10:33:32','2020-10-28 10:33:32'),
	(83,'Kristin Blanda','jane10@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/2452a1eea635dbc6f13522730f71e092.jpg','3ogkT4nZus','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(84,'Jennifer Pfannerstill PhD','mayer.jamel@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/5baa688343401981523c4649e7a129cb.jpg','JZ4ZUHLO3y','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(85,'Mr. Demarcus Raynor','glover.buster@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/6c27cd280c448a1928273add3ae59cb1.jpg','uKGYb5HJxS','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(86,'Ozella Hill','delia47@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/47c72a6e8af4805da1c40cea91c1ef91.jpg','2DfLsdb5cJ','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(87,'Georgianna Renner','hpredovic@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/eb2cce7dc6c932c5c3162a26c0c8f4a9.jpg','n1YJPcBMmu','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(88,'Shaniya Glover','delores.steuber@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/76c78fd8ac586ba494d76edddaa12bab.jpg','D9AnZP4vQl','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(89,'Jacynthe Ankunding I','frieda53@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/9ca55dd5240a990daf3e7962531f26e5.jpg','esTqagDDFo','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(90,'Ms. Laury Douglas Jr.','nikolaus.dessie@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/d7d89457557064b1db5d42bcb41287d5.jpg','BroOlK4VZj','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(91,'Tristin Hodkiewicz','dconnelly@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/caca44b0cf08b7d22d1e46424945d756.jpg','kFPMD52Y44','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(92,'Macie Adams','marks.maryse@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/b47f50cd73f3e213b991fe639019aa86.jpg','sYQQZDYEw2','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(93,'Eliane Schroeder','schiller.duane@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/a6e87a67aefbb0281db3a1e16aaf6a67.jpg','35Ni11haxJ','2020-10-28 10:33:33','2020-10-28 10:33:33'),
	(94,'Rosina Block','gsporer@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/15feb4c5673f25262a5d8e30f397e9a8.jpg','xEyeJJm4S2','2020-10-28 10:33:34','2020-10-28 10:33:34'),
	(95,'Darrion Haley PhD','mckenzie07@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/e03c36a125af8c241d1ebc2e352d7632.jpg','xTKWrU4iUL','2020-10-28 10:33:34','2020-10-28 10:33:34'),
	(96,'Cicero McGlynn','donnie.jacobi@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/07ba63fad6727b7370c4849daacd8d8f.jpg','1yFlrhuMVQ','2020-10-28 10:33:34','2020-10-28 10:33:34'),
	(97,'Brian Littel','hirthe.mellie@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/8ec65c17e53815694624c12fe67ef117.jpg','sHPU6nYVJ8','2020-10-28 10:33:34','2020-10-28 10:33:34'),
	(98,'Mrs. Elaina Hegmann MD','bertha.nitzsche@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/31f66383a6f1fa7fd706cac5dbedc572.jpg','rmqmwjV36h','2020-10-28 10:33:34','2020-10-28 10:33:34'),
	(99,'Elmira Walker','toy.mathias@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/b22ed9ceb0bf1d4c6c67f81db48bc754.jpg','MBRVFwzgmq','2020-10-28 10:33:34','2020-10-28 10:33:34'),
	(100,'Kylie Ruecker','kcartwright@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/0f24154743bfd513e13553f70c4caf36.jpg','AK9OpQGh9b','2020-10-28 10:33:34','2020-10-28 10:33:34'),
	(101,'Prof. Horace Friesen','kiehn.verna@example.net','2020-10-28 10:32:56','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/1b713dcddec851d562a817245c0c827a.jpg','YWddKpfaTy2Ixgmvdb8fQhsbh7Cm5edVAxFYsT880WMUyj4pOJ5aT9UymrX0','2020-10-28 10:33:34','2020-10-28 10:33:34'),
	(102,'Ervin Kling Jr.','npagac@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/25cd18bf6be172277347f354ce2f2fd4.jpg','PxZE4qMAzF','2020-10-28 10:34:29','2020-10-28 10:34:29'),
	(103,'Isidro Schamberger','lorenz06@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/00cc6dab8e0c0ac04f74369fe9f48b49.jpg','Uofys1RKjz','2020-10-28 10:34:33','2020-10-28 10:34:33'),
	(104,'Rhiannon Herzog','elenora11@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/35ec0635e7af3fcd18bf61f70061eb10.jpg','x05qEMlR79','2020-10-28 10:34:37','2020-10-28 10:34:37'),
	(105,'Armani Feeney','cruickshank.anna@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/06c7ce58adc2ff98142299acfec619f3.jpg','m3JswomlfC','2020-10-28 10:34:41','2020-10-28 10:34:41'),
	(106,'Brianne Watsica','pmurphy@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/cc42bbd027c7ebe30d7983bd62c80cdf.jpg','H4gdJ40VFW','2020-10-28 10:34:43','2020-10-28 10:34:43'),
	(107,'Nathaniel Waelchi DVM','waelchi.jarrell@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/323cc3adfc0cb5b28870b931e591149f.jpg','ZBhDgaTL3s','2020-10-28 10:34:48','2020-10-28 10:34:48'),
	(108,'Emilie Crona','stokes.seamus@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/4c804bd09a8dc281882d79de5fbbf0c8.jpg','xQAb4BiMLQ','2020-10-28 10:34:51','2020-10-28 10:34:51'),
	(109,'Prof. Alycia Senger Sr.','breichel@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/a8a32831f1ab9126a94249bea1d6a35e.jpg','sDDt48tljq','2020-10-28 10:34:55','2020-10-28 10:34:55'),
	(110,'Miss Anne Bayer Jr.','gus00@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/f868e99413f508073f09a451930a782c.jpg','X0fanoLRT1','2020-10-28 10:34:59','2020-10-28 10:34:59'),
	(111,'Michel Adams','nicolas.cletus@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/83e906b1d6ccaaec0c4d0188934eb39a.jpg','xB5Joy9sjy','2020-10-28 10:35:03','2020-10-28 10:35:03'),
	(112,'Elissa Bednar','nelson51@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/26cbf7001526595014f1da96052e30ce.jpg','FFF8QX5cPU','2020-10-28 10:35:07','2020-10-28 10:35:07'),
	(113,'Prof. Yadira Hayes','lmcdermott@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/1310695dfd4ef5c75c32f34402395642.jpg','WT8JA2G46O','2020-10-28 10:35:10','2020-10-28 10:35:10'),
	(114,'Davon Brakus','ustanton@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/d07cb26773bb85fafa98a524510785f9.jpg','7Ozpfs4QIg','2020-10-28 10:35:14','2020-10-28 10:35:14'),
	(115,'Melany Beier DVM','marion.ernser@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/db8b443478e954c88ce9ab2b60e7d255.jpg','U4ZSckwXpE','2020-10-28 10:35:17','2020-10-28 10:35:17'),
	(116,'Nettie Parker','qfunk@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/9b8c7b39923f541d5894059bb9e06686.jpg','QIVbam3uCc','2020-10-28 10:35:21','2020-10-28 10:35:21'),
	(117,'Wilhelmine Hagenes','sandy73@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/a07410a3cbaf484f81c3f58a69d04c08.jpg','LIH1WVt99p','2020-10-28 10:35:26','2020-10-28 10:35:26'),
	(118,'Fritz Kuhn','dustin.sawayn@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/126727e8a7091b7bfcc17d1540222e88.jpg','SALKCVcdDH','2020-10-28 10:35:29','2020-10-28 10:35:29'),
	(119,'Minnie Konopelski','lemke.alfredo@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/ba4cf817aa0afec0c098baefa55aaf17.jpg','lapwv2I8cG','2020-10-28 10:35:33','2020-10-28 10:35:33'),
	(120,'Mr. Stuart Bahringer Sr.','ohansen@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/7f82e6a4e2258703e93ac883db6d1411.jpg','eGOMPZ5kNf','2020-10-28 10:35:37','2020-10-28 10:35:37'),
	(121,'Mr. Abraham Ritchie Sr.','mdonnelly@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/d27e26f0028fb93f5f92380022d1dffe.jpg','0L2QdV7rV1','2020-10-28 10:35:41','2020-10-28 10:35:41'),
	(122,'Jackie Larson','daryl.halvorson@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/6242096d2aa83d1ed3d98206e6393c34.jpg','lah3MSnz7T','2020-10-28 10:37:02','2020-10-28 10:37:02'),
	(123,'Cristal Lubowitz Sr.','yundt.vicky@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/e3319b516cad3d2d4a915c3665102507.jpg','jZXu2OnJwA','2020-10-28 10:37:06','2020-10-28 10:37:06'),
	(124,'Vita Nienow','egoyette@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/9f5053f3b674193e72da2ae8e48b0516.jpg','Kc8ugZdzYz','2020-10-28 10:37:11','2020-10-28 10:37:11'),
	(125,'Jaclyn Upton','fritsch.walton@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/eddd05c5899034bbcc969e1d6de6e877.jpg','IqQhflyGx0','2020-10-28 10:37:15','2020-10-28 10:37:15'),
	(126,'Merritt Zieme III','koch.mustafa@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/d561f546cc1b689971e795c4a08bd8c3.jpg','wQRFBXEUM7','2020-10-28 10:37:19','2020-10-28 10:37:19'),
	(127,'Vidal Koch','evan72@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/cb8653778a2588123bd9254cd52f93c3.jpg','oxxfLeDjv6','2020-10-28 10:37:23','2020-10-28 10:37:23'),
	(128,'Trace Oberbrunner','pwiegand@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/4c3ff6d180276a3be1af51a11038a87e.jpg','yzJI5F7qUK','2020-10-28 10:37:26','2020-10-28 10:37:26'),
	(129,'Stephon Johns','bcronin@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/93aa8f5ef66adc8cfb980f217b1cd644.jpg','PsGBvAL4Jb','2020-10-28 10:37:31','2020-10-28 10:37:31'),
	(130,'Prof. Wade Langosh DDS','brown.rosanna@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/bc278fb3e791632d4058b8d83099bb47.jpg','4NcFufoxz9','2020-10-28 10:37:35','2020-10-28 10:37:35'),
	(131,'Jean Adams DDS','faustino.blanda@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/4bd52d9d3333493acde999e73f0b36fa.jpg','cP2G8MFyDA','2020-10-28 10:37:39','2020-10-28 10:37:39'),
	(132,'Damian Wyman','konopelski.delta@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/4597b1fbb0cb14cc65510fbd21fcc926.jpg','6GypKd2hSb','2020-10-28 10:39:56','2020-10-28 10:39:56'),
	(133,'Green Cummerata','caleigh75@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/6e4ad2cd423faf93e55679a8e9421607.jpg','HTpK5Q0h94','2020-10-28 10:39:59','2020-10-28 10:39:59'),
	(134,'Ila Skiles','qbaumbach@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/163f4c03752237665327593fe12bf5ea.jpg','mCwv5VXWDi','2020-10-28 10:40:03','2020-10-28 10:40:03'),
	(135,'Prof. Lamar Hackett','katelynn91@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/10904c9e5a27fb36870defe6b4473d82.jpg','8sNq2Cd9gy','2020-10-28 10:40:07','2020-10-28 10:40:07'),
	(136,'Terence Lakin IV','isai29@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/4c41d89bca2887ccba7c5ad9b534988f.jpg','HjPrJ02RNh','2020-10-28 10:40:11','2020-10-28 10:40:11'),
	(137,'Prof. Mose Jaskolski','frosenbaum@example.com',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/562d84cc7f1daf70c64192c20e02266e.jpg','fWoLNUMbcD','2020-10-28 10:40:15','2020-10-28 10:40:15'),
	(138,'Prof. Rowena McDermott II','xkuphal@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/95f4404d8ce3845a4a9e4c73b6b3186f.jpg','6stAYQicTx','2020-10-28 10:40:18','2020-10-28 10:40:18'),
	(139,'Miss Loren Waelchi I','fbruen@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/10381e13d757f47d6b1bd1a30837b85d.jpg','sUPE7AXV0i','2020-10-28 10:40:22','2020-10-28 10:40:22'),
	(140,'Tre Langworth','kailey39@example.org',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/497e0736e9c902174e1bfd48c0721b04.jpg','T6HyiarWs5','2020-10-28 10:40:25','2020-10-28 10:40:25'),
	(141,'Wilfred O\'Kon','justina82@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/78f58c6695db8a2a1117964b201df6b8.jpg','ht9bE4YPEo','2020-10-28 10:40:30','2020-10-28 10:40:30'),
	(142,'Akeem Schultz V','fadel.skyla@example.net',NULL,'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',NULL,'avatars/80b8521b73cb72507bb581187d11124b.jpg','rixPDzTftm','2020-10-28 10:52:03','2020-10-28 10:52:03'),
	(147,'Aung Htet Paing','1381206595603728@email.com','2020-10-28 13:18:05','$2y$10$K/CbnHRQNrbTtqkRM57dhOgLC12eLoW8cFgfw6LmU5L5KJVyFnvh6',NULL,'avatars/default.jpg','ztSMtTfXduCnAm3qA3mOLUoD6hDNMRQyrkWFqW3xqblNA9ACBFaChCaBH4Fh','2020-10-28 13:18:05','2020-10-28 13:18:05');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
