/*
 Navicat Premium Data Transfer

 Source Server         : lordswar_server
 Source Server Type    : MySQL
 Source Server Version : 50712
 Source Host           : 104.236.242.31
 Source Database       : tribalwars_main

 Target Server Type    : MySQL
 Target Server Version : 50712
 File Encoding         : utf-8

 Date: 08/30/2016 21:06:20 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `announcement`
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `link` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `graphic` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `anuncio_global`
-- ----------------------------
DROP TABLE IF EXISTS `anuncio_global`;
CREATE TABLE `anuncio_global` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('1','2','3') COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `time` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `buy_logs`
-- ----------------------------
DROP TABLE IF EXISTS `buy_logs`;
CREATE TABLE `buy_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `world` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qtn` int(11) DEFAULT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `change_mail`
-- ----------------------------
DROP TABLE IF EXISTS `change_mail`;
CREATE TABLE `change_mail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `username` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `new_mail` varchar(600) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `second_mail` varchar(600) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `cod` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `configs`
-- ----------------------------
DROP TABLE IF EXISTS `configs`;
CREATE TABLE `configs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `style` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `support_lang` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `confirmations`
-- ----------------------------
DROP TABLE IF EXISTS `confirmations`;
CREATE TABLE `confirmations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `package` int(11) NOT NULL DEFAULT '0',
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resolved_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `log_gms`
-- ----------------------------
DROP TABLE IF EXISTS `log_gms`;
CREATE TABLE `log_gms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `horario` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `login_locked` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `start` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_visit` tinyint(1) NOT NULL DEFAULT '0',
  `extern_auth` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `logins`
-- ----------------------------
DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(33) NOT NULL,
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `uv` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `paygol_logs`
-- ----------------------------
DROP TABLE IF EXISTS `paygol_logs`;
CREATE TABLE `paygol_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `shortcode` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keyword` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `sender` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `operator` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `custom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `points` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `paypal_logs`
-- ----------------------------
DROP TABLE IF EXISTS `paypal_logs`;
CREATE TABLE `paypal_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `item_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `custom` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `amounts` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `permissions_ranks`
-- ----------------------------
DROP TABLE IF EXISTS `permissions_ranks`;
CREATE TABLE `permissions_ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rank` int(11) NOT NULL,
  `adm_login` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adm_home` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adm_support` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `delticket` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `adm_settings` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adm_settings_news` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adm_settings_users` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adm_settings_villages` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adm_settings_worlds` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adm_settings_worlds_reset` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adm_ranks` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `adm_memo` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `addpremium` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `gerenciar` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `ban` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `cargos` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  `spam` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
--  Table structure for `premium_feature`
-- ----------------------------
DROP TABLE IF EXISTS `premium_feature`;
CREATE TABLE `premium_feature` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `world` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `activated_on` varchar(400) COLLATE utf8_unicode_ci NOT NULL COMMENT 'active_on|active_for',
  `activated_until` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `ranks`
-- ----------------------------
DROP TABLE IF EXISTS `ranks`;
CREATE TABLE `ranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `namecolor` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `session` text COLLATE utf8_unicode_ci COMMENT 'Empty',
  `userid` int(11) NOT NULL,
  `hkey` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `sid` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `support_feedback`
-- ----------------------------
DROP TABLE IF EXISTS `support_feedback`;
CREATE TABLE `support_feedback` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(10) NOT NULL,
  `supporter` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `rating` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `support_response`
-- ----------------------------
DROP TABLE IF EXISTS `support_response`;
CREATE TABLE `support_response` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ticket_id` int(10) NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Opcional!',
  `response` varchar(3000) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `support_ticket`
-- ----------------------------
DROP TABLE IF EXISTS `support_ticket`;
CREATE TABLE `support_ticket` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `world` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_response` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `support_upload`
-- ----------------------------
DROP TABLE IF EXISTS `support_upload`;
CREATE TABLE `support_upload` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `ticket_id` int(10) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `upload_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hour` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banned` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `ban_reason` text COLLATE utf8_unicode_ci,
  `ban_from` int(11) DEFAULT NULL,
  `ban_data` datetime DEFAULT NULL,
  `ban_end` datetime DEFAULT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sid` int(11) NOT NULL DEFAULT '0',
  `country` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time_reg` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_reg` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `join_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `activation_code` text COLLATE utf8_unicode_ci,
  `activated` int(11) NOT NULL DEFAULT '0',
  `premium_points` int(11) NOT NULL DEFAULT '100',
  `administration` int(1) NOT NULL DEFAULT '1',
  `rank` int(1) NOT NULL DEFAULT '1',
  `wins` int(11) NOT NULL DEFAULT '0',
  `support_session` mediumtext COLLATE utf8_unicode_ci,
  `last_activity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('3', 'N', '', '0', '2016-08-25 17:52:28', '2016-08-25 17:52:33', 'sowicm', '4acfc72ad6c0c53143f3cc9f8b8dc7c8', 'kk@sowicm.com', '0', '', '', '', '', '1472119142', '', '0', '100', '1', '1', '0', '', '1472129123'), ('4', 'N', null, null, null, null, 'kkkkk', '4acfc72ad6c0c53143f3cc9f8b8dc7c8', 'kk@kk.com', '0', null, null, null, null, '1472121058', null, '0', '100', '1', '1', '0', 'xXpLMifsCTk7sBzlOxZuhC1ejAJKFS53FlEitKAVuLTMdiYRGNcOf4Spus00aVTG6nOqYfciQVUT4JBB-mEfsyXHSgxJgjsNgGswuyyDekoYeXqGaVLsjz02FnBMxUpDqIZL6oebytZDhg9h1KAbar4FEvh1fxuw5', '1472137654'), ('5', 'N', null, null, null, null, 'kkkk2', '4acfc72ad6c0c53143f3cc9f8b8dc7c8', 'kk@kk.com', '0', null, null, null, null, '1472205311', null, '0', '100', '1', '1', '0', null, '1472490023'), ('6', 'N', null, null, null, null, 'kkkk3', '4acfc72ad6c0c53143f3cc9f8b8dc7c8', 'kk@kk.com', '0', null, null, null, null, '1472205733', null, '0', '100', '1', '1', '0', null, '1472560850'), ('7', 'N', null, null, null, null, 'kkkk4', '4acfc72ad6c0c53143f3cc9f8b8dc7c8', 'kk@kk.com', '0', null, null, null, null, '1472205848', null, '0', '100', '1', '1', '0', null, '1472338829'), ('8', 'N', null, null, null, null, '%E6%88%91%E7%9A%84%E8%8F%9C', '4acfc72ad6c0c53143f3cc9f8b8dc7c8', 'kk@kk.com', '0', null, null, null, null, '1472332131', null, '0', '100', '1', '1', '0', null, '0'), ('9', 'N', null, null, null, null, 'kkkk5', '4acfc72ad6c0c53143f3cc9f8b8dc7c8', 'kk@kk.com', '0', null, null, null, null, '1472332902', null, '0', '100', '1', '1', '0', null, '1472336763'), ('10', 'N', null, null, null, null, 'kkkk6', '4acfc72ad6c0c53143f3cc9f8b8dc7c8', 'kk@kk.com', '0', null, null, null, null, '1472332943', null, '0', '100', '1', '1', '0', null, '1472334954');
COMMIT;

-- ----------------------------
--  Table structure for `worlds`
-- ----------------------------
DROP TABLE IF EXISTS `worlds`;
CREATE TABLE `worlds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `db` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `start` int(11) NOT NULL,
  `type` enum('world','cluster') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'world',
  `cluster_end_time` int(11) NOT NULL DEFAULT '0',
  `duration` int(11) NOT NULL,
  `prize` int(11) NOT NULL,
  `tribe_bonus` int(11) NOT NULL,
  `limit` int(11) NOT NULL,
  `link` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `dir` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `worlds`
-- ----------------------------
BEGIN;
INSERT INTO `worlds` VALUES ('1', 'World 1', 'pkmhunters_world', '1', '1', '0', 'world', '0', '0', '999', '666', '0', 'world1', 'world1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
