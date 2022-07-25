-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table db_ta_taral.guru
CREATE TABLE IF NOT EXISTS `guru` (
  `nip` varchar(18) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gelar_depan` varchar(50) NOT NULL,
  `gelar_belakang` varchar(50) NOT NULL,
  `pendidikan_terakhir` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  PRIMARY KEY (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ta_taral.guru: ~0 rows (approximately)
DELETE FROM `guru`;
/*!40000 ALTER TABLE `guru` DISABLE KEYS */;
INSERT INTO `guru` (`nip`, `nama`, `gelar_depan`, `gelar_belakang`, `pendidikan_terakhir`, `email`, `no_hp`, `alamat`) VALUES
	('198303052008101001', 'Asmah Zakaria', '', 'S. Pd', 'Strata 1', 'asmahzakari@gmail.com', '082165401626', 'Lhokseumawe');
/*!40000 ALTER TABLE `guru` ENABLE KEYS */;

-- Dumping structure for table db_ta_taral.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nip_guru` varchar(18) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `finalisasi` varchar(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ta_taral.kelas: ~1 rows (approximately)
DELETE FROM `kelas`;
/*!40000 ALTER TABLE `kelas` DISABLE KEYS */;
INSERT INTO `kelas` (`id`, `nip_guru`, `tahun_ajaran_id`, `nama`, `finalisasi`) VALUES
	(1, '198303052008101001', 1, 'XI IPA 6', '1');
/*!40000 ALTER TABLE `kelas` ENABLE KEYS */;

-- Dumping structure for table db_ta_taral.mapel
CREATE TABLE IF NOT EXISTS `mapel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kelas_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kkm` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ta_taral.mapel: ~2 rows (approximately)
DELETE FROM `mapel`;
/*!40000 ALTER TABLE `mapel` DISABLE KEYS */;
INSERT INTO `mapel` (`id`, `kelas_id`, `tahun_ajaran_id`, `nama`, `kkm`) VALUES
	(1, 1, 1, 'Pendidikan Pancasila dan Kewarganegaraan', 85);
/*!40000 ALTER TABLE `mapel` ENABLE KEYS */;

-- Dumping structure for table db_ta_taral.siswa
CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `status_keluarga` varchar(50) NOT NULL,
  `urutan_anak` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `kelas_masuk` varchar(12) NOT NULL,
  `no_telp` varchar(16) DEFAULT ' ',
  `ayah` varchar(100) NOT NULL,
  `ibu` varchar(100) NOT NULL,
  `wali` varchar(100) DEFAULT ' ',
  `alamat_ayah` text NOT NULL,
  `alamat_ibu` text NOT NULL,
  `alamat_wali` text,
  `no_hp_ayah` varchar(16) NOT NULL,
  `no_hp_ibu` varchar(16) NOT NULL,
  `no_hp_wali` varchar(16) DEFAULT ' ',
  `pekerjaan_ayah` text NOT NULL,
  `pekerjaan_ibu` text NOT NULL,
  `pekerjaan_wali` text NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ta_taral.siswa: ~0 rows (approximately)
DELETE FROM `siswa`;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
INSERT INTO `siswa` (`nis`, `nisn`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `status_keluarga`, `urutan_anak`, `alamat`, `tgl_masuk`, `kelas_masuk`, `no_telp`, `ayah`, `ibu`, `wali`, `alamat_ayah`, `alamat_ibu`, `alamat_wali`, `no_hp_ayah`, `no_hp_ibu`, `no_hp_wali`, `pekerjaan_ayah`, `pekerjaan_ibu`, `pekerjaan_wali`) VALUES
	('0001', '', 'Umar Khalil', 'Bireuen', '1997-06-19', 'L', 'Islam', '', '', 'Lhokseumawe', '2022-07-01', '1', '', 'Nurdin', 'Asmah', '', '', '', '', '081361143388', '081361143388', '', '', '', '');
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;

-- Dumping structure for table db_ta_taral.siswa_ekskul
CREATE TABLE IF NOT EXISTS `siswa_ekskul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ta_taral.siswa_ekskul: ~0 rows (approximately)
DELETE FROM `siswa_ekskul`;
/*!40000 ALTER TABLE `siswa_ekskul` DISABLE KEYS */;
INSERT INTO `siswa_ekskul` (`id`, `nis`, `tahun_ajaran_id`, `kelas_id`, `nama`, `keterangan`) VALUES
	(1, '0001', 1, 1, 'Pramuka', '-');
/*!40000 ALTER TABLE `siswa_ekskul` ENABLE KEYS */;

-- Dumping structure for table db_ta_taral.siswa_kelas
CREATE TABLE IF NOT EXISTS `siswa_kelas` (
  `nis` varchar(10) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `jumlah_np` int(4) NOT NULL DEFAULT '0',
  `jumlah_nk` int(4) NOT NULL DEFAULT '0',
  `rata_rata_np` float NOT NULL DEFAULT '0',
  `rata_rata_nk` float NOT NULL DEFAULT '0',
  `rangking` int(2) NOT NULL DEFAULT '0',
  `catatan_wali_kelas` text NOT NULL,
  `deskripsi_sikap` text NOT NULL,
  `keterangan` text NOT NULL,
  `sakit` int(2) DEFAULT '0',
  `izin` int(2) DEFAULT '0',
  `absen` int(2) DEFAULT '0',
  PRIMARY KEY (`nis`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ta_taral.siswa_kelas: ~1 rows (approximately)
DELETE FROM `siswa_kelas`;
/*!40000 ALTER TABLE `siswa_kelas` DISABLE KEYS */;
INSERT INTO `siswa_kelas` (`nis`, `tahun_ajaran_id`, `kelas_id`, `jumlah_np`, `jumlah_nk`, `rata_rata_np`, `rata_rata_nk`, `rangking`, `catatan_wali_kelas`, `deskripsi_sikap`, `keterangan`, `sakit`, `izin`, `absen`) VALUES
	('0001', 1, 1, 98, 100, 98, 100, 0, '-', 'Selalu bersyukur,selalu berdoa sebelum melakukan kegiatan dan perlu meningkatkan ketaatan beribadah selalu bersikap sopan,santun,peduli,percaya diri,disiplin dan tanggung jawab', '', 1, 1, 1);
/*!40000 ALTER TABLE `siswa_kelas` ENABLE KEYS */;

-- Dumping structure for table db_ta_taral.siswa_nilai
CREATE TABLE IF NOT EXISTS `siswa_nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `type` varchar(2) NOT NULL,
  `nilai` int(3) NOT NULL DEFAULT '0',
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ta_taral.siswa_nilai: ~2 rows (approximately)
DELETE FROM `siswa_nilai`;
/*!40000 ALTER TABLE `siswa_nilai` DISABLE KEYS */;
INSERT INTO `siswa_nilai` (`id`, `nis`, `tahun_ajaran_id`, `kelas_id`, `mapel_id`, `type`, `nilai`, `keterangan`) VALUES
	(1, '0001', 1, 1, 1, 'np', 98, 'Kurang, belum menyakini hormat dan patuh pada orang tua dan guru sebagai kewajiban agama dan menjaga kebersamaan dengan orang lain dengan saling menasihati melalui khutbah, tablig dan dakwah'),
	(2, '0001', 1, 1, 1, 'nk', 100, 'Kurang, belum menyakini hormat dan patuh pada orang tua dan guru sebagai kewajiban agama dan menjaga kebersamaan dengan orang lain dengan saling menasihati melalui khutbah, tablig dan dakwah');
/*!40000 ALTER TABLE `siswa_nilai` ENABLE KEYS */;

-- Dumping structure for table db_ta_taral.siswa_prestasi
CREATE TABLE IF NOT EXISTS `siswa_prestasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nis` varchar(10) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ta_taral.siswa_prestasi: ~0 rows (approximately)
DELETE FROM `siswa_prestasi`;
/*!40000 ALTER TABLE `siswa_prestasi` DISABLE KEYS */;
INSERT INTO `siswa_prestasi` (`id`, `nis`, `tahun_ajaran_id`, `kelas_id`, `nama`, `keterangan`) VALUES
	(1, '0001', 1, 1, 'Juara Olimpiade TIK Nasional', 'Juara 1 tingkat kabupaten');
/*!40000 ALTER TABLE `siswa_prestasi` ENABLE KEYS */;

-- Dumping structure for table db_ta_taral.tahun_ajaran
CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tahun_ajaran` varchar(100) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `status` varchar(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table db_ta_taral.tahun_ajaran: ~0 rows (approximately)
DELETE FROM `tahun_ajaran`;
/*!40000 ALTER TABLE `tahun_ajaran` DISABLE KEYS */;
INSERT INTO `tahun_ajaran` (`id`, `tahun_ajaran`, `semester`, `status`) VALUES
	(1, '2022/2023', 'Ganjil', 'Aktif');
/*!40000 ALTER TABLE `tahun_ajaran` ENABLE KEYS */;

-- Dumping structure for table db_ta_taral.users
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(18) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(8) NOT NULL,
  `status` varchar(10) NOT NULL,
  `last_login` datetime NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table db_ta_taral.users: ~4 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`username`, `password`, `level`, `status`, `last_login`) VALUES
	('0001', '$2y$10$u88bQiaYr8CSkJxklTdZV.mNIejT1yQnx1/3i8ibQUM3EZu/HIp9m', 'siswa', 'aktif', '0000-00-00 00:00:00'),
	('198303052008101001', '$2y$10$R7tyD5b7wzli/waHE2l/BuXK279VQbwWHY44yXnhUIEZGFt58two6', 'guru', 'aktif', '0000-00-00 00:00:00'),
	('admin_2', '$2y$10$D6ij0KLIZfTUENBUkB/W2.QCLRHYP15k2DFlytmRBpeOexWS7uzjm', 'admin', 'aktif', '0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
