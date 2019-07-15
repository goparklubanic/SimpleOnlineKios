-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: faholistore
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES ('112','Barang 112','test',16,59999,'Merah','112.png'),('113','Barang 113','test',16,44999,'Kuning','113.png'),('114','Item #114','test',16,75000,'light green','114.png'),('111','Item 111','test',12,42500,'Merah Jambu','111.png');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `barangTransaksi`
--

LOCK TABLES `barangTransaksi` WRITE;
/*!40000 ALTER TABLE `barangTransaksi` DISABLE KEYS */;
INSERT INTO `barangTransaksi` VALUES (1,'11001','111',2),(2,'11001','113',2),(3,'11001','112',2),(7,'11002','111',2),(8,'11003','113',1),(9,'11003','114',2),(10,'11003','113',1),(11,'11004','112',1),(14,'11004','111',2),(16,'11004','112',1),(17,'11005','111',1),(18,'11006','113',1),(19,'11007','114',2),(20,'11007','111',1);
/*!40000 ALTER TABLE `barangTransaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('as-001','da2ba56bfcde0b43976d5f19fae66399','Member Nomor Hiji','Kebaon 01/02 Kutabanjar, Banjarnegara','0881 6996 6161'),('as-002','5ac77016557edcb5dc8ee2804c2de547','Member Number Duo','Parakancanggah, 1/4 Banjarnegara','0811 1234 1234'),('as-003','b7a861f8adc9a72c563219b922249d82','Member Number Three','Krandegan, 2/7 Banjarnegara','0852 1234 5678'),('1711240001','a1f1cf041c07db39b37254bcdeb05008','Sugeng Sontoloyo','Jl. Sunan Gripit 34 Tambakan','0888 0661 5656'),('1711280003','aecc2e07e8c9c7594d7ee57de3ec3c96','Sulastri Wisa Mendemi','Kalibenda, 04/03 Banjarnegara','085271238245');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES ('pg-001','Sujail Mantoro','cb73710a565bf8d5ef71cfb2ee631e62'),('pg-002','Marjuki Biusman','cf4dca81f298301a6f35bac9ed9c1bfe'),('pg-003','Mustakim Plahanere','8199e6164b8fdd7c622fdaba59ad8733');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pembayaran`
--

LOCK TABLES `pembayaran` WRITE;
/*!40000 ALTER TABLE `pembayaran` DISABLE KEYS */;
INSERT INTO `pembayaran` VALUES ('11001','2017-11-30',294996,'ATM','Bank Nasional Indonesia 46','1234755','valid'),('11002','2017-11-30',85000,'Transfer','Bank Rakyat Indonesia','112233445544','valid'),('11003','2017-11-30',239998,'ATM','Bank Rakyat Indonesia','1122113344','valid'),('11007','2017-11-30',192500,'ATM','Bank Nasional Indonesia 46','1234789','valid');
/*!40000 ALTER TABLE `pembayaran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `pengunjung`
--

LOCK TABLES `pengunjung` WRITE;
/*!40000 ALTER TABLE `pengunjung` DISABLE KEYS */;
INSERT INTO `pengunjung` VALUES ('1711240001','2017-11-24 02:38:04'),('1711280001','2017-11-27 22:49:38'),('1711280002','2017-11-27 23:12:03'),('1711280003','2017-11-27 23:13:07');
/*!40000 ALTER TABLE `pengunjung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `stok_masuk`
--

LOCK TABLES `stok_masuk` WRITE;
/*!40000 ALTER TABLE `stok_masuk` DISABLE KEYS */;
INSERT INTO `stok_masuk` VALUES ('171124-111','2017-11-24','111',20),('171124-112','2017-11-24','112',1),('171124-113','2017-11-24','113',2),('171124-114','2017-11-24','114',5);
/*!40000 ALTER TABLE `stok_masuk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES ('11001','1711240001','2017-11-27','Lunas'),('11002','as-002','2017-11-27','Lunas'),('11003','as-003','2017-11-27','Lunas'),('11004','1711280003','2017-11-28','Menunggu'),('11005','as-003','2017-11-28','Menunggu'),('11006','1711280003','2017-11-29','Menunggu'),('11007','as-003','2017-11-29','Lunas');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-30 12:41:46
