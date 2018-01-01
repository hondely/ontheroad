/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : drea

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-05-02 01:40:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for d_notify
-- ----------------------------
DROP TABLE IF EXISTS `d_notify`;
CREATE TABLE `d_notify` (
  `id` int(11) DEFAULT NULL,
  `return_code` varchar(255) DEFAULT NULL,
  `return_msg` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of d_notify
-- ----------------------------
