/*
 Navicat Premium Data Transfer

 Source Server         : xampp-local-mdb
 Source Server Type    : MariaDB
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : pbss_info

 Target Server Type    : MariaDB
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 17/08/2020 10:37:04
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for imported_csv_files
-- ----------------------------
DROP TABLE IF EXISTS `imported_csv_files`;
CREATE TABLE `imported_csv_files`  (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `uploaded` datetime(0) NOT NULL DEFAULT current_timestamp,
  `imported` datetime(0) NULL DEFAULT NULL,
  `data_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `hash` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of imported_csv_files
-- ----------------------------
INSERT INTO `imported_csv_files` VALUES (55, '20200810_1596996414_f75f06.csv', '2020-08-10 00:06:54', NULL, 'eyJ0b3RhbF9udW1fcm93cyI6ODAsImFjY2VwdGFibGVfcm93cyI6Nzl9', '0dc7a54c3dc2ac9b0', 'invalid');
INSERT INTO `imported_csv_files` VALUES (58, '20200810_1597080560_7b11d2.csv', '2020-08-10 23:29:20', '2020-08-10 23:44:55', 'eyJ0b3RhbF9udW1fcm93cyI6ODAsImFjY2VwdGFibGVfcm93cyI6Nzl9', '6d34e96a399900626', 'imported');
INSERT INTO `imported_csv_files` VALUES (59, '20200810_1597081255_3ec258.csv', '2020-08-10 23:40:55', '2020-08-10 23:43:10', 'eyJ0b3RhbF9udW1fcm93cyI6ODAsImFjY2VwdGFibGVfcm93cyI6Nzl9', '99df443747237ec78', 'imported');
INSERT INTO `imported_csv_files` VALUES (60, '20200810_1597081299_c202ec.csv', '2020-08-10 23:41:39', NULL, 'eyJ0b3RhbF9udW1fcm93cyI6MjEsImFjY2VwdGFibGVfcm93cyI6MjB9', '3ecb5b91e0f3868ab', 'invalid');

-- ----------------------------
-- Table structure for student_info_archive
-- ----------------------------
DROP TABLE IF EXISTS `student_info_archive`;
CREATE TABLE `student_info_archive`  (
  `sl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tcert_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `village` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_office` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_code` int(10) NOT NULL,
  `upazilla` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exam_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `borad_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exam_year` int(10) NOT NULL,
  `group_tread` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `result` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `result_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `roll_no` int(10) NOT NULL,
  `exam_centre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reg_no` bigint(16) NOT NULL,
  `session` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_printed` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`sl_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_info_archive
-- ----------------------------

-- ----------------------------
-- Table structure for student_info_for_testimonial
-- ----------------------------
DROP TABLE IF EXISTS `student_info_for_testimonial`;
CREATE TABLE `student_info_for_testimonial`  (
  `sl_id` int(11) NOT NULL AUTO_INCREMENT,
  `tcert_id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `stu_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `village` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_office` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_code` int(10) NOT NULL,
  `upazilla` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exam_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `board_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exam_year` int(10) NOT NULL,
  `group_tread` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `result` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `result_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `roll_no` int(10) NOT NULL,
  `exam_centre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reg_no` bigint(16) NOT NULL,
  `session` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_printed` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`sl_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1356 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of student_info_for_testimonial
-- ----------------------------
INSERT INTO `student_info_for_testimonial` VALUES (1277, 'S-1920115443', ' Kaniz Fatema', 'Md. Mojibar Rahman', 'Mst.Tahera', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '4.89', 'Passed', 115443, 'Dighalia', 1713110090, '2018-2019', '2003-02-02', '01912192184', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1278, 'S-1920115444', 'Monisha Biswas', 'Gobinda Kumar Biswas', 'Asa Biswas', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '4.67', 'Passed', 115444, 'Dighalia', 1713110095, '2018-2019', '2004-02-29', '01921946422', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1279, 'S-1920115445', 'Md.Ebrahim Sheikh', 'Md. Kalam Maji', 'Shahina Begum', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '5.00', 'Passed', 115445, 'Dighalia', 1713110088, '2018-2019', '2004-01-10', '01998316467', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1280, 'S-1920115446', 'Md. Tariqul Islam Nishat', 'Abdul Jalil Sarder', 'Lasmi Begum', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '4.11', 'Passed', 115446, 'Dighalia', 1713110102, '2018-2019', '2003-09-28', '01725465192 ', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1281, 'S-1920115447', 'Mahadi Hasan Topu', 'Md.Tabibur Rahman', 'Mahmuda Akthary Lipi', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '0.0', 'Failed', 115447, 'Dighalia', 1713110104, '2018-2019', '2004-11-18', '01943524732 ', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1282, 'S-1920115448', 'Md. Symun Ahmmed Siam', 'Md.Humayun', 'Sumi Begum', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '4.5', 'Passed', 115448, 'Dighalia', 1713110171, '2018-2019', '2003-12-12', '01949634285 ', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1283, 'S-1920248781', 'Sadiya Akter', 'Keramot Ali', 'Shahida Begum ', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '2.61', 'Passed', 248781, 'Dighalia', 1510578765, '2018-2019', '2002-07-08', '01758219076 ', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1284, 'S-1920248782', 'Munni Akter Akhi', 'Md.Jamal Hossain', 'Mst.Rahela Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '2.83', 'Passed', 248782, 'Dighalia', 1613610600, '2018-2019', '2004-07-10', '01921542337', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1285, 'S-1920248783', 'Shathi Khatun ', 'Rezaul Sheikh', 'Salma Megum ', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '2.67', 'Passed', 248783, 'Dighalia', 1613610661, '2018-2019', '2004-11-14', '01622843464', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1286, 'S-1920248784', 'Methila Khatun ', 'Mustafizur Rahman', 'Lutfa Begum', 'Female', 'Mominpur', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '3.5', 'Passed', 248784, 'Dighalia', 1713110100, '2018-2019', '2003-03-02', '01945404485', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1287, 'S-1920248785', 'Sumi Khatun ', 'Md. jahurul Haq', 'Rexona Begum ', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '4.22', 'Passed', 248785, 'Dighalia', 1713110101, '2018-2019', '2005-06-10', '01980943895', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1288, 'S-1920248786', 'Suraiya Huda Ratri', 'Shak Nurul Huda ', 'Rekha Begum ', 'Female', 'Chandonimohal', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '4.33', 'Passed', 248786, 'Dighalia', 1713110103, '2018-2019', '2004-06-17', '01406439951', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1289, 'S-1920248787', 'Lamia Khatun ', 'Md.Faruk Hossain', 'Moonjila begum ', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '4.44', 'Passed', 248787, 'Dighalia', 1713110105, '2018-2019', '2004-03-22', '01935012944', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1290, 'S-1920248788', 'Sultana Khatun ', 'Hannan Biswas', 'Nasrin Begum ', 'Female', 'Panigati', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '3.72', 'Passed', 248788, 'Dighalia', 1713110106, '2018-2019', '2003-10-14', '01941266034', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1291, 'S-1920248789', 'Sadia Islam ', 'Md. Moirul Islam', 'Romana Islam ', 'Female', 'Mominpur', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.72', 'Passed', 248789, 'Dighalia', 1713110107, '2018-2019', '2004-01-01', '01767090328', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1292, 'S-1920248790', 'Pharhana Sultana Happy', 'Akram Sheikh', 'Hena Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '3.61', 'Passed', 248790, 'Dighalia', 1713110110, '2018-2019', '2004-12-20', '01962034054', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1293, 'S-1920248791', 'Tajmin Nahar Retu', 'Shimul Kha', 'Nazma Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '3.06', 'Passed', 248791, 'Dighalia', 1713110111, '2018-2019', '2003-01-25', '01909592225', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1294, 'S-1920248792', 'Oishi Khatun', 'Md. Abdul Aziz', 'Swapna Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', 'Fail', 'Failed', 248792, 'Dighalia', 1713110116, '2018-2019', '2003-12-01', '01924378305', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1295, 'S-1920248793', 'Amina Khatun ', 'Md.Bachsu Molla', 'Halima Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '4.28', 'Passed', 248793, 'Dighalia', 1713110117, '2018-2019', '2003-10-03', '01933 640187', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1296, 'S-1920248794', 'Dilruba Yasmin Mim', 'Late.Humayun Mollah', 'Rehena Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', 'Fail', 'Failed', 248794, 'Dighalia', 1713110120, '2018-2019', '2003-01-21', '01923074644', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1297, 'S-1920248795', 'Rakhi Khatun', 'Md.Tabibur Molla', 'Mst.Ratna Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '2.89', 'Passed', 248795, 'Dighalia', 1713110122, '2018-2019', '2004-03-03', '01962025506', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1298, 'S-1920248796', 'Mst.Chadni Khatun ', 'Keramat Sheikh', 'Panna Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', 'Fail', 'Failed', 248796, 'Dighalia', 1713110129, '2018-2019', '2003-06-06', '01795222828', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1299, 'S-1920248797', 'Mst.Lima Akter', 'Niamat Ali', 'Khadiza Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '3.17', 'Passed', 248797, 'Dighalia', 1713110131, '2018-2019', '2003-08-07', '01982008843', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1300, 'S-1920248798', 'Sonia Sultana', 'Halim Kha', 'Doly Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.72', 'Passed', 248798, 'Dighalia', 1713110132, '2018-2019', '2003-12-01', '01961176098', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1301, 'S-1920248799', 'Sumaya Akthry', 'Md.Alamgir', 'Mst.Salma', 'Female', 'Bativita', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '3.11', 'Passed', 248799, 'Dighalia', 1713110137, '2018-2019', '2003-01-21', '01404718432', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1302, 'S-1920248800', 'Shila Khatun', 'Siraj Sheikh', 'Rony Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', 'Fail', 'Failed', 248800, 'Dighalia', 1713110140, '2018-2019', '2003-02-21', '01969841616', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1303, 'S-1920248801', 'Fatema Khanom', 'Md.Owahidujjaman', 'Piyari Begum', 'Female', 'Panigati', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '4.33', 'Passed', 248801, 'Dighalia', 1713110152, '2018-2019', '2002-11-13', '01917703163', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1304, 'S-1920248802', 'Afsana Akter', 'Md.Mizanur Sheikh', 'Shilpi Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '3.61', 'Passed', 248802, 'Dighalia', 1713110155, '2018-2019', '2003-08-01', '01963993865', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1305, 'S-1920248803', 'Lija Khanom', 'Md.Owahidujjaman', 'Piyari Begum', 'Female', 'Panigati', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '4.22', 'Passed', 248803, 'Dighalia', 1713110156, '2018-2019', '2004-11-08', '01756397100', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1306, 'S-1920248804', 'Sumaiya Afrin Amely', 'Nuru Sarder', 'Nasima Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.67', 'Passed', 248804, 'Dighalia', 1713110162, '2018-2019', '2003-07-24', '01927408548', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1307, 'S-1920248805', 'Rima Khatun', 'Md.Rekmot Shekh', 'Hasina Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '2.89', 'Passed', 248805, 'Dighalia', 1713110172, '2018-2019', '2003-02-20', '01952985974', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1308, 'S-1920248806', 'Moniya Khatun', 'Akter Molla', 'Rozina Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '3.5', 'Passed', 248806, 'Dighalia', 1713110216, '2018-2019', '2003-07-12', '01946425284', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1309, 'S-1920248807', 'Miss.Rupa', 'Golam Rosul', 'Manoara Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.56', 'Passed', 248807, 'Dighalia', 1713110217, '2018-2019', '2003-11-04', '01930580914', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1310, 'S-1720248808', 'Akhi Kulsum', 'Md.Habibur Rahman Molla', 'Sahinur Begum', 'Female', '', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', 'Fail', 'Failed', 248808, 'Dighalia', 1413254934, '2016-2017', '2001-05-10', '', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1311, 'S-1720248809', 'Ruckshana Khatun Bithe', 'Md.Younus Ali', 'Selena Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '3.5', 'Passed', 248809, 'Dighalia', 1513510364, '2016-2017', '2000-05-05', '01957547783', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1312, 'S-1820248810', 'Sanjida Afrin Sania', 'Sk.Ayub Ali', 'Rafia Begum', 'Female', '', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', 'Fail', 'Failed', 248810, 'Dighalia', 1613610559, '2017-2018', '2004-05-28', '', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1313, 'S-1820248811', 'Sathe Das', 'Gobindo Chondro Das', 'Rikta Rani Das', 'Female', '', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '2.89', 'Passed', 248811, 'Dighalia', 1613610562, '2017-2018', '2002-02-22', '', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1314, 'S-1820248812', 'Akhi Khatun', 'Md.Altaf Hossain', 'Selina Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '2.94', 'Passed', 248812, 'Dighalia', 1613610571, '2017-2018', '2002-01-19', '01408122218', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1315, 'S-1820248813', 'Suriya Akthery', 'Md.Abdul Mannan', 'Lipi Begum', 'Female', '', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '2.89', 'Passed', 248813, 'Dighalia', 1613610652, '2017-2018', '2001-08-16', '', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1316, 'S-1920248814', 'Pollob Kumar Biswas', 'Nitai Chandra Biswas', 'Tithi Biswas', 'Male', 'Bativita', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '4.5', 'Passed', 248814, 'Dighalia', 1713110093, '2018-2019', '2003-07-31', '01745388691', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1317, 'S-1920248815', 'Md.Rahan Khan', 'Md.Liton', 'Mrs.Chompa Begum', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '4.00', 'Passed', 248815, 'Dighalia', 1713110139, '2018-2019', '2004-02-05', '01824555569', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1318, 'S-1920248816', 'Md.Monirul Islam Sheikh', 'Shidul Sheikh', 'Rimpa Begum', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.61', 'Passed', 248816, 'Dighalia', 1713110142, '2018-2019', '2003-07-04', '01965419340', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1319, 'S-1920248817', 'Sabbir Hossain', 'Md.Uzir Farazi', 'Ennas Begum', 'Male', 'Kamargati ', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '3.00', 'Passed', 248817, 'Dighalia', 1713110143, '2018-2019', '2003-08-05', '01778472817', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1320, 'S-1920248818', 'Jaminur ', 'Saud Shaikh', 'Asia Begum', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', 'Fail', 'Failed', 248818, 'Dighalia', 1713110148, '2018-2019', '2003-01-27', '01408426847', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1321, 'S-1920248819', 'Md.Rasel Shake', 'Aiub Shake', 'Masura Begum', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.17', 'Passed', 248819, 'Dighalia', 1713110159, '2018-2019', '2004-01-01', '01927401493', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1322, 'S-1920248820', 'Shahadot Sheikh ', 'Jamir Sheikh ', 'Sabina Begum ', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', 'Fail', 'Failed', 248820, 'Dighalia', 1713110160, '2018-2019', '2005-04-12', '01704636225', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1323, 'S-1920248821', 'Sumon Sheikh ', 'Md. Imdadul Sheikh ', 'Mina Begum ', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '3.33', 'Passed', 248821, 'Dighalia', 1713110174, '2018-2019', '2003-12-17', '019375608/42', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1324, 'S-1920248822', 'Md. Ratul Sheikh ', 'Hasan Sheikh ', 'Polly Begum ', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.00', 'Passed', 248822, 'Dighalia', 1713110181, '2018-2019', '2003-09-02', '01906355236', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1325, 'S-1920248823', 'Md. Sabuj Sardar ', 'Md. Aslam Sardar ', 'Sabina Begum ', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '2.56', 'Passed', 248823, 'Dighalia', 1713110189, '2018-2019', '2003-11-07', '01745207907', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1326, 'S-1620248824', 'Md. Jahidul Islam ', 'Md. Abdur Salam ', 'Ms. Shufia Begum ', 'Male', '', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', 'Absent', 'Failed', 248824, 'Dighalia', 1413254926, '2015-2016', '2001-02-04', 'Nil', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1327, 'S-1720248825', 'Md. Tanvir kazi ', 'Md. Emamul Kazi', 'Saleha Begum ', 'Male', '', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', 'Fail ', 'Failed', 248825, 'Dighalia', 1513510455, '2016-2017', '2002-04-02', 'Nil', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1328, 'S-1820248826', 'Mehedi Hasan', 'Nur Islam', 'Rimi Begum', 'Male', '', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '2.17', 'Passed', 248826, 'Dighalia', 1513532042, '2017-2018', '2001-08-29', 'Nil', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1329, 'S-1820248827', 'Tamim Islam Molla', 'Md.Joinal M0lla', 'Sathi Khatun', 'Male', '', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '2.67', 'Passed', 248827, 'Dighalia', 1613610614, '2017-2018', '2002-11-03', 'Nil', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1330, 'S-1820248828', 'Md.Sumon Sheikh', 'Sirazul Islam', 'Firoja Begum', 'Male', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '2.89', 'Passed', 248828, 'Dighalia', 1613610640, '2017-2018', '2002-05-15', '01937560842', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1331, 'S-1820248829', 'Md.Hasibul Hosan Santo', 'Md.Nur Alam', 'Halima Begum', 'Male', 'Bogdia', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '2.5', 'Passed', 248829, 'Dighalia', 1613610647, '2017-2018', '2002-03-09', '01950135293', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1332, 'S-1820248830', 'Md. Asad Sheikh', 'Md.AslamSheikh', 'Rokeya Begum', 'Male', '', '', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '2.72', 'Passed', 248830, 'Dighalia', 1613823798, '2017-2018', '2002-05-02', 'Nil', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1333, 'S-1920512353', 'Mst.Raifa Islam Eva', 'Md.Hafizur Rahman', 'Hosneara Begum', 'Female', 'Bativita', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '4.67', 'Passed', 512353, 'Dighalia', 1713110092, '2018-2019', '2005-11-21', '0177340005', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1334, 'S-1920512354', 'Neshita Biswas', 'Mohadeb Biswas', 'Kakoli Rani Biswas', 'Female', 'Bativita', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '4.78', 'Passed', 512354, 'Dighalia', 1713110094, '2018-2019', '2004-10-26', '01316487600', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1335, 'S-1920512355', 'Mst.Mita Islam', 'Mizanur Rahman', 'Zaheda Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '4.44', 'Passed', 512355, 'Dighalia', 1713110096, '2018-2019', '2003-04-23', '01926315974', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1336, 'S-1920512356', 'Mst.Fahmida Khatun', 'S.M Azad Ali', 'Runa Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.61', 'Passed', 512356, 'Dighalia', 1713110098, '2018-2019', '2005-03-03', '01787462560', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1337, 'S-1920512357', 'Lamia Aktar Ritu', 'Md.Akram Biswas', 'Mrs.China Begum', 'Female', 'Panigati', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '3.72', 'Passed', 512357, 'Dighalia', 1713110099, '2018-2019', '2004-05-05', '01404919466', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1338, 'S-1920512358', 'Akhi Khatun', 'Md.Ashak Sheikh', 'Sabina  ', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '4.11', 'Passed', 512358, 'Dighalia', 1713110108, '2018-2019', '2003-08-20', '01985529203', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1339, 'S-1920512359', 'Ummeia Islam', 'Dinmohammad Sheikh', 'Rokshona Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '4.44', 'Passed', 512359, 'Dighalia', 1713110113, '2018-2019', '2005-07-14', '01725653648', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1340, 'S-1920512360', 'Bristy Khatun ', 'Kalam Sheikh', 'Lipi Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '4.72', 'Passed', 512360, 'Dighalia', 1713110115, '2018-2019', '2004-11-01', '01955376028', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1341, 'S-1920512361', 'Mst.Sadiya Khatun', 'Md.Abdus Salam Sheikh', 'Mst. Nazma Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '3.33', 'Passed', 512361, 'Dighalia', 1713110126, '2018-2019', '2002-06-03', '01912273270', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1342, 'S-1920512362', 'Sumaya Khatun', 'Md.Jasim Molla', 'Anna Begum', 'Female', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.39', 'Passed', 512362, 'Dighalia', 1713110127, '2018-2019', '2004-02-05', '01719197625', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1343, 'S-1820512363', 'Khairunnesha', 'Md.Khalilul Rahman', 'Amina Begum', 'Female', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '3.72', 'Passed', 512363, 'Dighalia', 1613610527, '2017-2018', '2002-04-17', 'Nil', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1344, 'S-1920512364', 'Md.Golam Rahman', 'Md.Nasir Gazi', 'Shilpi Begum', 'Male', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '3.67', 'Passed', 512364, 'Dighalia', 1613610588, '2018-2019', '2003-01-23', '01677036905', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1345, 'S-1920512365', 'Md.Ejazul Sarder', 'Md. Azizul Sarder', 'Sharmin Aziz', 'Male', 'Bogdia', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '4.89', 'Passed', 512365, 'Dighalia', 1713109827, '2018-2019', '2004-09-03', '01921731291', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1346, 'S-1920512366', 'Gazi Md.Tareq Hasan', 'Md.Ayeub Ali ', 'Sabina Begum ', 'Male', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '3.78', 'Passed', 512366, 'Dighalia', 1713110123, '2018-2019', '2004-07-16', '01927024329', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1347, 'S-1920512367', 'Arizul Islam', 'Md.Billal Hossain', 'Roksana Begum', 'Male', 'Katanipara ', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '4.00', 'Passed', 512367, 'Dighalia', 1713110130, '2018-2019', '2003-11-15', 'Nil', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1348, 'S-1920512368', 'Mujahidul Islam ', 'Md.Mazid Sheikh', 'Johaha Begum', 'Male', 'Bativita', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '4.44', 'Passed', 512368, 'Dighalia', 1713110133, '2018-2019', '2004-10-25', '01915052067', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1349, 'S-1920512369', 'Md.Sayid Hassan', 'S.M Ferdous Alam', 'Mina Begum ', '', 'Bativita', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '3.98', 'Passed', 512369, 'Dighalia', 1713110141, '2018-2019', '2004-05-15', '01925221358', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1350, 'S-1920512370', 'Moutasin Billa', 'Azizul Sarder', 'Rekshona Begum', '', 'Bativita', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', 'Fail', 'Failed', 512370, 'Dighalia', 1713110157, '2018-2019', '2003-12-03', '01969803487', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1351, 'S-1920512371', 'Md.Nafiz Ikbal Zim ', 'Md.Abul Kalam', 'Nasrin Begum ', '', 'Bativita', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.94', 'Passed', 512371, 'Dighalia', 1713110166, '2018-2019', '2003-10-16', '01946565618', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1352, 'S-1920512372', 'Md.Ratul Hassan Readoy', 'Md.Asraf  Laskar', 'Ashia Begum', '', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', 'Fail', 'Failed', 512372, 'Dighalia', 1713110167, '2018-2019', '2003-09-11', '01945153191', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1353, 'S-1920512373', 'Rabbi Hassen', 'Md.Alamgir Hossain', 'Mrs.Jharna Begum', '', 'Hazigram', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Business Studies', '2.83', 'Passed', 512373, 'Dighalia', 1713110207, '2018-2019', '2004-01-17', '01946553055', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1354, 'S-1820512374', 'Md.Thareq Aziz', 'Md.Rezaul Islam', 'Seren Sultana', '', 'Bogdia', 'Senhati', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Humanities', '3.17', 'Passed', 512374, 'Dighalia', 1613610574, '2017-2018', '2002-01-20', '01927689172', NULL);
INSERT INTO `student_info_for_testimonial` VALUES (1355, 'S-1820512375', 'Mikail Hossain', 'Md.Sawkat Ali', 'Kohinur Begum', '', 'Bativita', 'Hazigram', 9222, 'Dighalia', 'Khulna', 'SSC', 'Jashore', 2020, 'Science', '3.00', 'Passed', 512375, 'Dighalia', 1613610631, '2017-2018', '2001-01-29', '01994455262', NULL);

-- ----------------------------
-- Table structure for temp_list_for_testimonial
-- ----------------------------
DROP TABLE IF EXISTS `temp_list_for_testimonial`;
CREATE TABLE `temp_list_for_testimonial`  (
  `temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `tcert_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `stu_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `father` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mother` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `village` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_office` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `post_code` int(10) NOT NULL,
  `upazilla` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `district` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exam_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `borad_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exam_year` int(10) NOT NULL,
  `group_tread` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `result_status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `result` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `roll_no` int(10) NOT NULL,
  `exam_centre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `reg_no` bigint(16) NOT NULL,
  `session` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `phone_number` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`temp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1581 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of temp_list_for_testimonial
-- ----------------------------

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `passwd` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `user_role` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES (1, 'admin', 'Administrator', 'mail@armanarif.com', '21232f297a57a5a743894a0e4a801fc3', 'superadmin');

SET FOREIGN_KEY_CHECKS = 1;
