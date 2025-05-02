-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2025 at 02:23 PM
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
-- Database: `mb_portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_admin@email.com|127.0.0.1', 'i:1;', 1745903240),
('laravel_cache_admin@email.com|127.0.0.1:timer', 'i:1745903240;', 1745903240),
('laravel_cache_admin@gmail.com|127.0.0.1', 'i:1;', 1745907992),
('laravel_cache_admin@gmail.com|127.0.0.1:timer', 'i:1745907992;', 1745907992),
('laravel_cache_ashdasf@gmail.com|127.0.0.1', 'i:1;', 1746106720),
('laravel_cache_ashdasf@gmail.com|127.0.0.1:timer', 'i:1746106719;', 1746106719);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cert_title` varchar(255) NOT NULL,
  `cert_issuer` varchar(255) NOT NULL,
  `cert_year` varchar(255) NOT NULL,
  `cert_description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `cert_title`, `cert_issuer`, `cert_year`, `cert_description`, `created_at`, `updated_at`) VALUES
(7, 'UI/UX Designer', 'Google', '2021', 'User experience research, wireframing, prototyping and usability testing for digital products.', '2025-04-28 20:00:41', '2025-04-28 20:00:41'),
(8, 'Front-End Web Developer', 'Meta', '2022', 'HTML, CSS, JavaScript, and React for creating modern web interfaces.', '2025-04-28 20:00:41', '2025-04-28 20:00:41'),
(9, 'Data Analytics', 'Google', '2021', 'Data cleaning, analysis, visualization, and using tools like SQL and Tableau.', '2025-04-28 20:00:41', '2025-04-28 20:00:41'),
(10, 'Responsive Web Design', 'freeCodeCamp', '2020', 'Building responsive websites using HTML5, CSS3, and Flexbox/Grid layouts.', '2025-04-28 20:00:41', '2025-04-28 20:04:29'),
(11, 'Laravel PHP Framework Certification', 'Udemy', '2023', 'Backend web development with Laravel, including REST APIs and authentication.', '2025-04-28 20:00:41', '2025-04-28 20:00:41'),
(12, 'Professional Soft Skills for Developers', 'LinkedIn Learning', '2022', 'Effective communication, teamwork, and problem-solving for software development teams.', '2025-04-28 20:00:41', '2025-04-28 20:00:41'),
(13, 'Advanced JavaScript Programming', 'Udemy', '2023', 'Deep dive into ES6+, asynchronous JavaScript, and design patterns.', '2025-04-28 20:00:41', '2025-04-28 20:00:41'),
(14, 'AWS Certified Cloud Practitioner', 'Amazon Web Services (AWS)', '2024', 'Foundational cloud computing concepts, AWS services, security, and architecture principles.', '2025-04-28 20:00:41', '2025-04-28 20:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `course`, `duration`, `school_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'B.S. in Computer Science', '2019 - 2023', 'University of Technology', 'Specialized in Web Development and UI Design, graduating with honors (GPA: 3.8/4.0).', '2025-04-28 19:54:47', '2025-04-28 19:54:47'),
(2, 'A.S. in Multimedia Design', '2017 - 2019', 'Creative Arts College', 'Mastered design principles, typography, color theory, and digital media creation. Graduated with distinction.', '2025-04-28 19:54:47', '2025-04-28 19:54:47'),
(3, 'High School Diploma', '2013 - 2017', 'St. Mary\'s Academy', 'Excelled in Computer Studies and Mathematics, leading Web Design Club initiatives. Graduated in top 5% of class.', '2025-04-28 19:54:47', '2025-04-28 19:54:47'),
(4, 'Web Development Bootcamp', '2016 (Summer)', 'CodeCamp Academy', 'Intensive 12-week program focused on full-stack development. Built 5 production-ready web applications.', '2025-04-28 19:54:47', '2025-04-28 19:54:47');

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
-- Table structure for table `heroes`
--

CREATE TABLE `heroes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `testimonial` text NOT NULL,
  `clients_served` varchar(255) NOT NULL,
  `experience_duration` varchar(255) NOT NULL,
  `expertise_level` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `heroes`
--

INSERT INTO `heroes` (`id`, `name`, `job_title`, `testimonial`, `clients_served`, `experience_duration`, `expertise_level`, `profile_image`, `created_at`, `updated_at`) VALUES
(1, 'Marldrey', 'Website Designer', 'Marldrey\'s exceptional Web design ensured our website\'s success. Highly recommended!', '20+', '1 Year', 'Experts', '68104e1bbc24c.png', '2025-04-28 19:54:57', '2025-04-28 19:57:15');

-- --------------------------------------------------------

--
-- Table structure for table `ivet_summaries`
--

CREATE TABLE `ivet_summaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `professional_skills` text NOT NULL,
  `networking` text NOT NULL,
  `trend_awareness` text NOT NULL,
  `personal_growth` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ivet_summaries`
--

INSERT INTO `ivet_summaries` (`id`, `professional_skills`, `networking`, `trend_awareness`, `personal_growth`, `created_at`, `updated_at`) VALUES
(1, 'These visits elevated my technical expertise by exposing me to industry best practices. Adopting efficient workflows and advanced methodologies has transformed my development process.', 'Engaging with industry professionals opened doors to mentorship and collaboration, strengthening my ties to the web development community and guiding my career growth.', 'Exposure to emerging technologies at top firms keeps my skills ahead of the curve, allowing me to proactively adapt to industry shifts.', 'These experiences built confidence, clarified my career goals, and deepened my passion for web design through exposure to industry excellence.', '2025-04-28 19:54:31', '2025-04-28 19:54:31');

-- --------------------------------------------------------

--
-- Table structure for table `ivet_visits`
--

CREATE TABLE `ivet_visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `key_takeaways` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`key_takeaways`)),
  `reflection` text NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ivet_visits`
--

INSERT INTO `ivet_visits` (`id`, `title`, `date`, `description`, `key_takeaways`, `reflection`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 'Tech Innovation Hub', '2025-02-20', 'Explored Silicon Valley\'s leading tech innovation center, diving into emerging web technologies and cutting-edge design trends.', '[\"Mastered modern UI\\/UX methodologies from industry leaders\",\"Explored AI-driven design tools revolutionizing web development\",\"Observed agile development practices in action\",\"Connected with senior developers and design professionals\"]', 'This visit reshaped my approach to web design. Witnessing professionals tackle complex challenges inspired me to prioritize user-centered methodologies and accessibility in my work.', '/storage/ivet_images/2fkGS7RU8RqbGMbCTetwahS1OU2sXDVKALNsSLzv.png', '2025-04-28 19:54:42', '2025-04-28 19:59:20'),
(2, 'Digital Marketing Agency', '2025-04-25', 'Toured a leading digital marketing agency specializing in web presence optimization and conversion-focused design.', '[\"Learned how web design drives marketing goals\",\"Mastered advanced SEO techniques for enhanced visibility\",\"Studied analytics-driven design for higher conversions\",\"Explored A\\/B testing for UI optimization\"]', 'This experience connected creative design with marketing impact. I now focus on both aesthetics and measurable results, using data-driven decisions to evaluate project success.', '/storage/ivet_images/w691hFbJcMr96WwAHwovOKJM37E5foZghfq0PaEa.png', '2025-04-28 19:54:42', '2025-04-28 19:59:05'),
(3, 'UX Research Laboratory', '2025-03-31', 'Engaged in hands-on learning at a UX research facility, observing user testing and modern research methodologies.', '[\"Observed user testing with eye-tracking technology\",\"Learned structured methods for analyzing user feedback\",\"Emphasized accessibility testing in web design\",\"Developed skills for inclusive digital experiences\"]', 'Seeing users struggle with interfaces was a game-changer. This visit deepened my empathy and commitment to designing effective, user-friendly experiences.', '/storage/ivet_images/Bqn63z8UOirGDo6ZnqI4S0eOLsI8jdYwKvzlEG79.png', '2025-04-28 19:54:42', '2025-04-28 19:58:54'),
(4, 'E-commerce Development Company', '2025-04-29', 'Toured a specialized e-commerce firm, focusing on online store optimization and conversion strategies.', '[\"Optimized checkout processes for seamless user experiences\",\"Reduced cart abandonment through strategic design\",\"Integrated payment gateways with robust security\",\"Mastered product showcase best practices\"]', 'This visit highlighted the importance of trust and simplicity in e-commerce design. I now prioritize user journeys that minimize friction and build confidence.', '/storage/ivet_images/KUShylLalz1JAon77XXmJGu1SkJSvaWSyYBObj72.png', '2025-04-28 19:54:42', '2025-04-28 19:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(5, '2025_04_22_163429_create_skills_table', 3),
(6, '2025_04_22_205101_create_askills_table', 4),
(18, '0001_01_01_000000_create_users_table', 5),
(19, '0001_01_01_000001_create_cache_table', 5),
(20, '0001_01_01_000002_create_jobs_table', 5),
(21, '2025_04_22_154609_create_personal_access_tokens_table', 5),
(22, '2025_04_23_231712_create_skills_table', 5),
(23, '2025_04_24_182345_create_work_experiences_table', 6),
(24, '2025_04_24_210649_create_ivet_visits_table', 7),
(25, '2025_04_24_210723_create_ivet_summaries_table', 7),
(32, '2025_04_27_154247_create_education_table', 8),
(33, '2025_04_28_172243_create_certifications_table', 8),
(35, '2025_04_29_004542_create_heroes_table', 9),
(36, '2025_04_29_052005_add_role_to_users_table', 10);

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
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('VnWWPgaRnbPkNCWkUKrbAGB03k6mUKgnPL8AndpH', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/135.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUVl2M3EweFpUN2xqUUNGNHFXT3B3dUtoc292cnJaYkpuUkxpemZTcyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1746107735);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `tools` varchar(255) NOT NULL,
  `percentage` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `title`, `description`, `tools`, `percentage`, `created_at`, `updated_at`) VALUES
(1, 'Web Design', 'Creating visually appealing, responsive websites that deliver exceptional user experiences across all devices.', 'HTML/CSS', 95, '2025-04-28 20:02:20', '2025-04-28 20:02:20'),
(2, 'Frontend Development', 'Building interactive and dynamic user interfaces using modern JavaScript frameworks and libraries.', 'JavaScript/React', 85, '2025-04-28 20:02:20', '2025-04-28 20:02:20'),
(3, 'Backend Development', 'Developing robust server-side applications and RESTful APIs using PHP and Laravel framework.', 'PHP/Laravel', 80, '2025-04-28 20:02:20', '2025-04-28 20:02:20'),
(4, 'UI/UX Design', 'Creating intuitive and engaging user interfaces with a focus on user experience and accessibility.', 'Figma/Adobe XD', 90, '2025-04-28 20:02:20', '2025-04-28 20:02:20'),
(5, 'E-commerce Solutions', 'Building secure and scalable online stores with payment gateway integration and inventory management.', 'WooCommerce/Shopify', 85, '2025-04-28 20:02:20', '2025-04-28 20:02:20'),
(6, 'SEO Optimization', 'Implementing search engine optimization strategies to improve website visibility and organic traffic.', 'On-page/Off-page SEO', 75, '2025-04-28 20:02:20', '2025-04-28 20:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin', 'admin@email.com', '2025-04-24 10:27:05', '$2y$12$4K0dWv.WiXnvkNlfviNTLe6IjS4.pavUNPWMG033qtejekDTSIkDS', 'jGUzwjCdGS', '2025-04-24 10:27:05', '2025-04-24 10:27:05', 'user'),
(3, 'Admin', 'mb@gmail.com', NULL, '$2y$12$nZjMVjqtRP4FxUuBY56Lh.U9MCae6ZyFhEB9HhEyEfS7iDWxgZCmK', NULL, '2025-04-28 21:24:04', '2025-04-28 21:24:04', 'admin'),
(4, 'Admin', 'zura@gmail.com', NULL, '$2y$12$Z80u5vvwBHQ9k5kKqUYzCOUeJVYL06kWZTyYHtFDztabnczZ7Jquy', 'UbDlByD4ZT8h6jlVg7OA4xBL5KcCG8vqCNDJYKk2uvpmvAPeqmKXO0ZGsbXs', '2025-04-28 21:24:04', '2025-05-01 05:24:31', 'admin'),
(5, 'user', 'user@gmail.com', NULL, '$2y$12$ClmzDuznYZonZrc5Apc2euGllYqPjuGFUzO5u8bDzmkOdOBD.piJ6', NULL, '2025-04-28 22:26:29', '2025-04-28 22:26:29', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `period` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `responsibilities` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`id`, `job_title`, `company`, `period`, `description`, `responsibilities`, `created_at`, `updated_at`) VALUES
(1, 'Web Designer & Developer', 'TechSavvy Solutions', '2023 - Present', 'Led design and development for client websites across diverse industries, emphasizing responsive design and superior user experiences. Collaborated closely with developers to ensure pixel-perfect implementation.', '[\"Boosted client conversion rates by 30% through optimized UI\\/UX\",\"Designed and developed 15+ responsive websites across sectors\",\"Enhanced search rankings with SEO best practices\"]', '2025-04-28 19:54:21', '2025-04-28 19:54:21'),
(2, 'Junior Web Developer', 'Digital Creators Agency', '2022 - 2023', 'Supported senior developers in building and maintaining client websites, focusing on frontend development with HTML, CSS, JavaScript, and PHP.', '[\"Contributed to 10+ projects in e-commerce and corporate sectors\",\"Improved website load times by up to 40% through optimization\",\"Developed responsive email templates for marketing campaigns\"]', '2025-04-28 19:54:21', '2025-04-28 19:54:21'),
(3, 'Web Design Intern', 'CreativeTech Studios', '2021 - 2022', 'Gained hands-on experience in web design and development, assisting with design mockups and basic HTML/CSS implementation in a professional environment.', '[\"Created wireframes and mockups for 5+ client projects\",\"Mastered responsive design principles\",\"Developed proficiency in Adobe Creative Suite and Figma\"]', '2025-04-28 19:54:21', '2025-04-28 19:54:21'),
(4, 'Software Engineer', 'Digital Creators Agency', '2023 - 2024', 'i made wedbsites', '\"cute \\nako \\nsobra\\npa\\nsa\"', '2025-04-28 20:05:55', '2025-04-28 20:44:26');

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
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
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
-- Indexes for table `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ivet_summaries`
--
ALTER TABLE `ivet_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ivet_visits`
--
ALTER TABLE `ivet_visits`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ivet_summaries`
--
ALTER TABLE `ivet_summaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ivet_visits`
--
ALTER TABLE `ivet_visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
