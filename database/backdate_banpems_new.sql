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

 Date: 31/07/2022 21:52:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for backdate_banpems
-- ----------------------------
DROP TABLE IF EXISTS `backdate_banpems`;
CREATE TABLE `backdate_banpems` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `year` int DEFAULT NULL,
  `kd_satker` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provinsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kab_kota` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_gapoktan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nm_barang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `nominal` double(15,2) DEFAULT NULL,
  `kd_giat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kd_akun` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kwn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=271901 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
