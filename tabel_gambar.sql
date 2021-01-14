/*
 Navicat Premium Data Transfer

 Source Server         : phpMyAdmin
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : tanaman

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 14/01/2021 09:28:12
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for gambar
-- ----------------------------
DROP TABLE IF EXISTS `gambar`;
CREATE TABLE `gambar`  (
  `id_barang` int NOT NULL,
  `link_gambar` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci;

-- ----------------------------
-- Records of gambar
-- ----------------------------
BEGIN;
INSERT INTO `gambar` VALUES (1, 'Aglaonema_white_01-250x300.png'), (2, 'Chili_Padi_01-250x300.png'), (3, 'bougainvillea-250x300.png'), (4, 'Aloe_Star_cactus-250x300.jpg'), (5, 'Adenium-250x300.png'), (6, 'bunny_ear_001-250x300.png'), (7, 'Aloe_vera_Small-250x300.png'), (8, 'asystasia-250x300.png'), (9, 'Asplenium-nidus-TGS-250x300.png'), (10, 'Crotalaria_retusa_Yellow-250x300.jpg'), (11, 'Crassula_jade_01-250x300.jpg'), (12, 'Tolasi-250x300.png'), (13, 'blue_pea-250x300.png'), (14, 'Aglaonema_Super_Red-250x300.png'), (15, 'lycopodioides_001-250x300.png'), (16, '12-460x460.png'), (17, 'Sunflower-460x460.png'), (18, 'PowerFeed-for-Tomatoes-Vegetables-TGS-NEW-460x460.png'), (19, 'npk-16-460x460.png'), (20, 'Coleus_Rainbow_Mix-460x460.png'), (21, 'Holy Basil-460x460.png'), (22, 'Petunia-460x460.png'), (23, 'Asparagus-460x460.png'), (24, 'lavender_seed-460x460.png'), (25, 'Coriander-460x460.png'), (26, 'Broccoli_SingleCell-460x460.png'), (27, 'Pumpkin_SingleCell-460x460.png'), (28, 'Red_Radish-460x460.png');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
