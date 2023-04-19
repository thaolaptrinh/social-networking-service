-- SQL dump generated using DBML (dbml-lang.org)
-- Database: MySQL
-- Generated at: 2023-04-19T06:28:32.172Z

CREATE TABLE `settings` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(225),
  `name` varchar(225),
  `keywords` text DEFAULT null,
  `descriptions` text DEFAULT null,
  `favicon_url` text DEFAULT null,
  `logo_url` text DEFAULT null,
  `zalo_url` text DEFAULT null,
  `telegram_url` text DEFAULT null,
  `smtp_user` varchar(225) DEFAULT null,
  `smtp_password` varchar(225) DEFAULT null,
  `smtp_host` varchar(225) DEFAULT null,
  `smtp_port` varchar(50) DEFAULT null,
  `smtp_protocol` varchar(50) DEFAULT null,
  `is_published` tinyint(1) DEFAULT 1,
  `updated_at` timestamp
);

CREATE TABLE `providers` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(225),
  `api_url` text,
  `api_key` text,
  `is_published` tinyint(1) DEFAULT 1,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `categories` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(225),
  `is_published` tinyint(1) DEFAULT 1,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `services` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `category_id` int,
  `name` varchar(225),
  `note` text(225),
  `min` int,
  `max` int,
  `rate` double,
  `profit` double COMMENT 'service profit percent',
  `is_refill` tinyint(1) DEFAULT 0,
  `is_cancel` tinyint(1) DEFAULT 0,
  `is_dripfeed` tinyint(1) DEFAULT 0,
  `is_update` tinyint(1) DEFAULT 1,
  `provider_id` int,
  `provider_service_id` int
);

CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `full_name` varchar(225),
  `email` varchar(225) UNIQUE,
  `username` varchar(225) UNIQUE,
  `password` varchar(225),
  `balance` double DEFAULT 0,
  `spend` double DEFAULT 0,
  `api_key` text,
  `level` ENUM ('Member', 'Admin') DEFAULT "Member",
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `auth_logs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `ip_address` varchar(225),
  `user_agent` varchar(225),
  `type` ENUM ('login', 'register', 'change_info'),
  `created_at` timestamp
);

CREATE TABLE `balance_logs` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `type` ENUM ('buy_service', 'recharge'),
  `amount` double,
  `note` text,
  `created_at` timestamp
);

CREATE TABLE `deposit_methods` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `payment` ENUM ('auto', 'manual'),
  `name` varchar(225),
  `note` text DEFAULT null,
  `img_url` text DEFAULT null,
  `min_amount` double,
  `status` tinyint(1) DEFAULT 1
);

CREATE TABLE `deposit_accounts` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `method_id` int,
  `name` varchar(225),
  `number` varchar(225),
  `note` text DEFAULT null,
  `status` tinyint(1) DEFAULT 1
);

CREATE TABLE `deposits` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `note` text DEFAULT null,
  `code` varchar(225),
  `deposit_account_id` int,
  `amount` double,
  `status` ENUM ('Pending', 'Canceled', 'Success') DEFAULT "Pending",
  `created_at` timestamp,
  `updated_at` timestamp
);

CREATE TABLE `orders` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int,
  `service_id` int,
  `provider_id` int,
  `provider_order_id` varchar(225),
  `data` text,
  `quantity` int(11),
  `start_count` int(11),
  `remains` int(11),
  `charge` double,
  `is_refund` tinyint(1) DEFAULT 0,
  `status` ENUM ('Pending', 'In progress', 'Processing', 'Canceled', 'Partial', 'Completed') DEFAULT "Pending",
  `created_at` timestamp,
  `updated_at` timestamp
);

ALTER TABLE `services` ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

ALTER TABLE `services` ADD FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);

ALTER TABLE `auth_logs` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `balance_logs` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `deposit_accounts` ADD FOREIGN KEY (`method_id`) REFERENCES `deposit_methods` (`id`);

ALTER TABLE `deposits` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `deposits` ADD FOREIGN KEY (`deposit_account_id`) REFERENCES `deposit_accounts` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`service_id`) REFERENCES `services` (`id`);

ALTER TABLE `orders` ADD FOREIGN KEY (`provider_id`) REFERENCES `providers` (`id`);
