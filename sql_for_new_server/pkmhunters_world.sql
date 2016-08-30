/*
 Navicat Premium Data Transfer

 Source Server         : lordswar_server
 Source Server Type    : MySQL
 Source Server Version : 50712
 Source Host           : 104.236.242.31
 Source Database       : pkmhunters_world

 Target Server Type    : MySQL
 Target Server Version : 50712
 File Encoding         : utf-8

 Date: 08/30/2016 21:07:02 PM
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
  `points` int(20) unsigned NOT NULL DEFAULT '0',
  `rank` int(11) unsigned NOT NULL DEFAULT '0',
  `best_points` int(20) unsigned NOT NULL DEFAULT '0',
  `members` int(11) unsigned NOT NULL DEFAULT '0',
  `villages` int(11) unsigned NOT NULL DEFAULT '0',
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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=751 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
--  Records of `create_village`
-- ----------------------------
BEGIN;
INSERT INTO `create_village` VALUES ('7', '6', '6', '7', '5', '5', '4', '4', '56', '68', '60', '25', '1');
COMMIT;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
--  Records of `create_village_barb`
-- ----------------------------
BEGIN;
INSERT INTO `create_village_barb` VALUES ('22', '22', '20', '20', '66', '66', '65', '65', '69', '86', '32', '85', '1');
COMMIT;

-- ----------------------------
--  Table structure for `cron`
-- ----------------------------
DROP TABLE IF EXISTS `cron`;
CREATE TABLE `cron` (
  `mail` int(11) NOT NULL DEFAULT '0',
  `mail_last` int(11) NOT NULL,
  `report` int(11) NOT NULL DEFAULT '0',
  `report_last` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

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
) ENGINE=MyISAM AUTO_INCREMENT=44 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
  `knot_event` int(15) DEFAULT NULL,
  `cid` varchar(32) COLLATE utf8_unicode_ci DEFAULT '0',
  `can_knot` int(1) DEFAULT '0',
  `is_locked` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `event_type` (`event_type`),
  KEY `event_id` (`event_id`),
  KEY `event_time` (`event_time`),
  KEY `user_id` (`user_id`),
  KEY `villageid` (`villageid`)
) ENGINE=MyISAM AUTO_INCREMENT=1045 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `forum`
-- ----------------------------
DROP TABLE IF EXISTS `forum`;
CREATE TABLE `forum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ally` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `forum_f_read`
-- ----------------------------
DROP TABLE IF EXISTS `forum_f_read`;
CREATE TABLE `forum_f_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `forum_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=FIXED;

-- ----------------------------
--  Table structure for `forum_message`
-- ----------------------------
DROP TABLE IF EXISTS `forum_message`;
CREATE TABLE `forum_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL,
  `message` varchar(4000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ally_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `forum_read`
-- ----------------------------
DROP TABLE IF EXISTS `forum_read`;
CREATE TABLE `forum_read` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=334 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=FIXED;

-- ----------------------------
--  Table structure for `forum_structure`
-- ----------------------------
DROP TABLE IF EXISTS `forum_structure`;
CREATE TABLE `forum_structure` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ally_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `forum_structure`
-- ----------------------------
BEGIN;
INSERT INTO `forum_structure` VALUES ('1', '12', '1', '1', 'HAHAHA');
COMMIT;

-- ----------------------------
--  Table structure for `forum_thread`
-- ----------------------------
DROP TABLE IF EXISTS `forum_thread`;
CREATE TABLE `forum_thread` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_id` int(11) NOT NULL,
  `subject` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `important` int(11) NOT NULL DEFAULT '0',
  `closed` int(11) NOT NULL DEFAULT '0',
  `ally_id` int(11) NOT NULL COMMENT '测试代码一',
  `flagman_id` int(11) NOT NULL,
  `last_post` int(11) DEFAULT NULL,
  `last_post_id` int(11) NOT NULL,
  `last_post_ts` int(11) NOT NULL,
  `flagman_ts` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `forum_thread_ori`
-- ----------------------------
DROP TABLE IF EXISTS `forum_thread_ori`;
CREATE TABLE `forum_thread_ori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(5000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) NOT NULL,
  `important` int(11) NOT NULL DEFAULT '0',
  `closed` int(11) NOT NULL DEFAULT '0',
  `ally_id` int(11) NOT NULL COMMENT '测试代码一',
  `area_id` int(11) NOT NULL COMMENT '测试代码一',
  `thread_id` int(11) NOT NULL COMMENT '测试代码一',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=735 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
--  Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `group_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `knight_items`
-- ----------------------------
BEGIN;
INSERT INTO `knight_items` VALUES ('1', null, '0', '1472561760', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'), ('5', null, '0', '1472561760', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false'), ('6', null, '0', '1472561760', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false');
COMMIT;

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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `time` int(11) unsigned NOT NULL,
  `ip` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) unsigned NOT NULL,
  `uv` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=157 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
  `event_type` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=16392 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=16143 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=354256 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci ROW_FORMAT=FIXED;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `marked`
-- ----------------------------
DROP TABLE IF EXISTS `marked`;
CREATE TABLE `marked` (
  `marker_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `marked_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=1474 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AVG_ROW_LENGTH=289 ROW_FORMAT=DYNAMIC;

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
  `from_userid` int(11) NOT NULL,
  `to_userid` int(11) NOT NULL,
  `to_hidden` int(1) unsigned DEFAULT '0',
  `wood` int(11) unsigned NOT NULL DEFAULT '0',
  `stone` int(11) unsigned NOT NULL DEFAULT '0',
  `iron` int(11) unsigned NOT NULL DEFAULT '0',
  `send_from_village` int(11) unsigned NOT NULL,
  `send_from_user` int(11) unsigned NOT NULL,
  `send_to_user` int(11) NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `offers_multi`
-- ----------------------------
DROP TABLE IF EXISTS `offers_multi`;
CREATE TABLE `offers_multi` (
  `id` int(11) unsigned NOT NULL,
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
--  Table structure for `quests`
-- ----------------------------
DROP TABLE IF EXISTS `quests`;
CREATE TABLE `quests` (
  `userid` int(11) NOT NULL,
  `leem30` int(2) NOT NULL,
  `hout30` int(2) NOT NULL,
  `ijzer30` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=1574 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `reports`
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(230) COLLATE utf8_unicode_ci NOT NULL,
  `title_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` int(11) unsigned NOT NULL,
  `type` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `a_units` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_units` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `c_units` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `d_units` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `e_units` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `agreement` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ram` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `catapult` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8_unicode_ci,
  `to_user` int(11) DEFAULT NULL,
  `from_user` int(11) DEFAULT NULL,
  `to_village` int(11) unsigned DEFAULT NULL,
  `from_village` int(11) unsigned DEFAULT NULL,
  `receiver_userid` int(11) unsigned DEFAULT NULL,
  `is_new` int(1) unsigned DEFAULT '1',
  `in_group` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `luck` varchar(6) COLLATE utf8_unicode_ci DEFAULT NULL,
  `moral` int(6) DEFAULT NULL,
  `wins` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hives` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `see_def_units` int(1) unsigned DEFAULT '1',
  `ally` int(11) unsigned DEFAULT NULL,
  `allyname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from_username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `receiver_userid` (`receiver_userid`),
  KEY `group` (`in_group`)
) ENGINE=MyISAM AUTO_INCREMENT=343 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `run_events`
-- ----------------------------
DROP TABLE IF EXISTS `run_events`;
CREATE TABLE `run_events` (
  `id` int(11) unsigned NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=FIXED;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
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
  `knightname` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Paladin',
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
) ENGINE=MyISAM AUTO_INCREMENT=11419 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Table structure for `villages`
-- ----------------------------
DROP TABLE IF EXISTS `villages`;
CREATE TABLE `villages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `x` int(11) unsigned NOT NULL,
  `y` int(11) unsigned NOT NULL,
  `bonus` int(11) DEFAULT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `r_wood` double unsigned DEFAULT '500',
  `r_stone` double unsigned DEFAULT '500',
  `r_iron` double unsigned DEFAULT '400',
  `r_bh` int(15) unsigned DEFAULT '0',
  `last_prod_aktu` int(11) unsigned NOT NULL,
  `points` int(11) unsigned DEFAULT NULL,
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
  `main_build` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
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
  `attacks` int(5) DEFAULT '0',
  `agreement` varchar(200) COLLATE utf8_unicode_ci DEFAULT '100',
  `agreement_aktu` int(35) unsigned DEFAULT NULL,
  `snobed_by` int(11) DEFAULT '-1',
  `dealers_outside` int(6) unsigned NOT NULL DEFAULT '0',
  `create_time` int(11) unsigned NOT NULL,
  `smith_tec` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `conmap_con` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `group` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `l_grow` int(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `x_2` (`x`,`y`),
  KEY `name` (`name`),
  KEY `userid` (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=559 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- ----------------------------
--  Records of `villages`
-- ----------------------------
BEGIN;
INSERT INTO `villages` VALUES ('492', '519', '510', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '222', '1416839816', '401', '55', '9', '2', '6', '5', '0', '7', '1', '0', '10', '4', '5', '10', '8', '9', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839816', '', '', '', '1416839906'), ('493', '480', '502', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '202', '1416839816', '401', '54', '6', '8', '8', '2', '0', '9', '1', '0', '4', '3', '4', '9', '8', '11', '6', '2', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839816', '', '', '', '1416839903'), ('491', '481', '499', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '217', '1416839815', '402', '44', '9', '6', '4', '7', '0', '10', '1', '0', '4', '3', '7', '4', '8', '5', '6', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839895'), ('490', '507', '481', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '163', '1416839815', '408', '45', '5', '8', '6', '10', '0', '5', '1', '0', '6', '5', '3', '9', '2', '6', '6', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839891'), ('489', '481', '505', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '146', '1416839815', '401', '54', '7', '7', '10', '4', '0', '4', '1', '0', '6', '7', '6', '3', '7', '7', '10', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839909'), ('488', '517', '512', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '185', '1416839815', '402', '55', '2', '8', '6', '4', '0', '6', '1', '0', '7', '4', '8', '6', '8', '8', '9', '12', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839907'), ('487', '481', '495', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '158', '1416839815', '405', '44', '10', '6', '7', '8', '0', '5', '1', '0', '5', '4', '7', '6', '7', '5', '6', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839900'), ('486', '504', '480', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '181', '1416839815', '406', '45', '9', '3', '4', '8', '0', '6', '1', '0', '9', '6', '6', '6', '7', '12', '4', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839902'), ('484', '515', '514', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '192', '1416839815', '401', '55', '6', '5', '5', '5', '0', '8', '1', '0', '7', '12', '6', '4', '8', '12', '6', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839907'), ('485', '482', '508', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '176', '1416839815', '405', '54', '5', '3', '7', '7', '0', '6', '1', '0', '7', '10', '5', '7', '9', '8', '8', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839908'), ('483', '482', '493', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '213', '1416839815', '403', '44', '7', '6', '4', '7', '0', '9', '1', '0', '7', '6', '6', '6', '8', '8', '5', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839903'), ('482', '501', '482', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '172', '1416839815', '405', '45', '8', '2', '5', '8', '0', '7', '1', '0', '6', '8', '3', '5', '10', '8', '10', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839912'), ('481', '483', '511', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '166', '1416839815', '406', '54', '8', '8', '2', '6', '0', '3', '1', '0', '8', '7', '8', '6', '8', '7', '10', '11', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839919'), ('480', '513', '516', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '189', '1416839815', '403', '55', '4', '10', '2', '6', '0', '7', '1', '0', '8', '7', '6', '7', '8', '11', '2', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839898'), ('479', '484', '490', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '177', '1416839815', '402', '44', '9', '4', '6', '5', '0', '6', '1', '0', '7', '7', '7', '4', '5', '11', '7', '11', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839912'), ('478', '517', '497', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '165', '1416839815', '402', '45', '6', '8', '6', '9', '0', '4', '1', '0', '8', '6', '5', '8', '7', '3', '7', '2', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839901'), ('476', '511', '518', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '179', '1416839815', '402', '55', '7', '9', '4', '7', '0', '5', '1', '0', '9', '7', '7', '5', '7', '7', '9', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839910'), ('477', '485', '514', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '208', '1416839815', '403', '54', '8', '6', '4', '7', '0', '7', '1', '0', '8', '4', '9', '9', '8', '6', '7', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839910'), ('475', '486', '487', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '162', '1416839815', '401', '44', '7', '9', '5', '8', '0', '5', '1', '0', '8', '6', '8', '2', '9', '6', '3', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839897'), ('474', '516', '494', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '211', '1416839815', '403', '45', '4', '6', '7', '6', '0', '9', '1', '0', '5', '7', '9', '4', '7', '4', '8', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839904'), ('473', '488', '516', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '186', '1416839815', '402', '54', '6', '6', '9', '6', '0', '7', '1', '0', '7', '3', '6', '8', '9', '6', '4', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839897'), ('472', '509', '519', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '168', '1416839815', '410', '55', '6', '10', '5', '5', '0', '6', '1', '0', '5', '5', '8', '7', '9', '11', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839912'), ('471', '488', '484', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '154', '1416839815', '403', '44', '6', '7', '3', '3', '0', '7', '1', '0', '4', '8', '6', '3', '15', '7', '10', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839905'), ('470', '517', '491', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '215', '1416839815', '403', '45', '5', '7', '7', '1', '0', '9', '1', '0', '5', '7', '9', '5', '6', '9', '10', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839912'), ('468', '506', '520', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '230', '1416839815', '410', '55', '9', '4', '5', '8', '0', '9', '1', '0', '9', '0', '6', '5', '4', '7', '9', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839895'), ('469', '490', '517', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '214', '1416839815', '406', '54', '5', '6', '5', '7', '0', '7', '1', '0', '9', '6', '12', '6', '5', '9', '5', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839903'), ('467', '491', '483', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '186', '1416839815', '402', '44', '5', '10', '4', '7', '0', '8', '1', '0', '5', '5', '7', '4', '3', '9', '7', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839900'), ('466', '513', '489', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '185', '1416839815', '409', '45', '7', '8', '7', '5', '0', '7', '1', '0', '6', '6', '9', '4', '5', '11', '6', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839911'), ('465', '493', '519', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '215', '1416839815', '408', '54', '6', '8', '9', '4', '0', '8', '1', '0', '9', '5', '4', '4', '2', '7', '5', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839898'), ('464', '520', '502', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '132', '1416839815', '405', '55', '4', '10', '6', '8', '0', '4', '1', '0', '3', '6', '6', '5', '6', '10', '7', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839907'), ('463', '494', '482', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '168', '1416839815', '402', '44', '7', '8', '9', '5', '0', '4', '1', '0', '6', '6', '10', '8', '4', '6', '7', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839907'), ('462', '511', '487', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '209', '1416839815', '402', '45', '9', '5', '6', '5', '0', '9', '1', '0', '3', '6', '5', '10', '5', '11', '7', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839904'), ('460', '519', '505', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '192', '1416839815', '404', '55', '5', '11', '3', '4', '0', '7', '1', '0', '7', '4', '4', '8', '4', '10', '10', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839910'), ('461', '497', '520', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '227', '1416839815', '414', '54', '7', '7', '5', '7', '0', '9', '1', '0', '4', '4', '6', '11', '5', '6', '4', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839899'), ('459', '497', '481', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '172', '1416839815', '403', '44', '8', '10', '3', '6', '0', '6', '1', '0', '3', '10', '5', '10', '6', '8', '7', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839901'), ('458', '509', '486', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '167', '1416839815', '403', '45', '6', '4', '7', '8', '0', '5', '1', '0', '4', '3', '7', '11', '7', '9', '9', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839909'), ('457', '494', '516', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '185', '1416839815', '403', '54', '8', '5', '3', '7', '0', '5', '1', '0', '7', '7', '12', '9', '10', '6', '7', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839911'), ('456', '519', '507', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '154', '1416839815', '421', '55', '3', '5', '11', '8', '0', '6', '1', '0', '1', '1', '5', '8', '7', '8', '6', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839896'), ('455', '494', '483', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '183', '1416839815', '404', '44', '9', '9', '5', '5', '0', '6', '1', '0', '9', '8', '3', '5', '10', '7', '4', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839900'), ('454', '507', '483', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '202', '1416839815', '407', '45', '9', '8', '4', '6', '0', '8', '1', '0', '6', '6', '9', '4', '6', '6', '9', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839815', '', '', '', '1416839902'), ('453', '482', '502', '5', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '171', '1416839811', '402', '54', '8', '9', '2', '7', '0', '6', '1', '0', '6', '4', '7', '6', '7', '8', '9', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839811', '', '', '', '1416839904'), ('452', '517', '510', '5', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '199', '1416839811', '404', '55', '8', '5', '7', '4', '0', '6', '1', '0', '8', '7', '9', '7', '9', '3', '7', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839811', '', '', '', '1416839904'), ('451', '483', '500', '5', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '195', '1416839811', '402', '54', '10', '6', '5', '5', '0', '6', '1', '0', '7', '9', '11', '6', '4', '7', '5', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839811', '', '', '', '1416839905'), ('449', '483', '505', '5', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '218', '1416839811', '408', '54', '6', '4', '6', '8', '0', '9', '1', '0', '7', '6', '4', '7', '6', '4', '10', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839811', '', '', '', '1416839899'), ('450', '503', '482', '5', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '175', '1416839811', '408', '45', '10', '7', '6', '5', '0', '4', '1', '0', '8', '13', '8', '5', '4', '7', '8', '2', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839811', '', '', '', '1416839906'), ('448', '515', '513', '4', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '201', '1416839808', '409', '55', '7', '10', '8', '1', '0', '5', '1', '0', '10', '6', '9', '6', '7', '4', '6', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839808', '', '', '', '1416839891'), ('447', '483', '497', '4', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '160', '1416839808', '406', '44', '7', '6', '8', '7', '0', '5', '1', '0', '3', '4', '4', '9', '6', '5', '8', '11', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839808', '', '', '', '1416839897'), ('446', '503', '483', '4', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '221', '1416839808', '402', '45', '5', '8', '8', '5', '0', '9', '1', '0', '8', '4', '7', '3', '5', '4', '6', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839808', '', '', '', '1416839884'), ('444', '513', '515', '4', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '171', '1416839808', '401', '55', '8', '7', '10', '2', '0', '5', '1', '0', '6', '10', '5', '8', '5', '4', '10', '2', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839808', '', '', '', '1416839893'), ('445', '484', '508', '4', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '172', '1416839808', '403', '54', '9', '8', '6', '4', '0', '5', '1', '0', '7', '8', '7', '3', '7', '6', '7', '11', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839808', '', '', '', '1416839900'), ('442', '515', '499', '2', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '206', '1416839803', '405', '45', '4', '10', '3', '5', '0', '5', '1', '0', '11', '10', '3', '9', '8', '7', '2', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839803', '', '', '', '1416839893'), ('440', '510', '517', '2', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '245', '1416839803', '404', '55', '7', '4', '3', '5', '0', '10', '1', '0', '6', '6', '9', '6', '5', '4', '10', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839803', '', '', '', '1416839893'), ('441', '487', '511', '2', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '118', '1416839803', '404', '54', '8', '4', '8', '10', '0', '1', '1', '0', '5', '6', '8', '4', '8', '5', '5', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839803', '', '', '', '1416839885'), ('439', '486', '492', '2', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '160', '1416839803', '418', '44', '8', '5', '4', '11', '0', '4', '1', '0', '8', '4', '7', '6', '5', '7', '8', '1', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839803', '', '', '', '1416839882'), ('438', '515', '495', '2', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '129', '1416839803', '401', '45', '9', '8', '9', '8', '0', '3', '1', '0', '3', '3', '2', '8', '3', '7', '7', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839803', '', '', '', '1416839881'), ('437', '489', '513', '2', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '172', '1416839803', '401', '54', '6', '8', '7', '5', '0', '5', '1', '0', '5', '9', '12', '5', '8', '4', '6', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839803', '', '', '', '1416839896'), ('436', '508', '518', '2', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '233', '1416839803', '414', '55', '7', '7', '6', '5', '0', '9', '1', '0', '5', '6', '8', '11', '6', '8', '5', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839803', '', '', '', '1416839896'), ('435', '488', '490', '2', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '239', '1416839803', '401', '44', '8', '4', '5', '5', '0', '8', '1', '0', '11', '5', '7', '5', '5', '8', '5', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839803', '', '', '', '1416839891'), ('443', '485', '495', '2', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '157', '1416839803', '402', '44', '8', '9', '4', '6', '0', '5', '1', '0', '3', '7', '6', '10', '9', '9', '10', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839803', '', '', '', '1416839898'), ('434', '515', '492', '2', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '150', '1416839803', '414', '45', '6', '4', '6', '8', '0', '5', '1', '0', '7', '4', '3', '8', '13', '11', '8', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839803', '', '', '', '1416839891'), ('433', '491', '515', '3', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '181', '1416839798', '404', '54', '9', '10', '5', '4', '0', '6', '1', '0', '3', '9', '8', '8', '2', '5', '4', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839798', '', '', '', '1416839885'), ('432', '506', '519', '3', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '179', '1416839798', '403', '55', '6', '4', '7', '6', '0', '6', '1', '0', '6', '9', '9', '7', '7', '10', '7', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839798', '', '', '', '1416839893'), ('431', '489', '488', '3', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '206', '1416839798', '402', '44', '8', '6', '7', '3', '0', '8', '1', '0', '5', '7', '11', '8', '9', '8', '5', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839798', '', '', '', '1416839889'), ('430', '510', '487', '3', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '211', '1416839798', '402', '45', '5', '3', '3', '8', '0', '7', '1', '0', '10', '4', '8', '6', '7', '9', '7', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839798', '', '', '', '1416839888'), ('428', '503', '520', '3', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '178', '1416839798', '405', '55', '10', '7', '5', '4', '0', '5', '1', '0', '7', '5', '7', '9', '10', '8', '7', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839798', '', '', '', '1416839895'), ('429', '494', '517', '3', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '151', '1416839798', '402', '54', '12', '2', '4', '7', '0', '5', '1', '0', '3', '12', '6', '6', '9', '4', '5', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839798', '', '', '', '1416839884'), ('427', '491', '484', '3', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '176', '1416839798', '404', '44', '6', '4', '3', '5', '0', '5', '1', '0', '7', '6', '8', '7', '10', '9', '10', '13', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839798', '', '', '', '1416839902'), ('426', '516', '497', '3', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '139', '1416839798', '401', '45', '5', '6', '3', '6', '0', '5', '1', '0', '3', '7', '8', '5', '14', '7', '4', '12', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839798', '', '', '', '1416839889'), ('425', '498', '517', '3', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '166', '1416839798', '402', '54', '9', '7', '10', '2', '0', '6', '1', '0', '4', '10', '2', '7', '5', '7', '6', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839798', '', '', '', '1416839883'), ('424', '506', '517', '3', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '159', '1416839798', '414', '55', '8', '10', '6', '9', '0', '5', '1', '0', '7', '5', '5', '2', '5', '3', '4', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839798', '', '', '', '1416839872'), ('423', '494', '484', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '190', '1416839793', '415', '44', '1', '3', '11', '5', '0', '6', '1', '0', '9', '6', '9', '3', '7', '8', '6', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839793', '', '', '', '1416839886'), ('421', '498', '515', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '172', '1416839793', '405', '54', '6', '9', '5', '8', '0', '5', '1', '0', '5', '6', '7', '10', '4', '7', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839793', '', '', '', '1416839877'), ('422', '514', '495', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '139', '1416839793', '401', '45', '7', '5', '8', '8', '0', '3', '1', '0', '7', '7', '5', '4', '4', '11', '8', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839793', '', '', '', '1416839884'), ('420', '518', '503', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '133', '1416839793', '404', '55', '8', '7', '4', '10', '0', '4', '1', '0', '2', '7', '8', '6', '9', '3', '6', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839793', '', '', '', '1416839874'), ('419', '496', '483', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '215', '1416839793', '403', '44', '8', '7', '4', '6', '0', '8', '1', '0', '9', '5', '9', '4', '7', '8', '9', '1', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839793', '', '', '', '1416839881'), ('418', '514', '492', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '138', '1416839792', '412', '45', '10', '6', '4', '10', '0', '4', '1', '0', '5', '3', '1', '7', '5', '10', '6', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839871'), ('417', '486', '502', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '170', '1416839792', '403', '54', '8', '9', '7', '5', '0', '5', '1', '0', '7', '8', '6', '6', '7', '5', '10', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839881'), ('416', '517', '506', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '170', '1416839792', '403', '55', '8', '6', '7', '5', '0', '6', '1', '0', '5', '7', '7', '6', '8', '9', '7', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839890'), ('415', '496', '488', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '165', '1416839792', '407', '44', '8', '9', '6', '9', '0', '6', '1', '0', '6', '6', '4', '5', '6', '3', '2', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839868'), ('413', '490', '509', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '138', '1416839792', '406', '54', '7', '8', '6', '9', '0', '4', '1', '0', '4', '8', '6', '5', '7', '8', '7', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839884'), ('414', '511', '490', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '148', '1416839792', '402', '45', '6', '5', '2', '10', '0', '5', '1', '0', '6', '4', '10', '2', '6', '11', '9', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839879'), ('412', '516', '508', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '192', '1416839792', '405', '55', '4', '7', '8', '5', '0', '6', '1', '0', '6', '8', '11', '9', '9', '4', '7', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839882'), ('411', '486', '497', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '238', '1416839792', '409', '44', '8', '3', '5', '5', '0', '7', '1', '0', '12', '8', '7', '6', '8', '8', '8', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839885'), ('410', '510', '489', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '196', '1416839792', '408', '45', '4', '7', '2', '6', '0', '7', '1', '0', '9', '4', '9', '6', '14', '2', '10', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839889'), ('409', '491', '513', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '144', '1416839792', '403', '54', '8', '6', '8', '7', '0', '5', '1', '0', '3', '8', '2', '5', '7', '6', '10', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839879'), ('408', '514', '511', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '170', '1416839792', '404', '55', '6', '10', '5', '8', '0', '5', '1', '0', '5', '2', '10', '8', '3', '4', '7', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839873'), ('407', '488', '492', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '166', '1416839792', '402', '44', '5', '8', '8', '2', '0', '3', '1', '0', '9', '6', '7', '5', '10', '5', '10', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839884'), ('405', '493', '513', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '167', '1416839792', '407', '54', '6', '3', '7', '3', '0', '7', '1', '0', '5', '10', '6', '8', '15', '8', '5', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839878'), ('406', '508', '486', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '150', '1416839792', '421', '45', '6', '3', '11', '7', '0', '3', '1', '0', '7', '8', '6', '7', '10', '6', '2', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839873'), ('404', '512', '513', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '168', '1416839792', '404', '55', '8', '7', '8', '5', '0', '5', '1', '0', '6', '5', '11', '3', '5', '8', '10', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839882'), ('403', '490', '490', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '115', '1416839792', '407', '44', '5', '11', '2', '8', '0', '2', '1', '0', '5', '5', '4', '6', '13', '6', '9', '2', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839872'), ('402', '506', '485', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '167', '1416839792', '401', '45', '5', '3', '8', '8', '0', '1', '1', '0', '11', '10', '7', '5', '9', '3', '6', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839869'), ('401', '496', '516', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '156', '1416839792', '403', '54', '11', '3', '6', '7', '0', '5', '1', '0', '5', '6', '7', '5', '4', '10', '9', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839887'), ('400', '510', '515', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '178', '1416839792', '404', '55', '8', '7', '8', '6', '0', '8', '1', '0', '1', '6', '4', '7', '8', '5', '3', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839870'), ('399', '494', '489', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '154', '1416839792', '403', '44', '6', '7', '9', '6', '0', '5', '1', '0', '5', '6', '10', '3', '7', '9', '5', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839877'), ('397', '495', '512', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '208', '1416839792', '401', '54', '10', '7', '7', '3', '0', '9', '1', '0', '4', '9', '6', '6', '6', '5', '4', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839877'), ('398', '502', '486', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '179', '1416839792', '406', '45', '8', '4', '5', '8', '0', '7', '1', '0', '6', '7', '3', '8', '9', '9', '8', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839886'), ('396', '507', '517', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '155', '1416839792', '402', '55', '2', '4', '5', '10', '0', '4', '1', '0', '8', '6', '6', '6', '7', '8', '8', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839877'), ('395', '497', '487', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '174', '1416839792', '401', '44', '7', '7', '8', '7', '0', '7', '1', '0', '5', '4', '7', '4', '7', '5', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839874'), ('394', '506', '486', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '197', '1416839792', '401', '45', '5', '5', '6', '8', '0', '7', '1', '0', '6', '6', '12', '6', '5', '3', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839877'), ('393', '487', '501', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '209', '1416839792', '402', '54', '7', '9', '1', '4', '0', '6', '1', '0', '9', '8', '9', '7', '5', '7', '10', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839892'), ('392', '503', '518', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '233', '1416839792', '402', '55', '9', '5', '3', '7', '0', '9', '1', '0', '6', '5', '8', '10', '4', '5', '5', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839879'), ('391', '500', '487', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '174', '1416839792', '404', '45', '4', '10', '6', '6', '0', '6', '1', '0', '4', '9', '5', '9', '8', '3', '8', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839884'), ('389', '487', '504', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '153', '1416839792', '405', '54', '10', '7', '5', '7', '0', '3', '1', '0', '9', '6', '4', '3', '11', '5', '6', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839877'), ('390', '514', '499', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '193', '1416839792', '404', '45', '5', '5', '8', '5', '0', '7', '1', '0', '8', '6', '9', '3', '7', '9', '10', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839887'), ('388', '504', '515', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '226', '1416839792', '405', '55', '7', '3', '9', '1', '0', '8', '1', '0', '10', '6', '4', '7', '6', '9', '10', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839879'), ('387', '487', '498', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '158', '1416839792', '405', '44', '8', '8', '8', '5', '0', '3', '1', '0', '8', '4', '8', '7', '10', '8', '7', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839882'), ('386', '514', '497', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '225', '1416839792', '411', '45', '7', '2', '6', '7', '0', '9', '1', '0', '8', '6', '7', '4', '2', '10', '6', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839883'), ('385', '488', '506', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '193', '1416839792', '404', '54', '6', '2', '8', '4', '0', '9', '1', '0', '2', '10', '6', '7', '5', '13', '8', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839877'), ('384', '516', '502', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '181', '1416839792', '409', '55', '7', '5', '6', '7', '0', '6', '1', '0', '7', '8', '7', '8', '9', '10', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839792', '', '', '', '1416839887'), ('383', '487', '495', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '146', '1416839789', '409', '44', '7', '5', '6', '8', '0', '7', '1', '0', '3', '3', '4', '1', '11', '11', '10', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839873'), ('382', '512', '493', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '165', '1416839789', '403', '45', '4', '9', '10', '4', '0', '6', '1', '0', '6', '5', '5', '5', '8', '7', '4', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839870'), ('380', '515', '504', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '211', '1416839789', '401', '55', '6', '4', '9', '6', '0', '10', '1', '0', '5', '6', '3', '1', '7', '2', '4', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839858'), ('381', '490', '508', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '196', '1416839789', '402', '54', '3', '7', '5', '9', '0', '7', '1', '0', '8', '4', '4', '8', '4', '6', '10', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839873'), ('379', '490', '494', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '172', '1416839789', '402', '44', '11', '6', '5', '5', '0', '6', '1', '0', '6', '10', '5', '2', '4', '7', '9', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839877'), ('378', '510', '490', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '271', '1416839789', '401', '45', '5', '8', '3', '5', '0', '11', '1', '0', '9', '5', '5', '6', '5', '6', '5', '2', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839866'), ('377', '492', '510', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '166', '1416839789', '402', '54', '8', '7', '3', '8', '0', '6', '1', '0', '5', '5', '12', '3', '5', '11', '4', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839874'), ('376', '514', '507', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '170', '1416839789', '404', '55', '6', '8', '3', '7', '0', '7', '1', '0', '4', '9', '2', '6', '10', '6', '7', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839882'), ('375', '492', '491', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '153', '1416839789', '403', '44', '7', '1', '10', '7', '0', '5', '1', '0', '5', '11', '5', '5', '4', '9', '5', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839871'), ('374', '508', '488', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '193', '1416839789', '407', '45', '9', '4', '6', '6', '0', '7', '1', '0', '8', '7', '7', '3', '9', '6', '10', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839884'), ('372', '512', '510', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '151', '1416839789', '418', '55', '7', '4', '11', '4', '0', '4', '1', '0', '4', '3', '7', '9', '7', '11', '10', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839885'), ('373', '494', '511', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '152', '1416839789', '405', '54', '9', '5', '1', '10', '0', '4', '1', '0', '8', '5', '3', '4', '8', '6', '8', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839870'), ('371', '494', '488', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '219', '1416839789', '403', '44', '6', '4', '6', '5', '0', '7', '1', '0', '9', '2', '8', '11', '11', '5', '10', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839884'), ('370', '504', '487', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '162', '1416839789', '406', '45', '8', '5', '8', '6', '0', '4', '1', '0', '9', '5', '7', '3', '10', '8', '9', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839881'), ('369', '497', '513', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '203', '1416839789', '403', '54', '9', '8', '6', '6', '0', '9', '1', '0', '6', '2', '5', '4', '9', '4', '6', '2', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839868'), ('368', '509', '513', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '157', '1416839789', '403', '55', '4', '5', '7', '7', '0', '2', '1', '0', '6', '9', '7', '11', '8', '9', '10', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839886'), ('367', '488', '497', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '226', '1416839789', '401', '44', '5', '7', '4', '7', '0', '9', '1', '0', '9', '7', '5', '4', '7', '5', '6', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839871'), ('366', '503', '488', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '219', '1416839789', '403', '45', '9', '8', '7', '3', '0', '9', '1', '0', '6', '6', '6', '7', '6', '4', '7', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839873'), ('364', '507', '514', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '198', '1416839789', '401', '55', '7', '6', '7', '2', '0', '5', '1', '0', '11', '8', '6', '6', '11', '7', '8', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839885'), ('365', '496', '512', '1', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '188', '1416839789', '405', '54', '3', '8', '10', '2', '0', '6', '1', '0', '7', '9', '7', '8', '6', '7', '5', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839789', '', '', '', '1416839875'), ('362', '512', '497', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '177', '1416839783', '403', '45', '7', '7', '10', '2', '0', '7', '1', '0', '2', '7', '7', '7', '5', '6', '10', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839867'), ('363', '490', '495', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '181', '1416839783', '404', '44', '9', '7', '1', '8', '0', '7', '1', '0', '6', '7', '8', '5', '7', '9', '9', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839873'), ('361', '489', '504', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '185', '1416839783', '402', '54', '9', '5', '8', '4', '0', '6', '1', '0', '7', '8', '7', '6', '7', '6', '8', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839875'), ('360', '514', '502', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '180', '1416839783', '401', '55', '9', '6', '5', '4', '0', '6', '1', '0', '7', '10', '4', '7', '8', '10', '6', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839877'), ('359', '491', '492', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '202', '1416839783', '407', '44', '4', '7', '4', '8', '0', '5', '1', '0', '8', '8', '8', '12', '6', '6', '7', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839871'), ('358', '510', '494', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '190', '1416839783', '401', '45', '8', '8', '6', '5', '0', '6', '1', '0', '6', '4', '7', '11', '7', '9', '6', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839876'), ('357', '491', '505', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '219', '1416839783', '404', '54', '7', '3', '8', '5', '0', '7', '1', '0', '10', '4', '5', '8', '7', '4', '10', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839874'), ('356', '513', '506', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '154', '1416839783', '402', '55', '6', '11', '4', '6', '0', '4', '1', '0', '6', '8', '5', '7', '6', '8', '9', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839873'), ('354', '508', '491', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '189', '1416839783', '405', '45', '8', '3', '7', '4', '0', '7', '1', '0', '7', '9', '8', '6', '9', '11', '7', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839879'), ('355', '493', '490', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '159', '1416839783', '421', '44', '7', '8', '4', '10', '0', '4', '1', '0', '5', '7', '8', '9', '6', '7', '4', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839873'), ('353', '492', '508', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '170', '1416839783', '404', '54', '2', '6', '7', '10', '0', '7', '1', '0', '5', '6', '7', '4', '4', '5', '5', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839859'), ('352', '512', '508', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '190', '1416839783', '401', '55', '6', '4', '2', '3', '0', '7', '1', '0', '5', '5', '4', '6', '8', '7', '7', '16', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839864'), ('351', '497', '489', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '179', '1416839783', '401', '44', '7', '6', '7', '4', '0', '7', '1', '0', '7', '11', '2', '6', '7', '12', '4', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839875'), ('350', '506', '489', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '178', '1416839783', '404', '45', '7', '5', '6', '4', '0', '5', '1', '0', '9', '8', '8', '5', '11', '11', '6', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839878'), ('349', '495', '509', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '128', '1416839783', '405', '54', '5', '7', '7', '4', '0', '4', '1', '0', '3', '8', '6', '6', '14', '8', '10', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839876'), ('348', '509', '510', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '183', '1416839783', '402', '55', '10', '3', '7', '5', '0', '8', '1', '0', '3', '7', '7', '2', '7', '7', '4', '11', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839868'), ('346', '512', '499', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '160', '1416839783', '403', '45', '8', '9', '3', '6', '0', '4', '1', '0', '8', '6', '8', '7', '12', '7', '4', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839872'), ('347', '496', '491', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '228', '1416839783', '404', '44', '8', '1', '4', '7', '0', '10', '1', '0', '8', '5', '2', '4', '3', '12', '6', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839861'), ('345', '497', '512', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '132', '1416839783', '408', '54', '7', '6', '8', '10', '0', '2', '1', '0', '4', '5', '4', '9', '6', '4', '5', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839859'), ('344', '506', '512', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '134', '1416839783', '404', '55', '6', '9', '5', '9', '0', '3', '1', '0', '6', '4', '6', '6', '11', '5', '7', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839865'), ('334', '506', '491', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '203', '1416839783', '410', '45', '9', '10', '5', '2', '0', '7', '1', '0', '10', '3', '3', '4', '8', '10', '5', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839868'), ('342', '511', '496', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '161', '1416839783', '406', '45', '8', '8', '6', '7', '0', '7', '1', '0', '2', '7', '7', '4', '9', '8', '7', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839869'), ('341', '499', '508', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '188', '1416839783', '410', '54', '9', '3', '11', '4', '0', '7', '1', '0', '7', '4', '8', '2', '5', '4', '9', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839861'), ('337', '493', '503', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '161', '1416839783', '403', '54', '4', '7', '3', '10', '0', '4', '1', '0', '9', '9', '5', '3', '7', '4', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839868'), ('343', '489', '498', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '188', '1416839783', '401', '44', '8', '5', '6', '5', '0', '4', '1', '0', '9', '10', '5', '9', '8', '3', '8', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839881'), ('339', '490', '496', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '193', '1416839783', '405', '44', '4', '6', '6', '7', '0', '7', '1', '0', '9', '2', '9', '3', '10', '9', '8', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839869'), ('338', '509', '492', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '268', '1416839783', '402', '45', '6', '6', '4', '4', '0', '11', '1', '0', '8', '5', '8', '6', '6', '8', '6', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839867'), ('336', '502', '511', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '207', '1416839783', '404', '55', '5', '7', '9', '5', '0', '9', '1', '0', '5', '5', '2', '8', '3', '8', '6', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839861'), ('333', '494', '505', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '160', '1416839783', '401', '54', '4', '4', '10', '5', '0', '5', '1', '0', '6', '4', '6', '7', '9', '7', '9', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839870'), ('340', '503', '514', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '156', '1416839783', '402', '55', '6', '7', '4', '8', '0', '4', '1', '0', '4', '4', '7', '10', '7', '9', '10', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839874'), ('335', '492', '494', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '149', '1416839783', '403', '44', '8', '10', '3', '8', '0', '3', '1', '0', '6', '6', '4', '9', '8', '5', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839869'), ('332', '511', '500', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '168', '1416839783', '421', '55', '5', '3', '6', '10', '0', '6', '1', '0', '6', '8', '5', '6', '10', '2', '10', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839869'), ('329', '497', '507', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '192', '1416839783', '402', '54', '7', '6', '4', '8', '0', '6', '1', '0', '8', '6', '10', '6', '7', '3', '8', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839870'), ('328', '510', '503', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '189', '1416839783', '404', '55', '9', '7', '9', '5', '0', '7', '1', '0', '4', '5', '9', '7', '2', '5', '5', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839864'), ('327', '498', '490', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '156', '1416839783', '402', '44', '8', '5', '3', '5', '0', '6', '1', '0', '5', '8', '7', '7', '14', '10', '5', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839877');
INSERT INTO `villages` VALUES ('326', '502', '492', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '207', '1416839783', '401', '45', '6', '5', '7', '5', '0', '8', '1', '0', '8', '5', '3', '8', '10', '7', '6', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839872'), ('325', '498', '506', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '194', '1416839783', '405', '54', '5', '4', '3', '7', '0', '7', '1', '0', '9', '8', '5', '4', '9', '10', '10', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839878'), ('324', '509', '506', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '173', '1416839783', '401', '55', '7', '5', '7', '8', '0', '5', '1', '0', '8', '11', '5', '4', '4', '4', '5', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839866'), ('331', '495', '492', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '174', '1416839783', '402', '44', '5', '5', '10', '5', '0', '6', '1', '0', '6', '4', '4', '8', '8', '6', '7', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839870'), ('330', '503', '489', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '215', '1416839783', '401', '45', '5', '6', '3', '8', '0', '8', '1', '0', '5', '5', '6', '13', '6', '9', '5', '2', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839783', '', '', '', '1416839865'), ('323', '498', '491', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '223', '1416839371', '405', '44', '8', '6', '7', '5', '0', '9', '1', '0', '7', '5', '3', '9', '8', '5', '7', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839457'), ('322', '508', '500', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '173', '1416839371', '409', '55', '10', '5', '4', '5', '0', '5', '1', '0', '6', '8', '3', '9', '5', '11', '10', '11', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839468'), ('320', '508', '508', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '154', '1416839371', '401', '55', '8', '5', '8', '6', '0', '6', '1', '0', '3', '8', '7', '5', '9', '9', '9', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839464'), ('319', '492', '499', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '193', '1416839371', '401', '44', '6', '10', '5', '4', '0', '7', '1', '0', '7', '6', '7', '5', '5', '6', '10', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839461'), ('314', '506', '493', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '146', '1416839371', '401', '45', '9', '7', '9', '4', '0', '1', '1', '0', '8', '9', '4', '7', '7', '9', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839459'), ('313', '497', '506', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '206', '1416839371', '405', '54', '10', '6', '6', '4', '0', '7', '1', '0', '5', '10', '11', '7', '1', '2', '10', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839461'), ('312', '503', '511', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '200', '1416839371', '401', '55', '7', '5', '7', '7', '0', '8', '1', '0', '3', '9', '7', '9', '4', '4', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839456'), ('311', '495', '494', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '192', '1416839371', '404', '44', '7', '7', '7', '5', '0', '7', '1', '0', '8', '4', '6', '5', '10', '5', '9', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839465'), ('310', '503', '492', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '176', '1416839371', '403', '45', '8', '9', '5', '7', '0', '5', '1', '0', '6', '9', '8', '9', '4', '7', '7', '1', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839454'), ('309', '500', '506', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '208', '1416839371', '412', '55', '6', '5', '3', '8', '0', '9', '1', '0', '5', '9', '9', '4', '5', '10', '10', '2', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839458'), ('307', '498', '493', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '180', '1416839371', '403', '44', '7', '4', '8', '8', '0', '6', '1', '0', '7', '2', '5', '9', '6', '7', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839454'), ('305', '495', '503', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '290', '1416839371', '405', '54', '8', '6', '3', '3', '0', '10', '1', '0', '12', '6', '5', '7', '5', '3', '7', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839450'), ('318', '508', '495', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '240', '1416839371', '411', '45', '5', '4', '5', '8', '0', '10', '1', '0', '5', '6', '4', '11', '7', '5', '4', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839451'), ('317', '493', '504', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '179', '1416839371', '403', '54', '9', '3', '5', '8', '0', '7', '1', '0', '6', '5', '4', '4', '2', '9', '8', '11', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839453'), ('304', '508', '502', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '173', '1416839371', '403', '55', '7', '4', '9', '5', '0', '6', '1', '0', '6', '9', '6', '8', '10', '7', '7', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839463'), ('302', '506', '498', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '174', '1416839371', '403', '45', '13', '6', '4', '4', '0', '3', '1', '0', '9', '7', '7', '8', '7', '8', '8', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839459'), ('300', '507', '504', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '170', '1416839371', '401', '55', '5', '6', '9', '8', '0', '7', '1', '0', '4', '5', '8', '3', '4', '3', '8', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839450'), ('299', '505', '495', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '138', '1416839371', '402', '45', '10', '3', '5', '10', '0', '3', '1', '0', '6', '6', '4', '5', '5', '6', '7', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839452'), ('293', '498', '500', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '164', '1416839358', '406', '54', '6', '9', '7', '5', '0', '4', '1', '0', '9', '9', '6', '3', '10', '7', '8', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839358', '', '', '', '1416839445'), ('294', '502', '508', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '195', '1416839371', '401', '55', '7', '8', '2', '5', '0', '5', '1', '0', '9', '6', '6', '10', '9', '7', '7', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839463'), ('290', '500', '502', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '202', '1416839358', '403', '55', '6', '7', '8', '4', '0', '7', '1', '0', '8', '5', '6', '8', '3', '10', '6', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839358', '', '', '', '1416839449'), ('287', '500', '498', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '198', '1416839358', '403', '45', '6', '4', '9', '3', '0', '7', '1', '0', '8', '4', '6', '9', '8', '10', '9', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839358', '', '', '', '1416839445'), ('286', '500', '497', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '182', '1416839358', '404', '45', '8', '5', '7', '5', '0', '6', '1', '0', '9', '4', '4', '3', '9', '9', '4', '11', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839358', '', '', '', '1416839442'), ('316', '506', '509', '6', '%E5%BA%9F%E5%A2%9F', '-1', '3283.2222222223', '3283.2222222223', '3288', '221', '1472225641', '403', '55', '8', '4', '5', '3', '0', '9', '1', '0', '4', '9', '9', '10', '7', '11', '8', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '-5', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839464'), ('315', '494', '496', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '158', '1416839371', '403', '44', '9', '10', '3', '6', '0', '3', '1', '0', '5', '4', '3', '12', '7', '8', '10', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839455'), ('298', '498', '504', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '175', '1416839371', '403', '54', '11', '6', '8', '4', '0', '4', '1', '0', '7', '5', '10', '7', '3', '4', '10', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839457'), ('285', '504', '502', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '169', '1416839358', '404', '55', '8', '0', '9', '8', '0', '5', '1', '0', '7', '7', '6', '8', '10', '5', '8', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839358', '', '', '', '1416839444'), ('291', '501', '496', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '186', '1416839358', '408', '45', '9', '9', '6', '6', '0', '7', '1', '0', '5', '4', '3', '9', '8', '5', '6', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839358', '', '', '', '1416839442'), ('303', '500', '495', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '140', '1416839371', '405', '45', '8', '5', '5', '9', '0', '2', '1', '0', '6', '3', '11', '5', '7', '10', '8', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839458'), ('296', '502', '494', '6', '%E5%BA%9F%E5%A2%9F', '-1', '5188', '5189', '5189', '227', '1472320032', '402', '45', '10', '9', '5', '0', '0', '10', '1', '0', '5', '4', '7', '5', '9', '11', '6', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839457'), ('289', '495', '498', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '241', '1416839358', '410', '44', '6', '7', '8', '2', '0', '11', '1', '0', '4', '6', '7', '3', '8', '6', '4', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839358', '', '', '', '1416839437'), ('295', '496', '502', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '151', '1416839371', '404', '54', '6', '4', '5', '10', '0', '4', '1', '0', '6', '11', '6', '6', '4', '7', '6', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839457'), ('292', '501', '505', '0', '%E5%BA%9F%E5%A2%9F', '-1', '1500', '1500', '1500', '124', '1472549220', '408', '55', '1', '3', '9', '11', '0', '4', '1', '0', '3', '7', '5', '4', '5', '7', '10', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '29.349999999999', '1472549220', '-1', '0', '1416839358', '', '', '', '1472376088'), ('297', '505', '506', '6', '%E5%BA%9F%E5%A2%9F', '-1', '1680', '1680', '1680', '279', '1472373033', '401', '55', '3', '4', '5', '6', '0', '11', '1', '0', '8', '9', '9', '8', '6', '3', '4', '0', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '65', '1472373033', '-1', '0', '1416839371', '', '', '', '1472373036'), ('308', '500', '508', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '177', '1416839371', '404', '55', '6', '4', '12', '5', '0', '8', '1', '0', '4', '2', '3', '5', '5', '5', '4', '1', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839436'), ('288', '498', '495', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '210', '1416839358', '402', '44', '7', '8', '8', '2', '0', '7', '1', '0', '10', '4', '3', '7', '9', '4', '9', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839358', '', '', '', '1416839442'), ('284', '502', '498', '0', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '142', '1416839358', '403', '45', '5', '7', '9', '7', '0', '4', '1', '0', '6', '8', '3', '6', '10', '6', '5', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839358', '', '', '', '1416839441'), ('301', '498', '505', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '162', '1416839371', '404', '54', '11', '6', '7', '7', '0', '3', '1', '0', '7', '4', '5', '9', '5', '4', '7', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839456'), ('306', '501', '493', '6', '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '182', '1416839371', '402', '45', '5', '8', '8', '5', '0', '6', '1', '0', '7', '3', '3', '8', '6', '4', '9', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', '', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', '0', '-1', '0', '1416839371', '', '', '', '1416839452'), ('496', '520', '507', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '183', '1472134643', '405', '55', '7', '4', '5', '6', '0', '5', '1', '0', '9', '7', '7', '8', '5', '13', '9', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134643', null, null, null, '1472213123'), ('497', '509', '483', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '164', '1472134643', '401', '45', '10', '7', '6', '5', '0', '4', '1', '0', '6', '9', '9', '5', '5', '6', '10', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134643', null, null, null, '1472213121'), ('498', '493', '482', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '139', '1472134643', '401', '44', '8', '7', '7', '7', '0', '3', '1', '0', '5', '12', '5', '5', '6', '8', '7', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134643', null, null, null, '1472213117'), ('500', '498', '480', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '147', '1472134738', '413', '44', '3', '7', '8', '9', '0', '4', '1', '0', '3', '6', '1', '10', '6', '6', '10', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134738', null, null, null, '1472213109'), ('501', '492', '518', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '154', '1472134738', '402', '54', '6', '7', '8', '6', '0', '5', '1', '0', '2', '7', '6', '10', '11', '3', '8', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134738', null, null, null, '1472213112'), ('502', '512', '485', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '130', '1472134738', '402', '45', '6', '6', '9', '7', '0', '1', '1', '0', '7', '8', '4', '6', '4', '11', '10', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134738', null, null, null, '1472213115'), ('504', '497', '522', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '140', '1472134742', '409', '54', '7', '6', '8', '8', '0', '3', '1', '0', '7', '8', '1', '5', '8', '9', '4', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134742', null, null, null, '1472213112'), ('505', '514', '486', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '196', '1472134742', '412', '45', '10', '4', '8', '6', '0', '7', '1', '0', '6', '4', '7', '8', '5', '6', '9', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134742', null, null, null, '1472213117'), ('506', '515', '489', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '185', '1472134742', '403', '45', '3', '10', '6', '6', '0', '4', '1', '0', '8', '8', '6', '10', '3', '3', '7', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134742', null, null, null, '1472213115'), ('508', '495', '481', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '182', '1472134744', '404', '44', '5', '5', '6', '5', '0', '3', '1', '0', '8', '4', '12', '10', '10', '7', '10', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134744', null, null, null, '1472213120'), ('509', '521', '504', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '157', '1472134744', '402', '55', '4', '6', '6', '7', '0', '7', '1', '0', '5', '3', '4', '6', '9', '14', '6', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134744', null, null, null, '1472213107'), ('510', '521', '502', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '179', '1472134744', '403', '55', '9', '5', '3', '9', '0', '4', '1', '0', '10', '2', '4', '9', '9', '7', '6', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134744', null, null, null, '1472213105'), ('512', '492', '481', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '167', '1472134817', '401', '44', '8', '5', '7', '7', '0', '6', '1', '0', '6', '9', '3', '6', '8', '7', '8', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134817', null, null, null, '1472213117'), ('513', '493', '521', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '146', '1472134817', '403', '54', '7', '10', '7', '4', '0', '4', '1', '0', '4', '8', '8', '3', '7', '8', '8', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134817', null, null, null, '1472213115'), ('514', '504', '521', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '139', '1472134817', '404', '55', '12', '7', '5', '3', '0', '3', '1', '0', '3', '8', '5', '10', '11', '10', '9', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134817', null, null, null, '1472213123'), ('516', '519', '493', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '181', '1472134907', '405', '45', '6', '5', '11', '3', '0', '5', '1', '0', '9', '4', '9', '1', '6', '3', '8', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134907', null, null, null, '1472213103'), ('517', '491', '520', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '182', '1472134907', '415', '54', '5', '7', '6', '9', '0', '5', '1', '0', '9', '6', '2', '8', '5', '7', '9', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134907', null, null, null, '1472213113'), ('518', '490', '483', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '191', '1472134907', '401', '44', '8', '8', '6', '4', '0', '5', '1', '0', '8', '4', '11', '5', '5', '4', '9', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472134907', null, null, null, '1472213116'), ('520', '520', '496', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '210', '1472135082', '402', '45', '7', '7', '8', '3', '0', '9', '1', '0', '6', '7', '4', '4', '4', '7', '8', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472135082', null, null, null, '1472213117'), ('521', '504', '522', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '142', '1472135082', '403', '55', '10', '7', '5', '7', '0', '2', '1', '0', '7', '8', '3', '5', '7', '7', '9', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472135082', null, null, null, '1472213118'), ('522', '487', '518', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '169', '1472135082', '409', '54', '5', '6', '4', '10', '0', '7', '1', '0', '4', '5', '8', '4', '4', '9', '6', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472135082', null, null, null, '1472213106'), ('524', '520', '499', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '152', '1472135133', '417', '45', '7', '7', '10', '7', '0', '4', '1', '0', '6', '7', '7', '5', '5', '9', '7', '2', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472135133', null, null, null, '1472213113'), ('525', '487', '484', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '189', '1472135133', '404', '44', '6', '4', '2', '8', '0', '6', '1', '0', '10', '5', '6', '7', '3', '14', '8', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472135133', null, null, null, '1472213111'), ('526', '506', '521', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '146', '1472135133', '401', '55', '7', '7', '8', '6', '0', '3', '1', '0', '6', '6', '7', '6', '8', '7', '9', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472135133', null, null, null, '1472213121'), ('528', '485', '516', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '204', '1472205507', '417', '54', '5', '4', '5', '9', '0', '7', '1', '0', '9', '4', '7', '5', '6', '8', '5', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472205507', null, null, null, '1472213109'), ('529', '485', '485', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '153', '1472205507', '403', '44', '12', '3', '7', '3', '0', '5', '1', '0', '5', '8', '6', '2', '9', '7', '10', '10', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472205507', null, null, null, '1472213118'), ('530', '510', '520', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '163', '1472205507', '404', '55', '9', '9', '8', '6', '0', '4', '1', '0', '8', '3', '8', '2', '3', '5', '8', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472205507', null, null, null, '1472213104'), ('532', '483', '514', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '175', '1472205510', '401', '54', '4', '7', '6', '6', '0', '6', '1', '0', '6', '10', '6', '7', '4', '11', '7', '9', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472205510', null, null, null, '1472213121'), ('533', '505', '482', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '167', '1472205510', '410', '45', '7', '6', '9', '8', '0', '7', '1', '0', '5', '2', '5', '3', '6', '7', '7', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472205510', null, null, null, '1472213103'), ('534', '483', '488', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '182', '1472205510', '401', '44', '7', '1', '12', '2', '0', '6', '1', '0', '8', '8', '5', '5', '2', '7', '7', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472205510', null, null, null, '1472213104'), ('536', '482', '489', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '168', '1472205878', '404', '44', '11', '2', '10', '5', '0', '6', '1', '0', '2', '5', '5', '10', '5', '7', '7', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472205878', null, null, null, '1472213109'), ('537', '513', '518', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '176', '1472205878', '410', '55', '11', '5', '9', '4', '0', '4', '1', '0', '6', '3', '3', '12', '2', '9', '5', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472205878', null, null, null, '1472213109'), ('538', '482', '512', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '144', '1472205878', '405', '54', '2', '7', '8', '6', '0', '4', '1', '0', '4', '13', '8', '3', '8', '7', '7', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472205878', null, null, null, '1472213114'), ('540', '480', '510', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '136', '1472334453', '404', '54', '10', '8', '6', '7', '0', '4', '1', '0', '4', '4', '4', '6', '11', '6', '7', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472334453', null, null, null, '1472334543'), ('541', '503', '479', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '191', '1472334453', '405', '45', '8', '4', '8', '5', '0', '6', '1', '0', '9', '7', '9', '4', '10', '6', '6', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472334453', null, null, null, '1472334547'), ('542', '515', '516', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '192', '1472334453', '405', '55', '4', '7', '4', '9', '0', '8', '1', '0', '6', '7', '7', '4', '6', '5', '9', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472334453', null, null, null, '1472334534'), ('544', '505', '481', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '186', '1472334457', '410', '45', '8', '3', '8', '6', '0', '4', '1', '0', '11', '4', '8', '2', '8', '9', '7', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472334457', null, null, null, '1472334550'), ('545', '480', '492', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '158', '1472334457', '401', '44', '10', '2', '4', '10', '0', '6', '1', '0', '2', '4', '7', '8', '6', '5', '8', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472334457', null, null, null, '1472334538'), ('546', '517', '514', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '217', '1472334457', '407', '55', '6', '5', '7', '6', '0', '9', '1', '0', '7', '6', '4', '7', '9', '6', '6', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472334457', null, null, null, '1472334549'), ('548', '479', '496', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '131', '1472334485', '411', '44', '10', '6', '10', '5', '0', '3', '1', '0', '4', '6', '5', '3', '6', '9', '9', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472334485', null, null, null, '1472334567'), ('549', '479', '507', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '225', '1472334485', '402', '54', '6', '9', '5', '4', '0', '8', '1', '0', '7', '3', '3', '12', '5', '5', '10', '5', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472334485', null, null, null, '1472334571'), ('550', '508', '482', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '157', '1472334485', '404', '45', '5', '7', '10', '6', '0', '4', '1', '0', '7', '4', '6', '8', '6', '9', '7', '3', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472334485', null, null, null, '1472334567'), ('552', '518', '512', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '251', '1472336346', '401', '55', '8', '4', '3', '6', '0', '11', '1', '0', '5', '7', '5', '7', '6', '6', '5', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472336346', null, null, null, '1472336432'), ('553', '479', '505', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '263', '1472336346', '418', '54', '3', '4', '5', '4', '0', '12', '1', '0', '5', '8', '1', '6', '13', '5', '3', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472336346', null, null, null, '1472336420'), ('554', '511', '483', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '180', '1472336346', '407', '45', '9', '4', '8', '7', '0', '7', '1', '0', '4', '6', '6', '6', '3', '4', '10', '8', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472336346', null, null, null, '1472336434'), ('556', '480', '498', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '242', '1472338034', '405', '44', '7', '6', '3', '5', '0', '10', '1', '0', '5', '10', '8', '8', '7', '5', '6', '7', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472338034', null, null, null, '1472338124'), ('557', '521', '508', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '161', '1472338035', '406', '55', '8', '6', '9', '5', '0', '6', '1', '0', '3', '8', '4', '8', '5', '11', '8', '6', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472338035', null, null, null, '1472338130'), ('558', '478', '502', null, '%E5%BA%9F%E5%A2%9F', '-1', '500', '500', '400', '158', '1472338035', '401', '54', '11', '7', '6', '6', '0', '4', '1', '0', '6', '6', '9', '7', '9', '6', '6', '4', '1', '0', '0', '1', '1', '0', '0', '0', '0', '0', '1', '1', '0', null, '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '100', null, '-1', '0', '1472338035', null, null, null, '1472338122');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
