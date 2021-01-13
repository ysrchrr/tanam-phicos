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

 Date: 13/01/2021 10:33:16
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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of cart
-- ----------------------------
BEGIN;
INSERT INTO `cart` VALUES (3, 3, 2, 670000), (5, 1, 8, 3365000);
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
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of cart_detail
-- ----------------------------
BEGIN;
INSERT INTO `cart_detail` VALUES (5, 3, 1, 1, 450000), (6, 3, 14, 1, 220000), (9, 5, 1, 5, 2250000), (10, 5, 2, 2, 460000), (11, 5, 8, 1, 655000);
COMMIT;

-- ----------------------------
-- Table structure for pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE `pemesanan`  (
  `id_pemesanan` int NOT NULL AUTO_INCREMENT,
  `id_member` int NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `total` float NULL DEFAULT NULL,
  `tgl_pesan` datetime(0) NULL DEFAULT NULL,
  `status_pemesanan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bukti_transfer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id_pemesanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of pemesanan
-- ----------------------------
BEGIN;
INSERT INTO `pemesanan` VALUES (1, 1, 2, 10300000, '2021-01-05 16:08:21', 'Pesanan Selesai', NULL, '381236199', NULL, NULL, NULL), (2, 1, 1, 200000, '2021-01-06 10:07:18', 'Pesanan Diproses', NULL, '723462784268', NULL, NULL, NULL), (3, 1, 20, 500000, '2021-01-07 09:41:11', 'Pesanan Diproses', NULL, '7128361876', NULL, NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for pemesanan_detail
-- ----------------------------
DROP TABLE IF EXISTS `pemesanan_detail`;
CREATE TABLE `pemesanan_detail`  (
  `id_pd` int NOT NULL AUTO_INCREMENT,
  `id_pemesanan` int NULL DEFAULT NULL,
  `id_barang` int NULL DEFAULT NULL,
  `jumlah_barang` int NULL DEFAULT NULL,
  `harga` int NULL DEFAULT NULL,
  `total` float NULL DEFAULT NULL,
  PRIMARY KEY (`id_pd`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci;

-- ----------------------------
-- Records of pemesanan_detail
-- ----------------------------
BEGIN;
INSERT INTO `pemesanan_detail` VALUES (1, 1, 2, 3, 230000, 230000), (2, 1, 3, 2, 170000, 170000), (3, 2, 16, 1, 200000, 200000), (4, 3, 22, 10, 25000, 250000), (5, 3, 23, 10, 25000, 250000);
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
