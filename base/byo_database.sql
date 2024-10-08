-- --------------------------------------------------------
-- Anfitrião:                    127.0.0.1
-- Versão do servidor:           10.4.27-MariaDB - mariadb.org binary distribution
-- SO do servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- A despejar estrutura da base de dados para byo_database
CREATE DATABASE IF NOT EXISTS `byo_database` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `byo_database`;

-- A despejar estrutura para tabela byo_database.cases
CREATE TABLE IF NOT EXISTS `cases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `img` varchar(200) NOT NULL,
  `form` varchar(45) NOT NULL,
  `graphicsdime` int(100) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `stock` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.cases: ~5 rows (aproximadamente)
DELETE FROM `cases`;
/*!40000 ALTER TABLE `cases` DISABLE KEYS */;
INSERT INTO `cases` (`id`, `name`, `img`, `form`, `graphicsdime`, `price`, `stock`) VALUES
	(1, 'Corsair 4000D', 'https://cdna.pcpartpicker.com/static/forever/images/product/bc6e987da3fe22c616898d1d7fa3d227.1600.jpg', 'ATX', 360, 109, 0),
	(2, 'Lian Li O11 Dynamic EVO', 'https://cdna.pcpartpicker.com/static/forever/images/product/ea0dee3c3376cc6326ca2f4a73a054ac.1600.jpg', 'ATX', 422, 160, 1),
	(3, 'NZXT H510', 'https://cdna.pcpartpicker.com/static/forever/images/product/cddea328a7447afc83e6b561f9448abb.1600.jpg', 'ATX', 381, 159, 0),
	(4, 'Fractal Design North', 'https://cdna.pcpartpicker.com/static/forever/images/product/1977a3a3f6f1238d12ea2a555be4d7ce.1600.jpg', 'ATX', 300, 149, 1),
	(5, 'Lian Li LANCOOL 216', 'https://cdna.pcpartpicker.com/static/forever/images/product/f4d776081b676d3dbf78ac6db48be9d6.1600.jpg', 'ATX', 392, 104, 1);
/*!40000 ALTER TABLE `cases` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.coolers
CREATE TABLE IF NOT EXISTS `coolers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `rpm` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `stock` tinyint(4) NOT NULL DEFAULT 0,
  `img` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.coolers: ~5 rows (aproximadamente)
DELETE FROM `coolers`;
/*!40000 ALTER TABLE `coolers` DISABLE KEYS */;
INSERT INTO `coolers` (`id`, `name`, `rpm`, `size`, `price`, `stock`, `img`) VALUES
	(1, 'Hyper 212 RGB Black Edition', 2000, 159, 45, 1, 'https://cdna.pcpartpicker.com/static/forever/images/product/16dca5ad82a279a9232b0cbcb6ed71bf.1600.jpg'),
	(2, 'MASTERLIQUID ML240L RGB V2', 1800, 240, 71, 1, 'https://cdna.pcpartpicker.com/static/forever/images/product/5b6a5e7f4cf456ccf6415235cf7adc99.1600.jpg'),
	(3, 'NZXT Kraken X53', 2000, 240, 169, 0, 'https://cdna.pcpartpicker.com/static/forever/images/product/098f91f23535f45875611413e7b892d6.1600.jpg'),
	(4, 'Noctua NH-D15', 1500, 165, 101, 0, 'https://cdna.pcpartpicker.com/static/forever/images/product/ca16d42d3e187f96c728c09183df14a7.med.1600.jpg'),
	(5, 'be quiet! Pure Rock Slim 2', 1400, 135, 49, 1, 'https://cdna.pcpartpicker.com/static/forever/images/product/98bb44b33e99e3c03b12d76609433d62.1600.jpg');
/*!40000 ALTER TABLE `coolers` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.coolers_sockets
CREATE TABLE IF NOT EXISTS `coolers_sockets` (
  `cooler_id` int(11) NOT NULL,
  `socket_id` int(11) NOT NULL,
  KEY `idx_coolers_sockets_cooler_id` (`cooler_id`),
  KEY `idx_coolers_sockets_socket_id` (`socket_id`),
  CONSTRAINT `coolers_sockets_ibfk_1` FOREIGN KEY (`cooler_id`) REFERENCES `coolers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `coolers_sockets_ibfk_2` FOREIGN KEY (`socket_id`) REFERENCES `sockets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.coolers_sockets: ~19 rows (aproximadamente)
DELETE FROM `coolers_sockets`;
/*!40000 ALTER TABLE `coolers_sockets` DISABLE KEYS */;
INSERT INTO `coolers_sockets` (`cooler_id`, `socket_id`) VALUES
	(1, 1),
	(1, 2),
	(1, 3),
	(1, 6),
	(2, 1),
	(2, 2),
	(2, 3),
	(2, 5),
	(2, 6),
	(3, 1),
	(3, 2),
	(3, 3),
	(3, 4),
	(3, 5),
	(3, 6),
	(4, 1),
	(4, 2),
	(4, 3),
	(4, 5),
	(4, 6);
/*!40000 ALTER TABLE `coolers_sockets` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.cpus
CREATE TABLE IF NOT EXISTS `cpus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `img` varchar(200) NOT NULL,
  `cores` int(11) NOT NULL,
  `graphics` varchar(200) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT 0,
  `stock` tinyint(4) NOT NULL DEFAULT 0,
  `socket` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.cpus: ~10 rows (aproximadamente)
DELETE FROM `cpus`;
/*!40000 ALTER TABLE `cpus` DISABLE KEYS */;
INSERT INTO `cpus` (`id`, `name`, `img`, `cores`, `graphics`, `price`, `stock`, `socket`) VALUES
	(1, 'AMD Ryzen 5 5600X', 'https://cdna.pcpartpicker.com/static/forever/images/product/3ef757133d38ac40afe75da691ba7d60.1600.jpg', 6, '0', 200, 1, 'AM4'),
	(2, 'AMD Threadripper 3990X', 'https://cdna.pcpartpicker.com/static/forever/images/product/7e2e7fecadc261c89c70cf3965a97a28.1600.jpg', 64, '0', 6403, 0, 'sTRX4'),
	(3, 'AMD Ryzen 5 5600G', 'https://cdna.pcpartpicker.com/static/forever/images/product/1dd09dfdc581be6224a323d49d714c7f.1600.jpg', 6, 'Radeon Vega 7', 157, 1, 'AM4'),
	(4, 'AMD Ryzen 7 7700X', 'https://cdna.pcpartpicker.com/static/forever/images/product/6d3fb7600f26fb1e94e8b0c1a99e0bfa.1600.jpg', 8, 'Radeon', 406, 1, 'AM5'),
	(5, 'AMD Ryzen 9 7950X', 'https://cdna.pcpartpicker.com/static/forever/images/product/8de723005cfc1b85071c4abf4d76bd4e.1600.jpg', 16, 'Radeon', 690, 1, 'AM5'),
	(6, 'Intel Core i3-12100F', 'https://cdna.pcpartpicker.com/static/forever/images/product/c67d8f42c0e57b268f068172e9a3f571.1600.jpg', 4, '0', 110, 1, 'LGA1700'),
	(7, 'Intel Core i9-12900K', 'https://cdna.pcpartpicker.com/static/forever/images/product/b9d3c68bbf713cdd1211f3792040ce95.1600.jpg', 16, 'Intel UHD Graphics 770', 557, 1, 'LGA1700'),
	(8, 'Intel Core i5-13400F', 'https://cdna.pcpartpicker.com/static/forever/images/product/17d82d241bff0efdd1c32fbcf9822c14.1600.jpg', 10, '0', 240, 1, 'LGA1700'),
	(9, 'Intel Core i7-11700K', 'https://cdna.pcpartpicker.com/static/forever/images/product/41358d31a00cc8fb673bfa7716ea9498.1600.jpg', 8, 'Intel UHD Graphics 750', 333, 1, 'LGA1200'),
	(10, 'Intel Core i9-9900K', 'https://cdna.pcpartpicker.com/static/forever/images/product/76f85d74fb4d0e2cc31f940bee5905c4.1600.jpg', 8, 'Intel UHD Graphics 630', 572, 0, 'LGA1151');
/*!40000 ALTER TABLE `cpus` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.donepcs
CREATE TABLE IF NOT EXISTS `donepcs` (
  `users_id` int(11) NOT NULL,
  `cpus_id` int(11) NOT NULL,
  `coolers_id` int(11) NOT NULL,
  `motherboards1_id` int(11) NOT NULL,
  `rams1_id` int(11) NOT NULL,
  `graphicscards1_id` int(11) NOT NULL,
  `storages1_id` int(11) NOT NULL,
  `powersupplys1_id` int(11) NOT NULL,
  `cases1_id` int(11) DEFAULT NULL,
  KEY `fk_donepcs_users1_idx` (`users_id`),
  KEY `fk_donepcs_cpus1_idx` (`cpus_id`),
  KEY `fk_donepcs_coolers1_idx` (`coolers_id`),
  KEY `fk_donepcs_motherboards1` (`motherboards1_id`),
  KEY `fk_donepcs_rams1` (`rams1_id`),
  KEY `fk_donepcs_graphicscard1` (`graphicscards1_id`),
  KEY `fk_donepcs_storages1` (`storages1_id`),
  KEY `fk_donepcs_powersupplys1` (`powersupplys1_id`),
  KEY `fk_donepcs_cases1` (`cases1_id`),
  CONSTRAINT `fk_donepcs_cases1` FOREIGN KEY (`cases1_id`) REFERENCES `cases` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_donepcs_coolers1` FOREIGN KEY (`coolers_id`) REFERENCES `coolers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_donepcs_cpus1` FOREIGN KEY (`cpus_id`) REFERENCES `cpus` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_donepcs_graphicscard1` FOREIGN KEY (`graphicscards1_id`) REFERENCES `graphicscards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_donepcs_motherboards1` FOREIGN KEY (`motherboards1_id`) REFERENCES `motherboards` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_donepcs_powersupplys1` FOREIGN KEY (`powersupplys1_id`) REFERENCES `powersupplys` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_donepcs_rams1` FOREIGN KEY (`rams1_id`) REFERENCES `rams` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_donepcs_storages1` FOREIGN KEY (`storages1_id`) REFERENCES `storages` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_donepcs_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.donepcs: ~6 rows (aproximadamente)
DELETE FROM `donepcs`;
/*!40000 ALTER TABLE `donepcs` DISABLE KEYS */;
/*!40000 ALTER TABLE `donepcs` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.graphicscards
CREATE TABLE IF NOT EXISTS `graphicscards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `vRam` varchar(45) NOT NULL,
  `dimensions` varchar(45) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `stock` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.graphicscards: ~9 rows (aproximadamente)
DELETE FROM `graphicscards`;
/*!40000 ALTER TABLE `graphicscards` DISABLE KEYS */;
INSERT INTO `graphicscards` (`id`, `name`, `img`, `vRam`, `dimensions`, `price`, `stock`) VALUES
	(1, 'MSI GeForce RTX 3060', 'https://cdna.pcpartpicker.com/static/forever/images/product/dbc81b89efc82ce66fb2e3ab7e0f0658.1600.jpg', '12', '235', 399, 1),
	(2, 'ASRock Radeon RX6700XT', 'https://cdna.pcpartpicker.com/static/forever/images/product/2270978db545fc416882d48b1c08a55a.1600.jpg', '12', '269', 699, 0),
	(3, 'Asus DUAL EVO OC GeForce RTX 2060', 'https://m.media-amazon.com/images/I/51FcVHzQHZL.jpg', '6', '242', 449, 1),
	(4, 'Asus TUF GAMING GeForce RTX 4080', 'https://cdna.pcpartpicker.com/static/forever/images/product/0c4f932e961917b184da3e46860d39a4.1600.jpg', '16', '348', 1625, 1),
	(5, 'XFX Speedster MERC 310 Black Edition Radeon RX 7900', 'https://m.media-amazon.com/images/I/41KTQkxkKHL.jpg', '24', '344', 935, 1),
	(6, 'MSI GAMING Z TRIO GeForce RTX 3080', 'https://cdna.pcpartpicker.com/static/forever/images/product/f6887de4a4ca1fc2481f44e68961e0c4.1600.jpg', '10', '323', 1200, 0),
	(7, 'PowerColor Fighter Radeon RX 6600', 'https://m.media-amazon.com/images/I/41Z+tPcosjL.jpg', '8', '200', 269, 1),
	(8, 'Gigabyte WINDFORCE OC 3X GeForce RTX 2070', 'https://m.media-amazon.com/images/I/41mBMT6Uq9L.jpg', '8', '280', 267, 0),
	(9, 'MSI VENTUS XS OC GeForce GTX 1660 SUPER', 'https://cdna.pcpartpicker.com/static/forever/images/product/9c57e7f04b05270bcf7edb9fcf4c715c.1600.jpg', '6', '204', 258, 1);
/*!40000 ALTER TABLE `graphicscards` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.motherboards
CREATE TABLE IF NOT EXISTS `motherboards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `img` varchar(200) NOT NULL,
  `socket` varchar(45) NOT NULL,
  `form` varchar(45) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` tinyint(4) NOT NULL,
  `maxRam` varchar(45) NOT NULL,
  `typeRam` varchar(45) NOT NULL,
  `slotsRam` int(11) NOT NULL,
  `slotsM2` int(11) NOT NULL,
  `slotsSata` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.motherboards: ~6 rows (aproximadamente)
DELETE FROM `motherboards`;
/*!40000 ALTER TABLE `motherboards` DISABLE KEYS */;
INSERT INTO `motherboards` (`id`, `name`, `img`, `socket`, `form`, `price`, `stock`, `maxRam`, `typeRam`, `slotsRam`, `slotsM2`, `slotsSata`) VALUES
	(1, 'Asus TUF GAMING X570-PLUS', 'https://cdna.pcpartpicker.com/static/forever/images/product/8d7d0435e8a2af93b5d91a1a5dccd476.1600.jpg', 'AM4', 'ATX', 249, 0, '128', 'DDR4', 4, 2, 8),
	(2, 'MSI MAG B660 TOMAHAWK WIFI', 'https://cdna.pcpartpicker.com/static/forever/images/product/62befea3ebf04f78b865687fab11c7b1.1600.jpg', 'LGA1700', 'ATX', 232, 1, '128', 'DDR4', 4, 4, 6),
	(3, 'Gigabyte B650 AORUS ELITE', 'https://cdna.pcpartpicker.com/static/forever/images/product/322a6059c413dd736536e5ad5c3a2285.1600.jpg', 'AM5', 'ATX', 154, 0, '128', 'DDR5', 4, 3, 4),
	(4, 'Gigabyte B365M DS3H', 'https://img.globaldata.pt/products/90MB18L0-M0EAY0.jpg?auto=compress%2Cformat&fit=fill&fill-color=fff&q=70&fill=solid&w=926&h=926', 'LGA1151', 'ATX', 66, 1, '64', 'DDR4', 4, 1, 6),
	(5, 'ASRock Z590 Pro4', 'https://cdna.pcpartpicker.com/static/forever/images/product/c903b7364d370600516f81632584f25f.1600.jpg', 'LGA1200', 'ATX', 216, 1, '128', 'DDR4', 4, 3, 6),
	(6, 'ASRock TRX40', 'https://cdna.pcpartpicker.com/static/forever/images/product/8e37f27d79fb02cde718cc440e739dc0.1600.jpg', 'sTRX4', 'ATX', 149, 1, '256', 'DDR4', 8, 3, 8);
/*!40000 ALTER TABLE `motherboards` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.powersupplys
CREATE TABLE IF NOT EXISTS `powersupplys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `img` varchar(200) NOT NULL,
  `form` varchar(45) NOT NULL,
  `modular` varchar(45) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `watts` int(10) NOT NULL,
  `stock` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.powersupplys: ~4 rows (aproximadamente)
DELETE FROM `powersupplys`;
/*!40000 ALTER TABLE `powersupplys` DISABLE KEYS */;
INSERT INTO `powersupplys` (`id`, `name`, `img`, `form`, `modular`, `price`, `watts`, `stock`) VALUES
	(1, 'Corsair RM1000x', 'https://cdna.pcpartpicker.com/static/forever/images/product/2e9c1e7ffca723f2acf802efc7f4e331.1600.jpg', 'ATX', '1', 199, 1000, 0),
	(2, 'Corsair CX750M', 'https://cdna.pcpartpicker.com/static/forever/images/product/e3f5e5e966e562c1ec685b17ed83bccb.1600.jpg', 'ATX', '0', 140, 750, 0),
	(3, 'Cooler Master V850', 'https://cdna.pcpartpicker.com/static/forever/images/product/bd2577c6ecabce9f78526a09410351e0.1600.jpg', 'SFX', '1', 170, 850, 0),
	(4, 'EVGA 500 W1', 'https://m.media-amazon.com/images/I/41iw-jgJj8L.jpg', 'ATX', '0', 40, 500, 1);
/*!40000 ALTER TABLE `powersupplys` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.rams
CREATE TABLE IF NOT EXISTS `rams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `img` varchar(200) NOT NULL,
  `typeRam` varchar(45) NOT NULL,
  `modules` int(11) NOT NULL,
  `ramSpeed` varchar(45) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `stock` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.rams: ~4 rows (aproximadamente)
DELETE FROM `rams`;
/*!40000 ALTER TABLE `rams` DISABLE KEYS */;
INSERT INTO `rams` (`id`, `name`, `img`, `typeRam`, `modules`, `ramSpeed`, `price`, `stock`) VALUES
	(1, 'Corsair Vengeance LPX 8GB', 'https://cdna.pcpartpicker.com/static/forever/images/product/835ab3efad1be13bbe53beef3e3c6f96.1600.jpg', 'DDR4', 2, '3200', 41, 1),
	(2, 'Corsair Vengeance 16 GB', 'https://m.media-amazon.com/images/I/41jJSPS8W7L.jpg', 'DDR5', 2, '5600', 152, 1),
	(3, 'G.Skill Trident Z5 RGB 16 GB', 'https://cdna.pcpartpicker.com/static/forever/images/product/e8d573bd2eac864d427645f0d2f7cad8.1600.jpg', 'DDR5', 2, '6000', 174, 1),
	(4, 'Silicon Power GAMING 16 GB', 'https://m.media-amazon.com/images/I/51w2AbYQhcS.jpg', 'DDR4', 2, '3200', 37, 0);
/*!40000 ALTER TABLE `rams` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.roles: ~2 rows (aproximadamente)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `role`) VALUES
	(1, 'admin'),
	(2, 'user');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.sockets
CREATE TABLE IF NOT EXISTS `sockets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `socket` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.sockets: ~6 rows (aproximadamente)
DELETE FROM `sockets`;
/*!40000 ALTER TABLE `sockets` DISABLE KEYS */;
INSERT INTO `sockets` (`id`, `socket`) VALUES
	(1, 'AM4'),
	(2, 'AM5'),
	(3, 'LGA1700'),
	(4, 'sTRX4'),
	(5, 'LGA1200'),
	(6, 'LGA1151');
/*!40000 ALTER TABLE `sockets` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.storages
CREATE TABLE IF NOT EXISTS `storages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `img` varchar(200) NOT NULL,
  `capacity` varchar(50) NOT NULL DEFAULT '',
  `type` varchar(45) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `stock` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.storages: ~6 rows (aproximadamente)
DELETE FROM `storages`;
/*!40000 ALTER TABLE `storages` DISABLE KEYS */;
INSERT INTO `storages` (`id`, `name`, `img`, `capacity`, `type`, `price`, `stock`) VALUES
	(1, 'Samsung 970 Evo Plus', 'https://cdna.pcpartpicker.com/static/forever/images/product/326881d073c1b667bd348893696c690e.1600.jpg', '1TB', 'M.2', 94, 1),
	(2, 'Kingston NV2', 'https://cdna.pcpartpicker.com/static/forever/images/product/7aa3028d0fc04e0ee3323f474bd349bd.1600.jpg', '500GB', 'M.2', 40, 0),
	(3, 'Seagate Barracuda Compute', 'https://cdna.pcpartpicker.com/static/forever/images/product/c7b5b7dacbecdcdd0e073b761193eef6.1600.jpg', '2TB', 'HDD', 87, 1),
	(4, 'Samsung 870 Evo', 'https://m.media-amazon.com/images/I/31ITAX-GoIL.jpg', '1TB', 'SSD', 109, 1),
	(5, 'Crucial MX500', 'https://cdna.pcpartpicker.com/static/forever/images/product/2983fbcd487b315b31855399829b532c.1600.jpg', '250GB', 'SSD', 42, 1),
	(6, 'Western Digital Blue', 'https://cdna.pcpartpicker.com/static/forever/images/product/0b9bfd76b0d511a6eff3730d12d5f95c.1600.jpg', '1TB', 'HDD', 50, 1);
/*!40000 ALTER TABLE `storages` ENABLE KEYS */;

-- A despejar estrutura para tabela byo_database.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `role_id` int(11) NOT NULL DEFAULT 2,
  PRIMARY KEY (`id`),
  KEY `fk_user_role_idx` (`role_id`),
  CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- A despejar dados para tabela byo_database.users: ~1 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
