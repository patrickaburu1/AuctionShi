-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bids`;
CREATE TABLE `bids` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `seller_price` int(11) DEFAULT '0',
  `product_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` varchar(255) DEFAULT '0' COMMENT '0 placed 1 won 2 withdrawn',
  `product_status` int(11) DEFAULT '0' COMMENT '0 running 1 sold',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `bids` (`id`, `amount`, `product_name`, `user_name`, `seller_price`, `product_id`, `user_id`, `status`, `product_status`, `created_at`) VALUES
(12,	50000,	'lAPTOP',	'patrick kaburu',	600000,	15,	1,	'1',	0,	'2018-09-09 08:56:26'),
(13,	110000,	'sabaru forester',	'patrick kaburu',	800000,	11,	1,	'0',	0,	'2018-09-09 08:47:24'),
(14,	2000000,	'sabaru forester',	'patrick kaburu',	800000,	11,	1,	'0',	0,	'2018-09-09 08:51:46'),
(15,	9000,	'table',	'patrick kaburu',	8787,	16,	1,	'0',	0,	'2018-09-09 09:01:04'),
(16,	10000,	'table',	'patrick',	8787,	16,	3,	'1',	0,	'2018-09-09 09:04:27'),
(17,	50000,	'sabaru forester',	'patrick',	800000,	11,	3,	'2',	0,	'2018-09-15 12:04:33'),
(18,	100,	'mwiko',	'patrick',	150,	18,	3,	'0',	2,	'2018-09-15 11:34:11'),
(19,	230,	'mwiko',	'patrick',	150,	18,	3,	'1',	2,	'2018-09-15 11:34:11'),
(20,	32,	'43',	'patrick',	34,	19,	3,	'0',	2,	'2018-10-23 17:17:56'),
(21,	400,	'mwiko new',	'patrick',	30000,	17,	3,	'0',	0,	'2018-10-23 16:25:12'),
(22,	34,	'43',	'patrick',	34,	19,	3,	'1',	2,	'2018-10-23 17:17:56');

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1,	'electronics',	'ele'),
(2,	'kitnen',	'');

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1 available, 2 sold out , 3 suspended',
  `category_id` bigint(20) NOT NULL,
  `bidders` int(11) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `sell_by_date` varchar(25) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `products` (`id`, `name`, `description`, `amount`, `status`, `category_id`, `bidders`, `user_id`, `sell_by_date`, `product_image`, `created_at`, `updated_at`) VALUES
(4,	'house',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	98343,	2,	1,	76350,	1,	'2018-09-04',	'http://localhost/AuctionShi/public/productImages/1535172254.jpg',	'2018-09-08 18:45:01',	'2018-09-08 15:45:01'),
(5,	'itel 7',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	676,	2,	1,	4,	1,	'2018-08-15',	'http://localhost/AuctionShi/public/productImages/1535172254.jpg',	'2018-09-09 07:29:35',	'2018-09-09 04:29:35'),
(6,	'One bed room',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	87000,	3,	1,	5,	1,	'2018-08-15',	'http://localhost/AuctionShi/public/productImages/1535172254.jpg',	'2018-09-08 08:44:41',	'2018-09-08 08:44:41'),
(7,	'bed 6*6',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	98,	2,	1,	1,	1,	'2018-08-07',	'http://localhost/AuctionShi/public/productImages/1535172254.jpg',	'2018-09-09 07:29:46',	'2018-09-09 04:29:46'),
(8,	'Gas 6kg ',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	2500,	2,	1,	0,	1,	'2018-08-14',	'http://localhost/AuctionShi/public/productImages/1535172254.jpg',	'2018-09-08 08:45:31',	'2018-09-08 08:45:31'),
(9,	'Blender',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	1500,	2,	1,	1,	1,	'2018-09-05',	'http://localhost/AuctionShi/public/productImages/1535172254.jpg',	'2018-09-09 07:29:43',	'2018-09-09 04:29:43'),
(10,	'Study Table',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	500,	2,	1,	0,	1,	'2018-07-10',	'http://localhost/AuctionShi/public/productImages/1535172254.jpg',	'2018-09-08 08:44:58',	'2018-09-08 08:44:58'),
(11,	'sabaru forester',	'twin turbo, 2l',	800000,	1,	1,	4,	1,	'2018-08-23',	'http://localhost/AuctionShi/public/productImages/1535172254.jpg',	'2018-09-15 11:07:34',	'2018-09-15 08:07:34'),
(12,	'mwiko',	'ugali woden',	100,	1,	2,	1,	1,	'2018-09-04',	'http://localhost/AuctionShi/public/productImages/1535880098.jpeg',	'2018-09-02 09:22:11',	'2018-09-02 06:22:11'),
(13,	'screen',	'43inch\r\nlg smart',	500,	2,	1,	0,	4,	'2018-09-25',	'http://192.168.100.10/AuctionShi/public/productImages/1536432662.jpg',	'2018-09-08 18:54:12',	'2018-09-08 18:54:12'),
(14,	'screen',	'srdfghjbkm.,sdfghjkl',	60000,	2,	1,	1,	4,	'2018-09-28',	'http://192.168.100.10/AuctionShi/public/productImages/1536478546.jpg',	'2018-09-09 07:36:43',	'2018-09-09 04:36:43'),
(15,	'lAPTOP',	'FGDHJHKZKRGFHJDSKLAGHDJSK',	600000,	2,	1,	1,	4,	'2018-09-27',	'http://192.168.100.10/AuctionShi/public/productImages/1536478909.jpg',	'2018-09-09 08:56:26',	'2018-09-09 05:56:26'),
(16,	'table',	'fgshdjkdldfrsjkalx;sdjk',	8787,	2,	2,	3,	4,	'2018-09-12',	'http://192.168.100.10/AuctionShi/public/productImages/1536483517.png',	'2018-09-09 09:04:27',	'2018-09-09 06:04:27'),
(17,	'mwiko new',	'wodeen',	30000,	1,	2,	1,	4,	'2018-09-28',	'http://192.168.100.10/AuctionShi/public/productImages/1536483636.jpg',	'2018-10-23 16:25:12',	'2018-10-23 13:25:12'),
(18,	'mwiko',	'Test',	150,	2,	1,	2,	3,	'2018-09-03',	'http://localhost/AuctionShi/public/productImages/1537010533.png',	'2018-09-15 11:23:29',	'2018-09-15 08:23:29'),
(19,	'43',	'343',	34,	2,	1,	2,	3,	'2018-10-17',	'http://localhost/AuctionShi/public/productImages/1540310982.jpeg',	'2018-10-23 17:17:56',	'2018-10-23 14:17:56');

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `transactions` (`id`, `type`, `user_id`, `product_id`, `amount`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1,	'Deposit',	3,	NULL,	2121,	'0710446176',	0,	'2018-10-23 14:10:34',	'2018-10-23 14:10:34'),
(2,	'Deposit',	3,	NULL,	10000,	'0710446176',	0,	'2018-10-23 14:34:14',	'2018-10-23 14:34:14'),
(3,	'Deposit',	3,	NULL,	50000,	'0710446176',	0,	'2018-10-23 14:36:20',	'2018-10-23 14:36:20'),
(4,	'Deposit',	3,	NULL,	87,	'0723446176',	0,	'2018-10-23 14:36:44',	'2018-10-23 14:36:44');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 buyer/seller 2 admin',
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '0 inactive, 1 active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	'patrick kaburu',	'patrickaburu1@gmail.com',	'$2y$10$IANTe70jpYdmj.Dir5slJuJt9jAF..iwehmz3SmYJdVVbe36bFD2u',	'1',	'2',	'3gz9IAUtEoCWZLxBFYT1y1Kc1Jzlf8V2gnSP6gqjnsBfw0h5t0FEU6btcPn9',	'2018-08-13 05:28:07',	'2018-09-09 04:28:01'),
(2,	'wanjiku',	'nary@gmail.com',	'$2y$10$brsYaxRQzb3J7I6nE.sIDORfV.HaZaLHpW7nKrZW.2OGBsabUredq',	'1',	'1',	'NvjKbMJvUmsveyYJyKIYxTYAZHE5RUjBwEJGSuKe3TIyV3seeahx1ytonDe5',	'2018-09-08 07:36:50',	'2018-09-08 07:36:50'),
(3,	'patrick',	'p@gmail.com',	'$2y$10$HlTRkGeWyXZTKlqKWfoWAejTkReGTcnRt96r7pOO/8NvNVzLqGbKC',	'1',	'1',	'BcZEZYICKJeYSIJOLSe50sTX3Ws98p9M1my0bhJiX7z5O5uTL3ooyaeYwxnk',	'2018-09-08 15:27:05',	'2018-09-08 15:27:05'),
(4,	'Mary Kariuki',	'mary@gmail.com',	'$2y$10$beCD1HrZeZ8z.15HPY0XVexwlCePZyAuqG5JqgxeXluCtpgqOG3Py',	'1',	'1',	'lOJ7wK1CJnWJkGJxFufit7CS43ISxmkAc8L4zJUrkLSlaQ8ZCfhYcQWTekp7',	'2018-09-08 15:37:02',	'2018-09-08 15:37:02');

-- 2018-10-23 17:40:28
