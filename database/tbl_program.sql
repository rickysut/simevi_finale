/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80029
 Source Host           : localhost:3306
 Source Schema         : simevi

 Target Server Type    : MySQL
 Target Server Version : 80029
 File Encoding         : 65001

 Date: 13/08/2022 14:00:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_program
-- ----------------------------
DROP TABLE IF EXISTS `tbl_program`;
CREATE TABLE `tbl_program` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(10) COLLATE utf8_bin NOT NULL,
  `deskripsi` varchar(500) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_bin;

-- ----------------------------
-- Records of tbl_program
-- ----------------------------
BEGIN;
INSERT INTO `tbl_program` (`id`, `kode`, `deskripsi`) VALUES (1, 'EC', 'Program Nilai Tambah dan Daya Saing Industri');
INSERT INTO `tbl_program` (`id`, `kode`, `deskripsi`) VALUES (2, 'HA', 'Program Ketersediaa Akses dan Konsumsi Pangan Berkualitas');
INSERT INTO `tbl_program` (`id`, `kode`, `deskripsi`) VALUES (3, 'WA', 'Program Dukungan Manajemen');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
