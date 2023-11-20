-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2023 at 03:55 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `colegio`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `dni` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` enum('Masculino','Femenino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `ciudad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `grado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seccion` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `user_id`, `dni`, `nombres`, `apellido_paterno`, `apellido_materno`, `genero`, `fecha_nacimiento`, `ciudad`, `direccion`, `estado`, `grado`, `seccion`, `created_at`, `updated_at`) VALUES
(1, 2, '70403198', 'ernesto', 'solano', 'ballena', 'Masculino', '2000-07-12', 'monsefu', 'conrroy', 'Activo', '2do secundaria', 'A', '2023-11-02 04:29:53', '2023-11-02 04:29:53'),
(2, 4, '12345678', 'raul', 'solano', 'ballena', 'Masculino', '2000-07-12', 'monsefu', 'conrroy', 'Activo', '2do secundaria', 'B', '2023-11-02 06:55:33', '2023-11-02 06:55:33'),
(3, 8, '78451296', 'juanito', 'vela', 'derretida', 'Masculino', '2013-05-13', 'monsefu', 'conrroy 1231', 'Activo', '2do secundaria', 'C', '2023-11-13 23:05:33', '2023-11-13 23:05:33'),
(4, 9, '78459632', 'marco', 'marco', 'marco', 'Masculino', '2013-11-13', 'monsefucito', 'conrroy 1231', 'Activo', '2do secundaria', 'D', '2023-11-13 23:08:15', '2023-11-13 23:08:15'),
(5, 10, '96857412', 'sole', 'sole', 'sole', 'Femenino', '2013-11-03', 'monsefu', 'conrroy', 'Activo', '2do secundaria', 'E', '2023-11-13 23:11:10', '2023-11-13 23:11:10'),
(6, 11, '98521463', 'martha', 'martha', 'martha', 'Femenino', '2013-11-01', 'martha', 'martha', 'Activo', '2do secundaria', 'F', '2023-11-13 23:12:39', '2023-11-13 23:12:39'),
(7, 13, '77777777', 'ernesto', 'solano', 'ballena', 'Masculino', '2000-07-12', 'mensefu cuty', 'asdasda', 'Activo', '2do secundaria', 'G', '2023-11-19 22:47:06', '2023-11-19 22:47:06'),
(8, 15, '12312312', 'asdasd', 'asdasd', 'asdas', 'Femenino', '2000-11-12', 'dsadasdasd', 'asdasdasd', 'Activo', '1ero secundaria', 'A', '2023-11-20 03:50:00', '2023-11-20 03:50:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alumnos_dni_unique` (`dni`),
  ADD KEY `alumnos_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
