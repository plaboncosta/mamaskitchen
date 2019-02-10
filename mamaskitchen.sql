-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2019 at 08:31 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mamaskitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `about`, `image`, `created_at`, `updated_at`) VALUES
(2, 'About us', '<p>What Miller heard in those predawn moments was the sound of nearby buildings collapsing. Freeways fell, gas mains burst and neighbors screamed, as a magnitude 6.7 quake jolted millions of Southern Californians awake. &ldquo;I honestly thought we weren&rsquo;t going to make it,&rdquo; recalls Marnie Nemcoff, who lived in Reseda, the quake&rsquo;s epicenter. The shaking was less than 20 seconds. But it was enough to kill at least 57 people, injure 9,000 and cause $40 billion in damage throughout Southland communities. &ldquo;It looked and felt like Armageddon,&rdquo; Nemcoff said. Twenty-five years later, the Northridge earthquake, the last major quake to hit Southern California, continues to impact lives, pocketbooks and public policies. But how much has really changed in terms of technology and safety standards since the mystery fault revealed itself on that clear January morning? Are people more prepared? And when a large quake strikes again, will the damage be reduced? The answer, experts say, is a mixed bag.</p>', 'about-us-2019-01-14-5c3c261144a69.jpg', '2019-01-06 23:22:14', '2019-01-14 06:02:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Chicken Roast', 'chicken-roast', '2019-01-01 20:06:19', '2019-01-11 06:06:13'),
(3, 'Noddles Special', 'noddles-special', '2019-01-11 14:51:17', '2019-01-11 14:52:09'),
(4, 'Tea Special', 'tea-special', '2019-01-12 02:21:10', '2019-01-12 02:21:10');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(2, 'Plabon', 'plabon@blog.com', 'Web Application Developer', 'I want to work as a web application developer', '2019-01-13 10:14:08', '2019-01-13 10:14:08'),
(3, 'Shanto', 'shanto@gmail.com', 'Ghum', 'I love ghumani', '2019-01-13 17:14:24', '2019-01-13 17:14:24'),
(4, 'Test', 'admin@blog.com', 'Ghum', 'ghum', '2019-01-14 13:16:50', '2019-01-14 13:16:50');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `category_id`, `name`, `description`, `price`, `image`, `created_at`, `updated_at`) VALUES
(2, 3, 'soup', 'Soup is very healthy', 200, 'soup-2019-01-11-5c38ce8e2bb1e.jpg', '2019-01-11 17:12:46', '2019-01-11 17:12:46'),
(3, 1, 'Murga', 'Murga is common food for any kind of occasion', 120, 'murga-2019-01-12-5c394f592d2a9.jpg', '2019-01-12 02:22:17', '2019-01-12 02:22:17'),
(4, 4, 'Green Tea', 'Green is very very healthy', 10, 'green-tea-2019-01-12-5c394fa0812ba.jpg', '2019-01-12 02:23:28', '2019-01-12 02:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_09_103105_create_sliders_table', 2),
(4, '2019_01_11_045344_create_categories_table', 3),
(5, '2019_01_11_205948_create_items_table', 4),
(6, '2019_01_12_093550_create_reservations_table', 5),
(7, '2019_01_13_153911_create_contacts_table', 6),
(8, '2019_01_13_231635_create_socials_table', 7),
(9, '2019_01_14_100511_create_abouts_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_and_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `name`, `phone`, `email`, `date_and_time`, `message`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Plabon', '+880 1796 811679', 'plabonjoseph@gmail.com', '12 January 2019 - 05:50 pm', 'faf', 0, '2019-01-12 11:25:44', '2019-01-12 14:11:56'),
(4, '5254', '+880 1796 811679', 'plabon@gmail.com', '12 January 2019 - 05:16 pm', '5245', 0, '2019-01-12 11:30:15', '2019-01-13 15:21:35'),
(5, 'Niran Costa', '+880 1796 811679', 'nipa@gmail.com', '30 January 2019 - 10:50 am', 'gsg', 1, '2019-01-12 11:48:06', '2019-01-13 15:48:23'),
(6, 'Niran Costa', '01987675464', 'niran@gmail.com', '30 January 2019 - 10:50 am', 'I am Michale Niran. I need one', 1, '2019-01-12 14:13:38', '2019-01-13 15:49:09'),
(7, 'Saidul', '+880 1827262527', 'saidul@gmail.com', '02 January 2019 - 09:30 am', 'I am Saidul Islam Python', 0, '2019-01-13 09:32:38', '2019-01-13 11:05:15');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'first title', 'first sub title', 'first-title-2019-01-10-5c377dfe38923.jpg', '2019-01-01 19:08:08', '2019-01-10 11:16:46'),
(2, 'second title', 'Second sub title', 'second-title-2019-01-10-5c377e189d86a.jpg', '2019-01-02 19:05:02', '2019-01-10 11:17:12'),
(3, 'Third Post Title', 'Third Post Sub title', 'third-post-2019-01-10-5c377e2c256fe.jpg', '2019-01-10 08:19:10', '2019-01-11 05:08:14'),
(4, 'Fourth Post', 'Fourth Post Sub title', 'fourth-post-2019-01-10-5c3773cb71dd4.png', '2019-01-10 08:56:13', '2019-01-10 10:33:15'),
(5, 'Delicious Chicken Fry', 'Stongly healthy for conscious people', 'delicious-chicken-fry-2019-01-10-5c377e4ebe052.jpg', '2019-01-10 09:38:54', '2019-01-10 11:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_plus` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `facebook`, `twitter`, `google_plus`, `linkedin`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com', 'https://www.twitter.com', 'https://plus.google.com/discover', 'https://www.linkedin.com', NULL, '2019-01-14 04:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'plabon', 'plabon@gmail.com', NULL, '$2y$10$QNiGLajfPd0vthON4bWy7.OLC4HUNwoHMejvT./BFMxLnpW1k4oDO', 'z3LOpilZhDE6nQ3ABJVjysFsSEnS9wTv0n4rEZFTfYY4D5sCK8JlvBSstt6U', '2019-01-08 10:31:24', '2019-01-14 09:53:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_category_id_foreign` (`category_id`);

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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
