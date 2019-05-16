-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 14 Mai 2019 à 18:35
-- Version du serveur :  5.7.11
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tp_image_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `location_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `images`
--

INSERT INTO `images` (`id`, `location_id`, `user_id`, `created_at`, `updated_at`, `name`) VALUES
(44, 3, 12, '2019-05-12 21:49:58', NULL, 'ZuWJGEeZ4sUBUEpSdnWBOtI05zC7qeYC0DtySY2r.jpeg'),
(45, 2, 12, '2019-05-12 21:50:11', NULL, 'mZlPSkZCL1zSSkumkYE7KkMRJJMEveWZKcN99bX4.jpeg'),
(46, 1, 4, '2019-05-14 00:25:50', NULL, 'dnPA4VFBAktrNOfNScZxbxzozpfM9RzP7693DAY4.jpeg'),
(47, 4, 4, '2019-05-14 00:26:01', NULL, 'ZefkzYjwa2RYa5Vm3CKXIoee2rPdbxzKTTMeiJTC.jpeg'),
(48, 5, 4, '2019-05-14 00:26:22', NULL, 'KvDMOMeqfPiD3awgQdQaqUlhoxJXdIg7mmHmmYFl.jpeg'),
(49, 8, 5, '2019-05-14 00:28:44', NULL, 'KdpKDnlS1NLzJxD4YaUnelCxiAADwHgTpgASp4Qy.jpeg'),
(51, 14, 5, '2019-05-14 00:33:17', NULL, 'OKbgSjMMgOmHP3Nzc9izMcXVP7ReYzSxQXdSGiHJ.png'),
(52, 1, 6, '2019-05-14 00:34:58', NULL, 'WZGU2mAMofGd6pue7X1HMePVGN4e31wH7Pd0Fudi.jpeg'),
(53, 5, 6, '2019-05-14 00:35:19', NULL, 'sOjn77JmzBHCNJJRpiY2Qa4TyWuBJCrSTZY0NZi1.png'),
(54, 4, 6, '2019-05-14 00:35:32', NULL, 'ZGsfXBagQddC4r3rCkenS8uQNmGwWAxcbFUKctZC.jpeg'),
(56, 8, 6, '2019-05-14 00:37:58', NULL, 'd7rIKKED9L9Lj4E0VDj346nliIG6IqhtReFCpMnd.png'),
(58, 6, 5, '2019-05-14 15:38:29', NULL, 'mMHYv60fH8TyfH1cOFnF1nqIi0uHxOcOf6cwXEA6.jpeg'),
(59, 7, 5, '2019-05-14 15:41:55', NULL, '2mDrhI7XQY7HZY5VsYSC5IlzjBMArC3MlU5CTSlK.jpeg'),
(60, 7, 5, '2019-05-14 15:42:08', NULL, 'dHIemNSfQwIleOaXiWBRPnJxJLSB688yjSBnk0M5.jpeg'),
(61, 9, 9, '2019-05-14 15:45:39', NULL, 'R0NZhf0IXMQjXc5F4NwFzddD3Ixhb22PM99HY8KS.jpeg'),
(62, 2, 9, '2019-05-14 15:46:06', NULL, 'HR8kvFgzajok0CYCi5biDhfNFtdiPRI0CoDhZHZR.jpeg'),
(63, 1, 9, '2019-05-14 15:46:36', NULL, 'bATDU614iaNXue1cl6kFclm0hogSgx6DhaO3Q56U.png'),
(64, 13, 13, '2019-05-14 15:51:25', NULL, 'EJucnfwrrPCAI8UIcuv4ypxRinEJNLXnhDVVZv8k.jpeg'),
(65, 1, 13, '2019-05-14 15:52:24', NULL, 'z8f524sYUUlnFk6uT0N4jx2YaucBIjSK4WOkhF87.png');

-- --------------------------------------------------------

--
-- Structure de la table `image_user`
--

CREATE TABLE `image_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `alert` tinyint(3) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `image_user`
--

INSERT INTO `image_user` (`id`, `image_id`, `user_id`, `alert`, `created_at`, `updated_at`) VALUES
(2, 62, 9, 1, '2019-05-14 15:48:08', '2019-05-14 15:48:08'),
(3, 65, 13, 1, '2019-05-14 16:41:34', '2019-05-14 16:41:34'),
(4, 62, 1, 1, '2019-05-14 17:55:41', '2019-05-14 17:55:41'),
(5, 64, 1, 1, '2019-05-14 17:57:00', '2019-05-14 17:57:11'),
(6, 64, 9, 1, '2019-05-14 17:58:21', '2019-05-14 17:58:21');

-- --------------------------------------------------------

--
-- Structure de la table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `locations`
--

INSERT INTO `locations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Quebec', NULL, NULL),
(2, 'Montreal', NULL, NULL),
(3, 'New York', NULL, NULL),
(4, 'Washington', NULL, NULL),
(5, 'Bangkok', NULL, NULL),
(6, 'Paris', NULL, NULL),
(7, 'Phnom Penh', NULL, NULL),
(8, 'Hong Kong', NULL, NULL),
(9, 'Vancouver', NULL, NULL),
(10, 'Tatouine', NULL, NULL),
(11, 'Terre du milieu', NULL, NULL),
(12, 'Jakku', NULL, NULL),
(13, 'La Havane', NULL, NULL),
(14, 'Berlin', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_04_03_154621_create_images_table', 1),
(4, '2019_04_03_154839_create_image_user_table', 1),
(5, '2019_04_03_155024_create_locations_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('user','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.ca', NULL, '$2y$10$E/9lDpnlW26bOyJwoq8oseLDN7bpcuTnsLzNhFNdjfCrBSccAsTnK', 'admin', NULL, '2019-04-16 05:04:33', '2019-04-16 05:04:33'),
(4, 'user3', 'user3@user3.ca', NULL, '$2y$10$RKZmw1Tji.YqhAtp7clRtu0hHRzzDFKdaCif0DaXpHOFAOP6wSUiy', 'user', NULL, '2019-04-17 20:43:39', '2019-04-17 20:43:39'),
(5, 'user4', 'user4@user4.com', NULL, '$2y$10$p5m5rgDDGL9MwuBdfN/zvu7ETN1V6Kt3a9Xsd8hO9nOvGmel0x9s6', 'user', NULL, '2019-04-17 20:45:15', '2019-04-17 20:45:15'),
(6, 'user5', 'user5@user5.com', NULL, '$2y$10$eUqVVbJF6mn.ADToNphIvu93/n3HIlQtDewSTWWY.U13JETyLoh7y', 'user', NULL, '2019-04-17 20:47:45', '2019-04-17 20:47:45'),
(7, 'user6', 'user6@user6.com', NULL, '$2y$10$JyHDdZ9RGnjiyecAQ5JvYOMwavRAeFq05kZtybdK86T7DrcI6oNHy', 'user', NULL, '2019-04-17 20:48:37', '2019-04-17 20:48:37'),
(9, 'user8', 'user8@user8.ca', NULL, '$2y$10$elhjWo0bZndveLl4w7zP0uoXkurIEvrJodjQhCXtFtyT4iT9DfuCC', 'user', NULL, '2019-05-01 17:28:12', '2019-05-01 17:28:12'),
(12, 'user1', 'user1@user1.ca', NULL, '$2y$10$mV107Rcztu/WWCIoBmmc5.7hS0n59MUGFXuchb3ch78x71NbHzdAm', 'user', NULL, '2019-05-12 21:48:43', '2019-05-12 21:48:43'),
(13, 'truc', 'truc@truc.ca', NULL, '$2y$10$RHRCffSNB8Mgcc9NsUvBiu4QvXAos2nmZbktbl0b6RyCqlTqhRgCq', 'user', NULL, '2019-05-14 15:50:55', '2019-05-14 16:41:00');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_location_id_index` (`location_id`),
  ADD KEY `images_user_id_index` (`user_id`);

--
-- Index pour la table `image_user`
--
ALTER TABLE `image_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_user_image_id_index` (`image_id`),
  ADD KEY `image_user_user_id_index` (`user_id`),
  ADD KEY `image_user_alert_index` (`alert`);

--
-- Index pour la table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT pour la table `image_user`
--
ALTER TABLE `image_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `image_user`
--
ALTER TABLE `image_user`
  ADD CONSTRAINT `image_user_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `image_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
