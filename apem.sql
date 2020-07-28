-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2020 at 05:06 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apem`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `alamat`, `ttl`, `jenkel`, `agama`, `foto`, `username`, `password`) VALUES
(90801031, 'Wan Yuliyanti', 'Kabupaten Tanah Laut Provinsi Kalimantan Selatan', 'Tanah Laut, 23 Juli 1973', 'Perempuan', 'Islam', 'user.png', 'Wan Yuliyanti', '550e1bafe077ff0b0b67f4e32f29d751');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jur` int(11) NOT NULL,
  `nama_jur` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jur`, `nama_jur`) VALUES
(1, 'Teknik Informatika'),
(2, 'Teknologi Industri Pertanian'),
(3, 'Mesin Otomotif'),
(4, 'Akuntansi');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_mhs` varchar(11) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `ttl` varchar(50) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `agama` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_jur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mhs`, `nama_mhs`, `alamat`, `ttl`, `jenkel`, `agama`, `foto`, `username`, `password`, `id_jur`) VALUES
('A1317001', 'Achmad Syah Maulana', 'Kabupaten Tanah Laut', 'Tanah Laut ,21 Juni 1999', 'Laki-Laki', 'Islam', 'user.png', 'A1317001', 'db6877cc349f34c498ae586c71b3857f', 1),
('A1317002', 'Ade Ardha Reswari', 'Kabupaten Tanah Laut', 'Palangkaraya, 02 Juni 2000', 'Perempuan', 'Islam', 'user.png', 'A1317002', '2531fbd495c8fd1416c460ffec1d01e3', 1),
('A1317003', 'Adela Valiandra', 'Kabupaten Tanah Laut', 'Karawang, 30 Maret 1999', 'Perempuan', 'Islam', 'user.png', 'A1317003', '58559397801a11e7ee279dffc1db2006', 1),
('A1317004', 'Agi Munawa', 'Kabupaten Tanah Laut', 'Takisung, 20 Februari 1999', 'Laki-Laki', 'Islam', 'user.png', 'A1317004', '8f29fca03dc33aed42a53e48b54eb379', 1),
('A1317005', 'Ahmad Asegaf', 'Kabupaten Tanah Laut', 'Palangkaraya. 08 Januari 2000', 'Laki-Laki', 'Islam', 'user.png', 'A1317005', '4e84e4daaca02239cce8919bb96a4446', 1),
('A1317006', 'Ahmad Laily Misfi', 'Kabupaten Tanah Laut', 'Tanah Laut, 03 Desember 1998', 'Laki-Laki', 'Islam', 'user.png', 'A13170006', '827ccb0eea8a706c4c34a16891f84e7b', 1),
('A1317014', 'Ari Wahyudi', 'Kabupaten Banjar', 'Sungai Asam, 09 Januari 1999', 'Laki-Laki', 'Islam', 'user.png', 'A1317014', '058f757de0cd5c7b4fedc5401057686f', 1),
('A1317023', 'Fajar', 'Kabupaten Tanah Laut', 'Kapuas, 07 Februari 1998', 'Laki-Laki', 'Katolik', 'user.png', 'A1317023', '034fd7eda088ffecb8d2def9acdcdf50', 1),
('A1317033', 'Khoirul Imam Safi''i', 'Kabupaten Tanah Laut', 'Jepara, 30 September 1996', 'Laki-Laki', 'Islam', 'user.png', 'A1317033', '5169dac3647f0c8ee26777d25ea7df29', 1),
('A1317034', 'Kiki Maulida', 'Kabupaten Tanah Laut', 'Tanah Laut, 05 Juli 1999', 'Perempuan', 'Islam', 'user.png', 'A1317034', 'b0c8cc6603aec8200e175e0e6733a277', 1),
('A1317100', 'Yeremia Handoyo', 'Kabupaten Tanah Laut', 'Tanah Laut 08 Januari 1999', 'Laki-Laki', 'Kristen', 'user.png', 'A1317100', 'd023b4d9b056904b21d4c6a2884cbb08', 1),
('A1317106', 'Fransisca Jeni Tari Krismany', 'Kabupaten Tanah Laut', 'Banjarmasin, 24 Januari 1999', 'Perempuan', 'Katolik', 'user.png', 'A1317106', '2014aeda59ecd6f4cb46abc423933a40', 1),
('B1317001', 'Abdul Majid', 'Kabupaten Tanah Laut', 'Tanah Laut, 12 Februari 1997', 'Laki-Laki', 'Islam', 'user.png', 'B1317001', '181d85eaa7f77d79d72eb690dd8b3d9f', 2),
('B1317002', 'Abdul Mutholib', 'Kabupaten Tanah Laut', 'Telaga Langsat, 16 Oktober 1999', 'Laki-Laki', 'Islam', 'user.png', 'B1317002', '3f771b8b18549d09a9e1f4d1d4b967c7', 2),
('B1317017', 'Elly Fitrianti Sapoetri', 'Kabupaten Tanah Laut', 'Tanah Laut, 24 Desember 1998', 'Perempuan', 'Islam', 'user.png', 'B1317017', '5bba182c66a9fba87a864afeebad14ef', 2),
('B1317054', 'Ratna Eka Wulandari', 'Kabupaten Tanah Laut', 'Pelaihari, 28 Maret 1999', 'Perempuan', 'Islam', 'user.png', 'B1317054', '6e4a928984bfb06f59cebff75e326449', 2),
('B1317073', 'Hartomi', 'Kabupaten Tanah Laut', 'Ipu Mea, 14 April 1999', 'Laki-Laki', 'Kristen', 'user.png', 'B1317073', '4026c2399d2806c80624910b921226e2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(11) NOT NULL,
  `judul` varchar(70) NOT NULL,
  `modul` varchar(70) NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id_modul`, `judul`, `modul`, `id_dosen`) VALUES
(12, '16 Jenis Tenses', 'Cetak_Laporan_KHS_Mahasiswa.pdf', 90801031),
(13, 'Tenses Learning', 'MENEROPONG INDONESIA by Ari Wahyudi.pdf', 90801031);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `benar` int(11) NOT NULL,
  `salah` int(11) NOT NULL,
  `kosong` int(11) NOT NULL,
  `nilai` varchar(5) NOT NULL,
  `tgl` date NOT NULL,
  `ket` varchar(12) NOT NULL,
  `id_mhs` varchar(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `benar`, `salah`, `kosong`, `nilai`, `tgl`, `ket`, `id_mhs`, `status`) VALUES
(2, 6, 1, 1, '75.0', '2020-07-26', 'Lulus', 'A1317014', 1);

-- --------------------------------------------------------

--
-- Table structure for table `peraturan`
--

CREATE TABLE `peraturan` (
  `id_peraturan` int(11) NOT NULL,
  `waktu_pengerjaan` int(11) NOT NULL,
  `jml_soal` int(11) NOT NULL,
  `nilai_min` varchar(5) NOT NULL,
  `peraturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peraturan`
--

INSERT INTO `peraturan` (`id_peraturan`, `waktu_pengerjaan`, `jml_soal`, `nilai_min`, `peraturan`) VALUES
(1, 1, 8, '60.5', '<ol>\r\n	<li>Bacalah dengan teliti tiap-tiap soal sebelum menjawab</li>\r\n	<li>Pengerjaan Soal-soal ujian akan diberikan batasan waktu, apabila waktu telah habis, anda tidak dapat lagi mengisi / mengoreksi kembali jawaban dari soal-soal yang tersedia. Begitu pula sebaliknya apabila waktu yang tersedia masih ada maka anda dapat secara bebas mengoreksi kembali jawaban-jawaban anda .</li>\r\n	<li>Skor atau nilai hanya akan ditampilkan saja tanpa adanya sertifikasi nilai untuk di download.</li>\r\n</ol>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id_soal` int(11) NOT NULL,
  `soal` varchar(100) NOT NULL,
  `knc_jwbn` varchar(50) NOT NULL,
  `status_aktif` enum('Y','T','','') NOT NULL,
  `id_dosen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id_soal`, `soal`, `knc_jwbn`, `status_aktif`, `id_dosen`) VALUES
(1, 'My Father is so tired since he .... our garden all day for planting vegetables.', 'has ben preparing', 'Y', 90801031),
(2, 'At this time yesterday Reny and I ... our classmate.', 'were paying a call', 'Y', 90801031),
(4, 'He ... the community college this night', 'won''t be attending', 'Y', 90801031),
(7, 'The class ... the documentary film next monday.', 'will have watched', 'Y', 90801031),
(8, '... the scholarship application?', 'have You completed', 'Y', 90801031),
(11, 'Who ... towards the post office?', 'is walking', 'Y', 90801031),
(12, 'They ... for an hour before the doctor came.', 'had been waiting', 'Y', 90801031),
(13, 'We sometimes ... by chance in the convenience store.', 'meet', 'Y', 90801031);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id_sa` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id_sa`, `username`, `password`) VALUES
(1, 'super admin', '5ab08155a29c77daaaac427bcad24769');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jur`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id_mhs`),
  ADD KEY `id_jur` (`id_jur`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_mhs` (`id_mhs`);

--
-- Indexes for table `peraturan`
--
ALTER TABLE `peraturan`
  ADD PRIMARY KEY (`id_peraturan`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id_soal`),
  ADD KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id_sa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `peraturan`
--
ALTER TABLE `peraturan`
  MODIFY `id_peraturan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id_soal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id_sa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`id_jur`) REFERENCES `jurusan` (`id_jur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modul`
--
ALTER TABLE `modul`
  ADD CONSTRAINT `modul_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_mhs`) REFERENCES `mahasiswa` (`id_mhs`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
