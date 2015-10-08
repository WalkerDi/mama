/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : nurser

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-08-17 00:44:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_area`
-- ----------------------------
DROP TABLE IF EXISTS `t_area`;
CREATE TABLE `t_area` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Id编号(流水号)',
  `name` varchar(100) DEFAULT '' COMMENT '城市名称',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  `open_id` varchar(20) DEFAULT NULL COMMENT '微信号',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_area
-- ----------------------------
INSERT INTO `t_area` VALUES ('1', '朝阳区朝外大街16号', null, null, '1');

-- ----------------------------
-- Table structure for `t_customer`
-- ----------------------------
DROP TABLE IF EXISTS `t_customer`;
CREATE TABLE `t_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) DEFAULT NULL COMMENT '公司Id',
  `open_id` varchar(100) NOT NULL COMMENT '微信openid',
  `name` varchar(11) DEFAULT '' COMMENT '姓名',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别(0:男 1:女)',
  `phone` varchar(50) DEFAULT '' COMMENT '手机号码',
  `description` varchar(200) DEFAULT NULL COMMENT '客户描述',
  `address` varchar(100) DEFAULT '' COMMENT '客户地址',
  `status` int(1) DEFAULT '0' COMMENT '状态(0：正常 1：冻结）',
  `order_id` int(11) DEFAULT NULL COMMENT '订单Id',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='客户表';

-- ----------------------------
-- Records of t_customer
-- ----------------------------
INSERT INTO `t_customer` VALUES ('12', '7663', 'oOqoks3nNkaa2yKyaX2LXj7odduE', '', null, '13876677583', null, '', '0', null, '2015-08-16 16:15:43', null);
INSERT INTO `t_customer` VALUES ('13', '7663', 'oOqoks4l4mNTKErE_BNsauQO76QI', '', '1', '13034905918', '', '', '1', null, '2015-08-16 16:15:45', '2015-08-16 17:31:03');
INSERT INTO `t_customer` VALUES ('14', '7663', 'oOqoks3nNkaa2yKyaX2LXj7odduE', '5757', '1', '13876677883', '757', '7676', '0', null, '2015-08-16 16:15:52', '2015-08-16 16:24:44');

-- ----------------------------
-- Table structure for `t_evaluation`
-- ----------------------------
DROP TABLE IF EXISTS `t_evaluation`;
CREATE TABLE `t_evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id编号',
  `customer_id` int(11) DEFAULT NULL COMMENT '客户id',
  `context` varchar(100) DEFAULT '' COMMENT '评价内容',
  `nurser_id` int(11) DEFAULT NULL COMMENT '护士id',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_evaluation
-- ----------------------------

-- ----------------------------
-- Table structure for `t_item`
-- ----------------------------
DROP TABLE IF EXISTS `t_item`;
CREATE TABLE `t_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id编号',
  `com_id` int(11) DEFAULT NULL COMMENT '公司Id',
  `thumb` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `name` varchar(50) DEFAULT '' COMMENT '项目名称',
  `description` varchar(100) DEFAULT '' COMMENT '项目描述',
  `price` decimal(10,0) DEFAULT NULL COMMENT '金额',
  `nurse_ids` int(11) DEFAULT NULL COMMENT '护士Ids',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_item
-- ----------------------------
INSERT INTO `t_item` VALUES ('1', '7663', '/images/weimob/20150808195249_864606.png', '产后护理(298元/次', '特殊护理，献给十月怀胎的妈妈。特殊护理，献给十月怀胎的妈妈', '100', '192', '2015-08-16 17:00:16', '2015-08-09 13:15:46');
INSERT INTO `t_item` VALUES ('9', null, '/images/weimob/20150808204216_383532.jpg', '照顾小孩', '1233', '120', '2', '2015-08-08 20:34:31', '2015-08-08 20:42:16');
INSERT INTO `t_item` VALUES ('30', '59', null, '66', '543', '6', null, '2015-08-17 00:41:26', '2015-08-17 00:41:42');

-- ----------------------------
-- Table structure for `t_item_relate`
-- ----------------------------
DROP TABLE IF EXISTS `t_item_relate`;
CREATE TABLE `t_item_relate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id编号',
  `item_id` int(11) DEFAULT NULL COMMENT '项目Id',
  `nurser_id` int(11) DEFAULT NULL COMMENT '护士Id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_item_relate
-- ----------------------------
INSERT INTO `t_item_relate` VALUES ('1', '1', '1');
INSERT INTO `t_item_relate` VALUES ('2', '11', '196');
INSERT INTO `t_item_relate` VALUES ('3', '9', '196');
INSERT INTO `t_item_relate` VALUES ('4', '8', '196');
INSERT INTO `t_item_relate` VALUES ('13', '1', '286');
INSERT INTO `t_item_relate` VALUES ('9', '9', '284');
INSERT INTO `t_item_relate` VALUES ('17', '1', '287');

-- ----------------------------
-- Table structure for `t_mama`
-- ----------------------------
DROP TABLE IF EXISTS `t_mama`;
CREATE TABLE `t_mama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) DEFAULT NULL COMMENT '公司id',
  `area_id` int(11) DEFAULT NULL COMMENT '城区id',
  `name` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `logo` varchar(100) DEFAULT NULL COMMENT '公司图片',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='橙妈妈项目表';

-- ----------------------------
-- Records of t_mama
-- ----------------------------
INSERT INTO `t_mama` VALUES ('1', '7663', '1', '橙妈妈', '/images/weimob/20150816161019_689png', '2015-08-14 10:09:02', '2015-08-16 16:10:19');
INSERT INTO `t_mama` VALUES ('22', '59', '1', '橙妈妈22', '/images/weimob/20150816161505_2790png', '2015-08-16 16:15:05', null);
INSERT INTO `t_mama` VALUES ('23', '59', '1', '33', '/images/weimob/20150817004059_6594jpg', '2015-08-17 00:40:59', null);

-- ----------------------------
-- Table structure for `t_nurse_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_nurse_user`;
CREATE TABLE `t_nurse_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id编号(流水号)',
  `com_id` int(11) DEFAULT NULL COMMENT '公司Id',
  `name` varchar(11) DEFAULT '' COMMENT '姓名',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别(0:男 1:女)',
  `phone` varchar(50) DEFAULT NULL COMMENT '护士电话',
  `thumb` varchar(100) DEFAULT NULL COMMENT '头像',
  `password` varchar(20) DEFAULT NULL COMMENT '密码',
  `age` int(3) DEFAULT NULL COMMENT '年龄',
  `address` varchar(50) DEFAULT '' COMMENT '住址',
  `description` text COMMENT '描述',
  `level` tinyint(1) DEFAULT NULL COMMENT '星级',
  `item_relate_id` varchar(100) DEFAULT NULL COMMENT '项目关联Id',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态(0:未安排1:已安排)',
  `case_num` int(5) DEFAULT NULL COMMENT '案例数',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=288 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_nurse_user
-- ----------------------------
INSERT INTO `t_nurse_user` VALUES ('112', '15', '王华', '1', '15599655', '/images/weimob/06.png', '123456', '18', '万宁', '组长', '2', null, '0', '6', '2015-08-17 00:33:59', '2015-08-16 17:21:23');
INSERT INTO `t_nurse_user` VALUES ('2', '15', '王涛', '0', '15599655', '/images/weimob/06.png', '8cba0bcf8f336b70ab4b', '19', '三亚', '主任', '4', null, '0', '5', '2015-08-17 00:35:55', '2015-08-17 00:31:51');
INSERT INTO `t_nurse_user` VALUES ('3', '15', '李凯', '1', '15599655', '/images/weimob/06.png', '75766', '22', '海口', '部长', '5', null, '0', '2', '2015-08-17 00:34:04', '2015-08-16 17:27:50');
INSERT INTO `t_nurse_user` VALUES ('183', null, '李凡', '0', '15894562321', '/images/weimob/20150808183549_649306.png', 'fb7a5f1dda11cd21c0fd', '20', '甘肃', '我是谁', '1', null, '0', null, '2015-08-17 00:34:06', '2015-08-16 23:41:01');
INSERT INTO `t_nurse_user` VALUES ('269', '59', '丁建华', '0', '5555', null, '1558e6918f9ef53f2107', '55', '55', '55', '1', null, '0', null, '2015-08-17 00:34:11', '2015-08-17 00:37:03');
INSERT INTO `t_nurse_user` VALUES ('196', null, '李佳', '0', '155555555', '/images/weimob/20150808212755_324102.jpg', '0d1e59f2d91df36c9806', '22', '22444', '22', '1', null, '1', null, '2015-08-16 16:11:41', '2015-08-16 17:21:21');
INSERT INTO `t_nurse_user` VALUES ('287', null, '4546', '0', '4444', null, null, '444', '444', '44', null, null, '0', null, '2015-08-17 00:42:17', '2015-08-17 00:42:50');
INSERT INTO `t_nurse_user` VALUES ('286', null, '222', '0', '787', '/images/weimob/20150816233915_1031png', null, '78', '78', '', null, null, '1', null, '2015-08-16 23:39:15', '2015-08-16 23:42:27');

-- ----------------------------
-- Table structure for `t_order`
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id编号(流水号)',
  `com_id` int(11) DEFAULT NULL COMMENT '公司Id',
  `server_name` varchar(50) DEFAULT '' COMMENT '服务名称',
  `user_name` varchar(20) DEFAULT '' COMMENT '客户姓名',
  `address` varchar(100) DEFAULT NULL COMMENT '地址',
  `order_status` tinyint(1) DEFAULT '0' COMMENT '订单状态(0：未接单 1：已接单 2：完成)',
  `item_id` int(11) DEFAULT NULL COMMENT '服务项目Id',
  `customer_id` int(11) DEFAULT NULL COMMENT '客户id',
  `book_time` datetime DEFAULT NULL COMMENT '预约时间',
  `remark` varchar(100) DEFAULT NULL COMMENT '备注',
  `order_num` varchar(50) DEFAULT NULL COMMENT '订单号',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  `nurser_id` int(11) DEFAULT NULL COMMENT '护士id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('107', '7663', '产后护理(298元/次', '梁军', '																																																												北京市朝阳区朝阳街道																														', '2', '1', '12', '2015-08-07 13:00:00', '																																																												112126464+64																												', '20150816', '2015-08-17 00:43:24', '2015-08-17 00:37:03', '269');
INSERT INTO `t_order` VALUES ('108', '7663', '产后护理(298元/次', '梁军', '																																				北京市朝阳区朝阳街道100																																				', '0', '1', '12', '2015-08-07 13:00:00', '																																				42432																																				', '201508161', '2015-08-17 00:32:48', '2015-08-16 23:41:01', '183');

-- ----------------------------
-- Table structure for `t_sms_code`
-- ----------------------------
DROP TABLE IF EXISTS `t_sms_code`;
CREATE TABLE `t_sms_code` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `com_id` int(10) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `mobile` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `code` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `is_used` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `expiry_time` datetime DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_sms_code
-- ----------------------------
INSERT INTO `t_sms_code` VALUES ('1', '7663', '0', '13876677583', '57529', '0', '2015-08-14 12:30:10', '2015-08-14 10:30:10', '2015-08-14 12:34:57');
INSERT INTO `t_sms_code` VALUES ('2', '0', '0', '', '72178', '0', '2015-08-14 14:55:06', '2015-08-14 12:55:06', '0000-00-00 00:00:00');
INSERT INTO `t_sms_code` VALUES ('3', '7663', '0', '13701326934', '75668', '0', '2015-08-15 12:30:54', '2015-08-15 10:30:54', '2015-08-16 10:58:23');

-- ----------------------------
-- Table structure for `t_wechat_pay_setting`
-- ----------------------------
DROP TABLE IF EXISTS `t_wechat_pay_setting`;
CREATE TABLE `t_wechat_pay_setting` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `com_id` int(10) NOT NULL DEFAULT '0' COMMENT '公司ID',
  `pay_appid` varchar(100) NOT NULL DEFAULT '',
  `pay_key` varchar(100) NOT NULL DEFAULT '' COMMENT '支付密钥',
  `pay_secret_key` varchar(100) NOT NULL DEFAULT '' COMMENT 'app_secret,不是支付密钥',
  `pay_mchid` varchar(100) NOT NULL DEFAULT '',
  `enable` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `pay_cash` tinyint(1) NOT NULL DEFAULT '0' COMMENT '货到付款',
  `pay_wechat` tinyint(1) NOT NULL DEFAULT '0' COMMENT '微信支付',
  `pay_balance` tinyint(1) NOT NULL DEFAULT '0' COMMENT '余额支付',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_wechat_pay_setting
-- ----------------------------
INSERT INTO `t_wechat_pay_setting` VALUES ('2', '7663', 'wx8e3211220f6dda4d', 'Ke210283198606247217198604023322', 'fa4e060909b2d657f67e830773b16910', '1243107502', '1', null, '2015-08-14 10:09:47', '1', '1', '1');
