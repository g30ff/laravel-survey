-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 10, 2017 at 05:19 PM
-- Server version: 5.7.16-0ubuntu0.16.04.1
-- PHP Version: 7.1.1-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homestead`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `answer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `created_at`, `updated_at`, `answer`) VALUES
(2, '2017-02-07 20:57:07', '2017-02-07 20:57:54', 'It\'s tomorrow!'),
(3, '2017-02-07 20:57:23', '2017-02-07 20:57:39', 'It\'s the day after!'),
(4, '2017-02-08 09:35:07', '2017-02-08 09:35:07', 'Cereal'),
(5, '2017-02-08 09:35:54', '2017-02-08 09:35:54', 'Bacon and Eggs'),
(6, '2017-02-08 09:36:16', '2017-02-08 09:36:16', 'Toast'),
(7, '2017-02-08 09:40:53', '2017-02-08 09:40:53', 'Nothing.'),
(8, '2017-02-08 10:09:49', '2017-02-08 10:09:49', '1 Hour'),
(9, '2017-02-08 10:09:59', '2017-02-08 10:10:07', '2 Hours'),
(10, '2017-02-08 10:10:32', '2017-02-08 10:10:32', '3 Hours'),
(11, '2017-02-08 10:10:49', '2017-02-08 10:10:49', 'I didn\'t go'),
(12, '2017-02-08 10:13:27', '2017-02-08 10:13:27', 'I feel great.'),
(13, '2017-02-08 10:13:38', '2017-02-08 10:13:38', 'I feel ok.'),
(14, '2017-02-08 10:13:52', '2017-02-08 10:13:52', 'I don\'t feel good.'),
(15, '2017-02-08 10:14:05', '2017-02-08 10:14:05', 'I feel awful.');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_02_07_152534_create_answers_table', 2),
(4, '2017_02_07_153540_create_questions_table', 2),
(5, '2017_02_08_071419_create_question_answer_table', 3),
(9, '2017_02_09_111859_create_survey_question_table', 4),
(11, '2017_02_09_152600_create_surveys_table', 4),
(12, '2017_02_10_091629_create_survey_results_table', 5),
(13, '2017_02_10_092100_create_survey_results_detail_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `created_at`, `updated_at`, `question`) VALUES
(1, '2017-02-01 01:02:03', '2017-02-08 10:13:06', 'How do you feel  today?'),
(3, '2017-02-07 19:41:04', '2017-02-08 10:11:39', 'How long did you go to the gym for today?'),
(7, '2017-02-08 09:41:54', '2017-02-08 09:41:54', 'What did you have for breakfast today'),
(9, '2017-02-10 10:30:49', '2017-02-10 10:30:49', 'what time is it xxxxxxxxxxx?'),
(10, '2017-02-10 15:51:42', '2017-02-10 15:51:42', 'zzzzzzzzzzzzzzzzzzzzzzzzzzz');

-- --------------------------------------------------------

--
-- Table structure for table `question_answer`
--

CREATE TABLE `question_answer` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `question_answer`
--

INSERT INTO `question_answer` (`id`, `created_at`, `updated_at`, `question_id`, `answer_id`) VALUES
(3, '2017-02-08 09:41:54', '2017-02-08 09:41:54', 7, 4),
(4, '2017-02-08 09:41:54', '2017-02-08 09:41:54', 7, 5),
(5, '2017-02-08 09:41:54', '2017-02-08 09:41:54', 7, 6),
(6, '2017-02-08 09:41:54', '2017-02-08 09:41:54', 7, 7),
(7, '2017-02-08 10:11:39', '2017-02-08 10:11:39', 3, 8),
(8, '2017-02-08 10:11:39', '2017-02-08 10:11:39', 3, 9),
(9, '2017-02-08 10:11:39', '2017-02-08 10:11:39', 3, 10),
(10, '2017-02-08 10:11:39', '2017-02-08 10:11:39', 3, 11),
(11, '2017-02-08 10:14:33', '2017-02-08 10:14:33', 1, 12),
(12, '2017-02-08 10:14:33', '2017-02-08 10:14:33', 1, 13),
(13, '2017-02-08 10:14:33', '2017-02-08 10:14:33', 1, 14),
(14, '2017-02-08 10:14:33', '2017-02-08 10:14:33', 1, 15),
(27, '2017-02-10 15:51:42', '2017-02-10 15:51:42', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `surveys`
--

CREATE TABLE `surveys` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `survey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `surveys`
--

INSERT INTO `surveys` (`id`, `created_at`, `updated_at`, `user_id`, `survey`) VALUES
(1, '2017-02-09 17:04:42', '2017-02-09 17:04:42', 1, 'Survey 1'),
(7, '2017-02-09 17:20:39', '2017-02-09 17:20:39', 1, 'Survey 2');

-- --------------------------------------------------------

--
-- Table structure for table `survey_question`
--

CREATE TABLE `survey_question` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `survey_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey_question`
--

INSERT INTO `survey_question` (`id`, `created_at`, `updated_at`, `survey_id`, `question_id`) VALUES
(2, '2017-02-09 17:20:39', '2017-02-09 17:20:39', 7, 1),
(3, '2017-02-09 17:20:39', '2017-02-09 17:20:39', 7, 3),
(4, '2017-02-09 17:20:39', '2017-02-09 17:20:39', 7, 7),
(5, '2017-02-09 18:15:02', '2017-02-09 18:15:02', 1, 7),
(6, '2017-02-09 18:28:01', '2017-02-09 18:28:01', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_results`
--

CREATE TABLE `survey_results` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `survey_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey_results`
--

INSERT INTO `survey_results` (`id`, `created_at`, `updated_at`, `survey_id`, `user_id`) VALUES
(6, '2017-02-10 10:18:25', '2017-02-10 10:18:25', 7, 1),
(7, '2017-02-10 10:37:12', '2017-02-10 10:37:12', 1, 1),
(8, '2017-02-10 10:37:44', '2017-02-10 10:37:44', 1, 1),
(9, '2017-02-10 10:43:58', '2017-02-10 10:43:58', 1, 1),
(10, '2017-02-10 10:44:56', '2017-02-10 10:44:56', 1, 1),
(11, '2017-02-10 10:47:27', '2017-02-10 10:47:27', 1, 1),
(12, '2017-02-10 10:48:41', '2017-02-10 10:48:41', 1, 1),
(13, '2017-02-10 10:49:09', '2017-02-10 10:49:09', 1, 1),
(14, '2017-02-10 10:50:43', '2017-02-10 10:50:43', 1, 1),
(15, '2017-02-10 10:51:36', '2017-02-10 10:51:36', 1, 1),
(16, '2017-02-10 10:53:27', '2017-02-10 10:53:27', 1, 1),
(17, '2017-02-10 10:58:35', '2017-02-10 10:58:35', 1, 1),
(18, '2017-02-10 11:03:24', '2017-02-10 11:03:24', 1, 1),
(19, '2017-02-10 11:04:40', '2017-02-10 11:04:40', 1, 1),
(20, '2017-02-10 11:06:46', '2017-02-10 11:06:46', 7, 1),
(21, '2017-02-10 11:08:26', '2017-02-10 11:08:26', 7, 1),
(22, '2017-02-10 11:10:28', '2017-02-10 11:10:28', 7, 1),
(23, '2017-02-10 11:10:49', '2017-02-10 11:10:49', 7, 1),
(24, '2017-02-10 11:15:26', '2017-02-10 11:15:26', 7, 1),
(25, '2017-02-10 11:24:21', '2017-02-10 11:24:21', 7, 1),
(26, '2017-02-10 11:24:54', '2017-02-10 11:24:54', 7, 1),
(27, '2017-02-10 15:49:21', '2017-02-10 15:49:21', 1, 1),
(28, '2017-02-10 15:49:32', '2017-02-10 15:49:32', 1, 1),
(29, '2017-02-10 15:54:35', '2017-02-10 15:54:35', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `survey_results_detail`
--

CREATE TABLE `survey_results_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `survey_results_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `survey_results_detail`
--

INSERT INTO `survey_results_detail` (`id`, `created_at`, `updated_at`, `survey_results_id`, `question_id`, `answer_id`) VALUES
(1, NULL, NULL, 6, 7, 4),
(2, NULL, NULL, 6, 3, 8),
(3, NULL, NULL, 6, 1, 12),
(4, NULL, NULL, 7, 7, 4),
(5, NULL, NULL, 7, 1, 12),
(6, NULL, NULL, 8, 7, 4),
(7, NULL, NULL, 8, 1, 12),
(8, NULL, NULL, 9, 7, 4),
(9, NULL, NULL, 9, 1, 12),
(10, NULL, NULL, 10, 7, 4),
(11, NULL, NULL, 10, 1, 12),
(12, NULL, NULL, 11, 7, 4),
(13, NULL, NULL, 11, 1, 12),
(14, NULL, NULL, 12, 7, 4),
(15, NULL, NULL, 12, 1, 12),
(16, NULL, NULL, 13, 7, 4),
(17, NULL, NULL, 13, 1, 12),
(18, NULL, NULL, 14, 7, 4),
(19, NULL, NULL, 14, 1, 12),
(20, NULL, NULL, 15, 7, 4),
(21, NULL, NULL, 15, 1, 12),
(22, NULL, NULL, 16, 7, 4),
(23, NULL, NULL, 16, 1, 12),
(24, NULL, NULL, 17, 7, 4),
(25, NULL, NULL, 17, 1, 12),
(26, NULL, NULL, 18, 7, 4),
(27, NULL, NULL, 18, 1, 12),
(28, NULL, NULL, 19, 7, 4),
(29, NULL, NULL, 19, 1, 12),
(30, NULL, NULL, 20, 7, 4),
(31, NULL, NULL, 20, 3, 8),
(32, NULL, NULL, 20, 1, 12),
(33, NULL, NULL, 21, 7, 4),
(34, NULL, NULL, 21, 3, 8),
(35, NULL, NULL, 21, 1, 12),
(36, NULL, NULL, 22, 7, 4),
(37, NULL, NULL, 22, 3, 8),
(38, NULL, NULL, 22, 1, 12),
(39, NULL, NULL, 23, 7, 4),
(40, NULL, NULL, 23, 3, 8),
(41, NULL, NULL, 23, 1, 12),
(42, NULL, NULL, 24, 7, 4),
(43, NULL, NULL, 24, 3, 8),
(44, NULL, NULL, 24, 1, 12),
(45, NULL, NULL, 25, 7, 4),
(46, NULL, NULL, 25, 3, 8),
(47, NULL, NULL, 25, 1, 12),
(48, NULL, NULL, 26, 7, 4),
(49, NULL, NULL, 26, 3, 8),
(50, NULL, NULL, 26, 1, 12),
(51, NULL, NULL, 27, 7, 4),
(52, NULL, NULL, 27, 1, 12),
(53, NULL, NULL, 28, 7, 4),
(54, NULL, NULL, 28, 1, 12),
(55, NULL, NULL, 29, 7, 4),
(56, NULL, NULL, 29, 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'G H', 'gharnett@gmail.com', '$2y$10$iCSovgkYS0Q9yIDnqQnFdOPUvYdxRoEEqUsDwqnFmAa1iA7/tjv/i', 'moEfdw43l8IzGFmUeXAkWv1KowhYDR9mm9dFGyzl8NORFUx99GYVdsOTNv9m', '2017-02-07 09:20:05', '2017-02-07 09:20:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_answer`
--
ALTER TABLE `question_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surveys`
--
ALTER TABLE `surveys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_question`
--
ALTER TABLE `survey_question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_results`
--
ALTER TABLE `survey_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_results_detail`
--
ALTER TABLE `survey_results_detail`
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
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `survey_question`
--
ALTER TABLE `survey_question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `survey_results`
--
ALTER TABLE `survey_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `survey_results_detail`
--
ALTER TABLE `survey_results_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
