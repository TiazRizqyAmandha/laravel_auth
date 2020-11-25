-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2020 pada 09.14
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

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

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
(2, 'Lowongan HRD', 'hrd membutuhkan lowongan lulusan S1/S2', 'bisnis', 'file/documents/doc_2/doc_Lowongan-HRD_nct dream black hair.png', '{\"generation\":[\"2016\",\"2018\",\"2020\"],\"gender\":\"L\"}', 'Aktif', 2, 4, '2020-11-17 15:03:35', '2020-11-24 23:20:52'),
(4, 'Lowongan Sekretaris', 'dibutuhkan sekretaris perusahaan A', 'it', 'file/documents/doc_1/doc_Lowongan-Sekretaris_chenle nct.jpg', '{\"generation\":[\"2012\",\"2013\",\"2014\"],\"gender\":\"P\"}', 'Aktif', 1, 4, '2020-11-17 15:14:10', '2020-11-23 09:14:02'),
(14, 'Lowongan BCA', 'bca membutuhkan karyawan', NULL, 'file/documents/doc_1/doc_Lowongan-BCA_er.png', '{\"generation\":[\"2012\",\"2013\",\"2014\",\"2015\",\"2016\",\"2017\",\"2018\",\"2019\",\"2020\"],\"gender\":\"P\"}', 'Aktif', 1, 2, '2020-11-23 09:12:25', '2020-11-23 09:12:25'),
(15, 'Lowongan Kasir Indomaret', 'dibutuhkan lowongan bagian kasir indomaret', NULL, 'file/documents/doc_5/doc_Lowongan-Kasir-Indomaret_stray kids.jpg', '{\"generation\":[\"2012\",\"2013\",\"2014\",\"2015\"],\"gender\":\"P\"}', 'Aktif', 5, 2, '2020-11-23 09:15:42', '2020-11-23 09:15:42'),
(16, 'Lowongan Dosen Maranatha', 'dosen maranatha', NULL, 'file/documents/doc_1/doc_Lowongan-Dosen-Maranatha_stray kids3.jpg', '{\"generation\":[\"2014\",\"2015\",\"2016\"],\"gender\":\"P\"}', 'Aktif', 1, 1, '2020-11-23 20:18:21', '2020-11-23 20:18:21'),
(17, 'Lowongan Manager NCT DREAM', 'Mencari manager untuk boy group nct dream, dengan masa magang 3 bulan, dan jika berhasil akan menjadi manager tetap dengan kontrak 5 tahun.', NULL, 'file/documents/doc_2/doc_Lowongan-Manager-NCT-DREAM_nct_dream_ridin.jpg', '{\"generation\":[\"2020\"],\"gender\":\"ALL\"}', 'Aktif', 1, 2, '2020-11-24 23:26:41', '2020-11-25 00:47:13'),
(18, 'Lowongan MUA', 'MUA untuk pengantin', NULL, 'file/documents/doc_2/doc_Lowongan-MUA_Jaehyun6.jpg', '{\"generation\":[\"2012\"],\"gender\":\"ALL\"}', 'Aktif', 1, 2, '2020-11-24 23:32:45', '2020-11-25 00:43:44'),
(19, 'Lowongan TU', 'Mencari orang', NULL, 'file/documents/doc_1/doc_Lowongan-TU_chenle nct.jpg', '{\"generation\":[\"2012\",\"2013\",\"2014\"],\"gender\":\"ALL\"}', 'Aktif', 1, 4, '2020-11-25 00:40:59', '2020-11-25 00:40:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts_category`
--

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
(4, 'HRD', 'Aktif', '2020-11-22 09:13:40', '2020-11-22 09:14:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

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

INSERT INTO `users` (`id`, `name`, `address`, `birthdate`, `generation`, `phone_number`, `gender`, `role`, `self_description`, `username`, `key_user`, `status`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tiaz Rizqy Amandha', 'Jalan Merdeka no.66', '1999-06-24', '2017', '081220452951', 'P', 'Admin', 'Mahasiswa Semester Akhir yang sedang mengambil TA', 'cunda', '', 'Aktif', 'amandha@gmail.com', '2020-11-17 13:18:30', '$2y$10$Gz2ezZ3DRoYgCUKEon8KfeIFBU1TTGgXoSmnJRX9vcUM2qEnDYPHe', NULL, '2020-11-17 13:18:30', '2020-11-24 06:53:42'),
(2, 'Daniel Jahja Surjawan', 'Jalan Sudirman Maranatha', '2020-11-21', '2016', '085353531051', 'L', 'Admin', 'Dosen Maranatha yang mengajar pada Fakultas Teknologi Informasi', 'daniel', '', 'Aktif', 'DanielJahjaSurjawan@gmail.com', '2020-11-21 10:00:10', '$2y$10$Ec8GsHyhFP/TL9XfUFGVreVXyIZ44/kjly11L0glU66eridOpZcpW', NULL, '2020-11-21 10:00:10', '2020-11-24 23:13:07'),
(5, 'Febrina Anastasha', 'Jalan Holis', '1999-02-10', '2017', '081220457865', 'P', 'User', 'Mahasiswa Aktif Menempuh Semester Akhir di Kampus Universitas Kristen Maranatha', 'Ubin', '', 'Aktif', 'ubin@gmail.com', '2020-11-22 02:22:48', '$2y$10$QLqZ1KYirKhwtvOuRV.O1u8O9yfdZJdNlNQXwmckLQo1KT9E2mKwe', NULL, '2020-11-22 02:22:48', '2020-11-24 07:13:06'),
(7, 'Celine Lieshiana', 'Jalan Sudirman', '1999-05-05', '2017', '081220203445', '', 'User', 'Mahasiswa Tingkat Akhir Jurusan It', 'Celcel', '', 'Aktif', 'celine@gmail.com', '2020-11-22 23:48:05', '$2y$10$ZrmrQtg.AyqC/HZ6wyExTOfWtYsxV30YJYuO4w/6wZqihh.ea18Im', NULL, '2020-11-22 23:48:05', '2020-11-22 23:48:05'),
(9, 'Na Jaemin', 'Jalan Dream Cabang Nct', '2000-08-13', '2018', '081220451234', 'L', 'User', 'Moodboster Orang Lain :)', 'nana', 'nana-faTJV', 'Aktif', 'jaemin@gmail.com', '2020-11-24 06:40:51', '$2y$10$4d0qQQ.WKXRflAUt9jAuZ.ZSpiT12gUpy//uEY2y4uT4D1nfBTSBm', NULL, '2020-11-24 06:40:03', '2020-11-24 06:40:51');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `posts_category`
--
ALTER TABLE `posts_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
