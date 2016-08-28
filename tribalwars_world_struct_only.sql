/*
 Navicat Premium Data Transfer

 Source Server         : localhost 2
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : localhost
 Source Database       : tribalwars_world

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : utf-8

 Date: 08/27/2016 21:32:12 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `ally`
-- ----------------------------
DROP TABLE IF EXISTS `ally`;
CREATE TABLE `ally` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `short` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(20) unsigned NOT NULL,
  `rank` int(11) unsigned NOT NULL,
  `best_points` int(20) unsigned NOT NULL,
  `members` int(11) unsigned NOT NULL,
  `villages` int(11) unsigned NOT NULL,
  `intern_text` text COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `homepage` varchar(640) COLLATE utf8_unicode_ci NOT NULL,
  `irc` varchar(640) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `intro_igm` text COLLATE utf8_unicode_ci NOT NULL,
  `killed_units_att` int(25) NOT NULL,
  `killed_units_att_rank` int(11) NOT NULL,
  `killed_units_def` int(25) NOT NULL,
  `killed_units_def_rank` int(25) NOT NULL,
  `killed_units_altogether` int(25) NOT NULL,
  `killed_units_altogether_rank` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rank` (`rank`),
  KEY `name` (`name`),
  KEY `short` (`short`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `ally_contracts`
-- ----------------------------
DROP TABLE IF EXISTS `ally_contracts`;
CREATE TABLE `ally_contracts` (
  `from_ally` int(11) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `to_ally` int(11) NOT NULL,
  `short` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `ally_events`
-- ----------------------------
DROP TABLE IF EXISTS `ally_events`;
CREATE TABLE `ally_events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ally` int(11) unsigned NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ally` (`ally`),
  KEY `time` (`time`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `ally_invites`
-- ----------------------------
DROP TABLE IF EXISTS `ally_invites`;
CREATE TABLE `ally_invites` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_ally` int(11) unsigned NOT NULL,
  `to_userid` int(11) unsigned NOT NULL,
  `to_username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `announcement`
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `graphic` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `build`
-- ----------------------------
DROP TABLE IF EXISTS `build`;
CREATE TABLE `build` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `mode` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `building` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `villageid` int(11) unsigned DEFAULT NULL,
  `end_time` int(11) unsigned NOT NULL,
  `build_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM AUTO_INCREMENT=480 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `name` varchar(100) NOT NULL,
  `ano` varchar(100) NOT NULL,
  `cdn` varchar(100) NOT NULL,
  `forum` varchar(100) NOT NULL,
  `version` varchar(100) NOT NULL,
  `global_db` varchar(100) NOT NULL,
  `world_name` varchar(100) NOT NULL,
  `master_pw` varchar(100) NOT NULL,
  `speed` varchar(100) NOT NULL,
  `count_create_left` varchar(100) NOT NULL,
  `min_villages` varchar(100) NOT NULL,
  `map_incircle` varchar(100) NOT NULL,
  `left_name` varchar(100) NOT NULL,
  `village_choose_direction` varchar(100) NOT NULL,
  `reason_defense` varchar(100) NOT NULL,
  `factor_spy` varchar(100) NOT NULL,
  `cancel_movement` varchar(100) NOT NULL,
  `movement_speed` varchar(100) NOT NULL,
  `moral_activ` enum('0','1') NOT NULL,
  `min_moral` varchar(100) NOT NULL,
  `agreement_per_hour` varchar(100) NOT NULL,
  `agreement_min` varchar(100) NOT NULL,
  `agreement_max` varchar(100) NOT NULL,
  `noob_protection` varchar(100) NOT NULL,
  `ennobled_protection` varchar(100) NOT NULL,
  `dealer_time` varchar(100) NOT NULL,
  `cancel_dealers` varchar(100) NOT NULL,
  `ag_style` varchar(100) NOT NULL,
  `bh_style` varchar(100) NOT NULL,
  `create_ally` enum('0','1') NOT NULL,
  `leave_ally` enum('0','1') NOT NULL,
  `close_ally` enum('0','1') NOT NULL,
  `members_ally` varchar(100) NOT NULL,
  `auto_ally` enum('0','1') NOT NULL,
  `no_actions` enum('0','1') NOT NULL,
  `not_more_villages` enum('0','1') NOT NULL,
  `ip_control` enum('0','1') NOT NULL,
  `attack_visit` enum('0','1') NOT NULL,
  `build_destroy` enum('0','1') NOT NULL,
  `archers` enum('0','1') NOT NULL,
  `night_start` varchar(100) NOT NULL,
  `night_end` varchar(100) NOT NULL,
  `spy_style` varchar(100) NOT NULL,
  `gold_coin_price_wood` varchar(100) NOT NULL,
  `gold_coin_price_stone` varchar(100) NOT NULL,
  `gold_coin_price_iron` varchar(100) NOT NULL,
  `auto_build_active` varchar(100) NOT NULL,
  `auto_build_max_points` varchar(100) NOT NULL,
  `auto_build_grow_time` varchar(100) NOT NULL,
  `buildings_base` varchar(100) NOT NULL,
  `buildings_factor` varchar(100) NOT NULL,
  `catapult_wall_base` varchar(100) NOT NULL,
  `catapult_wall_factor` varchar(100) NOT NULL,
  `ram_buildings_base` varchar(100) NOT NULL,
  `ram_buildings_factor` varchar(100) NOT NULL,
  `ram_wall_base` varchar(100) NOT NULL,
  `ram_wall_factor` varchar(100) NOT NULL,
  `church` enum('0','1') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `country`
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `begin_ip` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `end_ip` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `begin_ip_num` int(11) unsigned DEFAULT NULL,
  `end_ip_num` int(11) unsigned DEFAULT NULL,
  `country_code` varchar(3) CHARACTER SET latin1 DEFAULT NULL,
  `country_name` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `begin_ip_num` (`begin_ip_num`,`end_ip_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `create_village`
-- ----------------------------
DROP TABLE IF EXISTS `create_village`;
CREATE TABLE `create_village` (
  `nw_c` int(10) NOT NULL DEFAULT '1',
  `no_c` int(10) NOT NULL DEFAULT '1',
  `so_c` int(10) NOT NULL DEFAULT '1',
  `sw_c` int(10) NOT NULL DEFAULT '1',
  `nw` int(10) NOT NULL DEFAULT '0',
  `no` int(10) NOT NULL DEFAULT '0',
  `so` int(10) NOT NULL DEFAULT '0',
  `sw` int(10) NOT NULL DEFAULT '0',
  `no_alpha` int(10) NOT NULL DEFAULT '0',
  `nw_alpha` int(10) NOT NULL DEFAULT '0',
  `so_alpha` int(10) NOT NULL DEFAULT '0',
  `sw_alpha` int(10) NOT NULL DEFAULT '0',
  `next_left` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `create_village_barb`
-- ----------------------------
DROP TABLE IF EXISTS `create_village_barb`;
CREATE TABLE `create_village_barb` (
  `nw_c` int(11) NOT NULL DEFAULT '1',
  `no_c` int(11) NOT NULL DEFAULT '1',
  `so_c` int(11) NOT NULL DEFAULT '1',
  `sw_c` int(11) NOT NULL DEFAULT '1',
  `nw` int(11) NOT NULL DEFAULT '0',
  `no` int(11) NOT NULL DEFAULT '0',
  `so` int(11) NOT NULL DEFAULT '0',
  `sw` int(11) NOT NULL DEFAULT '0',
  `no_alpha` int(11) NOT NULL DEFAULT '0',
  `nw_alpha` int(11) NOT NULL DEFAULT '0',
  `so_alpha` int(11) NOT NULL DEFAULT '0',
  `sw_alpha` int(11) NOT NULL DEFAULT '0',
  `next_left` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `cron`
-- ----------------------------
DROP TABLE IF EXISTS `cron`;
CREATE TABLE `cron` (
  `mail` int(11) NOT NULL DEFAULT '0',
  `mail_last` int(11) NOT NULL,
  `report` int(11) NOT NULL DEFAULT '0',
  `report_last` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `dealers`
-- ----------------------------
DROP TABLE IF EXISTS `dealers`;
CREATE TABLE `dealers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_userid` int(11) unsigned NOT NULL,
  `to_userid` int(11) unsigned NOT NULL,
  `from_village` int(11) unsigned NOT NULL,
  `to_village` int(11) unsigned NOT NULL,
  `wood` int(11) unsigned NOT NULL,
  `stone` int(11) unsigned NOT NULL,
  `iron` int(11) unsigned NOT NULL,
  `start_time` int(11) unsigned NOT NULL,
  `end_time` int(11) unsigned NOT NULL,
  `is_offer` int(1) unsigned NOT NULL DEFAULT '0',
  `dealers` int(6) unsigned NOT NULL DEFAULT '0',
  `type` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `from_village` (`from_village`),
  KEY `to_village` (`to_village`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `destroy`
-- ----------------------------
DROP TABLE IF EXISTS `destroy`;
CREATE TABLE `destroy` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `building` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `villageid` int(11) unsigned NOT NULL,
  `end_time` int(11) unsigned NOT NULL,
  `build_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `events`
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `event_time` int(11) unsigned DEFAULT '0',
  `event_type` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `event_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `villageid` int(11) unsigned DEFAULT NULL,
  `knot_event` int(15) NOT NULL,
  `cid` varchar(32) COLLATE utf8_unicode_ci DEFAULT '0',
  `can_knot` int(1) NOT NULL DEFAULT '0',
  `is_locked` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_type` (`event_type`),
  KEY `event_id` (`event_id`),
  KEY `event_time` (`event_time`),
  KEY `user_id` (`user_id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM AUTO_INCREMENT=633 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `forum`
-- ----------------------------
DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ally` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
--  Table structure for `forum_f_read`
-- ----------------------------
DROP TABLE IF EXISTS `forum_f_read`;
CREATE TABLE `forum_f_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
--  Table structure for `forum_post`
-- ----------------------------
DROP TABLE IF EXISTS `forum_post`;
CREATE TABLE `forum_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL,
  `message` varchar(4000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `posted_by` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
--  Table structure for `forum_read`
-- ----------------------------
DROP TABLE IF EXISTS `forum_read`;
CREATE TABLE `forum_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=334 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
--  Table structure for `forum_thread`
-- ----------------------------
DROP TABLE IF EXISTS `forum_thread`;
CREATE TABLE `forum_thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `important` int(11) NOT NULL DEFAULT '0',
  `closed` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
--  Table structure for `friends`
-- ----------------------------
DROP TABLE IF EXISTS `friends`;
CREATE TABLE `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_userid` int(11) NOT NULL DEFAULT '0',
  `from_userid` int(11) NOT NULL DEFAULT '0',
  `status` enum('activ','pending') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'pending',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=730 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `knight_items`
-- ----------------------------
DROP TABLE IF EXISTS `knight_items`;
CREATE TABLE `knight_items` (
  `uid` int(11) unsigned NOT NULL,
  `chosen` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `progress` int(3) unsigned DEFAULT NULL,
  `last_actu` int(11) unsigned DEFAULT NULL,
  `spear` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `sword` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `axe` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `archer` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `spy` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `light` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `heavy` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `marcher` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `ram` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `catapult` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  `snob` enum('false','true') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `login`
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `login_locked` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `start` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `first_visit` tinyint(1) NOT NULL DEFAULT '0',
  `extern_auth` varchar(32) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `logins`
-- ----------------------------
DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) unsigned NOT NULL,
  `uv` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `logs`
-- ----------------------------
DROP TABLE IF EXISTS `logs`;
CREATE TABLE `logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `log` text COLLATE utf8_unicode_ci NOT NULL,
  `event_id` int(11) unsigned NOT NULL,
  `event_type` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `mail_archiv`
-- ----------------------------
DROP TABLE IF EXISTS `mail_archiv`;
CREATE TABLE `mail_archiv` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL DEFAULT '0',
  `from_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `to_id` int(11) unsigned NOT NULL DEFAULT '0',
  `to_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `subject` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  `owner` int(11) unsigned NOT NULL,
  `type` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `to_id` (`to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `mail_block`
-- ----------------------------
DROP TABLE IF EXISTS `mail_block`;
CREATE TABLE `mail_block` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) unsigned NOT NULL,
  `blocked_id` int(11) unsigned NOT NULL,
  `blocked_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `blocked_id` (`blocked_id`),
  KEY `blocked_name` (`blocked_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `mail_in`
-- ----------------------------
DROP TABLE IF EXISTS `mail_in`;
CREATE TABLE `mail_in` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL DEFAULT '0',
  `from_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `to_id` int(11) unsigned NOT NULL DEFAULT '0',
  `to_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `subject` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `is_read` int(1) unsigned NOT NULL DEFAULT '0',
  `is_answered` int(1) unsigned NOT NULL DEFAULT '0',
  `output_id` int(11) NOT NULL DEFAULT '0',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to_id` (`to_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `mail_in_post`
-- ----------------------------
DROP TABLE IF EXISTS `mail_in_post`;
CREATE TABLE `mail_in_post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `text` text COLLATE latin1_general_ci NOT NULL,
  `time` int(35) NOT NULL,
  `msg_id` varchar(250) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
--  Table structure for `mail_mass`
-- ----------------------------
DROP TABLE IF EXISTS `mail_mass`;
CREATE TABLE `mail_mass` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(20) NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `array_subjects_id` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `from_id` int(20) NOT NULL,
  `from_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `belongs_to` int(12) NOT NULL DEFAULT '0',
  `delete` enum('y','n') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `id_display` int(15) NOT NULL DEFAULT '-1',
  `username_display` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `from_id` (`from_id`),
  KEY `belongs_to` (`belongs_to`),
  KEY `delete` (`delete`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `mail_out`
-- ----------------------------
DROP TABLE IF EXISTS `mail_out`;
CREATE TABLE `mail_out` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` int(11) unsigned NOT NULL DEFAULT '0',
  `from_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `to_id` int(11) unsigned NOT NULL DEFAULT '0',
  `to_username` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `subject` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `text` text COLLATE utf8_unicode_ci NOT NULL,
  `is_read` int(1) unsigned NOT NULL DEFAULT '0',
  `time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `from_id` (`from_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `mail_post`
-- ----------------------------
DROP TABLE IF EXISTS `mail_post`;
CREATE TABLE `mail_post` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `subject_id` int(20) NOT NULL,
  `text` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `time` int(20) NOT NULL,
  `from_id` int(20) NOT NULL,
  `from_username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `to_id` int(11) NOT NULL,
  `to_username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16392 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `mail_subject`
-- ----------------------------
DROP TABLE IF EXISTS `mail_subject`;
CREATE TABLE `mail_subject` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_post` int(20) NOT NULL,
  `from_id` int(20) NOT NULL DEFAULT '-1',
  `to_id` int(20) NOT NULL DEFAULT '-1',
  `from_username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `to_username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `post_num` int(20) NOT NULL,
  `status_from` enum('read','new','answered') COLLATE utf8_unicode_ci NOT NULL,
  `status_to` enum('read','new','answered') COLLATE utf8_unicode_ci NOT NULL,
  `delete_from` enum('y','n') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `delete_to` enum('y','n') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `read_unique` enum('y','n') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `delete_from` (`delete_from`),
  KEY `delete_to` (`delete_to`),
  KEY `from_id` (`from_id`),
  KEY `to_id` (`to_id`),
  KEY `subject` (`subject`)
) ENGINE=MyISAM AUTO_INCREMENT=16138 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `map`
-- ----------------------------
DROP TABLE IF EXISTS `map`;
CREATE TABLE `map` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `x` smallint(3) NOT NULL,
  `y` smallint(3) NOT NULL,
  `type` enum('grass','berg','see','forest','other') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'other',
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `x` (`x`),
  KEY `y` (`y`)
) ENGINE=MyISAM AUTO_INCREMENT=354256 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `map_info`
-- ----------------------------
DROP TABLE IF EXISTS `map_info`;
CREATE TABLE `map_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `resources` int(1) NOT NULL,
  `farm` int(1) NOT NULL,
  `dealers` int(1) NOT NULL,
  `troops` int(1) NOT NULL,
  `attktime` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- ----------------------------
--  Table structure for `map_styling`
-- ----------------------------
DROP TABLE IF EXISTS `map_styling`;
CREATE TABLE `map_styling` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `x` int(11) unsigned NOT NULL,
  `y` int(11) unsigned NOT NULL,
  `type` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `marked`
-- ----------------------------
DROP TABLE IF EXISTS `marked`;
CREATE TABLE `marked` (
  `marker_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `marked_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `medal`
-- ----------------------------
DROP TABLE IF EXISTS `medal`;
CREATE TABLE `medal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL DEFAULT '0',
  `points_stage` int(11) NOT NULL DEFAULT '0',
  `lad` int(11) NOT NULL DEFAULT '0',
  `lad_stage` int(11) NOT NULL DEFAULT '0',
  `saque` int(11) NOT NULL DEFAULT '0',
  `saque_stage` int(11) NOT NULL DEFAULT '0',
  `conquer` int(11) NOT NULL DEFAULT '0',
  `conquer_stage` int(11) NOT NULL DEFAULT '0',
  `lider` int(11) NOT NULL DEFAULT '0',
  `lider_stage` int(11) NOT NULL DEFAULT '0',
  `hero` int(11) NOT NULL DEFAULT '0',
  `hero_stage` int(11) NOT NULL DEFAULT '0',
  `rank` int(11) NOT NULL DEFAULT '0',
  `rank_stage` int(11) NOT NULL DEFAULT '0',
  `reserved` int(11) NOT NULL DEFAULT '0',
  `reserved_stage` int(11) NOT NULL DEFAULT '0',
  `merkat` int(11) NOT NULL DEFAULT '0',
  `merkat_stage` int(11) NOT NULL DEFAULT '0',
  `friends` int(11) NOT NULL DEFAULT '0',
  `friends_stage` int(11) NOT NULL DEFAULT '0',
  `wars` int(11) NOT NULL DEFAULT '0',
  `wars_stage` int(11) NOT NULL DEFAULT '0',
  `demolisher` int(11) NOT NULL DEFAULT '0',
  `demolisher_stage` int(11) NOT NULL DEFAULT '0',
  `tribo` int(11) NOT NULL DEFAULT '0',
  `tribo_stage` int(11) NOT NULL DEFAULT '0',
  `nobles_faith` int(11) NOT NULL DEFAULT '0',
  `nobles_faith_stage` int(11) NOT NULL DEFAULT '0',
  `master_camp` int(11) NOT NULL DEFAULT '0',
  `master_camp_stage` int(11) NOT NULL DEFAULT '0',
  `scout` int(11) NOT NULL DEFAULT '0',
  `scout_stage` int(11) NOT NULL DEFAULT '0',
  `gluck` int(11) NOT NULL DEFAULT '0',
  `gluck_stage` int(11) NOT NULL DEFAULT '0',
  `bluck` int(11) NOT NULL DEFAULT '0',
  `bluck_stage` int(11) NOT NULL DEFAULT '0',
  `vit` int(11) NOT NULL DEFAULT '0',
  `vit_stage` int(11) NOT NULL DEFAULT '0',
  `aconquer` int(11) NOT NULL DEFAULT '0',
  `aconquer_stage` int(11) NOT NULL DEFAULT '0',
  `aatack` int(11) NOT NULL DEFAULT '0',
  `aatack_stage` int(11) NOT NULL DEFAULT '0',
  `refors` int(11) NOT NULL DEFAULT '0',
  `refors_stage` int(11) NOT NULL DEFAULT '0',
  `resurrection` int(11) NOT NULL DEFAULT '0',
  `resurrection_stage` int(11) NOT NULL DEFAULT '0',
  `gold` int(11) NOT NULL DEFAULT '0',
  `gold_stage` int(11) NOT NULL DEFAULT '0',
  `wallbreaker` int(11) NOT NULL DEFAULT '0',
  `wallbreaker_stage` int(11) NOT NULL DEFAULT '0',
  `rank_view` int(11) NOT NULL DEFAULT '0',
  `points_view` int(11) NOT NULL DEFAULT '0',
  `lad_view` int(11) NOT NULL DEFAULT '0',
  `saque_view` int(11) NOT NULL DEFAULT '0',
  `conquer_view` int(11) NOT NULL DEFAULT '0',
  `lider_view` int(11) NOT NULL DEFAULT '0',
  `hero_view` int(11) NOT NULL DEFAULT '0',
  `reserved_view` int(11) NOT NULL DEFAULT '0',
  `merkat_view` int(11) NOT NULL DEFAULT '0',
  `friends_view` int(11) NOT NULL DEFAULT '0',
  `wars_view` int(11) NOT NULL DEFAULT '0',
  `demolisher_view` int(11) NOT NULL DEFAULT '0',
  `tribo_view` int(11) NOT NULL DEFAULT '0',
  `nobles_faith_view` int(11) NOT NULL DEFAULT '0',
  `master_camp_view` int(11) NOT NULL DEFAULT '0',
  `scout_view` int(11) NOT NULL DEFAULT '0',
  `aatack_view` int(11) NOT NULL DEFAULT '0',
  `gluck_view` int(11) NOT NULL DEFAULT '0',
  `bluck_view` int(11) NOT NULL DEFAULT '0',
  `aconquer_view` int(11) NOT NULL DEFAULT '0',
  `refors_view` int(11) NOT NULL DEFAULT '0',
  `resurrection_view` int(11) NOT NULL DEFAULT '0',
  `gold_view` int(11) NOT NULL DEFAULT '0',
  `wallbreaker_view` int(11) NOT NULL DEFAULT '0',
  `total_stage` int(11) NOT NULL DEFAULT '0',
  `rang` int(11) NOT NULL DEFAULT '0',
  `userid` int(11) NOT NULL DEFAULT '0',
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1467 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=289;

-- ----------------------------
--  Table structure for `movements`
-- ----------------------------
DROP TABLE IF EXISTS `movements`;
CREATE TABLE `movements` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `from_village` int(11) unsigned DEFAULT NULL,
  `to_village` int(11) unsigned DEFAULT NULL,
  `units` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` int(11) unsigned NOT NULL,
  `end_time` int(11) unsigned NOT NULL,
  `building` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_userid` int(11) unsigned NOT NULL,
  `to_userid` int(11) unsigned NOT NULL,
  `to_hidden` int(1) unsigned DEFAULT '0',
  `wood` int(11) unsigned NOT NULL DEFAULT '0',
  `stone` int(11) unsigned NOT NULL DEFAULT '0',
  `iron` int(11) unsigned NOT NULL DEFAULT '0',
  `send_from_village` int(11) unsigned NOT NULL,
  `send_from_user` int(11) unsigned NOT NULL,
  `send_to_user` int(11) unsigned NOT NULL,
  `send_to_village` int(11) unsigned NOT NULL,
  `die` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `end_time` (`end_time`),
  KEY `send_from_village` (`send_from_village`),
  KEY `send_from_user` (`send_from_user`),
  KEY `send_to_user` (`send_to_user`),
  KEY `send_to_village` (`send_to_village`),
  KEY `from_hidden` (`to_hidden`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `offers`
-- ----------------------------
DROP TABLE IF EXISTS `offers`;
CREATE TABLE `offers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sell` int(11) unsigned NOT NULL,
  `buy` int(11) unsigned NOT NULL,
  `sell_ress` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `buy_ress` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `multi` int(11) NOT NULL,
  `from_village` int(11) unsigned NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `do_action` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `ratio_max` double unsigned NOT NULL,
  `userid` int(11) unsigned NOT NULL,
  `x` int(11) unsigned NOT NULL,
  `y` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `offers_multi`
-- ----------------------------
DROP TABLE IF EXISTS `offers_multi`;
CREATE TABLE `offers_multi` (
  `id` int(11) unsigned NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `quests`
-- ----------------------------
DROP TABLE IF EXISTS `quests`;
CREATE TABLE `quests` (
  `userid` int(11) NOT NULL,
  `leem30` int(2) NOT NULL,
  `hout30` int(2) NOT NULL,
  `ijzer30` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `quickbar`
-- ----------------------------
DROP TABLE IF EXISTS `quickbar`;
CREATE TABLE `quickbar` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `img` text COLLATE utf8_unicode_ci NOT NULL,
  `href` text COLLATE utf8_unicode_ci NOT NULL,
  `target` int(11) unsigned NOT NULL,
  `uid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `ranking_ally_k`
-- ----------------------------
DROP TABLE IF EXISTS `ranking_ally_k`;
CREATE TABLE `ranking_ally_k` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `allyid` int(11) NOT NULL,
  `ally` varchar(255) NOT NULL,
  `members` int(11) NOT NULL,
  `rank` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `villages` int(11) NOT NULL,
  `continent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `ranking_user_k`
-- ----------------------------
DROP TABLE IF EXISTS `ranking_user_k`;
CREATE TABLE `ranking_user_k` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `rank` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `villages` int(11) NOT NULL,
  `continent` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1574 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `recruit`
-- ----------------------------
DROP TABLE IF EXISTS `recruit`;
CREATE TABLE `recruit` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `unit` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `num_unit` int(11) unsigned DEFAULT '0',
  `num_finished` int(11) unsigned DEFAULT '0',
  `last_reload` int(11) DEFAULT '-1',
  `time_finished` int(11) unsigned NOT NULL,
  `time_start` int(11) unsigned NOT NULL,
  `time_per_unit` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `building` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `villageid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `building` (`building`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `reports`
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(230) COLLATE utf8_unicode_ci NOT NULL,
  `title_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `type` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `a_units` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `b_units` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `c_units` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `d_units` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `e_units` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agreement` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ram` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `catapult` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `to_user` int(11) unsigned NOT NULL,
  `from_user` int(11) NOT NULL,
  `to_village` int(11) unsigned NOT NULL,
  `from_village` int(11) unsigned NOT NULL,
  `receiver_userid` int(11) unsigned NOT NULL,
  `is_new` int(1) unsigned NOT NULL DEFAULT '1',
  `in_group` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `luck` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moral` int(6) DEFAULT NULL,
  `wins` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `hives` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `see_def_units` int(1) unsigned NOT NULL DEFAULT '1',
  `ally` int(11) unsigned NOT NULL,
  `allyname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `from_username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `to_username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `receiver_userid` (`receiver_userid`),
  KEY `group` (`in_group`)
) ENGINE=MyISAM AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `research`
-- ----------------------------
DROP TABLE IF EXISTS `research`;
CREATE TABLE `research` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `research` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `villageid` int(11) unsigned NOT NULL,
  `end_time` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `run_events`
-- ----------------------------
DROP TABLE IF EXISTS `run_events`;
CREATE TABLE `run_events` (
  `id` int(11) unsigned NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `save_players`
-- ----------------------------
DROP TABLE IF EXISTS `save_players`;
CREATE TABLE `save_players` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `round_id` int(11) unsigned NOT NULL DEFAULT '0',
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rank` int(11) unsigned NOT NULL DEFAULT '0',
  `ally` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `points` int(11) unsigned NOT NULL DEFAULT '0',
  `villages` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `save_rounds`
-- ----------------------------
DROP TABLE IF EXISTS `save_rounds`;
CREATE TABLE `save_rounds` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `start` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `end` varchar(80) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `speed_units` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `moral` int(1) unsigned NOT NULL DEFAULT '0',
  `speed` int(11) unsigned NOT NULL DEFAULT '0',
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `map` int(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `sessions`
-- ----------------------------
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) unsigned NOT NULL,
  `sid` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `hkey` varchar(5000) COLLATE utf8_unicode_ci NOT NULL,
  `is_vacation` int(1) unsigned NOT NULL DEFAULT '0',
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sid` (`sid`(333)),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `share`
-- ----------------------------
DROP TABLE IF EXISTS `share`;
CREATE TABLE `share` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_from` int(20) NOT NULL,
  `id_to` int(20) NOT NULL,
  `time` int(11) NOT NULL,
  `username_to` varchar(320) COLLATE utf8_unicode_ci NOT NULL,
  `delete_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `unit_place`
-- ----------------------------
DROP TABLE IF EXISTS `unit_place`;
CREATE TABLE `unit_place` (
  `unit_spear` int(11) DEFAULT '0',
  `unit_sword` int(11) DEFAULT '0',
  `unit_archer` int(11) DEFAULT '0',
  `unit_axe` int(11) DEFAULT '0',
  `unit_spy` int(11) DEFAULT '0',
  `unit_light` int(11) DEFAULT '0',
  `unit_marcher` int(11) DEFAULT '0',
  `unit_heavy` int(11) DEFAULT '0',
  `unit_ram` int(11) DEFAULT '0',
  `unit_catapult` int(11) DEFAULT '0',
  `unit_knight` int(5) DEFAULT '0',
  `unit_snob` int(5) DEFAULT '0',
  `villages_from_id` int(11) NOT NULL DEFAULT '0',
  `villages_to_id` int(11) NOT NULL DEFAULT '0',
  KEY `villages_from_id` (`villages_from_id`),
  KEY `villages_to_id` (`villages_to_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `banned` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `villages` int(10) NOT NULL,
  `points` int(20) unsigned NOT NULL,
  `ennobled_by` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  `ally` int(11) NOT NULL DEFAULT '-1',
  `ally_titel` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ally_found` int(1) unsigned NOT NULL DEFAULT '0',
  `ally_lead` int(1) unsigned NOT NULL DEFAULT '0',
  `ally_invite` int(1) unsigned NOT NULL DEFAULT '0',
  `ally_diplomacy` int(1) unsigned NOT NULL DEFAULT '0',
  `ally_mass_mail` int(1) unsigned NOT NULL DEFAULT '0',
  `rang` int(11) unsigned NOT NULL,
  `villages_mode` varchar(25) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'prod',
  `attacks` int(5) unsigned DEFAULT '0',
  `new_report` int(1) unsigned NOT NULL DEFAULT '0',
  `new_mail` int(1) unsigned DEFAULT '0',
  `market_sell` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'all',
  `market_buy` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'all',
  `market_ratio_max` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '3',
  `killed_units_att` int(25) unsigned NOT NULL,
  `killed_units_att_rank` int(11) unsigned NOT NULL,
  `killed_units_def` int(25) unsigned NOT NULL,
  `killed_units_def_rank` int(25) unsigned NOT NULL,
  `killed_units_altogether` int(25) unsigned NOT NULL,
  `killed_units_altogether_rank` int(11) unsigned NOT NULL,
  `do_action` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `last_activity` int(11) unsigned NOT NULL,
  `birthday` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `vacation_id` int(11) NOT NULL DEFAULT '-1',
  `vacation_name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `vacation_accept` int(1) unsigned NOT NULL DEFAULT '0',
  `b_day` int(2) unsigned NOT NULL,
  `b_month` int(2) unsigned NOT NULL,
  `b_year` int(4) unsigned NOT NULL,
  `sex` enum('f','m','x') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'x',
  `home` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `personal_text` text COLLATE utf8_unicode_ci NOT NULL,
  `window_width` int(4) unsigned NOT NULL DEFAULT '840',
  `show_toolbar` int(1) unsigned NOT NULL DEFAULT '1',
  `dyn_menu` int(1) unsigned NOT NULL DEFAULT '1',
  `confirm_queue` int(1) unsigned NOT NULL DEFAULT '1',
  `map_size` int(2) unsigned NOT NULL DEFAULT '9',
  `minimap_size` enum('s','m','b') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'm',
  `memo` text COLLATE utf8_unicode_ci NOT NULL,
  `map_reload` text COLLATE utf8_unicode_ci NOT NULL,
  `graphical_overview` tinyint(1) unsigned NOT NULL DEFAULT '1',
  `overview` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'new',
  `labels` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'yes',
  `coins` int(11) unsigned NOT NULL DEFAULT '0',
  `snobs` int(11) unsigned NOT NULL DEFAULT '0',
  `coinsNext` int(11) unsigned NOT NULL DEFAULT '1',
  `protection` int(11) NOT NULL DEFAULT '0',
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `css` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'stamm.css',
  `image_base` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'graphic',
  `gfx_old` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `knightname` varchar(150) COLLATE utf8_unicode_ci DEFAULT 'Paladin',
  `data_inregistrare` varchar(1111) COLLATE utf8_unicode_ci NOT NULL,
  `ip_inregistrare` varchar(1111) COLLATE utf8_unicode_ci NOT NULL,
  `medc` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `premium_active` int(11) NOT NULL,
  `premium_active_until` int(11) NOT NULL,
  `premium_activated_at` int(11) NOT NULL,
  `join_actions` enum('n','y') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `rang` (`rang`),
  KEY `vacation_id` (`vacation_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11419 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `villages`
-- ----------------------------
DROP TABLE IF EXISTS `villages`;
CREATE TABLE `villages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `x` int(11) unsigned NOT NULL,
  `y` int(11) unsigned NOT NULL,
  `bonus` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `r_wood` double unsigned DEFAULT '500',
  `r_stone` double unsigned DEFAULT '500',
  `r_iron` double unsigned DEFAULT '400',
  `r_bh` int(15) unsigned NOT NULL DEFAULT '0',
  `last_prod_aktu` int(11) unsigned NOT NULL,
  `points` int(11) unsigned NOT NULL,
  `continent` int(6) unsigned NOT NULL,
  `main` int(5) unsigned DEFAULT '1',
  `barracks` int(5) unsigned DEFAULT '0',
  `stable` int(5) unsigned DEFAULT '0',
  `garage` int(5) unsigned DEFAULT '0',
  `snob` int(5) unsigned DEFAULT '0',
  `smith` int(5) unsigned DEFAULT '0',
  `place` int(5) unsigned DEFAULT '1',
  `statue` int(5) unsigned DEFAULT '0',
  `market` int(5) unsigned DEFAULT '0',
  `wood` int(5) unsigned DEFAULT '0',
  `stone` int(5) unsigned DEFAULT '0',
  `iron` int(5) unsigned DEFAULT '0',
  `storage` int(5) unsigned DEFAULT '1',
  `farm` int(5) unsigned DEFAULT '1',
  `hide` int(5) unsigned DEFAULT '1',
  `wall` int(5) unsigned DEFAULT '0',
  `unit_spear_tec_level` int(11) unsigned DEFAULT '1',
  `unit_sword_tec_level` int(11) unsigned DEFAULT '0',
  `unit_axe_tec_level` int(11) unsigned DEFAULT '0',
  `unit_archer_tec_level` int(11) unsigned DEFAULT '1',
  `unit_spy_tec_level` int(11) unsigned DEFAULT '1',
  `unit_light_tec_level` int(11) unsigned DEFAULT '0',
  `unit_marcher_tec_level` int(11) unsigned DEFAULT '0',
  `unit_heavy_tec_level` int(11) unsigned DEFAULT '0',
  `unit_ram_tec_level` int(11) unsigned DEFAULT '0',
  `unit_catapult_tec_level` int(11) unsigned DEFAULT '0',
  `unit_knight_tec_level` int(11) unsigned DEFAULT '1',
  `unit_snob_tec_level` int(11) unsigned DEFAULT '1',
  `trader_away` int(5) unsigned DEFAULT '0',
  `main_build` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `all_unit_spear` int(6) unsigned NOT NULL DEFAULT '0',
  `all_unit_sword` int(6) unsigned DEFAULT '0',
  `all_unit_axe` int(6) unsigned DEFAULT '0',
  `all_unit_archer` int(6) unsigned DEFAULT '0',
  `all_unit_spy` int(6) unsigned DEFAULT '0',
  `all_unit_light` int(6) unsigned DEFAULT '0',
  `all_unit_marcher` int(6) unsigned DEFAULT '0',
  `all_unit_heavy` int(6) unsigned DEFAULT '0',
  `all_unit_ram` int(6) unsigned DEFAULT '0',
  `all_unit_catapult` int(6) unsigned DEFAULT '0',
  `all_unit_knight` int(6) unsigned DEFAULT '0',
  `all_unit_snob` int(6) unsigned DEFAULT '0',
  `recruited_snobs` int(5) unsigned DEFAULT '0',
  `control_villages` int(5) unsigned DEFAULT '0',
  `attacks` int(5) unsigned DEFAULT '0',
  `agreement` varchar(200) COLLATE utf8_unicode_ci DEFAULT '100',
  `agreement_aktu` int(35) unsigned NOT NULL,
  `snobed_by` int(11) DEFAULT '-1',
  `dealers_outside` int(6) unsigned NOT NULL DEFAULT '0',
  `create_time` int(11) unsigned NOT NULL,
  `smith_tec` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `conmap_con` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `l_grow` int(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `x_2` (`x`,`y`),
  KEY `name` (`name`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=494 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
