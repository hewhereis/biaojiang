/*
Navicat MySQL Data Transfer

Source Server         : 252
Source Server Version : 50518
Source Host           : 118.31.88.20:3306
Source Database       : bj252

Target Server Type    : MYSQL
Target Server Version : 50518
File Encoding         : 65001

Date: 2017-12-11 14:44:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bj_ad
-- ----------------------------
DROP TABLE IF EXISTS `bj_ad`;
CREATE TABLE `bj_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) DEFAULT NULL,
  `ad_position_id` varchar(10) DEFAULT NULL COMMENT '广告位',
  `link_url` varchar(128) DEFAULT NULL,
  `images` varchar(128) DEFAULT NULL,
  `start_date` date DEFAULT NULL COMMENT '开始时间',
  `end_date` date DEFAULT NULL COMMENT '结束时间',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态',
  `closed` tinyint(1) DEFAULT '0',
  `orderby` tinyint(3) DEFAULT '100',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_ad
-- ----------------------------
INSERT INTO `bj_ad` VALUES ('1', 'biaojiang1', '1', '', 'fa4a1201711071526327250.jpg', '2017-07-20', '2017-10-28', '1', '0', '100');
INSERT INTO `bj_ad` VALUES ('2', 'biaojiang2', '1', '', 'ec975201711071527363684.png', '2017-07-20', '2017-07-29', '1', '0', '99');
INSERT INTO `bj_ad` VALUES ('3', 'biaojiang3', '1', '', '983b7201711071528015689.png', '2017-07-20', '2017-10-28', '1', '0', '98');
INSERT INTO `bj_ad` VALUES ('4', 'biaojiang4', '1', '', '3d1eb201711071528092477.png', '2017-07-20', '2017-10-31', '1', '0', '97');

-- ----------------------------
-- Table structure for bj_addition
-- ----------------------------
DROP TABLE IF EXISTS `bj_addition`;
CREATE TABLE `bj_addition` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_number` bigint(20) DEFAULT NULL COMMENT '订单号',
  `reason` text COMMENT '追加项目的理由',
  `total` float(10,2) DEFAULT NULL COMMENT '追加项目价钱',
  `create_time` int(10) DEFAULT NULL COMMENT '追加项目时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='追加项目表';

-- ----------------------------
-- Records of bj_addition
-- ----------------------------
INSERT INTO `bj_addition` VALUES ('10', '2147483647', '00', '0.11', '1509961269');
INSERT INTO `bj_addition` VALUES ('11', '2147483647', '000', '0.11', '1509961375');
INSERT INTO `bj_addition` VALUES ('12', '2147483647', '11', '0.01', '1509964035');
INSERT INTO `bj_addition` VALUES ('13', '2147483647', '1212', '2.12', '1509964379');
INSERT INTO `bj_addition` VALUES ('14', '2147483647', '1212', '1.06', '1509964477');
INSERT INTO `bj_addition` VALUES ('15', '2147483647', '1212', '1.06', '1509964485');
INSERT INTO `bj_addition` VALUES ('16', '2147483647', '11', '11.66', '1509964537');
INSERT INTO `bj_addition` VALUES ('17', '2147483647', '11', '11.66', '1509964562');
INSERT INTO `bj_addition` VALUES ('18', '2017110617361376866', '11', '0.01', '1509964706');
INSERT INTO `bj_addition` VALUES ('19', '2017110618090144385', '11', '0.01', '1509964759');
INSERT INTO `bj_addition` VALUES ('20', '2017110616475663860', '111', '0.01', '1509964819');
INSERT INTO `bj_addition` VALUES ('21', '2017110618361265803', '1221', '0.01', '1509965097');
INSERT INTO `bj_addition` VALUES ('22', '2017110709290237075', '123asd ', '0.01', '1510019141');
INSERT INTO `bj_addition` VALUES ('23', '2017110709490291617', 'asdf asf ', '0.01', '1510019539');
INSERT INTO `bj_addition` VALUES ('24', '201711071021194298', 'asd ', '0.01', '1510021520');
INSERT INTO `bj_addition` VALUES ('25', '2017110713305285956', '10', '10.60', '1510032762');

-- ----------------------------
-- Table structure for bj_admin
-- ----------------------------
DROP TABLE IF EXISTS `bj_admin`;
CREATE TABLE `bj_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin DEFAULT '' COMMENT '用户名',
  `password` varchar(32) COLLATE utf8_bin DEFAULT '' COMMENT '密码',
  `portrait` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT '头像',
  `loginnum` int(11) DEFAULT '0' COMMENT '登陆次数',
  `last_login_ip` varchar(255) COLLATE utf8_bin DEFAULT '' COMMENT '最后登录IP',
  `last_login_time` int(11) DEFAULT '0' COMMENT '最后登录时间',
  `real_name` varchar(20) COLLATE utf8_bin DEFAULT '' COMMENT '真实姓名',
  `status` int(1) DEFAULT '0' COMMENT '状态',
  `groupid` int(11) DEFAULT '1' COMMENT '用户角色id',
  `token` varchar(32) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of bj_admin
-- ----------------------------
INSERT INTO `bj_admin` VALUES ('1', 'admin', '4c6566b1403b012ab9ac390771ab77d9', 'admin\\admin.jpg', '812', '192.168.0.190', '1512963701', 'admin', '1', '1', 'a87ff679a2f3e71d9181a67b7542122c');
INSERT INTO `bj_admin` VALUES ('2', '22', '4c6566b1403b012ab9ac390771ab77d9', '', '0', '', '0', '312312', '1', '2', null);

-- ----------------------------
-- Table structure for bj_ad_position
-- ----------------------------
DROP TABLE IF EXISTS `bj_ad_position`;
CREATE TABLE `bj_ad_position` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL COMMENT '分类名称',
  `orderby` varchar(10) DEFAULT '100' COMMENT '排序',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_ad_position
-- ----------------------------
INSERT INTO `bj_ad_position` VALUES ('1', '前台首页轮播', '1', '1477140627', '1503363075', '1');

-- ----------------------------
-- Table structure for bj_amse
-- ----------------------------
DROP TABLE IF EXISTS `bj_amse`;
CREATE TABLE `bj_amse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text,
  `type` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_amse
-- ----------------------------
INSERT INTO `bj_amse` VALUES ('10', '<p style=\";text-align:center;background:rgb(255,255,255)\"><strong><span style=\"font-family: 仿宋;color: rgb(254, 143, 0);font-size: 19px\"><span style=\"font-family:仿宋\">标匠平台用户服务协议</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">【提示条款】</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">欢迎您与标匠平台经营者共同签署本《标匠平台用户服务协议》（下称</span>“本协议”）并使用标匠平台服务！</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">自协议发布之日起生效，标匠平台各处所称</span>“标匠平台用户服务协议”均指本协议。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">为维护您自身权益，建议您仔细阅读各条款具体表述。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">【审慎阅读】</span></span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您在申请注册流程中点击同意本协议之前，应当认真阅读本协议。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">请您务必审慎阅读、充分理解各条款内容，特别是免除或者限制责任的条款、法律适用和争议解决条款。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">免除或者限制责任的条款将以粗体下划线标识，您应重点阅读。如您对协议有任何疑问，可向标匠平台客服咨询。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">【签约动作】</span></span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">当您按照注册页面提示填写信息、阅读并同意本协议且完成全部注册程序后，即表示您已充分阅读、理解并接受本协议的全部内容，并与标匠平台达成一致，成为标匠平台</span>“用户”。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">阅读本协议的过程中，如果您不同意本协议或其中任何条款约定，您应立即停止注册程序。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">一、</span> <span style=\"font-family:仿宋\">定义</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">1.1标匠平台：</span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">指标匠网（</span>www.bj-wang.com）的网站及客户端。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">1.2标匠平台服务：</span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台基于互联网，以包含标匠平台网站、客户端等在内的各种形态（包括未来技术发展出现的新的服务形态）向您提供的各项服务。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">1.3标匠平台规则：</span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">包括在所有标匠平台内已经发布及后续发布的全部规则、解读、公告等内容，以及各平台在论坛、帮助中心等发布的各类规则、实施细则、产品流程说明、公告等。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">1.4服务商：</span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">是指在标匠平台上注册并经过认证的，通过标匠平台为用户提供线下装饰等服务的企业服务商（包括但不限于公司、个体工商户或其他组织）和自然人个体师傅。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">1.5用户：</span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">是指在标匠平台上进行发布服务订单的需求者，简称用户。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">二、</span> <span style=\"font-family:仿宋\">协议范围</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">2.1 签约主体</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">本协议由您与标匠平台经营者共同缔结，本协议对您与标匠平台经营者均具有合同效力。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">本协议项下，标匠平台经营者可能根据标匠平台的业务调整而发生变更，变更后的标匠平台经营者与您共同履行本协议并向您提供服务，</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台经营者的变更不会影响您本协议项下的权益。标匠平台经营者还有可能因为提供新的标匠平台服务而新增，如您使用新增的标匠平台服务的，视为您同意新增的标匠平台经营者与您共同履行本协议。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">2.2补充协议</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">由于互联网高速发展，您与标匠平台签署的本协议列明的条款并不能完整罗列并覆盖您与标匠平台所有权利与义务，现有的约定也不能保证完全符合未来发展的需求。因此，标匠平台《法律声明及隐私权政策》</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">为本协议的补充协议，与本协议不可分割且具有同等法律效力。如您使用标匠平台服务，视为您同意上述补充协议。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">三、</span> <span style=\"font-family:仿宋\">账户注册与使用</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.1 用户资格</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您确认，在您开始注册程序使用标匠平台服务前，您应当具备中华人民共和国法律规定的与您行为相适应的民事行为能力。</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">若您不具备前述与您行为相适应的民事行为能力，则您及您的监护人应依照法律规定承担因此而导致的一切后果。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.2 账户说明</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.2.1账户获得</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">当您按照注册页面提示填写信息、阅读并同意本协议且完成全部注册程序后，您可获得标匠平台账户并成为标匠平台用户。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台只允许每位用户使用一个标匠平台账户。如有证据证明或标匠平台有理由相信您存在不当注册或不当使用多个标匠平台账户的情形，标匠平台可采取冻结或关闭账户、取消订单、拒绝提供服务等措施，如给标匠平台及相关方造成损失的，您还应承担赔偿责任。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.2.2账户使用</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您有权使用您设置或确认的标匠平台用户名、邮箱、手机号码（以下简称</span>“账户名称”）及您设置的密码（账户名称及密码合称“账户”）登录标匠平台。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">由于您的标匠平台账户关联您的个人信息及标匠平台商业信息，您的标匠平台账户仅限您本人使用。未经标匠平台同意，您直接或间接授权第三方使用您标匠平台账户或获取您账户项下信息的行为无效，责任将由您自行承担。如标匠平台判断您标匠平台账户的使用可能危及您的账户安全及</span>/或标匠平台信息安全的，标匠平台可拒绝提供相应服务或终止本协议。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.2.3账户转让</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">由于用户账户关联用户信用信息，仅当有法律明文规定、司法裁定或经标匠平台同意，并符合标匠平台规则规定的用户账户转让流程的情况下，您可进行账户的转让。您的账户一经转让，该账户项下权利义务一并转移。</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">除此外，您的账户不得以任何方式转让，否则标匠平台有权追究您的违约责任，且由此产生的一切责任均由您承担。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.2.4实名认证</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">作为标匠平台经营者，为使您更好地使用标匠平台的各项服务，保障您的账户安全，标匠可要求您按标匠公司要求及我国法律规定完成实名认证。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.3 注册信息管理</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.3.1 真实合法</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">【信息真实】</span></span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">在使用标匠平台服务时，您应当按标匠平台页面的提示准确完整地提供您的信息（包括您的姓名、身份证号码及电子邮件地址、联系电话、联系地址等），以便标匠平台或其他用户与您联系。</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">您了解并同意，您有义务保持您提供信息的真实性及有效性。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">您设置的标匠平台用户名不得违反国家法律法规及标匠平台规则关于用户名的管理规定，否则标匠平台可回收您的标匠平台用户名。</span></span></span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台用户名的回收不影响您以邮箱、手机号码登录标匠平台并使用标匠平台服务。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.3.2 更新维护</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您应当及时更新您提供的信息，在法律有明确规定要求标匠平台作为平台服务提供者必须对部分用户的信息进行核实的情况下，标匠平台将依法不时地对您的信息进行检查核实，您应当配合提供最新、真实、完整、有效的信息。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">如标匠平台按您最后一次提供的信息与您联系未果、您未按标匠平台的要求及时提供信息、您提供的信息存在明显不实或行政司法机关核实您提供的信息无效的，您将承担因此对您自身、他人及标匠平台造成的全部损失与不利后果。标匠平台可向您发出询问或要求整改的通知，并有权直接做出删除相应资料的处理，直至中止、终止对您提供部分或全部标匠平台服务，标匠平台对此不承担责任。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.4 账户安全规范</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.4.1账户安全保管义务</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您的账户为您自行设置并由您保管，标匠平台任何时候均不会主动要求您提供您的账户密码。因此，建议您务必保管好您的账户，</span> <span style=\"font-family:仿宋\">并确保您在每个上网时段结束时退出登录并以正确步骤离开标匠平台。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">账户因您主动泄露或因您遭受他人攻击、诈骗等行为导致的损失及后果，标匠平台并不承担责任，您应通过司法、行政等救济途径向侵权行为人追偿。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.4.2账户行为责任自负</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">除标匠平台存在过错外，</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">您应对您账户项下的所有行为结果（包括但不限于在线签署各类协议、发布信息、兑换商品及服务及披露信息等）负责。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.4.3日常维护须知</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">如发现任何未经授权使用您账户登录标匠平台或其他可能导致您账户遭窃、遗失的情况，建议您立即通知标匠平台。</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">您理解标匠平台对您的任何请求采取行动均需要合理时间，且标匠平台应您请求而采取的行动可能无法避免或阻止侵害后果的形成或扩大，除标匠平台存在法定过错外，标匠平台不承担责任。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">四、</span> <span style=\"font-family:仿宋\">标匠平台服务及规范</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您有权在标匠平台上享受招标雇佣、资金交易等服务。标匠平台提供的服务内容众多，具体您可登录标匠平台浏览。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台保留在任何时候自行决定对标匠平台服务及其相关功能、应用软件变更、升级的权利。标匠平台进一步保留在平台服务中开发新的模块、功能和软件或其它语种服务的权利。</span> <span style=\"font-family:仿宋\">上述所有新的模块、功能、软件服务的提供，除非标匠平台另有说明，否则仍适用本协议。</span> <span style=\"font-family:仿宋\">服务随时可能因标匠平台的单方判断而被增加或修改，或因定期、不定期的维护而暂缓提供，</span> <span style=\"font-family:仿宋\">您将会得到相应的变更通知。您在此同意标匠平台在任何情况下都无需向其或第三方在使用服务时对其在传输或联络中的迟延、不准确、错误或疏漏及因此而致使的损害负责。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.1 招标雇佣</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.1.1招标信息发布</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">通过标匠平台提供的服务，您有权通过文字、图片等形式在标匠平台上发布家居服务需求、招标和选择雇佣对象、达成交易。标匠平台不对您所发布信息的删除或储存失败负责。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.1.2雇佣服务商</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您有权依据自己的独立判断选择雇佣对象，标匠平台仅通过提供在线信息平台的方式，</span> <span style=\"font-family:仿宋\">向您提供信息服务，本协议的签署并不意味着标匠平台成为您在标匠平台上与服务商所进行的服务或交易的参与者；</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台本身不对服务商的上传内容</span> <span style=\"font-family:仿宋\">（包括其发布的供服务商参考报价的订单内容及其他全部由其上传的内容）负责，亦不对服务商在标匠平台上发布的信息及其提供的线下服务作任何明示或默示的担保。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台不担保标匠平台中服务商提供的家居服务一定能满足您及线下客户的要求，您明确同意其使用本网站服务及通过本网站雇佣的服务所存在的风险将完全由其自己承担；因您使用本网站服务商所提供服务而产生的一切后果也由您自己承担，标匠平台不对消费者承担任何责任。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">建议您应在选择服务商时应根据自身所需服务的专业技术要求及风险程度进行选择，如您选择个人服务商为您提供服务的，请务必谨慎考虑个人提供服务过程中的责任风险（包括但不限于可能的人身损害责任）。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.1.3交易秩序保障</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您应当遵守诚实信用原则，确保您所发布的家居服务需求真实并在交易过程中切实履行您的交易承诺。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您应当维护标匠平台市场良性竞争秩序，不得贬低、诋毁竞争对手以及服务商，不得干扰标匠平台上进行的任何交易、活动，不得以任何不正当方式提升或试图提升自身的信用度，不得以任何方式干扰或试图干扰标匠平台的正常运作。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.2资金交易</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.2.1钱包账户</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您需了解并同意，如您系在标匠平台完成注册，只要您注册成功，您即自动开通标匠钱包账户，同意使用标匠钱包账户结算与标匠平台发生联系的款项，您可以对钱包账户进行充值，使用钱包余额支付雇佣等款项，订单的退款以及先行赔付的赔付金会依据标匠平台规则进入钱包账户。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您有权根据需要更改钱包账户密码。因您的过错导致的任何钱包资金损失由您自行承担，该过错包括但不限于：不按照交易提示操作，未及时进行交易操作，遗忘或泄漏密码，密码被他人破解，用户使用的计算机被他人侵入。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.2.2担保交易</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台不担保服务商提供的服务一定能满足您以及您客户的需求，只对您在支付雇佣款之后的资金进行担保交易。您有权依据标匠平台规定在服务商提交服务完成后再进行确认付款，服务商的服务完成后若您未主动确认付款，订单将在</span>7天（返货订单15天）之后自动确认付款。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.3 交易争议及处理</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.3.1交易争议及责任主体</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您在标匠平台交易过程中与服务商发生争议的，您及您选择的服务商为争议的责任主体双方，产生的争议由您双方解决。标匠平台经营者非协议及责任主体。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.3.2交易争议处理途径</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您在标匠平台交易过程中与服务商发生争议的，您有权选择以下途径解决：</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（一）与争议相对方自主协商；</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（二）使用标匠平台提供的争议调处服务；</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（三）请求消费者协会或者其他依法成立的调解组织调解；</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（四）向有关行政部门投诉；</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（五）根据与争议相对方达成的仲裁协议（如有）提请仲裁机构仲裁或提交法院诉讼处理。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.3.3平台调处服务</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">如您依据标匠平台规则（包括但不限于交易退款、费用增加等）使用标匠平台的争议调处服务，则表示您认可并愿意履行标匠平台的维权专员或大众评审员（</span>“调处方”）作为独立的第三方根据其所了解到的争议事实并依据标匠平台规则所作出的调处决定（包括调整相关订单的交易状态、判定将争议款项的全部或部分支付给交易一方或双方，部分符合先行赔付规则的交易订单，标匠平台可依据单方面的判断提供相应赔偿服务等）。在标匠平台调处决定作出前，您可选择上述（三）、（四）、（五）途径（下称“其他争议处理途径”）解决争议以中止标匠平台的争议调处服务。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">如您对调处决定不满意，您仍有权采取其他争议处理途径解决争议，但通过其他争议处理途径未取得终局决定前，您仍应先履行调处决定。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.4费用</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台向您提供的服务付出了大量的成本，除标匠平台明示的收费业务外，标匠平台向您提供的服务目前是免费的。如未来标匠平台向您收取合理费用，标匠平台会采取合理途径并以足够合理的期限提前通过法定程序并以本协议第八条约定的方式通知您，确保您有充分选择的权利。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.5责任限制</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.5.1不可抗力及第三方因素</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台依照法律规定履行基础保障义务，</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">但对于下述原因导致的合同履行障碍、履行瑕疵、履行延后或履行内容变更等情形，标匠平台并不承担相应的违约责任：</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（一）因自然灾害、罢工、暴乱、战争、政府行为、司法行政命令等不可抗力因素；</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（二）因电力供应故障、通讯网络故障等公共服务因素或第三人因素；</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（三）在标匠平台已尽善意管理的情况下，因常规或紧急的设备与系统维护、设备与系统故障、网络信息与数据安全等因素。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.5.2海量信息</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台仅向您提供标匠平台服务，您了解标匠平台上的信息系服务商自行发布，且可能存在风险和瑕疵。</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台不对服务所涉及的技术的质量、</span> <span style=\"font-family:仿宋\">稳定、完整及对服务商信息的有效性、准确性、合法性、真实性、及时性做出任何承诺和保证，并且不承担任何由此引起的法律责任。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">在任何情况下，用户应充分了解交易风险后，依据自身风险承受能力和经验，衡量平台披露的交易内容及交易对方信息的准确性、真实性以及合法性，标匠平台对用户因其选择标匠平台的服务而导致的任何直接、间接损失（</span> <span style=\"font-family:仿宋\">包括但不限于交易损失、资金损失、利润损失、营业中断损失等）均不承担法律责任，均由用户自行承担。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.5.3调处决定</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您理解并同意，在争议调处服务中，标匠平台的维权专员、大众评审员并非专业人士，仅能以普通人的认知对用户提交的凭证进行判断。因此，</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">除存在故意或重大过失外，调处方对争议调处决定免责。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">五、</span> <span style=\"font-family:仿宋\">用户信息的保护及授权</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">5.1个人信息的保护</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台非常重视用户个人信息（即能够独立或与其他信息结合后识别用户身份的信息）的保护，在您使用标匠平台提供的服务时，您同意标匠平台按照在标匠平台上公布的隐私权政策收集、存储、使用、披露和保护您的个人信息。标匠平台希望通过隐私权政策向您清楚地介绍标匠平台对您个人信息的处理方式，因此标匠平台建议您完整地阅读隐私权政策（见《法律声明》），以帮助您更好地保护您的隐私权。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">5.2非个人信息的保证与授权</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">5.2.1信息的发布</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您声明并保证，您对您所发布的信息拥有相应、合法的权利。否则，</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台可对您发布的信息依法或依本协议进行删除或屏蔽。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">5.2.2禁止性信息</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">您应当确保您所发布的信息不包含以下内容：</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（一）违反国家法律法规禁止性规定的；</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（二）政治宣传、封建迷信、淫秽、色情、赌博、暴力、恐怖或者教唆犯罪的；</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（三）欺诈、虚假、不准确或存在误导性的；</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（四）侵犯他人知识产权或涉及第三方商业秘密及其他专有权利的；</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（五）侮辱、诽谤、恐吓、涉及他人隐私等侵害他人合法权益的；</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（六）存在可能破坏、篡改、删除、影响标匠平台任何系统正常运行或未经授权秘密获取标匠平台及其他用户的数据、个人资料的病毒、木马、爬虫等恶意软件、程序代码的；</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（七）其他违背社会公共利益或公共道德或依据相关标匠平台协议、规则的规定不适合在标匠平台上发布的。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">5.2.3授权使用</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">对于您提供及发布除个人信息外的文字、图片等非个人信息，</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">在版权保护期内您免费授予标匠平台获得全球排他的许可使用权利及再授权给其他第三方使用的权利。您同意标匠平台存储、使用、复制、修订、编辑、发布、展示、翻译、分发您的非个人信息或制作其派生作品，并以已知或日后开发的形式、媒体或技术将上述信息纳入其它作品内。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">为方便您使用标匠平台其他相关服务，</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">您授权标匠平台将您在账户注册和使用标匠平台服务过程中提供、形成的信息传递给标匠平台其他相关服务提供者，例如，标匠平台可能将该信息发送至信用卡服务商以完成付款程序。或从标匠平台其他相关服务提供者获取您在注册、使用相关服务期间提供、形成的信息。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">六、</span> <span style=\"font-family:仿宋\">用户的违约及处理</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">6.1 违约认定</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">发生如下情形之一的，视为您违约：</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（一）使用标匠平台服务时违反有关法律法规规定的；</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（二）违反本协议或本协议补充协议（即本协议第</span>2.2条）约定的。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">为适应平台发展和满足海量用户对高效优质服务的需求，您理解并同意，</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台可在标匠平台规则中约定违约认定的程序和标准。如：标匠平台可依据服务商提供的证据来认定您是否构成违约；您有义务对您的指控进行充分举证和合理解释，否则将被认定为违约。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">6.2 违约处理措施</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">6.2.1信息处理</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您在标匠平台上发布的信息构成违约的，</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台可根据相应规则立即对相应信息进行删除、屏蔽处理等。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">6.2.2行为限制</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您在标匠平台上实施的行为，或虽未在标匠平台上实施但对标匠平台及其用户产生影响的行为构成违约的，标匠平台</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">可依据相应规则对您执行限制参加商业活动、中止向您提供部分或全部服务、冻结或删除账户等处理措施。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">6.2.3处理结果公示</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台可将对您上述违约行为处理措施信息以及其他经国家行政或司法机关生效法律文书确认的违法信息在标匠平台上予以公示。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">6.3赔偿责任</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">如您的行为使标匠平台遭受损失（包括自身的直接经济损失、商誉损失及对外支付的赔偿金、和解款、律师费、诉讼费等间接经济损失），您应赔偿标匠平台的上述全部损失。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">如您的行为使标匠平台遭受第三人主张权利，标匠平台可在对第三人承担金钱给付等义务后就全部损失向您追偿。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">6.4特别约定</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">6.4.1商业贿赂</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">如您向标匠平台的雇员或顾问等提供实物、现金、现金等价物、劳务、旅游等价值明显超出正常商务洽谈范畴的利益，则可视为您存在商业贿赂行为。</span></span><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">发生上述情形的，标匠平台可立即终止与您的所有合作并向您收取违约金及</span>/或赔偿金，</span></span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">该等金额以标匠平台因您的贿赂行为而遭受的经济损失和商誉损失作为计算依据。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">6.4.2关联处理</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">如您因严重违约导致标匠平台终止本协议时，出于维护平台秩序及保护消费者权益的目的，标匠平台可对与您在其他协议项下的合作采取中止甚或终止协议的措施，并以本协议第八条约定的方式通知您。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">如标匠平台与您签署的其他协议及标匠平台与您签署的协议中明确约定了对您在本协议项下合作进行关联处理的情形，则标匠平台出于维护平台秩序及保护消费者权益的目的，可在收到指令时中止甚至终止协议，并以本协议第八条约定的方式通知您。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">七、</span> <span style=\"font-family:仿宋\">协议的变更</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台可根据国家法律法规变化及维护交易秩序、保护消费者权益需要，不时修改本协议、补充协议，变更后的协议、补充协议（下称</span>“变更事项”）将将在标匠平台公布，并通过本协议第八条约定的方式通知您。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">如您不同意变更事项，您有权于变更事项确定的生效日前联系标匠平台反馈意见。如反馈意见得以采纳，标匠平台将酌情调整变更事项。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">如您对已生效的变更事项仍不同意的，您应当于变更事项确定的生效之日起停止使用标匠平台服务，变更事项对您不产生效力；如您在变更事项生效后仍继续使用标匠平台服务，则视为您同意已生效的变更事项。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">八、</span> <span style=\"font-family:仿宋\">通知</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">8.1有效联系方式</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您在注册成为标匠平台用户，并接受标匠平台服务时，您应该向标匠平台提供真实有效的联系方式（包括您的姓名、电子邮件地址、联系电话、联系地址等），对于联系方式发生变更的，您有义务及时更新有关信息，并保持可被联系的状态。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您在注册标匠平台用户时生成的用于登陆标匠平台接收站内信、系统消息也作为您的有效联系方式。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台将向您的上述联系方式的其中之一或其中若干向您送达各类通知，而此类通知的内容可能对您的权利义务产生重大的有利或不利影响，请您务必及时关注。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">8.2 通知的送达</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台通过上述联系方式向您发出通知，其中以电子的方式发出的书面通知，包括但不限于在标匠平台公告，向您提供的联系电话发送手机短信，向您提供的电子邮件地址发送电子邮件，在发送成功后即视为送达；以纸质载体发出的书面通知，按照提供联系地址交邮后的第五个自然日即视为送达（无论您是否签收与否）。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">对于在标匠平台上因交易活动引起的任何纠纷，您同意司法机关（包括但不限于人民法院）可以通过手机短信、电子邮件等现代通讯方式或邮寄方式向您送达法律文书（包括但不限于诉讼文书）。您指定接收法律文书的手机号码、电子邮箱等联系方式为您在标匠平台注册、更新时提供的手机号码、电子邮箱联系方式，司法机关向上述联系方式发出法律文书即视为送达。您指定的邮寄地址为您的法定联系地址或您提供的有效联系地址。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您同意司法机关可采取以上一种或多种送达方式向您达法律文书，司法机关采取多种方式向您送达法律文书，送达时间以上述送达方式中最先送达的为准。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您同意上述送达方式适用于各个司法程序阶段。如进入诉讼程序的，包括但不限于一审、二审、再审、执行以及督促程序等。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">你应当保证所提供的联系方式是准确、有效的，并进行实时更新。如果因提供的联系方式不确切，或不及时告知变更后的联系方式，使法律文书无法送达或未及时送达，由您自行承担由此可能产生的法律后果。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">九、</span> <span style=\"font-family:仿宋\">协议的终止</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">9.1 终止的情形</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">9.1.2用户发起的终止</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">您有权通过以下任一方式终止本协议：</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（一）变更事项生效前您停止使用并明示不愿接受变更事项的；</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（二）您明示不愿继续使用标匠平台服务，且符合标匠平台终止条件的。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">9.1.3标匠平台发起的终止</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">出现以下情况时，标匠平台可以本协议第八条的所列的方式通知您终止本协议：</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（一）您违反本协议约定，标匠平台依据违约条款终止本协议的；</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（二）您盗用他人账户、发布违禁信息、骗取他人财物、引导线下交易、扰乱市场秩序、采取不正当手段谋利等行为，标匠平台依据标匠平台规则对您的账户予以查封的；</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（三）除上述情形外，因您多次违反标匠平台规则相关规定且情节严重，标匠平台依据标匠平台规则对您的账户予以查封的；</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（四）您的账户被标匠平台依据本协议回收的；</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（五）其它应当终止服务的情况。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">9.2 协议终止后的处理</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">9.2.1用户信息披露</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">本协议终止后，除法律有明确规定外，标匠平台无义务向您或您指定的第三方披露您账户中的任何信息。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">9.2.2标匠平台权利</span></strong></p><p style=\"text-indent: 28px; line-height: 33px; background: rgb(255, 255, 255);\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">本协议终止后，标匠平台仍享有下列权利：</span></span></p>', '1');
INSERT INTO `bj_amse` VALUES ('11', '<p style=\"text-align:center;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 19px\"><span style=\"font-family:仿宋\">标匠平台师傅入驻服务协议</span></span></strong></p><p style=\"line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">&nbsp;</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">本服务协议双方为标匠</span>(昆山)网络科技有限公司（下称：标匠平台）与入驻标匠平台的自然人服务商（下称：个体师傅或师傅）。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">标匠平台的入驻个体师傅注册时确认此服务协议后，本服务协议即在个体师傅和标匠平台之间产生法律效力，师傅依据《标匠平台师傅入驻服务协议》（以下简称</span>“本协议”）及其他相关协议的规定入驻平台并为用户提供服务。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">&nbsp;</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 16px\"><span style=\"font-family:仿宋\">【审慎阅读】</span></span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:16px\"><span style=\"font-family:仿宋\">您在申请注册流程中点击同意本协议之前，应当认真阅读本协议。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 16px\"><span style=\"font-family:仿宋\">请您务必审慎阅读、充分理解各条款内容，特别是免除或者限制责任的条款、法律适用和争议解决条款。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:16px\"><span style=\"font-family:仿宋\">免除或者限制责任的条款将以粗体下划线标识，您应重点阅读。如您对协议有任何疑问，可向标匠平台客服咨询。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 16px\"><span style=\"font-family:仿宋\">【签约动作】</span></span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:16px\"><span style=\"font-family:仿宋\">当您按照注册页面提示填写信息、阅读并同意本协议且完成全部注册程序后，即表示您已充分阅读、理解并接受本协议的全部内容，入驻平台</span></span><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">且自愿受本协议的条款约束。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 16px\"><span style=\"font-family:仿宋\">阅读本协议的过程中，如果您不同意本协议或其中任何条款约定，您应立即停止注册入驻程序。</span></span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 16px\"><span style=\"font-family:仿宋\">【协议变更】</span></span></strong><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">标匠平台有权随时变更本协议并在标匠平台上予以公告。经修订的条款一经在标匠平台的公布后，立即自动生效。如您不同意相关变更，必须停止使用标匠平台。本协议内容包括协议正文及所有标匠平台已经发布的各类规则。所有规则为本协议不可分割的一部分，与本协议正文具有同等法律效力。一旦您继续使用标匠平台，则表示您已接受并自愿遵守经修订后的条款。除另行明确声明外，标匠平台增加新服务类目或功能增强的新内容均为本协议的补充，与本协议具有同等效力。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">一、师傅入驻资格</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、只有符合下列条件之一的自然人才能申请成为标匠平台个体师傅，可以使用标匠平台的服务及为平台用户提供服务： 　　</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">A、年满十八周岁，并具有完全民事权利能力和民事行为能力的自然人；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">B、限制民事行为能力人经过其监护人的书面同意；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">不满足注册条件而故意隐瞒或虚构条件注册为标匠平台师傅的，其与标匠平台之间的协议自始无效，标匠平台一经发现，有权立即终止对该师傅的服务，并追究其使用标匠平台服务的一切法律责任。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、师傅需要提供明确的联系地址和联系电话，并提供真实姓名及身份证信息。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">3、标匠平台师傅须承诺遵守国家及地方法律法规、社会公共秩序、社会道德风尚和公序良俗，并保证其提供信息的完全真实。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">二、师傅的权利和义务</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、师傅有权根据本协议及标匠平台发布的相关规则，利用标匠平台发布服务信息、查询用户和客户信息、参与订单报价，参加标匠平台的有关活动及有权享受标匠平台提供的其他有关资讯及信息服务。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、师傅须自行负责自己的师傅账号和密码，且须对在师傅账号密码下发生的所有活动（包括但不限于发布服务信息、网上点击同意各类协议、规则、参与订单报价等）承担责任。师傅有权根据需要更改登录和账户提现密码。因师傅的过错导致的任何损失由师傅自行承担，该过错包括但不限于：不按照交易提示操作，未及时进行交易操作，遗忘或泄漏密码，密码被他人破解，师傅使用的手机被他人侵入。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">3、师傅应当向标匠平台提供真实准确的注册信息，包括但不限于真实姓名、身份证号、联系电话、地址、邮政编码、专业技能证书等。保证标匠平台可以通过上述联系方式与自己进行联系。同时，师傅也应当在相关资料实际变更时及时更新有关注册资料。师傅提供国家或地方规定必须持证上岗的服务的，必须向标匠平台提供相应的专业技能资格证书，并向服务用户出示相关证书。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">4、师傅在标匠平台注册的账号名称，不得有下列情形：</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>1）违反宪法或法律法规规定的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>2）危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>3）损害国家荣誉和利益的，损害公共利益的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>4）煽动民族仇恨、民族歧视，破坏民族团结的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>5）破坏国家宗教政策，宣扬邪教和封建迷信的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>6）散布谣言，扰乱社会秩序，破坏社会稳定的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>7）散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>8）侮辱或者诽谤他人，侵害他人合法权益的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>9）含有法律、行政法规禁止的其他内容的。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">5、师傅不得以虚假信息骗取账号名称注册，或其账号头像、简介等注册信息存在违法和不良信息。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">6、师傅不得冒用、关联机构或社会名人注册账号名称。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">7、师傅不得以任何形式擅自转让或授权他人使用自己在标匠平台的师傅帐号（实名认证通过后，不能进行变更）。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">8、师傅有义务确保在标匠平台上发布的服务信息真实、准确，无误导性。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">9、师傅在标匠平台上发布服务信息，不得违反国家法律、法规、行政规章的规定，不得侵犯他人知识产权或其他合法权益的信息，不得违背社会公共利益或公共道德，不得违反标匠平台的相关规定。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">10、师傅在标匠平台交易中应当遵守诚实信用原则，不得以干预或操纵发布需求等不正当竞争方式扰乱网上交易秩序，不得从事与网上交易无关的不当行为。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">11、师傅不应采取不正当手段（包括但不限于虚假需求、互换好评等方式）提高自身或他人信用度，或采用不正当手段恶意评价其他师傅，降低其他师傅信用度。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">12、师傅不得违反《银行卡业务管理办法》使用银行卡，或利用信用卡套取现金（以下简称套现）；师傅不得盗刷他人银行卡；师傅不得明知或应知他人可能盗刷银行卡而与对方进行交易。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">13、师傅承诺自己在使用标匠平台实施的所有行为遵守法律、法规、行政规章和万师傅平台的相关规定以及各种社会公共利益或公共道德。如有违反导致任何法律后果的发生，师傅将以自己的名义独立承担相应的法律责任。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">14、师傅在标匠平台网上交易过程中如与标匠平台用户因交易产生纠纷，可以请求标匠平台从中予以协调处理。师傅如发现其他师傅有违法或违反本协议的行为，可以向标匠平台举报。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">15、除标匠平台另有规定外，师傅应当自行承担因交易产生的相关费用，并依法纳税。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">16、未经标匠平台书面允许，师傅不得将标匠平台的任何资料以及在交易平台上所展示的任何信息作商业性利用（包括但不限于以复制、修改、翻译等形式制作衍生作品、分发或公开展示）。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">17、师傅不得使用以下方式登录网站或破坏网站所提供的服务： 　　</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">A、以任何机器人软件、蜘蛛软件、爬虫软件、刷屏软件或其它自动方式访问或登录标匠平台；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">B、通过任何方式对本公司内部结构造成或可能造成不合理或不合比例的重大负荷的行为；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">C、通过任何方式干扰或试图干扰网站的正常工作或网站上进行的任何活动。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">18、师傅同意接收来自标匠平台的信息，包括但不限于活动信息、交易信息、促销信息等。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">19、师傅了解并同意，如您系在标匠平台完成注册，只要您注册成功，并在标匠平台成功完成实名认证，您即自动开通标匠钱包账户，以后提现都需要通过标匠钱包账户进行操作。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\">20、师傅声明：注册师傅保证其提供的专业技能证书或从业资格证书的真实性，作为专业技术服务人员，并保证在提供专业服务过程中尽到专业的、审慎的安全注意义务，对其或其必要时雇请的人员的人身安全承担责任。师傅及其必要时雇请的人员与标匠平台不存在劳动关系，在服务过程中造成的人身损害等与标匠平台及营运者无关，责任由师傅本人及责任方承担。</span></strong></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">三、标匠平台的权利和义务</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、标匠平台仅为师傅提供一个服务交易平台，是标匠平台用户发布任务和师傅提供服务的一个交易中介市场，标匠平台对交易双方均不加以监视或控制，亦不主动介入交易的过程。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、标匠平台有义务在现有技术水平的基础上努力确保整个网上交流平台的正常运行，尽力避免服务中断或将中断时间限制在最短时间内，保证师傅网上交流活动的顺利进行。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">3、标匠平台有义务对师傅在注册使用标匠平台信息平台中所遇到的与交易或注册有关的问题及反映的情况及时作出回复。　</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">4、标匠平台有权对师傅的注册资料进行审查，对存在任何问题或怀疑的注册资料，标匠平台有权发出通知询问师傅并要求师傅做出解释、改正。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">5、师傅因在标匠平台网上交易与标匠平台用户产生的纠纷，师傅将纠纷告知标匠平台，或标匠平台知悉纠纷情况的，经审核后，标匠平台有权通过电子邮件及电话联系向纠纷双方了解纠纷情况，并将所了解的情况通过电子邮件互相通知对方；师傅通过司法机关依照法定程序要求标匠平台提供相关资料，标匠平台将积极配合并提供有关资料。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">6、因网上信息平台的特殊性，标匠平台不承担对所有师傅的交易行为以及与交易有关的其他事项进行事先审查的义务，但如发生以下情形，标匠平台有权无需征得师傅的同意限制师傅的活动、向师傅核实有关资料、发出警告通知、暂时中止、无限期中止及拒绝向该师傅提供服务：</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">A、师傅以非自然人名义进行认证之后认证主体自行注销或者经有权机关吊销或撤销的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">B、师傅违反本协议或因被提及而纳入本协议的相关规则；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">C、存在师傅或其他第三方通知标匠平台，认为某个师傅或具体交易事项存在违法或不当行为，并提供相关证据，而标匠平台无法联系到该师傅核证或验证该师傅向标匠平台提供的任何资料；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">D、存在师傅或其他第三方通知标匠平台，认为某个师傅或具体交易事项存在违法或不当行为，并提供相关证据。标匠平台以普通非专业人员的知识水平标准对相关内容进行判别，可以明显认为这些内容或行为可能对他方或标匠平台造成财务损失或承担法律责任。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">7、根据国家法律、法规、行政规章规定、本协议的内容和标匠平台所掌握的事实依据，可以认定该师傅存在违法或违反本协议行为以及在标匠平台交易平台上的其他不当行为，标匠平台有权无需征得师傅的同意在标匠平台交易平台及所在网站上以网络发布形式公布该师傅的违法行为，并有权随时作出删除相关信息、终止服务提供等处理。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">8、标匠平台依据本协议及相关规则，可以冻结、使用、先行赔付、退款、处置师傅缴存并冻结在标匠平台账户内的资金。因违规而被封号的师傅账户中的资金在按照规定进行处置后尚有余额的，该师傅可申请提现。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">9、标匠平台有权在不通知师傅的前提下，删除或采取其他限制性措施处理下列信息：包括但不限于以规避费用为目的；以炒作信用为目的；存在欺诈等恶意或虚假内容；与网上交易无关或不是以交易为目的；存在恶意竞价或其他试图扰乱正常交易秩序因素；违反公共利益或可能严重损害标匠平台和其他师傅合法利益。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">10、因协议约定或其他规定由师傅承担的责任，如标匠平台承担了赔偿责任的，标匠平台有权向师傅追偿。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">四、服务的中断和终止</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、标匠平台可自行全权决定以任何理由(包括但不限于标匠平台认为师傅已违反本协议及相关规则的字面意义和精神，或师傅在超过180日内未登录标匠平台等)终止对师傅的服务，并有权在两年内保存师傅在标匠平台的全部资料（包括但不限于师傅信息、产品信息、交易信息等）。同时标匠平台可自行全权决定，在发出通知或不发出通知的情况下，随时停止提供全部或部分服务。服务终止后，标匠平台没有义务为师傅保留原账户中或与之相关的任何信息，或转发任何未曾阅读或发送的信息给师傅或第三方。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、若师傅申请终止标匠平台服务，需经标匠平台审核同意，方可解除与标匠平台的协议关系，但标匠平台仍保留下列权利：</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">A、标匠平台有权在法律、法规、行政规章规定的时间内保留该师傅的资料，包括但不限于以前的师傅资料、交易记录等；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">B、若终止服务之前，该师傅在标匠平台交易平台上存在违法行为或违反本协议的行为，标匠平台仍可行使本协议所规定的权利。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">3、师傅存在下列情况，标匠平台可以终止向该师傅提供服务，但师傅对其终止服务前的交易行为仍应承担责任：</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">A、在师傅违反本协议及相关规则规定时，标匠平台有权终止向该师傅提供服务。标匠平台将在中断服务时通知师傅。但该师傅在被标匠平台终止提供服务后，再一次直接或间接或以他人名义注册为标匠平台师傅的，标匠平台有权再次单方面终止为该师傅提供服务；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">B、标匠平台发现师傅注册资料中主要内容是虚假的，标匠平台有权随时终止为该师傅提供服务；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">C、本协议终止或更新时，师傅未确认新的协议的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">D、其它标匠平台认为需终止服务的情况。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">五、标匠平台的责任范围</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">当师傅接受该协议时，师傅应当明确了解并同意：</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、标匠平台不能随时预见到任何技术上的问题或其他困难。该等困难可能会导致数据损失或其他服务中断。标匠平台是在现有技术基础上提供的服务。标匠平台不保证以下事项：</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">A、标匠平台将符合所有师傅的要求；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">B、标匠平台不受干扰、能够及时提供、安全可靠或免于出错；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">C、本服务使用权的取得结果是正确或可靠的。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、师傅经由标匠平台取得的建议和资讯，无论其形式或表现，绝不构成本协议未明示规定的任何保证。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">3、基于以下原因而造成的利润、商誉、使用、资料损失或其它无形损失，标匠平台不承担任何直接、间接、附带、特别、衍生性或惩罚性赔偿（即使标匠平台已被告知前款赔偿的可能性）：</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">A、标匠平台的使用或无法使用；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">B、师傅的传输或资料遭到未获授权的存取或变更；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">C、标匠平台中任何第三方之声明或行为；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">D、标匠平台在服务交易中为师傅提供交易机会，推荐交易方；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">E、标匠平台其它相关事宜。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">4、标匠平台只是为师傅提供一个服务交易的平台，对于标匠平台所发布的订单的合法性、真实性及其品质，以及师傅履行交易的能力等，标匠平台一律不负任何担保责任。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">5、标匠平台提供与其它互联网上的网站或资源的链接，师傅可能会因此连结至其它运营商经营的网站，但不表示标匠平台与这些运营商有任何关系。其它运营商经营的网站均由各经营者自行负责，不属于标匠平台控制及负责范围之内。对于存在或来源于此类网站或资源的任何内容、广告、物品或其它资料，标匠平台亦不予保证或负责。因使用或依赖任何此类网站或资源发布的或经由此类网站或资源获得的任何内容、物品或服务所产生的任何损害或损失，标匠平台不负任何直接或间接的责任。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">六、知识产权</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、标匠平台及标匠平台所使用的任何相关软件、程序、内容，包括但不限于作品、图片、档案、资料、网站构架、网站版面的安排、网页设计、经由标匠平台或广告商向师傅呈现的广告或资讯，均由标匠平台或其它权利人依法享有相应的知识产权，包括但不限于著作权、商标权、专利权或其它专属权利等，受到相关法律的保护。未经标匠平台或权利人明示授权，师傅保证不修改、出租、出借、出售、散布标匠平台及标匠平台所使用的上述任何资料和资源，或根据上述资料和资源制作成任何种类产品。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、标匠平台授予师傅不可转移及非专属的使用权，使师傅可以通过单机计算机使用标匠平台的目标代码（以下简称“软件”），但师傅不得且不得允许任何第三方复制、修改、创作衍生作品、进行还原工程、反向组译，或以其它方式破译或试图破译源代码，或出售、转让“软件”或对“软件”进行再授权，或以其它方式移转“软件”之任何权利。师傅同意不以任何方式修改“软件”，或使用修改后的“软件”。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">3、师傅不得经由非标匠平台所提供的界面使用标匠平台。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">七、隐私权</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、信息使用</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">A、标匠平台不会向任何人出售或出借师傅的个人或法人信息，除非事先得到师傅得许可；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">B、标匠平台亦不允许任何第三方以任何手段收集、编辑、出售或者无偿传播师傅的个人或法人信息。任何师傅如从事上述活动，一经发现，标匠平台有权立即终止与该师傅的服务协议，查封其账号。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、信息披露</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">师傅的个人或法人信息将在下述情况下部分或全部被披露：</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">A、经师傅同意，向第三方披露；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">B、师傅在使用标匠平台过程中涉及到知识产权类纠纷，有他方主张权利的，标匠平台在审核主张方提交的资料后认为披露师傅信息有助于纠纷解决的；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">C、根据法律的有关规定，或者行政、司法机关的要求，向第三方或者行政、司法机关披露；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">D、若师傅出现违反中国有关法律或者网站规定的情况，需要向第三方披露；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">E、为提供你所要求的产品和服务，而必须和第三方分享师傅的个人或法人信息；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">F、其它标匠平台根据法律或者网站规定认为合适的披露。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">师傅或者第三方申请标匠平台披露其他师傅信息的，标匠平台有权视实际情况要求申请人出具申请书，申请书内容应包含申请披露的信息范围、用途及使用承诺等内容。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">3、信息安全</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">A、在使用标匠平台服务进行网上交易时，请师傅妥善保护自己的个人或法人信息，仅在必要的情形下向他人提供；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">B、如果师傅发现自己的个人或法人信息泄密，尤其是师傅账户或“支付账户管理”账户及密码发生泄露，请师傅立即联络标匠平台客服，以便我们采取相应措施。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">八、不可抗力</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">因不可抗力或者其他意外事件，使得本协议的履行不可能、不必要或者无意义的，双方均不承担责任。本合同所称之不可抗力意指不能预见、不能避免并不能克服的客观情况，包括但不限于战争、台风、水灾、火灾、雷击或地震、罢工、暴动、法定疾病、黑客攻击、网络病毒、电信部门技术管制、政府行为或任何其它自然或人为造成的灾难等客观情况。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">九、保密</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">师傅保证在使用标匠平台过程中所获悉的属于标匠平台及他方的且无法自公开渠道获得的文件及资料（包括但不限于商业秘密、公司计划、运营活动、财务信息、技术信息、经营信息及其他商业秘密）予以保密。未经该资料和文件的原提供方同意，师傅不得向第三方泄露该商业秘密的全部或者部分内容。但法律、法规、行政规章另有规定或者双方另有约定的除外。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">十、违约责任</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、师傅违反本协议第二条及平台其他公示的有关义务的，标匠平台有权终止其使用平台的资格。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、师傅违反标匠平台规定和本协议约定未经由标匠平台私下交易收付款的，标匠平台有权终止其使用平台的资格，且师傅应向标匠平台支付违约金10000元，并承担标匠平台因此支付的诉讼费、律师费、调查取证费、差旅费等。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">十一、交易纠纷解决方式</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、本协议及其规则的有效性、履行和与本协议及其规则效力有关的所有事宜，将受中华人民共和国法律管辖，任何争议仅适用中华人民共和国法律。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、标匠平台有权受理并调处您与标匠平台用户交易服务产生的纠纷，同时有权单方面独立判断标匠平台用户对您的举报及索偿是否成立，若判断索偿成立，则标匠平台有权划拨您已支付的担保金或交纳的保证金以及账户余额进行相应偿付。标匠平台没有使用自用资金进行偿付的义务，但若进行了该等支付，您应及时赔偿标匠平台的全部损失，否则标匠平台有权通过前述方式抵减相应资金或权益，如仍无法弥补损失，则标匠平台保留继续追偿的权利。因标匠平台非司法机关，您完全理解并承认，标匠平台对证据的鉴别能力及对纠纷的处理能力有限，受理交易纠纷完全是基于您之委托，不保证处理结果符合您的期望，标匠平台有权决定是否参与争议的调处。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">3、凡因履行本协议及其规则发生的纠纷以及在标匠平台上交易产生的所有纠纷，双方可协商解决，若协商不成的，双方一致同意提交标匠平台经营方公司所在地昆山市人民法院提起诉讼。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">十二、附则</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、在本协议中所使用的下列词语，除非另有定义，应具有以下含义：</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">“标匠平台”在无特别说明的情况下，均指&quot;标匠平台&quot;（www.bj-wang.com）。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">“个体师傅”：指具有完全民事行为能力的标匠平台各项服务的自然人提供者。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">“标匠平台用户”：是指在标匠平台上进行发布服务订单的需求者，简称用户。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、标匠平台对本服务协议包括基于本服务协议制定的各项规则拥有修订权和最终解释权。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><br/></span></p><p><br/></p>', '2');
INSERT INTO `bj_amse` VALUES ('13', '<p style=\";text-align:center;line-height:33px;background:rgb(255,255,255)\"><a name=\"OLE_LINK1\"></a><strong><span style=\"font-family: 仿宋;color: rgb(254, 143, 0);font-size: 19px\"><span style=\"font-family:仿宋\">法律声明及隐私权政策</span></span></strong></p><p style=\"margin-top:0;margin-bottom:0;line-height:33px\"><strong><span style=\"font-family: 仿宋;background: rgb(255, 255, 255)\"><span style=\"font-family:仿宋\">注册及使用提示</span></span></strong></p><p style=\"margin-top:0;margin-bottom:0;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 14px;background: rgb(255, 255, 255)\"><span style=\"font-family:仿宋\">【特别提示】</span></span></strong></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台提醒您：</span></span></strong><strong><span style=\"font-family: 仿宋;color: rgb(62, 62, 62);font-size: 14px;background: rgb(255, 255, 255)\"><span style=\"font-family:仿宋\">您在申请注册流程中点击同意前，</span></span></strong><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">请您务必仔细阅读并透彻理解本声明，</span></span></strong><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;font-size: 14px;background: rgb(255, 255, 255)\"><span style=\"font-family:仿宋\">并务必审慎阅读、充分理解平台有关协议及文件中的相关条款内容，其中包括：</span></span></span></strong></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;color: rgb(62, 62, 62);font-size: 14px;background: rgb(255, 255, 255)\">1</span></strong><strong><span style=\"font-family: 仿宋;color: rgb(62, 62, 62);font-size: 14px;background: rgb(255, 255, 255)\">.</span></strong><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;font-size: 14px;background: rgb(255, 255, 255)\"><span style=\"font-family:仿宋\">与您约定的责任限制或免除的条款；</span></span></span></strong></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;color: rgb(62, 62, 62);font-size: 14px;background: rgb(255, 255, 255)\">2</span></strong><strong><span style=\"font-family: 仿宋;color: rgb(62, 62, 62);font-size: 14px;background: rgb(255, 255, 255)\">.</span></strong><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;font-size: 14px;background: rgb(255, 255, 255)\"><span style=\"font-family:仿宋\">与您约定的法律适用和管辖的条款；</span></span></span></strong></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;color: rgb(62, 62, 62);font-size: 14px;background: rgb(255, 255, 255)\">3</span></strong><strong><span style=\"font-family: 仿宋;color: rgb(62, 62, 62);font-size: 14px;background: rgb(255, 255, 255)\">.</span></strong><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;font-size: 14px;background: rgb(255, 255, 255)\"><span style=\"font-family:仿宋\">其他以粗体或下划线标识的重要条款。</span></span></span></strong></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;color:rgb(62,62,62);font-size:14px;background:rgb(255,255,255)\"><span style=\"font-family:仿宋\">如您对</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">本声明、</span></span><span style=\";font-family:仿宋;color:rgb(62,62,62);font-size:14px;background:rgb(255,255,255)\"><span style=\"font-family:仿宋\">协议或文件</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">内容有任何疑问</span></span><span style=\";font-family:仿宋;color:rgb(62,62,62);font-size:14px;background:rgb(255,255,255)\"><span style=\"font-family:仿宋\">，您可向标匠平台客服咨询。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">阅读本声明的过程中，如果您不同意本声明、</span></span></span></strong><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(62, 62, 62);font-size: 14px\"><span style=\"font-family:仿宋\">协议或文件</span></span></span></strong><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">中的任何内容，您应立即停止注册或使用标匠平台服务；如果您使用标匠平台服务的，您的使用行为将被视为对本声明及相关协议全部内容的认可。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\"font-family: 仿宋;color: rgb(62, 62, 62);font-size: 14px\"><span style=\"font-family:仿宋\">如您因平台服务与标匠发生争议的，适用《标匠平台服务协议》处理；如您在使用平台服务过程中与其他服务商或用户发生争议的，依您与服务商或用户客户达成的协议或平台服务约束您与其他服务商或客户的协议条款及相关法律规定处理（标匠不是您与其他服务商或用户争议的协议及责任主体）。</span></span></p><p style=\"line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 19px\"><span style=\"font-family:仿宋\">定义</span></span></strong></p><p style=\"line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">【</span></span></strong><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">标匠平台</span></span></strong><strong><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">】</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">指</span>“标匠”服务平台（包括但不限于手机</span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">APP、网页版、微信版及H5页面）</span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">，标匠服务平台由标匠</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">(昆山)网络科技有限公司</span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（以下简称标匠公司，或标匠平台运营方）注册并负责运营。</span></span></p><p style=\"margin-top:0;margin-bottom:0;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 14px;background: rgb(255, 255, 255)\"><span style=\"font-family:仿宋\">【平台协议】</span></span></strong></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;font-size: 14px;background: rgb(255, 255, 255)\"><span style=\"font-family:仿宋\">标匠平台协议包括以下相关协议文件（包括但不限于协议、声明及文件等），在注册和使用过程中，请您务必对应仔细阅读和理解：</span></span></span></strong></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;color:rgb(255,91,32);font-size:14px;background:rgb(255,255,255)\">1.</span><a href=\"http://terms.alicdn.com/legal-agreement/terms/TD/TD201609301342_19559.html\"><span style=\";font-family:仿宋;color:rgb(255,91,32);font-size:14px;background:rgb(255,255,255)\"><span style=\"font-family:仿宋\">《标匠平台服务协议》</span></span></a></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;color:rgb(255,91,32);font-size:14px;background:rgb(255,255,255)\">2.</span><a href=\"http://terms.alicdn.com/legal-agreement/terms/suit_bu1_taobao/suit_bu1_taobao201703241622_61002.html\"><span style=\";font-family:仿宋;color:rgb(255,91,32);font-size:14px;background:rgb(255,255,255)\"><span style=\"font-family:仿宋\">《法律声明及隐私权政策》</span></span></a></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;color:rgb(255,91,32);font-size:14px;background:rgb(255,255,255)\">3.</span><a href=\"https://ds.alipay.com/fd-inhm9zcq/index.html\"><span style=\";font-family:仿宋;color:rgb(255,91,32);font-size:14px;background:rgb(255,255,255)\"><span style=\"font-family:仿宋\">《标匠平台用户保障协议》</span></span></a></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;color:rgb(255,91,32);font-size:14px;background:rgb(255,255,255)\">4.《标匠平台师傅入驻协议》</span></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;color:rgb(255,91,32);font-size:14px;background:rgb(255,255,255)\">5.《标匠平台企业服务商入驻协议》</span></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;color:rgb(255,91,32);font-size:14px;background:rgb(255,255,255)\">6.《标匠平台先行赔付协议》</span></p><p style=\"margin-top:0;margin-bottom:0;text-indent:28px;line-height:33px;background:rgb(255,255,255)\"><span style=\"font-family: 仿宋;color: rgb(255, 91, 32);font-size: 14px\">7.其他标匠平台运营中与注册用户相关的文件等。</span></p><p style=\"line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">【</span></span></strong><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">用户</span></span></strong><strong><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">】</span></span></strong></p><p style=\"text-indent: 32px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:16px\"><span style=\"font-family:仿宋\">用户</span></span><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">是指在标匠平台上进行发布服务订单的需求者，简称用户。</span></span></p><p style=\"line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">【</span></span></strong><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">服务商</span></span></strong><strong><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">】</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">服务商是指在标匠平台上注册并经过认证的，通过标匠平台为用户提供线下装饰等服务的企业服务商（包括但不限于公司、个体工商户或其他组织）和自然人个体师傅。</span></span></p><p style=\"line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 16px\"><span style=\"font-family:仿宋\">法律声明及隐私权政策</span></span></strong></p><p style=\"line-height: 33px;background: rgb(255, 255, 255)\"><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">【</span></span><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">权利归属</span></span></strong><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">】</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台的</span>Logo、“标匠”等文字、图形及其组合，以及标匠平台的其他标识、徵记、产品和服务名称均为标匠平台运营方标匠（昆山）网络科技有限公司在中国和其它国家的商标或有版权的标识；标匠平台内的所有产品、技术、软件、程序、数据及其他信息（包括但不限于文字、图像、图片、照片、音频、视频、图表、色彩、版面设计、电子文档）的权利（包括但不限于版权、商标权、专利权、商业秘密及其他所有相关权利）均归属于标匠（昆山）网络科技有限公司。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">未经标匠（昆山）网络科技有限公司许可，任何人不得擅自使用（包括但不限于通过任何机器人、蜘蛛等程序或设备进行监视、复制、传播、展示、镜像、上载、下载标匠平台内的任何内容），否则标匠（昆山）网络科技有限公司将追究其法律责任。</span></span></strong></p><p style=\"line-height: 33px;background: rgb(255, 255, 255)\"><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">【</span></span><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">责任限制</span></span></strong><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">】</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">1.鉴于标匠平台提供的服务属于电子公告牌（</span></span><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">BBS）性质，标匠平台上的服务商信息（包括但不限于</span></span><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">企业服务商名称、师傅姓名、所在地区及联络信息、个人的描述和说明、相关图片等）均由服务商自行提供并上传，由服务商对其提供并上传的所有信息承担相应法律责任。</span></span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">2.标匠平台转载作品（包括论坛内容）出于传递更多信息之目的，并不意味标匠平台赞同其观点或已经证实其内容的真实性。</span></span></p><p style=\"line-height: 33px;background: rgb(255, 255, 255)\"><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">【</span></span><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">知识产权保护</span></span></strong><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">】</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台尊重知识产权，反对侵权盗版行为。知识产权权利人认为标匠平台内容（包括但不限于标匠平台用户发布的商品信息）可能涉嫌侵犯其合法权益，可以联系标匠平台客服或者相关联系人提出书面通知，标匠平台收到后将及时处理。</span></span></p><p style=\"line-height: 33px;background: rgb(255, 255, 255)\"><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">【</span></span><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">隐私权政策</span></span></strong><span style=\"font-family: 仿宋\"><span style=\"font-family:仿宋\">】</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台（下称</span>“我们”）非常尊重用户个人信息的保护，在您使用标匠平台提供的服务时，我们将按照本隐私权政策收集、使用及共享您的个人信息。为更好了解我们的隐私权政策及保护您的隐私，我们建议您完整地阅读本隐私权政策，以帮助您了解维护自己隐私权的方式。如您对本隐私权政策有任何疑问，您可以通过标匠平台公布的联系方式与我们联系。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">如果您不同意本隐私权政策任何内容，您应立即停止注册和使用标匠平台服务；当您使用标匠平台提供的任一服务时，即表示您已同意我们按照本隐私权政策来合法使用和保护您的个人信息。</span></span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">1.适用范围</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">本隐私权政策适用于标匠平台提供的所有服务，您访问标匠平台网站及</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">/或登陆相关客户端使用标匠平台提供的服务，均适用本隐私权政策。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">2.我们如何收集信息</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">我们收集信息是为了向您提供更好、更优、更个性化的服务，我们收集信息的方式如下：</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（</span>1）您向我们提供的信息。</span></span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">当您注册标匠平台账户及您在使用标匠平台提供的相关服务时填写及</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">/或提交的信息，包括您的姓名、性别、电话号码、电子邮箱、地址及相关附加信息（如您所在的省份和城市、邮政编码等）。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（</span>2）在您使用服务过程中收集的信息。</span></span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">为了提供并优化您需要的服务，我们会收集您使用服务的相关信息，这类信息包括：</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">在您使用标匠平台服务，或访问标匠平台网页时，标匠平台自动接收并记录的您的浏览器和计算机上的信息，包括但不限于您的</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">IP地址、浏览器的类型、使用的语言、访问日期和时间、软硬件特征信息及您需求的网页记录等数据；如您下载或使用标匠平台或其关联公司客户端软件，或访问移动网页使用标匠平台服务时，标匠平台可能会读取与您位置和移动设备相关的信息，包括但不限于设备型号、设备识别码、操作系统、分辨率、电信运营商等。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">除上述信息外，我们还可能为了提供服务及改进服务质量的合理需要而收集您的其他信息，包括您与我们的客户服务团队联系时您提供的相关信息，您参与问卷调查时向我们发送的问卷答复信息，以及您与标匠平台的关联方、标匠平台合作伙伴之间互动时我们收集的相关信息。与此同时，为提高您使用标匠平台提供的服务的安全性，更准确地预防钓鱼网站欺诈和木马病毒，我们可能会通过了解一些您的网络使用习惯、您常用的软件信息等手段来判断您账户的风险，并可能会记录一些我们认为有风险的</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">URL。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">（</span>3）来自第三方的信息。</span></span></strong><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">为了给您提供更好、更优、更加个性化的服务，或共同为您提供服务，或为了预防互联网欺诈的目的，标匠平台的关联方、合作伙伴会依据法律的规定或与您的约定或征得您同意的前提下，向标匠平台分享您的个人信息。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">3.我们如何使用信息</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">因收集您的信息是为了向您提供服务及提升服务质量的目的，为了实现这一目的，我们会把您的信息用于下列用途：</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（</span>1）便于服务商向您提供您使用的各项服务，并维护、改进这些服务。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（</span>2）我们可能使用您的个人信息以预防、发现、调查欺诈、危害安全、非法或违反与我们或其关联方协议、政策或规则的行为，以保护您、其他我们用户，或我们或其关联方的合法权益。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（</span>3）经您许可的其他用途。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">4.我们如何共享信息</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">我们对您的信息承担保密义务，不会为满足第三方的营销目的而向其出售或出租您的任何信息，我们会在下列情况下才将您的信息与第三方共享：</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（</span>1）事先获得您的同意或授权。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（</span>2）根据法律法规的规定或行政或司法机构的要求。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（</span>3）根据你选择的平台服务项目向标匠平台的关联方分享您的个人信息。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（</span>4）如您是适格的知识产权投诉人并已提起投诉，应被投诉人要求，向被投诉人披露，以便双方处理可能的权利纠纷。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（</span>5）如您出现违反中国有关法律、法规或者标匠平台相关协议或相关规则的情况，需要向第三方披露。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">（</span>6）为维护标匠平台及其关联方或用户的合法权益。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">5.</span></strong><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">Cookie </span></strong><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">和网络</span></span></strong><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">&nbsp;Beacon </span></strong><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">的使用</span></span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">为使您获得更轻松的访问体验，您访问标匠平台相关网站或使用标匠平台提供的服务时，我们可能会通过小型数据文件识别您的身份，这么做是帮您省去重复输入注册信息的步骤，或者帮助判断您的账户安全。这些数据文件可能是</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">Cookie，Flash Cookie，或您的浏览器或关联应用程序提供的其他本地存储（统称“Cookie”）。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">请您理解，我们的某些服务只能通过使用</span>“</span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">Cookie”才可得到实现。如果您的浏览器或浏览器附加服务允许，您可以修改对Cookie的接受程度或者拒绝标匠平台的Cookie，但这一举动在某些情况下可能会影响您安全访问标匠平台相关网站和使用标匠平台提供的服务。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">网页上常会包含一些电子图象（称为</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">&quot;单像素&quot; GIF </span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">文件或</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">&nbsp;&quot;网络 beacon&quot;），使用网络beacon可以帮助网站计算浏览网页的用户或访问某些cookie，我们会通过网络beacon收集您浏览网页活动的信息，例如您访问的页面地址、您先前访问的援引页面的位址、您停留在页面的时间、您的浏览环境以及显示设定等。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">6.信息存储</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">标匠平台收集的有关您的信息和资料将保存在标匠平台及（或）其关联公司的服务器上，这些信息和资料可能传送至您所在国家、地区或标匠平台收集信息和资料所在地并在该地被访问、存储和展示。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">7.您的个人信息保护</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">为保障您的信息安全，我们努力采取各种合理的物理、电子和管理方面的安全措施来保护您的信息，使您的信息不会被泄漏、毁损或者丢失，包括但不限于</span></span><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\">SSL、信息加密存储、数据中心的访问控制。我们对可能接触到您的信息的员工或外包人员也采取了严格管理，包括但不限于根据岗位的不同采取不同的权限控制，与他们签署保密协议，监控他们的操作情况等措施。标匠平台会按现有技术提供相应的安全措施来保护您的信息，提供合理的安全保障，标匠平台将尽力做到使您的信息不被泄漏、毁损或丢失。</span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">您的账户均有安全保护功能，请妥善保管您的账户及密码信息。标匠平台将通过向其它服务器备份、对用户密码进行加密等安全措施确保您的信息不丢失，不被滥用和变造。尽管有前述安全措施，但同时也请您理解在信息网络上不存在</span>“完善的安全措施”。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\";font-family:仿宋;color:rgb(51,51,51);font-size:14px\"><span style=\"font-family:仿宋\">在使用标匠平台服务进行网上交易时，您不可避免的要向交易对方或潜在的交易对方披露自己的个人信息，如联络方式或者邮政地址。请您妥善保护自己的个人信息，仅在必要的情形下向他人提供。如您发现自己的个人信息泄密，尤其是你的账户及密码发生泄露，请您立即联络标匠平台客服，以便标匠平台采取相应措施。</span></span></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><strong><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\">8.未成年人保护</span></strong></p><p style=\"text-indent: 28px;line-height: 33px;background: rgb(255, 255, 255)\"><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;color: rgb(51, 51, 51);font-size: 14px\"><span style=\"font-family:仿宋\">我们重视未成年人的保护，未成年人原则上不能成为平台的注册用户及使用相关平台服务；如您为未成年人且需要使用平台服务的，建议您请您的监护人仔细阅读本隐私权政策，并在征得您的监护人同意的前提下使用我们的服务或向我们提供信息。</span></span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:14px\">&nbsp;</span></p><p><br/></p>', '3');
INSERT INTO `bj_amse` VALUES ('14', '<p style=\"text-align:center;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 19px\"><span style=\"font-family:仿宋\">标匠平台用户保障协议</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">本协议由您（以下称</span>“服务商”：包括</span><span style=\";font-family:宋体;font-size:14px\"><span style=\"font-family:宋体\">个体</span></span><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">师傅和企业服务商）与标匠（昆山）网络科技有限公司（以下称</span>“标匠平台”）就标匠平台用户保障而共同缔结。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">一、定义</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">服务商：</span></span></strong><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">是指在标匠平台上注册并经过认证的，通过标匠平台为用户提供线下装饰等服务的企业服务商（包括但不限于公司、个体工商户或其他组织）和自然人个体师傅。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">基础用户保障服务：</span></span></strong><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">指服务商通过标匠平台发布服务信息并接受用户的雇请，根据本协议约定及标匠平台其他协议、公示规则等的规定，应履行的订单描述服务义务、</span>48小时保证完成服务义务、其他保障义务等用户保障服务义务。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">特色交易约定服务：</span></span></strong><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">指服务商在承诺用户保障服务的基础上，除履行法律规定义务外，根据服务商的主营类目情况自愿选择向用户提供的特定服务项目。标匠平台将在平台上不时公示新增的或对原服务项目内容进行修订的特色交易约定服务合约工具。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">用户保障服务：</span></span></strong><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">特色交易约定服务与基础用户保障服务合称为</span>“用户保障服务”。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">保证金：</span></span></strong><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">指服务商根据本协议约定及标匠平台其他公示规则的规定向标匠平台缴存，并在服务商未履行用户保障服务承诺时，用于对用户进行赔付的资金。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">违约赔付：</span></span></strong><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">指服务商与用户进行交易后，如因服务商未履行用户保障服务承诺而导致用户权益受损，且在用户直接要求服务商处理未果的情况下，标匠平台可以普通或非专业人员的知识水平标准，根据相关证据材料和规则判定服务商是否应履行赔付义务。如是，则标匠平台可使用服务商标匠钱包中的履约担保金赔付给用户、标匠平台。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">履约担保金：</span></span></strong><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">指根据本协议约定及标匠平台其他公示规则的规定，在服务商向用户、标匠平台履行约定存在风险时，标匠平台冻结的服务商标匠钱包中的金额，用于发生违约赔付时的履约担保资金。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">二、用户保障服务内容</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【用户保障工具】服务商同意根据服务商发布商品所在服务类目要求，选择是否缴纳保证金作为消费者保障服务工具，具体详见用户保障规则。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【如实描述】服务商应在服务描述页面、账号页面等所有标匠平台提供的渠道中，依据标匠平台规则对上传于标匠平台的服务信息进行如实描述。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【其他保障义务】服务商应按国家法律法规规定及标匠平台规则保障用户作为消费者的要求三包服务、要求售后服务、主张消保维权等其他各项权益。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【特色交易附加服务】在服务商根据服务商的服务商账号主营服务类目情况自愿选择向用户提供特色交易附加服务时，服务商应严格依照服务商所承诺的服务内容向用户履行义务，标匠平台将为服务商提供统一的特色交易附加服务后台选择工具，并在标匠平台网前台公示各类交易附加服务的相关规则。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【用户保障服务责任主体】服务商明确了解并同意服务商是用户保障服务的责任主体，标匠平台仅向服务商提供相关技术支持及服务，除法律有明文规定外，不对服务商向用户提供的用户保障服务内容承担任何保证责任。当发生用户主张无理由退款、服务信息与描述不符、服务商违反特色交易附加服务承诺等情形时，服务商应积极与用户沟通协商并保证用户的权益。对于用户因前述问题提出的要求，服务商应积极处理。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【违约赔付】服务商同意当标匠平台受理用户家提出的用户保障服务维权和赔付申请时，服务商应积极配合，在标匠平台要求的时间期限内提供相关证据材料，以证明与用户交易的服务不存在用户提出的问题或符合双方的约定，并保证所提交的证据材料真实、合法。如标匠平台以普通或非专业人员的知识水平标准，对服务商和</span>/或用户提供的证据材料进行表面审核后，以其独立判断服务商未全面履行用户保障服务内容的，则标匠平台可根据本协议及其它公示规则的规定，通过服务商依据本协议提供的用户保障服务方式对因此遭受权益损失的用户进行违约赔付。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">三、保证金</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【保证金授权】服务商应根据以下条款之约定缴存并授权标匠平台可根据以下条款及标匠平台其他公示规则的规定冻结、使用、处置保证金，除服务商主动注销账户并终止在标匠平台所有经营活动情况外，上述授权不可撤销。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、保证金的缴存</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【缴存范围】标匠平台规定必须缴存保证金的服务类目服务商，应向标匠平台缴存不少于标匠平台公布的</span>“用户保障服务保证金标准”要求的金额，否则服务商将不能在对应服务类目下发布的订单进行报价。尽管有上述约定，本协议有效期内，标匠平台可根据服务商业务变化及实际赔付情况以书面方式通知服务商调整或补足保证金金额。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">除必须缴存保证金服务类目外，服务商可自由选择是否缴存保证金。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">“用户保障服务保证金标准”由标匠平台根据各服务类目特点制定，并以标匠平台公布的最新内容为准（请查看具体服务类目和保证金额度要求，标匠平台可以调整该等服务类目范围并进行公示）。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【文案展示】如服务商依据</span>“用户保障服务保证金标准”要求缴纳了保证金且保证金余额大于“用户保障服务保证金标准”要求之金额，服务商账号的相关页面将出现“已交保证金”或类似文案之标识。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【保证金补足】服务商应使保证金余额始终保持不低于</span>“用户保障服务保证金标准”要求之金额，如发生赔付事件导致服务商需补缴保证金的，则服务商应在赔付事件发生之日起三（3）日内补足。如服务商未能在上述期间补足相应的保证金，则服务商账号相关页面的“已交保证金”或类似文案之标识将被取消，且标匠平台可对服务商发布的服务信息屏蔽、对订单无权报价等限制措施，对服务商的账号采取屏蔽等限制措施。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、保证金的缴存方式</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">服务商授权标匠平台根据平台相关规则作出指令，将服务商根据本协议之约定缴存的保证金款项止付于服务商的标匠钱包账户中，除服务商主动注销账户并终止在标匠平台所有活动情况外，上述授权不可撤销。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">3、保证金的解除止付</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【解除止付条件】若服务商为标匠平台规定必须缴纳保证金的服务类目服务商，服务商申请解除全部或部分保证金止付，进而导致服务商的保证金额度低于类目要求的最低金额的，服务商须同时满足以下条件：</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>1）没有未完结的订单；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>2）没有正在处理的违约赔付投诉记录；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>3）没有正在处理的未完结的赔付记录；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>4）标匠平台赔付基金无催缴单；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>5）没有未结束的投诉记录；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>6）没有未完结的退款记录；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>7）保证金缴纳满60天。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">服务商未主动申请解除保证金止付，如服务商的账号被处以查封账户处理的，且当时服务商没有未完结的订单交易，包括但不限于交易产生的纠纷均已处理完毕，标匠平台将直接解除服务商剩余的保证金余额止付，并可直接终止向服务商提供全部或部分标匠平台服务。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【标识取消】如服务商已成功申请解除保证金止付，解除止付后服务商的保证金余额为</span>0，则服务商账号相关页面的“已交保证金”或类似文案之标识将被取消，标匠平台可暂停或终止向服务商提供全部或部分标匠平台服务。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">4、保证金的管理与使用</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【保证金处置】服务商同意，标匠平台可在以下情况发生时，向标匠平台就保证金的管理和使用发出指令，处置服务商的保证金：</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>1）如服务商在标匠平台发布服务信息、达成交易、履行交易相关义务过程中，违反国家法律、法规、政策、标匠平台已公示并生效的规则或违反服务商对用户的承诺或被用户申请维权、索赔时，标匠平台可根据其独立的判断，先行使用保证金对用户进行违约赔付。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>2）如服务商违反本协议和/或标匠平台任何规则和/或服务商与标匠平台签署的其他协议，给标匠平台或其关联公司造成任何损失（包括但不限于诉讼赔偿、诉讼费用、律师费用等）的，或服务商的服务质量经标匠平台质量抽检，由第三方检验机构检测证明存在质量瑕疵的，标匠平台可根据其独立的判断，先行从保证金中扣除相当于标匠平台或其关联公司损失（含应退回的货款等）的金额和相当于检测费用的金额，以补偿标匠平台或其关联公司所遭受的损失。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>3）其他根据公示规则、约定或法律规定标匠平台可处置服务商的保证金的情形。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">同时，在上述场景下，标匠平台均可对服务商停止标匠平台全部或部分功能。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【赔付通知】</span> <span style=\"font-family:仿宋\">标匠平台如使用保证金进行任何赔付，将以书面方式（包括但不限于电子邮件、传真等）通知服务商。在向服务商出具的书面通知中，将说明赔付原因及赔付金额。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【委托赔付】如服务商的保证金不足以赔付时，服务商应自行支付额外的赔付金额。在服务商保证金或标匠钱包余额不足时，除法律有明文规定外，标匠平台没有使用自有资金向用户或者任何第三方支付赔偿金、补偿金或其它任何款项的义务，服务商仍应对用户或者其他权利人承担赔付、补偿义务。服务商明确同意如服务商的保证金或标匠钱包不足以赔付，且服务商未自行向用户支付额外的赔付金额时，如标匠平台使用自有资金代服务商向用户进行赔付的，标匠平台有权就赔付金额向服务商进行追偿。此等情形下，标匠平台可向服务商追偿赔付金，包括采用以下方式：</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>1）要求服务商在标匠平台赔付后十四（14）日内向标匠平台偿还与赔付金数额相同的资金，以补偿标匠平台所遭受的损失，并向用户赔付服务商实际需赔付金额中的剩余部分（如有），且在指定时间内补足保证金。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>2）如标匠平台的损失通过上述方式仍无法弥补，则标匠平台可单方面终止向服务商提供标匠平台服务，而且继续要求服务商承担赔偿责任。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>3）标匠平台可采取的其他追偿方式。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">四、履约担保金</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">1、履约担保金的冻结</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【冻结金额】当用户、标匠平台向服务商发起赔付申请或服务商存在履约风险时，服务商授权标匠平台根据平台相关规则作出指令，止付服务商标匠钱包账户余额中相应金额款项作为服务商的履约担保金，相应金额系指：</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>1）交易进行中环节，相应金额等于用户申请维权金额与货款金额差额；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>2）交易完成后环节，相应金额与维权金额等值；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>3）标匠平台代服务商向用户赔付时，相应金额与标匠平台代垫金额等值；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【履约担保金扣减】如服务商的标匠钱包账户余额不足，服务商同意，标匠平台系统自动从服务商保证金中扣减相应金额作为服务商的履约担保金。若扣减后服务商的保证金无法满足服务商服务商账号所在类目的最低保证金金额要求的或用户维权成立，但服务商的保证金或标匠钱包余额均不足赔付退款金额的，适用本协议第四条的相关约定。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">2、履约担保金的使用与解冻</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【履约担保金的使用】服务商同意，当用户完成退款操作或标匠平台完成代垫完成理赔时，服务商授权标匠平台根据平台相关规则作出指令，直接使用履约担保金对外进行赔付。标匠平台如使用履约担保金进行赔付，将以书面方式（包括但不限于电子邮件、传真等）通知服务商。在向服务商出具的书面通知中，将说明赔付原因及赔付金额。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【履约担保金的解冻】如在维权过程中任一环节用户因未及时操作导致系统超时自动完结此项维权申请，或在标匠平台人工介入并判定维权申请不成立时，服务商账户中冻结的相应金额的履约担保金将自行解除止付。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">五、委托支付</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【支付授权】本协议一旦生效，即表示服务商已充分理解并同意向标匠平台作出授权，服务商授权标匠平台发出的指令对服务商标匠钱包账户中的保证金、履约担保金、余额进行相应操作，此授权在本协议有效期间以及本协议明确约定的期间均具有法律约束力。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【指令类型】根据本协议的约定，标匠平台有权作出如下类型的指令：</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>1）保证金、履约担保金的止付、解除止付；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>2）划扣保证金、履约担保金用于执行违约赔付或划扣保证金用于赔偿标匠平台及其关联公司的损失、质检费用；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>3）在保证金不足时，划扣标匠钱包账户余额补充保证金；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>4）在服务商尚未缴纳保证金的情况下，划扣标匠钱包账户余额用于执行违约赔付或赔偿标匠平台及其关联公司的损失、质检费用；</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>5）如标匠平台根据你的委托代服务商向用户进行了赔付，或者因服务商的原因导致标匠平台及其关联公司发生损失或质检费用的，或发生风险事件标匠平台必须采取紧急措施避免损失扩大的，标匠平台可在服务商的标匠钱包账户根据标匠平台规则指令从服务商标匠钱包账户中的划扣/止付同等金额的款项。</span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">六、协议组成、生效及修订</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【协议组成】本协议由以下内容组成：</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\"font-family:仿宋;font-size:16px\">1.&nbsp;</span><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">本协议；</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\"font-family:仿宋;font-size:16px\">2.&nbsp;</span><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">其他所有标匠平台已经发布或后续发布与</span>“用户保障服务”相关的标匠平台规则及其相关的介绍、通知、说明、解读等文案（以下简称“用户保障规则”）。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\">“用户保障规则”为本协议不可分割的组成部分，自发布之日起生效，与协议正文具有同等法律效力。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【协议生效】无论服务商事实上是否在向用户提供用户保障服务之前认真阅读了本协议内容，只要服务商在线点击签署了本协议，本协议即生效则本协议即并对服务商产生约束，届时，服务商不应得以未阅读本协议的内容或者未获得标匠平台对服务商问询的解答等理由，主张本协议无效，或要求撤销。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">提示：服务商应当在实际向其他标匠平台注册用户（以下简称</span>“用户”）提供用户保障服务之前应当认真阅读本协议及相关用户保障规则内容，对于协议及相关用户保障规则中以粗体及下划线标注的内容，服务商应重点阅读。</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"text-decoration:underline;\"><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">如服务商对本协议（含新发布用户保障规则）有任何疑问，应向标匠平台客服咨询。如果服务商不同意本协议的内容，服务商应立即结束平台接单或停止服务商账号经营活动。</span></span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【协议修订】标匠平台可根据法律及业务发展需要不时地制订、修改本协议及</span>/或用户保障规则（以下简称“变更事项”），并以网站公示的方式进行公告，不再单独通知服务商。如服务商不同意相关变更，服务商有权于变更事项确定的生效日前联系标匠平台反馈意见。如反馈意见得以采纳，标匠平台将酌情调整变更事项。如服务商对已生效的变更事项仍不同意的，应当立即停止服务商账号经营活动，变更事项对服务商不产生效力；服务商继续进行任何服务商账号经营活动，包括但不限于维持所发布的服务信息、继续对订单进行报价，则表示服务商同意已生效的变更事项。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【协议冲突】本协议作为《标匠平台服务协议》之补充协议，本协议未约定内容，以《标匠平台服务商入驻服务协议》约定为准；本协议与《标匠平台服务商入驻服务协议》不一致者，以本协议为准。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">七、协议终止</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【终止的情形】出现以下情况时，本协议终止，本协议终止后，服务商将无法继续进行任何服务商账号经营活动：</span></span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>1）自然终止：如服务商在线签署的《标匠平台入驻服务服务协议》因任何原因终止，则本协议将同时终止。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>2）通知解除：标匠平台可提前十五（15）天以书面通知的方式终止本协议。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>3）标匠平台单方解除权：如服务商违反本协议中的承诺与保证或标匠平台的规则，标匠平台可立即终止本协议，且按有关规则对服务商进行惩罚。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>4）本协议（含规则）变更时，服务商明示并通知标匠平台不愿接受新的用户保障服务协议，则本协议自标匠平台收到服务商通知之日起自动终止。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">（</span>5）本协议规定的其他协议终止条件发生或实现，导致本协议终止。</span></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">【终止的影响】无论本协议因何原因终止，在协议终止前的行为所导致的任何赔偿和责任，服务商必须完全且独立地承担责任。即使本协议终止，标匠平台及其关联公司仍可根据本协议的规定处理，包括但不限于使用服务商标匠钱包账户中的保证金、余额来处理因本协议有效期内发生的交易所导致的用户索赔。</span></span></p><p style=\"text-indent:28px;line-height:33px\"><strong><span style=\"font-family: 仿宋;font-size: 16px\"><span style=\"font-family:仿宋\">八、争议解决</span></span></strong></p><p style=\"text-indent:28px;line-height:33px\"><span style=\";font-family:仿宋;font-size:16px\"><span style=\"font-family:仿宋\">本协议之解释与适用，以及与本协议有关的争议，均应依照中华人民共和国大陆地区法律予以处理，并以标匠平台所在地人民法院为管辖法院。</span></span></p><p><br/></p>', '4');

-- ----------------------------
-- Table structure for bj_article
-- ----------------------------
DROP TABLE IF EXISTS `bj_article`;
CREATE TABLE `bj_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章逻辑ID',
  `title` varchar(128) NOT NULL COMMENT '文章标题',
  `cate_id` int(11) NOT NULL DEFAULT '1' COMMENT '文章类别',
  `photo` varchar(64) DEFAULT '' COMMENT '文章图片',
  `remark` varchar(256) DEFAULT '' COMMENT '文章描述',
  `keyword` varchar(32) DEFAULT '' COMMENT '文章关键字',
  `content` text NOT NULL COMMENT '文章内容',
  `views` int(11) NOT NULL DEFAULT '1' COMMENT '浏览量',
  `status` tinyint(1) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '文章类型',
  `is_tui` int(1) DEFAULT '0' COMMENT '是否推荐',
  `from` varchar(16) NOT NULL DEFAULT '' COMMENT '来源',
  `writer` varchar(64) NOT NULL COMMENT '作者',
  `ip` varchar(16) DEFAULT NULL,
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `a_title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='文章表';

-- ----------------------------
-- Records of bj_article
-- ----------------------------
INSERT INTO `bj_article` VALUES ('5', '利用照明增加商店门面的美感', '0', '20170727\\d982f9f5e15682c8c91e70f5b2ff1527.jpg', '外部照明主要指人工光源色彩的使用与搭配，它不仅可以照亮店门和店前环境，而且能渲染商店气氛，烘托环境，增加店铺门面的形式美。外部灯光的设计主要包括招牌照明、橱窗照明和外部照明的设计。', '', '<section data-role=\"outer\" label=\"Powered by 135editor.com\" style=\"margin: 0px; padding: 0px; font-family: 微软雅黑; font-size: 16px; white-space: normal;\"><section style=\"margin: 0px; padding: 0px; font-size: medium;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0.5em 0px; padding: 0px; text-align: center;\"><section class=\"\" style=\"margin: 0px; padding: 10px; border-color: rgb(204, 204, 204); box-shadow: rgb(102, 102, 102) 3.53553px 3.53553px 8px; border-width: 8px; border-style: solid; box-sizing: border-box;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"\" style=\"margin: 0px; padding: 0px; text-align: justify; color: rgb(84, 81, 81);\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\">外部照明主要指人工光源色彩的使用与搭配，它不仅可以照亮店门和店前环境，而且能渲染商店气氛，烘托环境，增加店铺门面的形式美。外部灯光的设计主要包括招牌照明、橱窗照明和外部照明的设计。</p></section></section></section></section></section></section><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\"><br style=\"margin: 0px; padding: 0px;\"/></p></section></section></section><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 10px 0px; padding: 0px; text-align: center; transform: translate3d(0px, 0px, 0px);\"><section class=\"\" style=\"margin: 0px; padding: 0px; display: inline-block; vertical-align: middle; width: 62.9861px;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"></section></section></section><section class=\"\" style=\"margin: 0px; padding: 0px; display: inline-block; vertical-align: middle; width: 429.549px;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"90068\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section data-width=\"100%\" style=\"margin: 0px; padding: 0px; width: 429.549px;\"><section style=\"margin: 0px; padding: 0px; display: inline-block;\"><section style=\"margin: 0px; padding: 0px; display: flex;\"><section style=\"margin: 0px; padding: 0px;\"><img src=\"https://mmbiz.qlogo.cn/mmbiz_png/fgnkxfGnnkRLI7MTliaNGhvhLRsGkLpoymq30ibwRtUJ0OSmXZ37wibEVwWblMj88MLAMOdicg8qTBkLGAgBda5Njg/0.png\" class=\"\" data-ratio=\"0.45\" data-w=\"80\" style=\"margin: 0px; padding: 0px; max-width: 100%; height: 30px !important; display: block; width: 40px;\"/></section><section class=\"135brush\" data-brushtype=\"text\" style=\"margin: 0px 10px; padding: 0px 10px; height: 30px; line-height: 30px; font-size: 16px; background-color: rgb(133, 172, 205); color: rgb(255, 255, 255); box-sizing: border-box;\">招牌照明</section><section style=\"margin: 0px; padding: 0px;\"><img src=\"https://mmbiz.qlogo.cn/mmbiz_png/fgnkxfGnnkRLI7MTliaNGhvhLRsGkLpoyibDO06MaHk9PiaP6U3AJaXNXCGdssvaH8ZIDKQRIeQyg2wUtfxuiaoHVQ/0.png\" class=\"\" data-ratio=\"0.45\" data-w=\"80\" style=\"margin: 0px; padding: 0px; max-width: 100%; height: 30px !important; display: block; width: 40px;\"/></section></section></section></section></section></section></section></section></section><section class=\"\" style=\"margin: 0px; padding: 0px; display: inline-block; vertical-align: middle; width: 62.9861px;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"></section></section></section></section></section><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 10px 0px; padding: 0px; text-align: center;\"><section class=\"\" style=\"margin: 0px; padding: 10px; display: inline-block; width: 555.556px; border-width: 2px; border-style: dotted; border-color: rgb(192, 200, 209); box-sizing: border-box;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51);\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\">招牌的明亮醒目，一般是通过霓虹灯的装饰达到的。霓虹灯不仅能照亮招牌，能增加店铺在夜间的可见度，同时，还能制造热闹和欢快的气氛。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\">霓虹灯的装饰一定要新颖、别具一格，可设计成各种形状，采用多种颜色。为了使招牌醒目，灯光颜色一般以单色和刺激性较强的红、绿、白等颜色为主，突出简洁、明快、醒目的特点。有时，灯光的巧妙变化和闪烁并辅以动态结构的字体，能产生动态的感觉，这种照明方式能活跃气氛，更富有吸引力，可收到较好的心理效果。</p></section></section></section></section></section></section><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\"><br style=\"margin: 0px; padding: 0px;\"/></p></section></section></section><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 10px 0px; padding: 0px; text-align: center; transform: translate3d(0px, 0px, 0px);\"><section class=\"\" style=\"margin: 0px; padding: 0px; display: inline-block; vertical-align: middle; width: 62.9861px;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"></section></section></section><section class=\"\" style=\"margin: 0px; padding: 0px; display: inline-block; vertical-align: middle; width: 429.549px;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"90068\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section data-width=\"100%\" style=\"margin: 0px; padding: 0px; width: 429.549px;\"><section style=\"margin: 0px; padding: 0px; display: inline-block;\"><section style=\"margin: 0px; padding: 0px; display: flex;\"><section style=\"margin: 0px; padding: 0px;\"><img src=\"https://mmbiz.qlogo.cn/mmbiz_png/fgnkxfGnnkRLI7MTliaNGhvhLRsGkLpoymq30ibwRtUJ0OSmXZ37wibEVwWblMj88MLAMOdicg8qTBkLGAgBda5Njg/0.png\" class=\"\" data-ratio=\"0.45\" data-w=\"80\" style=\"margin: 0px; padding: 0px; max-width: 100%; height: 30px !important; display: block; width: 40px;\"/></section><section class=\"135brush\" data-brushtype=\"text\" style=\"margin: 0px 10px; padding: 0px 10px; height: 30px; line-height: 30px; font-size: 16px; background-color: rgb(133, 172, 205); color: rgb(255, 255, 255); box-sizing: border-box;\">橱窗照明</section><section style=\"margin: 0px; padding: 0px;\"><img src=\"https://mmbiz.qlogo.cn/mmbiz_png/fgnkxfGnnkRLI7MTliaNGhvhLRsGkLpoyibDO06MaHk9PiaP6U3AJaXNXCGdssvaH8ZIDKQRIeQyg2wUtfxuiaoHVQ/0.png\" class=\"\" data-ratio=\"0.45\" data-w=\"80\" style=\"margin: 0px; padding: 0px; max-width: 100%; height: 30px !important; display: block; width: 40px;\"/></section></section></section></section></section></section></section></section></section><section class=\"\" style=\"margin: 0px; padding: 0px; display: inline-block; vertical-align: middle; width: 62.9861px;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"></section></section></section></section></section><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 10px 0px; padding: 0px; text-align: center;\"><section class=\"\" style=\"margin: 0px; padding: 10px; display: inline-block; width: 555.556px; border-width: 2px; border-style: dotted; border-color: rgb(192, 200, 209); box-sizing: border-box;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51);\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\">光和色是密不可分的，按舞台灯光设计的方法，为橱窗配上适当的顶灯和角灯，不但能起到一定的照明效果，而且还能使橱窗原有的色彩产生戏剧性的变化，看起来很有趣，给人以新鲜感。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\">橱窗照明不仅要美，同时还必须满足强化商品视觉效果的诉求。橱窗内的亮度必须比店铺卖场的亮度高出2~4倍，但不应使用太强的光，以免冲淡了商品对顾客的吸引力。橱窗的灯光要色彩柔和、富有情调。同时，还可以采用下照灯、吊灯等装饰性灯来照明，强调商品的特色，尽可能在反映商品本来面目的基础上，给人以良好的心理感觉。</p></section></section></section></section></section></section><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\"><br style=\"margin: 0px; padding: 0px;\"/></p></section></section></section><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 10px 0px; padding: 0px; text-align: center; transform: translate3d(0px, 0px, 0px);\"><section class=\"\" style=\"margin: 0px; padding: 0px; display: inline-block; vertical-align: middle; width: 62.9861px;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"></section></section></section><section class=\"\" style=\"margin: 0px; padding: 0px; display: inline-block; vertical-align: middle; width: 429.549px;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"90068\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section data-width=\"100%\" style=\"margin: 0px; padding: 0px; width: 429.549px;\"><section style=\"margin: 0px; padding: 0px; display: inline-block;\"><section style=\"margin: 0px; padding: 0px; display: flex;\"><section style=\"margin: 0px; padding: 0px;\"><img src=\"https://mmbiz.qlogo.cn/mmbiz_png/fgnkxfGnnkRLI7MTliaNGhvhLRsGkLpoymq30ibwRtUJ0OSmXZ37wibEVwWblMj88MLAMOdicg8qTBkLGAgBda5Njg/0.png\" class=\"\" data-ratio=\"0.45\" data-w=\"80\" style=\"margin: 0px; padding: 0px; max-width: 100%; height: 30px !important; display: block; width: 40px;\"/></section><section class=\"135brush\" data-brushtype=\"text\" style=\"margin: 0px 10px; padding: 0px 10px; height: 30px; line-height: 30px; font-size: 16px; background-color: rgb(133, 172, 205); color: rgb(255, 255, 255); box-sizing: border-box;\">外部照明</section><section style=\"margin: 0px; padding: 0px;\"><img src=\"https://mmbiz.qlogo.cn/mmbiz_png/fgnkxfGnnkRLI7MTliaNGhvhLRsGkLpoyibDO06MaHk9PiaP6U3AJaXNXCGdssvaH8ZIDKQRIeQyg2wUtfxuiaoHVQ/0.png\" class=\"\" data-ratio=\"0.45\" data-w=\"80\" style=\"margin: 0px; padding: 0px; max-width: 100%; height: 30px !important; display: block; width: 40px;\"/></section></section></section></section></section></section></section></section></section><section class=\"\" style=\"margin: 0px; padding: 0px; display: inline-block; vertical-align: middle; width: 62.9861px;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"></section></section></section></section></section><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 10px 0px; padding: 0px; text-align: center;\"><section class=\"\" style=\"margin: 0px; padding: 10px; display: inline-block; width: 555.556px; border-width: 2px; border-style: dotted; border-color: rgb(192, 200, 209); box-sizing: border-box;\"><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"\" style=\"margin: 0px; padding: 0px;\"><section class=\"\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51);\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\">外部照明是霓虹灯的作用在现代条件下的一种发展，一般是装饰在店门前的街道上或店门周围的墙壁上，主要起渲染、烘托气氛的作用。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both; text-align: center;\">如许多店门前拉起的灯网，有些甚至用多色灯把店前的树、花坛等公共设施装饰起来。再如，制成各种反映本店经营内容的多色造型灯，装饰字店前的墙壁或招牌周围，以形成浓烈的购物气氛。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\">外部照明既要与周围环境相协调，也应与店铺的经营特色一致，才能给顾客和谐的美感。若处在繁华的商业街，则应突出与众不同的特色；地处较为偏</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\">僻的地区，则应突出大众化，即使简单醒目的装饰也能吸引住过往行人。</p></section></section></section></section></section></section><section class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><p style=\"margin-top: 10px; margin-bottom: 10px; padding: 0px; clear: both; text-align: center;\"><br style=\"margin: 0px; padding: 0px;\"/></p><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"89508\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section style=\"margin: 0px; padding: 0px; text-align: center;\"><section style=\"margin: 0px; padding: 0px; display: inline-block; width: 240px;\"><img class=\"\" data-ratio=\"0.08185840707964602\" src=\"https://mmbiz.qlogo.cn/mmbiz_png/fgnkxfGnnkTicsrX1MficjcdwBlzDp9Jq7SckoB5GWmdPEf2MDnXHiaaSJZaW5LvGgPp02pOgtNibDoQLb1qpxWuHg/0.png\" data-w=\"452\" title=\"隆隆夏日海浪分割线\" style=\"margin: 0px; padding: 0px; max-width: 100%; height: auto !important; width: 240px; display: inline;\"/></section></section></section></section></section></section><p style=\"margin-top: 10px; margin-bottom: 10px; padding: 0px; clear: both; font-family: 微软雅黑; font-size: medium; white-space: normal; text-align: center;\"><br style=\"margin: 0px; padding: 0px;\"/></p><p style=\"margin-top: 10px; margin-bottom: 10px; padding: 0px; clear: both; font-family: 微软雅黑; font-size: medium; white-space: normal; text-align: center;\"><br style=\"margin: 0px; padding: 0px;\"/></p><p><br/></p>', '1', '1', '1', '1', '', '', null, '1501149574', '1501149574');
INSERT INTO `bj_article` VALUES ('12', '商场、店铺装饰材料的选用', '21', '20170926\\1e147c8f4a840b11e334dbbcdcf3e975.jpeg', '店铺内部装饰中，装饰材料质地的不同会产生不同的效果。质感粗糙的使人感到稳重、沉着和粗狂，细滑的表面质感则使人感觉轻巧精致。正确的选用装饰材料，能增加商场的艺术表现力，在质感处理上要考虑质感均衡。', '', '<section data-role=\"outer\" label=\"Powered by 135editor.com\" style=\"margin: 0px; padding: 0px; font-size: 16px; white-space: normal; font-family: 微软雅黑;\"><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"24\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"layout\" style=\"margin: 10px auto; padding: 0px;\"><p style=\"margin: 3px; padding: 15px; color: rgb(62, 62, 62); line-height: 24px; box-shadow: rgb(170, 170, 170) 0px 0px 3px; border: 2px solid rgb(240, 240, 240); box-sizing: border-box; text-align: center;\"><strong><span style=\"margin: 0px; padding: 0px; color: rgb(147, 137, 83); font-size: 24px;\">商场、店铺装饰材料的选用</span></strong></p><p style=\"margin: 3px; padding: 15px; color: rgb(62, 62, 62); line-height: 24px; box-shadow: rgb(170, 170, 170) 0px 0px 3px; border-width: 2px; border-style: solid; border-color: rgb(240, 240, 240); box-sizing: border-box;\"><span style=\"margin: 0px; padding: 0px; color: rgb(147, 137, 83); font-size: 15px;\">店铺内部装饰中，装饰材料质地的不同会产生不同的效果。质感粗糙的使人感到稳重、沉着和粗狂，细滑的表面质感则使人感觉轻巧精致。正确的选用装饰材料，能增加商场的艺术表现力，在质感处理上要考虑质感均衡。一般来说，光滑的材料可以反射光线，粗糙的材料可以吸收光线；空间大的似乎以质感粗一点的材料为佳，而空间小的则以光滑质感材料为佳；大面积的墙面可以粗一些，重点装修的墙面则要精细一些，以取得对比效果。</span></p></section></section><section data-role=\"paragraph\" class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\"><br style=\"margin: 0px; padding: 0px;\"/></p></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"86005\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"135brush\" style=\"margin: 0px 0px 16px; padding: 16px; overflow: auto; font-size: 15px; line-height: 1.45; border-radius: 3px; word-wrap: normal; color: rgb(51, 51, 51); box-sizing: border-box; background-color: rgb(247, 247, 247);\"><span style=\"margin: 0px; padding: 0px;\">建筑市场上的装饰材料有多种多样，金属、陶瓷、砖石、塑料、木材、织物、皮革、玻璃、橡胶等，它们都具有不同的质地。</span></section></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"86005\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"135brush\" style=\"margin: 0px 0px 16px; padding: 16px; overflow: auto; font-size: 15px; line-height: 1.45; border-radius: 3px; word-wrap: normal; color: rgb(51, 51, 51); box-sizing: border-box; background-color: rgb(247, 247, 247);\"><span style=\"margin: 0px; padding: 0px;\">装饰材料的软与硬也是一种对比。纤维织物具有柔软的触感，如纯羊毛织物、纯棉织物，它们都有柔软的特点，常作为轻型的蒙面材料或窗帘。玻璃纤维织物，易于保养，能防火，线条挺拔，也是很好的装饰材料。硬的材料如砖石、金属、玻璃等耐磨耐用，不变形。硬质材料多数有很好的光洁度，晶莹明亮的硬材使店内很有生气。</span></section></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"86005\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section class=\"135brush\" style=\"margin: 0px 0px 16px; padding: 16px; overflow: auto; font-size: 15px; line-height: 1.45; border-radius: 3px; word-wrap: normal; color: rgb(51, 51, 51); box-sizing: border-box; background-color: rgb(247, 247, 247);\"><span style=\"margin: 0px; padding: 0px;\">材料具有光泽与透明度，一般经过精细加工的材料具有很好的光泽，如抛光金属、玻璃、磨光黄岗岩、大理石、瓷砖等，通过镜面表面的反射使室内空间感扩大和延伸，同时能反映出多变的色彩，是丰富与活跃店内气氛的好材料。</span></section></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"89817\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section data-role=\"paragraph\" class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\"><br style=\"margin: 0px; padding: 0px;\"/></p></section><section data-id=\"us503369\" class=\"_135editor\" data-color=\"rgb(117, 117, 118)\" data-custom=\"rgb(117, 117, 118)\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section data-width=\"100%\" style=\"margin: 0px; padding: 0px; width: 555.556px;\"><section style=\"margin: 10px auto; padding: 0px; width: 200px; height: 46px; background-image: url(\" background-repeat:=\"\" background-size:=\"\" overflow:=\"\"><section class=\"135brush\" data-brushtype=\"text\" style=\"margin: 10px 0px 0px 10px; padding: 0px; width: 180px; height: 20px; color: rgb(255, 255, 255); text-align: center; line-height: 20px;\">建筑空间</section></section></section></section></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"86034\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section style=\"margin: 10px 0px; padding: 0px 3px; box-sizing: border-box; text-align: justify;\"><section style=\"margin: -3px 0px 0px -3px; padding: 0px; width: 6px; height: 6px; border-radius: 100%; box-sizing: border-box; color: rgb(254, 254, 254); background-color: rgb(141, 160, 198);\"></section><section style=\"margin: -2px 0px 0px; padding: 0px; height: 3em; border-right: 1px solid rgb(141, 160, 198); border-top: 1px solid rgb(141, 160, 198); box-sizing: border-box;\"></section><section style=\"margin: 0px -2px 0px 0px; padding: 0px; width: 6px; height: 6px; float: right; border-radius: 100%; box-sizing: border-box; color: rgb(254, 254, 254); background-color: rgb(141, 160, 198);\"></section><section class=\"135brush\" data-width=\"100%\" style=\"margin: -3em 0px 0px; padding: 0px 15px 5px; display: inline-block; vertical-align: top; width: 549.583px; box-sizing: border-box;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">建筑空间是由各个方面围合而成的，一般商店内部空间大多呈六面体，由天花、地面与墙面组成。处理好这三部分有助于加强店内空间的完整与统一。商店建筑中通常采用木天花、石膏板天花、金属板天花、矿棉板或玻璃纤维板天花等。</span></section><section style=\"margin: -2.9em 0px 0px; padding: 0px; box-sizing: border-box;\"><section style=\"margin: 0px 0px 0px -3px; padding: 0px; width: 6px; height: 6px; border-radius: 100%; box-sizing: border-box; color: rgb(254, 254, 254); background-color: rgb(141, 160, 198);\"></section><section style=\"margin: 0px; padding: 0px; height: 3em; border-left: 1px solid rgb(141, 160, 198); border-bottom: 1px solid rgb(141, 160, 198); box-sizing: border-box;\"></section></section></section></section><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;木天花------一般为木板或胶合板，它可以是狭长条板或大块板，也可以用木板组成蜂窝状顶棚。木天花加工方便，材质轻盈，适合于中小型商店的天花装饰。</span></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;石膏板天花-----石膏板表面有平板与凹凸板之分，它可组合成各种图案，与灯具配合有较强的艺术表现力。</span></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;金属板吊顶天花------这是一种华丽的装饰材料，造型多样，品种繁多，但价格较贵。</span></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;矿棉板或玻璃纤维板天花------这两种板材具有耐火、防腐蚀、质轻的特点，而且吸音效果较好，适用于噪声较大的大型商场。 &nbsp;&nbsp;&nbsp;&nbsp;</span></p><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"85985\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; clear: both; max-width: 100%; min-height: 1em; white-space: pre-wrap; border-color: rgb(160, 160, 160); border-top-width: 1px; color: transparent; border-top-style: dashed; line-height: normal;\">本文由“135编辑器”提供技术支持</p></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"89817\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section data-id=\"us503369\" class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section data-width=\"100%\" style=\"margin: 0px; padding: 0px; width: 555.556px;\"><section style=\"margin: 10px auto; padding: 0px; width: 200px; height: 46px; background-image: url(\" background-repeat:=\"\" background-size:=\"\" overflow:=\"\"><section class=\"135brush\" data-brushtype=\"text\" style=\"margin: 10px 0px 0px 10px; padding: 0px; width: 180px; height: 20px; color: rgb(255, 255, 255); text-align: center; line-height: 20px;\">地面</section></section></section></section></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"86034\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section style=\"margin: 10px 0px; padding: 0px 3px; box-sizing: border-box; text-align: justify;\"><section style=\"margin: -3px 0px 0px -3px; padding: 0px; width: 6px; height: 6px; border-radius: 100%; box-sizing: border-box; color: rgb(254, 254, 254); background-color: rgb(141, 160, 198);\"></section><section style=\"margin: -2px 0px 0px; padding: 0px; height: 3em; border-right: 1px solid rgb(141, 160, 198); border-top: 1px solid rgb(141, 160, 198); box-sizing: border-box;\"></section><section style=\"margin: 0px -2px 0px 0px; padding: 0px; width: 6px; height: 6px; float: right; border-radius: 100%; box-sizing: border-box; color: rgb(254, 254, 254); background-color: rgb(141, 160, 198);\"></section><section class=\"135brush\" data-width=\"100%\" style=\"margin: -3em 0px 0px; padding: 0px 15px 5px; display: inline-block; vertical-align: top; width: 549.583px; box-sizing: border-box;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">地面是空间的底面，由于它以水平面的出现，地面处理可采用不同的建筑材料，如瓷砖、石材、木板、塑料地板、地毯等。</span></section><section style=\"margin: -2.9em 0px 0px; padding: 0px; box-sizing: border-box;\"><section style=\"margin: 0px; padding: 0px; height: 3em; border-left: 1px solid rgb(141, 160, 198); border-bottom: 1px solid rgb(141, 160, 198); box-sizing: border-box;\"></section></section></section></section><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;瓷砖地面------瓷砖是非常耐用的材料，色彩丰富。石材可分为大理石、花岗石、砂岩、石板等。大理石，磨光后会发出美丽的光泽，色彩花纹极为丰富，是高档的地面材料；花岗岩，石质坚硬，色彩统一，光洁度极好，是高档的豪华型地面材料；砂岩和石板风格粗狂，色彩沉稳，也是很好的地面材料。 &nbsp;&nbsp;</span></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;木地板-----以木质材料为主，能保温，弹性适当，纹质优美。木板有单层及复合层之分。 &nbsp;&nbsp;&nbsp;&nbsp;塑料地板-----它的厚度为3~5毫米，平面尺寸为300毫米*300毫米。塑料地板色彩丰富，图案简单，有一定弹性，施工很容易，价格也很便宜，但它的强度和耐久性较差。 &nbsp;</span></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;地毯-----商店采用的地毯大多为化纤地毯，它的装饰性强，保温和吸音性良好。可用于较高的商店中。</span></p><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"85985\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; clear: both; max-width: 100%; min-height: 1em; white-space: pre-wrap; border-color: rgb(160, 160, 160); border-top-width: 1px; color: transparent; border-top-style: dashed; line-height: normal;\">本文由“135编辑器”提供技术支持</p></section><section data-role=\"paragraph\" class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both;\"><br style=\"margin: 0px; padding: 0px;\"/></p></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"89817\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section data-id=\"us503369\" class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section data-width=\"100%\" style=\"margin: 0px; padding: 0px; width: 555.556px;\"><section style=\"margin: 10px auto; padding: 0px; width: 200px; height: 46px; background-image: url(\" background-repeat:=\"\" background-size:=\"\" overflow:=\"\"><section class=\"135brush\" data-brushtype=\"text\" style=\"margin: 10px 0px 0px 10px; padding: 0px; width: 180px; height: 20px; color: rgb(255, 255, 255); text-align: center; line-height: 20px;\" dir=\"ltr\">墙面</section></section></section><section data-width=\"100%\" style=\"margin: 0px; padding: 0px; clear: both; width: 555.556px;\"></section></section></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"86034\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section style=\"margin: 10px 0px; padding: 0px 3px; box-sizing: border-box; text-align: justify;\"><section style=\"margin: -3px 0px 0px -3px; padding: 0px; width: 6px; height: 6px; border-radius: 100%; box-sizing: border-box; color: rgb(254, 254, 254); background-color: rgb(141, 160, 198);\"></section><section style=\"margin: -2px 0px 0px; padding: 0px; height: 3em; border-right: 1px solid rgb(141, 160, 198); border-top: 1px solid rgb(141, 160, 198); box-sizing: border-box;\"></section><section style=\"margin: 0px -2px 0px 0px; padding: 0px; width: 6px; height: 6px; float: right; border-radius: 100%; box-sizing: border-box; color: rgb(254, 254, 254); background-color: rgb(141, 160, 198);\"></section><section class=\"135brush\" data-width=\"100%\" style=\"margin: -3em 0px 0px; padding: 0px 15px 5px; display: inline-block; vertical-align: top; width: 549.583px; box-sizing: border-box;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">墙面是组成空间的重要因素之一，它作为空间的侧面，以垂直形式出现，对人的视觉影响很大。在墙面处理中，应使它与门窗、灯具和通风孔洞结合起来，以取得完整的效果。墙面的材料较多，如木质壁材、涂料、油漆、墙纸等。</span></section><section style=\"margin: -2.9em 0px 0px; padding: 0px; box-sizing: border-box;\"><section style=\"margin: 0px 0px 0px -3px; padding: 0px; width: 6px; height: 6px; border-radius: 100%; box-sizing: border-box; color: rgb(254, 254, 254); background-color: rgb(141, 160, 198);\"></section><section style=\"margin: 0px; padding: 0px; height: 3em; border-left: 1px solid rgb(141, 160, 198); border-bottom: 1px solid rgb(141, 160, 198); box-sizing: border-box;\"></section></section></section></section><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;木质壁材-----木质建材可分合成板、纤维板、木板。合成板就是胶合板，它富于自然色彩，表面质感较好，是高级墙面装修材料。 &nbsp;</span></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;涂料-----它的种类繁多、色彩丰富。涂料干燥后变成薄膜，色彩和表面形式可自由选择。 &nbsp;&nbsp;&nbsp;&nbsp;</span></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;油漆-----这是一种使用方便的墙面涂层，它有较好的防水性能。 &nbsp;</span></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; clear: both; color: rgb(62, 62, 62); text-align: justify; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; font-size: 15px;\">&nbsp;&nbsp;&nbsp;&nbsp;墙纸-----墙纸是贴在墙壁上的装饰材料，它可分为编制墙布和塑料墙纸两种。墙纸是最常用的墙面材料，色彩、图案、质地及多，可随时改换。</span></p><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"85985\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><p style=\"margin-top: 0.5em; margin-bottom: 0.5em; padding: 0px; clear: both; max-width: 100%; min-height: 1em; white-space: pre-wrap; border-color: rgb(160, 160, 160); border-top-width: 1px; color: transparent; border-top-style: dashed; line-height: normal;\">本文由“135编辑器”提供技术支持</p></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"89816\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"></section><section class=\"_135editor\" data-tools=\"135编辑器\" data-id=\"89816\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section data-id=\"us503351\" class=\"_135editor\" style=\"margin: 0px; padding: 0px; border-width: 0px; border-style: none; border-color: initial; box-sizing: border-box;\"><section style=\"margin: 0px; padding: 10px; box-sizing: border-box;\"><section data-width=\"100%\" style=\"margin: 0px; padding: 0px; width: 535.556px; height: auto; background-color: rgb(68, 127, 158); overflow: hidden; border-radius: 20px; box-sizing: border-box;\"><section style=\"margin: 0px; padding: 20px; box-sizing: border-box;\"><section data-width=\"100%\" style=\"margin: 0px; padding: 0px; width: 495.556px; height: auto; border-radius: 20px; border-width: 2px; border-style: dashed; border-color: rgb(255, 255, 255); box-sizing: border-box;\"><section style=\"margin: 0px; padding: 15px; font-size: 14px; color: rgb(255, 255, 255); box-sizing: border-box;\"><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; clear: both; text-align: center;\">商场的空间装饰是商场顶面、墙面和地面的组合体，不但影响商场的气氛和格调，而且与电器设备和灯光有密切的关系。它能给人们完整美的空间享受，创造出一个引人入胜的购物环境。</p></section></section></section></section></section></section></section></section><p><br/></p>', '1', '0', '1', '1', '', '', null, '1501203318', '1506393957');
INSERT INTO `bj_article` VALUES ('14', '珠宝店面设计装修如何做到更好', '21', '14a5d201710271540581287.JPG', '珠宝店面的设计装修要想达到理想的效果设计装修的时候就要做好以下几个方面的，只有注重各个方面的细节才能够为我们带来想要的效果。', '装修', '<p><br/></p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(12, 12, 12); background-color: rgb(255, 255, 255);\"><strong><span style=\"font-size: 24px; background-color: rgb(255, 255, 255);\">珠宝店面设计装修如何做到更好</span></strong></span></p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">珠宝店面的设计装修对我们店的经营有着至关重要的作用，店面设计要具有符合商业性的规则，在现在的都市中只有具有吸引力的店铺才会吸引主人们的眼球，只有能吸引主人们才能抓住我们潜在的客户；只有这样我们的生意才会更好。</p><p style=\"text-align:center\"><br/></p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><img id=\"img_data\" height=\"1\" style=\"float: left; margin-left: 50px; margin-top: -10px; width: 1px; height: 1px;\" src=\"http://192.168.0.253/newbj/public/uploads/images/20170923/244aebce0ae9a1ee31db4ce338862820.JPG\" width=\"1\"/></p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">珠宝店面的设计装修要想达到理想的效果设计装修的时候就要做好以下几个方面的，只有注重各个方面的细节才能够为我们带来想要的效果。</p><p style=\"text-align:center\"><img src=\"/ueditor/php/upload/image/20170926/1506388772400927.jpg\" title=\"1506388772400927.jpg\" alt=\"20140531083700492.jpg\"/></p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">一、珠宝店面设计要造型要和周围的事物相吻合，一定要禁忌不要打破环境的和谐美，其造型和风格的追求的要与周围的事物相统一，主题要符合自己产品经营的理念，要鲜明富有层次感和韵味。</p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">二、珠宝店面色彩设计要符合店铺对完美的追求，在店面设计时要充分利用好色彩对比度方面的技巧追求一种和谐的美感；色彩的搭配要做到加强造型的艺术特点，丰富造型的效果，创造较理想的视觉魅力。</p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">三、珠宝店面的设计要有属于自己的东西，店面招牌和标志的设计要能够代表自己店铺和经营产品的性质，店面的设计是我们对外打广告和宣传的一种重要处境。</p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">四、珠宝店面设计装修要充分组织好店面空间的规化合理的去利用好每一寸空间，空间设计应具有开敞、灵活、方便购物并可供人稍事休憩及观览的功能特点。</p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\"><img src=\"http://p3.pstatp.com/large/1c5d0004851231f5bf33\" img_width=\"600\" img_height=\"447\" alt=\"珠宝店面设计装修如何做到更好\" inline=\"0\" style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; border-style: none; max-width: 100%; display: block; margin: 10px auto;\"/></p><p style=\"-webkit-tap-highlight-color: transparent; box-sizing: border-box; margin-top: 16px; margin-bottom: 16px; padding: 0px; color: rgb(34, 34, 34); font-family: &#39;PingFang SC&#39;, &#39;Hiragino Sans GB&#39;, &#39;Microsoft YaHei&#39;, &#39;WenQuanYi Micro Hei&#39;, &#39;Helvetica Neue&#39;, Arial, sans-serif; font-size: 16px; line-height: 28px; white-space: normal; background-color: rgb(255, 255, 255);\">现在的人们对环境的要求变的越来越高，只有温馨舒适能够让人心情愉悦的环境才会被人所接受。</p><p><span style=\"background-color: rgb(255, 255, 255);\"></span><br/></p>', '1', '1', '1', '1', '', '', null, '1506130892', '1509090063');
INSERT INTO `bj_article` VALUES ('16', '珠宝店铺装修公司如何选择？', '21', '20170923\\4d670b4a7850144a706051ce809f69ab.jpg', '珠宝店面设计装修，选择装修公司可谓重中之重。大多数珠宝商在选择装修公司时是盲目的，并且往往在签订合同前被装修公司的花言巧语所迷惑，以为只要给了钱，就可以做甩手掌柜，到期就会收获一个崭新的店铺，岂不知在签订合同之后，有些装修公司的态度就会发生巨大的转变。那么怎么样才能选到一家好的装修公司呢？', '装修', '<p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);\">　<span style=\"font-size: 20px;\">　珠宝店铺装修公司如何选择？</span></p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\">一个珠宝店的店面设计风格，往往是一个珠宝品牌内涵的体现。如何让店面设计与店铺主题相呼应呢？今天就跟着我们商展汇君一起来涨姿势啦！</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);\"><img src=\"/ueditor/php/upload/image/20170923/1506133256110793.jpg\" style=\"border: 0px; margin: 10px auto 0px; padding: 0px; display: block; max-width: 100%; height: auto;\"/></p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\">　　珠宝店面设计装修，选择装修公司可谓重中之重。大多数珠宝商在选择装修公司时是盲目的，并且往往在签订合同前被装修公司的花言巧语所迷惑，以为只要给了钱，就可以做甩手掌柜，到期就会收获一个崭新的店铺，岂不知在签订合同之后，有些装修公司的态度就会发生巨大的转变。那么怎么样才能选到一家好的装修公司呢？</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);\"><img src=\"/ueditor/php/upload/image/20170923/1506133276105453.png\" style=\"border: 0px; margin: 10px auto 0px; padding: 0px; display: block; max-width: 100%; height: auto;\"/></p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\">　　在选择装修公司时，珠宝商往往是在节约成本的基础上选择装修公司，一般知名的装修公司，价高但是有品质保证，如果是为了节约成本贪图便宜，会有装修到一半而终止或者后期质量不过关的风险。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\">　　所以在选择了装修公司时，一定要全方位的考察这家装修公司，包括它曾经做过的装修项目、网络口碑等，并且还要通过对其进行市场调查来了解其信息，不能从装修公司人员的介绍下判断其公司的好坏，毕竟耳听为虚，眼见为实。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\">　　在确定心仪的装修公司之后，就是跟他们洽谈了。跟装修公司洽谈的内容无非就两个：价格跟设计要求。不同的公司存在不同的价格，毕竟装修行业是没有统一的标准的。同时在预算的审核中，有很多的事项需要注意的，包括漏项、重复计算、材料的品牌、型号、规格等等，这些都是需纳入价格预算的范畴。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);\"><img src=\"/ueditor/php/upload/image/20170923/1506133288757746.png\" style=\"border: 0px; margin: 10px auto 0px; padding: 0px; display: block; max-width: 100%; height: auto;\"/></p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\">　　当然，在店面需要装修之前，肯定是先出店面设计的，在此之前要对设计师有一定程度的了解，与设计师进行直接的交流沟通，才能了解到设计师设计水平的高低，设计装修出来的效果能更好的贴切珠宝店主题。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\">　　我们在选择装修公司时除了看报价和设计水平，还要看其管理模式。拥有井然有序的高效的管理模式，从设计人员到施工人员、施工管理人员、质检员、巡检员、预算员等，这才是一个合格的装修公司。如有必要，可以跟在该公司装修过的客户了解情况。</p><p style=\"border: 0px; margin-top: 0px; margin-bottom: 0px; padding: 10px 0px 20px; font-size: 16px; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; white-space: normal; background-color: rgb(255, 255, 255);\">　　施工人员的施工水平也是选择装修公司时需要注意的一点，毕竟好的领导者也需要好的执行者，才能让方案完美落地。因此施工人员对设计图纸的理解和工程的完成度是很重要的，同时施工人员也是决定设计方案是否具有可行性，当然，这也是由施工人员的水平来决定的。</p><p><img src=\"/ueditor/php/upload/image/20170923/1506133305680590.png\" style=\"border: 0px; margin: 10px auto 0px; padding: 0px; font-size: 16px; display: block; max-width: 100%; height: auto; color: rgb(25, 25, 25); font-family: &#39;PingFang SC&#39;, Arial, 微软雅黑, 宋体, simsun, sans-serif; line-height: 30px; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);\"/></p>', '1', '1', '1', '1', '', '', null, '1506133328', '1506389602');
INSERT INTO `bj_article` VALUES ('19', '学经验 最易出错的8个施工细节', '21', '20170926\\246a80c2797350bfb430f46e2e4fc93f.jpeg', '今天汇总了物业公司看得最多的施工毛病，让大家心里有个数，尽量别出现同样的遗憾。', '施工', '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal; text-align: center;\"><strong><span style=\"text-indent: 2em; font-size: 24px;\">学经验 最易出错的8个施工细节</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><strong><span style=\"text-indent: 2em; font-size: 24px;\"><br/></span></strong></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><span style=\"text-indent: 2em;\">1、通过物业联系弱电厂家，让厂家的专业人士来进行移位，既避免了将来的线路交叉隐患，也避免了弱电公司、施工单位和装修者的责任纠纷。</span><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">2、将水泥、砖块这些沉重材料分散堆放在房屋墙体四周，木工材料比如门板、橱柜板材等要靠墙体摆放。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">3、施工人员用编织袋把垃圾装好放在室内，物业每天会安排专业的清运人员来清运装修垃圾。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">4、在改动扩大后，请原房产施工单位对卫生间进行防水处理，并做24小时以上的养水实验看有无渗漏，以消除渗水隐患。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">5、为了不影响整体美观,在封闭管道井时可用墙砖在检修口处做一道活动门,检修时可直接开启。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">6、在装修时，要请装修施工单位将地漏口进行封闭，避免施工时，有杂物掉入管道井中，堵塞或砸坏管道井。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">7、装修管理条例规定100平米以上的房屋，要配备两个灭火器，100平米以下的房屋，最少要配备一个灭火器，以备不时之需。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">8、尽量避免地面开槽和打孔。若需要地面开槽布线，开槽的深度不得超过3cm，宽不得超过5cm。或者选择墙面开槽，或者选择走明线都是可以解决的办法。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">以上物业建议是根据国家《住宅室内装饰装修管理办法》和《上海市住宅室内装饰装修管理办法》以及各个小区不同的业主公约来归纳的，在装修施工的时候有什么疑问可以参照这两本条文规定来进行。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><img src=\"/ueditor/php/upload/image/20170926/1506397440115785.jpg\" title=\"1506397440115785.jpg\" alt=\"IMG_6413.JPG\"/></p><p style=\"text-align: center;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">▲ 施工单位擅自移动弱电箱位置，不仅易使线路纠缠不清，影响使用寿命，还不易维修，甚至会发生电路交叉的危险。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><img src=\"/ueditor/php/upload/image/20170926/1506397407828921.jpg\" title=\"1506397407828921.jpg\" alt=\"IMG_6414.JPG\"/></p><p style=\"text-align: center;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">▲ 水泥、砖块等沉重材料集中堆放在阳台或房屋中心，容易将地板压变形，以至开裂。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><img src=\"/ueditor/php/upload/image/20170926/1506397426984093.jpg\" title=\"1506397426984093.jpg\" alt=\"IMG_6412.JPG\"/></p><p style=\"text-align: center;\"><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; font-size: 18px; line-height: 32px; text-indent: 36px;\">▲ 砖块、碎石等装修垃圾随处散开扔在室内或者是楼道里，既不便于清扫也会影响到其他业主出入。</span></p>', '1', '1', '1', '1', '', '', null, '1506390426', '1506397473');
INSERT INTO `bj_article` VALUES ('21', '装修铺木地板都需要打龙骨？了解一下吧千万别被坑', '3', '20170926\\a1011add96c8e62afa5a4503668df31d.jpeg', '装修铺木地板都需要打龙骨？了解一下吧千万别被坑', '装修', '<p style=\"text-align: center;\"><strong><span style=\"font-size: 24px;\">装修铺木地板都需要打龙骨？了解一下吧千万别被坑</span></strong></p><p><span style=\"font-size: 16px;\"><strong><br/></strong></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; text-indent: 36px; font-size: 16px;\">装修到底是铺木地板还是铺地砖好？装修了3套房子，终于明白了，装修千万别铺瓷砖，全屋铺木地板，效果很好！铺地砖的话需要出材料费，人工费，造型费，其它七七八八的算下也来都要好几千。对于我们这些低产阶级来说，还真是一笔不小费用。大家都知道铺设好的木地板具有很好的弹性，人在上面行走，无论是温度、触觉、脚感等，都非常柔和舒适。但很多人却对木地板铺设有一定的误区，认为装修铺设木地板是一定要打龙骨的，装修铺木地板一定要打龙骨吗？老师傅告诉你，装修铺木地板千万别打龙骨，现在都流行这样做，后悔知道晚！</span></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; text-indent: 36px; font-size: 16px;\"><br/></span></p><p style=\"text-align: center;\"><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; text-indent: 36px; font-size: 16px;\"><img src=\"/ueditor/php/upload/image/20170926/1506391354525848.jpeg\" title=\"1506391354525848.jpeg\" alt=\"6d0fcd1a4dcdf1ed81a51083dd4a0cf8.jpeg\"/></span></p><p><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">老师傅说，装修一般是铺实木地板才需要打龙骨，因为实木地板是天然的板材，非常怕酸，怕碱，易燃，更重要的是怕受潮变形。在龙骨架上面铺实木地板可以有效防潮，延长地板的使用寿命，而且安装龙骨可以给实木地板提供更好的弹性及舒适的脚感。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">虽然装完龙骨后，铺地板是方便很多，但是打龙骨的工序很繁杂，首先在安装地龙骨时，一定要将地龙骨做干燥处理，若地龙骨本身不干燥的话，到后期肯定会影响到实木地板的使用，从而导致实木地板受潮腐蚀。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal; text-align: center;\"><img src=\"/ueditor/php/upload/image/20170926/1506391394661183.jpeg\" title=\"1506391394661183.jpeg\" alt=\"f35f2fd3f54122a0ac318af808860ab4.jpeg\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; font-size: 18px; line-height: 32px; text-indent: 36px;\">其实装修选用强化复合地板是不需要打龙骨的，强化地板由五个部分构成，从上到下分别是强化耐磨层、着色印刷层、高密度板层、防震缓冲层、防潮树脂层，因为此地板有防潮层，所以不需要打龙骨。</span></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal; text-align: center;\"><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; font-size: 18px; line-height: 32px; text-indent: 36px;\"><img src=\"/ueditor/php/upload/image/20170926/1506391434600852.jpg\" title=\"1506391434600852.jpg\" alt=\"8d719fc5had6fe0445bd5&amp;690.jpg\"/></span></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; font-size: 18px; line-height: 32px; text-indent: 36px;\"><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; font-size: 18px; line-height: 32px; text-indent: 36px;\">铺设木地板虽然可以不打龙骨，但还是需要进行地面找平，现在装修铺木地板都流行做自流平进行地面找平。自流平作为一种创新的地面施工技术，整个过程不依赖于人力抹刮，只要将液态地坪漆铺散到地面以后自动流淌，在地面自动找寻低洼区并将其填平，最终在将整片地面流淌成镜面般平整后静止，凝结固化后就可以形成光滑、平整、无缝的地面。</span></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; text-indent: 36px; font-size: 16px;\"><br/></span><br/></p>', '1', '1', '1', '1', '', '', null, '1506391468', '1506672400');
INSERT INTO `bj_article` VALUES ('22', '你装修还在明贴踢脚线？试试这样好看又实用~', '21', '20170926\\d91b9402a7f336f3aed7ee26175d5e18.jpeg', '大多数业主在装修的时候，都会给墙面角落贴踢脚线，踢脚线在装修设计中不仅起着保护墙体地面的功能，还起着视觉的平衡作用，利用它们的线形感觉及材质、色彩等在室内相互呼应，可以起到较好的美化装饰效果。', '你装修还在明贴踢脚线？试试这样好看又实用~', '<p style=\"text-align: center;\"><strong><span style=\"font-size: 24px;\">你装修还在明贴踢脚线？试试这样好看又实用~</span></strong></p><p><strong><span style=\"font-size: 24px;\"><br/></span></strong></p><p><span style=\"font-size: 16px;\"><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; text-indent: 36px;\">大多数业主在装修的时候，都会给墙面角落贴踢脚线，踢脚线在装修设计中不仅起着保护墙体地面的功能，还起着视觉的平衡作用，利用它们的线形感觉及材质、色彩等在室内相互呼应，可以起到较好的美化装饰效果。</span></span></p><p style=\"text-align: center;\"><span style=\"font-size: 16px;\"><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; text-indent: 36px;\"><img src=\"/ueditor/php/upload/image/20170926/1506391774970452.jpeg\" title=\"1506391774970452.jpeg\" alt=\"43de65edd05aa9f478fdd04fce5fa9bf.jpeg\"/></span></span></p><p><span style=\"font-size: 16px;\"><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; text-indent: 36px;\"><br/></span></span></p><p><br/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">在装修中，踢脚线的安装方法主要有明贴和暗贴两种做法，以前在装修的时候，明贴踢脚线是最主流的做法，但随着工艺的提高，现在装修都流行暗贴脚踢线了，从装饰效果还有日常清洁来讲，暗贴踢脚线的效果都要比明贴踢脚线的效果要好很多。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">很多人都觉得明贴的装饰效果立体感强，而且装修完成后可以完全遮住墙面与地面交接的缝隙，美观性大大提高。但是脚踢线明贴，差不多会有一公分的踢脚线是裸露在外面的，这样时间长了，踢脚线上面就会容易积灰，必须每隔一段时间进行打扫清洁，而且还不能用湿毛巾来擦，只能用鸡毛毯子那样的清洁的工具来打扫，不然会弄脏墙壁。另外家具靠墙放，明贴踢脚线也是会留出缝隙的。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal; text-align: center;\"><img src=\"/ueditor/php/upload/image/20170926/1506391849444346.jpeg\" title=\"1506391849444346.jpeg\" alt=\"06d889951820c4d84219393f62ce5ae3.jpeg\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">而踢脚线暗贴，后期就不会出现积灰这种情况，踢脚线暗贴是将墙面开槽，把踢脚线镶进去，让它与墙平齐。这样做的优点，就是避免落灰，减少清洁需要。不过开槽还要小心墙里的暗线。而且工程虽小，做完以后的造价自然要比明贴贵不少。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">踢脚线暗贴的装修效果要比明贴的更美观，暗贴踢脚线比较方便家具靠墙摆放，不会留出缝隙，有利于整体空间的美观。而明贴的话，就会占一小部分空间，有点碍事，也不够美观，缝隙积灰了还要费劲打理。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\">当然，也有很多人人认为暗贴踢脚线装饰效果比不上明贴踢脚线，在美观上会打折扣，暗贴脚踢线没有突出层次感，能起到装饰美化作用有限，而且还不能完全遮住墙与地的接缝。对此小编只能说仁者见仁，智者见智。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 12px 0px; outline: 0px; text-indent: 2em; font-size: 18px; color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; white-space: normal;\"><br/></p><p><span style=\"font-size: 16px;\"><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑, &#39;Microsoft YaHei&#39;, arial, sans-serif; line-height: 32px; text-indent: 36px;\"><br/></span></span><br/></p>', '1', '1', '1', '1', '', '', null, '1506391900', '1506672354');
INSERT INTO `bj_article` VALUES ('23', '挖穿地板直通地下室 成都一商铺违规装修被喊停', '21', '20170926\\4d64f0a334c3f9bad5d8e74279482650.jpg', '　　“叮叮咚咚”……住进桐梓林壹号快三年了，底楼的装修声突然打破小区的平静，陈先生约几个业主循声找去，终于发现了声音的源头，是小区12栋一楼的商铺，门牌号显示为城通路176号。当他将拍下的施工现场发到业主群后，引起轩然大波。照片上，一楼地板被“划开”一道长方形口子，直通下层地下室，楼板上还残留着钢筋。原来，商家想将一楼与负一楼连通，将底楼地下室也利用起来。这让业主们担心不已。目前，城管部门接到举报后已进行了调查，并于9月14日下达整改通知书，要求商铺业主停止施工，改正违法行为。', '挖穿地板直通地下室 成都一商铺违规装修被喊停', '<p style=\"word-wrap: break-word; text-align: center; margin-top: 0px; margin-bottom: 20px; color: rgb(80, 80, 80); line-height: 27px; padding: 0px; font-family: helvetica; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong><span style=\"color: navy; font-size: 24px;\">如此装修！ 挖穿地板直通地下室 商铺违规装修被喊停</span></strong></p><p style=\"word-wrap: break-word; margin-top: 0px; margin-bottom: 20px; color: rgb(80, 80, 80); line-height: 27px; padding: 0px; font-family: helvetica; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong><span style=\"color: navy; font-size: 24px;\"><br/></span></strong></p><p style=\"text-align:center;word-wrap: break-word; margin-top: 0px; margin-bottom: 20px; color: rgb(80, 80, 80); line-height: 27px; padding: 0px; font-family: helvetica; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\"><img id=\"{5A1CD7E0-D679-4AF1-9EAE-6249C674E0D2}\" src=\"/ueditor/php/upload/image/20170926/1506392783422442.jpg\" align=\"center\" style=\"display: block; max-width: 100%; border-radius: 0px; margin: 8px auto; background: rgb(239, 239, 239);\"/></p><p style=\"text-align:center;word-wrap: break-word; margin-top: 0px; margin-bottom: 20px; color: rgb(80, 80, 80); line-height: 27px; padding: 0px; font-family: helvetica; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"color:navy;font-family:楷体\">违规施工商铺现场</span></p><p style=\"word-wrap: break-word; text-align: justify; margin-top: 0px; margin-bottom: 20px; color: rgb(80, 80, 80); line-height: 27px; padding: 0px; font-family: helvetica; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\">　　“叮叮咚咚”……住进桐梓林壹号快三年了，底楼的装修声突然打破小区的平静，陈先生约几个业主循声找去，终于发现了声音的源头，是小区12栋一楼的商铺，门牌号显示为城通路176号。当他将拍下的施工现场发到业主群后，引起轩然大波。照片上，一楼地板被“划开”一道长方形口子，直通下层地下室，楼板上还残留着钢筋。原来，商家想将一楼与负一楼连通，将底楼地下室也利用起来。这让业主们担心不已。目前，城管部门接到举报后已进行了调查，并于9月14日下达整改通知书，要求商铺业主停止施工，改正违法行为。</p><p style=\"word-wrap: break-word; text-align: justify; margin-top: 0px; margin-bottom: 20px; color: rgb(80, 80, 80); line-height: 27px; padding: 0px; font-family: helvetica; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\">　　14日上午，成都商报记者来到该小区发现，城通路176号商铺已停止施工。一施工人员称他们已停工快一周了,在楼板上挖洞是业主的意思，“下面可能会用来放一些货物。记者在现场看到，靠近房屋最内侧墙根处，已挖开一道近两米长的口子，上面还残留着钢筋。而该小区5栋也存在类似装修，记者看到一施工商铺内的改造已初具规模，底楼楼板被挖开一道长方形口子，伸缩梯一直通向地下室。</p><p style=\"word-wrap: break-word; text-align: justify; margin-top: 0px; margin-bottom: 20px; color: rgb(80, 80, 80); line-height: 27px; padding: 0px; font-family: helvetica; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"color:navy\"><strong>　　限期整改</strong></span></p><p style=\"word-wrap: break-word; text-align: justify; margin-top: 0px; margin-bottom: 20px; color: rgb(80, 80, 80); line-height: 27px; padding: 0px; font-family: helvetica; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"color:navy\"><strong>　　可能影响房屋主体结构安全</strong></span></p><p style=\"word-wrap: break-word; text-align: justify; margin-top: 0px; margin-bottom: 20px; color: rgb(80, 80, 80); line-height: 27px; padding: 0px; font-family: helvetica; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\">　　14日，记者联系到该小区物业服务管理中心相关负责人，对于业主违规施工，他们称一开始并不知情，而打通地板后，下面是地下库房，并不是车库。事情发生后，物业方面协助城管部门调查，已发出《装修违约知会单》，因业主破坏了商铺楼板结构，要求对方停止施工。</p><p style=\"word-wrap: break-word; text-align: justify; margin-top: 0px; margin-bottom: 20px; color: rgb(80, 80, 80); line-height: 27px; padding: 0px; font-family: helvetica; font-size: 18px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(80, 80, 80); font-family: helvetica; font-size: 18px; line-height: 27px; text-align: justify; background-color: rgb(255, 255, 255);\">　　高新区芳草街道办盛泰社区刘主任表示，接到群众举报后，社区工作人员也到现场进行了查看，业主装修改变了房屋结构。目前相关部门已介入调查。14日，城管执法人员来到城通路176号商铺，在门上贴了整改通知书。整改通知书显示，城管部门在检查过程中发现高新区城通路176号商铺存在拆改地基基础、增加夹层，以及可能影响房屋抗震性和主体结构安全的问题。违反了《成都市房屋使用安全管理条例》相关规定。目前，城管部门已要求业主在9月20日之前对存在问题进行改正，同时立即停止施工、改正违法行为、恢复原貌。（记者 宦小淮&nbsp;实习生 陈薪屿）</span></p><p><br/></p>', '1', '1', '1', '1', '', '', null, '1506392823', '1506392823');
INSERT INTO `bj_article` VALUES ('24', '东方商厦杨浦店闭店装修 明年春节将变奥特莱斯', '3', '20170926\\0316d9c9ce1ee0bb9f492cc98180d0ba.jpg', '继东方商厦南东店与市百一店“合二为一”闭店整修后，又一家东方商厦要转型了。经过10日的“再惠再约”折扣活动后，东方商厦杨浦店自今日起闭店装修。此次转型也是为了在竞争激烈的五角场商圈中，与周边商业项目形成错位，未来将打造成百联旗下首个城市奥特莱斯，有望于明年春节前重新亮相', '东方商厦杨浦店闭店装修 明年春节将变奥特莱斯', '<h1 id=\"title\" style=\"padding: 2px 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); float: none; clear: both; font-size: 26px; line-height: 50px; font-weight: normal; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">东方商厦杨浦店闭店装修 明年春节将变奥特莱斯</h1><p><a href=\"http://sh.xinhuanet.com/2017-09/11/c_136599274.htm#pinglun\" class=\"nc_icon\" id=\"nc_icon\" style=\"padding: 3px 0px 0px 3px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: fixed; top: 320px; width: 55px; height: 50px; line-height: 23px; letter-spacing: 4px; font-size: 16px; font-family: 微软雅黑; border-radius: 3px; color: rgb(255, 255, 255); display: block; cursor: pointer; text-align: center; text-decoration: none; outline: none; white-space: normal; left: 1455px; background: rgb(55, 155, 233);\">我要评论</a></p><p><span class=\"time\" style=\"padding: 0px 10px 0px 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); display: inline-block;\">2017年09月11日 07:57:57</span>&nbsp;<span style=\"padding: 0px 10px 0px 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); display: inline-block;\">来源：&nbsp;<span id=\"source\" style=\"padding: 0px; margin: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">解放网</span></span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><span style=\"font-size: 16px;\">原标题：东方商厦拟在五角场开家奥特莱斯</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><span style=\"font-size: 16px;\">　　继东方商厦南东店与市百一店“合二为一”闭店整修后，又一家东方商厦要转型了。经过10日的“再惠再约”折扣活动后，东方商厦杨浦店自今日起闭店装修。此次转型也是为了在竞争激烈的五角场商圈中，与周边商业项目形成错位，未来将打造成百联旗下首个城市奥特莱斯，有望于明年春节前重新亮相。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><span style=\"font-size: 16px;\">　　<strong style=\"padding: 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">百货新贵倒逼转型</strong></span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><span style=\"font-size: 16px;\">　　东方商厦最早起源于徐家汇，以“礼在东方”为口号，成为当年沪上高端百货的代表之一。随后，以“东方商厦”为品牌的连锁百货在申城迅速发展，一百、华联、友谊三大集团旗下的部分知名的大型百货商厦也陆续改名，而东方商厦杨浦店的前身就是原华联商厦杨浦店。2005年正式翻牌更名后，又于2007年扩建后重新开业，在周边商业氛围匮乏时，迅速站稳了脚跟，成为了五角场商圈的百货代表。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><span style=\"font-size: 16px;\">　　然而，近几年来，以销售商品为主，功能单一的百货业态开始走上下坡路，随着五角场商圈中年轻新潮的百联又一城、万达广场、合生汇等相继开业，资深的百货“老大哥”们愈发力不从心，从运营了15年的大西洋百货关门，到如今东方商厦不得不谋求转型。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><span style=\"font-size: 16px;\">　　另外，“百货新贵”紧跟潮流实时调整业态，也逼得老牌百货不得不变革。自8月起五角场万达广场就开启“华丽升级”，除了巴黎春天、万达影城、沃尔玛等业态，其余区域将于今年9月至12月分阶段亮相，未来将提供科技感、智能化、潮流化的购物环境和全新业态。</span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><span style=\"font-size: 16px;\"><br/></span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><span style=\"font-size: 16px;\"></span></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"padding: 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">不会复制青浦奥特莱斯</strong></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">　　强“敌”环伺，老牌的高端百货只能尝试突围。据悉，杨浦东方商厦升级重整后，B1至4楼共5个楼面将转型为百联在市区内首家“城市奥特莱斯”，预计明年春节前正式开业，拟通过全新组合打造五角场经济圈的新地标。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">　　东方商厦杨浦店相关负责人表示，此次转型主要还是出于集团的战略需要，“现在购物中心体量都很大，东方商厦总建筑面积不过3万平方米，本身没有太大优势和发挥余地，选择转型为市中心的奥特莱斯，也是想与周边商业项目形成错位经营。”</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">　　提到奥特莱斯，很多人首先会想到位于青浦赵巷的百联奥特莱斯，双休日开车去扫个货，附近逛逛再享受一下美食，成为不少家庭的周末选择。那么百联会将青浦奥特莱斯的一线品牌一同搬过来吗？该负责人表示，如将部分大牌的折扣店开在市中心，会对正价门店、商品形成一定的冲击，“因此很难做到完全照搬青浦奥特莱斯的模式，具体引入的品牌还在研究讨论中，应该还是以国内外知名品牌的折扣为主。”</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><span style=\"font-size: 16px;\"><br/></span><br/></p><p><br/></p>', '1', '1', '1', '1', '', '', null, '1506393006', '1506672252');
INSERT INTO `bj_article` VALUES ('25', '徐汇针对历史建筑出新招 装修首先要“网申”', '3', '20170926\\83cd438b9420b902c7d7d76d8675a72d.jpg', '徐汇针对历史建筑出新招 装修首先要“网申”', '装修', '<h1 id=\"title\" style=\"padding: 2px 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); float: none; clear: both; font-size: 26px; line-height: 50px; font-weight: normal; font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">徐汇针对历史建筑出新招 装修首先要“网申”</h1><p><a href=\"http://sh.xinhuanet.com/2017-09/07/c_136590470.htm#pinglun\" class=\"nc_icon\" id=\"nc_icon\" style=\"padding: 3px 0px 0px 3px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); position: fixed; top: 320px; width: 55px; height: 50px; line-height: 23px; letter-spacing: 4px; font-size: 16px; font-family: 微软雅黑; border-radius: 3px; color: rgb(255, 255, 255); display: block; cursor: pointer; text-align: center; text-decoration: none; outline: none; white-space: normal; left: 1455px; background: rgb(55, 155, 233);\">我要评论</a></p><p><span class=\"time\" style=\"padding: 0px 10px 0px 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); display: inline-block;\">2017年09月07日 08:05:51</span>&nbsp;<span style=\"padding: 0px 10px 0px 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); display: inline-block;\">来源：&nbsp;<span id=\"source\" style=\"padding: 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">解放网</span></span></p><ul class=\"comment domPC clearfix list-paddingleft-2\" style=\"list-style-type: none;\"><li><p><br/></p></li></ul><p style=\"text-align:center;padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><img id=\"{BD361616-B0EE-40FC-A7E0-DC6E393468FD}\" alt=\"\" src=\"/ueditor/php/upload/image/20170926/1506393157437375.jpg\" style=\"padding: 0px; margin: 0px; border: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\"/></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\">&nbsp;&nbsp;&nbsp;&nbsp;门口怎么有堆建筑垃圾？最近，徐汇区城市网格化综合管理中心副主任卢义耀在路过高安路78弄时，有点纳闷，于是他赶紧拿出手机拍了照片。回到办公室，第一件事情就是上网查看。“还好，已经备过案。”</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\">&nbsp;&nbsp;&nbsp;&nbsp;卢义耀口中所称的“备案”正是徐汇区针对区内优秀历史建筑众多的一项保护新举措，所有的优秀历史建筑，要想调整或装修，都需要在网上提交申请。然后在专业部门的指导下，根据优秀历史建筑的修缮规范来进行调整与装修。如果没有“备案”，徐汇相关部门会勒令其停工，并且按照相关规定要求业主对违法行为进行恢复、整改。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><strong style=\"padding: 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">&nbsp; &nbsp;</strong><strong style=\"font-family: 微软雅黑; font-size: 16px; line-height: 32px; padding: 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">装修时有人每日巡查</strong></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;众所周知，7.66平方公里的衡复历史文化风貌区，其中4.3平方公里位于徐汇区内：950幢优秀历史建筑，1774幢保留历史建筑，2259幢一般历史建筑，是一笔不可多得的人文财富。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;如何把这些老房子保管好、传承好，也是徐汇区一直在思索的。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;恰逢徐汇探索“互联网+政务”之路，于是，徐汇开始尝试对优秀历史建筑装修改造申请全程网上办理服务。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;最近，常熟路209弄瑞华公寓有业主要装修房屋。瑞华公寓是优秀历史建筑，业主需要在网上填写申请。在徐汇区行政中心的公众微信号里，点击“优秀历史建筑改变（调整）使用性质及内部设计使用功能和修缮（装修改造）审批”，就可填写相关材料后上传。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;接到申请材料后，区房管局会派人实地勘察审核，与此同时，也会把相关信息实时对接推送给区网格中心、所在街道和城管等部门。从这一刻开始，房子就被纳入了监管，以防“先上车后买票”。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;审核通过后，房管部门会对业主提出诸多要求，比如要保护好建筑的外立面、原有空间格局及特色装饰等。装修开始后，街道网格中心会派员再次上门告知注意事项。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;“房子装修改造期间，网格中心会派员进行每日巡查，确保装修不超过申请范围。”卢义耀说，高安路78弄的建筑垃圾就属于“六必查”内容之一。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"padding: 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">&nbsp; 出现问题两小时内到场</strong></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;所谓的“六必查”，是指凡出现搭脚手架和包裹密闭网；堆积建筑垃圾和施工材料；设置户外广告和门面装修；占用道路施工和敲墙开洞；涉嫌无照经营和损坏绿化，居民有投诉和中介公司装修等六种情况，必须上门询问与报告。而这一制度，不仅针对优秀历史建筑的装修改造，也是一项针对风貌区内建筑的日常检查制度。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;在日常检查中如果发现问题，通过上报网格中心后派单，城管中队、房管所会两小时内到场核查。如果有施工许可，城管中队会进行现场核查，确认有无安全隐患问题。如果有的话，城管中队将通知审批部门到场，确认是否按方案施工，如有出入，会对当事人进行处罚并落实整改措施。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;如果没有施工许可且存在违法行为，城管中队会勒令其立刻停工，并寻求房管、规土、文化等部门的专业指导，执法部门会按照相关规定要求业主对违法行为进行恢复、整改，并补办相关审批手续。手续通过后，业主将审批意见张贴于门口并通知城管才可复工。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;除了依托执法部门的力量，徐汇区城市网格化综合管理中心还建设了一个“朝阳大妈”群，这些热心社区事务的阿姨妈妈会将社区动态及时上报，真正实现从职能部门延伸至街区与社区，打通了城市管理的“神经末梢”。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;曾经，就发生过保护建筑内的市民私自装修的情况。所幸热心阿姨及时发现，第一时间向有关部门反映，执法部门迅速跟进进行了处置，没有对保护建筑造成不可逆转的伤害。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;目前，徐汇区拥有5批共计950幢优秀历史建筑，其中约一半左右为居住类建筑。8个街道的253处保护建筑都已纳入到日常保护范围。其中，以优秀历史建筑集中的天平、湖南等街道为重点，实施全覆盖巡查监管化保护。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><strong style=\"padding: 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\"></strong></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\"><strong style=\"padding: 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">&nbsp; 年底107个事项网上办理</strong></p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;徐汇区行政服务中心、城市网格化综合管理中心主任宋开成说：“与其被动等发生意外再进行处罚，不如跨前一步主动作为。来源可查、去向可追，所有的审批、处罚等监管信息都在网上流转，形成了完整的综合监管‘闭环’，解决问题也能迈进‘快车道’。”</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;事实上，能有这样的完整闭环，和徐汇正在积极创建的“互联网+政务”体系密不可分。南宁路969号，两大中心同时入驻，且信息共享形成的大数据管理平台正是助力闭环形成的有力支撑。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;大屏幕上，各区域的街镇事件分布、总发现数不断动态闪烁……“这背后就是各种各样的巡查与发现机制在作用。”宋开成说，信息共享不但助力职能部门打通了传统的信息壁垒，让监管变得更有利，也让老百姓的办事便利了不少。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;比如中心建立了唯一标识的统一身份认证体系，以公民身份证号码和法人统一社会信用代码作为唯一标识，实现“一次认证、多点互联”。接下来，他们还将逐步推进电子证照系统、业务办理系统与电子证照库对接连通，以电子证照支撑各部门办事过程中相关信息“一次生成、多方复用，一库管理、互认共享”。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); font-size: 16px; line-height: 32px; color: rgb(57, 57, 57); font-family: 微软雅黑; white-space: normal; background-color: rgb(255, 255, 255);\">&nbsp;&nbsp;&nbsp;&nbsp;宋开成表示，“家门口、指尖上、一体化”是徐汇构建政务服务便捷化的目标，优秀历史建筑装修改造申请正是68项可全程网上办理服务的内容之一。到今年底，将实现107个行政审批和服务事项全程网上办理。</p><p style=\"padding: 0px; margin-top: 0px; margin-bottom: 10px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); color: rgb(57, 57, 57);\"><strong style=\"padding: 0px; margin: 0px; border: 0px; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\"><br/></strong><br/></p><p><br/></p>', '1', '1', '1', '1', '', '', null, '1506393218', '1506396808');
INSERT INTO `bj_article` VALUES ('26', '王老吉试水实体店，真能实现么', '3', '20170926\\0a0db7325eebbb1ac498c791b0e7945c.jpeg', '最近，王老吉在广州花城汇北区891街道开了一家凉茶实体店“1828王老吉”，也正式宣告进军“新式茶饮”市场，并打出了 “王老吉全国首家现泡凉茶概念店”的口号', '店铺', '<p style=\"text-align: center;\"><strong><span style=\"font-size: 24px;\">王老吉试水实体店，真能实现么</span></strong></p><p><span style=\"font-size: 16px;\"><br/></span></p><p><span style=\"font-size: 16px;\"><span style=\"font-size: 24px;\">最近，王老吉在广州花城汇北区891街道开了一家凉茶实体店“1828王老吉”，也正式宣告进军“新式茶饮”市场，并打出了 “王老吉全国首家现泡凉茶概念店”的口号。</span></span></p><p><span style=\"font-size: 16px;\"><span style=\"font-size: 24px;\"><br/></span></span></p><p><span style=\"font-size: 16px;\"><span style=\"font-size: 24px;\">一直专注于包装的王老吉经典品牌，如今转行现泡茶饮店，这是品牌的升级还是转行呢？</span></span></p><p><span style=\"font-size: 16px;\"><span style=\"font-size: 24px;\">目前茶饮店凉茶每杯定价24元，这是否能被当今消费者所接受呢，真让我们拭目以待呢。</span></span></p><p><span style=\"font-size: 16px;\"><span style=\"font-size: 24px;\"><br/></span></span></p><p style=\"text-align: center;\"><span style=\"font-size: 16px;\"><span style=\"font-size: 24px;\"><img src=\"/ueditor/php/upload/image/20170926/1506394690556056.jpeg\" title=\"1506394690556056.jpeg\" alt=\"fb478c99893ce38a3487361d1bb47294.jpeg\"/></span></span></p><p><span style=\"font-size: 16px;\"><span style=\"font-size: 24px;\"><br/></span></span></p><p></p><p style=\"box-sizing: border-box; margin-top: 20px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 34px; color: rgb(51, 51, 51); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Helvetica, &#39;Hiragino Sans GB&#39;, &#39;WenQuanYi Micro Hei&#39;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">　<span style=\"box-sizing: border-box; font-weight: 700;\">经典凉茶一杯卖24元，号称每一口都健康新鲜</span></p><p style=\"box-sizing: border-box; margin-top: 20px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 34px; color: rgb(51, 51, 51); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Helvetica, &#39;Hiragino Sans GB&#39;, &#39;WenQuanYi Micro Hei&#39;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">　　6月14日，“王老吉首家现泡茶概念店”红红火火地开进了广州CBD商圈。据了解，这家店面大约只有10平方米，整个店铺装修以红色调为主，风格偏中式。</p><p style=\"box-sizing: border-box; margin-top: 20px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 34px; color: rgb(51, 51, 51); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Helvetica, &#39;Hiragino Sans GB&#39;, &#39;WenQuanYi Micro Hei&#39;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">　　与当下火热的新式茶饮店十分看重环境体验不同，此次没有店内环境体验部分，“1828王老吉”目前仍采用“即买即走”的模式。王老吉这次的创新主要强调“现泡”概念，旨在让消费者喝到的每一口都是健康新鲜的，这与罐装凉茶形成了鲜明的对比。</p><p style=\"box-sizing: border-box; margin-top: 20px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 34px; color: rgb(51, 51, 51); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Helvetica, &#39;Hiragino Sans GB&#39;, &#39;WenQuanYi Micro Hei&#39;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">　　据了解，王老吉经典凉茶的口味比较受消费者喜爱，有时傍晚之前就会售罄。最贵的单品是炖品桃胶皂角米银耳羹，售价为29元，其他大部分饮品定价在15-22元之间。</p><p style=\"box-sizing: border-box; margin-top: 20px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 34px; color: rgb(51, 51, 51); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Helvetica, &#39;Hiragino Sans GB&#39;, &#39;WenQuanYi Micro Hei&#39;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"box-sizing: border-box; font-weight: 700;\">“试水”实体店年轻化探索还在继续</span></p><p style=\"box-sizing: border-box; margin-top: 20px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 34px; color: rgb(51, 51, 51); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Helvetica, &#39;Hiragino Sans GB&#39;, &#39;WenQuanYi Micro Hei&#39;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">　　据了解，该门店自6月14日开业至今已有一个月，王老吉方面未作任何宣传推广，也鲜少有媒体报道。记者联系到了广药集团大健康办主任张永涛，他回应称实体店项目还处于测试阶段，待测试成熟后(两个月以后)会召开新闻发布会，并正式宣布加盟的条件和要求。</p><p style=\"box-sizing: border-box; margin-top: 20px; margin-bottom: 20px; padding: 0px; font-size: 18px; line-height: 34px; color: rgb(51, 51, 51); font-family: &#39;Microsoft Yahei&#39;, &#39;Helvetica Neue&#39;, Helvetica, &#39;Hiragino Sans GB&#39;, &#39;WenQuanYi Micro Hei&#39;, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\">　　事实上，王老吉罐装、盒装凉茶无论在广州还是在全国都已经具备了极大的品牌知名度。根据《2016年中国凉茶行业发展分析报告》显示，在食品零售额增速整体疲软的情况下，凉茶行业仍然取得突出进步。在非碳酸饮料市场综合占有率排名前十的有两个凉茶品牌。其中凉茶始祖王老吉表现尤为突出，以40.75%的市场销售额份额稳居凉茶市场首位，持续领跑凉茶行业。</p><p><span style=\"font-size: 16px;\"><span style=\"font-size: 24px;\"><br/></span></span><br/></p><p><span style=\"font-size: 16px;\"><span style=\"font-size: 24px;\"><br/></span></span></p><p><span style=\"font-size: 16px;\"><span style=\"font-size: 24px;\"><br/></span></span></p>', '1', '1', '1', '1', '', '', null, '1506396503', '1506396503');
INSERT INTO `bj_article` VALUES ('27', '店铺装修时一定要选一个好的风格', '21', '20170926\\d2487ecfaa6b0104e4279240ff764797.JPG', '店铺装修时一定要选一个好的风格', '装修', '<p style=\"text-align: center;\"><strong><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; line-height: 30px; font-size: 24px; background-color: rgb(255, 255, 255);\">店铺装修时一定要选一个好的风格</span></strong></p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><br/></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\">现在</span><strong style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\">店铺装修</strong><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\">的风格种类很多，主要分为地中海、现代、中式风格、复古风格、北欧、美式等等。选择一个好的店铺装修风格对于一个实体店铺来说是至关重要的。装修风格的好坏可以决定你店铺的生意旺差，也可能决定你未来的成就。</span><br/></p><p><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\">我曾看到了一个90后青年从一点都不懂开店到最后成为朋友眼中的“高富帅”。这个青年是开的一间咖啡馆，而他挑的位置却在一条市中心小道旁，但周围店铺却有不少，他到底是怎么脱颖而出，让店铺生意远超其他店铺的呢？没错，就是风格，他选的店铺风格与周围店铺截然不同，周围店铺皆是现代化风格的店铺，毫无新意，而青年则反其道而行之，利用复古风格，引发了诸多消费者的好奇心.</span></span></p><p><img src=\"/ueditor/php/upload/image/20170926/1506406701528860.jpeg\" title=\"1506406701528860.jpeg\" alt=\"mp36542472_1445253932282_4.jpeg\" width=\"971\" height=\"442\" style=\"width: 971px; height: 442px;\"/></p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\">店铺前面空地设计师采用敞篷开放式，两边摆放着桌椅，空间宽阔，搭配自然，中间还摆有铁架，上面摆放着本本书籍，这种地形的利用让人感觉这不仅是一个咖啡馆，更是一个夏日乘凉休息的好地方，在炎炎夏日路过这家店铺不由自主的想坐下来看看书，喝喝咖啡。店内墙壁采用纯天然红砖墙，纯木制作的桌椅，无一不显现出复古风格。</span></span></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><img src=\"/ueditor/php/upload/image/20170926/1506406735256942.jpg\" title=\"1506406735256942.jpg\" alt=\"2014090454651265.jpg\" width=\"975\" height=\"539\" style=\"width: 975px; height: 539px;\"/></span></span></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><br/></span></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"></span></span></p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; list-style: none; font-size: 16px; line-height: 30px; font-stretch: normal; font-family: &#39;microsoft yahei&#39;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">就是这样的一间咖啡馆，造就了一个90后的青年高富帅，虽然店铺是设计师设计的，但是设计师再让他选择风格时，他在众多风格中选择了与众不同的复古风格，再利用地形的优势，使店铺生意远超其他店铺。</p><p style=\"margin-top: 15px; margin-bottom: 15px; padding: 0px; list-style: none; font-size: 16px; line-height: 30px; font-stretch: normal; font-family: &#39;microsoft yahei&#39;; color: rgb(51, 51, 51); white-space: normal; background-color: rgb(255, 255, 255);\">现在明白深圳店铺装修时，一个好的风格会有多大的作用了吗？</p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><br/></span></span><br/></p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"></span></p><p><span style=\"color: rgb(51, 51, 51); font-family: &#39;microsoft yahei&#39;; font-size: 16px; line-height: 30px; background-color: rgb(255, 255, 255);\"><br/></span></p><p><br/></p>', '1', '1', '1', '1', '', '', null, '1506398435', '1506406753');
INSERT INTO `bj_article` VALUES ('28', '精品时尚女装店铺装修陈列秘诀', '21', '20170926\\93f673b8b828e2451d7650fd91e3c4a7.jpeg', '精品时尚女装店铺装修陈列秘诀', '装修', '<p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; text-align: center; background-color: rgb(255, 255, 255);\"><strong><span style=\"font-size: 24px;\">精品时尚女装店铺装修陈列秘诀</span></strong></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><br/></p><hr/><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"font-family: sans-serif; font-size: 16px;\">一个装修好的服装店，不仅可以让整个店面提升一个品质，还可以吸引更多的顾客。可是一提到装修就会让大多大数的人觉得是一件很麻烦的事。我们在装修上所花费的时间、金钱等细节的问题实在是太多了。往往我们和设计公司聊了一整天。得出的结果不是差强人意，就是资金成本的增加。所以好多人就干脆省过这个环节，自己动手。把墙面随便粉刷一下本来就光线不足，因为粉刷的颜色不对，导致室内光线更暗，让人一进去就感觉很压抑，消费者那又会有心情进去消费。</span><br/></p><p><span style=\"font-size: 16px;\">在很多的店铺装修中很多都是包公不包料，为了省钱和保证装修的质量，很多业主都选择自己去购买材料。你可不要小看这中间的省钱方法。下面就让我们一起来看看吧。</span></p><p><span style=\"font-size: 16px;\"><br/></span></p><p><span style=\"font-size: 16px;\"></span></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　<strong>同一色搭配</strong></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　服装店长好帮手，同一色系的衣服放在一起会给人很舒服的感觉，注意同一色系搭配中不要同样款式、同样长短的放在一起，以免让人感觉像仓库。</p><p><img src=\"/ueditor/php/upload/image/20170926/1506405640124004.jpeg\" title=\"1506405640124004.jpeg\" alt=\"mp28083740_1439890151974_3.jpeg\" width=\"864\" height=\"420\" style=\"width: 864px; height: 420px;\"/></p><p><br/></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　<strong>对比色搭配</strong></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　就是说用冷色来烘托暖色，比如：用绿色衣服衬托红色衣服，用蓝色衣服衬托黄色衣服，摆放在一个竿子上时，不能让冷色和暖色各占50%，最好是3：7左右的比例比较合适，要注意冷暖色的穿插。</p><p><img src=\"/ueditor/php/upload/image/20170926/1506405682517242.jpg\" title=\"1506405682517242.jpg\" alt=\"4937ae0WG3rM.jpg\"/></p><p><br/></p><p><br/></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>合理利用活区</strong></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　所谓活区就是面对人流方向首先最容易看到的区域，反之为死区。要把自己主推的款式放在活区，把另外的款式放在死区，这样可以大大提升销售。</p><p><img src=\"/ueditor/php/upload/image/20170926/1506405709779004.jpg\" title=\"1506405709779004.jpg\" alt=\"6358611889155540909495929.jpg\" width=\"877\" height=\"398\" style=\"width: 877px; height: 398px;\"/></p><p><br/></p><p><br/></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　<strong>模特数量要控制</strong></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　有的经营者认为模特比较容易出展示效果，就在自己的店面放很多模特，但却会起到相反的效果，让人感觉这个牌子有些“水”，所谓“物以稀为贵”，把最好的款式穿在模特上有最好的效果。</p><p><img src=\"/ueditor/php/upload/image/20170926/1506405737258879.jpg\" title=\"1506405737258879.jpg\" alt=\"20121217044416903.jpg\" width=\"877\" height=\"442\" style=\"width: 877px; height: 442px;\"/></p><p><br/></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　<strong>合理利用“活模特”</strong></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　卖场的导购员是服装的活模特，她们穿哪个款式就会卖哪个款式，这可是减少库存的好方法</p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>时间把握到位</strong></p><p style=\"margin-top: 0px; margin-bottom: 15px; padding: 0px; line-height: 28px; font-family: 宋体, 新宋体, 宋体, Arial, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">　　要了解每天来买衣服的人是谁，以女装店为例，星期一、二、三、四来的一般是全职太太，这样可以把一些时尚的、价格较高的、款式独特的衣服放在活区和穿在模特上。星期五下午、星期六、星期日，逛店的人多是平时上班的女性，最好把价格中等的服装挂在活区和模特身上。</p><p><img src=\"/ueditor/php/upload/image/20170926/1506405780631190.jpg\" title=\"1506405780631190.jpg\" alt=\"31f80002ddbb5f93142d.jpg\" width=\"882\" height=\"547\" style=\"width: 882px; height: 547px;\"/></p>', '1', '1', '1', '1', '', '', null, '1506405798', '1506406356');
INSERT INTO `bj_article` VALUES ('29', '店铺装修\"打围\"隔离文明施工 城市环境少受影响', '21', '20170926\\e5413261f61b95e35e5bb37a802bd766.JPG', '', '打围', '<p style=\"text-align: center;\"><span style=\"font-size: 24px;\">店铺装修&quot;打围&quot;隔离文明施工</span></p><p style=\"text-align: center;\"><span style=\"color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, SimSun; text-align: center; font-size: 16px; background-color: rgb(255, 255, 255);\">【发表时间：2014-01-24 16:52:52 来源：</span><span style=\"font-size: 16px;\"><a href=\"http://epaper.scnjnews.com/paperindex.htm\" style=\"margin: 0px; padding: 0px; color: rgb(51, 51, 51); text-decoration: none; font-family: &#39;Microsoft YaHei&#39;, SimSun; text-align: center; white-space: normal; background-color: rgb(255, 255, 255);\">内江日报</a><span style=\"font-size: 16px; color: rgb(102, 102, 102); font-family: &#39;Microsoft YaHei&#39;, SimSun; text-align: center; background-color: rgb(255, 255, 255);\">】</span></span></p><p><span style=\"font-size: 24px;\"></span></p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">本报讯（记者 孙国丞 ）</strong>沿街店铺“打围”装修，是近年来城区内不少商家在装修时采取的一种隔离措施。通过“打围”的方式，把安全隐患以及占道、影响路人通行等不利因素统统围起来，避免了对周边市容环境造成影响。“打围”，挡住的不仅仅是店铺里面乱七八糟的环境，更多的是体现出商家的文明意识。</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\"><img src=\"/ueditor/php/upload/image/20170926/1506406110136561.jpg\" title=\"1506406110136561.jpg\" alt=\"IMG_6408.JPG\"/></p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">1月21日，记者来到市中区环城路。在这里，记者看到一家店铺的门口，被一大块塑料布遮挡了起来，没有留出一丝缝隙。</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">靠近该店铺后，记者听到里面传出了敲打声，原来店铺正在进行装修。由于采取了隔离措施，记者仅在紧邻店门口的地面发现有地灰，对人行道以及旁边的其他商家并没有造成环境影响。</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">在东兴区西林大道月儿湾附近，数间连在一起的店铺正在进行装修。记者看到，在店铺的门口搭建了一排支架，一圈塑料布将店铺团团围了起来。在最中间的塑料布上，“正在装修”几个大字显得十分显眼，负责装修的工人告诉记者：“这几个字主要是提醒过路的市民注意避让。”</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">店铺装修，除了添加“打围”措施外，对装修产生的垃圾，也不再随意的乱对乱放。</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">市中区沱江剧院附近的一户正在装修的商家对记者说：“装修垃圾都是堆放在店内，等到了晚上，再叫人来拉走。”</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">不仅仅是这一家店铺如此，记者在连日来的走访中，也暂未发现有商家把装修垃圾随意堆放在店外或者附近道路上的情况出现。</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">以“打围”的方式文明装修，不仅让城区市容变得规范起来，也让在装修店铺外过往的市民，感受到了不一样。</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">市民廖志杰说：“店铺文明装修，减少了粉尘对过路行人的骚扰，也降低了安全隐患，让人感受到商家的素质在不断提高。”</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">商家蒋强认为，“打围”装修，不仅让店铺的形象得以提升，还能利用“打围”的塑料布发布一些招聘、优惠等信息：“又挡住了难看的一面，又发布了信息，实在是一举两得。”</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">长期从事装修行业的张先生告诉记者，近年来，店铺装修“打围”，已经成为装修步骤中，必须实施的一项：“我们进场的第一件事，就是先‘打围’，再装修。”</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">市中区城管局工作人员表示，按照相关管理条例，店铺装修必须采取隔离措施，防止出现占道、破坏环境等情况的发生。对不遵守管理条例的装修店铺，除了下发整改通知书外，必要时还将采取暂扣装修物品的方式，强制商家采取“打围”等措施。</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\">随着近年来，对商家和装修行业的不断宣传以及处罚力度的加大，不文明装修的行为正逐年下降：“商家的文明意识正逐步提高，越来越多的商家加入到了文明装修的行列。”</p><p style=\"margin-top: 22px; margin-bottom: 0px; padding: 0px; color: rgb(51, 51, 51); font-family: &#39;Microsoft YaHei&#39;, SimSun; font-size: 16px; line-height: 28.8px; white-space: normal; text-indent: 25pt; background-color: rgb(255, 255, 255);\"><strong style=\"margin: 0px; padding: 0px;\">记者手记：</strong>店铺文明装修，让大家看到了商家的自律性在不断提高，也反映出了城市的管理者对这方面的重视。店铺文明装修，不仅让店铺的形象得以提升，更提升了市容，减少了对周边环境的危害。当然，不文明装修的行为也依然存在，这就需要全社会一起动员起来，共同监督，促使不文明装修的行为逐渐消失。</p><p><span style=\"font-size: 24px;\"><br/></span><br/></p>', '1', '1', '1', '1', '', '', null, '1506406116', '1506406116');
INSERT INTO `bj_article` VALUES ('30', '苹果回应\"一眼解锁\"安全性:面部信息不发送给苹果', '3', '20170928\\4755e7fbf9a06b18ed846a50dc2728d9.JPG', '苹果针对iPhone发行十周年推出的新手机iPhone X（10），其特别的人脸识别解锁功能Face ID，备受外界关注。', '苹果回应\"一眼解锁\"安全性', '<p style=\"text-align: center;\"><strong><span style=\"font-size: 24px;\">苹果回应&quot;一眼解锁&quot;安全性:面部信息不发送给苹果</span></strong></p><p style=\"text-align: center;\"><span style=\"font-size: 12px;\"><span style=\"color: rgb(136, 136, 136); font-family: Arial, &#39;Sim sun&#39;; line-height: 12px; background-color: rgb(255, 255, 255);\">2017-09-28 08:27:00　来源:&nbsp;</span><span style=\"color: rgb(136, 136, 136); font-family: Arial, &#39;Sim sun&#39;; line-height: 12px; background-color: rgb(255, 255, 255);\"></span><a id=\"ne_article_source\" href=\"http://www.thepaper.cn/newsDetail_forward_1808523\" target=\"_blank\" rel=\"nofollow\" style=\"color: rgb(136, 136, 136); text-decoration: none; font-family: Arial, &#39;Sim sun&#39;; line-height: 12px; white-space: normal; background-color: rgb(255, 255, 255);\">澎湃新闻</a><span style=\"color: rgb(136, 136, 136); font-family: Arial, &#39;Sim sun&#39;; line-height: 12px; background-color: rgb(255, 255, 255);\">(上海)</span></span></p><p><span style=\"font-size: 12px;\"><br/></span></p><p><br/></p><p class=\"otitle\" style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">（原标题：苹果回应“一眼解锁”安全性：面部信息不会发送给苹果服务器）</p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">苹果针对iPhone发行十周年推出的新手机iPhone X（10），其特别的人脸识别解锁功能Face ID，备受外界关注。</p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">近日，在苹果发布隐私政策白皮书前夕，澎湃新闻记者采访了苹果总部负责隐私政策的高管，就Face ID的一些信息隐私保护以及技术问题进行了对话。</p><p class=\"f_center\" style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: center; white-space: normal; background-color: rgb(255, 255, 255);\"><img alt=\"苹果回应一眼解锁安全性:面部信息不发送给苹果\" src=\"http://cms-bucket.nosdn.127.net/catchpic/4/44/44258e4ceb758f5690e907c4d4673fd7.jpg?imageView&thumbnail=550x0\" width=\"575\" height=\"391\" style=\"vertical-align: top; border: 0px; margin: 0px auto; display: block;\"/><span style=\"text-align: justify;\">苹果iPhone X（10）的人脸识别解锁功能Face ID备受外界关注。</span></p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>1、苹果最新的iPhone X中采用了Face ID这种脸部识别解锁技术，这相当于用户把自己的面部信息都放在苹果设备中，有人担忧这样做是否会导致信息会泄露。</strong></p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>答：</strong>Face ID的信息不会被泄露给任何人，这些信息都被存储在苹果设备中的安全隔区中，不会发送给苹果服务器，也不会共享给第三方。</p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">Face ID的数据，包括你面孔的数学表现形式，都是通过安全加密，并只有安全隔区才能使用。这些数据永远留在你的设备上，绝不会发给苹果，也而不会包含在设备备份中。</p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\">神经网络可能会不时进行更新。为避免神经网络更新后用户需要重新注册Face ID，iPhone X能够用自动更新后的神经网络来处理已存储的注册图像。除了由安全隔区进行加密并提供保护外，这些注册图像还会根据你的脸进裁剪，以尽量减少背景信息。 Face ID会保存正常解锁操作期间采集的脸部图像，在计算出与注册的Face ID数据进行比较的数学表示形式后，会立即弃用这些图像。</p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>2、未来Face ID被用来刷脸支付，这种数据也不会提供给第三方吗？</strong></p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>答：</strong>第三方app可以使用系统提供的API要求用户使用Face ID或密码进行身份验证， 持有Touch ID的app无需任何调整便可自动支持Face ID。使用Face ID时，app只会获知身份验证是否成功，无法访问Face ID或与注册的Face ID相关的数据。</p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>3、Face ID需要双目注视感应区才可以解锁，最近也有手机企业推出了无需注视特定地方，看这个手机面就可以解锁的3D Face解锁，如何评价两种技术的差异？</strong></p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>答：</strong>需要注视解锁一方面是为了安全，增加注视这个功能才能解锁；另外一定要注视特定区域是为了更准确了解用户是需要打开手机，有时候人脸对着手机并不是想解锁。</p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>4、人们化了妆，Face ID还能准确识别吗？</strong></p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>答：</strong>基本腮红这种化妆没有问题，但如果面容确实改变很大的化妆，是有点问题。</p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>5、比如有人突然把大胡子刮掉还可以识别吗？</strong></p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>答：</strong>这种变化特别大的不可以，如果面容无法解锁的话，需要重新注册Face ID。</p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>6、Face ID之前承认在解锁双胞胎面孔时有点问题，像整容网红脸这种是否也存在问题？</strong></p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>答：</strong>双胞胎比较像这种面容解锁确实容易出错，整容脸这种大家不可能整成双胞胎那么像，用Face ID没有问题。</p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>7、Touch ID可以注册多个指纹，为何Face ID只允许一张脸？</strong></p><p style=\"margin-top: 32px; margin-bottom: 0px; padding: 0px; font-size: 18px; text-indent: 2em; font-stretch: normal; line-height: 32px; font-family: &#39;Microsoft Yahei&#39;; color: rgb(64, 64, 64); text-align: justify; white-space: normal; background-color: rgb(255, 255, 255);\"><strong>答：</strong>也许是面部识别信息比较多，每个人有多个手指，而每人只有一张脸。</p><p><span style=\"font-size: 12px;\"><br/></span><span class=\"left\" style=\"float: left; color: rgb(136, 136, 136); font-family: &#39;Sim sun&#39;; line-height: 13px; text-align: justify; background-color: rgb(255, 255, 255);\"><a href=\"http://news.163.com/\" style=\"color: rgb(15, 107, 153);\"><img src=\"/ueditor/php/upload/image/20170928/1506570139704430.png\" alt=\"李天奕\" width=\"13\" height=\"12\" class=\"icon\" style=\"vertical-align: top; border: 0px; margin-left: 2px; float: left;\"/></a>&nbsp;本文来源：澎湃新闻</span><span class=\"left\" style=\"float: left; color: rgb(136, 136, 136); font-family: &#39;Sim sun&#39;; line-height: 13px; text-align: justify; background-color: rgb(255, 255, 255);\"><span class=\"ep-editor\" style=\"float: right; margin-left: 25px; color: rgb(136, 136, 136); font-family: &#39;Sim sun&#39;; line-height: 13px; text-align: justify; background-color: rgb(255, 255, 255);\">责任编辑：李天奕_NN7528</span></span><span class=\"ep-editor\" style=\"float: right; margin-left: 25px; color: rgb(136, 136, 136); font-family: &#39;Sim sun&#39;; line-height: 13px; text-align: justify; background-color: rgb(255, 255, 255);\"><br/></span></p>', '1', '1', '1', '1', '', '', null, '1506570214', '1506570214');

-- ----------------------------
-- Table structure for bj_article_cate
-- ----------------------------
DROP TABLE IF EXISTS `bj_article_cate`;
CREATE TABLE `bj_article_cate` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL COMMENT '分类名称',
  `orderby` varchar(10) DEFAULT '100' COMMENT '排序',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_article_cate
-- ----------------------------
INSERT INTO `bj_article_cate` VALUES ('1', '学习笔记', '1', '1477140627', '1480582693', '1');
INSERT INTO `bj_article_cate` VALUES ('2', '生活随笔', '2', '1477140627', '1477140627', '1');
INSERT INTO `bj_article_cate` VALUES ('3', '热点分享', '3', '1477140604', '1504687124', '1');
INSERT INTO `bj_article_cate` VALUES ('21', '标匠', '4', '1500544755', '1500544770', '1');

-- ----------------------------
-- Table structure for bj_authentication_log
-- ----------------------------
DROP TABLE IF EXISTS `bj_authentication_log`;
CREATE TABLE `bj_authentication_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `type` tinyint(1) NOT NULL COMMENT '账号类型：1业主 2签约账号 3师傅 4服务商',
  `real_name` varchar(20) DEFAULT NULL COMMENT '用户真实姓名',
  `cert_id` varchar(18) DEFAULT NULL COMMENT '身份证号码',
  `credit_card` varchar(30) DEFAULT NULL COMMENT '银行卡号',
  `credit_card_phone` varchar(11) DEFAULT NULL COMMENT '银行卡预留的手机号码',
  `response` varchar(100) DEFAULT NULL COMMENT '认证平台响应结果',
  `description` text COMMENT '响应描述信息',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='实名认证记录';

-- ----------------------------
-- Records of bj_authentication_log
-- ----------------------------

-- ----------------------------
-- Table structure for bj_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `bj_auth_group`;
CREATE TABLE `bj_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` text,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_auth_group
-- ----------------------------
INSERT INTO `bj_auth_group` VALUES ('1', '超级管理员', '1', '', '1446535750', '1446535750');

-- ----------------------------
-- Table structure for bj_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `bj_auth_group_access`;
CREATE TABLE `bj_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_auth_group_access
-- ----------------------------
INSERT INTO `bj_auth_group_access` VALUES ('2', '2');

-- ----------------------------
-- Table structure for bj_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `bj_auth_rule`;
CREATE TABLE `bj_auth_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `css` varchar(20) NOT NULL COMMENT '样式',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目ID',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=170 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_auth_rule
-- ----------------------------
INSERT INTO `bj_auth_rule` VALUES ('1', '#', '系统管理', '1', '1', 'fa fa-gear', '', '0', '1', '1446535750', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('2', 'admin/user/index', '账号管理', '1', '1', '', '', '1', '10', '1446535750', '1499932638');
INSERT INTO `bj_auth_rule` VALUES ('3', 'admin/role/index', '角色管理', '1', '1', '', '', '1', '20', '1446535750', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('4', 'admin/menu/index', '菜单管理', '1', '1', '', '', '1', '30', '1446535750', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('5', '#', '数据库管理', '1', '1', 'fa fa-database', '', '0', '2', '1446535750', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('6', 'admin/data/index', '数据库备份', '1', '1', '', '', '5', '50', '1446535750', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('7', 'admin/data/optimize', '优化表', '1', '1', '', '', '6', '50', '1477312169', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('8', 'admin/data/repair', '修复表', '1', '1', '', '', '6', '50', '1477312169', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('9', 'admin/user/useradd', '添加用户', '1', '1', '', '', '2', '50', '1477312169', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('10', 'admin/user/useredit', '编辑用户', '1', '1', '', '', '2', '50', '1477312169', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('11', 'admin/user/userdel', '删除用户', '1', '1', '', '', '2', '50', '1477312169', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('12', 'admin/user/user_state', '用户状态', '1', '1', '', '', '2', '50', '1477312169', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('13', '#', '日志管理', '1', '1', 'fa fa-tasks', '', '0', '6', '1477312169', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('14', 'admin/log/operate_log', '行为日志', '1', '1', '', '', '13', '50', '1477312169', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('22', 'admin/log/del_log', '删除日志', '1', '1', '', '', '14', '50', '1477312169', '1477316778');
INSERT INTO `bj_auth_rule` VALUES ('24', '#', '文章管理', '1', '1', 'fa fa-paste', '', '0', '4', '1477312169', '1477312169');
INSERT INTO `bj_auth_rule` VALUES ('25', 'admin/article/index_cate', '文章分类', '1', '1', '', '', '24', '10', '1477312260', '1477312260');
INSERT INTO `bj_auth_rule` VALUES ('26', 'admin/article/index', '文章列表', '1', '1', '', '', '24', '20', '1477312333', '1477312333');
INSERT INTO `bj_auth_rule` VALUES ('27', 'admin/data/import', '数据库还原', '1', '1', '', '', '5', '50', '1477639870', '1477639870');
INSERT INTO `bj_auth_rule` VALUES ('28', 'admin/data/revert', '还原', '1', '1', '', '', '27', '50', '1477639972', '1477639972');
INSERT INTO `bj_auth_rule` VALUES ('29', 'admin/data/del', '删除', '1', '1', '', '', '27', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('30', 'admin/role/roleAdd', '添加角色', '1', '1', '', '', '3', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('31', 'admin/role/roleEdit', '编辑角色', '1', '1', '', '', '3', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('32', 'admin/role/roleDel', '删除角色', '1', '1', '', '', '3', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('33', 'admin/role/role_state', '角色状态', '1', '1', '', '', '3', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('34', 'admin/role/giveAccess', '权限分配', '1', '1', '', '', '3', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('35', 'admin/menu/add_rule', '添加菜单', '1', '1', '', '', '4', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('36', 'admin/menu/edit_rule', '编辑菜单', '1', '1', '', '', '4', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('37', 'admin/menu/del_rule', '删除菜单', '1', '1', '', '', '4', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('38', 'admin/menu/rule_state', '菜单状态', '1', '1', '', '', '4', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('39', 'admin/menu/ruleorder', '菜单排序', '1', '1', '', '', '4', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('40', 'admin/article/add_cate', '添加分类', '1', '1', '', '', '25', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('41', 'admin/article/edit_cate', '编辑分类', '1', '1', '', '', '25', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('42', 'admin/article/del_cate', '删除分类', '1', '1', '', '', '25', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('43', 'admin/article/cate_state', '分类状态', '1', '1', '', '', '25', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('44', 'admin/article/add_article', '添加文章', '1', '1', '', '', '26', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('45', 'admin/article/edit_article', '编辑文章', '1', '1', '', '', '26', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('46', 'admin/article/del_article', '删除文章', '1', '1', '', '', '26', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('47', 'admin/article/article_state', '文章状态', '1', '1', '', '', '26', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('48', '#', '广告管理', '1', '1', 'fa fa-image', '', '0', '5', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('49', 'admin/ad/index_position', '广告位', '1', '1', '', '', '48', '10', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('50', 'admin/ad/add_position', '添加广告位', '1', '1', '', '', '49', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('51', 'admin/ad/edit_position', '编辑广告位', '1', '1', '', '', '49', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('52', 'admin/ad/del_position', '删除广告位', '1', '1', '', '', '49', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('53', 'admin/ad/position_state', '广告位状态', '1', '1', '', '', '49', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('54', 'admin/ad/index', '广告列表', '1', '1', '', '', '48', '20', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('55', 'admin/ad/add_ad', '添加广告', '1', '1', '', '', '54', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('56', 'admin/ad/edit_ad', '编辑广告', '1', '1', '', '', '54', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('57', 'admin/ad/del_ad', '删除广告', '1', '1', '', '', '54', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('58', 'admin/ad/ad_state', '广告状态', '1', '1', '', '', '54', '50', '1477640011', '1477640011');
INSERT INTO `bj_auth_rule` VALUES ('61', 'admin/config/index', '配置管理', '1', '1', '', '', '1', '50', '1479908607', '1479908607');
INSERT INTO `bj_auth_rule` VALUES ('62', 'admin/config/index', '配置列表', '1', '1', '', '', '61', '50', '1479908607', '1487943813');
INSERT INTO `bj_auth_rule` VALUES ('63', 'admin/config/save', '保存配置', '1', '1', '', '', '61', '50', '1479908607', '1487943831');
INSERT INTO `bj_auth_rule` VALUES ('70', '#', '用户管理', '1', '1', 'fa fa-users', '', '0', '3', '1484103066', '1499932593');
INSERT INTO `bj_auth_rule` VALUES ('75', 'admin/member/index', '用户列表', '1', '1', '', '', '70', '20', '1484103304', '1499934562');
INSERT INTO `bj_auth_rule` VALUES ('76', 'admin/member/add_member', '添加会员', '1', '1', '', '', '75', '50', '1484103304', '1484103304');
INSERT INTO `bj_auth_rule` VALUES ('77', 'admin/member/edit_member', '编辑会员', '1', '1', '', '', '75', '50', '1484103304', '1484103304');
INSERT INTO `bj_auth_rule` VALUES ('78', 'admin/member/del_member', '删除会员', '1', '1', '', '', '75', '50', '1484103304', '1484103304');
INSERT INTO `bj_auth_rule` VALUES ('79', 'admin/member/member_status', '会员状态', '1', '1', '', '', '75', '50', '1484103304', '1487937671');
INSERT INTO `bj_auth_rule` VALUES ('90', '#', '服务管理', '1', '1', 'fa fa-glass', '', '0', '7', '1500256384', '1500256403');
INSERT INTO `bj_auth_rule` VALUES ('91', 'admin/service/index', '服务类型', '1', '1', '', '', '90', '50', '1500256476', '1500256476');
INSERT INTO `bj_auth_rule` VALUES ('92', 'admin/service/serviceAdd', '添加服务类型', '1', '1', '', '', '91', '50', '1500277922', '1500277922');
INSERT INTO `bj_auth_rule` VALUES ('93', 'admin/service/serviceEdit', '编辑服务类型', '1', '1', '', '', '91', '50', '1500278044', '1500278044');
INSERT INTO `bj_auth_rule` VALUES ('94', 'admin/service/del_ser', '删除服务类型', '1', '1', '', '', '91', '50', '1500278071', '1500278071');
INSERT INTO `bj_auth_rule` VALUES ('95', 'admin/service/ad_state', '分类状态', '1', '1', '', '', '91', '50', '1500278110', '1500278110');
INSERT INTO `bj_auth_rule` VALUES ('96', 'admin/category/index', '商品一类', '1', '1', '', '', '90', '60', '1500279493', '1501117305');
INSERT INTO `bj_auth_rule` VALUES ('98', 'admin/category/categoryAdd', '添加类目', '1', '1', '', '', '96', '50', '1500424294', '1500424294');
INSERT INTO `bj_auth_rule` VALUES ('99', 'admin/category/categorycategoryEdit', '编辑服务类目', '1', '1', '', '', '96', '50', '1500424336', '1500424336');
INSERT INTO `bj_auth_rule` VALUES ('100', 'admin/category/categorydel_ser', '删除类目', '1', '1', '', '', '96', '50', '1500424357', '1500424357');
INSERT INTO `bj_auth_rule` VALUES ('101', 'admin/category/ad_state', '服务类目状态', '1', '1', '', '', '96', '50', '1500424388', '1500424388');
INSERT INTO `bj_auth_rule` VALUES ('102', 'admin/commodity/index', '商品二类', '1', '1', '', '', '90', '70', '1500424834', '1501117318');
INSERT INTO `bj_auth_rule` VALUES ('103', 'admin/commodity/commodityAdd', '添加商品分类', '1', '1', '', '', '102', '50', '1500429418', '1500429418');
INSERT INTO `bj_auth_rule` VALUES ('104', 'admin/commodity/commodityEdit', '编辑商品分类', '1', '1', '', '', '102', '50', '1500429464', '1500429464');
INSERT INTO `bj_auth_rule` VALUES ('105', 'admin/commodity/del_ser', '删除商品分类', '1', '1', '', '', '102', '50', '1500429494', '1500429494');
INSERT INTO `bj_auth_rule` VALUES ('106', 'admin/commodity/ad_state', '商品分类状态', '1', '1', '', '', '102', '50', '1500429525', '1500429525');
INSERT INTO `bj_auth_rule` VALUES ('107', 'admin/goods/index', '商品二类故障描述', '1', '1', '', '', '90', '80', '1500429591', '1501811172');
INSERT INTO `bj_auth_rule` VALUES ('108', 'admin/goods/goodsAdd', '添加故障描述', '1', '1', '', '', '107', '50', '1500436138', '1501811199');
INSERT INTO `bj_auth_rule` VALUES ('109', 'admin/goods/goodsEdit', '编辑故障描述', '1', '1', '', '', '107', '50', '1500436175', '1501811218');
INSERT INTO `bj_auth_rule` VALUES ('110', 'admin/goods/del_ser', '删除故障描述', '1', '1', '', '', '107', '50', '1500436203', '1501811239');
INSERT INTO `bj_auth_rule` VALUES ('111', 'admin/goods/ad_state', '故障描述状态', '1', '1', '', '', '107', '50', '1500436226', '1501811257');
INSERT INTO `bj_auth_rule` VALUES ('112', '#', '考试管理', '1', '1', 'fa fa-list-alt', '', '0', '50', '1501721195', '1501721195');
INSERT INTO `bj_auth_rule` VALUES ('113', 'admin/examtags/index', '考题标签', '1', '1', '', '', '112', '50', '1501725283', '1501725934');
INSERT INTO `bj_auth_rule` VALUES ('114', 'admin/examtags/add_examtags', '增加标签', '1', '1', '', '', '113', '50', '1501750860', '1501750860');
INSERT INTO `bj_auth_rule` VALUES ('115', 'admin/examtags/del_examtags', '删除标签', '1', '1', '', '', '113', '50', '1501751854', '1501751854');
INSERT INTO `bj_auth_rule` VALUES ('116', 'admin/examtags/edit_examtags', '编辑标签', '1', '1', '', '', '113', '50', '1501751929', '1501751929');
INSERT INTO `bj_auth_rule` VALUES ('117', 'admin/examtags/examtags_state', '标签状态', '1', '1', '', '', '113', '50', '1501751996', '1501751996');
INSERT INTO `bj_auth_rule` VALUES ('118', 'admin/examgroup/index', '试卷管理', '1', '1', '', '', '112', '50', '1501813532', '1501813532');
INSERT INTO `bj_auth_rule` VALUES ('119', 'admin/examgroup/examgroupadd', '添加试卷', '1', '1', '', '', '118', '50', '1501832448', '1501832448');
INSERT INTO `bj_auth_rule` VALUES ('120', 'admin/examgroup/examgroupdel', '删除试卷', '1', '1', '', '', '118', '50', '1501832481', '1501832481');
INSERT INTO `bj_auth_rule` VALUES ('121', 'admin/examgroup/examgroupedit', '编辑试卷', '1', '1', '', '', '118', '50', '1501832518', '1501832518');
INSERT INTO `bj_auth_rule` VALUES ('122', 'admin/examgroup/examgroupstatus', '试卷状态', '1', '1', '', '', '118', '50', '1501832585', '1501832585');
INSERT INTO `bj_auth_rule` VALUES ('123', 'admin/examgroup/examgrouplook', '查看添加考题', '1', '1', '', '', '118', '50', '1501832736', '1501832736');
INSERT INTO `bj_auth_rule` VALUES ('124', 'admin/exam/index', '考题管理', '1', '1', '', '', '112', '50', '1501836447', '1501836447');
INSERT INTO `bj_auth_rule` VALUES ('125', 'admin/user/usersk', '订单管理', '1', '1', 'fa fa-plus-square-o', '', '0', '50', '1504860740', '1505554668');
INSERT INTO `bj_auth_rule` VALUES ('126', 'admin/user/adduser_sa', '未付款订单', '1', '1', 'fa fa-user', '', '125', '50', '1504860823', '1504860823');
INSERT INTO `bj_auth_rule` VALUES ('127', '#', '品牌管理', '1', '1', 'fa fa-minus-square', '', '0', '50', '1504917563', '1505554708');
INSERT INTO `bj_auth_rule` VALUES ('128', 'admin/brand/index', '品牌管理', '1', '1', 'bath', '', '127', '50', '1504917886', '1505284803');
INSERT INTO `bj_auth_rule` VALUES ('129', 'admin/brandlb/index', '类别管理', '1', '1', '', '', '127', '50', '1505284902', '1505284902');
INSERT INTO `bj_auth_rule` VALUES ('130', '#', '审核管理', '1', '1', 'fa fa-arrows-alt', '', '0', '50', '1505350260', '1505554755');
INSERT INTO `bj_auth_rule` VALUES ('131', 'admin/examine/index', '师傅审核', '1', '1', '', '', '130', '50', '1505350305', '1505374464');
INSERT INTO `bj_auth_rule` VALUES ('132', 'admin/message/index', '留言审核', '1', '1', ' Example of meetup', '', '130', '50', '1505350323', '1505443082');
INSERT INTO `bj_auth_rule` VALUES ('133', 'admin/recommend/index', '首页推荐', '1', '1', 'ravelry', '', '130', '50', '1505728102', '1505780628');
INSERT INTO `bj_auth_rule` VALUES ('137', 'admin/brand/brandadd', '添加品牌', '1', '1', 'fa-s15', '', '128', '50', '1505886987', '1505886987');
INSERT INTO `bj_auth_rule` VALUES ('138', 'admin/brand/brandedit', '编辑品牌', '1', '1', 'fa-s15', '', '128', '50', '1505887104', '1505887104');
INSERT INTO `bj_auth_rule` VALUES ('139', 'admin/brand/del_ser', '删除品牌', '1', '1', 'fa-thermometer-3', '', '128', '50', '1505887170', '1505887170');
INSERT INTO `bj_auth_rule` VALUES ('140', 'admin/brandlb/brandlbedit', '编辑类别', '1', '1', '', '', '129', '50', '1505887265', '1505887265');
INSERT INTO `bj_auth_rule` VALUES ('141', 'admin/brandlb/brandlbadd', '添加类别', '1', '1', '', '', '129', '50', '1505887312', '1505887425');
INSERT INTO `bj_auth_rule` VALUES ('142', 'admin/brandlb/del_ser', '删除类别', '1', '1', '', '', '129', '50', '1505887383', '1505887383');
INSERT INTO `bj_auth_rule` VALUES ('143', 'admin/customer/index', '月结审核', '1', '1', '', '', '130', '50', '1505973357', '1505973357');
INSERT INTO `bj_auth_rule` VALUES ('144', 'admin/edit/index', '推荐编辑', '1', '1', '', '', '130', '50', '1506327533', '1506327533');
INSERT INTO `bj_auth_rule` VALUES ('145', 'admin/cost/index', '订单服务费', '1', '1', 'fa-address-card-o', '', '125', '50', '1506397304', '1506397304');
INSERT INTO `bj_auth_rule` VALUES ('146', 'admin/examine/ad_state1', '通过', '1', '1', '', '', '131', '50', '1506737324', '1506737324');
INSERT INTO `bj_auth_rule` VALUES ('147', 'admin/examine/ad_state2', '拒绝', '1', '1', '', '', '131', '50', '1506737366', '1506737366');
INSERT INTO `bj_auth_rule` VALUES ('148', 'admin/message/ad_state', '通过', '1', '1', '', '', '132', '50', '1506737456', '1506737456');
INSERT INTO `bj_auth_rule` VALUES ('149', 'admin/recommend/ad_state', '推荐', '1', '1', '', '', '133', '50', '1506737565', '1506737565');
INSERT INTO `bj_auth_rule` VALUES ('150', 'admin/customer/ad_state1', '通过', '1', '1', '', '', '143', '50', '1506737895', '1506737895');
INSERT INTO `bj_auth_rule` VALUES ('151', 'admin/customer/ad_state2', '拒绝', '1', '1', '', '', '143', '50', '1506737957', '1506737957');
INSERT INTO `bj_auth_rule` VALUES ('152', 'admin/edit/editedit', '编辑推荐', '1', '1', '', '', '144', '50', '1506738052', '1506738052');
INSERT INTO `bj_auth_rule` VALUES ('153', 'admin/edit/editadd', '增加推荐位', '1', '1', '', '', '144', '50', '1506738102', '1506738102');
INSERT INTO `bj_auth_rule` VALUES ('154', 'admin/edit/del_ser', '删除推荐位', '1', '1', '', '', '144', '50', '1506738183', '1506738183');
INSERT INTO `bj_auth_rule` VALUES ('155', 'admin/cost/amount_consulting', '编辑咨询费', '1', '1', '', '', '145', '50', '1506738374', '1506738374');
INSERT INTO `bj_auth_rule` VALUES ('156', 'admin/cost/platform_service', '编辑服务收费比例', '1', '1', '', '', '145', '50', '1506738444', '1506738444');
INSERT INTO `bj_auth_rule` VALUES ('157', 'admin/cost/g_platform_service', '编辑平台服务费', '1', '1', '', '', '145', '50', '1506738563', '1506738563');
INSERT INTO `bj_auth_rule` VALUES ('158', '#', '勘测管理', '1', '1', 'fa fa-camera-retro', '', '0', '11', '1509068389', '1509068389');
INSERT INTO `bj_auth_rule` VALUES ('159', 'admin/survey/index', '分配师傅', '1', '1', '', '', '158', '50', '1509068442', '1509068442');
INSERT INTO `bj_auth_rule` VALUES ('160', 'admin/examrecord/index', '考试统计', '1', '1', '', '', '112', '50', '1509589879', '1509589879');
INSERT INTO `bj_auth_rule` VALUES ('161', 'admin/agreement/index', '协议管理', '1', '1', 'fa fa-user', '', '0', '50', '1512369344', '1512369344');
INSERT INTO `bj_auth_rule` VALUES ('162', 'admin/agreement/master', '师傅入驻协议', '1', '1', '', '', '161', '50', '1512369431', '1512369431');
INSERT INTO `bj_auth_rule` VALUES ('163', 'admin/agreement/center', '平台协议', '1', '1', '', '', '162', '50', '1512369469', '1512369469');
INSERT INTO `bj_auth_rule` VALUES ('164', 'admin/agreement/cnter', '平台协议', '1', '1', 'fa fa-user', '', '161', '50', '1512369597', '1512369597');
INSERT INTO `bj_auth_rule` VALUES ('165', '#', '发票管理', '1', '1', 'fa fa-tasks', '', '0', '50', '1512537368', '1512624970');
INSERT INTO `bj_auth_rule` VALUES ('166', 'admin/invoice/invoice_liebiao', '发票审批', '1', '1', '', '', '165', '50', '1512540614', '1512541729');
INSERT INTO `bj_auth_rule` VALUES ('167', 'admin/agreement/baozhang', '保证金', '1', '1', '', '', '161', '50', '1512548476', '1512548476');
INSERT INTO `bj_auth_rule` VALUES ('168', 'admin/agreement/shenqing', '申请月结协议', '1', '1', '', '', '161', '50', '1512548562', '1512548562');
INSERT INTO `bj_auth_rule` VALUES ('169', 'admin/invoice/invoice_tui', '退票信息', '1', '1', '', '', '165', '50', '1512624917', '1512624917');

-- ----------------------------
-- Table structure for bj_brand_cate
-- ----------------------------
DROP TABLE IF EXISTS `bj_brand_cate`;
CREATE TABLE `bj_brand_cate` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `name` varchar(20) NOT NULL COMMENT '品牌分类名称',
  `status` varchar(255) DEFAULT NULL,
  `create_time` varchar(80) DEFAULT NULL,
  `update_time` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='品牌分类表';

-- ----------------------------
-- Records of bj_brand_cate
-- ----------------------------
INSERT INTO `bj_brand_cate` VALUES ('1', '化妆品', '1', '2017-09-21 13:44:22', '2017-09-21 13:44:22');
INSERT INTO `bj_brand_cate` VALUES ('2', '服装', '1', '2017-09-13 15:14:48', '2017-09-13 15:14:48');
INSERT INTO `bj_brand_cate` VALUES ('3', '珠宝柜', '1', '2017-09-13 15:14:50', '2017-09-13 15:14:50');
INSERT INTO `bj_brand_cate` VALUES ('4', '商品食品', '1', '2017-09-13 15:14:54', '2017-09-13 15:14:54');
INSERT INTO `bj_brand_cate` VALUES ('5', '数码产品', '1', '2017-09-13 15:14:55', '2017-09-13 15:14:55');
INSERT INTO `bj_brand_cate` VALUES ('6', '手表', '1', '2017-09-13 17:38:00', '0000-00-00 00:00:00');
INSERT INTO `bj_brand_cate` VALUES ('7', '儿童玩具', '1', '2017-09-13 15:14:20', '2017-09-13 15:15:25');
INSERT INTO `bj_brand_cate` VALUES ('13', '视频', '1', '2017-09-28 11:00:51', '2017-09-28 11:00:51');

-- ----------------------------
-- Table structure for bj_brand_list
-- ----------------------------
DROP TABLE IF EXISTS `bj_brand_list`;
CREATE TABLE `bj_brand_list` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `brand` varchar(20) NOT NULL COMMENT '品牌',
  `c_id` varchar(20) DEFAULT NULL,
  `img` varchar(50) DEFAULT NULL COMMENT '品牌图片',
  `information` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='品牌表';

-- ----------------------------
-- Records of bj_brand_list
-- ----------------------------
INSERT INTO `bj_brand_list` VALUES ('1', '兰蔻', '1', '20170913\\d2f641138e6c568463d0a6d43d15a908.jpg', '\n                                    \n                                    \n                                    \n                                    \n                                                                                  ', '1');
INSERT INTO `bj_brand_list` VALUES ('2', '雅诗兰黛', '1', '20170912\\LU[4A04N{T)3S]XM0NJ[4{K.png', '\n                                    \n                            ', '1');
INSERT INTO `bj_brand_list` VALUES ('3', '资生堂', '1', '20170912\\YX1~U2X~]GGM[A$QH6BDQIE.png', '\n            ', '1');
INSERT INTO `bj_brand_list` VALUES ('4', '迪奥', '1', '20170912\\1505195681(1).jpg', '                           ', '1');
INSERT INTO `bj_brand_list` VALUES ('5', '香奈尔', '1', '20170912\\0U8}{XBWE$G8JFBLODQI@MF.png', '                          ', '1');
INSERT INTO `bj_brand_list` VALUES ('6', '倩碧', '1', '20170912\\123456.png', '     ', '1');
INSERT INTO `bj_brand_list` VALUES ('12', 'SK-II', '1', '20170913\\cd7e87b70fbd5dd6c5b8bf335dc036fb.png', '\n                                    \n                                    \n                                    \n121                                                                                                                                            ', '1');
INSERT INTO `bj_brand_list` VALUES ('13', '碧欧泉', '1', '20170913\\9270fe7afb73ced56d5098999e44751d.png', '\n                                    \n碧欧泉                                                                  ', '1');
INSERT INTO `bj_brand_list` VALUES ('15', '郝莲娜', '1', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('16', '娇韵诗', '1', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('17', '娇兰', '1', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('18', '希思黎', '1', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('19', '卡地亚', '3,6', '', '\n                                                                        ', '1');
INSERT INTO `bj_brand_list` VALUES ('20', '宝格丽', '3,6', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('21', '周大福', '3', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('22', '六福', '3', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('23', '金至尊', '3', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('24', '萧邦', '3,6', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('25', '百达翡丽', '3,6', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('26', '帝驼', '3,6', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('27', '万宝龙', '3,6', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('28', '天梭', '6', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('29', '卡西欧', '3,6', '', '', '1');
INSERT INTO `bj_brand_list` VALUES ('30', '潘多拉', '3,6', '', '', '1');

-- ----------------------------
-- Table structure for bj_category
-- ----------------------------
DROP TABLE IF EXISTS `bj_category`;
CREATE TABLE `bj_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(20) NOT NULL COMMENT '服务类目名称',
  `img` varchar(64) DEFAULT NULL COMMENT '图片',
  `content` varchar(100) DEFAULT NULL COMMENT '描述',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '开关',
  `s_id` varchar(100) NOT NULL COMMENT '服务类型对应ID',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='服务类目表';

-- ----------------------------
-- Records of bj_category
-- ----------------------------
INSERT INTO `bj_category` VALUES ('3', '化妆品柜', '63091201711071534217057.png', '', '1', '1,2', '1500708619', '1510040062');
INSERT INTO `bj_category` VALUES ('4', '珠宝柜', 'fe31f201711071534077971.png', '', '1', '1,2', '1500708637', '1510040048');
INSERT INTO `bj_category` VALUES ('5', '钟表柜', '7724b201711071533553366.png', '', '1', '1,2', '1500708652', '1510040037');
INSERT INTO `bj_category` VALUES ('6', '服装柜', 'cf66d201711071533297049.png', '', '1', '1,2', '1500708665', '1510040010');
INSERT INTO `bj_category` VALUES ('7', '数码产品柜', 'f1ba4201711071533137054.png', '', '1', '1,2', '1500708680', '1510039994');
INSERT INTO `bj_category` VALUES ('8', '商超食品柜', '77f13201711071533023198.png', '', '1', '1,2', '1500708696', '1510039984');
INSERT INTO `bj_category` VALUES ('17', '其他', 'd34af201711071531182905.png', '系统现在没有设置的商品类型', '1', '1,2,3,4,5,6', '1503452151', '1510039879');

-- ----------------------------
-- Table structure for bj_category_tags
-- ----------------------------
DROP TABLE IF EXISTS `bj_category_tags`;
CREATE TABLE `bj_category_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `service_type_id` tinyint(4) DEFAULT NULL COMMENT '服务类别 1安装 2维修 3勘测 4工程管理',
  `tag` varchar(255) DEFAULT NULL COMMENT '标签名称',
  `status` tinyint(1) DEFAULT NULL COMMENT '是否启用 0未启用 1已启用',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='分类故障描述快捷选择标签';

-- ----------------------------
-- Records of bj_category_tags
-- ----------------------------

-- ----------------------------
-- Table structure for bj_category_title
-- ----------------------------
DROP TABLE IF EXISTS `bj_category_title`;
CREATE TABLE `bj_category_title` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `category_title` varchar(255) NOT NULL COMMENT '分类名',
  `category_tag_ids` text COMMENT '故障描述标签ID',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='分类标题';

-- ----------------------------
-- Records of bj_category_title
-- ----------------------------

-- ----------------------------
-- Table structure for bj_chats
-- ----------------------------
DROP TABLE IF EXISTS `bj_chats`;
CREATE TABLE `bj_chats` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `sender_id` int(11) NOT NULL COMMENT '发送者ID',
  `receiver_id` int(11) NOT NULL COMMENT '接收者ID',
  `order_id` int(11) DEFAULT NULL COMMENT '聊天基于某订单ID',
  `content` text NOT NULL COMMENT '聊天内容',
  `owner_id` int(11) NOT NULL COMMENT '业主ID',
  `worker_id` int(11) NOT NULL COMMENT '师傅ID',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='聊天记录表';

-- ----------------------------
-- Records of bj_chats
-- ----------------------------

-- ----------------------------
-- Table structure for bj_client_loaction
-- ----------------------------
DROP TABLE IF EXISTS `bj_client_loaction`;
CREATE TABLE `bj_client_loaction` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `uid` int(10) NOT NULL COMMENT '客户id',
  `name` varchar(50) NOT NULL COMMENT '联系人',
  `province` varchar(50) NOT NULL COMMENT '省',
  `city` varchar(50) NOT NULL COMMENT '市',
  `district` varchar(50) NOT NULL COMMENT '区',
  `location` varchar(50) NOT NULL COMMENT '详细地址',
  `default` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否默认：0否1是',
  `phone` bigint(11) DEFAULT NULL COMMENT '联系电话',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bj_client_loaction
-- ----------------------------
INSERT INTO `bj_client_loaction` VALUES ('62', '36', '顾家敏', '河北省', '唐山市', '路南区', '1号', '1', '18961519032');
INSERT INTO `bj_client_loaction` VALUES ('63', '35', '1', '北京市', '东城区', '北京市', '11', '1', '18961519032');
INSERT INTO `bj_client_loaction` VALUES ('64', '38', '10', '北京市', '北京市', '西城区', '0', '0', '15865867664');
INSERT INTO `bj_client_loaction` VALUES ('65', '41', '13818759298', '上海市', '上海市', '浦东新区', '东方路96号', '1', '13818759298');
INSERT INTO `bj_client_loaction` VALUES ('66', '38', '郭富城', '江苏省', '常州市', '金坛市', '中寰广场', '1', '18961519032');
INSERT INTO `bj_client_loaction` VALUES ('67', '33', '刘邦健', '内蒙古自治区', '赤峰市', '红山区', '距咯', '0', '15550161208');
INSERT INTO `bj_client_loaction` VALUES ('69', '33', '刘棒棒对的', '吉林省', '长春市', '南关区', '六六六家里对的', '0', '18014869116');
INSERT INTO `bj_client_loaction` VALUES ('71', '33', '弄哈哈', '内蒙古自治区', '呼和浩特市', '玉泉区', '111', '0', '18686663627');
INSERT INTO `bj_client_loaction` VALUES ('77', '47', '刘邦建', '北京', '北京市', '东城区', '第三方', '1', '15550161208');
INSERT INTO `bj_client_loaction` VALUES ('78', '43', '大萨达', '天津', '天津市', '河东区', '大萨达撒', '1', '18686663624');
INSERT INTO `bj_client_loaction` VALUES ('79', '38', '1', '北京市', '北京市', '朝阳区', '101000000', '0', '15865867664');
INSERT INTO `bj_client_loaction` VALUES ('80', '38', '15', '北京', '北京市', '东城区', '10', '0', '15');
INSERT INTO `bj_client_loaction` VALUES ('81', '38', '15', '北京', '北京市', '东城区', '15', '0', '15');
INSERT INTO `bj_client_loaction` VALUES ('82', '50', '', '北京', '北京市', '东城区', '', '1', '0');
INSERT INTO `bj_client_loaction` VALUES ('83', '51', '黄洁', '甘肃省', '兰州市', '城关区', 'aaaaaaa', '1', '15802100074');
INSERT INTO `bj_client_loaction` VALUES ('85', '41', '谢兵森', '河北省', '邯郸市', '邯山区', '大力路22号', '0', '13818759298');
INSERT INTO `bj_client_loaction` VALUES ('86', '39', '10', '北京', '北京市', '东城区', '10', '1', '1010');
INSERT INTO `bj_client_loaction` VALUES ('87', '47', '顾佳敏', '山西省', '太原市', '小店区', 'sad阿萨德11', '0', '18961519032');
INSERT INTO `bj_client_loaction` VALUES ('88', '44', '顾佳敏', '北京', '北京市', '东城区', '11号', '1', '18961519032');
INSERT INTO `bj_client_loaction` VALUES ('89', '55', '刘小龙', '北京', '北京市', '东城区', '建设路68号', '1', '18964632696');
INSERT INTO `bj_client_loaction` VALUES ('91', '57', '555', '北京', '北京市', '东城区', '5555', '0', '1586586764');
INSERT INTO `bj_client_loaction` VALUES ('93', '47', 'o ', '北京', '北京市', '东城区', '51526', '0', '55');
INSERT INTO `bj_client_loaction` VALUES ('94', '47', 'ujou', '北京', '北京市', '东城区', '16318561', '0', '46345634163');
INSERT INTO `bj_client_loaction` VALUES ('95', '59', '周春林', '上海', '上海市', '黄浦区', '南京西路10000号', '0', '13764840087');
INSERT INTO `bj_client_loaction` VALUES ('96', '59', '刘臣', '北京', '北京市', '东城区', '墨鱼路嘿嘿嘿', '1', '12345678900');
INSERT INTO `bj_client_loaction` VALUES ('97', '47', '2123123123', '北京', '北京市', '东城区', '12312', '0', '12123');
INSERT INTO `bj_client_loaction` VALUES ('99', '57', '刘家勋', '河北省', '秦皇岛市', '海港区', '大蛇路55号1211541515555551515', '0', '12345678910');
INSERT INTO `bj_client_loaction` VALUES ('100', '61', '10', '北京', '北京市', '东城区', '10', '1', '10');
INSERT INTO `bj_client_loaction` VALUES ('101', '57', '顾家敏', '吉林省', '长春市', '南关区', '大蛇路55号', '1', '12356242545');
INSERT INTO `bj_client_loaction` VALUES ('103', '57', '李朋', '山西省', '太原市', '小店区', '哦具体了', '0', '1234568566');
INSERT INTO `bj_client_loaction` VALUES ('104', '57', '李朋', '内蒙古自治区', '呼和浩特市', '新城区', '发射路33号', '0', '17879837747');
INSERT INTO `bj_client_loaction` VALUES ('105', '60', '谢先生', '北京', '北京市', '东城区', '上海路\n', '1', '13818759298');
INSERT INTO `bj_client_loaction` VALUES ('106', '59', '陈东', '内蒙古自治区', '呼和浩特市', '新城区', '健健康康', '0', '133333333333');
INSERT INTO `bj_client_loaction` VALUES ('107', '67', '来来来', '吉林省', '松原市', '宁江区', 'ggg', '1', '18014869331');
INSERT INTO `bj_client_loaction` VALUES ('108', '68', '一叶之秋', '江苏省', '苏州市', '昆山市', '花安路', '1', '18686663624');

-- ----------------------------
-- Table structure for bj_coaming_report
-- ----------------------------
DROP TABLE IF EXISTS `bj_coaming_report`;
CREATE TABLE `bj_coaming_report` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_number` bigint(20) DEFAULT NULL COMMENT '订单号',
  `worker_id` int(10) DEFAULT NULL COMMENT '师傅ID',
  `img1` varchar(32) DEFAULT NULL COMMENT '验收单',
  `img2` varchar(32) DEFAULT NULL COMMENT '进度表',
  `user_sign` varchar(255) DEFAULT NULL COMMENT '客户签字图片路由',
  `is_ok` tinyint(1) DEFAULT NULL COMMENT '客户是否签字 1签字 2未签字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_coaming_report
-- ----------------------------
INSERT INTO `bj_coaming_report` VALUES ('25', '201711070920381409', '37', 'fc1b9201711070931193144.jpg', '539ea201711070931215771.jpeg', 'uploads/signature/20171107/biaojiang33qianming_cf8141c3e2e535f10b63a698837d9a13.png', '1');
INSERT INTO `bj_coaming_report` VALUES ('26', '2017110710043183881', '37', 'fa681201711071014038401.jpg', 'a09ae201711071014057168.jpeg', 'uploads/signature/20171107/biaojiang33qianming_8770b6bedf46835e247ead9b9683e812.png', '1');

-- ----------------------------
-- Table structure for bj_commodity
-- ----------------------------
DROP TABLE IF EXISTS `bj_commodity`;
CREATE TABLE `bj_commodity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL COMMENT '商品名称',
  `img` varchar(64) DEFAULT NULL,
  `c_id` varchar(100) NOT NULL COMMENT '对应服务类目ID',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '开关',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

-- ----------------------------
-- Records of bj_commodity
-- ----------------------------
INSERT INTO `bj_commodity` VALUES ('3', '电器', '3322a201711301334328440.png', '3,4,5,6,11,12', '1', '1500708936', '1512020074');
INSERT INTO `bj_commodity` VALUES ('6', '灯具', 'd09ce201711071535551632.png', '3,4,7,8,12', '1', '1500709095', '1510040157');
INSERT INTO `bj_commodity` VALUES ('7', '油漆', '8a20c201711071535484978.png', '5,6,8,11,12', '1', '1500709124', '1510040149');
INSERT INTO `bj_commodity` VALUES ('8', '玻璃', '9bb6b201711071535395662.png', '3,4,5,6,7,8,11,12', '1', '1500709141', '1510040140');
INSERT INTO `bj_commodity` VALUES ('14', '空调', 'd5053201711071535261716.png', '7,8,11,12', '1', '1501138397', '1510040127');
INSERT INTO `bj_commodity` VALUES ('15', '店铺天地墙', '8ec7a201711071535178334.png', '3,4,5,12', '1', '1501138437', '1510040118');
INSERT INTO `bj_commodity` VALUES ('16', '电路', 'e6678201711071535097109.png', '3,5,6,7,8', '1', '1501138484', '1510040110');
INSERT INTO `bj_commodity` VALUES ('17', '五金', '94d55201711071535018148.png', '4,5,6,7,12', '1', '1501138549', '1510040102');
INSERT INTO `bj_commodity` VALUES ('18', '其他', 'c1180201711071534513018.JPG', '17', '1', '1506504114', '1510040092');

-- ----------------------------
-- Table structure for bj_common_master
-- ----------------------------
DROP TABLE IF EXISTS `bj_common_master`;
CREATE TABLE `bj_common_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `order_number` bigint(20) DEFAULT NULL,
  `d_worker_id` int(10) DEFAULT NULL COMMENT '主任师傅',
  `worker_id` int(10) DEFAULT NULL COMMENT '普通师傅id ',
  `working_hours` varchar(20) DEFAULT NULL COMMENT '工作时长 ',
  `cost` varchar(20) DEFAULT NULL COMMENT '所需费用 ',
  `skill` varchar(10) DEFAULT NULL COMMENT '技能',
  `status` tinyint(1) DEFAULT '0' COMMENT '师傅接受情况0 未接受 1接受 2拒绝 ',
  `state` tinyint(1) DEFAULT NULL COMMENT '客户确认施工状态0 未确认 1确认 ',
  `estate` tinyint(1) DEFAULT NULL COMMENT '客户是否邀请 0 未邀请 1邀请 ',
  `comment_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '评论状态',
  `need` text COMMENT '需求',
  `create_time` int(10) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=167 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bj_common_master
-- ----------------------------
INSERT INTO `bj_common_master` VALUES ('112', '2017110619075012666', '40', '39', '1', '1', '1', '1', null, null, '0', '1', '1509967344');
INSERT INTO `bj_common_master` VALUES ('113', '2017110708371367163', '39', '40', '111', '111', '1', '1', null, null, '0', '11111', '1510015379');
INSERT INTO `bj_common_master` VALUES ('114', '2017110709423633212', '39', '40', '14', '14', '1', '1', null, null, '0', '14', '1510019238');
INSERT INTO `bj_common_master` VALUES ('115', '2017110710001289684', '39', '34', '10', '10', '1', null, null, null, '0', '10', '1510020128');
INSERT INTO `bj_common_master` VALUES ('117', '2017110710001289684', '39', '40', '10', '10', '1', '1', null, null, '0', '10', '1510020232');
INSERT INTO `bj_common_master` VALUES ('118', '2017110710001289684', '39', '42', '10', '10', '1', null, null, null, '0', '10', '1510020290');
INSERT INTO `bj_common_master` VALUES ('119', '2017110710034981059', '35', '39', '1', '1', '1', '1', null, null, '0', '1111', '1510020320');
INSERT INTO `bj_common_master` VALUES ('120', '2017110710170434567', '39', '40', '10', '100000000', '5', '1', null, null, '0', '100000000000000000', '1510021087');
INSERT INTO `bj_common_master` VALUES ('121', '2017110710422184585', '39', '40', '4', '1', '1', '1', null, null, '0', '4', '1510022650');
INSERT INTO `bj_common_master` VALUES ('123', '2017110710552355322', '40', '39', '2', '2', '1', '1', null, null, '0', '2', '1510024218');
INSERT INTO `bj_common_master` VALUES ('124', '2017110711194625819', '35', '39', '12', '121', '1', '1', null, null, '0', '212', '1510024835');
INSERT INTO `bj_common_master` VALUES ('125', '2017110711243918369', '39', '40', '2', '25', '1', '0', null, null, '0', '5', '1510025204');
INSERT INTO `bj_common_master` VALUES ('126', '2017110711383958250', '40', '39', '2', '2', '1', '1', null, null, '0', '2', '1510025989');
INSERT INTO `bj_common_master` VALUES ('127', '2017110711243918369', '39', '35', '2', '25', '1', '1', null, null, '0', '52', '1510033777');
INSERT INTO `bj_common_master` VALUES ('128', '2017110714582837507', '35', '39', '1', '11', '1', '0', null, null, '0', '，而你', '1510038089');
INSERT INTO `bj_common_master` VALUES ('129', '2017112013320986361', '39', '40', '10', '10', '1', '0', null, null, '0', '10', '1511161474');
INSERT INTO `bj_common_master` VALUES ('130', '2017112013320986361', '39', '45', '10', '10', '1', '0', null, null, '0', '10', '1511161526');
INSERT INTO `bj_common_master` VALUES ('132', '2017112313084328061', '39', '45', '10', '10', '0', '2', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('138', '2017112414073236360', '38', '45', '10', '10', '电工,水管工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('141', '2017112416435390183', '39', '45', '10', '10', '水管工,泥瓦工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('142', '2017112509050446030', '39', '45', '10', '10', '水管工,搬运工,泥瓦', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('143', '2017112810432227537', '39', '45', '10', '10', '电工,水管工,搬运工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('144', '2017112811393181930', '39', '45', '10', '10', '水管工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('145', '2017112811482073980', '39', '45', '15', '10', '电工,水管工,搬运工', '0', null, null, '0', '0', null);
INSERT INTO `bj_common_master` VALUES ('146', '2017112812480644220', '39', '45', '10', '10', '电工,水管工,搬运工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('147', '2017112815302543797', '45', '40', '11', '11', '水管工', '1', null, null, '0', '111111', null);
INSERT INTO `bj_common_master` VALUES ('148', '2017112916313048705', '56', '58', '10', '10', '普工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('149', '201711301003381698', '56', '58', '10', '10', '搬运工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('152', '201711301003381698', '56', '54', '10', '10', '4', '0', null, null, '0', '10', '1512009110');
INSERT INTO `bj_common_master` VALUES ('153', '2017113010384762417', '54', '66', '10', '10', '1', '0', null, null, '0', '10', '1512009806');
INSERT INTO `bj_common_master` VALUES ('154', '2017120411531919301', '56', '58', '10', '10', '水管工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('155', '2017120613571073901', '56', '58', '45', '啦啦啦', '泥瓦工', '0', null, null, '0', '啦啦啦', null);
INSERT INTO `bj_common_master` VALUES ('156', '2017120614425794677', '56', '58', '10', '10', '电工,水管工,搬运工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('157', '0', '56', '71', '10', '10', '水管工,搬运工,木工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('159', '2017120708494859915', '56', '71', '10', '10', '水管工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('160', '2017120710303544571', '56', '54', '2', '100', '水管工,搬运工', '0', null, null, '0', '你很棒', null);
INSERT INTO `bj_common_master` VALUES ('161', '2017120610283119053', '54', '56', '10', '10', '水管工', '0', null, null, '0', '10', null);
INSERT INTO `bj_common_master` VALUES ('163', '2017120714361331463', '56', '54', '200', '200', '电工', '1', null, null, '0', '你大也', null);
INSERT INTO `bj_common_master` VALUES ('164', '2017120716114513542', '54', '56', '10', '10', '电工,水管工,泥瓦工', '1', null, null, '0', '噢噢噢哦哦', null);
INSERT INTO `bj_common_master` VALUES ('165', '2017120816552463170', '71', '54', '10', '15', '电工,泥瓦工,木工', '1', null, null, '0', '4555', null);
INSERT INTO `bj_common_master` VALUES ('166', '2017120914532598604', '56', '71', '1', '55', '搬运工', '1', null, null, '0', '看看', null);

-- ----------------------------
-- Table structure for bj_complaint
-- ----------------------------
DROP TABLE IF EXISTS `bj_complaint`;
CREATE TABLE `bj_complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `order_number` varchar(100) DEFAULT NULL COMMENT '订单号',
  `text` varchar(255) DEFAULT NULL COMMENT '投诉内容',
  `time` datetime DEFAULT NULL COMMENT '投诉时间',
  `uid` int(11) DEFAULT NULL COMMENT '被投诉人id',
  `type` varchar(255) DEFAULT NULL COMMENT '投诉类型',
  `phone` varchar(255) DEFAULT NULL COMMENT '投诉人电话',
  `uname` varchar(255) DEFAULT NULL COMMENT '投诉人姓名',
  `img1` varchar(255) DEFAULT NULL COMMENT '图片',
  `img2` varchar(255) DEFAULT NULL COMMENT '图片',
  `img3` varchar(255) DEFAULT NULL COMMENT '图片',
  `bid` int(11) DEFAULT NULL COMMENT '投诉人id',
  `buname` varchar(255) DEFAULT NULL COMMENT '被投诉人姓名',
  `bphone` varchar(255) DEFAULT NULL COMMENT '被投诉人手机号',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_complaint
-- ----------------------------
INSERT INTO `bj_complaint` VALUES ('11', '2017120209113586708', '10', '2017-12-02 11:17:21', '54', '2', '15865867664', '10', 'df973201711241351271429.png', 'df973201711241351271429.png', 'df973201711241351271429.png', '36', '10', '10');
INSERT INTO `bj_complaint` VALUES ('12', '2017120209113586708', '10', '2017-12-02 14:49:27', '0', '2', null, '10', '2fb7920171202144921339.jpg', '8ba1c201712021449232187.jpg', '1fd48201712021449255434.jpg', '38', null, null);
INSERT INTO `bj_complaint` VALUES ('13', '2017120209113586708', '10', '2017-12-02 14:52:27', '0', '2', null, '10', '20ada201712021452206400.jpg', '8614d201712021452237624.jpg', '53ada201712021452255474.jpg', '38', null, null);
INSERT INTO `bj_complaint` VALUES ('14', '2017120209113586708', '10', '2017-12-02 15:40:07', '54', '2', '15810512002', '10', '', '', '', '38', '师傅_kphmvv', null);
INSERT INTO `bj_complaint` VALUES ('15', '2017120714042672144', '10', '2017-12-07 14:19:05', '56', '2', '18961519032', '王哥', '29154201712071418569888.jpg', 'f05e5201712071418588612.jpg', '3122b201712071419007248.jpg', '38', '师傅_tzokjp', null);
INSERT INTO `bj_complaint` VALUES ('16', '2017120816552463170', '乱要钱', '2017-12-08 16:59:40', '71', '2', '18014869113', '2222222', '2f889201712081659238188.jpeg', '273a3201712081659356331.jpeg', '14cdb201712081659396296.jpeg', '38', '哦哦哦', null);
INSERT INTO `bj_complaint` VALUES ('17', '2017120914370562104', '刘邦建是傻子', '2017-12-09 14:44:39', '56', '2', '18961519032', '秋寒', '', '', '', '68', '师傅_tzokjp', null);

-- ----------------------------
-- Table structure for bj_config
-- ----------------------------
DROP TABLE IF EXISTS `bj_config`;
CREATE TABLE `bj_config` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置ID',
  `name` varchar(30) NOT NULL DEFAULT '' COMMENT '配置名称',
  `value` text COMMENT '配置值',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_config
-- ----------------------------
INSERT INTO `bj_config` VALUES ('1', 'web_site_title', '标匠后台管理系统');
INSERT INTO `bj_config` VALUES ('2', 'web_site_description', '标匠后台管理系统');
INSERT INTO `bj_config` VALUES ('3', 'web_site_keyword', '0.15');
INSERT INTO `bj_config` VALUES ('4', 'web_site_icp', '0.12');
INSERT INTO `bj_config` VALUES ('5', 'web_site_cnzz', '0.06');
INSERT INTO `bj_config` VALUES ('6', 'web_site_copy', 'Copyright © 2017 标匠后台管理系统 All rights reserved.');
INSERT INTO `bj_config` VALUES ('7', 'web_site_close', '1');
INSERT INTO `bj_config` VALUES ('8', 'list_rows', '12');
INSERT INTO `bj_config` VALUES ('9', 'admin_allow_ip', '');
INSERT INTO `bj_config` VALUES ('10', 'alidayu_appkey', null);
INSERT INTO `bj_config` VALUES ('11', 'alidayu_appSecret', null);

-- ----------------------------
-- Table structure for bj_corporate_certification
-- ----------------------------
DROP TABLE IF EXISTS `bj_corporate_certification`;
CREATE TABLE `bj_corporate_certification` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `real_name` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `phone` varchar(11) DEFAULT NULL COMMENT '手机号',
  `company_name` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `img` text COMMENT '公司营业执照',
  `id_front` text COMMENT '身份证正面照片',
  `id_reverse` text COMMENT '身份证反面照片',
  `id_hand` text COMMENT '手持身份证照片',
  `cert_id` varchar(18) DEFAULT NULL COMMENT '身份证号码',
  `address` varchar(20) DEFAULT NULL COMMENT '公司地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bj_corporate_certification
-- ----------------------------
INSERT INTO `bj_corporate_certification` VALUES ('1', null, '1', '', '', '', '', '', '', '', '');
INSERT INTO `bj_corporate_certification` VALUES ('2', null, '', '', '', '', '', '', '', '', '');
INSERT INTO `bj_corporate_certification` VALUES ('3', null, '真是大', '18961519032', '股价米sad', '8890a201711111521062871.jpg', '232f5201711111521005545.jpg', '7158c201711111521019995.jpg', 'd7363201711111521047989.jpg', '阿萨德', '123');
INSERT INTO `bj_corporate_certification` VALUES ('4', null, '顾佳敏', '18961519032', '阿萨德', 'e7eae201711111523146009.jpg', 'e35b9201711111523066716.jpg', '55b15201711111523083222.jpg', '00968201711111523112782.jpg', '321281199303058417', '江苏省苏州市');
INSERT INTO `bj_corporate_certification` VALUES ('5', null, '顾佳敏', '18961519032', '阿萨德', 'e7eae201711111523146009.jpg', 'e35b9201711111523066716.jpg', '55b15201711111523083222.jpg', '00968201711111523112782.jpg', '321281199303058417', '江苏省苏州市');
INSERT INTO `bj_corporate_certification` VALUES ('6', null, '顾佳敏', '18961519032', '阿萨德', 'e7eae201711111523146009.jpg', 'e35b9201711111523066716.jpg', '55b15201711111523083222.jpg', '00968201711111523112782.jpg', '321281199303058417', '江苏省苏州市');
INSERT INTO `bj_corporate_certification` VALUES ('7', null, '231 321', '18961519032', '23 12', '', '', '', '', '阿萨德1', '3 123');
INSERT INTO `bj_corporate_certification` VALUES ('8', null, '231 321', '18961519032', '23 12', '', '', '', '', '阿萨德1', '3 123');
INSERT INTO `bj_corporate_certification` VALUES ('9', null, '12312312', '18961519032', '阿萨德', '', '', '', '', '3123', 'sad');
INSERT INTO `bj_corporate_certification` VALUES ('10', null, '12312312', '18961519032', '阿萨德', '', '', '', '', '3123', 'sad');
INSERT INTO `bj_corporate_certification` VALUES ('11', null, '12312312', '18961519032', '阿萨德', '', '', '', '', '3123', 'sad');
INSERT INTO `bj_corporate_certification` VALUES ('12', null, '12312312', '18961519032', '阿萨德', '', '', '', '', '3123', 'sad');
INSERT INTO `bj_corporate_certification` VALUES ('13', null, '顾佳敏', '18961519032', '啊实践活动', 'c2dc320171111154225962.jpg', '0f3cd201711111542193430.jpg', 'ea344201711111542213660.jpg', '8dd0f201711111542237302.jpg', '32128119321574574', '阿萨德');
INSERT INTO `bj_corporate_certification` VALUES ('14', null, '顾佳敏', '18961519032', '啊实践活动', 'c2dc320171111154225962.jpg', '0f3cd201711111542193430.jpg', 'ea344201711111542213660.jpg', '8dd0f201711111542237302.jpg', '32128119321574574', '阿萨德');
INSERT INTO `bj_corporate_certification` VALUES ('15', null, '顾佳敏', '18961519032', '啊实践活动', 'c2dc320171111154225962.jpg', '0f3cd201711111542193430.jpg', 'ea344201711111542213660.jpg', '8dd0f201711111542237302.jpg', '32128119321574574', '阿萨德');
INSERT INTO `bj_corporate_certification` VALUES ('16', null, '顾佳敏', '18961519032', '啊实践活动', 'c2dc320171111154225962.jpg', '0f3cd201711111542193430.jpg', 'ea344201711111542213660.jpg', '8dd0f201711111542237302.jpg', '32128119321574574', '阿萨德');
INSERT INTO `bj_corporate_certification` VALUES ('17', null, '顾佳敏', '18961519032', '啊实践活动', 'c2dc320171111154225962.jpg', '0f3cd201711111542193430.jpg', 'ea344201711111542213660.jpg', '8dd0f201711111542237302.jpg', '32128119321574574', '阿萨德');
INSERT INTO `bj_corporate_certification` VALUES ('18', null, '顾佳敏', '18961519032', '啊实践活动', 'c2dc320171111154225962.jpg', '0f3cd201711111542193430.jpg', 'ea344201711111542213660.jpg', '8dd0f201711111542237302.jpg', '32128119321574574', '阿萨德');
INSERT INTO `bj_corporate_certification` VALUES ('19', null, '1', '18961519032', '阿萨德', '', '', '', '', '1', ' ');
INSERT INTO `bj_corporate_certification` VALUES ('20', null, '23123123', '18961519032', '顾佳敏', 'bc463201711111558003066.jpg', 'ecb1d201711111557463279.jpg', '58601201711111557486210.jpg', '71e45201711111557567715.jpg', '12312312312', 's的');
INSERT INTO `bj_corporate_certification` VALUES ('21', null, '顾佳敏', '18961519032', '当初', 'd5a912017111308455280.jpg', 'e664720171113084517788.jpg', 'af014201711130845257040.jpg', '7342a201711130845404533.jpg', '123456789', '江苏');
INSERT INTO `bj_corporate_certification` VALUES ('22', null, '顾佳敏', '18961519032', '', '', '', '', '', '123456', '');
INSERT INTO `bj_corporate_certification` VALUES ('23', null, '顾佳敏', '18961519032', '', '', '', '', '', '213', '');
INSERT INTO `bj_corporate_certification` VALUES ('24', null, '', '18961519032', '1', '', '', '', '', '', '');
INSERT INTO `bj_corporate_certification` VALUES ('25', null, '', '18961519032', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for bj_c_guarantee
-- ----------------------------
DROP TABLE IF EXISTS `bj_c_guarantee`;
CREATE TABLE `bj_c_guarantee` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(10) DEFAULT NULL COMMENT '充值者ID',
  `guarantee` float(10,2) DEFAULT NULL COMMENT '充值保障金金额 ',
  `create_time` int(10) DEFAULT NULL COMMENT '充值时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客户保障金表';

-- ----------------------------
-- Records of bj_c_guarantee
-- ----------------------------

-- ----------------------------
-- Table structure for bj_c_recharge
-- ----------------------------
DROP TABLE IF EXISTS `bj_c_recharge`;
CREATE TABLE `bj_c_recharge` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `money` float(10,2) DEFAULT NULL COMMENT '充值金额',
  `uid` int(10) DEFAULT NULL COMMENT '充值者ID',
  `create_time` int(10) DEFAULT NULL COMMENT '充值时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='客户钱包充值表';

-- ----------------------------
-- Records of bj_c_recharge
-- ----------------------------

-- ----------------------------
-- Table structure for bj_exam
-- ----------------------------
DROP TABLE IF EXISTS `bj_exam`;
CREATE TABLE `bj_exam` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `group_id` text COMMENT '题目组',
  `question` varchar(255) DEFAULT NULL COMMENT '问题',
  `option1` varchar(255) DEFAULT NULL COMMENT '选项1',
  `option2` varchar(255) DEFAULT NULL COMMENT '选项二',
  `option3` varchar(255) DEFAULT NULL COMMENT '选项3',
  `option4` varchar(255) DEFAULT NULL COMMENT '选项4',
  `orders` int(11) DEFAULT NULL COMMENT '题序',
  `status` tinyint(4) DEFAULT NULL COMMENT '状态 0未启用 1已启用',
  `tags` varchar(255) DEFAULT NULL COMMENT '类型标签',
  `correct` tinyint(4) DEFAULT NULL COMMENT '正确答案的序号',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8 COMMENT='考题数据';

-- ----------------------------
-- Records of bj_exam
-- ----------------------------
INSERT INTO `bj_exam` VALUES ('16', '29,30,31,32', '师傅接单后需几个小时内与下单用户取得联系？', '24小时', '12小时', '6小时', '2小时', null, '1', '43', '4', '1510021629', '1510555790');
INSERT INTO `bj_exam` VALUES ('17', '29,30,31,32', '如何正确接到适合自己的专业订单需要注意哪些条件？', '施工时间', '施工区域', '订单类型', '代理办证及代缴工程押金', null, '1', '43', '3', '1510022052', '1510555773');
INSERT INTO `bj_exam` VALUES ('23', '29,30,31,32', '下单方在维修订单内上传的品牌专用表格是？', '品牌专用维修表格', '品牌专用安装表格', '品牌专用勘测表格', '灯片更换表格', null, '1', '43', '1', '1510553562', '1510555758');
INSERT INTO `bj_exam` VALUES ('24', '29,30,31,32', '下单方在安装/围板搭建订单内上传的品牌专用表格是？', '品牌专用维修表格', '品牌专用安装表格', '品牌专用勘测表格', '灯片更换表格', null, '1', '43', '2', '1510554043', '1510555742');
INSERT INTO `bj_exam` VALUES ('25', '29,30,31,32', '下单方在更换灯片订单内上传的品牌专用表格是？', '品牌专用维修表格', '品牌专用安装表格', '品牌专用勘测表格', '灯片更换表格', null, '1', '43', '4', '1510554245', '1510555725');
INSERT INTO `bj_exam` VALUES ('26', '29,30,31,32', '下单方在勘测订单内上传的品牌专用表格是？', '品牌专用维修表格', '品牌专用安装表格', '品牌专用勘测表格', '灯片更换表格', null, '1', '43', '3', '1510554415', '1510555707');
INSERT INTO `bj_exam` VALUES ('27', '29,30,31,32', '标匠平台提供哪几个专用表格的下载窗口？', '标匠网络微信公众号', '标匠网络PC端', '以上都可以', '以上都不可以', null, '1', '43', '3', '1510554662', '1510555574');
INSERT INTO `bj_exam` VALUES ('28', '29,30,31,32', '接单前师傅需要具备哪些条件才可以接单？', '已经正式入住标匠师傅服务平台', '已经缴纳平台保证金', '以上都需要才可以', '以上都不需要', null, '1', '43', '3', '1510555437', '1510555678');
INSERT INTO `bj_exam` VALUES ('29', '29,30,31,32', '师傅接到订单后按照订单类型应准备好哪些安全工具？', '安全帽', '专用施工劳保鞋', '安全绳', '以上都可以', null, '1', '43', '4', '1510555921', '1510555921');
INSERT INTO `bj_exam` VALUES ('30', '30', '测量玻璃尺寸“长´宽”的准确公差是？', '比实际尺寸放小1mm', '比实际尺寸加大1mm', '比实际尺寸放小2mm', '比实际尺寸放小3mm', null, '1', '44', '1', '1510556039', '1510556457');
INSERT INTO `bj_exam` VALUES ('31', '30', '测量玻璃尺寸对角线的准确公差是？', '比实际尺寸小0.5mm可以使用', '比实际尺寸加大0.5mm可以使用', '比实际尺寸小1mm可以使用', '比实际尺寸小2mm可以使用', null, '1', '44', '3', '1510556176', '1510556176');
INSERT INTO `bj_exam` VALUES ('32', '30', '维修师傅到现场后打开包装第一件工作是什么？', '查看货物是否有破损', '查看货物尺寸是否有问题', '查看数量对不对', '以上都是', null, '1', '44', '4', '1510556342', '1510556615');
INSERT INTO `bj_exam` VALUES ('33', '30', '当玻璃尺寸及重量达到一定数值后需要借助什么工具进行搬运？', '锤子', '凿子', '手套', '玻璃吸盘', null, '1', '44', '4', '1510556594', '1510556594');
INSERT INTO `bj_exam` VALUES ('34', '30', '更换玻璃时如何保护周围货物？', '用拉伸膜进行围闭保护', '不用做保护只要正常施工就可以', '在施工范围区域进行拉伸膜保护后再用地毯封好以免砸坏其它货品', '', null, '1', '44', '3', '1510556841', '1510556841');
INSERT INTO `bj_exam` VALUES ('35', '30', '下列工具不属于更换玻璃使用的是？', '卷尺', '红外线水平仪', '锤子', '垃圾袋', null, '1', '44', '2', '1510556949', '1510556949');
INSERT INTO `bj_exam` VALUES ('36', '30', '下列答案不属于轨道类别是？', '普通2节轨道', '三节滚珠轨道', '四节轨道', '托底阻尼轨道', null, '1', '44', '3', '1510557606', '1510557606');
INSERT INTO `bj_exam` VALUES ('37', '30', '更换轨道需要携带哪些工具？', '锤子.卷尺.凿子.电批', '螺丝刀.卷尺.少量12mm螺丝.', '红外线水平仪.卷尺.', '线坠.卷尺', null, '1', '44', '3', '1510557830', '1510559161');
INSERT INTO `bj_exam` VALUES ('38', '30', '安装抽屉轨道时正确的安装方法是？', '确认好高度尺寸调好水平画好线再安装螺丝', '先把轨道安装在侧板上再式抽屉高度', '', '', null, '1', '44', '1', '1510558282', '1510558282');
INSERT INTO `bj_exam` VALUES ('39', '30', '柜门烟斗铰分几种类型？', '3种', '4种', '2种', '1种', null, '1', '44', '1', '1510558890', '1510559026');
INSERT INTO `bj_exam` VALUES ('40', '30', '专柜灯箱门一般采用什么门铰承重开门？', '烟斗合页', '加厚排铰', '天地轴', '吊门轮', null, '1', '44', '3', '1510558997', '1510558997');
INSERT INTO `bj_exam` VALUES ('41', '30', '配置玻璃吊门需要注意什么？', '注意吊轮承重', '注意安装方式', '注意安装时间', '', null, '1', '44', '1', '1510559263', '1510559263');
INSERT INTO `bj_exam` VALUES ('42', '30', '人造石开裂的维修步骤是？', '裂口处开槽后补胶水然后打磨', '裂口处补胶水打磨', '裂口处把胶水补平', '', null, '1', '44', '1', '1510559413', '1510559413');
INSERT INTO `bj_exam` VALUES ('43', '30', '人造石打磨粉尘太大怎么处理？', '把人造石用水泡一下', '倒入润滑油', '边打磨边加入少量清水', '改变加工场地', null, '1', '44', '3', '1510559588', '1510559588');
INSERT INTO `bj_exam` VALUES ('44', '30', '在不允许更换的情况下当透明玻璃出现轻度划痕时该如何处理？', '用砂纸打磨', '直接报废', '用抛光机轻度打磨', '------', null, '1', '44', '3', '1510560302', '1510710126');
INSERT INTO `bj_exam` VALUES ('45', '30', '制作台面玻璃时四角磨小R角的作用是？', '为了美观', '为了安全使用的安全角', '为了应付商场或客户', '没有目的性', null, '1', '44', '2', '1510560396', '1510560396');
INSERT INTO `bj_exam` VALUES ('46', '32', '现场油漆修复时需要注意哪些问题？', '好相邻货物的保护措施', '做好异味处理措施', '做好防火措施', '以上都要做好', null, '1', '46', '4', '1510560758', '1510560758');
INSERT INTO `bj_exam` VALUES ('47', '30', '维修地砖订单时如何对现场进行采样？', '需要查看地砖型号并取样（隐蔽处取样）', '直接拍相片拿到市场上找相同颜色地砖', '凭个人记忆差不多就行', '只要可以取到实物样品就行', null, '1', '44', '1', '1510560920', '1510561025');
INSERT INTO `bj_exam` VALUES ('48', '38', '灯片表面有少量污渍怎么处理？', '用清水轻微擦拭', '用酒精轻微擦拭', '天那水擦拭', '玻璃水轻微擦拭', null, '1', '44', '2', '1510561173', '1510626097');
INSERT INTO `bj_exam` VALUES ('49', '38', '更换灯片时需要准备哪些必备工具？', '以下都要', '壁纸刀', '美纹纹纸', '卷尺.一次性超薄手套.美工刀.美纹纸及清洁布', null, '1', '44', '4', '1510563834', '1510626085');
INSERT INTO `bj_exam` VALUES ('50', '38', '更换灯片时收到新做灯片首先做哪项工作？', '先看灯片有无破损及测量尺寸有没有问题再更换', '直接拆除需更换的灯片再看新做灯片尺寸是否正确', '......', '......', null, '1', '44', '1', '1510563955', '1510626072');
INSERT INTO `bj_exam` VALUES ('51', '38', '发光灯箱一共有几种表面材质？', '2种', '3种', '4种', '5种', null, '1', '44', '3', '1510564098', '1510626044');
INSERT INTO `bj_exam` VALUES ('52', '38', '以下发光灯箱材质的说法对么？', '以下都是', '胶片夹画灯片', '软膜灯布', '打孔挂环灯片', null, '1', '44', '1', '1510564244', '1510626031');
INSERT INTO `bj_exam` VALUES ('53', '38', '更换灯片时客户忘记或没有上传灯片落位图应如何处理？', '收到灯片先查看并一字排开及时与客户沟通', '不与客户沟通直接看到合适地方就安装上去', '......', '.....', null, '1', '44', '1', '1510564399', '1510626006');
INSERT INTO `bj_exam` VALUES ('54', '37', '勘测订单需要准备哪些工具？', '卷尺', '电子水平仪', '工程线', '以上都是', null, '1', '44', '4', '1510564587', '1510625628');
INSERT INTO `bj_exam` VALUES ('55', '37', '勘测订单要求接单师傅必须有（  ）以上相关经验。', '2年', '3年', '5年', ' 8年', null, '1', '44', '4', '1510564736', '1510625615');
INSERT INTO `bj_exam` VALUES ('56', '37', '一般当接到复杂测量现场时，为保证测量数据的准确性一共需要（  ）人现场测量?', '3人', '1人', '2人', '4人', null, '1', '44', '3', '1510624592', '1510625599');
INSERT INTO `bj_exam` VALUES ('57', '37', '勘测订单时有如下步骤，正确的步骤排序是？ （1）按照从左到右、从上到下测量每一处细节尺寸  (2)按照从左到右、从上到下拍摄细节相片 （3）勘测完后向上传相关负责人索要施工规范   (4)先咨询商场对该品牌布局有无具体要求', '（1）（2）（3）（4）', '(4)   (3)   (1)   (2)', '(4）（2）（1）（3）', '（4）（3）（2）（1）', null, '1', '45', '3', '1510624719', '1510625587');
INSERT INTO `bj_exam` VALUES ('58', '37', '勘测时不需要打印的资料是？', '商场落位图', '专柜施工图', '品牌测量表格', '下单表格', null, '1', '44', '2', '1510624922', '1510625527');
INSERT INTO `bj_exam` VALUES ('59', '37', '勘测订单一般会有哪一个职位人员在场？', '品牌区域代理商/工程部负责人', '店员/商场经理', '总代理/店员', '商场总负责人/工程部负责人', null, '1', '44', '1', '1510626308', '1510641834');
INSERT INTO `bj_exam` VALUES ('60', '37', '勘测相片合格的说法是？', '对手机像素无要求', '只要所拍物体看得见就可以', '高于800万像素就行', '目标拍摄物体无遮挡高于800万像素且垂直于手机界面可视框', null, '1', '44', '4', '1510626480', '1510626480');
INSERT INTO `bj_exam` VALUES ('61', '37', '勘测时不需要提供的相片是？', '商场门口相片', '专柜四周通道相片', '天花顶部全景相片', '商场坐标周围相片', null, '1', '44', '4', '1510626558', '1510626558');
INSERT INTO `bj_exam` VALUES ('62', '37', '勘测时不需要了解的信息是？', '专柜开业时间', '施工总高度', '吊楣（门楣）的支撑方式', '工程部上班时间', null, '1', '44', '4', '1510626727', '1510626727');
INSERT INTO `bj_exam` VALUES ('63', '37', '勘测时一般商场会要求品牌铺设地面有哪种形式是错误的？', '在原有商场地面上叠加铺设', '把品牌区域内部地面刨除后重新铺设齐平', '把品牌区域内部地面刨除后做自流平地面', '......', null, '1', '44', '3', '1510627237', '1510627289');
INSERT INTO `bj_exam` VALUES ('64', '37', '勘测时商场要求品牌施工总高度3000mm正确的理解含义是？', '背柜的实际高度3000mm', '背柜+地面的实际高度3000mm（新铺地面与商场地面齐平）', '包含了地面+背柜+帽眉的总高度（新铺地面为叠加铺设）', '背柜+帽眉的实际总高度3000mm', null, '1', '44', '3', '1510627674', '1510627674');
INSERT INTO `bj_exam` VALUES ('65', '39', '关于施工，施工时间紧张时，以下正确做法是？', '赶关键路线上的工作，（保证次日正常营业）', '赶目前正在做的工作 。', '赶非关键路线上的工作', '赶不会引起成本的工作', null, '1', '44', '1', '1510627900', '1510627912');
INSERT INTO `bj_exam` VALUES ('66', '39', '在高空作业时，安全带正确使用方法是？', ' 放在腰间', ' 放在胸部', ' 放在腰臀之间', ' 放在臀部', null, '1', '44', '3', '1510628312', '1510641812');
INSERT INTO `bj_exam` VALUES ('67', '39', '安装前需要做哪些准备工作？', '安装时间计划表', '工具清单', '安装人员计划', '以上都要', null, '1', '44', '4', '1510628470', '1510628470');
INSERT INTO `bj_exam` VALUES ('68', '39', '柜台局部损坏多数时候是由于店员操作不当损坏的，货物安装/维修后是否要与店铺相关人员沟通柜台的正确使用方法？', '不需要', '需要详细告知店员后期如何使用细节', '......', '......', null, '1', '44', '2', '1510629086', '1510641793');
INSERT INTO `bj_exam` VALUES ('69', '39', '安装订单时有如下步骤，正确的排序应该是？（1）接收货物（卸货）（2）预约进场（3）按顺序安装（4）商场验收', '   (1)   (3)   (4)   (2)', '（2）（1）（3）（4）', '（4）（3）（1）（2）', '（1）（2）（3）（4）', null, '1', '44', '2', '1510641329', '1510641329');
INSERT INTO `bj_exam` VALUES ('70', '39', '关于施工时，突发事件（商场停电、停水等）影响到正常施工时， 以下正确做法是？', '那不管我们的事，坐在那里等待解决。', '立刻向品牌方反映情况，并协助沟通解决问题。', '不通过现场管理人员，抓紧时间找出原因并解决。', '立刻像现场管理人员反映，并且要求立刻解决。', null, '1', '44', '2', '1510641434', '1510641434');
INSERT INTO `bj_exam` VALUES ('71', '39', '现场施工时，施工灰尘较大时，以下正确的防护做法是？', '随便遮挡一下即可。', '只把施工的地方保护好即可。', '不需要保护，施工完工后，让品牌方请保洁去清理。', '施工前，把周围的展柜 用保护膜全部掩盖起来。', null, '1', '44', '4', '1510641613', '1510641613');
INSERT INTO `bj_exam` VALUES ('72', '39', '现场安装完工后，现场收场注意事项，以下正确的做法是？', ' 匆匆忙忙把工具及材料收拾干净撤场。', '把卫生打扫干净，垃圾丢到指定的地方。让品牌方确认后，方可离开。离开时道别。', '施工完成后，业主确认后，直接可以离开。', '......', null, '1', '44', '2', '1510641779', '1510641779');
INSERT INTO `bj_exam` VALUES ('73', '39', '现场施工时，发生工伤事故时，以下正确的处理方法是？', '匆匆忙忙把伤者送往就近医院。', '根据实际情况，条件允许的情况下，可以让自己去医院就医，伤势严重的话，伴随去医院，拨打客服紧急电话。送医院前确保施工现场没有安全隐患。', '和我没有关系，等负责人来处理', '......', null, '1', '44', '2', '1510642064', '1510642064');
INSERT INTO `bj_exam` VALUES ('74', '39', '现场施工时，正确的清理卫生的步骤是？', '从上到下，从内到外。', '从下到上，从外到内。', '不用循规蹈矩，做好就可以', '......', null, '1', '44', '1', '1510642178', '1510642178');
INSERT INTO `bj_exam` VALUES ('75', '39', '现场施工时，除了施工证还需要带什么证件？', '驾驶证', '居住证', ' 身份证', '护照', null, '1', '44', '3', '1510642268', '1510642268');
INSERT INTO `bj_exam` VALUES ('76', '39', '现场施工时，除了施工证，电工还需要带什么证件？', '驾驶证', '居住证', '身份证、电工证', '护照', null, '1', '44', '3', '1510642455', '1510642455');
INSERT INTO `bj_exam` VALUES ('77', '39', '施工过程中，如果需要到别的区域（非品牌区域）走动及施工时，你应该怎么做？', '直接过去施工，做完赶紧撤出。', '让品牌方找到商场值班人员协调并跟随进入非品牌区域进行施工，抓紧施工，做完打扫卫生撤出。', '不在品牌区域内的，不管他，不去做，放在那里。', '......', null, '1', '44', '2', '1510642579', '1510642579');
INSERT INTO `bj_exam` VALUES ('78', '39', '现场施工时，需要上洗手间方便时，以下做法正确的是？', '直接去找卫生间，方便完赶紧回去。', '询问值班保安，在保安的指引下去指定洗手间。', '去商场外，找隐蔽的地方随便解决。', '.....', null, '1', '44', '2', '1510642692', '1510643853');
INSERT INTO `bj_exam` VALUES ('79', '39', '现场施工时，施工证的佩戴方式是？', '挂在胸前，显眼处，可以直接看到。', '放在兜内', ' 挂在腰间', '.......', null, '1', '44', '1', '1510643949', '1510643949');
INSERT INTO `bj_exam` VALUES ('80', '39', '现场施工用水，正确的取水方法是？', '就近取水', '洗手间取水', '消防栓取水', '商场保安或（工程部）指定取水点取水。', null, '1', '44', '4', '1510646201', '1510646201');
INSERT INTO `bj_exam` VALUES ('81', '39', '维修现场施工材料，下面那些材料不允许带入现场（如需带入，需提前审批的）？', '大桶装油漆', '装酒精（清洁用）', '瓶装 玻璃清洁剂', '......', null, '1', '44', '1', '1510646306', '1510646315');
INSERT INTO `bj_exam` VALUES ('83', '39', '现场施工用电，正确的取电方法是？', ' 就近取电', '品牌柜台内取电', ' 询问商场值班人员，到指定取电点取电（如果没有，品牌柜内取电）', '......', null, '1', '44', '3', '1510646567', '1510646583');
INSERT INTO `bj_exam` VALUES ('84', '39', '维修施工现场，需要电焊的，以下做法正确的是？', '提前向商场申请办理动火证，审批通过后方可施工。', '直接进入电焊，抓紧焊完撤出。', '提前向商场申请办理动火证，审批通过后方可施工。施工时，施工区域要摆放灭火器。有人看护。', '......', null, '1', '44', '3', '1510646655', '1510646655');
INSERT INTO `bj_exam` VALUES ('85', '39', '商场内部值班管理人员巡查时，要求我们停工配合检查时，应该怎么处理？', '不予理睬，继续做手中的工作。', '停止工作配合检查，得到同意后方可继续施工。', '停工，向品牌方汇报（商场值班人员影响施工）。', '直接停工，撤场。', null, '1', '44', '2', '1510646745', '1510646745');
INSERT INTO `bj_exam` VALUES ('86', '39', '施工现场，施工人员可以穿什么鞋子？', ' 拖鞋', '防水胶靴', '不裸露脚趾的工作鞋', '劳保鞋', null, '1', '44', '4', '1510646920', '1510646920');
INSERT INTO `bj_exam` VALUES ('87', '39', '施工现场，施工人员电工可以穿什么鞋子？', '专业电工绝缘劳保鞋', '拖鞋', '防水胶靴', '普通劳保鞋', null, '1', '44', '1', '1510647028', '1510647028');
INSERT INTO `bj_exam` VALUES ('88', '39', '夜间现场施工时，中途发现所配带的材料不够用怎么办！', '放在那里不做', '暂时不做影响施工的地方，与客户协调约好二次施工的时间。', '直接等甲方通知', '......', null, '1', '44', '2', '1510647239', '1510647239');
INSERT INTO `bj_exam` VALUES ('89', '39', '施工现场，施工人员如何着装（穿什么衣服）?', 'A：穿生活中的便服去维修施工', '穿有公司统一制作的工作服为品牌方服务', '随意穿戴，没有任何顾忌。', '提前与客户沟通施工时的着装问题', null, '1', '44', '4', '1510647386', '1510647386');
INSERT INTO `bj_exam` VALUES ('90', '39', '更换地砖时正确的方法是？', '注意保护周边无破损地砖', '首先把破损地砖周边用切割锯切开以免震破其它地砖', '......', '......', null, '1', '44', '2', '1510647467', '1510647467');
INSERT INTO `bj_exam` VALUES ('91', '31', '多数商场用电量达到多少以上必须用380v的电源？', ' 2000W', '3000W', '4000W', '5000W', null, '1', '45', '2', '1510648281', '1510648281');
INSERT INTO `bj_exam` VALUES ('92', '31', '220V 照明电路总电量1000W，总开关应该用什么型号的？ ', '16A', '10A', '20A', '25A', null, '1', '45', '2', '1510648387', '1510648387');
INSERT INTO `bj_exam` VALUES ('93', '31', '一般情况下，低压电器的（  ）应接负荷侧？', '动触头', ' 静触头', '不做规定', '......', null, '1', '45', '1', '1510648663', '1510648663');
INSERT INTO `bj_exam` VALUES ('94', '31', '线路中有一路电源跳闸应该怎么做？', '用万能表或摇表检测是什么原因引起的', ' 换开关', '应付了事', '......', null, '1', '45', '1', '1510648997', '1510648997');
INSERT INTO `bj_exam` VALUES ('95', '31', '电工进入施工前应去商场了解些什么情况？', '去测量', '查看现场', '找相关部门咨询施工规范，电源位置', '......', null, '1', '45', '3', '1510649158', '1510649158');
INSERT INTO `bj_exam` VALUES ('96', '31', '万能表的转换开关是实现（  ）？', ' 各种测量种类及量程的开关', '  万用表电流接通的开关', ' 接通被测物的测量开关', '......', null, '1', '45', '1', '1510650252', '1510650264');
INSERT INTO `bj_exam` VALUES ('97', '31', '绝缘鞋的实验周期是多久？', '每年一次', '6个月一次', '5个月一次', '......', null, '1', '45', '2', '1510650386', '1510650386');
INSERT INTO `bj_exam` VALUES ('98', '31', '在电路维护过程中需要上天花作业时要（  ）。', '先停电', ' 按自己方式作业', '有陪同人员在场', '......', null, '1', '45', '3', '1510650607', '1510650607');
INSERT INTO `bj_exam` VALUES ('99', '31', '接地中线相色漆规定为（  ）色。', ' 黑', ' 白', ' 绿', '双色', null, '1', '45', '1', '1510650757', '1510650757');
INSERT INTO `bj_exam` VALUES ('100', '31', 'ABC三相的颜色顺序为（  ）。', ' 绿红黄', '黄绿红', '红绿黄', '黄红双色', null, '1', '45', '2', '1510650914', '1510650914');
INSERT INTO `bj_exam` VALUES ('101', '31', '同一温度下，相同规格的四段导线，（  ）导线的电阻值最小。', ' 铜', ' 铝', '银', '锌', null, '1', '45', '2', '1510651052', '1510651052');
INSERT INTO `bj_exam` VALUES ('102', '31', '直流电的频率是（  ）Hz。', ' 0', ' 50', ' 60', '100', null, '1', '45', '1', '1510651153', '1510651153');
INSERT INTO `bj_exam` VALUES ('103', '31', '直流电的功率因数为（  ）。', ' 0', ' 1', ' ≧0', ' ≦1', null, '1', '45', '2', '1510651291', '1510651291');
INSERT INTO `bj_exam` VALUES ('104', '31', '\"我国交流电的频率是（  ）Hz	。\"', '60', '50', '100', '0', null, '1', '45', '2', '1510651404', '1510651404');
INSERT INTO `bj_exam` VALUES ('105', '31', '串联电路中各电阻两端电压的关系是（  ）。', '各电阻两端电压相等', ' 阻值越小两端电压越高', ' 阻值越大两端电压越高', '......', null, '1', '45', '3', '1510651486', '1510651486');
INSERT INTO `bj_exam` VALUES ('106', '31', '一般住宅，办公场所，以防止触电为主要目的，应选用漏电动作为（  )mA的漏电保护器', '50mA', '30mA', '15mA', '10mA', null, '1', '45', '2', '1510651596', '1510651596');
INSERT INTO `bj_exam` VALUES ('107', '31', '220V的灯具不亮，怎么判断零线断路？', 'A  用电笔测试相线', 'B测试零线和相线都有电压，用电压表却测不出电压', 'C  检查灯具', '......', null, '1', '45', '2', '1510651725', '1510651725');
INSERT INTO `bj_exam` VALUES ('108', '31', '布线过程中，接线盒里的一种接线方式是（  ）？', '缠绕法缠绕5圈以上', '交叉拧紧', '缠绕3圈', '缠绕2圈', null, '1', '45', '1', '1510651894', '1510706694');
INSERT INTO `bj_exam` VALUES ('109', '31', '线路中接触点有火星但不跳闸的，这是（  ）情况。', '短路', ' 接触不良', ' 胶布没包好', '没有挂锡', null, '1', '45', '2', '1510706633', '1510706633');
INSERT INTO `bj_exam` VALUES ('110', '31', '下面（  ）不是电工携带的工具', '万能表', ' 手锯', ' 电笔', '十字螺丝刀', null, '1', '45', '2', '1510706897', '1510706897');
INSERT INTO `bj_exam` VALUES ('111', '31', '商场电工验收不合格的情况下怎么办', '按照商场要求整改', '事不关己', ' 应付了事', '先和制作工厂沟通得到甲方允许后按商场要求施工', null, '1', '45', '4', '1510707104', '1510707104');
INSERT INTO `bj_exam` VALUES ('112', '31', '按国际标准，（  ）线只能用做保护接地或保护接地零线。', '黑色', '蓝色', '黄绿双色', '黄色', null, '1', '45', '3', '1510707185', '1510707185');
INSERT INTO `bj_exam` VALUES ('113', '31', '低压电工作业是指对(  )v以下的电气设备进行安装、调试、操作等作业。', '250', '500', ' 1000', '2000', null, '1', '45', '3', '1510707337', '1510707337');
INSERT INTO `bj_exam` VALUES ('114', '31', '人体安全电压是（  ）多少v以下。', ' 24', '36', '48', '12', null, '1', '45', '2', '1510707438', '1510707438');
INSERT INTO `bj_exam` VALUES ('115', '31', '距离100米220v电源4平方铜芯线，总功率7000w照明会出现问题吗？', '没问题', '电线超负荷，跳闸', '主线长时间可能会发热', '......', null, '1', '45', '2', '1510707531', '1510707531');
INSERT INTO `bj_exam` VALUES ('116', '31', '熔断器在照明线路上是作为（  ）保护装置。', '开关', '电阻', '过载及短路', '短路', null, '1', '45', '3', '1510707681', '1510707681');
INSERT INTO `bj_exam` VALUES ('117', '31', '各配电箱回路保护断路器均应具有（  ）保护功能。', '过载和短路', '漏电', ' 发热', '接触不良', null, '1', '45', '1', '1510707796', '1510707796');
INSERT INTO `bj_exam` VALUES ('118', '31', '灯箱内有木质材料，需均匀粉刷（  ）以上仿火涂料。', '  一遍', '二遍', ' 三遍', '......', null, '1', '45', '3', '1510707894', '1510707894');
INSERT INTO `bj_exam` VALUES ('119', '31', '铺设线路时必须用相应的（  ）进行敷设，禁止直接敷设线缆。', ' PVC管', ' KBG管', '黄腊管', '水管', null, '1', '45', '2', '1510708016', '1510708016');
INSERT INTO `bj_exam` VALUES ('120', '31', '喷淋头与灯具的水平净距离应大于（  ）。', '0.2米', '0.3米', '0.4米', '0.5米', null, '1', '45', '2', '1510708096', '1510708096');
INSERT INTO `bj_exam` VALUES ('121', '31', '射灯，金卤灯等高热量灯具电源线连接须使用（  ）或加穿阻燃管', '护套线', '软线', '普通 阻燃线', '高温线', null, '1', '45', '3', '1510708195', '1510708195');
INSERT INTO `bj_exam` VALUES ('122', '31', '施工必须使用金属线管或阻燃管，金属线管须做（  ），所有电器必须接地保护。', ' 跨接接地线', '保护', '卡牢固', '......', null, '1', '45', '1', '1510708993', '1510708993');
INSERT INTO `bj_exam` VALUES ('123', '31', '墙面插座离地面不低于（  ）。', '250mm', '300mm', '500mm', '450mm', null, '1', '45', '2', '1510709082', '1510709082');
INSERT INTO `bj_exam` VALUES ('124', '31', 'LED灯条分24v和12v。那么24v的灯条用12v的电源结果是（  ）。', ' 正常', '不亮', ' 烧坏灯珠', '......', null, '1', '45', '2', '1510709233', '1510709233');
INSERT INTO `bj_exam` VALUES ('125', '31', 'LED灯条12v“5050”的一个接头最多可以带（  ）米。', '10', ' 20', '30', '40', null, '1', '45', '1', '1510709388', '1510709388');
INSERT INTO `bj_exam` VALUES ('126', '31', 'LED灯条12v“5050”60珠一米有（  ）。', '7W左右', '14.4W左右', '10w左右', '20w左右', null, '1', '45', '2', '1510709511', '1510709511');
INSERT INTO `bj_exam` VALUES ('127', '29', '工作中处理事情的态度是（  ）。', ' 同时处理多件事情', '以一件事为主，同时兼顾其他', '一次只处理一件事情', '------', null, '1', '43', '3', '1510710255', '1510710294');
INSERT INTO `bj_exam` VALUES ('128', '31', '电路在工作时有三种状态：通路状态，断路状态和（    ）。', '短路状态', '工作状态', '开路状态', '----', null, '1', '45', '1', '1510711189', '1510711189');
INSERT INTO `bj_exam` VALUES ('129', '31', '双字母符号是由一个表示种类的单字母符号与一个表示功能的字母组成，如（  ）表示断路器。', ' QF ', 'QS', 'QM', '......', null, '1', '45', '1', '1510711328', '1510711328');
INSERT INTO `bj_exam` VALUES ('130', '31', '在TN-C-S系统中，将进户配电箱的金属外壳接地，称为（  ）。', '工作接地', '保护接地', ' 重复接地', '......', null, '1', '45', '3', '1510711522', '1510711522');
INSERT INTO `bj_exam` VALUES ('131', '31', '（  ）是铜芯绝缘钢带铠装电力电缆。', 'YJV', 'YJV22', ' YJLV', '......', null, '1', '45', '2', '1510711643', '1510711643');
INSERT INTO `bj_exam` VALUES ('132', '31', 'LED灯条12v“5050”60珠 20米最小用（  ）的电源。', '200W', '150W', '350W', '100W', null, '1', '45', '3', '1510711752', '1510711752');
INSERT INTO `bj_exam` VALUES ('133', '31', '用灭火器灭火时，灭火器的喷射口应该对准火焰的（  ）。', '根部', '上部', '中部', '......', null, '1', '45', '1', '1510711841', '1510711841');
INSERT INTO `bj_exam` VALUES ('134', '31', '施工过程中，临时灯具不可以挂在（  ）。', ' 墙面', '喷淋上', '龙骨上', '电线桥架上', null, '1', '45', '2', '1510712078', '1510712078');
INSERT INTO `bj_exam` VALUES ('135', '31', '施工现场，临时用带电工具应该采取(  )。', '接入移动开关箱', ' 随便找个电源接入', ' 裸线插入', '......', null, '1', '45', '1', '1510712188', '1510712188');
INSERT INTO `bj_exam` VALUES ('136', '31', '用绝缘电阻表摇测绝缘电阻时，要用单根电线分别将线路 L 及接地 E 端与被测物联接。其中(    )端的联结线要与大地保持良好绝缘。', 'L', ' E', 'A', 'C', null, '1', '45', '1', '1510712287', '1510712287');
INSERT INTO `bj_exam` VALUES ('137', '31', '高压负荷开关使用通常与高压熔断器配合使用，利用熔断器来切断（   ）故障。', '过压     ', '短路        ', '过载        ', '欠压', null, '1', '45', '2', '1510714062', '1510714178');
INSERT INTO `bj_exam` VALUES ('138', '31', '导线的安全载流量主要取决于（   ）的最高允许温度。', '导线工作环境  ', '导线线芯    ', '导线绝缘', '......', null, '1', '45', '3', '1510714156', '1510714156');
INSERT INTO `bj_exam` VALUES ('139', '31', '在施工过程中接线盒内线头应留（  ）左右，以方便接线为宜。', ' 50mm', '150mm', '300mm', '500mm', null, '1', '45', '2', '1510714297', '1510714297');
INSERT INTO `bj_exam` VALUES ('140', '31', '柜台主电源应该与商场的（  ）部门沟通。', '招商部', '工程部', '销售部', '楼面主管', null, '1', '45', '2', '1510714427', '1510714427');
INSERT INTO `bj_exam` VALUES ('141', '31', '商场柜台总电量超过2000W,商场提供220V供电，我们主电源应该用（  ）的铜芯线。', '2.5平方', '6平方', '4平方', '1.5平方', null, '1', '45', '3', '1510714526', '1510714526');
INSERT INTO `bj_exam` VALUES ('142', '31', '在布线过程中，电源接头应在（  ）里进行。', ' 接线盒', '无要求', '管内', '......', null, '1', '45', '1', '1510714608', '1510714618');
INSERT INTO `bj_exam` VALUES ('143', '31', '商场柜台灯具变压器应该放置在（   ）。', '铁盒内', '灯箱内', '通风处', '无要求', null, '1', '45', '1', '1510714706', '1510714706');
INSERT INTO `bj_exam` VALUES ('144', '31', '商场柜台灯具下面应该垫(   ),起到隔热作用。', '细木工板', '石棉垫', '石膏板', '密度板', null, '1', '45', '2', '1510714833', '1510714833');
INSERT INTO `bj_exam` VALUES ('145', '31', '阻燃线的标志是（  ）。', ' RZ', 'BV ', 'RIB', 'WD', null, '1', '45', '2', '1510714946', '1510714946');
INSERT INTO `bj_exam` VALUES ('146', '31', '在220V供电中1千瓦的电流是（   ）A。', '2-3', '4-5', '10', '15', null, '1', '45', '2', '1510715712', '1510715730');
INSERT INTO `bj_exam` VALUES ('147', '31', '在维修或更换灯具时要（   ）电源操作预防触电。', '开', '关', '没关系，只要注意就行', '.......', null, '1', '45', '2', '1510715823', '1510715823');
INSERT INTO `bj_exam` VALUES ('148', '31', '商场天花布线穿镀锌管，二次出线穿金属软管不得超过（  ）mm', '500', ' 800', '1000', '900', null, '1', '45', '1', '1510715912', '1510715912');
INSERT INTO `bj_exam` VALUES ('149', '30', '专柜中吊眉支撑方式有几种？', '1种', '2种', '3种', '4种', null, '1', '44', '2', '1510716032', '1510716046');
INSERT INTO `bj_exam` VALUES ('150', '30', '在维修订单里面同角度对比相片指的是？', ' 拍维修好以后的相片', '拍维修前相片', '维修后', ' 在同一角度基础上进行维修前后的2张相片', null, '1', '44', '4', '1510716118', '1510716118');
INSERT INTO `bj_exam` VALUES ('151', '29,30,31,32,36,37,38,39', '商场内部施工普遍使用的登高工具是哪种？', '木质梯子', '加厚铝制梯子', '活动式脚手架', '以上都是', null, '1', '43', '4', '1510716549', '1510723112');
INSERT INTO `bj_exam` VALUES ('152', '29,30,31,32,36,37,38,39', '标匠师傅只有具备了高超的(   )，才有可能解决职业活动中遇到的高难度问题，才可成为行业中的专家或内行。', '规范', '技术', '关系', '修养', null, '1', '43', '2', '1510716692', '1512107197');
INSERT INTO `bj_exam` VALUES ('153', '29,30,31,32,36,37,38,39', '师傅打印下单方上传的专用表格后与所接订单类型不符怎么办？', '及时与下单方沟通再次发送正确表格', '与下单方沟通使用标匠平台专用表格', '直接使用现有表格', '......', null, '1', '43', '1', '1510716862', '1510723188');
INSERT INTO `bj_exam` VALUES ('154', '29,30,31,32,36,37,38,39', '入驻标匠师傅端后看不见推送订单？', '本地区还没有相关专业订单', '需要缴纳一定保证金后系统才会推送', '未登陆标匠系统', '实名认证未通过', null, '1', '43', '2', '1510717181', '1510723220');
INSERT INTO `bj_exam` VALUES ('155', '29,30,31,32,36,37,38,39', '标匠平台作为国内第一家O2O商业专柜售后服务平台与其他平台有什么区别？', '服务更专业', '服务区域更广泛', '时效更短', '以上都具备', null, '1', '43', '4', '1510717253', '1510723244');
INSERT INTO `bj_exam` VALUES ('156', '29,30,31,32,36,37,38,39', '新入驻师傅如何快速成长接到更多心仪订单？', '多登陆标匠服务平台并按时使用签到功能', '在标匠服务平台多进行报价增加活跃度', '在最短时间内促成第一单交易', '以上都是', null, '1', '43', '4', '1510717439', '1510723260');
INSERT INTO `bj_exam` VALUES ('157', '29,30,31,32,36,37,38,39', '接单后如果非个人原因导致未按预约时间到达现场怎么办？', '不是我的问题就不和客户及时沟通', '不管是不是个人原因都要和客户联系并取得谅解', '......', '......', null, '1', '43', '2', '1510717525', '1510723282');
INSERT INTO `bj_exam` VALUES ('158', '29,30,31,32,36,37,38,39', '接单后师傅到现场发现实际工作量与平台不符怎么办？', '与下单方沟通通过平台追加项目并确认', '主动与下单方沟通线下交易', '先做完再和客户沟通', '......', null, '1', '43', '1', '1510717716', '1510723299');
INSERT INTO `bj_exam` VALUES ('159', '29,30,31,32,36,37,38,39', '施工过程中损坏物品的处理方式是？', '及时拍照并主动承担责任', '只要客户/商场当时没有发现就不主动提出来', '待客户/商场发现再说', '......', null, '1', '43', '1', '1510717821', '1510723316');
INSERT INTO `bj_exam` VALUES ('160', '29,30,31,32,36,37,38,39', '提货过程中发现货物有异常情况的处理方式是？', '及时拍照上传平台并通知下单方', '货物坏了和我没什么关系', '先拍相片等拆开包装后货物有问题再一次性汇报', '......', null, '1', '43', '1', '1510717978', '1510734153');
INSERT INTO `bj_exam` VALUES ('161', '29,30,31,32,36,37,38,39', '遇上不好沟通的客户怎么办？', '主动咨询客户了解是不是因为此单业务哪里做的不够好。', '主观臆测认为客户是有意刁难', '不要与客户发生直接性的争执，通过平台进行仲裁渠道解决', '......', null, '1', '43', '3', '1510718199', '1510723356');
INSERT INTO `bj_exam` VALUES ('162', '29,30,31,32,36,37,38,39', '订单完成后是否需要提醒客户保存联系方式？', '需要但不主动提出', '这个单子我已经完成了和我没有关系', '不需要', '主动提醒客户保留双方联系方式', null, '1', '43', '4', '1510723019', '1510723371');
INSERT INTO `bj_exam` VALUES ('163', '29,30,31,32,36,37,38,39', '师傅到物流提货短时间内无法联系到物流公司怎么处理？', '间隔15分钟多次尝试拨打', '第一时间与下单用户沟通并采取备选方案', '以上都不需要等待物流公司主动和我联系', '......', null, '1', '43', '2', '1510723765', '1510723801');
INSERT INTO `bj_exam` VALUES ('164', '29,30,31,32,36,37,38,39', '师傅在签收单签字确认后（发货方产品质量问题除外）是否还需要无条件配合商场验收及整改?', 'A：需要', 'B：我已经签字了不需要', '......', '......', null, '1', '43', '1', '1510723919', '1510723946');
INSERT INTO `bj_exam` VALUES ('165', '29,30,31,32,36,37,38,39', '师傅到物流提货短时间内无法联系到物流公司怎么处理？', '间隔15分钟多次尝试拨打', '多次联系不上后第一时间与下单用户沟通并采取备选联系人', '以上都不需要等待物流公司主动和我联系', '......', null, '1', '43', '2', '1510724211', '1510724211');
INSERT INTO `bj_exam` VALUES ('166', '29,30,31,32,36,37,38,39', '师傅在签收单签字确认后（发货方产品质量问题除外）是否还需要无条件配合商场验收及整改?', '需要', '我已经签字了不需要', '......', '......', null, '1', '43', '1', '1510724371', '1510724371');
INSERT INTO `bj_exam` VALUES ('167', '29,30,31,32,36,37,38,39', '师傅完成服务后垃圾如何处理？', '不管它直接走人', '首先咨询在场客户有没有小型公共垃圾场', '少量垃圾顺手打包放到街边垃圾桶', '所有垃圾送到指定垃圾处理中心后把所带标签及logo销毁后师傅才离开', null, '1', '43', '4', '1510724551', '1510724551');
INSERT INTO `bj_exam` VALUES ('168', '31', '接到维修订单后应准备好哪些工具？', 'A：卷尺', 'B：锤子（榔头）', 'C：电批', 'D：以上都有', null, '1', '44', '4', '1510724675', '1510728151');
INSERT INTO `bj_exam` VALUES ('169', '29,30,31,32,37,38,39', '在维修时发现新的问题怎么做？', '  下次再说', '及时报告及时处理', 'C  自己处理', '......', null, '1', '43', '2', '1510724852', '1510724870');
INSERT INTO `bj_exam` VALUES ('170', '29,30,31,32,36,37,38,39', '维修师傅到达商场后发现实际维修内容与接单信息不一致下单用户要求私下解决师傅如何回复？', 'A：主动与下单用户沟通线下解决新增款项', 'B：**先生/女士你好根据平台要求是要在线上做完追加报价后才可以服务新增项的维修', '......', '......', null, '1', '43', '2', '1510725219', '1510725219');
INSERT INTO `bj_exam` VALUES ('171', '31', '维修灯具时的正确排查方式是？', '先断电源把故障灯具拆下来用到其他位置看看有没有坏掉，查看灯具型号再采购', '直接拆下故障灯具查看型号再采购', '......', '......', null, '1', '45', '1', '1510725429', '1510728008');
INSERT INTO `bj_exam` VALUES ('172', '29,30,31,32,36,37,38,39', '师傅完成订单上传后可通过哪几项途径索要确认码？', '通过下单用户手机短信查看', '通过下单用户订单详情查看', '以上2种都可以', '......', null, '1', '43', '3', '1510725528', '1512636271');

-- ----------------------------
-- Table structure for bj_exam_group
-- ----------------------------
DROP TABLE IF EXISTS `bj_exam_group`;
CREATE TABLE `bj_exam_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `exam_ids` text COMMENT '各个试题的id',
  `group_title` varchar(30) DEFAULT NULL COMMENT '题组名',
  `level` tinyint(4) DEFAULT '0' COMMENT '考题难度',
  `author` int(11) DEFAULT NULL COMMENT '创建者ID',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  `type` int(10) DEFAULT '1' COMMENT ' 考试类型，1为普通试卷，2为随机题且有固定题数的试卷',
  `status` tinyint(1) DEFAULT '1' COMMENT '状态',
  `tags_id` int(11) DEFAULT NULL COMMENT '试卷  标签',
  `subtags` varchar(50) DEFAULT NULL COMMENT '子标签',
  `examnum` int(5) DEFAULT NULL COMMENT '  随机题目的题数',
  PRIMARY KEY (`id`),
  KEY `group_title` (`group_title`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8 COMMENT='考题分组';

-- ----------------------------
-- Records of bj_exam_group
-- ----------------------------
INSERT INTO `bj_exam_group` VALUES ('29', '172,170,169,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,152,151,127,29,28,27,26,25,24,23,17,16,', '接单题', '0', '1', null, null, '1', '1', '43', null, null);
INSERT INTO `bj_exam_group` VALUES ('30', '172,170,169,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,152,151,150,149,47,45,44,43,42,41,40,39,38,37,36,35,34,33,32,31,30,29,28,27,26,25,24,23,17,16,', '商业木工综合', '0', '1', null, null, '1', '1', '44', null, null);
INSERT INTO `bj_exam_group` VALUES ('31', '172,171,170,169,168,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,152,151,148,147,146,145,144,143,142,141,140,139,138,137,136,135,134,133,132,131,130,129,128,126,125,124,123,122,121,120,119,118,117,116,115,114,113,112,111,110,109,108,107,106,105,104,103,102,101,100,99,98,97,96,95,94,93,92,91,29,28,27,26,25,24,23,17,16,', '商业电工综合', '0', '1', null, null, '1', '1', '45', null, null);
INSERT INTO `bj_exam_group` VALUES ('32', '172,170,169,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,152,151,46,29,28,27,26,25,24,23,17,16,', '商业油漆工综合', '0', '1', null, null, '1', '1', '46', null, null);
INSERT INTO `bj_exam_group` VALUES ('33', '', '平台奖罚制度', '0', '1', null, null, '1', '1', '47', null, null);
INSERT INTO `bj_exam_group` VALUES ('36', '172,170,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,152,151,', '抢单随机', '0', '1', null, null, '1', '1', '40', null, null);
INSERT INTO `bj_exam_group` VALUES ('37', '172,170,169,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,152,151,64,63,62,61,60,59,58,57,56,55,54,', '测量专项考题', '0', '1', null, '1510625680', '1', '1', '40', null, null);
INSERT INTO `bj_exam_group` VALUES ('38', '172,170,169,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,152,151,53,52,51,50,49,48,', '更换灯片专项考题', '0', '1', null, '1510625820', '1', '1', '40', null, null);
INSERT INTO `bj_exam_group` VALUES ('39', '172,170,169,167,166,165,164,163,162,161,160,159,158,157,156,155,154,153,152,151,90,89,88,87,86,85,84,83,81,80,79,78,77,76,75,74,73,72,71,70,69,68,67,66,65,', '安装专项考题', '0', '1', null, null, '1', '1', null, null, null);

-- ----------------------------
-- Table structure for bj_exam_record
-- ----------------------------
DROP TABLE IF EXISTS `bj_exam_record`;
CREATE TABLE `bj_exam_record` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `uid` int(11) DEFAULT NULL COMMENT '考试人id',
  `exam_group_id` int(11) DEFAULT NULL COMMENT '考试题组id',
  `exam_score` tinyint(4) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=818 DEFAULT CHARSET=utf8 COMMENT='用户考试记录';

-- ----------------------------
-- Records of bj_exam_record
-- ----------------------------
INSERT INTO `bj_exam_record` VALUES ('782', '71', '29', '0', '1512543448');
INSERT INTO `bj_exam_record` VALUES ('783', '56', '29', null, '1512631055');
INSERT INTO `bj_exam_record` VALUES ('784', '70', '29', null, '1512631158');
INSERT INTO `bj_exam_record` VALUES ('785', '70', '30', null, '1512632077');
INSERT INTO `bj_exam_record` VALUES ('786', '70', '29', null, '1512632120');
INSERT INTO `bj_exam_record` VALUES ('787', '56', '29', null, '1512632589');
INSERT INTO `bj_exam_record` VALUES ('788', '56', '29', null, '1512632853');
INSERT INTO `bj_exam_record` VALUES ('789', '56', '29', null, '1512632924');
INSERT INTO `bj_exam_record` VALUES ('790', '56', '29', null, '1512633149');
INSERT INTO `bj_exam_record` VALUES ('791', '56', '29', null, '1512633201');
INSERT INTO `bj_exam_record` VALUES ('792', '56', '30', null, '1512633217');
INSERT INTO `bj_exam_record` VALUES ('793', '56', '29', null, '1512633220');
INSERT INTO `bj_exam_record` VALUES ('794', '56', '29', '30', '1512633279');
INSERT INTO `bj_exam_record` VALUES ('795', '56', '29', '30', '1512633413');
INSERT INTO `bj_exam_record` VALUES ('796', '56', '29', null, '1512633482');
INSERT INTO `bj_exam_record` VALUES ('797', '56', '29', null, '1512633524');
INSERT INTO `bj_exam_record` VALUES ('798', '56', '29', '40', '1512633532');
INSERT INTO `bj_exam_record` VALUES ('799', '56', '29', null, '1512633695');
INSERT INTO `bj_exam_record` VALUES ('800', '70', '30', null, '1512634133');
INSERT INTO `bj_exam_record` VALUES ('801', '56', '29', '30', '1512634214');
INSERT INTO `bj_exam_record` VALUES ('802', '56', '29', '3', '1512634284');
INSERT INTO `bj_exam_record` VALUES ('803', '56', '29', '0', '1512634389');
INSERT INTO `bj_exam_record` VALUES ('804', '70', '30', null, '1512634396');
INSERT INTO `bj_exam_record` VALUES ('805', '70', '29', null, '1512635358');
INSERT INTO `bj_exam_record` VALUES ('806', '70', '30', null, '1512635581');
INSERT INTO `bj_exam_record` VALUES ('807', '70', '29', null, '1512635603');
INSERT INTO `bj_exam_record` VALUES ('808', '56', '29', '90', '1512698544');
INSERT INTO `bj_exam_record` VALUES ('809', '66', '30', null, '1512715110');
INSERT INTO `bj_exam_record` VALUES ('810', '56', '39', '70', '1512719560');
INSERT INTO `bj_exam_record` VALUES ('811', '56', '39', null, '1512719812');
INSERT INTO `bj_exam_record` VALUES ('812', '56', '39', '70', '1512719876');
INSERT INTO `bj_exam_record` VALUES ('813', '56', '39', '80', '1512720028');
INSERT INTO `bj_exam_record` VALUES ('814', '56', '39', '66', '1512720079');
INSERT INTO `bj_exam_record` VALUES ('815', '56', '39', '77', '1512781610');
INSERT INTO `bj_exam_record` VALUES ('816', '56', '39', '90', '1512785177');
INSERT INTO `bj_exam_record` VALUES ('817', '56', '39', null, '1512800822');

-- ----------------------------
-- Table structure for bj_exam_tags
-- ----------------------------
DROP TABLE IF EXISTS `bj_exam_tags`;
CREATE TABLE `bj_exam_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(255) DEFAULT NULL COMMENT '考题标签',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态',
  `create_time` int(10) NOT NULL COMMENT '时间戳',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COMMENT='考题标签';

-- ----------------------------
-- Records of bj_exam_tags
-- ----------------------------
INSERT INTO `bj_exam_tags` VALUES ('40', '接单随机', '1', '1504851677');
INSERT INTO `bj_exam_tags` VALUES ('41', '升级随机', '1', '1509589768');
INSERT INTO `bj_exam_tags` VALUES ('43', '接单题', '1', '1510020978');
INSERT INTO `bj_exam_tags` VALUES ('44', '商业_木工_综合', '1', '1510021137');
INSERT INTO `bj_exam_tags` VALUES ('45', '商业_电工_综合', '1', '1510021156');
INSERT INTO `bj_exam_tags` VALUES ('46', '商业_油漆工_综合', '1', '1510021179');
INSERT INTO `bj_exam_tags` VALUES ('47', '平台奖罚制度', '1', '1510021221');

-- ----------------------------
-- Table structure for bj_goods
-- ----------------------------
DROP TABLE IF EXISTS `bj_goods`;
CREATE TABLE `bj_goods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL COMMENT '商品名称',
  `img` varchar(64) DEFAULT NULL COMMENT '商品图片',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '开关',
  `y_id` int(10) NOT NULL COMMENT '商品分类对应ID',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='商品表';

-- ----------------------------
-- Records of bj_goods
-- ----------------------------
INSERT INTO `bj_goods` VALUES ('1', '空调不制冷', '', '1', '2', '1500709166', '1500709166');
INSERT INTO `bj_goods` VALUES ('2', '空调不制热', '', '1', '2', '1500709181', '1500709181');
INSERT INTO `bj_goods` VALUES ('3', '中央空调漏水', '', '1', '2', '1500709202', '1500709202');
INSERT INTO `bj_goods` VALUES ('4', '遥控器开关失灵', '', '1', '2', '1500709218', '1500709218');
INSERT INTO `bj_goods` VALUES ('5', '主机异响', '', '1', '2', '1500709237', '1500709237');
INSERT INTO `bj_goods` VALUES ('6', '主机不工作', '', '1', '3', '1500709258', '1500709258');
INSERT INTO `bj_goods` VALUES ('7', '遥控器开关失灵', '', '1', '3', '1500709283', '1500709283');
INSERT INTO `bj_goods` VALUES ('8', '主机显示灯不亮', '', '1', '3', '1500709299', '1500709299');
INSERT INTO `bj_goods` VALUES ('9', '地砖修复', '', '1', '1', '1500709371', '1500709371');
INSERT INTO `bj_goods` VALUES ('10', '现场乳胶漆修复', '', '1', '1', '1500709392', '1500709392');
INSERT INTO `bj_goods` VALUES ('11', '天花灯具', '', '1', '1', '1500709406', '1500709406');
INSERT INTO `bj_goods` VALUES ('12', '故障位有异味', '', '1', '4', '1500709432', '1500709432');
INSERT INTO `bj_goods` VALUES ('13', '变压器损坏', '', '1', '4', '1500709450', '1500709450');
INSERT INTO `bj_goods` VALUES ('14', '焊点松脱', '', '1', '4', '1500709467', '1500709467');
INSERT INTO `bj_goods` VALUES ('15', '抽屉锁', '', '1', '5', '1500709483', '1500709483');
INSERT INTO `bj_goods` VALUES ('16', '普通轨道', '', '1', '5', '1500709499', '1500709499');
INSERT INTO `bj_goods` VALUES ('17', '阻尼轨道', '', '1', '5', '1500709540', '1500709540');
INSERT INTO `bj_goods` VALUES ('18', '钥匙门锁', '', '1', '5', '1500709554', '1500709554');
INSERT INTO `bj_goods` VALUES ('19', '柜台合页', '', '1', '5', '1500709575', '1500709575');
INSERT INTO `bj_goods` VALUES ('20', '漆面损坏需师傅现场配色', '', '1', '7', '1500709592', '1503106832');
INSERT INTO `bj_goods` VALUES ('21', '场外修复', '', '1', '7', '1500709606', '1500709606');
INSERT INTO `bj_goods` VALUES ('23', '现场更换玻璃(货已经到店铺或物流中心）', '', '1', '8', '1500709671', '1503284257');
INSERT INTO `bj_goods` VALUES ('24', '玻璃破损需现场测量更换', '', '1', '8', '1500709688', '1503107362');
INSERT INTO `bj_goods` VALUES ('25', '玻璃松动重新打胶固定', '', '1', '8', '1500709717', '1503107300');
INSERT INTO `bj_goods` VALUES ('26', '灯具不亮', '', '1', '6', '1500709748', '1503106891');
INSERT INTO `bj_goods` VALUES ('27', '灯具闪烁', '', '1', '6', '1500709764', '1503107044');
INSERT INTO `bj_goods` VALUES ('28', '空调不制冷', '', '1', '14', '1502845164', '1502845164');
INSERT INTO `bj_goods` VALUES ('29', '空调不制热', '', '1', '14', '1502845240', '1502845240');
INSERT INTO `bj_goods` VALUES ('30', '中央空调漏水', '', '1', '14', '1502845332', '1502845332');
INSERT INTO `bj_goods` VALUES ('31', '遥控器/手动控制按钮失灵', '', '1', '14', '1502845434', '1502845434');
INSERT INTO `bj_goods` VALUES ('32', '主机异响', '', '1', '14', '1502845458', '1502845458');
INSERT INTO `bj_goods` VALUES ('33', '地砖修复/更换', '', '1', '15', '1502845514', '1502845514');
INSERT INTO `bj_goods` VALUES ('34', '乳胶漆修复', '', '1', '15', '1502845541', '1502845541');
INSERT INTO `bj_goods` VALUES ('35', '天花灯具不亮', '', '1', '15', '1502845583', '1502845583');
INSERT INTO `bj_goods` VALUES ('36', '故障位有异味', '', '1', '16', '1502845663', '1502845663');
INSERT INTO `bj_goods` VALUES ('37', '变压器损坏', '', '1', '16', '1502845697', '1502845697');
INSERT INTO `bj_goods` VALUES ('38', '焊点松脱', '', '1', '16', '1502845735', '1502845735');
INSERT INTO `bj_goods` VALUES ('39', '更换抽屉锁', '', '1', '17', '1502845809', '1502845809');
INSERT INTO `bj_goods` VALUES ('40', '更换普通轨道', '', '1', '17', '1502845845', '1502845845');
INSERT INTO `bj_goods` VALUES ('41', '更换阻尼轨道', '', '1', '17', '1502845866', '1502845866');
INSERT INTO `bj_goods` VALUES ('42', '更换玻璃门锁', '', '1', '17', '1502845966', '1502845966');
INSERT INTO `bj_goods` VALUES ('43', '更换柜门合页', '', '1', '17', '1502846208', '1506394700');
INSERT INTO `bj_goods` VALUES ('44', '其他', '', '1', '18', '1506504135', '1506504135');

-- ----------------------------
-- Table structure for bj_grabfe
-- ----------------------------
DROP TABLE IF EXISTS `bj_grabfe`;
CREATE TABLE `bj_grabfe` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `stype` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_grabfe
-- ----------------------------
INSERT INTO `bj_grabfe` VALUES ('1', '1');
INSERT INTO `bj_grabfe` VALUES ('2', '2');
INSERT INTO `bj_grabfe` VALUES ('3', '3');
INSERT INTO `bj_grabfe` VALUES ('4', '4');
INSERT INTO `bj_grabfe` VALUES ('5', '5');

-- ----------------------------
-- Table structure for bj_guarantee
-- ----------------------------
DROP TABLE IF EXISTS `bj_guarantee`;
CREATE TABLE `bj_guarantee` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(10) DEFAULT NULL COMMENT '充值者ID',
  `guarantee` decimal(10,2) DEFAULT NULL COMMENT '保障金金额',
  `create_time` int(10) DEFAULT NULL COMMENT '充值时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='保障金表';

-- ----------------------------
-- Records of bj_guarantee
-- ----------------------------
INSERT INTO `bj_guarantee` VALUES ('5', '34', '0.01', '5');
INSERT INTO `bj_guarantee` VALUES ('6', '71', '18.00', '1512719950');
INSERT INTO `bj_guarantee` VALUES ('7', '61', null, '1512719950');
INSERT INTO `bj_guarantee` VALUES ('9', '38', '10.00', null);
INSERT INTO `bj_guarantee` VALUES ('10', '38', '10.00', null);
INSERT INTO `bj_guarantee` VALUES ('11', '61', null, null);
INSERT INTO `bj_guarantee` VALUES ('12', '38', null, null);
INSERT INTO `bj_guarantee` VALUES ('13', '61', null, null);
INSERT INTO `bj_guarantee` VALUES ('14', '38', '-10.00', null);
INSERT INTO `bj_guarantee` VALUES ('15', '61', '-10.00', null);
INSERT INTO `bj_guarantee` VALUES ('16', '38', null, null);
INSERT INTO `bj_guarantee` VALUES ('17', '61', '10.00', null);
INSERT INTO `bj_guarantee` VALUES ('18', '61', null, null);
INSERT INTO `bj_guarantee` VALUES ('19', '61', null, null);
INSERT INTO `bj_guarantee` VALUES ('20', '61', null, null);
INSERT INTO `bj_guarantee` VALUES ('21', '61', null, null);
INSERT INTO `bj_guarantee` VALUES ('1512719950', '1512719950', '99999999.99', '1512719950');

-- ----------------------------
-- Table structure for bj_imgs
-- ----------------------------
DROP TABLE IF EXISTS `bj_imgs`;
CREATE TABLE `bj_imgs` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `image` varchar(255) NOT NULL COMMENT '图片保存的路径',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1283 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bj_imgs
-- ----------------------------
INSERT INTO `bj_imgs` VALUES ('938', '4cc3c201711061758166609.jpg');
INSERT INTO `bj_imgs` VALUES ('939', '7a450201711061758183020.jpg');
INSERT INTO `bj_imgs` VALUES ('940', '533a8201711061758218952.jpg');
INSERT INTO `bj_imgs` VALUES ('941', '4af6a201711061758254854.jpg');
INSERT INTO `bj_imgs` VALUES ('942', '86402201711061758284737.jpg');
INSERT INTO `bj_imgs` VALUES ('943', '759a1201711061758387050.jpg');
INSERT INTO `bj_imgs` VALUES ('944', '1611a201711061758416570.jpg');
INSERT INTO `bj_imgs` VALUES ('945', '0d8bb201711061758434934.jpg');
INSERT INTO `bj_imgs` VALUES ('946', '17167201711061759336581.jpg');
INSERT INTO `bj_imgs` VALUES ('947', '4ad8e201711061825012848.jpg');
INSERT INTO `bj_imgs` VALUES ('948', 'a6538201711061825039745.jpg');
INSERT INTO `bj_imgs` VALUES ('949', '7a06d201711061825051905.jpg');
INSERT INTO `bj_imgs` VALUES ('950', 'e8934201711061825094722.jpg');
INSERT INTO `bj_imgs` VALUES ('951', 'd0e89201711061825116011.jpg');
INSERT INTO `bj_imgs` VALUES ('952', '16955201711061825169024.jpg');
INSERT INTO `bj_imgs` VALUES ('953', '62a3f201711061825184944.jpg');
INSERT INTO `bj_imgs` VALUES ('954', '38cbc20171106182618272.jpg');
INSERT INTO `bj_imgs` VALUES ('955', '3bfe0201711061826201753.jpg');
INSERT INTO `bj_imgs` VALUES ('956', '5e1f8201711061826224690.jpg');
INSERT INTO `bj_imgs` VALUES ('957', '0915f201711061826245380.jpg');
INSERT INTO `bj_imgs` VALUES ('958', '114c3201711061826268614.jpg');
INSERT INTO `bj_imgs` VALUES ('959', 'c37dc201711061826463936.jpg');
INSERT INTO `bj_imgs` VALUES ('960', 'efda1201711061826488895.jpg');
INSERT INTO `bj_imgs` VALUES ('961', '1202f201711061826508891.jpg');
INSERT INTO `bj_imgs` VALUES ('962', 'd3130201711061859512172.jpg');
INSERT INTO `bj_imgs` VALUES ('963', 'd5d14201711061859532601.jpg');
INSERT INTO `bj_imgs` VALUES ('964', '1784d201711061859555309.jpg');
INSERT INTO `bj_imgs` VALUES ('965', '4cda8201711061859578466.jpg');
INSERT INTO `bj_imgs` VALUES ('966', 'eb17a201711061859584538.jpg');
INSERT INTO `bj_imgs` VALUES ('967', '31078201711061901303082.jpg');
INSERT INTO `bj_imgs` VALUES ('968', '7d015201711061901338911.jpg');
INSERT INTO `bj_imgs` VALUES ('969', 'a81d9201711061901395103.jpg');
INSERT INTO `bj_imgs` VALUES ('970', '85abe201711061901411306.jpg');
INSERT INTO `bj_imgs` VALUES ('971', '9ad67201711061901422664.jpg');
INSERT INTO `bj_imgs` VALUES ('972', 'c78e1201711061925008885.JPG');
INSERT INTO `bj_imgs` VALUES ('973', 'fcca7201711061925026369.JPG');
INSERT INTO `bj_imgs` VALUES ('974', '1582b201711061925078899.JPG');
INSERT INTO `bj_imgs` VALUES ('975', '32cb5201711061925093348.JPG');
INSERT INTO `bj_imgs` VALUES ('976', '923d4201711061925125708.JPG');
INSERT INTO `bj_imgs` VALUES ('977', 'aaa25201711071036273326.jpg');
INSERT INTO `bj_imgs` VALUES ('978', '26149201711071036322773.jpg');
INSERT INTO `bj_imgs` VALUES ('979', '81590201711071036355307.jpg');
INSERT INTO `bj_imgs` VALUES ('980', '3b568201711071036407486.jpg');
INSERT INTO `bj_imgs` VALUES ('981', '646cf20171107103644449.jpg');
INSERT INTO `bj_imgs` VALUES ('982', '274a7201711071430203341.jpg');
INSERT INTO `bj_imgs` VALUES ('983', '4769b201711071430251338.jpg');
INSERT INTO `bj_imgs` VALUES ('984', '3c71e201711071430326535.jpg');
INSERT INTO `bj_imgs` VALUES ('985', 'f362a201711071430372504.jpg');
INSERT INTO `bj_imgs` VALUES ('986', 'b3c70201711071430456285.jpg');
INSERT INTO `bj_imgs` VALUES ('987', '2a190201711071434031795.jpg');
INSERT INTO `bj_imgs` VALUES ('988', '97406201711071434103905.jpg');
INSERT INTO `bj_imgs` VALUES ('989', '1bccf201711241110367414.JPG');
INSERT INTO `bj_imgs` VALUES ('990', '35212201711241110386513.png');
INSERT INTO `bj_imgs` VALUES ('991', '06ccd201711241110428240.png');
INSERT INTO `bj_imgs` VALUES ('992', '3b495201711241110451994.png');
INSERT INTO `bj_imgs` VALUES ('993', '2e4e6201711241115098729.png');
INSERT INTO `bj_imgs` VALUES ('994', '7cb2e20171124111510261.JPG');
INSERT INTO `bj_imgs` VALUES ('995', 'c7b0d201711241115136179.png');
INSERT INTO `bj_imgs` VALUES ('996', 'dfc17201711241115159201.png');
INSERT INTO `bj_imgs` VALUES ('997', '9028a2017112411435120.JPG');
INSERT INTO `bj_imgs` VALUES ('998', 'd99f7201711241143532415.png');
INSERT INTO `bj_imgs` VALUES ('999', '2e9e3201711241309315150.png');
INSERT INTO `bj_imgs` VALUES ('1000', 'ec35e201711241309331707.png');
INSERT INTO `bj_imgs` VALUES ('1001', 'ec214201711241314559466.JPG');
INSERT INTO `bj_imgs` VALUES ('1002', '85442201711241314581602.png');
INSERT INTO `bj_imgs` VALUES ('1003', '56ac6201711241319462338.png');
INSERT INTO `bj_imgs` VALUES ('1004', 'b5ae1201711241319481136.png');
INSERT INTO `bj_imgs` VALUES ('1005', '60bad201711241320262789.JPG');
INSERT INTO `bj_imgs` VALUES ('1006', 'f51dd201711241320276843.JPG');
INSERT INTO `bj_imgs` VALUES ('1007', '68ec4201711241336116331.png');
INSERT INTO `bj_imgs` VALUES ('1008', 'dab9d20171124134002189.JPG');
INSERT INTO `bj_imgs` VALUES ('1009', 'a1b99201711241340054319.png');
INSERT INTO `bj_imgs` VALUES ('1010', '9d5d4201711241342259673.JPG');
INSERT INTO `bj_imgs` VALUES ('1011', '897f7201711241342275273.png');
INSERT INTO `bj_imgs` VALUES ('1012', 'd221b201711250928469006.png');
INSERT INTO `bj_imgs` VALUES ('1013', 'dde55201711250928495163.png');
INSERT INTO `bj_imgs` VALUES ('1014', 'f529d201711250928549266.png');
INSERT INTO `bj_imgs` VALUES ('1015', '4ffe0201711250928564453.png');
INSERT INTO `bj_imgs` VALUES ('1016', 'b1edf201711271100203313.png');
INSERT INTO `bj_imgs` VALUES ('1017', '029be201711271100225792.png');
INSERT INTO `bj_imgs` VALUES ('1018', 'bd04f201711271100282669.png');
INSERT INTO `bj_imgs` VALUES ('1019', '8a029201711271100315046.png');
INSERT INTO `bj_imgs` VALUES ('1020', '4349c201711271700241870.jpg');
INSERT INTO `bj_imgs` VALUES ('1021', 'e60bc2017112717002615.jpg');
INSERT INTO `bj_imgs` VALUES ('1022', '6b17f201711281158332634.jpg');
INSERT INTO `bj_imgs` VALUES ('1023', '09ac0201711281158478239.jpg');
INSERT INTO `bj_imgs` VALUES ('1024', '60260201711281158556658.jpg');
INSERT INTO `bj_imgs` VALUES ('1025', '169f3201711281159059761.jpg');
INSERT INTO `bj_imgs` VALUES ('1026', 'd871f201711281159104136.jpg');
INSERT INTO `bj_imgs` VALUES ('1027', '6573e201711281254052792.png');
INSERT INTO `bj_imgs` VALUES ('1028', '58b6f201711281254067523.png');
INSERT INTO `bj_imgs` VALUES ('1029', 'f6b00201711281254109930.png');
INSERT INTO `bj_imgs` VALUES ('1030', '1b6fb201711281254121761.png');
INSERT INTO `bj_imgs` VALUES ('1031', '16ed5201711281254159790.png');
INSERT INTO `bj_imgs` VALUES ('1032', '24970201711281254178304.png');
INSERT INTO `bj_imgs` VALUES ('1033', '72adc20171128125422586.png');
INSERT INTO `bj_imgs` VALUES ('1034', '6f60220171128125424361.png');
INSERT INTO `bj_imgs` VALUES ('1035', '52397201711281310202915.png');
INSERT INTO `bj_imgs` VALUES ('1036', '9d861201711281310223083.png');
INSERT INTO `bj_imgs` VALUES ('1037', '53e4b201711281417182665.png');
INSERT INTO `bj_imgs` VALUES ('1038', '14f3f201711281417208961.png');
INSERT INTO `bj_imgs` VALUES ('1039', '9a789201711281417264020.png');
INSERT INTO `bj_imgs` VALUES ('1040', '1378f201711281417283890.png');
INSERT INTO `bj_imgs` VALUES ('1041', '1774d201711281430556734.png');
INSERT INTO `bj_imgs` VALUES ('1042', 'ddfe2201711281430571842.png');
INSERT INTO `bj_imgs` VALUES ('1043', '02811201711281501505458.png');
INSERT INTO `bj_imgs` VALUES ('1044', '8d318201711281501529656.png');
INSERT INTO `bj_imgs` VALUES ('1045', '75059201711281510204195.png');
INSERT INTO `bj_imgs` VALUES ('1046', 'e0860201711281510222609.png');
INSERT INTO `bj_imgs` VALUES ('1047', '7fc37201711291040463680.jpeg');
INSERT INTO `bj_imgs` VALUES ('1048', 'f1444201711291040524264.jpeg');
INSERT INTO `bj_imgs` VALUES ('1049', 'fba18201711291041044858.jpeg');
INSERT INTO `bj_imgs` VALUES ('1050', 'e7fa0201711291041175282.jpeg');
INSERT INTO `bj_imgs` VALUES ('1051', '8cfe2201711291103159088.jpeg');
INSERT INTO `bj_imgs` VALUES ('1052', 'b14ab201711291103309052.jpeg');
INSERT INTO `bj_imgs` VALUES ('1053', '7d464201711291134357919.jpg');
INSERT INTO `bj_imgs` VALUES ('1054', '9ed3a201711291135081351.jpg');
INSERT INTO `bj_imgs` VALUES ('1055', '59d8c201711291146126566.jpg');
INSERT INTO `bj_imgs` VALUES ('1056', '47968201711291146181196.jpg');
INSERT INTO `bj_imgs` VALUES ('1057', 'fd6dd201711291146255300.jpg');
INSERT INTO `bj_imgs` VALUES ('1058', '5d1eb201711291701022442.jpeg');
INSERT INTO `bj_imgs` VALUES ('1059', '8c75e201711291701076955.jpeg');
INSERT INTO `bj_imgs` VALUES ('1060', '7cdc1201711291701145916.jpeg');
INSERT INTO `bj_imgs` VALUES ('1061', '79e64201711291701191845.jpeg');
INSERT INTO `bj_imgs` VALUES ('1062', 'ef235201711301328313880.jpeg');
INSERT INTO `bj_imgs` VALUES ('1063', 'e83bd201711301328524017.png');
INSERT INTO `bj_imgs` VALUES ('1064', '214ed201711301329008172.jpeg');
INSERT INTO `bj_imgs` VALUES ('1065', '5e685201711301415123554.jpg');
INSERT INTO `bj_imgs` VALUES ('1066', '1c926201711301415135810.jpg');
INSERT INTO `bj_imgs` VALUES ('1067', 'c750f201711301542375802.png');
INSERT INTO `bj_imgs` VALUES ('1068', 'f788b201711301542406111.jpeg');
INSERT INTO `bj_imgs` VALUES ('1069', 'c1356201711301542453502.jpeg');
INSERT INTO `bj_imgs` VALUES ('1070', 'd75db201711301620446867.jpg');
INSERT INTO `bj_imgs` VALUES ('1071', '51d1520171130162045353.jpg');
INSERT INTO `bj_imgs` VALUES ('1072', 'c5a1a201711301620497500.jpg');
INSERT INTO `bj_imgs` VALUES ('1073', '64dbe201711301620519564.jpg');
INSERT INTO `bj_imgs` VALUES ('1074', '50dbf201711301620538313.jpg');
INSERT INTO `bj_imgs` VALUES ('1075', 'ca217201711301649159627.jpg');
INSERT INTO `bj_imgs` VALUES ('1076', '1255d201711301649176653.jpg');
INSERT INTO `bj_imgs` VALUES ('1077', '0c36c201711301649191390.jpg');
INSERT INTO `bj_imgs` VALUES ('1078', 'b7b01201711301649227232.jpg');
INSERT INTO `bj_imgs` VALUES ('1079', '6325d201711301649246591.jpg');
INSERT INTO `bj_imgs` VALUES ('1080', '9dd362017120110194954.JPG');
INSERT INTO `bj_imgs` VALUES ('1081', '49fb9201712011019551929.JPG');
INSERT INTO `bj_imgs` VALUES ('1082', 'ff5c3201712011452051416.jpg');
INSERT INTO `bj_imgs` VALUES ('1083', 'ada8620171201145211689.jpg');
INSERT INTO `bj_imgs` VALUES ('1084', 'c83dc201712011601031932.JPG');
INSERT INTO `bj_imgs` VALUES ('1085', 'acace201712011601082010.JPG');
INSERT INTO `bj_imgs` VALUES ('1086', '0a2e6201712041338563798.jpeg');
INSERT INTO `bj_imgs` VALUES ('1087', '029a720171204133900441.jpeg');
INSERT INTO `bj_imgs` VALUES ('1088', 'ee90c201712041708229250.jpg');
INSERT INTO `bj_imgs` VALUES ('1089', '2a969201712041708274986.jpg');
INSERT INTO `bj_imgs` VALUES ('1090', '2a7d220171204170842833.jpg');
INSERT INTO `bj_imgs` VALUES ('1091', '4df90201712041708479306.jpg');
INSERT INTO `bj_imgs` VALUES ('1092', '1fa40201712050932211828.doc');
INSERT INTO `bj_imgs` VALUES ('1093', '2caa3201712050932284616.sql');
INSERT INTO `bj_imgs` VALUES ('1094', 'e1b78201712050932519114.xlsx');
INSERT INTO `bj_imgs` VALUES ('1095', '835b420171205093258906.xlsx');
INSERT INTO `bj_imgs` VALUES ('1096', '03f51201712050933417442.jpg');
INSERT INTO `bj_imgs` VALUES ('1097', 'bce0a201712050940309955.xlsx');
INSERT INTO `bj_imgs` VALUES ('1098', '7c6e4201712050943107170.xlsx');
INSERT INTO `bj_imgs` VALUES ('1099', '807cf201712050949233256.xlsx');
INSERT INTO `bj_imgs` VALUES ('1100', 'd123c201712050952491634.jpg');
INSERT INTO `bj_imgs` VALUES ('1101', 'c8fe3201712050952597083.jpg');
INSERT INTO `bj_imgs` VALUES ('1102', '8ae8e20171205095319824.jpg');
INSERT INTO `bj_imgs` VALUES ('1103', '0f052201712050953538901.jpg');
INSERT INTO `bj_imgs` VALUES ('1104', 'f0a80201712050954053512.jpg');
INSERT INTO `bj_imgs` VALUES ('1105', 'de2b9201712050956228931.jpg');
INSERT INTO `bj_imgs` VALUES ('1106', '56a4a20171205095717834.jpg');
INSERT INTO `bj_imgs` VALUES ('1107', 'e659c201712050959395461.jpg');
INSERT INTO `bj_imgs` VALUES ('1108', '86007201712051000077283.jpg');
INSERT INTO `bj_imgs` VALUES ('1109', '4b45c201712051000148047.jpg');
INSERT INTO `bj_imgs` VALUES ('1110', '9a6ae201712051000565536.jpg');
INSERT INTO `bj_imgs` VALUES ('1111', '1f4b2201712051001123909.xlsx');
INSERT INTO `bj_imgs` VALUES ('1112', 'f4051201712051002065872.png');
INSERT INTO `bj_imgs` VALUES ('1113', 'a71b7201712051002143813.png');
INSERT INTO `bj_imgs` VALUES ('1114', '7e2ea201712051002399202.xlsx');
INSERT INTO `bj_imgs` VALUES ('1115', 'bb872201712051002484752.doc');
INSERT INTO `bj_imgs` VALUES ('1116', '4ad2c2017120510025889.jpg');
INSERT INTO `bj_imgs` VALUES ('1117', '0f59d201712051005074247.jpg');
INSERT INTO `bj_imgs` VALUES ('1118', 'bff2b201712051005592645.jpg');
INSERT INTO `bj_imgs` VALUES ('1119', '75f23201712051007296190.jpg');
INSERT INTO `bj_imgs` VALUES ('1120', '16af8201712051007426537.xlsx');
INSERT INTO `bj_imgs` VALUES ('1121', 'b169d201712051007509638.doc');
INSERT INTO `bj_imgs` VALUES ('1122', '62f42201712051010555252.jpg');
INSERT INTO `bj_imgs` VALUES ('1123', '66855201712051011045008.xlsx');
INSERT INTO `bj_imgs` VALUES ('1124', 'f132a20171205101115224.xlsx');
INSERT INTO `bj_imgs` VALUES ('1125', '31bc0201712051455198656.zip');
INSERT INTO `bj_imgs` VALUES ('1126', '057d6201712051456208168.zip');
INSERT INTO `bj_imgs` VALUES ('1127', 'a095e201712052154517687.jpg');
INSERT INTO `bj_imgs` VALUES ('1128', 'ad228201712060854269552.jpg');
INSERT INTO `bj_imgs` VALUES ('1129', 'e1327201712060854328830.jpg');
INSERT INTO `bj_imgs` VALUES ('1130', '47484201712060854483171.jpg');
INSERT INTO `bj_imgs` VALUES ('1131', 'fc53b201712060854548984.jpg');
INSERT INTO `bj_imgs` VALUES ('1132', '2b77a201712060928382608.png');
INSERT INTO `bj_imgs` VALUES ('1133', '5eb13201712060939552525.png');
INSERT INTO `bj_imgs` VALUES ('1134', '849d7201712060941524324.png');
INSERT INTO `bj_imgs` VALUES ('1135', '2bedd201712060948546931.jpg');
INSERT INTO `bj_imgs` VALUES ('1136', '5bfe5201712061008588233.png');
INSERT INTO `bj_imgs` VALUES ('1137', '44795201712061045071143.png');
INSERT INTO `bj_imgs` VALUES ('1138', 'a5957201712061045088761.png');
INSERT INTO `bj_imgs` VALUES ('1139', '58373201712061045159282.png');
INSERT INTO `bj_imgs` VALUES ('1140', '2db27201712061045171259.png');
INSERT INTO `bj_imgs` VALUES ('1141', '7f03020171206104519754.png');
INSERT INTO `bj_imgs` VALUES ('1142', '6c923201712061050138555.png');
INSERT INTO `bj_imgs` VALUES ('1143', 'c9b94201712061050154848.png');
INSERT INTO `bj_imgs` VALUES ('1144', '86dee201712061107112041.png');
INSERT INTO `bj_imgs` VALUES ('1145', '9ae37201712061107121013.png');
INSERT INTO `bj_imgs` VALUES ('1146', 'c22c0201712061107143364.png');
INSERT INTO `bj_imgs` VALUES ('1147', '4e8ad201712061107165461.png');
INSERT INTO `bj_imgs` VALUES ('1148', '86f66201712061107183171.png');
INSERT INTO `bj_imgs` VALUES ('1149', '5fc8c201712061111302486.PNG');
INSERT INTO `bj_imgs` VALUES ('1150', '29ec6201712061114556184.jpeg');
INSERT INTO `bj_imgs` VALUES ('1151', '9e0c2201712061115055604.jpeg');
INSERT INTO `bj_imgs` VALUES ('1152', 'ae5c7201712061344529199.JPG');
INSERT INTO `bj_imgs` VALUES ('1153', '34fa120171206173817319.png');
INSERT INTO `bj_imgs` VALUES ('1154', '5efae201712061740017024.png');
INSERT INTO `bj_imgs` VALUES ('1155', '62ba6201712061744106766.png');
INSERT INTO `bj_imgs` VALUES ('1156', '36ddf201712070923313042.png');
INSERT INTO `bj_imgs` VALUES ('1157', '278b1201712070923386720.png');
INSERT INTO `bj_imgs` VALUES ('1158', '454ff201712070935417364.jpeg');
INSERT INTO `bj_imgs` VALUES ('1159', 'c459d201712070935469425.jpeg');
INSERT INTO `bj_imgs` VALUES ('1160', '17b54201712070949409630.jpeg');
INSERT INTO `bj_imgs` VALUES ('1161', 'ee161201712070949441225.jpeg');
INSERT INTO `bj_imgs` VALUES ('1162', '7983a201712071030032962.jpg');
INSERT INTO `bj_imgs` VALUES ('1163', 'ceb2c201712071050473366.jpeg');
INSERT INTO `bj_imgs` VALUES ('1164', 'd2f81201712071050513661.jpeg');
INSERT INTO `bj_imgs` VALUES ('1165', '1ec46201712071050566433.jpeg');
INSERT INTO `bj_imgs` VALUES ('1166', 'd6a1c201712071051054499.jpeg');
INSERT INTO `bj_imgs` VALUES ('1167', '34714201712071051108025.jpeg');
INSERT INTO `bj_imgs` VALUES ('1168', 'eda03201712071336507097.');
INSERT INTO `bj_imgs` VALUES ('1169', '316ff20171207135243295.png');
INSERT INTO `bj_imgs` VALUES ('1170', '38f65201712071352498645.png');
INSERT INTO `bj_imgs` VALUES ('1171', 'ebc43201712071353046792.png');
INSERT INTO `bj_imgs` VALUES ('1172', '7c4ad201712071353065578.png');
INSERT INTO `bj_imgs` VALUES ('1173', '4ba37201712071355274546.png');
INSERT INTO `bj_imgs` VALUES ('1174', 'd14ab20171207140408934.jpg');
INSERT INTO `bj_imgs` VALUES ('1175', 'e7138201712071444235163.PNG');
INSERT INTO `bj_imgs` VALUES ('1176', '553d3201712071444306800.PNG');
INSERT INTO `bj_imgs` VALUES ('1177', '9b81a201712071514449598.png');
INSERT INTO `bj_imgs` VALUES ('1178', '2c902201712071526461661.JPG');
INSERT INTO `bj_imgs` VALUES ('1179', 'daf80201712071526514767.PNG');
INSERT INTO `bj_imgs` VALUES ('1180', 'e73c720171207154223530.jpg');
INSERT INTO `bj_imgs` VALUES ('1181', 'eb44a201712071542302862.jpg');
INSERT INTO `bj_imgs` VALUES ('1182', 'f7582201712071542446153.jpg');
INSERT INTO `bj_imgs` VALUES ('1183', '1f5b6201712071542485537.jpg');
INSERT INTO `bj_imgs` VALUES ('1184', '3e87b201712071542579991.jpg');
INSERT INTO `bj_imgs` VALUES ('1185', 'd2c75201712071543088604.jpg');
INSERT INTO `bj_imgs` VALUES ('1186', '920a7201712071543325129.jpg');
INSERT INTO `bj_imgs` VALUES ('1187', '3cc53201712071544257410.jpg');
INSERT INTO `bj_imgs` VALUES ('1188', 'ad47820171207154430536.jpg');
INSERT INTO `bj_imgs` VALUES ('1189', 'ce484201712071552027211.png');
INSERT INTO `bj_imgs` VALUES ('1190', '36deb201712071605241211.html');
INSERT INTO `bj_imgs` VALUES ('1191', '16f90201712071721356151.png');
INSERT INTO `bj_imgs` VALUES ('1192', '5e378201712080855398519.jpeg');
INSERT INTO `bj_imgs` VALUES ('1193', 'd21cc20171208085544750.jpeg');
INSERT INTO `bj_imgs` VALUES ('1194', '545ad20171208085548792.jpeg');
INSERT INTO `bj_imgs` VALUES ('1195', '6b8cd201712080855568142.jpeg');
INSERT INTO `bj_imgs` VALUES ('1196', 'bb52a201712080856023439.jpeg');
INSERT INTO `bj_imgs` VALUES ('1197', '8ee56201712080908505738.png');
INSERT INTO `bj_imgs` VALUES ('1198', '6ca3d201712080944188397.svg');
INSERT INTO `bj_imgs` VALUES ('1199', '3e5cc201712080944227918.svg');
INSERT INTO `bj_imgs` VALUES ('1200', '795c1201712081029343046.jpg');
INSERT INTO `bj_imgs` VALUES ('1201', '7a08b201712081110191581.png');
INSERT INTO `bj_imgs` VALUES ('1202', '09ba7201712081349428314.exe');
INSERT INTO `bj_imgs` VALUES ('1203', 'dafd9201712081349476860.dll');
INSERT INTO `bj_imgs` VALUES ('1204', '6122a201712081357224768.docx');
INSERT INTO `bj_imgs` VALUES ('1205', '85f41201712081605507240.jpg');
INSERT INTO `bj_imgs` VALUES ('1206', 'cea0e201712081605595561.jpg');
INSERT INTO `bj_imgs` VALUES ('1207', '3c19f201712081609591953.jpg');
INSERT INTO `bj_imgs` VALUES ('1208', '261fd201712081614118085.jpg');
INSERT INTO `bj_imgs` VALUES ('1209', 'c0ee1201712081615566215.PNG');
INSERT INTO `bj_imgs` VALUES ('1210', 'b5c20201712081616032636.PNG');
INSERT INTO `bj_imgs` VALUES ('1211', '5217f201712081659252806.jpeg');
INSERT INTO `bj_imgs` VALUES ('1212', '24167201712081701352642.jpg');
INSERT INTO `bj_imgs` VALUES ('1213', 'd09eb201712081701404426.jpg');
INSERT INTO `bj_imgs` VALUES ('1214', '7eb43201712081701479979.jpg');
INSERT INTO `bj_imgs` VALUES ('1215', 'c70bc20171208170152928.jpg');
INSERT INTO `bj_imgs` VALUES ('1216', '0cac7201712081701591242.jpg');
INSERT INTO `bj_imgs` VALUES ('1217', '8bdda201712081702048486.jpg');
INSERT INTO `bj_imgs` VALUES ('1218', 'e3739201712081702131958.jpg');
INSERT INTO `bj_imgs` VALUES ('1219', '2221c201712081702171040.jpg');
INSERT INTO `bj_imgs` VALUES ('1220', '12592201712081728114785.jpeg');
INSERT INTO `bj_imgs` VALUES ('1221', '38fb1201712081728543556.jpg');
INSERT INTO `bj_imgs` VALUES ('1222', '5da39201712081740243043.jpg');
INSERT INTO `bj_imgs` VALUES ('1223', '5b101201712081740285713.jpg');
INSERT INTO `bj_imgs` VALUES ('1224', '1b3d9201712090925305927.docx');
INSERT INTO `bj_imgs` VALUES ('1225', 'b44c1201712091020393701.PNG');
INSERT INTO `bj_imgs` VALUES ('1226', '568f2201712091020499914.PNG');
INSERT INTO `bj_imgs` VALUES ('1227', 'c805420171209102102468.PNG');
INSERT INTO `bj_imgs` VALUES ('1228', '2d7b8201712091021077449.PNG');
INSERT INTO `bj_imgs` VALUES ('1229', '329f120171209102628295.JPG');
INSERT INTO `bj_imgs` VALUES ('1230', '31d56201712091026512358.JPG');
INSERT INTO `bj_imgs` VALUES ('1231', '4ab28201712091026573050.JPG');
INSERT INTO `bj_imgs` VALUES ('1232', 'a690e201712091035326316.JPG');
INSERT INTO `bj_imgs` VALUES ('1233', '0a192201712091035487337.JPG');
INSERT INTO `bj_imgs` VALUES ('1234', '23cc8201712091043032515.PNG');
INSERT INTO `bj_imgs` VALUES ('1235', '38c0c201712091043118711.PNG');
INSERT INTO `bj_imgs` VALUES ('1236', '7e984201712091043222503.PNG');
INSERT INTO `bj_imgs` VALUES ('1237', 'a02bc201712091043325742.PNG');
INSERT INTO `bj_imgs` VALUES ('1238', '74877201712091048151213.png');
INSERT INTO `bj_imgs` VALUES ('1239', 'ac806201712091048178195.png');
INSERT INTO `bj_imgs` VALUES ('1240', '7ee86201712091048212839.png');
INSERT INTO `bj_imgs` VALUES ('1241', 'b4777201712091048226285.png');
INSERT INTO `bj_imgs` VALUES ('1242', '49b6e201712091050286443.png');
INSERT INTO `bj_imgs` VALUES ('1243', '3139c201712091050342885.png');
INSERT INTO `bj_imgs` VALUES ('1244', '66da320171209105037260.png');
INSERT INTO `bj_imgs` VALUES ('1245', 'b57cb201712091050397994.png');
INSERT INTO `bj_imgs` VALUES ('1246', 'dc7be20171209105126767.png');
INSERT INTO `bj_imgs` VALUES ('1247', 'd8bb6201712091051288468.png');
INSERT INTO `bj_imgs` VALUES ('1248', 'c3fc3201712091051318853.png');
INSERT INTO `bj_imgs` VALUES ('1249', '2465b201712091051321070.png');
INSERT INTO `bj_imgs` VALUES ('1250', 'a41bc201712091052164908.png');
INSERT INTO `bj_imgs` VALUES ('1251', '667c1201712091052194276.png');
INSERT INTO `bj_imgs` VALUES ('1252', '82ba9201712091056468856.docx');
INSERT INTO `bj_imgs` VALUES ('1253', 'f11a0201712091120102436.docx');
INSERT INTO `bj_imgs` VALUES ('1254', 'feee9201712091421418263.png');
INSERT INTO `bj_imgs` VALUES ('1255', '0bf6620171209142326503.png');
INSERT INTO `bj_imgs` VALUES ('1256', 'd4c2c201712091423532513.png');
INSERT INTO `bj_imgs` VALUES ('1257', '1c182201712091424526436.png');
INSERT INTO `bj_imgs` VALUES ('1258', '4de5820171209142457287.png');
INSERT INTO `bj_imgs` VALUES ('1259', 'ddd13201712091424597877.svg');
INSERT INTO `bj_imgs` VALUES ('1260', 'b8055201712091425019742.png');
INSERT INTO `bj_imgs` VALUES ('1261', 'b0e8c201712091444506282.PNG');
INSERT INTO `bj_imgs` VALUES ('1262', '3af56201712091444573520.PNG');
INSERT INTO `bj_imgs` VALUES ('1263', '82f5e201712091445109256.JPG');
INSERT INTO `bj_imgs` VALUES ('1264', 'a232f201712091445155409.PNG');
INSERT INTO `bj_imgs` VALUES ('1265', '525f6201712091447369895.PNG');
INSERT INTO `bj_imgs` VALUES ('1266', 'da4ae20171209144744127.JPG');
INSERT INTO `bj_imgs` VALUES ('1267', 'cad95201712091447506904.JPG');
INSERT INTO `bj_imgs` VALUES ('1268', 'ed835201712091544144523.cssx');
INSERT INTO `bj_imgs` VALUES ('1269', 'd3233201712091603017899.jpg');
INSERT INTO `bj_imgs` VALUES ('1270', 'a71b8201712110845421511.txt');
INSERT INTO `bj_imgs` VALUES ('1271', '9954f201712110907349318.xlsx');
INSERT INTO `bj_imgs` VALUES ('1272', 'cfdfe201712110908363359.html');
INSERT INTO `bj_imgs` VALUES ('1273', 'e14dd201712110908401524.jpg');
INSERT INTO `bj_imgs` VALUES ('1274', '8c387201712110910447549.exe');
INSERT INTO `bj_imgs` VALUES ('1275', 'eb61a201712110910589033.png');
INSERT INTO `bj_imgs` VALUES ('1276', 'b340820171211091335639.png');
INSERT INTO `bj_imgs` VALUES ('1277', 'e21b9201712110913397461.txt');
INSERT INTO `bj_imgs` VALUES ('1278', '3eaf0201712110919425158.png');
INSERT INTO `bj_imgs` VALUES ('1279', 'bf665201712110919465481.zip');
INSERT INTO `bj_imgs` VALUES ('1280', '9e51d201712110919565589.xls');
INSERT INTO `bj_imgs` VALUES ('1281', 'df069201712110920049576.txt');
INSERT INTO `bj_imgs` VALUES ('1282', '65584201712110924185795.xls');

-- ----------------------------
-- Table structure for bj_install_tupian
-- ----------------------------
DROP TABLE IF EXISTS `bj_install_tupian`;
CREATE TABLE `bj_install_tupian` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `woker_id` int(10) DEFAULT NULL COMMENT '师傅id',
  `order_number` bigint(20) DEFAULT NULL COMMENT '订单号',
  `img1` varchar(255) DEFAULT NULL COMMENT '维修前',
  `img2` varchar(255) DEFAULT NULL COMMENT '维修后',
  `img3` varchar(255) DEFAULT NULL COMMENT '门头照片',
  `img4` varchar(255) DEFAULT NULL COMMENT '专柜全景',
  `img5` varchar(255) DEFAULT NULL COMMENT '安装进度表',
  `img6` varchar(255) DEFAULT NULL COMMENT '维修签收单',
  `img7` varchar(255) DEFAULT NULL COMMENT '客户签字',
  `text` varchar(255) DEFAULT NULL COMMENT '描述信息',
  `is_ok` varchar(255) DEFAULT NULL COMMENT '提交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_install_tupian
-- ----------------------------
INSERT INTO `bj_install_tupian` VALUES ('210', '39', '2017110619144610716', 'e1f54201711061923167035.png', '154d0201711061923192399.png', 'fe943201711061923113609.png', 'f948d201711061923125686.png', '9f83f201711061923147746.png', 'a453d20171106192318742.jpg', 'uploads/signature/20171106/biaojiang38qianming_2081c8eca181a2503a6d07ffd297dd8e.png', 'efesb ', '1');
INSERT INTO `bj_install_tupian` VALUES ('211', '39', '2017110708371367163', 'f8ea5201711070926344378.png', 'ee13f201711070926383945.png', '80892201711070926286346.png', 'af6c0201711070926306093.png', 'ea8f2201711070926322623.png', '089c2201711070926364476.png', 'uploads/signature/20171107/biaojiang38qianming_d9a2973867e8c747e5f1acecf0f22abf.png', '', '1');
INSERT INTO `bj_install_tupian` VALUES ('212', '39', '2017110710422184585', '46d53201711071116161231.png', '79694201711071116211933.png', 'f8bb72017110711160940.png', 'c6eaa201711071116113949.png', '984f8201711071116148460.png', 'f09b0201711071116185275.png', 'uploads/signature/20171107/biaojiang38qianming_975421458dfe29c5ab115873ec55824c.png', '123456', '1');
INSERT INTO `bj_install_tupian` VALUES ('215', '35', '2017110711194625819', '88bce201711071125229884.jpg', '75816201711071125242448.jpg', '88708201711071125121565.jpg', '0fb63201711071125142392.jpg', '376d5201711071125176084.jpg', '11166201711071125206533.jpg', 'uploads/signature/20171107/biaojiang36qianming_358f7cc3b48ea99b447f182a2990303f.png', '11', '1');
INSERT INTO `bj_install_tupian` VALUES ('216', '35', '2017110711194625819', 'ec386201711071125297007.jpg', '454fd201711071125317796.jpg', '88708201711071125121565.jpg', '0fb63201711071125142392.jpg', '376d5201711071125176084.jpg', '11166201711071125206533.jpg', 'uploads/signature/20171107/biaojiang36qianming_358f7cc3b48ea99b447f182a2990303f.png', '11', '1');

-- ----------------------------
-- Table structure for bj_invoice
-- ----------------------------
DROP TABLE IF EXISTS `bj_invoice`;
CREATE TABLE `bj_invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(10) NOT NULL COMMENT '客户ID',
  `order_number` varchar(25) NOT NULL COMMENT '订单号',
  `end_time` int(10) NOT NULL COMMENT '项目完成时间',
  `price` float NOT NULL COMMENT '发票钱',
  `service_name` varchar(30) NOT NULL COMMENT '服务项目名称',
  `invoice_xingzhi` varchar(20) NOT NULL COMMENT '发票性质',
  `invoice_type` varchar(20) NOT NULL COMMENT '发票类型',
  `times` int(10) NOT NULL COMMENT '申请时间',
  `addressee` varchar(20) NOT NULL COMMENT '收件人',
  `addressee_phone` bigint(11) NOT NULL COMMENT '收件人电话',
  `addressee_address` varchar(50) NOT NULL COMMENT '收件人地址',
  `addressee_xiangxi` varchar(30) NOT NULL COMMENT '收件人详细地址',
  `shibiehao` varchar(30) NOT NULL COMMENT '纳税人识别号',
  `code` int(10) NOT NULL COMMENT '邮编',
  `opening_account` bigint(25) NOT NULL COMMENT '开户账户',
  `opening_bank` varchar(50) NOT NULL COMMENT '开户银行',
  `company_address` varchar(30) NOT NULL COMMENT '公司注册地址',
  `company_xiangxi` varchar(30) NOT NULL COMMENT '公司注册详细地址',
  `invoice_title` varchar(50) NOT NULL COMMENT '发票抬头',
  `company_phone` bigint(11) NOT NULL COMMENT '公司电话',
  `company_img` varchar(50) NOT NULL COMMENT '公司营业执照',
  `taxpayer_img` varchar(50) NOT NULL DEFAULT '' COMMENT '一般纳税人资格证明',
  `status` tinyint(1) NOT NULL COMMENT '是否开票 0 审核中 1已开 2 拒绝',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='发票';

-- ----------------------------
-- Records of bj_invoice
-- ----------------------------
INSERT INTO `bj_invoice` VALUES ('13', '43', '2017110711194625819', '1511427600', '45', '维修-珠宝柜', '', '增值税专用发票', '1512787560', '刘邦建', '15550161208', '内蒙古自治区-赤峰市-阿鲁科尔沁旗', '兆丰路1189号', '125896542', '274706', '622848586521586541', '建设银行', '黑龙江省-鸡西市-鸡冠区', '龙华西路', '标匠', '5306836180', '390b120171206084530241.png', '390b120171206084530241.png', '1');
INSERT INTO `bj_invoice` VALUES ('14', '43', '201711271057017', '1511427600', '23', '维修-商超食品柜', '', '增值税专用发票', '1512787560', '刘邦建', '15550161208', '内蒙古自治区-赤峰市-阿鲁科尔沁旗', '兆丰路1189号', '125896542', '274706', '622848586521586541', '建设银行', '黑龙江省-鸡西市-鸡冠区', '龙华西路', '标匠', '5306836180', '390b120171206084530241.png', '390b120171206084530241.png', '1');
INSERT INTO `bj_invoice` VALUES ('15', '47', '2017120610103665747', '1512528935', '0', '维修-珠宝柜', '', '增值税专用发票', '1512532680', 'dfgfd ', '0', '北京-北京市-东城区', 'fgs ', 'fg ', '0', '0', 'fg ', '北京-北京市-东城区', 'fg ', 'fg ', '15550161208', '54475201712061158467086.png', '54475201712061158467086.png', '1');
INSERT INTO `bj_invoice` VALUES ('16', '47', '2017120611115555068', '1512530188', '0', '维修-服装柜', '', '增值税专用发票', '1512532680', 'dfgfd ', '0', '北京-北京市-东城区', 'fgs ', 'fg ', '0', '0', 'fg ', '北京-北京市-东城区', 'fg ', 'fg ', '15550161208', '54475201712061158467086.png', '54475201712061158467086.png', '1');
INSERT INTO `bj_invoice` VALUES ('17', '68', '0', '0', '0', '', '', '增值税专用发票', '1512953400', '1', '2', '北京-北京市-东城区', '21', '5', '6', '6', '1', '北京-北京市-东城区', '1', '1', '1', 'c4ee2201712110850065097.jpg', 'acead201712110850099883.png', '0');
INSERT INTO `bj_invoice` VALUES ('18', '68', '2017120709013668489', '0', '0', '维修-珠宝柜', '', '增值税专用发票', '1512953400', '1', '2', '北京-北京市-东城区', '21', '5', '6', '6', '1', '北京-北京市-东城区', '1', '1', '1', 'c4ee2201712110850065097.jpg', 'acead201712110850099883.png', '0');
INSERT INTO `bj_invoice` VALUES ('19', '68', '2017120709315646372', '0', '0', '维修-钟表柜', '', '增值税专用发票', '1512953400', '1', '2', '北京-北京市-东城区', '21', '5', '6', '6', '1', '北京-北京市-东城区', '1', '1', '1', 'c4ee2201712110850065097.jpg', 'acead201712110850099883.png', '0');
INSERT INTO `bj_invoice` VALUES ('20', '68', '2017120709434985609', '1512611705', '0', '维修-服装柜', '', '增值税专用发票', '1512953400', '1', '2', '北京-北京市-东城区', '21', '5', '6', '6', '1', '北京-北京市-东城区', '1', '1', '1', 'c4ee2201712110850065097.jpg', 'acead201712110850099883.png', '0');
INSERT INTO `bj_invoice` VALUES ('21', '68', '2017120914370562104', '1512802167', '0', '维修-钟表柜', '', '增值税专用发票', '1512953400', '1', '2', '北京-北京市-东城区', '21', '5', '6', '6', '1', '北京-北京市-东城区', '1', '1', '1', 'c4ee2201712110850065097.jpg', 'acead201712110850099883.png', '0');
INSERT INTO `bj_invoice` VALUES ('22', '68', '2017120914532598604', '0', '0', '维修-服装柜', '', '增值税专用发票', '1512953400', '1', '2', '北京-北京市-东城区', '21', '5', '6', '6', '1', '北京-北京市-东城区', '1', '1', '1', 'c4ee2201712110850065097.jpg', 'acead201712110850099883.png', '0');

-- ----------------------------
-- Table structure for bj_invoice_lishi
-- ----------------------------
DROP TABLE IF EXISTS `bj_invoice_lishi`;
CREATE TABLE `bj_invoice_lishi` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `uid` int(10) NOT NULL COMMENT '客户ID',
  `order_number` bigint(20) NOT NULL COMMENT '订单号',
  `price` float NOT NULL COMMENT '发票钱',
  `service_name` varchar(30) NOT NULL COMMENT '项目名称',
  `price_total` float NOT NULL COMMENT '总价钱',
  `end_time` int(10) NOT NULL COMMENT '项目完成时间',
  `status` tinyint(1) NOT NULL COMMENT '是否提交 0 未提交 1 提交',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8 COMMENT='发票临时表';

-- ----------------------------
-- Records of bj_invoice_lishi
-- ----------------------------
INSERT INTO `bj_invoice_lishi` VALUES ('70', '43', '2017110711194625819', '45', '维修-珠宝柜', '58', '1511427600', '1');
INSERT INTO `bj_invoice_lishi` VALUES ('71', '43', '201711271057017', '23', '维修-商超食品柜', '58', '1511427600', '1');
INSERT INTO `bj_invoice_lishi` VALUES ('72', '43', '2017112309032534528', '45', '维修-珠宝柜', '45', '1511427600', '0');
INSERT INTO `bj_invoice_lishi` VALUES ('73', '47', '2017120610103665747', '0', '维修-珠宝柜', '0', '1512528935', '1');
INSERT INTO `bj_invoice_lishi` VALUES ('74', '47', '2017120611115555068', '0', '维修-服装柜', '0', '1512530188', '1');
INSERT INTO `bj_invoice_lishi` VALUES ('75', '68', '0', '0', '', '0', '0', '1');
INSERT INTO `bj_invoice_lishi` VALUES ('76', '68', '2017120709013668489', '0', '维修-珠宝柜', '0', '0', '1');
INSERT INTO `bj_invoice_lishi` VALUES ('77', '68', '2017120709315646372', '0', '维修-钟表柜', '0', '0', '1');
INSERT INTO `bj_invoice_lishi` VALUES ('78', '68', '2017120709434985609', '0', '维修-服装柜', '0', '1512611705', '1');
INSERT INTO `bj_invoice_lishi` VALUES ('79', '47', '2017120713554972376', '0', '维修-珠宝柜', '0', '0', '0');
INSERT INTO `bj_invoice_lishi` VALUES ('80', '47', '2017120715152036561', '0', '维修-珠宝柜', '0', '0', '0');
INSERT INTO `bj_invoice_lishi` VALUES ('81', '47', '2017120613452146769', '0', '维修-钟表柜', '0', '0', '0');
INSERT INTO `bj_invoice_lishi` VALUES ('82', '68', '2017120914370562104', '0', '维修-钟表柜', '0', '1512802167', '1');
INSERT INTO `bj_invoice_lishi` VALUES ('83', '68', '2017120914532598604', '0', '维修-服装柜', '0', '0', '1');

-- ----------------------------
-- Table structure for bj_invoice_personal
-- ----------------------------
DROP TABLE IF EXISTS `bj_invoice_personal`;
CREATE TABLE `bj_invoice_personal` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(10) NOT NULL COMMENT '客户ID',
  `shibiehao` varchar(20) NOT NULL COMMENT '纳税人识别号',
  `invoice_title` varchar(30) NOT NULL COMMENT '发票抬头',
  `invoice_type` varchar(20) NOT NULL COMMENT '发票类型',
  `opening_bank` varchar(50) NOT NULL COMMENT '开户行',
  `opening_account` bigint(20) NOT NULL COMMENT '开户账号',
  `company_address` varchar(30) NOT NULL COMMENT '公司注册地址',
  `company_img` varchar(32) NOT NULL,
  `company_xiangxi` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='发票个人信息';

-- ----------------------------
-- Records of bj_invoice_personal
-- ----------------------------
INSERT INTO `bj_invoice_personal` VALUES ('2', '43', '125896542', '标匠网络', '增值税专用发票', '建设银行哈哈哈', '622848586521586541', '黑龙江省-鸡西市-鸡冠区', '390b120171206084530241.png', '龙华西路115号');
INSERT INTO `bj_invoice_personal` VALUES ('3', '47', 'fg ', 'fg ', '增值税专用发票', 'fg ', '458', '北京-北京市-东城区', '54475201712061158467086.png', 'fg ');
INSERT INTO `bj_invoice_personal` VALUES ('4', '68', '5', '1', '增值税专用发票', '1', '6', '北京-北京市-东城区', 'c4ee2201712110850065097.jpg', '1');

-- ----------------------------
-- Table structure for bj_invoice_tui
-- ----------------------------
DROP TABLE IF EXISTS `bj_invoice_tui`;
CREATE TABLE `bj_invoice_tui` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_number` bigint(20) NOT NULL COMMENT '订单号',
  `reason` text NOT NULL COMMENT '退票理由',
  `express` varchar(30) NOT NULL COMMENT '快递',
  `express_number` bigint(20) NOT NULL COMMENT '快递单号',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否退票  0未退  1已退',
  `remark` varchar(11) NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='发票退票';

-- ----------------------------
-- Records of bj_invoice_tui
-- ----------------------------

-- ----------------------------
-- Table structure for bj_issue_feedback
-- ----------------------------
DROP TABLE IF EXISTS `bj_issue_feedback`;
CREATE TABLE `bj_issue_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `orderNumber` int(20) NOT NULL COMMENT '订单号',
  `uid` int(11) NOT NULL COMMENT '客户id',
  `text` text NOT NULL COMMENT '反馈内容',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bj_issue_feedback
-- ----------------------------
INSERT INTO `bj_issue_feedback` VALUES ('26', '2147483647', '38', 'wiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '1509962504');
INSERT INTO `bj_issue_feedback` VALUES ('27', '2147483647', '38', '阿肆的单曲我安慰wiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaawiaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '1509962582');
INSERT INTO `bj_issue_feedback` VALUES ('28', '2147483647', '38', '2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元2.10元', '1509966174');
INSERT INTO `bj_issue_feedback` VALUES ('29', '2147483647', '33', '11111', '1510022233');

-- ----------------------------
-- Table structure for bj_like
-- ----------------------------
DROP TABLE IF EXISTS `bj_like`;
CREATE TABLE `bj_like` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `text` varchar(255) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL COMMENT '谁评论的',
  `order_number` varchar(100) DEFAULT NULL,
  `fid` int(11) DEFAULT NULL COMMENT '发表人id',
  `nid` int(11) DEFAULT NULL COMMENT '发表内容 ID',
  `uname` varchar(255) DEFAULT NULL COMMENT '回复人姓名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_like
-- ----------------------------
INSERT INTO `bj_like` VALUES ('1', '100', '38', '2017112708360482083', null, '6', '10');
INSERT INTO `bj_like` VALUES ('2', '1', '38', '2017112708360482083', null, '6', '10');
INSERT INTO `bj_like` VALUES ('3', '10', '38', '2017112708360482083', null, '25', '10');
INSERT INTO `bj_like` VALUES ('4', '1', '38', '2017112708360482083', null, '26', '10');
INSERT INTO `bj_like` VALUES ('5', '10', '38', '2017112711000194088', null, '28', '10');
INSERT INTO `bj_like` VALUES ('6', '10', '38', '2017112711000194088', null, '28', '10');
INSERT INTO `bj_like` VALUES ('7', '10', '38', '2017112711000194088', null, '28', '10');
INSERT INTO `bj_like` VALUES ('8', '10', '38', '2017112711000194088', null, '28', '10');
INSERT INTO `bj_like` VALUES ('9', '10', '38', '2017112708360482083', null, '6', '10');
INSERT INTO `bj_like` VALUES ('10', '0452', '38', '2017112708360482083', null, '6', '10');
INSERT INTO `bj_like` VALUES ('11', '10', '39', '2017112708360482083', null, '6', '朋哥');
INSERT INTO `bj_like` VALUES ('12', '10', '38', '2017112708360482083', null, '32', '10');
INSERT INTO `bj_like` VALUES ('13', '10', '38', '2017112708360482083', null, '32', '赵孔磊');
INSERT INTO `bj_like` VALUES ('14', '1010', '38', '2017112708360482083', null, '37', '赵孔磊');
INSERT INTO `bj_like` VALUES ('15', '1010', '39', '2017112711000194088', null, '41', '李朋');
INSERT INTO `bj_like` VALUES ('16', '10', '39', '2017112711000194088', null, '41', '李朋');
INSERT INTO `bj_like` VALUES ('17', '8878', '39', '2017112711000194088', null, '43', '李朋');
INSERT INTO `bj_like` VALUES ('18', '56444444444444', '38', '2017112711000194088', null, '41', '赵孔磊');
INSERT INTO `bj_like` VALUES ('19', '55', '56', '20171129111252284', null, '45', null);
INSERT INTO `bj_like` VALUES ('20', '10', '38', '2017113012470296989', null, '46', '赵孔磊');
INSERT INTO `bj_like` VALUES ('21', '淡淡的', '47', '2017120214265421383', null, '48', '刘健');
INSERT INTO `bj_like` VALUES ('22', '110', '68', '2017120413333462970', null, '49', null);
INSERT INTO `bj_like` VALUES ('23', '考会计', '59', '2017120515225933523', null, '50', null);
INSERT INTO `bj_like` VALUES ('24', 'jjjjjjbhukhhy', '56', '2017120515225933523', null, '50', '顾佳敏');
INSERT INTO `bj_like` VALUES ('25', '好方法回家', '59', '2017120515225933523', null, '50', null);
INSERT INTO `bj_like` VALUES ('26', '10', '38', '2017120515511239812', null, '52', '赵孔磊');
INSERT INTO `bj_like` VALUES ('27', 'jddjkskss', '56', '2017120515511239812', null, '53', '顾佳敏');

-- ----------------------------
-- Table structure for bj_linkes
-- ----------------------------
DROP TABLE IF EXISTS `bj_linkes`;
CREATE TABLE `bj_linkes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '点赞人id',
  `fid` int(11) DEFAULT NULL COMMENT '发表人ID',
  `nid` int(11) DEFAULT NULL COMMENT '发表内容id',
  `order_number` varchar(100) DEFAULT NULL COMMENT '订单号',
  `uname` varchar(255) DEFAULT NULL COMMENT '点赞人姓名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_linkes
-- ----------------------------
INSERT INTO `bj_linkes` VALUES ('5', '38', null, '25', '2017112708360482083', '10');
INSERT INTO `bj_linkes` VALUES ('6', '38', null, '26', '2017112708360482083', '10');
INSERT INTO `bj_linkes` VALUES ('11', '38', null, '6', '2017112708360482083', '10');
INSERT INTO `bj_linkes` VALUES ('14', '38', null, '29', '2017112711000194088', '10');
INSERT INTO `bj_linkes` VALUES ('17', '38', null, '32', '2017112708360482083', '赵孔磊');
INSERT INTO `bj_linkes` VALUES ('18', '39', null, '32', '2017112708360482083', '李朋');
INSERT INTO `bj_linkes` VALUES ('19', '38', null, '37', '2017112708360482083', '赵孔磊');
INSERT INTO `bj_linkes` VALUES ('20', '39', null, '37', '2017112708360482083', '李朋');
INSERT INTO `bj_linkes` VALUES ('23', '38', null, '43', '2017112711000194088', '赵孔磊');
INSERT INTO `bj_linkes` VALUES ('24', '39', null, '43', '2017112711000194088', '李朋');
INSERT INTO `bj_linkes` VALUES ('25', '39', null, '41', '2017112711000194088', '李朋');
INSERT INTO `bj_linkes` VALUES ('26', '38', null, '41', '2017112711000194088', '赵孔磊');
INSERT INTO `bj_linkes` VALUES ('27', '38', null, '46', '2017113012470296989', '赵孔磊');
INSERT INTO `bj_linkes` VALUES ('33', '47', null, '48', '2017120214265421383', '刘健');
INSERT INTO `bj_linkes` VALUES ('34', '57', null, '48', '2017120214265421383', null);
INSERT INTO `bj_linkes` VALUES ('35', '68', null, '49', '2017120413333462970', null);
INSERT INTO `bj_linkes` VALUES ('39', '54', null, '52', '2017120515511239812', '111');

-- ----------------------------
-- Table structure for bj_log
-- ----------------------------
DROP TABLE IF EXISTS `bj_log`;
CREATE TABLE `bj_log` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `admin_name` varchar(50) DEFAULT NULL COMMENT '用户姓名',
  `description` varchar(300) DEFAULT NULL COMMENT '描述',
  `ip` char(60) DEFAULT NULL COMMENT 'IP地址',
  `status` tinyint(1) DEFAULT NULL COMMENT '1 成功 2 失败',
  `add_time` int(11) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_log
-- ----------------------------
INSERT INTO `bj_log` VALUES ('70', '1', 'admin', '用户【admin】登录失败：密码错误', '58.209.78.24', '2', '1509953778');
INSERT INTO `bj_log` VALUES ('71', '1', 'admin', '用户【admin】登录成功', '58.209.78.24', '1', '1509953782');
INSERT INTO `bj_log` VALUES ('72', '1', 'admin', '用户【admin】登录成功', '58.209.78.24', '1', '1509954084');
INSERT INTO `bj_log` VALUES ('73', '1', 'admin', '用户【admin】登录成功', '58.209.78.24', '1', '1509955148');
INSERT INTO `bj_log` VALUES ('74', '1', 'admin', '用户【admin】登录成功', '192.168.0.114', '1', '1509960575');
INSERT INTO `bj_log` VALUES ('75', '1', 'admin', '用户【admin】登录成功', '192.168.0.101', '1', '1509962809');
INSERT INTO `bj_log` VALUES ('76', '1', 'admin', '用户【admin】登录成功', '58.209.78.24', '1', '1509962986');
INSERT INTO `bj_log` VALUES ('77', '1', 'admin', '用户【admin】登录成功', '58.209.78.24', '1', '1509966217');
INSERT INTO `bj_log` VALUES ('78', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510014613');
INSERT INTO `bj_log` VALUES ('79', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510018637');
INSERT INTO `bj_log` VALUES ('80', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510019121');
INSERT INTO `bj_log` VALUES ('81', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510019591');
INSERT INTO `bj_log` VALUES ('82', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510021715');
INSERT INTO `bj_log` VALUES ('83', '1', 'admin', '用户【admin】登录成功', '192.168.0.222', '1', '1510022019');
INSERT INTO `bj_log` VALUES ('84', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510022843');
INSERT INTO `bj_log` VALUES ('85', '1', 'admin', '用户【admin】登录失败：密码错误', '58.209.78.178', '2', '1510035709');
INSERT INTO `bj_log` VALUES ('86', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510035713');
INSERT INTO `bj_log` VALUES ('87', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510036809');
INSERT INTO `bj_log` VALUES ('88', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510037343');
INSERT INTO `bj_log` VALUES ('89', '1', 'admin', '用户【22】添加成功', '58.209.78.178', '1', '1510037396');
INSERT INTO `bj_log` VALUES ('90', '1', 'admin', '用户【admin】登录失败：密码错误', '58.209.78.178', '2', '1510037430');
INSERT INTO `bj_log` VALUES ('91', '1', 'admin', '用户【admin】登录失败：密码错误', '58.209.78.178', '2', '1510037431');
INSERT INTO `bj_log` VALUES ('92', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510037435');
INSERT INTO `bj_log` VALUES ('93', '1', 'admin', '用户【admin】登录成功', '58.209.78.178', '1', '1510037957');
INSERT INTO `bj_log` VALUES ('94', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.103', '2', '1510039481');
INSERT INTO `bj_log` VALUES ('95', '1', 'admin', '用户【admin】登录成功', '192.168.0.103', '1', '1510039486');
INSERT INTO `bj_log` VALUES ('96', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.114', '2', '1510284286');
INSERT INTO `bj_log` VALUES ('97', '1', 'admin', '用户【admin】登录成功', '192.168.0.114', '1', '1510284293');
INSERT INTO `bj_log` VALUES ('98', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.114', '2', '1510553569');
INSERT INTO `bj_log` VALUES ('99', '1', 'admin', '用户【admin】登录成功', '192.168.0.114', '1', '1510553574');
INSERT INTO `bj_log` VALUES ('100', '1', 'admin', '用户【admin】登录成功', '192.168.0.114', '1', '1510620554');
INSERT INTO `bj_log` VALUES ('101', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.114', '2', '1510627680');
INSERT INTO `bj_log` VALUES ('102', '1', 'admin', '用户【admin】登录成功', '192.168.0.114', '1', '1510627686');
INSERT INTO `bj_log` VALUES ('103', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.150', '2', '1510898183');
INSERT INTO `bj_log` VALUES ('104', '1', 'admin', '用户【admin】登录成功', '192.168.0.150', '1', '1510898190');
INSERT INTO `bj_log` VALUES ('105', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.158', '2', '1511488204');
INSERT INTO `bj_log` VALUES ('106', '1', 'admin', '用户【admin】登录成功', '192.168.0.158', '1', '1511488212');
INSERT INTO `bj_log` VALUES ('107', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.150', '2', '1511507711');
INSERT INTO `bj_log` VALUES ('108', '1', 'admin', '用户【admin】登录成功', '192.168.0.150', '1', '1511507716');
INSERT INTO `bj_log` VALUES ('109', '1', 'admin', '用户【admin】登录成功', '192.168.0.150', '1', '1511750574');
INSERT INTO `bj_log` VALUES ('110', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.160', '2', '1511772602');
INSERT INTO `bj_log` VALUES ('111', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.160', '2', '1511772607');
INSERT INTO `bj_log` VALUES ('112', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.160', '2', '1511772607');
INSERT INTO `bj_log` VALUES ('113', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.160', '2', '1511772613');
INSERT INTO `bj_log` VALUES ('114', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.160', '2', '1511772619');
INSERT INTO `bj_log` VALUES ('115', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.160', '2', '1511772635');
INSERT INTO `bj_log` VALUES ('116', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.160', '2', '1511772649');
INSERT INTO `bj_log` VALUES ('117', '1', 'admin', '用户【admin】登录成功', '192.168.0.160', '1', '1511772657');
INSERT INTO `bj_log` VALUES ('118', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.162', '2', '1511839758');
INSERT INTO `bj_log` VALUES ('119', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.162', '2', '1511839765');
INSERT INTO `bj_log` VALUES ('120', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.162', '2', '1511839776');
INSERT INTO `bj_log` VALUES ('121', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.162', '2', '1511839790');
INSERT INTO `bj_log` VALUES ('122', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.162', '2', '1511839805');
INSERT INTO `bj_log` VALUES ('123', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.162', '2', '1511839814');
INSERT INTO `bj_log` VALUES ('124', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.162', '2', '1511839842');
INSERT INTO `bj_log` VALUES ('125', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.162', '2', '1511839847');
INSERT INTO `bj_log` VALUES ('126', '1', 'admin', '用户【admin】登录成功', '192.168.0.162', '1', '1511839868');
INSERT INTO `bj_log` VALUES ('127', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1511847376');
INSERT INTO `bj_log` VALUES ('128', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1511918513');
INSERT INTO `bj_log` VALUES ('129', '1', 'admin', '用户【admin】登录成功', '192.168.0.162', '1', '1511944381');
INSERT INTO `bj_log` VALUES ('130', '1', 'admin', '用户【admin】登录成功', '192.168.0.162', '1', '1512018990');
INSERT INTO `bj_log` VALUES ('131', '1', 'admin', '用户【admin】登录成功', '192.168.0.105', '1', '1512019814');
INSERT INTO `bj_log` VALUES ('132', '1', 'admin', '用户【admin】登录成功', '192.168.0.222', '1', '1512093484');
INSERT INTO `bj_log` VALUES ('133', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.113', '2', '1512105668');
INSERT INTO `bj_log` VALUES ('134', '1', 'admin', '用户【admin】登录成功', '192.168.0.113', '1', '1512105677');
INSERT INTO `bj_log` VALUES ('135', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.139', '2', '1512106683');
INSERT INTO `bj_log` VALUES ('136', '1', 'admin', '用户【admin】登录成功', '192.168.0.139', '1', '1512106699');
INSERT INTO `bj_log` VALUES ('137', '1', 'admin', '用户【admin】登录成功', '192.168.0.195', '1', '1512107532');
INSERT INTO `bj_log` VALUES ('138', '1', 'admin', '用户【admin】登录成功', '192.168.0.195', '1', '1512109385');
INSERT INTO `bj_log` VALUES ('139', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1512194346');
INSERT INTO `bj_log` VALUES ('140', '1', 'admin', '用户【admin】登录成功', '192.168.0.113', '1', '1512199241');
INSERT INTO `bj_log` VALUES ('141', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512358459');
INSERT INTO `bj_log` VALUES ('142', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512368795');
INSERT INTO `bj_log` VALUES ('143', '1', 'admin', '用户【admin】添加菜单成功', '192.168.0.190', '1', '1512369344');
INSERT INTO `bj_log` VALUES ('144', '1', 'admin', '用户【admin】添加菜单成功', '192.168.0.190', '1', '1512369432');
INSERT INTO `bj_log` VALUES ('145', '1', 'admin', '用户【admin】添加菜单成功', '192.168.0.190', '1', '1512369469');
INSERT INTO `bj_log` VALUES ('146', '1', 'admin', '用户【admin】添加菜单成功', '192.168.0.190', '1', '1512369597');
INSERT INTO `bj_log` VALUES ('147', '1', 'admin', '用户【admin】登录成功', '0.0.0.0', '1', '1512369703');
INSERT INTO `bj_log` VALUES ('148', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.163', '2', '1512375711');
INSERT INTO `bj_log` VALUES ('149', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.163', '2', '1512375800');
INSERT INTO `bj_log` VALUES ('150', '1', 'admin', '用户【admin】登录成功', '192.168.0.163', '1', '1512375856');
INSERT INTO `bj_log` VALUES ('151', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512437788');
INSERT INTO `bj_log` VALUES ('152', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512451562');
INSERT INTO `bj_log` VALUES ('153', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1512460212');
INSERT INTO `bj_log` VALUES ('154', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512522120');
INSERT INTO `bj_log` VALUES ('155', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512523270');
INSERT INTO `bj_log` VALUES ('156', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1512525034');
INSERT INTO `bj_log` VALUES ('157', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512537265');
INSERT INTO `bj_log` VALUES ('158', '1', 'admin', '用户【admin】登录失败：密码错误', '0.0.0.0', '2', '1512537299');
INSERT INTO `bj_log` VALUES ('159', '1', 'admin', '用户【admin】登录成功', '0.0.0.0', '1', '1512537307');
INSERT INTO `bj_log` VALUES ('160', '1', 'admin', '用户【admin】添加菜单成功', '0.0.0.0', '1', '1512537368');
INSERT INTO `bj_log` VALUES ('161', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1512539222');
INSERT INTO `bj_log` VALUES ('162', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.222', '2', '1512540131');
INSERT INTO `bj_log` VALUES ('163', '1', 'admin', '用户【admin】登录成功', '192.168.0.222', '1', '1512540138');
INSERT INTO `bj_log` VALUES ('164', '1', 'admin', '用户【admin】添加菜单成功', '0.0.0.0', '1', '1512540614');
INSERT INTO `bj_log` VALUES ('165', '1', 'admin', '用户【admin】编辑菜单成功', '0.0.0.0', '1', '1512541615');
INSERT INTO `bj_log` VALUES ('166', '1', 'admin', '用户【admin】编辑菜单成功', '0.0.0.0', '1', '1512541634');
INSERT INTO `bj_log` VALUES ('167', '1', 'admin', '用户【admin】编辑菜单成功', '0.0.0.0', '1', '1512541729');
INSERT INTO `bj_log` VALUES ('168', '1', 'admin', '用户【admin】添加菜单成功', '192.168.0.190', '1', '1512548476');
INSERT INTO `bj_log` VALUES ('169', '1', 'admin', '用户【admin】添加菜单成功', '192.168.0.190', '1', '1512548562');
INSERT INTO `bj_log` VALUES ('170', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1512608117');
INSERT INTO `bj_log` VALUES ('171', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.106', '2', '1512609083');
INSERT INTO `bj_log` VALUES ('172', '1', 'admin', '用户【admin】登录成功', '192.168.0.106', '1', '1512609088');
INSERT INTO `bj_log` VALUES ('173', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512614783');
INSERT INTO `bj_log` VALUES ('174', '1', 'admin', '用户【admin】登录成功', '192.168.0.113', '1', '1512624706');
INSERT INTO `bj_log` VALUES ('175', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512624813');
INSERT INTO `bj_log` VALUES ('176', '1', 'admin', '用户【admin】添加菜单成功', '192.168.0.113', '1', '1512624917');
INSERT INTO `bj_log` VALUES ('177', '1', 'admin', '用户【admin】编辑菜单成功', '192.168.0.113', '1', '1512624970');
INSERT INTO `bj_log` VALUES ('178', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.159', '2', '1512626889');
INSERT INTO `bj_log` VALUES ('179', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.159', '2', '1512626895');
INSERT INTO `bj_log` VALUES ('180', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1512626901');
INSERT INTO `bj_log` VALUES ('181', '1', 'admin', '用户【admin】登录成功', '192.168.0.195', '1', '1512630690');
INSERT INTO `bj_log` VALUES ('182', '1', 'admin', '用户【admin】登录成功', '192.168.0.106', '1', '1512631339');
INSERT INTO `bj_log` VALUES ('183', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1512634038');
INSERT INTO `bj_log` VALUES ('184', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512634709');
INSERT INTO `bj_log` VALUES ('185', '1', 'admin', '用户【admin】登录成功', '192.168.0.106', '1', '1512634936');
INSERT INTO `bj_log` VALUES ('186', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.222', '2', '1512635951');
INSERT INTO `bj_log` VALUES ('187', '1', 'admin', '用户【admin】登录成功', '192.168.0.222', '1', '1512635956');
INSERT INTO `bj_log` VALUES ('188', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.113', '2', '1512638762');
INSERT INTO `bj_log` VALUES ('189', '1', 'admin', '用户【admin】登录成功', '192.168.0.113', '1', '1512638776');
INSERT INTO `bj_log` VALUES ('190', '1', 'admin', '用户【admin】登录成功', '192.168.0.113', '1', '1512693367');
INSERT INTO `bj_log` VALUES ('191', '1', 'admin', '用户【admin】登录成功', '192.168.0.106', '1', '1512694341');
INSERT INTO `bj_log` VALUES ('192', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512700589');
INSERT INTO `bj_log` VALUES ('193', '1', 'admin', '用户【admin】登录成功', '192.168.0.125', '1', '1512718458');
INSERT INTO `bj_log` VALUES ('194', '1', 'admin', '用户【admin】登录成功', '192.168.0.125', '1', '1512718722');
INSERT INTO `bj_log` VALUES ('195', '1', 'admin', '用户【admin】登录失败：密码错误', '192.168.0.159', '2', '1512720002');
INSERT INTO `bj_log` VALUES ('196', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1512720008');
INSERT INTO `bj_log` VALUES ('197', '1', 'admin', '用户【admin】登录成功', '192.168.0.106', '1', '1512720168');
INSERT INTO `bj_log` VALUES ('198', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1512725771');
INSERT INTO `bj_log` VALUES ('199', '1', 'admin', '用户【admin】登录成功', '192.168.0.159', '1', '1512801337');
INSERT INTO `bj_log` VALUES ('200', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512807100');
INSERT INTO `bj_log` VALUES ('201', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512959562');
INSERT INTO `bj_log` VALUES ('202', '1', 'admin', '用户【admin】登录成功', '192.168.0.190', '1', '1512963701');

-- ----------------------------
-- Table structure for bj_master_report
-- ----------------------------
DROP TABLE IF EXISTS `bj_master_report`;
CREATE TABLE `bj_master_report` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `worker_id` int(10) DEFAULT NULL COMMENT '师傅ID',
  `order_number` bigint(20) DEFAULT NULL COMMENT '订单号',
  `itemname` varchar(50) DEFAULT NULL COMMENT '维修项目名称',
  `company` varchar(50) DEFAULT NULL COMMENT '施工公司',
  `contactofcus` varchar(30) DEFAULT NULL COMMENT '店铺联系人',
  `phoneofcus` bigint(11) DEFAULT NULL COMMENT '店铺联系电话',
  `master` varchar(20) DEFAULT NULL COMMENT '施工师傅',
  `master_phone` bigint(11) DEFAULT NULL COMMENT '施工师傅电话',
  `finish_time` int(10) DEFAULT NULL COMMENT '施工完成时间',
  `address` varchar(100) DEFAULT NULL COMMENT '项目地址',
  `doorpics` varchar(50) DEFAULT NULL COMMENT '门头照片',
  `signrecvpics` varchar(50) DEFAULT NULL COMMENT '维修签收单',
  `overviewpics` varchar(50) DEFAULT NULL COMMENT '专柜全景',
  `beforepics` varchar(30) DEFAULT NULL COMMENT '维修前照片',
  `afterpics` varchar(30) DEFAULT NULL COMMENT '维修后照片',
  `user_sign` varchar(20) DEFAULT NULL COMMENT '业主签字',
  `master_sign` varchar(20) DEFAULT NULL COMMENT '师傅签字',
  `detials` varchar(255) DEFAULT NULL COMMENT '故障详情',
  `evaluate` tinyint(1) DEFAULT '1' COMMENT '评价，默认好评1，差评-1，中评0',
  `is_ok` tinyint(1) DEFAULT '0',
  `master_people` varchar(30) DEFAULT NULL COMMENT '施工联系人',
  `create_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8 COMMENT='维修报告表';

-- ----------------------------
-- Records of bj_master_report
-- ----------------------------
INSERT INTO `bj_master_report` VALUES ('176', '56', '2017112909421357950', null, null, null, null, null, null, null, null, '9df7e201711291040248795.jpeg', '1f466201711291040327970.jpeg', '1b273201711291040393884.jpeg', '1047,1049', '1048,1050', '1500000391', null, '126', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('177', '56', '2017112910514819870', null, null, null, null, null, null, null, null, '4e6ef201711291102559235.jpeg', 'edd19201711291103008366.jpeg', '98122201711291103064289.jpeg', '1051', '1052', '1500000393', null, '222', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('178', '56', '20171129111252284', null, null, null, null, null, null, null, null, '1a98a201711291134137406.jpg', 'f871520171129113500105.jpg', '15fc4201711291134284615.jpg', '1054', '1053', '1500000395', null, '111', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('179', '56', '2017112911395059723', null, null, null, null, null, null, null, null, '10c7c201711291145479821.jpg', '10419201711291145557753.jpg', '91ccc201711291146055993.jpg', '1056', '1057', '1500000397', null, '11', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('180', '56', '2017112914594117031', null, null, null, null, null, null, null, null, 'd67a8201711291700442419.jpeg', '824ed20171129170050782.jpeg', '41af7201711291700572501.jpeg', '1058,1060', '1059,1061', null, null, '111', '1', '0', null, null);
INSERT INTO `bj_master_report` VALUES ('192', '56', '2017113013130146394', null, null, null, null, null, null, null, null, '900b9201711301328415756.jpeg', 'd5dea20171130132736877.jpeg', '1b14a201711301328138191.jpeg', '1064', '1062', '1500000403', null, '11', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('193', '56', '2017113013501692939', null, null, null, null, null, null, null, null, '605b0201711301415081881.jpg', 'd9f24201711301415074960.jpg', '54bec201711301415107561.jpg', '1065', '1066', null, null, '', '1', '0', null, null);
INSERT INTO `bj_master_report` VALUES ('194', '56', '201711301525454878', null, null, null, null, null, null, null, null, '646da201711301542165460.jpeg', '89e93201711301542225168.jpeg', '4dee4201711301542289200.png', '1068', '1069', null, null, '11', '1', '0', null, null);
INSERT INTO `bj_master_report` VALUES ('195', '56', '2017113015583899567', '维修-珠宝柜-空调', '', '秋寒', '11', '', '18961519032', '1512030039', '北京北京市东城区', 'd75db201711301620446867.jpg', '51d1520171130162045353.jpg', 'c5a1a201711301620497500.jpg', '1073', '1074', '1500000407', '1500000407', '去去去', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('196', '56', '2017113016305890158', '维修-服装柜-空调', '', '秋寒', '11', '', '18961519032', '1512031751', '北京北京市东城区', 'ca217201711301649159627.jpg', '1255d201711301649176653.jpg', '0c36c201711301649191390.jpg', '1078', '1079', '1500000409', null, '111', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('197', '56', '2017120110024541851', null, null, null, null, null, null, null, null, '4c77e201712011019256470.JPG', 'd30b8201712011019348641.JPG', '3eee6201712011019424079.JPG', '1080', '1081', '', null, '哈哈', '1', '0', null, null);
INSERT INTO `bj_master_report` VALUES ('198', '56', '2017120114160672307', null, null, null, null, null, null, null, null, '20183201712011451298763.jpg', '72567201712011451414602.jpg', 'f8faf201712011451223093.jpg', '1082', '1083', '1500000413', null, '现场更换3套蓝色灯具', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('199', '56', '2017120115572959109', null, null, null, null, null, null, null, null, '26ccd201712011600438902.jpg', 'e976f201712011600496319.JPG', '412e5201712011600563987.JPG', '1084', '1085', '1500000414', null, '哈哈', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('200', '56', '2017120413303972014', null, null, null, null, null, null, null, null, '3ff30201712041338419720.jpeg', '1fa7b201712041338466238.jpeg', 'b48f1201712041338509690.jpeg', '1086', '1087', '1500000416', null, '111', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('203', '56', '2017120415375447591', null, null, null, null, null, null, null, null, 'd4524201712041700252415.jpg', '1856a201712041700316328.jpg', '6e0a520171204170037750.jpg', '1088,1090', '1089,1091', '1500000421', null, '更换等会', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('205', '56', '2017120515225933523', null, null, null, null, null, null, null, null, '0e3ed201712060853504402.jpg', '6f9e1201712060854004484.jpg', '9cd63201712060854162347.jpg', '1128,1130', '1129,1131', '1500000425', null, '1111111111', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('207', '56', '2017120610103665747', null, null, null, null, null, null, null, null, '23115201712061050061509.png', 'edf9d201712061050083798.png', 'd9d9f201712061050116463.png', '1142', '1143', '1500000426', null, '', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('208', '56', '2017120610411351768', '维修-化妆品柜-电器', '顾佳敏', '10', '18961519032', '顾佳敏', '18961519032', '1512528303', '北京市北京市朝阳区', '44795201712061045071143.png', 'a5957201712061045088761.png', '58373201712061045159282.png', '1140', '1141', '1500000427', null, '1', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('209', '56', '2017120610572444847', '维修-化妆品柜-电器', '顾佳敏', '10', '17714559315', '顾佳敏', '18961519032', '1512529627', '北京市北京市朝阳区', '86dee201712061107112041.png', '9ae37201712061107121013.png', 'c22c0201712061107143364.png', '1147', '1148', null, null, '111', '1', '0', null, null);
INSERT INTO `bj_master_report` VALUES ('210', '56', '2017120611115555068', null, null, null, null, null, null, null, null, '194e4201712061114417427.jpeg', 'fe36f20171206111433620.jpeg', '66ae8201712061114482898.jpeg', '1150', '1151', '1500000429', null, '', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('213', '56', '2017120709013668489', null, null, null, null, null, null, null, null, 'aacda201712070923159881.jpeg', '2f650201712070923224301.png', '8d0c820171207092326219.jpeg', '1156', '1157', '1500000429', null, '', '1', '0', null, null);
INSERT INTO `bj_master_report` VALUES ('214', '56', '2017120709315646372', null, null, null, null, null, null, null, null, 'd7136201712070935175727.jpeg', 'fc486201712070935236864.jpeg', '5a016201712070935299362.jpeg', '1158', '1159', '1500000434', null, '哈哈', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('215', '56', '2017120709434985609', null, null, null, null, null, null, null, null, 'caf14201712070949146395.png', '15c9c201712070949253904.jpg', 'fbf7a201712070949319419.jpeg', '1160', '1161', '1500000436', null, '', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('216', '56', '2017120710303544571', null, null, null, null, null, null, null, null, 'a9cab201712071050327608.jpeg', '92872201712071050375005.jpeg', '9d642201712071050423487.jpeg', '1164,1166', '1165,1167', '1500000438', null, '和你', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('221', '54', '2017120713300542747', null, null, null, null, null, null, null, null, '6d8a4201712071352383265.png', 'b0f89201712071352419914.png', '82163201712071352451697.png', '1170,1171', '1169,1172', '1500000440', null, '', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('222', '56', '2017120713554972376', null, null, null, null, null, null, null, null, 'e17f3201712071444008833.JPG', '312e1201712071444086547.PNG', 'f2472201712071444152521.PNG', '1175', '1176', '1500000443', null, '', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('223', '56', '2017120715152036561', null, null, null, null, null, null, null, null, '62948201712071526133631.JPG', 'f2d69201712071526239155.PNG', 'b43b2201712071526311346.PNG', '1178', '1179', '1500000445', null, '', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('225', '54', '2017120715210898652', null, null, null, null, null, null, null, null, '47ad420171207154208749.jpg', 'f36d1201712071542147659.jpg', 'b0012201712071542191055.jpg', '1180,1182,1185,,,1187', '1181,1183,1184,,,1188', '1500000448', null, '5555', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('226', '56', '2017120808472682390', null, null, null, null, null, null, null, null, '01860201712080855193110.jpeg', '5ac55201712080855281627.jpeg', '479bd201712080855338524.jpeg', '1193,1195', '1194,1196', '1500000450', null, '11', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('229', '71', '201712081555439062', null, null, null, null, null, null, null, null, '41b16201712081605322090.jpg', 'a7b77201712081605168043.jpg', '6f92a20171208160543634.jpg', '1206', '1205,1207', '1500000453', null, '', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('230', '56', '2017120815510325171', null, null, null, null, null, null, null, null, '9fa3e201712081615346908.PNG', '263b9201712081615426421.PNG', '1bf1f20171208161549578.PNG', '1209', '1210', '1500000455', null, '', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('232', '71', '2017120816552463170', null, null, null, null, null, null, null, null, 'd80b2201712081701257114.jpg', '39bbf201712081701214685.jpg', 'b81a5201712081701308101.jpg', '1212,1215,1217,1219', '1213,1214,1216,1218', '1500000457', null, '55555553', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('233', '56', '2017120817282688443', null, null, null, null, null, null, null, null, '7e66b20171208173959739.jpg', '0c72d201712081740057498.jpg', 'e6d79201712081740185675.jpg', '1222', '1223', '1500000459', null, '', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('238', '56', '2017120909255694657', null, null, null, null, null, null, null, null, '7e7d7201712091051227800.png', 'cffee201712091051237290.png', '40a8f201712091051245724.png', '1246,1248,1250', '1247,1249,1251', '1500000461', null, '看看', '1', '1', null, null);
INSERT INTO `bj_master_report` VALUES ('240', '56', '2017120914370562104', null, null, null, null, null, null, null, null, '16479201712091444339013.PNG', 'd9547201712091444391281.PNG', '7ebff201712091444451115.PNG', '1261,1263,1265,1266', '1262,1264,1267', '1500000464', null, '哈哈这个还不行吗', '1', '1', null, null);

-- ----------------------------
-- Table structure for bj_member
-- ----------------------------
DROP TABLE IF EXISTS `bj_member`;
CREATE TABLE `bj_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `account` varchar(64) DEFAULT NULL COMMENT '邮件或者手机',
  `nickname` varchar(32) DEFAULT NULL COMMENT '昵称',
  `sex` int(10) DEFAULT NULL COMMENT '1男2女',
  `password` char(32) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `head_img` varchar(128) DEFAULT NULL COMMENT '头像',
  `integral` int(11) DEFAULT '0' COMMENT '积分',
  `money` int(11) DEFAULT '0' COMMENT '账户余额',
  `mobile` varchar(11) DEFAULT NULL COMMENT '认证的手机号码',
  `create_time` int(11) DEFAULT '0' COMMENT '注册时间',
  `update_time` int(11) DEFAULT NULL COMMENT '最后一次登录',
  `login_num` varchar(15) DEFAULT NULL COMMENT '登录次数',
  `status` tinyint(1) DEFAULT NULL COMMENT '1正常  0 禁用',
  `closed` tinyint(1) DEFAULT '0' COMMENT '0正常，1删除',
  `token` char(32) DEFAULT '0' COMMENT '令牌',
  `session_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_member
-- ----------------------------

-- ----------------------------
-- Table structure for bj_message
-- ----------------------------
DROP TABLE IF EXISTS `bj_message`;
CREATE TABLE `bj_message` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `create_time` int(10) DEFAULT NULL COMMENT '留言时间',
  `status` tinyint(1) DEFAULT '0' COMMENT '留言审核是否通过 0未审核 1审核通过 	',
  `content` text COMMENT '留言内容',
  `order_number` bigint(20) DEFAULT NULL COMMENT '订单号',
  `uid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_message
-- ----------------------------
INSERT INTO `bj_message` VALUES ('35', '1511754055', '1', '1010', '2017112708360482083', '38');
INSERT INTO `bj_message` VALUES ('36', '1511754096', '1', '4200000000000000000008272727217214727427427278287287272177717411411', '2017112708360482083', '38');
INSERT INTO `bj_message` VALUES ('37', '1511754111', '1', 'PHP Date/Time 简介 Date/Time 函数允许您从 PHP 脚本运行的服务器上获取日期和时间。您可以使用 Date/Time 函数通过不同的方式来格式化日期和时间。', '2017112708360482083', '38');
INSERT INTO `bj_message` VALUES ('38', '1511754260', '1', '', '2017112708360482083', '38');
INSERT INTO `bj_message` VALUES ('39', '1511754327', '1', '', '2017112708360482083', '38');
INSERT INTO `bj_message` VALUES ('40', '1511754329', '1', '', '2017112708360482083', '38');
INSERT INTO `bj_message` VALUES ('41', '1511754989', '1', '在v奥if哦哈哈哦哦哈维覅我会oh然后哄娃和i哦日韩和i和i黄日华i啊哈哈i然后和i啊好烦好iOA哦日发哈后方i皇后爱她和iat非伽我【1', '2017112711000194088', '39');
INSERT INTO `bj_message` VALUES ('42', '1511755078', '1', '10', '2017112708360482083', '38');
INSERT INTO `bj_message` VALUES ('43', '1511755118', '1', '10', '2017112711000194088', '39');
INSERT INTO `bj_message` VALUES ('44', '1511774187', '1', '10', '2017112717161680299', '38');
INSERT INTO `bj_message` VALUES ('45', '1511925341', '1', '的', '20171129111252284', '56');
INSERT INTO `bj_message` VALUES ('46', '1512017306', '1', '1010', '2017113012470296989', '38');
INSERT INTO `bj_message` VALUES ('47', '1512018975', '1', '1', '201711301315346445', '68');
INSERT INTO `bj_message` VALUES ('48', '1512196314', '1', '你还 啊 ', '2017120214265421383', '47');
INSERT INTO `bj_message` VALUES ('49', '1512365657', '1', '212', '2017120413333462970', '68');
INSERT INTO `bj_message` VALUES ('50', '1512459650', '1', '好好干方法', '2017120515225933523', '59');
INSERT INTO `bj_message` VALUES ('51', '1512460044', '1', 'fjfjgjgj', '2017120515225933523', '56');
INSERT INTO `bj_message` VALUES ('52', '1512460304', '1', '10', '2017120515511239812', '38');
INSERT INTO `bj_message` VALUES ('53', '1512460467', '1', '10', '2017120515511239812', '38');
INSERT INTO `bj_message` VALUES ('54', '1512460576', '1', '10', '2017120515511239812', '38');
INSERT INTO `bj_message` VALUES ('55', '1512460837', '1', 'vjvjjvjv', '2017120515511239812', '56');
INSERT INTO `bj_message` VALUES ('56', '1512461415', '1', '哈哈哈', '2017120516072586543', '38');
INSERT INTO `bj_message` VALUES ('57', '1512461624', '1', '10', '2017120516072586543', '54');
INSERT INTO `bj_message` VALUES ('58', '1512462265', '1', '10', '2017120516072586543', '54');
INSERT INTO `bj_message` VALUES ('59', '1512463097', '1', '快快快', '2017120516072586543', '71');
INSERT INTO `bj_message` VALUES ('60', '1512463578', '1', '快来青岛', '2017120516455650773', '68');
INSERT INTO `bj_message` VALUES ('61', '1512721740', '1', 'mood', '2017120811103615280', '71');
INSERT INTO `bj_message` VALUES ('62', '1512723761', '1', '很过分胡', '2017120817011937198', '59');
INSERT INTO `bj_message` VALUES ('63', '1512807253', '1', '10', '2017120916074029388', '54');
INSERT INTO `bj_message` VALUES ('64', '1512953627', '1', '', '2017121108443384565', '71');

-- ----------------------------
-- Table structure for bj_message_reminder
-- ----------------------------
DROP TABLE IF EXISTS `bj_message_reminder`;
CREATE TABLE `bj_message_reminder` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `message_type` tinyint(1) NOT NULL COMMENT '消息类型:1系统消息2订单消息',
  `source_id` int(10) NOT NULL COMMENT '来源对应UserId',
  `receive_id` int(10) NOT NULL COMMENT '接收人对应UserId',
  `content` text NOT NULL COMMENT '发送内容',
  `link` varchar(100) DEFAULT NULL COMMENT '链接',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '消息状态:0未读取1读取',
  `sending_time` varchar(20) NOT NULL COMMENT '发送时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5802 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='消息表';

-- ----------------------------
-- Records of bj_message_reminder
-- ----------------------------
INSERT INTO `bj_message_reminder` VALUES ('5459', '2', '68', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '1', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5460', '2', '68', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '1', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5461', '2', '68', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5462', '2', '68', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5463', '2', '68', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5464', '2', '68', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5465', '2', '68', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5466', '2', '68', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5467', '2', '68', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5468', '2', '68', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5469', '2', '68', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5471', '2', '68', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5472', '2', '68', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120914370562104', '0', '2017-12-09 14:37:13');
INSERT INTO `bj_message_reminder` VALUES ('5475', '2', '68', '56', '您的订单(订单号是2017120914370562104)客户反馈的内容是：有问题', 'http://192.168.0.252/touching/2017120914370562104', '1', '2017-12-09 14:40:18');
INSERT INTO `bj_message_reminder` VALUES ('5477', '2', '68', '56', '您的订单(订单号是2017120914370562104)客户反馈的内容是：', 'http://192.168.0.252/touching/2017120914370562104', '1', '2017-12-09 14:43:22');
INSERT INTO `bj_message_reminder` VALUES ('5479', '2', '68', '56', '客户已确认核单报告，订单号是2017120914370562104', 'http://192.168.0.252/phone/order_master_home', '1', '2017-12-09 14:43:59');
INSERT INTO `bj_message_reminder` VALUES ('5481', '2', '68', '56', '您的订单(订单号是2017120914370562104)客户反馈的内容是：', 'http://192.168.0.252/phone/master_maintenance_reports/2017120914370562104', '1', '2017-12-09 14:45:33');
INSERT INTO `bj_message_reminder` VALUES ('5483', '2', '68', '56', '客户已确认维修确认报告，订单号是：2017120914370562104，请点击查看', 'http://192.168.0.252/master_maintenance_reports/2017120914370562104', '1', '2017-12-09 14:48:39');
INSERT INTO `bj_message_reminder` VALUES ('5484', '2', '68', '56', '有客户找你咨询,请点击查看', 'http://192.168.0.252/Cqueryprice/2017120914531532735/wid/56', '1', '2017-12-09 14:53:21');
INSERT INTO `bj_message_reminder` VALUES ('5485', '2', '68', '56', '有客户找你咨询,请点击查看', 'http://192.168.0.252/phone/Cqueryprice/2017120914532598604/wid/56', '1', '2017-12-09 14:53:46');
INSERT INTO `bj_message_reminder` VALUES ('5487', '2', '59', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5488', '2', '59', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5489', '2', '59', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5490', '2', '59', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5491', '2', '59', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5492', '2', '59', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5493', '2', '59', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5494', '2', '59', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5495', '2', '59', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5496', '2', '59', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5497', '2', '59', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5499', '2', '59', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5500', '2', '59', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:02:22');
INSERT INTO `bj_message_reminder` VALUES ('5501', '2', '59', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '1', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5502', '2', '59', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5503', '2', '59', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '1', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5504', '2', '59', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5505', '2', '59', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5506', '2', '59', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5507', '2', '59', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5508', '2', '59', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5509', '2', '59', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5510', '2', '59', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5511', '2', '59', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5513', '2', '59', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5514', '2', '59', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915010555841', '0', '2017-12-09 15:05:55');
INSERT INTO `bj_message_reminder` VALUES ('5515', '2', '59', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5516', '2', '59', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5517', '2', '59', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '1', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5518', '2', '59', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5519', '2', '59', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5520', '2', '59', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5521', '2', '59', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5522', '2', '59', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5523', '2', '59', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5524', '2', '59', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5525', '2', '59', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5527', '2', '59', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5528', '2', '59', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 15:10:35');
INSERT INTO `bj_message_reminder` VALUES ('5529', '2', '59', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5530', '2', '59', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '1', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5531', '2', '59', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '1', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5532', '2', '59', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5533', '2', '59', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5534', '2', '59', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5535', '2', '59', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5536', '2', '59', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5537', '2', '59', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5538', '2', '59', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5539', '2', '59', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5541', '2', '59', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5542', '2', '59', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:20:12');
INSERT INTO `bj_message_reminder` VALUES ('5543', '2', '56', '59', '您的订单已有师傅选择，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:21:49');
INSERT INTO `bj_message_reminder` VALUES ('5544', '2', '54', '59', '您的订单已有师傅选择，请点击查看', 'http://192.168.0.252/guestbook/20171209151955304', '0', '2017-12-09 15:24:52');
INSERT INTO `bj_message_reminder` VALUES ('5545', '2', '38', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '1', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5547', '2', '38', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5548', '2', '38', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5549', '2', '38', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5550', '2', '38', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5551', '2', '38', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5552', '2', '38', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5553', '2', '38', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5554', '2', '38', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5555', '2', '38', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5557', '2', '38', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5558', '2', '38', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915235078017', '0', '2017-12-09 15:39:32');
INSERT INTO `bj_message_reminder` VALUES ('5560', '2', '38', '54', '有客户找你咨询,请点击查看', 'http://192.168.0.252/Cqueryprice/2017120915442337391/wid/54', '1', '2017-12-09 15:44:30');
INSERT INTO `bj_message_reminder` VALUES ('5561', '2', '59', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '1', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5563', '2', '59', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '1', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5564', '2', '59', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5565', '2', '59', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5566', '2', '59', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5567', '2', '59', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5568', '2', '59', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5569', '2', '59', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5570', '2', '59', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5571', '2', '59', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5573', '2', '59', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5574', '2', '59', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:52:36');
INSERT INTO `bj_message_reminder` VALUES ('5575', '1', '56', '59', '师傅提醒你去付款', 'http://192.168.0.252/phone/settlement/20171209151955304', '1', '2017-12-09 15:57:27');
INSERT INTO `bj_message_reminder` VALUES ('5576', '2', '58', '59', '您的订单已有师傅选择，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '0', '2017-12-09 15:57:54');
INSERT INTO `bj_message_reminder` VALUES ('5577', '2', '56', '59', '师傅已提交核单报告，订单号是20171209151955304，请点击查看', 'http://192.168.0.252/phone/client_touching/20171209151955304', '1', '2017-12-09 16:00:00');
INSERT INTO `bj_message_reminder` VALUES ('5578', '2', '58', '59', '您的订单已有师傅选择，请点击查看', 'http://192.168.0.252/guestbook/2017120915103053789', '0', '2017-12-09 16:00:35');
INSERT INTO `bj_message_reminder` VALUES ('5579', '2', '68', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '1', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5581', '2', '68', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '1', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5582', '2', '68', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '0', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5583', '2', '68', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '0', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5584', '2', '68', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '0', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5585', '2', '68', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '0', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5586', '2', '68', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '0', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5587', '2', '68', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '0', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5588', '2', '68', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '0', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5589', '2', '68', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '0', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5591', '2', '68', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '0', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5592', '2', '68', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/201712091600358632', '0', '2017-12-09 16:00:42');
INSERT INTO `bj_message_reminder` VALUES ('5593', '2', '68', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '1', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5595', '2', '68', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '1', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5596', '2', '68', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '0', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5597', '2', '68', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '0', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5598', '2', '68', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '0', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5599', '2', '68', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '0', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5600', '2', '68', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '0', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5601', '2', '68', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '0', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5602', '2', '68', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '0', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5603', '2', '68', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '0', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5605', '2', '68', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '0', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5606', '2', '68', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916012760339', '0', '2017-12-09 16:01:35');
INSERT INTO `bj_message_reminder` VALUES ('5607', '2', '56', '59', '您的订单已有师傅选择，请点击查看', 'http://192.168.0.252/guestbook/2017120915514129422', '1', '2017-12-09 16:03:00');
INSERT INTO `bj_message_reminder` VALUES ('5608', '1', '58', '59', '师傅提醒你去付款', 'http://192.168.0.252/phone/settlement/2017120915514129422', '0', '2017-12-09 16:03:22');
INSERT INTO `bj_message_reminder` VALUES ('5609', '1', '58', '59', '师傅提醒你去付款', 'http://192.168.0.252/phone/settlement/2017120915514129422', '1', '2017-12-09 16:03:27');
INSERT INTO `bj_message_reminder` VALUES ('5610', '1', '58', '59', '师傅提醒你去付款', 'http://192.168.0.252/phone/settlement/2017120915514129422', '0', '2017-12-09 16:03:42');
INSERT INTO `bj_message_reminder` VALUES ('5611', '2', '58', '59', '师傅已提交核单报告，订单号是2017120915514129422，请点击查看', 'http://192.168.0.252/phone/client_touching/2017120915514129422', '0', '2017-12-09 16:06:58');
INSERT INTO `bj_message_reminder` VALUES ('5612', '2', '38', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '1', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5614', '2', '38', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '1', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5615', '2', '38', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '0', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5616', '2', '38', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '0', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5617', '2', '38', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '0', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5618', '2', '38', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '0', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5619', '2', '38', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '0', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5620', '2', '38', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '0', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5621', '2', '38', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '0', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5622', '2', '38', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '0', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5624', '2', '38', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '0', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5625', '2', '38', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '0', '2017-12-09 16:07:48');
INSERT INTO `bj_message_reminder` VALUES ('5626', '2', '58', '59', '师傅已提交核单报告，订单号是2017120915514129422，请点击查看', 'http://192.168.0.252/phone/client_touching/2017120915514129422', '1', '2017-12-09 16:07:49');
INSERT INTO `bj_message_reminder` VALUES ('5628', '2', '54', '38', '您的订单已有师傅选择，请点击查看', 'http://192.168.0.252/guestbook/2017120916074029388', '1', '2017-12-09 16:10:11');
INSERT INTO `bj_message_reminder` VALUES ('5629', '2', '59', '58', '客户已确认核单报告，订单号是2017120915514129422', 'http://192.168.0.252/phone/order_master_home', '0', '2017-12-09 16:10:38');
INSERT INTO `bj_message_reminder` VALUES ('5630', '2', '68', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '1', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5632', '2', '68', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5633', '2', '68', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5634', '2', '68', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5635', '2', '68', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5636', '2', '68', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5637', '2', '68', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5638', '2', '68', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5639', '2', '68', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5640', '2', '68', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5642', '2', '68', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5643', '2', '68', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108443384565', '0', '2017-12-11 08:44:50');
INSERT INTO `bj_message_reminder` VALUES ('5644', '2', '47', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5646', '2', '47', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5647', '2', '47', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5648', '2', '47', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5649', '2', '47', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5650', '2', '47', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5651', '2', '47', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5652', '2', '47', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5653', '2', '47', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5654', '2', '47', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5656', '2', '47', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5657', '2', '47', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121108463156524', '0', '2017-12-11 08:52:19');
INSERT INTO `bj_message_reminder` VALUES ('5660', '2', '38', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5661', '2', '38', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5662', '2', '38', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5663', '2', '38', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5664', '2', '38', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5665', '2', '38', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5666', '2', '38', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5667', '2', '38', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5668', '2', '38', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5669', '2', '38', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5670', '2', '38', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5672', '2', '38', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5673', '2', '38', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109074125675', '0', '2017-12-11 09:07:46');
INSERT INTO `bj_message_reminder` VALUES ('5674', '2', '38', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5675', '2', '38', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5676', '2', '38', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5677', '2', '38', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5678', '2', '38', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5679', '2', '38', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5680', '2', '38', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5681', '2', '38', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5682', '2', '38', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5683', '2', '38', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5684', '2', '38', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5686', '2', '38', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5687', '2', '38', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109085034095', '0', '2017-12-11 09:08:52');
INSERT INTO `bj_message_reminder` VALUES ('5688', '2', '38', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5689', '2', '38', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5690', '2', '38', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5691', '2', '38', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5692', '2', '38', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5693', '2', '38', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5694', '2', '38', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5695', '2', '38', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5696', '2', '38', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5697', '2', '38', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5698', '2', '38', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5700', '2', '38', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5701', '2', '38', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:15');
INSERT INTO `bj_message_reminder` VALUES ('5702', '2', '38', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5703', '2', '38', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5704', '2', '38', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5705', '2', '38', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5706', '2', '38', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5707', '2', '38', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5708', '2', '38', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5709', '2', '38', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5710', '2', '38', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5711', '2', '38', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5712', '2', '38', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5714', '2', '38', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5715', '2', '38', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/20171211091110968', '0', '2017-12-11 09:11:27');
INSERT INTO `bj_message_reminder` VALUES ('5716', '2', '38', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '1', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5717', '2', '38', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5718', '2', '38', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5719', '2', '38', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5720', '2', '38', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5721', '2', '38', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5722', '2', '38', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5723', '2', '38', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5724', '2', '38', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5725', '2', '38', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5726', '2', '38', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5728', '2', '38', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5729', '2', '38', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109124255496', '0', '2017-12-11 09:12:49');
INSERT INTO `bj_message_reminder` VALUES ('5730', '2', '38', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '1', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5731', '2', '38', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5732', '2', '38', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5733', '2', '38', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5734', '2', '38', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5735', '2', '38', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5736', '2', '38', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5737', '2', '38', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5738', '2', '38', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5739', '2', '38', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5740', '2', '38', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5742', '2', '38', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5743', '2', '38', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109134780207', '0', '2017-12-11 09:13:51');
INSERT INTO `bj_message_reminder` VALUES ('5744', '2', '68', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '1', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5745', '2', '68', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5746', '2', '68', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5747', '2', '68', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5748', '2', '68', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5749', '2', '68', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5750', '2', '68', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5751', '2', '68', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5752', '2', '68', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5753', '2', '68', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5754', '2', '68', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5756', '2', '68', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5757', '2', '68', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109202010694', '0', '2017-12-11 09:20:25');
INSERT INTO `bj_message_reminder` VALUES ('5758', '2', '68', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '1', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5759', '2', '68', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5760', '2', '68', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5761', '2', '68', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5762', '2', '68', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5763', '2', '68', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5764', '2', '68', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5765', '2', '68', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5766', '2', '68', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5767', '2', '68', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5768', '2', '68', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5770', '2', '68', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5771', '2', '68', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121109242657733', '0', '2017-12-11 09:24:30');
INSERT INTO `bj_message_reminder` VALUES ('5772', '2', '38', '56', '有客户找你咨询,请点击查看', 'http://192.168.0.252/Cqueryprice/201712111128579264/wid/56', '1', '2017-12-11 11:29:05');
INSERT INTO `bj_message_reminder` VALUES ('5773', '2', '68', '54', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5774', '2', '68', '56', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5775', '2', '68', '58', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5776', '2', '68', '61', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5777', '2', '68', '62', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5778', '2', '68', '63', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5779', '2', '68', '64', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5780', '2', '68', '65', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5781', '2', '68', '66', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5782', '2', '68', '69', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5783', '2', '68', '70', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5784', '2', '68', '71', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5785', '2', '68', '72', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5786', '2', '68', '74', '有客户发布订单，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:51:36');
INSERT INTO `bj_message_reminder` VALUES ('5787', '2', '71', '68', '您的订单已有师傅选择，请点击查看', '__PUBLICs__guestbook/201712111351326672', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5788', '2', '38', '54', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5789', '2', '38', '56', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5790', '2', '38', '58', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5791', '2', '38', '61', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5792', '2', '38', '62', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5793', '2', '38', '63', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5794', '2', '38', '64', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5795', '2', '38', '65', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5796', '2', '38', '66', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5797', '2', '38', '69', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5798', '2', '38', '70', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5799', '2', '38', '71', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5800', '2', '38', '72', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');
INSERT INTO `bj_message_reminder` VALUES ('5801', '2', '38', '74', '有客户发布订单，请点击查看', 'http://192.168.0.252/guestbook/2017121113521627105', '0', '2017-12-11 13:52:20');

-- ----------------------------
-- Table structure for bj_offer
-- ----------------------------
DROP TABLE IF EXISTS `bj_offer`;
CREATE TABLE `bj_offer` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `worker_id` int(10) DEFAULT NULL COMMENT '师傅ID ',
  `order_number` bigint(20) DEFAULT NULL COMMENT ' 订单号 ',
  `service_type_id` int(10) DEFAULT NULL COMMENT '服务类型 ',
  `l1_category_id` int(10) DEFAULT NULL COMMENT '一级类-类型ID 	',
  `l2_category_id` int(10) DEFAULT NULL COMMENT '二级类-类型ID 	',
  `tender_cost` float(10,2) DEFAULT NULL COMMENT ' 师傅报价 ',
  `contents` text COMMENT '师傅报价留言 ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=632 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_offer
-- ----------------------------
INSERT INTO `bj_offer` VALUES ('421', '45', '2017112408543841416', null, null, null, '50.00', null);
INSERT INTO `bj_offer` VALUES ('422', '49', '2017112410211434452', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('423', '40', '2017112415313785761', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('424', '45', '2017112509085618669', null, null, null, '20.00', null);
INSERT INTO `bj_offer` VALUES ('425', '40', '2017112411184314802', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('426', '45', '2017112509232014522', null, null, null, '11.00', null);
INSERT INTO `bj_offer` VALUES ('427', '45', '2017112509431626432', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('428', '45', '2017112509533466429', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('429', '45', '2017112510093541804', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('430', '45', '2017112510525831841', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('431', '39', '2017112511173869725', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('432', '45', '2017112511263563082', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('433', '45', '2017112516350994394', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('434', '45', '2017112710274482395', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('435', '45', '2017112711184885857', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('442', '45', '2017112715275774047', null, null, null, '1222.00', null);
INSERT INTO `bj_offer` VALUES ('445', '39', '2017112716144436829', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('446', '39', '2017112716144436829', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('447', '45', '2017112811150040810', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('449', '39', '2017112810432227537', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('450', '39', '2017112811482073980', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('451', '39', '2017112812480644220', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('452', '39', '2017112812480644220', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('453', '39', '2017112812570268277', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('454', '45', '2017112810365523171', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('455', '39', '2017112813220146036', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('456', '39', '2017112813220146036', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('457', '45', '2017112813383990948', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('458', '45', '2017112813500685476', null, null, null, '0.00', null);
INSERT INTO `bj_offer` VALUES ('459', '45', '2017112814263759771', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('460', '45', '2017112814575388463', null, null, null, '122.00', null);
INSERT INTO `bj_offer` VALUES ('461', '45', '2017112814575388463', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('462', '45', '2017112815034492286', null, null, null, '122.00', null);
INSERT INTO `bj_offer` VALUES ('463', '45', '2017112815302543797', null, null, null, '111.00', null);
INSERT INTO `bj_offer` VALUES ('464', '45', '2017112815415461013', null, null, null, '111.00', null);
INSERT INTO `bj_offer` VALUES ('465', '54', '2017112909454287007', null, null, null, '300.00', null);
INSERT INTO `bj_offer` VALUES ('466', '56', '2017112909421357950', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('467', '54', '2017112909421357950', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('468', '54', '2017112909171941598', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('469', '56', '2017112909454287007', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('470', '56', '2017112909171941598', null, null, null, '112.00', null);
INSERT INTO `bj_offer` VALUES ('471', '56', '2017112910514819870', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('472', '56', '20171129111252284', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('473', '56', '2017112911395059723', null, null, null, '15.00', null);
INSERT INTO `bj_offer` VALUES ('474', '54', '2017112914594117031', null, null, null, '60.00', null);
INSERT INTO `bj_offer` VALUES ('475', '54', '2017112914594117031', null, null, null, '50.00', null);
INSERT INTO `bj_offer` VALUES ('476', '56', '2017112914594117031', null, null, null, '11.00', null);
INSERT INTO `bj_offer` VALUES ('477', '56', '2017112914594117031', null, null, null, '32.00', null);
INSERT INTO `bj_offer` VALUES ('478', '56', '2017112916313048705', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('488', '54', '2017113010384762417', null, null, null, '12.10', null);
INSERT INTO `bj_offer` VALUES ('489', '54', '201711301126397422', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('490', '54', '2017113011372846658', '2', '3', '6', '10.00', null);
INSERT INTO `bj_offer` VALUES ('491', '56', '2017113011372846658', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('492', '56', '2017113011424597136', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('493', '56', '2017113011481191213', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('494', '56', '201711301159421004', null, null, null, '11.00', null);
INSERT INTO `bj_offer` VALUES ('495', '38', '201711301159421004', '2', '3', '3', '10.00', null);
INSERT INTO `bj_offer` VALUES ('496', '54', '2017113012321011430', '2', '3', '3', '10.00', null);
INSERT INTO `bj_offer` VALUES ('497', '54', '2017113012385472712', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('498', '54', '2017113012470296989', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('499', '56', '2017113013033195383', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('500', '56', '2017113013052837684', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('501', '56', '2017113013130146394', null, null, null, '42.00', null);
INSERT INTO `bj_offer` VALUES ('502', '56', '2017113013501692939', null, null, null, '11.00', null);
INSERT INTO `bj_offer` VALUES ('503', '56', '2017113014224550536', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('504', '56', '2017113014321275260', null, null, null, '11.00', null);
INSERT INTO `bj_offer` VALUES ('505', '56', '2017113014321275260', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('506', '56', '201711301525454878', null, null, null, '11.00', null);
INSERT INTO `bj_offer` VALUES ('507', '56', '2017113015583899567', '2', '6', '14', '11.00', null);
INSERT INTO `bj_offer` VALUES ('508', '56', '2017113016305890158', '2', '7', '14', '12.00', null);
INSERT INTO `bj_offer` VALUES ('509', '56', '2017113016305890158', '2', '7', '14', '32.00', null);
INSERT INTO `bj_offer` VALUES ('510', '56', '2017120109271043306', null, null, null, '21.00', null);
INSERT INTO `bj_offer` VALUES ('511', '56', '2017120109330834354', '2', '3', '3', '12.00', null);
INSERT INTO `bj_offer` VALUES ('512', '56', '2017120109330834354', '2', '3', '3', '12.00', null);
INSERT INTO `bj_offer` VALUES ('513', '56', '2017120110024541851', null, null, null, '11.00', null);
INSERT INTO `bj_offer` VALUES ('514', '56', '2017120110185824681', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('515', '56', '2017120113075380266', null, null, null, '550.00', null);
INSERT INTO `bj_offer` VALUES ('516', '66', '2017113014221735068', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('517', '56', '2017120114160672307', null, null, null, '820.00', null);
INSERT INTO `bj_offer` VALUES ('518', '66', '2017120114304972200', null, null, null, '11.00', null);
INSERT INTO `bj_offer` VALUES ('519', '56', '2017120115141087931', null, null, null, '500.00', null);
INSERT INTO `bj_offer` VALUES ('520', '56', '2017120115150584737', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('521', '56', '2017120115150584737', null, null, null, '20.00', null);
INSERT INTO `bj_offer` VALUES ('522', '56', '2017120115532827587', null, null, null, '500.00', null);
INSERT INTO `bj_offer` VALUES ('523', '56', '2017120115572959109', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('525', '56', '2017120116285014297', null, null, null, '200.00', null);
INSERT INTO `bj_offer` VALUES ('526', '56', '2017120209095172985', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('527', '56', '2017120214265421383', null, null, null, '58.00', null);
INSERT INTO `bj_offer` VALUES ('528', '54', '201712021445417976', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('529', '54', '2017120209113586708', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('530', '56', '2017120216512930687', null, null, null, '55.00', null);
INSERT INTO `bj_offer` VALUES ('531', '58', '2017120216512930687', null, null, null, '20.00', null);
INSERT INTO `bj_offer` VALUES ('532', '56', '2017120411285220992', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('535', '56', '2017120411531919301', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('536', '56', '2017120411531919301', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('537', '56', '2017120413303972014', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('538', '56', '201712041522263430', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('539', '56', '2017120415375447591', null, null, null, '450.00', null);
INSERT INTO `bj_offer` VALUES ('540', '56', '2017120515225933523', null, null, null, '500.00', null);
INSERT INTO `bj_offer` VALUES ('541', '54', '2017120516072586543', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('542', '56', '2017120516072586543', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('543', '71', '2017120521554014489', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('544', '54', '2017120609195928205', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('550', '56', '2017120609325174037', null, null, null, '5550.00', null);
INSERT INTO `bj_offer` VALUES ('551', '54', '2017120610071426823', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('552', '56', '2017120610151791539', '2', '3', '3', '12.00', null);
INSERT INTO `bj_offer` VALUES ('553', '56', '2017120610411351768', '2', '3', '3', '12.00', null);
INSERT INTO `bj_offer` VALUES ('554', '56', '2017120610103665747', null, null, null, '500.00', null);
INSERT INTO `bj_offer` VALUES ('555', '56', '2017120610572444847', '2', '3', '3', '11.00', null);
INSERT INTO `bj_offer` VALUES ('556', '56', '2017120611115555068', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('559', '56', '2017120611224420234', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('560', '56', '2017120611224420234', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('561', '56', '2017120613131853325', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('562', '56', '2017120613452146769', null, null, null, '28.00', null);
INSERT INTO `bj_offer` VALUES ('564', '56', '2017120617490419902', null, null, null, '66.00', null);
INSERT INTO `bj_offer` VALUES ('565', '56', '2017120709013668489', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('566', '56', '2017120709315646372', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('567', '56', '2017120709434985609', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('568', '56', '2017120710191382096', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('569', '56', '2017120710303544571', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('570', '56', '2017120711065424524', null, null, null, '12.00', null);
INSERT INTO `bj_offer` VALUES ('571', '54', '2017120711535519248', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('572', '54', '2017120711535519248', null, null, null, '410.00', null);
INSERT INTO `bj_offer` VALUES ('573', '54', '2017120713300542747', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('574', '71', '2017120713353343092', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('575', '71', '2017120713353343092', null, null, null, '20.00', null);
INSERT INTO `bj_offer` VALUES ('576', '71', '201712071339025423', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('577', '71', '201712071339025423', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('578', '56', '2017120713554972376', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('579', '56', '2017120714042672144', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('580', '56', '2017120714571447161', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('581', '56', '2017120715152036561', null, null, null, '35.00', null);
INSERT INTO `bj_offer` VALUES ('582', '56', '2017120715152036561', null, null, null, '40.00', null);
INSERT INTO `bj_offer` VALUES ('583', '71', '2017120715175745457', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('584', '71', '2017120715175745457', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('585', '54', '2017120715210898652', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('588', '54', '2017120716114513542', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('589', '54', '2017120716114513542', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('590', '71', '2017120716192963624', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('591', '56', '2017120808472682390', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('592', '71', '2017120808472682390', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('593', '54', '201712081029424529', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('594', '56', '2017120810422172947', null, null, null, '20.00', null);
INSERT INTO `bj_offer` VALUES ('595', '56', '2017120811103615280', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('596', '56', '2017120815093492223', null, null, null, '33.00', null);
INSERT INTO `bj_offer` VALUES ('599', '71', '2017120815522452692', null, null, null, '15.00', null);
INSERT INTO `bj_offer` VALUES ('600', '56', '2017120815510325171', null, null, null, '50.00', null);
INSERT INTO `bj_offer` VALUES ('601', '56', '2017120815510325171', null, null, null, '50.00', null);
INSERT INTO `bj_offer` VALUES ('610', '71', '2017120816552463170', null, null, null, '15.00', null);
INSERT INTO `bj_offer` VALUES ('611', '71', '2017120816552463170', null, null, null, '16.00', null);
INSERT INTO `bj_offer` VALUES ('613', '56', '2017120817282688443', null, null, null, '18.15', null);
INSERT INTO `bj_offer` VALUES ('614', '56', '2017120909255694657', null, null, null, '50.00', null);
INSERT INTO `bj_offer` VALUES ('615', '56', '2017120909255694657', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('616', '56', '2017120914224351341', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('617', '56', '2017120914224351341', null, null, null, '20.00', null);
INSERT INTO `bj_offer` VALUES ('618', '56', '2017120914333128164', null, null, null, '100.00', null);
INSERT INTO `bj_offer` VALUES ('619', '56', '2017120914370562104', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('620', '56', '2017120914532598604', null, null, null, '25.00', null);
INSERT INTO `bj_offer` VALUES ('621', '56', '2017120914532598604', null, null, null, '36.00', null);
INSERT INTO `bj_offer` VALUES ('622', '56', '20171209151955304', null, null, null, '99.00', null);
INSERT INTO `bj_offer` VALUES ('623', '54', '20171209151955304', null, null, null, '1000.00', null);
INSERT INTO `bj_offer` VALUES ('624', '58', '2017120915514129422', null, null, null, '2220.00', null);
INSERT INTO `bj_offer` VALUES ('625', '58', '2017120915103053789', null, null, null, '22.00', null);
INSERT INTO `bj_offer` VALUES ('626', '56', '2017120915514129422', null, null, null, '200.00', null);
INSERT INTO `bj_offer` VALUES ('627', '71', '201712091600358632', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('628', '54', '2017120916074029388', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('629', '71', '2017121108443384565', null, null, null, '555.00', null);
INSERT INTO `bj_offer` VALUES ('630', '56', '201712111128579264', null, null, null, '10.00', null);
INSERT INTO `bj_offer` VALUES ('631', '71', '201712111351326672', null, null, null, '10.00', null);

-- ----------------------------
-- Table structure for bj_offer_total
-- ----------------------------
DROP TABLE IF EXISTS `bj_offer_total`;
CREATE TABLE `bj_offer_total` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `worker_id` int(10) DEFAULT NULL,
  `order_number` bigint(20) DEFAULT NULL COMMENT '订单号 ',
  `is_rob` tinyint(1) DEFAULT '0' COMMENT '师傅是否抢单：1是0否',
  `totals` float(10,2) DEFAULT NULL COMMENT '项目费用加税费和平台服务费',
  `gettime` tinyint(1) DEFAULT '0' COMMENT '咨询时，师傅是否确定时间',
  `project_time` int(10) DEFAULT NULL COMMENT '咨询时，师傅确定施工时间',
  `message` text COMMENT '师傅抢单留言',
  `amount_engineer` float(10,2) DEFAULT NULL COMMENT ' 订单总价 ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=547 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_offer_total
-- ----------------------------
INSERT INTO `bj_offer_total` VALUES ('370', '45', '2017112408543841416', '1', '60.50', '0', null, '嗯嗯', '50.00');
INSERT INTO `bj_offer_total` VALUES ('371', '49', '2017112410211434452', '1', '0.00', '0', null, '', '0.00');
INSERT INTO `bj_offer_total` VALUES ('372', '40', '2017112415313785761', '1', '0.00', '0', null, '', '0.00');
INSERT INTO `bj_offer_total` VALUES ('373', '45', '2017112509085618669', '1', '24.20', '0', null, '大是大非', '20.00');
INSERT INTO `bj_offer_total` VALUES ('374', '40', '2017112411184314802', '1', '121.00', '0', null, '', '100.00');
INSERT INTO `bj_offer_total` VALUES ('375', '45', '2017112509232014522', '1', '13.31', '0', null, '11', '11.00');
INSERT INTO `bj_offer_total` VALUES ('376', '45', '2017112509431626432', '1', '0.00', '0', null, '12', '0.00');
INSERT INTO `bj_offer_total` VALUES ('377', '45', '2017112509533466429', '1', '0.00', '0', null, '12', '0.00');
INSERT INTO `bj_offer_total` VALUES ('378', '45', '2017112510093541804', '1', '0.00', '0', null, '12', '0.00');
INSERT INTO `bj_offer_total` VALUES ('379', '45', '2017112510525831841', '1', '0.00', '0', null, '2', '0.00');
INSERT INTO `bj_offer_total` VALUES ('380', '39', '2017112511173869725', '1', '12.10', '0', null, '10', '10.00');
INSERT INTO `bj_offer_total` VALUES ('381', '45', '2017112511263563082', '1', '0.00', '0', null, '12', '0.00');
INSERT INTO `bj_offer_total` VALUES ('382', '45', '2017112516350994394', '1', '0.00', '0', null, '112', '0.00');
INSERT INTO `bj_offer_total` VALUES ('383', '45', '2017112710274482395', '1', '0.00', '0', null, '', '0.00');
INSERT INTO `bj_offer_total` VALUES ('384', '45', '2017112711184885857', '1', '0.00', '0', null, '11', '0.00');
INSERT INTO `bj_offer_total` VALUES ('388', '45', '2017112715275774047', '1', '1478.62', '0', null, '12', '1222.00');
INSERT INTO `bj_offer_total` VALUES ('390', '39', '2017112716144436829', '0', '24.20', '1', null, null, '20.00');
INSERT INTO `bj_offer_total` VALUES ('391', '45', '2017112811150040810', '1', '0.00', '0', null, '', '0.00');
INSERT INTO `bj_offer_total` VALUES ('393', '39', '2017112810432227537', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('394', '39', '2017112811482073980', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('395', '39', '2017112812480644220', '0', '24.20', '1', null, null, '20.00');
INSERT INTO `bj_offer_total` VALUES ('396', '39', '2017112812570268277', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('397', '45', '2017112810365523171', '1', '0.00', '0', null, '', '0.00');
INSERT INTO `bj_offer_total` VALUES ('398', '39', '2017112813220146036', '0', '24.20', '1', null, null, '20.00');
INSERT INTO `bj_offer_total` VALUES ('399', '45', '2017112813383990948', '1', '0.00', '0', null, '', '0.00');
INSERT INTO `bj_offer_total` VALUES ('400', '45', '2017112813500685476', '1', '0.00', '0', null, '', '0.00');
INSERT INTO `bj_offer_total` VALUES ('401', '45', '2017112814263759771', '1', '121.00', '0', null, 'asd asd ', '100.00');
INSERT INTO `bj_offer_total` VALUES ('402', '45', '2017112814575388463', '1', '174.24', '0', null, '1', '144.00');
INSERT INTO `bj_offer_total` VALUES ('403', '45', '2017112815034492286', '0', '147.62', '1', null, null, '122.00');
INSERT INTO `bj_offer_total` VALUES ('404', '45', '2017112815302543797', '0', '134.31', '1', null, null, '111.00');
INSERT INTO `bj_offer_total` VALUES ('405', '45', '2017112815415461013', '1', '134.31', '0', null, '', '111.00');
INSERT INTO `bj_offer_total` VALUES ('406', '54', '2017112909454287007', '1', '363.00', '0', null, '认真完成任务', '300.00');
INSERT INTO `bj_offer_total` VALUES ('407', '56', '2017112909421357950', '1', '14.52', '0', null, '很棒', '12.00');
INSERT INTO `bj_offer_total` VALUES ('408', '54', '2017112909421357950', '1', '26.62', '0', null, '', '22.00');
INSERT INTO `bj_offer_total` VALUES ('409', '54', '2017112909171941598', '1', '26.62', '0', null, '', '22.00');
INSERT INTO `bj_offer_total` VALUES ('410', '56', '2017112909454287007', '1', '26.62', '0', null, '', '22.00');
INSERT INTO `bj_offer_total` VALUES ('411', '56', '2017112909171941598', '1', '135.52', '0', null, '12', '112.00');
INSERT INTO `bj_offer_total` VALUES ('412', '56', '2017112910514819870', '0', '26.62', '1', null, null, '22.00');
INSERT INTO `bj_offer_total` VALUES ('413', '56', '20171129111252284', '1', '26.62', '0', null, '敏', '22.00');
INSERT INTO `bj_offer_total` VALUES ('414', '56', '2017112911395059723', '0', '18.15', '1', null, null, '15.00');
INSERT INTO `bj_offer_total` VALUES ('415', '54', '2017112914594117031', '1', '133.10', '0', null, '认真完成任务', '110.00');
INSERT INTO `bj_offer_total` VALUES ('416', '56', '2017112914594117031', '1', '52.03', '0', null, '7', '43.00');
INSERT INTO `bj_offer_total` VALUES ('417', '56', '2017112916313048705', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('427', '54', '2017113010384762417', '0', '12.10', '1', '1512009240', null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('428', '54', '201711301126397422', '1', '121.00', '0', null, '10', '100.00');
INSERT INTO `bj_offer_total` VALUES ('429', '54', '2017113011372846658', '1', '12.10', '0', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('430', '56', '2017113011372846658', '1', '26.62', '0', null, '', '22.00');
INSERT INTO `bj_offer_total` VALUES ('431', '56', '2017113011424597136', '1', '26.62', '0', null, '33', '22.00');
INSERT INTO `bj_offer_total` VALUES ('432', '56', '2017113011481191213', '1', '14.52', '0', null, '', '12.00');
INSERT INTO `bj_offer_total` VALUES ('433', '56', '201711301159421004', '1', '13.31', '0', null, '', '11.00');
INSERT INTO `bj_offer_total` VALUES ('434', '38', '201711301159421004', '1', '11.80', '0', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('435', '54', '2017113012321011430', '1', '12.10', '0', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('436', '54', '2017113012385472712', '1', '121.00', '0', null, '10', '100.00');
INSERT INTO `bj_offer_total` VALUES ('437', '54', '2017113012470296989', '1', '121.00', '0', null, '10', '100.00');
INSERT INTO `bj_offer_total` VALUES ('438', '56', '2017113013033195383', '1', '14.52', '0', null, '', '12.00');
INSERT INTO `bj_offer_total` VALUES ('439', '56', '2017113013052837684', '1', '14.52', '0', null, '11', '12.00');
INSERT INTO `bj_offer_total` VALUES ('440', '56', '2017113013130146394', '1', '50.82', '0', null, '', '42.00');
INSERT INTO `bj_offer_total` VALUES ('441', '56', '2017113013501692939', '1', '13.31', '0', null, '', '11.00');
INSERT INTO `bj_offer_total` VALUES ('442', '56', '2017113014224550536', '1', '121.00', '0', null, '10', '100.00');
INSERT INTO `bj_offer_total` VALUES ('443', '56', '2017113014321275260', '1', '27.83', '0', null, '', '23.00');
INSERT INTO `bj_offer_total` VALUES ('444', '56', '201711301525454878', '1', '13.31', '0', null, '', '11.00');
INSERT INTO `bj_offer_total` VALUES ('445', '56', '2017113015583899567', '1', '13.31', '0', null, null, '11.00');
INSERT INTO `bj_offer_total` VALUES ('446', '56', '2017113016305890158', '1', '53.24', '0', null, null, '44.00');
INSERT INTO `bj_offer_total` VALUES ('447', '56', '2017120109271043306', '1', '25.41', '0', null, '1', '21.00');
INSERT INTO `bj_offer_total` VALUES ('448', '56', '2017120109330834354', '1', '29.04', '0', null, null, '24.00');
INSERT INTO `bj_offer_total` VALUES ('449', '56', '2017120110024541851', '1', '13.31', '0', null, '哈哈', '11.00');
INSERT INTO `bj_offer_total` VALUES ('450', '56', '2017120110185824681', '1', '12.10', '0', null, '', '10.00');
INSERT INTO `bj_offer_total` VALUES ('451', '56', '2017120113075380266', '1', '665.50', '0', null, '', '550.00');
INSERT INTO `bj_offer_total` VALUES ('452', '66', '2017113014221735068', '1', '12.10', '0', null, '', '10.00');
INSERT INTO `bj_offer_total` VALUES ('453', '56', '2017120114160672307', '1', '992.20', '0', null, '你好我住的地方离商场比较远需要追加车费20元.', '820.00');
INSERT INTO `bj_offer_total` VALUES ('454', '66', '2017120114304972200', '1', '13.31', '0', null, '', '11.00');
INSERT INTO `bj_offer_total` VALUES ('455', '56', '2017120115141087931', '0', '605.00', '1', null, null, '500.00');
INSERT INTO `bj_offer_total` VALUES ('456', '56', '2017120115150584737', '1', '36.30', '0', null, '44', '30.00');
INSERT INTO `bj_offer_total` VALUES ('457', '56', '2017120115532827587', '0', '605.00', '1', null, null, '500.00');
INSERT INTO `bj_offer_total` VALUES ('458', '56', '2017120115572959109', '1', '12.10', '0', null, '11', '10.00');
INSERT INTO `bj_offer_total` VALUES ('460', '56', '2017120116285014297', '0', '242.00', '1', null, null, '200.00');
INSERT INTO `bj_offer_total` VALUES ('461', '56', '2017120209095172985', '1', '12.10', '0', null, '', '10.00');
INSERT INTO `bj_offer_total` VALUES ('462', '56', '2017120214265421383', '1', '70.18', '0', null, '11', '58.00');
INSERT INTO `bj_offer_total` VALUES ('463', '54', '201712021445417976', '1', '121.00', '0', null, '10', '100.00');
INSERT INTO `bj_offer_total` VALUES ('464', '54', '2017120209113586708', '1', '121.00', '0', null, '10', '100.00');
INSERT INTO `bj_offer_total` VALUES ('465', '56', '2017120216512930687', '1', '66.55', '0', null, '15', '55.00');
INSERT INTO `bj_offer_total` VALUES ('466', '58', '2017120216512930687', '1', '24.20', '0', null, '', '20.00');
INSERT INTO `bj_offer_total` VALUES ('467', '56', '2017120411285220992', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('469', '56', '2017120411531919301', '0', '24.20', '1', null, null, '20.00');
INSERT INTO `bj_offer_total` VALUES ('470', '56', '2017120413303972014', '1', '14.52', '0', null, '1212', '12.00');
INSERT INTO `bj_offer_total` VALUES ('471', '56', '201712041522263430', '1', '14.52', '0', null, '', '12.00');
INSERT INTO `bj_offer_total` VALUES ('472', '56', '2017120415375447591', '1', '544.50', '0', null, '', '450.00');
INSERT INTO `bj_offer_total` VALUES ('473', '56', '2017120515225933523', '1', '605.00', '0', null, '', '500.00');
INSERT INTO `bj_offer_total` VALUES ('474', '54', '2017120516072586543', '1', '12.10', '0', null, '10', '10.00');
INSERT INTO `bj_offer_total` VALUES ('475', '56', '2017120516072586543', '1', '12.10', '0', null, '', '10.00');
INSERT INTO `bj_offer_total` VALUES ('476', '71', '2017120521554014489', '1', '14.52', '0', null, '', '12.00');
INSERT INTO `bj_offer_total` VALUES ('477', '54', '2017120609195928205', '1', '12.10', '0', null, '', '10.00');
INSERT INTO `bj_offer_total` VALUES ('483', '56', '2017120609325174037', '0', '6715.50', '1', null, null, '5550.00');
INSERT INTO `bj_offer_total` VALUES ('484', '54', '2017120610071426823', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('485', '56', '2017120610151791539', '1', '14.52', '0', null, null, '12.00');
INSERT INTO `bj_offer_total` VALUES ('486', '56', '2017120610411351768', '1', '14.52', '0', null, null, '12.00');
INSERT INTO `bj_offer_total` VALUES ('487', '56', '2017120610103665747', '1', '605.00', '0', null, '很好', '500.00');
INSERT INTO `bj_offer_total` VALUES ('488', '56', '2017120610572444847', '1', '13.31', '0', null, null, '11.00');
INSERT INTO `bj_offer_total` VALUES ('489', '56', '2017120611115555068', '1', '121.00', '0', null, '哈哈', '100.00');
INSERT INTO `bj_offer_total` VALUES ('491', '56', '2017120611224420234', '0', '24.20', '1', null, null, '20.00');
INSERT INTO `bj_offer_total` VALUES ('492', '56', '2017120613131853325', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('493', '56', '2017120613452146769', '1', '33.88', '0', null, '哈哈', '28.00');
INSERT INTO `bj_offer_total` VALUES ('495', '56', '2017120617490419902', '0', '79.86', '1', null, null, '66.00');
INSERT INTO `bj_offer_total` VALUES ('496', '56', '2017120709013668489', '1', '12.10', '0', null, '啊啊啊', '10.00');
INSERT INTO `bj_offer_total` VALUES ('497', '56', '2017120709315646372', '1', '14.52', '0', null, '哈哈', '12.00');
INSERT INTO `bj_offer_total` VALUES ('498', '56', '2017120709434985609', '1', '12.10', '0', null, '哦哦哦', '10.00');
INSERT INTO `bj_offer_total` VALUES ('499', '56', '2017120710191382096', '1', '14.52', '0', null, '12', '12.00');
INSERT INTO `bj_offer_total` VALUES ('500', '56', '2017120710303544571', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('501', '56', '2017120711065424524', '1', '14.52', '0', null, '', '12.00');
INSERT INTO `bj_offer_total` VALUES ('502', '54', '2017120711535519248', '0', '617.10', '1', null, null, '510.00');
INSERT INTO `bj_offer_total` VALUES ('503', '54', '2017120713300542747', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('504', '71', '2017120713353343092', '1', '36.30', '0', null, '', '30.00');
INSERT INTO `bj_offer_total` VALUES ('505', '71', '201712071339025423', '1', '24.20', '0', null, '', '20.00');
INSERT INTO `bj_offer_total` VALUES ('506', '56', '2017120713554972376', '1', '12.10', '0', null, '哈哈', '10.00');
INSERT INTO `bj_offer_total` VALUES ('507', '56', '2017120714042672144', '1', '26.62', '0', null, '12', '22.00');
INSERT INTO `bj_offer_total` VALUES ('508', '56', '2017120714571447161', '0', '121.00', '1', null, null, '100.00');
INSERT INTO `bj_offer_total` VALUES ('509', '56', '2017120715152036561', '1', '90.75', '0', null, '哈哈', '75.00');
INSERT INTO `bj_offer_total` VALUES ('510', '71', '2017120715175745457', '0', '24.20', '1', null, null, '20.00');
INSERT INTO `bj_offer_total` VALUES ('511', '54', '2017120715210898652', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('513', '54', '2017120716114513542', '0', '24.20', '1', null, null, '20.00');
INSERT INTO `bj_offer_total` VALUES ('514', '71', '2017120716192963624', '1', '12.10', '0', null, '', '10.00');
INSERT INTO `bj_offer_total` VALUES ('515', '56', '2017120808472682390', '1', '26.62', '0', null, '的', '22.00');
INSERT INTO `bj_offer_total` VALUES ('516', '71', '2017120808472682390', '1', '12.10', '0', null, '', '10.00');
INSERT INTO `bj_offer_total` VALUES ('517', '54', '201712081029424529', '1', '12.10', '0', null, '10', '10.00');
INSERT INTO `bj_offer_total` VALUES ('518', '56', '2017120810422172947', '0', '24.20', '1', null, null, '20.00');
INSERT INTO `bj_offer_total` VALUES ('519', '56', '2017120811103615280', '1', '121.00', '0', null, '哈哈', '100.00');
INSERT INTO `bj_offer_total` VALUES ('520', '56', '2017120815093492223', '1', '39.93', '0', null, '', '33.00');
INSERT INTO `bj_offer_total` VALUES ('523', '71', '2017120815522452692', '0', '18.15', '1', null, null, '15.00');
INSERT INTO `bj_offer_total` VALUES ('524', '56', '2017120815510325171', '1', '121.00', '0', null, '哈哈', '100.00');
INSERT INTO `bj_offer_total` VALUES ('529', '71', '2017120816552463170', '0', '37.51', '1', null, null, '31.00');
INSERT INTO `bj_offer_total` VALUES ('531', '56', '2017120817282688443', '0', '21.96', '1', null, null, '18.15');
INSERT INTO `bj_offer_total` VALUES ('532', '56', '2017120909255694657', '1', '181.50', '0', null, '嗯嗯，可以', '150.00');
INSERT INTO `bj_offer_total` VALUES ('533', '56', '2017120914224351341', '1', '36.30', '0', null, '还拿', '30.00');
INSERT INTO `bj_offer_total` VALUES ('534', '56', '2017120914333128164', '1', '121.00', '0', null, 'ha ha', '100.00');
INSERT INTO `bj_offer_total` VALUES ('535', '56', '2017120914370562104', '1', '12.10', '0', null, '', '10.00');
INSERT INTO `bj_offer_total` VALUES ('536', '56', '2017120914532598604', '0', '73.81', '1', null, null, '61.00');
INSERT INTO `bj_offer_total` VALUES ('537', '56', '20171209151955304', '1', '119.79', '0', null, '', '99.00');
INSERT INTO `bj_offer_total` VALUES ('538', '54', '20171209151955304', '1', '1210.00', '0', null, '', '1000.00');
INSERT INTO `bj_offer_total` VALUES ('539', '58', '2017120915514129422', '1', '2686.20', '0', null, '', '2220.00');
INSERT INTO `bj_offer_total` VALUES ('540', '58', '2017120915103053789', '1', '26.62', '0', null, '', '22.00');
INSERT INTO `bj_offer_total` VALUES ('541', '56', '2017120915514129422', '1', '242.00', '0', null, '', '200.00');
INSERT INTO `bj_offer_total` VALUES ('542', '71', '201712091600358632', '1', '12.10', '0', null, '', '10.00');
INSERT INTO `bj_offer_total` VALUES ('543', '54', '2017120916074029388', '1', '12.10', '0', null, '10', '10.00');
INSERT INTO `bj_offer_total` VALUES ('544', '71', '2017121108443384565', '1', '671.55', '0', null, '', '555.00');
INSERT INTO `bj_offer_total` VALUES ('545', '56', '201712111128579264', '0', '12.10', '1', null, null, '10.00');
INSERT INTO `bj_offer_total` VALUES ('546', '71', '201712111351326672', '1', '12.10', '0', null, '', '10.00');

-- ----------------------------
-- Table structure for bj_orders
-- ----------------------------
DROP TABLE IF EXISTS `bj_orders`;
CREATE TABLE `bj_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_number` varchar(255) DEFAULT NULL,
  `owner_id` int(11) NOT NULL COMMENT '订单创建者ID',
  `worker_id` int(11) DEFAULT '0' COMMENT '师傅ID',
  `service_type_id` tinyint(4) DEFAULT '0' COMMENT '服务类别 1安装 2维修 3品质监理 4勘测 5更换灯片 6围板搭建',
  `l1_category_id` int(4) DEFAULT NULL COMMENT '商品大类',
  `owner_name` varchar(30) DEFAULT NULL COMMENT '发布订单者姓名称呼',
  `full_location` varchar(255) NOT NULL COMMENT '施工目标位置',
  `location_ext` varchar(255) DEFAULT NULL COMMENT '具体位置补充说明，如路名、楼栋、门牌号、等具体位置说明',
  `contact_name` varchar(30) DEFAULT NULL COMMENT '联系人姓名',
  `contact_phone` varchar(11) DEFAULT NULL COMMENT '联系人手机',
  `step_type` tinyint(1) DEFAULT NULL COMMENT '步骤类型对应ID',
  `step_number` tinyint(1) DEFAULT NULL COMMENT '到达步骤数',
  `work_step_service` tinyint(1) DEFAULT NULL COMMENT '师傅步骤对应ID',
  `work_step_number` tinyint(1) DEFAULT NULL COMMENT '师傅到达步骤数',
  `work_sign` tinyint(1) DEFAULT '0' COMMENT '师傅签到：0未签到1签到',
  `work_sign_position` varchar(32) DEFAULT NULL COMMENT '师傅签到位置信息',
  `work_sign_out` tinyint(1) DEFAULT '0' COMMENT '师傅签退：0未签退1已签退',
  `work_sign_outposition` varchar(32) DEFAULT NULL COMMENT '师傅签退位置信息',
  `start_time` int(11) DEFAULT NULL COMMENT '开始时间',
  `end_time` int(11) DEFAULT NULL COMMENT '结束时间',
  `amount_budget` decimal(11,2) DEFAULT '0.00' COMMENT '预算总费用',
  `amount_consulting` decimal(11,2) DEFAULT '20.00' COMMENT '咨询费',
  `order_time` int(10) DEFAULT NULL COMMENT '师傅和和客户沟通后最终确认时间',
  `num` int(3) DEFAULT NULL COMMENT '需要普通师傅个数',
  `pay` tinyint(1) DEFAULT '0' COMMENT '是否支付咨询费 0 否 1是 ',
  `amount_imprest` decimal(11,2) DEFAULT '0.00' COMMENT '预付款',
  `reason` varchar(50) DEFAULT NULL COMMENT '电话不同的原因 ',
  `amount_survey` decimal(11,2) DEFAULT NULL COMMENT '核单费用',
  `ampunt_addition` decimal(10,2) DEFAULT NULL COMMENT '追加费用',
  `amput_content` varchar(255) DEFAULT NULL COMMENT '追加留言理由',
  `amount_engineer` decimal(11,2) DEFAULT NULL COMMENT '订单实际工程金额 ',
  `amount_urgent` decimal(11,2) DEFAULT '0.00' COMMENT '加急费用',
  `amount_actual` decimal(11,2) DEFAULT '0.00' COMMENT '订单实际工程金额',
  `amount_total` decimal(11,2) DEFAULT '0.00' COMMENT '订单总费用 = 咨询费+核单费+施工费用',
  `tax_rate` decimal(6,2) DEFAULT '0.06' COMMENT '税率',
  `platform_service` float(6,2) DEFAULT '0.15' COMMENT '没交保证金平台服务收费比例 ',
  `g_platform_service` float(6,2) DEFAULT '0.12' COMMENT '交完保证金之后的平台服务费',
  `monthly_service` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否使用平台月结服务: 0否 1是',
  `is_bomb` tinyint(1) NOT NULL DEFAULT '0' COMMENT '使用使用核单：0未使用1使用',
  `monthly_service_status` tinyint(4) DEFAULT '0' COMMENT '月结订单状态 0未结清 1已结清',
  `post_views` int(11) DEFAULT '0' COMMENT '阅读量',
  `favorite` int(11) DEFAULT '0' COMMENT '感兴趣数 喜欢数 ',
  `is_invitation` tinyint(1) DEFAULT '0' COMMENT '是否招标项目 0否 1是',
  `master_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '订单状态 0初始订单(信息尚未完善）  1待定标 2待付款 3待完工 4待验收 5待评价 6追加评价 7交易完成  8订单关闭',
  `status` tinyint(8) NOT NULL DEFAULT '0' COMMENT '订单状态 0初始订单(信息尚未完善）  1待定标 2待付款 3待完工 4待验收 5待评价 6追加评价 7交易完成  8订单关闭',
  `judge` tinyint(1) DEFAULT '0' COMMENT '判断所有项目咨询还是直接下单 1 直接下单 0 咨询下单',
  `is_del` tinyint(1) DEFAULT '0' COMMENT '伪删除',
  `work_del` tinyint(1) DEFAULT '0' COMMENT '师傅伪删除',
  `is_zhui` tinyint(1) DEFAULT '0' COMMENT '是否追加项目 0没有追加 1追加',
  `fapiao` tinyint(1) DEFAULT '0' COMMENT '是否开票 0 未开票  1已开票',
  `is_fapiao` tinyint(1) DEFAULT '0' COMMENT '是否提交申请发票 0 未提交 1已提交',
  `is_rob` tinyint(1) DEFAULT '0' COMMENT '师傅是否抢单：0否1是',
  `querenma` int(6) NOT NULL COMMENT '服务确认码！',
  `rob_num` int(10) DEFAULT '0' COMMENT '师傅抢单数量',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING HASH COMMENT 'id 索引',
  UNIQUE KEY `order_number` (`order_number`) USING HASH COMMENT '订单号唯一索引',
  KEY `owner_id` (`owner_id`) USING HASH,
  KEY `worker_id` (`worker_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1103 DEFAULT CHARSET=utf8 COMMENT='订单主表,四种类型的订单都包含该表中字段';

-- ----------------------------
-- Records of bj_orders
-- ----------------------------
INSERT INTO `bj_orders` VALUES ('1071', '2017120914370562104', '68', '56', '2', '5', '秋寒', '江苏省苏州市昆山市', '中寰广场', '刷个', '18686663624', '1', '9', '1', '10', '1', '江苏省苏州市昆山市<br>昆山市花桥中寰广场(兆丰路地铁站西)', '1', '江苏省苏州市昆山市<br>昆山市中寰广场办公楼(兆丰路地铁站西)', '1512801360', '1512802167', '0.00', '20.00', '1512801480', null, '0', '0.00', null, null, null, null, '12.10', '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '1', '7', '7', '1', '0', '0', '0', '1', '1', '0', '791143', '1', '1512801425', null);
INSERT INTO `bj_orders` VALUES ('1072', '2017120914531532735', '68', '56', '2', '6', '秋寒', '江苏省淮安市清浦区', '111', '刷个', '18686663624', '2', '3', '2', '3', '0', null, '0', null, '1512802320', null, '0.00', '20.00', null, '1', '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '1512802395', null);
INSERT INTO `bj_orders` VALUES ('1073', '2017120914532598604', '68', '56', '2', '6', '秋寒', '江苏省苏州市昆山市', '中寰广场', '刷个', '18686663624', '2', '7', '2', '7', '1', '江苏省苏州市昆山市<br>昆山市花桥中寰广场(兆丰路地铁站西)', '0', null, '1512802320', null, '0.00', '20.00', '1512802740', '1', '0', '0.00', '', null, null, null, '0.00', '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '1', '3', '3', '2', '0', '0', '0', '1', '1', '0', '173876', '0', '1512802395', null);
INSERT INTO `bj_orders` VALUES ('1074', '2017120915010555841', '59', '0', '2', '3', '周春林', '上海上海市黄浦区', '南京西路10000号', '周春林', '13764840087', '1', '3', '1', null, '0', null, '0', null, '1510117140', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512802865', null);
INSERT INTO `bj_orders` VALUES ('1075', '2017120915103053789', '59', '0', '2', '4', '周春林', '北京北京市东城区', '墨鱼路嘿嘿嘿', '刘臣', '12345678900', '1', '3', '1', null, '0', null, '0', null, '1512803400', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1512803430', null);
INSERT INTO `bj_orders` VALUES ('1076', '20171209151955304', '59', '56', '2', '5', '周春林', '江苏省苏州市昆山市', '中寰广场', '刘臣', '12345678900', '1', '7', '1', '4', '1', '江苏省苏州市昆山市<br>昆山市花桥中寰广场(兆丰路地铁站西)', '0', null, '1507533540', null, '0.00', '20.00', '1512806280', null, '0', '0.00', null, null, null, null, '119.79', '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '1', '3', '3', '1', '0', '0', '0', '0', '0', '0', '843564', '2', '1512803995', null);
INSERT INTO `bj_orders` VALUES ('1077', '2017120915235078017', '38', '0', '2', '4', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '1', '3', '1', null, '0', null, '0', null, '1512804180', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512804230', null);
INSERT INTO `bj_orders` VALUES ('1078', '2017120915402065171', '38', '56', '2', '3', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '2', '3', '2', '1', '0', null, '0', null, '1512805200', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '1512805220', null);
INSERT INTO `bj_orders` VALUES ('1079', '2017120915442337391', '38', '54', '2', '7', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '2', '3', '2', '1', '0', null, '0', null, '1512805440', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '1512805463', null);
INSERT INTO `bj_orders` VALUES ('1080', '2017120915514129422', '59', '58', '2', '5', '周春林', '江苏省苏州市昆山市', '中寰广场', '刘臣', '12345678900', '1', '7', '1', '5', '1', '江苏省苏州市昆山市<br>昆山市花桥中寰广场(兆丰路地铁站西)', '0', null, '1496994660', null, '0.00', '20.00', '1512813780', null, '0', '0.00', null, null, null, null, '2686.20', '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '1', '3', '3', '1', '0', '0', '0', '0', '0', '0', '535755', '2', '1512805901', null);
INSERT INTO `bj_orders` VALUES ('1081', '201712091600358632', '68', '71', '2', '6', '秋寒', '江苏省苏州市昆山市', '中寰广场', '刷个', '18686663624', '1', '5', '1', '1', '0', null, '0', null, '1512806400', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, '12.10', '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '1', '2', '2', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1512806435', null);
INSERT INTO `bj_orders` VALUES ('1082', '2017120916012760339', '68', '0', '2', '6', '秋寒', '江苏省苏州市昆山市', '中寰广场', '刷个', '18686663624', '1', '3', '1', null, '0', null, '0', null, '1512806460', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512806487', null);
INSERT INTO `bj_orders` VALUES ('1083', '2017120916074029388', '38', '54', '2', '6', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '1', '6', '1', '3', '0', null, '0', null, '1512813900', null, '0.00', '20.00', '1512807120', null, '0', '0.00', null, null, null, null, '12.10', '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '1', '3', '3', '1', '0', '0', '0', '0', '0', '0', '774723', '1', '1512806860', null);
INSERT INTO `bj_orders` VALUES ('1084', '2017120917141663278', '38', '0', '2', '3', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '2', '2', '2', null, '0', null, '0', null, '1512810840', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '1512810856', null);
INSERT INTO `bj_orders` VALUES ('1085', '2017120917262914688', '38', '0', '2', '4', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '1', '2', '1', null, '0', null, '0', null, '1512811560', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512811589', null);
INSERT INTO `bj_orders` VALUES ('1086', '2017121108443384565', '68', '0', '2', '7', '秋寒', '江苏省淮安市清浦区', '111', '刷个', '18686663624', '1', '4', '1', null, '0', null, '0', null, '1512953100', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1512953073', null);
INSERT INTO `bj_orders` VALUES ('1087', '2017121108463156524', '47', '0', '2', '3', '客户_gidtnn', '北京北京市东城区', '第三方', '刘邦建', '15550161208', '1', '4', '1', null, '0', null, '0', null, '1512953100', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512953191', null);
INSERT INTO `bj_orders` VALUES ('1088', '201712110848593463', '38', '0', '2', '5', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '1', '2', '1', null, '0', null, '0', null, '1514681280', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512953339', null);
INSERT INTO `bj_orders` VALUES ('1089', '2017121108522047570', '68', '56', '2', '4', '秋寒', '江苏省苏州市昆山市', '花安路', '一叶之秋', '18686663624', '2', '3', '2', '1', '0', null, '0', null, '1512953580', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '1512953540', null);
INSERT INTO `bj_orders` VALUES ('1090', '2017121109074125675', '38', '0', '2', '5', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '1', '3', '1', null, '0', null, '0', null, '1512954420', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512954461', null);
INSERT INTO `bj_orders` VALUES ('1091', '2017121109085034095', '38', '0', '2', '5', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '1', '3', '1', null, '0', null, '0', null, '1512954480', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512954530', null);
INSERT INTO `bj_orders` VALUES ('1092', '20171211091110968', '38', '0', '2', '4', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '1', '4', '1', null, '0', null, '0', null, '1512954600', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512954670', null);
INSERT INTO `bj_orders` VALUES ('1093', '2017121109124255496', '38', '0', '2', '4', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '1', '4', '1', null, '0', null, '0', null, '1512954720', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512954762', null);
INSERT INTO `bj_orders` VALUES ('1094', '2017121109134780207', '38', '0', '2', '5', '2222222', '江苏省苏州市昆山市', '中寰广场', '郭富城', '18961519032', '1', '4', '1', null, '0', null, '0', null, '1512954780', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512954827', null);
INSERT INTO `bj_orders` VALUES ('1095', '2017121109202010694', '68', '0', '2', '4', '秋寒', '江苏省苏州市昆山市', '花安路', '一叶之秋', '18686663624', '1', '3', '1', null, '0', null, '0', null, '1512955260', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512955220', null);
INSERT INTO `bj_orders` VALUES ('1096', '2017121109242657733', '68', '0', '2', '4', '秋寒', '江苏省苏州市昆山市', '花安路', '一叶之秋', '18686663624', '1', '3', '1', null, '0', null, '0', null, '1512955500', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512955466', null);
INSERT INTO `bj_orders` VALUES ('1097', '2017121111223589656', '38', '0', '2', '4', '2222222', '江苏省常州市金坛市', '中寰广场', '郭富城', '18961519032', '2', '2', '2', null, '0', null, '0', null, '1513048920', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '1512962555', null);
INSERT INTO `bj_orders` VALUES ('1098', '2017121111231574981', '38', '0', '2', '5', '2222222', '江苏省常州市金坛市', '中寰广场', '郭富城', '18961519032', '2', '2', '2', null, '0', null, '0', null, '1513048920', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '0', '0', '0', '2', '0', '0', '0', '0', '0', '0', '0', '0', '1512962595', null);
INSERT INTO `bj_orders` VALUES ('1099', '201712111124013701', '38', '0', '2', '3', '2222222', '江苏省常州市金坛市', '中寰广场', '郭富城', '18961519032', '1', '2', '1', null, '0', null, '0', null, '1513135380', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '0', '0', '0', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512962641', null);
INSERT INTO `bj_orders` VALUES ('1100', '201712111128579264', '38', '56', '2', '6', '2222222', '江苏省常州市金坛市', '中寰广场', '郭富城', '18961519032', '2', '6', '2', '6', '0', null, '0', null, '1512966780', null, '0.00', '20.00', '1512970320', '0', '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '1', '3', '3', '2', '0', '0', '0', '0', '0', '0', '856289', '0', '1512962937', null);
INSERT INTO `bj_orders` VALUES ('1101', '201712111351326672', '68', '71', '2', '7', '秋寒', '江苏省苏州市昆山市', '花安路', '一叶之秋', '18686663624', '1', '5', '1', '1', '0', null, '0', null, '1512971460', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, '12.00', '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '0', '0', '0', '0', '1', '2', '2', '1', '0', '0', '0', '0', '0', '0', '0', '1', '1512971492', null);
INSERT INTO `bj_orders` VALUES ('1102', '2017121113521627105', '38', '0', '2', '7', '2222222', '江苏省常州市金坛市', '中寰广场', '郭富城', '18961519032', '1', '3', '1', null, '0', null, '0', null, '1512982260', null, '0.00', '20.00', null, null, '0', '0.00', null, null, null, null, null, '0.00', '0.00', '0.00', '0.06', '0.15', '0.12', '0', '1', '0', '0', '0', '0', '1', '1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '1512971536', null);

-- ----------------------------
-- Table structure for bj_orders_coaming
-- ----------------------------
DROP TABLE IF EXISTS `bj_orders_coaming`;
CREATE TABLE `bj_orders_coaming` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_number` bigint(20) NOT NULL COMMENT '主订单ID',
  `worker_id` int(11) DEFAULT NULL COMMENT '师傅ID',
  `customer_name` varchar(30) DEFAULT NULL COMMENT '客户名称',
  `workder_name` varchar(30) DEFAULT NULL COMMENT '师傅名字',
  `service_type_id` tinyint(4) DEFAULT NULL COMMENT '服务类型',
  `l1_category_id` int(10) DEFAULT NULL COMMENT '一级类-类型ID',
  `l2_category_id` int(10) DEFAULT NULL COMMENT '二级类-类型ID',
  `type` varchar(30) DEFAULT NULL COMMENT '商品型号',
  `contructdayornight` tinyint(1) DEFAULT NULL,
  `constructdate` int(10) DEFAULT NULL COMMENT '搭建时间',
  `dismantledayornight` tinyint(1) DEFAULT NULL,
  `dismantledate` int(10) DEFAULT NULL COMMENT '拆散时间',
  `workernumber` int(11) DEFAULT '2' COMMENT '施工人数',
  `contractmode` tinyint(1) DEFAULT '0' COMMENT '承包模式：0全包1半包',
  `SGprocedure` tinyint(1) DEFAULT NULL COMMENT '是否需要施工手续 0不需要  1需要',
  `site` tinyint(1) DEFAULT NULL COMMENT '是否需要查看场地 0 不需要 1 需要',
  `delivermode` int(11) DEFAULT NULL COMMENT '物流提货:0 不需要  1需要',
  `projectdepositmode` int(11) DEFAULT NULL COMMENT '师傅需要代缴工程押金   0 不需要  1需要',
  `garbagemode` int(11) DEFAULT NULL COMMENT '完工以后垃圾处理方式 0商场处理  1师傅处理',
  `tender_cost` decimal(10,2) DEFAULT NULL COMMENT '师傅投标费用',
  `progresssheet` varchar(255) DEFAULT NULL COMMENT '搭建/拆除进度表  0：无进度表    其他：进度表的地址',
  `verifysheet` varchar(255) DEFAULT NULL COMMENT '搭建拆除验收单  0 无验收单;其他  验收单的具体地址',
  `contact_name` varchar(10) DEFAULT NULL COMMENT '当前目标维修订单联系人',
  `contact_phone` varchar(11) DEFAULT NULL COMMENT '当前目标维修订单联系的手机号',
  `contact_location` varchar(255) DEFAULT NULL COMMENT '目标维修地址',
  `imgpaper` varchar(255) DEFAULT NULL COMMENT '围板搭建图纸',
  `imgstore` varchar(255) DEFAULT NULL COMMENT '门头照',
  `contactemail` varchar(128) DEFAULT NULL COMMENT '邮箱地址',
  `budget` decimal(11,2) DEFAULT NULL COMMENT '预算费用',
  `comments` varchar(255) DEFAULT NULL COMMENT '招募留言',
  `tender` tinyint(1) DEFAULT '0' COMMENT '是否显示预算价 0 不显示 1显示',
  `brand` varchar(30) DEFAULT NULL COMMENT '品牌',
  `departure_permit` tinyint(1) DEFAULT NULL COMMENT ' 商场办证:1师傅代办2客户办理 3不需要办证',
  `status` tinyint(4) DEFAULT '0' COMMENT '订单状态 0初始订单(信息尚未完善）  1待定标 2待付款 3待完工 4待验收 5待评价 6订单关闭',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_number`) USING BTREE,
  KEY `worker_id` (`worker_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COMMENT='订单类型-维修';

-- ----------------------------
-- Records of bj_orders_coaming
-- ----------------------------
INSERT INTO `bj_orders_coaming` VALUES ('80', '2017110616230055300', null, null, null, '6', null, null, null, null, '1510042950', null, '1510734151', '1', '1', '1', '1', '1', '1', '1', null, '', null, null, null, null, '75597201711061622332762.jpg', '42f24201711061622411841.jpg', null, '1.00', '施工工具齐全,无需师傅携带工具', '0', '阿玛尼', '1', '0', '1509956580', null);
INSERT INTO `bj_orders_coaming` VALUES ('81', '201711070920381409', '37', null, null, '6', null, null, null, null, '1510190416', null, '1510276817', '0', '1', '1', '1', '1', '1', '1', '1.00', '', null, null, null, null, '96bf3201711070920226520.jpg', '28c8f201711070920321392.jpg', null, '1.00', '施工工具齐全,无需师傅携带工具', '0', '阿玛尼', '1', '0', '1510017638', null);
INSERT INTO `bj_orders_coaming` VALUES ('82', '2017110709360042260', '37', null, null, '6', null, null, null, null, '1510191342', null, '1510277743', '0', '0', '0', '0', '0', '0', '0', '12.10', '', null, null, null, null, '4b234201711070935478134.jpg', 'f1a0320171107093555210.jpeg', null, null, null, '0', '阿玛尼', '3', '0', '1510018560', null);
INSERT INTO `bj_orders_coaming` VALUES ('83', '2017110709495415361', null, null, null, '6', null, null, null, null, '1510796977', null, '1510278578', '0', '1', '1', '1', '1', '1', '1', null, '', null, null, null, null, '6c6cc201711070949413513.jpg', '8b7db201711070949505987.jpg', null, null, null, '0', '阿玛尼', '2', '0', '1510019394', null);
INSERT INTO `bj_orders_coaming` VALUES ('84', '2017110710043183881', '37', null, null, '6', null, null, null, null, '1510797855', null, '1510884256', '0', '1', '1', '1', '1', '1', '1', '12.10', '', null, null, null, null, 'b3fc6201711071004181585.jpg', '90752201711071004276379.jpg', null, null, null, '0', '阿玛尼', '1', '0', '1510020271', null);
INSERT INTO `bj_orders_coaming` VALUES ('85', '201711071122339064', null, null, null, '6', null, null, null, null, '1511320927', null, '1510197729', '0', '1', '1', '1', '1', '1', '1', null, '', null, null, null, null, '14979201711071122233423.jpg', '6fddb201711071122332152.jpg', null, null, null, '0', '阿玛尼', '2', '0', '1510024953', null);
INSERT INTO `bj_orders_coaming` VALUES ('86', '2017112714113146559', null, null, null, '6', null, null, null, null, '1511762956', null, '1512022161', '1', '0', '1', '1', '0', '1', '1', null, '', null, null, null, null, '09b1b201711271411146854.png', '963e7201711271411277602.png', null, '1.00', '施工工具齐全,无需师傅携带工具', '0', '阿玛尼', '2', '0', '1511763091', null);

-- ----------------------------
-- Table structure for bj_orders_install
-- ----------------------------
DROP TABLE IF EXISTS `bj_orders_install`;
CREATE TABLE `bj_orders_install` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_id` int(11) NOT NULL,
  `worker_id` int(10) DEFAULT NULL COMMENT '师傅id',
  `service_type_id` tinyint(1) DEFAULT NULL COMMENT '服务类型',
  `category` int(11) NOT NULL DEFAULT '1' COMMENT '服务大类一类',
  `commodity` int(11) NOT NULL COMMENT '服务大类二类',
  `commoditys` int(11) NOT NULL COMMENT '服务三类',
  `pre_trans` int(1) DEFAULT NULL COMMENT '是否有提货地址',
  `trans_address` varchar(100) NOT NULL COMMENT '提货地址省',
  `trans_addressb` varchar(100) NOT NULL COMMENT '提货地址市',
  `trans_addressa` varchar(100) NOT NULL COMMENT '提货地址区',
  `trans_addressc` varchar(255) NOT NULL COMMENT '详细提货地址',
  `pre_survey` tinyint(1) DEFAULT NULL COMMENT '前置勘探',
  `pre_survey_num` varchar(255) DEFAULT NULL COMMENT '前置勘探编号',
  `woodworking` mediumint(6) DEFAULT NULL COMMENT '木工人数',
  `electrician` mediumint(6) DEFAULT NULL COMMENT '电工人数',
  `brick_layer` mediumint(6) DEFAULT NULL COMMENT '瓦工人数',
  `oiler` mediumint(6) DEFAULT NULL COMMENT '油漆工人数',
  `hamal` mediumint(6) DEFAULT NULL COMMENT '搬运工人数',
  `assistance_mode` tinyint(1) DEFAULT '1' COMMENT '安装模式 1全包 0 协助',
  `special_delivery` tinyint(1) DEFAULT '1' COMMENT '物流提货 1 零担 0 专车发货',
  `self_car` tinyint(1) DEFAULT '1' COMMENT '是否需要师傅自带板车 1 是 0 否',
  `self_deposit` tinyint(1) DEFAULT '1' COMMENT '是否需要师傅 代缴工程押金 1 是 0 否',
  `self_trash` tinyint(1) DEFAULT '1' COMMENT '完工后垃圾处理方式 1 商场处理 0 师傅处理',
  `Up` varchar(255) DEFAULT NULL COMMENT '上传计划表 1 上传 2位上传',
  `drawings` varchar(255) DEFAULT NULL COMMENT '上传图纸 1上传 2位上传',
  `check_list` varchar(255) DEFAULT NULL COMMENT '上传验收单 1上传2未上传',
  `start_at` varchar(100) DEFAULT NULL COMMENT '预约时间',
  `brand` varchar(255) DEFAULT NULL COMMENT '品牌',
  `contact_name` varchar(255) DEFAULT NULL COMMENT '联系人',
  `contact_phone` varchar(255) DEFAULT NULL COMMENT '联系人电话',
  `location_ext` int(100) DEFAULT NULL COMMENT '目标维修地址省',
  `location_exta` varchar(255) DEFAULT NULL COMMENT '目标维修地址市',
  `location_extb` varchar(255) DEFAULT NULL COMMENT '目标维修地址区',
  `location_extc` int(11) DEFAULT NULL,
  `departure_card` tinyint(1) DEFAULT '1' COMMENT '商场办证 1 师傅代办 2 客户办理 3 不需要办理',
  `yue` varchar(255) DEFAULT NULL COMMENT '月结客户密码',
  `order_number` varchar(255) DEFAULT NULL COMMENT '主订单号',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  `status` int(1) DEFAULT NULL COMMENT '订单状态',
  `comments` varchar(255) DEFAULT NULL COMMENT '招募留言',
  `budget` decimal(20,0) DEFAULT NULL COMMENT '预算费用',
  `tender_cost` decimal(10,2) DEFAULT NULL COMMENT '师傅投标价',
  `tender` tinyint(1) DEFAULT NULL COMMENT '招标是否显示预算价 0不显示 1显示',
  `monthly_service` int(10) DEFAULT NULL COMMENT '月结客户',
  `storefront` varchar(10000) DEFAULT NULL,
  `reslt` int(50) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL COMMENT '商城类型',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_number`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8 COMMENT='订单类型-安装';

-- ----------------------------
-- Records of bj_orders_install
-- ----------------------------
INSERT INTO `bj_orders_install` VALUES ('126', '35', null, '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '0', '0', '0', '0', '0', '2017-11-14 16:29:44', '阿玛尼', '1', '18961519032', '0', '东城区', '北京市', '11', '1', null, '2017110616491923075', '1509958159', '1509958210', '0', null, '11', null, '0', null, '04396201711061631366624.jpg', null, '1');
INSERT INTO `bj_orders_install` VALUES ('127', '35', null, '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '0', '0', '0', '2017-11-15 16:49:17', '阿玛尼', '1', '18961519032', '0', '北京市', '东城区', '11', '1', null, '20171106165109155', '1509958269', '1509958273', '0', null, '0', null, '0', null, 'fb900201711061651079865.jpg', null, '1');
INSERT INTO `bj_orders_install` VALUES ('128', '36', '35', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '0', '1', '1', '0', '0', '0', '0', '2017-11-15 16:53:13', '阿玛尼', '顾家敏', '18961519032', '0', '路南区', '唐山市', '1', '1', null, '2017110616550794959', '1509958507', '1509958510', '0', null, '0', '1.00', '0', null, '3dcea201711061655069890.jpg', null, '1');
INSERT INTO `bj_orders_install` VALUES ('129', '38', null, '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '73405201711061718516578.png', '3d337201711061718598060.png', 'b8af020171106171855838.jpg', '2017-11-08 17:18:23', '阿玛尼', '10', '15865867664', '0', '河北区', '天津市', '1000000000', '1', null, '2017110617191085278', '1509959950', '1509959956', '0', null, '10000', null, '0', null, '9c7cd201711061719061822.jpg', null, 'gdfb');
INSERT INTO `bj_orders_install` VALUES ('130', '38', '39', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '7db14201711061737071523.jpg', 'c4773201711061737163069.jpg', '0b59c201711061737128990.png', '2017-11-14 17:36:44', '阿玛尼', '10', '15865867664', '0', '河北区', '天津市', '1000000000', '1', null, '2017110617372963929', '1509961049', '1509961098', '0', null, '5000', '6.00', '0', null, '07f53201711061737233582.jpg', null, '大V');
INSERT INTO `bj_orders_install` VALUES ('131', '38', '39', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '40e32201711061740328983.png', '901ba201711061740387322.png', '6b6f5201711061740356108.png', '2017-11-08 17:40:11', '阿玛尼', '10', '15865867664', '0', '河北区', '天津市', '1000000000', '1', null, '2017110617404711018', '1509961247', '1509961253', '0', null, '0', '1.00', '0', null, 'b478d201711061740416012.png', null, '23');
INSERT INTO `bj_orders_install` VALUES ('132', '38', '39', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '88553201711061745078842.png', '1c6b6201711061745151036.png', '932f3201711061745123153.png', '2017-11-08 17:44:45', '阿玛尼', '10', '15865867664', '0', '河北区', '天津市', '1000000000', '1', null, '2017110617452577915', '1509961525', '1509961530', '0', null, '0', '1.00', '0', null, 'f57d9201711061745213293.jpg', null, 'fdgrb');
INSERT INTO `bj_orders_install` VALUES ('133', '38', '39', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '75bcb201711061748558743.png', '2d56b20171106174904791.png', 'de055201711061749005700.png', '2017-11-09 17:48:33', '阿玛尼', '10', '15865867664', '0', '河北区', '天津市', '1000000000', '1', null, '2017110617491168304', '1509961751', '1509961762', '0', null, '2', '1.00', '0', null, '900c3201711061749073143.png', null, 'dfdbfd');
INSERT INTO `bj_orders_install` VALUES ('134', '36', '35', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '0', '0', '0', '2017-11-15 18:05:43', '阿玛尼', '顾家敏', '18961519032', '0', '路南区', '唐山市', '1', '1', null, '2017110618055011211', '1509962750', '1509962754', '0', null, '1', '1.00', '0', null, '', null, '1');
INSERT INTO `bj_orders_install` VALUES ('135', '33', '37', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '0', '0', '0', '2017-11-22 18:08:50', '阿玛尼', '徐文峰', '18686663624', '0', '南关区', '长春市', '111111', '1', null, '2017110618090144385', '1509962941', '1509962943', '0', null, '1', '1.00', '0', null, '', null, '1');
INSERT INTO `bj_orders_install` VALUES ('136', '38', '39', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', 'cc6af201711061822477884.png', '32fc6201711061822547333.png', 'd6de7201711061822509925.png', '2017-11-09 18:22:26', '阿玛尼', '10', '15865867664', '0', '河北区', '天津市', '1000000000', '1', null, '2017110618241287022', '1509963852', '1509964048', '0', null, '30', '2.00', '0', null, '3f061201711061823381114.jpg', null, 'gdf');
INSERT INTO `bj_orders_install` VALUES ('137', '38', '39', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', 'b4017201711061914257998.png', '7429f20171106191433401.png', 'ea7f1201711061914291937.png', '2017-11-08 19:14:01', '阿玛尼', '10', '15865867664', '0', '河北区', '天津市', '1000000000', '1', null, '2017110619144610716', '1509966886', '1509966892', '0', null, '50', '7.00', '0', null, 'ae670201711061914423438.jpg', null, 'fgd');
INSERT INTO `bj_orders_install` VALUES ('138', '41', null, '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '0', '1', '1', '0', '0', '0', '0', '2017-11-29 08:32:14', '阿玛尼', '13818759298', '13818759298', '0', '上海市', '浦东新区', '0', '1', null, '2017110708330715794', '1510014787', '1510014798', '0', null, '500', null, '0', null, '', null, '数码商城');
INSERT INTO `bj_orders_install` VALUES ('139', '38', '39', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '14a98201711070836507551.png', '11a0b20171107083657450.png', 'bb8a8201711070836539357.png', '2017-11-16 08:36:26', '阿玛尼', '10', '15865867664', '0', '南开区', '天津市', '0', '1', null, '2017110708371367163', '1510015033', '1510015033', '0', null, null, '11.00', null, null, 'a254c201711070837075742.jpg', null, '水电费');
INSERT INTO `bj_orders_install` VALUES ('140', '38', '39', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '0b727201711070942129161.png', 'a4fd6201711070942195609.jpg', '32e40201711070942151734.png', '2017-11-15 09:41:27', '阿玛尼', '10', '15865867664', '0', '南开区', '天津市', '0', '1', null, '2017110709423633212', '1510018956', '1510018956', '0', null, null, '13.00', null, null, 'e950a201711070942268524.jpg', null, '热热');
INSERT INTO `bj_orders_install` VALUES ('141', '38', '39', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '0bbc7201711071041508885.png', '070cd201711071042089879.png', '4ffe9201711071042017315.jpg', '2017-11-15 10:41:12', '阿玛尼', '都会感染发生呢', '15865867664', '0', '南开区', '天津市', '0', '1', null, '2017110710422184585', '1510022541', '1510022541', '0', null, null, '500.00', null, null, '5cd94201711071042156509.jpg', null, '啊大哥v放到');
INSERT INTO `bj_orders_install` VALUES ('142', '38', null, '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '0', '0', '0', '2017-11-07 11:15:10', '阿玛尼', '10', '15865867664', '0', '南开区', '天津市', '0', '1', null, '2017110711153277693', '1510024532', '1510024532', '0', null, null, null, null, null, '', null, '10');
INSERT INTO `bj_orders_install` VALUES ('143', '36', '35', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '0', '1', '0', '0', '0', '0', '2017-11-07 11:17:46', '阿玛尼', '顾家敏', '18961519032', '0', '路南区', '唐山市', '1', '1', null, '2017110711194625819', '1510024786', '1510024786', '0', null, null, '12.00', null, null, '', null, '1');
INSERT INTO `bj_orders_install` VALUES ('144', '38', null, '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '0', '0', '0', '2017-11-28 13:29:11', '阿玛尼', '1', '1', '0', '朝阳区', '北京市', '101000000', '1', null, '201711201329369356', '1511155776', '1511155776', '0', null, null, null, null, null, '', null, '10');
INSERT INTO `bj_orders_install` VALUES ('145', '38', '39', '1', '3', '3', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '0', '0', '0', '10', '阿玛尼', '1', '1', '0', '朝阳区', '北京市', '101000000', '1', null, '2017112013320986361', '1511155929', '1511155929', '0', null, null, '10.00', null, null, '', null, '10');
INSERT INTO `bj_orders_install` VALUES ('146', '38', null, '1', '3', '0', '0', null, '', '', '', '', null, null, null, null, null, null, null, '1', '1', '1', '1', '0', '0', '0', '0', '2017-12-05 20:04:57', 'SK-II', '1', '11', '0', '朝阳区', '北京市', '0', '1', null, '2017120520070564104', '1512475625', '1512475630', '0', null, '10', null, '0', null, '', null, '10');

-- ----------------------------
-- Table structure for bj_orders_maintain
-- ----------------------------
DROP TABLE IF EXISTS `bj_orders_maintain`;
CREATE TABLE `bj_orders_maintain` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_number` bigint(20) NOT NULL COMMENT '主订单ID',
  `worker_id` int(11) DEFAULT NULL COMMENT '师傅ID',
  `customer_name` varchar(30) DEFAULT NULL COMMENT '客户名称',
  `workder_name` varchar(30) DEFAULT NULL COMMENT '师傅名字',
  `service_type_id` tinyint(4) DEFAULT NULL COMMENT '服务类型',
  `l1_category_id` int(10) DEFAULT NULL COMMENT '一级类-类型ID',
  `l2_category_id` int(10) DEFAULT NULL COMMENT '二级类-类型ID',
  `type` varchar(30) DEFAULT NULL COMMENT '商品型号',
  `qty` int(11) NOT NULL DEFAULT '1' COMMENT '故障数量',
  `trouble_tags` text COMMENT '故障描述ID',
  `trouble_description` text COMMENT '故障文字描述',
  `photo_store` text COMMENT '门头照片',
  `photo_trouble_position` text COMMENT '故障位置图片',
  `photo_trouble_detail1` text COMMENT '故障详细图片',
  `photo_trouble_detail2` varchar(64) DEFAULT NULL COMMENT '故障详情图片',
  `urgent` tinyint(1) DEFAULT '0' COMMENT '加急服务 0否 1是',
  `monthly_service` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否使用平台月结服务: 0未使用1使用',
  `is_bomb` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否使用核单：0未使用1使用',
  `appointment_time` int(11) DEFAULT NULL COMMENT '预约时间',
  `tender` tinyint(1) DEFAULT NULL COMMENT '招标是否显示预算价 0不显示 1显示',
  `tender_cost` decimal(10,2) DEFAULT NULL COMMENT '师傅投标费用',
  `num` int(10) DEFAULT NULL COMMENT '需要普通师傅个数',
  `brand` varchar(30) DEFAULT NULL COMMENT '品牌',
  `img_ysd` varchar(60) DEFAULT NULL COMMENT '维修验收单',
  `img_describe` varchar(60) DEFAULT NULL COMMENT '图片描述1',
  `img_describe2` varchar(60) DEFAULT NULL COMMENT '图片描述2',
  `img_describe3` varchar(60) DEFAULT NULL COMMENT '图片描述3',
  `market_cer` varchar(50) DEFAULT NULL COMMENT '商场名称',
  `contact_name` varchar(10) DEFAULT NULL COMMENT '当前目标维修订单联系人',
  `contact_phone` varchar(11) DEFAULT NULL COMMENT '当前目标维修订单联系的手机号',
  `contact_location` varchar(255) DEFAULT NULL COMMENT '目标维修地址',
  `budget` decimal(11,2) DEFAULT NULL COMMENT '预算费用',
  `comments` varchar(255) DEFAULT NULL COMMENT '招募留言',
  `departure_permit` tinyint(1) DEFAULT NULL COMMENT ' 商场办证:1师傅代办2客户办理 3不需要办证',
  `status` tinyint(4) DEFAULT '0' COMMENT '订单状态 0初始订单(信息尚未完善）  1待定标 2待付款 3待完工 4待验收 5待评价 6订单关闭',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_number`) USING BTREE,
  KEY `worker_id` (`worker_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=892 DEFAULT CHARSET=utf8 COMMENT='订单类型-维修';

-- ----------------------------
-- Records of bj_orders_maintain
-- ----------------------------
INSERT INTO `bj_orders_maintain` VALUES ('854', '2017120914370562104', null, '秋寒', null, '2', '5', '8', '', '0', '23', '', '2dcde201712091437009985.jpg', '', '', '', '0', '0', '0', null, '1', null, null, '兰蔻', '', null, null, null, '111', null, null, null, '10.00', '', null, '0', '1512801426', null);
INSERT INTO `bj_orders_maintain` VALUES ('855', '2017120914531532735', null, '秋寒', null, '2', '6', '16', '', '0', '37', '', 'adf8f201712091453127089.jpg', '', '', '', '0', '0', '0', null, null, null, null, '资生堂', '', null, null, null, '你', null, null, null, null, null, null, '0', '1512802396', null);
INSERT INTO `bj_orders_maintain` VALUES ('856', '2017120914531532735', null, '秋寒', null, '2', '7', '17', '', '0', '43', '', 'adf8f201712091453127089.jpg', '', '', '', '0', '0', '0', null, null, null, null, '迪奥', '', null, null, null, '你', null, null, null, null, null, null, '0', '1512802396', null);
INSERT INTO `bj_orders_maintain` VALUES ('857', '2017120914532598604', null, '秋寒', null, '2', '6', '16', '', '0', '37', '', 'adf8f201712091453127089.jpg', '', '', '', '0', '0', '0', null, null, '0.00', null, '资生堂', '', null, null, null, '你', null, null, null, null, null, null, '0', '1512802396', null);
INSERT INTO `bj_orders_maintain` VALUES ('858', '2017120914532598604', null, '秋寒', null, '2', '7', '17', '', '0', '43', '', 'adf8f201712091453127089.jpg', '', '', '', '0', '0', '0', null, null, '0.00', null, '迪奥', '', null, null, null, '你', null, null, null, null, null, null, '0', '1512802396', null);
INSERT INTO `bj_orders_maintain` VALUES ('859', '2017120915010555841', null, '周春林', null, '2', '3', '3', '', '0', '7', '好好好', '5f33020171209150018251.jpg', '629f7201712091458483601.jpeg', '3e579201712091458585680.jpeg', 'd393f201712091459107887.jpeg', '0', '0', '0', null, '1', null, null, null, '', null, null, null, '昆山九方城', null, null, null, '11.00', '', null, '0', '1512802865', null);
INSERT INTO `bj_orders_maintain` VALUES ('860', '2017120915103053789', null, '周春林', null, '2', '4', '6', '', '0', '26', '', '', '', '', '', '0', '0', '0', null, '0', null, null, '兰蔻', '', null, null, null, ' 请，', null, null, null, '22.00', '', null, '0', '1512803430', null);
INSERT INTO `bj_orders_maintain` VALUES ('861', '20171209151955304', null, '周春林', null, '2', '5', '8', '1', '0', '23', '123', '61836201712091519392458.jpg', '962af201712091516405515.jpeg', 'b5c602017120915175966.jpeg', '60c93201712091518138718.jpeg', '0', '0', '0', null, '1', null, null, '雅诗兰黛', '', null, null, null, '昆山花桥镇', null, null, null, '5555.00', '', null, '0', '1512803995', null);
INSERT INTO `bj_orders_maintain` VALUES ('862', '2017120915235078017', null, '2222222', null, '2', '4', '8', '', '3', '23', '', '', '', 'dcb65201712091421366715.png', '', '0', '0', '0', null, '1', null, null, '兰蔻', 'b8055201712091425019742.png', null, null, null, '10', null, null, null, '0.00', '', null, '0', '1512804231', null);
INSERT INTO `bj_orders_maintain` VALUES ('863', '2017120915235078017', null, '2222222', null, '2', '3', '3', '140', '6', '7', '10', '', '44d2a201712091523202324.png', '6126b201712091523155245.png', 'cef5d201712091523172948.png', '0', '0', '0', null, '1', null, null, '雅诗兰黛', 'b8055201712091425019742.png', null, null, null, '10', null, null, null, '0.00', '', null, '0', '1512804231', null);
INSERT INTO `bj_orders_maintain` VALUES ('864', '2017120915402065171', null, '2222222', null, '2', '3', '3', '', '0', '6', '', '', '2594220171209154011270.png', '1822f20171209154000188.png', 'b9dfd201712091539567897.png', '0', '0', '0', null, null, null, null, '迪奥', 'b8055201712091425019742.png', null, null, null, '10', null, null, null, null, null, null, '0', '1512805220', null);
INSERT INTO `bj_orders_maintain` VALUES ('865', '2017120915442337391', null, '2222222', null, '2', '7', '14', '10', '1', '28,31', '', 'ebafe201712091544225912.jpg', 'c5b0f201712091544089538.jpg', '793ea201712091544069870.jpg', '37f85201712091544092124.jpg', '0', '0', '0', null, null, null, null, '资生堂', 'ed835201712091544144523.cssx', null, null, null, '10', null, null, null, null, null, null, '0', '1512805463', null);
INSERT INTO `bj_orders_maintain` VALUES ('866', '2017120915514129422', null, '周春林', null, '2', '5', '3', '', '0', '6', '结婚公积金', '', '568c8201712091548143543.jpeg', '131c0201712091548243796.jpeg', '7c1b520171209154834306.jpeg', '0', '0', '0', null, '0', null, null, '兰蔻', '', null, null, null, '哈哈哈哈', null, null, null, '2222.00', '', null, '0', '1512805902', null);
INSERT INTO `bj_orders_maintain` VALUES ('867', '201712091600358632', null, '秋寒', null, '2', '6', '8', '', '0', '24', '', '', '', '', '', '0', '0', '0', null, '1', null, null, '雅诗兰黛', '', null, null, null, '1', null, null, null, '10.00', '', null, '0', '1512806436', null);
INSERT INTO `bj_orders_maintain` VALUES ('868', '2017120916012760339', null, '秋寒', null, '2', '6', '16', '', '0', '37', '', '', '', '', '', '0', '0', '0', null, '0', null, null, '兰蔻', '', null, null, null, '1', null, null, null, '10.00', '', null, '0', '1512806488', null);
INSERT INTO `bj_orders_maintain` VALUES ('869', '2017120916074029388', null, '2222222', null, '2', '6', '8', '', '0', '23', '', '', '5a322201712091605044346.jpg', '64faf201712091605074525.jpg', '00318201712091605105652.jpg', '0', '0', '0', null, '1', null, null, '资生堂', 'd3233201712091603017899.jpg', null, null, null, '10010', null, null, null, '10.00', '交通便利,师傅出行方便', null, '0', '1512806860', null);
INSERT INTO `bj_orders_maintain` VALUES ('870', '2017120917141663278', null, '2222222', null, '2', '3', '7', '10', '3', '1,3', '', '', '', '', '', '0', '0', '0', null, null, null, null, '兰蔻', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512810856', null);
INSERT INTO `bj_orders_maintain` VALUES ('871', '2017120917262914688', null, '2222222', null, '2', '4', '8', '', '0', '5', '', '', '', '', '', '0', '0', '0', null, null, null, null, '雅诗兰黛', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512811589', null);
INSERT INTO `bj_orders_maintain` VALUES ('872', '2017121108443384565', null, '秋寒', null, '2', '7', '6', '', '0', '26', '', 'a62bd201712110844325865.png', '', '', '', '0', '0', '0', null, '0', null, null, '兰蔻', '', null, null, null, '+', null, null, null, '44.00', '', null, '0', '1512953073', null);
INSERT INTO `bj_orders_maintain` VALUES ('873', '2017121108463156524', null, '客户_gidtnn', null, '2', '3', '6', 'RFRRD', '1', '26', '哈哈啊哈哈', 'f7bd2201712110846184703.png', '', '20b5820171211084459707.png', '530c3201712110845029855.png', '0', '0', '0', null, '1', null, null, '资生堂', 'a71b8201712110845421511.txt', null, null, null, '龙之梦', null, null, null, '20.00', '施工时间不限制，随时都可以', null, '0', '1512953191', null);
INSERT INTO `bj_orders_maintain` VALUES ('874', '201712110848593463', null, '2222222', null, '2', '5', '8', '', '0', '23', '', '', '', '', '', '0', '0', '0', null, null, null, null, '香奈尔', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512953339', null);
INSERT INTO `bj_orders_maintain` VALUES ('875', '201712110848593463', null, '2222222', null, '2', '5', '8', '', '0', '23', '', '', '', '', '', '0', '0', '0', null, null, null, null, '香奈尔', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512953339', null);
INSERT INTO `bj_orders_maintain` VALUES ('876', '2017121108522047570', null, '秋寒', null, '2', '4', '6', '0', '1', '26', '', 'b4c34201712110852174854.jpg', '', '', '', '0', '0', '0', null, null, null, null, '兰蔻', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512953540', null);
INSERT INTO `bj_orders_maintain` VALUES ('877', '2017121109074125675', null, '2222222', null, '2', '5', '7', '', '1', '20', '', '', '', '', '', '0', '0', '0', null, '0', null, null, '雅诗兰黛', '9954f201712110907349318.xlsx', null, null, null, '10', null, null, null, '10.00', '', null, '0', '1512954461', null);
INSERT INTO `bj_orders_maintain` VALUES ('878', '2017121109085034095', null, '2222222', null, '2', '5', '7', '', '0', '20', '', '', '', '', '', '0', '0', '0', null, '0', null, null, '兰蔻', 'e14dd201712110908401524.jpg', null, null, null, '10', null, null, null, '10.00', '', null, '0', '1512954530', null);
INSERT INTO `bj_orders_maintain` VALUES ('879', '20171211091110968', null, '2222222', null, '2', '4', '3', '', '0', '8', '', '', '', 'bfcd2201712110910402579.jpg', '', '0', '0', '0', null, '0', null, null, '资生堂', 'eb61a201712110910589033.png', null, null, null, '10', null, null, null, '10.00', '', null, '0', '1512954670', null);
INSERT INTO `bj_orders_maintain` VALUES ('880', '2017121109124255496', null, '2222222', null, '2', '4', '8', '', '0', '24', '', '', '', '', '', '0', '0', '0', null, '0', null, null, '雅诗兰黛', '', null, null, null, '10', null, null, null, '10.00', '', null, '0', '1512954762', null);
INSERT INTO `bj_orders_maintain` VALUES ('881', '2017121109134780207', null, '2222222', null, '2', '5', '8', '', '0', '24,25', '', '', '', '', '', '0', '0', '0', null, '0', null, null, '雅诗兰黛', 'e21b9201712110913397461.txt', null, null, null, '10', null, null, null, '10.00', '', null, '0', '1512954827', null);
INSERT INTO `bj_orders_maintain` VALUES ('882', '2017121109202010694', null, '秋寒', null, '2', '4', '3', '', '0', '6', '', 'ec678201712110920178153.png', '', '', '', '0', '0', '0', null, '0', null, null, '兰蔻', 'df069201712110920049576.txt', null, null, null, '1', null, null, null, '10.00', '', null, '0', '1512955220', null);
INSERT INTO `bj_orders_maintain` VALUES ('883', '2017121109242657733', null, '秋寒', null, '2', '4', '6', '', '0', '27', '', '', '', '', '', '0', '0', '0', null, '0', null, null, '兰蔻', '65584201712110924185795.xls', null, null, null, '1', null, null, null, '11.00', '', null, '0', '1512955467', null);
INSERT INTO `bj_orders_maintain` VALUES ('884', '2017121111223589656', null, '2222222', null, '2', '4', '6', '', '0', '27', '', '', '', '', '', '0', '0', '0', null, null, null, null, '雅诗兰黛', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512962555', null);
INSERT INTO `bj_orders_maintain` VALUES ('885', '2017121111223589656', null, '2222222', null, '2', '5', '15', '', '0', '34', '', '', '', '', '', '0', '0', '0', null, null, null, null, '兰蔻', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512962555', null);
INSERT INTO `bj_orders_maintain` VALUES ('886', '2017121111223589656', null, '2222222', null, '2', '5', '15', '', '0', '34', '', '', '', '', '', '0', '0', '0', null, null, null, null, '兰蔻', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512962555', null);
INSERT INTO `bj_orders_maintain` VALUES ('887', '2017121111231574981', null, '2222222', null, '2', '5', '8', '', '1', '25', '', '', '', '', '', '0', '0', '0', null, null, null, null, '资生堂', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512962595', null);
INSERT INTO `bj_orders_maintain` VALUES ('888', '201712111124013701', null, '2222222', null, '2', '3', '6', '', '0', '27', '10', '', '', '940e5201712111123473356.png', '', '0', '0', '0', null, null, null, null, '兰蔻', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512962641', null);
INSERT INTO `bj_orders_maintain` VALUES ('889', '201712111128579264', null, '2222222', null, '2', '6', '16', '', '3', '36', '', '5c232201712111128559036.png', '', '', '', '0', '0', '0', null, null, null, null, '资生堂', '', null, null, null, '10', null, null, null, null, null, null, '0', '1512962937', null);
INSERT INTO `bj_orders_maintain` VALUES ('890', '201712111351326672', null, '秋寒', null, '2', '7', '15', '', '0', '6', '', '', '', '', '', '0', '0', '0', null, '0', null, null, '雅诗兰黛', '', null, null, null, '1', null, null, null, '10.00', '', null, '0', '1512971492', null);
INSERT INTO `bj_orders_maintain` VALUES ('891', '2017121113521627105', null, '2222222', null, '2', '7', '8', '', '0', '23', '', '', '', '', '', '0', '0', '0', null, '0', null, null, '兰蔻', '', null, null, null, '10', null, null, null, '10.00', '', null, '0', '1512971537', null);

-- ----------------------------
-- Table structure for bj_orders_management
-- ----------------------------
DROP TABLE IF EXISTS `bj_orders_management`;
CREATE TABLE `bj_orders_management` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_id` int(11) DEFAULT NULL COMMENT '主订单ID',
  `worker_id` int(11) DEFAULT NULL COMMENT '师傅ID',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`) USING BTREE,
  KEY `worker_id` (`worker_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单类型-工程管理';

-- ----------------------------
-- Records of bj_orders_management
-- ----------------------------

-- ----------------------------
-- Table structure for bj_orders_survey
-- ----------------------------
DROP TABLE IF EXISTS `bj_orders_survey`;
CREATE TABLE `bj_orders_survey` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `order_number` varchar(50) NOT NULL COMMENT '订单号',
  `contacts` varchar(10) DEFAULT NULL COMMENT '联系人',
  `phone` varchar(11) DEFAULT NULL COMMENT '电话',
  `brand` varchar(20) DEFAULT NULL COMMENT '品牌',
  `mall_name` varchar(35) NOT NULL COMMENT '商场名称',
  `yuy_time` int(11) NOT NULL COMMENT '预约施工时间',
  `full_location` varchar(60) NOT NULL COMMENT '店铺地址',
  `address` varchar(50) NOT NULL COMMENT '详细地址',
  `goods` varchar(35) DEFAULT NULL COMMENT '商品类型',
  `survey_area` varchar(30) DEFAULT NULL COMMENT '勘测面积',
  `height` varchar(30) DEFAULT NULL COMMENT '空间高度(米)',
  `sg_time` varchar(30) NOT NULL COMMENT '施工时长(时)',
  `wg_time` varchar(35) NOT NULL COMMENT '完工期限',
  `field_img` varchar(30) NOT NULL COMMENT '场地勘测表',
  `mapping_img` varchar(30) NOT NULL COMMENT '测绘表',
  `condition` tinyint(1) DEFAULT '3' COMMENT '是否具备的条件 :1梯子2脚手架3不具备',
  `permit` tinyint(1) NOT NULL COMMENT '是否商场办证:1师傅代办2客户办理3不需要办证',
  `photo` varchar(60) DEFAULT NULL COMMENT '商场头门照',
  `requirement` text COMMENT '特殊要求',
  `is_yue` int(11) NOT NULL COMMENT '使用平台月结服务:1使用0未使用',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `update_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='勘测';

-- ----------------------------
-- Records of bj_orders_survey
-- ----------------------------
INSERT INTO `bj_orders_survey` VALUES ('18', '2017110615352726420', '徐文峰', '18686663624', '阿玛尼', '一个商场', '1510904097', '吉林省长春市南关区', '111111', '户外', '1', '1', '1', '2017-11-06', '32fc8201711061535198662.jpg', '33f09201711061535228743.jpeg', '1', '1', 'e08f8201711061535246614.jpg', '1111111', '0', '1509953727', '1509953727');
INSERT INTO `bj_orders_survey` VALUES ('19', '2017110616082921188', '徐文峰', '18686663624', '阿玛尼', '1', '1511338096', '吉林省长春市南关区', '111111', '户外', '1', '1', '1', '2017-11-30', 'b82c6201711061608228483.jpg', '0ac9d201711061608246095.jpg', '1', '1', '3621c201711061608279321.png', '', '0', '1509955709', '1509955709');
INSERT INTO `bj_orders_survey` VALUES ('20', '2017110618461371940', '徐文峰', '18686663624', '阿玛尼', '1', '1510742759', '吉林省长春市南关区', '111111', '户外', '1', '1', '1', '2017-11-21', 'b4f13201711061846045852.jpg', '032b2201711061846074183.jpg', '1', '1', '5593f201711061846105772.jpg', '1111111', '0', '1509965173', '1509965173');
INSERT INTO `bj_orders_survey` VALUES ('21', '2017110709442748758', '徐文峰', '18686663624', '阿玛尼', '111', '1510105367', '吉林省长春市南关区', '111111', '户外', '22', '222', '12', '2017-11-08', 'e374620171107094340580.jpg', 'daafb201711070943432568.jpg', '1', '1', 'abd87201711070943487418.JPG', '111', '0', '1510019067', '1510019067');
INSERT INTO `bj_orders_survey` VALUES ('22', '2017110709525024086', '徐文峰', '18686663624', '阿玛尼', '1', '1511315557', '吉林省长春市南关区', '111111', '户外', '1', '1', '1', '2017-11-09', '2e52f201711070952446164.jpg', '5038d201711070952463355.jpg', '1', '1', '44f47201711070952484160.jpg', '1', '0', '1510019570', '1510019570');
INSERT INTO `bj_orders_survey` VALUES ('23', '2017110710144230171', '黄洁', '15802100074', '阿玛尼', '111', '1510193576', '吉林省长春市南关区', '111111', '户外', '2', '2', '2', '2017-11-08', '1bf65201711071013474009.JPG', 'c3f34201711071013499056.jpg', '1', '1', '1f6ca201711071014373726.jpg', '111111111111111', '0', '1510020882', '1510020882');
INSERT INTO `bj_orders_survey` VALUES ('24', '201711291221251247', '1', '15865867664', '阿玛尼', '10', '1512620439', '北京市北京市朝阳区', '101000000', '户外', '1', '10', '10', '2017-11-31', '8bc00201711291221038383.png', '28598201711291221174905.png', '2', '1', '4112f201711291221198765.png', '10', '0', '1511929285', '1511929285');

-- ----------------------------
-- Table structure for bj_order_comments
-- ----------------------------
DROP TABLE IF EXISTS `bj_order_comments`;
CREATE TABLE `bj_order_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_id` bigint(20) NOT NULL COMMENT '订单ID',
  `master_manifestation` tinyint(1) DEFAULT NULL COMMENT '师傅表现 1好评，0一般，-1不满意',
  `work_quality` float(3,2) DEFAULT NULL COMMENT '工作质量评分',
  `work_speed` float(3,2) DEFAULT NULL COMMENT '工作速度评分',
  `service_attitude` float(3,2) DEFAULT NULL COMMENT '服务态度评分',
  `owner_id` int(11) NOT NULL COMMENT '订单创建者ID',
  `adopt_id` int(11) NOT NULL COMMENT '被评论人的id',
  `uid` int(11) NOT NULL COMMENT '评论者ID',
  `username` varchar(30) DEFAULT NULL COMMENT '评论者名称',
  `comments` text NOT NULL COMMENT '评论内容',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`) USING BTREE,
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8 COMMENT='订单评论表';

-- ----------------------------
-- Records of bj_order_comments
-- ----------------------------
INSERT INTO `bj_order_comments` VALUES ('121', '2017120114160672307', '0', null, null, null, '59', '59', '56', '顾佳敏', '111', '1512111963');
INSERT INTO `bj_order_comments` VALUES ('122', '2017120115572959109', '0', null, null, null, '47', '47', '47', '刘健', '好', '1512116931');
INSERT INTO `bj_order_comments` VALUES ('123', '2017120115572959109', '0', null, null, null, '47', '47', '56', '顾佳敏', 'ha lu', '1512116962');
INSERT INTO `bj_order_comments` VALUES ('124', '2017120415375447591', '-1', null, null, null, '59', '59', '56', '顾佳敏', 'hhhhhj', '1512458507');
INSERT INTO `bj_order_comments` VALUES ('125', '2017120515225933523', '1', null, null, null, '59', '59', '56', '顾佳敏', '踏踏吐不出', '1512522740');
INSERT INTO `bj_order_comments` VALUES ('126', '2017120515225933523', '1', null, null, null, '59', '59', '56', '顾佳敏', '六六六六', '1512522760');
INSERT INTO `bj_order_comments` VALUES ('127', '2017120610103665747', '0', null, null, null, '47', '47', '47', '刘健', ' 反反复复', '1512529154');
INSERT INTO `bj_order_comments` VALUES ('128', '2017120610103665747', '0', null, null, null, '47', '47', '47', '刘健', '1256475', '1512529458');
INSERT INTO `bj_order_comments` VALUES ('129', '2017120611115555068', '1', null, null, null, '47', '47', '47', '刘健', 'ha ha hai l', '1512530224');
INSERT INTO `bj_order_comments` VALUES ('130', '2017120611115555068', '-1', null, null, null, '47', '47', '56', '顾佳敏', '拉拉家咯女', '1512530373');
INSERT INTO `bj_order_comments` VALUES ('131', '2017120611115555068', '-1', null, null, null, '47', '47', '56', '顾佳敏', '噢噢噢哦哦', '1512550243');
INSERT INTO `bj_order_comments` VALUES ('132', '2017120413303972014', '1', null, null, null, '38', '38', '38', '赵孔磊', '哦哦哦', '1512550334');
INSERT INTO `bj_order_comments` VALUES ('133', '2017120413303972014', '1', null, null, null, '38', '38', '38', '赵孔磊', '太累了', '1512550352');
INSERT INTO `bj_order_comments` VALUES ('134', '2017120610411351768', '1', null, null, null, '38', '38', '38', '赵孔磊', '啦啦啦', '1512550982');
INSERT INTO `bj_order_comments` VALUES ('135', '2017120413303972014', '1', null, null, null, '38', '56', '38', '赵孔磊', '考虑考虑', '1512551004');
INSERT INTO `bj_order_comments` VALUES ('136', '2017120413303972014', '0', null, null, null, '38', '56', '38', '赵孔磊', '0', '1512551075');
INSERT INTO `bj_order_comments` VALUES ('137', '2017120413303972014', '1', null, null, null, '38', '56', '38', '赵孔磊', '波本', '1512551139');
INSERT INTO `bj_order_comments` VALUES ('138', '2017120610411351768', '1', null, null, null, '38', '38', '38', '赵孔磊', '空军建军节', '1512551153');
INSERT INTO `bj_order_comments` VALUES ('139', '2017120611115555068', '0', null, null, null, '47', '47', '56', '顾佳敏', '410000000', '1512554396');
INSERT INTO `bj_order_comments` VALUES ('140', '2017120610103665747', '1', null, null, null, '47', '47', '56', '顾佳敏', '10', '1512554418');
INSERT INTO `bj_order_comments` VALUES ('141', '2017120415375447591', '1', null, null, null, '59', '59', '56', '顾佳敏', '1', '1512554428');
INSERT INTO `bj_order_comments` VALUES ('142', '2017120515225933523', '1', null, null, null, '59', '59', '56', '顾佳敏', '10', '1512554436');
INSERT INTO `bj_order_comments` VALUES ('143', '2017120115572959109', '1', null, null, null, '47', '47', '56', '顾佳敏', '10', '1512554444');
INSERT INTO `bj_order_comments` VALUES ('144', '2017120709315646372', '1', null, null, null, '68', '68', '68', null, '但是法国队发挥', '1512610828');
INSERT INTO `bj_order_comments` VALUES ('145', '2017120709434985609', '1', null, null, null, '68', '68', '68', '秋寒', '辣鸡', '1512611441');
INSERT INTO `bj_order_comments` VALUES ('146', '2017120709434985609', '1', null, null, null, '68', '68', '56', '师傅_tzokjp', '哦哦', '1512611889');
INSERT INTO `bj_order_comments` VALUES ('147', '2017120710303544571', '0', null, null, null, '38', '56', '38', '10', '噢噢噢哦哦', '1512615206');
INSERT INTO `bj_order_comments` VALUES ('148', '2017120710303544571', '0', null, null, null, '38', '56', '56', '师傅_tzokjp', '我的天', '1512615408');
INSERT INTO `bj_order_comments` VALUES ('149', '2017120715210898652', '0', null, null, null, '38', '56', '38', '2222222', '0', '1512632709');
INSERT INTO `bj_order_comments` VALUES ('150', '2017120715210898652', '0', null, null, null, '38', '38', '54', '师傅_kphmvv', '空军建军节', '1512632887');
INSERT INTO `bj_order_comments` VALUES ('151', '2017120808472682390', '1', null, null, null, '68', '56', '68', '秋寒', '999', '1512694677');
INSERT INTO `bj_order_comments` VALUES ('152', '2017120713300542747', '0', null, null, null, '38', '56', '38', '2222222', '1010000000000100000000', '1512719043');
INSERT INTO `bj_order_comments` VALUES ('153', '2017120815510325171', '1', null, null, null, '68', '68', '68', '秋寒', '啦啦啦', '1512721003');
INSERT INTO `bj_order_comments` VALUES ('154', '201712081555439062', '0', null, null, null, '38', '38', '71', '哦哦哦', '心魔呢', '1512721017');
INSERT INTO `bj_order_comments` VALUES ('155', '201712081555439062', '-1', null, null, null, '38', '38', '71', '哦哦哦', '哦了了了了', '1512721629');
INSERT INTO `bj_order_comments` VALUES ('156', '2017120815510325171', '0', null, null, null, '68', '68', '56', '师傅_tzokjp', '哈哈哈哈哈哈啊', '1512721641');
INSERT INTO `bj_order_comments` VALUES ('157', '2017120816552463170', '1', null, null, null, '38', '38', '38', '2222222', '辛苦了，赵师傅', '1512723989');
INSERT INTO `bj_order_comments` VALUES ('158', '2017120816552463170', '0', null, null, null, '38', '54', '71', '哦哦哦', '哦哦OK了了', '1512724117');
INSERT INTO `bj_order_comments` VALUES ('159', '2017120816552463170', '1', null, null, null, '38', '38', '71', '哦哦哦', '兔兔了了', '1512724117');
INSERT INTO `bj_order_comments` VALUES ('160', '2017120817282688443', '0', null, null, null, '38', '38', '56', '师傅_tzokjp', 'k k', '1512726121');
INSERT INTO `bj_order_comments` VALUES ('161', '2017120817282688443', '0', null, null, null, '38', '38', '38', '2222222', '11', '1512726146');
INSERT INTO `bj_order_comments` VALUES ('162', '2017120909255694657', '1', null, null, null, '68', '68', '68', '秋寒', '玩游戏', '1512788456');
INSERT INTO `bj_order_comments` VALUES ('163', '2017120909255694657', '1', null, null, null, '68', '68', '68', '秋寒', '1', '1512788661');
INSERT INTO `bj_order_comments` VALUES ('164', '2017120909255694657', '1', '5.00', '5.00', '4.00', '68', '56', '68', '秋寒', '1111111', '1512788912');
INSERT INTO `bj_order_comments` VALUES ('165', '2017120909255694657', '0', null, null, null, '68', '68', '56', '师傅_tzokjp', '豆腐干', '1512789174');
INSERT INTO `bj_order_comments` VALUES ('166', '2017120817282688443', '-1', '3.00', '5.00', '5.00', '38', '56', '38', '2222222', 'ヾ(@^▽^@)ノ ', '1512796996');
INSERT INTO `bj_order_comments` VALUES ('167', '2017120914370562104', '1', '5.00', '5.00', '5.00', '68', '56', '68', '秋寒', '66', '1512802140');
INSERT INTO `bj_order_comments` VALUES ('168', '2017120914370562104', '1', null, null, null, '68', '68', '56', '师傅_tzokjp', '黑膜', '1512802191');

-- ----------------------------
-- Table structure for bj_order_offer
-- ----------------------------
DROP TABLE IF EXISTS `bj_order_offer`;
CREATE TABLE `bj_order_offer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL COMMENT '主订单ID',
  `sub_order_id` int(11) DEFAULT NULL COMMENT '子订单ID',
  `worker_id` int(11) DEFAULT NULL COMMENT '师傅ID',
  `worker_name` varchar(30) DEFAULT NULL COMMENT '师傅名字',
  `survey` tinyint(1) DEFAULT '0' COMMENT '是否需要现场核单 0否 1是',
  `amount` decimal(11,2) DEFAULT NULL COMMENT '报价',
  `is_selected` tinyint(1) DEFAULT '0' COMMENT '是否中标 0否 1是',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='师傅报价情况';

-- ----------------------------
-- Records of bj_order_offer
-- ----------------------------

-- ----------------------------
-- Table structure for bj_order_rating
-- ----------------------------
DROP TABLE IF EXISTS `bj_order_rating`;
CREATE TABLE `bj_order_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_id` int(11) NOT NULL COMMENT '订单ID',
  `sub_order_id` int(11) DEFAULT NULL COMMENT '子订单ID',
  `owner_id` int(11) DEFAULT NULL COMMENT '业主ID',
  `worker_id` int(11) DEFAULT NULL COMMENT '师傅ID',
  `comments_for_owner` varchar(255) DEFAULT NULL COMMENT '师傅给用户的评价',
  `comments_for_worker` varchar(255) DEFAULT NULL COMMENT '业主给师傅的评价',
  `rating_for_owner` decimal(4,2) DEFAULT NULL COMMENT '师傅给业主的评分',
  `rating_for_worker` decimal(4,2) DEFAULT NULL COMMENT '业主给师傅的评分',
  `rating_worker_attitude` decimal(4,2) DEFAULT NULL COMMENT '师傅的服务态度评分',
  `rating_worker_quality` decimal(4,2) DEFAULT NULL COMMENT '师傅的施工质量评分',
  `rating_worker_speed` decimal(4,2) DEFAULT NULL COMMENT '师傅的工作速度评分',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='订单评价，针对单条订单';

-- ----------------------------
-- Records of bj_order_rating
-- ----------------------------

-- ----------------------------
-- Table structure for bj_pay_price
-- ----------------------------
DROP TABLE IF EXISTS `bj_pay_price`;
CREATE TABLE `bj_pay_price` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `order_number` bigint(20) DEFAULT NULL COMMENT '订单号',
  `total_price` float(10,2) DEFAULT NULL COMMENT '支付总价钱',
  `consult_price` float(10,2) DEFAULT NULL COMMENT '咨询费用',
  `create_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8mb4 COMMENT='支付价钱';

-- ----------------------------
-- Records of bj_pay_price
-- ----------------------------
INSERT INTO `bj_pay_price` VALUES ('29', '2017110615352726420', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('30', '2017110615352726420', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('31', '2017110615352726420', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('32', '2017110615352726420', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('33', '2017110616082921188', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('34', '2017110616082921188', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('35', '2017110616082921188', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('36', '2017110617155799300', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('37', '2017110617155799300', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('38', '2017110617175255000', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('39', '2017110617175255000', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('40', '2017110617175255000', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('41', '2017110617280328700', '27.83', null, null);
INSERT INTO `bj_pay_price` VALUES ('42', '2017110617280328700', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('43', '2017110617361376800', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('44', '2017110617361376866', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('45', '2017110617382115915', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('46', '2017110617372963800', '7260.00', null, null);
INSERT INTO `bj_pay_price` VALUES ('47', '2017110617452577915', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('48', '2017110617452577915', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('49', '2017110617452577915', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('50', '2017110617491168304', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('51', '2017110617383228715', '27.83', null, null);
INSERT INTO `bj_pay_price` VALUES ('52', '2017110618153296877', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('53', '2017110618224171709', '41.14', null, null);
INSERT INTO `bj_pay_price` VALUES ('54', '2017110618243291313', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('55', '2017110618241287022', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('56', '2017110618344777824', '14.52', null, null);
INSERT INTO `bj_pay_price` VALUES ('57', '2017110618344777824', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('58', '2017110618361265803', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('59', '2017110618461371940', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('60', '2017110618461371940', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('61', '2017110618461371940', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('62', '2017110618461371940', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('63', '2017110618461371940', '0.00', null, null);
INSERT INTO `bj_pay_price` VALUES ('64', '2017110618461371940', '0.00', null, null);
INSERT INTO `bj_pay_price` VALUES ('65', '2017110618522890917', null, null, null);
INSERT INTO `bj_pay_price` VALUES ('66', '2017110618512321176', '148.83', null, null);
INSERT INTO `bj_pay_price` VALUES ('67', '2017110618512321176', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('68', '2017110618522890917', null, null, null);
INSERT INTO `bj_pay_price` VALUES ('69', '2017110618542138078', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('70', '2017110618543543981', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('71', '2017110618563077970', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('72', '2017110618522890917', null, '0.01', null);
INSERT INTO `bj_pay_price` VALUES ('73', '2017110619031831681', '1344.31', null, null);
INSERT INTO `bj_pay_price` VALUES ('74', '2017110619075012666', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('75', '2017110619075012666', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('76', '2017110619075012666', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('77', '201711061915371636', null, '0.01', null);
INSERT INTO `bj_pay_price` VALUES ('78', '2017110619144610716', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('79', '2017110619075012666', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('80', '2017110619075012666', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('81', '201711061915371636', null, '20.00', null);
INSERT INTO `bj_pay_price` VALUES ('82', '2017110708371367163', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('83', '201711070920381409', '0.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('84', '2017110709360042260', '1.00', '0.10', null);
INSERT INTO `bj_pay_price` VALUES ('85', '2017110709360042260', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('86', '2017110709360042260', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('87', '2017110709290237075', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('88', '2017110709425175784', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('89', '2017110709425175784', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('90', '2017110709495415361', null, '0.10', null);
INSERT INTO `bj_pay_price` VALUES ('91', '2017110709490291617', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('92', '2017110709442748758', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('93', '2017110709525024086', '1.21', null, null);
INSERT INTO `bj_pay_price` VALUES ('94', '2017110709575386065', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('95', '2017110710043183881', '0.10', '0.10', null);
INSERT INTO `bj_pay_price` VALUES ('96', '2017110710144230171', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('97', '2017110709423633212', null, '0.01', null);
INSERT INTO `bj_pay_price` VALUES ('98', '201711071021194298', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('99', '2017110710034981059', null, '0.01', null);
INSERT INTO `bj_pay_price` VALUES ('100', '2017110710243553652', null, '20.00', null);
INSERT INTO `bj_pay_price` VALUES ('101', '201711071037071242', null, '0.01', null);
INSERT INTO `bj_pay_price` VALUES ('102', '2017110710422184585', '0.01', '0.01', null);
INSERT INTO `bj_pay_price` VALUES ('103', '2017110710552355322', null, '20.00', null);
INSERT INTO `bj_pay_price` VALUES ('104', '2017110711001690759', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('105', '2017110711194625819', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('106', '2017110711243918369', '0.01', '0.01', null);
INSERT INTO `bj_pay_price` VALUES ('107', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('108', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('109', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('110', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('111', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('112', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('113', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('114', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('115', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('116', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('117', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('118', '2017110711243918369', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('119', '2017110713305285956', '0.01', '0.01', null);
INSERT INTO `bj_pay_price` VALUES ('120', '2017110713454584065', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('121', '2017110714194869630', '12.10', null, null);
INSERT INTO `bj_pay_price` VALUES ('122', '2017110714140342064', '0.01', null, null);
INSERT INTO `bj_pay_price` VALUES ('123', '2017112716144436829', null, '0.01', '1511772762');
INSERT INTO `bj_pay_price` VALUES ('124', '2017112813220146036', null, '20.00', '1511847112');
INSERT INTO `bj_pay_price` VALUES ('125', '2017112815364473845', null, '20.00', '1511854620');
INSERT INTO `bj_pay_price` VALUES ('126', '2017113013501692939', '13.31', null, null);
INSERT INTO `bj_pay_price` VALUES ('127', '2017120714361331463', null, '20.00', '1512629646');
INSERT INTO `bj_pay_price` VALUES ('128', '2017120813572978627', null, '20.00', '1512713254');

-- ----------------------------
-- Table structure for bj_phone_step
-- ----------------------------
DROP TABLE IF EXISTS `bj_phone_step`;
CREATE TABLE `bj_phone_step` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `service_type` int(10) NOT NULL COMMENT '类型对应ID',
  `service_name` varchar(32) NOT NULL COMMENT '类型对应名称',
  `stepnum` int(10) NOT NULL COMMENT '步骤总数',
  `step_id` int(10) NOT NULL COMMENT '步骤ID',
  `step_name` varchar(255) NOT NULL COMMENT '步骤名称',
  `step_link` varchar(255) DEFAULT NULL COMMENT '步骤所跳转的页面',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='订单步骤表';

-- ----------------------------
-- Records of bj_phone_step
-- ----------------------------
INSERT INTO `bj_phone_step` VALUES ('1', '1', '维修1', '9', '1', '发布订单成功', '');
INSERT INTO `bj_phone_step` VALUES ('2', '1', '维修1', '9', '2', '招募师傅', '__PUBLIC__customer_rejection/%s');
INSERT INTO `bj_phone_step` VALUES ('3', '1', '维修1', '9', '3', '订单交流讨论', '__PUBLIC__message_list/%s');
INSERT INTO `bj_phone_step` VALUES ('4', '1', '维修1', '9', '4', '去选标', '__PUBLIC__select_master/%s');
INSERT INTO `bj_phone_step` VALUES ('5', '1', '维修1', '9', '5', '去付款', '__PUBLIC__settlement/%s');
INSERT INTO `bj_phone_step` VALUES ('6', '1', '维修1', '9', '6', '师傅确认接单，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_phone_step` VALUES ('7', '1', '维修1', '9', '7', '师傅施工中', '');
INSERT INTO `bj_phone_step` VALUES ('8', '1', '维修1', '9', '8', '师傅已上传维修验收报告，请注意查看及确认 ', '__PUBLIC__client_affirm_accomplishs/%s');
INSERT INTO `bj_phone_step` VALUES ('9', '1', '维修1', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_phone_step` VALUES ('10', '2', '维修2(众包咨询)', '9', '1', '发布订单成功', '');
INSERT INTO `bj_phone_step` VALUES ('11', '2', '维修2(众包咨询)', '9', '2', '挑主任师傅', '__PUBLIC__screen/%s/zt/1');
INSERT INTO `bj_phone_step` VALUES ('12', '2', '维修2(众包咨询)', '9', '3', '咨询主任师傅', '__PUBLIC__director_master/%s/wid/%s');
INSERT INTO `bj_phone_step` VALUES ('13', '2', '维修2(众包咨询)', '9', '4', '增加普通师傅', '');
INSERT INTO `bj_phone_step` VALUES ('14', '2', '维修2(众包咨询)', '9', '5', '您已挑选好师傅，请选择付款 ', ' __PUBLIC__settlement/%s');
INSERT INTO `bj_phone_step` VALUES ('15', '2', '维修2(众包咨询)', '9', '6', '已经付款，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_phone_step` VALUES ('16', '2', '维修2(众包咨询)', '9', '7', '师傅施工中', '');
INSERT INTO `bj_phone_step` VALUES ('17', '2', '维修2(众包咨询)', '9', '8', '师傅已上传维修施工报告，请注意查看及确认', '__PUBLIC__client_affirm_accomplishs/%s');
INSERT INTO `bj_phone_step` VALUES ('18', '2', '维修2(众包咨询)', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_phone_step` VALUES ('19', '3', '安装1', '9', '1', '发布订单成功', '');
INSERT INTO `bj_phone_step` VALUES ('20', '3', '安装1', '9', '2', '招募师傅', '__PUBLIC__install_jilt_single/%s');
INSERT INTO `bj_phone_step` VALUES ('21', '3', '安装1', '9', '3', '订单交流讨论', '__PUBLIC__install_message_pairing/%s');
INSERT INTO `bj_phone_step` VALUES ('22', '3', '安装1', '9', '4', '去选标', '__PUBLIC__install_message_pairing/%s');
INSERT INTO `bj_phone_step` VALUES ('23', '3', '安装1', '9', '5', '去付款', '__PUBLIC__install_settlement/%s/url/0');
INSERT INTO `bj_phone_step` VALUES ('24', '3', '安装1', '9', '6', '师傅确认接单，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_phone_step` VALUES ('25', '3', '安装1', '9', '7', '师傅施工中', '');
INSERT INTO `bj_phone_step` VALUES ('26', '3', '安装1', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_phone_step` VALUES ('27', '3', '安装1', '9', '8', '师傅已上传安装验收报告，请注意查看及确认 ', '__PUBLIC__kehuqurenbiao/%s');
INSERT INTO `bj_phone_step` VALUES ('28', '4', '安装2(众包咨询)', '0', '1', '发布订单成功', null);
INSERT INTO `bj_phone_step` VALUES ('29', '4', '安装2(众包咨询)', '9', '2', '挑主任师傅', '__PUBLIC__master_filters/%s/cid/choose_wid/sid/0');
INSERT INTO `bj_phone_step` VALUES ('30', '4', '安装2(众包咨询)', '9', '3', '咨询主任师傅', '__PUBLIC__install_director_master/%s/wid/%s');
INSERT INTO `bj_phone_step` VALUES ('31', '4', '安装2(众包咨询)', '9', '4', '增加普通师傅', '__PUBLIC__common_master/%s/wid/0');
INSERT INTO `bj_phone_step` VALUES ('32', '4', '安装2(众包咨询)', '9', '5', '您已挑选好师傅，请选择付款 ', '__PUBLIC__install_settlement/%s/url/0');
INSERT INTO `bj_phone_step` VALUES ('33', '4', '安装2(众包咨询)', '9', '6', '已经付款，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_phone_step` VALUES ('34', '4', '安装2(众包咨询)', '9', '7', '师傅施工中', '');
INSERT INTO `bj_phone_step` VALUES ('35', '4', '安装2(众包咨询)', '9', '8', '师傅已上传安装施工报告，请注意查看及确认', '__PUBLIC__kehuqurenbiao/%s');
INSERT INTO `bj_phone_step` VALUES ('36', '4', '安装2(众包咨询)', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_phone_step` VALUES ('37', '5', '勘测', '7', '1', '发布订单成功，请耐心等待平台为你估价', null);
INSERT INTO `bj_phone_step` VALUES ('38', '5', '勘测', '7', '2', '平台已估价，请选择付款', '__PUBLIC__ds_survey_payment/%s');
INSERT INTO `bj_phone_step` VALUES ('39', '5', '勘测', '7', '3', '您已付款成功，请随时保持电话顺畅，师傅将在两小时内联系您', null);
INSERT INTO `bj_phone_step` VALUES ('40', '5', '勘测', '7', '4', '师傅正在施工', null);
INSERT INTO `bj_phone_step` VALUES ('41', '5', '勘测', '7', '5', '亲爱的客户，师傅已经上传勘测手稿，请注意查看及确认', '__PUBLIC__customer_survey_manuscript/%s');
INSERT INTO `bj_phone_step` VALUES ('42', '5', '勘测', '7', '6', '师傅已上传勘测施工报告，请注意查收及确认报告', '__PUBLIC__survey_customer_presentation/%s');
INSERT INTO `bj_phone_step` VALUES ('43', '5', '勘测', '7', '7', '已确认报告，订单完成，感谢您对标匠的信任，期待再次与您合作', null);
INSERT INTO `bj_phone_step` VALUES ('45', '8', '围板搭建1', '9', '1', '发布订单成功', '');
INSERT INTO `bj_phone_step` VALUES ('46', '8', '围板搭建1', '9', '2', '招募师傅', '__PUBLIC__coaming_jilt_single/%s');
INSERT INTO `bj_phone_step` VALUES ('47', '8', '围板搭建1', '9', '3', '订单交流讨论', '__PUBLIC__coaming_message_pairing/%s');
INSERT INTO `bj_phone_step` VALUES ('48', '8', '围板搭建1', '9', '4', '去选标', '__PUBLIC__coaming_message_pairing/%s');
INSERT INTO `bj_phone_step` VALUES ('49', '8', '围板搭建1', '9', '5', '去付款', '__PUBLIC__coaming_settlement/%s/url/0');
INSERT INTO `bj_phone_step` VALUES ('50', '8', '围板搭建1', '9', '6', '师傅确认接单，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_phone_step` VALUES ('51', '8', '围板搭建1', '9', '7', '师傅施工中', '');
INSERT INTO `bj_phone_step` VALUES ('52', '8', '围板搭建1', '9', '8', '师傅已上传围板搭建验收报告，请注意查看及确认 ', '__PUBLIC__coaming_customer_presentation/%s');
INSERT INTO `bj_phone_step` VALUES ('53', '8', '围板搭建1', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_phone_step` VALUES ('54', '9', '围板搭建2(众包咨询)', '0', '1', '发布订单成功', '');
INSERT INTO `bj_phone_step` VALUES ('55', '9', '围板搭建2(众包咨询)', '9', '2', '挑主任师傅', '__PUBLIC__master_filters/%s/cid/choose_coaming/sid/0');
INSERT INTO `bj_phone_step` VALUES ('56', '9', '围板搭建2(众包咨询)', '9', '3', '咨询主任师傅', '__PUBLIC__coaming_director_master/%s/wid/%s');
INSERT INTO `bj_phone_step` VALUES ('57', '9', '围板搭建2(众包咨询)', '9', '4', '增加普通师傅', '__PUBLIC__common_master/%s/wid/0');
INSERT INTO `bj_phone_step` VALUES ('58', '9', '围板搭建2(众包咨询)', '9', '5', '您已挑选好师傅，请选择付款 ', '__PUBLIC__coaming_settlement/%s/url/0');
INSERT INTO `bj_phone_step` VALUES ('59', '9', '围板搭建2(众包咨询)', '9', '6', '已经付款，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_phone_step` VALUES ('60', '9', '围板搭建2(众包咨询)', '9', '7', '师傅施工中', '');
INSERT INTO `bj_phone_step` VALUES ('61', '9', '围板搭建2(众包咨询)', '9', '8', '师傅已上传围板搭建施工报告，请注意查看及确认', '__PUBLIC__coaming_customer_presentation/%s');
INSERT INTO `bj_phone_step` VALUES ('62', '9', '围板搭建2(众包咨询)', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_phone_step` VALUES ('63', '6', '更换灯片1', '9', '1', '发布订单成功', null);
INSERT INTO `bj_phone_step` VALUES ('64', '6', '更换灯片1', '9', '2', '招募师傅', '__PUBLIC__gjmjilt_single/%s');
INSERT INTO `bj_phone_step` VALUES ('65', '6', '更换灯片1', '9', '3', '订单交流讨论', '__PUBLIC__gjmjilt_single/%s');
INSERT INTO `bj_phone_step` VALUES ('66', '6', '更换灯片1', '9', '4', '去选标', '__PUBLIC__gjmjilt_single/%s');
INSERT INTO `bj_phone_step` VALUES ('67', '6', '更换灯片1', '9', '5', '去付款', null);
INSERT INTO `bj_phone_step` VALUES ('68', '6', '更换灯片1', '9', '6', '师傅确认接单，请随时保持通话顺畅，师傅将在2小时内联系您', null);
INSERT INTO `bj_phone_step` VALUES ('69', '6', '更换灯片1', '9', '7', '师傅施工中', null);
INSERT INTO `bj_phone_step` VALUES ('70', '6', '更换灯片1', '9', '8', '师傅已上传更换灯片验收报告，请注意查看及确认 ', '__PUBLIC__replace_customer_presentation/%s');
INSERT INTO `bj_phone_step` VALUES ('71', '6', '更换灯片1', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', null);
INSERT INTO `bj_phone_step` VALUES ('72', '7', '更换灯片2(众包咨询', '9', '1', '发布订单成功', null);
INSERT INTO `bj_phone_step` VALUES ('73', '7', '更换灯片2(众包咨询', '9', '2', '挑主任师傅', '__PUBLIC__master_filters/%s/cid/gjmchoose_wid/sid/0');
INSERT INTO `bj_phone_step` VALUES ('74', '7', '更换灯片2(众包咨询', '9', '3', '咨询主任师傅', '__PUBLIC__gjminstall_director_master/%s/wid/%s');
INSERT INTO `bj_phone_step` VALUES ('75', '7', '更换灯片2(众包咨询', '9', '4', '增加普通师傅', '__PUBLIC__common_master/%s/wid/0');
INSERT INTO `bj_phone_step` VALUES ('76', '7', '更换灯片2(众包咨询', '9', '5', '您已挑选好师傅，请选择付款 ', '__PUBLIC__settlements/%s/url/0');
INSERT INTO `bj_phone_step` VALUES ('77', '7', '更换灯片2(众包咨询', '9', '6', '已经付款，请随时保持通话顺畅，师傅将在2小时内联系您', null);
INSERT INTO `bj_phone_step` VALUES ('78', '7', '更换灯片2(众包咨询', '9', '7', '师傅施工中', null);
INSERT INTO `bj_phone_step` VALUES ('79', '7', '更换灯片2(众包咨询', '9', '8', '师傅已上传更换灯片施工报告，请注意查看及确认', '__PUBLIC__replace_customer_presentation/%s');
INSERT INTO `bj_phone_step` VALUES ('80', '7', '更换灯片2(众包咨询', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', null);

-- ----------------------------
-- Table structure for bj_phone_workstep
-- ----------------------------
DROP TABLE IF EXISTS `bj_phone_workstep`;
CREATE TABLE `bj_phone_workstep` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `service_type` tinyint(1) NOT NULL COMMENT '类型对应ID',
  `service_name` varchar(32) NOT NULL COMMENT '类型对应名称',
  `stepnum` tinyint(1) NOT NULL COMMENT '步骤总数',
  `step_id` tinyint(1) NOT NULL COMMENT '步骤ID',
  `step_name` varchar(255) NOT NULL COMMENT '步骤名称',
  `step_link` varchar(50) DEFAULT NULL,
  `step_onclick` varchar(32) DEFAULT NULL COMMENT '点击事件ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='师傅步骤表';

-- ----------------------------
-- Records of bj_phone_workstep
-- ----------------------------
INSERT INTO `bj_phone_workstep` VALUES ('1', '1', '师傅维修1', '7', '1', '抢单成功，查看订单', null, null);
INSERT INTO `bj_phone_workstep` VALUES ('2', '1', '师傅维修1', '7', '2', '请您在2小时内联系客户并确认前往维修地点的时间(电话联系)', null, 'work_contact_customer');
INSERT INTO `bj_phone_workstep` VALUES ('3', '1', '师傅维修1', '7', '3', '您已到达客户指定的地点，点击签到', null, 'work_sign');
INSERT INTO `bj_phone_workstep` VALUES ('4', '1', '师傅维修1', '7', '4', '现场核实报告填写', null, 'work_hedan');
INSERT INTO `bj_phone_workstep` VALUES ('5', '1', '师傅维修1', '7', '5', '维修完成！请填写维修施工表', null, 'work_weixiu');
INSERT INTO `bj_phone_workstep` VALUES ('6', '1', '师傅维修1', '7', '6', '已确认报告，完成订单，点击签退', null, 'work_sign_out');
INSERT INTO `bj_phone_workstep` VALUES ('8', '2', '师傅维修2（众包咨询）', '9', '1', '客户点单咨询，请前往查看', '', 'work_zixun_wei');
INSERT INTO `bj_phone_workstep` VALUES ('9', '2', '师傅维修2（众包咨询）', '9', '2', '客户付费咨询，请及时回复 并保持电话畅通', null, null);
INSERT INTO `bj_phone_workstep` VALUES ('10', '2', '师傅维修2（众包咨询）', '9', '3', '等待客户下单', null, null);
INSERT INTO `bj_phone_workstep` VALUES ('11', '2', '师傅维修2（众包咨询）', '9', '4', '咨询结束', null, null);
INSERT INTO `bj_phone_workstep` VALUES ('12', '2', '师傅维修2（众包咨询）', '9', '5', '客户付款,请您在2小时内联系客户并确认前往维修地点的时间（电话联系）', null, 'work_contact_customer');
INSERT INTO `bj_phone_workstep` VALUES ('13', '2', '师傅维修2（众包咨询）', '9', '6', '您已到达客户指定的地点，点击签到', null, 'work_sign');
INSERT INTO `bj_phone_workstep` VALUES ('14', '2', '师傅维修2（众包咨询）', '9', '7', '现场核实报告填写', null, 'work_hedan');
INSERT INTO `bj_phone_workstep` VALUES ('15', '2', '师傅维修2（众包咨询）', '9', '8', '维修完成！填写维修施工表', null, 'work_weixiu');
INSERT INTO `bj_phone_workstep` VALUES ('16', '2', '师傅维修2（众包咨询）', '9', '9', '已确认报告，完成订单，点击签退', null, 'work_sign_out');
INSERT INTO `bj_phone_workstep` VALUES ('17', '3', '师傅安装1', '7', '1', '抢单成功，查看订单', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('18', '3', '师傅安装1', '7', '2', '请您在2小时内联系客户并确认前往维修地点的时间(电话联系)', '', 'work_contact_customer');
INSERT INTO `bj_phone_workstep` VALUES ('19', '3', '师傅安装1', '7', '3', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_phone_workstep` VALUES ('20', '3', '师傅安装1', '7', '4', '现场核实报告填写', '', 'install_work_hedan');
INSERT INTO `bj_phone_workstep` VALUES ('21', '3', '师傅安装1', '7', '5', '安装完成！请填写安装施工表', '', 'work_anzhuang');
INSERT INTO `bj_phone_workstep` VALUES ('22', '3', '师傅安装1', '7', '6', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_phone_workstep` VALUES ('23', '4', '师傅安装2（众包咨询）', '9', '1', '客户点单咨询，请前往查看', '', 'work_zixun_cha');
INSERT INTO `bj_phone_workstep` VALUES ('24', '4', '师傅安装2（众包咨询）', '9', '2', '客户付费咨询，请及时回复 并保持电话畅通', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('25', '4', '师傅安装2（众包咨询）', '9', '3', '等待客户下单', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('26', '4', '师傅安装2（众包咨询）', '9', '4', '咨询结束', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('27', '4', '师傅安装2（众包咨询）', '9', '5', '客户付款,请您在2小时内联系客户并确认前往维修地点的时间（电话联系）', '', 'work_contact_customer');
INSERT INTO `bj_phone_workstep` VALUES ('28', '4', '师傅安装2（众包咨询）', '9', '6', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_phone_workstep` VALUES ('29', '4', '师傅安装2（众包咨询）', '9', '7', '现场核实报告填写', '', 'install_work_hedan');
INSERT INTO `bj_phone_workstep` VALUES ('30', '4', '师傅安装2（众包咨询）', '9', '8', '安装完成！填写安装施工表', '', 'work_anzhuang');
INSERT INTO `bj_phone_workstep` VALUES ('31', '4', '师傅安装2（众包咨询）', '9', '9', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_phone_workstep` VALUES ('33', '8', '师傅围板搭建1', '7', '1', '抢单成功，查看订单', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('34', '8', '师傅围板搭建1', '7', '2', '请您在2小时内联系客户并确认前往维修地点的时间(电话联系)', '', 'work_contact_customer');
INSERT INTO `bj_phone_workstep` VALUES ('35', '8', '师傅围板搭建1', '7', '3', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_phone_workstep` VALUES ('36', '8', '师傅围板搭建1', '7', '4', '现场核实报告填写', '', 'coaming_work_hedan');
INSERT INTO `bj_phone_workstep` VALUES ('37', '8', '师傅围板搭建1', '7', '5', '围板搭建完成！填写围板搭建施工表', '', 'work_weiban');
INSERT INTO `bj_phone_workstep` VALUES ('38', '8', '师傅围板搭建1', '7', '6', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_phone_workstep` VALUES ('39', '9', '师傅围板搭建2（众包咨询）', '9', '1', '客户点单咨询，请前往查看', '', 'work_zixun_ban');
INSERT INTO `bj_phone_workstep` VALUES ('40', '9', '师傅围板搭建2（众包咨询）', '9', '2', '客户付费咨询，请及时回复 并保持电话畅通', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('41', '9', '师傅围板搭建2（众包咨询）', '9', '3', '等待客户下单', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('42', '9', '师傅围板搭建2（众包咨询）', '9', '4', '咨询结束', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('43', '9', '师傅围板搭建2（众包咨询）', '9', '5', '客户付款,请您在2小时内联系客户并确认前往维修地点的时间（电话联系）', '', 'work_contact_customer');
INSERT INTO `bj_phone_workstep` VALUES ('44', '9', '师傅围板搭建2（众包咨询）', '9', '6', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_phone_workstep` VALUES ('45', '9', '师傅围板搭建2（众包咨询）', '9', '7', '现场核实报告填写', '', 'coaming_work_hedan');
INSERT INTO `bj_phone_workstep` VALUES ('46', '9', '师傅围板搭建2（众包咨询）', '9', '8', '围板搭建完成！填写围板搭建施工表', '', 'work_weiban');
INSERT INTO `bj_phone_workstep` VALUES ('47', '9', '师傅围板搭建2（众包咨询）', '9', '9', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_phone_workstep` VALUES ('49', '6', '更换灯片1', '7', '1', '抢单成功，查看订单', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('50', '6', '更换灯片1', '7', '2', '请您在2小时内联系客户并确认前往维修地点的时间(电话联系', '', 'work_contact_customer');
INSERT INTO `bj_phone_workstep` VALUES ('51', '6', '更换灯片1', '7', '3', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_phone_workstep` VALUES ('52', '6', '更换灯片1', '7', '4', '现场核实报告填写', '', 'gjmcoaming_work_hedan');
INSERT INTO `bj_phone_workstep` VALUES ('53', '6', '更换灯片1', '7', '5', '更换灯片完成！请填写更幻灯片施工表', '', 'work_genghuan');
INSERT INTO `bj_phone_workstep` VALUES ('54', '6', '更换灯片1', '7', '6', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_phone_workstep` VALUES ('55', '7', '更换灯片2(众包咨询)', '9', '1', '客户点单咨询，请前往查看', '', 'work_zixun_change');
INSERT INTO `bj_phone_workstep` VALUES ('56', '7', '更换灯片2(众包咨询)', '9', '2', '客户付费咨询，请及时回复 并保持电话畅通', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('57', '7', '更换灯片2(众包咨询)', '9', '3', '等待客户下单', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('58', '7', '更换灯片2(众包咨询)', '9', '4', '咨询结束', '', '');
INSERT INTO `bj_phone_workstep` VALUES ('59', '7', '更换灯片2(众包咨询)', '9', '5', '客户付款,请您在2小时内联系客户并确认前往维修地点的时间（电话联系）', '', 'work_contact_customer');
INSERT INTO `bj_phone_workstep` VALUES ('60', '7', '更换灯片2(众包咨询)', '9', '6', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_phone_workstep` VALUES ('61', '7', '更换灯片2(众包咨询)', '9', '7', '现场核实报告填写', '', 'gjmcoaming_work_hedan');
INSERT INTO `bj_phone_workstep` VALUES ('62', '7', '更换灯片2(众包咨询)', '9', '8', '更换灯片完成！填写更换灯片施工表', '', 'work_genghuan');
INSERT INTO `bj_phone_workstep` VALUES ('63', '7', '更换灯片2(众包咨询)', '9', '9', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_phone_workstep` VALUES ('64', '5', '勘测', '6', '1', '接单成功', null, null);
INSERT INTO `bj_phone_workstep` VALUES ('65', '5', '勘测', '6', '2', '请您在2小时内联系客户并确认前往客户指定地点的时间', null, 'work_contact_customer');
INSERT INTO `bj_phone_workstep` VALUES ('66', '5', '勘测', '6', '3', '您已到达客户指定的地点，点击签到', null, 'work_sign');
INSERT INTO `bj_phone_workstep` VALUES ('67', '5', '勘测', '6', '4', '你还未上传勘测手稿，点击上传', null, 'work_manuscript');
INSERT INTO `bj_phone_workstep` VALUES ('68', '5', '勘测', '6', '5', '勘测完成，请填写勘测施工报告', null, 'work_presentation');
INSERT INTO `bj_phone_workstep` VALUES ('69', '5', '勘测', '6', '6', '客户已查看及确认勘测施工报告，点击签退', null, 'work_sign_out');

-- ----------------------------
-- Table structure for bj_proposal
-- ----------------------------
DROP TABLE IF EXISTS `bj_proposal`;
CREATE TABLE `bj_proposal` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `uid` int(10) DEFAULT NULL COMMENT '反馈者ID',
  `content` text NOT NULL COMMENT '投诉建议内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='投诉建议表';

-- ----------------------------
-- Records of bj_proposal
-- ----------------------------

-- ----------------------------
-- Table structure for bj_recharge
-- ----------------------------
DROP TABLE IF EXISTS `bj_recharge`;
CREATE TABLE `bj_recharge` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `money` float(10,2) DEFAULT NULL COMMENT '充值金额',
  `uid` int(10) DEFAULT NULL COMMENT '充值者ID',
  `create_time` int(10) DEFAULT NULL COMMENT '充值时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='充值表';

-- ----------------------------
-- Records of bj_recharge
-- ----------------------------
INSERT INTO `bj_recharge` VALUES ('1', '0.00', '34', '1509952960');
INSERT INTO `bj_recharge` VALUES ('2', '0.00', '34', '1509953042');
INSERT INTO `bj_recharge` VALUES ('3', '10.00', '34', '1509953270');
INSERT INTO `bj_recharge` VALUES ('4', '0.00', '34', '1509953297');
INSERT INTO `bj_recharge` VALUES ('5', '0.00', '34', '1509953316');
INSERT INTO `bj_recharge` VALUES ('6', '1.00', '34', '1509953717');
INSERT INTO `bj_recharge` VALUES ('7', '1.00', '34', '1509954699');
INSERT INTO `bj_recharge` VALUES ('8', '10.00', '34', '1509954806');
INSERT INTO `bj_recharge` VALUES ('9', '1.00', '34', '1509954845');
INSERT INTO `bj_recharge` VALUES ('10', '0.00', '34', '1509955096');
INSERT INTO `bj_recharge` VALUES ('11', '1.00', '34', '1509955106');
INSERT INTO `bj_recharge` VALUES ('12', '0.01', '34', '1509955347');

-- ----------------------------
-- Table structure for bj_replace
-- ----------------------------
DROP TABLE IF EXISTS `bj_replace`;
CREATE TABLE `bj_replace` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_number` varchar(40) DEFAULT NULL COMMENT ' 订单号',
  `appointment_time` int(11) DEFAULT NULL COMMENT '预约施工时间',
  `customer_name` varchar(30) DEFAULT NULL COMMENT '联系人',
  `contact_phone` int(11) DEFAULT NULL COMMENT '当前订单联系人的手机号',
  `province` varchar(20) DEFAULT NULL COMMENT '店铺地址 省',
  `market_cer` varchar(50) DEFAULT NULL COMMENT '商城名称',
  `city` varchar(20) DEFAULT NULL COMMENT '店铺地址 市',
  `district` varchar(20) DEFAULT NULL COMMENT '店铺地址 区',
  `address` varchar(30) DEFAULT NULL COMMENT '详细地址',
  `brand` varchar(30) DEFAULT NULL COMMENT '品牌',
  `space` tinyint(1) DEFAULT NULL COMMENT '空间位置 0室内   1室外',
  `shop` tinyint(1) DEFAULT NULL COMMENT '是否己到店 0到店   1未到店',
  `img_describe` varchar(60) DEFAULT NULL COMMENT '商品图片',
  `material` tinyint(1) DEFAULT NULL COMMENT '画片材质    0玻璃/亚克力夹画   1弹簧佳画   2橱窗灯布   3写真贴画',
  `length` int(255) DEFAULT NULL COMMENT '画面长',
  `wide` int(255) DEFAULT NULL COMMENT '画面宽',
  `high` int(255) DEFAULT NULL COMMENT '画面高',
  `comments` varchar(255) DEFAULT NULL COMMENT '特殊要求',
  `img_describe2` varchar(60) DEFAULT NULL COMMENT '上传电子表格',
  `tender` tinyint(1) DEFAULT NULL COMMENT '是否需要师傅现场勘测地形  0需要  1不需要',
  `hight` tinyint(1) DEFAULT NULL COMMENT '是否具备等高条件 0脚手架  1 梯子 2不具备',
  `num` int(10) DEFAULT NULL COMMENT '选择施工个数',
  `img_describe3` varchar(60) DEFAULT NULL COMMENT '更换画面验收单',
  `departure_permit` tinyint(1) DEFAULT NULL COMMENT '商场办证:1师傅代办2客户办理 3不需要办证',
  `photo_store` varchar(60) DEFAULT NULL COMMENT '门头照片',
  `start_time` int(11) DEFAULT NULL COMMENT '预计到店起初时间',
  `end_time` int(11) DEFAULT NULL COMMENT '预计到店结束时间',
  `orders_number` int(40) DEFAULT NULL COMMENT '快递订单号',
  `budget` decimal(11,2) DEFAULT NULL COMMENT '预算费用',
  `tender_cost` decimal(10,2) DEFAULT NULL COMMENT '师傅投标费用',
  `comment` varchar(255) DEFAULT NULL COMMENT '招募留言',
  `tend` tinyint(1) DEFAULT NULL COMMENT '招标是否显示预算价  0 不显示  1 显示',
  `worker_id` int(11) DEFAULT NULL COMMENT '师傅ID',
  `service_type_id` int(4) DEFAULT NULL COMMENT '服务类型',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bj_replace
-- ----------------------------
INSERT INTO `bj_replace` VALUES ('166', '2017110616263061565', '1510043031', '顾家敏', '2147483647', '河北省', '阿斯顿', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', '0368c201711061625559761.jpg', '0', '1', '1', '1', '1', 'ad098201711061626046285.jpg', '0', '1', '1', '00dcb201711061626267914.jpg', '1', '', '1510043040', null, '2147483647', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('167', '2017110616263061565', '1510043031', '顾家敏', '2147483647', '河北省', '阿斯顿', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', 'dae39201711061626122498.jpg', '1', '2', '2', '2', '2', '7954d201711061626181399.jpg', '0', '1', '1', '00dcb201711061626267914.jpg', '1', '', '1510043040', null, '2147483647', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('168', '2017110616345153688', '1510821143', '顾家敏', '2147483647', '河北省', 'xzc ', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '199ef201711061634326699.jpg', '0', '1', '1', '1', '1', '6330a201711061634381417.jpg', '0', '1', '1', '', '1', '79577201711061634469044.jpg', '0', null, '2147483647', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('169', '2017110616345153688', '1510821143', '顾家敏', '2147483647', '河北省', 'xzc ', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '5680d201711061634336147.jpg', '1', '2', '2', '2', '2', '86afb201711061634428639.jpg', '0', '1', '1', '', '1', '79577201711061634469044.jpg', '0', null, '2147483647', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('170', '2017110616375791272', '1510130215', '10', '2147483647', '天津市', '大润发', '天津市', '河北区', '1000000000', '阿玛尼', '1', '0', '725df201711061637258883.jpg', '1', '25', '52', '28', '', 'a1c07201711061637563383.png', '1', '1', '5', 'ca2b920171106163733853.png', '1', '15f5d201711061637378001.png', '0', null, '2147483647', '10000.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('171', '2017110617040287188', '1509958910', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '1', '0', '9d416201711061703391086.jpg', '1', '1', '1', '1', '1', '4656f201711061703448514.jpg', '0', '1', '1', '', '1', '2b7ca2017110617035699.jpg', '0', null, '1', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('172', '2017110617040287188', '1509958910', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '1', '0', 'eb926201711061703451566.jpg', '0', '2', '2', '2', '2', 'ed90c201711061703517753.jpg', '0', '1', '1', '', '1', '2b7ca2017110617035699.jpg', '0', null, '1', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('173', '2017110617185928284', '1510046203', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '1', '0', '5a2cb201711061718361573.jpg', '0', '1', '1', '1', '1', 'c60e3201711061718417544.jpg', '0', '1', '1', '7f988201711061718578712.jpg', '1', '28ee9201711061718541021.jpg', '0', null, '1234569878', '0.00', '11.00', '施工工具齐全,无需师傅携带工具', '1', '35', '5');
INSERT INTO `bj_replace` VALUES ('174', '2017110617185928284', '1510046203', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '1', '0', '29f5f201711061718431636.jpg', '1', '2', '2', '2', '2', '8675c2017110617184915.jpg', '0', '1', '1', '7f988201711061718578712.jpg', '1', '28ee9201711061718541021.jpg', '0', null, '1234569878', '0.00', '12.00', '施工工具齐全,无需师傅携带工具', '1', '35', '5');
INSERT INTO `bj_replace` VALUES ('175', '2017110617280328775', '1509960355', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '6fab1201711061727439111.jpg', '0', '1', '1', '1', '1', 'a8d1b201711061727478320.jpg', '0', '1', '1', '', '1', 'f6948201711061728004029.jpg', '0', null, '1', '0.00', '11.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('176', '2017110617280328775', '1509960355', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '0c4ff201711061727509098.jpg', '1', '3', '3', '3', '3', 'adeee201711061727556188.jpg', '0', '1', '1', '', '1', 'f6948201711061728004029.jpg', '0', null, '1', '0.00', '12.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('177', '2017110617383228715', '1509960977', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '9c0d4201711061738046538.jpg', '0', '1', '1', '1', '1', 'a48ef20171106173817216.jpg', '0', '1', '1', '', '1', '893c9201711061738295442.jpg', '0', null, '1', '0.00', '12.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('178', '2017110617383228715', '1509960977', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '20cb2201711061738111290.jpg', '0', '2', '2', '2', '2', '9c582201711061738219553.jpg', '0', '1', '1', '', '1', '893c9201711061738295442.jpg', '0', null, '1', '0.00', '11.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('179', '2017110618224171709', '1510050035', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', 'd9af8201711061822212575.jpg', '1', '1', '1', '1', '1', '98b2e201711061822266737.jpg', '0', '1', '1', '', '1', '769ed20171106182239455.jpg', '0', null, '1111', '0.00', '12.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('180', '2017110618224171709', '1510050035', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '73365201711061822287507.jpg', '0', '2', '2', '2', '2', 'f7476201711061822339126.jpg', '0', '1', '1', '', '1', '769ed20171106182239455.jpg', '0', null, '1111', '0.00', '22.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('181', '2017110618243291313', '1510050156', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '1', '0', '374dc201711061824228641.jpg', '0', '1', '1', '1', '1', 'f290c20171106182426425.jpg', '0', '1', '0', '', '1', 'fbc78201711061824319341.jpg', '0', null, '1', '1.00', '12.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('182', '2017110618333656763', '1510050694', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '9f473201711061833204245.jpg', '0', '1', '1', '1', '1', '2c4c6201711061833236680.jpg', '0', '0', '1', '8eabb201711061833319769.jpg', '2', '', '0', null, '111', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('183', '2017110618344777824', '1510137167', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '88391201711061834312910.jpg', '0', '2', '2', '2', '2', 'fa6e1201711061834357419.jpg', '0', '1', '1', '186a4201711061834437845.jpg', '1', 'f2ebd201711061834402723.jpg', '0', null, '1', '0.00', '12.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('184', '2017110618361265803', '1510050855', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '63dd1201711061836012174.jpg', '0', '2', '2', '2', '2', '2bda8201711061836031349.jpg', '0', '0', '1', '', '2', 'ee491201711061836092159.jpg', '0', null, '1', '0.00', '12.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('185', '2017110618483390548', '1510224265', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '07cdd201711061846148648.jpg', '0', '1', '1', '1', '1', 'ec3e5201711061846188237.jpg', '0', '1', '1', '', '1', 'd5a7d201711061846244993.jpg', '0', null, '123456789', null, null, null, null, null, '5');
INSERT INTO `bj_replace` VALUES ('186', '2017110618512321176', '1510224548', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', 'cf045201711061850569494.jpg', '0', '1', '1', '1', '1', '3a4d6201711061850593051.jpg', '1', '1', '1', 'db0be201711061851144759.jpg', '2', 'd737320171106185117672.jpg', '0', null, '1111', null, '0.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('187', '2017110618512321176', '1510224548', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '47a3620171106185103288.jpg', '1', '2', '2', '2', '2', 'c49d0201711061851082407.jpg', '1', '1', '1', 'db0be201711061851144759.jpg', '2', 'd737320171106185117672.jpg', '0', null, '1111', null, '0.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('188', '2017110618542138078', '1510051921', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', 'fdf48201711061853504858.jpg', '0', '1', '1', '1', '1', '6f36c201711061853554086.jpg', '0', '1', '1', '', '1', 'adad3201711061854116006.jpg', '0', null, '123456789', null, '23.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('189', '2017110618542138078', '1510051921', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '53394201711061853573826.jpg', '1', '2', '2', '2', '2', '865cf201711061854023791.jpg', '0', '1', '1', '', '1', 'adad3201711061854116006.jpg', '0', null, '123456789', null, '23.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('190', '2017110709290237075', '1510017973', '顾家敏', '2147483647', '河北省', '阿斯顿', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', '1a747201711070928094405.jpg', '1', '1', '1', '1', '士大夫发生', 'f002e201711070928174793.jpg', '0', '1', '3', '59282201711070928445040.jpg', '2', 'fd1d5201711070928498867.jpg', '1510363560', null, '2147483647', '0.00', '11.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('191', '2017110709290237075', '1510017973', '顾家敏', '2147483647', '河北省', '阿斯顿', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', 'ed0af201711070928203446.jpg', '0', '33', '3', '3', '3', '03709201711070928267609.jpg', '0', '1', '3', '59282201711070928445040.jpg', '2', 'fd1d5201711070928498867.jpg', '1510363560', null, '2147483647', '0.00', '21.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('192', '2017110709490291617', '1510105620', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '9acb4201711070948484205.jpg', '0', '1', '1', '1', '1', '5052c201711070948516959.jpg', '0', '0', '1', '', '1', '1e04b201711070948571490.jpg', '0', null, '1', '11.00', '12.00', '施工工具齐全,无需师傅携带工具', '1', '35', '5');
INSERT INTO `bj_replace` VALUES ('193', '2017110710034981059', '1510106489', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '5cff7201711071003206363.jpg', '0', '1', '1', '1', '1', '60946201711071003452871.jpg', '0', '1', '1', 'fa1bf20171107100340814.jpg', '1', '22f47201711071003385391.jpg', '0', null, '1115485485', null, '12.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('194', '2017110710034981059', '1510106489', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '2e877201711071003281788.jpg', '1', '2', '2', '2', '2', '5236e201711071003474792.jpg', '0', '1', '1', 'fa1bf20171107100340814.jpg', '1', '22f47201711071003385391.jpg', '0', null, '1115485485', null, '13.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('195', '2017110710170037575', '1510106264', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '27da220171107100010825.jpg', '0', '1', '1', '1', '11', 'ad790201711071016497453.jpg', '0', '1', '1', '', '1', 'a53ac201711071016561948.jpg', '0', null, '1234569875', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('196', '2017110710170037575', '1510106264', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '29ac9201711071000181537.jpg', '1', '1', '1', '1', '1', '9bf06201711071016513303.jpg', '0', '1', '1', '', '1', 'a53ac201711071016561948.jpg', '0', null, '1234569875', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('197', '201711071021194298', '1510021147', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', 'e42c5201711071020551013.jpg', '1', '1', '1', '1', '1', '294ce201711071020588667.jpg', '0', '1', '1', '9616e201711071021079834.jpg', '1', '3b757201711071021024566.jpg', '0', null, '1', '0.00', '12.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('198', '2017110710555653527', '1510106489', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '5cff7201711071003206363.jpg', '0', '1', '1', '1', '1', '60946201711071003452871.jpg', '0', '1', '1', 'fa1bf20171107100340814.jpg', '1', '22f47201711071003385391.jpg', '0', null, '1115485485', null, '0.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('199', '2017110710555653527', '1510106489', '顾家敏', '2147483647', '河北省', '1', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '2e877201711071003281788.jpg', '1', '2', '2', '2', '2', '5236e201711071003474792.jpg', '0', '1', '1', 'fa1bf20171107100340814.jpg', '1', '22f47201711071003385391.jpg', '0', null, '1115485485', null, '0.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('200', '2017110711001690759', '1510541879', '顾家敏', '2147483647', '河北省', '213', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', '6e83b201711071059457920.jpg', '0', '1', '1', '1', '1', 'a8692201711071059531967.jpg', '0', '1', '1', '', '1', '9fed4201711071100128942.jpg', '1510196220', null, '123123123', null, '23.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('201', '2017110711001690759', '1510541879', '顾家敏', '2147483647', '河北省', '213', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', 'd1dd5201711071059529154.jpg', '1', '2', '12', '2', '2', 'b3e1e201711071100069042.jpg', '0', '1', '1', '', '1', '9fed4201711071100128942.jpg', '1510196220', null, '123123123', null, '23.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('202', '2017110711195920470', '1510283962', '10', '2147483647', '天津市', '10', '天津市', '南开区', '0', '阿玛尼', '0', '0', '2b6f2201711071119528309.jpg', '0', '10', '10', '10', '10', 'df9fb201711071119587736.jpg', '0', '0', '0', '', '1', 'fd1aa201711071119497779.jpg', '0', null, '10', null, null, null, null, null, '5');
INSERT INTO `bj_replace` VALUES ('203', '2017110711243918369', '1510802527', '10', '2147483647', '天津市', '大润发', '天津市', '南开区', '0', '阿玛尼', '0', '0', 'a9e88201711071122295116.jpg', '1', '25', '82', '52', '', '1e911201711071122405365.png', '0', '1', '4', '', '1', 'e1634201711071124191462.jpg', '0', null, '2147483647', null, '60000.00', null, null, '39', '5');
INSERT INTO `bj_replace` VALUES ('204', '201711071132225404', '1510284620', '顾家敏', '2147483647', '河北省', '历练了', '唐山市', '路南区', '1号', '阿玛尼', '1', '0', 'fc09b201711071130413937.jpg', '0', '1', '2', '3', '333', 'cfe27201711071131077014.jpg', '0', '1', '1', '', '1', 'b3a292017110711321193.jpg', '0', null, '1255555', null, null, null, null, null, '5');
INSERT INTO `bj_replace` VALUES ('205', '201711071132225404', '1510284620', '顾家敏', '2147483647', '河北省', '历练了', '唐山市', '路南区', '1号', '阿玛尼', '1', '0', '6a431201711071131144584.jpg', '0', '2', '2', '2', '2', 'c66a7201711071131562678.jpg', '0', '1', '1', '', '1', 'b3a292017110711321193.jpg', '0', null, '1255555', null, null, null, null, null, '5');
INSERT INTO `bj_replace` VALUES ('206', '2017110711364931850', '1510803307', '顾家敏', '2147483647', '河北省', '公共', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', 'bd8ad201711071135285383.jpg', '0', '1', '1', '1', '宁', '927c8201711071135504580.jpg', '0', '1', '1', '4f887201711071136369771.jpg', '1', '1703c201711071136451145.jpg', '1511926500', null, '123456789', null, null, null, null, null, '5');
INSERT INTO `bj_replace` VALUES ('207', '2017110711364931850', '1510803307', '顾家敏', '2147483647', '河北省', '公共', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', 'eff9a201711071135598577.jpg', '0', '2', '2', '2', 'OMG好', '0347d201711071136255853.jpg', '0', '1', '1', '4f887201711071136369771.jpg', '1', '1703c201711071136451145.jpg', '1511926500', null, '123456789', null, null, null, null, null, '5');
INSERT INTO `bj_replace` VALUES ('208', '2017110711390990872', '1510285037', '顾家敏', '2147483647', '河北省', 'mom', '唐山市', '路南区', '1号', '阿玛尼', '1', '1', '015c0201711071137447170.jpg', '0', '1', '0', '1', '', '87adb201711071137529289.jpg', '0', '0', '0', '80d70201711071138321883.jpg', '1', 'e9488201711071138371164.jpg', '1511494740', null, '0', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('209', '2017110711390990872', '1510285037', '顾家敏', '2147483647', '河北省', 'mom', '唐山市', '路南区', '1号', '阿玛尼', '1', '1', '387f3201711071137586666.jpg', '0', '1', '1', '0', 'l\'', '31a88201711071138226251.jpg', '0', '0', '0', '80d70201711071138321883.jpg', '1', 'e9488201711071138371164.jpg', '1511494740', null, '0', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('210', '2017110713454584065', '1510638202', '顾家敏', '2147483647', '河北省', '阿斯顿', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', 'b0c7d201711071345173681.jpg', '0', '1', '1', '1', '1', 'c6b6e201711071345227357.jpg', '0', '1', '1', '', '1', 'eeae8201711071345373441.jpg', '1510292580', null, '123456789', '0.00', '11.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('211', '2017110713454584065', '1510638202', '顾家敏', '2147483647', '河北省', '阿斯顿', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', '34ef6201711071345255098.jpg', '1', '2', '2', '2', '2', '7f550201711071345311258.jpg', '0', '1', '1', '', '1', 'eeae8201711071345373441.jpg', '1510292580', null, '123456789', '0.00', '111.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('212', '2017110714140342064', '1510121537', '顾家敏', '2147483647', '河北省', '我的', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', '8c29c201711071412368414.jpg', '2', '1', '1', '1', '我感激', 'e9074201711071412571600.jpg', '0', '1', '1', '463f1201711071413308700.jpg', '1', 'dcfc32017110714133665.jpg', '1511244720', null, '1234567896', '0.00', '99.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('213', '2017110714140342064', '1510121537', '顾家敏', '2147483647', '河北省', '我的', '唐山市', '路南区', '1号', '阿玛尼', '0', '1', 'c5b61201711071413042012.jpg', '0', '2', '2', '2', '明年', '71cb4201711071414002790.jpg', '0', '1', '1', '463f1201711071413308700.jpg', '1', 'dcfc32017110714133665.jpg', '1511244720', null, '1234567896', '0.00', '121.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('214', '20171107141654728', '1510121719', '10', '2147483647', '天津市', '551', '天津市', '南开区', '0', '阿玛尼', '1', '1', 'f6877201711071416528083.jpg', '0', '10', '10', '10', '10', '5a230201711071416505599.jpg', '0', '1', '0', '3b40e201711071416352712.jpg', '1', '5e50b201711071416375082.jpg', '1510726500', null, '10', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('215', '20171107141654728', '1510121719', '10', '2147483647', '天津市', '551', '天津市', '南开区', '0', '阿玛尼', '1', '1', '5131c20171107141620740.jpg', '0', '10', '10', '10', '10', '0443a201711071416281562.jpg', '0', '1', '0', '3b40e201711071416352712.jpg', '1', '5e50b201711071416375082.jpg', '1510726500', null, '10', '0.00', null, '施工工具齐全,无需师傅携带工具', '0', null, '5');
INSERT INTO `bj_replace` VALUES ('216', '2017110714492823285', '1510123714', '顾家敏', '2147483647', '河北省', '帝国d', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '0b4c8201711071448495893.jpg', '1', '1', '2', '3', '宁静', '89f14201711071449043695.jpg', '0', '1', '1', '6fcdd201711071449162263.jpg', '1', '4913f201711071449226063.jpg', '0', null, '123456789', '0.00', '12.00', '施工工具齐全,无需师傅携带工具', '0', '35', '5');
INSERT INTO `bj_replace` VALUES ('217', '2017110714582837507', '1510124217', '顾家敏', '2147483647', '河北省', '你当', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', 'a5e9920171107145718637.jpg', '1', '12', '32', '12', '你家', 'b8e21201711071457383303.jpg', '0', '1', '1', '093b32017110714581756.jpg', '1', 'a9adf201711071458244442.jpg', '0', null, '13124346', null, '1.00', null, null, '35', '5');
INSERT INTO `bj_replace` VALUES ('218', '2017110714582837507', '1510124217', '顾家敏', '2147483647', '河北省', '你当', '唐山市', '路南区', '1号', '阿玛尼', '0', '0', '9092a201711071457431620.jpg', '2', '12', '12', '13', '你啊的', 'ba57b201711071458051614.jpg', '0', '1', '1', '093b32017110714581756.jpg', '1', 'a9adf201711071458244442.jpg', '0', null, '13124346', null, '1.00', null, null, '35', '5');

-- ----------------------------
-- Table structure for bj_replace_report
-- ----------------------------
DROP TABLE IF EXISTS `bj_replace_report`;
CREATE TABLE `bj_replace_report` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `order_number` bigint(20) DEFAULT NULL COMMENT '订单号',
  `worker_id` int(10) DEFAULT NULL COMMENT '师傅ID',
  `img3` varchar(32) DEFAULT NULL COMMENT '门头照片',
  `img5` varchar(32) DEFAULT NULL COMMENT '幻灯片签收单',
  `img4` varchar(32) DEFAULT NULL COMMENT '专柜全景',
  `img1` varchar(32) DEFAULT NULL COMMENT '更换前',
  `img2` varchar(32) DEFAULT NULL COMMENT '更换后',
  `texts` text COMMENT '描述故障详情',
  `user_sign` varchar(100) DEFAULT NULL COMMENT '客户签字路由',
  `is_ok` tinyint(1) DEFAULT '0' COMMENT '客户是否签字  1已签字  0未签字',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=147 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_replace_report
-- ----------------------------
INSERT INTO `bj_replace_report` VALUES ('121', '2017110618243291313', '35', 'f623f201711061830402743.jpg', 'ab651201711061830421878.jpg', 'b17a2201711061830443726.jpg', '0dab720171106183046858.jpg', '8735f201711061830475219.jpg', '1', null, '0');
INSERT INTO `bj_replace_report` VALUES ('122', '2017110618243291313', '35', 'f623f201711061830402743.jpg', 'ab651201711061830421878.jpg', 'b17a2201711061830443726.jpg', 'ae434201711061830523348.jpg', '8ae3b201711061830543843.jpg', '2', null, '0');
INSERT INTO `bj_replace_report` VALUES ('125', '2017110618542138078', '35', 'b77c6201711061923232200.jpg', 'c82db201711061923256306.jpg', 'ea5d5201711061923272593.jpg', '9567d201711061923319332.jpg', '3e73b201711061923336092.jpg', '1111', null, '0');
INSERT INTO `bj_replace_report` VALUES ('131', '201711071021194298', '35', 'ff265201711071025503633.png', '3d3dd201711071025523922.png', '195d7201711071025532374.png', 'e22a6201711071025569469.png', '5e42e201711071025587959.png', '111', null, '0');
INSERT INTO `bj_replace_report` VALUES ('135', '2017110711001690759', '35', '912a8201711071111437433.jpg', '3987b201711071111478862.jpg', 'a549a201711071111482447.jpg', 'fc03c201711071111516790.jpg', 'a472b201711071111533824.jpg', '11', null, '0');
INSERT INTO `bj_replace_report` VALUES ('136', '2017110711001690759', '35', '912a8201711071111437433.jpg', '3987b201711071111478862.jpg', 'a549a201711071111482447.jpg', '930b3201711071111597744.jpg', '0847f201711071112014434.jpg', '2', null, '0');
INSERT INTO `bj_replace_report` VALUES ('137', '2017110711001690759', '35', '912a8201711071111437433.jpg', '3987b201711071111478862.jpg', 'a549a201711071111482447.jpg', '1d25d201711071112045921.jpg', 'cbef0201711071112067449.jpg', '3', null, '0');
INSERT INTO `bj_replace_report` VALUES ('139', '2017110711243918369', '39', 'b04cf201711071359144047.jpg', 'f38c6201711071359224961.png', '4ad43201711071359155090.png', '1f86e201711071359183285.png', '6a65b201711071359252023.jpg', '12345', null, '0');
INSERT INTO `bj_replace_report` VALUES ('142', '2017110713454584065', '35', 'b2e78201711071408181481.jpg', 'e460a201711071408237771.jpg', '044b4201711071408281244.jpg', '8a532201711071408094279.jpg', '86b5f201711071408361617.jpg', '', null, '0');
INSERT INTO `bj_replace_report` VALUES ('143', '2017110713454584065', '35', 'b2e78201711071408181481.jpg', 'e460a201711071408237771.jpg', '044b4201711071408281244.jpg', '6acad201711071408462174.jpg', '22ede201711071408536113.jpg', '', null, '0');
INSERT INTO `bj_replace_report` VALUES ('144', '2017110714140342064', '35', '8b178201711071444565210.jpg', '6f68c201711071445002365.jpg', 'eabeb201711071445059508.jpg', '61747201711071445161506.jpg', 'a21ec201711071445205866.jpg', '11名基地哦', null, '0');
INSERT INTO `bj_replace_report` VALUES ('146', '2017110714492823285', '35', '83b55201711071453267688.jpg', '689fe201711071453318216.jpg', '249fa201711071453371082.jpg', '4d09a201711071453416223.jpg', 'fe597201711071453466775.jpg', '4215米姐', null, '0');

-- ----------------------------
-- Table structure for bj_reume
-- ----------------------------
DROP TABLE IF EXISTS `bj_reume`;
CREATE TABLE `bj_reume` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `worker_id` int(10) DEFAULT NULL COMMENT '师傅ID ',
  `entry_name` varchar(100) DEFAULT NULL COMMENT '项目名称 ',
  `company` varchar(100) DEFAULT NULL COMMENT '任职公司 ',
  `project_start_time` int(10) DEFAULT NULL COMMENT '项目开始时间 ',
  `project_end_time` int(10) DEFAULT NULL COMMENT '项目结束时间 ',
  `brand` varchar(30) DEFAULT NULL COMMENT '品牌',
  `service_type_id` int(10) DEFAULT NULL COMMENT '服务类别 ',
  `skill` int(10) DEFAULT NULL COMMENT '师傅技能',
  `num` int(10) DEFAULT '0' COMMENT '认证数',
  `l1_category_id` int(10) DEFAULT NULL COMMENT '一级类-类型ID ',
  `l2_category_id` int(10) NOT NULL COMMENT '二级类-类型ID ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_reume
-- ----------------------------
INSERT INTO `bj_reume` VALUES ('25', '11', '1111', '11', '1512144000', '1512144000', '奥莎迪', '3', '6', '0', null, '0');
INSERT INTO `bj_reume` VALUES ('26', '56', '111das', '11', '1512144000', '1512316800', '艾丝珀1', '4', '4', '0', null, '0');
INSERT INTO `bj_reume` VALUES ('27', '56', '111', '11', '1512057600', '1512403200', '艾文莉', '3', '6', '0', null, '0');
INSERT INTO `bj_reume` VALUES ('28', '56', '11', '1', '1512144000', '1512316800', '艾丝珀1', '4', '4', '0', null, '0');
INSERT INTO `bj_reume` VALUES ('29', '56', '下啊', '标匠+', '1512316800', '1543852800', '资生堂', '3', '5', '0', null, '0');
INSERT INTO `bj_reume` VALUES ('30', '71', '455', '吐了', '1512662400', '1765123200', '迪奥', '3', '5', '0', null, '0');

-- ----------------------------
-- Table structure for bj_service
-- ----------------------------
DROP TABLE IF EXISTS `bj_service`;
CREATE TABLE `bj_service` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(32) NOT NULL COMMENT '服务类型名称',
  `aimg` varchar(100) DEFAULT NULL COMMENT '前图片',
  `bimg` varchar(100) DEFAULT NULL COMMENT '后图片',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否禁用1正常0禁用',
  `sort` varchar(11) DEFAULT '0',
  `create_time` int(11) DEFAULT NULL COMMENT '创建时间',
  `update_time` int(11) DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COMMENT='服务类型表';

-- ----------------------------
-- Records of bj_service
-- ----------------------------
INSERT INTO `bj_service` VALUES ('1', '安装', '6666d201711071530534563.png', '122b2201711071530552835.png', '1', '0', '1500708406', '1510039856');
INSERT INTO `bj_service` VALUES ('2', '维修', 'c9e88201711071530373882.png', '7bd57201711071530437299.png', '1', '0', '1500708413', '1510039844');
INSERT INTO `bj_service` VALUES ('3', '品质监理', '20170811\\bef36d851fce6a3b161fd082a54532b8.png', '20170727\\6945011c21a5e3b3252a3c9d460c09a4.png', '0', '0', '1500708426', '1502416661');
INSERT INTO `bj_service` VALUES ('4', '勘测', 'f2808201711071530144402.png', 'febf4201711071530188033.png', '1', '0', '1500708437', '1510039819');
INSERT INTO `bj_service` VALUES ('5', '更换灯片', 'faea3201711071530051695.png', '71573201711071530067816.png', '1', '0', '1500708519', '1510039808');
INSERT INTO `bj_service` VALUES ('6', '围板搭建', 'b1a17201711071529474582.png', '296d4201711071529501080.png', '1', '0', '1500708538', '1510039791');

-- ----------------------------
-- Table structure for bj_service_type
-- ----------------------------
DROP TABLE IF EXISTS `bj_service_type`;
CREATE TABLE `bj_service_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `title` varchar(255) DEFAULT NULL COMMENT '服务类型',
  `description` varchar(255) DEFAULT NULL COMMENT '服务类型简短描述',
  `order` tinyint(4) DEFAULT NULL COMMENT '排序序号',
  `status` tinyint(1) DEFAULT NULL COMMENT '状态 0禁用 1启用',
  `deleted` tinyint(1) DEFAULT NULL COMMENT '是否软删除 0否 1是',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_service_type
-- ----------------------------

-- ----------------------------
-- Table structure for bj_signature
-- ----------------------------
DROP TABLE IF EXISTS `bj_signature`;
CREATE TABLE `bj_signature` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'id 自增ID',
  `order_number` varchar(255) NOT NULL COMMENT '订单号',
  `image` varchar(255) NOT NULL COMMENT '签名图片路径',
  `create_time` int(10) DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1500000480 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bj_signature
-- ----------------------------
INSERT INTO `bj_signature` VALUES ('1500000341', '2017110617491168304', 'uploads/signature/20171106/biaojiang38qianming_02eb138ca1910339be4fa1b74554eb9a.png', null);
INSERT INTO `bj_signature` VALUES ('1500000342', '2017110617382115915', 'uploads/signature/20171106/biaojiang38qianming_e21e77a45a313af5287f0b3a4410d663.png', null);
INSERT INTO `bj_signature` VALUES ('1500000343', '2017110618153296877', 'uploads/signature/20171106/biaojiang38qianming_bf7d206f3ed39ce23e0690050fffc8f6.png', null);
INSERT INTO `bj_signature` VALUES ('1500000344', '2017110618153296877', 'uploads/signature/20171106/biaojiang38qianming_bb991d5731ff6b6e775ee355c85235be.png', null);
INSERT INTO `bj_signature` VALUES ('1500000345', '2017110618153296877', 'uploads/signature/20171106/biaojiang38qianming_540e58ce30ca634a7d40f988b426ac8d.png', null);
INSERT INTO `bj_signature` VALUES ('1500000346', '2017110618543543981', 'uploads/signature/20171106/biaojiang33qianming_3b33982e463c00fa876404c2983bd0d9.png', null);
INSERT INTO `bj_signature` VALUES ('1500000347', '2017110618543543981', 'uploads/signature/20171106/biaojiang33qianming_4e594539d6e4b76d3dc948c350732dcf.png', null);
INSERT INTO `bj_signature` VALUES ('1500000348', '2017110618563077970', 'uploads/signature/20171106/biaojiang38qianming_5e7b1f1c87d381479995ad3138f4bbea.png', null);
INSERT INTO `bj_signature` VALUES ('1500000349', '2017110618241287022', 'uploads/signature/20171106/biaojiang38qianming_dd838b4f14d3cd52427d9862f403b6b2.png', null);
INSERT INTO `bj_signature` VALUES ('1500000350', '2017110619144610716', 'uploads/signature/20171106/biaojiang38qianming_2070b036d987406d96ccd6b1edd6e498.png', null);
INSERT INTO `bj_signature` VALUES ('1500000351', '2017110618542138078', 'uploads/signature/20171106/biaojiang36qianming_3c9535779492aaea9c9543101557e8b9.png', null);
INSERT INTO `bj_signature` VALUES ('1500000352', '2017110619075012666', 'uploads/signature/20171106/biaojiang33qianming_771775d2eb391afcafbd6358f0d9e4aa.png', null);
INSERT INTO `bj_signature` VALUES ('1500000353', '2017110708371367163', 'uploads/signature/20171107/biaojiang38qianming_d04663a813a7fcd2d45d04c68dfef268.png', null);
INSERT INTO `bj_signature` VALUES ('1500000354', '201711070920381409', 'uploads/signature/20171107/biaojiang33qianming_521a7ae4cd5bf70ed13b2b31a7ecb22e.png', null);
INSERT INTO `bj_signature` VALUES ('1500000355', '2017110709290237075', 'uploads/signature/20171107/biaojiang36qianming_f23741cd0394c375de17547bcd27257c.png', null);
INSERT INTO `bj_signature` VALUES ('1500000356', '2017110709490291617', 'uploads/signature/20171107/biaojiang36qianming_b71b37699566e553cd66048f64e5ae22.png', null);
INSERT INTO `bj_signature` VALUES ('1500000357', '2017110710043183881', 'uploads/signature/20171107/biaojiang33qianming_0a71b405f65e300515c74f6dd1fc231b.png', null);
INSERT INTO `bj_signature` VALUES ('1500000358', '201711071021194298', 'uploads/signature/20171107/biaojiang36qianming_23dddbb5a143070aa012b874e2dd4365.png', null);
INSERT INTO `bj_signature` VALUES ('1500000359', '201711071030223132', 'uploads/signature/20171107/biaojiang33qianming_0a56596eeec21aebcf4c3b57074a85ac.png', null);
INSERT INTO `bj_signature` VALUES ('1500000360', '201711071030223132', 'uploads/signature/20171107/biaojiang33qianming_87fd969688afc700e627d5850ec07412.png', null);
INSERT INTO `bj_signature` VALUES ('1500000361', '2017110711001690759', 'uploads/signature/20171107/biaojiang36qianming_9410da694168afca06ade104caf7fedc.png', null);
INSERT INTO `bj_signature` VALUES ('1500000362', '2017110710422184585', 'uploads/signature/20171107/biaojiang38qianming_b1c22b94d817b0467bbda523ccaa3f7a.png', null);
INSERT INTO `bj_signature` VALUES ('1500000363', '2017110713454584065', 'uploads/signature/20171107/biaojiang36qianming_e55fb15dc5a584ed6777bd73a354c91b.png', null);
INSERT INTO `bj_signature` VALUES ('1500000364', '2017110711243918369', 'uploads/signature/20171107/biaojiang38qianming_b08bf0f898451dab89f08b7a6375f4a7.png', null);
INSERT INTO `bj_signature` VALUES ('1500000365', '2017110714140342064', 'uploads/signature/20171107/biaojiang36qianming_085de8a6d45b7d09db3872a00622d195.png', null);
INSERT INTO `bj_signature` VALUES ('1500000366', '2017110714492823285', 'uploads/signature/20171107/biaojiang36qianming_4a60a2b5209eb5b4dffc97fc0661f914.png', null);
INSERT INTO `bj_signature` VALUES ('1500000367', '2017112408543841416', 'uploads/signature/20171124/biaojiang4720_be90f30e64fa98507399c3675ddc387f..png', null);
INSERT INTO `bj_signature` VALUES ('1500000368', '2017112408543841416', 'uploads/signature/20171124/biaojiang4720_e6a8e8c09c784f7cd5f4806c0129cd49..png', null);
INSERT INTO `bj_signature` VALUES ('1500000369', '2017112509085618669', 'uploads/signature/20171125/biaojiang4720_eda29e0ff4fd81182570c0e7dd4c921e..png', null);
INSERT INTO `bj_signature` VALUES ('1500000370', '2017112509085618669', 'uploads/signature/20171125/biaojiang4720_0d3a0f95d133b1f6f01b2803d051d52e..png', null);
INSERT INTO `bj_signature` VALUES ('1500000371', '2017112710274482395', 'uploads/signature/20171127/biaojiang4720_3402b560667d3859f307b207b67d6f99..png', null);
INSERT INTO `bj_signature` VALUES ('1500000372', '2017112710274482395', 'uploads/signature/20171127/biaojiang4720_67d14a010e9cad89083aed89673d3e82..png', null);
INSERT INTO `bj_signature` VALUES ('1500000373', '2017112710274482395', 'uploads/signature/20171127/biaojiang4720_0d8d2499694c4201a8264760918dd60a..png', null);
INSERT INTO `bj_signature` VALUES ('1500000374', '2017112710274482395', 'uploads/signature/20171127/biaojiang4720_4ba9269d3b95a89a7a0f8cccb1eaf255..png', null);
INSERT INTO `bj_signature` VALUES ('1500000375', '2017112710274482395', 'uploads/signature/20171127/biaojiang4720_c6f5cdcd014c2af919fe0254a32f23b1..png', null);
INSERT INTO `bj_signature` VALUES ('1500000376', '2017112715275774047', 'uploads/signature/20171127/biaojiang4420_8485c82da7dbfd1a0aa65d7ea7760705..png', null);
INSERT INTO `bj_signature` VALUES ('1500000377', '2017112811482073980', 'uploads/signature/20171128/biaojiang3820_14be8c40488833092fa71dd65d8e09c7..png', null);
INSERT INTO `bj_signature` VALUES ('1500000378', '2017112811482073980', 'uploads/signature/20171128/biaojiang3820_e1b5a8a56fea76d888238dd7a925be48..png', null);
INSERT INTO `bj_signature` VALUES ('1500000379', '2017112811482073980', 'uploads/signature/20171128/biaojiang3820_da7fe9ea9260299862a14fade943c0e0..png', null);
INSERT INTO `bj_signature` VALUES ('1500000380', '2017112812480644220', 'uploads/signature/20171128/biaojiang3820_84280ddde7bdf7d951d86002b11c0579..png', null);
INSERT INTO `bj_signature` VALUES ('1500000381', '2017112812570268277', 'uploads/signature/20171128/biaojiang3820_92fbc00b521c85d696c91ad98b1f71f9..png', null);
INSERT INTO `bj_signature` VALUES ('1500000382', '2017112812570268277', 'uploads/signature/20171128/biaojiang3820_da85d3f1ad44133d54b84ff2fecef00f..png', null);
INSERT INTO `bj_signature` VALUES ('1500000383', '2017112813500685476', 'uploads/signature/20171128/biaojiang3820_e9293c6cf3d5deb5828f369c82db0c3e..png', null);
INSERT INTO `bj_signature` VALUES ('1500000384', '2017112814263759771', 'uploads/signature/20171128/biaojiang4420_c5d70c2006b62d96f54beefa6b776791..png', null);
INSERT INTO `bj_signature` VALUES ('1500000385', '2017112814263759771', 'uploads/signature/20171128/biaojiang4420_7c1a921fc01701dc2a3a1a8df9fb0364..png', null);
INSERT INTO `bj_signature` VALUES ('1500000386', '2017112814575388463', 'uploads/signature/20171128/biaojiang4420_4750ee3a72d4336c8ebbcf47bfee1e61..png', null);
INSERT INTO `bj_signature` VALUES ('1500000387', '2017112814575388463', 'uploads/signature/20171128/biaojiang4420_07912632338965d77c78a7d05411a3f6..png', null);
INSERT INTO `bj_signature` VALUES ('1500000388', '2017112815034492286', 'uploads/signature/20171128/biaojiang4420_586697e877a3d64808404fef6cd473ad..png', null);
INSERT INTO `bj_signature` VALUES ('1500000389', '2017112909421357950', 'uploads/signature/20171129/biaojiang5720_319de798b5a670d38d52c23de2b4a799..png', null);
INSERT INTO `bj_signature` VALUES ('1500000390', '2017112909421357950', 'uploads/signature/20171129/biaojiang5720_80a64aae52ba87c817858d1d2103b23b..png', null);
INSERT INTO `bj_signature` VALUES ('1500000391', '2017112909421357950', 'uploads/signature/20171129/biaojiang5720_bec8345d3bd690c759364189b7b98d74..png', null);
INSERT INTO `bj_signature` VALUES ('1500000392', '2017112910514819870', 'uploads/signature/20171129/biaojiang5720_e35f8cc823952407a22d7582c244239a..png', null);
INSERT INTO `bj_signature` VALUES ('1500000393', '2017112910514819870', 'uploads/signature/20171129/biaojiang5720_87cbbf4f8f6e512596caaa2838445ebf..png', null);
INSERT INTO `bj_signature` VALUES ('1500000394', '20171129111252284', 'uploads/signature/20171129/biaojiang5720_d2908c2654f9acc87c94bcb2af476d54..png', null);
INSERT INTO `bj_signature` VALUES ('1500000395', '20171129111252284', 'uploads/signature/20171129/biaojiang5720_0d470044b58c6e92bcadacf1eef6ee77..png', null);
INSERT INTO `bj_signature` VALUES ('1500000396', '2017112911395059723', 'uploads/signature/20171129/biaojiang5720_71d62c354a6fbc5705a6f36d6813117d..png', null);
INSERT INTO `bj_signature` VALUES ('1500000397', '2017112911395059723', 'uploads/signature/20171129/biaojiang5720_e0f7927b0db177d88af6b3e84d89a992..png', null);
INSERT INTO `bj_signature` VALUES ('1500000398', '2017112914594117031', 'uploads/signature/20171129/biaojiang5720_6463cdff8554c6e9f821eca28ca82ddb..png', null);
INSERT INTO `bj_signature` VALUES ('1500000399', '2017112909454287007', 'uploads/signature/20171130/biaojiang5520_e91516972022e7d57e7514aa1fb9ea09..png', null);
INSERT INTO `bj_signature` VALUES ('1500000400', '2017113013130146394', 'uploads/signature/20171130/biaojiang3820_328d01235681e5228d11255eac1f2a23..png', null);
INSERT INTO `bj_signature` VALUES ('1500000401', '2017113013130146394', 'uploads/signature/20171130/biaojiang3820_eeb80c2c091fa2bdac93e71d1aa7272b..png', null);
INSERT INTO `bj_signature` VALUES ('1500000402', '2017113013130146394', 'uploads/signature/20171130/biaojiang3820_519ef4543f36bf2179d8d964f3d69864..png', null);
INSERT INTO `bj_signature` VALUES ('1500000403', '2017113013130146394', 'uploads/signature/20171130/biaojiang3820_1b615b6b910c3bce014cf161bda10ff2..png', null);
INSERT INTO `bj_signature` VALUES ('1500000404', '2017113013501692939', 'uploads/signature/20171130/biaojiang3820_58737ca145d2d4e631863074f0073275..png', null);
INSERT INTO `bj_signature` VALUES ('1500000405', '2017113013501692939', 'uploads/signature/20171130/biaojiang3820_afa0d2c80f0b566441a1fde9a12f5154..png', null);
INSERT INTO `bj_signature` VALUES ('1500000406', '2017113014224550536', 'uploads/signature/20171130/biaojiang3820_07d3d33186206b0897fd5a44a32ecfc8..png', null);
INSERT INTO `bj_signature` VALUES ('1500000407', '2017113015583899567', 'uploads/signature/20171130/biaojiang6820_178d12d08e8e94d9df1bcfa87e015f54..png', null);
INSERT INTO `bj_signature` VALUES ('1500000408', '2017113016305890158', 'uploads/signature/20171130/biaojiang6820_7fb88b23e9b2f0d422c906fd2b1e84f3..png', null);
INSERT INTO `bj_signature` VALUES ('1500000409', '2017113016305890158', 'uploads/signature/20171130/biaojiang6820_963de52abf0cc90cc9b6944d316c4bef..png', null);
INSERT INTO `bj_signature` VALUES ('1500000411', '2017120110024541851', 'uploads/signature/20171201/biaojiang47qianming_526946f2c1b7a633957735035246f47f.png', null);
INSERT INTO `bj_signature` VALUES ('1500000412', '2017120114160672307', 'uploads/signature/20171201/biaojiang5920_d569e470b473499502da481b91222d64..png', null);
INSERT INTO `bj_signature` VALUES ('1500000413', '2017120114160672307', 'uploads/signature/20171201/biaojiang5920_fdca7e729281e00f043cdf1f6fcf1a3b..png', null);
INSERT INTO `bj_signature` VALUES ('1500000414', '2017120115572959109', 'uploads/signature/20171201/biaojiang4720_bf875feac9d8cfc388c28560fb4f50a7..png', null);
INSERT INTO `bj_signature` VALUES ('1500000415', '2017120116285014297', 'uploads/signature/20171201/biaojiang5920_c066d380f00303be95f1e9561e1bc295..png', null);
INSERT INTO `bj_signature` VALUES ('1500000416', '2017120413303972014', 'uploads/signature/20171204/biaojiang3820_a0558fd0e196a2def8313a1cfdf91aef..png', null);
INSERT INTO `bj_signature` VALUES ('1500000417', '2017120415375447591', 'uploads/signature/20171204/biaojiang5920_fec817ef207353dc0ba1e8d33203c056..png', null);
INSERT INTO `bj_signature` VALUES ('1500000418', '2017120415375447591', 'uploads/signature/20171204/biaojiang5920_4c11dc007d8322da4c6724b81f9ba370..png', null);
INSERT INTO `bj_signature` VALUES ('1500000419', '2017120415375447591', 'uploads/signature/20171204/biaojiang5920_fa2ef5721fb719467421107fe19783a9..png', null);
INSERT INTO `bj_signature` VALUES ('1500000420', '2017120415375447591', 'uploads/signature/20171204/biaojiang5920_737809a50f6fa150e367ec8c0eee1678..png', null);
INSERT INTO `bj_signature` VALUES ('1500000421', '2017120415375447591', 'uploads/signature/20171204/biaojiang5920_b1e78f233a264d19d1cbf1d8589767ac..png', null);
INSERT INTO `bj_signature` VALUES ('1500000422', '2017120515225933523', 'uploads/signature/20171206/biaojiang5920_1231abbfd8c98d89133e8b312ed075da..png', null);
INSERT INTO `bj_signature` VALUES ('1500000423', '2017120515225933523', 'uploads/signature/20171206/biaojiang5920_125b177b7215ee51c5706daad33b53de..png', null);
INSERT INTO `bj_signature` VALUES ('1500000424', '2017120515225933523', 'uploads/signature/20171206/biaojiang5920_e7ca454746ca75598bf4b1a0d21e6993..png', null);
INSERT INTO `bj_signature` VALUES ('1500000425', '2017120515225933523', 'uploads/signature/20171206/biaojiang5920_3c82b04dff99262bff3867862c423bd1..png', null);
INSERT INTO `bj_signature` VALUES ('1500000426', '2017120610103665747', 'uploads/signature/20171206/biaojiang4720_c28eb9c95045bd60df122de645c442c6..png', null);
INSERT INTO `bj_signature` VALUES ('1500000427', '2017120610411351768', 'uploads/signature/20171206/biaojiang38qianming_b0158fd5ed07e2ef63748a973e764bb9.png', null);
INSERT INTO `bj_signature` VALUES ('1500000428', '2017120610572444847', 'uploads/signature/20171206/biaojiang38qianming_ed9c21db4c82dc05b9235da732167b92.png', null);
INSERT INTO `bj_signature` VALUES ('1500000429', '2017120611115555068', 'uploads/signature/20171206/biaojiang4720_c0df9f458e229a7ef0beb622184f3326..png', null);
INSERT INTO `bj_signature` VALUES ('1500000430', '2017120613452146769', 'uploads/signature/20171206/biaojiang4720_920c607113ed8b9bf26c20ff05a582e3..png', null);
INSERT INTO `bj_signature` VALUES ('1500000431', '2017120709013668489', 'uploads/signature/20171207/biaojiang6820_d691563c7c9dc9f25a291391a69b0bf4..png', null);
INSERT INTO `bj_signature` VALUES ('1500000432', '2017120709013668489', 'uploads/signature/20171207/biaojiang6820_a630a0d011daf3e6ee68b2a252924fd0..png', null);
INSERT INTO `bj_signature` VALUES ('1500000433', '2017120709315646372', 'uploads/signature/20171207/biaojiang6820_a38584ee463c20c0214399f7da16c024..png', null);
INSERT INTO `bj_signature` VALUES ('1500000434', '2017120709315646372', 'uploads/signature/20171207/biaojiang6820_239745850380f065ecc67e4d40f1b9ed..png', null);
INSERT INTO `bj_signature` VALUES ('1500000435', '2017120709434985609', 'uploads/signature/20171207/biaojiang6820_2e219d9b5b9f1ceae609333b1358164a..png', null);
INSERT INTO `bj_signature` VALUES ('1500000436', '2017120709434985609', 'uploads/signature/20171207/biaojiang6820_0554d9a70908fa919d6857468c9af7ee..png', null);
INSERT INTO `bj_signature` VALUES ('1500000437', '2017120710303544571', 'uploads/signature/20171207/biaojiang3820_e1860ae66603daba8f3092e2a2c6a831..png', null);
INSERT INTO `bj_signature` VALUES ('1500000438', '2017120710303544571', 'uploads/signature/20171207/biaojiang3820_aa5768ef034835f28adbee893a2c2075..png', null);
INSERT INTO `bj_signature` VALUES ('1500000439', '2017120713300542747', 'uploads/signature/20171207/biaojiang3820_6383cf07a50fe7a07c7ca98f6ef9d091..png', null);
INSERT INTO `bj_signature` VALUES ('1500000440', '2017120713300542747', 'uploads/signature/20171207/biaojiang3820_52d1b5a6482e10481afedda4ccdcc33c..png', null);
INSERT INTO `bj_signature` VALUES ('1500000441', '2017120713554972376', 'uploads/signature/20171207/biaojiang4720_03a38d56ada8da1dc6c94ee3890c5274..png', null);
INSERT INTO `bj_signature` VALUES ('1500000442', '2017120713554972376', 'uploads/signature/20171207/biaojiang4720_7fd5f4f520699795d4dbdd499ff88ce1..png', null);
INSERT INTO `bj_signature` VALUES ('1500000443', '2017120713554972376', 'uploads/signature/20171207/biaojiang4720_16885ac52c9bc7e0d854457cbc0c8522..png', null);
INSERT INTO `bj_signature` VALUES ('1500000444', '2017120715152036561', 'uploads/signature/20171207/biaojiang4720_db9d57f80fa82a077676f2c95d5c3dd2..png', null);
INSERT INTO `bj_signature` VALUES ('1500000445', '2017120715152036561', 'uploads/signature/20171207/biaojiang4720_ac48079c85bca25c0413b854cdfd35b3..png', null);
INSERT INTO `bj_signature` VALUES ('1500000446', '2017120715210898652', 'uploads/signature/20171207/biaojiang3820_b4dce4c72207b227431e985e81d6e6cf..png', null);
INSERT INTO `bj_signature` VALUES ('1500000447', '2017120715210898652', 'uploads/signature/20171207/biaojiang3820_115ed85d8446358c806fd3c45d5f1bef..png', null);
INSERT INTO `bj_signature` VALUES ('1500000448', '2017120715210898652', 'uploads/signature/20171207/biaojiang3820_8d2058e2f337ccb5de436a1ad8945e59..png', null);
INSERT INTO `bj_signature` VALUES ('1500000449', '2017120808472682390', 'uploads/signature/20171208/biaojiang6820_9870ecc0f7d1523918deee1e4624449c..png', null);
INSERT INTO `bj_signature` VALUES ('1500000450', '2017120808472682390', 'uploads/signature/20171208/biaojiang6820_c70e04e61644efb91121cb7ee7180d7f..png', null);
INSERT INTO `bj_signature` VALUES ('1500000451', '201712081555439062', 'uploads/signature/20171208/biaojiang3820_f3b8bbf1d7397e93593715769f791f64..png', null);
INSERT INTO `bj_signature` VALUES ('1500000452', '201712081555439062', 'uploads/signature/20171208/biaojiang3820_bd91502210b2d8cf53582ae23fcc3428..png', null);
INSERT INTO `bj_signature` VALUES ('1500000453', '201712081555439062', 'uploads/signature/20171208/biaojiang3820_eb95f84fa16149ec556fe38bdb1e1073..png', null);
INSERT INTO `bj_signature` VALUES ('1500000454', '2017120815510325171', 'uploads/signature/20171208/biaojiang6820_f526277fd3048428b693c2409ae787ab..png', null);
INSERT INTO `bj_signature` VALUES ('1500000455', '2017120815510325171', 'uploads/signature/20171208/biaojiang6820_5c4cc4cb5e2eec9760d5d19873189f78..png', null);
INSERT INTO `bj_signature` VALUES ('1500000456', '2017120816552463170', 'uploads/signature/20171208/biaojiang3820_5368c28c6125f0900d76100e7ce51f2f..png', null);
INSERT INTO `bj_signature` VALUES ('1500000457', '2017120816552463170', 'uploads/signature/20171208/biaojiang3820_a5d40bc1c3053266d14b503cfee332f5..png', null);
INSERT INTO `bj_signature` VALUES ('1500000458', '2017120817282688443', 'uploads/signature/20171208/biaojiang3820_c8a34caa70a3dd970ab1aee4bbcbe8f0..png', null);
INSERT INTO `bj_signature` VALUES ('1500000459', '2017120817282688443', 'uploads/signature/20171208/biaojiang3820_ad7d86a2734ad723ffbff8ca8c02c8fd..png', null);
INSERT INTO `bj_signature` VALUES ('1500000460', '2017120909255694657', 'uploads/signature/20171209/biaojiang6820_ac919b5cc07e5d8287f9addc5b24284a..png', null);
INSERT INTO `bj_signature` VALUES ('1500000461', '2017120909255694657', 'uploads/signature/20171209/biaojiang6820_b7c28bcefc78c5a97688dfa65e6631f8..png', null);
INSERT INTO `bj_signature` VALUES ('1500000462', '1', 'uploads/signature/20171209/biaojiang3820_02a953b69af0141a89264f60be307a34..png', null);
INSERT INTO `bj_signature` VALUES ('1500000463', '2017120914370562104', 'uploads/signature/20171209/biaojiang6820_29900bc0464f173cddea492b99bb909f..png', null);
INSERT INTO `bj_signature` VALUES ('1500000464', '2017120914370562104', 'uploads/signature/20171209/biaojiang6820_700bf171c658f7632d6e1c13cd15c931..png', null);
INSERT INTO `bj_signature` VALUES ('1500000465', '1', 'uploads/signature/20171209/biaojiang3820_a4ddf81817528714a154ad153b8c5334..png', null);
INSERT INTO `bj_signature` VALUES ('1500000466', '1', 'uploads/signature/20171209/biaojiang3820_a1c9a69092df890eec047a49dc5eda7e..png', null);
INSERT INTO `bj_signature` VALUES ('1500000467', '1', 'uploads/signature/20171209/biaojiang3820_3b5dc9f2666bfd025df57e7159b871f6..png', null);
INSERT INTO `bj_signature` VALUES ('1500000468', '1', 'uploads/signature/20171209/biaojiang3820_44600e571f929bd36e3b507ae40e9b8f..png', null);
INSERT INTO `bj_signature` VALUES ('1500000469', '1', 'uploads/signature/20171209/biaojiang3820_0e87589a80dc2590bf0d3c31bc8d122e..png', null);
INSERT INTO `bj_signature` VALUES ('1500000470', '1', 'uploads/signature/20171209/biaojiang3820_2b19cc873c1c950340cd2774ea9e1743..png', null);
INSERT INTO `bj_signature` VALUES ('1500000471', '1', 'uploads/signature/20171209/biaojiang3820_50753135a92a145925a8a4cb774877ae..png', null);
INSERT INTO `bj_signature` VALUES ('1500000472', '1', 'uploads/signature/20171209/biaojiang3820_0495734e43dbdf6c147738595070b861..png', null);
INSERT INTO `bj_signature` VALUES ('1500000473', '1', 'uploads/signature/20171209/biaojiang3820_9a19565beb604a23cd101ff6d723d745..png', null);
INSERT INTO `bj_signature` VALUES ('1500000474', '1', 'uploads/signature/20171209/biaojiang3820_e6b39357b2191aeac4b475904c55016c..png', null);
INSERT INTO `bj_signature` VALUES ('1500000475', '1', 'uploads/signature/20171209/biaojiang3820_ecca1675922faf19736ed489deae8381..png', null);
INSERT INTO `bj_signature` VALUES ('1500000476', '1', 'uploads/signature/20171209/biaojiang3820_315300cdd26e1f356259851c263926d8..png', null);
INSERT INTO `bj_signature` VALUES ('1500000477', '1', 'uploads/signature/20171209/biaojiang3820_43574e393a267cfabdf2d41baf2221d0..png', null);
INSERT INTO `bj_signature` VALUES ('1500000478', '1', 'uploads/signature/20171209/biaojiang3820_ba871189a24be94af5ba0b5195949357..png', null);
INSERT INTO `bj_signature` VALUES ('1500000479', '2017120915514129422', 'uploads/signature/20171209/biaojiang5920_1aeec1d88b000cf1064a43fb15b67d3c..png', null);

-- ----------------------------
-- Table structure for bj_skills
-- ----------------------------
DROP TABLE IF EXISTS `bj_skills`;
CREATE TABLE `bj_skills` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `skill` varchar(30) NOT NULL COMMENT '技能',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='技能表';

-- ----------------------------
-- Records of bj_skills
-- ----------------------------
INSERT INTO `bj_skills` VALUES ('1', '电工');
INSERT INTO `bj_skills` VALUES ('2', '水管工');
INSERT INTO `bj_skills` VALUES ('4', '搬运工');
INSERT INTO `bj_skills` VALUES ('5', '泥瓦工');
INSERT INTO `bj_skills` VALUES ('6', '普工');
INSERT INTO `bj_skills` VALUES ('7', '木工');
INSERT INTO `bj_skills` VALUES ('8', '油漆工');

-- ----------------------------
-- Table structure for bj_sms_captcha
-- ----------------------------
DROP TABLE IF EXISTS `bj_sms_captcha`;
CREATE TABLE `bj_sms_captcha` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `phone` varchar(11) NOT NULL COMMENT '接受者手机号',
  `captcha` text NOT NULL COMMENT '短信平台响应状态',
  `created_at` varchar(60) NOT NULL COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=290 DEFAULT CHARSET=utf8 COMMENT='短信验证码发送相关';

-- ----------------------------
-- Records of bj_sms_captcha
-- ----------------------------
INSERT INTO `bj_sms_captcha` VALUES ('138', '18961519032', '0,提交成功', '2017-11-06 16:12:45');
INSERT INTO `bj_sms_captcha` VALUES ('139', '17879837747', '0,提交成功', '2017-11-06 17:40:19');
INSERT INTO `bj_sms_captcha` VALUES ('140', '15865867664', '0,提交成功', '2017-11-06 17:40:41');
INSERT INTO `bj_sms_captcha` VALUES ('141', '17879837747', '0,提交成功', '2017-11-06 17:53:52');
INSERT INTO `bj_sms_captcha` VALUES ('142', '15865867664', '0,提交成功', '2017-11-06 17:54:43');
INSERT INTO `bj_sms_captcha` VALUES ('143', '18961519032', '0,提交成功', '2017-11-06 18:07:49');
INSERT INTO `bj_sms_captcha` VALUES ('144', '17879837747', '0,提交成功', '2017-11-06 18:19:46');
INSERT INTO `bj_sms_captcha` VALUES ('145', '18686663624', '0,提交成功', '2017-11-06 18:19:52');
INSERT INTO `bj_sms_captcha` VALUES ('146', '15865867664', '0,提交成功', '2017-11-06 18:20:26');
INSERT INTO `bj_sms_captcha` VALUES ('147', '18961519032', '0,提交成功', '2017-11-06 18:25:56');
INSERT INTO `bj_sms_captcha` VALUES ('148', '18961519032', '0,提交成功', '2017-11-06 18:26:25');
INSERT INTO `bj_sms_captcha` VALUES ('149', '17879837747', '0,提交成功', '2017-11-06 18:28:52');
INSERT INTO `bj_sms_captcha` VALUES ('150', '15865867664', '0,提交成功', '2017-11-06 18:29:28');
INSERT INTO `bj_sms_captcha` VALUES ('151', '18961519032', '0,提交成功', '2017-11-06 18:37:48');
INSERT INTO `bj_sms_captcha` VALUES ('152', '18961519032', '0,提交成功', '2017-11-06 18:37:59');
INSERT INTO `bj_sms_captcha` VALUES ('153', '18961519032', '0,提交成功', '2017-11-06 18:45:10');
INSERT INTO `bj_sms_captcha` VALUES ('154', '18014869113', '0,提交成功', '2017-11-06 18:48:36');
INSERT INTO `bj_sms_captcha` VALUES ('155', '18686663624', '0,提交成功', '2017-11-06 18:49:23');
INSERT INTO `bj_sms_captcha` VALUES ('156', '18961519032', '0,提交成功', '2017-11-06 18:56:05');
INSERT INTO `bj_sms_captcha` VALUES ('157', '18961519032', '0,提交成功', '2017-11-06 18:56:54');
INSERT INTO `bj_sms_captcha` VALUES ('158', '18014869113', '0,提交成功', '2017-11-06 18:57:05');
INSERT INTO `bj_sms_captcha` VALUES ('159', '18686663624', '0,提交成功', '2017-11-06 18:57:59');
INSERT INTO `bj_sms_captcha` VALUES ('160', '17879837747', '0,提交成功', '2017-11-06 18:59:55');
INSERT INTO `bj_sms_captcha` VALUES ('161', '15865867664', '0,提交成功', '2017-11-06 19:00:47');
INSERT INTO `bj_sms_captcha` VALUES ('162', '17879837747', '0,提交成功', '2017-11-06 19:16:23');
INSERT INTO `bj_sms_captcha` VALUES ('163', '15802100074', '0,提交成功', '2017-11-06 19:20:16');
INSERT INTO `bj_sms_captcha` VALUES ('164', '15865867664', '0,提交成功', '2017-11-06 19:21:26');
INSERT INTO `bj_sms_captcha` VALUES ('165', '15802100074', '0,提交成功', '2017-11-06 19:23:13');
INSERT INTO `bj_sms_captcha` VALUES ('166', '17879837747', '0,提交成功', '2017-11-07 09:19:04');
INSERT INTO `bj_sms_captcha` VALUES ('167', '15865867664', '0,提交成功', '2017-11-07 09:22:33');
INSERT INTO `bj_sms_captcha` VALUES ('168', '18014869113', '0,提交成功', '2017-11-07 09:24:00');
INSERT INTO `bj_sms_captcha` VALUES ('169', '18686663624', '0,提交成功', '2017-11-07 09:24:20');
INSERT INTO `bj_sms_captcha` VALUES ('170', '18961519032', '0,提交成功', '2017-11-07 09:41:04');
INSERT INTO `bj_sms_captcha` VALUES ('171', '18961519032', '0,提交成功', '2017-11-07 09:42:03');
INSERT INTO `bj_sms_captcha` VALUES ('172', '18961519032', '0,提交成功', '2017-11-07 09:46:03');
INSERT INTO `bj_sms_captcha` VALUES ('173', '18961519032', '0,提交成功', '2017-11-07 09:50:20');
INSERT INTO `bj_sms_captcha` VALUES ('174', '18961519032', '0,提交成功', '2017-11-07 09:50:40');
INSERT INTO `bj_sms_captcha` VALUES ('175', '18961519032', '0,提交成功', '2017-11-07 09:52:37');
INSERT INTO `bj_sms_captcha` VALUES ('176', '18686663624', '0,提交成功', '2017-11-07 10:00:53');
INSERT INTO `bj_sms_captcha` VALUES ('177', '18014869113', '0,提交成功', '2017-11-07 10:06:33');
INSERT INTO `bj_sms_captcha` VALUES ('178', '18686663624', '0,提交成功', '2017-11-07 10:06:51');
INSERT INTO `bj_sms_captcha` VALUES ('179', '15802100074', '0,提交成功', '2017-11-07 10:17:32');
INSERT INTO `bj_sms_captcha` VALUES ('180', '18961519032', '0,提交成功', '2017-11-07 10:23:43');
INSERT INTO `bj_sms_captcha` VALUES ('181', '18961519032', '0,提交成功', '2017-11-07 10:23:59');
INSERT INTO `bj_sms_captcha` VALUES ('182', '15802100074', '0,提交成功', '2017-11-07 10:35:31');
INSERT INTO `bj_sms_captcha` VALUES ('183', '17879837747', '0,提交成功', '2017-11-07 10:59:52');
INSERT INTO `bj_sms_captcha` VALUES ('184', '15865867664', '0,提交成功', '2017-11-07 11:02:03');
INSERT INTO `bj_sms_captcha` VALUES ('185', '18961519032', '0,提交成功', '2017-11-07 11:07:49');
INSERT INTO `bj_sms_captcha` VALUES ('186', '18961519032', '0,提交成功', '2017-11-07 11:08:03');
INSERT INTO `bj_sms_captcha` VALUES ('187', '18961519032', '0,提交成功', '2017-11-07 11:22:24');
INSERT INTO `bj_sms_captcha` VALUES ('188', '18961519032', '0,提交成功', '2017-11-07 11:24:23');
INSERT INTO `bj_sms_captcha` VALUES ('189', '17879837747', '0,提交成功', '2017-11-07 13:45:21');
INSERT INTO `bj_sms_captcha` VALUES ('190', '18961519032', '0,提交成功', '2017-11-07 13:54:10');
INSERT INTO `bj_sms_captcha` VALUES ('191', '18961519032', '0,提交成功', '2017-11-07 13:55:18');
INSERT INTO `bj_sms_captcha` VALUES ('192', '15865867664', '0,提交成功', '2017-11-07 13:56:24');
INSERT INTO `bj_sms_captcha` VALUES ('193', '15865867664', '0,提交成功', '2017-11-07 14:26:00');
INSERT INTO `bj_sms_captcha` VALUES ('194', '18961519032', '0,提交成功', '2017-11-07 14:28:58');
INSERT INTO `bj_sms_captcha` VALUES ('195', '18961519032', '0,提交成功', '2017-11-07 14:41:53');
INSERT INTO `bj_sms_captcha` VALUES ('196', '18961519032', '0,提交成功', '2017-11-07 14:51:02');
INSERT INTO `bj_sms_captcha` VALUES ('197', '18961519032', '0,提交成功', '2017-11-07 14:51:16');
INSERT INTO `bj_sms_captcha` VALUES ('198', '18961519032', '0,提交成功', '2017-11-14 08:54:01');
INSERT INTO `bj_sms_captcha` VALUES ('199', '18961519032', '0,提交成功', '2017-11-16 08:41:11');
INSERT INTO `bj_sms_captcha` VALUES ('200', '18961519032', '0,提交成功', '2017-11-16 08:41:16');
INSERT INTO `bj_sms_captcha` VALUES ('201', '18961519032', '0,提交成功', '2017-11-16 08:42:09');
INSERT INTO `bj_sms_captcha` VALUES ('202', '18961519032', '0,提交成功', '2017-11-16 10:21:19');
INSERT INTO `bj_sms_captcha` VALUES ('203', '18961519032', '0,提交成功', '2017-11-16 16:01:18');
INSERT INTO `bj_sms_captcha` VALUES ('204', '18961519032', '0,提交成功', '2017-11-17 08:36:41');
INSERT INTO `bj_sms_captcha` VALUES ('205', '15550161208', '0,提交成功', '2017-11-24 09:02:00');
INSERT INTO `bj_sms_captcha` VALUES ('206', '10', '1023,无效计费条数,号码不规则,过滤[1:10,]', '2017-11-24 11:27:08');
INSERT INTO `bj_sms_captcha` VALUES ('207', '15550161208', '0,提交成功', '2017-11-25 09:13:23');
INSERT INTO `bj_sms_captcha` VALUES ('208', '15550161208', '0,提交成功', '2017-11-25 09:28:12');
INSERT INTO `bj_sms_captcha` VALUES ('209', '15550161208', '0,提交成功', '2017-11-25 09:45:14');
INSERT INTO `bj_sms_captcha` VALUES ('210', '15550161208', '0,提交成功', '2017-11-25 09:55:06');
INSERT INTO `bj_sms_captcha` VALUES ('211', '15550161208', '0,提交成功', '2017-11-25 10:43:01');
INSERT INTO `bj_sms_captcha` VALUES ('212', '15550161208', '0,提交成功', '2017-11-25 11:28:37');
INSERT INTO `bj_sms_captcha` VALUES ('213', '15550161208', '0,提交成功', '2017-11-25 11:29:37');
INSERT INTO `bj_sms_captcha` VALUES ('214', '15550161208', '0,提交成功', '2017-11-25 11:30:08');
INSERT INTO `bj_sms_captcha` VALUES ('215', '15550161208', '0,提交成功', '2017-11-27 10:48:14');
INSERT INTO `bj_sms_captcha` VALUES ('216', '15550161208', '0,提交成功', '2017-11-27 11:23:56');
INSERT INTO `bj_sms_captcha` VALUES ('217', '18961519032', '0,提交成功', '2017-11-27 11:59:49');
INSERT INTO `bj_sms_captcha` VALUES ('218', '18961519032', '0,提交成功', '2017-11-27 16:56:02');
INSERT INTO `bj_sms_captcha` VALUES ('219', '18961519032', '0,提交成功', '2017-11-27 16:56:55');
INSERT INTO `bj_sms_captcha` VALUES ('220', '1', '1023,无效计费条数,号码不规则,过滤[1:1,]', '2017-11-28 11:42:11');
INSERT INTO `bj_sms_captcha` VALUES ('221', '1', '1023,无效计费条数,号码不规则,过滤[1:1,]', '2017-11-28 11:50:30');
INSERT INTO `bj_sms_captcha` VALUES ('222', '1', '1023,无效计费条数,号码不规则,过滤[1:1,]', '2017-11-28 12:53:00');
INSERT INTO `bj_sms_captcha` VALUES ('223', '15865867664', '0,提交成功', '2017-11-28 12:58:16');
INSERT INTO `bj_sms_captcha` VALUES ('224', '18961519032', '0,提交成功', '2017-11-28 13:18:01');
INSERT INTO `bj_sms_captcha` VALUES ('225', '15865867664', '0,提交成功', '2017-11-28 13:34:27');
INSERT INTO `bj_sms_captcha` VALUES ('226', '15865867664', '0,提交成功', '2017-11-28 14:02:23');
INSERT INTO `bj_sms_captcha` VALUES ('227', '18961519032', '0,提交成功', '2017-11-28 14:12:20');
INSERT INTO `bj_sms_captcha` VALUES ('228', '18961519032', '0,提交成功', '2017-11-28 14:14:15');
INSERT INTO `bj_sms_captcha` VALUES ('229', '18961519032', '0,提交成功', '2017-11-28 14:28:52');
INSERT INTO `bj_sms_captcha` VALUES ('230', '18961519032', '0,提交成功', '2017-11-28 15:00:19');
INSERT INTO `bj_sms_captcha` VALUES ('231', '18961519032', '0,提交成功', '2017-11-28 15:07:52');
INSERT INTO `bj_sms_captcha` VALUES ('232', '18961519032', '0,提交成功', '2017-11-28 15:35:57');
INSERT INTO `bj_sms_captcha` VALUES ('233', '11111111111', '1023,无效计费条数,号码不规则,过滤[1:11111111111,]', '2017-11-29 10:12:41');
INSERT INTO `bj_sms_captcha` VALUES ('234', '18964632696', '0,提交成功', '2017-11-29 10:25:23');
INSERT INTO `bj_sms_captcha` VALUES ('235', '11111111111', '1023,无效计费条数,号码不规则,过滤[1:11111111111,]', '2017-11-29 11:01:15');
INSERT INTO `bj_sms_captcha` VALUES ('236', '17879837747', '0,提交成功', '2017-11-29 11:25:13');
INSERT INTO `bj_sms_captcha` VALUES ('237', '11111111111', '1023,无效计费条数,号码不规则,过滤[1:11111111111,]', '2017-11-29 11:43:44');
INSERT INTO `bj_sms_captcha` VALUES ('238', '15865867664', '0,提交成功', '2017-11-29 16:33:27');
INSERT INTO `bj_sms_captcha` VALUES ('239', '17879837747', '0,提交成功', '2017-11-29 16:53:14');
INSERT INTO `bj_sms_captcha` VALUES ('240', '15865867664', '0,提交成功', '2017-11-30 13:17:22');
INSERT INTO `bj_sms_captcha` VALUES ('241', '15865867664', '0,提交成功', '2017-11-30 13:52:57');
INSERT INTO `bj_sms_captcha` VALUES ('242', '15865867664', '0,提交成功', '2017-11-30 14:24:28');
INSERT INTO `bj_sms_captcha` VALUES ('243', '15865867664', '0,提交成功', '2017-11-30 14:41:07');
INSERT INTO `bj_sms_captcha` VALUES ('244', '15865867664', '0,提交成功', '2017-11-30 15:41:48');
INSERT INTO `bj_sms_captcha` VALUES ('245', '11', '1023,无效计费条数,号码不规则,过滤[1:11,]', '2017-11-30 16:16:39');
INSERT INTO `bj_sms_captcha` VALUES ('246', '11', '1023,无效计费条数,号码不规则,过滤[1:11,]', '2017-11-30 16:34:23');
INSERT INTO `bj_sms_captcha` VALUES ('247', '15550161208', '0,提交成功', '2017-12-01 10:18:50');
INSERT INTO `bj_sms_captcha` VALUES ('248', '12345678900', '1023,无效计费条数,号码不规则,过滤[1:12345678900,]', '2017-12-01 14:46:51');
INSERT INTO `bj_sms_captcha` VALUES ('249', '15550161208', '0,提交成功', '2017-12-01 15:59:26');
INSERT INTO `bj_sms_captcha` VALUES ('250', '12345678900', '1023,无效计费条数,号码不规则,过滤[1:12345678900,]', '2017-12-01 16:40:52');
INSERT INTO `bj_sms_captcha` VALUES ('251', '15865867664', '0,提交成功', '2017-12-04 11:35:26');
INSERT INTO `bj_sms_captcha` VALUES ('252', '15865867664', '0,提交成功', '2017-12-04 13:37:23');
INSERT INTO `bj_sms_captcha` VALUES ('253', '13333333333', '0,提交成功', '2017-12-04 16:26:30');
INSERT INTO `bj_sms_captcha` VALUES ('254', '13333333333', '0,提交成功', '2017-12-05 15:51:37');
INSERT INTO `bj_sms_captcha` VALUES ('255', '11', '1023,无效计费条数,号码不规则,过滤[1:11,]', '2017-12-06 09:21:42');
INSERT INTO `bj_sms_captcha` VALUES ('256', '18961519032', '0,提交成功', '2017-12-06 10:43:57');
INSERT INTO `bj_sms_captcha` VALUES ('257', '15550161208', '0,提交成功', '2017-12-06 10:49:22');
INSERT INTO `bj_sms_captcha` VALUES ('258', '17714559315', '0,提交成功', '2017-12-06 11:01:13');
INSERT INTO `bj_sms_captcha` VALUES ('259', '15550161208', '0,提交成功', '2017-12-06 11:14:01');
INSERT INTO `bj_sms_captcha` VALUES ('260', '11', '1023,无效计费条数,号码不规则,过滤[1:11,]', '2017-12-06 13:15:56');
INSERT INTO `bj_sms_captcha` VALUES ('261', '15550161208', '0,提交成功', '2017-12-06 13:47:29');
INSERT INTO `bj_sms_captcha` VALUES ('262', '11', '1023,无效计费条数,号码不规则,过滤[1:11,]', '2017-12-07 09:13:56');
INSERT INTO `bj_sms_captcha` VALUES ('263', '11', '1023,无效计费条数,号码不规则,过滤[1:11,]', '2017-12-07 09:33:06');
INSERT INTO `bj_sms_captcha` VALUES ('264', '11', '1023,无效计费条数,号码不规则,过滤[1:11,]', '2017-12-07 09:47:13');
INSERT INTO `bj_sms_captcha` VALUES ('265', '11', '1023,无效计费条数,号码不规则,过滤[1:11,]', '2017-12-07 10:26:51');
INSERT INTO `bj_sms_captcha` VALUES ('266', '11', '1023,无效计费条数,号码不规则,过滤[1:11,]', '2017-12-07 10:47:04');
INSERT INTO `bj_sms_captcha` VALUES ('267', '11', '1023,无效计费条数,号码不规则,过滤[1:11,]', '2017-12-07 13:33:54');
INSERT INTO `bj_sms_captcha` VALUES ('268', '15550161208', '0,提交成功', '2017-12-07 13:59:59');
INSERT INTO `bj_sms_captcha` VALUES ('269', '18961519032', '0,提交成功', '2017-12-07 14:09:08');
INSERT INTO `bj_sms_captcha` VALUES ('270', '18961519032', '0,提交成功', '2017-12-07 15:03:44');
INSERT INTO `bj_sms_captcha` VALUES ('271', '15550161208', '0,提交成功', '2017-12-07 15:17:37');
INSERT INTO `bj_sms_captcha` VALUES ('272', '18686663624', '0,提交成功', '2017-12-07 15:23:21');
INSERT INTO `bj_sms_captcha` VALUES ('273', '18961519032', '0,提交成功', '2017-12-07 15:32:47');
INSERT INTO `bj_sms_captcha` VALUES ('274', '18961519032', '0,提交成功', '2017-12-07 16:19:11');
INSERT INTO `bj_sms_captcha` VALUES ('275', '18686663624', '0,提交成功', '2017-12-07 16:22:38');
INSERT INTO `bj_sms_captcha` VALUES ('276', '18686663624', '0,提交成功', '2017-12-08 08:52:56');
INSERT INTO `bj_sms_captcha` VALUES ('277', '18961519032', '0,提交成功', '2017-12-08 10:36:50');
INSERT INTO `bj_sms_captcha` VALUES ('278', '18961519032', '0,提交成功', '2017-12-08 15:14:48');
INSERT INTO `bj_sms_captcha` VALUES ('279', '18961519032', '0,提交成功', '2017-12-08 16:01:03');
INSERT INTO `bj_sms_captcha` VALUES ('280', '18686663624', '0,提交成功', '2017-12-08 16:06:32');
INSERT INTO `bj_sms_captcha` VALUES ('281', '18961519032', '0,提交成功', '2017-12-08 16:58:39');
INSERT INTO `bj_sms_captcha` VALUES ('282', '18961519032', '0,提交成功', '2017-12-08 17:36:34');
INSERT INTO `bj_sms_captcha` VALUES ('283', '18686663624', '0,提交成功', '2017-12-09 10:12:32');
INSERT INTO `bj_sms_captcha` VALUES ('284', '18686663624', '0,提交成功', '2017-12-09 14:39:19');
INSERT INTO `bj_sms_captcha` VALUES ('285', '18686663624', '0,提交成功', '2017-12-09 15:00:00');
INSERT INTO `bj_sms_captcha` VALUES ('286', '12345678900', '1023,无效计费条数,号码不规则,过滤[1:12345678900,]', '2017-12-09 15:58:20');
INSERT INTO `bj_sms_captcha` VALUES ('287', '12345678900', '1023,无效计费条数,号码不规则,过滤[1:12345678900,]', '2017-12-09 16:04:26');
INSERT INTO `bj_sms_captcha` VALUES ('288', '18961519032', '0,提交成功', '2017-12-09 16:12:52');
INSERT INTO `bj_sms_captcha` VALUES ('289', '18961519032', '0,提交成功', '2017-12-11 13:32:38');

-- ----------------------------
-- Table structure for bj_sms_captcha_log
-- ----------------------------
DROP TABLE IF EXISTS `bj_sms_captcha_log`;
CREATE TABLE `bj_sms_captcha_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `phone` varchar(11) NOT NULL COMMENT '手机号',
  `captcha` varchar(6) NOT NULL COMMENT '短信验证码',
  `response` varchar(100) NOT NULL COMMENT '短信平台响应结果',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=238 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bj_sms_captcha_log
-- ----------------------------
INSERT INTO `bj_sms_captcha_log` VALUES ('125', '18686663624', '708316', '0', '1509952821', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('126', '15550161208', '709059', '0', '1509952841', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('127', '18961519032', '874097', '0', '1509953453', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('128', '17714559315', '564791', '0', '1509956554', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('129', '15865867664', '916843', '0', '1509956605', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('130', '18014869113', '669836', '0', '1509956614', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('131', '17879837747', '678352', '0', '1509956662', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('132', '17879837747', '195205', '0', '1509956795', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('133', '15802100074', '321045', '0', '1509965630', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('134', '13818759298', '451403', '0', '1510014427', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('135', '18301969281', '321114', '0', '1510015393', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('136', '15550161208', '265636', '0', '1510210847', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('137', '18686663624', '974581', '0', '1510210978', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('138', '18686663624', '673062', '0', '1510220823', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('139', '18686663624', '336297', '0', '1510221013', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('140', '18686663624', '599089', '0', '1510221044', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('141', '18961519032', '357092', '0', '1510533867', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('142', '18961519032', '439615', '0', '1510533868', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('143', '18961519032', '290551', '0', '1510535898', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('147', '18961519032', '750695', '0', '1510536415', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('148', '18961519032', '156313', '0', '1510543085', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('149', '18961519032', '877571', '0', '1510543735', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('150', '18961519032', '725319', '0', '1510543746', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('151', '18961519032', '292968', '0', '1510544936', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('153', '18961519032', '404434', '0', '1510545299', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('154', '18961519032', '731771', '0', '1510545449', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('155', '18961519032', '481109', '0', '1510545551', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('157', '18961519032', '446792', '0', '1510550093', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('158', '18961519032', '468547', '0', '1510550813', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('159', '18961519032', '284363', '0', '1510550977', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('160', '18961519032', '631099', '0', '1510620220', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('161', '17714559315', '353194', '0', '1510620450', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('162', '15550161208', '384009', '0', '1510645927', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('163', '15550161205', '349522', '0', '1510651718', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('164', '15550161205', '527313', '0', '1510651748', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('165', '15550161208', '832766', '0', '1510651765', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('166', '15550161208', '150030', '0', '1510651818', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('167', '18961519302', '575436', '0', '1510706835', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('168', '18961519032', '636442', '0', '1510708080', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('169', '18014869113', '770126', '0', '1510711191', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('170', '18014869113', '711205', '0', '1510711377', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('171', '18961519032', '963562', '0', '1510717581', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('172', '15865867664', '910941', '0', '1510720390', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('173', '18221105034', '405560', '0', '1510883796', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('174', '17553018107', '477238', '0', '1511489953', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('175', '15550161208', '543660', '0', '1511511214', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('176', '15550161208', '498693', '0', '1511511533', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('177', '15550161208', '443290', '0', '1511511545', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('178', '18686663624', '321818', '0', '1511511741', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('179', '18961519032', '720515', '0', '1511750468', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('180', '15865867664', '856579', '0', '1511855578', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('181', '15865867664', '676192', '0', '1511857032', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('182', '15810512002', '906500', '0', '1511917035', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('183', '18964632696', '684591', '0', '1511917058', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('184', '18964632696', '225248', '0', '1511917129', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('185', '18961519032', '757210', '0', '1511917414', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('186', '17879837747', '257117', '0', '1511918176', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('187', '18961519032', '171596', '0', '1511918366', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('188', '18017750468', '471106', '0', '1511918469', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('189', '18017750468', '217563', '0', '1511918608', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('190', '15810512002', '930959', '0', '1511918655', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('191', '13764840087', '709473', '0', '1511923273', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('192', '13818759298', '181805', '0', '1511924258', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('193', '15550161208', '119484', '0', '1511925209', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('194', '13764840087', '624839', '0', '1511933590', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('195', '18017750468', '311835', '0', '1511942264', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('196', '15802182802', '426187', '0', '1511943529', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('197', '15900517292', '659843', '0', '1511943575', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('198', '15865068023', '263847', '0', '1511943575', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('199', '18049878739', '914267', '0', '1511943595', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('200', '15653049879', '437678', '0', '1511943657', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('201', '13524069049', '171927', '0', '1511943661', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('202', '15802182802', '742685', '0', '1511943677', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('203', '15900517292', '773872', '0', '1511943912', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('204', '15802100074', '796444', '0', '1511948058', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('205', '17553018107', '548940', '0', '1511948122', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('206', '18686663624', '455412', '0', '1512018825', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('207', '13764840087', '111792', '0', '1512089120', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('208', '18017750468', '244441', '0', '1512090831', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('209', '18201806582', '331195', '0', '1512093001', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('210', '18301969281', '605484', '0', '1512093330', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('211', '15802100074', '120467', '0', '1512106553', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('212', '18961519032', '834917', '0', '1512109493', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('213', '18686663624', '959127', '0', '1512439934', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('214', '18014869113', '401760', '0', '1512440987', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('215', '18686663625', '380397', '0', '1512466401', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('216', '18686663642', '228177', '0', '1512466565', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('217', '18686663642', '309865', '0', '1512466920', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('218', '18686663642', '254707', '0', '1512467111', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('219', '18686663624', '566826', '0', '1512467147', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('220', '17714559315', '384672', '0', '1512521763', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('221', '17714559315', '140820', '0', '1512521902', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('222', '18961519032', '830262', '0', '1512523739', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('223', '18961519032', '673440', '0', '1512539066', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('224', '18686663624', '770418', '0', '1512607881', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('225', '17777777777', '171681', '0', '1512623924', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('226', '18888888888', '407785', '0', '1512624102', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('227', '18888888888', '215034', '0', '1512624209', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('228', '17714559858', '430798', '0', '1512624287', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('229', '18888888888', '214483', '0', '1512624645', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('230', '18262606578', '650307', '0', '1512624755', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('231', '18262606578', '483188', '0', '1512625009', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('232', '18017750468', '986681', '0', '1512806101', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('233', '18888888888', '255457', '0', '1512955465', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('234', '17888888888', '594838', '0', '1512956528', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('235', '13957858966', '807057', '0', '1512960345', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('236', '15554519088', '131938', '0', '1512960831', null);
INSERT INTO `bj_sms_captcha_log` VALUES ('237', '15554519088', '573977', '0', '1512969685', null);

-- ----------------------------
-- Table structure for bj_step
-- ----------------------------
DROP TABLE IF EXISTS `bj_step`;
CREATE TABLE `bj_step` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `service_type` int(10) NOT NULL COMMENT '类型对应ID',
  `service_name` varchar(32) NOT NULL COMMENT '类型对应名称',
  `stepnum` int(10) NOT NULL COMMENT '步骤总数',
  `step_id` int(10) NOT NULL COMMENT '步骤ID',
  `step_name` varchar(255) NOT NULL COMMENT '步骤名称',
  `step_link` varchar(255) DEFAULT NULL COMMENT '步骤所跳转的页面',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='订单步骤表';

-- ----------------------------
-- Records of bj_step
-- ----------------------------
INSERT INTO `bj_step` VALUES ('1', '1', '维修1', '9', '1', '发布订单成功', '');
INSERT INTO `bj_step` VALUES ('2', '1', '维修1', '9', '2', '招募师傅', '__PUBLIC__jilt_single/%s');
INSERT INTO `bj_step` VALUES ('3', '1', '维修1', '9', '3', '订单交流讨论', '__PUBLIC__guestbook/%s');
INSERT INTO `bj_step` VALUES ('4', '1', '维修1', '9', '4', '去选标', '__PUBLIC__guestbook/%s');
INSERT INTO `bj_step` VALUES ('5', '1', '维修1', '9', '5', '去付款', '__PUBLIC__settlement/%s/url/0');
INSERT INTO `bj_step` VALUES ('6', '1', '维修1', '9', '6', '师傅确认接单，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_step` VALUES ('7', '1', '维修1', '9', '7', '师傅施工中', '');
INSERT INTO `bj_step` VALUES ('8', '1', '维修1', '9', '8', '师傅已上传维修验收报告，请注意查看及确认 ', '__PUBLIC__client_affirm_accomplishs/%s');
INSERT INTO `bj_step` VALUES ('9', '1', '维修1', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_step` VALUES ('10', '2', '维修2(众包咨询)', '9', '1', '发布订单成功', '');
INSERT INTO `bj_step` VALUES ('11', '2', '维修2(众包咨询)', '9', '2', '挑主任师傅', '__PUBLIC__master_filters/%s/cid/choose/sid/0');
INSERT INTO `bj_step` VALUES ('12', '2', '维修2(众包咨询)', '9', '3', '咨询主任师傅', '__PUBLIC__director_master/%s/wid/%s');
INSERT INTO `bj_step` VALUES ('13', '2', '维修2(众包咨询)', '9', '4', '增加普通师傅', '__PUBLIC__common_master/%s/wid/0');
INSERT INTO `bj_step` VALUES ('14', '2', '维修2(众包咨询)', '9', '5', '您已挑选好师傅，请选择付款 ', ' __PUBLIC__settlement/%s/url/0');
INSERT INTO `bj_step` VALUES ('15', '2', '维修2(众包咨询)', '9', '6', '已经付款，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_step` VALUES ('16', '2', '维修2(众包咨询)', '9', '7', '师傅施工中', '');
INSERT INTO `bj_step` VALUES ('17', '2', '维修2(众包咨询)', '9', '8', '师傅已上传维修施工报告，请注意查看及确认', '__PUBLIC__client_affirm_accomplishs/%s');
INSERT INTO `bj_step` VALUES ('18', '2', '维修2(众包咨询)', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_step` VALUES ('19', '3', '安装1', '9', '1', '发布订单成功', '');
INSERT INTO `bj_step` VALUES ('20', '3', '安装1', '9', '2', '招募师傅', '__PUBLIC__install_jilt_single/%s');
INSERT INTO `bj_step` VALUES ('21', '3', '安装1', '9', '3', '订单交流讨论', '__PUBLIC__install_message_pairing/%s');
INSERT INTO `bj_step` VALUES ('22', '3', '安装1', '9', '4', '去选标', '__PUBLIC__install_message_pairing/%s');
INSERT INTO `bj_step` VALUES ('23', '3', '安装1', '9', '5', '去付款', '__PUBLIC__install_settlement/%s/url/0');
INSERT INTO `bj_step` VALUES ('24', '3', '安装1', '9', '6', '师傅确认接单，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_step` VALUES ('25', '3', '安装1', '9', '7', '师傅施工中', '');
INSERT INTO `bj_step` VALUES ('26', '3', '安装1', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_step` VALUES ('27', '3', '安装1', '9', '8', '师傅已上传安装验收报告，请注意查看及确认 ', '__PUBLIC__kehuqurenbiao/%s');
INSERT INTO `bj_step` VALUES ('28', '4', '安装2(众包咨询)', '0', '1', '发布订单成功', null);
INSERT INTO `bj_step` VALUES ('29', '4', '安装2(众包咨询)', '9', '2', '挑主任师傅', '__PUBLIC__master_filters/%s/cid/choose_wid/sid/0');
INSERT INTO `bj_step` VALUES ('30', '4', '安装2(众包咨询)', '9', '3', '咨询主任师傅', '__PUBLIC__install_director_master/%s/wid/%s');
INSERT INTO `bj_step` VALUES ('31', '4', '安装2(众包咨询)', '9', '4', '增加普通师傅', '__PUBLIC__common_master/%s/wid/0');
INSERT INTO `bj_step` VALUES ('32', '4', '安装2(众包咨询)', '9', '5', '您已挑选好师傅，请选择付款 ', '__PUBLIC__install_settlement/%s/url/0');
INSERT INTO `bj_step` VALUES ('33', '4', '安装2(众包咨询)', '9', '6', '已经付款，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_step` VALUES ('34', '4', '安装2(众包咨询)', '9', '7', '师傅施工中', '');
INSERT INTO `bj_step` VALUES ('35', '4', '安装2(众包咨询)', '9', '8', '师傅已上传安装施工报告，请注意查看及确认', '__PUBLIC__kehuqurenbiao/%s');
INSERT INTO `bj_step` VALUES ('36', '4', '安装2(众包咨询)', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_step` VALUES ('37', '5', '勘测', '7', '1', '发布订单成功，请耐心等待平台为你估价', null);
INSERT INTO `bj_step` VALUES ('38', '5', '勘测', '7', '2', '平台已估价，请选择付款', '__PUBLIC__ds_survey_payment/%s');
INSERT INTO `bj_step` VALUES ('39', '5', '勘测', '7', '3', '您已付款成功，请随时保持电话顺畅，师傅将在两小时内联系您', null);
INSERT INTO `bj_step` VALUES ('40', '5', '勘测', '7', '4', '师傅正在施工', null);
INSERT INTO `bj_step` VALUES ('41', '5', '勘测', '7', '5', '亲爱的客户，师傅已经上传勘测手稿，请注意查看及确认', '__PUBLIC__customer_survey_manuscript/%s');
INSERT INTO `bj_step` VALUES ('42', '5', '勘测', '7', '6', '师傅已上传勘测施工报告，请注意查收及确认报告', '__PUBLIC__survey_customer_presentation/%s');
INSERT INTO `bj_step` VALUES ('43', '5', '勘测', '7', '7', '已确认报告，订单完成，感谢您对标匠的信任，期待再次与您合作', null);
INSERT INTO `bj_step` VALUES ('45', '8', '围板搭建1', '9', '1', '发布订单成功', '');
INSERT INTO `bj_step` VALUES ('46', '8', '围板搭建1', '9', '2', '招募师傅', '__PUBLIC__coaming_jilt_single/%s');
INSERT INTO `bj_step` VALUES ('47', '8', '围板搭建1', '9', '3', '订单交流讨论', '__PUBLIC__coaming_message_pairing/%s');
INSERT INTO `bj_step` VALUES ('48', '8', '围板搭建1', '9', '4', '去选标', '__PUBLIC__coaming_message_pairing/%s');
INSERT INTO `bj_step` VALUES ('49', '8', '围板搭建1', '9', '5', '去付款', '__PUBLIC__coaming_settlement/%s/url/0');
INSERT INTO `bj_step` VALUES ('50', '8', '围板搭建1', '9', '6', '师傅确认接单，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_step` VALUES ('51', '8', '围板搭建1', '9', '7', '师傅施工中', '');
INSERT INTO `bj_step` VALUES ('52', '8', '围板搭建1', '9', '8', '师傅已上传围板搭建验收报告，请注意查看及确认 ', '__PUBLIC__coaming_customer_presentation/%s');
INSERT INTO `bj_step` VALUES ('53', '8', '围板搭建1', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_step` VALUES ('54', '9', '围板搭建2(众包咨询)', '0', '1', '发布订单成功', '');
INSERT INTO `bj_step` VALUES ('55', '9', '围板搭建2(众包咨询)', '9', '2', '挑主任师傅', '__PUBLIC__master_filters/%s/cid/choose_coaming/sid/0');
INSERT INTO `bj_step` VALUES ('56', '9', '围板搭建2(众包咨询)', '9', '3', '咨询主任师傅', '__PUBLIC__coaming_director_master/%s/wid/%s');
INSERT INTO `bj_step` VALUES ('57', '9', '围板搭建2(众包咨询)', '9', '4', '增加普通师傅', '__PUBLIC__common_master/%s/wid/0');
INSERT INTO `bj_step` VALUES ('58', '9', '围板搭建2(众包咨询)', '9', '5', '您已挑选好师傅，请选择付款 ', '__PUBLIC__coaming_settlement/%s/url/0');
INSERT INTO `bj_step` VALUES ('59', '9', '围板搭建2(众包咨询)', '9', '6', '已经付款，请随时保持通话顺畅，师傅将在2小时内联系您', '');
INSERT INTO `bj_step` VALUES ('60', '9', '围板搭建2(众包咨询)', '9', '7', '师傅施工中', '');
INSERT INTO `bj_step` VALUES ('61', '9', '围板搭建2(众包咨询)', '9', '8', '师傅已上传围板搭建施工报告，请注意查看及确认', '__PUBLIC__coaming_customer_presentation/%s');
INSERT INTO `bj_step` VALUES ('62', '9', '围板搭建2(众包咨询)', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', '');
INSERT INTO `bj_step` VALUES ('63', '6', '更换灯片1', '9', '1', '发布订单成功', null);
INSERT INTO `bj_step` VALUES ('64', '6', '更换灯片1', '9', '2', '招募师傅', '__PUBLIC__gjmjilt_single/%s');
INSERT INTO `bj_step` VALUES ('65', '6', '更换灯片1', '9', '3', '订单交流讨论', '__PUBLIC__gjmjilt_single/%s');
INSERT INTO `bj_step` VALUES ('66', '6', '更换灯片1', '9', '4', '去选标', '__PUBLIC__gjmjilt_single/%s');
INSERT INTO `bj_step` VALUES ('67', '6', '更换灯片1', '9', '5', '去付款', null);
INSERT INTO `bj_step` VALUES ('68', '6', '更换灯片1', '9', '6', '师傅确认接单，请随时保持通话顺畅，师傅将在2小时内联系您', null);
INSERT INTO `bj_step` VALUES ('69', '6', '更换灯片1', '9', '7', '师傅施工中', null);
INSERT INTO `bj_step` VALUES ('70', '6', '更换灯片1', '9', '8', '师傅已上传更换灯片验收报告，请注意查看及确认 ', '__PUBLIC__replace_customer_presentation/%s');
INSERT INTO `bj_step` VALUES ('71', '6', '更换灯片1', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', null);
INSERT INTO `bj_step` VALUES ('72', '7', '更换灯片2(众包咨询', '9', '1', '发布订单成功', null);
INSERT INTO `bj_step` VALUES ('73', '7', '更换灯片2(众包咨询', '9', '2', '挑主任师傅', '__PUBLIC__master_filters/%s/cid/gjmchoose_wid/sid/0');
INSERT INTO `bj_step` VALUES ('74', '7', '更换灯片2(众包咨询', '9', '3', '咨询主任师傅', '__PUBLIC__gjminstall_director_master/%s/wid/%s');
INSERT INTO `bj_step` VALUES ('75', '7', '更换灯片2(众包咨询', '9', '4', '增加普通师傅', '__PUBLIC__common_master/%s/wid/0');
INSERT INTO `bj_step` VALUES ('76', '7', '更换灯片2(众包咨询', '9', '5', '您已挑选好师傅，请选择付款 ', '__PUBLIC__settlements/%s/url/0');
INSERT INTO `bj_step` VALUES ('77', '7', '更换灯片2(众包咨询', '9', '6', '已经付款，请随时保持通话顺畅，师傅将在2小时内联系您', null);
INSERT INTO `bj_step` VALUES ('78', '7', '更换灯片2(众包咨询', '9', '7', '师傅施工中', null);
INSERT INTO `bj_step` VALUES ('79', '7', '更换灯片2(众包咨询', '9', '8', '师傅已上传更换灯片施工报告，请注意查看及确认', '__PUBLIC__replace_customer_presentation/%s');
INSERT INTO `bj_step` VALUES ('80', '7', '更换灯片2(众包咨询', '9', '9', '已确认报告，完成订单！感谢您对标匠的信赖，期待下一次能与你合作！', null);

-- ----------------------------
-- Table structure for bj_survey_invitation_record
-- ----------------------------
DROP TABLE IF EXISTS `bj_survey_invitation_record`;
CREATE TABLE `bj_survey_invitation_record` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `order_number` varchar(60) NOT NULL COMMENT '订单号',
  `worker_id` int(10) NOT NULL COMMENT '师傅ID',
  `price` int(10) NOT NULL COMMENT '平台估价',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='勘测邀请师傅记录表';

-- ----------------------------
-- Records of bj_survey_invitation_record
-- ----------------------------
INSERT INTO `bj_survey_invitation_record` VALUES ('14', '2017110615352726420', '35', '1');
INSERT INTO `bj_survey_invitation_record` VALUES ('15', '2017110616082921188', '35', '0');
INSERT INTO `bj_survey_invitation_record` VALUES ('16', '2017110618461371940', '37', '0');
INSERT INTO `bj_survey_invitation_record` VALUES ('17', '2017110709442748758', '40', '10');
INSERT INTO `bj_survey_invitation_record` VALUES ('18', '2017110709525024086', '37', '1');
INSERT INTO `bj_survey_invitation_record` VALUES ('19', '2017110710144230171', '40', '10');

-- ----------------------------
-- Table structure for bj_survey_manuscript
-- ----------------------------
DROP TABLE IF EXISTS `bj_survey_manuscript`;
CREATE TABLE `bj_survey_manuscript` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `order_number` varchar(60) NOT NULL COMMENT '订单号',
  `img` varchar(60) NOT NULL COMMENT '勘测图片',
  `is_ok` tinyint(1) DEFAULT '0' COMMENT '客户确认:1YES,0:NO',
  `work_id` int(10) NOT NULL COMMENT '师傅ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='勘测手稿表';

-- ----------------------------
-- Records of bj_survey_manuscript
-- ----------------------------
INSERT INTO `bj_survey_manuscript` VALUES ('14', '2017110618461371940', '59dc0201711061851175331.jpg', '1', '37');
INSERT INTO `bj_survey_manuscript` VALUES ('15', '2017110709442748758', '53f0d20171107100236147.JPG', '1', '40');
INSERT INTO `bj_survey_manuscript` VALUES ('16', '2017110710144230171', '07a91201711071018102717.jpg', '1', '40');

-- ----------------------------
-- Table structure for bj_survey_presentation
-- ----------------------------
DROP TABLE IF EXISTS `bj_survey_presentation`;
CREATE TABLE `bj_survey_presentation` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `order_number` varchar(60) NOT NULL COMMENT '订单号',
  `work_id` int(10) NOT NULL COMMENT '师傅ID',
  `img1` varchar(60) NOT NULL COMMENT '头门照图片',
  `img2` varchar(60) NOT NULL COMMENT '落位图图片',
  `img3` varchar(60) NOT NULL COMMENT '场地勘测图片',
  `user_sign` varchar(255) DEFAULT NULL COMMENT '客户签字图片',
  `is_ok` tinyint(1) NOT NULL DEFAULT '0' COMMENT '客户确认:1YES,0:NO',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='勘测报告表';

-- ----------------------------
-- Records of bj_survey_presentation
-- ----------------------------
INSERT INTO `bj_survey_presentation` VALUES ('13', '2017110618461371940', '37', '3fa7f201711061851355695.jpg', '722e3201711061851361794.jpeg', 'cfc86201711061851382434.jpg', 'uploads/signature/20171106/biaojiang33qianming_89e30d729011bf814eb98b7aecf27cc3.png', '1');
INSERT INTO `bj_survey_presentation` VALUES ('14', '2017110709442748758', '40', 'c148d201711071003129097.JPG', 'e7b66201711071004004475.JPG', 'b18f0201711071004034902.JPG', 'uploads/signature/20171107/biaojiang33qianming_96968d9ea0432bac9518c663b948f6f3.png', '1');
INSERT INTO `bj_survey_presentation` VALUES ('15', '2017110710144230171', '40', '47f84201711071020182583.JPG', '9a53a201711071020204507.JPG', '61232201711071020245993.JPG', 'uploads/signature/20171107/biaojiang33qianming_8e10407ab00fbaef3079dff30b312409.png', '1');

-- ----------------------------
-- Table structure for bj_survey_report
-- ----------------------------
DROP TABLE IF EXISTS `bj_survey_report`;
CREATE TABLE `bj_survey_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `order_id` int(11) NOT NULL COMMENT '主订单ID',
  `sub_order_id` int(11) DEFAULT NULL COMMENT '子订单ID',
  `owner_id` int(11) NOT NULL COMMENT '发布订单者ID',
  `worker_id` int(11) NOT NULL COMMENT '师傅ID',
  `content` text COMMENT '补充说明',
  `photos` text COMMENT '补充图片',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='核单报告';

-- ----------------------------
-- Records of bj_survey_report
-- ----------------------------

-- ----------------------------
-- Table structure for bj_touching_report
-- ----------------------------
DROP TABLE IF EXISTS `bj_touching_report`;
CREATE TABLE `bj_touching_report` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `order_number` varchar(255) DEFAULT NULL,
  `o_m_ids` varchar(255) DEFAULT NULL,
  `content` text COMMENT '核单报告补充的内容',
  `imagesids` text COMMENT '核单报告图片集',
  `user_signature_id` int(10) DEFAULT NULL COMMENT '客户签名照',
  `signature_id` int(10) DEFAULT NULL COMMENT '签名照',
  `is_ok` tinyint(1) DEFAULT '0',
  `create_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bj_touching_report
-- ----------------------------
INSERT INTO `bj_touching_report` VALUES ('184', '2017110617491168304', '133', '', '', null, '6', '0', '1509962580');
INSERT INTO `bj_touching_report` VALUES ('185', '2017110618153296877', '232', '000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa', 'fa75020171106182134720.jpg', '1500000343', '0', '0', '1509963788');
INSERT INTO `bj_touching_report` VALUES ('186', '2017110618153296877', '233', '000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa', '569bf201711061821486674.jpg', '1500000343', '0', '0', '1509963788');
INSERT INTO `bj_touching_report` VALUES ('187', '2017110618153296877', '234', '000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa000000000000000000000000sfaa', '4c669201711061821517494.jpg', '1500000343', '0', '0', '1509963788');
INSERT INTO `bj_touching_report` VALUES ('188', '2017110618543543981', '237', '1', '5cef5201711061858528690.jpg', '1500000346', '0', '0', '1509965942');
INSERT INTO `bj_touching_report` VALUES ('189', '2017110618241287022', '136', '', '9475e20171106190753368.jpg', '1500000349', '1', '0', '1509966480');
INSERT INTO `bj_touching_report` VALUES ('190', '2017110618542138078', '188', '1', 'ade18201711061919485302.jpg', '1500000351', '11', '0', '1509967198');
INSERT INTO `bj_touching_report` VALUES ('191', '2017110618542138078', '189', '22', '3be2320171106191952419.jpg', '1500000351', '11', '0', '1509967198');
INSERT INTO `bj_touching_report` VALUES ('192', '2017110619144610716', '137', '', 'e8253201711061922074572.png', '1500000350', '3', '0', '1509967331');
INSERT INTO `bj_touching_report` VALUES ('193', '2017110708371367163', '139', '123', '6eee8201711070925414013.png', '1500000353', '2', '0', '1510017946');
INSERT INTO `bj_touching_report` VALUES ('194', '201711070920381409', '81', '1', '20171107/4add1a992db2b7e07d95de681d6251dc.jpg', '1500000354', '1', '0', '1510017971');
INSERT INTO `bj_touching_report` VALUES ('195', '2017110709290237075', '190', '11', '406af201711070943285556.jpg', '1500000355', '0', '0', '1510019112');
INSERT INTO `bj_touching_report` VALUES ('196', '2017110709290237075', '191', '22', 'aab03201711070943359926.jpg', '1500000355', '0', '0', '1510019112');
INSERT INTO `bj_touching_report` VALUES ('197', '2017110709490291617', '192', '111', '007292017110709512718.jpg', '1500000356', '12', '0', '1510019490');
INSERT INTO `bj_touching_report` VALUES ('198', '2017110710043183881', '84', '1', '20171107/187388c1baa219bc5a3ee08cc72ac3af.jpg', '1500000357', '1', '0', '1510020672');
INSERT INTO `bj_touching_report` VALUES ('199', '201711071021194298', '197', '1', '2b51f201711071024536409.png', '1500000358', '1', '0', '1510021496');
INSERT INTO `bj_touching_report` VALUES ('200', '2017110711001690759', '200', '1', 'e3d24201711071109283392.jpg', '1500000361', '3', '0', '1510024174');
INSERT INTO `bj_touching_report` VALUES ('201', '2017110711001690759', '201', '2', '', '1500000361', '3', '0', '1510024174');
INSERT INTO `bj_touching_report` VALUES ('202', '2017110710422184585', '141', '456', '2413e201711071114226453.jpg', '1500000362', '3', '0', '1510024475');
INSERT INTO `bj_touching_report` VALUES ('203', '2017110713454584065', '210', '1', '85b8a201711071356383933.jpg', '1500000363', '11', '0', '1510034220');
INSERT INTO `bj_touching_report` VALUES ('204', '2017110713454584065', '211', '2', '608ee201711071356498033.jpg', '1500000363', '11', '0', '1510034220');
INSERT INTO `bj_touching_report` VALUES ('205', '2017110711243918369', '203', '123546', '9bddb201711071357365003.jpg', '1500000364', '12', '0', '1510034265');
INSERT INTO `bj_touching_report` VALUES ('206', '2017110714140342064', '212', '11', 'b3c00201711071442508580.jpg', '1500000365', '11', '0', '1510036994');
INSERT INTO `bj_touching_report` VALUES ('207', '2017110714140342064', '213', '22', '8d6f9201711071443018358.jpg', '1500000365', '11', '0', '1510036994');
INSERT INTO `bj_touching_report` VALUES ('208', '2017110714492823285', '216', '11', 'ffc66201711071451394149.jpg', '1500000366', '222', '0', '1510037507');
INSERT INTO `bj_touching_report` VALUES ('212', '2017112408543841416', '461', '12321', 'ce26a201711240940114279.png', '1500000367', '5645', '1', '1511487912');
INSERT INTO `bj_touching_report` VALUES ('217', '2017112509085618669', '482', '', 'bb50420171125091522723.png', '1500000369', '1255', '1', '1511572790');
INSERT INTO `bj_touching_report` VALUES ('219', '2017112710274482395', '523', '士大夫', 'a8731201711271057244651.png', '1500000374', '11', '1', '1511751553');
INSERT INTO `bj_touching_report` VALUES ('221', '2017112811482073980', '547', '45555', 'b3e67201711281153174517.jpg', '1500000377', '1588', '1', '1511841275');
INSERT INTO `bj_touching_report` VALUES ('228', '2017112812570268277', '550', '15156', '93d82201711281259339095.png', '1500000381', '55561', '1', '1511845764');
INSERT INTO `bj_touching_report` VALUES ('229', '2017112813500685476', '556', '政府自行车', 'a7d89201711281415351391.png', '1500000383', '12', '1', '1511849756');
INSERT INTO `bj_touching_report` VALUES ('230', '2017112814263759771', '567', '111', 'e4c5b201711281429226665.png', '1500000384', '12', '1', '1511850572');
INSERT INTO `bj_touching_report` VALUES ('231', '2017112814575388463', '569', '', '22623201711281500416860.png', '1500000386', '12', '1', '1511852447');
INSERT INTO `bj_touching_report` VALUES ('232', '2017112814575388463', '570', '1111', '36047201711281500438608.png', '1500000386', '12', '1', '1511852447');
INSERT INTO `bj_touching_report` VALUES ('233', '2017112909421357950', '578', '22', 'da291201711291013433613.jpeg', '1500000390', '2', '1', '1511921639');
INSERT INTO `bj_touching_report` VALUES ('235', '2017112910514819870', '580', '12', '3e830201711291101443088.jpeg', '1500000392', '12', '1', '1511924517');
INSERT INTO `bj_touching_report` VALUES ('236', '20171129111252284', '581', '', '128a520171129112605304.jpg', '1500000394', '111', '1', '1511926030');
INSERT INTO `bj_touching_report` VALUES ('237', '2017112911395059723', '582', '11', 'c59fc201711291144233487.jpg', '1500000396', '11', '1', '1511927075');
INSERT INTO `bj_touching_report` VALUES ('240', '2017112914594117031', '589', '', '095b7201711291653496484.jpeg', '1500000398', '1', '1', '1511945646');
INSERT INTO `bj_touching_report` VALUES ('241', '2017112914594117031', '590', '11', '8806f201711291653549618.jpeg', '1500000398', '1', '1', '1511945646');
INSERT INTO `bj_touching_report` VALUES ('245', '2017112909454287007', '579', '灯箱门开关不畅', 'ba979201711291027215296.jpg', '1500000399', '300', '1', '1512003765');
INSERT INTO `bj_touching_report` VALUES ('247', '2017113013501692939', '631', 'E', '4cbc0201711301356517676.jpeg', '1500000405', '12', '1', '1512021599');
INSERT INTO `bj_touching_report` VALUES ('248', '2017113014224550536', '633', '10', '648e9201711301427377778.jpg', '1500000406', '10', '1', '1512023263');
INSERT INTO `bj_touching_report` VALUES ('249', '2017113014321275260', '635', '', 'eb7fe201711301452248898.jpeg', null, '12', '0', '1512024780');
INSERT INTO `bj_touching_report` VALUES ('250', '2017113014321275260', '636', '15865867', '43460201711301450094216.jpeg', null, '12', '0', '1512024780');
INSERT INTO `bj_touching_report` VALUES ('251', '2017113016305890158', '643', '1111', '6d9db201711301645336317.jpg', '1500000408', '11', '1', '1512031543');
INSERT INTO `bj_touching_report` VALUES ('252', '2017113016305890158', '644', '2222', '18e3e201711301645379666.jpg', '1500000408', '11', '1', '1512031543');
INSERT INTO `bj_touching_report` VALUES ('253', '2017120116285014297', '663', '1221', '10db7201712011643321380.jpeg', '1500000415', '10', '1', '1512117867');
INSERT INTO `bj_touching_report` VALUES ('254', '2017120515225933523', '701', '', 'e0074201712060841317874.jpg', '1500000423', '1111', '1', '1512520979');
INSERT INTO `bj_touching_report` VALUES ('255', '2017120610572444847', '731', '1', '7da6f201712061101593225.png', '1500000428', '12111', '0', '1512529567');
INSERT INTO `bj_touching_report` VALUES ('257', '2017120613131853325', '737', '1111555', 'ba95220171206133446540.jpg', null, '1555', '0', '1512538842');
INSERT INTO `bj_touching_report` VALUES ('259', '2017120613452146769', '741', '哈哈哈哈', 'd803f201712061347552282.jpeg', '1500000430', '1558', '1', '1512539855');
INSERT INTO `bj_touching_report` VALUES ('260', '2017120709013668489', '760', '', '0f063201712070919555835.jpeg', '1500000431', '1', '1', '1512609617');
INSERT INTO `bj_touching_report` VALUES ('262', '2017120709315646372', '761', '哈哈', 'b1a78201712070933407748.jpeg', '1500000433', '0', '1', '1512610432');
INSERT INTO `bj_touching_report` VALUES ('263', '2017120709434985609', '763', '', '95dbc201712070947436479.jpeg', '1500000435', '0', '1', '1512611269');
INSERT INTO `bj_touching_report` VALUES ('264', '2017120710303544571', '769', '1234', '2216c201712071048138571.jpeg', '1500000437', '12', '1', '1512614922');
INSERT INTO `bj_touching_report` VALUES ('265', '2017120713300542747', '773', '01', '47ea1201712071348543430.png', '1500000439', '10', '1', '1512625738');
INSERT INTO `bj_touching_report` VALUES ('266', '2017120713554972376', '778', '', 'd67ab201712071403565085.PNG', '1500000441', '10', '1', '1512626651');
INSERT INTO `bj_touching_report` VALUES ('267', '2017120714571447161', '791', '', 'b54ad201712071506311677.jpeg', null, '12', '0', '1512630421');
INSERT INTO `bj_touching_report` VALUES ('268', '2017120715152036561', '793', '444', 'cb2d9201712071518005812.PNG', '1500000444', '66', '1', '1512631100');
INSERT INTO `bj_touching_report` VALUES ('269', '2017120715152036561', '794', '55', '9e015201712071518083620.PNG', '1500000444', '66', '1', '1512631100');
INSERT INTO `bj_touching_report` VALUES ('271', '2017120715210898652', '797', '考虑考虑考虑考虑的话', 'dfac1201712071540092430.jpg', '1500000447', '5555', '1', '1512632493');
INSERT INTO `bj_touching_report` VALUES ('272', '2017120808472682390', '803', '423', 'e03aa201712080853439680.jpeg', '1500000449', '6', '1', '1512694440');
INSERT INTO `bj_touching_report` VALUES ('273', '201712081555439062', '841', '55555', '0613e201712081603033954.jpg', '1500000451', '0', '1', '1512720191');
INSERT INTO `bj_touching_report` VALUES ('274', '2017120815510325171', '838', '哈哈', '01384201712081607176604.PNG', '1500000454', '0', '1', '1512720455');
INSERT INTO `bj_touching_report` VALUES ('275', '2017120815510325171', '839', '哈哈', 'f43b5201712081607242893.PNG', '1500000454', '0', '1', '1512720455');
INSERT INTO `bj_touching_report` VALUES ('276', '2017120816552463170', '842', '', 'ef5a9201712081659092380.jpg', '1500000456', '0', '1', '1512723570');
INSERT INTO `bj_touching_report` VALUES ('277', '2017120816552463170', '843', '', 'a2538201712081659187075.jpg', '1500000456', '0', '1', '1512723570');
INSERT INTO `bj_touching_report` VALUES ('278', '2017120817282688443', '846', '', '2489f201712081739153081.jpg', '1500000458', '0', '1', '1512725956');
INSERT INTO `bj_touching_report` VALUES ('281', '2017120909255694657', '848', '哈哈膜', '5d870201712091018062420.JPG', '1500000460', '0', '1', '1512785890');
INSERT INTO `bj_touching_report` VALUES ('282', '2017120909255694657', '849', '嘿嘿', '72211201712091016435685.PNG', '1500000460', '0', '1', '1512785890');
INSERT INTO `bj_touching_report` VALUES ('285', '2017120914370562104', '854', '哈哈哈哈', 'a5f8d201712091442596469.PNG', '1500000463', '0', '1', '1512801827');
INSERT INTO `bj_touching_report` VALUES ('286', '20171209151955304', '861', '123', '169d9201712091559574411.jpeg', null, '0', '0', '1512806400');
INSERT INTO `bj_touching_report` VALUES ('288', '2017120915514129422', '866', '已经修好了', '3d7bb201712091606409882.jpg', '1500000479', '0', '1', '1512806869');

-- ----------------------------
-- Table structure for bj_transfer_accounts
-- ----------------------------
DROP TABLE IF EXISTS `bj_transfer_accounts`;
CREATE TABLE `bj_transfer_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `amount` decimal(11,0) NOT NULL COMMENT '提现金额',
  `bank_name` varchar(255) NOT NULL COMMENT '开户行名称',
  `account` varchar(255) NOT NULL COMMENT '提现账号',
  `transaction_id` varchar(255) DEFAULT NULL COMMENT '支付平台订单号',
  `out_trade_no` varchar(255) DEFAULT NULL COMMENT '内部订单号',
  `return_code` varchar(255) DEFAULT NULL COMMENT '订单处理返回结果: SUCCESS/FAIL',
  `result_code` varchar(255) DEFAULT NULL COMMENT '业务结果: SUCCESS/FAIL',
  `err_code` varchar(255) DEFAULT NULL COMMENT '错误代码',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态: 0待处理 1正在处理 2已完成 3驳回 4已关闭',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='提现请求';

-- ----------------------------
-- Records of bj_transfer_accounts
-- ----------------------------

-- ----------------------------
-- Table structure for bj_users
-- ----------------------------
DROP TABLE IF EXISTS `bj_users`;
CREATE TABLE `bj_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `username` varchar(30) DEFAULT NULL COMMENT '用户名',
  `real_name` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `password` varchar(60) NOT NULL COMMENT '登录密码',
  `phone` varchar(11) NOT NULL COMMENT '手机号',
  `nickname` varchar(30) DEFAULT NULL COMMENT '昵称',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别：0保密 1男 2女',
  `type` tinyint(1) NOT NULL COMMENT '账号类型：1客户 2师傅 3服务商',
  `province` varchar(20) DEFAULT NULL COMMENT '用户所在省份',
  `city` varchar(20) DEFAULT NULL COMMENT '用户所在城市',
  `town` varchar(20) DEFAULT NULL COMMENT '用户所在城镇',
  `service_province` varchar(20) DEFAULT NULL COMMENT '服务省份',
  `service_city` varchar(20) DEFAULT NULL COMMENT '服务城市',
  `location` varchar(255) DEFAULT NULL COMMENT '具体位置补充说明，如路名、楼栋、门牌号、等具体位置说明',
  `full_location_id` int(11) DEFAULT NULL COMMENT 'bj_location表中id 当用户选择了指定的“省城县镇”后，存储bj_location表中对应的完整地址信息',
  `qq` varchar(15) DEFAULT NULL COMMENT 'QQ号',
  `balance` decimal(10,2) DEFAULT '0.00' COMMENT '客户钱包余额',
  `guarantee` decimal(10,2) DEFAULT '0.00' COMMENT '客户保障金',
  `wechat` varchar(255) DEFAULT NULL COMMENT '微信号',
  `amount` decimal(11,2) DEFAULT NULL COMMENT '账户余额',
  `referrer` varchar(11) DEFAULT NULL COMMENT '邀请人手机号',
  `status` tinyint(1) DEFAULT '1' COMMENT '用户状态 0禁用 1启用',
  `img` varchar(255) DEFAULT NULL,
  `openid` varchar(50) DEFAULT NULL COMMENT '维信用户openid',
  `online` tinyint(1) DEFAULT '0' COMMENT '是否在线1在线0不在线',
  `is_sign` tinyint(1) DEFAULT '0' COMMENT '判断用户是否登录：0未登录1已登录',
  `yz` int(10) NOT NULL DEFAULT '1' COMMENT 'model验证',
  `created_at` int(11) NOT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `phone` (`phone`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COMMENT='用户注册信息，业主和师傅共同拥有的字段';

-- ----------------------------
-- Records of bj_users
-- ----------------------------
INSERT INTO `bj_users` VALUES ('38', '2222222', '赵孔磊', 'e10adc3949ba59abbe56e057f20f883e', '15865867664', null, '2', '1', '北京', '北京市', '东城区', null, null, '沙土镇', null, null, '0.00', '0.00', null, null, null, '1', '45ae0201712051646097227.jpeg', 'oGCJ20XM4gjNZ3yRvORmTan5_1OM', '0', '1', '1', '1509956635', null);
INSERT INTO `bj_users` VALUES ('47', '客户_gidtnn', '刘健', 'a73f86ae408af70b67141843e7130723', '15550161208', null, null, '1', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', 'f6ba2201711140847467245.jpg', null, '0', '1', '1', '1510651840', null);
INSERT INTO `bj_users` VALUES ('54', '师傅_kphmvv', '111', 'e10adc3949ba59abbe56e057f20f883e', '15810512002', null, null, '2', '江苏省', '南京市', '玄武区', null, null, null, null, null, '0.00', '0.00', null, null, null, '1', 'f6ba2201711140847467245.jpg', null, '0', '0', '1', '1511917089', null);
INSERT INTO `bj_users` VALUES ('55', '客户_cfseps', null, 'e860fd22bbe9cd994b9b7cc0685d0155', '18964632696', null, null, '1', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', 'f6ba2201711140847467245.jpg', null, '0', '1', '1', '1511917155', null);
INSERT INTO `bj_users` VALUES ('56', '师傅_tzokjp', '顾佳敏', 'e10adc3949ba59abbe56e057f20f883e', '18961519032', null, null, '2', '北京', '北京市', '顺义区', null, null, null, null, null, '0.00', '0.00', null, null, null, '1', 'af026201711291141142356.jpg', null, '0', '1', '1', '1511917450', null);
INSERT INTO `bj_users` VALUES ('57', '客户_uwqapx', null, 'e10adc3949ba59abbe56e057f20f883e', '17879837747', null, null, '1', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '1', '1', '1511918215', null);
INSERT INTO `bj_users` VALUES ('58', '友仔', null, '1828b7c795860b8e97de1d073737631c', '18017750468', null, '1', '2', '江苏省', '苏州市', '昆山市', null, null, null, null, null, '0.00', '0.00', null, null, null, '1', '39c95201712011006416942.JPG', null, '0', '1', '1', '1511918541', null);
INSERT INTO `bj_users` VALUES ('59', '周春林', null, 'e692ae96dea900db6b22862f415ae948', '13764840087', null, '1', '1', '北京', '北京市', '东城区', null, null, null, null, null, '0.00', '0.00', null, null, null, '1', '08f8420171129104422266.jpeg', null, '0', '1', '1', '1511923329', null);
INSERT INTO `bj_users` VALUES ('60', '客户_jtnxdq', null, 'a73f86ae408af70b67141843e7130723', '13818759298', null, null, '1', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '1', '1', '1511924285', null);
INSERT INTO `bj_users` VALUES ('61', '师傅_rpibrc', null, 'd1d05b4b6fa05c243f5cc60d3e10927e', '15802182802', null, null, '2', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '0', '1', '1511943574', null);
INSERT INTO `bj_users` VALUES ('62', '师傅_uuwfme', null, '7fb2c0c52eccfd513073b35ae2edc8c9', '15865068023', null, null, '2', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '0', '1', '1511943611', null);
INSERT INTO `bj_users` VALUES ('63', '师傅_cwrcan', null, 'e76543f3b3a7427f9299c0bde3367da6', '18049878739', null, null, '2', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '0', '1', '1511943616', null);
INSERT INTO `bj_users` VALUES ('64', '师傅_vxwksz', null, 'fefc8b242c9df84cfc0d3444d5de6d59', '15900517292', null, null, '2', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '0', '1', '1511943618', null);
INSERT INTO `bj_users` VALUES ('65', '师傅_uhxktq', null, 'e10adc3949ba59abbe56e057f20f883e', '13524069049', null, null, '2', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '0', '1', '1511943693', null);
INSERT INTO `bj_users` VALUES ('66', '师傅_pfvnxn', null, 'a73f86ae408af70b67141843e7130723', '15802100074', null, null, '2', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '1', '1', '1511948081', null);
INSERT INTO `bj_users` VALUES ('67', 'vhg', null, 'a73f86ae408af70b67141843e7130723', '17553018107', null, null, '1', '北京', '北京市', '东城区', null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '1', '1', '1511948157', null);
INSERT INTO `bj_users` VALUES ('68', '秋寒', null, 'a73f86ae408af70b67141843e7130723', '18686663624', null, '1', '1', '北京', '北京市', '东城区', null, null, null, null, null, '0.00', '0.00', null, null, null, '1', 'f4535201711301314251159.jpg', null, '0', '1', '1', '1512018840', null);
INSERT INTO `bj_users` VALUES ('69', '师傅_vsuhfk', null, '484cd20ddaddabfee231dd46018d385f', '18201806582', null, null, '2', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '1', '1', '1512093025', null);
INSERT INTO `bj_users` VALUES ('70', '师傅_rwlfep', '谢兵森', 'a73f86ae408af70b67141843e7130723', '18301969281', null, null, '2', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '1', '1', '1512093343', null);
INSERT INTO `bj_users` VALUES ('71', '哦哦哦', null, 'a73f86ae408af70b67141843e7130723', '18014869113', null, null, '2', '北京', '北京市', '东城区', null, null, null, null, null, '0.00', '0.00', null, null, null, '1', '3f9cc201712081036121958.jpg', null, '0', '1', '1', '1512441043', null);
INSERT INTO `bj_users` VALUES ('72', '师傅_lkcdze', null, 'a73f86ae408af70b67141843e7130723', '17714559315', null, null, '2', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '0', '1', '1512521941', null);
INSERT INTO `bj_users` VALUES ('73', '客户_vwiibv', null, 'a73f86ae408af70b67141843e7130723', '17777777777', null, null, '1', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '0', '1', '1512624064', null);
INSERT INTO `bj_users` VALUES ('74', '师傅_ioaggf', null, 'a73f86ae408af70b67141843e7130723', '18262606578', null, null, '2', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '0', '1', '1512625036', null);
INSERT INTO `bj_users` VALUES ('78', '客户_ribgdc', null, 'c4ca4238a0b923820dcc509a6f75849b', '15554519088', null, null, '1', null, null, null, null, null, null, null, null, '0.00', '0.00', null, null, null, '1', null, null, '0', '0', '1', '1512969707', null);

-- ----------------------------
-- Table structure for bj_users_credit_account
-- ----------------------------
DROP TABLE IF EXISTS `bj_users_credit_account`;
CREATE TABLE `bj_users_credit_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `brand` varchar(255) DEFAULT NULL COMMENT '品牌名称',
  `logo` varchar(255) DEFAULT NULL COMMENT '品牌LOGO',
  `store_location_id` varchar(255) DEFAULT NULL COMMENT '店铺地址对应location中的ID',
  `store_location_ext` varchar(255) DEFAULT NULL COMMENT '店铺详细地址',
  `real_name` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `cert_id` varchar(18) DEFAULT NULL COMMENT '身份证号码',
  `id_front` text COMMENT '身份证正面照片',
  `id_reverse` text COMMENT '身份证反面照片',
  `id_hand` text COMMENT '手持身份证照片',
  `credit_card` varchar(30) DEFAULT NULL COMMENT '银行卡号',
  `credit_card_phone` varchar(11) DEFAULT NULL COMMENT '银行卡预留的手机号码',
  `review_status` tinyint(1) DEFAULT '0' COMMENT '审核状态 0未审核 1待审核 2已通过 3未通过',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='月结账号拓展信息';

-- ----------------------------
-- Records of bj_users_credit_account
-- ----------------------------

-- ----------------------------
-- Table structure for bj_users_locations
-- ----------------------------
DROP TABLE IF EXISTS `bj_users_locations`;
CREATE TABLE `bj_users_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `location_id` int(11) DEFAULT NULL COMMENT '位置表ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `real_name` varchar(20) DEFAULT NULL COMMENT '姓名',
  `sex` tinyint(1) DEFAULT NULL COMMENT '性别 0保密 1男 2女',
  `phone` varchar(11) DEFAULT NULL COMMENT '联系人手机号',
  `province_id` int(10) DEFAULT NULL COMMENT '用户所在省份',
  `city_id` bigint(20) DEFAULT NULL COMMENT '用户所在城市',
  `country_id` bigint(20) DEFAULT NULL COMMENT '区县ID',
  `town_id` bigint(20) DEFAULT NULL COMMENT '用户所在城镇',
  `location_ext` varchar(255) DEFAULT NULL COMMENT '具体位置补充说明，如路名、楼栋、门牌号、等具体位置说明',
  `is_default` tinyint(1) DEFAULT '0' COMMENT '是否设置为常用i地址',
  `tag` varchar(20) DEFAULT NULL COMMENT '标签 用户自己填',
  `deleted` tinyint(1) DEFAULT '0' COMMENT '是否软删除 0未删除 1已删除',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户常用地址';

-- ----------------------------
-- Records of bj_users_locations
-- ----------------------------

-- ----------------------------
-- Table structure for bj_users_owner
-- ----------------------------
DROP TABLE IF EXISTS `bj_users_owner`;
CREATE TABLE `bj_users_owner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `brand` varchar(255) DEFAULT NULL COMMENT '品牌名称',
  `logo` varchar(255) DEFAULT NULL COMMENT '品牌LOGO',
  `province_id` int(11) DEFAULT NULL,
  `city_id` bigint(20) DEFAULT NULL,
  `country_id` bigint(20) DEFAULT NULL,
  `town_id` bigint(20) DEFAULT NULL,
  `location_ext` varchar(255) DEFAULT NULL,
  `referrer` varchar(11) DEFAULT NULL COMMENT '推荐人手机号',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='业主账号拓展信息';

-- ----------------------------
-- Records of bj_users_owner
-- ----------------------------

-- ----------------------------
-- Table structure for bj_users_partner
-- ----------------------------
DROP TABLE IF EXISTS `bj_users_partner`;
CREATE TABLE `bj_users_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `real_name` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `phone` bigint(11) DEFAULT NULL COMMENT '联系人手机号码',
  `bank_card` bigint(25) DEFAULT NULL COMMENT '银行卡号',
  `monthly_service_password` varchar(32) DEFAULT NULL COMMENT '月结支付密码',
  `company` varchar(50) DEFAULT NULL COMMENT '企业名称',
  `province` varchar(20) DEFAULT NULL COMMENT '企业地址 省',
  `city` varchar(20) DEFAULT NULL COMMENT '企业地址 市',
  `area` varchar(20) DEFAULT NULL COMMENT '企业地址 区',
  `address` varchar(30) DEFAULT NULL COMMENT '详细地址',
  `business` varchar(30) DEFAULT NULL COMMENT '营业执照号码',
  `Id_Car` varchar(20) DEFAULT NULL COMMENT '身份证号码',
  `id_img` varchar(50) DEFAULT NULL COMMENT '身份证照片',
  `bus_img` varchar(50) DEFAULT NULL COMMENT '营业执照照片',
  `status` tinyint(1) DEFAULT '0' COMMENT '审核状态  0 未审核  1 通过 2未通过',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `img_zheng` varchar(50) DEFAULT NULL COMMENT '移动端身份证正面',
  `img_fan` varchar(50) DEFAULT NULL COMMENT '移动端身份证反面',
  `img_brand` varchar(50) DEFAULT NULL COMMENT '银行卡照片',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='平台签约账号拓展信息';

-- ----------------------------
-- Records of bj_users_partner
-- ----------------------------
INSERT INTO `bj_users_partner` VALUES ('24', '61', '顾佳敏', '18961519032', '1111', null, null, null, null, null, null, null, '3212811999310518544', null, null, '0', '0', '17a6f201711151146292424.jpg', '0e82b201711151146291980.jpg', '8cfc7201711151146313949.jpg');
INSERT INTO `bj_users_partner` VALUES ('25', '2', null, null, null, null, null, null, null, null, null, null, null, null, null, '0', '0', null, null, null);

-- ----------------------------
-- Table structure for bj_users_recommend
-- ----------------------------
DROP TABLE IF EXISTS `bj_users_recommend`;
CREATE TABLE `bj_users_recommend` (
  `uid` int(11) NOT NULL COMMENT 'ID',
  `service` varchar(255) DEFAULT NULL COMMENT '服务类型',
  `order` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) DEFAULT '1',
  `introduce` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of bj_users_recommend
-- ----------------------------
INSERT INTO `bj_users_recommend` VALUES ('35', '更换灯片', '412', 'ba319201711070924221699.png', '25', '1', '\n                                                \n                            做事有上进心，头脑灵活，接受能力强。处事自信、认真、有主见，不怕辛苦。\n                                                                                                                                    ');
INSERT INTO `bj_users_recommend` VALUES ('34', '围板搭建', '298', '8d654201711070923376503.jpg', '26', '1', '\n                                    \n                            做事有上进心，头脑灵活，接受能力强。\n                                                                                                                                                ');
INSERT INTO `bj_users_recommend` VALUES ('37', '勘测', '312', '16fb6201711070923077391.jpg', '27', '1', '\n                               \n                       有主见，不怕辛苦。\n                                                                                                                                                     ');
INSERT INTO `bj_users_recommend` VALUES ('17', '维修', '358', 'f240a20171107092242257.jpg', '28', '1', '\n                                                                                \n                      处事自信、认真、有主见，不怕辛苦。\n                                                                                                    ');
INSERT INTO `bj_users_recommend` VALUES ('40', '安装 维修', '231', 'cdff2201711071505168822.jpg', '29', '1', '\n                                    \n                                    \n                                                              \n                            做事有上进心，头脑灵活，接受能力强。处事自信、认真、有主见，不怕辛苦。\n                                                     ');
INSERT INTO `bj_users_recommend` VALUES ('39', '维修', '284', '09a5a201711070925412252.png', '30', '1', '\n                            \n                            做事有上进心，头脑灵活，接受能力强。处事自信、认真、有主见，不怕辛苦。\n                                                                                                                                                        ');

-- ----------------------------
-- Table structure for bj_users_wechat
-- ----------------------------
DROP TABLE IF EXISTS `bj_users_wechat`;
CREATE TABLE `bj_users_wechat` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(11) DEFAULT NULL COMMENT '用户ID',
  `phone` varchar(11) DEFAULT NULL COMMENT '用户手机号码',
  `openid` varchar(60) DEFAULT NULL COMMENT '微信用户的唯一标识',
  `nickname` varchar(60) DEFAULT NULL COMMENT '微信昵称',
  `sex` tinyint(1) DEFAULT '0' COMMENT '用户微信设置的性别 0保密 1男 2女',
  `province` varchar(20) DEFAULT NULL COMMENT '用户个人资料填写的省份',
  `city` varchar(20) DEFAULT NULL COMMENT '	普通用户个人资料填写的城市',
  `country` varchar(20) DEFAULT NULL COMMENT '	国家，如中国为CN',
  `headimgurl` varchar(1000) DEFAULT NULL COMMENT '微信头像',
  `unionid` varchar(30) DEFAULT NULL COMMENT '只有在用户将公众号绑定到微信开放平台帐号后，才会出现该字段。',
  `created_at` int(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE,
  KEY `phone` (`phone`) USING BTREE,
  KEY `openid` (`openid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='微信授权用户信息';

-- ----------------------------
-- Records of bj_users_wechat
-- ----------------------------

-- ----------------------------
-- Table structure for bj_users_worker
-- ----------------------------
DROP TABLE IF EXISTS `bj_users_worker`;
CREATE TABLE `bj_users_worker` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `platform_level` int(11) DEFAULT '1' COMMENT '平台等级',
  `rating` decimal(4,2) DEFAULT '5.00' COMMENT '业主对师傅的评分',
  `wage` decimal(11,2) DEFAULT NULL COMMENT '师傅日薪',
  `service_type_id` varchar(35) DEFAULT NULL COMMENT '服务类型',
  `l1_category_id` int(10) DEFAULT NULL COMMENT '一级类-类型ID',
  `l2_category_id` int(4) DEFAULT NULL COMMENT '二级类-类型ID',
  `service_introduction` text NOT NULL COMMENT '服务介绍',
  `service_time` varchar(60) DEFAULT NULL COMMENT '服务开始时间',
  `service_endtime` varchar(60) DEFAULT NULL COMMENT '服务结束时间',
  `staff_num` int(255) DEFAULT NULL COMMENT '员工人数',
  `truck_situation` varchar(35) DEFAULT NULL COMMENT '货车情况',
  `work_skill` varchar(35) DEFAULT NULL COMMENT '师傅技能',
  `signature` text COMMENT '师傅签字的图片地址',
  `real_name` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `cert_id` varchar(18) DEFAULT NULL COMMENT '身份证号码',
  `id_front` text COMMENT '身份证正面照片',
  `id_reverse` text COMMENT '身份证反面照片',
  `id_hand` text COMMENT '手持身份证照片',
  `credit_card` varchar(30) DEFAULT NULL COMMENT '银行卡号',
  `credit_card_phone` varchar(11) DEFAULT NULL COMMENT '银行卡预留的手机号码',
  `phone` varchar(11) DEFAULT NULL COMMENT '邀请人手机号码',
  `balance` float(10,2) DEFAULT '0.00' COMMENT '账户余额',
  `guarantee` float(10,2) DEFAULT NULL COMMENT '保证金',
  `credit_score` varchar(10) DEFAULT NULL COMMENT '诚信分',
  `technical_level` varchar(10) DEFAULT NULL COMMENT '技术等级',
  `comprehensive` varchar(10) DEFAULT NULL COMMENT '综合评分',
  `review_status` tinyint(1) DEFAULT '0' COMMENT '审核状态 0未审核 1待审核 2已通过 3未通过',
  `created_at` bigint(11) DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(11) DEFAULT NULL COMMENT '更新时间',
  `is_tui` tinyint(1) DEFAULT '0' COMMENT '是否首页推荐：1推荐0否',
  `brand` varchar(60) DEFAULT '' COMMENT '品牌类型',
  `orders` varchar(255) DEFAULT NULL,
  `introduce` varchar(255) DEFAULT NULL COMMENT '服务介绍',
  `car_weight` varchar(35) NOT NULL COMMENT '货车吨位',
  `car_size` varchar(35) DEFAULT NULL COMMENT '货车大小',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='师傅账号拓展信息表';

-- ----------------------------
-- Records of bj_users_worker
-- ----------------------------
INSERT INTO `bj_users_worker` VALUES ('18', '38', '3', '5.00', null, '1', null, null, '', '周一到周日', null, '5', '1辆', '2', null, '赵刚', '360481199503051014', '3d810201711061742219174.jpg', '3a06b20171106174223685.jpg', 'f0c53201711061742258150.jpg', '360481199503051014', '18954857854', null, '2.01', '0.02', null, null, null, '2', null, null, '0', '', null, null, '', null);
INSERT INTO `bj_users_worker` VALUES ('30', '47', '3', '5.00', null, '2,4', null, null, '', null, null, null, null, null, null, '刘佳勋', '220182199308277451', '9e1a6201711151010563692.png', 'ee728201711151010582611.png', 'a303b201711151011015412.jpg', null, '18014869113', null, '0.00', null, null, null, null, '2', null, null, '0', '', null, null, '', null);
INSERT INTO `bj_users_worker` VALUES ('35', '56', '3', '5.00', null, '1', null, null, '', '10', null, '10', '10', null, null, '顾佳敏', '321281199303058417', '50bde201712061344382960.png', '8b43e201712061344407946.png', '7f62c201712061344425313.png', null, '18961519032', null, '0.00', null, null, null, null, '2', null, null, '0', '', null, '10', '10', '10');
INSERT INTO `bj_users_worker` VALUES ('36', '58', '3', '5.00', null, '1,2,3,4,5,6', null, null, '', '全天候', null, '5', '1', null, null, '刘经友', '36212419780930161x', '6ef4f20171201091420183.jpg', '9a52d201712010914324067.jpg', 'fd860201712010915563255.jpg', null, '18017750468', null, '0.00', null, null, null, null, '2', null, null, '0', '', null, '有多年展柜经验！', '0', '0');
INSERT INTO `bj_users_worker` VALUES ('37', '54', '3', '5.00', null, '', null, null, '', '周一至周五', null, '6', '1', null, null, '刘经春', '362124197703201610', '0b3cc201711290925051417.jpg', '577ed201711290925156926.jpg', '049ff201711290925323909.jpg', null, '15810512002', null, '0.00', null, null, null, null, '2', null, null, '0', '', null, '服务于10年', '6吨', '4米箱货');
INSERT INTO `bj_users_worker` VALUES ('43', '66', '3', '5.00', null, null, null, null, '', null, null, null, null, null, null, '黄洁', '511681133906092014', 'a395e201712011336195565.jpg', 'dd10f201712011336232897.jpg', '73ac7201712011336268723.jpg', null, '15802100074', null, '0.00', null, null, null, null, '2', null, null, '0', '', null, null, '', null);
INSERT INTO `bj_users_worker` VALUES ('47', '71', '3', '5.00', null, '2', null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0.00', null, null, null, null, '2', null, null, '0', '', null, null, '', null);
INSERT INTO `bj_users_worker` VALUES ('48', '74', '1', '5.00', null, null, null, null, '', null, null, null, null, null, null, null, null, null, null, null, null, null, null, '0.00', null, null, null, null, '0', null, null, '0', '', null, null, '', null);
INSERT INTO `bj_users_worker` VALUES ('49', '70', '1', '5.00', null, null, null, null, '', null, null, null, null, null, null, '谢兵森', '362124197712282010', '28d54201712071509382794.png', '076cb201712071509438173.png', '56b55201712071509496164.jpg', '6222021099309120', '13818759298', null, '0.00', null, null, null, null, '2', null, null, '0', '', null, null, '', null);

-- ----------------------------
-- Table structure for bj_work_step
-- ----------------------------
DROP TABLE IF EXISTS `bj_work_step`;
CREATE TABLE `bj_work_step` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `service_type` tinyint(1) NOT NULL COMMENT '类型对应ID',
  `service_name` varchar(32) NOT NULL COMMENT '类型对应名称',
  `stepnum` tinyint(1) NOT NULL COMMENT '步骤总数',
  `step_id` tinyint(1) NOT NULL COMMENT '步骤ID',
  `step_name` varchar(255) NOT NULL COMMENT '步骤名称',
  `step_link` varchar(50) DEFAULT NULL,
  `step_onclick` varchar(32) DEFAULT NULL COMMENT '点击事件ID',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='师傅步骤表';

-- ----------------------------
-- Records of bj_work_step
-- ----------------------------
INSERT INTO `bj_work_step` VALUES ('1', '1', '师傅维修1', '7', '1', '抢单成功，查看订单', null, null);
INSERT INTO `bj_work_step` VALUES ('2', '1', '师傅维修1', '7', '2', '请您在2小时内联系客户并确认前往维修地点的时间(电话联系)', null, 'work_contact_customer');
INSERT INTO `bj_work_step` VALUES ('3', '1', '师傅维修1', '7', '3', '您已到达客户指定的地点，点击签到', null, 'work_sign');
INSERT INTO `bj_work_step` VALUES ('4', '1', '师傅维修1', '7', '4', '现场核实报告填写', null, 'work_hedan');
INSERT INTO `bj_work_step` VALUES ('5', '1', '师傅维修1', '7', '5', '维修完成！请填写维修施工表', null, 'work_weixiu');
INSERT INTO `bj_work_step` VALUES ('6', '1', '师傅维修1', '7', '6', '已确认报告，完成订单，点击签退', null, 'work_sign_out');
INSERT INTO `bj_work_step` VALUES ('8', '2', '师傅维修2（众包咨询）', '9', '1', '客户点单咨询，请前往查看', '', 'work_zixun_wei');
INSERT INTO `bj_work_step` VALUES ('9', '2', '师傅维修2（众包咨询）', '9', '2', '客户付费咨询，请及时回复 并保持电话畅通', null, null);
INSERT INTO `bj_work_step` VALUES ('10', '2', '师傅维修2（众包咨询）', '9', '3', '等待客户下单', null, null);
INSERT INTO `bj_work_step` VALUES ('11', '2', '师傅维修2（众包咨询）', '9', '4', '咨询结束', null, null);
INSERT INTO `bj_work_step` VALUES ('12', '2', '师傅维修2（众包咨询）', '9', '5', '客户付款,请您在2小时内联系客户并确认前往维修地点的时间（电话联系）', null, 'work_contact_customer');
INSERT INTO `bj_work_step` VALUES ('13', '2', '师傅维修2（众包咨询）', '9', '6', '您已到达客户指定的地点，点击签到', null, 'work_sign');
INSERT INTO `bj_work_step` VALUES ('14', '2', '师傅维修2（众包咨询）', '9', '7', '现场核实报告填写', null, 'work_hedan');
INSERT INTO `bj_work_step` VALUES ('15', '2', '师傅维修2（众包咨询）', '9', '8', '维修完成！填写维修施工表', null, 'work_weixiu');
INSERT INTO `bj_work_step` VALUES ('16', '2', '师傅维修2（众包咨询）', '9', '9', '已确认报告，完成订单，点击签退', null, 'work_sign_out');
INSERT INTO `bj_work_step` VALUES ('17', '3', '师傅安装1', '7', '1', '抢单成功，查看订单', '', '');
INSERT INTO `bj_work_step` VALUES ('18', '3', '师傅安装1', '7', '2', '请您在2小时内联系客户并确认前往维修地点的时间(电话联系)', '', 'work_contact_customer');
INSERT INTO `bj_work_step` VALUES ('19', '3', '师傅安装1', '7', '3', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_work_step` VALUES ('20', '3', '师傅安装1', '7', '4', '现场核实报告填写', '', 'install_work_hedan');
INSERT INTO `bj_work_step` VALUES ('21', '3', '师傅安装1', '7', '5', '安装完成！请填写安装施工表', '', 'work_anzhuang');
INSERT INTO `bj_work_step` VALUES ('22', '3', '师傅安装1', '7', '6', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_work_step` VALUES ('23', '4', '师傅安装2（众包咨询）', '9', '1', '客户点单咨询，请前往查看', '', 'work_zixun_cha');
INSERT INTO `bj_work_step` VALUES ('24', '4', '师傅安装2（众包咨询）', '9', '2', '客户付费咨询，请及时回复 并保持电话畅通', '', '');
INSERT INTO `bj_work_step` VALUES ('25', '4', '师傅安装2（众包咨询）', '9', '3', '等待客户下单', '', '');
INSERT INTO `bj_work_step` VALUES ('26', '4', '师傅安装2（众包咨询）', '9', '4', '咨询结束', '', '');
INSERT INTO `bj_work_step` VALUES ('27', '4', '师傅安装2（众包咨询）', '9', '5', '客户付款,请您在2小时内联系客户并确认前往维修地点的时间（电话联系）', '', 'work_contact_customer');
INSERT INTO `bj_work_step` VALUES ('28', '4', '师傅安装2（众包咨询）', '9', '6', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_work_step` VALUES ('29', '4', '师傅安装2（众包咨询）', '9', '7', '现场核实报告填写', '', 'install_work_hedan');
INSERT INTO `bj_work_step` VALUES ('30', '4', '师傅安装2（众包咨询）', '9', '8', '安装完成！填写安装施工表', '', 'work_anzhuang');
INSERT INTO `bj_work_step` VALUES ('31', '4', '师傅安装2（众包咨询）', '9', '9', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_work_step` VALUES ('33', '8', '师傅围板搭建1', '7', '1', '抢单成功，查看订单', '', '');
INSERT INTO `bj_work_step` VALUES ('34', '8', '师傅围板搭建1', '7', '2', '请您在2小时内联系客户并确认前往维修地点的时间(电话联系)', '', 'work_contact_customer');
INSERT INTO `bj_work_step` VALUES ('35', '8', '师傅围板搭建1', '7', '3', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_work_step` VALUES ('36', '8', '师傅围板搭建1', '7', '4', '现场核实报告填写', '', 'coaming_work_hedan');
INSERT INTO `bj_work_step` VALUES ('37', '8', '师傅围板搭建1', '7', '5', '围板搭建完成！填写围板搭建施工表', '', 'work_weiban');
INSERT INTO `bj_work_step` VALUES ('38', '8', '师傅围板搭建1', '7', '6', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_work_step` VALUES ('39', '9', '师傅围板搭建2（众包咨询）', '9', '1', '客户点单咨询，请前往查看', '', 'work_zixun_ban');
INSERT INTO `bj_work_step` VALUES ('40', '9', '师傅围板搭建2（众包咨询）', '9', '2', '客户付费咨询，请及时回复 并保持电话畅通', '', '');
INSERT INTO `bj_work_step` VALUES ('41', '9', '师傅围板搭建2（众包咨询）', '9', '3', '等待客户下单', '', '');
INSERT INTO `bj_work_step` VALUES ('42', '9', '师傅围板搭建2（众包咨询）', '9', '4', '咨询结束', '', '');
INSERT INTO `bj_work_step` VALUES ('43', '9', '师傅围板搭建2（众包咨询）', '9', '5', '客户付款,请您在2小时内联系客户并确认前往维修地点的时间（电话联系）', '', 'work_contact_customer');
INSERT INTO `bj_work_step` VALUES ('44', '9', '师傅围板搭建2（众包咨询）', '9', '6', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_work_step` VALUES ('45', '9', '师傅围板搭建2（众包咨询）', '9', '7', '现场核实报告填写', '', 'coaming_work_hedan');
INSERT INTO `bj_work_step` VALUES ('46', '9', '师傅围板搭建2（众包咨询）', '9', '8', '围板搭建完成！填写围板搭建施工表', '', 'work_weiban');
INSERT INTO `bj_work_step` VALUES ('47', '9', '师傅围板搭建2（众包咨询）', '9', '9', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_work_step` VALUES ('49', '6', '更换灯片1', '7', '1', '抢单成功，查看订单', '', '');
INSERT INTO `bj_work_step` VALUES ('50', '6', '更换灯片1', '7', '2', '请您在2小时内联系客户并确认前往维修地点的时间(电话联系', '', 'work_contact_customer');
INSERT INTO `bj_work_step` VALUES ('51', '6', '更换灯片1', '7', '3', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_work_step` VALUES ('52', '6', '更换灯片1', '7', '4', '现场核实报告填写', '', 'gjmcoaming_work_hedan');
INSERT INTO `bj_work_step` VALUES ('53', '6', '更换灯片1', '7', '5', '更换灯片完成！请填写更幻灯片施工表', '', 'work_genghuan');
INSERT INTO `bj_work_step` VALUES ('54', '6', '更换灯片1', '7', '6', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_work_step` VALUES ('55', '7', '更换灯片2(众包咨询)', '9', '1', '客户点单咨询，请前往查看', '', 'work_zixun_change');
INSERT INTO `bj_work_step` VALUES ('56', '7', '更换灯片2(众包咨询)', '9', '2', '客户付费咨询，请及时回复 并保持电话畅通', '', '');
INSERT INTO `bj_work_step` VALUES ('57', '7', '更换灯片2(众包咨询)', '9', '3', '等待客户下单', '', '');
INSERT INTO `bj_work_step` VALUES ('58', '7', '更换灯片2(众包咨询)', '9', '4', '咨询结束', '', '');
INSERT INTO `bj_work_step` VALUES ('59', '7', '更换灯片2(众包咨询)', '9', '5', '客户付款,请您在2小时内联系客户并确认前往维修地点的时间（电话联系）', '', 'work_contact_customer');
INSERT INTO `bj_work_step` VALUES ('60', '7', '更换灯片2(众包咨询)', '9', '6', '您已到达客户指定的地点，点击签到', '', 'work_sign');
INSERT INTO `bj_work_step` VALUES ('61', '7', '更换灯片2(众包咨询)', '9', '7', '现场核实报告填写', '', 'gjmcoaming_work_hedan');
INSERT INTO `bj_work_step` VALUES ('62', '7', '更换灯片2(众包咨询)', '9', '8', '更换灯片完成！填写更换灯片施工表', '', 'work_genghuan');
INSERT INTO `bj_work_step` VALUES ('63', '7', '更换灯片2(众包咨询)', '9', '9', '已确认报告，完成订单，点击签退', '', 'work_sign_out');
INSERT INTO `bj_work_step` VALUES ('64', '5', '勘测', '6', '1', '接单成功', null, null);
INSERT INTO `bj_work_step` VALUES ('65', '5', '勘测', '6', '2', '请您在2小时内联系客户并确认前往客户指定地点的时间', null, 'work_contact_customer');
INSERT INTO `bj_work_step` VALUES ('66', '5', '勘测', '6', '3', '您已到达客户指定的地点，点击签到', null, 'work_sign');
INSERT INTO `bj_work_step` VALUES ('67', '5', '勘测', '6', '4', '你还未上传勘测手稿，点击上传', null, 'work_manuscript');
INSERT INTO `bj_work_step` VALUES ('68', '5', '勘测', '6', '5', '勘测完成，请填写勘测施工报告', null, 'work_presentation');
INSERT INTO `bj_work_step` VALUES ('69', '5', '勘测', '6', '6', '客户已查看及确认勘测施工报告，点击签退', null, 'work_sign_out');
