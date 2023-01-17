-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Jan 2023 pada 01.04
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_supir`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `crips`
--

CREATE TABLE `crips` (
  `id_crips` int(11) NOT NULL,
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `nama_crips` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `crips`
--

INSERT INTO `crips` (`id_crips`, `id_kriteria`, `nama_crips`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 3, '<= 1 Tahun', 1, NULL, NULL),
(2, 3, '>= 2 Tahun', 2, NULL, NULL),
(3, 3, '>= 5 Tahun', 3, NULL, NULL),
(4, 3, '>= 8 Tahun', 4, NULL, NULL),
(5, 4, 'SIM A', 1, NULL, NULL),
(6, 4, 'SIM B1', 2, NULL, NULL),
(7, 4, 'SIM B2 Umum', 3, NULL, NULL),
(8, 5, 'Luar Daerah', 1, NULL, NULL),
(9, 5, 'Kabupaten Batang', 2, NULL, NULL),
(10, 5, 'Kabupaten Pekalongan', 3, NULL, NULL),
(11, 5, 'Kota Pekalongan', 4, NULL, NULL),
(12, 6, 'Menikah', 1, NULL, NULL),
(13, 6, 'Belum Menikah', 2, NULL, NULL),
(14, 3, '26-30 tahun', 15, '2023-01-04 09:13:30', '2023-01-04 09:13:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_penilaian`
--

CREATE TABLE `detail_penilaian` (
  `id_detail_penilaian` int(11) NOT NULL,
  `id_penilaian` bigint(20) UNSIGNED NOT NULL,
  `id_crips` bigint(20) UNSIGNED DEFAULT NULL,
  `id_tes` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_penilaian`
--

INSERT INTO `detail_penilaian` (`id_detail_penilaian`, `id_penilaian`, `id_crips`, `id_tes`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 1, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(2, 1, NULL, 2, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(3, 1, 2, NULL, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(4, 1, 6, NULL, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(5, 1, 8, NULL, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(6, 1, 12, NULL, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(7, 2, NULL, 3, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(8, 2, NULL, 4, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(9, 2, 1, NULL, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(10, 2, 5, NULL, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(11, 2, 9, NULL, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(12, 2, 12, NULL, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(13, 3, NULL, 5, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(14, 3, NULL, 6, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(15, 3, 1, NULL, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(16, 3, 7, NULL, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(17, 3, 10, NULL, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(18, 3, 12, NULL, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(19, 4, NULL, 7, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(20, 4, NULL, 8, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(21, 4, 3, NULL, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(22, 4, 6, NULL, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(23, 4, 11, NULL, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(24, 4, 12, NULL, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(25, 5, NULL, 9, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(26, 5, NULL, 10, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(27, 5, 4, NULL, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(28, 5, 6, NULL, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(29, 5, 9, NULL, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(30, 5, 13, NULL, '2023-01-04 19:45:37', '2023-01-04 19:45:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tes`
--

CREATE TABLE `detail_tes` (
  `id_detail_tes` int(11) NOT NULL,
  `id_tes` bigint(20) UNSIGNED NOT NULL,
  `id_pertanyaan` bigint(20) UNSIGNED NOT NULL,
  `id_jawaban` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_tes`
--

INSERT INTO `detail_tes` (`id_detail_tes`, `id_tes`, `id_pertanyaan`, `id_jawaban`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(2, 1, 2, 8, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(3, 1, 3, 14, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(4, 1, 4, 20, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(5, 1, 5, 22, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(6, 2, 6, 30, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(7, 2, 7, 34, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(8, 2, 8, 38, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(9, 2, 9, 42, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(10, 2, 10, 47, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(11, 3, 1, 3, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(12, 3, 2, 7, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(13, 3, 3, 11, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(14, 3, 4, 18, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(15, 3, 5, 23, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(16, 4, 6, 27, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(17, 4, 7, 33, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(18, 4, 8, 37, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(19, 4, 9, 42, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(20, 4, 10, 46, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(21, 5, 1, 2, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(22, 5, 2, 6, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(23, 5, 3, 13, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(24, 5, 4, 17, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(25, 5, 5, 23, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(26, 6, 6, 28, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(27, 6, 7, 32, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(28, 6, 8, 37, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(29, 6, 9, 43, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(30, 6, 10, 47, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(31, 7, 1, 2, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(32, 7, 2, 7, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(33, 7, 3, 13, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(34, 7, 4, 19, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(35, 7, 5, 25, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(36, 8, 6, 29, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(37, 8, 7, 33, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(38, 8, 8, 37, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(39, 8, 9, 41, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(40, 8, 10, 47, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(41, 9, 1, 2, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(42, 9, 2, 8, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(43, 9, 3, 13, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(44, 9, 4, 17, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(45, 9, 5, 22, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(46, 10, 6, 27, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(47, 10, 7, 33, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(48, 10, 8, 37, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(49, 10, 9, 43, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(50, 10, 10, 47, '2023-01-04 19:45:37', '2023-01-04 19:45:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jawaban`
--

CREATE TABLE `jawaban` (
  `id_jawaban` int(11) NOT NULL,
  `id_pertanyaan` bigint(20) UNSIGNED NOT NULL,
  `pg` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jawaban` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jawaban`
--

INSERT INTO `jawaban` (`id_jawaban`, `id_pertanyaan`, `pg`, `jawaban`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 'Sangat Baik', 5, NULL, NULL),
(2, 1, 'B', 'Baik', 4, NULL, NULL),
(3, 1, 'C', 'Cukup', 3, NULL, NULL),
(4, 1, 'D', 'Buruk', 2, NULL, NULL),
(5, 1, 'E', 'Sangat Buruk', 1, NULL, NULL),
(6, 2, 'A', 'Sangat Baik', 5, NULL, NULL),
(7, 2, 'B', 'Baik', 4, NULL, NULL),
(8, 2, 'C', 'Cukup', 3, NULL, NULL),
(9, 2, 'D', 'Buruk', 2, NULL, NULL),
(10, 2, 'E', 'Sangat Buruk', 1, NULL, NULL),
(11, 3, 'A', 'Sangat Baik', 5, NULL, NULL),
(12, 3, 'B', 'Baik', 4, NULL, NULL),
(13, 3, 'C', 'Cukup', 3, NULL, NULL),
(14, 3, 'D', 'Buruk', 2, NULL, NULL),
(15, 3, 'E', 'Sangat Buruk', 1, NULL, NULL),
(16, 4, 'A', 'Sangat Baik', 5, NULL, NULL),
(17, 4, 'B', 'Baik', 4, NULL, NULL),
(18, 4, 'C', 'Cukup', 3, NULL, NULL),
(19, 4, 'D', 'Buruk', 2, NULL, NULL),
(20, 4, 'E', 'Sangat Buruk', 1, NULL, NULL),
(21, 5, 'A', 'Sangat Baik', 5, NULL, NULL),
(22, 5, 'B', 'Baik', 4, NULL, NULL),
(23, 5, 'C', 'Cukup', 3, NULL, NULL),
(24, 5, 'D', 'Buruk', 2, NULL, NULL),
(25, 5, 'E', 'Sangat Buruk', 1, NULL, NULL),
(26, 6, 'A', 'Sangat Baik', 5, NULL, NULL),
(27, 6, 'B', 'Baik', 4, NULL, NULL),
(28, 6, 'C', 'Cukup', 3, NULL, NULL),
(29, 6, 'D', 'Buruk', 2, NULL, NULL),
(30, 6, 'E', 'Sangat Buruk', 1, NULL, NULL),
(31, 7, 'A', 'Sangat Baik', 5, NULL, NULL),
(32, 7, 'B', 'Baik', 4, NULL, NULL),
(33, 7, 'C', 'Cukup', 3, NULL, NULL),
(34, 7, 'D', 'Buruk', 2, NULL, NULL),
(35, 7, 'E', 'Sangat Buruk', 1, NULL, NULL),
(36, 8, 'A', 'Sangat Baik', 5, NULL, NULL),
(37, 8, 'B', 'Baik', 4, NULL, NULL),
(38, 8, 'C', 'Cukup', 3, NULL, NULL),
(39, 8, 'D', 'Buruk', 2, NULL, NULL),
(40, 8, 'E', 'Sangat Buruk', 1, NULL, NULL),
(41, 9, 'A', 'Sangat Baik', 5, NULL, NULL),
(42, 9, 'B', 'Baik', 4, NULL, NULL),
(43, 9, 'C', 'Cukup', 3, NULL, NULL),
(44, 9, 'D', 'Buruk', 2, NULL, NULL),
(45, 9, 'E', 'Sangat Buruk', 1, NULL, NULL),
(46, 10, 'A', 'Sangat Baik', 5, NULL, NULL),
(47, 10, 'B', 'Baik', 4, NULL, NULL),
(48, 10, 'C', 'Cukup', 3, NULL, NULL),
(49, 10, 'D', 'Buruk', 2, NULL, NULL),
(50, 10, 'E', 'Sangat Buruk', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('Crips','Pertanyaan') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Crips',
  `attribut` enum('Benefit','Cost') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Benefit',
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `jenis`, `attribut`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'Tes Keahlian Mengemudi', 'Pertanyaan', 'Benefit', 20, NULL, NULL),
(2, 'Tes Wawancara', 'Pertanyaan', 'Benefit', 25, NULL, NULL),
(3, 'Pengalaman Kerja', 'Crips', 'Benefit', 15, NULL, NULL),
(4, 'SIM', 'Crips', 'Benefit', 15, NULL, NULL),
(5, 'Jarak', 'Crips', 'Benefit', 15, NULL, NULL),
(6, 'Status Menikah', 'Crips', 'Cost', 10, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2022_11_18_025213_create_supir_table', 1),
(3, '2022_11_18_072210_create_periode_table', 1),
(4, '2022_12_05_063511_create_kriterias_table', 1),
(5, '2022_12_05_063554_create_crips_table', 1),
(6, '2022_12_07_040045_create_penilaians_table', 1),
(7, '2022_12_08_145715_create_pertanyaans_table', 1),
(8, '2022_12_09_010826_create_jawabans_table', 1),
(9, '2022_12_10_015307_create_detail_penilaians_table', 1),
(10, '2022_12_10_031805_create_tes_table', 1),
(11, '2022_12_10_031818_create_detail_tes_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_supir` bigint(20) UNSIGNED NOT NULL,
  `id_periode` bigint(20) UNSIGNED NOT NULL,
  `total_score` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_supir`, `id_periode`, `total_score`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 34, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(2, 3, 1, 43, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(3, 2, 1, 45, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(4, 4, 1, 42, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(5, 5, 1, 46, '2023-01-04 19:45:36', '2023-01-04 19:45:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
--

CREATE TABLE `periode` (
  `id_periode` int(11) NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ket` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`id_periode`, `judul`, `ket`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Periode Bulan November', 'Membutuhkan 2 Supir', 0, NULL, '2023-01-05 23:04:28'),
(4, 'Periode Bulan Desember', '-', 1, '2023-01-01 00:44:18', '2023-01-04 04:35:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` int(11) NOT NULL,
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `soal` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `id_kriteria`, `soal`, `created_at`, `updated_at`) VALUES
(1, 1, 'Teknik Parkir', NULL, NULL),
(2, 1, 'Teknik Tanjakan', NULL, NULL),
(3, 1, 'Teknik Pengereman', NULL, NULL),
(4, 1, 'Patuh Rambu Lalu Lintas', NULL, NULL),
(5, 1, 'Keamanan Dalam Mengemudi', NULL, NULL),
(6, 2, 'Wawancara Kesehatan', NULL, NULL),
(7, 2, 'Trayek Pengiriman Barang', NULL, NULL),
(8, 2, 'Kedisiplinan', NULL, NULL),
(9, 2, 'Komunikasi', NULL, NULL),
(10, 2, 'Kejujuran', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `supir`
--

CREATE TABLE `supir` (
  `id_supir` int(11) NOT NULL,
  `nama` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lahir` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supir`
--

INSERT INTO `supir` (`id_supir`, `nama`, `lahir`, `tgl_lahir`, `alamat`, `hp`, `created_at`, `updated_at`) VALUES
(1, 'Arif', 'Manado', '1985-03-31', 'Ds. Ters. Jakarta No. 255, Parepare 99764, Lampung', '023 1538 355', NULL, NULL),
(2, 'Bagus', 'Makassar', '2006-05-18', 'Gg. Dewi Sartika No. 23, Padangpanjang 26023, Maluku', '(+62) 26 7693 349', NULL, NULL),
(3, 'Daryo', 'Parepare', '2013-10-09', 'Jln. Gading No. 473, Subulussalam 42665, JaTeng', '0970 8624 7647', NULL, NULL),
(4, 'Suwito', 'Sawahlunto', '2009-10-06', 'Gg. Achmad Yani No. 342, Bandung 28336, Papua', '(+62) 28 4649 962', NULL, NULL),
(5, 'Tahril', 'Medan', '1999-10-25', 'Jln. Flores No. 909, Bontang 76643, SulUt', '(+62) 775 5455 858', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tes`
--

CREATE TABLE `tes` (
  `id_tes` int(11) NOT NULL,
  `id_kriteria` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tes`
--

INSERT INTO `tes` (`id_tes`, `id_kriteria`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(2, 2, '2023-01-02 22:32:29', '2023-01-02 22:32:29'),
(3, 1, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(4, 2, '2023-01-02 22:32:55', '2023-01-02 22:32:55'),
(5, 1, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(6, 2, '2023-01-02 22:33:11', '2023-01-02 22:33:11'),
(7, 1, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(8, 2, '2023-01-02 22:33:28', '2023-01-02 22:33:28'),
(9, 1, '2023-01-04 19:45:37', '2023-01-04 19:45:37'),
(10, 2, '2023-01-04 19:45:37', '2023-01-04 19:45:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'Ahmad Rifki', 'rifki', 'rifki@gmail.com', '$2y$10$Cq6MTKnMzICgMx1fWnEWJ.hGgVlABJT70K2hSlK4TIB5oWHdj357e', 1, '2023-01-01 00:42:39', '2023-01-01 00:42:39'),
(2, 'Administrator', 'admin', 'admin@gmail.com', '$2y$10$iQL4aAAF8UhWemHv1bAOtu557fxYmS7Gh5MXCvsrmxoEStfSdOWWe', 0, '2023-01-01 00:42:39', '2023-01-01 00:42:39');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `crips`
--
ALTER TABLE `crips`
  ADD PRIMARY KEY (`id_crips`);

--
-- Indeks untuk tabel `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  ADD PRIMARY KEY (`id_detail_penilaian`);

--
-- Indeks untuk tabel `detail_tes`
--
ALTER TABLE `detail_tes`
  ADD PRIMARY KEY (`id_detail_tes`);

--
-- Indeks untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id_jawaban`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD UNIQUE KEY `kriteria_nama_kriteria_unique` (`nama_kriteria`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id_periode`),
  ADD UNIQUE KEY `periode_judul_unique` (`judul`);

--
-- Indeks untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id_pertanyaan`);

--
-- Indeks untuk tabel `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id_supir`);

--
-- Indeks untuk tabel `tes`
--
ALTER TABLE `tes`
  ADD PRIMARY KEY (`id_tes`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `crips`
--
ALTER TABLE `crips`
  MODIFY `id_crips` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `detail_penilaian`
--
ALTER TABLE `detail_penilaian`
  MODIFY `id_detail_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `detail_tes`
--
ALTER TABLE `detail_tes`
  MODIFY `id_detail_tes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id_jawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `id_periode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id_pertanyaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `supir`
--
ALTER TABLE `supir`
  MODIFY `id_supir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tes`
--
ALTER TABLE `tes`
  MODIFY `id_tes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
