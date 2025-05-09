-- ********************************************************
-- Version:       Date:       Author:           
-- ********       ****        *******         
-- 01             05-09-2025  Thomas Tadesse
-- ********************************************************

CREATE DATABASE IF NOT EXISTS `magazijn-jamin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `magazijn-jamin`;
-- --------------------------------------------------------

-- Step 01:
-- Goal: Create new Data
-- ********************************************************
-- Version:       Date:       Author:           Description
-- ********       ****        *******           ***********
-- 01             05-09-2025  Thomas Tadesse	New tables & records
-- ********************************************************

DROP TABLE IF EXISTS `instructeurs`;
CREATE TABLE IF NOT EXISTS `instructeurs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `voornaam` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tussenvoegsel` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `achternaam` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobiel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum_in_dienst` date NOT NULL,
  `aantal_sterren` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_actief` tinyint(1) NOT NULL DEFAULT '1',
  `opmerking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum_aangemaakt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datum_gewijzigd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instructeurs`
--

INSERT INTO `instructeurs` (`id`, `voornaam`, `tussenvoegsel`, `achternaam`, `mobiel`, `datum_in_dienst`, `aantal_sterren`, `is_actief`, `opmerking`, `datum_aangemaakt`, `datum_gewijzigd`) VALUES
(1, 'Jan', 'van', 'Dijk', '06-12345678', '2018-02-01', '4', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(2, 'Lisa', NULL, 'Beekman', '06-23456789', '2019-05-15', '3', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(3, 'Mohammed', NULL, 'El Yassidi', '06-34567890', '2020-01-10', '5', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `typevoertuig`
--

DROP TABLE IF EXISTS `typevoertuig`;
CREATE TABLE IF NOT EXISTS `typevoertuig` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_voertuig` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rijbewijscategorie` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_actief` tinyint(1) NOT NULL DEFAULT '1',
  `opmerking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum_aangemaakt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datum_gewijzigd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `typevoertuig`
--

INSERT INTO `typevoertuig` (`id`, `type_voertuig`, `rijbewijscategorie`, `is_actief`, `opmerking`, `datum_aangemaakt`, `datum_gewijzigd`) VALUES
(1, 'Personenauto', 'B', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(2, 'Vrachtwagen', 'C', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(3, 'Bus', 'D', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(4, 'Bromfiets', 'AM', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(5, 'Motor', 'A', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `voertuigen`
--

DROP TABLE IF EXISTS `voertuigen`;
CREATE TABLE IF NOT EXISTS `voertuigen` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_voertuig_id` bigint UNSIGNED NOT NULL,
  `kentkenen` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bouwjaar` date NOT NULL,
  `brandstof` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_actief` tinyint(1) NOT NULL DEFAULT '1',
  `opmerking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum_aangemaakt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datum_gewijzigd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `voertuigen_type_voertuig_id_foreign` (`type_voertuig_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voertuigen`
--

INSERT INTO `voertuigen` (`id`, `type_voertuig_id`, `kentkenen`, `type`, `bouwjaar`, `brandstof`, `is_actief`, `opmerking`, `datum_aangemaakt`, `datum_gewijzigd`) VALUES
(1, 1, 'AU-67-IO', 'Golf', '2017-06-12', 'Benzine', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(2, 1, 'TR-24-OP', 'Polo', '2019-05-23', 'Diesel', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(3, 2, 'TY-78-KL', 'DAF', '2018-01-01', 'Diesel', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(4, 3, 'UU-34-KK', 'Mercedes', '2020-04-04', 'Elektrisch', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(5, 5, 'MM-77-FF', 'Suzuki', '2021-06-07', 'Benzine', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `voertuiginstructeurs`
--

DROP TABLE IF EXISTS `voertuiginstructeurs`;
CREATE TABLE IF NOT EXISTS `voertuiginstructeurs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `voertuig_id` bigint UNSIGNED NOT NULL,
  `instructeur_id` bigint UNSIGNED NOT NULL,
  `datum_toekenning` date NOT NULL,
  `is_actief` tinyint(1) NOT NULL DEFAULT '1',
  `opmerking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum_aangemaakt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datum_gewijzigd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `voertuiginstructeurs_voertuig_id_foreign` (`voertuig_id`),
  KEY `voertuiginstructeurs_instructeur_id_foreign` (`instructeur_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `voertuiginstructeurs`
--

INSERT INTO `voertuiginstructeurs` (`id`, `voertuig_id`, `instructeur_id`, `datum_toekenning`, `is_actief`, `opmerking`, `datum_aangemaakt`, `datum_gewijzigd`) VALUES
(1, 1, 1, '2020-02-01', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(2, 2, 2, '2021-03-01', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(3, 3, 3, '2022-02-01', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(4, 4, 1, '2022-04-01', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40'),
(5, 5, 2, '2021-05-15', 1, NULL, '2025-05-09 06:15:40', '2025-05-09 06:15:40');
COMMIT;


