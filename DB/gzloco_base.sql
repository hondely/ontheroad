/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : gzloco_base

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2016-06-16 21:55:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gzloco_base_department
-- ----------------------------
DROP TABLE IF EXISTS `gzloco_base_department`;
CREATE TABLE `gzloco_base_department` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '部门id',
  `pid` int(11) DEFAULT NULL COMMENT '上级部门id',
  `name` varchar(20) DEFAULT NULL COMMENT '部门名称',
  `remark` varchar(255) DEFAULT NULL COMMENT '部门说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gzloco_base_department
-- ----------------------------
INSERT INTO `gzloco_base_department` VALUES ('1', '0', '制造中心', '制造中心');
INSERT INTO `gzloco_base_department` VALUES ('2', '0', '质量管理部', '质量管理部');
INSERT INTO `gzloco_base_department` VALUES ('3', '2', '质检班', '质量管理部-质检班，故障录入和审核关闭');
INSERT INTO `gzloco_base_department` VALUES ('4', '1', '总装车间', '制造中心-总装车间');
INSERT INTO `gzloco_base_department` VALUES ('5', '1', '驱动车间', '制造中心-驱动车间');
INSERT INTO `gzloco_base_department` VALUES ('6', '4', '抬车落车', '制造中心-总装车间-抬车落车');
INSERT INTO `gzloco_base_department` VALUES ('7', '4', '司机室', '制造中心-总装车间-司机室');
INSERT INTO `gzloco_base_department` VALUES ('8', '5', '构架', '制造中心-驱动车间-构架');
INSERT INTO `gzloco_base_department` VALUES ('9', '5', '总成', '制造中心-驱动车间-总成');

-- ----------------------------
-- Table structure for gzloco_base_key_val
-- ----------------------------
DROP TABLE IF EXISTS `gzloco_base_key_val`;
CREATE TABLE `gzloco_base_key_val` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `my_key` varchar(50) DEFAULT NULL,
  `my_val` varchar(255) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `state` bit(1) DEFAULT b'1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gzloco_base_key_val
-- ----------------------------
INSERT INTO `gzloco_base_key_val` VALUES ('1', 'ase_key', 'WP20117238', 'AES加密的密钥key', '');
INSERT INTO `gzloco_base_key_val` VALUES ('2', 'aes_iv', '1234567812345678', 'AES加密的密钥向量 iv', '');
INSERT INTO `gzloco_base_key_val` VALUES ('3', 'regist_url', 'http://itiswpweb.com/cloudContact/index.php/API/Base/regist', '注册用户的API', '');
INSERT INTO `gzloco_base_key_val` VALUES ('4', 'login_url', 'http://itiswpweb.com/cloudContact/index.php/API/Base/login', '用户登录的API', '');
INSERT INTO `gzloco_base_key_val` VALUES ('5', 'resetPassword_url', 'http://itiswpweb.com/cloudContact/index.php/API/Base/sendEmail', '发送重置密码邮件的API', '');
INSERT INTO `gzloco_base_key_val` VALUES ('6', 'base_verify_code_url', 'http://itiswpweb.com/cloudContact/index.php/API/Base/verify', 'Base控制器验证码的URL', '');
INSERT INTO `gzloco_base_key_val` VALUES ('7', 'add_user_number_url', 'http://itiswpweb.com/cloudContact/index.php/API/User/addNumber', '用户新增号码的URL', '');
INSERT INTO `gzloco_base_key_val` VALUES ('8', 'delete_user_number_url', 'http://itiswpweb.com/cloudContact/index.php/API/User/deleteNumber', '用户删除号码的URL', '');
INSERT INTO `gzloco_base_key_val` VALUES ('9', 'set_user_name_url', 'http://itiswpweb.com/cloudContact/index.php/API/User/setName', '用户修改姓名的URL', '');

-- ----------------------------
-- Table structure for gzloco_base_logging
-- ----------------------------
DROP TABLE IF EXISTS `gzloco_base_logging`;
CREATE TABLE `gzloco_base_logging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_id` int(11) DEFAULT NULL COMMENT '登录的管理员用户',
  `time` datetime DEFAULT NULL COMMENT '登录时间',
  `ip` varchar(32) DEFAULT NULL COMMENT '登录的IP地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gzloco_base_logging
-- ----------------------------
INSERT INTO `gzloco_base_logging` VALUES ('19', '1', '2016-06-14 23:17:20', '127.0.0.1');
INSERT INTO `gzloco_base_logging` VALUES ('20', '4', '2016-06-14 23:18:28', '127.0.0.1');
INSERT INTO `gzloco_base_logging` VALUES ('21', '4', '2016-06-14 23:22:16', '127.0.0.1');
INSERT INTO `gzloco_base_logging` VALUES ('22', '4', '2016-06-14 23:23:35', '127.0.0.1');

-- ----------------------------
-- Table structure for gzloco_base_user
-- ----------------------------
DROP TABLE IF EXISTS `gzloco_base_user`;
CREATE TABLE `gzloco_base_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id ',
  `name` varchar(20) DEFAULT NULL COMMENT '名称',
  `job_number` char(12) DEFAULT NULL COMMENT '工号',
  `password` varchar(32) DEFAULT NULL COMMENT '密码',
  `email` varchar(64) DEFAULT NULL COMMENT '邮箱',
  `phone` varchar(20) DEFAULT NULL COMMENT '手机号',
  `tel` char(11) DEFAULT NULL COMMENT '座机号',
  `belong_dept_id` int(255) DEFAULT NULL COMMENT '所属部门id',
  `level` tinyint(3) DEFAULT '1' COMMENT '职位级别 机关 技工 等',
  `wechat_id` varchar(64) DEFAULT NULL COMMENT '微信号id',
  `privatekey` varchar(1100) DEFAULT NULL COMMENT '秘钥',
  `publickey` varchar(1100) DEFAULT '' COMMENT '公钥',
  `head_ico_url` varchar(255) DEFAULT NULL COMMENT '用户头像图片的URL',
  `regtime` datetime DEFAULT NULL COMMENT '该账户注册时间',
  `unregtime` datetime DEFAULT NULL COMMENT '该账户注销时间',
  `state` tinyint(1) DEFAULT '1' COMMENT '数据状态',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE,
  UNIQUE KEY `email` (`job_number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gzloco_base_user
-- ----------------------------
INSERT INTO `gzloco_base_user` VALUES ('1', '质管人员', '1000', 'e10adc3949ba59abbe56e057f20f883e', '1000@qq.com', '18228301000', '08331000', '3', '3', null, '-----BEGIN RSA PRIVATE KEY-----\r\nMIICXAIBAAKBgQC0giJCGVldLaUj1ZXiahQD97Q1amSI4AyUdff+JuCqd40jFsdY\r\nKY1rVvEatE7x6JxGSGnQiHTLGXArogeye7DWtXKRSFi6sMCHek/9Gnbo8Fzk7emw\r\nAaCaMZUk45Ulew8G0zZau/3FLUoQvObTUxXGiHzZqQkr0o2gepUIPdTSbwIDAQAB\r\nAoGAUAX5JhCS24om0fIYVp3sba3cyGl4VG3vZcm+vX+Czk/d1BZ/HYieV13d2Zbi\r\nAMC8tzPXJUm5bWjDn7RfcTMAvA/aj2B30oiv8Gb233AF6XIK38QbsQPDtL2CvWwi\r\nUvWVL1FJ+UWvQNnsVa64e43gYOs9RJqg74y6Er9NdYqB8MECQQDoZr3t+NcRMuQf\r\nsdlS25l3JxvJYcGujH23iLKlaAcNrcePzxAXSzl462qM/C6aXKZbzYL0CHko/SPp\r\nWloSaCcxAkEAxtZvxxOKTwPSWEfE4BuEjWuNn5M3jNsdt5usLW/u5ozItqjykd9E\r\nPExTTMfRudV9nJXSqeMXPHM4cdwO+DNrnwJAOtG+IlvHuw+hUzBFK8ZuugyI6Ng4\r\nGABw1SHg7SI+HsUr7AbhMLQWULdsmVA+T01BwZxrF26Jk8k17Jq0j1ITEQJAQQb2\r\nLVwFmou8aeSmzUgSlJF9Epf5zdYHJPoDWCTIM5wNNDeShQRIc5PeljivLSBV4TTa\r\nXXcILVvdNNdsCd3/LwJBAIII1aAUWO+ti+wYEr9fSQ1dRBoq/r3SbEZQzV4f0KU+\r\noQICSDcz7JfAOWrYjqk1tRDHB7piEIUqUrhFEe++sow=\r\n-----END RSA PRIVATE KEY-----', '-----BEGIN PUBLIC KEY-----\r\nMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQC0giJCGVldLaUj1ZXiahQD97Q1\r\namSI4AyUdff+JuCqd40jFsdYKY1rVvEatE7x6JxGSGnQiHTLGXArogeye7DWtXKR\r\nSFi6sMCHek/9Gnbo8Fzk7emwAaCaMZUk45Ulew8G0zZau/3FLUoQvObTUxXGiHzZ\r\nqQkr0o2gepUIPdTSbwIDAQAB\r\n-----END PUBLIC KEY-----', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/OnePercent/headIco/headIco3.jpg', '2016-06-14 22:48:00', null, '1');
INSERT INTO `gzloco_base_user` VALUES ('2', '车间技管', '1001', 'e10adc3949ba59abbe56e057f20f883e', '1001@qq.com', '18228301001', '08331001', '4', '1', null, '-----BEGIN RSA PRIVATE KEY-----\r\nMIICXAIBAAKBgQDRwvLCpDx7gTPbdzi76eB1Yzm8eA/15wzW1uEDR00WxgZc+K4c\r\nt8U9iNqPZnaPn47cKAS65lv3Uya9ra8/JVvyQ+NIF7uEDjFEGiuqdBVgDGLrxBzv\r\nRNSKLmPSNCXGgvv9HbQ6fmzSamEHyZ/RfaA0HWf2N8Xa4+COvlWkzHFkjQIDAQAB\r\nAoGAMEGeIaMw+uTFblbmKWzro3XZYX9phJPMA1zZ1SxBEt0pt5fKTncEnFxwk47p\r\n9a6qagGW3PyD6ckqX3amm2tX1GBtsY4MwpOmdDLIAyBqVNPgx4887D/2vR867pIT\r\nHONpF5/34yBVwykEHVzU3Zy80WbBzOhYksHt9OM5oH8vw8ECQQD25PUdpOcmhv9X\r\nBZaozjG6WVkbymLjEei0OQipJp5dF/C3iYSBXOTZzScQP+l5Yi+Df/1I/9ZH/ccP\r\nvHYFkjH9AkEA2X9nEWmu2GZncosfuS/l3Yfb6CPlut5xFg4YZUpkxd8+HTJ8Y+iy\r\naXPDXhJr2ijkotEkAdmtswRM99J+Ry550QJANqAJq3lkux17OSG/Z7HXRsel84Qf\r\nxOWdeuJzjBlDSI2XcMQ4UPbgm1/MmMfLPFQA9zNGMvSH0H3RoSWtZyYlcQJBANDP\r\nLt2Zz+I0VmayyM8a/B22HFr/c8P3YSyidatxQ9RwooqXeLLWqcrx+APtvZviHLdw\r\nAJjCKrAuldJrRQ8DwLECQHiQT9R/IgiWm9agjPlvn0ZwrQc6g5uMacBpRkWw/twz\r\nhj4xd+LvrDJtwkIbO6PRmhvYrFicNoLA5Vf/9EZiai0=\r\n-----END RSA PRIVATE KEY-----', '-----BEGIN PUBLIC KEY-----\r\nMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQDRwvLCpDx7gTPbdzi76eB1Yzm8\r\neA/15wzW1uEDR00WxgZc+K4ct8U9iNqPZnaPn47cKAS65lv3Uya9ra8/JVvyQ+NI\r\nF7uEDjFEGiuqdBVgDGLrxBzvRNSKLmPSNCXGgvv9HbQ6fmzSamEHyZ/RfaA0HWf2\r\nN8Xa4+COvlWkzHFkjQIDAQAB\r\n-----END PUBLIC KEY-----', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/OnePercent/headIco/headIco1.jpg', '2016-06-14 22:56:13', null, '1');
INSERT INTO `gzloco_base_user` VALUES ('3', '车间技工', '1002', 'e10adc3949ba59abbe56e057f20f883e', '1002@qq.com', '18228301002', '08331002', '6', '3', null, '-----BEGIN RSA PRIVATE KEY-----\r\nMIICXgIBAAKBgQCiqrGPXP3RwfklEC3Q4tgEkOpXPiChYvS3cdV5nnwVdopgSLVO\r\nb4KaeC9eMlZlMySZL+bP33jMoY4YVfj+KHUk0kJnexnM/IbDF02138xLt9P8l6be\r\n5RIGJioS//Gwb4uyabIRUCYNQjIzWqqtvEbejJPQaxoSL2L6ra4UPds0QQIDAQAB\r\nAoGBAIlvxw3l995eEW8rOEqhHvrcpeKIb3Fr9m94EnHrYdOQkGHBjM50kNiKaxsf\r\nVLe0elujiVRg7+OVLEWLfhDfhfj5gZMtdFlKzURHOcbbT9/tBbOH0vL2cpGTJGqm\r\nuoH4uHG6ds5qWFUYgREnTCx3GdvxehOdRoVERKRBGQNEEUoxAkEAzo1nMoz/9P/r\r\nyBOcRIEyUohHvsMCm6YUTHFPWWXP5bvhzxc3BoxvITDZEv6eCph/EOOpvQv4wrp4\r\nEk7Zi0/bhwJBAMmbwT6yA8qZPvYGdSkyYKCAzC2wH1YZ0RdeV9u1bYiGSyAyU1tE\r\nSwkaKajwj5PEXZ5Q+wVLsCYZJjUUrpH5s/cCQQCnHLJ0rK1dbD04F92jcx/itE3P\r\nofkXMwxTOI2pV30XcqXkJfUoADDdGqdV/dih2/VaFce7otb1vWXt8guB8e87AkEA\r\nwqmIYm/h50oml8jOcXO6Bt+1xduLtkgBMu4eKP85/pukiDbvc20yglxnoz57c3Mj\r\n7cxFQ+y77V1VHeWVVU9kKwJAIapMY96DdGHEwo5HhZ3jUErJeYVZ95avEWDDKr2Y\r\nouC0fm1CYr1go3KDADwgNcO9ESoXaXjnUyNjNAnelqwTUQ==\r\n-----END RSA PRIVATE KEY-----', '-----BEGIN PUBLIC KEY-----\r\nMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCiqrGPXP3RwfklEC3Q4tgEkOpX\r\nPiChYvS3cdV5nnwVdopgSLVOb4KaeC9eMlZlMySZL+bP33jMoY4YVfj+KHUk0kJn\r\nexnM/IbDF02138xLt9P8l6be5RIGJioS//Gwb4uyabIRUCYNQjIzWqqtvEbejJPQ\r\naxoSL2L6ra4UPds0QQIDAQAB\r\n-----END PUBLIC KEY-----', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/OnePercent/headIco/headIco2.jpg', '2016-06-14 23:01:59', null, '1');
INSERT INTO `gzloco_base_user` VALUES ('4', '制造中心超级管理员', '2000', 'e10adc3949ba59abbe56e057f20f883e', '2000@qq.com', '18228302000', '08332000', '1', '1', null, '-----BEGIN RSA PRIVATE KEY-----\r\nMIICWwIBAAKBgQCkgWxm6DAG4b4mko+oy/VYs1Tz97slm9Es1j1AlZ30GV/VFTNQ\r\nSHJiqOisTiy13RQPPhbSH9FYOgYVcCWAnUsjUZVqpBdWG0DGSXYNbNW7Dg3cyAjH\r\n5vHFGWKB4cE5wgvl8tvNRxLkJMG3osXKy/SzxUcJlvkddbtyrbCF7TznIQIDAQAB\r\nAoGAKdx5XlJ1bjrhrWUcQ4LrQxAXbSG8MNzOxM8btSSdljEiztFfRm25FdwPoVEf\r\nVYQVh69wFTZdikrxo2DvWiQsqz6oXEU1G8INFX7hjDxJtUsjOpbVZqNbz7JLuwyX\r\nBVhUC3+86QFKF1Pyi4Tsj4YWVbVWAJzj4b1+D+2EGUaosOUCQQDTqO6GopD7/AGt\r\npWs5qClmAPiIlppkJs5bR1em5bGvicli81KGEpQUFmadOua3ldBelVqXSVBBu6n/\r\nnyN2yU0DAkEAxvepPJye0fs7FY8ZwILBVmC1nLNJi2mzzCkc/i0PFvwO9wbBLcni\r\nxOLFR2zzW9ROqPdv3Sfo0BnrWQqKn4+ICwJASULDrN5ACLglbJFBF+fYzHGxlLVs\r\nIxY7fuSmtiHy6qtqhVFrUvTDRGCsi+eDTDASu2o+vPanTNlD8jKG9+qdOQJAIvyB\r\nocrYkovew9e564QSgyHWTYupLv6TQx8nnfpGYQBJkV56sZaCbaSClCCwWkFm44c/\r\nAGB4K7+jBrE31v7iKQJABSmd0+O6r5WSy2FwXrlbriDwiXhUfMAR0ZrSKYchHJlP\r\n6PdiDKNi+GY4jbnvNQ5+/pWQjlxNLWhkvMIvhaspcw==\r\n-----END RSA PRIVATE KEY-----', '-----BEGIN PUBLIC KEY-----\r\nMIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCkgWxm6DAG4b4mko+oy/VYs1Tz\r\n97slm9Es1j1AlZ30GV/VFTNQSHJiqOisTiy13RQPPhbSH9FYOgYVcCWAnUsjUZVq\r\npBdWG0DGSXYNbNW7Dg3cyAjH5vHFGWKB4cE5wgvl8tvNRxLkJMG3osXKy/SzxUcJ\r\nlvkddbtyrbCF7TznIQIDAQAB\r\n-----END PUBLIC KEY-----', 'http://thisismyoss.oss-cn-hangzhou.aliyuncs.com/OnePercent/headIco/headIco4.jpg', '2016-06-14 23:02:02', null, '1');
