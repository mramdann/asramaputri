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

 Date: 03/08/2021 17:40:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_ijin
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ijin`;
CREATE TABLE `tbl_ijin`  (
  `id_ijin` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NULL DEFAULT NULL,
  `tujuan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `waktu_masuk` datetime(0) NULL DEFAULT NULL,
  `waktu_keluar` datetime(0) NULL DEFAULT NULL,
  `status_ijin` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_ijin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_ijin
-- ----------------------------
INSERT INTO `tbl_ijin` VALUES (1, 1, 'pulang', 'sdfgfhkcg', '2021-07-06 00:00:00', '2021-07-29 00:00:00', 'Terima');
INSERT INTO `tbl_ijin` VALUES (2, 2, 'vfds', 'frdw', '2021-07-28 00:00:00', '2021-07-21 00:00:00', 'Di Tolak');
INSERT INTO `tbl_ijin` VALUES (3, 3, 'juhygrtvfcd', 'jhtygrfdew', '2021-07-28 00:00:00', '2021-07-09 00:00:00', 'Menuggu persetujuan..!');
INSERT INTO `tbl_ijin` VALUES (6, 7, 'pulang kampung', 'asdfghjkertyukljh', '2021-08-30 00:00:00', '2021-08-15 00:00:00', 'Menunggu Persetujuan..!');

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_karyawan
-- ----------------------------
INSERT INTO `tbl_karyawan` VALUES (1, 'supardi', '34564567', 'Laki-Laki', 'cibitung, cibitung, karawang, jawa barat 22343', '9876456', 'oprator', '2');
INSERT INTO `tbl_karyawan` VALUES (2, 'junaedi', '32217745', 'laki-laki', 'kp.  bojong kosan, kokosan, pangles, sukabumi jawa barat', '085862234654', 'manager', '3');
INSERT INTO `tbl_karyawan` VALUES (3, 'putri', '32236543', 'perempuan', 'kp.mekar indah, balung, balungan, sukabumi, jawa barat', '0877722234526', 'oprator', '2');
INSERT INTO `tbl_karyawan` VALUES (7, 'agus', '2343234', 'Laki-Laki', 'kp. cipta mekar , balung, balungan, sukabumi, jawa barat', '08989765677', 'admin', NULL);
INSERT INTO `tbl_karyawan` VALUES (8, 'dewi', '55544654', 'Perempuan', 'kp. babakan indah des. mekar mukti kec. beber kab.tangkinas suwaban idonesia', '0856787643', 'admin', NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_mess
-- ----------------------------
INSERT INTO `tbl_mess` VALUES (2, '33214', '5', '20', 'perum cipta indah blog G n 47', 2);
INSERT INTO `tbl_mess` VALUES (23, '234334', '5', '30', 'Gerbag 8 BLog 7 KL 77', 23);
INSERT INTO `tbl_mess` VALUES (24, '43342', '10', '50', 'Gerbag 8 BLog 7 KL 79 JK', 24);

-- ----------------------------
-- Table structure for tbl_trans
-- ----------------------------
DROP TABLE IF EXISTS `tbl_trans`;
CREATE TABLE `tbl_trans`  (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(11) NULL DEFAULT NULL,
  `id_mess` int(11) NULL DEFAULT NULL,
  `no_kamar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_trans`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_trans
-- ----------------------------
INSERT INTO `tbl_trans` VALUES (1, 1, 2, '4');
INSERT INTO `tbl_trans` VALUES (2, 8, 2, '3');
INSERT INTO `tbl_trans` VALUES (3, 7, 23, '6');
INSERT INTO `tbl_trans` VALUES (4, 2, 24, '4');

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (5, 'admin@admin.com', 'admin', 'putri');
INSERT INTO `tbl_user` VALUES (6, '$username', '$pass', '$nama_user');

SET FOREIGN_KEY_CHECKS = 1;
