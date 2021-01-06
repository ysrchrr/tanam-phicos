/*
 Navicat Premium Data Transfer

 Source Server         : MyConn
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : tanam

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 06/01/2021 14:51:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for blog
-- ----------------------------
DROP TABLE IF EXISTS `blog`;
CREATE TABLE `blog`  (
  `id_blog` int NOT NULL AUTO_INCREMENT,
  `judul_blog` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `terakhir_diperbarui` date NULL DEFAULT NULL,
  `isi_blog` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `gambar_blog` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_blog`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 100006 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of blog
-- ----------------------------
INSERT INTO `blog` VALUES (100001, 'Title', '2021-01-05', 'LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...LONGTEXT ...', NULL);
INSERT INTO `blog` VALUES (100004, 'TEST', '2021-01-06', '<p>Hello World!</p><p>Some initial <strong>bold</strong> text</p><p><br></p>', NULL);
INSERT INTO `blog` VALUES (100005, 'e', '2021-01-05', '<p>Edit!</p><p>Some initial <strong>bold</strong> text</p><p><br></p>', NULL);

SET FOREIGN_KEY_CHECKS = 1;
