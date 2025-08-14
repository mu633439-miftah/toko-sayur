-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2025 at 12:06 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_toko_sayur`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_30_121430_create_suppliers_table', 1),
(5, '2025_05_30_123519_create_products_table', 1),
(6, '2025_05_31_014332_create_stocks_table', 1),
(7, '2025_05_31_104557_create_transactions_table', 1),
(8, '2025_05_31_104613_create_transaction_items_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `supplier_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `harga` int NOT NULL,
  `photo` varchar(255) NOT NULL,
  `type` enum('sayur','buah','daging','ikan','bumbu dapur','lainnya') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'sayur',
  `satuan` enum('kilogram','setengah','seperempat','pcs','iket') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'kilogram',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `supplier_id`, `name`, `harga`, `photo`, `type`, `satuan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Daging Sapi', 150000, 'http://127.0.0.1:8000/storage/uploads/gwrKTa7yqjJpnMisXn5ANCxwYfL5AvJYRRxiuN7h.jpg', 'daging', 'kilogram', '2025-07-04 00:55:19', '2025-07-04 01:56:35'),
(2, 2, 'Kangkung', 1500, 'http://127.0.0.1:8000/storage/uploads/BlISQkk5u84kVKbhnD3t5RJwuCNktsdKIMhIen9A.jpg', 'sayur', 'pcs', '2025-07-04 02:19:05', '2025-07-04 02:19:25'),
(3, 2, 'Bayam', 2000, 'http://127.0.0.1:8000/storage/uploads/flkNp8iehBbDltDqL6pFk7YLbAYsjYKdsDkFFWM5.jpg', 'sayur', 'pcs', '2025-07-04 02:20:19', '2025-07-04 02:20:19'),
(4, 2, 'Daun Singkong', 2000, 'http://127.0.0.1:8000/storage/uploads/XCGM8mmVXZvcDPSBoJFQVJMFyiFMgjToytZbaNSE.jpg', 'sayur', 'iket', '2025-07-04 02:21:30', '2025-07-04 02:21:30'),
(5, 2, 'Sawi Hijau', 15000, 'http://127.0.0.1:8000/storage/uploads/lUwE1uGdosGBKgBJBV9Fz2FwU901zf9Cqat8vQvC.jpg', 'sayur', 'kilogram', '2025-07-04 02:22:31', '2025-07-04 02:22:31'),
(6, 2, 'Sawi Putih', 18000, 'http://127.0.0.1:8000/storage/uploads/y2ZsZtNYdUj6ycIJEPhpMT3Qp27wDLgUhqiGhb0I.jpg', 'sayur', 'kilogram', '2025-07-04 02:23:27', '2025-07-04 02:23:27'),
(7, 2, 'Kol', 12000, 'http://127.0.0.1:8000/storage/uploads/W41GPEhTMGmaRvdOM9kt5FcwVx1gw9Y1J09MvM2Q.jpg', 'sayur', 'kilogram', '2025-07-04 02:24:08', '2025-07-04 02:24:08'),
(8, 2, 'Kacang Panjang', 18000, 'http://127.0.0.1:8000/storage/uploads/I0T2fgIY8OogBEKI6pWAIUk7xiLqOHy6Czgte0R5.jpg', 'sayur', 'kilogram', '2025-07-04 02:24:47', '2025-07-04 02:24:47'),
(9, 2, 'Daun Seledri', 30000, 'http://127.0.0.1:8000/storage/uploads/cacclz9ndpmiXyR8BUGdMTsASZLWQfcvIHApob9O.jpg', 'sayur', 'kilogram', '2025-07-04 02:25:31', '2025-07-04 02:25:31'),
(10, 2, 'Daun Bawang', 30000, 'http://127.0.0.1:8000/storage/uploads/XtWt7OFovZZTEq8f6DZ9A5dXrQYnyY5d1vFkxxpf.jpg', 'sayur', 'kilogram', '2025-07-04 02:26:18', '2025-07-04 02:26:18'),
(11, 2, 'Wortel', 20000, 'http://127.0.0.1:8000/storage/uploads/GEX3NaXA2r13ZK4f1Cm2At75UsYHrtgo6njffHAm.jpg', 'sayur', 'kilogram', '2025-07-04 02:26:55', '2025-07-04 02:26:55'),
(12, 2, 'Buncis', 20000, 'http://127.0.0.1:8000/storage/uploads/LPjC4SgCGz0K7BZ103ZuPUtj1azpzBaP9MyIeDUc.jpg', 'sayur', 'kilogram', '2025-07-04 02:27:42', '2025-07-04 02:27:42'),
(13, 2, 'Kentang', 20000, 'http://127.0.0.1:8000/storage/uploads/SaRTjEzt28Wcct6PNL84yqzvVpD3tORHjhg1sKFn.jpg', 'sayur', 'kilogram', '2025-07-04 02:28:16', '2025-07-04 02:28:16'),
(14, 2, 'Tomat', 25000, 'http://127.0.0.1:8000/storage/uploads/iO0ygyqS64cmowH1aEopIbTe8YVXwHObgcL9enmO.jpg', 'sayur', 'kilogram', '2025-07-04 02:28:57', '2025-07-04 02:28:57'),
(15, 3, 'Naga', 30000, 'http://127.0.0.1:8000/storage/uploads/smiftguq5eqiNWjWRLouRvlHaShUZI1T5GOOwjOw.jpg', 'buah', 'kilogram', '2025-07-04 04:38:55', '2025-07-04 04:39:17'),
(16, 3, 'Apel', 40000, 'http://127.0.0.1:8000/storage/uploads/BCDCZVLj088BR4ON6C8IUfDvreLIQcbp5gHzTZGH.jpg', 'buah', 'kilogram', '2025-07-04 04:40:02', '2025-07-04 04:40:16'),
(17, 3, 'Pir', 35000, 'http://127.0.0.1:8000/storage/uploads/mS4rmS33yJUnf7FpqqWLA9bzKdR5Rs7XlJrpq5sl.jpg', 'buah', 'kilogram', '2025-07-04 04:41:02', '2025-07-04 04:41:02'),
(18, 3, 'Anggur', 70000, 'http://127.0.0.1:8000/storage/uploads/hMDYdWrLNrneDc5ulOK5nlX0z15fTm3XJRvzK588.jpg', 'buah', 'kilogram', '2025-07-04 04:41:37', '2025-07-04 04:41:37'),
(19, 3, 'Mangga', 25000, 'http://127.0.0.1:8000/storage/uploads/EQZhfFp1AZAvhOw759fmv380uWIC5LwjM8fujlwR.webp', 'buah', 'kilogram', '2025-07-04 04:42:08', '2025-07-04 04:42:08'),
(20, 3, 'Alpukat', 35000, 'http://127.0.0.1:8000/storage/uploads/qMQAEUKfkNOjo89HPLtpEUPahweH61jQSMpVX5EP.jpg', 'buah', 'kilogram', '2025-07-04 04:42:52', '2025-07-04 04:42:52'),
(21, 3, 'Salak', 13000, 'http://127.0.0.1:8000/storage/uploads/1wTLfFWplFYORxuZ6gr8igr0AGtSCWHBePIaKMJc.jpg', 'buah', 'kilogram', '2025-07-04 04:43:42', '2025-07-04 04:43:42'),
(22, 3, 'Strawbery', 15000, 'http://127.0.0.1:8000/storage/uploads/QcprihtEtApLyms5uvrItshitik5gOrVv7KaGVOe.jpg', 'buah', 'kilogram', '2025-07-04 04:44:28', '2025-07-04 04:44:28'),
(23, 3, 'Semangka', 13000, 'http://127.0.0.1:8000/storage/uploads/aMyGthOtEyyKZ7JelvMlIJVacsgQz6JFsLnjv2YN.jpg', 'buah', 'kilogram', '2025-07-04 04:45:15', '2025-07-04 04:45:15'),
(24, 3, 'Melon Madu', 24000, 'http://127.0.0.1:8000/storage/uploads/dY8GOC3ATsSHuPNJsUjOQATpvyFWYkEuIZCDaU7z.jpg', 'buah', 'kilogram', '2025-07-04 04:45:57', '2025-07-04 04:45:57'),
(25, 3, 'Pepaya', 12000, 'http://127.0.0.1:8000/storage/uploads/aIXSlX0JAOgHoeJkQAO0WoZkEJ8z6z44iyXJVv05.jpg', 'buah', 'kilogram', '2025-07-04 04:46:35', '2025-07-04 04:46:35'),
(26, 3, 'Pisang', 25000, 'http://127.0.0.1:8000/storage/uploads/Sz5gpvC7rrpdDVJHd4i6hQmK9UorwXBwd5P1Dd8b.jpg', 'buah', 'kilogram', '2025-07-04 04:47:12', '2025-07-04 04:47:12'),
(27, 3, 'Jeruk', 30000, 'http://127.0.0.1:8000/storage/uploads/6VMkLBaVjkN1V7ULxVNGxHyn29ZHvNLTqzMEfEy5.jpg', 'buah', 'kilogram', '2025-07-04 04:47:58', '2025-07-04 04:47:58'),
(28, 1, 'Iga Sapi', 95000, 'http://127.0.0.1:8000/storage/uploads/NugC0IqaSw1kzKrP8pTH2iac6NDQnAQemxM863C0.jpg', 'daging', 'kilogram', '2025-07-04 19:02:55', '2025-07-04 19:03:49'),
(29, 4, 'Jahe', 35000, 'http://127.0.0.1:8000/storage/uploads/72Hm8AC7Y5LmsUfiojwWqbpjsObfcBxyZlk0x5L6.jpg', 'bumbu dapur', 'kilogram', '2025-07-04 19:07:31', '2025-07-04 19:07:50'),
(30, 4, 'Lengkuas', 20000, 'http://127.0.0.1:8000/storage/uploads/fbJoPjy1uUQscduKTCedxtV765RrYbhKJfF6ucJO.jpg', 'bumbu dapur', 'kilogram', '2025-07-04 19:23:25', '2025-07-04 19:33:13'),
(31, 4, 'Kunyit', 25000, 'http://127.0.0.1:8000/storage/uploads/DQkGj648cJGcU1qqXCzgYtdiiInviOFtjNLiMOev.jpg', 'bumbu dapur', 'kilogram', '2025-07-04 19:43:43', '2025-07-04 19:43:43'),
(32, 4, 'Sereh', 15000, 'http://127.0.0.1:8000/storage/uploads/U7B249wnfOXiFgjlkXPtUPjxqObXqloBUaQwGJ6I.jpg', 'bumbu dapur', 'kilogram', '2025-07-04 19:44:33', '2025-07-04 19:44:33'),
(33, 4, 'Daun Salam', 5000, 'http://127.0.0.1:8000/storage/uploads/W9OFrI3cql8nkCJGkprjSEV6AgvM1XDaYttl9BqP.jpg', 'bumbu dapur', 'iket', '2025-07-04 19:45:17', '2025-07-04 19:45:17'),
(34, 4, 'Daun Jeruk', 14998, 'http://127.0.0.1:8000/storage/uploads/gENBSYV8GzMoml5LqvkzsAQxobWtZg5TZEdzds4F.jpg', 'bumbu dapur', 'seperempat', '2025-07-04 19:48:31', '2025-07-04 19:48:31'),
(35, 4, 'Kencur', 50000, 'http://127.0.0.1:8000/storage/uploads/PwevKkNNK3yMNAQNeTtIJ3rOd9HWGapc3voYmhhJ.jpg', 'bumbu dapur', 'kilogram', '2025-07-04 19:49:53', '2025-07-04 19:49:53'),
(36, 2, 'Kembang Kol', 35000, 'http://127.0.0.1:8000/storage/uploads/5L4Dp7Iocz2rqZNGGP6OlO14eODF3wCL6eOw2oRN.jpg', 'sayur', 'kilogram', '2025-07-04 19:51:42', '2025-07-04 19:51:42'),
(37, 4, 'Brokoli', 39999, 'http://127.0.0.1:8000/storage/uploads/iU6xXeF0NIQqYZmRJ7ZZb3imTXa7YsO3Qgpyviuw.jpg', 'sayur', 'kilogram', '2025-07-04 19:52:20', '2025-07-04 19:52:20'),
(38, 1, 'Daging Sop', 130000, 'http://127.0.0.1:8000/storage/uploads/1He38vFEVgCzhKJ6UunjJRFQXLcJMOXuzKGmV6KE.jpg', 'daging', 'kilogram', '2025-07-04 19:53:34', '2025-07-04 19:53:34'),
(39, 1, 'Ati Sapi', 79999, 'http://127.0.0.1:8000/storage/uploads/3nhN08LJ4JpPmBNqimvTfWALEAzEdhkqhqEbhOe1.jpg', 'daging', 'kilogram', '2025-07-04 19:54:09', '2025-07-04 19:54:09'),
(40, 1, 'Paru Sapi', 90000, 'http://127.0.0.1:8000/storage/uploads/7Aqu74Vpg9yyRusg7XjsYRaiOpDapb7AfejmnHFi.jpg', 'daging', 'kilogram', '2025-07-04 19:54:44', '2025-07-04 19:54:44'),
(41, 5, 'Ayam Besar', 50000, 'http://127.0.0.1:8000/storage/uploads/AOCklWjEpTy0HwZ1hiqBvd4faLmBtO4iL4FC0ZtY.jpg', 'daging', 'kilogram', '2025-07-05 04:09:36', '2025-07-05 04:11:36'),
(42, 5, 'Ayam Sedang', 35000, 'http://127.0.0.1:8000/storage/uploads/LwcdYYiBq98PnfQruhFi6Hm9eecYFX8pzHMstwWx.jpg', 'daging', 'kilogram', '2025-07-05 04:09:36', '2025-07-05 04:11:53'),
(43, 5, 'Ayam Fillet Dada', 50000, 'http://127.0.0.1:8000/storage/uploads/GJP35IH2ZJyj9pnjivMOTrTU43Y3cZQg0xuPExt5.jpg', 'daging', 'kilogram', '2025-07-05 04:09:36', '2025-07-05 04:10:48'),
(44, 5, 'Ayam Fillet Paha', 48000, 'http://127.0.0.1:8000/storage/uploads/2ahaHX2VgbO6kcNwrmOkc7EOKFNfXQlQMTTxFkYW.jpg', 'daging', 'kilogram', '2025-07-05 04:09:36', '2025-07-05 04:10:35'),
(45, 5, 'Paha Pentung', 50000, 'http://127.0.0.1:8000/storage/uploads/bdMcd6uc85Ge3PWuN949Sbvjbs5GOUBOunyoVLi7.jpg', 'daging', 'kilogram', '2025-07-05 04:09:36', '2025-07-05 04:10:00'),
(46, 5, 'Ceker Ayam', 35000, 'http://127.0.0.1:8000/storage/uploads/xJWgKQk4BS6agFVpwYAtzLULyqqBAzFz1QHcN9VC.jpg', 'daging', 'kilogram', '2025-07-05 04:09:36', '2025-07-05 04:11:04'),
(47, 6, 'Ikan Tenggiri', 100000, 'http://127.0.0.1:8000/storage/uploads/1lC0xDQtwy67b48jrdcDU3zcRx7bihVXMee8dX5Q.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:27:23'),
(48, 6, 'Ikan Tongkol', 35000, 'http://127.0.0.1:8000/storage/uploads/Cdg1UqYchqSmHG3wydxFOdVVgJjJqJQG11ibaVZE.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:27:40'),
(49, 6, 'Ikan Tuna', 70000, 'http://127.0.0.1:8000/storage/uploads/6F6EPMmDZa8bSqFEbPrt7LY8hyqKsjgmMKAGZXlj.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:27:59'),
(50, 6, 'Ikan Mas', 35000, 'http://127.0.0.1:8000/storage/uploads/jV4pJh8BLbuw43weLoyA6BYFr1SpDx9j1KTXU1Ip.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:28:16'),
(51, 6, 'Ikan Lele', 25000, 'http://127.0.0.1:8000/storage/uploads/7qhLhTNXj9CrqjaCBWKJgaBdpGODI99n4LX0SDRU.png', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:26:29'),
(52, 6, 'Ikan Patin', 30000, 'http://127.0.0.1:8000/storage/uploads/FXfsmbscqo6L2uCvgl2eRMdH0b8iuYpTmZwZUabQ.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:26:04'),
(53, 6, 'Ikan Gurame', 40000, 'http://127.0.0.1:8000/storage/uploads/Awec5EN8FdX9ogcGCtQHJLPdiGQfTtAduY9jhz4f.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:27:02'),
(54, 6, 'Ikan Mujair', 35000, 'http://127.0.0.1:8000/storage/uploads/5901wZ6qIsHexnEX9GpgfbrIZzqwFNf0SZgBmOco.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:25:44'),
(55, 6, 'Ikan Nila', 35000, 'http://127.0.0.1:8000/storage/uploads/QpxlVfoKiecow2X75iH8KUlP2oSSgMkZxz3s7y2X.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:24:46'),
(56, 6, 'Ikan Bandeng', 40000, 'http://127.0.0.1:8000/storage/uploads/ktNh5DlI1fXw3Jred62VZUJZ3yjupqlWYCFDoGMP.png', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:24:29'),
(57, 6, 'Ikan Kembung', 40000, 'http://127.0.0.1:8000/storage/uploads/ZRSvC7V2NDrgESmkVKuRyaap7qcWgEY1IB9Mh5g5.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:23:39'),
(58, 6, 'Udang Kecil', 50000, 'http://127.0.0.1:8000/storage/uploads/v668NkGXdzyKTCeAqZAluRP1YMvY6g21cQLI7Nti.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:23:17'),
(59, 6, 'Udang Besar', 110000, 'http://127.0.0.1:8000/storage/uploads/GS32PgzNCWyURCCoAUuA5ObcEVas3Zothhw8NO0D.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:22:07'),
(60, 6, 'Udang Sedang', 65000, 'http://127.0.0.1:8000/storage/uploads/9DPTjtJFdOFU3niopB1z5lZ14KZhZ20JXSICS5jM.jpg', 'ikan', 'kilogram', '2025-07-05 04:21:00', '2025-07-05 04:25:21'),
(61, 7, 'Tempe', 5000, 'http://127.0.0.1:8000/storage/uploads/OHnqaI6fjrOk5VWZpgS5PYhyulMvtfA69UdEUR6F.jpg', 'lainnya', 'pcs', '2025-07-07 17:56:46', '2025-07-07 17:59:50'),
(62, 7, 'Tempe Bungkus', 8000, 'http://127.0.0.1:8000/storage/uploads/GeuK6DFf83XDBHxnVy4SfWVgGJtreUaWt8mfqEdU.jpg', 'lainnya', 'pcs', '2025-07-07 17:56:46', '2025-07-07 18:00:16'),
(63, 8, 'Tahu Susu', 8000, 'http://127.0.0.1:8000/storage/uploads/AGRC8fs3SRVwMPbXlC4AFjDmVDoAA1VATROXpa3A.jpg', 'lainnya', 'pcs', '2025-07-07 17:59:23', '2025-07-07 18:02:17'),
(64, 8, 'Tahu Sutra', 5000, 'http://127.0.0.1:8000/storage/uploads/rA34UrbYXdmmUnRFfHP3BV1973mFYB1xf4XcEpX0.jpg', 'lainnya', 'pcs', '2025-07-07 17:59:23', '2025-07-07 18:02:00'),
(65, 8, 'Tahu Goreng', 5000, 'http://127.0.0.1:8000/storage/uploads/5OEaJJLV6v515DOu8lHNURiyuFWSh4I7eFNA3Bgy.jpg', 'lainnya', 'pcs', '2025-07-07 17:59:23', '2025-07-07 18:02:32'),
(66, 8, 'Tahu Kering', 8000, 'http://127.0.0.1:8000/storage/uploads/EjYiD2pRYdaVlUrVPpzXdaSGe2KlX8S8C1BBQ7pN.jpg', 'lainnya', 'pcs', '2025-07-07 17:59:23', '2025-07-07 18:03:19'),
(67, 9, 'Cabai Merah Keriting', 55000, 'http://127.0.0.1:8000/storage/uploads/HsaRmao6PdmrzCuCU1PDTyYkpJ4WBjMCRFawwKt2.jpg', 'lainnya', 'kilogram', '2025-07-07 18:11:19', '2025-07-07 19:12:47'),
(68, 9, 'Cabai Rawit Merah', 70000, 'http://127.0.0.1:8000/storage/uploads/8gDONpOWbj2ttEzXBwlYy06S4s9MNh2VTPxhkozh.jpg', 'lainnya', 'kilogram', '2025-07-07 18:11:19', '2025-07-07 18:11:49'),
(69, 9, 'Cabai Rawit Hijau', 50000, 'http://127.0.0.1:8000/storage/uploads/hA22xTfo8NrqGmkMxIIVZLAEJH9ulUtW21Njej0F.jpg', 'lainnya', 'kilogram', '2025-07-07 18:11:19', '2025-07-07 18:12:40'),
(70, 9, 'Cabai Hijau Besar', 40000, 'http://127.0.0.1:8000/storage/uploads/4i4Rs6jIGTHuHZKw6KnMUSwf9qOMZZ2xfTP3EOPD.jpg', 'lainnya', 'kilogram', '2025-07-07 18:11:19', '2025-07-07 18:12:11'),
(71, 9, 'Cabai Hijau Keriting', 45000, 'http://127.0.0.1:8000/storage/uploads/5q4UTPrxQd0p63KfItEcNrPmsMu0dAVG9qeAylQQ.jpg', 'lainnya', 'kilogram', '2025-07-07 18:11:19', '2025-07-07 19:13:04'),
(72, 9, 'Cabai Merah Besar', 45000, 'http://127.0.0.1:8000/storage/uploads/0eJ98U0JPaEtzWc4ILG81KtYMFYFehvf3Lvi6KpL.jpg', 'lainnya', 'kilogram', '2025-07-07 18:11:19', '2025-07-07 18:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('e4bMJSy8wmj9MqJmzv9JyMXPPopValdN9icrTvzx', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUGxvS296aEF5YXNsSHFsdWIxYTNpNEFPZ0JXd21kYXJua3J2Vm15ViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1752205868),
('TfX9piaayROllOiWcxwFLhBCkxq6AzMcI1SzkxUS', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidVBuMUhoOER6NDlKQTJGdDlaMzA0SWJmQ3lPb2FNczMwWG9SbnpqRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1754986365),
('UOX4YJZRdQaUh5HSU0rRkhkVWXfdjUcngEyQNXm8', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSXdmMmNGQ3g2eHppRU5yNlhHUkJnZXAwUmpvc0VJOUJvcUFvMGZWYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1751946179);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `tgl_masuk` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `product_id`, `jumlah`, `tgl_masuk`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-07-03 17:00:00', '2025-07-04 00:55:19', '2025-07-04 01:56:35'),
(2, 2, 3, '2025-07-03 17:00:00', '2025-07-04 02:19:05', '2025-07-04 02:19:25'),
(3, 3, 3, '2025-07-04 17:00:00', '2025-07-04 02:20:19', '2025-07-04 02:20:19'),
(4, 4, 3, '2025-07-04 17:00:00', '2025-07-04 02:21:30', '2025-07-04 02:21:30'),
(5, 5, 1, '2025-07-04 17:00:00', '2025-07-04 02:22:31', '2025-07-04 02:22:31'),
(6, 6, 3, '2025-07-04 17:00:00', '2025-07-04 02:23:27', '2025-07-04 02:23:27'),
(7, 7, 3, '2025-07-04 17:00:00', '2025-07-04 02:24:08', '2025-07-04 02:24:08'),
(8, 8, 3, '2025-07-04 17:00:00', '2025-07-04 02:24:47', '2025-07-04 02:24:47'),
(9, 9, 3, '2025-07-04 17:00:00', '2025-07-04 02:25:31', '2025-07-04 02:25:31'),
(10, 10, 3, '2025-07-04 17:00:00', '2025-07-04 02:26:18', '2025-07-04 02:26:18'),
(11, 11, 2, '2025-07-04 17:00:00', '2025-07-04 02:26:55', '2025-07-04 02:26:55'),
(12, 12, 3, '2025-07-04 17:00:00', '2025-07-04 02:27:42', '2025-07-04 02:27:42'),
(13, 13, 2, '2025-07-04 17:00:00', '2025-07-04 02:28:16', '2025-07-04 02:28:16'),
(14, 14, 3, '2025-07-04 17:00:00', '2025-07-04 02:28:57', '2025-07-04 02:28:57'),
(15, 15, 3, '2025-07-03 17:00:00', '2025-07-04 04:38:55', '2025-07-04 04:39:17'),
(16, 16, 3, '2025-07-03 17:00:00', '2025-07-04 04:40:02', '2025-07-04 04:40:16'),
(17, 17, 3, '2025-07-04 17:00:00', '2025-07-04 04:41:02', '2025-07-04 04:41:02'),
(18, 18, 2, '2025-07-04 17:00:00', '2025-07-04 04:41:37', '2025-07-04 04:41:37'),
(19, 19, 2, '2025-07-04 17:00:00', '2025-07-04 04:42:08', '2025-07-04 04:42:08'),
(20, 20, 2, '2025-07-04 17:00:00', '2025-07-04 04:42:52', '2025-07-04 04:42:52'),
(21, 21, 2, '2025-07-04 17:00:00', '2025-07-04 04:43:42', '2025-07-04 04:43:42'),
(22, 22, 2, '2025-07-04 17:00:00', '2025-07-04 04:44:28', '2025-07-04 04:44:28'),
(23, 23, 2, '2025-07-04 17:00:00', '2025-07-04 04:45:15', '2025-07-04 04:45:15'),
(24, 24, 2, '2025-07-04 17:00:00', '2025-07-04 04:45:57', '2025-07-04 04:45:57'),
(25, 25, 2, '2025-07-04 17:00:00', '2025-07-04 04:46:35', '2025-07-04 04:46:35'),
(26, 26, 1, '2025-07-04 17:00:00', '2025-07-04 04:47:12', '2025-07-04 04:47:12'),
(27, 27, 2, '2025-07-04 17:00:00', '2025-07-04 04:47:58', '2025-07-04 04:47:58'),
(28, 28, 2, '2025-07-04 17:00:00', '2025-07-04 19:02:55', '2025-07-04 19:03:49'),
(29, 29, 2, '2025-07-04 17:00:00', '2025-07-04 19:07:31', '2025-07-04 19:16:19'),
(30, 30, 2, '2025-07-04 17:00:00', '2025-07-04 19:23:25', '2025-07-04 19:33:28'),
(31, 31, 2, '2025-07-05 17:00:00', '2025-07-04 19:43:43', '2025-07-04 19:43:43'),
(32, 32, 3, '2025-07-05 17:00:00', '2025-07-04 19:44:33', '2025-07-04 19:44:33'),
(33, 33, 2, '2025-07-05 17:00:00', '2025-07-04 19:45:17', '2025-07-04 19:45:17'),
(34, 34, 3, '2025-07-05 17:00:00', '2025-07-04 19:48:31', '2025-07-04 19:48:31'),
(35, 35, 2, '2025-07-05 17:00:00', '2025-07-04 19:49:53', '2025-07-04 19:49:53'),
(36, 36, 2, '2025-07-05 17:00:00', '2025-07-04 19:51:42', '2025-07-04 19:51:42'),
(37, 37, 2, '2025-07-05 17:00:00', '2025-07-04 19:52:20', '2025-07-04 19:52:20'),
(38, 38, 1, '2025-07-06 17:00:00', '2025-07-04 19:53:34', '2025-07-04 19:53:34'),
(39, 39, 1, '2025-07-05 17:00:00', '2025-07-04 19:54:09', '2025-07-04 19:54:09'),
(40, 40, 1, '2025-07-05 17:00:00', '2025-07-04 19:54:44', '2025-07-04 19:54:44'),
(41, 41, 2, '2025-07-04 17:00:00', '2025-07-05 04:09:36', '2025-07-05 04:11:36'),
(42, 42, 2, '2025-07-04 17:00:00', '2025-07-05 04:09:36', '2025-07-05 04:11:53'),
(43, 43, 2, '2025-07-04 17:00:00', '2025-07-05 04:09:36', '2025-07-05 04:10:48'),
(44, 44, 2, '2025-07-04 17:00:00', '2025-07-05 04:09:36', '2025-07-05 04:10:35'),
(45, 45, 2, '2025-07-04 17:00:00', '2025-07-05 04:09:36', '2025-07-05 04:10:00'),
(46, 46, 2, '2025-07-04 17:00:00', '2025-07-05 04:09:36', '2025-07-05 04:11:04'),
(47, 47, 1, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:27:23'),
(48, 48, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:27:40'),
(49, 49, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:27:59'),
(50, 50, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:28:16'),
(51, 51, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:26:29'),
(52, 52, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:26:04'),
(53, 53, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:27:02'),
(54, 54, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:25:44'),
(55, 55, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:24:46'),
(56, 56, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:24:29'),
(57, 57, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:23:39'),
(58, 58, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:23:17'),
(59, 59, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:22:07'),
(60, 60, 2, '2025-07-04 17:00:00', '2025-07-05 04:21:00', '2025-07-05 04:25:21'),
(61, 61, 3, '2025-07-07 17:00:00', '2025-07-07 17:56:46', '2025-07-07 17:59:50'),
(62, 62, 15, '2025-07-07 17:00:00', '2025-07-07 17:56:46', '2025-07-07 18:00:16'),
(63, 63, 3, '2025-07-07 17:00:00', '2025-07-07 17:59:23', '2025-07-07 18:02:17'),
(64, 64, 3, '2025-07-07 17:00:00', '2025-07-07 17:59:23', '2025-07-07 18:02:00'),
(65, 65, 15, '2025-07-07 17:00:00', '2025-07-07 17:59:23', '2025-07-07 18:02:33'),
(66, 66, 15, '2025-07-07 17:00:00', '2025-07-07 17:59:23', '2025-07-07 18:03:19'),
(67, 67, 1, '2025-07-07 17:00:00', '2025-07-07 18:11:19', '2025-07-07 19:12:47'),
(68, 68, 1, '2025-07-07 17:00:00', '2025-07-07 18:11:19', '2025-07-07 18:11:49'),
(69, 69, 1, '2025-07-07 17:00:00', '2025-07-07 18:11:19', '2025-07-07 18:12:40'),
(70, 70, 1, '2025-07-07 17:00:00', '2025-07-07 18:11:19', '2025-07-07 18:12:11'),
(71, 71, 1, '2025-07-07 17:00:00', '2025-07-07 18:11:19', '2025-07-07 19:13:04'),
(72, 72, 1, '2025-07-07 17:00:00', '2025-07-07 18:11:19', '2025-07-07 18:13:02');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `no_wa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `no_wa`, `created_at`, `updated_at`) VALUES
(1, 'Toni Daging', '081310332188', '2025-07-04 00:55:19', '2025-07-04 00:55:19'),
(2, 'Ahmad Sayur', '085723481723', '2025-07-04 02:19:05', '2025-07-04 02:19:05'),
(3, 'Andri Buah', '089671423526', '2025-07-04 04:38:55', '2025-07-04 04:38:55'),
(4, 'Bagus Bumbu Dapur', '089608511434', '2025-07-04 19:07:31', '2025-07-04 19:07:31'),
(5, 'Udin Ayam', '081380595504', '2025-07-05 04:09:36', '2025-07-05 04:09:36'),
(6, 'H. Agus Doang', '085711733320', '2025-07-05 04:21:00', '2025-07-05 04:21:00'),
(7, 'May Tempe', '081511334454', '2025-07-07 17:56:46', '2025-07-07 17:56:46'),
(8, 'Tahu Sutra', '081213092115', '2025-07-07 17:59:23', '2025-07-07 17:59:23'),
(9, 'Asep Bintang', '089338149050', '2025-07-07 18:11:19', '2025-07-07 18:11:19');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `status` enum('paid','unpaid','failed') NOT NULL DEFAULT 'unpaid',
  `snap_token` varchar(255) DEFAULT NULL,
  `tgl_transaksi` timestamp NULL DEFAULT NULL,
  `catatan` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `total` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `status`, `snap_token`, `tgl_transaksi`, `catatan`, `alamat`, `total`, `created_at`, `updated_at`) VALUES
(5, 8, 'paid', '146fbdbd-fd4c-4ae2-a90c-594a06d8702b', '2025-07-07 20:20:37', 'tolong diantar ya', 'gang delima rt 01 rw 02 no 55', 215000, '2025-07-07 20:20:37', '2025-07-07 20:22:12'),
(6, 8, 'paid', '513e08f3-2a3f-4463-9ce7-0cd560797c62', '2025-07-07 20:27:17', 'antar yaa', 'rawalumbu', 155000, '2025-07-07 20:27:17', '2025-07-07 20:33:16'),
(7, 8, 'paid', '786ef8ea-814b-4d7c-8ed0-94009998a8db', '2025-07-07 20:41:55', 'tolong diantar ya', 'srsuai alamat', 155000, '2025-07-07 20:41:55', '2025-07-07 20:42:34'),
(8, 8, 'paid', '78a411e7-58fd-465a-8ac2-542a3cf7b573', '2025-07-10 20:26:46', 'tolong diantar ya pak..', 'jl. gugus depan 1 no. 80, rawalumbu', 55000, '2025-07-10 20:26:46', '2025-07-10 20:28:02'),
(9, 8, 'failed', 'Error: Midtrans API is returning API error. HTTP status code: 400 API response: {\"error_messages\":[\"transaction_details.order_id has already been taken\"]}', '2025-07-10 20:29:22', 'tolong diantar ya', 'jln gugus depan 1 no 80 rawa lumbu', 125000, '2025-07-10 20:29:22', '2025-07-10 20:29:46');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_items`
--

CREATE TABLE `transaction_items` (
  `id` bigint UNSIGNED NOT NULL,
  `transaction_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `jumlah` int NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `transaction_items`
--

INSERT INTO `transaction_items` (`id`, `transaction_id`, `product_id`, `jumlah`, `harga`, `created_at`, `updated_at`) VALUES
(18, 5, 71, 1, 1, '2025-07-07 20:20:37', '2025-07-07 20:20:37'),
(19, 5, 70, 1, 1, '2025-07-07 20:20:37', '2025-07-07 20:20:37'),
(20, 5, 68, 1, 1, '2025-07-07 20:20:37', '2025-07-07 20:20:37'),
(21, 5, 67, 1, 1, '2025-07-07 20:20:37', '2025-07-07 20:20:37'),
(22, 5, 64, 1, 1, '2025-07-07 20:20:37', '2025-07-07 20:20:37'),
(23, 6, 71, 1, 1, '2025-07-07 20:27:17', '2025-07-07 20:27:17'),
(24, 6, 70, 1, 1, '2025-07-07 20:27:17', '2025-07-07 20:27:17'),
(25, 6, 68, 1, 1, '2025-07-07 20:27:17', '2025-07-07 20:27:17'),
(26, 7, 71, 1, 1, '2025-07-07 20:41:55', '2025-07-07 20:41:55'),
(27, 7, 70, 1, 1, '2025-07-07 20:41:55', '2025-07-07 20:41:55'),
(28, 7, 68, 1, 1, '2025-07-07 20:41:55', '2025-07-07 20:41:55'),
(29, 8, 71, 1, 1, '2025-07-10 20:26:46', '2025-07-10 20:26:46'),
(30, 8, 65, 1, 1, '2025-07-10 20:26:46', '2025-07-10 20:26:46'),
(31, 8, 64, 1, 1, '2025-07-10 20:26:46', '2025-07-10 20:26:46'),
(32, 9, 68, 1, 1, '2025-07-10 20:29:22', '2025-07-10 20:29:22'),
(33, 9, 67, 1, 1, '2025-07-10 20:29:22', '2025-07-10 20:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'admin',
  `no_wa` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `role`, `no_wa`, `created_at`, `updated_at`) VALUES
(3, 'kbartoletti', 'Test User', 'test@example.com', '$2y$12$W6.4g4EJ8Dg6RlBu/ROir.Fyk7Zt8oD5VXjmKe40S7D6BhLe97/Ju', 'user', '(386) 264-9288', '2025-07-04 00:00:48', '2025-07-04 00:00:48'),
(4, 'admin', 'Admin', 'admin@gmail.com', '$2y$12$DKPPmU/rH7AJ/5Av5yT7c./WL5FKRuYz8W/vm4GwTx6bQoHiOoBBK', 'admin', '085899665164', '2025-07-04 00:27:35', '2025-07-04 00:27:35'),
(7, 'Miftahudin', 'Miftah', 'mu269000@gmail.com', '$2y$12$M/Kw3d5iRg/STQP9HiwxHuA6DnIEfHYrNZFoGfGqhxHaJtYgJth7C', 'user', '085899665164', '2025-07-07 20:11:38', '2025-07-07 20:11:38'),
(8, 'alvian maulana', 'alvian', 'mu633439@gmail.com', '$2y$12$toWwtttIuIidzj1STHjXt.j04fXLt/bd62IIury66YFGmY9SST/w6', 'user', '085899665164', '2025-07-07 20:18:21', '2025-07-10 19:17:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_product_id_foreign` (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`);

--
-- Indexes for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_items_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction_items`
--
ALTER TABLE `transaction_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_items`
--
ALTER TABLE `transaction_items`
  ADD CONSTRAINT `transaction_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_items_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
