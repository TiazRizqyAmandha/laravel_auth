-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2021 pada 13.18
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_auth`
--
CREATE DATABASE IF NOT EXISTS `laravel_auth` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `laravel_auth`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

DROP TABLE IF EXISTS `komentar`;
CREATE TABLE `komentar` (
  `id` bigint(20) NOT NULL,
  `konten` text NOT NULL,
  `users_id` bigint(20) NOT NULL,
  `posts_id` int(10) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `konten`, `users_id`, `posts_id`, `parent`, `created_at`, `updated_at`) VALUES
(13, 'masih berlaku', 83, 107, 11, '2020-12-07 06:07:42', '2020-12-07'),
(14, 'jadi mendaftar ?', 83, 107, 11, '2020-12-07 06:08:08', '2020-12-07'),
(16, 'Hai apa kabar?', 84, 108, 0, '2020-12-07 06:13:23', '2020-12-07'),
(17, 'aku mau daftar', 85, 107, 0, '2020-12-07 23:12:46', '2020-12-08'),
(18, 'Hai hai', 86, 109, 0, '2021-01-05 09:13:47', '2021-01-05'),
(19, 'Test', 86, 110, 0, '2021-01-05 21:22:59', '2021-01-06'),
(20, 'test 2', 83, 109, 0, '2021-01-05 21:39:22', '2021-01-06'),
(21, '??', 83, 109, 18, '2021-01-05 21:39:30', '2021-01-06'),
(26, 'kenapa?', 86, 109, 18, '2021-01-15 02:51:36', '2021-01-15'),
(27, 'kenapa?', 86, 109, 18, '2021-01-15 02:51:37', '2021-01-15'),
(28, 'levina', 86, 109, 18, '2021-01-15 02:51:50', '2021-01-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_11_17_203458_create_posts_table', 2),
(4, '2020_11_26_065526_create_works_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_url` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `filter` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `posts_category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `category`, `document_url`, `filter`, `status`, `users_id`, `posts_category_id`, `created_at`, `updated_at`) VALUES
(108, 'Pembuatan Aplikasi KUMON', 'membuat website kumon untuk anak sd hingga sma', NULL, 'file/documents/doc_83/doc_Pembuatan-Aplikasi-KUMON_Dokumen3.txt', '{\"generation\":[\"2013\",\"2014\",\"2015\"],\"gender\":\"ALL\"}', 'Aktif', 83, 8, '2020-12-07 05:56:22', '2021-01-11 09:46:01'),
(109, 'Pembuatan Website Pemilu Online', 'membuat website pemerintah yang berguna untuk pemilihan suara secara online selama masa pendemi corona', NULL, 'file/documents/doc_84/doc_Pembuatan-Website-Pemilu-Online_1772052 Tiaz Rizqy Amandha - Prasidang TA.docx', '{\"generation\":[\"2017\",\"2019\"],\"gender\":\"L\"}', 'Aktif', 84, 7, '2020-12-07 06:15:45', '2020-12-07 06:16:30'),
(110, 'Pembuatan Website Keuangan dan Pembukuan', 'dicari pekerjaan yang bisa membuat sebuah website yang akan digunakan untuk pembukuan keuangan dalam sebuah perusahaan tekstil', NULL, 'file/documents/doc_84/doc_Pembuatan-Website-Keuangan-dan-Pembukuan_001 - Surat Keterangan telah melaksanakan tugas sebagai ASDOS Ganjil 1819.pdf', '{\"generation\":[\"2019\",\"2020\",\"2021\"],\"gender\":\"ALL\"}', 'Aktif', 85, 7, '2020-12-07 23:14:02', '2020-12-31 17:59:00'),
(111, 'Pembuatan Website Penilaian Guru', 'membuat website yang bisa memudahkan guru dalam memeriksa tugas-tugas siswa', NULL, 'file/documents/doc_86/doc_Pembuatan-Website-Penilaian-Guru_WhatsApp Image 2021-01-05 at 13.59.53.jpeg', '{\"generation\":[\"2014\",\"2015\",\"2016\"],\"gender\":\"ALL\"}', 'Aktif', 86, 7, '2021-01-07 16:03:21', '2021-01-07 16:03:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts_category`
--

DROP TABLE IF EXISTS `posts_category`;
CREATE TABLE `posts_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `posts_category`
--

INSERT INTO `posts_category` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Software', 'Aktif', '2020-11-21 11:03:05', '2020-12-06 07:04:09'),
(7, 'Developer', 'Aktif', '2020-11-25 11:57:43', '2020-11-28 02:54:47'),
(8, 'Front Developer', 'Aktif', '2020-11-27 08:21:39', '2021-01-11 09:45:40'),
(26, 'Composer Musik', 'Aktif', '2021-01-11 09:43:44', '2021-01-11 09:43:44'),
(27, 'Dancer', 'Aktif', '2021-01-11 10:02:18', '2021-01-11 10:02:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `generation` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `self_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key_user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password_key` varchar(52) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo_profil` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `birthdate`, `generation`, `phone_number`, `gender`, `role`, `self_description`, `username`, `key_user`, `password_key`, `status`, `photo_profil`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(83, 'Anastasha Levina', 'Komp. Setra Duta Purnama J1-10, Bandung', '1998-12-18', '2017', '085318078809', 'P', 'User', 'Seorang Programmer Handal Yang Akan Sangat Dibutuhkan Dunia Baik Dunia Asli Maupun Khayalan Dia Hidup Di Dunia Disney.', 'Lele', 'Levina-CNYQc', 'Levina-CmMJt', 'Aktif', 'Lele.jpg', 'tramandha240699@gmail.com', '2020-12-07 05:48:46', '$2y$10$CGJWoGtaRTYXkAZx1wVffOmxAgWz.PmAeTv/qXTXyw6IwHUgRSDhW', NULL, '2020-12-07 05:46:44', '2020-12-31 17:12:49'),
(84, 'Febrina Anastasha', 'Jalan', '2020-02-02', '2017', '08122034567', 'P', 'Admin', '-', 'Ubin', NULL, 'Febrina-YuacR', 'Aktif', 'Ubin.jpg', '1772052amandha@gmail.com', '2021-01-29 00:26:46', '$2y$10$M7onw0YskdXEjV8JGc1y3u7fP37bPlTTY.qHyrTR2I4aG69INa/P6', NULL, '2020-12-07 06:12:40', '2021-01-29 00:26:50'),
(85, 'Celine Lieshiana', 'Jl. Sukamekae 3 No 9', '1999-05-18', '2017', '085321540947', 'P', 'User', 'Seorang Perempuan Biasa-biasa :)', 'Cel2', 'coba-CJNjU', 'coba-FDZmK', 'Aktif', 'Celine.jpg', 'wakram190965@gmail.com', '2021-01-08 08:23:50', '$2y$10$.bseHk5vZxMOkY3gyNh98eILi19W79WAY3eBMU8cU2IqpOLh.6UlC', NULL, '2020-12-07 23:04:07', '2021-01-08 08:36:29'),
(86, 'Tiaz Rizqy Amandha', 'Jalan mentor no.66', '1999-06-24', '2017', '081220452951', 'P', 'Admin', 'seorang mahasiswa semester 7 yang sedang berjuang dengan stata, semoga berhasil :)', 'Cunda', NULL, 'Cunda-JXqEP', 'Aktif', 'Manda.jpg', 'amandhatiazrizqi@gmail.com', NULL, '$2y$10$7GdrEEYYEtX29G7PmVw60.CxD82AyZhSLTwZap5o5V6Yi0fO256i.', NULL, '2020-12-31 17:37:11', '2021-01-10 09:37:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE `works` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `works_place` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `works`
--

INSERT INTO `works` (`id`, `users_id`, `company`, `position`, `works_place`, `description`, `date_start`, `date_end`, `created_at`, `updated_at`) VALUES
(28, 83, 'Disney Land', 'CEO of Disney', '4600 North World Drive Orlando, FL 32830', 'Seorang CEO yang sangat mencintai Disney dan menjadi CEO yang terbaik pada masanya.', '2020-12-01', '2040-12-01', '2020-12-07 05:51:21', '2021-01-11 10:04:49'),
(29, 83, 'Pejuang Keadilan', 'Sekretaris', 'Jalan Pejuang Keadlina no.00', 'Seorang Sekretaris yang sangat mencintai keadilan', '2020-12-01', '2025-12-31', '2020-12-07 05:52:28', '2020-12-07 05:57:43'),
(30, 85, 'Perusahaan Ajaib', 'Developer dan Backend', 'Jalan ajaib no.77', 'bekerja dengan ajaib', '2020-12-01', '2025-12-31', '2020-12-07 23:10:26', '2020-12-31 18:01:26'),
(31, 86, 'Pejuang Kejujuran Sejak Dini', 'Pembuat Design Website', 'jln. pejuang kejujuran no.24', 'membuat sebuah website dengan design yang ditentukan oleh pembeli dengan syarat-syarat yang ada. juga membuat backend dari website tersebut jika dibutuhkan', '2020-01-01', '2025-01-01', '2020-12-31 17:40:47', '2020-12-31 17:40:47'),
(32, 86, 'Pejuang Keadilan', 'Pembuat Website Pemerintah', 'jln. pejuang keadilan no.24', 'membuat website yang dibutuhkan pemerintah, tergantung kebutuhan yang diinginkan oleh pemerintah', '2021-02-02', '2030-02-02', '2020-12-31 17:41:55', '2020-12-31 17:41:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_posts_category_id` (`posts_category_id`),
  ADD KEY `fk_users_id` (`users_id`);

--
-- Indeks untuk tabel `posts_category`
--
ALTER TABLE `posts_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_id` (`users_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT untuk tabel `posts_category`
--
ALTER TABLE `posts_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `works`
--
ALTER TABLE `works`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_category_id` FOREIGN KEY (`posts_category_id`) REFERENCES `posts_category` (`id`),
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
