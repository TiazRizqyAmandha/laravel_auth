-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Nov 2020 pada 09.19
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

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
(3, '2020_11_17_203458_create_posts_table', 2);

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
  `document_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(2, 'Lowongan HRD', 'abcdefgh', 'bisnis', NULL, NULL, 'Aktif', 1, 2, '2020-11-17 15:03:35', '2020-11-17 15:03:35'),
(3, 'Lowongan Sekretaris', 'Lowongan Baru', 'bisnis', NULL, NULL, 'Aktif', 1, 2, '2020-11-17 15:12:27', '2020-11-17 15:12:27'),
(4, 'Amandha Jaemin', 'coba', 'it', NULL, NULL, 'Aktif', 1, 1, '2020-11-17 15:14:10', '2020-11-18 02:16:12'),
(5, 'Ubin', 'coba2', 'it', NULL, NULL, 'Aktif', 1, 1, '2020-11-17 15:17:50', '2020-11-17 15:17:50'),
(6, 'Lele', 'coba3', 'bisnis', NULL, NULL, 'Aktif', 1, 2, '2020-11-17 15:18:32', '2020-11-17 15:18:32'),
(11, 'Contoh Updated', 'Contoh Deskripsi', NULL, 'file/documents/doc_2/doc_Contoh-Judul_Jadwal-UAS-Genap-1920.pdf', '{\"generation\":[\"2016\",\"2018\"],\"gender\":\"P\"}', 'Aktif', 2, 1, '2020-11-21 23:46:37', '2020-11-22 01:10:47');

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
(1, 'IT', 'Aktif', '2020-11-21 11:02:59', NULL),
(2, 'Bisnis', 'Aktif', '2020-11-21 11:03:05', NULL),
(3, 'Tidak Aktif', 'Tidak Aktif', '2020-11-21 19:04:26', '2020-11-21 19:06:56');

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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `address`, `birthdate`, `generation`, `phone_number`, `gender`, `role`, `self_description`, `username`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tiaz Rizqy Amandha', 'null', '1990-01-01', 'null', 'null', 'null', 'User', 'null', 'null', 'Aktif', 'amandhatiazrizqi@gmail.com', '2020-11-17 13:18:30', '$2y$10$kNLVsZ7stw0/RcgGljKs2O7QQMzTqGY4d0bRg.yosg0nQJv1IMunG', NULL, '2020-11-17 13:18:30', '2020-11-17 13:18:30'),
(2, 'Coba', 'coba', '2020-11-21', '2016', 'Coba', 'L', 'Admin', 'Coba', 'Coba', 'Aktif', 'coba@co.ba', '2020-11-21 10:00:10', '$2y$10$Ec8GsHyhFP/TL9XfUFGVreVXyIZ44/kjly11L0glU66eridOpZcpW', NULL, '2020-11-21 10:00:10', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `posts_category`
--
ALTER TABLE `posts_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_posts_category_id` FOREIGN KEY (`posts_category_id`) REFERENCES `posts_category` (`id`),
  ADD CONSTRAINT `fk_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
