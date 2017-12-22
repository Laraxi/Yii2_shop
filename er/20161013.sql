/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 5.5.40 : Database - shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`shop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `shop`;

/*Table structure for table `shop_address` */

DROP TABLE IF EXISTS `shop_address`;

CREATE TABLE `shop_address` (
  `address_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '地址主键id',
  `first_name` varchar(32) NOT NULL DEFAULT '',
  `last_name` varchar(32) NOT NULL DEFAULT '',
  `company` varchar(100) NOT NULL DEFAULT '' COMMENT '公司',
  `address` text COMMENT '收货地址',
  `post_code` char(6) NOT NULL DEFAULT '',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `telephone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号码',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '所属用户id',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`address_id`),
  KEY `shop_address_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='地址表';

/*Data for the table `shop_address` */

insert  into `shop_address`(`address_id`,`first_name`,`last_name`,`company`,`address`,`post_code`,`email`,`telephone`,`user_id`,`create_time`) values (1,'张','三','','深圳宝安区固戍街道','','2036999602@qq.com','18819069937',19,0),(6,'王','五','记忆科技有限公司','深圳宝安区固戍街道','518000','2036999602@qq.com','18819069937',19,1476019310),(9,'fsadfsa','fsafsaf','fsafsaf','深圳宝安区固戍街道','518000','2036999602@qq.com','18819069937',19,1476090776),(10,'fsaf','fsaf','fsaf','fsaffsafsa','518000','fsaf','fsaf',19,1476091152),(11,'张','五','fsafsaf','深圳宝安区固戍街道','518000','2036999602@qq.com','18819069937',58,1476277789),(12,'gfjgf','yreyre','fsafsaf','深圳宝安区固戍街道','518000','2036999602@qq.com','18819069937',62,1476334514),(13,'张','五','记忆科技有限公司','深圳宝安区固戍街道','518000','2036999602@qq.com','18819069937',62,1476334536);

/*Table structure for table `shop_admin` */

DROP TABLE IF EXISTS `shop_admin`;

CREATE TABLE `shop_admin` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '管理员账号',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '管理员密码',
  `email` varchar(50) NOT NULL DEFAULT '' COMMENT '管理员电子邮箱',
  `login_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录时间',
  `login_ip` bigint(20) NOT NULL DEFAULT '0' COMMENT '登录IP',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='管理员表';

/*Data for the table `shop_admin` */

insert  into `shop_admin`(`id`,`username`,`password`,`email`,`login_time`,`login_ip`,`create_time`) values (2,'test','c4ca4238a0b923820dcc509a6f75849b','rickshop@163.com',0,0,0),(35,'admin','e10adc3949ba59abbe56e057f20f883e','',1476293231,2130706433,1476210985);

/*Table structure for table `shop_article` */

DROP TABLE IF EXISTS `shop_article`;

CREATE TABLE `shop_article` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `flag` tinyint(1) unsigned DEFAULT '0' COMMENT '标示',
  `title` varchar(50) DEFAULT '' COMMENT '标题',
  `desc` varchar(500) DEFAULT '' COMMENT '描述',
  `content` text COMMENT '内容',
  `count` int(11) DEFAULT '0' COMMENT '总数',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='文章表';

/*Data for the table `shop_article` */

insert  into `shop_article`(`id`,`flag`,`title`,`desc`,`content`,`count`,`status`,`create_time`,`update_time`) values (30,0,'和公开海关','','和房东和地方',0,1,1476184688,0),(21,0,'ljhl','jhljh','ljhl',36,NULL,1476156271,1476156271),(31,0,'测试','','<div id=\"activity_header\" style=\"margin:0px;padding:0px;color:#666666;font-family:Arial, Verdana, 宋体;background-color:#FFFFFF;\">\r\n	<table id=\"__01\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" height=\"459\" width=\"750\" class=\"ke-zeroborder\">\r\n		<tbody>\r\n			<tr>\r\n				<td>\r\n					<img alt=\"\" height=\"329\" width=\"750\" src=\"https://img12.360buyimg.com/cms/jfs/t2809/41/2045915577/36658/7fd1149/57567c63N168bc1ad.jpg\" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<img alt=\"\" border=\"0\" height=\"130\" width=\"750\" src=\"https://img13.360buyimg.com/cms/jfs/t2878/349/2126032212/11486/9574f6e1/57567c63Nc0e37709.jpg\" /> \r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n	<div align=\"center\" style=\"margin:0px;padding:0px;\">\r\n		<a target=\"_blank\" href=\"https://mall.jd.com/index-1000002966.html\"><img alt=\"\" border=\"0\" height=\"195\" width=\"750\" src=\"https://img10.360buyimg.com/cms/jfs/t2146/16/2438371083/73033/11b1ef5/5707af2fN821921f6.jpg\" /></a> \r\n	</div>\r\n	<table id=\"__01\" align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"750\" class=\"ke-zeroborder\">\r\n		<tbody>\r\n			<tr>\r\n				<td>\r\n					<a href=\"https://item.jd.com/1436839.html\" target=\"_blank\"><img alt=\"\" height=\"270\" width=\"185\" /></a> \r\n				</td>\r\n				<td>\r\n					<a href=\"https://item.jd.com/182606.html\" target=\"_blank\"><img alt=\"\" height=\"270\" width=\"190\" /></a> \r\n				</td>\r\n				<td>\r\n					<a href=\"https://item.jd.com/182611.html\" target=\"_blank\"><img alt=\"\" height=\"270\" width=\"190\" /></a> \r\n				</td>\r\n				<td>\r\n					<a href=\"https://item.jd.com/1089409.html\" target=\"_blank\"><img alt=\"\" height=\"270\" width=\"185\" /></a> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<a href=\"https://item.jd.com/747212.html\" target=\"_blank\"><img alt=\"\" height=\"279\" width=\"185\" /></a> \r\n				</td>\r\n				<td>\r\n					<a href=\"https://item.jd.com/256035.html\" target=\"_blank\"><img alt=\"\" height=\"279\" width=\"190\" /></a> \r\n				</td>\r\n				<td>\r\n					<a href=\"https://item.jd.com/256029.html\" target=\"_blank\"><img alt=\"\" height=\"279\" width=\"190\" /></a> \r\n				</td>\r\n				<td>\r\n					<a href=\"https://item.jd.com/970854.html\" target=\"_blank\"><img alt=\"\" height=\"279\" width=\"185\" /></a> \r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>\r\n<div id=\"J-detail-content\" style=\"margin:0px;padding:0px;color:#666666;font-family:Arial, Verdana, 宋体;background-color:#FFFFFF;\">\r\n	<table id=\"__01\" width=\"750\" height=\"4184\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\" class=\"ke-zeroborder\">\r\n		<tbody>\r\n			<tr>\r\n				<td>\r\n					<img width=\"750\" height=\"443\" alt=\"\" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<img width=\"750\" height=\"521\" alt=\"\" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<img width=\"750\" height=\"548\" alt=\"\" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<img width=\"750\" height=\"695\" alt=\"\" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<img width=\"750\" height=\"431\" alt=\"\" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<img width=\"750\" height=\"534\" alt=\"\" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<img width=\"750\" height=\"451\" alt=\"\" /> \r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td>\r\n					<p>\r\n						<img width=\"750\" height=\"561\" alt=\"\" src=\"https://img12.360buyimg.com/cms/jfs/t3076/15/3214088813/89056/24d3e84a/57ee232fN3e8e7ae9.jpg\" /> \r\n					</p>\r\n				</td>\r\n			</tr>\r\n		</tbody>\r\n	</table>\r\n</div>',0,1,1476202871,0),(25,0,'khgk','','hgkhgk',0,1,0,0),(26,0,'khgk','','hgkhgk',0,1,1476179472,0),(27,0,'khgk','','hgkhgk',0,1,1476179588,0),(32,0,'khgkhgk','','khgkgh',0,1,1476245728,0),(33,0,'ljhljh','','ljhl',0,0,1476251602,1476251602);

/*Table structure for table `shop_cart` */

DROP TABLE IF EXISTS `shop_cart`;

CREATE TABLE `shop_cart` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `goods_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `goods_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '购买商品数量',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '购买单价',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `shop_cart_goods_id` (`goods_id`),
  KEY `shop_cart_user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='购物车表';

/*Data for the table `shop_cart` */

insert  into `shop_cart`(`id`,`goods_id`,`goods_num`,`price`,`user_id`,`create_time`) values (20,2,1,'2699.00',62,1476340882);

/*Table structure for table `shop_category` */

DROP TABLE IF EXISTS `shop_category`;

CREATE TABLE `shop_category` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(32) NOT NULL DEFAULT '' COMMENT '分类名称',
  `parent_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类id',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `shop_category_parent_id` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

/*Data for the table `shop_category` */

insert  into `shop_category`(`id`,`title`,`parent_id`,`create_time`) values (1,'电子产品',0,1475829960),(2,'手机',1,1475829973),(3,'电脑',1,1475829986),(4,'服装',0,1475829998),(5,'裤子',4,1475830006),(6,'上衣',4,1475830016),(7,'测试',0,1476152960),(8,'测试1',7,1476152995),(9,'测试2',7,1476153042),(10,'测试3',7,1476153066),(11,'测试3',7,1476153143);

/*Table structure for table `shop_goods` */

DROP TABLE IF EXISTS `shop_goods`;

CREATE TABLE `shop_goods` (
  `goods_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `category_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '所属分类id',
  `title` varchar(200) NOT NULL DEFAULT '' COMMENT '商品名称',
  `descr` varchar(200) NOT NULL COMMENT '商品描述',
  `num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品库存',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商品价格',
  `cover` varchar(200) NOT NULL DEFAULT '' COMMENT '商品封面图',
  `pics` text COMMENT '商品多图',
  `issale` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否促销',
  `ishot` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否热卖',
  `istui` enum('0','1') NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `sale_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '促销价格',
  `ison` enum('0','1') NOT NULL DEFAULT '1' COMMENT '是否上架',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `goods_content` text NOT NULL COMMENT '商品详情',
  PRIMARY KEY (`goods_id`),
  KEY `shop_goods_category_id` (`category_id`),
  KEY `shop_goods_ison` (`ison`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='商品表';

/*Data for the table `shop_goods` */

insert  into `shop_goods`(`goods_id`,`category_id`,`title`,`descr`,`num`,`price`,`cover`,`pics`,`issale`,`ishot`,`istui`,`sale_price`,`ison`,`create_time`,`goods_content`) values (1,2,'Apple iPhone 6s (A1700) 16G 玫瑰金色 移动联通电信4G手机','4.7 英寸（对角线）显示屏，1334 x 750 分辨率 3D Touch 1200 万像素摄像头 配备嵌入式 M10 运动协处理器的 A10 Fusion 芯片 4K 视频拍摄 (30 fps) 以及慢动作视频拍摄 (120 fps, 1080p) 配备 Retina 闪光灯的 700 万像素 FaceTime HD 摄像头 内置于主屏幕按钮的 Touch ID 指纹识别传感器 具备 MIMO',71,'3999.00','oeno448e5.bkt.clouddn.com/57f761591d3ec','{\"57f7615c11915\":\"oeno448e5.bkt.clouddn.com\\/57f7615c11915\",\"57f90827cd431\":\"oeno448e5.bkt.clouddn.com\\/57f90827cd431\",\"57f9082813797\":\"oeno448e5.bkt.clouddn.com\\/57f9082813797\",\"57f9082a771e1\":\"oeno448e5.bkt.clouddn.com\\/57f9082a771e1\"}','1','0','1','3500.00','1',1475830112,''),(2,2,'OPPO R9 4GB+64GB内存版 玫瑰金 全网通4G手机 双卡双待','OPPO R9 4GB+64GB内存版 玫瑰金 全网通4G手机 双卡双待',13,'2799.00','oeno448e5.bkt.clouddn.com/57f762985a198','{\"57f7629b972e2\":\"oeno448e5.bkt.clouddn.com\\/57f7629b972e2\"}','1','1','1','2699.00','1',1475830427,'<div id=\"J-detail-banner\" style=\"margin: 0px; padding: 0px; text-align: center; color: rgb(102, 102, 102); font-family: Arial, Verdana, 宋体; font-size: 13px; white-space: normal;\"><a id=\"p-cat-insert\" target=\"_blank\" href=\"https://c-nfa.jd.com/adclick?keyStr=6PQwtwh0f06syGHwQVvRO2qQjwLJ5GHB8CWaVmO7akxE4PBdL2U9aYjtXf0gd37ks791zJuQs2q4I2lpGNOzQZmejHLwZAA3l3rpRACsufyvqgVOjKgck4TD1YU6+LUezNe88g4glXH178EwSYYnqkpCA+x86vRuLuoaI/lFwFzNwcnaW0zdmPuAxdo2pas1QcMck5aBqMylwUutDsqsUsjE3Q/yRiJ0ujwBMNeeEE0awXv1xIduNnJoHttCbIv9+jS2tOARVrnDKJG1is9UmLh3/DbehNAG91zvqNdrY44=&cv=2.0&url=//3c.jd.com/\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\"><img width=\"990\" alt=\"\" src=\"https://img11.360buyimg.com/da/jfs/t3169/352/3963995449/66966/752a1a62/57faf6acNf712c634.gif\" style=\"margin: 0px; padding: 0px; width: 990px;\"/></a></div><div class=\"detail-content clearfix\" data-name=\"z-have-detail-nav\" style=\"margin: 10px 0px; padding: 0px; position: relative; background: rgb(247, 247, 247); color: rgb(102, 102, 102); font-family: Arial, Verdana, 宋体; font-size: 13px; white-space: normal;\"><div class=\"detail-content-wrap\" style=\"margin: 0px; padding: 0px; width: 990px; float: left; background-color: rgb(255, 255, 255);\"><div class=\"detail-content-item\" style=\"margin: 0px; padding: 0px; width: 990px;\"><div id=\"activity_header\" clstag=\"\" style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; text-align: center;\"><a href=\"https://sale.jd.com/act/gotrKvZHxOFlj.html\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/jgsq-productsoa/jfs/t3148/83/3750527896/602117/39f44e49/57fa0826Ncdd941d2.png\" style=\"margin: 0px; padding: 0px;\"/></a></div></div><div id=\"J-detail-content\" style=\"margin: 0px; padding: 0px;\"><div class=\"content_tpl\" style=\"margin: 0px auto; padding: 0px; width: 750px;\"><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><div class=\"content_tpl\" style=\"margin: 0px auto; padding: 0px; width: 750px;\"><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/vc/jfs/t2896/166/2208006577/211155/21c81bbd/575d6526N030aa8b2.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"></div></div><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/vc/jfs/t3196/162/22317142/127029/e3086360/57a069eeNdd65991a.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/vc/jfs/t2635/280/2300682184/190381/7ad2644a/575f7239N48da5a0b.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/vc/jfs/t2995/216/1732570012/84384/5767406d/578de414N741c1a9c.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/vc/jfs/t2773/83/3428588004/118466/4a59e006/578de42bN01434534.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/vc/jfs/t2956/87/547571867/92547/9678cbce/575d6549N74632109.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/vc/jfs/t2602/148/2269116926/383386/a6979bfd/575eaf2dNab0a3edd.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/vc/jfs/t2683/139/2286988248/155755/580a911f/575eaf35N70c8ff66.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/vc/jfs/t2872/129/3409989346/160633/1ffaa7b7/578de44dN6db9d601.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; text-align: left;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img20.360buyimg.com/vc/jfs/t2977/161/506702316/92891/ef30d927/575d657dN99f6d891.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div></div></div></div></div><br/></div><div id=\"activity_footer\" clstag=\"\" style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/jgsq-productsoa/jfs/t2377/242/2384397158/60576/a04f684/56d6410fN1790e08c.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div></div></div></div><p><br/></p>'),(3,2,'测试数据','测试数据',997,'1000.00','oeno448e5.bkt.clouddn.com/57f9066500a13','{\"57f9066a9a45d\":\"oeno448e5.bkt.clouddn.com\\/57f9066a9a45d\"}','1','0','1','200.00','1',1475937898,''),(4,3,'小米 红米Note3 高配全网通版 3GB+32GB 金色 移动联通电信4G手机 双卡双待','<div id=\"J-detail-banner\" style=\"margin: 0px; padding: 0px; text-align: center; color: rgb(102, 102, 102); font-family: Arial, Verdana, 宋体; font-size: 13px; white-space: normal;\"><a id=\"p-cat-insert\" ',99,'999.00','oeno448e5.bkt.clouddn.com/57fdf85dc29e3','{\"57fdf86210360\":\"oeno448e5.bkt.clouddn.com\\/57fdf86210360\"}','1','1','1','1.00','1',1476261989,''),(5,3,'小米 红米Note3 高配全网通版 3GB+32GB 金色 移动联通电信4G手机 双卡双待','<div id=\"J-detail-banner\" style=\"margin: 0px; padding: 0px; text-align: center; color: rgb(102, 102, 102); font-family: Arial, Verdana, 宋体; font-size: 13px; white-space: normal;\"><a id=\"p-cat-insert\" ',92,'999.00','oeno448e5.bkt.clouddn.com/57fdf86688e11','{\"57fdf869c6efb\":\"oeno448e5.bkt.clouddn.com\\/57fdf869c6efb\"}','1','1','1','1.00','1',1476261997,''),(6,3,'小米 红米Note3 高配全网通版 3GB+32GB 金色 移动联通电信4G手机 双卡双待','<div id=\"J-detail-banner\" style=\"margin: 0px; padding: 0px; text-align: center; color: rgb(102, 102, 102); font-family: Arial, Verdana, 宋体; font-size: 13px; white-space: normal;\"><a id=\"p-cat-insert\" ',90,'999.00','oeno448e5.bkt.clouddn.com/57fdf86e5f3d8','{\"57fdf8719b582\":\"oeno448e5.bkt.clouddn.com\\/57fdf8719b582\",\"57fdf9bd0147b\":\"oeno448e5.bkt.clouddn.com\\/57fdf9bd0147b\",\"57fdf9bfcafad\":\"oeno448e5.bkt.clouddn.com\\/57fdf9bfcafad\"}','1','1','1','0.00','1',1476262004,''),(7,3,'小米 红米Note3 高配全网通版 3GB+32GB 金色 移动联通电信4G手机 双卡双待','移动联通电信4G手机 双卡双待',997,'1000.00','oeno448e5.bkt.clouddn.com/57fe144b130f7','{\"57fe144d55029\":\"oeno448e5.bkt.clouddn.com\\/57fe144d55029\"}','1','1','1','0.00','1',1476269136,'<div id=\"J-detail-banner\" style=\"margin: 0px; padding: 0px; text-align: center; color: rgb(102, 102, 102); font-family: Arial, Verdana, 宋体; font-size: 13px; white-space: normal;\"><a id=\"p-cat-insert\" target=\"_blank\" href=\"https://c-nfa.jd.com/adclick?keyStr=6PQwtwh0f06syGHwQVvRO2qQjwLJ5GHB8CWaVmO7akxE4PBdL2U9aYjtXf0gd37ks791zJuQs2q4I2lpGNOzQZmejHLwZAA3l3rpRACsufyvqgVOjKgck4TD1YU6+LUezNe88g4glXH178EwSYYnqkpCA+x86vRuLuoaI/lFwFzNwcnaW0zdmPuAxdo2pas1QcMck5aBqMylwUutDsqsUsjE3Q/yRiJ0ujwBMNeeEE0awXv1xIduNnJoHttCbIv9+jS2tOARVrnDKJG1is9UmLh3/DbehNAG91zvqNdrY44=&cv=2.0&url=//3c.jd.com/\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\"><img width=\"990\" alt=\"\" src=\"https://img11.360buyimg.com/da/jfs/t3169/352/3963995449/66966/752a1a62/57faf6acNf712c634.gif\" style=\"margin: 0px; padding: 0px; width: 990px;\"/></a></div><div class=\"detail-content clearfix\" data-name=\"z-have-detail-nav\" style=\"margin: 10px 0px; padding: 0px; position: relative; background: rgb(247, 247, 247); color: rgb(102, 102, 102); font-family: Arial, Verdana, 宋体; font-size: 13px; white-space: normal;\"><div class=\"detail-content-wrap\" style=\"margin: 0px; padding: 0px; width: 990px; float: left; background-color: rgb(255, 255, 255);\"><div class=\"detail-content-item\" style=\"margin: 0px; padding: 0px; width: 990px;\"><div id=\"activity_header\" clstag=\"\" style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; text-align: center;\"><a href=\"https://sale.jd.com/act/gotrKvZHxOFlj.html\" target=\"_blank\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102);\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/jgsq-productsoa/jfs/t3148/83/3750527896/602117/39f44e49/57fa0826Ncdd941d2.png\" style=\"margin: 0px; padding: 0px;\"/></a></div></div><div id=\"J-detail-content\" style=\"margin: 0px; padding: 0px;\"><div class=\"content_tpl\" style=\"margin: 0px auto; padding: 0px; width: 750px;\"><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><div style=\"margin: 0px; padding: 0px;\"><img alt=\"\" class=\"\" src=\"https://img12.360buyimg.com/cms/jfs/t2428/3/2106629073/235484/cfd014b2/56a99235N5f3a5532.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img14.360buyimg.com/cms/jfs/t2332/265/2125585714/304511/954de7d9/56af126fNab385030.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t2431/277/1481582560/84175/ce490fe/56a99237Nf31bced3.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t2575/10/1037265566/302450/97c3889c/56af21c2N8d893608.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img12.360buyimg.com/cms/jfs/t1885/84/2103761526/285554/2fc49921/56aadcd2N1a98437c.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t1924/71/2240036665/257295/ec306975/56a9923cN1a83e70a.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t2353/18/2159865335/184137/d5c9cbfe/56af27aaN71da7498.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/cms/jfs/t3019/157/1481660880/199361/dd7e8a01/57c57845N89d5a288.gif\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img11.360buyimg.com/cms/jfs/t1969/86/2196814640/149154/e5beab60/56aef37aNb93cf970.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t2575/16/1052046371/250497/8958e06/56a99242Neeca1e53.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img11.360buyimg.com/cms/jfs/t1048/348/1438239998/29617/58985f0c/572c1925Nfb018373.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img10.360buyimg.com/cms/jfs/t2578/295/1312520813/73549/eed84acb/56a99242N5767fb92.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/></div></div></div></div><br/></div><div id=\"activity_footer\" clstag=\"\" style=\"margin: 0px; padding: 0px;\"><div style=\"margin: 0px; padding: 0px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/jgsq-productsoa/jfs/t2377/242/2384397158/60576/a04f684/56d6410fN1790e08c.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div></div></div></div><p><br/></p>');

/*Table structure for table `shop_member` */

DROP TABLE IF EXISTS `shop_member`;

CREATE TABLE `shop_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '0',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

/*Data for the table `shop_member` */

insert  into `shop_member`(`id`,`username`,`password`,`create_time`,`email`) values (56,'','0',0,''),(55,'admin','e10adc3949ba59abbe56e057f20f883e',0,''),(54,'','0',0,''),(53,'','0',0,''),(52,'','0',0,''),(51,'','0',0,''),(50,'','0',0,''),(49,'','0',0,''),(48,'','0',0,''),(57,'','0',0,''),(58,'','0',0,''),(59,'','0',0,''),(60,'','0',0,''),(61,'','0',0,''),(62,'','0',0,''),(63,'','0',0,''),(64,'','0',0,''),(65,'','0',0,'');

/*Table structure for table `shop_order` */

DROP TABLE IF EXISTS `shop_order`;

CREATE TABLE `shop_order` (
  `order_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单主键id',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `address_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '收货id',
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单总额',
  `status` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '订单状态',
  `express_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '快递id',
  `express_no` varchar(50) NOT NULL DEFAULT '' COMMENT '快递编号',
  `trade_no` varchar(100) NOT NULL DEFAULT '',
  `tradeext` text,
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`order_id`),
  KEY `shop_order_user_id` (`user_id`),
  KEY `shop_order_address_id` (`address_id`),
  KEY `shop_order_express_id` (`express_id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8 COMMENT='订单表';

/*Data for the table `shop_order` */

insert  into `shop_order`(`order_id`,`user_id`,`address_id`,`amount`,`status`,`express_id`,`express_no`,`trade_no`,`tradeext`,`create_time`,`update_time`) values (50,19,0,'0.00',0,0,'','',NULL,1475997919,'2016-10-09 15:25:19'),(51,19,0,'0.00',0,0,'','',NULL,1475997929,'2016-10-09 15:25:29'),(53,19,0,'0.00',0,0,'','',NULL,1475998012,'2016-10-09 15:26:52'),(54,19,0,'0.00',0,0,'','',NULL,1475998013,'2016-10-09 15:26:53'),(55,19,0,'0.00',0,0,'','',NULL,1475998072,'2016-10-09 15:27:52'),(57,19,0,'0.00',0,0,'','',NULL,1475998144,'2016-10-09 15:29:04'),(58,19,0,'0.00',0,0,'','',NULL,1475998176,'2016-10-09 15:29:36'),(59,19,0,'0.00',0,0,'','',NULL,1475998212,'2016-10-09 15:30:12'),(60,19,0,'0.00',0,0,'','',NULL,1475998239,'2016-10-09 15:30:39'),(61,19,0,'0.00',0,0,'','',NULL,1475998346,'2016-10-09 15:32:26'),(62,19,0,'0.00',0,0,'','',NULL,1475998374,'2016-10-09 15:32:54'),(67,19,0,'0.00',0,0,'','',NULL,1475998527,'2016-10-09 15:35:27'),(82,19,0,'0.00',0,0,'','',NULL,1475999406,'2016-10-09 15:50:06'),(83,19,0,'0.00',0,0,'','',NULL,1475999645,'2016-10-09 15:54:05'),(84,19,0,'0.00',0,0,'','',NULL,1476000095,'2016-10-09 16:01:35'),(85,19,0,'0.00',0,0,'','',NULL,1476000157,'2016-10-09 16:02:37'),(86,19,0,'0.00',0,0,'','',NULL,1476000217,'2016-10-09 16:03:37'),(87,19,2,'3520.00',100,2,'','',NULL,1476005279,'2016-10-09 20:27:45'),(88,19,6,'2714.00',100,1,'','',NULL,1476012258,'2016-10-09 21:22:01'),(89,19,0,'0.00',0,0,'','',NULL,1476016581,'2016-10-09 20:36:21'),(90,19,0,'0.00',0,0,'','',NULL,1476020558,'2016-10-09 21:42:38'),(91,19,1,'2719.00',100,2,'','',NULL,1476028529,'2016-10-09 23:55:35'),(92,19,1,'2719.00',100,2,'','',NULL,1476031452,'2016-10-10 00:44:17'),(93,18,7,'2714.00',100,1,'','',NULL,1476061790,'2016-10-10 09:11:29'),(94,18,0,'0.00',0,0,'','',NULL,1476063192,'2016-10-10 09:33:12'),(95,19,0,'0.00',0,0,'','',NULL,1476090027,'2016-10-10 17:00:27'),(96,19,0,'0.00',0,0,'','',NULL,1476091382,'2016-10-10 17:23:02'),(97,19,1,'5418.00',100,2,'','',NULL,1476204092,'2016-10-12 00:41:38'),(98,19,1,'21.00',100,2,'','',NULL,1476267077,'2016-10-12 18:14:18'),(99,58,0,'0.00',0,0,'','',NULL,1476277613,'2016-10-12 21:06:53'),(102,58,0,'0.00',0,0,'','',NULL,1476277710,'2016-10-12 21:08:30'),(103,58,11,'13515.00',100,2,'','',NULL,1476277758,'2016-10-12 21:09:55'),(104,19,1,'8919.00',100,2,'','',NULL,1476329040,'2016-10-13 11:24:04'),(105,19,0,'0.00',0,0,'','',NULL,1476332171,'2016-10-13 12:16:11'),(106,19,0,'0.00',0,0,'','',NULL,1476333944,'2016-10-13 12:45:44'),(107,62,0,'0.00',0,0,'','',NULL,1476334244,'2016-10-13 12:50:44'),(108,62,0,'0.00',0,0,'','',NULL,1476334400,'2016-10-13 12:53:20'),(109,62,0,'0.00',0,0,'','',NULL,1476334616,'2016-10-13 12:56:56'),(110,19,0,'0.00',0,0,'','',NULL,1476334760,'2016-10-13 12:59:20'),(112,62,0,'0.00',0,0,'','',NULL,1476334847,'2016-10-13 13:00:47'),(113,62,0,'0.00',0,0,'','',NULL,1476334908,'2016-10-13 13:01:48'),(114,62,12,'220.00',100,2,'','',NULL,1476335110,'2016-10-13 13:08:59'),(115,62,12,'1.00',100,3,'','',NULL,1476335550,'2016-10-13 14:40:14');

/*Table structure for table `shop_order_detail` */

DROP TABLE IF EXISTS `shop_order_detail`;

CREATE TABLE `shop_order_detail` (
  `detail_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单详情主键id',
  `goods_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '订单价格',
  `goods_num` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品数量',
  `order_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '所属订单id',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`detail_id`),
  KEY `shop_order_detail_goods_id` (`goods_id`),
  KEY `shop_order_detail_order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=115 DEFAULT CHARSET=utf8 COMMENT='订单详情表';

/*Data for the table `shop_order_detail` */

insert  into `shop_order_detail`(`detail_id`,`goods_id`,`price`,`goods_num`,`order_id`,`create_time`) values (46,1,'3500.00',13,67,1475998527),(47,2,'2000.00',1,67,1475998527),(48,3,'200.00',2,67,1475998527),(69,1,'3500.00',13,82,1475999406),(70,2,'2000.00',1,82,1475999406),(71,3,'200.00',2,82,1475999406),(72,1,'3500.00',1,83,1475999645),(73,1,'3500.00',1,84,1476000095),(74,1,'3500.00',5,85,1476000157),(75,2,'2699.00',1,86,1476000217),(76,1,'3500.00',1,87,1476005279),(77,2,'2699.00',1,88,1476012258),(78,2,'2699.00',1,89,1476016581),(79,2,'2699.00',1,90,1476020558),(80,2,'2699.00',1,91,1476028529),(81,2,'2699.00',1,92,1476031452),(82,2,'2699.00',1,93,1476061790),(83,2,'2699.00',6,94,1476063192),(84,2,'2699.00',1,95,1476090027),(85,2,'2699.00',1,95,1476090027),(86,1,'3500.00',4,95,1476090027),(87,2,'2699.00',7,95,1476090027),(88,1,'3500.00',1,95,1476090027),(89,1,'3500.00',1,96,1476091382),(90,2,'2699.00',1,96,1476091382),(91,2,'2699.00',2,97,1476204092),(92,5,'1.00',1,98,1476267077),(93,1,'3500.00',1,99,1476277613),(94,6,'0.00',1,99,1476277613),(95,7,'0.00',1,102,1476277710),(96,2,'2699.00',5,103,1476277758),(97,2,'2699.00',2,104,1476329040),(98,1,'3500.00',1,104,1476329040),(99,6,'0.00',2,104,1476329040),(100,5,'1.00',1,104,1476329040),(101,7,'0.00',2,105,1476332171),(102,5,'1.00',3,105,1476332171),(103,6,'0.00',3,105,1476332171),(104,4,'1.00',1,106,1476333944),(105,6,'0.00',2,107,1476334244),(106,5,'1.00',2,107,1476334244),(107,2,'2699.00',1,107,1476334244),(108,6,'0.00',1,108,1476334400),(109,2,'2699.00',1,109,1476334616),(110,6,'0.00',1,110,1476334760),(111,2,'2699.00',1,112,1476334847),(112,2,'2699.00',1,113,1476334908),(113,3,'200.00',1,114,1476335110),(114,5,'1.00',1,115,1476335550);

/*Table structure for table `shop_profile` */

DROP TABLE IF EXISTS `shop_profile`;

CREATE TABLE `shop_profile` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `truename` varchar(32) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `age` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '年龄',
  `sex` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date NOT NULL DEFAULT '2016-01-01' COMMENT '生日',
  `nick_name` varchar(32) NOT NULL DEFAULT '' COMMENT '昵称',
  `company` varchar(100) NOT NULL DEFAULT '' COMMENT '公司',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户的ID',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_profile_userid` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员详情表';

/*Data for the table `shop_profile` */

/*Table structure for table `shop_test` */

DROP TABLE IF EXISTS `shop_test`;

CREATE TABLE `shop_test` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `create_time` int(11) NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*Data for the table `shop_test` */

insert  into `shop_test`(`id`,`username`,`password`,`create_time`,`content`,`title`) values (1,'admin','e10adc3949ba59abbe56e057f20f883e',0,'',''),(2,'','',0,'',''),(3,'admin1','e10adc3949ba59abbe56e057f20f883e',0,'',''),(4,'admin2','e10adc3949ba59abbe56e057f20f883e',0,'',''),(5,'admin2','e10adc3949ba59abbe56e057f20f883e',0,'',''),(6,'admin2','e10adc3949ba59abbe56e057f20f883e',0,'',''),(7,'admin2','e10adc3949ba59abbe56e057f20f883e',0,'',''),(8,'admin3','e10adc3949ba59abbe56e057f20f883e',0,'',''),(9,'admin3','e10adc3949ba59abbe56e057f20f883e',0,'',''),(10,'admin3','e10adc3949ba59abbe56e057f20f883e',0,'',''),(11,'admin5','e10adc3949ba59abbe56e057f20f883e',0,'',''),(12,'admin6','e10adc3949ba59abbe56e057f20f883e',0,'',''),(13,'admin6','e10adc3949ba59abbe56e057f20f883e',0,'',''),(14,'admin6','e10adc3949ba59abbe56e057f20f883e',0,'',''),(15,'','',0,'<div id=\"J-detail-content\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Arial, Verdana, 宋体; font-size: 13px; white-space: normal;\"><div class=\"content_tpl\" style=\"margin: 0px auto; padding: 0px; width: 750px;\"><div class=\"formwork\" style=\"margin: 0px; padding: 10px 0px; overflow: hidden; width: 750px; border-bottom: 1px dashed rgb(230, 230, 230); line-height: 23px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;\"><div class=\"formwork_img\" style=\"margin: 0px auto; padding: 0px; width: 750px; text-align: center;\"><div style=\"margin: 0px; padding: 0px;\"><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t2431/277/1481582560/84175/ce490fe/56a99237Nf31bced3.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t2575/10/1037265566/302450/97c3889c/56af21c2N8d893608.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img12.360buyimg.com/cms/jfs/t1885/84/2103761526/285554/2fc49921/56aadcd2N1a98437c.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t1924/71/2240036665/257295/ec306975/56a9923cN1a83e70a.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t2353/18/2159865335/184137/d5c9cbfe/56af27aaN71da7498.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/cms/jfs/t3019/157/1481660880/199361/dd7e8a01/57c57845N89d5a288.gif\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img11.360buyimg.com/cms/jfs/t1969/86/2196814640/149154/e5beab60/56aef37aNb93cf970.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img13.360buyimg.com/cms/jfs/t2575/16/1052046371/250497/8958e06/56a99242Neeca1e53.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img11.360buyimg.com/cms/jfs/t1048/348/1438239998/29617/58985f0c/572c1925Nfb018373.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/><img alt=\"\" class=\"\" src=\"https://img10.360buyimg.com/cms/jfs/t2578/295/1312520813/73549/eed84acb/56a99242N5767fb92.jpg\" style=\"margin: 0px; padding: 0px;\"/><br/></div></div></div></div><br/></div><div id=\"activity_footer\" clstag=\"\" style=\"margin: 0px; padding: 0px; color: rgb(102, 102, 102); font-family: Arial, Verdana, 宋体; font-size: 13px; white-space: normal;\"><div style=\"margin: 0px; padding: 0px; text-align: center;\"><img alt=\"\" class=\"\" src=\"https://img30.360buyimg.com/jgsq-productsoa/jfs/t2377/242/2384397158/60576/a04f684/56d6410fN1790e08c.jpg\" style=\"margin: 0px; padding: 0px;\"/></div></div><p><br/></p>','小米 红米Note3 高配全网通版 3GB+32GB 金色 移动联通电信4G手机 双卡双待');

/*Table structure for table `shop_users` */

DROP TABLE IF EXISTS `shop_users`;

CREATE TABLE `shop_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `username` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '邮箱',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `open_id` char(32) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8 COMMENT='会员表';

/*Data for the table `shop_users` */

insert  into `shop_users`(`id`,`username`,`password`,`email`,`create_time`,`open_id`) values (19,'admin','e10adc3949ba59abbe56e057f20f883e','2036999602ff@qq.com',0,'0'),(41,'test_57fd37cca7a49','d3e1b99c46053dfa9d6ec3c8fcc25561','2036999602@qq.com',0,'0'),(45,'test_57fd3a3ce0d05','d41d8cd98f00b204e9800998ecf8427e','18819069937@163.com',0,'0'),(46,'','d41d8cd98f00b204e9800998ecf8427e','',0,'0'),(48,'hfdh','123456','',0,'0'),(49,'admin123','e10adc3949ba59abbe56e057f20f883e','',0,'0'),(50,'admin123456','c4ca4238a0b923820dcc509a6f75849b','',0,'0'),(51,'a1','1','',0,'0'),(55,'a3','e10adc3949ba59abbe56e057f20f883e','',0,'0'),(56,'admin666','e10adc3949ba59abbe56e057f20f883e','',0,'0'),(57,'admin999','e10adc3949ba59abbe56e057f20f883e','',0,'0'),(58,'admin888','e10adc3949ba59abbe56e057f20f883e','',0,'0'),(62,'admin6','e10adc3949ba59abbe56e057f20f883e','',0,'DCCDC68FD4420636894DC13A56464969');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
