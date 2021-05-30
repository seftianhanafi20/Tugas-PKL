-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04 Mar 2021 pada 05.35
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
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotografer`
--

CREATE TABLE `fotografer` (
  `id_fg` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fotografer`
--

INSERT INTO `fotografer` (`id_fg`, `nama`, `alamat`, `tempat_lahir`, `tgl_lahir`, `jk`, `email`, `no_hp`, `foto`) VALUES
(17, 'Haspiannor', 'Desa Tampang', 'Banjarmasin', '1999-03-27', 'laki-laki', 'haspi@gmail.com', '2374832748473', '21_300.jpg'),
(18, 'Mulyadi', 'Desa Jilatan', 'Banjarmasin', '1999-08-25', 'laki-laki', 'mulyadi@gmail.com', '4962847623846', '21_DSC_1195 (2).jpg'),
(20, 'Yoga', 'Desa Tajau', 'Tanah Laut', '1998-07-28', 'laki-laki', 'yoga@gmail.com', '4937904823234', '21_300.jpg'),
(21, 'Hanafi', 'Desa Jorong', 'Tanah Laut', '2000-09-18', 'laki-laki', 'seftian.hanafi20@gmail.com', '082254888375', '21_IMG_7970.JPG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `konfirmasi_id` int(10) NOT NULL,
  `id_pesanan` int(10) NOT NULL,
  `gambar_bukti` text NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`konfirmasi_id`, `id_pesanan`, `gambar_bukti`, `tgl_upload`) VALUES
(1, 18, '1_bukti.jpg', '2021-01-16 14:53:12'),
(2, 19, '2_abstract.jpg', '2021-01-28 06:57:23'),
(4, 21, '4_printer tes (1).jpg', '2021-02-11 10:31:02'),
(8, 25, '8_Bukti-Transfer-ATM-BCA.jpg', '2021-02-21 13:10:21'),
(9, 26, '9_Bukti-Transfer-ATM-BCA.jpg', '2021-02-24 01:23:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `locations`
--

CREATE TABLE `locations` (
  `id_lokasi` int(11) NOT NULL,
  `lat` float NOT NULL,
  `lng` float NOT NULL,
  `description` varchar(200) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `locations`
--

INSERT INTO `locations` (`id_lokasi`, `lat`, `lng`, `description`, `id_user`) VALUES
(35, -3.80978, 114.742, 'sunatan', 20),
(36, -3.92146, 114.832, 'Resepsi', 20),
(37, -3.90614, 114.807, 'Akad', 23),
(39, -3.9297, 114.846, 'akad', 20),
(40, -3.81042, 114.737, 'sunatan', 20),
(41, -3.61702, 114.702, 'akad', 20),
(42, -3.92078, 114.831, 'sunatan', 20),
(43, -3.9079, 114.809, 'resepsi', 20),
(44, -3.91454, 114.867, 'sunatan', 20),
(45, -3.90309, 114.88, 'akad', 20),
(46, -3.92143, 114.832, 'Resepsi', 20),
(47, -3.92799, 114.84, 'akad', 20),
(48, -3.80085, 114.824, 'sunatan', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `tgl_pemesanan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_acara` date NOT NULL,
  `waktu_acara` time NOT NULL,
  `keterangan` text NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_kec`, `alamat`, `id_lokasi`, `tgl_pemesanan`, `tgl_acara`, `waktu_acara`, `keterangan`, `status`) VALUES
(18, 23, 3, 'Tajau pecah dekat masjid sebelah indomaret', 37, '2021-01-16 14:30:43', '2021-01-20', '08:30:00', 'Jangan lupa sarapan...', 2),
(19, 20, 3, 'Desa Jilatan RT.02 RW.02 Dekat SDN Jilatan', 39, '2021-01-16 15:34:00', '2021-01-28', '09:30:00', 'Jangan telat...', 2),
(21, 20, 3, 'Desa Jilatan RT.04 RW.01', 42, '2021-02-11 10:25:11', '2021-02-12', '18:30:00', 'semoga lancar', 2),
(25, 20, 3, 'Desa Jilatan RT.01 RW.02', 46, '2021-02-21 12:25:04', '2021-02-24', '08:00:00', 'Nanti jangan telat datangnya ya...', 1),
(26, 20, 9, 'desa balerejo rt 01 rw 04', 48, '2021-02-24 01:21:25', '2021-02-27', '09:30:00', 'jangan telat ya !!!!', 2),
(27, 20, 9, 'pelaihari rt 1', 48, '2021-02-24 01:44:29', '2021-02-26', '09:45:00', 'saujshjfhjsffjlajl', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_detail`
--

CREATE TABLE `pesanan_detail` (
  `id_pesanan` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan_detail`
--

INSERT INTO `pesanan_detail` (`id_pesanan`, `id_item`, `quantity`, `harga`) VALUES
(18, 15, 1, 2000000),
(19, 14, 1, 1500000),
(21, 15, 1, 2000000),
(25, 14, 1, 1750000),
(26, 15, 1, 2000000),
(27, 14, 2, 1750000),
(27, 15, 2, 2000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_item`
--

CREATE TABLE `tb_item` (
  `id_item` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_item` varchar(100) NOT NULL,
  `harga` int(50) NOT NULL,
  `foto` varchar(300) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_item`
--

INSERT INTO `tb_item` (`id_item`, `id_kategori`, `nama_item`, `harga`, `foto`, `keterangan`) VALUES
(14, 2, 'Paket Setengah Hari', 1750000, '15_1610636860387_314784052.jpg', '<p><strong>Paket Setengah Hari</strong></p>\r\n\r\n<ul>\r\n	<li>cetak 100 foto</li>\r\n	<li>album kolase pakai koper/box magnet</li>\r\n	<li>unlimited file foto</li>\r\n	<li>dalam bentuk cd</li>\r\n	<li>bonus cetak 10R + frame</li>\r\n</ul>\r\n'),
(15, 2, 'Paket Sampai Sore', 2000000, '1610636860387_314784052.jpg', '<p><strong>Paket Sampai Sore</strong></p>\r\n\r\n<ul>\r\n	<li>cetak 140&nbsp;foto</li>\r\n	<li>album kolase pakai koper/box magnet</li>\r\n	<li>1 pcs album magnetik</li>\r\n	<li>unlimited file foto</li>\r\n	<li>dalam bentuk cd</li>\r\n	<li>bonus cetak 10R + frame</li>\r\n</ul>\r\n'),
(16, 2, 'Paket Sampai Malam', 2500000, '1610637479758_999192024.jpg', '<p><strong>Paket Sampai Malam</strong></p>\r\n\r\n<ul>\r\n	<li>cetak 200 foto</li>\r\n	<li>album kolase pakai koper/box magnet 2 pcs</li>\r\n	<li>unlimited file foto</li>\r\n	<li>dalam bentuk flashdisk</li>\r\n	<li>bonus cetak 10R 2 pcs</li>\r\n	<li>frame 10R 2 pcs</li>\r\n</ul>\r\n'),
(20, 7, 'Roll-rollan', 500000, '1610637587124_513319293.jpg', '<p><strong>Roll-rollan</strong></p>\r\n\r\n<ul>\r\n	<li>cetak 40&nbsp;foto</li>\r\n	<li>album standard</li>\r\n	<li>file foto dalam bentuk cd</li>\r\n	<li>bonus cetak 8R</li>\r\n</ul>\r\n'),
(21, 8, 'Sunatan-malam', 1000000, 'IMG_6998.JPG', '<p><strong>Sunatan-malam</strong></p>\r\n\r\n<ul>\r\n	<li>cetak foto 100</li>\r\n	<li>album standard</li>\r\n</ul>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(2, 'paketan'),
(7, 'Roll'),
(8, 'Paket Sunatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kec` int(11) NOT NULL,
  `kecamatan` varchar(200) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kec`, `kecamatan`, `tarif`) VALUES
(1, 'Bajuin', 25000),
(3, 'Batu Ampar', 50000),
(4, 'Bumi Makmur', 50000),
(5, 'Jorong', 100000),
(6, 'Kintap', 150000),
(7, 'Kurau', 50000),
(8, 'Panyipatan', 50000),
(9, 'Pelaihari', 0),
(10, 'Takisung', 50000),
(11, 'Tambang Ulang', 50000),
(13, 'Bati-Bati', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_portofolio`
--

CREATE TABLE `tb_portofolio` (
  `id_porto` int(11) NOT NULL,
  `portofolio` varchar(50) NOT NULL,
  `tgl_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `caption` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_portofolio`
--

INSERT INTO `tb_portofolio` (`id_porto`, `portofolio`, `tgl_upload`, `caption`) VALUES
(3, '1_DSC01029after.jpg', '2021-02-22 04:00:45', '<p>Cinta itu laksana lembah yang dalam nan misteri, begitulah&nbsp;<strong>pernikahan</strong>. Jika melangkah ke tingkat tertinggi, beruntunglah yang tetap bertahan dan menjadikan cinta hanya ujian dan kesabaran sebagai penjaganya.</p>\r\n'),
(4, '4_IMG_6846.jpg', '2021-02-22 04:11:19', '<p>Jadilah yang mencintai dan bukan hanya untuk dicintai karena pernikahan hanya bersama orang yang mencintai bukan dicintai.</p>\r\n'),
(5, '5_IMG_6632.jpg', '2021-02-22 04:17:53', '<p>Pernikahan adalah selalu bersama dan tetap dalam satu tujuan, meski dengan cara yang terkadang berbeda.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `level` enum('admin','customer','fotografer') NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `level`, `nama_user`, `email`, `alamat`, `no_hp`, `username`, `password`, `foto`) VALUES
(19, 'admin', 'Admin', 'admin@gmail.com', 'Tanah laut', '2739183791273', 'admin', 'c4ca4238a0b923820dcc509a6f75849b', '20_Admin-icon.png'),
(20, 'customer', 'seftian', 'seftian.hanafi09@gmail.com', 'Desa Jilatan', '6282254888375', 'seftianhanafi', 'c4ca4238a0b923820dcc509a6f75849b', '21_Venom.jpg'),
(22, 'fotografer', 'haspi', 'haspi@gmail.com', 'kwkkwkw', '4937904823234', 'haspi', 'c4ca4238a0b923820dcc509a6f75849b', ''),
(23, 'customer', 'Muhammad Rizaldi', 'rizaldi.123@gmail.com', 'Desa Tajau Pecah RT.05 RW.01', '6285751132478', 'rizaldiii', 'c4ca4238a0b923820dcc509a6f75849b', ''),
(24, 'customer', 'hasbun', 'hasbun@gmail.com', 'Desa Tajau', '082254887656', 'hasbun', 'c4ca4238a0b923820dcc509a6f75849b', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fotografer`
--
ALTER TABLE `fotografer`
  ADD PRIMARY KEY (`id_fg`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`konfirmasi_id`),
  ADD KEY `pesanan_id` (`id_pesanan`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id_lokasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kec` (`id_kec`),
  ADD KEY `id_lokasi` (`id_lokasi`),
  ADD KEY `id_lokasi_2` (`id_lokasi`);

--
-- Indexes for table `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_item` (`id_item`);

--
-- Indexes for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`id_item`),
  ADD KEY `id_menu` (`id_kategori`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kec`);

--
-- Indexes for table `tb_portofolio`
--
ALTER TABLE `tb_portofolio`
  ADD PRIMARY KEY (`id_porto`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fotografer`
--
ALTER TABLE `fotografer`
  MODIFY `id_fg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `konfirmasi_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id_kec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_portofolio`
--
ALTER TABLE `tb_portofolio`
  MODIFY `id_porto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD CONSTRAINT `konfirmasi_pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_lokasi`) REFERENCES `locations` (`id_lokasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_kec`) REFERENCES `tb_kecamatan` (`id_kec`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan_detail`
--
ALTER TABLE `pesanan_detail`
  ADD CONSTRAINT `pesanan_detail_ibfk_2` FOREIGN KEY (`id_item`) REFERENCES `tb_item` (`id_item`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_detail_ibfk_3` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_item`
--
ALTER TABLE `tb_item`
  ADD CONSTRAINT `tb_item_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
