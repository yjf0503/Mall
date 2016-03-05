-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Mar 05, 2016 at 10:07 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `mall`
--

-- --------------------------------------------------------

--
-- Table structure for table `mall_address`
--

CREATE TABLE `mall_address` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `name` varchar(20) NOT NULL COMMENT '//收货人',
  `email` varchar(100) NOT NULL COMMENT '//电子邮件',
  `address` varchar(200) NOT NULL COMMENT '//收货地址',
  `code` char(6) NOT NULL COMMENT '//邮政编码',
  `tel` char(11) NOT NULL COMMENT '//电话号码',
  `buildings` varchar(100) NOT NULL COMMENT '//标志性建筑物',
  `user` varchar(20) NOT NULL COMMENT '//会员帐号',
  `selected` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '//首选',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '//省内外判断'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_address`
--

INSERT INTO `mall_address` (`id`, `name`, `email`, `address`, `code`, `tel`, `buildings`, `user`, `selected`, `flag`) VALUES
(2, '王小宝', 'wangxiaobao@sina.com.cn', '江苏苏州', '440440', '32423423432', '小桥流水', '蜡笔小新', 0, 0),
(3, '李炎恢', 'bnbbs@163.com', '江苏盐城', '224000', '12312312312', '移动总部斜对面', '蜡笔小新', 1, 1),
(4, '赵大强', 'zhaodaqiang@163.com', '上海', '555000', '2342342342', '铁塔', '蜡笔小新', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mall_attr`
--

CREATE TABLE `mall_attr` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `name` varchar(20) NOT NULL COMMENT '//属性名称',
  `way` tinyint(1) unsigned NOT NULL COMMENT '//选择方式',
  `item` varchar(255) NOT NULL COMMENT '//属性项目',
  `nav` varchar(255) NOT NULL COMMENT '//关联类型'
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_attr`
--

INSERT INTO `mall_attr` (`id`, `name`, `way`, `item`, `nav`) VALUES
(7, '风格', 0, '欧式|中式|美式', '29'),
(6, '颜色', 0, '白色|红色|黑色|紫色|蓝色|黄色|粉色|墨色|棕色|绿色|橘红色|橙色', '29,49'),
(8, '尺寸', 0, 'S|M|L|XL|XXL|XXXL', '30,29,49'),
(15, '容量', 0, '2G|4G|8G|16G|32G|64G|128G|500G|1TB|1.5TB|2TB', '59'),
(19, '赠品', 1, '小挂件|小玩具|Q币|吉祥物', '30,29,49,59');

-- --------------------------------------------------------

--
-- Table structure for table `mall_brand`
--

CREATE TABLE `mall_brand` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `name` varchar(20) NOT NULL COMMENT '//名称',
  `url` varchar(200) NOT NULL COMMENT '//地址',
  `info` varchar(200) NOT NULL COMMENT '//简介',
  `reg_time` datetime NOT NULL COMMENT '//时间'
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_brand`
--

INSERT INTO `mall_brand` (`id`, `name`, `url`, `info`, `reg_time`) VALUES
(1, '秋水伊人', 'http://www.yc60.com', '秋水伊人', '2012-04-17 22:03:39'),
(2, '红豆南国', 'http://www.yc60.com', '红豆南国', '2012-04-17 22:03:55'),
(3, '喜洋洋', 'http://www.xiyangyang.com', '喜洋洋', '2012-04-17 22:04:05'),
(7, '金士顿', '', '', '2012-05-11 11:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `mall_collect`
--

CREATE TABLE `mall_collect` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '//商品id',
  `user` varchar(200) NOT NULL COMMENT '//用户',
  `date` datetime NOT NULL COMMENT '//收藏时间'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_collect`
--

INSERT INTO `mall_collect` (`id`, `goods_id`, `user`, `date`) VALUES
(10, 52, '蜡笔小新', '2013-09-24 19:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `mall_commend`
--

CREATE TABLE `mall_commend` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `goods_id` mediumint(8) unsigned NOT NULL COMMENT '//商品id',
  `order_id` mediumint(8) unsigned NOT NULL COMMENT '//订单id',
  `attr` varchar(200) NOT NULL COMMENT '//商品属性',
  `content` text NOT NULL COMMENT '//评价内容',
  `re_content` text NOT NULL COMMENT '//回复内容',
  `star` tinyint(1) unsigned NOT NULL DEFAULT '5' COMMENT '//星级',
  `user` varchar(200) NOT NULL COMMENT '//用户',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '//屏蔽',
  `date` datetime NOT NULL COMMENT '//时间'
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_commend`
--

INSERT INTO `mall_commend` (`id`, `goods_id`, `order_id`, `attr`, `content`, `re_content`, `star`, `user`, `flag`, `date`) VALUES
(14, 29, 76, '', '第二次购买，非常给力~', '', 5, '蜡笔小新', 0, '2013-07-03 20:13:21'),
(15, 29, 77, '', '樱桃小丸子最喜欢的衣服啦~', '', 5, '樱桃小丸子', 0, '2013-07-06 19:45:44'),
(16, 25, 77, '', '樱桃小丸子做间谍专用服装！', '', 5, '樱桃小丸子', 0, '2013-07-06 19:46:05'),
(17, 29, 78, '', '我又来买这件衣服啦~', '', 5, '蜡笔小新', 0, '2013-07-07 15:11:15'),
(18, 29, 79, '', '再来光顾这件衣服，感觉非常棒！', '五星评价，下次购买会送好礼！', 5, '蜡笔小新', 1, '2013-07-07 16:16:50'),
(19, 29, 80, '风格:欧式;颜色:白色;尺寸:S;', '第三次购买了，质量没以前那么好了，一般般啦~ ', '我们将做的越来越好~', 2, '蜡笔小新', 0, '2013-07-07 16:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `mall_delivery`
--

CREATE TABLE `mall_delivery` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `name` varchar(20) NOT NULL COMMENT '//快递名称',
  `url` varchar(200) NOT NULL COMMENT '//url',
  `info` varchar(200) NOT NULL COMMENT '//简介',
  `price_in` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '//省内起步运费',
  `price_out` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '//省外起步运费',
  `price_add` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '//超过10公斤后每1公斤的运费',
  `date` datetime NOT NULL COMMENT '//时间'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_delivery`
--

INSERT INTO `mall_delivery` (`id`, `name`, `url`, `info`, `price_in`, `price_out`, `price_add`, `date`) VALUES
(1, '顺丰速递', 'http://www.sf-express.com', '江浙沪12元起步，省外20元起步，超过10公斤后每1公斤增加的5元。', '12.00', '20.00', '5.00', '2013-06-12 17:36:21'),
(3, '圆通快递', 'http://www.yto.net.cn', '江浙沪6元起步，省外11元起步，超过10公斤后的每1公斤增加2元', '6.00', '11.00', '2.00', '2013-06-12 17:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `mall_goods`
--

CREATE TABLE `mall_goods` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `nav` mediumint(8) unsigned NOT NULL COMMENT '//类型',
  `brand` mediumint(8) unsigned NOT NULL COMMENT '//品牌',
  `name` varchar(100) NOT NULL COMMENT '//名称',
  `sn` varchar(50) NOT NULL COMMENT '//编号',
  `attr` varchar(255) NOT NULL COMMENT '//属性',
  `price_sale` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '//销售价',
  `price_market` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '//市场价',
  `price_cost` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '//成本价',
  `keyword` varchar(200) NOT NULL COMMENT '//关键字',
  `unit` varchar(10) NOT NULL COMMENT '//计量单位',
  `weight` decimal(10,2) unsigned NOT NULL DEFAULT '0.00' COMMENT '//重量',
  `thumbnail` varchar(200) NOT NULL COMMENT '//大缩略图',
  `thumbnail2` varchar(200) NOT NULL COMMENT '//220x220',
  `content` text NOT NULL COMMENT '//详情',
  `is_up` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '//是否上架',
  `is_freight` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '//是否免运费',
  `inventory` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '//库存',
  `warn_inventory` smallint(2) unsigned NOT NULL DEFAULT '0' COMMENT '//库存告急',
  `sales` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '//销售量',
  `service` mediumint(8) unsigned NOT NULL COMMENT '//售后服务',
  `date` datetime NOT NULL COMMENT '//时间'
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_goods`
--

INSERT INTO `mall_goods` (`id`, `nav`, `brand`, `name`, `sn`, `attr`, `price_sale`, `price_market`, `price_cost`, `keyword`, `unit`, `weight`, `thumbnail`, `thumbnail2`, `content`, `is_up`, `is_freight`, `inventory`, `warn_inventory`, `sales`, `service`, `date`) VALUES
(25, 49, 1, '春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子', 'ABCD10001', '颜色:白色|红色|黑色|紫色;尺寸:S|M|L|XL|XXL', '75.80', '128.50', '45.00', '', '件', '2.22', './uploads/20120429/20120429223334777.jpg', './uploads/20120429/20120429223334777220x220.jpg', '', 1, 1, 209, 1, 20, 1, '2012-04-29 22:33:36'),
(29, 29, 0, '歌莉娅2013女装透视修身甜美气质蕾丝女', 'ABCD10002', '风格:欧式|中式;颜色:白色|红色|黑色|紫色|墨色;尺寸:S|M;赠品:小挂件|小玩具|Q币|吉祥物', '158.45', '258.45', '15.00', '纯棉|换季|白色', '件', '2.33', './uploads/20130604/20130604182722819.png', './uploads/20130604/20130604182722819220x220.png', '<p>\r\n <img alt="" src="./uploads/20130606/20130606133916224.jpg" style="width: 650px; height: 260px;" /></p>\r\n<p>\r\n &nbsp;</p>\r\n<table border="0" cellpadding="0" cellspacing="0" width="750">\r\n  <tbody>\r\n   <tr>\r\n      <td valign="top" width="500">\r\n       <img align="absmiddle" src="./uploads/20130606/20130606133947754.jpg" style="width: 500px; height: 615px;" /></td>\r\n      <td width="5">\r\n        &nbsp;</td>\r\n     <td width="245">\r\n        <div style="border: 1px solid rgb(235, 235, 235); width: 243px; height: 615px;">\r\n          <div style="width: 100%; height: 380px;">\r\n           <div style="width: 200px; line-height: 24px; font-size: 12px; margin-top: 10px; margin-left: 20px; border-bottom: 1px dotted rgb(235, 235, 235);">\r\n              <div style="background: none no-repeat scroll left center transparent; padding-left: 10px; font-size: 12px;">\r\n               <strong>名&nbsp;&nbsp;&nbsp;称：</strong></div>\r\n              <div>\r\n               甜美波点连衣裙</div>\r\n           </div>\r\n            <div style="width: 200px; line-height: 22px; clear: both; font-size: 12px; margin-top: 5px; margin-left: 20px; border-bottom: 1px dotted rgb(235, 235, 235);">\r\n              <div style="background: none no-repeat scroll left center transparent; padding-left: 10px; font-size: 12px;">\r\n               <strong>品牌价：</strong></div>\r\n             <div>\r\n               ￥599</div>\r\n            </div>\r\n            <div style="width: 200px; line-height: 22px; clear: both; font-size: 12px; margin-top: 5px; margin-left: 20px; border-bottom: 1px dotted rgb(235, 235, 235);">\r\n              <div style="background: none no-repeat scroll left center transparent; padding-left: 10px; font-size: 12px;">\r\n               <strong>尺&nbsp;&nbsp;&nbsp;码：</strong></div>\r\n              <div>\r\n               S，M，L</div>\r\n           </div>\r\n            <div style="width: 200px; line-height: 22px; clear: both; font-size: 12px; margin-top: 5px; margin-left: 20px; border-bottom: 1px dotted rgb(235, 235, 235);">\r\n              <div style="background: none no-repeat scroll left center transparent; padding-left: 10px; font-size: 12px;">\r\n               <strong>配&nbsp;&nbsp;&nbsp;送：</strong></div>\r\n              <div>\r\n               无配送</div>\r\n           </div>\r\n            <div style="width: 200px; line-height: 20px; clear: both; font-size: 12px; margin-top: 5px; margin-left: 20px; border-bottom: 1px dotted rgb(235, 235, 235);">\r\n              <div style="background: none no-repeat scroll left center transparent; padding-left: 10px; font-size: 12px;">\r\n               <strong>颜&nbsp;&nbsp;&nbsp;色：</strong></div>\r\n              <span style="text-align: center; color: rgb(64, 64, 64); line-height: 15px; font-family: tahoma arial 宋体;">W01#米白</span>&nbsp; &nbsp;&nbsp;<span style="text-align: center; color: rgb(64, 64, 64); line-height: 15px; font-family: tahoma arial 宋体;">B00#黑色</span></div>\r\n           <div style="width: 200px; line-height: 16px; clear: both; font-size: 12px; margin-top: 5px; margin-left: 20px; border-bottom: 1px dotted rgb(235, 235, 235);">\r\n              <div style="background: none no-repeat scroll left center transparent; padding-left: 10px; font-size: 12px;">\r\n               <strong>面&nbsp;&nbsp;&nbsp;料：</strong></div>\r\n              <div style="height: 90px; font-size: 12px;">\r\n                主面料：锦纶82.4%，氨纶17.6%； &nbsp;雪纺里料：聚酯纤维96.3%，氨纶3.7%； &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 网布里料：聚酯纤维100%</div>\r\n            </div>\r\n          </div>\r\n          <div style="width: 200px; line-height: 18px; padding-top: 3px; padding-left: 20px;">\r\n            <img src="./uploads/20130606/20130606134000847.jpg" style="width: 200px; height: 45px;" /></div>\r\n          <div style="width: 200px; line-height: 18px; padding-top: 3px; padding-left: 20px;">\r\n            <img src="./uploads/20130606/20130606134011319.jpg" style="width: 200px; height: 45px;" /></div>\r\n          <div style="width: 200px; line-height: 18px; padding-top: 2px; padding-left: 20px;">\r\n            <img src="./uploads/20130606/20130606134022234.jpg" style="width: 200px; height: 65px;" /></div>\r\n          <div style="width: 200px; line-height: 18px; padding-top: 2px; padding-left: 20px;">\r\n            <img src="./uploads/20130606/20130606134042996.jpg" style="width: 200px; height: 65px;" /></div>\r\n        </div>\r\n      </td>\r\n   </tr>\r\n </tbody>\r\n</table>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n <img alt="" src="./uploads/20130606/20130606134104165.jpg" style="width: 650px; height: 606px;" /></p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n <img alt="" src="./uploads/20130606/20130606134120694.jpg" style="width: 650px; height: 606px;" /></p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n <img alt="" src="./uploads/20130606/20130606134133125.jpg" style="width: 650px; height: 606px;" /></p>\r\n<p>\r\n &nbsp;</p>\r\n<p>\r\n <img alt="" src="./uploads/20130606/20130606134146298.jpg" style="width: 650px; height: 606px;" /></p>\r\n<p>\r\n &nbsp;</p>\r\n<table background="http://img03.taobaocdn.com/imgextra/i3/133006562/T2jIGTXjxaXXXXXXXX_!!133006562.gif" border="0" cellpadding="0" cellspacing="0" height="235" style="color: rgb(69, 69, 69); font-size: 12px; font-weight: bold;" width="750">\r\n  <tbody>\r\n   <tr style="text-align: center;">\r\n      <td colspan="6" height="25" style="height: 25px; line-height: 25px; overflow: hidden;">\r\n       <span style="color: rgb(255, 255, 255); font-size: 14px; font-weight: bold;">尺码与人体（净体）对应表<font style="font-size: 12px; font-weight: normal;">（单位/厘米 cm）</font></span></td>\r\n    </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="35" style="height: 35px; line-height: 35px; overflow: hidden;" width="125">\r\n       &nbsp;</td>\r\n     <td style="height: 35px; line-height: 35px; overflow: hidden;" width="125">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>S</strong></span></td>\r\n      <td style="height: 35px; line-height: 35px; overflow: hidden;" width="125">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>M</strong></span></td>\r\n      <td style="height: 35px; line-height: 35px; overflow: hidden;" width="125">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>L</strong></span></td>\r\n      <td style="height: 35px; line-height: 35px; overflow: hidden;" width="125">\r\n       &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="35" style="height: 35px; line-height: 35px; overflow: hidden;">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>身高</strong></span></td>\r\n     <td>\r\n        155-160</td>\r\n      <td>\r\n        160-165</td>\r\n      <td>\r\n        165-170</td>\r\n      <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="35" style="height: 35px; line-height: 35px; overflow: hidden;">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>肩宽</strong></span></td>\r\n     <td>\r\n        36.5-37.5</td>\r\n      <td>\r\n        37.5-38.5</td>\r\n      <td>\r\n        38.5-39.5</td>\r\n      <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="35" style="height: 35px; line-height: 35px; overflow: hidden;">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>胸围</strong></span></td>\r\n     <td>\r\n        79-82</td>\r\n      <td>\r\n        83-86</td>\r\n      <td>\r\n        87-90</td>\r\n      <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="35" style="height: 35px; line-height: 35px; overflow: hidden;">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>腰围</strong></span></td>\r\n     <td>\r\n        61-64</td>\r\n      <td>\r\n        65-68</td>\r\n      <td>\r\n        69-72</td>\r\n      <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="35" style="height: 35px; line-height: 35px; overflow: hidden;">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>臀围</strong></span></td>\r\n     <td>\r\n        85-88</td>\r\n      <td>\r\n        89-92</td>\r\n      <td>\r\n        93-96</td>\r\n      <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n </tbody>\r\n</table>\r\n<div style="height: 10px; clear: both;">\r\n  &nbsp;</div>\r\n<table background="http://img04.taobaocdn.com/imgextra/i4/133006562/T2e2uwXolbXXXXXXXX_!!133006562.gif" border="0" cellpadding="0" cellspacing="0" height="268" style="color: rgb(51, 51, 51); font-size: 12px; margin-bottom: 20px;" width="750">\r\n  <tbody>\r\n   <tr style="text-align: center;">\r\n      <td colspan="7" height="25" style="height: 25px; line-height: 25px; overflow: hidden;">\r\n       <span style="color: rgb(255, 255, 255); font-size: 14px; font-weight: bold;">成衣尺寸参照表<font style="font-size: 12px; font-weight: normal;">（单位/厘米 cm）</font></span></td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="30" style="height: 30px; line-height: 30px; overflow: hidden;" width="62">\r\n        &nbsp;</td>\r\n     <td style="height: 30px; line-height: 30px; overflow: hidden;" width="62">\r\n        <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>S</strong></span></td>\r\n      <td style="height: 30px; line-height: 30px; overflow: hidden;" width="62">\r\n        <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>M</strong></span></td>\r\n      <td style="height: 30px; line-height: 30px; overflow: hidden;" width="62">\r\n        <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>L</strong></span></td>\r\n      <td style="height: 30px; line-height: 30px; overflow: hidden;" width="62">\r\n        &nbsp;</td>\r\n     <td style="height: 30px; line-height: 30px; overflow: hidden;" width="62">\r\n        &nbsp;</td>\r\n     <td align="center" rowspan="7" valign="middle">\r\n       <img src="./uploads/20130606/20130606134221870.jpg" style="width: 362px; height: 200px;" /></td>\r\n    </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="30" style="height: 30px; line-height: 30px; overflow: hidden;">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>后中长</strong></span></td>\r\n      <td>\r\n        78.5&nbsp;</td>\r\n     <td>\r\n        81&nbsp;</td>\r\n     <td>\r\n        83.5&nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="30" style="height: 30px; line-height: 30px; overflow: hidden;">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>肩宽</strong></span></td>\r\n     <td>\r\n        32&nbsp;</td>\r\n     <td>\r\n        33&nbsp;</td>\r\n     <td>\r\n        34&nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="30" style="height: 30px; line-height: 30px; overflow: hidden;">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>胸围</strong></span></td>\r\n     <td>\r\n        84&nbsp;</td>\r\n     <td>\r\n        88&nbsp;</td>\r\n     <td>\r\n        92&nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="30" style="height: 30px; line-height: 30px; overflow: hidden;">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>腰围</strong></span></td>\r\n     <td>\r\n        72&nbsp;</td>\r\n     <td>\r\n        76&nbsp;</td>\r\n     <td>\r\n        80&nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="30" style="height: 30px; line-height: 30px; overflow: hidden;">\r\n       <span style="color: rgb(174, 136, 119); font-size: 14px;"><strong>摆围</strong></span></td>\r\n     <td>\r\n        154&nbsp;</td>\r\n      <td>\r\n        161&nbsp;</td>\r\n      <td>\r\n        168&nbsp;</td>\r\n      <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr style="text-align: center;">\r\n      <td height="30" style="height: 30px; line-height: 30px; overflow: hidden;">\r\n       &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n     <td>\r\n        &nbsp;</td>\r\n   </tr>\r\n   <tr>\r\n      <td colspan="7" height="20" style="height: 20px; line-height: 20px; overflow: hidden;">\r\n       <span style="color: rgb(153, 153, 153); font-size: 12px;">以上为手工测量，可能与实物有1-2厘米误差，属国家规定标准范围内</span></td>\r\n    </tr>\r\n </tbody>\r\n</table>\r\n<div style="height: 10px; clear: both;">\r\n  &nbsp;</div>\r\n<div>\r\n <img align="absmiddle" src="http://img04.taobaocdn.com/imgextra/i4/133006562/T26Qb2XaNXXXXXXXXX_%21%21133006562.jpg" /></div>\r\n', 1, 1, 312, 1, 10, 1, '2012-04-29 22:51:03'),
(36, 59, 7, '金士顿32G好U盘', 'ABCD1234', '容量:2G|4G|8G|16G|32G|64G;赠品:小挂件|小玩具|Q币|吉祥物', '100.00', '150.00', '80.00', '金士顿|U盘', '个', '1.11', './uploads/20130603/20130603160116628.jpg', '', '<p>\r\n  金士顿32G好U盘</p>\r\n', 0, 1, 100, 1, 0, 2, '2013-06-03 16:01:25'),
(52, 30, 2, '花朵刺绣中腰牛仔短裤女 直筒大码热裤女', 'ABCD1006', '尺寸:S|M|L|XL|XXL|XXXL;赠品:小挂件|小玩具|Q币|吉祥物', '178.00', '238.00', '120.00', '纯棉|换季|白色', '条', '1.11', './uploads/20130914/20130914171325247.jpg', './uploads/20130914/20130914171325247220x220.jpg', '<p>\r\n 牛仔裤4</p>\r\n', 1, 1, 100, 1, 0, 1, '2013-09-14 17:13:37'),
(50, 30, 2, '韩版显瘦蕾丝牛仔短裤潮女热裤宽松修身', 'ABCD1004', '尺寸:S|M|L|XL|XXL|XXXL;赠品:小挂件|小玩具|Q币|吉祥物', '89.00', '178.00', '50.00', '纯棉|换季|白色', '条', '1.11', './uploads/20130914/20130914171146233.jpg', './uploads/20130914/20130914171146233220x220.jpg', '<p>\r\n  牛仔裤2</p>\r\n', 1, 1, 100, 1, 0, 1, '2013-09-14 17:11:55'),
(51, 30, 2, '韩版潮显瘦短裤热裤超短裤薄中腰牛仔短裤', 'ABCD1005', '尺寸:S|M|L|XL|XXL|XXXL;赠品:小挂件|小玩具|Q币|吉祥物', '95.00', '129.00', '65.00', '纯棉|换季|白色', '条', '1.11', './uploads/20130914/20130914171251488.jpg', './uploads/20130914/20130914171251488220x220.jpg', '<p>\r\n 牛仔裤3</p>\r\n', 1, 1, 100, 1, 0, 1, '2013-09-14 17:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `mall_level`
--

CREATE TABLE `mall_level` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `level_name` varchar(20) NOT NULL COMMENT '//等级名称'
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_level`
--

INSERT INTO `mall_level` (`id`, `level_name`) VALUES
(1, '超级管理员'),
(2, '普通管理员'),
(3, '商品发布专员'),
(4, '订单处理专员');

-- --------------------------------------------------------

--
-- Table structure for table `mall_manage`
--

CREATE TABLE `mall_manage` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `user` varchar(20) NOT NULL COMMENT '//user',
  `pass` char(40) NOT NULL COMMENT '//pass',
  `level` tinyint(1) unsigned NOT NULL COMMENT '//等级',
  `login_count` smallint(6) unsigned NOT NULL COMMENT '//登录次数',
  `last_ip` varchar(20) NOT NULL COMMENT '//最后登录的ip',
  `last_time` datetime NOT NULL COMMENT '//最后登录的时间',
  `reg_time` datetime NOT NULL COMMENT '//注册时间'
) ENGINE=MyISAM AUTO_INCREMENT=294 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_manage`
--

INSERT INTO `mall_manage` (`id`, `user`, `pass`, `level`, `login_count`, `last_ip`, `last_time`, `reg_time`) VALUES
(293, '蜡笔小新', '601f1889667efaebb33b8c12572835da3f027f78', 2, 0, '127.0.0.1', '0000-00-00 00:00:00', '2012-06-06 10:23:24'),
(266, '李炎恢', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 1, 1, '127.0.0.1', '2012-03-29 12:21:43', '2012-03-12 20:12:32'),
(265, 'admin222', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0, '127.0.0.1', '0000-00-00 00:00:00', '2012-03-12 20:10:55'),
(262, '蜡笔小新5', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0, '127.0.0.1', '0000-00-00 00:00:00', '2012-03-10 21:42:41'),
(261, '蜡笔小新4', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0, '127.0.0.1', '0000-00-00 00:00:00', '2012-03-10 21:37:30'),
(278, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 227, '127.0.0.1', '2013-12-16 15:00:06', '0000-00-00 00:00:00'),
(257, 'admin1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0, '127.0.0.1', '0000-00-00 00:00:00', '2012-03-10 21:31:50');

-- --------------------------------------------------------

--
-- Table structure for table `mall_nav`
--

CREATE TABLE `mall_nav` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `name` varchar(20) NOT NULL COMMENT '//导航名称',
  `info` varchar(200) NOT NULL COMMENT '//导航简介',
  `sort` mediumint(8) unsigned NOT NULL COMMENT '//排序',
  `sid` mediumint(8) NOT NULL COMMENT '//类别',
  `brand` varchar(255) NOT NULL COMMENT '//品牌id',
  `price` varchar(255) NOT NULL COMMENT '//价格区间'
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_nav`
--

INSERT INTO `mall_nav` (`id`, `name`, `info`, `sort`, `sid`, `brand`, `price`) VALUES
(39, '美容美发', '美容美发', 39, 0, '', ''),
(40, '家居建材', '家居建材', 40, 0, '', ''),
(12, '珠宝手表', '珠宝手表', 4, 0, '', ''),
(41, '美食特产', '美食特产', 41, 0, '', ''),
(17, '女士服装', '女士服装', 1, 0, '', 'a:8:{i:0;s:5:"1 - 2";i:1;s:5:"1 - 3";i:2;s:5:"1 - 5";i:3;s:6:"1 - 10";i:4;s:6:"1 - 15";i:5;s:5:"2 - 4";i:6;s:6:"2 - 50";i:7;s:8:"10 - 100";}'),
(30, '牛仔裤', '牛仔裤', 1, 17, 'a:2:{i:0;s:1:"2";i:1;s:1:"3";}', 'a:2:{i:0;s:5:"1 - 3";i:1;s:6:"2 - 50";}'),
(29, '连衣裙', '连衣裙', 2, 17, '', 'a:3:{i:0;s:5:"2 - 4";i:1;s:6:"2 - 50";i:2;s:8:"10 - 100";}'),
(25, '时尚家居', '时尚家居', 4, 0, '', ''),
(24, '电子数码', '电子数码', 2, 0, '', 'a:2:{i:0;s:6:"2 - 50";i:1;s:8:"10 - 100";}'),
(42, '日用百货', '日用百货', 42, 0, '', ''),
(43, '汽车用品', '汽车用品', 43, 0, '', ''),
(44, '母婴用品', '母婴用品', 44, 0, '', ''),
(49, '衬衫', '衬衫', 49, 17, 'a:2:{i:0;s:1:"1";i:1;s:1:"2";}', 'a:3:{i:0;s:5:"1 - 3";i:1;s:6:"1 - 10";i:2;s:5:"2 - 4";}'),
(59, 'U盘', '', 59, 24, 'a:1:{i:0;s:1:"7";}', '');

-- --------------------------------------------------------

--
-- Table structure for table `mall_order`
--

CREATE TABLE `mall_order` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `user` varchar(20) NOT NULL COMMENT '//用户名',
  `name` varchar(20) NOT NULL COMMENT '//收货人',
  `email` varchar(100) NOT NULL COMMENT '//电子邮件',
  `address` varchar(200) NOT NULL COMMENT '//地址',
  `code` char(6) NOT NULL COMMENT '//邮政编码',
  `tel` char(11) NOT NULL COMMENT '//手机号码',
  `buildings` varchar(100) NOT NULL COMMENT '//标志性建筑物',
  `delivery` varchar(30) NOT NULL COMMENT '//物流方式',
  `pay` varchar(30) NOT NULL COMMENT '//支付方式',
  `price` decimal(10,2) unsigned NOT NULL COMMENT '//总金额',
  `text` varchar(255) NOT NULL COMMENT '//订单备注',
  `ps` varchar(30) NOT NULL COMMENT '//缺货处理方式',
  `ordernum` varchar(100) NOT NULL COMMENT '//订单号',
  `goods` text NOT NULL COMMENT '//商品列表',
  `order_state` varchar(10) NOT NULL DEFAULT '未确认' COMMENT '//订单状态',
  `order_pay` varchar(10) NOT NULL DEFAULT '未付款' COMMENT '//未支付',
  `order_delivery` varchar(10) NOT NULL DEFAULT '未发货' COMMENT '//未发货',
  `delivery_name` varchar(20) NOT NULL COMMENT '//快递名',
  `delivery_url` varchar(200) NOT NULL COMMENT '//官方网站',
  `delivery_number` varchar(200) NOT NULL COMMENT '//运单号',
  `refund` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '//申请退款',
  `date` datetime NOT NULL COMMENT '//时间'
) ENGINE=MyISAM AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_order`
--

INSERT INTO `mall_order` (`id`, `user`, `name`, `email`, `address`, `code`, `tel`, `buildings`, `delivery`, `pay`, `price`, `text`, `ps`, `ordernum`, `goods`, `order_state`, `order_pay`, `order_delivery`, `delivery_name`, `delivery_url`, `delivery_number`, `refund`, `date`) VALUES
(6, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '244.25', '包装好再发货~', '先发有货的', '2012062420333366739', 'a:2:{i:29;s:294:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:57:"拉维亚淑女气质荷叶边短款雪纺大摆连衣裙";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"1";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:275:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"1";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '已确认', '已付款', '已发货', '顺丰速递', 'http://www.sf-express.com', '123456789', 1, '2012-06-24 12:45:33'),
(7, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '864.35', '请务必包装好一点~', '等货物全了再发', '2012062523493514266', 'a:2:{i:29;s:294:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:57:"拉维亚淑女气质荷叶边短款雪纺大摆连衣裙";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"3";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:275:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"5";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2012-06-25 23:49:35'),
(41, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '15718.00', '', '先发有货的', '2013060910160715049', 'a:2:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"80";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:276:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"40";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '未确认', '已付款', '未发货', '', '', '', 0, '2013-06-09 10:16:07'),
(48, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '2352.50', '', '先发有货的', '2013060918012341843', 'a:2:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:276:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-09 18:01:23'),
(45, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '1594.50', '', '先发有货的', '2013060914560037519', 'a:1:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";}', '已取消', '已付款', '未发货', '0', '', '', 0, '2013-06-09 14:56:00'),
(56, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '2352.50', '', '先发有货的', '2013061118265481151', 'a:2:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:276:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-11 18:26:54'),
(43, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '1594.50', '', '先发有货的', '2013060914444335455', 'a:1:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";}', '未确认', '未付款', '已配货', '', '', '', 0, '2013-06-09 14:44:43'),
(44, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '1594.50', '', '先发有货的', '201306091446533455', 'a:1:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";}', '未确认', '未付款', '已发货', '0', '', '', 2, '2013-06-09 14:46:53'),
(40, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '15718.00', '', '先发有货的', '2013060820303544436', 'a:2:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"80";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:276:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"40";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-08 20:30:35'),
(20, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '168.45', '', '先发有货的', '2013060315463064429', 'a:1:{i:29;s:294:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:57:"拉维亚淑女气质荷叶边短款雪纺大摆连衣裙";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"1";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-03 15:46:30'),
(46, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '1594.50', '', '先发有货的', '2013060914561375808', 'a:1:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";}', '已确认', '未付款', '未发货', '0', '', '', 0, '2013-06-09 14:56:13'),
(47, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '1594.50', '', '先发有货的', '2013060915043415387', 'a:1:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-09 15:04:34'),
(49, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '2352.50', '', '先发有货的', '201306101214347705', 'a:2:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:276:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-10 12:14:34'),
(50, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '2352.50', '', '先发有货的', '2013061012152444259', 'a:2:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:276:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-10 12:15:24'),
(52, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '2352.50', '', '先发有货的', '2013061015440552627', 'a:2:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:276:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '未确认', '已付款', '未发货', '0', '', '', 2, '2013-06-10 15:44:05'),
(53, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '2352.50', '', '先发有货的', '2013061016195494213', 'a:2:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:276:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-10 16:19:54'),
(55, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '申通快递', '支付宝', '2352.50', '', '先发有货的', '2013061114524522573', 'a:2:{i:29;s:290:"a:6:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:10:"price_sale";s:6:"158.45";}";i:25;s:276:"a:6:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-11 14:52:45'),
(62, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2419.50', '', '先发有货的', '2013062814022872072', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-28 14:02:28'),
(63, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013062814390716604', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-28 14:39:07'),
(64, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013062815091122878', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-28 15:09:11'),
(65, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013062815202532317', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-06-28 15:20:25'),
(66, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '银行转账/汇款', '2534.00', '', '先发有货的', '2013070210541732522', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-07-02 10:54:17'),
(67, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '银行转账/汇款', '2534.00', '', '先发有货的', '2013070210565359846', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-07-02 10:56:53'),
(68, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013070211022239539', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-07-02 11:02:22'),
(69, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '银行转账/汇款', '2534.00', '', '先发有货的', '2013070211375996396', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-07-02 11:37:59'),
(70, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '银行转账/汇款', '2534.00', '', '先发有货的', '2013070211444459779', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-07-02 11:44:44'),
(71, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '货到付款', '2532.00', '', '先发有货的', '2013070211461062009', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-07-02 11:46:10'),
(72, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013070211472342426', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-07-02 11:47:23'),
(73, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013070314591650982', 'a:2:{i:29;s:314:"a:7:{s:2:"id";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:300:"a:7:{s:2:"id";s:2:"25";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-07-03 14:59:16'),
(74, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013070315035538749', 'a:2:{i:29;s:333:"a:8:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"price_sale";s:6:"158.45";}";i:25;s:319:"a:8:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '', '', '', 0, '2013-07-03 15:03:55'),
(75, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013070315205350447', 'a:2:{i:29;s:406:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '已确认', '已付款', '已发货', '顺丰速递', 'http://www.sf-express.com', '12345678', 0, '2013-07-03 15:20:53'),
(76, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013070317452836689', 'a:2:{i:29;s:406:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '已确认', '未付款', '已发货', '顺丰速递', 'http://www.sf-express.com', '12345678', 0, '2013-07-03 17:45:28'),
(77, '樱桃小丸子', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2540.00', '', '先发有货的', '2013070619411396877', 'a:2:{i:29;s:406:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '已确认', '已付款', '已发货', '顺丰速递', 'http://www.sf-express.com', '12345678', 0, '2013-07-06 19:41:13'),
(78, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '201307071428456675', 'a:2:{i:29;s:406:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '已确认', '已付款', '已发货', '顺丰速递', 'http://www.sf-express.com', '123456', 0, '2013-07-07 14:28:45'),
(79, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013070716110927938', 'a:2:{i:29;s:406:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '已确认', '已付款', '已发货', '顺丰速递', 'http://www.sf-express.com', '123456', 0, '2013-07-07 16:11:09'),
(80, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '2532.00', '', '先发有货的', '2013070716391458562', 'a:2:{i:29;s:406:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '已确认', '已付款', '已发货', '顺丰速递', 'http://www.sf-express.com', '123456', 0, '2013-07-07 16:39:14'),
(81, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '246.25', '', '先发有货的', '2013072317595149263', 'a:2:{i:29;s:405:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"1";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:391:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"1";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '已付款', '已发货', '顺丰速递', 'http://www.sf-express.com', '12345678', 0, '2013-07-23 17:59:51'),
(82, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '0.10', '', '先发有货的', '2013072416300168798', 'a:1:{i:29;s:405:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"1";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";}', '已取消', '未付款', '未发货', '0', '', '', 0, '2013-07-24 16:30:01'),
(83, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '246.25', '', '先发有货的', '2013072416463923862', 'a:2:{i:29;s:405:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"1";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:391:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"1";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '已付款', '未发货', '0', '', '', 0, '2013-07-24 16:46:39'),
(84, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '246.25', '', '先发有货的', '2013072421040181542', 'a:2:{i:29;s:405:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"1";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:391:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"1";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '已付款', '未发货', '0', '', '', 0, '2013-07-24 21:04:01'),
(85, '樱桃小丸子', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '488.50', '', '先发有货的', '2013072421501887434', 'a:2:{i:29;s:405:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"2";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:391:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"2";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '未确认', '已付款', '已发货', '顺丰速递', 'http://www.sf-express.com', '12345678', 0, '2013-07-24 21:50:18'),
(86, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '3477.50', '', '先发有货的', '2013090818475056453', 'a:3:{i:29;s:406:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:43;s:337:"a:9:{s:2:"id";s:2:"43";s:3:"nav";s:2:"30";s:4:"name";s:57:"韩版宽松修身蕾丝拼接牛仔短裤潮女夏热裤";s:4:"attr";a:1:{s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:8:"ABCD1003";s:6:"weight";s:4:"1.11";s:10:"thumbnail2";s:47:"./uploads/20130817/20130817214149197220x220.jpg";s:10:"price_sale";s:5:"89.00";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '未确认', '未付款', '未发货', '', '', '', 0, '2013-09-08 18:47:50'),
(87, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '3477.50', '', '先发有货的', '2013090818490434479', 'a:3:{i:43;s:337:"a:9:{s:2:"id";s:2:"43";s:3:"nav";s:2:"30";s:4:"name";s:57:"韩版宽松修身蕾丝拼接牛仔短裤潮女夏热裤";s:4:"attr";a:1:{s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:8:"ABCD1003";s:6:"weight";s:4:"1.11";s:10:"thumbnail2";s:47:"./uploads/20130817/20130817214149197220x220.jpg";s:10:"price_sale";s:5:"89.00";}";i:29;s:406:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '未确认', '未付款', '未发货', '', '', '', 0, '2013-09-08 18:49:04'),
(88, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '3572.50', '', '先发有货的', '2013090821354165555', 'a:3:{i:29;s:405:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"5";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";i:43;s:337:"a:9:{s:2:"id";s:2:"43";s:3:"nav";s:2:"30";s:4:"name";s:57:"韩版宽松修身蕾丝拼接牛仔短裤潮女夏热裤";s:4:"attr";a:1:{s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"20";s:2:"sn";s:8:"ABCD1003";s:6:"weight";s:4:"1.11";s:10:"thumbnail2";s:47:"./uploads/20130817/20130817214149197220x220.jpg";s:10:"price_sale";s:5:"89.00";}";}', '已取消', '未付款', '未发货', '0', '', '', 0, '2013-09-08 21:35:41'),
(89, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '3572.50', '', '先发有货的', '2013090821401979200', 'a:3:{i:43;s:337:"a:9:{s:2:"id";s:2:"43";s:3:"nav";s:2:"30";s:4:"name";s:57:"韩版宽松修身蕾丝拼接牛仔短裤潮女夏热裤";s:4:"attr";a:1:{s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"20";s:2:"sn";s:8:"ABCD1003";s:6:"weight";s:4:"1.11";s:10:"thumbnail2";s:47:"./uploads/20130817/20130817214149197220x220.jpg";s:10:"price_sale";s:5:"89.00";}";i:29;s:405:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"5";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '未确认', '未付款', '未发货', '', '', '', 0, '2013-09-08 21:40:19'),
(90, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '3572.50', '', '先发有货的', '201309082210493125', 'a:3:{i:29;s:405:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"5";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";i:43;s:337:"a:9:{s:2:"id";s:2:"43";s:3:"nav";s:2:"30";s:4:"name";s:57:"韩版宽松修身蕾丝拼接牛仔短裤潮女夏热裤";s:4:"attr";a:1:{s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"20";s:2:"sn";s:8:"ABCD1003";s:6:"weight";s:4:"1.11";s:10:"thumbnail2";s:47:"./uploads/20130817/20130817214149197220x220.jpg";s:10:"price_sale";s:5:"89.00";}";}', '已取消', '未付款', '未发货', '0', '', '', 0, '2013-09-08 22:10:49'),
(91, '蜡笔小新', '李炎恢', 'bnbbs@163.com', '江苏盐城大庆中路', '224000', '13748930203', '移动总部斜对面', '顺丰速递', '支付宝', '3572.50', '', '先发有货的', '2013090822134490215', 'a:3:{i:43;s:337:"a:9:{s:2:"id";s:2:"43";s:3:"nav";s:2:"30";s:4:"name";s:57:"韩版宽松修身蕾丝拼接牛仔短裤潮女夏热裤";s:4:"attr";a:1:{s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"20";s:2:"sn";s:8:"ABCD1003";s:6:"weight";s:4:"1.11";s:10:"thumbnail2";s:47:"./uploads/20130817/20130817214149197220x220.jpg";s:10:"price_sale";s:5:"89.00";}";i:29;s:405:"a:9:{s:2:"id";s:2:"29";s:3:"nav";s:2:"29";s:4:"name";s:52:"歌莉娅2013女装透视修身甜美气质蕾丝女";s:4:"attr";a:3:{s:6:"风格";a:1:{i:0;s:6:"欧式";}s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:1:"5";s:2:"sn";s:9:"ABCD10002";s:6:"weight";s:4:"2.33";s:10:"thumbnail2";s:47:"./uploads/20130604/20130604182722819220x220.png";s:10:"price_sale";s:6:"158.45";}";i:25;s:392:"a:9:{s:2:"id";s:2:"25";s:3:"nav";s:2:"49";s:4:"name";s:75:"春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子";s:4:"attr";a:2:{s:6:"颜色";a:1:{i:0;s:6:"白色";}s:6:"尺寸";a:1:{i:0;s:1:"S";}}s:3:"num";s:2:"10";s:2:"sn";s:9:"ABCD10001";s:6:"weight";s:4:"2.22";s:10:"thumbnail2";s:47:"./uploads/20120429/20120429223334777220x220.jpg";s:10:"price_sale";s:5:"75.80";}";}', '已取消', '未付款', '未发货', '0', '', '', 0, '2013-09-08 22:13:44');

-- --------------------------------------------------------

--
-- Table structure for table `mall_price`
--

CREATE TABLE `mall_price` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `price_left` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '//左区间',
  `price_right` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '//右区间'
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_price`
--

INSERT INTO `mall_price` (`id`, `price_left`, `price_right`) VALUES
(1, 1, 5),
(2, 1, 10),
(3, 1, 3),
(4, 2, 4),
(5, 2, 50),
(6, 10, 100),
(7, 1, 2),
(8, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `mall_record`
--

CREATE TABLE `mall_record` (
  `id` mediumint(8) unsigned NOT NULL,
  `goods_id` mediumint(8) unsigned NOT NULL,
  `name` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `attr` varchar(200) NOT NULL,
  `num` smallint(6) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_record`
--

INSERT INTO `mall_record` (`id`, `goods_id`, `name`, `user`, `attr`, `num`, `date`, `price`) VALUES
(6, 25, '春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子', '蜡笔小新', '颜色:白色,尺寸:S;', 1, '2013-07-24 21:29:14', '75.80'),
(5, 29, '歌莉娅2013女装透视修身甜美气质蕾丝女', '蜡笔小新', '风格:欧式,颜色:白色,尺寸:S;', 1, '2013-07-24 21:29:14', '158.45'),
(7, 29, '歌莉娅2013女装透视修身甜美气质蕾丝女', '樱桃小丸子', '风格:欧式,颜色:白色,尺寸:S;', 2, '2013-07-24 21:50:29', '158.45'),
(8, 25, '春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子', '樱桃小丸子', '颜色:白色,尺寸:S;', 2, '2013-07-24 21:50:29', '75.80'),
(9, 29, '歌莉娅2013女装透视修身甜美气质蕾丝女', '樱桃小丸子', '风格:欧式,颜色:白色,尺寸:S;', 2, '2013-09-08 17:49:32', '158.45'),
(10, 25, '春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子', '樱桃小丸子', '颜色:白色,尺寸:S;', 2, '2013-09-08 17:49:32', '75.80'),
(11, 29, '歌莉娅2013女装透视修身甜美气质蕾丝女', '蜡笔小新', '风格:欧式,颜色:白色,尺寸:S;', 1, '2013-09-08 18:22:20', '158.45'),
(12, 25, '春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子', '蜡笔小新', '颜色:白色,尺寸:S;', 1, '2013-09-08 18:22:20', '75.80'),
(13, 29, '歌莉娅2013女装透视修身甜美气质蕾丝女', '蜡笔小新', '风格:欧式,颜色:白色,尺寸:S;', 1, '2013-09-08 18:23:05', '158.45'),
(14, 25, '春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子', '蜡笔小新', '颜色:白色,尺寸:S;', 1, '2013-09-08 18:23:05', '75.80'),
(15, 29, '歌莉娅2013女装透视修身甜美气质蕾丝女', '蜡笔小新', '风格:欧式,颜色:白色,尺寸:S;', 1, '2013-09-08 18:23:35', '158.45'),
(16, 25, '春秋装韩版蕾丝打底长袖修身性感连衣裙品质显瘦女裙子', '蜡笔小新', '颜色:白色,尺寸:S;', 1, '2013-09-08 18:23:35', '75.80');

-- --------------------------------------------------------

--
-- Table structure for table `mall_service`
--

CREATE TABLE `mall_service` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `name` varchar(20) NOT NULL COMMENT '//名称',
  `content` text NOT NULL COMMENT '//售后服务条款',
  `first` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '//默认首选',
  `date` datetime NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_service`
--

INSERT INTO `mall_service` (`id`, `name`, `content`, `first`, `date`) VALUES
(1, '服饰售后', '<p>\r\n  <img alt="" src="./uploads/20130606/20130606233424251.jpg" style="width: 650px; height: 970px;" /></p>\r\n', 1, '2013-06-06 13:50:59'),
(2, '3C产品售后', '<p>\r\n  3C产品售后2</p>\r\n', 0, '2013-06-06 13:56:47'),
(4, '通用售后服务', '<p>\r\n  通用售后服务</p>\r\n', 0, '2013-06-06 14:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `mall_user`
--

CREATE TABLE `mall_user` (
  `id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `user` varchar(20) NOT NULL COMMENT '//会员',
  `pass` char(40) NOT NULL COMMENT '//密码',
  `date` datetime NOT NULL COMMENT '//注册时间'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mall_user`
--

INSERT INTO `mall_user` (`id`, `user`, `pass`, `date`) VALUES
(1, '蜡笔小新', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2012-06-04 20:42:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mall_address`
--
ALTER TABLE `mall_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_attr`
--
ALTER TABLE `mall_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_brand`
--
ALTER TABLE `mall_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_collect`
--
ALTER TABLE `mall_collect`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_commend`
--
ALTER TABLE `mall_commend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_delivery`
--
ALTER TABLE `mall_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_goods`
--
ALTER TABLE `mall_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_level`
--
ALTER TABLE `mall_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_manage`
--
ALTER TABLE `mall_manage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_nav`
--
ALTER TABLE `mall_nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_order`
--
ALTER TABLE `mall_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_price`
--
ALTER TABLE `mall_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_record`
--
ALTER TABLE `mall_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_service`
--
ALTER TABLE `mall_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mall_user`
--
ALTER TABLE `mall_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mall_address`
--
ALTER TABLE `mall_address`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mall_attr`
--
ALTER TABLE `mall_attr`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `mall_brand`
--
ALTER TABLE `mall_brand`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mall_collect`
--
ALTER TABLE `mall_collect`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mall_commend`
--
ALTER TABLE `mall_commend`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `mall_delivery`
--
ALTER TABLE `mall_delivery`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `mall_goods`
--
ALTER TABLE `mall_goods`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `mall_level`
--
ALTER TABLE `mall_level`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `mall_manage`
--
ALTER TABLE `mall_manage`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=294;
--
-- AUTO_INCREMENT for table `mall_nav`
--
ALTER TABLE `mall_nav`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `mall_order`
--
ALTER TABLE `mall_order`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `mall_price`
--
ALTER TABLE `mall_price`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `mall_record`
--
ALTER TABLE `mall_record`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mall_service`
--
ALTER TABLE `mall_service`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `mall_user`
--
ALTER TABLE `mall_user`
  MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=11;