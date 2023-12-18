-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Des 2023 pada 20.38
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_keluar`
--

CREATE TABLE `tb_barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_barang_keluar` int(11) NOT NULL,
  `ket_bKeluar` varchar(100) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang_keluar`
--

INSERT INTO `tb_barang_keluar` (`id_barang_keluar`, `tanggal`, `jumlah_barang_keluar`, `ket_bKeluar`, `id_merek`, `id_kategori`, `id_ruangan`, `id_stok`) VALUES
(2, '2023-06-19 04:45:48', 10, '', 6, 4, 1, 16),
(3, '2023-06-19 04:47:53', 5, 'Penerima Dinas', 6, 4, 1, 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang_masuk`
--

CREATE TABLE `tb_barang_masuk` (
  `id_barang_masuk` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah_barang_masuk` int(11) NOT NULL,
  `ket_bMasuk` varchar(100) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_barang_masuk`
--

INSERT INTO `tb_barang_masuk` (`id_barang_masuk`, `tanggal`, `jumlah_barang_masuk`, `ket_bMasuk`, `id_stok`, `id_merek`, `id_kategori`, `id_ruangan`) VALUES
(5, '2023-06-19 03:45:29', 1, 'Baik', 15, 9, 6, 3),
(6, '2023-06-19 04:04:38', 4, 'Baik', 15, 9, 6, 3),
(7, '2023-06-19 04:05:29', 5, 'Baik', 15, 9, 6, 3),
(8, '2023-06-19 04:21:26', 10, 'Baik', 16, 6, 4, 1),
(9, '2023-06-19 04:23:45', 10, 'Baik', 16, 6, 4, 1),
(10, '2023-06-19 04:26:35', 5, 'Baik', 12, 8, 6, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`, `keterangan`, `id_stok`) VALUES
(1, 'Alat Tulis', 'Seperti Pena, Pensil dan Buku', 0),
(2, 'Alat Komunikasi', 'Digunakan Untuk Berkomunikasi', 0),
(3, 'Alat Belajar', 'Alat-alat Pendukung Pembelajalan formal', 0),
(4, 'Alat Pembelajaran', 'Seperti Komputer dan Proyektor', 0),
(6, 'Peralatan Konsumsi', 'Peralatan untuk kebutuhan konsumsi', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kondisi_barang`
--

CREATE TABLE `tb_kondisi_barang` (
  `id_kondisi_barang` int(11) NOT NULL,
  `kondisi_barang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_kondisi_barang`
--

INSERT INTO `tb_kondisi_barang` (`id_kondisi_barang`, `kondisi_barang`) VALUES
(1, 'Baik'),
(2, 'Rusak'),
(3, 'Hilang'),
(4, 'Pinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_merek`
--

CREATE TABLE `tb_merek` (
  `id_merek` int(11) NOT NULL,
  `nama_merek` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `id_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_merek`
--

INSERT INTO `tb_merek` (`id_merek`, `nama_merek`, `keterangan`, `id_stok`) VALUES
(1, 'Epson 21', 'Alat Eletronik', 0),
(2, 'Vivo', 'Alat Eletronik', 0),
(3, 'Sony', 'Alat Eletronik 1', 0),
(4, 'Samsung', 'Misalnya J1 dan Galaxi', 0),
(6, 'Aser', 'Alat Eletronik Seperti Komputer, printer', 0),
(8, 'Miyako', 'Made in China', 0),
(9, 'Aqua', 'Merek Air Minum', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ruangan`
--

CREATE TABLE `tb_ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(100) NOT NULL,
  `id_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_ruangan`
--

INSERT INTO `tb_ruangan` (`id_ruangan`, `nama_ruangan`, `id_stok`) VALUES
(1, 'R - Komputer 02', 0),
(3, 'R - Dapur', 0),
(4, 'R - Tata Usaha', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_stok`
--

CREATE TABLE `tb_stok` (
  `id_stok` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `keterangan_barang` varchar(100) NOT NULL,
  `id_merek` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_kondisi_barang` int(11) NOT NULL,
  `id_ruangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_stok`
--

INSERT INTO `tb_stok` (`id_stok`, `nama_barang`, `jumlah_stok`, `keterangan_barang`, `id_merek`, `id_kategori`, `id_kondisi_barang`, `id_ruangan`) VALUES
(4, 'Samsung j1', 5, '', 4, 2, 1, 1),
(5, 'Vivo Y22', 5, '', 2, 2, 1, 1),
(11, 'Proyektor', 5, 'Diterima Oleh Paul', 3, 3, 2, 1),
(12, 'Dispenser', 6, 'Diberikan Oleh Ibu Kepala', 8, 6, 1, 3),
(13, 'Samsung j1', 0, '', 3, 1, 1, 1),
(14, 'Samsung j1', 0, '', 8, 1, 1, 1),
(15, 'Gelon Air Minum', 10, 'Di terima Mario', 9, 6, 1, 3),
(16, 'Komputer', 5, 'Diterima Oleh Paul', 6, 4, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `password`, `email`) VALUES
(1, 'admin', 'admin@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indeks untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_kondisi_barang`
--
ALTER TABLE `tb_kondisi_barang`
  ADD PRIMARY KEY (`id_kondisi_barang`);

--
-- Indeks untuk tabel `tb_merek`
--
ALTER TABLE `tb_merek`
  ADD PRIMARY KEY (`id_merek`);

--
-- Indeks untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  ADD PRIMARY KEY (`id_stok`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang_keluar`
--
ALTER TABLE `tb_barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_barang_masuk`
--
ALTER TABLE `tb_barang_masuk`
  MODIFY `id_barang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kondisi_barang`
--
ALTER TABLE `tb_kondisi_barang`
  MODIFY `id_kondisi_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_merek`
--
ALTER TABLE `tb_merek`
  MODIFY `id_merek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_ruangan`
--
ALTER TABLE `tb_ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_stok`
--
ALTER TABLE `tb_stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
