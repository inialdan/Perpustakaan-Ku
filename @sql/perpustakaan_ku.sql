/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : localhost:3306
 Source Schema         : perpustakaan_ku

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 29/05/2021 21:39:55
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for buku
-- ----------------------------
DROP TABLE IF EXISTS `buku`;
CREATE TABLE `buku`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cover` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `nama_buku` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jenis_buku` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_on` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of buku
-- ----------------------------
INSERT INTO `buku` VALUES (8, '8_Ayat-Ayat_Cinta_60ae60fe5aad0.jpg', 'Ayat-Ayat Cinta', '1', 'inialdan', '2021-05-26 21:28:08.000000');
INSERT INTO `buku` VALUES (9, '9_4124124_60ae61160aaf6.jpg', 'Si Anak Singkong', '3', 'inialdan', '2021-05-26 21:28:14.000000');
INSERT INTO `buku` VALUES (10, '10_5CM_60ae61a563822.jpg', '5CM', '2', 'inialdan', '2021-05-26 21:56:30.000000');
INSERT INTO `buku` VALUES (12, '12_Buku_Si_Doel_Anak_Betawi_60af759406c19.jpg', 'Buku Si Doel Anak Betawi', '3', 'inialdan', '2021-05-27 17:33:18.000000');

-- ----------------------------
-- Table structure for jenis_buku
-- ----------------------------
DROP TABLE IF EXISTS `jenis_buku`;
CREATE TABLE `jenis_buku`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jenis` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_by` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_on` timestamp(6) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of jenis_buku
-- ----------------------------
INSERT INTO `jenis_buku` VALUES (1, 'Religi', 'inialdan', '2021-05-27 17:05:02.000000');
INSERT INTO `jenis_buku` VALUES (2, 'Novel', 'inialdan', '2021-05-27 17:05:09.000000');
INSERT INTO `jenis_buku` VALUES (3, 'Biografi', 'inialdan', '2021-05-27 17:05:34.000000');
INSERT INTO `jenis_buku` VALUES (5, 'Romantis', 'inialdan', '2021-05-27 17:45:17.000000');
INSERT INTO `jenis_buku` VALUES (6, 'Sejarah', 'inialdan', '2021-05-29 20:00:45.000000');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `avatar` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'inialdan', '', 'projectarizki@gmail.com', '$2y$10$krlHvNV09bBAl2UUfpOe9eQt/FZdhBFRkDpfzyv7QXkIWbvfVV4ga', 'default.png');
INSERT INTO `user` VALUES (7, 'member', 'member', 'Member', 'member@gmail.com', '$2y$10$tMFUZYUy542jMbpDbqR07eBzqejbqsGyDoIwh.k2Ic8EbUgj8U2LK', 'default.png');
INSERT INTO `user` VALUES (8, 'member', 'akudancow', 'akudancow', 'akudancow@gmail.com', '$2y$10$gptYI/YmsA8sMYaJRaEN4eyzhWScRv.ntp04Rwxg4//Hf5h0XYeaW', 'default.png');

SET FOREIGN_KEY_CHECKS = 1;
