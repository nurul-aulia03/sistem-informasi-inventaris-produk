-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.4.3 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table toko_db.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table toko_db.products: ~8 rows (approximately)
INSERT INTO `products` (`id`, `nama_produk`, `kategori`, `harga`, `stok`) VALUES
	(1, 'Celana Chino', 'Pakaian', 150000.00, 20),
	(2, 'Jaket Hoodie', 'Pakaian', 20000.00, 15),
	(6, 'Monitor LED 24 Inch', 'Elektronik', 1800000.00, 12),
	(7, 'Mouse Wireless Logitech', 'Elektronik', 150000.00, 8),
	(8, 'Keyboard Mechanical RGB', 'Elektronik', 450000.00, 11),
	(9, 'Sepatu Sneakers Casua', 'Pakaian', 350000.00, 14),
	(10, 'Susu UHT Full Cream 1L', 'Makanan & Minuman', 12000.00, 16),
	(11, 'Kopi Kapal Api Special 165g', 'Makanan & Minuman', 24000.00, 12);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
