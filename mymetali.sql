-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2024 at 02:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymetali`
--

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `institute_name` varchar(255) NOT NULL,
  `degree_name` varchar(255) DEFAULT NULL,
  `passing_year` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `user_id`, `institute_name`, `degree_name`, `passing_year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'North South University', 'CSE', '2021', 1, '2024-01-12 06:28:31', '2024-01-12 06:28:31');

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
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `friend_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `short_description` text DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `privacy_type` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `is_verified` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `user_id`, `name`, `short_description`, `type`, `privacy_type`, `email`, `phone`, `address`, `website_link`, `cover_image`, `is_verified`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'WorkOut', 'Resistance training promotes muscle growth. Examples of resistance training include the use of free weights, weight machines, your own body weight or resistance bands.', 'Friends', 'Public', 'work.out@gmail.com', '01402323231', 'Dhaka Mirpur 01', 'http://127.0.0.1:8000/', '1705062640.jpg', NULL, 1, '2024-01-12 06:30:40', '2024-01-12 06:30:40');

-- --------------------------------------------------------

--
-- Table structure for table `group_posts`
--

CREATE TABLE `group_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_content` text NOT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_videos` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_posts`
--

INSERT INTO `group_posts` (`id`, `group_id`, `user_id`, `post_content`, `post_image`, `post_videos`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Start', '[\"1705062668_65a1310c1539a.jpg\"]', NULL, 1, '2024-01-12 06:31:08', '2024-01-12 06:31:08');

-- --------------------------------------------------------

--
-- Table structure for table `group_post_comments`
--

CREATE TABLE `group_post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `group_post_replies`
--

CREATE TABLE `group_post_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_post_comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `likeable_id` bigint(20) UNSIGNED NOT NULL,
  `likeable_type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `likeable_id`, `likeable_type`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'App\\Models\\Page', '2024-01-12 06:36:12', '2024-01-12 06:36:12'),
(2, 2, 1, 'App\\Models\\Group', '2024-01-12 06:36:20', '2024-01-12 06:36:20');

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
(5, '2023_12_27_020356_create_user_posts_table', 1),
(6, '2023_12_27_094216_create_designations_table', 1),
(7, '2023_12_27_094229_create_education_table', 1),
(8, '2023_12_27_094244_create_social_links_table', 1),
(9, '2023_12_27_152017_create_friends_table', 1),
(10, '2023_12_27_152039_create_friend_requests_table', 1),
(11, '2023_12_28_051011_create_groups_table', 1),
(12, '2023_12_28_051056_create_group_posts_table', 1),
(13, '2023_12_28_051124_create_pages_table', 1),
(14, '2023_12_28_051145_create_page_posts_table', 1),
(15, '2023_12_28_192856_create_user_post_comments_table', 1),
(16, '2023_12_28_192920_create_user_post_replies_table', 1),
(17, '2023_12_29_070037_create_timeline_post_likes_table', 1),
(18, '2023_12_29_120146_create_group_post_comments_table', 1),
(19, '2023_12_29_120204_create_group_post_replies_table', 1),
(20, '2023_12_29_120406_create_page_post_comments_table', 1),
(21, '2023_12_29_120450_create_page_post_replies_table', 1),
(22, '2023_12_29_160149_create_likes_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `website_link` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `is_verified` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `name`, `category_id`, `short_description`, `email`, `phone`, `address`, `city`, `website_link`, `profile_image`, `cover_image`, `is_verified`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ecommerce', NULL, 'E-commerce, or electronic commerce, is the buying and selling of goods and services over the internet. It\'s a transaction between two parties, usually a business and a consumer, where payment and delivery of products or', 'ecom@gmail.com', '01203252546', 'Dhaka Mirpur 01', 'Mirpur', 'http://127.0.0.1:8000/', '1705062967.png', '1705062967.png', NULL, 1, '2024-01-12 06:36:07', '2024-01-12 06:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `page_posts`
--

CREATE TABLE `page_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_content` text NOT NULL,
  `post_image` varchar(255) DEFAULT NULL,
  `post_videos` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_post_comments`
--

CREATE TABLE `page_post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `page_post_replies`
--

CREATE TABLE `page_post_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_post_comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeline_post_likes`
--

CREATE TABLE `timeline_post_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `relation_status` varchar(255) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `short_bio` text DEFAULT NULL,
  `political_status` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '1',
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT '2',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `gender`, `phone`, `birthday`, `address`, `relation_status`, `cover_photo`, `profile_photo`, `short_bio`, `political_status`, `religion`, `status`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Anikul', 'Islam', 'Male', '01905256528', NULL, 'Dhaka 1212,Merul Badda Dit Project', 'Married', '3cICgBv15izNBasEGpYhVHGW8MSldfQkXHtcMaCz.jpg', 'hXiAqEy9nP5JtFOFlG7B5UCwBr2ixfhsIAy27nY4.jpg', 'Good Boy', NULL, NULL, '1', 'anik@gmail.com', '2', NULL, '$2y$12$TlNOVuSRJLpOtmkjKl28VujSSBVEkuZaChiBRjGuz.qLEjXtEuFpO', NULL, '2024-01-12 06:26:45', '2024-01-12 06:27:48'),
(2, 'Masuka Nasrin', 'Pinki', 'Female', '01705622225', NULL, 'Dhak', 'Married', 'oN4F3jiEnQckGNLZevyHHrnPq7b8P90WlUFUAaxY.png', 'b8ilhiDT48IbF0IS148vLjsEzEDJCyDVFmFk92lW.jpg', 'I am Simple Girl', NULL, NULL, '1', 'pinki@gmail.com', '2', NULL, '$2y$12$4TxcwppZh4yD1WQe6T3xweKwJNZ2BN6ASylZqhskCYrGlzdiHI0Te', NULL, '2024-01-12 06:31:32', '2024-01-12 06:32:18'),
(3, 'Admin', 'Dashboard', NULL, '01900000000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'admin@gmail.com', '1', NULL, '$2y$12$V4.qXIxiBxV.ZqBXgKr88eQET9aTdBiURxqIMc2qXowz7SFd2Z/hS', NULL, NULL, NULL),
(4, 'Manna', 'Islam', 'Male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 'manna@gmail.com', '2', NULL, '$2y$12$/EQGVZr5mAVaJj5.JRAfresZNN3gOmJvygLxu5ddx3oSqJNO3Lyti', NULL, '2024-01-13 00:47:46', '2024-01-13 00:47:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_posts`
--

CREATE TABLE `user_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_details` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `videos` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_posts`
--

INSERT INTO `user_posts` (`id`, `user_id`, `post_details`, `image`, `videos`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'wow its great picture', '[\"1705062548_65a13094e9e12.jpg\",\"1705062548_65a13094eaf01.jpg\"]', NULL, 1, '2024-01-12 06:29:08', '2024-01-12 06:29:08'),
(2, 1, 'Wow', '[\"1705062564_65a130a469bdb.jpg\"]', NULL, 1, '2024-01-12 06:29:24', '2024-01-12 06:29:24'),
(3, 2, 'Wow', '[\"1705062753_65a13161e1f48.png\"]', NULL, 1, '2024-01-12 06:32:33', '2024-01-12 06:32:33'),
(4, 2, 'Went to be', '[\"1705062779_65a1317b8e543.png\"]', NULL, 1, '2024-01-12 06:32:59', '2024-01-12 06:32:59'),
(5, 2, 'Just Photogrfic', '[\"1705062814_65a1319ef2e33.png\"]', NULL, 1, '2024-01-12 06:33:34', '2024-01-12 06:33:34'),
(6, 2, 'Agin Post', '[\"1705062889_65a131e943512.png\",\"1705062889_65a131e943d93.png\"]', NULL, 1, '2024-01-12 06:34:49', '2024-01-12 06:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_post_comments`
--

CREATE TABLE `user_post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_post_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_post_replies`
--

CREATE TABLE `user_post_replies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_post_comment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reply` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_posts`
--
ALTER TABLE `group_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_post_comments`
--
ALTER TABLE `group_post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_post_comments_group_post_id_foreign` (`group_post_id`),
  ADD KEY `group_post_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `group_post_replies`
--
ALTER TABLE `group_post_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_post_replies_group_post_comment_id_foreign` (`group_post_comment_id`),
  ADD KEY `group_post_replies_user_id_foreign` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `likes_user_id_likeable_id_likeable_type_unique` (`user_id`,`likeable_id`,`likeable_type`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_posts`
--
ALTER TABLE `page_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_post_comments`
--
ALTER TABLE `page_post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_post_comments_page_post_id_foreign` (`page_post_id`),
  ADD KEY `page_post_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `page_post_replies`
--
ALTER TABLE `page_post_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `page_post_replies_page_post_comment_id_foreign` (`page_post_comment_id`),
  ADD KEY `page_post_replies_user_id_foreign` (`user_id`);

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
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline_post_likes`
--
ALTER TABLE `timeline_post_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timeline_post_likes_user_id_foreign` (`user_id`),
  ADD KEY `timeline_post_likes_user_post_id_foreign` (`user_post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_posts`
--
ALTER TABLE `user_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_post_comments`
--
ALTER TABLE `user_post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_post_comments_user_post_id_foreign` (`user_post_id`),
  ADD KEY `user_post_comments_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_post_replies`
--
ALTER TABLE `user_post_replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_post_replies_user_post_comment_id_foreign` (`user_post_comment_id`),
  ADD KEY `user_post_replies_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_posts`
--
ALTER TABLE `group_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `group_post_comments`
--
ALTER TABLE `group_post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `group_post_replies`
--
ALTER TABLE `group_post_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_posts`
--
ALTER TABLE `page_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_post_comments`
--
ALTER TABLE `page_post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `page_post_replies`
--
ALTER TABLE `page_post_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeline_post_likes`
--
ALTER TABLE `timeline_post_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_posts`
--
ALTER TABLE `user_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_post_comments`
--
ALTER TABLE `user_post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_post_replies`
--
ALTER TABLE `user_post_replies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `group_post_comments`
--
ALTER TABLE `group_post_comments`
  ADD CONSTRAINT `group_post_comments_group_post_id_foreign` FOREIGN KEY (`group_post_id`) REFERENCES `group_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `group_post_replies`
--
ALTER TABLE `group_post_replies`
  ADD CONSTRAINT `group_post_replies_group_post_comment_id_foreign` FOREIGN KEY (`group_post_comment_id`) REFERENCES `group_post_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `group_post_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_post_comments`
--
ALTER TABLE `page_post_comments`
  ADD CONSTRAINT `page_post_comments_page_post_id_foreign` FOREIGN KEY (`page_post_id`) REFERENCES `page_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `page_post_replies`
--
ALTER TABLE `page_post_replies`
  ADD CONSTRAINT `page_post_replies_page_post_comment_id_foreign` FOREIGN KEY (`page_post_comment_id`) REFERENCES `page_post_comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `page_post_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `timeline_post_likes`
--
ALTER TABLE `timeline_post_likes`
  ADD CONSTRAINT `timeline_post_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `timeline_post_likes_user_post_id_foreign` FOREIGN KEY (`user_post_id`) REFERENCES `user_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_post_comments`
--
ALTER TABLE `user_post_comments`
  ADD CONSTRAINT `user_post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_post_comments_user_post_id_foreign` FOREIGN KEY (`user_post_id`) REFERENCES `user_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_post_replies`
--
ALTER TABLE `user_post_replies`
  ADD CONSTRAINT `user_post_replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_post_replies_user_post_comment_id_foreign` FOREIGN KEY (`user_post_comment_id`) REFERENCES `user_post_comments` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
