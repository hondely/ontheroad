/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : drea

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-06-10 23:41:52
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for d_around_class
-- ----------------------------
DROP TABLE IF EXISTS `d_around_class`;
CREATE TABLE `d_around_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `state` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of d_around_class
-- ----------------------------
INSERT INTO `d_around_class` VALUES ('1', '衣服', '1');
INSERT INTO `d_around_class` VALUES ('2', '定制', '1');
INSERT INTO `d_around_class` VALUES ('3', '店内', '1');
INSERT INTO `d_around_class` VALUES ('4', '特产', '1');
INSERT INTO `d_around_class` VALUES ('5', '饮品', '1');
INSERT INTO `d_around_class` VALUES ('6', '点餐', '1');
