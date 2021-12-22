-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 15 Nov 2020 pada 13.28
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_puskesmas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detail_pembayaran`
--

CREATE TABLE `tbl_detail_pembayaran` (
  `kode_transaksi` varchar(20) NOT NULL,
  `kode_obat` varchar(5) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga_obat` int(12) NOT NULL,
  `jumlah_obat` int(12) NOT NULL,
  `total_harga` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detail_pembayaran`
--

INSERT INTO `tbl_detail_pembayaran` (`kode_transaksi`, `kode_obat`, `nama_obat`, `harga_obat`, `jumlah_obat`, `total_harga`) VALUES
('TR00000001', 'KO-04', 'PoliSaxechon	', 5000, 2, 10000),
('TR00000001', 'KO-01', 'Alpara', 2500, 6, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_dokter`
--

CREATE TABLE `tbl_dokter` (
  `kode_dokter` varchar(4) NOT NULL,
  `nama_dokter` varchar(30) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `nomor_induk_dokter` varchar(20) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `id_poli` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_dokter`
--

INSERT INTO `tbl_dokter` (`kode_dokter`, `nama_dokter`, `jenis_kelamin`, `nomor_induk_dokter`, `tempat_lahir`, `tgl_lahir`, `alamat`, `id_poli`) VALUES
('D-01', 'Sunarya', 'Laki-Laki', '71816828738790', 'Majalengka', '1977-07-12', 'Sukaluyu', '2'),
('D-02', 'Karsa', 'Laki-Laki', '71816838738718', 'Sidoarjo', '1982-06-15', 'Adiarsa', '1'),
('D-03', 'Samsul', 'Laki-Laki', '48916838738757', 'CIimahi', '1993-11-26', 'Ciraos', '1'),
('D-04', 'Maryudi', 'Laki-Laki', '71816838888718', 'Bogor', '1991-01-09', 'Santiong', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jadwal_praktek_dokter`
--

CREATE TABLE `tbl_jadwal_praktek_dokter` (
  `id_jadwal` int(2) NOT NULL,
  `kode_dokter` varchar(4) NOT NULL,
  `hari` varchar(13) NOT NULL,
  `jam_kerja` varchar(13) NOT NULL,
  `id_poli` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jadwal_praktek_dokter`
--

INSERT INTO `tbl_jadwal_praktek_dokter` (`id_jadwal`, `kode_dokter`, `hari`, `jam_kerja`, `id_poli`) VALUES
(1, 'D-01', 'Senin - Rabu', '08.00 - 15.00', 0),
(2, 'D-02', 'Senin - Rabu', '08.00 - 15.00', 2),
(3, 'D-03', 'Kamis - Sabtu', '08.00 - 15.00', 2),
(4, 'D-04', 'Kamis - Sabtu', '08.00 - 15.00', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_obat`
--

CREATE TABLE `tbl_obat` (
  `kode_obat` varchar(5) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jenis_obat` varchar(50) NOT NULL,
  `dosis_aturan_obat` varchar(40) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `harga_obat` int(12) NOT NULL,
  `jumlah_obat` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_obat`
--

INSERT INTO `tbl_obat` (`kode_obat`, `nama_obat`, `jenis_obat`, `dosis_aturan_obat`, `satuan`, `harga_obat`, `jumlah_obat`) VALUES
('KO-01', 'Alpara', 'Kapsul', '3 x 1 Sehari', 'Kapsul', 2500, 70),
('KO-02', 'Polivanol', 'Obat Tetes Luka', 'Setiap Pakai 50 ml', 'Botol ', 3000, 40),
('KO-03', 'Pil Vitamin A', 'Suplemen', '3 x 1 Sehari', 'Strip', 3000, 35),
('KO-04', 'PoliSaxechon', 'Cairan Alkohol', 'Setiap Pakai 10 ml', 'Botol', 5000, 30),
('KO-05', 'Dextrane', 'Tablet', '3 x 1 Sehari', 'Strip', 3500, 40),
('KO-06', 'Salicyl', 'Bedak', '3 x 1 Sehari', 'Buah', 5000, 45),
('KO-07', 'Anexsamol', 'Kapsul', '2 x 1 Sehari', 'Strip', 2500, 35);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pasien`
--

CREATE TABLE `tbl_pasien` (
  `id_pasien` varchar(10) NOT NULL,
  `nama_pasien` varchar(20) DEFAULT NULL,
  `jk` varchar(9) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pasien`
--

INSERT INTO `tbl_pasien` (`id_pasien`, `nama_pasien`, `jk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `no_telp`) VALUES
('PSN0000001', 'Nathan', 'Laki-laki', 'Bogor', '1998-07-11', 'Jl. Raya Batutulis No. 77', '081282685142');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `kode_transaksi` varchar(20) NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `kode_antrian` varchar(20) NOT NULL,
  `nama_user` varchar(20) NOT NULL,
  `total_bayar` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pembayaran`
--

INSERT INTO `tbl_pembayaran` (`kode_transaksi`, `tanggal_transaksi`, `kode_antrian`, `nama_user`, `total_bayar`) VALUES
('TR00000001', '2019-08-23', 'PSN0000001', 'admin', 25000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendaftaran`
--

CREATE TABLE `tbl_pendaftaran` (
  `kode_antrian` varchar(20) NOT NULL,
  `tanggal_pendaftaran` date NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `nama_poli` varchar(10) DEFAULT NULL,
  `nama_dokter` varchar(20) NOT NULL,
  `nama_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pendaftaran`
--

INSERT INTO `tbl_pendaftaran` (`kode_antrian`, `tanggal_pendaftaran`, `nama_pasien`, `nama_poli`, `nama_dokter`, `nama_user`) VALUES
('PSN0000001', '2019-08-23', 'Nathan', 'POLI UMUM', 'Sunarya', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengadaan_obat`
--

CREATE TABLE `tbl_pengadaan_obat` (
  `kode_pengadaan` varchar(20) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `kode_obat` varchar(5) NOT NULL,
  `harga_obat` int(11) NOT NULL,
  `jumlah_beli` int(4) NOT NULL,
  `total` int(11) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `tgl_transaksi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengadaan_obat`
--

INSERT INTO `tbl_pengadaan_obat` (`kode_pengadaan`, `nama_supplier`, `kode_obat`, `harga_obat`, `jumlah_beli`, `total`, `total_harga`, `tgl_transaksi`) VALUES
('B-050319-0001', 'KIMIA FARMA', 'KO-01', 2500, 50, 50, 125000, '2019-03-05'),
('B-050319-0002', 'KIMIA FARMA', 'KO-02', 3000, 40, 40, 120000, '2019-03-05'),
('B-050319-0003', 'KIMIA FARMA', 'KO-03', 3000, 35, 35, 105000, '2019-03-05'),
('B-050319-0004', 'KIMIA FARMA', 'KO-04', 5000, 30, 30, 150000, '2019-03-05'),
('B-050319-0005', 'KIMIA FARMA', 'KO-05', 3500, 40, 40, 140000, '2019-03-05'),
('B-050319-0006', 'KIMIA FARMA', 'KO-06', 5000, 45, 45, 225000, '2019-03-05'),
('B-050319-0007', 'KIMIA FARMA', 'KO-07', 2500, 35, 35, 87500, '2019-03-05'),
('B-070319-0001', 'KIMIA FARMA', 'KO-01', 2500, 10, 60, 25000, '2019-03-07'),
('B-220419-0001', 'KIMIA FARMA', 'KO-01', 2500, 20, 80, 50000, '2019-04-22'),
('B-250419-001', 'KIMIA FARMA', 'KO-01', 2500, 10, 70, 25000, '2019-04-25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_poli`
--

CREATE TABLE `tbl_poli` (
  `id_poli` int(2) NOT NULL,
  `nama_poli` varchar(40) NOT NULL,
  `ruang_poli` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_poli`
--

INSERT INTO `tbl_poli` (`id_poli`, `nama_poli`, `ruang_poli`) VALUES
(1, 'POLI GIGI', 'RUANG POLI GIGI'),
(2, 'POLI UMUM', 'RUANG POLI UMUM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_resep`
--

CREATE TABLE `tbl_resep` (
  `kode_antrian` varchar(10) DEFAULT NULL,
  `nama_pasien` varchar(30) DEFAULT NULL,
  `resep` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_resep`
--

INSERT INTO `tbl_resep` (`kode_antrian`, `nama_pasien`, `resep`) VALUES
('PSN0000001', 'Nathan', 'PoliSaxechon Strip (2)\r\np.c. troche. tbsp. ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `kode_supplier` varchar(6) NOT NULL,
  `nama_supplier` varchar(60) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_telpon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`kode_supplier`, `nama_supplier`, `alamat`, `no_telpon`) VALUES
('SP-001', 'KIMIA FARMA', 'Jl. Merdeka No.24, Ciwaringin, Bogor Tengah, Kota ', '(0251) 838424');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(2) NOT NULL,
  `nama_user` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `images_user` varchar(20) NOT NULL,
  `id_user_level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `images_user`, `id_user_level`) VALUES
('1', 'Admin', 'admin@puskesmas.com', '21232f297a57a5a743894a0e4a801fc3', 'logo_admin.php', '1'),
('2', 'Calviano', 'calviano@puskesmas.com', '593b3ac0a61ebfd7cff5ec7e3a46b2a5', 'logo_resepsionis.png', '2'),
('3', 'Deiska', 'deiska@puskesmas.com', '9f42c248d6d43bb1cdf84a0aa7c29005', 'logo_apoteker.php', '3'),
('4', 'Cindy', 'cindy@puskesmas.com', 'cc4b2066cfef89f2475de1d4da4b29c7', 'logo_admin.png', '4');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `id_user_level` varchar(2) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`id_user_level`, `nama_level`) VALUES
('1', 'Admin'),
('2', 'Resepsionis'),
('3', 'Apoteker'),
('4', 'Dokter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dokter`
--
ALTER TABLE `tbl_dokter`
  ADD PRIMARY KEY (`kode_dokter`);

--
-- Indexes for table `tbl_jadwal_praktek_dokter`
--
ALTER TABLE `tbl_jadwal_praktek_dokter`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_obat`
--
ALTER TABLE `tbl_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `tbl_pasien`
--
ALTER TABLE `tbl_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tbl_pengadaan_obat`
--
ALTER TABLE `tbl_pengadaan_obat`
  ADD PRIMARY KEY (`kode_pengadaan`);

--
-- Indexes for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_jadwal_praktek_dokter`
--
ALTER TABLE `tbl_jadwal_praktek_dokter`
  MODIFY `id_jadwal` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_poli`
--
ALTER TABLE `tbl_poli`
  MODIFY `id_poli` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
