-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Okt 2021 pada 01.55
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ii_salon`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dekorasi`
--

CREATE TABLE `tbl_dekorasi` (
  `id_dekorasi` int(11) NOT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `nama_dekor` varchar(50) DEFAULT NULL,
  `harga` varchar(25) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_desk`
--

CREATE TABLE `tbl_desk` (
  `id_desk` int(11) NOT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_desk`
--

INSERT INTO `tbl_desk` (`id_desk`, `id_paket`, `gambar`, `keterangan`) VALUES
(2, 0, 'New_Wireframe_1.png', 'gaun pengantin'),
(3, 10, 'New_Wireframe_11.png', 'jangan terlalu pedas'),
(5, NULL, 'Screenshot_(1).png', 'jangan terlalu pedas'),
(6, 11, 'pic-turerere.jpg', 'jangan terlalu pedas'),
(7, 11, 'Screenshot_(6)1.png', 'gaun pengantin'),
(8, 11, 'Screenshot_(1)1.png', 'gambar 2'),
(9, 10, 'Screenshot_(6)2.png', 'dekor 6x8 meter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_deskripsi`
--

CREATE TABLE `tbl_deskripsi` (
  `id_deskripsi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `id_detail` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_deskripsi`
--

INSERT INTO `tbl_deskripsi` (`id_deskripsi`, `id_paket`, `id_detail`, `deskripsi`) VALUES
(1, 1, 2, '2'),
(2, 1, 2, '1'),
(3, 2, 0, '2'),
(4, 3, 0, '3'),
(5, 3, 0, '2'),
(6, 4, 0, '3'),
(7, 4, 0, '2'),
(8, 4, 0, '1'),
(9, 5, 0, '<'),
(10, 6, 0, '<'),
(11, 7, 0, '<'),
(12, 8, 0, '<'),
(13, 9, 0, '<'),
(14, 10, 0, '<'),
(15, 11, 0, '<');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_vendor`
--

CREATE TABLE `tbl_detail_vendor` (
  `id_detail` int(11) NOT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_vendor`
--

INSERT INTO `tbl_detail_vendor` (`id_detail`, `id_vendor`, `nama`, `deskripsi`) VALUES
(1, 1, 'Meja Parasmanan', '<p>Meja Parasmana 3x4 km</p>'),
(2, 1, 'Paratag', '<p>2 lokal</p>'),
(3, 1, 'Meja', '<p>Meja 2x3</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `gambar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `id_paket`, `keterangan`, `gambar`) VALUES
(1, 4, 'gambar 1', 'gambar7.jpg'),
(2, 4, 'gambar 2', 'gambar13.jpg'),
(3, 4, 'gambar 3', 'gambar9.jpg'),
(4, 6, 'gambar 1', 'gambar91.jpg'),
(5, 6, 'gambar 2', 'gambar10.jpg'),
(6, 6, 'gambar 3', 'gambar11.jpg'),
(7, 6, 'gambar 4', 'gambar15.jpg'),
(8, 13, 'gambar 1', 'gambar131.jpg'),
(10, 13, 'gambar 2', 'gambar12.jpg'),
(12, 12, 'gaun pengantin', 'InkedHelpdesk_System_vpd_(1)_LI.jpg'),
(19, 11, 'Dekorasi', 'FOTO1_(6).jpg'),
(21, 11, 'Baju Pengatin', 'baju_pengantin.jpg'),
(24, 11, 'kain dekorasi', 'images-1.jpg'),
(25, 11, 'gapura selamat datang', 'selmat_datang.jpg'),
(26, 10, 'Dekorasi', 'FOTO1_(7).jpg'),
(27, 10, 'Baju Pengatin', 'IMG-20210927-WA0025.jpg'),
(28, 10, 'Fresh Flower', 'IMG-20210927-WA0019.jpg'),
(29, 10, 'Kain penutup Kamar', 'images-11.jpg'),
(32, 11, 'Fresh Melati', 'IMG-20210927-WA0047.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id_order` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `no_order` varchar(25) NOT NULL,
  `tgl_order` date DEFAULT NULL,
  `tgl_resepsi` date DEFAULT NULL,
  `nama_pelanggan` varchar(25) DEFAULT NULL,
  `no_telpon` varchar(25) DEFAULT NULL,
  `provinsi` varchar(25) DEFAULT NULL,
  `kota` varchar(25) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kode_pos` varchar(25) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `grand_total` bigint(20) DEFAULT NULL,
  `list_paket` int(11) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT NULL,
  `bukti_bayar` text DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `status_order` int(11) DEFAULT NULL,
  `depe` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id_order`, `id_pelanggan`, `id_paket`, `no_order`, `tgl_order`, `tgl_resepsi`, `nama_pelanggan`, `no_telpon`, `provinsi`, `kota`, `alamat`, `kode_pos`, `catatan`, `total_bayar`, `grand_total`, `list_paket`, `status_bayar`, `bukti_bayar`, `atas_nama`, `nama_bank`, `no_rek`, `status_order`, `depe`, `diskon`) VALUES
(1, 2, NULL, '20211003OBURPY2I', '2021-10-03', '2021-11-05', 'rowina', '0857-3163-9595', 'Jawa Barat', 'Kuningan', 'Ciawilor', '45591', NULL, 0, 17500000, NULL, 1, 'WhatsApp_Image_2021-09-29_at_15_05_567.jpeg', 'rowina', 'bni', '123-456-654-78', 1, 2000000, 14625000),
(2, 2, NULL, '20211003BG4GAULX', '2021-10-03', '2021-11-06', 'diki', '0871234567', 'Jawa Barat', 'Kuningan', 'sindang barang', '452157', NULL, 0, 16000000, NULL, 1, 'WhatsApp_Image_2021-09-29_at_15_05_566.jpeg', 'rowina', 'bni', '123-456-654-78', 3, 1500000, 13700000),
(3, 2, NULL, '20211003N7ECBBU2', '2021-10-03', '2021-12-24', 'wulandari', '085731639595', 'DKI', 'Jakarta', 'Jakarta, Tanjung periuk, Hilir', '35470', NULL, 0, 13000000, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL),
(4, 2, NULL, '20211003DKAK3XMZ', '2021-10-03', '2021-11-19', 'upi', '085731639595', 'DKI', 'Jakarta', 'Jakarta, Tanjung periuk, Hilir', '35470', NULL, 0, 10000000, NULL, 0, NULL, NULL, NULL, NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(11) NOT NULL,
  `tipe_paket` varchar(25) DEFAULT NULL,
  `nama_paket` varchar(50) DEFAULT NULL,
  `id_vendor` int(11) DEFAULT NULL,
  `id_detail` int(11) DEFAULT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `list_paket` int(11) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `diskon` bigint(20) DEFAULT NULL,
  `is_available` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `tipe_paket`, `nama_paket`, `id_vendor`, `id_detail`, `harga`, `list_paket`, `deskripsi`, `gambar`, `diskon`, `is_available`) VALUES
(5, 'Paket Utama', 'Paket Melati', 1, NULL, '10000000', NULL, '<p>Dekor 6 Meter</p><p>Fresh Flower</p><p>Taman</p><p>Gapura Selamat Datang</p><p>Kotak Uang</p><p>Kain Penutup Kamar</p><p>Kain Penutup Meja Tamu</p><p>Kain Penutup Ruang Prasmanan</p><p>Alat Prasmanan</p><p>Makeup Pengantin</p><p>Fresh Mela</p>', 'FOTO1_melati.jpg', 0, 1),
(7, 'Paket Utama', 'Paket Aster', 1, NULL, '13000000', NULL, '<p>Dekor 6-8 Meter</p><p>Fresh Flower</p><p>taman</p><p>Gapura Selamat Datang</p><p>Kotak Uang</p><p>Kain Penutup Kamar</p><p>Alat Prasmanan</p><p>Makeup Pengantin</p><p>Fresh Melati</p><p>Baju Pengantin 3x ganti</p><p>Makeup dan Busana Ibu Hajat &amp; Be', 'FOTO1_aster.jpg', NULL, 1),
(8, 'Paket Utama', 'Paket Wisteria', 1, NULL, '16000000', NULL, '<p>Dekorasi 6-8 meter</p><p>Fresh Flower</p><p>taman</p><p>Gapura Selamat Datang</p><p>Kotak Uang</p><p>Kain Penutup Meja</p><p>Kain Penutup Dinding Kamar</p><p>Kain Penutup Ruang Prasmanan</p><p>Alat Prasmanan</p><p>Makeup Penganti</p><p>Fresh Melati</p>', 'FOTO1_wisteria.jpg', NULL, 1),
(9, 'Paket Utama', 'Paket Anggrek', 1, NULL, '17500000', NULL, '<p>Dekorasi 6-8 meter</p><p>Fresh Flower</p><p>Taman</p><p>Kain Penutup Kamar</p><p>Kain Penutup Ruang Prasmanan</p><p>Kotak Uang&nbsp;</p><p>Gapura Selamat Datang</p><p>Alat Prasmanan</p><p>Bunga Tangan</p><p>FotoBooth</p><p>Seting akad</p><p>Makeup Peng', 'FOTO1_anggrek.jpg', NULL, 1),
(10, 'Paket Utama', 'Paket Lily', 1, NULL, '20000000', NULL, '<p>Dekor 6-8 meter</p><p>Fresh flowers</p><p>Taman</p><p>Gapura selamat datang</p><p>kotak uang</p><p>Kain penutup kamar</p><p>Kain penutup meja tamu</p><p>Kain penutup ruang prasamanan</p><p>Alat prasmanan</p><p>Bunga tangan</p><p>Blower</p><p>Fotobooth<', 'FOTO1_lily.jpg', NULL, 1),
(11, 'Paket Utama', 'Paket Tulip', 1, NULL, '14000000', NULL, '<p><span style=\"font-size: 0.875rem;\">Fresh Flower</span></p><p>Kotak Uang</p><p>Alat Prasmanan</p><p>Bunga Tangan</p>', 'FOTO1_tulip.jpg', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `rol_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `nama`, `email`, `password`, `alamat`, `gambar`, `rol_id`, `is_active`) VALUES
(1, 'rowina', 'kr044401@gmail.com', '12345', 'sindang barang', NULL, 2, 0),
(2, 'dewi', 'udinese822@gmail.com', '12345', 'langseb luragung', NULL, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pesan`
--

CREATE TABLE `tbl_pesan` (
  `id_pesan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `balas` text DEFAULT NULL,
  `time_chatting` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pesan`
--

INSERT INTO `tbl_pesan` (`id_pesan`, `id_pelanggan`, `id_user`, `isi`, `balas`, `time_chatting`) VALUES
(1, 1, NULL, 'selamat siang?', '0', '2021-09-24 02:17:26'),
(2, 1, NULL, 'apakah sudah buka?', '0', '2021-09-24 02:17:42'),
(3, 1, NULL, '0', 'selamat siang, tempat kami sudah buka, silahkan melakukan pemesanan paket melalu sistem, jika ada yang ingin di tanyakan bisa melalu chat. terima kasih :*', '2021-09-24 02:18:41'),
(5, 3, NULL, 'hello', '0', '2021-09-28 00:54:00'),
(6, 3, NULL, '0', 'Ada yang bisa dibantu ?', '2021-09-28 00:54:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(25) DEFAULT NULL,
  `no_rek` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rek`, `atas_nama`) VALUES
(1, 'BRI', '32412356453', 'Ibu II');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rinci_order`
--

CREATE TABLE `tbl_rinci_order` (
  `id_rinci` int(11) NOT NULL,
  `no_order` varchar(25) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rinci_order`
--

INSERT INTO `tbl_rinci_order` (`id_rinci`, `no_order`, `id_paket`) VALUES
(1, '20211003OBURPY2I', 9),
(2, '20211003BG4GAULX', 8),
(3, '20211003N7ECBBU2', 7),
(4, '20211003DKAK3XMZ', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_riview`
--

CREATE TABLE `tbl_riview` (
  `id_riview` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_paket` int(11) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `foto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_riview`
--

INSERT INTO `tbl_riview` (`id_riview`, `id_pelanggan`, `id_paket`, `nama`, `tanggal`, `isi`, `foto`) VALUES
(1, 1, 5, 'rowina', '2021-09-23', 'produk sangat bagus', NULL),
(2, 2, 5, 'damar', '2021-09-23', 'bagus', NULL),
(3, 1, 5, 'rowina', '2021-09-27', 'bagus', NULL),
(4, 3, 10, 'SALSABILA', '2021-09-28', 'Bagus', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `hak_akses` varchar(25) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `email`, `password`, `hak_akses`, `level`) VALUES
(1, 'admin', 'ii_salon@gmail.com', 'admin', 'admin', 1),
(2, 'vendor', 'vendor@gmail.com', 'vendor', 'vendor', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_vendor`
--

CREATE TABLE `tbl_vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(50) DEFAULT NULL,
  `nama_pemilik` varchar(50) DEFAULT NULL,
  `no_telpon` int(13) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_vendor`
--

INSERT INTO `tbl_vendor` (`id_vendor`, `nama_vendor`, `nama_pemilik`, `no_telpon`, `alamat`) VALUES
(1, 'raditia', 'raditia', 2147483647, 'langseb'),
(3, 'Laksamana', 'raditia', 2147483647, 'kuningan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'kr044401@gmail.com', 'Tt1eR9bFMmuwB6G/cEIBFhbDSF9/FCdBUcn0DwxpiCQ=', 1633278262);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_dekorasi`
--
ALTER TABLE `tbl_dekorasi`
  ADD PRIMARY KEY (`id_dekorasi`);

--
-- Indeks untuk tabel `tbl_desk`
--
ALTER TABLE `tbl_desk`
  ADD PRIMARY KEY (`id_desk`);

--
-- Indeks untuk tabel `tbl_deskripsi`
--
ALTER TABLE `tbl_deskripsi`
  ADD PRIMARY KEY (`id_deskripsi`);

--
-- Indeks untuk tabel `tbl_detail_vendor`
--
ALTER TABLE `tbl_detail_vendor`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `tbl_rinci_order`
--
ALTER TABLE `tbl_rinci_order`
  ADD PRIMARY KEY (`id_rinci`);

--
-- Indeks untuk tabel `tbl_riview`
--
ALTER TABLE `tbl_riview`
  ADD PRIMARY KEY (`id_riview`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_dekorasi`
--
ALTER TABLE `tbl_dekorasi`
  MODIFY `id_dekorasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_desk`
--
ALTER TABLE `tbl_desk`
  MODIFY `id_desk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_deskripsi`
--
ALTER TABLE `tbl_deskripsi`
  MODIFY `id_deskripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tbl_detail_vendor`
--
ALTER TABLE `tbl_detail_vendor`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pesan`
--
ALTER TABLE `tbl_pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_rinci_order`
--
ALTER TABLE `tbl_rinci_order`
  MODIFY `id_rinci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_riview`
--
ALTER TABLE `tbl_riview`
  MODIFY `id_riview` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_vendor`
--
ALTER TABLE `tbl_vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
