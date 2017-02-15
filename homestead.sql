-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 15, 2017 at 12:52 PM
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
(7, '2017-02-08 09:41:54', '2017-02-08 09:41:54', 'What did you have for breakfast today');

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
(14, '2017-02-08 10:14:33', '2017-02-08 10:14:33', 1, 15);

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
(1, 'G H', 'gharnett@gmail.com', '$2y$10$iCSovgkYS0Q9yIDnqQnFdOPUvYdxRoEEqUsDwqnFmAa1iA7/tjv/i', 'QzLZnCl9P0a6UxbrHrj70a9snlIgyu69K8AbITfaV8AFUWBZl29kuefUyDJh', '2017-02-07 09:20:05', '2017-02-07 09:20:05'),
(27, 'Dr. Ola Murazik DVM', 'dkunze@example.com', '$2y$10$JvvrGmwjY5xuaOxEPo6NxOFYkHxD84d6N/uRX4LHUA11q53ZuMN..', '6QOlO7pAPW', '2017-02-14 16:25:54', '2017-02-14 16:25:54');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `question_answer`
--
ALTER TABLE `question_answer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `surveys`
--
ALTER TABLE `surveys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `survey_question`
--
ALTER TABLE `survey_question`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `survey_results`
--
ALTER TABLE `survey_results`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `survey_results_detail`
--
ALTER TABLE `survey_results_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
