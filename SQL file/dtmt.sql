-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- โฮสต์: localhost
-- เวลาในการสร้าง: 
-- รุ่นของเซิร์ฟเวอร์: 5.0.51
-- รุ่นของ PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- ฐานข้อมูล: `dtmt`
-- 

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `am`
-- 

CREATE TABLE `am` (
  `am_id` int(11) NOT NULL auto_increment,
  `am_user` varchar(250) NOT NULL,
  `am_pass` varchar(250) NOT NULL,
  PRIMARY KEY  (`am_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- dump ตาราง `am`
-- 

INSERT INTO `am` VALUES (1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b');

-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `em`
-- 

CREATE TABLE `em` (
  `em_id` int(10) NOT NULL,
  `em_name` varchar(50) NOT NULL,
  `em_user` varchar(20) NOT NULL,
  `em_pass` varchar(20) NOT NULL,
  `mt_id` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `em`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `mt_config`
-- 

CREATE TABLE `mt_config` (
  `mt_id` int(11) NOT NULL auto_increment,
  `mt_user` varchar(50) NOT NULL,
  `mt_pass` varchar(50) NOT NULL,
  `mt_ip` varchar(50) NOT NULL,
  `port_api` int(11) NOT NULL,
  `port_web` int(11) NOT NULL,
  `date_update` datetime NOT NULL,
  PRIMARY KEY  (`mt_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

-- 
-- dump ตาราง `mt_config`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `mt_gen`
-- 

CREATE TABLE `mt_gen` (
  `user` varchar(11) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `limit_uptime` varchar(50) NOT NULL,
  `profile` varchar(50) NOT NULL,
  `server_pro` varchar(50) NOT NULL,
  `mac_address` varchar(50) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `csv_code` varchar(20) NOT NULL,
  `qrcode` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `mt_id` varchar(100) NOT NULL,
  PRIMARY KEY  (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `mt_gen`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `mt_profile`
-- 

CREATE TABLE `mt_profile` (
  `pro_name` varchar(50) NOT NULL,
  `pro_session` varchar(20) NOT NULL,
  `pro_idle` varchar(20) NOT NULL,
  `pro_keepalive` varchar(20) NOT NULL,
  `pro_autorefresh` varchar(20) NOT NULL,
  `pro_uptime` varchar(20) NOT NULL,
  `pro_users` varchar(5) NOT NULL,
  `pro_limit` varchar(20) NOT NULL,
  `pro_date` datetime NOT NULL,
  PRIMARY KEY  (`pro_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `mt_profile`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `pppoe_gen`
-- 

CREATE TABLE `pppoe_gen` (
  `user` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `profile` varchar(20) NOT NULL,
  `comment` varchar(50) NOT NULL,
  `csv_code` varchar(50) NOT NULL,
  `qrcode` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `mt_id` varchar(11) NOT NULL,
  PRIMARY KEY  (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `pppoe_gen`
-- 


-- --------------------------------------------------------

-- 
-- โครงสร้างตาราง `pppoe_pro`
-- 

CREATE TABLE `pppoe_pro` (
  `pro_name` varchar(20) NOT NULL,
  `pro_local` varchar(50) NOT NULL,
  `pro_remote` varchar(50) NOT NULL,
  `pro_session` varchar(50) NOT NULL,
  `pro_limit` varchar(50) NOT NULL,
  PRIMARY KEY  (`pro_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- dump ตาราง `pppoe_pro`
-- 

