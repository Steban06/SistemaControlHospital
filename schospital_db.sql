-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-01-2026 a las 00:30:38
-- Versión del servidor: 11.7.2-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `schospital_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Almacén', '2025-12-06 23:50:02', '2025-12-06 23:50:02'),
(2, 'Archivo', '2025-12-06 23:50:02', '2025-12-06 23:50:02'),
(3, 'Área de bombona (Cocina)', '2025-12-06 23:50:02', '2025-12-06 23:50:02'),
(4, 'Área de Lavado', '2025-12-06 23:50:02', '2025-12-06 23:50:02'),
(5, 'Área de Esterilización', '2025-12-06 23:50:02', '2025-12-06 23:50:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes_nacionales`
--

CREATE TABLE `bienes_nacionales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `numero_bn` varchar(255) NOT NULL COMMENT 'Número de bienes nacionales',
  `nombre` varchar(255) NOT NULL,
  `marca` varchar(255) DEFAULT 'No especificado',
  `modelo` varchar(255) DEFAULT 'No especificado',
  `serial` varchar(255) DEFAULT 'No especificado',
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `estado` enum('Operativo','Dañado','En reparación','Desincorporado') NOT NULL DEFAULT 'Operativo',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bienes_nacionales`
--

INSERT INTO `bienes_nacionales` (`id`, `numero_bn`, `nombre`, `marca`, `modelo`, `serial`, `area_id`, `categoria_id`, `estado`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '3720135', 'ESCRITORIO SECRETARIAL DE 2 GAVETAS DE FORMICA GRIS', NULL, NULL, NULL, 1, 2, 'Operativo', '2025-12-16 01:19:41', '2025-12-16 01:42:36', NULL),
(2, '3720136', 'MONITOR DE 19”', 'LG', '19M38H', '311NTUW42118', 1, 2, 'Operativo', '2025-12-16 05:20:58', '2025-12-24 20:10:34', NULL),
(3, '3720137', 'CPU MINI TOWER (RAH:8GB, MEMORIA: 120GB, PROC: 3.19GH2)', 'DELL', 'D115', 'E00024378', 1, 3, 'Operativo', '2025-12-16 05:27:16', '2025-12-24 20:10:55', NULL),
(4, '3720138', 'TECLADO', NULL, NULL, NULL, 1, 3, 'Operativo', '2025-12-16 05:32:14', '2025-12-24 20:11:05', NULL),
(5, '3720139', 'MOUSE', NULL, NULL, NULL, 1, 3, 'Operativo', '2025-12-22 16:41:59', '2025-12-24 18:32:56', NULL),
(6, '3720140', 'TELEFONO NEGRO', 'GRANDSTREAM', NULL, NULL, 1, 3, 'Operativo', '2025-12-22 16:41:59', '2025-12-24 02:52:23', NULL),
(7, '3720142', 'ESTANTE ESQUELETICO DE 7 ENTREPAÑOS', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(8, '3720143', 'ESTANTE ESQUELETICO DE 7 ENTREPAÑOS', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(9, '3720144', 'ESTANTE ESQUELETICO DE 7 ENTREPAÑOS', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(10, '3720145', 'ESTANTE ESQUELETICO DE 7 ENTREPAÑOS', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(11, '3720146', 'ESTANTE ESQUELETICO DE 7 ENTREPAÑOS', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(12, '3720147', 'ESTANTE ESQUELETICO DE 7 ENTREPAÑOS', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(13, '3720148', 'ESTANTE ESQUELETICO DE 7 ENTREPAÑOS', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(14, '3720151', 'SILLA SECRETARIAL COLOR NEGRO CON RUEDAS Y BRAZO', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(15, '3720165', 'MESON METALICO DE ACERO INOXIDABLE', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(16, '3721373', 'ESTANTE DE ACERO INOX.', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(17, '3721432', 'ESTANTE DE ACERO INOX.', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(18, '2954320', 'TABLERO BIENES NACIONALES Y DEPOSITO TIPO: ULAB424L', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(19, '2228253', 'ARCHIVO METALICO 4 GAVETAS, COLOR BLANCO', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(20, '2954427', 'ESCRITORIO SECRETARIAL DE 2 GAVETAS COLOR BLANCO', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(21, '3721465', 'ESTANTE  ESQUELETICO DE 6 ENTREPAÑOS COLOR GRIS', '', '', '', 1, 2, 'Operativo', '2025-12-22 16:41:59', '2025-12-22 16:41:59', NULL),
(22, '3720141', 'ESTANTE METALICO', NULL, NULL, NULL, 2, 2, 'Operativo', '2025-12-24 02:04:43', '2025-12-24 02:34:53', NULL),
(23, '2954244', 'ESTANTE METALICO', NULL, NULL, NULL, 2, 2, 'Operativo', '2025-12-24 02:43:26', '2025-12-24 02:43:26', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo` enum('MEDICO','MOBILIARIO','TECNOLOGICO','INFRAESTRUCTURA') NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `tipo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'MEDICO', 'Activos destinados a atención clínica: monitores, ventiladores, equipos de imagen, etc.', '2025-12-08 01:55:57', '2025-12-08 01:55:57'),
(2, 'MOBILIARIO', 'Muebles y elementos de uso no electrónico: camas, sillas, escritorios, armarios.', '2025-12-08 01:55:57', '2025-12-08 01:55:57'),
(3, 'TECNOLOGICO', 'Equipos informáticos y de comunicaciones: PCs, impresoras, switches, teléfonos.', '2025-12-08 01:55:57', '2025-12-08 01:55:57'),
(4, 'INFRAESTRUCTURA', 'Equipos de soporte de la instalación: UPS, plantas eléctricas, aire acondicionado, bombas.', '2025-12-08 01:55:57', '2025-12-08 01:55:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2025_11_29_161859_create_bienes-nacionales_table', 1),
(2, '0001_01_01_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bienes_nacional_id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `tipo` enum('FALLA','MANTENIMIENTO','OTRO') NOT NULL DEFAULT 'FALLA',
  `estado` enum('Operativo','Dañado','En reparación','Desincorporado') NOT NULL DEFAULT 'Operativo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
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
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('5JsElXpWIWa52dLS7Q7Jc0n6fI0dgiPdH3wPIhTX', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaUhPQlI2U1JZeXBaWGtnRnhIQmpHOU5odnZ0aEIxNUkyT2VRb3ZvTyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Nzk6Imh0dHA6Ly9sb2NhbGhvc3QvU2lzdGVtYUNvbnRyb2xIb3NwaXRhbC9wcm9qZWN0TGFyYXZlbC9wdWJsaWMvYmllbmVzLW5hY2lvbmFsZXMiO3M6NToicm91dGUiO3M6MjM6ImJpZW5lcy1uYWNpb25hbGVzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768570991),
('dN9wwOJAWgHKBUyVUe5Qh0xIW2pbCtbC0oBrIroB', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicVZGNVZYcVdIUE5tTFNlaGpXR05iVHltSW05N2twalk0cjlpaUI3YiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Nzk6Imh0dHA6Ly9sb2NhbGhvc3QvU2lzdGVtYUNvbnRyb2xIb3NwaXRhbC9wcm9qZWN0TGFyYXZlbC9wdWJsaWMvYmllbmVzLW5hY2lvbmFsZXMiO3M6NToicm91dGUiO3M6MjM6ImJpZW5lcy1uYWNpb25hbGVzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768488547),
('rQMk0sQ4Go7rFoU5oHRQp57nTY5b3AKirSwMRyr5', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYU5HdGlGOGhmMkN6NlhCZXZKd3IyOHRzalpha3JRcmhIbVdXb0w4SSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly9sb2NhbGhvc3QvU2lzdGVtYUNvbnRyb2xIb3NwaXRhbC9wcm9qZWN0TGFyYXZlbC9wdWJsaWMvaW5pY2lvIjtzOjU6InJvdXRlIjtzOjY6ImluaWNpbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1766773427),
('Tk4O2PsWhofHAwzUWFqjvRfI50hsOWNskbf26gcV', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiblRhY2pVWlFKQVh5T1h1Rmo4Wm5tUk1TY2ZWUWNSNmJmTEpyVTF3NiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Nzk6Imh0dHA6Ly9sb2NhbGhvc3QvU2lzdGVtYUNvbnRyb2xIb3NwaXRhbC9wcm9qZWN0TGFyYXZlbC9wdWJsaWMvYmllbmVzLW5hY2lvbmFsZXMiO3M6NToicm91dGUiO3M6MjM6ImJpZW5lcy1uYWNpb25hbGVzLmluZGV4Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1768239479),
('UcCvLjGxace9bQocsYACw7onP4YmzIuk3JSA6hYM', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRnI4M2I2VEg4MndyTEprY1cwYnZBMVZvYVVoRElTSkE4bm1wMm93VCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Njg6Imh0dHA6Ly9sb2NhbGhvc3QvU2lzdGVtYUNvbnRyb2xIb3NwaXRhbC9wcm9qZWN0TGFyYXZlbC9wdWJsaWMvaW5pY2lvIjtzOjU6InJvdXRlIjtzOjY6ImluaWNpbyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1768253859);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bienes_nacionales`
--
ALTER TABLE `bienes_nacionales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bienes_nacionales_numero_bn_unique` (`numero_bn`),
  ADD KEY `bienes_nacionales_ubicacion_id_foreign` (`area_id`),
  ADD KEY `bienes_nacionales_clasificacion_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reportes_bienes_nacional_id_foreign` (`bienes_nacional_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `bienes_nacionales`
--
ALTER TABLE `bienes_nacionales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bienes_nacionales`
--
ALTER TABLE `bienes_nacionales`
  ADD CONSTRAINT `bienes_nacionales_clasificacion_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `bienes_nacionales_ubicacion_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_bienes_nacional_id_foreign` FOREIGN KEY (`bienes_nacional_id`) REFERENCES `bienes_nacionales` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
