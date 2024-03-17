-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dcs
CREATE DATABASE IF NOT EXISTS `dcs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `dcs`;

-- Dumping structure for table dcs.departments
CREATE TABLE IF NOT EXISTS `departments` (
  `departmentId` int NOT NULL AUTO_INCREMENT,
  `departmentName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentDepartmentId` int DEFAULT NULL,
  PRIMARY KEY (`departmentId`) USING BTREE,
  KEY `parentDepartmentID` (`parentDepartmentId`) USING BTREE,
  CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`parentDepartmentId`) REFERENCES `departments` (`departmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dcs.departments: ~0 rows (approximately)
INSERT INTO `departments` (`departmentId`, `departmentName`, `address`, `email`, `phone`, `parentDepartmentId`) VALUES
	(1, 'Phòng Đào Tạo', 'Phòng 130 nhà A4', 'daotao@tlu.edu.vn', '02438521441', NULL),
	(2, 'Phòng Chính trị và Công tác sinh viên', 'Phòng 110 nhà A1', 'p7@tlu.edu.vn', '02435639577', NULL),
	(3, 'Phòng Khoa học và Công nghệ', 'Phòng 504 nhà A1', 'khcn@tlu.edu.vn', '02438534198', NULL),
	(4, 'Phòng Hợp tác quốc tế', 'Phòng 103 nhà A1', 'ico@tlu.edu.vn', '02438533083', NULL),
	(5, 'Phòng Công nghệ thông tin', 'Phòng 102 nhà C5', 'cntt@tlu.edu.vn', '02438533083', NULL),
	(6, 'Phòng Quản trị - Thiết bị', 'Phòng 101 nhà A5', 'quantri@tlu.edu.vn', '0435635671', NULL),
	(7, 'Phòng Hành chính - Tổng hợp', 'Phòng 200 nhà A1', 'phonghcth@tlu.edu.vn', '02438522201', NULL),
	(8, 'Phòng Tổ chức cán bộ', 'Phòng 209 nhà A1', 'p2@tlu.edu.vn', '02435633086', NULL),
	(9, 'Phòng Khảo thí và Đảm bảo chất lượng', 'Phòng 115 nhà A1', 'phongktkdcl@tlu.edu.vn', '02435643417', NULL),
	(10, 'Phòng Tài chính - Kế toán', 'Phòng 215 nhà A1', 'phongtaivu@tlu.edu.vn', '02435634602', NULL);

-- Dumping structure for table dcs.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `employeeId` int NOT NULL AUTO_INCREMENT,
  `fullName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `departmentId` int DEFAULT NULL,
  PRIMARY KEY (`employeeId`) USING BTREE,
  KEY `departmentID` (`departmentId`) USING BTREE,
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`departmentId`) REFERENCES `departments` (`departmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dcs.employees: ~0 rows (approximately)
INSERT INTO `employees` (`employeeId`, `fullName`, `address`, `email`, `phone`, `position`, `avatar`, `departmentId`) VALUES
	(1, 'Nguyễn Văn A', 'Thanh Xuân - Hà Nội', 'nguyenvana@example.com', '0987654321', 'Giáo viên', 'assets/uploads/avatar-1.jpg', 2),
	(2, 'Lê Văn B', 'Cầu Giấy - Hà Nội', 'levanb@example.com', '0987787332', 'Giáo viên', 'assets/uploads/avatar-2.jpg', 2);

-- Dumping structure for table dcs.users
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeId` int DEFAULT NULL,
  PRIMARY KEY (`username`),
  KEY `employeeID` (`employeeId`) USING BTREE,
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employees` (`employeeId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table dcs.users: ~0 rows (approximately)
INSERT INTO `users` (`username`, `password`, `role`, `employeeId`) VALUES
	('user01', '$2y$10$Nncv9fpNdfHsu2ksFAwH6.LauQgJ76NE71iLKL3.vvDLr0RHxEE8S', 'admin', 1),
	('user02', '$2y$10$Nncv9fpNdfHsu2ksFAwH6.LauQgJ76NE71iLKL3.vvDLr0RHxEE8S', 'regular', 2);
	-- password: user@123

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
