/*
Navicat MySQL Data Transfer

Source Server         : Database-Lokal
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : e-voting

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2023-04-05 09:26:23
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `r_bidang`
-- ----------------------------
DROP TABLE IF EXISTS `r_bidang`;
CREATE TABLE `r_bidang` (
  `ID_BIDANG` int(3) NOT NULL AUTO_INCREMENT,
  `NM_BIDANG` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_BIDANG`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of r_bidang
-- ----------------------------
INSERT INTO `r_bidang` VALUES ('1', 'Waka. Kurikulum');
INSERT INTO `r_bidang` VALUES ('2', 'Waka. Sarpras');
INSERT INTO `r_bidang` VALUES ('3', 'Waka. Kesiswaan');
INSERT INTO `r_bidang` VALUES ('4', 'Waka. Humas');
INSERT INTO `r_bidang` VALUES ('5', 'Waka. Ismuba');

-- ----------------------------
-- Table structure for `t_admin`
-- ----------------------------
DROP TABLE IF EXISTS `t_admin`;
CREATE TABLE `t_admin` (
  `ID_ADMIN` int(2) NOT NULL AUTO_INCREMENT,
  `NM_ADMIN` varchar(32) NOT NULL,
  `USERNAME` varchar(64) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `FOTO` varchar(32) DEFAULT '',
  `CREATED_AT` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_ADMIN`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- ----------------------------
-- Records of t_admin
-- ----------------------------
INSERT INTO `t_admin` VALUES ('1', 'Administrator', 'admin.voting', '21232f297a57a5a743894a0e4a801fc3', '', '2023-04-03 11:38:41');

-- ----------------------------
-- Table structure for `t_calon`
-- ----------------------------
DROP TABLE IF EXISTS `t_calon`;
CREATE TABLE `t_calon` (
  `ID_CALON` int(25) NOT NULL AUTO_INCREMENT,
  `NM_CALON` varchar(100) NOT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_CALON`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;



-- ----------------------------
-- Table structure for `t_pemilih`
-- ----------------------------
DROP TABLE IF EXISTS `t_pemilih`;
CREATE TABLE `t_pemilih` (
  `ID_PEMILIH` int(3) NOT NULL AUTO_INCREMENT,
  `NM_PEMILIH` varchar(50) NOT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_PEMILIH`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;



-- ----------------------------
-- Table structure for `t_seting`
-- ----------------------------
DROP TABLE IF EXISTS `t_seting`;
CREATE TABLE `t_seting` (
  `ID_SETING` int(1) NOT NULL,
  `NM_VOTING` varchar(255) DEFAULT NULL,
  `TGL_MULAI` date DEFAULT NULL,
  `TGL_SELESAI` date DEFAULT NULL,
  `KETERANGAN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_SETING`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_seting
-- ----------------------------

-- ----------------------------
-- Table structure for `t_voting`
-- ----------------------------
DROP TABLE IF EXISTS `t_voting`;
CREATE TABLE `t_voting` (
  `ID_VOTING` int(3) NOT NULL AUTO_INCREMENT,
  `ID_PEMILIH` int(3) NOT NULL,
  `ID_CALON` varchar(25) NOT NULL,
  `ID_BIDANG` int(3) NOT NULL,
  `PERINGKAT` int(1) NOT NULL,
  `POIN` int(1) NOT NULL,
  `TGL_PROSES` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`ID_VOTING`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;


-- ----------------------------
-- View structure for `v_jumlah_suara`
-- ----------------------------
DROP VIEW IF EXISTS `v_jumlah_suara`;
CREATE VIEW `v_jumlah_suara` AS select `t_voting`.`ID_CALON` AS `ID_CALON`,`t_calon`.`NM_CALON` AS `NM_CALON`,`t_calon`.`FOTO` AS `FOTO`,count(`t_voting`.`ID_VOTING`) AS `JUMLAH_SUARA`,sum(`t_voting`.`POIN`) AS `JUMLAH_POIN` from (`t_voting` left join `t_calon` on(`t_voting`.`ID_CALON` = `t_calon`.`ID_CALON`)) group by `t_voting`.`ID_CALON` order by sum(`t_voting`.`POIN`) desc ;
