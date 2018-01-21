-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Jan 2018 um 23:07
-- Server-Version: 10.1.26-MariaDB
-- PHP-Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `carshare`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `cars`
--

CREATE TABLE `cars` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licence_plate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nr_of_seats` tinyint(4) NOT NULL,
  `weight` mediumint(9) NOT NULL,
  `capacity` mediumint(9) NOT NULL,
  `power` mediumint(9) NOT NULL,
  `design_speed` mediumint(9) NOT NULL,
  `payload` mediumint(9) NOT NULL,
  `vertical_load` mediumint(9) NOT NULL,
  `axe_load` mediumint(9) NOT NULL,
  `animal_allowed` tinyint(1) NOT NULL,
  `smoking_allowed` tinyint(1) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `available_from` date NOT NULL,
  `available_to` date NOT NULL,
  `lat` double(17,14) NOT NULL,
  `lng` double(17,14) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `cars`
--

INSERT INTO `cars` (`id`, `brand`, `car_type`, `color`, `licence_plate`, `nr_of_seats`, `weight`, `capacity`, `power`, `design_speed`, `payload`, `vertical_load`, `axe_load`, `animal_allowed`, `smoking_allowed`, `description`, `price`, `available_from`, `available_to`, `lat`, `lng`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'VW', 'Golf', 'Schwarz', 'VI-123-AB', 4, 1000, 50, 1234, 345, 800, 1000, 123, 0, 1, 'Aller super tollstes Auto !', 123, '2018-01-21', '2018-01-21', 46.60592551179541, 13.81655213593751, 1, '2018-01-21 13:46:02', '2018-01-21 13:46:02'),
(2, 'Renault', 'Golf', 'Schwarz', 'VI-123-AB', 4, 1000, 50, 1234, 345, 800, 1000, 123, 0, 1, 'Zweit super tollstes Auto !', 123, '2018-01-21', '2018-01-21', 46.60592551179541, 13.82747409104616, 1, '2018-01-21 13:46:02', '2018-01-21 13:46:02'),
(3, 'Audi', 'Golf', 'Schwarz', 'VI-123-AB', 4, 1000, 50, 1234, 345, 800, 1000, 123, 0, 1, 'Dritt super tollstes Auto !', 123, '2018-01-21', '2018-01-21', 46.60484935802310, 13.81655213593751, 1, '2018-01-21 13:46:03', '2018-01-21 13:46:03'),
(4, 'BMW', 'Golf', 'Schwarz', 'VI-123-AB', 4, 1000, 50, 1234, 345, 800, 1000, 123, 0, 1, 'Aller super tollstes Auto !', 123, '2018-01-21', '2018-01-21', 46.60484935802310, 13.82747409104616, 1, '2018-01-21 13:46:03', '2018-01-21 13:46:03');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(10) UNSIGNED NOT NULL,
  `feedback` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `feedback`, `car_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'asdfsdafasdfsadfasf', 1, 1, '2018-01-21 18:16:51', '2018-01-21 18:16:51');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `betreff` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inhalt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `gelesen` tinyint(1) NOT NULL DEFAULT '0',
  `senderID` int(11) NOT NULL,
  `empfaengerID` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(130, '2014_10_12_000000_create_users_table', 1),
(131, '2014_10_12_100000_create_password_resets_table', 1),
(132, '2017_12_18_105506_create_cars_table', 1),
(133, '2017_12_18_110009_create_reservations_table', 1),
(134, '2017_12_23_093928_create_feedbacks_table', 1),
(135, '2018_01_06_130425_create_messages_table', 1),
(136, '2018_01_13_210026_create_pictures_table', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `imgName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `reservations`
--

CREATE TABLE `reservations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `rent_from` date NOT NULL,
  `rent_to` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `reservations`
--

INSERT INTO `reservations` (`id`, `user_id`, `car_id`, `rent_from`, `rent_to`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-01-22', '2018-01-24', '2018-01-21 14:04:01', '2018-01-21 14:04:01');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `activation_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `avatar`, `activation_code`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'our', 'super', 'super@admin.at', '$2y$10$/RYak3RJQD3LiYblH4g./eNyVh9uRE4gCuM1abfasiQIgjXRU5WBC', 'default.png', '', 1, NULL, '2018-01-21 13:46:02', '2018-01-21 13:46:02');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indizes für die Tabelle `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT für Tabelle `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
