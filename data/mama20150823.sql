/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : mama

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-08-23 00:22:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `t_area`
-- ----------------------------
DROP TABLE IF EXISTS `t_area`;
CREATE TABLE `t_area` (
  `id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Id编号(流水号)',
  `name` varchar(100) DEFAULT '' COMMENT '城市名称',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  `customer_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_area
-- ----------------------------
INSERT INTO `t_area` VALUES ('13', '海口市噢你哦', '2015-08-17 05:02:59', null, '15');
INSERT INTO `t_area` VALUES ('14', '港还没', '2015-08-17 05:08:26', null, '15');
INSERT INTO `t_area` VALUES ('15', '还弄您', '2015-08-17 05:42:27', null, '15');
INSERT INTO `t_area` VALUES ('16', '好累哦仔', '2015-08-17 05:42:38', null, '15');
INSERT INTO `t_area` VALUES ('17', '测试', '2015-08-17 07:01:10', null, '13');
INSERT INTO `t_area` VALUES ('18', '新的地址', '2015-08-17 07:18:33', null, '13');
INSERT INTO `t_area` VALUES ('19', '海口市龙华区', '2015-08-17 08:58:59', null, '16');
INSERT INTO `t_area` VALUES ('20', '', '2015-08-17 09:04:40', null, '15');
INSERT INTO `t_area` VALUES ('21', '海口地址', '2015-08-17 17:42:56', null, '17');
INSERT INTO `t_area` VALUES ('23', '海南省嗨咯鱼明', '2015-08-18 13:23:47', null, '18');
INSERT INTO `t_area` VALUES ('27', '好啊', '2015-08-18 21:06:29', null, '20');
INSERT INTO `t_area` VALUES ('29', '海口', '2015-08-18 21:58:34', null, '21');
INSERT INTO `t_area` VALUES ('32', '广州', '2015-08-18 23:40:03', null, '21');
INSERT INTO `t_area` VALUES ('34', '三亚', '2015-08-18 23:42:00', null, '21');
INSERT INTO `t_area` VALUES ('35', '咯哦哦', '2015-08-18 23:43:09', null, '21');
INSERT INTO `t_area` VALUES ('39', '三亚', '2015-08-19 09:08:20', null, '20');
INSERT INTO `t_area` VALUES ('41', '平乐园', '2015-08-19 10:07:40', null, '23');
INSERT INTO `t_area` VALUES ('42', '地址2', '2015-08-19 15:41:45', null, '26');
INSERT INTO `t_area` VALUES ('43', '北京市海淀区', '2015-08-19 15:44:22', null, '25');
INSERT INTO `t_area` VALUES ('44', '海淀区交大东路56号院', '2015-08-19 15:45:00', null, '25');

-- ----------------------------
-- Table structure for `t_customer`
-- ----------------------------
DROP TABLE IF EXISTS `t_customer`;
CREATE TABLE `t_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) DEFAULT NULL COMMENT '公司Id',
  `open_id` varchar(100) DEFAULT NULL COMMENT '微信openid',
  `name` varchar(11) DEFAULT '' COMMENT '姓名',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别(0:男 1:女)',
  `phone` varchar(50) DEFAULT '' COMMENT '手机号码',
  `description` varchar(200) DEFAULT NULL COMMENT '客户描述',
  `address` varchar(100) DEFAULT '' COMMENT '客户地址',
  `status` int(1) DEFAULT NULL COMMENT '状态(0:正常 1:冻结）',
  `order_id` int(11) DEFAULT NULL COMMENT '订单Id',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='客户表';

-- ----------------------------
-- Records of t_customer
-- ----------------------------
INSERT INTO `t_customer` VALUES ('12', '7663', 'oOqoks3nNkaa2yKyaX2LXj7odduE', '赵凯', null, '13876677853', null, '', null, null, '2015-08-22 11:05:04', null);
INSERT INTO `t_customer` VALUES ('13', '7663', 'oOqoks4l4mNTKErE_BNsauQO76QI', '李四', null, '13034905918', null, '', null, null, '2015-08-22 11:05:10', null);
INSERT INTO `t_customer` VALUES ('24', '7663', 'oOqoks5S1bFeua_T0wUb4HNCQQi8', '', null, '18710120656', null, '', null, null, '2015-08-19 10:15:13', null);
INSERT INTO `t_customer` VALUES ('25', '7663', 'oOqoks7J93FtAIDNWugX36qCfe9w', '', null, '13701326934', null, '', null, null, '2015-08-19 10:45:04', null);
INSERT INTO `t_customer` VALUES ('26', '7663', 'oOqoksx3qPbndOnvuItR2pzsYk8U', '', null, '13138917196', null, '', null, null, '2015-08-19 12:42:27', null);
INSERT INTO `t_customer` VALUES ('27', '7663', 'oOqoks9LV2iYqDQmLbRdl80Gf8zk', '', null, '18117627350', null, '', null, null, '2015-08-19 14:07:24', null);
INSERT INTO `t_customer` VALUES ('28', '7663', 'oOqoks4U0RhTizvK5K6zuvif6J58', '', '0', '13208919469', 'd的法人能进 的任何的菊花台d的法人能进 的任何的菊花台d的法人能进 的任何的菊花台d的法人能进 的任何的菊花台', 'd的法人能进 的任何的菊花台d的法人能进 的任何的菊花台d的法人能进 的任何的菊花台d的法人能进 的任何的菊花台', null, null, '2015-08-19 14:26:35', '2015-08-20 19:04:09');

-- ----------------------------
-- Table structure for `t_duty`
-- ----------------------------
DROP TABLE IF EXISTS `t_duty`;
CREATE TABLE `t_duty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL COMMENT '开始时间',
  `over_time` varchar(50) DEFAULT NULL COMMENT '结束时间',
  `nurser_id` int(11) DEFAULT NULL COMMENT '护士id',
  `create_time` timestamp NULL DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL COMMENT '日期',
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_duty
-- ----------------------------
INSERT INTO `t_duty` VALUES ('6', '84', '0000-00-00 00:00:00', '2015-08-06 00:00:00', '213', '2015-08-20 14:37:03', null, null);
INSERT INTO `t_duty` VALUES ('11', '59', '23:26:00', '23:26:00', '216', '2015-08-20 23:26:25', '2015-08-21', null);
INSERT INTO `t_duty` VALUES ('12', '59', '16:01:00', '16:01:00', '216', '2015-08-21 16:01:44', '2015-08-21', null);
INSERT INTO `t_duty` VALUES ('13', '59', '16:02:30', '16:03:00', '212', '2015-08-21 16:02:13', '2015-08-28', null);
INSERT INTO `t_duty` VALUES ('14', '59', '16:29:30', '16:30:00', '212', '2015-08-21 16:29:58', '2015-08-18', null);
INSERT INTO `t_duty` VALUES ('15', '59', '22:00', '21:30', '216', '2015-08-21 22:24:51', '2015-08-22', null);

-- ----------------------------
-- Table structure for `t_evaluation`
-- ----------------------------
DROP TABLE IF EXISTS `t_evaluation`;
CREATE TABLE `t_evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id编号',
  `customer_id` int(11) DEFAULT NULL COMMENT '客户id',
  `context` varchar(100) DEFAULT '' COMMENT '评价内容',
  `nurser_id` int(11) DEFAULT '0',
  `order_id` int(11) DEFAULT NULL,
  `level` int(5) DEFAULT '0',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_evaluation
-- ----------------------------
INSERT INTO `t_evaluation` VALUES ('2', '12', '23425', '216', '172', '0', '2015-08-22 22:34:26', '0000-00-00 00:00:00');
INSERT INTO `t_evaluation` VALUES ('3', '12', '哈尼哦吗哈尼哦吗哈尼哦吗哈尼哦吗哈尼哦吗哈尼哦吗哈尼哦吗哈尼哦吗', '216', '172', '0', '2015-08-22 22:35:14', '0000-00-00 00:00:00');
INSERT INTO `t_evaluation` VALUES ('4', '12', '新宫', '216', '172', '0', '2015-08-22 22:34:30', '0000-00-00 00:00:00');
INSERT INTO `t_evaluation` VALUES ('5', '12', 'go哦哦噢', '2015', '172', '0', '2015-08-22 22:34:32', '0000-00-00 00:00:00');
INSERT INTO `t_evaluation` VALUES ('6', '13', '佛佛', '216', '173', '0', '2015-08-22 11:03:33', '0000-00-00 00:00:00');
INSERT INTO `t_evaluation` VALUES ('7', '12', '佛佛', '2015', '173', '0', '2015-08-22 11:03:35', '0000-00-00 00:00:00');
INSERT INTO `t_evaluation` VALUES ('8', '13', '', '2015', '173', '0', '2015-08-22 11:03:37', '0000-00-00 00:00:00');
INSERT INTO `t_evaluation` VALUES ('9', '12', '懂了', '216', '173', '0', '2015-08-22 11:03:42', '0000-00-00 00:00:00');
INSERT INTO `t_evaluation` VALUES ('25', '23', '好饿悟空', '0', '187', '5', '2015-08-22 10:40:48', null);
INSERT INTO `t_evaluation` VALUES ('26', '23', '225885', '0', '187', '5', '2015-08-22 10:40:50', null);
INSERT INTO `t_evaluation` VALUES ('27', '25', '号', '0', '187', '4', '2015-08-22 10:40:54', null);
INSERT INTO `t_evaluation` VALUES ('28', '26', '按摩', '0', '187', '5', '2015-08-22 10:40:55', null);
INSERT INTO `t_evaluation` VALUES ('29', '25', '哈用', '0', '187', '5', '2015-08-22 10:40:57', null);
INSERT INTO `t_evaluation` VALUES ('30', '31', '好了么', '0', '187', '5', '2015-08-22 10:41:01', null);
INSERT INTO `t_evaluation` VALUES ('31', '27', '这次是真好了吧，头都大了', '0', '187', '4', '2015-08-22 10:41:04', null);
INSERT INTO `t_evaluation` VALUES ('32', '28', '翰墨', '0', '170', '0', '2015-08-22 10:41:07', null);
INSERT INTO `t_evaluation` VALUES ('33', '28', '翰墨', '0', '194', '0', '2015-08-22 10:42:45', null);

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
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  `brief` varchar(100) DEFAULT NULL COMMENT '简介',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_item
-- ----------------------------
INSERT INTO `t_item` VALUES ('1', '7663', '/images/weimob/20150808195249_864606.png', '产后护理2', '特殊护理，献给十月怀胎的妈妈。特殊护理，献给十月怀胎的妈妈', '100', '192', '2015-08-08 15:54:07', '2015-08-20 20:40:17', '特殊护理，献给十月怀胎的妈妈。特殊护理，献给十月怀胎的妈妈\r\n特殊护理，献给十月怀胎的妈妈。特殊护理，献给十月怀胎的妈妈');
INSERT INTO `t_item` VALUES ('25', null, '/images/weimob/20150809130017_8746img102.jpg', '产后护理', '内容：\r\n宝宝：\r\n1. 新生儿脐部、臀部、眼、耳、口等的相关日常护理\r\n2. 新生儿沐浴、抚触等的护理和技术指导\r\n3. 为新生儿提供早期智力开发训练指导，如被动操、亲子游戏、益智训练等\r\n4. 指', '120', '208', '2015-08-09 13:00:17', '2015-08-20 20:40:08', '宝宝：\r\n1. 新生儿脐部、臀部、眼、耳、口等的相关日常护理\r\n2. 新生儿沐浴、抚触等的护理和技术指导\r\n3. 为新生儿提供早期智力开发训练指导，如');
INSERT INTO `t_item` VALUES ('29', '356', null, '特殊护理', '，献给十月怀胎的妈妈。特，献给十月怀胎的妈妈。特', '133', null, '2015-08-20 20:41:13', null, '，献给十月怀胎的妈妈。特，献给十月怀胎的妈妈。特');

-- ----------------------------
-- Table structure for `t_item_relate`
-- ----------------------------
DROP TABLE IF EXISTS `t_item_relate`;
CREATE TABLE `t_item_relate` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id编号',
  `item_id` int(11) DEFAULT NULL COMMENT '项目Id',
  `nurser_id` int(11) DEFAULT NULL COMMENT '护士Id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_item_relate
-- ----------------------------
INSERT INTO `t_item_relate` VALUES ('1', '1', '1');
INSERT INTO `t_item_relate` VALUES ('2', '25', '209');
INSERT INTO `t_item_relate` VALUES ('3', '25', '211');
INSERT INTO `t_item_relate` VALUES ('11', '25', '216');
INSERT INTO `t_item_relate` VALUES ('12', '1', '216');

-- ----------------------------
-- Table structure for `t_mama`
-- ----------------------------
DROP TABLE IF EXISTS `t_mama`;
CREATE TABLE `t_mama` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `com_id` int(11) DEFAULT NULL COMMENT '公司id',
  `area_id` int(11) DEFAULT NULL COMMENT '城区id',
  `name` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `logo` varchar(200) DEFAULT NULL COMMENT '公司图片',
  `help` text COMMENT '使用帮助',
  `cluse` text COMMENT '服务条款',
  `about` text COMMENT '关于我们',
  `service_phone` text COMMENT '客服电话',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='橙妈妈项目表';

-- ----------------------------
-- Records of t_mama
-- ----------------------------
INSERT INTO `t_mama` VALUES ('1', '59', null, '橙妈妈平台', '/images/mama/20150821133011_2881.png,/images/mama/20150807230302_878906.png,/images/mama/06.png', '使用帮助使用帮助使用帮助使用帮助使用帮助使用帮助使用帮助', '服务条款服务条款服务条款服务条款服务条款服务条款服务条款服务条款服务条款服务条款服务条款', '关于我们关于我们关于我们关于我们关于我们关于我们关于我们', '15595897368', '2015-08-21 14:25:37', '2015-08-21 14:31:17');
INSERT INTO `t_mama` VALUES ('6', '59', null, '橙妈妈22', '/images/mama/20150821133919_8175.jpg,/images/mama/20150821133934_672.jpg,/images/mama/20150821133949_3608.jpg', '关于我们关于我们关于我们关于我们关于我们关于我们关于我们', '关于我们关于我们关于我们关于我们关于我们关于我们关于我们', '关于我们关于我们关于我们关于我们关于我们关于我们关于我们', '15595897368', '2015-08-21 13:39:19', '2015-08-21 13:39:49');
INSERT INTO `t_mama` VALUES ('7', '59', null, '你的好的', '/images/mama/20150821143357_2827.jpg,/images/mama/20150821143411_8850.jpg,/images/mama/20150821143431_9376.jpg,/images/mama/20150822174612_9733.jpg', '关于我们关于我们关于我们关于我们关于我们关于我们关于我们', '关于我们关于我们关于我们关于我们关于我们关于我们关于我们', '关于我们关于我们关于我们关于我们关于我们关于我们关于我们', '15595897368', '2015-08-21 14:33:57', '2015-08-22 17:46:13');

-- ----------------------------
-- Table structure for `t_nurser_user`
-- ----------------------------
DROP TABLE IF EXISTS `t_nurser_user`;
CREATE TABLE `t_nurser_user` (
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
  `status` tinyint(1) DEFAULT '0' COMMENT '状态(0:未接单  1:接单中)',
  `case_num` int(5) DEFAULT NULL COMMENT '案例数',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_nurser_user
-- ----------------------------
INSERT INTO `t_nurser_user` VALUES ('211', null, '高海文', '1', '18710120656', '/images/weimob/20150819100945_6472png', null, '25', '北京市宣武区海格国际大厦', '毕业于承德医学院 并取得护士资格证书（编号：20121106104），具有5年临床护理工作经验，擅长新生儿日常护理、新生儿疾病监测和母乳喂养指导，对于产妇的子宫复旧、恶露观测和乳房护理以及新生儿突发状况的应急处理有丰富的临床经验。', null, null, '1', null, '2015-08-19 10:09:45', '2015-08-19 10:14:30');
INSERT INTO `t_nurser_user` VALUES ('213', '7663', '梁军', '0', '13876677583', '/images/weimob/20150819140121_1921png', null, '14', '建议尺寸:宽50像素,高50像素或等比图片,且小于2M建议尺寸:宽50像素,高50像素或等比图片,且', '建议尺寸:宽50像素,高50像素或等比图片,且小于2M建议尺寸:宽50像素,高50像素或等比图片,且小于2M建议尺寸:宽50像素,高50像素或等比图片,且小于2M', null, null, '1', null, '2015-08-19 14:01:21', '2015-08-20 13:37:38');
INSERT INTO `t_nurser_user` VALUES ('216', '7663', '川军', '0', '15595897368', '/images/weimob/20150817224341_5156.png', null, '22', '三亚琼州学院1号三亚琼州学院1号三亚琼州学院1号三亚琼州学院1号三亚琼州学院1号', '三亚琼州学院1号三亚琼州学院1号三亚琼州学院1号三亚琼州学院1号三亚琼州学院1号三亚琼州学院1号', '3', null, '1', null, '2015-08-20 16:33:09', '2015-08-22 23:25:49');

-- ----------------------------
-- Table structure for `t_order`
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id编号(流水号)',
  `com_id` int(11) DEFAULT NULL COMMENT '公司Id',
  `server_name` varchar(50) DEFAULT '' COMMENT '服务名称',
  `user_name` varchar(20) DEFAULT '' COMMENT '服务名称',
  `address` varchar(100) DEFAULT NULL,
  `order_status` tinyint(1) DEFAULT '0' COMMENT '订单状态0:未接单   1：已接单   2：已付款   3：评价已完成   4：取消订单',
  `item_id` int(11) DEFAULT NULL COMMENT '服务项目Id',
  `customer_id` int(11) DEFAULT NULL COMMENT '客户id',
  `book_time` varchar(20) DEFAULT NULL COMMENT '预约时间',
  `remark` varchar(100) DEFAULT NULL COMMENT '备注',
  `order_num` varchar(50) DEFAULT NULL COMMENT '订单号',
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL COMMENT '更改时间',
  `nurser_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=205 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_order
-- ----------------------------
INSERT INTO `t_order` VALUES ('171', '7663', '产后护理(298元/次，2个小时)', '王耐', '												新的地址												', '3', '25', '13', null, '4654635																					', '2015081900583108029', '2015-08-21 23:50:02', '2015-08-19 15:07:40', '212');
INSERT INTO `t_order` VALUES ('172', '7663', '产后护理(298元/次，2个小时)', '尹柯', '点击设置您的地址', '1', '1', '22', null, '专业', '2015081902061009142', '2015-08-19 02:06:10', '2015-08-21 23:51:37', '212');
INSERT INTO `t_order` VALUES ('178', '7663', '产后护理(298元/次，2个小时)', '', '干嘛', '5', '1', '12', null, '', '2015081909262609363', '2015-08-19 09:26:26', '2015-08-19 09:26:37', null);
INSERT INTO `t_order` VALUES ('179', '7663', '产后护理(298元/次，2个小时)', '', '平乐园', '5', '1', '23', null, '高海文', '2015081910090907575', '2015-08-19 10:09:09', '2015-08-19 10:18:37', '211');
INSERT INTO `t_order` VALUES ('180', '7663', '产后护理(298元/次，2个小时)', '梁', '点击设置您的地址', '5', '1', '12', null, '', '2015081910141005055', '2015-08-19 10:14:10', '2015-08-19 10:14:17', null);
INSERT INTO `t_order` VALUES ('182', '7663', '产后护理(298元/次，2个小时)', '', '点击设置您的地址', '0', '1', '25', null, '', '2015081911210804887', '2015-08-19 11:21:08', null, null);
INSERT INTO `t_order` VALUES ('183', '7663', '产后护理(298元/次，2个小时)', '嗯嗯', '												好啊饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦vvv 好啊饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦vvv 												', '0', null, '20', null, '												饿咯哦好啊饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦vvv 好啊饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦饿咯哦vvv 												', '2015081911321002423', '2015-08-20 10:15:12', null, null);
INSERT INTO `t_order` VALUES ('184', '7663', '产后护理(298元/次，2个小时)', '豹子11', '																								点击设置您的地址点击设置您的地址点击设置您的地址点击设置您的地址点击设置您的地址																								', '4', '25', '26', null, '																								嗯嗯行点击设置您的地址点击设置您的地址点击设置您的地址点击设置您的地址点击设置您的地址																								', '201508191243270500', '2015-08-20 19:03:03', '2015-08-19 17:46:06', null);
INSERT INTO `t_order` VALUES ('185', '7663', '产后护理(298元/次，2个小时)', '你', '点击设置您的地址', '0', '1', '27', null, '嗯嗯嗯', '2015081915122602782', '2015-08-19 15:12:26', null, null);
INSERT INTO `t_order` VALUES ('186', '7663', '产后护理(298元/次，2个小时)', '订单1', '地址1', '1', '1', '26', null, '订单1111', '2015081915383908020', '2015-08-19 15:38:39', '2015-08-19 16:31:46', '212');
INSERT INTO `t_order` VALUES ('187', '7663', '产后护理(298元/次，2个小时)', '豹子222', '地址23', '3', '1', '26', null, '豹子222', '2015081915420106141', '2015-08-19 15:42:01', '2015-08-20 12:16:17', '212');
INSERT INTO `t_order` VALUES ('188', '7663', '产后护理(298元/次，2个小时)', '到底', '地址21', '3', '1', '26', null, '都没', '2015081916291107332', '2015-08-19 16:29:11', null, '212');
INSERT INTO `t_order` VALUES ('189', '7663', '产后护理(298元/次，2个小时)', '豹子', '地址21', '4', '1', '26', null, '东安街', '2015081917354903886', '2015-08-19 17:35:49', '2015-08-19 17:46:08', '212');
INSERT INTO `t_order` VALUES ('190', '7663', '产后护理(298元/次，2个小时)', '豹子3333333', '地址2', '0', '1', '26', null, '豹子33333', '2015081917391706715', '2015-08-19 17:39:17', null, '212');
INSERT INTO `t_order` VALUES ('191', '7663', '产后护理(298元/次，2个小时)', '仓库111', '地址276', '4', '1', '26', null, '豹子不困啦咯了', '2015081917590309921', '2015-08-19 17:59:03', '2015-08-19 19:07:47', '212');
INSERT INTO `t_order` VALUES ('193', '7663', '产后护理(298元/次，2个小时)', '豹子111', '地址20', '4', '1', '26', null, '好了么', '2015081918004402363', '2015-08-19 18:00:44', '2015-08-19 19:07:36', '212');
INSERT INTO `t_order` VALUES ('194', '7663', '产后护理(298元/次，2个小时)', '梁军', '干嘛正go哦哦你', '3', '1', '12', null, '', '2015081918181706201', '2015-08-19 18:18:17', '2015-08-20 16:27:04', '212');
INSERT INTO `t_order` VALUES ('197', '7663', '产后护理(298元/次，2个小时)', '两哦哦', '干嘛正go哦哦你', '0', '1', '12', null, '', '2015081919180803109', '2015-08-19 19:18:08', null, '212');
INSERT INTO `t_order` VALUES ('200', '7663', '产后护理(298元/次，2个小时)', '短信通知护士', '地址2', '4', '1', '26', null, '好了么短信', '2015082015363409930', '2015-08-20 15:36:34', '2015-08-20 16:50:45', '212');
INSERT INTO `t_order` VALUES ('201', '7663', '产后护理(298元/次，2个小时)', '好了么', '地址2', '4', '1', '26', null, '都没', '2015082016431102688', '2015-08-20 16:43:11', '2015-08-20 16:50:52', '216');
INSERT INTO `t_order` VALUES ('202', '7663', '产后护理(298元/次，2个小时)', '干嘛', 'go哦哦', '0', '1', '12', null, '翰墨', '201508201858580830', '2015-08-20 18:58:58', null, null);
INSERT INTO `t_order` VALUES ('203', '7663', '产后护理(298元/次，2个小时)', '来啦模拟', 'go哦哦', '4', '1', '12', null, '还弄', '2015082019004305217', '2015-08-20 19:00:43', '2015-08-20 19:01:03', '212');
INSERT INTO `t_order` VALUES ('204', '7663', '产后护理(298元/次，2个小时)', '李星', '海口', '0', '1', '21', null, '', '2015082110411003193', '2015-08-21 10:41:10', null, null);

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
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_sms_code
-- ----------------------------
INSERT INTO `t_sms_code` VALUES ('10', '0', '0', '13876677583', '36529', '1', '2015-08-18 02:49:11', '2015-08-18 00:49:11', '2015-08-18 00:50:22');
INSERT INTO `t_sms_code` VALUES ('11', '0', '0', '13876677583', '97787', '1', '2015-08-18 03:05:38', '2015-08-18 01:05:38', '2015-08-18 01:06:35');
INSERT INTO `t_sms_code` VALUES ('12', '0', '0', '13876677583', '30758', '1', '2015-08-18 03:09:05', '2015-08-18 01:09:05', '2015-08-18 01:09:45');
INSERT INTO `t_sms_code` VALUES ('13', '0', '0', '13876677583', '62037', '1', '2015-08-18 03:44:24', '2015-08-18 01:44:24', '2015-08-18 09:07:40');
INSERT INTO `t_sms_code` VALUES ('14', '0', '0', '13034905918', '82590', '1', '2015-08-18 03:47:52', '2015-08-18 01:47:52', '2015-08-18 01:54:34');
INSERT INTO `t_sms_code` VALUES ('15', '0', '0', '13034905918', '59204', '1', '2015-08-18 09:01:02', '2015-08-18 07:01:02', '2015-08-18 07:02:22');
INSERT INTO `t_sms_code` VALUES ('16', '0', '0', '13034905918', '63170', '1', '2015-08-18 09:02:59', '2015-08-18 07:02:59', '2015-08-18 07:03:14');
INSERT INTO `t_sms_code` VALUES ('18', '0', '0', '13034905918', '71580', '1', '2015-08-18 11:27:00', '2015-08-18 09:27:00', '2015-08-18 09:27:50');
INSERT INTO `t_sms_code` VALUES ('19', '0', '0', '13876677583', '38776', '1', '2015-08-18 13:36:28', '2015-08-18 11:36:28', '2015-08-18 12:18:44');
INSERT INTO `t_sms_code` VALUES ('20', '0', '0', '13034905918', '95401', '1', '2015-08-18 14:14:27', '2015-08-18 12:14:27', '2015-08-18 12:21:48');
INSERT INTO `t_sms_code` VALUES ('21', '0', '0', '13876677583', '69249', '1', '2015-08-18 14:59:16', '2015-08-18 12:59:16', '2015-08-18 13:22:47');
INSERT INTO `t_sms_code` VALUES ('22', '0', '0', '13034905918', '39851', '1', '2015-08-18 15:35:47', '2015-08-18 13:35:47', '2015-08-18 13:38:48');
INSERT INTO `t_sms_code` VALUES ('23', '0', '0', '13034905918', '26131', '1', '2015-08-18 15:39:08', '2015-08-18 13:39:08', '2015-08-18 13:39:23');
INSERT INTO `t_sms_code` VALUES ('24', '0', '0', '18117627350', '39922', '1', '2015-08-18 16:32:59', '2015-08-18 14:32:59', '2015-08-18 14:33:20');
INSERT INTO `t_sms_code` VALUES ('25', '0', '0', '13876677583', '55060', '1', '2015-08-18 16:36:48', '2015-08-18 14:36:48', '2015-08-18 14:37:22');
INSERT INTO `t_sms_code` VALUES ('26', '0', '0', '13876677583', '65985', '1', '2015-08-18 16:39:56', '2015-08-18 14:39:56', '2015-08-18 14:40:17');
INSERT INTO `t_sms_code` VALUES ('27', '0', '0', '13876677583', '62610', '1', '2015-08-18 16:41:40', '2015-08-18 14:41:40', '2015-08-18 14:47:13');
INSERT INTO `t_sms_code` VALUES ('28', '0', '0', '18117627350', '46977', '1', '2015-08-18 16:46:19', '2015-08-18 14:46:19', '2015-08-18 14:46:37');
INSERT INTO `t_sms_code` VALUES ('29', '0', '0', '13876677583', '30866', '1', '2015-08-18 16:53:53', '2015-08-18 14:53:53', '2015-08-18 14:56:46');
INSERT INTO `t_sms_code` VALUES ('30', '0', '0', '18117627350', '75570', '1', '2015-08-18 17:06:44', '2015-08-18 15:06:44', '2015-08-18 16:52:29');
INSERT INTO `t_sms_code` VALUES ('31', '0', '0', '13034905918', '83095', '1', '2015-08-18 17:28:41', '2015-08-18 15:28:41', '2015-08-18 15:28:58');
INSERT INTO `t_sms_code` VALUES ('32', '0', '0', '18117327350', '88482', '0', '2015-08-18 18:49:56', '2015-08-18 16:49:56', '0000-00-00 00:00:00');
INSERT INTO `t_sms_code` VALUES ('33', '0', '0', '15595897368', '55555', '1', '2015-08-18 19:23:53', '2015-08-21 22:00:39', '2015-08-21 22:00:47');
INSERT INTO `t_sms_code` VALUES ('34', '0', '0', '18600820633', '95521', '1', '2015-08-19 04:04:25', '2015-08-19 02:04:25', '2015-08-19 02:04:44');
INSERT INTO `t_sms_code` VALUES ('35', '0', '0', '13701326934', '94044', '1', '2015-08-19 05:01:49', '2015-08-19 03:01:49', '2015-08-19 10:45:04');
INSERT INTO `t_sms_code` VALUES ('36', '0', '0', '18201014929', '78596', '1', '2015-08-19 12:03:11', '2015-08-19 10:03:11', '2015-08-19 10:03:49');
INSERT INTO `t_sms_code` VALUES ('37', '0', '0', '18710120656', '46586', '1', '2015-08-19 12:14:58', '2015-08-19 10:14:58', '2015-08-19 10:15:13');
INSERT INTO `t_sms_code` VALUES ('38', '0', '0', '13138917196', '57977', '1', '2015-08-19 14:42:11', '2015-08-19 12:42:11', '2015-08-19 12:42:27');
INSERT INTO `t_sms_code` VALUES ('39', '0', '0', '18117627350', '33182', '1', '2015-08-19 16:06:47', '2015-08-19 14:06:47', '2015-08-19 14:07:24');
INSERT INTO `t_sms_code` VALUES ('40', '0', '0', '13208919469', '68970', '1', '2015-08-19 16:26:24', '2015-08-19 14:26:24', '2015-08-19 14:26:35');
INSERT INTO `t_sms_code` VALUES ('41', '0', '0', '18600820633', '10994', '1', '2015-08-19 18:04:28', '2015-08-19 16:04:28', '2015-08-19 16:04:42');
INSERT INTO `t_sms_code` VALUES ('42', '0', '0', '18117627350', '26682', '0', '2015-08-20 17:36:34', '2015-08-20 15:36:34', null);
INSERT INTO `t_sms_code` VALUES ('43', '0', '0', '15595897368', '28949', '0', '2015-08-20 18:43:11', '2015-08-20 16:43:11', null);

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
  `create_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL,
  `pay_cash` tinyint(1) NOT NULL DEFAULT '0' COMMENT '货到付款',
  `pay_wechat` tinyint(1) NOT NULL DEFAULT '0' COMMENT '微信支付',
  `pay_balance` tinyint(1) NOT NULL DEFAULT '0' COMMENT '余额支付',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of t_wechat_pay_setting
-- ----------------------------
INSERT INTO `t_wechat_pay_setting` VALUES ('2', '7663', 'wx8e3211220f6dda4d', 'Ke210283198606247217198604023322', 'fa4e060909b2d657f67e830773b16910', '1243107502', '1', '2015-08-14 10:09:47', '2015-08-14 10:09:47', '1', '1', '1');
