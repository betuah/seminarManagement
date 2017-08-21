/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : db_semnas

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2017-08-21 12:54:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_byr
-- ----------------------------
DROP TABLE IF EXISTS `tb_byr`;
CREATE TABLE `tb_byr` (
  `id_bayar` char(20) NOT NULL,
  `total_bayar` varchar(10) DEFAULT NULL,
  `tgl_bayar` date DEFAULT NULL,
  `id_reg` char(20) DEFAULT NULL,
  `stat_byr` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`id_bayar`),
  KEY `fk_reg_psrt` (`id_reg`) USING BTREE,
  CONSTRAINT `fk_byr_reg` FOREIGN KEY (`id_reg`) REFERENCES `tb_reg` (`id_reg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_byr
-- ----------------------------
INSERT INTO `tb_byr` VALUES ('PAY0000000001', '15000', '2017-07-22', '20171010010001', '1');

-- ----------------------------
-- Table structure for tb_event
-- ----------------------------
DROP TABLE IF EXISTS `tb_event`;
CREATE TABLE `tb_event` (
  `id_event` char(20) NOT NULL,
  `judul_event` varchar(255) DEFAULT NULL,
  `tgl_event` date DEFAULT NULL,
  `tgl_akhir_reg` date DEFAULT NULL,
  `id_jurusan` char(6) DEFAULT NULL,
  `id_jen_event` char(6) DEFAULT NULL,
  `harga` double(6,0) DEFAULT NULL,
  `quota` int(6) DEFAULT NULL,
  `id_periode` varchar(5) DEFAULT NULL,
  `id_lokasi` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `ket` longtext,
  `batas_bayar` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_event`),
  KEY `fk_jurusan` (`id_jurusan`) USING BTREE,
  KEY `fk_jen_event` (`id_jen_event`) USING BTREE,
  KEY `fk_periode` (`id_periode`),
  CONSTRAINT `fk_jen_event` FOREIGN KEY (`id_jen_event`) REFERENCES `tb_jen_event` (`id_jen_event`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_jurusan` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_periode` FOREIGN KEY (`id_periode`) REFERENCES `tb_periode_panitia` (`id_periode`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_event
-- ----------------------------
INSERT INTO `tb_event` VALUES ('2017101001', 'Judul Seminar 1', '2017-09-16', '2017-09-10', 'JRU001', '1', '15000', '100', '20171', 'AUDI', 'bg_event_1499489272.jpg', '0', 'Keterangan', '7');
INSERT INTO `tb_event` VALUES ('2017101002', 'Judul Seminar 2', '2017-08-26', '2017-08-19', 'JRU001', '1', '50000', '1500', '20172', 'REKTORAT', 'bg_event_1499489303.jpg', '0', 'Keterangan', '7');

-- ----------------------------
-- Table structure for tb_jen_event
-- ----------------------------
DROP TABLE IF EXISTS `tb_jen_event`;
CREATE TABLE `tb_jen_event` (
  `id_jen_event` char(6) NOT NULL,
  `nama_jen` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_jen_event`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jen_event
-- ----------------------------
INSERT INTO `tb_jen_event` VALUES ('1', 'Seminar');
INSERT INTO `tb_jen_event` VALUES ('2', 'Workshop');

-- ----------------------------
-- Table structure for tb_jen_reg
-- ----------------------------
DROP TABLE IF EXISTS `tb_jen_reg`;
CREATE TABLE `tb_jen_reg` (
  `id_jen_reg` int(11) DEFAULT NULL,
  `jen_reg` varchar(50) DEFAULT NULL,
  KEY `id_jen_reg` (`id_jen_reg`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jen_reg
-- ----------------------------
INSERT INTO `tb_jen_reg` VALUES ('1', 'Peserta');
INSERT INTO `tb_jen_reg` VALUES ('2', 'Pemakalah');

-- ----------------------------
-- Table structure for tb_jurusan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jurusan`;
CREATE TABLE `tb_jurusan` (
  `id_jurusan` char(6) NOT NULL,
  `nama_jur` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jurusan
-- ----------------------------
INSERT INTO `tb_jurusan` VALUES ('JRU001', 'Teknik Informatika');
INSERT INTO `tb_jurusan` VALUES ('JRU002', 'Manajemen');
INSERT INTO `tb_jurusan` VALUES ('JRU003', 'Akutansi');
INSERT INTO `tb_jurusan` VALUES ('JRU004', 'Teknik Mesin');

-- ----------------------------
-- Table structure for tb_lokasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_lokasi`;
CREATE TABLE `tb_lokasi` (
  `id_lokasi` varchar(100) NOT NULL,
  `nama_ruangan` varchar(50) DEFAULT NULL,
  `lokasi` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_lokasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_lokasi
-- ----------------------------
INSERT INTO `tb_lokasi` VALUES ('AUDI', 'Auditorium Unpam', 'Kampus A', 'Jalan Surya Kencana No. 1, Pamulang Barat, Pamulang, Kota Tangerang Selatan, Banten 15417', '-6.345746', '106.736206');
INSERT INTO `tb_lokasi` VALUES ('REKTORAT', 'Rektorat Unpam', 'Kampus A', 'Jalan Surya Kencana No. 1, Pamulang Barat, Pamulang, Kota Tangerang Selatan, Banten 15417', '-6.345746', '106.736206');

-- ----------------------------
-- Table structure for tb_panitia
-- ----------------------------
DROP TABLE IF EXISTS `tb_panitia`;
CREATE TABLE `tb_panitia` (
  `id_panitia` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `tipe_panitia` varchar(10) DEFAULT NULL,
  `id_jurusan` char(6) DEFAULT NULL,
  `tlpn` varchar(16) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `id_type_usr` varchar(16) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_panitia`),
  KEY `fk_panitia_jur` (`id_jurusan`),
  KEY `fk_panitia_tipe_usr` (`id_type_usr`),
  CONSTRAINT `fk_panitia_jur` FOREIGN KEY (`id_jurusan`) REFERENCES `tb_jurusan` (`id_jurusan`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `fk_panitia_tipe_usr` FOREIGN KEY (`id_type_usr`) REFERENCES `tb_type_usr` (`id_type_usr`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_panitia
-- ----------------------------
INSERT INTO `tb_panitia` VALUES ('1', 'Betuah Anugerah', 'Anggota', 'JRU001', '081234234123', 'betuahanugerah@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '4', '1');
INSERT INTO `tb_panitia` VALUES ('2', 'John', 'Ketua', 'JRU001', '081234234123', 'ketua@semnas.com', '00719910bb805741e4b7f28527ecb3ad', '4', '1');
INSERT INTO `tb_panitia` VALUES ('3', 'Doe', 'Anggota', 'JRU001', '081234234123', 'anggota@semnas.com', 'dfb9e85bc0da607ff76e0559c62537e8', '4', '1');
INSERT INTO `tb_panitia` VALUES ('13', 'Doni', 'Anggota', 'JRU002', '+62 813-1010-101', 'doni@semnas.com', 'f9330f242ff516494a21d3fd94f0807f', '4', '1');
INSERT INTO `tb_panitia` VALUES ('14', 'Bagas', 'Bendahara', 'JRU002', '+62 101-0101-010', 'bagas@semnas.com', '5ffd9bb73b00bce4feeb77e2d12722da', '4', '1');
INSERT INTO `tb_panitia` VALUES ('15', 'Lilis', 'Anggota', 'JRU002', '+62 010-1010-101', 'lilis@semnas.com', '7b080e20389cc733ff4ca9525851d90f', '4', '1');
INSERT INTO `tb_panitia` VALUES ('16', 'test', 'Anggota', 'JRU001', '081310114567', 'testing@semnas.com', 'a8f5f167f44f4964e6c998dee827110c', '4', '1');
INSERT INTO `tb_panitia` VALUES ('18', 'Ruli Handrian', null, 'JRU001', '081234234123', 'rulihandrian2710@gmail.com', 'e716f5f9ab300aa5e3d62147d0d35ca3', '4', '0');
INSERT INTO `tb_panitia` VALUES ('19', 'bendahara', 'Bendahara', 'JRU001', '+62 111-2222-333', 'bendahara@semnas.com', 'c9ccd7f3c1145515a9d3f7415d5bcbea', '4', null);

-- ----------------------------
-- Table structure for tb_paper
-- ----------------------------
DROP TABLE IF EXISTS `tb_paper`;
CREATE TABLE `tb_paper` (
  `id_paper` char(10) NOT NULL,
  `nama_paper` varchar(20) DEFAULT NULL,
  `paper` varchar(30) DEFAULT NULL,
  `id_reg` char(20) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `tgl_upload` date DEFAULT NULL,
  PRIMARY KEY (`id_paper`),
  KEY `fk_reg_pmklh` (`id_reg`) USING BTREE,
  CONSTRAINT `fk_paper_reg` FOREIGN KEY (`id_reg`) REFERENCES `tb_reg` (`id_reg`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_paper
-- ----------------------------
INSERT INTO `tb_paper` VALUES ('MKH000001', 'ssfddsf', 'paper_1501918109.pdf', null, 'Waiting', '2017-08-05');

-- ----------------------------
-- Table structure for tb_periode_panitia
-- ----------------------------
DROP TABLE IF EXISTS `tb_periode_panitia`;
CREATE TABLE `tb_periode_panitia` (
  `id_periode` varchar(7) DEFAULT NULL,
  `id_panitia` int(11) DEFAULT NULL,
  `id_per` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_per`),
  KEY `id_periode` (`id_periode`),
  KEY `fk_panitia_periode` (`id_panitia`),
  CONSTRAINT `fk_panitia_periode` FOREIGN KEY (`id_panitia`) REFERENCES `tb_panitia` (`id_panitia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_periode_panitia
-- ----------------------------
INSERT INTO `tb_periode_panitia` VALUES ('20171', '1', '4');
INSERT INTO `tb_periode_panitia` VALUES ('20171', '2', '8');
INSERT INTO `tb_periode_panitia` VALUES ('20171', null, '9');
INSERT INTO `tb_periode_panitia` VALUES ('20172', '14', '12');
INSERT INTO `tb_periode_panitia` VALUES ('20172', '13', '19');

-- ----------------------------
-- Table structure for tb_reg
-- ----------------------------
DROP TABLE IF EXISTS `tb_reg`;
CREATE TABLE `tb_reg` (
  `id_reg` char(20) NOT NULL,
  `id_usr` varchar(60) DEFAULT NULL,
  `id_jen_reg` int(11) DEFAULT NULL,
  `tgl_reg` date DEFAULT NULL,
  `id_event` char(20) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `pay_date` date DEFAULT NULL,
  PRIMARY KEY (`id_reg`),
  KEY `fk_event` (`id_event`) USING BTREE,
  KEY `fk_usr` (`id_usr`) USING BTREE,
  KEY `fk_to_jen_reg` (`id_jen_reg`),
  CONSTRAINT `fk_to_evnt` FOREIGN KEY (`id_event`) REFERENCES `tb_event` (`id_event`) ON UPDATE CASCADE,
  CONSTRAINT `fk_to_jen_reg` FOREIGN KEY (`id_jen_reg`) REFERENCES `tb_jen_reg` (`id_jen_reg`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `fk_to_usr` FOREIGN KEY (`id_usr`) REFERENCES `tb_usr` (`id_usr`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_reg
-- ----------------------------
INSERT INTO `tb_reg` VALUES ('20171010010001', '2013143067', '1', '2017-07-21', '2017101001', 'barcode_150113726120171010010002.jpg', '2', null);
INSERT INTO `tb_reg` VALUES ('20171010010002', '2013142092', '1', '2017-07-27', '2017101001', 'barcode_150113726120171010010002.jpg', '0', '2017-08-03');

-- ----------------------------
-- Table structure for tb_sertifikat
-- ----------------------------
DROP TABLE IF EXISTS `tb_sertifikat`;
CREATE TABLE `tb_sertifikat` (
  `no_sertifikat` char(255) NOT NULL,
  `no_reg` char(20) DEFAULT NULL,
  `tipe_sertifikat` varchar(20) DEFAULT NULL,
  `id_event` char(20) DEFAULT NULL,
  `qr_code_sertifikat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`no_sertifikat`),
  KEY `fk_reg` (`no_reg`) USING BTREE,
  CONSTRAINT `fk_ser_reg` FOREIGN KEY (`no_reg`) REFERENCES `tb_reg` (`id_reg`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_sertifikat
-- ----------------------------
INSERT INTO `tb_sertifikat` VALUES ('820171010010001', '20171010010001', '1', '2017101001', null);

-- ----------------------------
-- Table structure for tb_speaker
-- ----------------------------
DROP TABLE IF EXISTS `tb_speaker`;
CREATE TABLE `tb_speaker` (
  `id_speaker` int(11) NOT NULL AUTO_INCREMENT,
  `id_event` varchar(20) DEFAULT NULL,
  `nama_speaker` varchar(50) DEFAULT NULL,
  `institusi` varchar(50) DEFAULT NULL,
  `foto_speaker` varchar(255) DEFAULT NULL,
  `tlpn` varchar(16) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_speaker`),
  KEY `fk_evnt` (`id_event`),
  CONSTRAINT `fk_evnt` FOREIGN KEY (`id_event`) REFERENCES `tb_event` (`id_event`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_speaker
-- ----------------------------
INSERT INTO `tb_speaker` VALUES ('10', '2017101001', 'Axe', 'Institusi01', 'speakers_1502679173.jpg', '+62 111-1111-111', 'pem1@semnas.com', null);
INSERT INTO `tb_speaker` VALUES ('11', '2017101001', 'Drow', 'Institusi02', 'speakers_1502679194.jpg', '+62 222-2222-222', 'pem2@semnas.com', null);
INSERT INTO `tb_speaker` VALUES ('12', '2017101001', 'Mirana', 'Institusi03', 'speakers_1502679216.jpg', '+62 333-3333-333', 'pem3@semnas.com', null);
INSERT INTO `tb_speaker` VALUES ('13', '2017101002', 'Pudge', 'Institusi01', 'speakers_1502679256.jpg', '+62 111-1111-111', 'pem1@semnas.com', null);
INSERT INTO `tb_speaker` VALUES ('14', '2017101002', 'Wind Rangger', 'Institusi02', 'speakers_1502679293.jpg', '+62 222-2222-222', 'pem2@semnas.com', null);
INSERT INTO `tb_speaker` VALUES ('15', '2017101002', 'Rikimaru', 'Institusi03', 'speakers_1502679511.jpg', '+62 333-3333-333', 'pem3@semnas.com', null);

-- ----------------------------
-- Table structure for tb_type_usr
-- ----------------------------
DROP TABLE IF EXISTS `tb_type_usr`;
CREATE TABLE `tb_type_usr` (
  `id_type_usr` varchar(16) NOT NULL,
  `nama_type_usr` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_type_usr`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_type_usr
-- ----------------------------
INSERT INTO `tb_type_usr` VALUES ('1', 'Super Admin');
INSERT INTO `tb_type_usr` VALUES ('2', 'Admin');
INSERT INTO `tb_type_usr` VALUES ('3', 'User');
INSERT INTO `tb_type_usr` VALUES ('4', 'Panitia');

-- ----------------------------
-- Table structure for tb_usr
-- ----------------------------
DROP TABLE IF EXISTS `tb_usr`;
CREATE TABLE `tb_usr` (
  `id_usr` varchar(60) NOT NULL,
  `nama_usr` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `jekel` varchar(20) DEFAULT NULL,
  `no_tlpn` varchar(25) DEFAULT NULL,
  `alamat_usr` text,
  `tgl_daftar` date DEFAULT NULL,
  `id_type_usr` varchar(16) DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usr`),
  KEY `fk_tipe_usr` (`id_type_usr`),
  CONSTRAINT `fk_tipe_usr` FOREIGN KEY (`id_type_usr`) REFERENCES `tb_type_usr` (`id_type_usr`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_usr
-- ----------------------------
INSERT INTO `tb_usr` VALUES ('1234567890', 'Testing User', 'ee11cbb19052e40b07aac0ca060c23ee', 'testing@semnas.com', 'Pria', '082311428337', 'Jakarta', '2017-07-07', '3', 'Mahasiswa');
INSERT INTO `tb_usr` VALUES ('2013142092', 'Nurdin', 'ee11cbb19052e40b07aac0ca060c23ee', 'nurdin@indomedica.net', 'Pria', '082311428337', 'Jakarta', '2017-07-08', '3', 'Dosen');
INSERT INTO `tb_usr` VALUES ('2013143067', 'Betuah Anugerah', 'e716f5f9ab300aa5e3d62147d0d35ca3', 'betuah@seamolec.org', 'Laki-laki', '082929292929', 'Bogor', '2017-08-13', '3', 'Mahasiswa');
INSERT INTO `tb_usr` VALUES ('2014133067', 'Testing User', '7815696ecbf1c96e6894b779456d330e', 'testing@semnas.com', 'Pria', '+62 111-1111-1111', 'asdasdasdasdasdasd', '2017-08-02', '3', 'Dosen');
INSERT INTO `tb_usr` VALUES ('admin@semnas.com', 'Admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@semnas.com', 'Pria', '082311428337', 'Alamat', '2017-07-07', '1', 'Dosen');

-- ----------------------------
-- View structure for api_byr
-- ----------------------------
DROP VIEW IF EXISTS `api_byr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `api_byr` AS SELECT
tb_byr.id_bayar,
tb_byr.total_bayar,
tb_byr.tgl_bayar,
tb_byr.stat_byr,
tb_jurusan.id_jurusan,
tb_event.id_event,
tb_reg.id_reg
FROM
tb_byr
INNER JOIN tb_reg ON tb_byr.id_reg = tb_reg.id_reg
INNER JOIN tb_event ON tb_reg.id_event = tb_event.id_event
INNER JOIN tb_jurusan ON tb_event.id_jurusan = tb_jurusan.id_jurusan ;

-- ----------------------------
-- View structure for api_reg
-- ----------------------------
DROP VIEW IF EXISTS `api_reg`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `api_reg` AS SELECT
tb_reg.id_reg,
tb_usr.nama_usr,
tb_event.judul_event,
tb_event.harga,
tb_reg.`status`,
tb_reg.pay_date
FROM
tb_reg
INNER JOIN tb_usr ON tb_reg.id_usr = tb_usr.id_usr
INNER JOIN tb_event ON tb_reg.id_event = tb_event.id_event ;

-- ----------------------------
-- View structure for api_usr
-- ----------------------------
DROP VIEW IF EXISTS `api_usr`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `api_usr` AS SELECT
tb_usr.id_usr,
tb_usr.nama_usr,
tb_usr.email,
tb_usr.jekel,
tb_usr.no_tlpn,
tb_usr.alamat_usr
FROM
tb_usr ;

-- ----------------------------
-- View structure for v_bayar
-- ----------------------------
DROP VIEW IF EXISTS `v_bayar`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_bayar` AS SELECT
tb_byr.id_bayar,
tb_byr.total_bayar,
tb_reg.id_reg,
tb_reg.id_jen_reg,
tb_event.id_event,
tb_event.harga,
tb_byr.stat_byr,
tb_byr.tgl_bayar
FROM
tb_reg
INNER JOIN tb_byr ON tb_byr.id_reg = tb_reg.id_reg
INNER JOIN tb_event ON tb_reg.id_event = tb_event.id_event ;

-- ----------------------------
-- View structure for v_detail_event
-- ----------------------------
DROP VIEW IF EXISTS `v_detail_event`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_detail_event` AS SELECT
tb_event.id_event,
tb_event.judul_event,
tb_event.tgl_event,
tb_event.tgl_akhir_reg,
tb_jurusan.nama_jur,
tb_jen_event.nama_jen,
tb_speaker.id_speaker,
tb_speaker.nama_speaker,
tb_speaker.institusi,
tb_speaker.foto_speaker,
tb_speaker.tlpn,
tb_speaker.email,
tb_event.harga,
tb_event.quota,
tb_event.foto,
tb_lokasi.nama_ruangan,
tb_lokasi.lokasi,
tb_lokasi.alamat,
tb_lokasi.lat,
tb_lokasi.`long`
FROM
tb_speaker
INNER JOIN tb_event ON tb_speaker.id_event = tb_event.id_event
INNER JOIN tb_jen_event ON tb_event.id_jen_event = tb_jen_event.id_jen_event
INNER JOIN tb_jurusan ON tb_event.id_jurusan = tb_jurusan.id_jurusan
INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi = tb_event.id_lokasi ;

-- ----------------------------
-- View structure for v_e-ticket
-- ----------------------------
DROP VIEW IF EXISTS `v_e-ticket`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_e-ticket` AS select `tb_reg`.`id_reg` AS `id_reg`,`tb_reg`.`id_usr` AS `id_usr`,`tb_reg`.`id_jen_reg` AS `id_jen_reg`,`tb_reg`.`tgl_reg` AS `tgl_reg`,`tb_reg`.`qr_code` AS `qr_code`,`tb_reg`.`status` AS `status`,`tb_reg`.`pay_date` AS `pay_date`,`tb_event`.`id_event` AS `id_event`,`tb_event`.`judul_event` AS `judul_event`,`tb_event`.`tgl_event` AS `tgl_event`,`tb_event`.`tgl_akhir_reg` AS `tgl_akhir_reg`,`tb_event`.`id_jurusan` AS `id_jurusan`,`tb_event`.`harga` AS `harga`,`tb_event`.`quota` AS `quota`,`tb_event`.`id_lokasi` AS `id_lokasi`,`tb_event`.`foto` AS `foto`,`tb_event`.`ket` AS `ket`,`tb_event`.`batas_bayar` AS `batas_bayar`,`tb_jen_reg`.`jen_reg` AS `jen_reg`,`tb_usr`.`nama_usr` AS `nama_usr`,`tb_usr`.`password` AS `password`,`tb_usr`.`email` AS `email`,`tb_usr`.`jekel` AS `jekel`,`tb_usr`.`no_tlpn` AS `no_tlpn`,`tb_usr`.`alamat_usr` AS `alamat_usr`,`tb_jurusan`.`nama_jur` AS `nama_jur`,`tb_lokasi`.`nama_ruangan` AS `nama_ruangan`,`tb_lokasi`.`lokasi` AS `lokasi`,`tb_lokasi`.`alamat` AS `alamat` from (((((`tb_reg` join `tb_event` on((`tb_reg`.`id_event` = `tb_event`.`id_event`))) join `tb_usr` on((`tb_reg`.`id_usr` = `tb_usr`.`id_usr`))) join `tb_jen_reg` on((`tb_reg`.`id_jen_reg` = `tb_jen_reg`.`id_jen_reg`))) join `tb_jurusan` on((`tb_event`.`id_jurusan` = `tb_jurusan`.`id_jurusan`))) join `tb_lokasi` on((`tb_lokasi`.`id_lokasi` = `tb_event`.`id_lokasi`))) ;

-- ----------------------------
-- View structure for v_event
-- ----------------------------
DROP VIEW IF EXISTS `v_event`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_event` AS SELECT
tb_event.id_event,
tb_event.judul_event,
tb_event.tgl_event,
tb_event.tgl_akhir_reg,
tb_jurusan.id_jurusan,
tb_jurusan.nama_jur,
tb_jen_event.id_jen_event,
tb_jen_event.nama_jen,
tb_event.harga,
tb_event.quota,
tb_event.foto,
tb_event.id_periode,
tb_event.id_lokasi,
tb_lokasi.nama_ruangan,
tb_lokasi.lokasi,
tb_lokasi.alamat,
tb_lokasi.lat,
tb_lokasi.`long`,
tb_event.batas_bayar
FROM
tb_event
INNER JOIN tb_jurusan ON tb_event.id_jurusan = tb_jurusan.id_jurusan
INNER JOIN tb_jen_event ON tb_event.id_jen_event = tb_jen_event.id_jen_event
INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi = tb_event.id_lokasi ;

-- ----------------------------
-- View structure for v_event_detail
-- ----------------------------
DROP VIEW IF EXISTS `v_event_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_event_detail` AS SELECT
tb_event.id_event,
tb_event.judul_event,
tb_event.tgl_event,
tb_event.tgl_akhir_reg,
tb_event.id_jurusan,
tb_event.id_jen_event,
tb_event.harga,
tb_event.quota,
tb_event.id_periode,
tb_event.foto,
tb_event.`status`,
tb_event.ket,
tb_jurusan.nama_jur,
tb_panitia.nama,
tb_panitia.tipe_panitia,
tb_panitia.tlpn,
tb_panitia.email,
tb_speaker.nama_speaker,
tb_speaker.institusi,
tb_speaker.foto_speaker,
tb_lokasi.id_lokasi,
tb_lokasi.nama_ruangan,
tb_lokasi.lokasi,
tb_lokasi.alamat,
tb_lokasi.lat,
tb_lokasi.`long`,
tb_jen_event.nama_jen
FROM
tb_event
INNER JOIN tb_jurusan ON tb_event.id_jurusan = tb_jurusan.id_jurusan
INNER JOIN tb_panitia ON tb_panitia.id_jurusan = tb_jurusan.id_jurusan
INNER JOIN tb_speaker ON tb_speaker.id_event = tb_event.id_event
INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi = tb_event.id_lokasi ,
tb_jen_event ;

-- ----------------------------
-- View structure for v_e_detail
-- ----------------------------
DROP VIEW IF EXISTS `v_e_detail`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_e_detail` AS SELECT
tb_event.id_event,
tb_event.judul_event,
tb_event.tgl_event,
tb_event.tgl_akhir_reg,
tb_event.id_jurusan,
tb_event.id_jen_event,
tb_event.harga,
tb_event.quota,
tb_event.id_periode,
tb_event.foto,
tb_event.`status`,
tb_event.ket,
tb_jurusan.nama_jur,
tb_periode_panitia.id_panitia,
tb_speaker.id_speaker,
tb_speaker.nama_speaker,
tb_speaker.institusi,
tb_speaker.foto_speaker,
tb_panitia.nama,
tb_panitia.tipe_panitia,
tb_panitia.tlpn,
tb_panitia.email,
tb_event.id_lokasi,
tb_lokasi.nama_ruangan,
tb_lokasi.lokasi,
tb_lokasi.alamat,
tb_lokasi.lat,
tb_lokasi.`long`
FROM
tb_speaker
INNER JOIN tb_event ON tb_speaker.id_event = tb_event.id_event
INNER JOIN tb_jurusan ON tb_event.id_jurusan = tb_jurusan.id_jurusan
INNER JOIN tb_periode_panitia ON tb_event.id_periode = tb_periode_panitia.id_periode
INNER JOIN tb_panitia ON tb_panitia.id_jurusan = tb_jurusan.id_jurusan AND tb_periode_panitia.id_panitia = tb_panitia.id_panitia
INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi = tb_event.id_lokasi ;

-- ----------------------------
-- View structure for v_jen_reg
-- ----------------------------
DROP VIEW IF EXISTS `v_jen_reg`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_jen_reg` AS SELECT
tb_reg.id_reg,
tb_jen_reg.id_jen_reg,
tb_jen_reg.jen_reg,
tb_usr.nama_usr,
tb_event.judul_event,
tb_reg.id_usr
FROM
tb_reg
INNER JOIN tb_jen_reg ON tb_reg.id_jen_reg = tb_jen_reg.id_jen_reg
INNER JOIN tb_usr ON tb_reg.id_usr = tb_usr.id_usr
INNER JOIN tb_event ON tb_reg.id_event = tb_event.id_event ;

-- ----------------------------
-- View structure for v_kehadiran
-- ----------------------------
DROP VIEW IF EXISTS `v_kehadiran`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_kehadiran` AS SELECT
tb_reg.id_reg,
tb_usr.nama_usr,
tb_reg.`status`,
tb_event.judul_event
FROM
tb_reg
INNER JOIN tb_usr ON tb_reg.id_usr = tb_usr.id_usr
INNER JOIN tb_event ON tb_reg.id_event = tb_event.id_event ;

-- ----------------------------
-- View structure for v_kepanitiaan
-- ----------------------------
DROP VIEW IF EXISTS `v_kepanitiaan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_kepanitiaan` AS SELECT
tb_panitia.tipe_panitia,
tb_panitia.id_panitia,
tb_panitia.nama,
tb_jurusan.nama_jur,
tb_panitia.tlpn,
tb_panitia.email,
tb_periode_panitia.id_periode
FROM
tb_jurusan
INNER JOIN tb_panitia ON tb_panitia.id_jurusan = tb_jurusan.id_jurusan
INNER JOIN tb_periode_panitia ON tb_periode_panitia.id_panitia = tb_panitia.id_panitia ;

-- ----------------------------
-- View structure for v_lokasi
-- ----------------------------
DROP VIEW IF EXISTS `v_lokasi`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_lokasi` AS SELECT
tb_event.id_event,
tb_event.tgl_event,
tb_event.id_lokasi,
tb_lokasi.nama_ruangan,
tb_lokasi.lokasi
FROM
tb_event
INNER JOIN tb_lokasi ON tb_lokasi.id_lokasi = tb_event.id_lokasi ;

-- ----------------------------
-- View structure for v_panitia
-- ----------------------------
DROP VIEW IF EXISTS `v_panitia`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_panitia` AS SELECT
tb_panitia.id_panitia,
tb_panitia.nama,
tb_panitia.tipe_panitia,
tb_jurusan.nama_jur,
tb_panitia.tlpn,
tb_panitia.email,
tb_panitia.id_jurusan,
tb_panitia.`status`
FROM
tb_panitia
INNER JOIN tb_jurusan ON tb_panitia.id_jurusan = tb_jurusan.id_jurusan ;

-- ----------------------------
-- View structure for v_paper
-- ----------------------------
DROP VIEW IF EXISTS `v_paper`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_paper` AS SELECT
tb_paper.id_paper,
tb_reg.id_reg,
tb_event.judul_event,
tb_usr.nama_usr,
tb_paper.tgl_upload,
tb_paper.`status`,
tb_reg.id_usr,
tb_event.id_event
FROM
tb_paper
INNER JOIN tb_reg ON tb_paper.id_reg = tb_reg.id_reg
INNER JOIN tb_event ON tb_reg.id_event = tb_event.id_event
INNER JOIN tb_usr ON tb_reg.id_usr = tb_usr.id_usr ;

-- ----------------------------
-- View structure for v_periode
-- ----------------------------
DROP VIEW IF EXISTS `v_periode`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_periode` AS SELECT
tb_periode_panitia.id_periode,
tb_panitia.nama,
tb_periode_panitia.id_per,
tb_periode_panitia.id_panitia,
tb_panitia.tipe_panitia
FROM
tb_panitia
INNER JOIN tb_periode_panitia ON tb_periode_panitia.id_panitia = tb_panitia.id_panitia ;

-- ----------------------------
-- View structure for v_reg
-- ----------------------------
DROP VIEW IF EXISTS `v_reg`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_reg` AS SELECT
tb_reg.id_reg,
tb_event.judul_event,
tb_reg.tgl_reg,
tb_reg.`status`,
tb_event.harga,
tb_event.quota,
tb_reg.id_event
FROM
tb_event
INNER JOIN tb_reg ON tb_reg.id_event = tb_event.id_event ;

-- ----------------------------
-- View structure for v_sertifikat
-- ----------------------------
DROP VIEW IF EXISTS `v_sertifikat`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `v_sertifikat` AS SELECT
tb_sertifikat.no_sertifikat,
tb_reg.id_reg,
tb_usr.id_usr,
tb_usr.nama_usr,
tb_jen_reg.id_jen_reg,
tb_jen_reg.jen_reg,
tb_event.id_event,
tb_event.judul_event
FROM
tb_sertifikat
INNER JOIN tb_reg ON tb_sertifikat.no_reg = tb_reg.id_reg
INNER JOIN tb_usr ON tb_reg.id_usr = tb_usr.id_usr
INNER JOIN tb_event ON tb_reg.id_event = tb_event.id_event
INNER JOIN tb_jen_reg ON tb_reg.id_jen_reg = tb_jen_reg.id_jen_reg ;

-- ----------------------------
-- View structure for v_speaker
-- ----------------------------
DROP VIEW IF EXISTS `v_speaker`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_speaker` AS SELECT
tb_speaker.id_speaker,
tb_speaker.institusi,
tb_speaker.foto_speaker,
tb_speaker.tlpn,
tb_speaker.email,
tb_event.judul_event,
tb_speaker.nama_speaker
FROM
tb_speaker
INNER JOIN tb_event ON tb_speaker.id_event = tb_event.id_event ;

-- ----------------------------
-- View structure for v_user
-- ----------------------------
DROP VIEW IF EXISTS `v_user`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `v_user` AS SELECT
tb_usr.id_usr,
tb_usr.nama_usr,
tb_usr.`password`,
tb_usr.email,
tb_usr.jekel,
tb_usr.no_tlpn,
tb_usr.alamat_usr,
tb_usr.tgl_daftar,
tb_type_usr.id_type_usr,
tb_type_usr.nama_type_usr,
tb_usr.ket
FROM
tb_type_usr
INNER JOIN tb_usr ON tb_usr.id_type_usr = tb_type_usr.id_type_usr ;
DROP TRIGGER IF EXISTS `status_pembayaran_insert`;
DELIMITER ;;
CREATE TRIGGER `status_pembayaran_insert` AFTER INSERT ON `tb_byr` FOR EACH ROW BEGIN
 UPDATE tb_reg SET status=1
 
 WHERE id_reg=NEW.id_reg;
 
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `status_pembayaran_delete`;
DELIMITER ;;
CREATE TRIGGER `status_pembayaran_delete` AFTER DELETE ON `tb_byr` FOR EACH ROW BEGIN
 UPDATE tb_reg SET status=0
 
 WHERE id_reg=OLD.id_reg;
 
END
;;
DELIMITER ;
DROP TRIGGER IF EXISTS `absen`;
DELIMITER ;;
CREATE TRIGGER `absen` AFTER UPDATE ON `tb_reg` FOR EACH ROW BEGIN
	IF NEW.status = 2
    THEN  
  		INSERT INTO tb_sertifikat (no_reg,tipe_sertifikat,id_event,no_sertifikat) VALUES(NEW.id_reg,NEW.id_jen_reg,NEW.id_event,CONCAT(MONTH(CURRENT_DATE()),NEW.id_reg));
    ELSE 
        DELETE FROM tb_sertifikat WHERE no_reg = NEW.id_reg;   	
	END IF;
END
;;
DELIMITER ;
SET FOREIGN_KEY_CHECKS=1;
