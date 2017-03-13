-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016 �?07 �?28 �?00:37
-- 服务器版本: 5.5.40
-- PHP 版本: 5.6.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `eat_platform`
--

-- --------------------------------------------------------

--
-- 表的结构 `courses_types`
--

CREATE TABLE IF NOT EXISTS `courses_types` (
  `phone` varchar(13) NOT NULL COMMENT '店铺账户号',
  `typeid` int(10) NOT NULL AUTO_INCREMENT COMMENT '菜品分类id',
  `typename` varchar(30) NOT NULL COMMENT '菜品分类名称',
  `privilege` varchar(100) NOT NULL,
  PRIMARY KEY (`typeid`,`phone`),
  KEY `fk_phone` (`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='菜品分类' AUTO_INCREMENT=17 ;

--
-- 转存表中的数据 `courses_types`
--

INSERT INTO `courses_types` (`phone`, `typeid`, `typename`, `privilege`) VALUES
('15659675727', 14, '黑暗料理', '{"privilegeA":1,"privilegeB":1,"privilegeB_lower":"90","privilegeB_upper":"40"}'),
('15659675727', 15, '黑11', '{"privilegeA":1,"privilegeB":0}'),
('15659675727', 16, '嘻嘻哈哈', '{"privilegeA":1,"privilegeB":1,"privilegeB_lower":"99","privilegeB_upper":"66"}');

-- --------------------------------------------------------

--
-- 表的结构 `customer_user`
--

CREATE TABLE IF NOT EXISTS `customer_user` (
  `phone` varchar(13) NOT NULL DEFAULT '' COMMENT '手机号',
  `nickname` varchar(20) NOT NULL DEFAULT '' COMMENT '昵称',
  `password` varchar(70) NOT NULL DEFAULT '',
  PRIMARY KEY (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- 转存表中的数据 `customer_user`
--

INSERT INTO `customer_user` (`phone`, `nickname`, `password`) VALUES
('15659675727', '15659675727_927160', '$2y$13$L/ojl7ID54fb/1B5yiNX4OLFY8/M4/1Hsu16vTANL1CIVvHDrKyGK');

-- --------------------------------------------------------

--
-- 表的结构 `dishes`
--

CREATE TABLE IF NOT EXISTS `dishes` (
  `phone` varchar(13) NOT NULL COMMENT '商家账户名',
  `dishes_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '菜品Id',
  `types_id` int(10) NOT NULL COMMENT '菜品分类Id',
  `dishes_name` varchar(20) NOT NULL COMMENT '菜品名',
  `dishes_price` decimal(8,2) NOT NULL COMMENT '菜品价格',
  `dishes_sales` int(10) NOT NULL DEFAULT '0' COMMENT '销量',
  `dishes_photos` varchar(100) NOT NULL DEFAULT '/dishesimg/default.png' COMMENT '菜品图片',
  `dishes_grades` double(4,2) NOT NULL DEFAULT '0.00' COMMENT '评分',
  PRIMARY KEY (`dishes_id`,`phone`),
  KEY `phone` (`phone`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `dishes`
--

INSERT INTO `dishes` (`phone`, `dishes_id`, `types_id`, `dishes_name`, `dishes_price`, `dishes_sales`, `dishes_photos`, `dishes_grades`) VALUES
('15659675727', 3, 0, '椒盐虾', '33.00', 0, '/dishesimg/1b10af2e327b1932161d2c74bafaa96f.jpg', 0.00),
('15659675727', 4, 0, '炒鸡蛋', '35.00', 0, '/dishesimg/7937b24451ffd6686f54fa8083f0230c.jpg', 0.00),
('15659675727', 5, 0, '红烧肉', '99.00', 0, '/dishesimg/9b42dc33c08d218c141bc8c20e879bd5.jpg', 0.00),
('15659675727', 6, 0, '小葱拌豆腐', '30.00', 0, '/dishesimg/5887ec18cf9a627bf8b36d1dadb5a5c5.jpg', 0.00),
('15659675727', 7, 0, '干锅包菜', '20.00', 0, '/dishesimg/5c77c359f859f8824b3e544488135fa1.jpg', 0.00),
('15659675727', 8, 0, '炒鹅蛋', '20.00', 0, '/dishesimg/938a539391410e6cb1578d0ad3b6122f.jpg', 0.00),
('15659675727', 10, 0, '葫芦娃', '20.00', 0, '/dishesimg/15ef595bd623ad6a20c3399000ee1a88.jpg', 0.00);

-- --------------------------------------------------------

--
-- 表的结构 `merchant_user`
--

CREATE TABLE IF NOT EXISTS `merchant_user` (
  `phone` varchar(13) NOT NULL COMMENT '手机号',
  `access_token` varchar(40) NOT NULL COMMENT '商家账号映射',
  `password` varchar(80) NOT NULL COMMENT '密码',
  `auth_key` varchar(50) NOT NULL COMMENT 'auth_key',
  `storeName` varchar(30) NOT NULL COMMENT '店名',
  `nickName` varchar(30) NOT NULL COMMENT '昵称',
  `grade` tinyint(5) NOT NULL COMMENT '星级',
  `avatar` varchar(40) NOT NULL DEFAULT 'uploads/profile_small.jpg' COMMENT '头像',
  PRIMARY KEY (`phone`),
  KEY `phone` (`phone`),
  KEY `phone_2` (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='商家表';

--
-- 转存表中的数据 `merchant_user`
--

INSERT INTO `merchant_user` (`phone`, `access_token`, `password`, `auth_key`, `storeName`, `nickName`, `grade`, `avatar`) VALUES
('15659675726', '3f3cb082ddf5ccced18a5c44b23eac77', '$2y$13$iON8BqlBUAyjFdQC511PWe5GuCTRlU8rV2atO1krve2dK6MY9u/Zm', 'SiQYk4sU4MqJzVsYJrbnz9nfgRwd4QDq', '', '', 5, 'uploads/profile_small.jpg'),
('15659675727', 'a44f8138457ecb9e87daa34bd8501cb5', '$2y$13$4/48dy0WpJLMZQ3cCPtQRejqh2p7Ty8ErukbA6X04mzS.Hzcl6G8S', 'T3bIdRnAG11JnDmUjxJpVoC6I4jBWZlv', '', '', 5, 'uploads/profile_small.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `order`
--

CREATE TABLE IF NOT EXISTS `order` (
  `order_id` int(15) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `table_id` int(5) NOT NULL COMMENT '桌号',
  `merchant_id` varchar(13) NOT NULL COMMENT '商家id',
  `customer_id` varchar(100) NOT NULL COMMENT '用户id',
  `order_time` int(15) NOT NULL COMMENT '订单生成时间',
  `order_dishes` varchar(150) NOT NULL COMMENT '菜品',
  `order_flag` tinyint(2) NOT NULL COMMENT '标志位',
  `original_cost` float(8,2) NOT NULL COMMENT '原价',
  `order_favorable` float(8,2) NOT NULL COMMENT '优惠',
  `present_price` float(8,2) NOT NULL COMMENT '现价',
  PRIMARY KEY (`order_id`,`table_id`,`merchant_id`,`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='订单表' AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `order`
--

INSERT INTO `order` (`order_id`, `table_id`, `merchant_id`, `customer_id`, `order_time`, `order_dishes`, `order_flag`, `original_cost`, `order_favorable`, `present_price`) VALUES
(2, 1, '15659675727', '15659675727', 1463883086, '[{"id":3,"no":4,"name":"神龙"},{"id":4,"no":4,"name":"猪猪侠"},{"id":5,"no":4,"name":"喜羊羊"}]', 3, 1012.00, 0.00, 1012.00),
(3, 1, '15659675727', '15659675727', 1463883092, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 1012.00, 0.00, 1012.00),
(4, 1, '15659675727', '15659675727', 1463883717, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 1012.00, 0.00, 1012.00),
(5, 1, '15659675727', '15659675727', 1463884026, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 3, 1012.00, 0.00, 1012.00),
(6, 1, '15659675727', '15659675727', 1463884036, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 1012.00, 0.00, 1012.00),
(7, 1, '15659675727', '15659675727', 1463926599, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 3, 32252.00, 0.00, 32252.00),
(8, 1, '15659675727', '15659675727', 1463926604, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 3, 32252.00, 0.00, 32252.00),
(9, 1, '15659675727', '15659675727', 1463926623, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 3, 32252.00, 0.00, 32252.00),
(10, 1, '15659675727', '15659675727', 1463926996, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 3, 32252.00, 0.00, 32252.00),
(11, 1, '15659675727', '15659675727', 1463926998, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(12, 1, '15659675727', '15659675727', 1463926999, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 3, 32252.00, 0.00, 32252.00),
(16, 1, '15659675727', '15659675727', 1463927101, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 3, 32252.00, 0.00, 32252.00),
(23, 1, '15659675727', '15659675727', 1463927112, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00);

-- --------------------------------------------------------

--
-- 表的结构 `temp_order`
--

CREATE TABLE IF NOT EXISTS `temp_order` (
  `order_id` int(15) NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `table_id` int(5) NOT NULL COMMENT '桌号',
  `merchant_id` varchar(13) NOT NULL COMMENT '商家id',
  `customer_id` varchar(100) NOT NULL COMMENT '用户id',
  `order_time` int(15) NOT NULL COMMENT '订单生成时间',
  `order_dishes` varchar(150) NOT NULL COMMENT '菜品',
  `order_flag` tinyint(2) NOT NULL COMMENT '标志位',
  `original_cost` float(8,2) NOT NULL COMMENT '原价',
  `order_favorable` float(8,2) NOT NULL COMMENT '优惠',
  `present_price` float(8,2) NOT NULL COMMENT '现价',
  PRIMARY KEY (`order_id`,`table_id`,`merchant_id`,`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='临时订单表' AUTO_INCREMENT=57 ;

--
-- 转存表中的数据 `temp_order`
--

INSERT INTO `temp_order` (`order_id`, `table_id`, `merchant_id`, `customer_id`, `order_time`, `order_dishes`, `order_flag`, `original_cost`, `order_favorable`, `present_price`) VALUES
(13, 1, '15659675727', '15659675727', 1463927012, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(14, 1, '15659675727', '15659675727', 1463927097, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(15, 1, '15659675727', '15659675727', 1463927099, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(17, 1, '15659675727', '15659675727', 1463927103, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(18, 1, '15659675727', '15659675727', 1463927104, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(19, 1, '15659675727', '15659675727', 1463927106, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(20, 1, '15659675727', '15659675727', 1463927107, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(21, 1, '15659675727', '15659675727', 1463927109, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(22, 1, '15659675727', '15659675727', 1463927110, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(24, 1, '15659675727', '15659675727', 1463932350, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(25, 1, '15659675727', '15659675727', 1463932353, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(26, 1, '15659675727', '15659675727', 1463932355, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(27, 1, '15659675727', '15659675727', 1463932357, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(28, 1, '15659675727', '15659675727', 1463932364, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(29, 1, '15659675727', '15659675727', 1463966166, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(30, 1, '15659675727', '15659675727', 1463966169, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(31, 1, '15659675727', '15659675727', 1463966170, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(32, 1, '15659675727', '15659675727', 1463966264, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(33, 1, '15659675727', '15659675727', 1463967038, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(34, 1, '15659675727', '15659675727', 1463967039, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(35, 1, '15659675727', '15659675727', 1463978123, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(36, 1, '15659675727', '15659675727', 1463978136, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(37, 1, '15659675727', '15659675727', 1463978722, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(38, 1, '15659675727', '15659675727', 1463978748, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(39, 1, '15659675727', '15659675727', 1463978841, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(40, 1, '15659675727', '15659675727', 1463979874, '[{"id":3,"no":4,"name":"666"},{"id":4,"no":4,"name":"669"},{"id":5,"no":4,"name":"666"}]', 4, 32252.00, 0.00, 32252.00),
(41, 1, '15659675727', '15659675727', 1463979923, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 4, 32252.00, 0.00, 32252.00),
(42, 1, '15659675727', '15659675727', 1463980012, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 4, 32252.00, 0.00, 32252.00),
(43, 1, '15659675727', '15659675727', 1463982083, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 4, 32252.00, 0.00, 32252.00),
(44, 1, '15659675727', '15659675727', 1463982400, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 4, 32252.00, 0.00, 32252.00),
(45, 1, '15659675727', '15659675727', 1463982457, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 4, 32252.00, 0.00, 32252.00),
(46, 1, '15659675727', '15659675727', 1463982736, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 2, 32252.00, 0.00, 32252.00),
(47, 1, '15659675727', '15659675727', 1463982746, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 2, 32252.00, 0.00, 32252.00),
(48, 1, '15659675727', '15659675727', 1463982756, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 2, 32252.00, 0.00, 32252.00),
(49, 1, '15659675727', '15659675727', 1463982757, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 2, 32252.00, 0.00, 32252.00),
(50, 1, '15659675727', '15659675727', 1463982790, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 2, 32252.00, 0.00, 32252.00),
(51, 1, '15659675727', '15659675727', 1463982800, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 2, 32252.00, 0.00, 32252.00),
(52, 1, '15659675727', '15659675727', 1463982836, '[{"id":3,"no":4,"name":"\\u559c\\u7f8a\\u7f8a"},{"id":4,"no":4,"name":"\\u7070\\u592a\\u72fc"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 2, 32252.00, 0.00, 32252.00),
(53, 1, '15659675727', '15659675727', 1464048653, '[{"id":3,"no":4,"name":"\\u6912\\u76d0\\u867e"},{"id":4,"no":4,"name":"\\u7092\\u9e21\\u86cb"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 2, 668.00, 0.00, 668.00),
(54, 1, '15659675727', '15659675727', 1464048688, '[{"id":3,"no":4,"name":"\\u6912\\u76d0\\u867e"},{"id":4,"no":4,"name":"\\u7092\\u9e21\\u86cb"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 2, 668.00, 0.00, 668.00),
(55, 1, '15659675727', '18959386000', 1464050512, '[{"id":3,"no":4,"name":"\\u6912\\u76d0\\u867e"},{"id":4,"no":4,"name":"\\u7092\\u9e21\\u86cb"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 2, 668.00, 0.00, 668.00),
(56, 1, '15659675727', '15659675727', 1467822786, '[{"id":3,"no":4,"name":"\\u6912\\u76d0\\u867e"},{"id":4,"no":4,"name":"\\u7092\\u9e21\\u86cb"},{"id":5,"no":4,"name":"\\u7ea2\\u70e7\\u8089"}]', 1, 668.00, 0.00, 668.00);

--
-- 限制导出的表
--

--
-- 限制表 `courses_types`
--
ALTER TABLE `courses_types`
  ADD CONSTRAINT `fk_phone` FOREIGN KEY (`phone`) REFERENCES `merchant_user` (`phone`);

--
-- 限制表 `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_ibfk_1` FOREIGN KEY (`phone`) REFERENCES `merchant_user` (`phone`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
