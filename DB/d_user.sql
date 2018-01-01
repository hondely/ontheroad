/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : drea

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-05-02 01:39:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for d_user
-- ----------------------------
DROP TABLE IF EXISTS `d_user`;
CREATE TABLE `d_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `phone` char(11) DEFAULT NULL,
  `password` char(32) DEFAULT NULL,
  `openid` varchar(128) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `sex` tinyint(2) DEFAULT NULL COMMENT '用户的性别，值为1时是男性，值为2时是女性，值为0时是未知',
  `province` varchar(20) DEFAULT NULL COMMENT '用户个人资料填写的省份',
  `city` varchar(20) DEFAULT NULL COMMENT '普通用户个人资料填写的城市',
  `country` varchar(10) DEFAULT NULL COMMENT '国家，如中国为CN',
  `headimgurl` text COMMENT '用户头像，最后一个数值代表正方形头像大小（有0、46、64、96、132数值可选，0代表640*640正方形头像），用户没有头像时该项为空。若用户更换头像，原有头像URL将失效。',
  `privilege` text COMMENT '用户特权信息，json 数组，如微信沃卡用户为（chinaunicom）',
  `unionid` varchar(128) DEFAULT NULL COMMENT '只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。',
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `score` int(11) DEFAULT '0',
  `state` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of d_user
-- ----------------------------
INSERT INTO `d_user` VALUES ('1', '18683380827', 'a1c3ae6c49a89d92aef2d423dadb477f', 'oXwbUwPMtyitfsfYbd55b-W6wlxw', 'WP梦回上古', '1', '四川', '成都', '中国', 'http://wx.qlogo.cn/mmopen/VGzRaxpyhj6FIy1UyF6dIXCNr4NIzwwibh8cbCmzVpUMX5OblPwLfuYZd3pQxO4ElZYSNSSHk6wbxH4S2O7CUzAg5IFXkF5Rp/0', '', 'oo1WtxKxpq9E7OBBJtWKg1Rssf4I', '2017-04-27 23:37:52', '0000-00-00 00:00:00', '0', '1');
INSERT INTO `d_user` VALUES ('2', '15680878380', '5739fb4e82ed5366680b13441c6adeb4', 'oXwbUwAqKopCXCfELkKWJbX05zkM', '晓峰', '1', '四川', '成都', '中国', 'http://wx.qlogo.cn/mmopen/SnnOkFO2wx8NeMZHAVjawxMnNF42kHJkQhcP9oBWbAoKA8ZvicgvSicU8cQSuYLk7iaI6IpicRJNjtacfeLXPQ75Ig/0', null, 'oo1WtxITW58ornH10_Q4-8G4lbUY', '2017-04-27 23:33:42', null, '0', '1');
