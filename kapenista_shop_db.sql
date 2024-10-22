-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2024 at 03:19 AM
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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'admin@example.com', NULL, '$2y$10$vjmZYpSTGZgeRuz1bxkAV.SzCLNYJJjyAzOuXdtbdmUNeT/k8u2li', NULL, '2024-08-29 22:06:58', '2024-08-29 22:06:58');

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
(15, '2014_10_12_000000_create_users_table', 1),
(16, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(17, '2019_08_19_000000_create_failed_jobs_table', 1),
(18, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(19, '2024_08_10_102932_create_password_resets_table', 1),
(20, '2024_08_14_082721_create_admins_table', 1),
(21, '2024_08_15_083854_create_products_table', 1),
(22, '2024_08_29_072015_create_orders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `orderDate` datetime NOT NULL,
  `TotalAmount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `description` longtext NOT NULL,
  `category` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `img`, `name`, `price`, `description`, `category`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'https://via.placeholder.com/640x480.png/00bb00?text=illo', 'culpa', 112.64, 'Voluptate debitis qui unde. Ut quas distinctio debitis sed. In laborum inventore quidem facere excepturi sint. Odit harum eum ducimus tempore. Libero perferendis aut voluptas laboriosam.', 'velit', 52, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(2, 'https://via.placeholder.com/640x480.png/0066aa?text=dolorum', 'recusandae', 726.47, 'Commodi enim dolore quibusdam at. Reiciendis iusto placeat consequatur possimus error. Consequatur et error alias dolores earum tempora quia. In quis iusto et sint consectetur. Id corporis nobis fugiat voluptatem eos. Deleniti magnam itaque vitae blanditiis et. Autem rerum et temporibus consequatur iste magnam maxime omnis.', 'quia', 92, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(3, 'https://via.placeholder.com/640x480.png/006644?text=assumenda', 'non', 619.85, 'Ut eum eum ullam voluptatem. Possimus ut voluptas voluptatem dignissimos quia aut. Sit commodi in quia ipsum omnis. Explicabo voluptatem eveniet quibusdam id repudiandae impedit excepturi deleniti. Voluptas omnis quas quia est molestiae.', 'commodi', 32, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(4, 'https://via.placeholder.com/640x480.png/0011aa?text=cupiditate', 'consequatur', 395.65, 'Et molestiae molestias voluptatem animi placeat. Animi ratione mollitia vel eveniet eveniet beatae soluta. Labore et eius ut eos aperiam cum. Unde totam sit maxime tempora. Ea facere maiores consectetur a iusto et.', 'dolorem', 33, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(5, 'https://via.placeholder.com/640x480.png/006688?text=aliquid', 'qui', 622.49, 'Sed nulla amet et. Odio reiciendis eveniet similique molestias nemo omnis voluptas. Omnis ea aut quasi. Corrupti corrupti laudantium debitis praesentium. Autem nisi ex placeat ut. Consequuntur molestiae voluptates est voluptatibus expedita. Dolores impedit id sunt magnam non dolores.', 'a', 100, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(6, 'https://via.placeholder.com/640x480.png/005544?text=minima', 'et', 174.20, 'Numquam id voluptatem molestiae ea esse. Dolore distinctio doloribus quaerat unde quo perspiciatis. Placeat ea omnis amet rerum nisi. Id fugiat iste aut quis nihil saepe.', 'quaerat', 99, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(7, 'https://via.placeholder.com/640x480.png/008855?text=laudantium', 'aperiam', 806.61, 'Velit et quas non est. Voluptate quidem aut sapiente qui harum ipsa aliquid. Et doloremque hic delectus maxime autem quisquam. Qui corrupti voluptas necessitatibus. Laudantium autem et inventore veritatis asperiores ut mollitia. Voluptatem eum nihil dignissimos. Est autem sequi impedit quas iure consequatur ullam.', 'iure', 41, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(8, 'https://via.placeholder.com/640x480.png/009911?text=quia', 'illum', 565.49, 'Repellendus quia accusamus necessitatibus autem animi. Inventore delectus vero dolor aliquam eligendi. Beatae excepturi quia voluptatibus ut labore inventore aut. Vel incidunt qui doloremque aut. Dicta vel libero at.', 'cumque', 48, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(9, 'https://via.placeholder.com/640x480.png/000000?text=qui', 'harum', 446.48, 'Tenetur dolore voluptas at velit magnam aspernatur nulla. Suscipit repellendus voluptas architecto illum. Consequatur nulla tempora itaque reprehenderit vero adipisci quia. Sed quasi veritatis accusantium accusamus provident occaecati cumque. Eaque aperiam est doloremque modi.', 'dolor', 32, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(10, 'https://via.placeholder.com/640x480.png/009999?text=at', 'ratione', 162.29, 'Magni aut eum mollitia debitis. Animi mollitia esse nesciunt debitis. Esse earum voluptates odit magnam praesentium. Velit repellat distinctio iusto. Atque et et reprehenderit ab magnam. Ad excepturi soluta odit quaerat. Consequatur culpa qui ut doloremque quibusdam.', 'ea', 78, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(11, 'https://via.placeholder.com/640x480.png/00bbdd?text=voluptas', 'aut', 2.04, 'Eum dolores officiis enim sed et sit. Modi quas ut quibusdam consequatur doloribus pariatur. Sint porro debitis necessitatibus nemo omnis ipsum. Sit quidem ad rerum qui. Et fuga assumenda consequatur molestiae. Reprehenderit nesciunt eaque optio aperiam molestiae. Neque sed doloribus dolor quaerat delectus autem accusantium nihil.', 'est', 44, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(12, 'https://via.placeholder.com/640x480.png/003300?text=sed', 'voluptatem', 14.50, 'Atque aut illum esse neque. Ea atque dolorem quam deserunt ad vero. Eos ullam atque omnis et sint dolore qui fugiat. Quo quibusdam ut perspiciatis dolorum tenetur quasi. Blanditiis aut id error explicabo deserunt magnam numquam.', 'eligendi', 44, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(13, 'https://via.placeholder.com/640x480.png/000088?text=ad', 'rerum', 701.50, 'Molestias cupiditate repudiandae sit pariatur blanditiis. Accusantium ut voluptatem quasi ullam quia explicabo recusandae. Velit voluptatibus illo consequatur voluptatum reiciendis nobis et. Error laboriosam commodi dolores voluptas enim ipsam. Nulla itaque assumenda delectus aliquam minima quae. Aliquam deleniti expedita ad fugit voluptatem quia occaecati tenetur.', 'repellat', 38, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(14, 'https://via.placeholder.com/640x480.png/005577?text=est', 'modi', 441.05, 'Ipsam non non aut omnis sequi. Qui quibusdam perspiciatis quo occaecati ut quos tempora vero. Non cum omnis eveniet non commodi nesciunt. Unde soluta sed omnis explicabo. Maiores error et nihil alias. Et officia et modi repellat libero earum voluptatem. Aliquam aut voluptatem aut.', 'perferendis', 87, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(15, 'https://via.placeholder.com/640x480.png/0033ff?text=molestias', 'rerum', 452.46, 'Cumque id et fugit vitae reiciendis. Cum quo iure quia dolor. Nam magni est ipsam praesentium quia. Quibusdam perspiciatis voluptas facere dolores deleniti ut in vel. Enim suscipit architecto non voluptatem minima exercitationem quod. Sit ipsum ipsam sint sunt expedita corrupti nostrum aliquid. Laboriosam magnam debitis eos provident.', 'optio', 31, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(16, 'https://via.placeholder.com/640x480.png/00bb33?text=laborum', 'aliquid', 911.76, 'Rerum molestias delectus consequuntur nesciunt ipsam sed. Rerum consequatur voluptate eos maxime et iusto tempora. Eum ad aperiam facere pariatur laudantium vel. Possimus debitis ratione quas totam quas odio delectus. Dignissimos doloremque et placeat necessitatibus laborum sunt eum et. Et porro earum cum consectetur nesciunt. Consequatur nam reiciendis omnis non optio qui maxime voluptates.', 'voluptatem', 4, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(17, 'https://via.placeholder.com/640x480.png/00dd77?text=error', 'voluptas', 733.94, 'Accusamus commodi laborum quia qui aut. Ut rerum inventore sit unde. Soluta praesentium quo rerum perferendis. Explicabo quaerat natus odit. Omnis cupiditate veniam exercitationem vel.', 'modi', 42, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(18, 'https://via.placeholder.com/640x480.png/0033dd?text=nemo', 'qui', 719.27, 'Voluptas quaerat in voluptates quibusdam voluptas eum voluptates. Est voluptates rerum incidunt et. Odit est minima sapiente dolores mollitia. Quis eveniet dolor dolorem. Iusto provident minima hic et. Dolor libero odio enim repudiandae possimus maiores voluptatem. Velit quis sit et et.', 'dolorem', 66, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(19, 'https://via.placeholder.com/640x480.png/003366?text=voluptates', 'aliquid', 9.60, 'Quas commodi aliquid recusandae tenetur et. Ipsa voluptas et reiciendis provident architecto molestiae ea. Nesciunt fugiat voluptatibus eos id error ea dicta. Dolor qui tempora autem omnis reiciendis labore. Velit et officiis esse similique natus aut.', 'aut', 52, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(20, 'https://via.placeholder.com/640x480.png/0088aa?text=deserunt', 'quia', 638.17, 'Eum maiores tempora harum consequatur odit. Dolores laudantium similique culpa. Dolores sint sint nulla. Magni possimus laborum similique. Aut sequi quis sit animi dolore tempore iste est. Voluptatum nulla quaerat ut quis ducimus ut.', 'reprehenderit', 38, '2024-08-26 17:39:18', '2024-08-26 17:39:18'),
(21, NULL, 'Jossel Alfred Rempillo Rempis', 111.00, 'asdsadada', '1', 11, '2024-08-26 17:40:28', '2024-08-26 17:40:28'),
(22, NULL, 'aj', 1000.00, 'asdasdasd', '2', 99, '2024-08-26 17:45:22', '2024-08-26 17:45:22'),
(23, 'img/yuE6LPeka9Ny9ibJcJugseMBec97wC805FTkuB53.png', 'admin', 23.00, 'asdasdsadsa', '1', 2, '2024-08-26 18:02:23', '2024-08-26 18:02:23'),
(24, 'img/Ay84L4zc7Xt3ApDYPzmwVb2LQ5kO0Ab4EPwfkCmH.png', 'asdasdsa', 232.00, 'adasda', '1', 100, '2024-08-26 18:07:01', '2024-08-26 18:07:01'),
(25, 'img/JCQFmWZw4GcL7MXEHqqTLkTQsY1OvxedFwgCSxqs.png', 'asdasdsa', 232.00, 'adasda', '1', 100, '2024-08-26 18:07:05', '2024-08-26 18:07:05'),
(26, 'img/WAVTCXOCNe7CiC1sKpDmH18skd9GRk2RROdEaGfN.png', 'aj', 100.00, 'asdasdasd', 'Bottle Beverages', 11, '2024-08-26 18:10:10', '2024-08-26 18:10:10'),
(27, 'img/OaYPIvzz62rhidQsNVBRAlmAzT71sWdUyTIKwLzG.png', 'admin', 233.00, 'asdsadsadsa', 'Bottle Beverages', 23, '2024-08-26 18:13:54', '2024-08-26 18:13:54'),
(28, 'img/ue4HclLaSsYWhmVELznppcJ20NUyPXukoyEAwT3J.png', 'Spanish Latte', 1500.00, 'masarap', 'Cold Coffee', 99, '2024-08-27 17:31:11', '2024-08-27 17:31:11');

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
(1, 'Jossel Rempis', 'josselrempis02@gmail.com', '113389686093828943842', NULL, 'eyJpdiI6ImQ0cVJGdkR5clFtbVlUUVIyams2K2c9PSIsInZhbHVlIjoid3NtMVdQcThWaHlaMTNURVVyQjdZalVNRDFHTlAvOW1ORU03R1RGTm5CVT0iLCJtYWMiOiI2ZGIxY2I4MTI4ZjE5YTgwNWEwMDA5ZTk5NTI1NWI3ZGM0OWY2MmQ3ZTlmNzI0ZjBiNjFlMThmNGJjNGYxMGVlIiwidGFnIjoiIn0=', NULL, NULL, NULL, '2024-08-27 17:31:51', '2024-08-27 17:31:51'),
(2, 'Admin User', 'admin@example.com', NULL, NULL, '$2y$10$sXmTosMWSHvHO0evCPG2cezETfLWQzvDcoRDdGzyvVSKYrFoUqj5G', NULL, NULL, NULL, '2024-08-29 22:06:12', '2024-08-29 22:06:12');

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_admin_id_foreign` (`admin_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
