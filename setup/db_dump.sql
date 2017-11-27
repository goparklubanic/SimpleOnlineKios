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
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `barang`
--

DROP TABLE IF EXISTS `barang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barang` (
  `kd_barang` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(30) DEFAULT NULL,
  `kategori` tinytext,
  `stok_barang` int(3) DEFAULT '0',
  `harga_barang` int(11) DEFAULT NULL,
  `warna_barang` varchar(20) DEFAULT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  UNIQUE KEY `kd_barang` (`kd_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barang`
--

LOCK TABLES `barang` WRITE;
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT INTO `barang` VALUES ('112','Barang 112','test',18,59999,'Merah','112.png'),('113','Barang 113','test',16,44999,'Kuning','113.png'),('114','Item #114','test',18,75000,'light green','114.png'),('111','Item 111','test',16,42500,'Pink','111.png');
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `barangTransaksi`
--

DROP TABLE IF EXISTS `barangTransaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `barangTransaksi` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `kd_transaksi` varchar(5) DEFAULT NULL,
  `kd_barang` varchar(10) DEFAULT NULL,
  `qty` int(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `barangTransaksi`
--

LOCK TABLES `barangTransaksi` WRITE;
/*!40000 ALTER TABLE `barangTransaksi` DISABLE KEYS */;
INSERT INTO `barangTransaksi` VALUES (1,'11001','111',2),(2,'11001','113',2),(3,'11001','112',2),(7,'11002','111',2),(8,'11003','113',1),(9,'11003','114',2),(10,'11003','113',1);
/*!40000 ALTER TABLE `barangTransaksi` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`faholi`@`localhost`*/ /*!50003 trigger stokKurang before insert on barangTransaksi
  for each row
  begin
    update barang set stok_barang=stok_barang - new.qty
    where kd_barang = new.kd_barang;
  end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`faholi`@`localhost`*/ /*!50003 trigger stokKembali after delete on barangTransaksi   for each row   begin     update barang set stok_barang=stok_barang + old.qty     where kd_barang = old.kd_barang;   end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id_member` varchar(10) DEFAULT NULL,
  `password_member` varchar(32) DEFAULT NULL,
  `nama_member` varchar(30) NOT NULL,
  `alamat` varchar(40) DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  UNIQUE KEY `id_member` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('as-001','da2ba56bfcde0b43976d5f19fae66399','Member Nomor Hiji','Kebaon 01/02 Kutabanjar, Banjarnegara','0881 6996 6161'),('as-002','5ac77016557edcb5dc8ee2804c2de547','Member Number Duo','Parakancanggah, 1/4 Banjarnegara','0811 1234 1234'),('as-003','b7a861f8adc9a72c563219b922249d82','Member Number Tilu','Krandegan, 2/7 Banjarnegara','0852 1234 5678'),('1711240001','a1f1cf041c07db39b37254bcdeb05008','Sugeng Sontoloyo','Jl. Sunan Gripit 34 Tambakan','0888 0661 5656');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pegawai`
--

DROP TABLE IF EXISTS `pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) DEFAULT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `password_pegawai` varchar(32) DEFAULT NULL,
  UNIQUE KEY `id_pegawai` (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pegawai`
--

LOCK TABLES `pegawai` WRITE;
/*!40000 ALTER TABLE `pegawai` DISABLE KEYS */;
INSERT INTO `pegawai` VALUES ('pg-001','Sujail Man','cb73710a565bf8d5ef71cfb2ee631e62'),('pg-002','Marjuki Biusman','cf4dca81f298301a6f35bac9ed9c1bfe'),('pg-003','Mustakim Plahanere','8199e6164b8fdd7c622fdaba59ad8733');
/*!40000 ALTER TABLE `pegawai` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengunjung`
--

DROP TABLE IF EXISTS `pengunjung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengunjung` (
  `id_pengunjung` varchar(10) DEFAULT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengunjung`
--

LOCK TABLES `pengunjung` WRITE;
/*!40000 ALTER TABLE `pengunjung` DISABLE KEYS */;
INSERT INTO `pengunjung` VALUES ('1711240001','2017-11-24 02:38:04');
/*!40000 ALTER TABLE `pengunjung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stok_masuk`
--

DROP TABLE IF EXISTS `stok_masuk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stok_masuk` (
  `id_input` varchar(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `kd_barang` varchar(10) DEFAULT NULL,
  `jumlah` int(3) DEFAULT '0',
  UNIQUE KEY `id_input` (`id_input`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stok_masuk`
--

LOCK TABLES `stok_masuk` WRITE;
/*!40000 ALTER TABLE `stok_masuk` DISABLE KEYS */;
INSERT INTO `stok_masuk` VALUES ('171124-111','2017-11-24','111',20),('171124-112','2017-11-24','112',1),('171124-113','2017-11-24','113',2),('171124-114','2017-11-24','114',5);
/*!40000 ALTER TABLE `stok_masuk` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`faholi`@`localhost`*/ /*!50003 trigger stokTambah after insert on stok_masuk   for each row   begin     update barang set stok_barang=stok_barang + new.jumlah     where kd_barang = new.kd_barang;   end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `kd_transaksi` varchar(5) DEFAULT NULL,
  `id_member` varchar(10) DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `status` enum('Aktif','Menunggu','Lunas','Batal') DEFAULT 'Aktif',
  UNIQUE KEY `kd_transaksi` (`kd_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES ('11001','1711240001','2017-11-27','Menunggu'),('11002','as-002','2017-11-27','Menunggu'),('11003','as-003','2017-11-27','Menunggu');
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `view_barangTransaksi`
--

DROP TABLE IF EXISTS `view_barangTransaksi`;
/*!50001 DROP VIEW IF EXISTS `view_barangTransaksi`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `view_barangTransaksi` (
  `kd_transaksi` tinyint NOT NULL,
  `kd_barang` tinyint NOT NULL,
  `nama_barang` tinyint NOT NULL,
  `qty` tinyint NOT NULL,
  `harga_barang` tinyint NOT NULL,
  `jumlah` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `view_barangTransaksi`
--

/*!50001 DROP TABLE IF EXISTS `view_barangTransaksi`*/;
/*!50001 DROP VIEW IF EXISTS `view_barangTransaksi`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`faholi`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `view_barangTransaksi` AS select `barangTransaksi`.`kd_transaksi` AS `kd_transaksi`,`barangTransaksi`.`kd_barang` AS `kd_barang`,`barang`.`nama_barang` AS `nama_barang`,`barangTransaksi`.`qty` AS `qty`,`barang`.`harga_barang` AS `harga_barang`,(`barangTransaksi`.`qty` * `barang`.`harga_barang`) AS `jumlah` from (`barangTransaksi` join `barang`) where (`barang`.`kd_barang` = `barangTransaksi`.`kd_barang`) order by `barangTransaksi`.`kd_transaksi` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-27 15:20:11
