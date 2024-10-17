-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Okt 2024 pada 21.15
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
-- Database: `persuratan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kerja_lembur`
--

CREATE TABLE `laporan_kerja_lembur` (
  `id_lembur` int(11) NOT NULL,
  `hari_tgl_laporan` date NOT NULL,
  `waktu` time NOT NULL,
  `uraian_pekerjaan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laporan_kerja_lembur`
--

INSERT INTO `laporan_kerja_lembur` (`id_lembur`, `hari_tgl_laporan`, `waktu`, `uraian_pekerjaan`, `keterangan`) VALUES
(1, '2024-12-01', '17:00:00', 'Menyusun Permaterian Kuliah', 'Belum Selesai'),
(2, '2024-12-02', '18:00:00', 'Kelas Tambahan', 'Selesai'),
(3, '2024-12-03', '19:00:00', 'Menyusun Permaterian Kuliah', 'Selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggantian_pengawas_ujian`
--

CREATE TABLE `penggantian_pengawas_ujian` (
  `id_pengganti` int(11) NOT NULL,
  `nama_pengawas_diganti` varchar(255) NOT NULL,
  `unit_kerja` varchar(255) NOT NULL,
  `hari_tgl_penggantian` date NOT NULL,
  `jam` time NOT NULL,
  `ruang` varchar(50) NOT NULL,
  `nama_pengawas_pengganti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penggantian_pengawas_ujian`
--

INSERT INTO `penggantian_pengawas_ujian` (`id_pengganti`, `nama_pengawas_diganti`, `unit_kerja`, `hari_tgl_penggantian`, `jam`, `ruang`, `nama_pengawas_pengganti`) VALUES
(1, 'Muhammad Abi', 'Teknik Informatika', '2024-12-01', '08:00:00', 'A.1.1', 'Bianz Maulz'),
(2, 'Ambatron', 'Teknik Mesin', '2024-12-02', '09:00:00', 'A.1.2', 'Rusdi'),
(3, 'Dyrott', 'Teknik Elektro', '2024-12-01', '10:00:00', 'A.1.3', 'Miya');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `laporan_kerja_lembur`
--
ALTER TABLE `laporan_kerja_lembur`
  ADD PRIMARY KEY (`id_lembur`);

--
-- Indeks untuk tabel `penggantian_pengawas_ujian`
--
ALTER TABLE `penggantian_pengawas_ujian`
  ADD PRIMARY KEY (`id_pengganti`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
