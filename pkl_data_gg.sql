-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Mei 2021 pada 03.03
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_data_gg`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_gg`
--

CREATE TABLE `status_gg` (
  `id_gg` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_ultg` int(11) NOT NULL,
  `id_tt` int(11) NOT NULL,
  `nama_status` enum('AR','TRIP','','') NOT NULL,
  `penyebab` enum('Lain-lain','Pohon','Petir','Hewan','Peralatan','Proteksi') NOT NULL,
  `waktu_trip_lepas` datetime NOT NULL,
  `waktu_trip_masuk` datetime NOT NULL,
  `durasi_number` time NOT NULL,
  `durasi_menit` float NOT NULL,
  `durasi_jam` float NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_input` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_gg`
--

INSERT INTO `status_gg` (`id_gg`, `id_user`, `id_ultg`, `id_tt`, `nama_status`, `penyebab`, `waktu_trip_lepas`, `waktu_trip_masuk`, `durasi_number`, `durasi_menit`, `durasi_jam`, `keterangan`, `tgl_input`) VALUES
(38, 8, 2, 1, 'TRIP', 'Hewan', '2021-05-24 16:40:00', '2021-05-24 16:50:00', '00:10:00', 10, 0.166667, 'khdkaskd', '2021-05-24 09:39:02'),
(39, 8, 1, 2, 'TRIP', 'Petir', '2021-05-24 16:00:00', '2021-05-24 17:30:00', '01:30:00', 90, 1.5, 'kjashjdkashd', '2021-05-24 09:40:25'),
(40, 8, 2, 1, 'AR', 'Hewan', '1970-01-01 01:00:00', '1970-01-01 01:00:00', '00:00:00', 0, 0, 'adkadkjsd', '2021-05-24 09:43:58'),
(41, 8, 2, 1, 'TRIP', 'Peralatan', '2021-05-24 16:55:00', '2021-05-24 17:00:00', '00:05:00', 5, 0.0833333, 'jahskd', '2021-05-24 09:55:34'),
(42, 8, 1, 2, 'TRIP', 'Peralatan', '2021-05-24 19:56:00', '2021-05-24 21:03:00', '01:07:00', 67, 1.11667, 'alat error', '2021-05-24 12:57:26'),
(43, 8, 1, 5, 'TRIP', 'Petir', '2021-05-27 20:00:00', '2021-05-28 23:10:00', '27:10:00', 1630, 27.1667, '', '2021-05-27 11:04:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `no_induk` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(500) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('l','p') NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `level` enum('operator','pegawai','admin') NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `no_induk`, `nama`, `username`, `password`, `alamat`, `jk`, `no_hp`, `email`, `level`, `foto`) VALUES
(5, '9820071KST', 'HASPIANNOR R', 'operator', 'c4ca4238a0b923820dcc509a6f75849b', 'DESA TAMPANG', 'l', '082250205871', 'rhaspiannor@gmail.com', 'admin', '2_Annotation 2021-03-10 141909.jpg'),
(6, '7719010KST', 'IRWAN WAHYUDY', 'irwan', 'c4ca4238a0b923820dcc509a6f75849b', 'Banjarbaru', 'l', '082250205871', 'irwan@gmail.com', 'pegawai', ''),
(7, '9920070KST', 'MUHAMMAD FAZAR', 'fajar', 'c4ca4238a0b923820dcc509a6f75849b', 'Amuntai', 'l', '082250205456', 'fajar@gmail.com', 'operator', ''),
(8, '8219016KST', 'KASPIAN NOOR', 'kaspian', 'c4ca4238a0b923820dcc509a6f75849b', 'Banjarmasin', 'l', '082250205098', 'kaspian@gmail.com', 'operator', ''),
(9, '9920079KST', 'Seftian Hanafi', 'hanafii', 'c4ca4238a0b923820dcc509a6f75849b', 'ahsdksahdkdaskdhka', 'l', '082250205456', 'seftian@gmail.com', 'operator', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transmisi_trafo`
--

CREATE TABLE `transmisi_trafo` (
  `id_tt` int(11) NOT NULL,
  `id_ultg` int(11) NOT NULL,
  `nama_tt` varchar(100) NOT NULL,
  `kode` enum('TL','TR','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transmisi_trafo`
--

INSERT INTO `transmisi_trafo` (`id_tt`, `id_ultg`, `nama_tt`, `kode`) VALUES
(1, 2, 'ASAM ASAM-PELAIHARI #2', 'TL'),
(2, 1, 'TRAFO #3 MANTUIL', 'TR'),
(5, 1, 'CEMPAKA-BARIKN', 'TR');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ultg`
--

CREATE TABLE `ultg` (
  `id_ultg` int(11) NOT NULL,
  `nama_ultg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ultg`
--

INSERT INTO `ultg` (`id_ultg`, `nama_ultg`) VALUES
(1, 'BANDARMASIH'),
(2, 'BANJAR'),
(4, 'MUARA TEWEH'),
(5, 'PALANGKARAYA'),
(6, 'BARABAI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status_gg`
--
ALTER TABLE `status_gg`
  ADD PRIMARY KEY (`id_gg`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_tt` (`id_tt`),
  ADD KEY `id_ultg` (`id_ultg`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `transmisi_trafo`
--
ALTER TABLE `transmisi_trafo`
  ADD PRIMARY KEY (`id_tt`),
  ADD KEY `id_ultg` (`id_ultg`);

--
-- Indexes for table `ultg`
--
ALTER TABLE `ultg`
  ADD PRIMARY KEY (`id_ultg`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status_gg`
--
ALTER TABLE `status_gg`
  MODIFY `id_gg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transmisi_trafo`
--
ALTER TABLE `transmisi_trafo`
  MODIFY `id_tt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ultg`
--
ALTER TABLE `ultg`
  MODIFY `id_ultg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `status_gg`
--
ALTER TABLE `status_gg`
  ADD CONSTRAINT `status_gg_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_gg_ibfk_2` FOREIGN KEY (`id_tt`) REFERENCES `transmisi_trafo` (`id_tt`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_gg_ibfk_3` FOREIGN KEY (`id_ultg`) REFERENCES `ultg` (`id_ultg`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transmisi_trafo`
--
ALTER TABLE `transmisi_trafo`
  ADD CONSTRAINT `transmisi_trafo_ibfk_1` FOREIGN KEY (`id_ultg`) REFERENCES `ultg` (`id_ultg`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
