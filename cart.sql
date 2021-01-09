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

 Date: 08/01/2021 13:49:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id_cart` int NOT NULL AUTO_INCREMENT,
  `id_member` int NULL DEFAULT NULL,
  `jumlah` bigint NULL DEFAULT NULL,
  `total` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id_cart`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of cart
-- ----------------------------
BEGIN;
INSERT INTO `cart` VALUES (1, 1, 2, 30000);
COMMIT;

-- ----------------------------
-- Table structure for cart_detail
-- ----------------------------
DROP TABLE IF EXISTS `cart_detail`;
CREATE TABLE `cart_detail`  (
  `id_cd` int NOT NULL AUTO_INCREMENT,
  `id_cart` int NULL DEFAULT NULL,
  `id_barang` int NULL DEFAULT NULL,
  `sub_jumlah` bigint NULL DEFAULT NULL,
  `sub_total` bigint NULL DEFAULT NULL,
  PRIMARY KEY (`id_cd`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of cart_detail
-- ----------------------------
BEGIN;
INSERT INTO `cart_detail` VALUES (0, 1, 6, 1, 15000), (1, 1, 4, 1, 15000);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
