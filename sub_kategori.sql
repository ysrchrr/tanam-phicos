/*
 Navicat Premium Data Transfer

 Source Server         : perpus
 Source Server Type    : MySQL
 Source Server Version : 100417
 Source Host           : localhost:3306
 Source Schema         : tanaman

 Target Server Type    : MySQL
 Target Server Version : 100417
 File Encoding         : 65001

 Date: 04/01/2021 11:35:38
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sub_kategori
-- ----------------------------
DROP TABLE IF EXISTS `sub_kategori`;
CREATE TABLE `sub_kategori`  (
  `id_sub_kategori` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `id_kategori` int NULL DEFAULT NULL,
  PRIMARY KEY (`id_sub_kategori`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10013 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sub_kategori
-- ----------------------------
INSERT INTO `sub_kategori` VALUES (10001, 'Indoor', 1);
INSERT INTO `sub_kategori` VALUES (10002, 'Outdoor', 1);
INSERT INTO `sub_kategori` VALUES (10003, 'Herbal', 1);
INSERT INTO `sub_kategori` VALUES (10004, 'Sukulen & Kaktus', 1);
INSERT INTO `sub_kategori` VALUES (10005, 'Hidroponik', 2);
INSERT INTO `sub_kategori` VALUES (10006, 'Non-Organik', 2);
INSERT INTO `sub_kategori` VALUES (10007, 'Organik', 2);
INSERT INTO `sub_kategori` VALUES (10008, 'Bunga & Tanaman', 2);
INSERT INTO `sub_kategori` VALUES (10009, 'Buah & Sayur', 3);
INSERT INTO `sub_kategori` VALUES (10010, 'Herbal', 3);
INSERT INTO `sub_kategori` VALUES (10011, 'Biji Tunggal', 3);
INSERT INTO `sub_kategori` VALUES (10012, 'Premium', 3);

SET FOREIGN_KEY_CHECKS = 1;
