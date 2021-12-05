CREATE DATABASE IF NOT EXISTS `Bitlo`;

/*use `Bitlo`;
CREATE TABLE IF NOT EXISTS `companies` (
  `company_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `site_url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_id`),
  KEY `companies_company_id_index` (`company_id`)
);
CREATE TABLE IF NOT EXISTS `company_packages` (
  `company_package_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `package_id` int unsigned NOT NULL,
  `company_package_status` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_package_id`),
  KEY `company_packages_company_package_id_index` (`company_package_id`),
  KEY `company_packages_company_id_index` (`company_id`),
  KEY `company_packages_package_id_index` (`package_id`)
);
CREATE TABLE IF NOT EXISTS `company_payments` (
  `company_payments_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `company_package_id` int unsigned NOT NULL,
  `payment_period` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`company_payments_id`),
  KEY `company_payments_company_payments_id_index` (`company_payments_id`),
  KEY `company_payments_company_package_id_index` (`company_package_id`)
);
CREATE TABLE IF NOT EXISTS `packages` (
  `package_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) NOT NULL,
  `package_status` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`package_id`),
  KEY `packages_package_id_index` (`package_id`)
);*/
