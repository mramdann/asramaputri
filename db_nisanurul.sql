/*
 Navicat Premium Data Transfer

 Source Server         : db_localhost
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : db_nisanurul

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 26/07/2021 13:57:35
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_karyawan`;
CREATE TABLE `tbl_karyawan`  (
  `id_karyawan` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nik` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis_kelamin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(123) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tlp` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_karyawan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_karyawan
-- ----------------------------
INSERT INTO `tbl_karyawan` VALUES (1, 'supardi', '34564567', 'Laki-Laki', 'cibitung, cibitung, karawang, jawa barat 22343', '9876456', 'oprator', '2');
INSERT INTO `tbl_karyawan` VALUES (2, 'junaedi', '32217745', 'laki-laki', 'kp.  bojong kosan, kokosan, pangles, sukabumi jawa barat', '085862234654', 'manager', '3');
INSERT INTO `tbl_karyawan` VALUES (3, 'putri', '32236543', 'perempuan', 'kp.mekar indah, balung, balungan, sukabumi, jawa barat', '0877722234526', 'oprator', '2');

-- ----------------------------
-- Table structure for tbl_mess
-- ----------------------------
DROP TABLE IF EXISTS `tbl_mess`;
CREATE TABLE `tbl_mess`  (
  `id_mess` int(11) NOT NULL AUTO_INCREMENT,
  `no_mes` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kamar` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kapasitas` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lokasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_transaksi` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_mess`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_mess
-- ----------------------------
INSERT INTO `tbl_mess` VALUES (2, '33214', '54', '7', 'perum cipta indah blog G n 47', 2);
INSERT INTO `tbl_mess` VALUES (3, '2234', '23', '2', 'gerbang satu blog 5 AL', 3);

-- ----------------------------
-- Table structure for tbl_trans
-- ----------------------------
DROP TABLE IF EXISTS `tbl_trans`;
CREATE TABLE `tbl_trans`  (
  `id_trans` int(11) NOT NULL,
  `id_karyawan` int(11) NULL DEFAULT NULL,
  `id_mess` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_trans`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_trans
-- ----------------------------
INSERT INTO `tbl_trans` VALUES (1, 2, 2);
INSERT INTO `tbl_trans` VALUES (2, 1, 3);
INSERT INTO `tbl_trans` VALUES (3, 3, 2);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_user` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (5, 'admin@admin.com', 'admin', 'putri');

SET FOREIGN_KEY_CHECKS = 1;
