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

 Date: 09/01/2021 12:38:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pemesanan
-- ----------------------------
DROP TABLE IF EXISTS `pemesanan`;
CREATE TABLE `pemesanan`  (
  `id_pemesanan` int NOT NULL AUTO_INCREMENT,
  `id_member` int NULL DEFAULT NULL,
  `jumlah` int NULL DEFAULT NULL,
  `total` float NULL DEFAULT NULL,
  `tgl_pesan` date NULL DEFAULT NULL,
  `status_pemesanan` enum('Belum dibayar','Sudah dibayar','Packing','Dikirim','Selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bukti_transfer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `resi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_pemesanan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 122 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of pemesanan
-- ----------------------------
INSERT INTO `pemesanan` VALUES (1, 1, 8, 274716000, '2019-10-20', 'Selesai', 'http://lorempixel.com/640/480/', '4024007195835', '2010-11-11 17:08:09', '1987-02-04 22:28:36');
INSERT INTO `pemesanan` VALUES (2, 9, 8, 8901230, '1995-01-13', 'Selesai', 'http://lorempixel.com/640/480/', '5443920083111881', '1995-08-20 13:58:26', '1978-05-03 19:33:47');
INSERT INTO `pemesanan` VALUES (3, 7, 8, 14133, '1991-10-21', 'Dikirim', 'http://lorempixel.com/640/480/', '4929356345288', '2020-04-16 02:15:47', '2007-03-23 08:47:07');
INSERT INTO `pemesanan` VALUES (4, 7, 8, 9105490, '1989-02-13', 'Selesai', 'http://lorempixel.com/640/480/', '5492345970900142', '1992-01-16 00:55:18', '2020-02-21 18:02:46');
INSERT INTO `pemesanan` VALUES (5, 9, 3, 606696, '1999-11-20', 'Packing', 'http://lorempixel.com/640/480/', '5498466014940458', '2010-08-07 19:35:53', '1988-01-09 09:37:41');
INSERT INTO `pemesanan` VALUES (6, 3, 7, 930990, '1991-08-10', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5581744248020256', '1991-08-05 11:46:07', '1997-10-19 17:36:21');
INSERT INTO `pemesanan` VALUES (7, 2, 4, 1, '1986-09-13', 'Selesai', 'http://lorempixel.com/640/480/', '4716425739907109', '1984-01-11 19:54:03', '1986-09-04 14:03:20');
INSERT INTO `pemesanan` VALUES (8, 9, 6, 0, '1983-02-14', 'Selesai', 'http://lorempixel.com/640/480/', '372916665606687', '1995-10-15 08:23:15', '2002-08-11 03:42:45');
INSERT INTO `pemesanan` VALUES (9, 5, 9, 93879000, '2019-10-20', 'Belum dibayar', 'http://lorempixel.com/640/480/', '4485397981024', '2014-10-31 15:48:15', '1987-08-09 09:02:20');
INSERT INTO `pemesanan` VALUES (10, 4, 3, 4984, '2014-12-29', 'Selesai', 'http://lorempixel.com/640/480/', '5513370964797431', '2014-07-22 00:53:13', '1977-10-21 15:16:59');
INSERT INTO `pemesanan` VALUES (11, 5, 6, 8226, '2010-11-30', 'Selesai', 'http://lorempixel.com/640/480/', '376724986340998', '1978-06-02 14:13:39', '2021-01-06 13:25:31');
INSERT INTO `pemesanan` VALUES (12, 5, 1, 119794000, '2009-06-18', 'Belum dibayar', 'http://lorempixel.com/640/480/', '4485907706780', '1977-02-18 10:24:24', '2018-08-31 10:13:59');
INSERT INTO `pemesanan` VALUES (13, 6, 3, 313669, '1983-09-06', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '5590197136162352', '1980-11-20 23:06:35', '2019-04-01 20:56:23');
INSERT INTO `pemesanan` VALUES (14, 3, 9, 933690000, '2017-02-04', 'Dikirim', 'http://lorempixel.com/640/480/', '5211607873644924', '2014-10-08 07:08:49', '1976-01-19 20:12:52');
INSERT INTO `pemesanan` VALUES (15, 4, 8, 7637, '2011-01-15', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '340297624315697', '1976-07-23 17:16:42', '1982-04-16 05:45:51');
INSERT INTO `pemesanan` VALUES (16, 2, 3, 839, '2000-05-01', 'Dikirim', 'http://lorempixel.com/640/480/', '5546879370230334', '1984-11-28 21:10:56', '1979-07-19 01:27:22');
INSERT INTO `pemesanan` VALUES (17, 6, 2, 129253000, '1994-03-31', 'Selesai', 'http://lorempixel.com/640/480/', '4024007195374', '1994-05-13 22:53:14', '1987-07-19 20:37:43');
INSERT INTO `pemesanan` VALUES (18, 9, 2, 0, '2002-06-27', 'Selesai', 'http://lorempixel.com/640/480/', '5172988202232715', '1988-12-09 01:47:50', '1994-10-10 12:49:37');
INSERT INTO `pemesanan` VALUES (19, 1, 6, 2544000, '1989-05-17', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '4929973135017011', '2004-01-18 17:08:23', '2007-11-12 00:21:12');
INSERT INTO `pemesanan` VALUES (20, 9, 4, 934679, '1975-11-09', 'Dikirim', 'http://lorempixel.com/640/480/', '4485892440087', '1972-08-20 09:52:24', '2016-12-08 02:27:22');
INSERT INTO `pemesanan` VALUES (21, 3, 1, 884, '2003-05-26', 'Dikirim', 'http://lorempixel.com/640/480/', '4916097238781', '1974-08-29 20:20:08', '2017-03-08 07:39:04');
INSERT INTO `pemesanan` VALUES (22, 5, 5, 637026000, '2017-09-04', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '4916902036419973', '2020-11-16 23:19:27', '1985-04-03 17:52:35');
INSERT INTO `pemesanan` VALUES (23, 7, 8, 0, '1979-03-18', 'Packing', 'http://lorempixel.com/640/480/', '4024007138438', '1988-07-22 19:26:46', '1993-07-28 03:02:37');
INSERT INTO `pemesanan` VALUES (24, 3, 1, 660610000, '1989-05-23', 'Dikirim', 'http://lorempixel.com/640/480/', '4532958559909', '2019-12-01 06:10:42', '1987-09-26 18:22:04');
INSERT INTO `pemesanan` VALUES (25, 9, 7, 44998, '1998-09-01', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '4024007113815706', '2006-06-01 06:07:41', '2002-03-19 02:04:40');
INSERT INTO `pemesanan` VALUES (26, 5, 6, 8853830, '1994-09-19', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5398388873669351', '2000-05-13 13:30:31', '2007-02-08 21:44:46');
INSERT INTO `pemesanan` VALUES (27, 3, 2, 0, '2016-03-10', 'Packing', 'http://lorempixel.com/640/480/', '5239981418762479', '2012-06-17 02:01:47', '2008-12-15 07:56:27');
INSERT INTO `pemesanan` VALUES (28, 2, 9, 172, '1988-10-01', 'Selesai', 'http://lorempixel.com/640/480/', '5339252648773889', '1994-02-22 04:36:53', '1989-12-17 15:28:26');
INSERT INTO `pemesanan` VALUES (29, 2, 3, 9508, '2018-06-06', 'Packing', 'http://lorempixel.com/640/480/', '4716809902602252', '1973-03-16 03:50:03', '1986-10-18 13:51:35');
INSERT INTO `pemesanan` VALUES (30, 8, 1, 330, '1989-05-10', 'Selesai', 'http://lorempixel.com/640/480/', '5127897149067148', '2013-12-14 11:15:54', '2016-12-23 15:32:51');
INSERT INTO `pemesanan` VALUES (31, 1, 9, 473831, '1974-03-19', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '342733143128324', '1986-12-15 03:37:05', '1981-03-30 09:07:53');
INSERT INTO `pemesanan` VALUES (32, 7, 2, 432981, '1987-06-07', 'Dikirim', 'http://lorempixel.com/640/480/', '5490278216227060', '1973-10-19 08:57:38', '1999-07-26 02:25:39');
INSERT INTO `pemesanan` VALUES (33, 1, 7, 0, '1980-01-21', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '4556189743949117', '2004-12-30 23:30:04', '1978-03-03 20:14:58');
INSERT INTO `pemesanan` VALUES (34, 1, 4, 0, '1981-11-30', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '4716400423183', '1990-11-13 18:43:46', '2010-09-17 05:49:47');
INSERT INTO `pemesanan` VALUES (35, 4, 1, 74683, '2006-11-28', 'Selesai', 'http://lorempixel.com/640/480/', '4929007453841', '2005-12-28 14:42:02', '1999-03-22 05:14:24');
INSERT INTO `pemesanan` VALUES (36, 8, 2, 508, '2014-06-22', 'Dikirim', 'http://lorempixel.com/640/480/', '4916984578446284', '2015-03-19 06:38:32', '1976-12-20 23:58:47');
INSERT INTO `pemesanan` VALUES (37, 1, 7, 4358, '2000-03-01', 'Packing', 'http://lorempixel.com/640/480/', '5550414040688700', '1974-05-20 17:31:21', '2012-02-25 15:18:07');
INSERT INTO `pemesanan` VALUES (38, 3, 3, 9, '1993-09-06', 'Selesai', 'http://lorempixel.com/640/480/', '374026699120575', '1980-06-28 05:06:08', '1975-05-30 02:07:31');
INSERT INTO `pemesanan` VALUES (39, 2, 8, 1903, '1973-10-22', 'Dikirim', 'http://lorempixel.com/640/480/', '345863900972620', '2002-08-15 23:57:06', '1983-06-27 04:33:23');
INSERT INTO `pemesanan` VALUES (40, 9, 2, 13863000, '1970-02-17', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '5490296567987932', '1991-11-16 00:52:12', '2016-01-11 08:19:56');
INSERT INTO `pemesanan` VALUES (41, 9, 8, 0, '1977-06-22', 'Selesai', 'http://lorempixel.com/640/480/', '5340594774044703', '1996-02-02 12:28:59', '1988-11-15 02:42:23');
INSERT INTO `pemesanan` VALUES (42, 4, 6, 364090, '2004-04-12', 'Packing', 'http://lorempixel.com/640/480/', '5492489594187660', '2004-12-24 23:39:18', '1975-05-20 08:56:18');
INSERT INTO `pemesanan` VALUES (43, 4, 3, 654, '1979-10-18', 'Belum dibayar', 'http://lorempixel.com/640/480/', '4532056311776', '1985-03-09 04:25:01', '2003-08-19 22:45:20');
INSERT INTO `pemesanan` VALUES (44, 8, 7, 327233000, '2020-05-27', 'Dikirim', 'http://lorempixel.com/640/480/', '5281258216469390', '1975-06-12 15:08:43', '2018-02-23 02:13:44');
INSERT INTO `pemesanan` VALUES (45, 3, 9, 37131600, '1972-07-01', 'Packing', 'http://lorempixel.com/640/480/', '4532839296500', '1977-12-31 07:13:46', '2014-05-20 19:56:57');
INSERT INTO `pemesanan` VALUES (46, 4, 6, 4460850, '2009-09-09', 'Dikirim', 'http://lorempixel.com/640/480/', '5178276285276119', '2003-06-27 04:45:00', '2007-09-06 16:30:56');
INSERT INTO `pemesanan` VALUES (47, 9, 3, 652992, '1981-05-12', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '4532574085599542', '1982-01-24 10:17:42', '1998-04-03 08:44:35');
INSERT INTO `pemesanan` VALUES (48, 4, 6, 939892000, '1977-02-14', 'Dikirim', 'http://lorempixel.com/640/480/', '5477442023979317', '2003-03-23 08:20:27', '1992-08-23 05:05:46');
INSERT INTO `pemesanan` VALUES (49, 5, 4, 13666, '1994-04-18', 'Selesai', 'http://lorempixel.com/640/480/', '5482536734490990', '2016-05-23 08:17:55', '1988-08-08 16:33:28');
INSERT INTO `pemesanan` VALUES (50, 6, 5, 0, '1987-05-10', 'Selesai', 'http://lorempixel.com/640/480/', '5590269939999254', '2011-11-25 03:59:38', '1970-02-26 19:09:38');
INSERT INTO `pemesanan` VALUES (51, 9, 8, 7, '1974-06-25', 'Dikirim', 'http://lorempixel.com/640/480/', '341367555717975', '2016-03-26 01:02:30', '1982-08-30 06:44:57');
INSERT INTO `pemesanan` VALUES (52, 9, 3, 238194, '2017-02-20', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '5486847629709832', '1984-02-19 00:34:06', '1980-07-19 15:49:38');
INSERT INTO `pemesanan` VALUES (53, 9, 1, 7, '1990-12-07', 'Packing', 'http://lorempixel.com/640/480/', '5310304209732125', '1985-07-15 07:36:02', '2012-10-21 05:00:45');
INSERT INTO `pemesanan` VALUES (54, 7, 5, 5, '1973-09-05', 'Selesai', 'http://lorempixel.com/640/480/', '4532327504553', '1977-09-07 18:51:40', '1987-03-07 10:53:08');
INSERT INTO `pemesanan` VALUES (55, 3, 3, 94260900, '1999-05-27', 'Belum dibayar', 'http://lorempixel.com/640/480/', '4485364936670696', '1992-12-17 07:19:45', '1976-12-25 06:06:39');
INSERT INTO `pemesanan` VALUES (56, 5, 8, 16311400, '2007-12-27', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5281362891814091', '1973-12-24 14:13:18', '2006-01-01 20:54:52');
INSERT INTO `pemesanan` VALUES (57, 7, 9, 45130, '1986-10-17', 'Packing', 'http://lorempixel.com/640/480/', '4929081673140457', '2013-05-24 20:19:33', '1995-12-25 02:45:15');
INSERT INTO `pemesanan` VALUES (58, 2, 1, 351872, '2011-08-22', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5415261891587587', '1976-10-25 09:06:27', '2019-05-26 18:33:01');
INSERT INTO `pemesanan` VALUES (59, 6, 6, 7542, '2004-07-26', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5588377498438769', '1977-12-07 04:12:01', '2002-05-07 20:18:39');
INSERT INTO `pemesanan` VALUES (60, 9, 7, 0, '1984-03-14', 'Belum dibayar', 'http://lorempixel.com/640/480/', '4532044742553', '1983-05-05 22:34:25', '2015-10-10 10:23:41');
INSERT INTO `pemesanan` VALUES (61, 8, 9, 7230690, '1982-10-17', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5318616279555265', '1995-04-16 22:46:29', '1993-08-28 05:12:45');
INSERT INTO `pemesanan` VALUES (62, 5, 3, 390, '1982-08-18', 'Packing', 'http://lorempixel.com/640/480/', '4539428996981260', '1991-06-18 13:10:52', '1974-05-20 07:07:07');
INSERT INTO `pemesanan` VALUES (63, 4, 8, 0, '2016-07-28', 'Dikirim', 'http://lorempixel.com/640/480/', '6011917001226278', '1990-07-07 05:23:37', '2014-03-25 22:12:33');
INSERT INTO `pemesanan` VALUES (64, 6, 2, 0, '1999-12-30', 'Dikirim', 'http://lorempixel.com/640/480/', '5263073297801650', '1970-10-19 14:00:56', '1995-03-08 20:58:52');
INSERT INTO `pemesanan` VALUES (65, 6, 5, 0, '2006-03-10', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '5289164932463991', '2006-08-14 14:14:24', '2003-03-26 03:13:12');
INSERT INTO `pemesanan` VALUES (66, 7, 1, 1038290, '2015-05-30', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '5193879846732305', '1983-01-14 13:53:33', '1972-02-16 21:46:50');
INSERT INTO `pemesanan` VALUES (67, 1, 5, 981856000, '1988-09-19', 'Dikirim', 'http://lorempixel.com/640/480/', '371844996396813', '1994-01-21 22:32:44', '2016-07-20 21:45:42');
INSERT INTO `pemesanan` VALUES (68, 7, 3, 9, '2009-12-04', 'Packing', 'http://lorempixel.com/640/480/', '4556302061239', '1983-03-31 04:22:09', '2019-03-10 14:57:17');
INSERT INTO `pemesanan` VALUES (69, 5, 6, 8, '2010-01-09', 'Selesai', 'http://lorempixel.com/640/480/', '5148803753903275', '1972-02-10 09:03:09', '1999-09-15 16:53:28');
INSERT INTO `pemesanan` VALUES (70, 5, 5, 2, '1975-07-08', 'Dikirim', 'http://lorempixel.com/640/480/', '5147757602073602', '2020-11-04 23:57:45', '2009-01-12 13:06:10');
INSERT INTO `pemesanan` VALUES (71, 2, 8, 0, '1976-05-04', 'Packing', 'http://lorempixel.com/640/480/', '6011804497600044', '1988-12-21 21:50:10', '2010-10-13 16:53:55');
INSERT INTO `pemesanan` VALUES (72, 8, 1, 467883, '1989-07-10', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '5492383403057870', '2000-11-18 03:11:44', '2020-10-16 20:30:02');
INSERT INTO `pemesanan` VALUES (73, 8, 3, 1796, '1990-12-10', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '4916862648004872', '1975-10-15 11:47:15', '1985-08-05 02:57:50');
INSERT INTO `pemesanan` VALUES (74, 7, 7, 0, '2015-09-21', 'Belum dibayar', 'http://lorempixel.com/640/480/', '4716344043985', '2009-06-20 04:59:22', '2002-06-11 13:01:48');
INSERT INTO `pemesanan` VALUES (75, 9, 2, 152, '1979-10-26', 'Belum dibayar', 'http://lorempixel.com/640/480/', '341362399635484', '2010-07-27 13:51:33', '1970-06-24 23:27:19');
INSERT INTO `pemesanan` VALUES (76, 2, 7, 1, '1992-04-02', 'Packing', 'http://lorempixel.com/640/480/', '5218809003247169', '1992-02-16 16:58:39', '2020-05-16 17:18:47');
INSERT INTO `pemesanan` VALUES (77, 1, 2, 84038600, '2016-09-19', 'Packing', 'http://lorempixel.com/640/480/', '5247405663980232', '2018-02-11 15:46:25', '1989-11-10 11:43:04');
INSERT INTO `pemesanan` VALUES (78, 5, 5, 4, '1995-11-28', 'Dikirim', 'http://lorempixel.com/640/480/', '5175278391716776', '1984-09-17 19:45:44', '1997-03-31 23:18:38');
INSERT INTO `pemesanan` VALUES (79, 7, 8, 0, '2008-10-16', 'Dikirim', 'http://lorempixel.com/640/480/', '4485170934633037', '2010-04-14 01:02:57', '2005-08-11 06:34:37');
INSERT INTO `pemesanan` VALUES (80, 9, 5, 70998500, '2010-02-01', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5186308974375637', '2020-12-07 04:02:54', '1991-09-26 12:36:11');
INSERT INTO `pemesanan` VALUES (81, 1, 7, 0, '1989-05-08', 'Belum dibayar', 'http://lorempixel.com/640/480/', '371305930586736', '1980-07-15 09:49:38', '1993-09-09 15:57:11');
INSERT INTO `pemesanan` VALUES (82, 5, 2, 917, '1983-06-20', 'Selesai', 'http://lorempixel.com/640/480/', '6011537953777791', '2006-11-05 06:31:36', '1989-04-27 06:00:54');
INSERT INTO `pemesanan` VALUES (83, 7, 3, 85, '2001-07-07', 'Dikirim', 'http://lorempixel.com/640/480/', '5477857982272395', '2010-12-19 06:01:55', '1979-12-12 13:25:43');
INSERT INTO `pemesanan` VALUES (84, 9, 7, 0, '2006-11-28', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5207816333337007', '2006-12-05 05:29:45', '2018-12-09 07:59:47');
INSERT INTO `pemesanan` VALUES (85, 7, 2, 79239, '1976-12-19', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '5121762776215300', '1982-02-10 12:30:47', '1970-06-30 10:32:49');
INSERT INTO `pemesanan` VALUES (86, 1, 7, 2995, '1986-06-24', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '5438551928889438', '1994-10-04 10:48:36', '1971-07-28 07:23:26');
INSERT INTO `pemesanan` VALUES (87, 2, 9, 86679600, '1992-03-28', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5577861414819231', '1996-07-30 14:26:23', '1976-06-24 23:38:31');
INSERT INTO `pemesanan` VALUES (88, 1, 8, 130407000, '2004-06-25', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5250504753793517', '1977-01-13 04:37:02', '1996-12-30 04:58:41');
INSERT INTO `pemesanan` VALUES (89, 5, 5, 475402000, '2017-01-06', 'Packing', 'http://lorempixel.com/640/480/', '4024007166727405', '1972-11-06 17:32:36', '1975-10-22 20:30:08');
INSERT INTO `pemesanan` VALUES (90, 1, 3, 25559200, '1997-10-07', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '5554219419550894', '1973-01-13 01:37:03', '2020-12-11 20:35:19');
INSERT INTO `pemesanan` VALUES (91, 3, 2, 6251, '1990-09-01', 'Dikirim', 'http://lorempixel.com/640/480/', '4716322168051817', '1997-01-07 14:52:06', '1984-04-22 19:29:06');
INSERT INTO `pemesanan` VALUES (92, 5, 8, 2751710, '1976-08-03', 'Packing', 'http://lorempixel.com/640/480/', '4539617976862941', '1980-07-11 18:24:13', '1973-04-05 21:05:58');
INSERT INTO `pemesanan` VALUES (93, 7, 1, 757401000, '1989-06-12', 'Packing', 'http://lorempixel.com/640/480/', '4716334954414', '1973-05-29 11:48:52', '2016-04-02 02:03:14');
INSERT INTO `pemesanan` VALUES (94, 6, 7, 0, '1976-07-29', 'Dikirim', 'http://lorempixel.com/640/480/', '378149569253894', '2005-05-27 06:11:30', '1984-05-15 22:02:49');
INSERT INTO `pemesanan` VALUES (95, 9, 5, 49262900, '2006-07-04', 'Belum dibayar', 'http://lorempixel.com/640/480/', '349373248234020', '1989-01-01 00:49:12', '1982-03-31 23:44:36');
INSERT INTO `pemesanan` VALUES (96, 4, 7, 51, '1988-04-24', 'Packing', 'http://lorempixel.com/640/480/', '5473451216761784', '2002-07-03 15:25:30', '2004-02-04 12:18:11');
INSERT INTO `pemesanan` VALUES (97, 4, 4, 0, '1986-10-29', 'Packing', 'http://lorempixel.com/640/480/', '4929074774629', '1979-12-08 10:58:53', '2000-04-04 07:03:17');
INSERT INTO `pemesanan` VALUES (98, 7, 3, 5620, '1982-09-12', 'Selesai', 'http://lorempixel.com/640/480/', '5531783224228656', '2015-03-18 07:39:10', '2009-11-30 01:07:09');
INSERT INTO `pemesanan` VALUES (99, 5, 1, 5820140, '1979-02-15', 'Belum dibayar', 'http://lorempixel.com/640/480/', '4485423102112789', '1998-11-27 10:37:20', '2012-05-12 23:45:51');
INSERT INTO `pemesanan` VALUES (100, 6, 9, 8, '1979-11-22', 'Packing', 'http://lorempixel.com/640/480/', '5448171957546736', '2000-09-04 09:48:16', '1979-09-17 00:58:21');
INSERT INTO `pemesanan` VALUES (101, 2, 3, 637016, '1989-03-01', 'Belum dibayar', 'http://lorempixel.com/640/480/', '5399078389754958', '1995-07-25 21:04:26', '1989-04-14 16:37:53');
INSERT INTO `pemesanan` VALUES (102, 9, 2, 16129500, '1973-04-29', 'Packing', 'http://lorempixel.com/640/480/', '5343612016120078', '2009-02-28 13:00:46', '1990-04-14 02:55:29');
INSERT INTO `pemesanan` VALUES (103, 7, 1, 9337750, '2003-09-26', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '4716345535287', '2019-03-16 09:59:23', '1970-01-10 03:33:36');
INSERT INTO `pemesanan` VALUES (104, 5, 9, 8683220, '1978-10-25', 'Selesai', 'http://lorempixel.com/640/480/', '6011666468902334', '1998-03-18 10:20:09', '2000-11-21 22:14:24');
INSERT INTO `pemesanan` VALUES (105, 9, 8, 776, '2001-01-29', 'Packing', 'http://lorempixel.com/640/480/', '347775860942245', '1977-09-28 01:51:05', '1971-08-17 15:10:34');
INSERT INTO `pemesanan` VALUES (106, 3, 1, 545342, '2007-10-02', 'Belum dibayar', 'http://lorempixel.com/640/480/', '4739411860441', '2013-03-01 17:02:23', '1982-02-20 10:51:07');
INSERT INTO `pemesanan` VALUES (107, 6, 1, 23, '1989-07-07', 'Dikirim', 'http://lorempixel.com/640/480/', '4929178435113936', '1972-08-02 00:57:20', '2001-04-25 12:12:30');
INSERT INTO `pemesanan` VALUES (108, 6, 1, 83764400, '1985-09-11', 'Selesai', 'http://lorempixel.com/640/480/', '376922436026757', '2004-03-15 14:34:39', '1999-11-13 22:03:59');
INSERT INTO `pemesanan` VALUES (109, 8, 4, 0, '1973-08-11', 'Selesai', 'http://lorempixel.com/640/480/', '4485733073580823', '1986-12-05 04:03:51', '1986-08-08 01:32:31');
INSERT INTO `pemesanan` VALUES (110, 9, 3, 854, '1996-04-13', 'Selesai', 'http://lorempixel.com/640/480/', '6011550723616440', '1995-04-23 01:17:48', '2011-04-03 19:21:03');
INSERT INTO `pemesanan` VALUES (111, 4, 3, 551065000, '1983-04-06', 'Dikirim', 'http://lorempixel.com/640/480/', '4532755051413', '2010-09-21 05:42:49', '1973-09-23 09:41:43');
INSERT INTO `pemesanan` VALUES (112, 7, 7, 0, '1979-07-18', 'Dikirim', 'http://lorempixel.com/640/480/', '6011874162746544', '2001-05-30 01:48:38', '2020-06-18 16:37:02');
INSERT INTO `pemesanan` VALUES (113, 4, 7, 971, '1979-11-14', 'Packing', 'http://lorempixel.com/640/480/', '5412802220122433', '2002-06-24 18:11:16', '1996-02-08 05:10:27');
INSERT INTO `pemesanan` VALUES (114, 8, 9, 0, '1975-04-11', 'Selesai', 'http://lorempixel.com/640/480/', '4755622364164', '1972-05-01 15:22:00', '1986-11-02 05:14:36');
INSERT INTO `pemesanan` VALUES (115, 7, 9, 715125, '2000-04-27', 'Belum dibayar', 'http://lorempixel.com/640/480/', '4716001147440', '1994-06-20 21:49:47', '1999-05-07 21:48:10');
INSERT INTO `pemesanan` VALUES (116, 1, 4, 9, '1983-03-09', 'Selesai', 'http://lorempixel.com/640/480/', '4024007132167', '1980-01-31 09:54:45', '1991-06-19 22:24:29');
INSERT INTO `pemesanan` VALUES (117, 8, 8, 524, '1988-03-02', 'Packing', 'http://lorempixel.com/640/480/', '5395810026001387', '2007-06-09 01:46:34', '1999-10-11 12:21:50');
INSERT INTO `pemesanan` VALUES (118, 2, 5, 59543700, '1984-04-24', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '5498270729836848', '1982-12-11 19:47:55', '1980-08-17 04:26:01');
INSERT INTO `pemesanan` VALUES (119, 5, 1, 63180, '1980-02-19', 'Dikirim', 'http://lorempixel.com/640/480/', '5283571840502598', '1976-02-01 02:35:20', '1975-06-20 21:23:35');
INSERT INTO `pemesanan` VALUES (120, 6, 8, 3284, '1975-08-14', 'Sudah dibayar', 'http://lorempixel.com/640/480/', '4532652147994848', '1996-08-25 10:03:50', '1990-04-07 02:05:27');
INSERT INTO `pemesanan` VALUES (121, 7, 9, 5135130, '1987-12-09', 'Packing', 'http://lorempixel.com/640/480/', '5418178621648309', '1984-02-21 09:29:30', '1994-08-10 15:16:59');

SET FOREIGN_KEY_CHECKS = 1;
