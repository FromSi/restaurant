-- Adminer 4.7.7 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE DATABASE `restaurant` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `restaurant`;

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `idx-auth_assignment-user_id` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin',	'1',	1603197857);

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin',	1,	NULL,	NULL,	NULL,	1603197857,	1603197857);

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_type_id` int(11) DEFAULT NULL COMMENT 'Тип меню',
  `name` varchar(255) DEFAULT NULL COMMENT 'Название',
  `description` varchar(1000) DEFAULT NULL COMMENT 'Описание',
  `image` varchar(255) DEFAULT NULL COMMENT 'Изображение',
  `price` int(11) DEFAULT NULL COMMENT 'Стоимость',
  `is_active` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Активность',
  PRIMARY KEY (`id`),
  KEY `idx-menu_items-menu_type_id` (`menu_type_id`),
  CONSTRAINT `fk-menu_items-menu_type_id` FOREIGN KEY (`menu_type_id`) REFERENCES `menu_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `menu_items` (`id`, `menu_type_id`, `name`, `description`, `image`, `price`, `is_active`) VALUES
(1,	1,	'ПХАЛИ',	'Микс из грузинских пхалииз баклажана, болгарского перца, джусая, зеленой фасоли, свеклы и надуги. Подаются с чипсами из лаваша.',	'5f8fab8bcc24e.jpg',	2899,	1),
(2,	1,	'ЗЕЛЕНАЯ ТАРЕЛКА',	'Свежая зелень, редис, томаты, огурцы и пикантный зеленый перец чили.',	'5f8fabf973e65.jpg',	1899,	1),
(3,	1,	'АДЖАПСАНДАЛИ',	'Тушеные баклажаны, томаты, болгарский перец, морковь и картофель с грузинскими травами и специями.',	'5f8fac136aa04.jpg',	1399,	1),
(4,	2,	'АРАДАНИ',	'Помидоры, имеретинский сыр, шпинат, красный и зеленый базилик, жареные семечки, заправленные маслом и соусом бальзамик.',	'5f8fac813e1a4.jpg',	1899,	1),
(5,	2,	'КВЕЛИ ДА ЛОБИО',	'Белая и стручковая фасоль, помидоры, брынза, заправка из масла и соевого соуса.',	'5f8facd5cf8aa.jpg',	1499,	1),
(6,	2,	'ТБИЛИ',	'Обжаренная говяжья вырезка, свежая зелень, огурцы и томаты, заправленные соевым соусом со специями.',	'5f8fad1e013e5.jpg',	1699,	1),
(7,	3,	'ЧИХИРТМА',	'Куриный суп со свежей зеленью, луком, яйцом и бальзамическим уксусом.',	'5f8fad4637a1e.jpg',	1399,	1),
(8,	3,	'СУП С МИНИ-ХИНКАЛИ',	'Мини-хинкали, грузинские травы и сванская соль.',	'5f8fad6dc947e.jpg',	1499,	1),
(9,	3,	'ХАРЧО',	'Пряный суп на говяжьем бульоне с рисом, кинзой, сельдереем, чесноком и хмели-сунели.',	'5f8fad8919750.jpg',	1499,	1),
(10,	6,	'ШОТИ',	'Традиционный домашний грузинский хлеб.',	'5f8fadbc49dc9.jpg',	499,	1),
(11,	6,	'ДЕДАС ПУРИ',	'Домашний грузинский хлеб.',	'5f8fade49938c.jpg',	499,	1),
(12,	8,	'КАРТОФЕЛЬНОЕ ПЮРЕ',	'',	'5f8fae0e5c142.jpg',	699,	1),
(13,	8,	'РИС',	'',	'5f8fae3ac57bc.jpg',	699,	1),
(14,	9,	'НАПОЛЕОН',	'Авторский десерт от бренд-шефа в неклассической подаче с чурчхелой, курагой и грецким орехом.',	'5f8fae6634a7b.jpg',	1599,	1),
(15,	9,	'ЧИЗКЕЙК С ЯГОДАМИ',	'Корж из печенья, топленое масло, крем на творожном сыре, сезонные ягоды.',	'5f8fae87b62bd.jpg',	1599,	1),
(16,	10,	'ЧАЙНИК ЧАЯ',	'черный / зеленый / фруктовый',	'5f8faead6cb17.jpg',	1299,	1),
(17,	10,	'ЧАШКА ЧАЯ, 250 мл',	'черный / зеленый / фруктовый',	'5f8faecf42efd.jpg',	599,	1);

DROP TABLE IF EXISTS `menu_types`;
CREATE TABLE `menu_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'Название',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `menu_types` (`id`, `name`) VALUES
(1,	'Закуски'),
(2,	'Салаты'),
(3,	'Супы'),
(6,	'Хлеб'),
(8,	'Гарниры'),
(9,	'Десерты'),
(10,	'Чай');

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `translation` text DEFAULT NULL,
  PRIMARY KEY (`id`,`language`),
  CONSTRAINT `fk_source_message_message` FOREIGN KEY (`id`) REFERENCES `source_message` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `message` (`id`, `language`, `translation`) VALUES
(1,	'en-US',	NULL),
(1,	'kk-KZ',	NULL),
(1,	'ru-RU',	NULL),
(2,	'en-US',	NULL),
(2,	'kk-KZ',	NULL),
(2,	'ru-RU',	NULL),
(3,	'en-US',	NULL),
(3,	'kk-KZ',	NULL),
(3,	'ru-RU',	NULL),
(4,	'en-US',	NULL),
(4,	'kk-KZ',	NULL),
(4,	'ru-RU',	NULL),
(5,	'en-US',	NULL),
(5,	'kk-KZ',	NULL),
(5,	'ru-RU',	NULL),
(6,	'en-US',	NULL),
(6,	'kk-KZ',	NULL),
(6,	'ru-RU',	NULL),
(7,	'en-US',	NULL),
(7,	'kk-KZ',	NULL),
(7,	'ru-RU',	NULL),
(8,	'en-US',	NULL),
(8,	'kk-KZ',	NULL),
(8,	'ru-RU',	NULL);

DROP TABLE IF EXISTS `meta_models`;
CREATE TABLE `meta_models` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_tag_id` int(11) NOT NULL COMMENT 'Meta tag',
  `model` varchar(255) NOT NULL COMMENT 'Model class',
  `model_id` int(11) NOT NULL COMMENT 'Model entry ID',
  PRIMARY KEY (`id`),
  KEY `fk_meta_models-meta_tag_id` (`meta_tag_id`),
  CONSTRAINT `fk_meta_models-meta_tag_id` FOREIGN KEY (`meta_tag_id`) REFERENCES `meta_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `meta_pages`;
CREATE TABLE `meta_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `meta_tag_id` int(11) NOT NULL COMMENT 'Meta tag',
  `module` varchar(255) NOT NULL COMMENT 'Module Name',
  `controller` varchar(255) NOT NULL COMMENT 'Controller name',
  `action` varchar(255) NOT NULL COMMENT 'Action name',
  PRIMARY KEY (`id`),
  KEY `fk_meta_pages-meta_tag_id` (`meta_tag_id`),
  CONSTRAINT `fk_meta_pages-meta_tag_id` FOREIGN KEY (`meta_tag_id`) REFERENCES `meta_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `meta_tags`;
CREATE TABLE `meta_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL COMMENT 'Дата создания',
  `updated_at` datetime DEFAULT NULL COMMENT 'Дата редактирования',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `meta_tag_translations`;
CREATE TABLE `meta_tag_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(255) NOT NULL COMMENT 'Translation language',
  `meta_tag_id` int(11) NOT NULL COMMENT 'Meta tag',
  `title` varchar(255) DEFAULT NULL COMMENT 'Headline',
  `description` text DEFAULT NULL COMMENT 'Description',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'Keywords',
  `image` varchar(255) DEFAULT NULL COMMENT 'Picture',
  `type` varchar(255) DEFAULT NULL COMMENT 'Page type',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_meta_tag_translations-lang-meta_tag_id` (`meta_tag_id`,`lang`),
  CONSTRAINT `fk_meta_tag_translations-meta_tag_id` FOREIGN KEY (`meta_tag_id`) REFERENCES `meta_tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('Da\\User\\Migration\\m000000_000001_create_user_table',	1603197633),
('Da\\User\\Migration\\m000000_000002_create_profile_table',	1603197633),
('Da\\User\\Migration\\m000000_000003_create_social_account_table',	1603197633),
('Da\\User\\Migration\\m000000_000004_create_token_table',	1603197633),
('Da\\User\\Migration\\m000000_000005_add_last_login_at',	1603197633),
('Da\\User\\Migration\\m000000_000006_add_two_factor_fields',	1603197633),
('Da\\User\\Migration\\m000000_000007_enable_password_expiration',	1603197633),
('Da\\User\\Migration\\m000000_000008_add_last_login_ip',	1603197633),
('Da\\User\\Migration\\m000000_000009_add_gdpr_consent_fields',	1603197633),
('m000000_000000_base',	1603197632),
('m140506_102106_rbac_init',	1603197633),
('m140609_093837_addI18nTables',	1603197632),
('m170613_185652_create_settings_table',	1603197633),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id',	1603197633),
('m180325_173325_create_settings_group_table',	1603197633),
('m180327_163555_add_key_column_to_settings_group_table',	1603197633),
('m180424_121052_create_meta_tags_table',	1603197633),
('m180424_121053_create_meta_tag_translations_table',	1603197633),
('m180424_121054_create_meta_models_table',	1603197633),
('m180424_121055_create_meta_pages_table',	1603197633),
('m180523_151638_rbac_updates_indexes_without_prefix',	1603197633),
('m180818_060550_create_settings_translations_table',	1603197633),
('m180919_103846_update_index_meta_tag_translations_table',	1603197633),
('m200129_150744_create_restaurants_table',	1603197633),
('m200129_150804_create_tables_table',	1603197633),
('m200129_150829_create_request_statuses_table',	1603197633),
('m200129_150830_create_requests_table',	1603197633),
('m200129_151019_create_menu_types_table',	1603197633),
('m200129_151020_create_menu_items_table',	1603197633),
('m200129_151929_create_request_items_table',	1603197634);

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_profile_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `timezone`, `bio`) VALUES
(1,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL);

DROP TABLE IF EXISTS `requests`;
CREATE TABLE `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_status_id` int(11) DEFAULT NULL COMMENT 'Статус',
  `table_id` int(11) DEFAULT NULL COMMENT 'Стол',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `requests` (`id`, `request_status_id`, `table_id`) VALUES
(1,	3,	1),
(2,	2,	2),
(3,	3,	1);

DROP TABLE IF EXISTS `request_items`;
CREATE TABLE `request_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `request_id` int(11) DEFAULT NULL COMMENT 'Заявка',
  `menu_item_id` int(11) DEFAULT NULL COMMENT 'Меню',
  PRIMARY KEY (`id`),
  KEY `idx-request_items-request_id` (`request_id`),
  KEY `idx-request_items-menu_item_id` (`menu_item_id`),
  CONSTRAINT `fk-request_items-menu_item_id` FOREIGN KEY (`menu_item_id`) REFERENCES `menu_items` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk-request_items-request_id` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `request_items` (`id`, `request_id`, `menu_item_id`) VALUES
(1,	1,	1),
(2,	1,	4),
(3,	1,	7),
(4,	2,	13),
(5,	2,	15),
(6,	2,	16),
(7,	3,	6),
(8,	3,	9),
(9,	3,	13),
(10,	3,	17);

DROP TABLE IF EXISTS `request_statuses`;
CREATE TABLE `request_statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'Название',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `request_statuses` (`id`, `name`) VALUES
(1,	'Ожидание'),
(2,	'Выполняется'),
(3,	'Завершен');

DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE `restaurants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'Название',
  `description` varchar(1000) DEFAULT NULL COMMENT 'Описание',
  `image` varchar(255) DEFAULT NULL COMMENT 'Изображение',
  `address` varchar(255) DEFAULT NULL COMMENT 'Адрес',
  `is_active` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'Активность',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `restaurants` (`id`, `name`, `description`, `image`, `address`, `is_active`) VALUES
(1,	'Дареджани #1',	'Современные грузинские рестораны, где традиции гармонично переплетаются с сегодняшним днем.',	'5f8edd574d591.jpg',	'ул. Казыбек би 40/85',	1),
(2,	'Дареджани #2',	'Современные грузинские рестораны, где традиции гармонично переплетаются с сегодняшним днем.',	'5f8edd5a7dfc3.jpg',	'ул. Навои 328',	1),
(3,	'Дареджани #3',	'Современные грузинские рестораны, где традиции гармонично переплетаются с сегодняшним днем.',	'5f8ede0589f8b.jpg',	'пр. Достык, 71',	1);

DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `key` varchar(75) NOT NULL,
  `value` text DEFAULT NULL,
  `type` int(11) NOT NULL,
  `type_settings` text DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL COMMENT 'Settings group',
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`),
  UNIQUE KEY `unq_settings_key` (`key`),
  KEY `fk_settings_to_settings_group` (`group_id`),
  CONSTRAINT `fk_settings_to_settings_group` FOREIGN KEY (`group_id`) REFERENCES `settings_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `settings` (`id`, `title`, `key`, `value`, `type`, `type_settings`, `group_id`, `position`) VALUES
(1,	'Admin title',	'admin-header',	'Bridge',	1,	NULL,	2,	1),
(2,	'Footer-copyright',	'footer-copyright',	'&beta;ridge © 2020 by <a href=\"https://github.com/naffiq\" target=\"_blank\">naffiq</a>',	2,	NULL,	2,	2);

DROP TABLE IF EXISTS `settings_group`;
CREATE TABLE `settings_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT 'Group name',
  `description` text DEFAULT NULL COMMENT 'Group description',
  `icon` varchar(255) DEFAULT NULL COMMENT 'Group icon',
  `position` int(11) DEFAULT NULL COMMENT 'Order',
  `key` varchar(75) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `settings_group` (`id`, `title`, `description`, `icon`, `position`, `key`) VALUES
(1,	'Seo and Analytics',	NULL,	'fa-bar-chart',	1,	'seo-and-analytics'),
(2,	'Admin',	NULL,	'fa-wrench',	2,	'admin');

DROP TABLE IF EXISTS `settings_translations`;
CREATE TABLE `settings_translations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(255) NOT NULL COMMENT 'Translation language',
  `settings_id` int(11) NOT NULL COMMENT 'Customization',
  `value` text DEFAULT NULL COMMENT 'Value',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uq_settings_translations-settings_id-lang` (`settings_id`,`lang`),
  KEY `idx_settings_id` (`settings_id`),
  CONSTRAINT `fk_settings_translations-settings_id` FOREIGN KEY (`settings_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `settings_translations` (`id`, `lang`, `settings_id`, `value`) VALUES
(1,	'en-US',	1,	'Bridge'),
(2,	'ru-RU',	1,	'Bridge'),
(3,	'kk-KZ',	1,	'Bridge'),
(4,	'en-US',	2,	'&beta;ridge © 2020 by <a href=\"https://github.com/naffiq\" target=\"_blank\">naffiq</a>'),
(5,	'ru-RU',	2,	'&beta;ridge © 2020 by <a href=\"https://github.com/naffiq\" target=\"_blank\">naffiq</a>'),
(6,	'kk-KZ',	2,	'&beta;ridge © 2020 by <a href=\"https://github.com/naffiq\" target=\"_blank\">naffiq</a>');

DROP TABLE IF EXISTS `social_account`;
CREATE TABLE `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_social_account_provider_client_id` (`provider`,`client_id`),
  UNIQUE KEY `idx_social_account_code` (`code`),
  KEY `fk_social_account_user` (`user_id`),
  CONSTRAINT `fk_social_account_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `source_message`;
CREATE TABLE `source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `source_message` (`id`, `category`, `message`) VALUES
(1,	'frontend',	'Ресторан'),
(2,	'frontend',	'Выбрать'),
(3,	'frontend',	'Стол'),
(4,	'frontend',	'Меню'),
(5,	'frontend',	'История'),
(6,	'frontend',	'Сделать заказ'),
(7,	'frontend',	'тг'),
(8,	'frontend',	'Сумма');

DROP TABLE IF EXISTS `tables`;
CREATE TABLE `tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `restaurant_id` int(11) DEFAULT NULL COMMENT 'Ресторан',
  `name` varchar(255) DEFAULT NULL COMMENT 'Название',
  `image` varchar(255) DEFAULT NULL COMMENT 'Изображение',
  `chair` varchar(255) DEFAULT NULL COMMENT 'Всего мест',
  PRIMARY KEY (`id`),
  KEY `idx-tables-restaurant_id` (`restaurant_id`),
  CONSTRAINT `fk-tables-restaurant_id` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tables` (`id`, `restaurant_id`, `name`, `image`, `chair`) VALUES
(1,	1,	'Стол 1',	'5f8ee0f17b993.jpg',	'5'),
(2,	1,	'Стол 2',	'5f8ee11c67056.jpg',	'8'),
(3,	2,	'Стол 1',	'5f8ee134780bf.jpg',	'5'),
(4,	2,	'Стол 2',	'5f8ee1495e66b.jpg',	'8'),
(5,	3,	'Стол 1',	'5f8ee1732736e.jpg',	'5'),
(6,	3,	'Стол 2',	'5f8ee187ba9b1.jpg',	'8');

DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `user_id` int(11) DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `created_at` int(11) NOT NULL,
  UNIQUE KEY `idx_token_user_id_code_type` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_token_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flags` int(11) NOT NULL DEFAULT 0,
  `confirmed_at` int(11) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `updated_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `last_login_at` int(11) DEFAULT NULL,
  `last_login_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_tf_key` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_tf_enabled` tinyint(1) DEFAULT 0,
  `password_changed_at` int(11) DEFAULT NULL,
  `gdpr_consent` tinyint(1) DEFAULT 0,
  `gdpr_consent_date` int(11) DEFAULT NULL,
  `gdpr_deleted` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_user_username` (`username`),
  UNIQUE KEY `idx_user_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `unconfirmed_email`, `registration_ip`, `flags`, `confirmed_at`, `blocked_at`, `updated_at`, `created_at`, `last_login_at`, `last_login_ip`, `auth_tf_key`, `auth_tf_enabled`, `password_changed_at`, `gdpr_consent`, `gdpr_consent_date`, `gdpr_deleted`) VALUES
(1,	'admin',	'admin@admin.com',	'$2y$10$mUljwy7po9VJAL9pyfUt0eWJNbKh0LcwlExfy1YBiVrLZRrZDJ2C6',	'1EBx5eQ479KDtWGtL2Fxjo2Ocs0LY6zu',	NULL,	NULL,	0,	1603197857,	NULL,	1603197857,	1603197857,	NULL,	NULL,	'',	0,	1603197857,	0,	NULL,	0);

-- 2020-10-21 04:00:34
