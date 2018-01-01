/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : orderonline

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-09-06 00:14:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for business
-- ----------------------------
DROP TABLE IF EXISTS `business`;
CREATE TABLE `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT '商家的名称',
  `address` varchar(100) DEFAULT NULL COMMENT '地址',
  `tel` varchar(20) DEFAULT NULL COMMENT '座机号',
  `manager` varchar(10) DEFAULT NULL COMMENT '主管名称',
  `phone` varchar(11) DEFAULT NULL COMMENT '主管手机号',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `start_time` datetime DEFAULT NULL COMMENT '注册时间',
  `end_time` datetime DEFAULT NULL COMMENT '删除时间',
  `data_state` tinyint(2) DEFAULT '1' COMMENT '数据转态 1为商家能够使用 -1商家已被删除 -2用户暂停使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of business
-- ----------------------------
INSERT INTO `business` VALUES ('1', '德庄（玉双店）', '成都成华区玉双路2号', '02884403789', '张经理', '18228308399', '21232f297a57a5a743894a0e4a801fc3', '备注', '2016-11-02 22:31:13', null, '1');

-- ----------------------------
-- Table structure for business_assistant
-- ----------------------------
DROP TABLE IF EXISTS `business_assistant`;
CREATE TABLE `business_assistant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) DEFAULT NULL COMMENT '角色 1为前台 2为厨房',
  `password` varchar(50) DEFAULT NULL COMMENT '密码',
  `belong_business_id` int(11) DEFAULT NULL COMMENT '所属商家id',
  `start_time` datetime DEFAULT NULL COMMENT '注册时间',
  `end_time` datetime DEFAULT NULL COMMENT '删除时间',
  `data_state` tinyint(2) DEFAULT NULL COMMENT '数据转态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of business_assistant
-- ----------------------------

-- ----------------------------
-- Table structure for food
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '菜品名称',
  `belong_class_id` int(11) DEFAULT NULL COMMENT '所属菜品类别id',
  `price` decimal(10,0) DEFAULT NULL COMMENT 'price',
  `pic_url` text COMMENT '图片url',
  `about` varchar(255) DEFAULT NULL COMMENT '说明',
  `start_time` datetime DEFAULT NULL COMMENT '入库时间',
  `end_time` datetime DEFAULT NULL COMMENT '删除时间',
  `data_state` tinyint(2) DEFAULT '1' COMMENT '数据转态 1有效  -1已被删除 -2暂停使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food
-- ----------------------------
INSERT INTO `food` VALUES ('1', '上脑肥牛', '1', '35', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food1.png', '上脑肥牛', '2016-11-02 22:34:35', null, '1');
INSERT INTO `food` VALUES ('2', '至尊A眼肥牛', '1', '46', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food2.png', '至尊A眼肥牛                                                                ', '2016-11-02 22:34:59', null, '1');
INSERT INTO `food` VALUES ('3', '祥和牛肉', '1', '12', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food3.png', '祥和牛肉                                                                                                                ', '2016-11-02 22:35:29', null, '1');
INSERT INTO `food` VALUES ('4', '新疆羊肉卷', '1', '52', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food4.png', '新疆羊肉卷', '2016-11-02 22:35:32', null, '1');
INSERT INTO `food` VALUES ('5', '龟寿花健', '2', '45', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food5.png', '龟寿花健', '2016-11-02 22:36:12', null, '1');
INSERT INTO `food` VALUES ('6', '鲜切马尾牛', '2', '32', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food6.png', '鲜切马尾牛', '2016-11-02 22:37:32', null, '1');
INSERT INTO `food` VALUES ('7', '鲜切羊肉', '2', '24', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food7.png', '鲜切羊肉', '2016-11-02 22:37:35', null, '1');
INSERT INTO `food` VALUES ('8', '拍青虾滑', '3', '34', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food8.png', '拍青虾滑', '2016-11-02 22:37:38', null, '1');
INSERT INTO `food` VALUES ('9', '鸡肉滑', '3', '23', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food9.png', '鸡肉滑', '2016-11-02 22:38:17', null, '1');
INSERT INTO `food` VALUES ('10', '鲜鱼滑', '3', '25', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food10.png', '鲜鱼滑', '2016-11-02 22:38:20', null, '1');
INSERT INTO `food` VALUES ('11', '鲜虾滑', '3', '53', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food11.png', '鲜虾滑', '2016-11-02 22:38:22', null, '1');
INSERT INTO `food` VALUES ('12', '牛肉丸', '3', '67', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food1.png', '牛肉丸', '2016-11-02 22:38:52', null, '1');
INSERT INTO `food` VALUES ('13', '海白虾', '4', '45', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food2.png', '海白虾', '2016-11-02 22:39:13', null, '1');
INSERT INTO `food` VALUES ('14', '美味鱿鱼须', '4', '67', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food3.png', '美味鱿鱼须', '2016-11-02 22:39:48', null, '1');
INSERT INTO `food` VALUES ('15', '鱼排', '4', '45', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food4.png', '鱼排', '2016-11-02 22:40:14', null, '1');
INSERT INTO `food` VALUES ('16', '鱼肉卷', '4', '66', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food5.png', '鱼肉卷', '2016-11-02 22:41:09', null, '1');
INSERT INTO `food` VALUES ('17', '鲜毛肚', '5', '32', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food6.png', '鲜毛肚', '2016-11-02 22:41:11', null, '1');
INSERT INTO `food` VALUES ('18', '招牌嫩鸡片', '5', '55', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food7.png', '招牌嫩鸡片', '2016-11-02 22:41:26', null, '1');
INSERT INTO `food` VALUES ('19', '小酥肉', '5', '23', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food8.png', '小酥肉', '2016-11-02 22:45:12', null, '1');
INSERT INTO `food` VALUES ('20', '精品鸭舌', '5', '21', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food9.png', '精品鸭舌', '2016-11-02 22:45:15', null, '1');
INSERT INTO `food` VALUES ('21', '脱骨鸭掌', '5', '32', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food10.png', '脱骨鸭掌', '2016-11-02 22:45:18', null, '1');
INSERT INTO `food` VALUES ('22', '鲜切鳝鱼段', '5', '35', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food11.png', '鲜切鳝鱼段', '2016-11-02 22:45:22', null, '1');
INSERT INTO `food` VALUES ('23', '青蛤', '5', '22', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food1.png', '青蛤', '2016-11-02 22:45:25', null, '1');
INSERT INTO `food` VALUES ('24', '香菇肠', '5', '14', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food2.png', '香菇肠', '2016-11-02 22:45:28', null, '1');
INSERT INTO `food` VALUES ('25', '午餐牛肉', '5', '12', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food3.png', '午餐牛肉', '2016-11-02 22:45:33', null, '1');
INSERT INTO `food` VALUES ('26', '鲜鸭肠', '7', '15', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food4.png', '鲜鸭肠', '2016-11-02 22:45:39', null, '1');
INSERT INTO `food` VALUES ('27', '牛鞭花', '5', '21', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food5.png', '牛鞭花', '2016-11-02 22:45:41', null, '1');
INSERT INTO `food` VALUES ('28', '鹌鹑蛋', '5', '12', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food6.png', '鹌鹑蛋', '2016-11-02 22:45:45', null, '1');
INSERT INTO `food` VALUES ('29', '黄金豆腐', '5', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food7.png', '黄金豆腐', '2016-11-02 22:45:48', null, '1');
INSERT INTO `food` VALUES ('30', '红油翅中', '5', '11', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food8.png', '红油翅中', '2016-11-02 22:45:51', null, '1');
INSERT INTO `food` VALUES ('31', '凤爪', '5', '12', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food9.png', '凤爪', '2016-11-02 22:45:54', null, '1');
INSERT INTO `food` VALUES ('32', '牛黄喉', '5', '14', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food10.png', '牛黄喉', '2016-11-02 22:45:56', null, '1');
INSERT INTO `food` VALUES ('33', '香辣鸡块', '5', '14', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food11.png', '香辣鸡块', '2016-11-02 22:45:59', null, '1');
INSERT INTO `food` VALUES ('34', '牛腰', '5', '14', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food1.png', '牛腰', '2016-11-02 22:46:01', null, '1');
INSERT INTO `food` VALUES ('35', '桂花肠', '5', '12', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food2.png', '桂花肠', '2016-11-02 22:46:03', null, '1');
INSERT INTO `food` VALUES ('36', '罗汉笋', '6', '12', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food3.png', '罗汉笋', '2016-11-02 22:47:52', null, '1');
INSERT INTO `food` VALUES ('37', '鸡腿菇', '6', '21', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food4.png', '鸡腿菇', '2016-11-02 22:47:54', null, '1');
INSERT INTO `food` VALUES ('38', '黑木耳', '6', '12', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food5.png', '黑木耳', '2016-11-02 22:47:57', null, '1');
INSERT INTO `food` VALUES ('39', '草菇', '6', '12', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food6.png', '草菇', '2016-11-02 22:47:59', null, '1');
INSERT INTO `food` VALUES ('40', '金针菇', '6', '23', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food7.png', '金针菇', '2016-11-02 22:48:02', null, '1');
INSERT INTO `food` VALUES ('41', '牛肚菌', '6', '12', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food8.png', '牛肚菌', '2016-11-02 22:48:04', null, '1');
INSERT INTO `food` VALUES ('42', '竹荪', '6', '14', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food9.png', '竹荪', '2016-11-02 22:48:06', null, '1');
INSERT INTO `food` VALUES ('43', '茼蒿', '7', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food10.png', '茼蒿', '2016-11-02 22:53:42', null, '1');
INSERT INTO `food` VALUES ('44', '广东菜心', '7', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food11.png', '广东菜心', '2016-11-02 22:57:19', null, '1');
INSERT INTO `food` VALUES ('45', '萝卜苗', '7', '6', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food1.png', '萝卜苗', '2016-11-02 22:57:22', null, '1');
INSERT INTO `food` VALUES ('46', '大白菜', '7', '7', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food2.png', '大白菜', '2016-11-02 22:57:24', null, '1');
INSERT INTO `food` VALUES ('47', '豌豆苗', '7', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food3.png', '豌豆苗', '2016-11-02 22:57:27', null, '1');
INSERT INTO `food` VALUES ('48', '油麦菜', '7', '6', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food4.png', '油麦菜', '2016-11-02 22:57:30', null, '1');
INSERT INTO `food` VALUES ('49', '菠菜', '7', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food5.png', '菠菜', '2016-11-02 22:57:35', null, '1');
INSERT INTO `food` VALUES ('50', '香菜', '7', '9', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food6.png', '香菜', '2016-11-02 22:57:38', null, '1');
INSERT INTO `food` VALUES ('51', '娃娃菜', '7', '6', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food7.png', '娃娃菜', '2016-11-02 22:57:40', null, '1');
INSERT INTO `food` VALUES ('52', '生菜', '7', '6', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food8.png', '生菜', '2016-11-02 22:57:43', null, '1');
INSERT INTO `food` VALUES ('53', '青笋片', '7', '7', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food9.png', '青笋片', '2016-11-02 22:57:46', null, '1');
INSERT INTO `food` VALUES ('54', '山药片', '7', '9', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food10.png', '山药片', '2016-11-02 22:57:48', null, '1');
INSERT INTO `food` VALUES ('55', '冬瓜片', '7', '7', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food11.png', '冬瓜片', '2016-11-02 22:57:51', null, '1');
INSERT INTO `food` VALUES ('56', '碗豆尖', '7', '6', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food1.png', '碗豆尖', '2016-11-02 22:57:55', null, '1');
INSERT INTO `food` VALUES ('57', '土豆片', '7', '6', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food2.png', '土豆片', '2016-11-02 22:57:57', null, '1');
INSERT INTO `food` VALUES ('58', '莲藕', '7', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food3.png', '莲藕', '2016-11-02 22:58:01', null, '1');
INSERT INTO `food` VALUES ('59', '海带丝', '7', '6', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food4.png', '海带丝', '2016-11-02 22:58:04', null, '1');
INSERT INTO `food` VALUES ('60', '海带片', '7', '7', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food5.png', '海带片', '2016-11-02 22:58:10', null, '1');
INSERT INTO `food` VALUES ('61', '魔芋', '7', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food6.png', '魔芋', '2016-11-02 22:58:12', null, '1');
INSERT INTO `food` VALUES ('62', '鲜豆皮', '8', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food7.png', '鲜豆皮', '2016-11-02 22:59:15', null, '1');
INSERT INTO `food` VALUES ('63', '冻豆腐', '8', '7', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food8.png', '冻豆腐', '2016-11-02 22:59:18', null, '1');
INSERT INTO `food` VALUES ('64', '鲜豆腐', '8', '7', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food9.png', '鲜豆腐', '2016-11-02 22:59:21', null, '1');
INSERT INTO `food` VALUES ('65', '油豆皮', '8', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food10.png', '油豆皮', '2016-11-02 22:59:24', null, '1');
INSERT INTO `food` VALUES ('66', '面筋', '8', '9', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food11.png', '面筋', '2016-11-02 22:59:26', null, '1');
INSERT INTO `food` VALUES ('67', '腐竹', '8', '7', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food1.png', '腐竹', '2016-11-02 22:59:28', null, '1');
INSERT INTO `food` VALUES ('68', '水晶粉', '9', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food2.png', '水晶粉', '2016-11-02 23:00:45', null, '1');
INSERT INTO `food` VALUES ('69', '手擀粉', '9', '7', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food3.png', '手擀粉', '2016-11-02 23:00:47', null, '1');
INSERT INTO `food` VALUES ('70', '贡菜', '9', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food4.png', '贡菜', '2016-11-02 23:00:51', null, '1');
INSERT INTO `food` VALUES ('71', '宽粉', '9', '9', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food5.png', '宽粉', '2016-11-02 23:00:54', null, '1');
INSERT INTO `food` VALUES ('72', '年糕', '9', '7', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food6.png', '年糕', '2016-11-02 23:00:57', null, '1');
INSERT INTO `food` VALUES ('73', '粉丝', '9', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food7.png', '粉丝', '2016-11-02 23:00:58', null, '1');
INSERT INTO `food` VALUES ('74', '红薯粉', '9', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food8.png', '红薯粉', '2016-11-02 23:01:00', null, '1');
INSERT INTO `food` VALUES ('75', '厥根粉', '9', '8', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/food/food9.png', '厥根粉', '2016-11-02 23:01:32', null, '1');

-- ----------------------------
-- Table structure for food_class
-- ----------------------------
DROP TABLE IF EXISTS `food_class`;
CREATE TABLE `food_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL COMMENT '类别名称',
  `belong_business_id` int(11) DEFAULT NULL COMMENT '所属商家id',
  `start_time` datetime DEFAULT NULL COMMENT '入库时间',
  `end_time` datetime DEFAULT NULL COMMENT '删除时间',
  `data_state` tinyint(2) DEFAULT '1' COMMENT '数据转态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food_class
-- ----------------------------
INSERT INTO `food_class` VALUES ('1', '肥牛类', '1', '2016-11-02 22:31:33', null, '1');
INSERT INTO `food_class` VALUES ('2', '鲜 牛 肉', '1', '2016-11-02 22:31:57', null, '1');
INSERT INTO `food_class` VALUES ('3', '滑、丸', '1', '2016-11-02 22:32:13', null, '1');
INSERT INTO `food_class` VALUES ('4', '海鲜', '1', '2016-11-02 22:32:27', null, '1');
INSERT INTO `food_class` VALUES ('5', '禽肉蛋肠', '1', '2016-11-02 22:32:43', null, '1');
INSERT INTO `food_class` VALUES ('6', '山珍', '1', '2016-11-02 22:33:08', null, '1');
INSERT INTO `food_class` VALUES ('7', '田园时蔬', '1', '2016-11-02 22:33:11', null, '1');
INSERT INTO `food_class` VALUES ('8', '豆制品', '1', '2016-11-02 22:33:23', null, '1');
INSERT INTO `food_class` VALUES ('9', '粉类', '1', '2016-11-02 22:59:50', null, '1');
INSERT INTO `food_class` VALUES ('10', '肥牛类', '2', '2016-11-02 22:31:33', '0000-00-00 00:00:00', '1');
INSERT INTO `food_class` VALUES ('11', '鲜 牛 肉', '2', '2016-11-02 22:31:57', '0000-00-00 00:00:00', '1');
INSERT INTO `food_class` VALUES ('12', '滑、丸', '2', '2016-11-02 22:32:13', '0000-00-00 00:00:00', '1');
INSERT INTO `food_class` VALUES ('13', '海鲜', '2', '2016-11-02 22:32:27', '0000-00-00 00:00:00', '1');
INSERT INTO `food_class` VALUES ('14', '禽肉蛋肠', '2', '2016-11-02 22:32:43', '0000-00-00 00:00:00', '1');
INSERT INTO `food_class` VALUES ('15', '山珍', '2', '2016-11-02 22:33:08', '0000-00-00 00:00:00', '1');
INSERT INTO `food_class` VALUES ('16', '田园时蔬', '2', '2016-11-02 22:33:11', '0000-00-00 00:00:00', '1');

-- ----------------------------
-- Table structure for logging
-- ----------------------------
DROP TABLE IF EXISTS `logging`;
CREATE TABLE `logging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_name` varchar(50) DEFAULT NULL COMMENT '登录的管理员用户',
  `time` datetime DEFAULT NULL COMMENT '登录时间',
  `ip` varchar(32) DEFAULT NULL COMMENT '登录的IP地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of logging
-- ----------------------------
INSERT INTO `logging` VALUES ('95', null, '2016-12-19 22:11:34', '127.0.0.1');
INSERT INTO `logging` VALUES ('96', null, '2016-12-19 22:28:27', '127.0.0.1');
INSERT INTO `logging` VALUES ('97', null, '2016-12-19 22:29:09', '127.0.0.1');
INSERT INTO `logging` VALUES ('98', null, '2016-12-19 22:32:13', '127.0.0.1');
INSERT INTO `logging` VALUES ('99', null, '2016-12-19 22:51:14', '127.0.0.1');
INSERT INTO `logging` VALUES ('100', null, '2016-12-20 23:40:19', '127.0.0.1');
INSERT INTO `logging` VALUES ('101', null, '2016-12-20 23:41:44', '127.0.0.1');
INSERT INTO `logging` VALUES ('102', null, '2016-12-21 22:26:24', '127.0.0.1');
INSERT INTO `logging` VALUES ('103', null, '2016-12-21 23:14:34', '127.0.0.1');
INSERT INTO `logging` VALUES ('104', null, '2016-12-21 23:16:50', '127.0.0.1');
INSERT INTO `logging` VALUES ('105', null, '2016-12-21 23:33:38', '127.0.0.1');
INSERT INTO `logging` VALUES ('106', null, '2016-12-21 23:42:30', '127.0.0.1');
INSERT INTO `logging` VALUES ('107', null, '2016-12-21 23:43:39', '127.0.0.1');
INSERT INTO `logging` VALUES ('108', null, '2016-12-25 15:20:20', '127.0.0.1');
INSERT INTO `logging` VALUES ('109', null, '2016-12-25 18:25:17', '127.0.0.1');
INSERT INTO `logging` VALUES ('110', null, '2016-12-25 19:20:48', '127.0.0.1');
INSERT INTO `logging` VALUES ('111', null, '2016-12-25 19:22:56', '127.0.0.1');
INSERT INTO `logging` VALUES ('112', null, '2016-12-25 19:25:57', '127.0.0.1');
INSERT INTO `logging` VALUES ('113', null, '2016-12-25 22:03:32', '127.0.0.1');
INSERT INTO `logging` VALUES ('114', null, '2016-12-25 22:04:26', '127.0.0.1');
INSERT INTO `logging` VALUES ('115', null, '2016-12-25 22:31:38', '127.0.0.1');
INSERT INTO `logging` VALUES ('116', null, '2016-12-25 22:36:44', '127.0.0.1');
INSERT INTO `logging` VALUES ('117', null, '2016-12-25 23:11:52', '127.0.0.1');
INSERT INTO `logging` VALUES ('118', null, '2016-12-25 23:18:41', '127.0.0.1');
INSERT INTO `logging` VALUES ('119', null, '2016-12-25 23:26:15', '127.0.0.1');
INSERT INTO `logging` VALUES ('120', null, '2016-12-25 23:28:59', '127.0.0.1');
INSERT INTO `logging` VALUES ('121', null, '2016-12-25 23:40:15', '127.0.0.1');
INSERT INTO `logging` VALUES ('122', null, '2016-12-25 23:52:28', '127.0.0.1');
INSERT INTO `logging` VALUES ('123', null, '2016-12-25 23:53:31', '127.0.0.1');
INSERT INTO `logging` VALUES ('124', null, '2016-12-25 23:58:41', '127.0.0.1');
INSERT INTO `logging` VALUES ('125', null, '2016-12-26 00:01:39', '127.0.0.1');
INSERT INTO `logging` VALUES ('126', null, '2016-12-26 00:04:32', '127.0.0.1');
INSERT INTO `logging` VALUES ('127', null, '2016-12-26 00:05:01', '127.0.0.1');
INSERT INTO `logging` VALUES ('128', null, '2016-12-26 00:05:48', '127.0.0.1');
INSERT INTO `logging` VALUES ('129', null, '2016-12-26 00:09:44', '127.0.0.1');
INSERT INTO `logging` VALUES ('130', null, '2016-12-26 00:29:31', '127.0.0.1');
INSERT INTO `logging` VALUES ('131', null, '2016-12-26 22:11:35', '127.0.0.1');
INSERT INTO `logging` VALUES ('132', null, '2016-12-26 22:13:11', '127.0.0.1');
INSERT INTO `logging` VALUES ('133', null, '2016-12-26 22:15:46', '127.0.0.1');
INSERT INTO `logging` VALUES ('134', null, '2016-12-26 23:09:14', '127.0.0.1');
INSERT INTO `logging` VALUES ('135', null, '2016-12-26 23:17:57', '127.0.0.1');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(18) DEFAULT NULL COMMENT '订单编号',
  `belong_table_id` int(11) DEFAULT NULL COMMENT '所属餐桌id',
  `belong_table_number` int(11) DEFAULT NULL COMMENT '所属餐桌编号',
  `belong_business_id` int(11) unsigned DEFAULT NULL COMMENT '所属商家id',
  `belong_business_name` varchar(30) DEFAULT NULL COMMENT '所属商家名称',
  `food_id` int(11) DEFAULT NULL COMMENT '菜品id',
  `food_name` varchar(50) DEFAULT NULL COMMENT '菜品名称',
  `count` int(11) DEFAULT NULL COMMENT '份数',
  `price` decimal(10,0) unsigned DEFAULT NULL COMMENT '价格',
  `start_time` datetime DEFAULT NULL COMMENT '入库时间',
  `end_time` datetime DEFAULT NULL COMMENT '删除时间',
  `data_state` tinyint(2) DEFAULT NULL COMMENT '数据转态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for sys_config
-- ----------------------------
DROP TABLE IF EXISTS `sys_config`;
CREATE TABLE `sys_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `my_key` varchar(50) DEFAULT NULL,
  `my_val` text,
  `about` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_config
-- ----------------------------
INSERT INTO `sys_config` VALUES ('1', 'admin-name', 'admin', '超级管理员账户');
INSERT INTO `sys_config` VALUES ('2', 'admin-password', '21232f297a57a5a743894a0e4a801fc3', null);
INSERT INTO `sys_config` VALUES ('3', 'nodejs-server-port', '3000', 'NodeJS服务器的端口号');
INSERT INTO `sys_config` VALUES ('4', 'nodejs-server-host', '127.0.0.1', 'NodeJS服务器的IP或者域名');
INSERT INTO `sys_config` VALUES ('5', 'nodejs-server-business-login-path', '/business/login/index', 'NodeJS服务器的business模块登录路径');
INSERT INTO `sys_config` VALUES ('6', 'nodejs-server-business-openPage-path', '/business/main/openPage', 'NodeJS服务器的business模块执行ifream父窗口的方法路径');

-- ----------------------------
-- Table structure for sys_log
-- ----------------------------
DROP TABLE IF EXISTS `sys_log`;
CREATE TABLE `sys_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_type` varchar(30) DEFAULT NULL,
  `person_id` int(11) DEFAULT NULL COMMENT '人的id',
  `person_name` varchar(30) DEFAULT NULL COMMENT '人名',
  `operation` text COMMENT '操作',
  `start_time` datetime DEFAULT NULL COMMENT '操作时间',
  `end_time` datetime DEFAULT NULL COMMENT '删除时间',
  `data_state` tinyint(2) DEFAULT NULL COMMENT '数据转态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_log
-- ----------------------------

-- ----------------------------
-- Table structure for table
-- ----------------------------
DROP TABLE IF EXISTS `table`;
CREATE TABLE `table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` int(11) DEFAULT NULL COMMENT '编号',
  `belong_business_id` int(11) DEFAULT NULL COMMENT '所属商家id',
  `start_time` datetime DEFAULT NULL COMMENT '入库时间',
  `end_time` datetime DEFAULT NULL COMMENT '删除时间',
  `data_state` tinyint(2) DEFAULT NULL COMMENT '1有效  -1已被删除 -2暂停使用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of table
-- ----------------------------

-- ----------------------------
-- Table structure for test
-- ----------------------------
DROP TABLE IF EXISTS `test`;
CREATE TABLE `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of test
-- ----------------------------
INSERT INTO `test` VALUES ('1', '更新8', '更新8', '1478957900175');
INSERT INTO `test` VALUES ('2', '更新31', '更新3', '1478956875323');
INSERT INTO `test` VALUES ('3', '更新32', '更新3', '1478956875323');
INSERT INTO `test` VALUES ('4', '12更新312', '更新3', '1478956875323');
INSERT INTO `test` VALUES ('5', 'ERF', '更新3', '1478956875323');
INSERT INTO `test` VALUES ('6', 'FD', '更新3', '1478956875323');
INSERT INTO `test` VALUES ('7', 'ERT', '更新3', '1478956875323');
INSERT INTO `test` VALUES ('8', 'SDF', '更新3', '1478956875323');
INSERT INTO `test` VALUES ('9', 'RGTH', '更新3', '1478956875323');
INSERT INTO `test` VALUES ('10', 'ER45', '更新3', '1478956875323');
