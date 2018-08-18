-- Adminer 4.6.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bids`;
CREATE TABLE `bids` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `bids_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `bids_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1,	'electronics',	'ele');

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
(4,	'house',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	98343,	1,	1,	76343,	1,	'2018-09-04',	'http://localhost/laravel/shi/public/productImages/1534427039.jpg',	'2018-08-18 09:07:41',	'2018-08-18 09:07:41'),
(5,	'itel 7',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	676,	1,	1,	3,	1,	'2018-08-15',	'http://localhost/laravel/shi/public/productImages/1534438134.jpg',	'2018-08-18 09:03:41',	'2018-08-18 09:03:41'),
(6,	'One bed room',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	87000,	1,	1,	4,	1,	'2018-08-15',	'http://localhost/laravel/shi/public/productImages/1534438179.jpg',	'2018-08-18 09:03:24',	'2018-08-18 09:03:24'),
(7,	'bed 6*6',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	98,	1,	1,	1,	1,	'2018-08-07',	'http://localhost/laravel/shi/public/productImages/1534438420.jpg',	'2018-08-18 09:03:58',	'2018-08-18 09:03:58'),
(8,	'Gas 6kg ',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	2500,	1,	1,	0,	1,	'2018-08-14',	'http://localhost/laravel/shi/public/productImages/1534438465.jpg',	'2018-08-18 09:04:18',	'2018-08-18 09:04:18'),
(9,	'Blender',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	1500,	1,	1,	1,	1,	'2018-09-05',	'http://localhost/laravel/shi/public/productImages/1534438602.jpg',	'2018-08-18 09:04:37',	'2018-08-18 09:04:37'),
(10,	'Study Table',	'Features:\r\n\r\n3 Bedrooms (2 en suite)\r\n\r\n',	500,	1,	1,	0,	1,	'2018-07-10',	'http://localhost/laravel/shi/public/productImages/1534484289.png',	'2018-08-18 09:04:54',	'2018-08-18 09:04:54');

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `transactions_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


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
(1,	'patrick kaburu',	'patrickaburu1@gmail.com',	'$2y$10$IANTe70jpYdmj.Dir5slJuJt9jAF..iwehmz3SmYJdVVbe36bFD2u',	'1',	'1',	'Dvdgyu3j7cyRgpVPfPvuOnwBZPEntCaAEXK0nfVLkC4U3xTCXixjIWVKWp2L',	'2018-08-13 05:28:07',	'2018-08-13 05:28:07');

-- 2018-08-18 09:22:53
