-- --------------------------------------------------------
-- Host:                         192.168.70.202
-- Server version:               10.0.17-MariaDB-1~wheezy-log - mariadb.org binary distribution
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Verzió:              9.5.0.5261
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for web2
-- DROP DATABASE IF EXISTS `web2`;
CREATE DATABASE IF NOT EXISTS `web2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `web2`;

-- Dumping structure for tábla feladatok-gamf-web-2.felhasznalok
DROP TABLE IF EXISTS `felhasznalok`;
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `csaladi_nev` varchar(45) NOT NULL DEFAULT '',
  `utonev` varchar(45) NOT NULL DEFAULT '',
  `bejelentkezes` varchar(12) NOT NULL DEFAULT '',
  `jelszo` varchar(40) NOT NULL DEFAULT '',
  `jogosultsag` varchar(3) NOT NULL DEFAULT '_1_',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Dumping data for table feladatok-gamf-web-2.felhasznalok: 12 rows
/*!40000 ALTER TABLE `felhasznalok` DISABLE KEYS */;
INSERT INTO `felhasznalok` (`id`, `csaladi_nev`, `utonev`, `bejelentkezes`, `jelszo`, `jogosultsag`) VALUES
	(1, 'Rendszer', 'Admin', 'Admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '__1'),
	(2, 'Családi_2', 'Utónév_2', 'Login2', '6cf8efacae19431476020c1e2ebd2d8acca8f5c0', '_1_'),
	(3, 'Családi_3', 'Utónév_3', 'Login3', 'df4d8ad070f0d1585e172a2150038df5cc6c891a', '_1_'),
	(4, 'Családi_4', 'Utónév_4', 'Login4', 'b020c308c155d6bbd7eb7d27bd30c0573acbba5b', '_1_'),
	(5, 'Családi_5', 'Utónév_5', 'Login5', '9ab1a4743b30b5e9c037e6a645f0cfee80fb41d4', '_1_'),
	(6, 'Családi_6', 'Utónév_6', 'Login6', '7ca01f28594b1a06239b1d96fc716477d198470b', '_1_'),
	(7, 'Családi_7', 'Utónév_7', 'Login7', '41ad7e5406d8f1af2deef2ade4753009976328f8', '_1_'),
	(8, 'Családi_8', 'Utónév_8', 'Login8', '3a340fe3599746234ef89591e372d4dd8b590053', '_1_'),
	(9, 'Családi_9', 'Utónév_9', 'Login9', 'c0298f7d314ecbc5651da5679a0a240833a88238', '_1_'),
	(10, 'Családi_10', 'Utónév_10', 'Login10', 'a477427c183664b57f977661ac3167b64823f366', '_1_'),
	(11, 'khgjkhg', 'khgkhgkhg', 'khgkhgkg', '7edcb937cbc6acd5fec0713ae610e301cd1b6303', '_1_'),
	(12, 'Teszt cs1', 'Teszt u1', 'teszt01', '43ec90f60ce69e10ebbb0ae5671f366a3448f363', '_1_');
/*!40000 ALTER TABLE `felhasznalok` ENABLE KEYS */;

-- Dumping structure for tábla feladatok-gamf-web-2.hirek
DROP TABLE IF EXISTS `hirek`;
CREATE TABLE IF NOT EXISTS `hirek` (
  `hir_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `felh_id` int(11) NOT NULL,
  `hir_cim` longtext NOT NULL,
  `hir_szoveg` text NOT NULL,
  `hir_datum` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`hir_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table feladatok-gamf-web-2.hirek: ~2 rows (approximately)
/*!40000 ALTER TABLE `hirek` DISABLE KEYS */;
INSERT INTO `hirek` (`hir_id`, `felh_id`, `hir_cim`, `hir_szoveg`, `hir_datum`) VALUES
	(1, 1, 'xcvhbsfhg', 'fsghsfgh', '0000-00-00 00:00:00'),
	(2, 1, 'ycbycbv', 'ychbxcyvn', '2019-11-20 02:18:54'),
	(3, 12, 'Cím 03', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. In blandit lacus condimentum tortor sollicitudin, quis efficitur ante porta. Duis fermentum mollis nisl vitae tincidunt. Nullam rutrum et sapien et maximus. Nullam nec fermentum ipsum. Ut porta ullamcorper pulvinar. Suspendisse eget enim ipsum. Pellentesque eget augue convallis, vulputate nulla eget, vestibulum dolor. Suspendisse at vulputate mi.<br />\r\n\r\nIn hac habitasse platea dictumst. Praesent consectetur sem massa, vitae volutpat orci tristique in. Aliquam metus arcu, lobortis id turpis sit amet, faucibus mollis velit. Pellentesque imperdiet vehicula augue malesuada tristique. Vestibulum fringilla blandit varius. Nullam molestie nunc enim, at ullamcorper tortor cursus quis. Nulla eget mi consequat, fringilla purus a, efficitur arcu. Maecenas pulvinar tincidunt nisl, quis ullamcorper velit semper ut. Nam vitae mi sem. Morbi in eleifend leo. Nulla eleifend sem sit amet neque pretium venenatis sit amet dapibus turpis. Donec non rhoncus eros. Vivamus ultrices nulla et odio ullamcorper, in venenatis nisi rutrum. Vestibulum semper felis non facilisis sollicitudin. Aliquam varius massa nec mi tincidunt laoreet.', '2019-11-20 10:38:53');
/*!40000 ALTER TABLE `hirek` ENABLE KEYS */;

-- Dumping structure for tábla feladatok-gamf-web-2.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `url` varchar(30) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `szulo` varchar(30) NOT NULL,
  `jogosultsag` varchar(3) NOT NULL,
  `sorrend` tinyint(4) NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table feladatok-gamf-web-2.menu: ~13 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`url`, `nev`, `szulo`, `jogosultsag`, `sorrend`) VALUES
	('admin', 'Admin', '', '001', 80),
	('alapinfok', 'Cégadatok', 'elerhetoseg', '111', 40),
	('belepes', 'Belépés', '', '100', 120),
	('elerhetoseg', 'Elérhetőség', '', '111', 20),
	('felhfelvisz', 'Felhasználó fölvitele', 'admin', '001', 64),
	('felhmod', 'Felhasználó módosítása', 'admin', '001', 66),
	('hirekfelvisz', 'Hír felvitele', 'hireklista', '011', 102),
	('hireklista', 'Híreink', '', '111', 101),
	('kiegeszitesek', 'További céginformációk', 'elerhetoseg', '011', 50),
	('kilepes', 'Kilépés', '', '011', 121),
	('linkek', 'Linkek', '', '000', 30),
	('nyitolap', 'Nyitólap', '', '111', 10),
	('regisztracio', 'Regisztráció', '', '100', 123);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
