-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 04:50 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kapenista_shop_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_10_102932_create_password_resets_table', 1),
(6, '2024_08_14_082721_create_admins_table', 1),
(7, '2024_08_15_083854_create_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` longtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `img`, `name`, `price`, `description`, `category`, `created_at`, `updated_at`) VALUES
(1, 'https://via.placeholder.com/640x480.png/0055aa?text=nihil', 'sed', 992.54, 'Voluptatem qui distinctio eos et nemo. Voluptatem et quibusdam enim quisquam consequatur quasi dolor explicabo. Quaerat molestias rerum impedit quia sunt vel odio. Doloremque minus qui quisquam. Dolorum sint nihil dolorem odit consectetur et. Sapiente velit sed quos dignissimos id fugit officia.', 'aut', '2024-08-15 19:40:37', '2024-08-15 19:40:37'),
(2, 'https://via.placeholder.com/640x480.png/0022aa?text=a', 'pariatur', 159.85, 'Recusandae quo voluptatem adipisci eaque error consequatur ipsum quo. Porro molestias quis distinctio et ducimus quasi. Alias ut quibusdam nemo voluptas animi. Ratione rerum sint consectetur placeat sit maiores. Sed laborum aut possimus mollitia alias qui ut debitis. Magni molestiae dolore impedit velit inventore eum.', 'accusamus', '2024-08-15 19:40:37', '2024-08-15 19:40:37'),
(3, 'https://via.placeholder.com/640x480.png/00aa44?text=consequuntur', 'quo', 449.63, 'Temporibus velit doloribus quasi laborum. Aut sed dicta quod unde voluptas delectus sapiente. Dolores sed quis mollitia. Suscipit odit nulla quia nihil et minus.', 'rerum', '2024-08-15 19:40:37', '2024-08-15 19:40:37'),
(4, 'https://via.placeholder.com/640x480.png/0055ee?text=hic', 'nobis', 724.96, 'Totam quas nobis ut aut dolorem quis alias aut. Quis laborum dolores necessitatibus eligendi sunt qui provident id. Cum sed ducimus consequatur cupiditate. Eos et sed fuga sed. Quo laboriosam molestias non ut cupiditate quas reprehenderit ducimus. Qui quo a maxime eos voluptatem molestiae.', 'deserunt', '2024-08-15 19:40:37', '2024-08-15 19:40:37'),
(5, 'https://via.placeholder.com/640x480.png/001144?text=aut', 'qui', 353.89, 'Assumenda ut mollitia nisi. Impedit asperiores non totam. Architecto ullam sunt esse atque eveniet neque qui voluptas. Labore eum doloremque deleniti molestiae et quaerat veniam praesentium.', 'voluptatibus', '2024-08-15 19:40:37', '2024-08-15 19:40:37'),
(6, 'https://via.placeholder.com/640x480.png/00aa33?text=voluptatem', 'quos', 387.96, 'Ut ut quis est ut. Et cum perspiciatis adipisci vitae praesentium voluptas ullam. Nesciunt qui doloremque sit expedita quia illum. Non sunt ut vel fuga voluptates dolores. Ratione libero earum accusantium quam soluta beatae. Suscipit eos quis quod eum asperiores.', 'quos', '2024-08-15 19:40:37', '2024-08-15 19:40:37'),
(7, 'https://via.placeholder.com/640x480.png/00ddcc?text=iure', 'praesentium', 284.71, 'Ipsam sit quas ea perspiciatis quibusdam. Nobis expedita necessitatibus rerum ullam sint deleniti. Qui dolorum consectetur et delectus. Minima est accusantium at aut sunt. Qui nulla suscipit omnis praesentium porro. Sint et officiis earum ad aut iure. Laborum temporibus id odit vitae quaerat in maxime dolores.', 'voluptas', '2024-08-15 19:40:37', '2024-08-15 19:40:37'),
(8, 'https://via.placeholder.com/640x480.png/00ff22?text=laborum', 'quos', 717.87, 'Quia ut corrupti excepturi ullam aut occaecati. Reiciendis odit quia autem aspernatur. Voluptates nesciunt aspernatur est aut aliquam quis. Laborum neque fuga molestiae molestiae nesciunt eum. Hic quos debitis consequuntur aut totam. Dolorem velit eos nisi odit ducimus. Nostrum voluptas est sed voluptatem.', 'reiciendis', '2024-08-15 19:40:37', '2024-08-15 19:40:37'),
(9, 'https://via.placeholder.com/640x480.png/0044ff?text=ab', 'non', 209.77, 'Quo ullam nihil distinctio. Ea voluptate exercitationem est iusto atque sapiente aut. Unde doloribus alias id. Eaque cum provident amet.', 'nam', '2024-08-15 19:40:37', '2024-08-15 19:40:37'),
(10, 'https://via.placeholder.com/640x480.png/0033ee?text=ut', 'ea', 82.57, 'Dolore ex ullam quo voluptas. In maxime ut ut qui. Neque laboriosam debitis reiciendis natus ad. Deleniti asperiores omnis eos facilis qui cum quasi ipsum. Ducimus est iure nihil aperiam nulla aut.', 'quia', '2024-08-15 19:40:37', '2024-08-15 19:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `google_id` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `email_verified_at`, `password`, `phone_number`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Francine Marinelle Reyes', 'frxengmarinelle@gmail.com', '102342927383261638110', NULL, 'eyJpdiI6ImJPc0d1NEIwbnN3dVJ1TWh6SXd4Wnc9PSIsInZhbHVlIjoiTVc5K3pMTDZMMUIrWmJBZFhtU25GN0JLQVJxNEdiSXN3QkdSY2oyVzQ5az0iLCJtYWMiOiIyNjQ2Mzc4YTc1N2E1OGM4MzYxN2Y1YTBiZGU3MzdhODM3MTEzN2JiODcxNjQwNGI1YTQ2NTAzMjUwYTEzOTQ4IiwidGFnIjoiIn0=', NULL, NULL, NULL, '2024-08-15 19:41:07', '2024-08-15 19:41:07'),
(2, 'Jossel Rempis', 'josselrempis02@gmail.com', '113389686093828943842', NULL, 'eyJpdiI6IlJpUFNnQ0xHQmxkOWdORUY4RGVDNXc9PSIsInZhbHVlIjoiRG9NRlBOYnQzbXdpLzFuWVJHOWhvU0lRZFlLL2xtWWRsODRmZ3d1ZHl2az0iLCJtYWMiOiI0YmQ5MzAzYzA3ZmUxMzlhZGZiYzlmMjM5OTdiZDNkYTE2NzkxZGUxNTcxMTRkNDU4YzQwZTZiM2QxYTZlOWRhIiwidGFnIjoiIn0=', NULL, NULL, NULL, '2024-08-15 21:56:42', '2024-08-15 21:56:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
