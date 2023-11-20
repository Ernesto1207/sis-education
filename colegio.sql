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

-- --------------------------------------------------------

--
-- Table structure for table `asignaciones_curso`
--

CREATE TABLE `asignaciones_curso` (
  `id` bigint UNSIGNED NOT NULL,
  `alumno_id` bigint UNSIGNED NOT NULL,
  `curso_id` bigint UNSIGNED NOT NULL,
  `horario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asignaciones_curso`
--

INSERT INTO `asignaciones_curso` (`id`, `alumno_id`, `curso_id`, `horario`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '07:45:00', NULL, NULL),
(2, 1, 3, '08:15:00', NULL, NULL),
(3, 1, 2, '07:45:00', NULL, NULL),
(4, 1, 5, '10:15:00', NULL, NULL),
(12, 2, 6, '08:45:00', NULL, NULL),
(13, 2, 3, '08:15:00', NULL, NULL),
(14, 2, 2, '08:45:00', NULL, NULL),
(15, 1, 7, '12:15:00', NULL, NULL),
(16, 4, 7, '12:15:00', NULL, NULL),
(17, 4, 2, '12:15:00', NULL, NULL),
(18, 4, 5, '10:15:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `asistencias`
--

CREATE TABLE `asistencias` (
  `id` bigint UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alumno_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asistencias`
--

INSERT INTO `asistencias` (`id`, `fecha`, `estado`, `alumno_id`, `created_at`, `updated_at`) VALUES
(1, '2023-11-11', 'Falta', 1, '2023-11-11 23:58:42', '2023-11-11 23:58:42'),
(2, '2023-11-13', 'Tardanza', 1, '2023-11-13 13:59:45', '2023-11-13 13:59:45'),
(3, '2023-11-13', 'Asistio', 1, '2023-11-13 12:00:10', '2023-11-13 12:00:10'),
(4, '2023-11-14', 'Falta', 1, '2023-11-15 00:01:24', '2023-11-15 00:01:24'),
(5, '2023-11-15', 'Asistio', 2, '2023-11-15 07:27:31', '2023-11-15 07:27:31'),
(6, '2023-11-15', 'Asistio', 4, '2023-11-15 07:43:02', '2023-11-15 07:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `conducta`
--

CREATE TABLE `conducta` (
  `id` bigint UNSIGNED NOT NULL,
  `alumno_id` bigint UNSIGNED NOT NULL,
  `profesor_id` bigint UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conductas`
--

CREATE TABLE `conductas` (
  `id` bigint UNSIGNED NOT NULL,
  `alumno_id` bigint UNSIGNED NOT NULL,
  `profesor_id` bigint UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conductas`
--

INSERT INTO `conductas` (`id`, `alumno_id`, `profesor_id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'se durmio en clase', '2023-11-03 09:44:32', '2023-11-03 11:04:25'),
(3, 2, 1, 'duerme', '2023-11-19 22:08:24', '2023-11-19 22:08:24'),
(4, 4, 1, 'asdad', '2023-11-19 22:08:38', '2023-11-19 22:08:38');

-- --------------------------------------------------------

--
-- Table structure for table `cursos`
--

CREATE TABLE `cursos` (
  `id` bigint UNSIGNED NOT NULL,
  `profesor_id` bigint UNSIGNED DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `horario_entrada` time NOT NULL,
  `horario_salida` time NOT NULL,
  `dias_semana` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cursos`
--

INSERT INTO `cursos` (`id`, `profesor_id`, `nombre`, `descripcion`, `horario_entrada`, `horario_salida`, `dias_semana`, `created_at`, `updated_at`) VALUES
(2, 1, 'lenguaje', 'silabus', '08:15:00', '08:45:00', 'lunes', '2023-11-02 04:32:38', '2023-11-02 04:32:38'),
(3, 1, 'matematica', 'silabus', '08:15:00', '08:00:00', 'martes', '2023-11-02 04:36:53', '2023-11-02 04:36:53'),
(4, 1, 'geometria', 'silabus', '07:45:00', '08:15:00', 'lunes', '2023-11-02 04:40:26', '2023-11-02 04:40:26'),
(5, 3, 'algebra', 'silabus', '10:15:00', '10:02:00', 'miercoles', '2023-11-03 07:02:42', '2023-11-03 07:02:42'),
(6, 3, 'personal social', 'silabus', '08:45:00', '09:30:00', 'miercoles', '2023-11-06 12:40:17', '2023-11-06 12:40:17'),
(7, 4, 'trigonometria', 'silabus', '12:15:00', '12:00:00', 'jueves', '2023-11-16 07:30:12', '2023-11-16 07:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `curso_profesor`
--

CREATE TABLE `curso_profesor` (
  `id` bigint UNSIGNED NOT NULL,
  `curso_id` bigint UNSIGNED NOT NULL,
  `profesor_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `curso_profesor`
--

INSERT INTO `curso_profesor` (`id`, `curso_id`, `profesor_id`, `created_at`, `updated_at`) VALUES
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 4, 1, NULL, NULL),
(5, 5, 3, NULL, NULL),
(6, 6, 3, NULL, NULL),
(7, 7, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `justificaciones`
--

CREATE TABLE `justificaciones` (
  `id` bigint UNSIGNED NOT NULL,
  `alumno_id` bigint UNSIGNED NOT NULL,
  `profesor_id` bigint UNSIGNED NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `justificaciones`
--

INSERT INTO `justificaciones` (`id`, `alumno_id`, `profesor_id`, `descripcion`, `imagen`, `created_at`, `updated_at`) VALUES
(11, 1, 1, 'asd\r\n                                                asdasd', 'http://colegio.test/storage/public/images/gl7Avd4gRDz5Ep4IqPeSD04u6oZiXrRFXNUoIuC6.png', '2023-11-06 15:06:40', '2023-11-06 15:06:46'),
(12, 2, 4, 'dasdad', 'http://colegio.test/storage/public/images/IXeJRcyKPamZ29w17zNCBDpp8CauwjY38vVwdoZ1.jpg', '2023-11-19 22:17:05', '2023-11-19 22:17:05'),
(13, 6, 1, 'masada', 'http://colegio.test/storage/public/images/S9O4x7zpDQpVsIgZYAVRrGyNwctUafyOhtVofawV.jpg', '2023-11-19 23:37:46', '2023-11-19 23:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_23_144728_create_sessions_table', 1),
(7, '2023_10_23_145353_create_permission_tables', 1),
(8, '2023_10_28_012851_create_alumnos_table', 1),
(9, '2023_10_28_032146_create_asistencias_table', 1),
(10, '2023_10_29_234857_create_profesores_table', 1),
(11, '2023_10_29_234956_create_cursos_table', 1),
(12, '2023_10_29_235159_create_asignaciones_curso_table', 1),
(13, '2023_10_29_235259_create_notas_table', 1),
(14, '2023_10_29_235324_create_justificaciones_table', 1),
(15, '2023_10_29_235348_create_conducta_table', 1),
(16, '2023_10_30_012324_create_curso_profesor_table', 1),
(17, '2023_11_03_042122_create_conductas_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4),
(3, 'App\\Models\\User', 13);

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id` bigint UNSIGNED NOT NULL,
  `alumno_id` bigint UNSIGNED NOT NULL,
  `curso_id` bigint UNSIGNED NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id`, `alumno_id`, `curso_id`, `valor`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '12.00', '2023-11-06 12:38:09', '2023-11-06 12:38:09'),
(2, 1, 4, '12.00', '2023-11-06 12:45:49', '2023-11-06 12:45:49'),
(3, 1, 2, '12.00', '2023-11-06 12:49:23', '2023-11-06 12:49:23'),
(4, 1, 2, '12.00', '2023-11-06 12:49:36', '2023-11-06 12:49:36'),
(5, 1, 2, '12.00', '2023-11-06 12:49:40', '2023-11-06 12:49:40'),
(6, 1, 4, '18.00', '2023-11-06 13:43:57', '2023-11-06 13:43:57'),
(7, 1, 4, '19.00', '2023-11-06 14:31:58', '2023-11-06 14:31:58'),
(8, 2, 6, '12.00', '2023-11-12 07:15:27', '2023-11-12 07:15:27'),
(9, 2, 6, '13.00', '2023-11-12 07:15:33', '2023-11-12 07:15:33'),
(10, 2, 6, '14.00', '2023-11-12 07:15:38', '2023-11-12 07:15:38'),
(11, 2, 6, '15.00', '2023-11-12 07:15:57', '2023-11-12 07:15:57'),
(12, 2, 3, '12.00', '2023-11-12 07:35:11', '2023-11-12 07:35:11'),
(13, 2, 3, '13.00', '2023-11-12 07:35:39', '2023-11-12 07:35:39'),
(14, 1, 5, '12.00', '2023-11-13 02:43:37', '2023-11-13 02:43:37'),
(15, 1, 5, '12.00', '2023-11-13 02:45:25', '2023-11-13 02:45:25'),
(16, 1, 4, '17.00', '2023-11-13 02:46:21', '2023-11-13 02:46:21'),
(17, 1, 7, '12.00', '2023-11-16 07:30:59', '2023-11-16 07:30:59'),
(18, 1, 7, '12.00', '2023-11-16 07:31:18', '2023-11-16 07:31:18'),
(19, 1, 7, '12.00', '2023-11-16 07:31:27', '2023-11-16 07:31:27'),
(20, 1, 7, '20.00', '2023-11-16 07:31:39', '2023-11-16 07:31:39'),
(21, 4, 7, '12.00', '2023-11-16 11:35:29', '2023-11-16 11:35:29'),
(22, 4, 7, '12.00', '2023-11-16 11:38:05', '2023-11-16 11:38:05'),
(23, 4, 7, '12.00', '2023-11-16 11:40:16', '2023-11-16 11:40:16'),
(24, 4, 7, '12.00', '2023-11-16 11:40:25', '2023-11-16 11:40:25'),
(25, 4, 2, '12.00', '2023-11-16 11:41:16', '2023-11-16 11:41:16'),
(26, 4, 2, '15.00', '2023-11-16 11:41:42', '2023-11-16 11:41:42'),
(27, 4, 2, '16.00', '2023-11-16 11:42:03', '2023-11-16 11:42:03'),
(28, 4, 2, '17.00', '2023-11-16 11:43:34', '2023-11-16 11:43:34'),
(29, 4, 5, '12.00', '2023-11-16 11:44:13', '2023-11-16 11:44:13'),
(30, 4, 5, '12.00', '2023-11-16 11:44:19', '2023-11-16 11:44:19'),
(31, 4, 5, '13.00', '2023-11-16 11:44:29', '2023-11-16 11:44:29'),
(32, 4, 5, '16.00', '2023-11-16 11:44:39', '2023-11-16 11:44:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('ernestosolanoballena@hotmail.com', '$2y$10$bRt5OHjqM0ivANb.faNSDOlat3/U/dNxSyqn6ZdJOEDX/LgDuxIeW', '2023-11-19 22:52:05');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'sanctum', '2023-11-02 04:27:53', '2023-11-02 04:27:53'),
(2, 'profesor', 'sanctum', '2023-11-02 06:39:40', '2023-11-02 06:39:40'),
(3, 'alumno', 'sanctum', '2023-11-15 08:19:17', '2023-11-15 08:19:17');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profesores`
--

CREATE TABLE `profesores` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `dni` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genero` enum('Masculino','Femenino') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `ciudad` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profesores`
--

INSERT INTO `profesores` (`id`, `user_id`, `dni`, `nombres`, `apellido_paterno`, `apellido_materno`, `genero`, `email`, `telefono`, `fecha_nacimiento`, `ciudad`, `direccion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 3, '71845979', 'Profesor', 'test', 'test', 'Masculino', 'profe@gmail.com', '987654321', '2005-08-01', 'monsefu', 'conrroy', 'Activo', '2023-11-02 04:30:48', '2023-11-02 04:30:48'),
(3, 6, '78787878', 'profe2', 'test', 'test', 'Masculino', 'profe2@gmail.com', '121212121', '2005-01-03', 'monsefu', 'conrroy', 'Activo', '2023-11-03 07:01:54', '2023-11-03 07:01:54'),
(4, 12, '85236974', 'profe3', 'profe3', 'profe3', 'Masculino', 'profe3@gmail.com', '985123699', '2005-11-01', 'profe3', 'profe3', 'Activo', '2023-11-13 23:51:34', '2023-11-13 23:51:34');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'sanctum', '2023-11-02 04:27:46', '2023-11-02 04:27:46'),
(2, 'Profesor', 'sanctum', '2023-11-02 06:37:05', '2023-11-02 06:37:05'),
(3, 'alumno', 'sanctum', '2023-11-15 08:19:08', '2023-11-15 08:19:08');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Zy8w3A9umvnFkoKmsyWrdVTPWFBiz3Pd6zbH0OcI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiRjYwZWNKaUg5OEVYVUxLaGZTY1ZUeHg3aWZZb0RSOFFwa2FoNGhuOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9jb2xlZ2lvLnRlc3QvYWx1bW5vcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkLnFQSkU4Qm5WSGRUUW1sb3pWL29MLjJUTkJ4QVgxLy91WmVXSnMwN2dDVGkwZHdnT2poVUsiO30=', 1700452438);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2023-11-02 04:27:01', '$2y$10$.qPJE8BnVHdTQmlozV/oL.2TNBxAX1//uZeWJs07gCTi0dwgOjhUK', NULL, NULL, NULL, '45C5XVdiiKMOpU0fjNd7cHmYdwhehyikAKs8xKuzAZC7LjnNGKV4WKCqf4wy', NULL, 'profile-photos/3AHnEGJSKZGRLZvGcIV170nXLLF01JMTYqHRrHJm.jpg', '2023-11-02 04:27:01', '2023-11-03 04:10:47'),
(2, 'ernesto', 'ernesto@gmail.com', NULL, '$2y$10$R2awT03l7OqysfgNmA3taOo0Ib54y93r5hBzruYbqwxoj/aZCKi0S', NULL, NULL, NULL, NULL, NULL, 'profile-photos/xcL0SJAXfj0R1fCz4r1cEzqZSX49n1K8tzPZqcX0.jpg', '2023-11-02 04:29:31', '2023-11-02 08:09:52'),
(3, 'profesor', 'profe@gmail.com', NULL, '$2y$10$hiZf.twGx5rfQ9FpInyMFOl955kx784ZZ/13zPHUdvW3KrOg2CTXS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-02 04:30:12', '2023-11-02 04:30:12'),
(4, 'raul', 'raul@gmail.com', NULL, '$2y$10$v7uDXrdIsNDG.B1sScwlYuc8lNx2l5/FBLnYRaTrcblZ5D5PFACtG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-02 06:55:05', '2023-11-02 06:55:05'),
(6, 'profe2', 'profe2@gmail.com', NULL, '$2y$10$52gdUtNDyDtyx96w3x3IC.P7EZPcE2UAWaf8CqcSxGgaLFvA/2NUe', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-03 07:01:06', '2023-11-03 07:01:06'),
(8, 'prueba', 'prueba10@gmail.com', NULL, '$2y$10$MfQMPCx3fUQ1sjIHjYiJW.yefkWkzkwP9F23WN2RgBKBUCY1a5V8a', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-13 23:04:50', '2023-11-13 23:04:50'),
(9, 'marco', 'marco@gmail.com', NULL, '$2y$10$RSs8qsVDenmfE50DfQl9y.bBH9wVvpdMQV2hts805nKzDqIlLYDKy', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-13 23:07:05', '2023-11-13 23:07:05'),
(10, 'sole', 'sole@gmail.com', NULL, '$2y$10$h5KztHOp.P/no1xB9V30D.41IcxOKbOmgaH8.YvfsFsl.6/gXWuVO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-13 23:10:14', '2023-11-13 23:10:14'),
(11, 'martha', 'martha@gmail.com', NULL, '$2y$10$MdN.59x/d.ELKImU9K8mnuSWG.Qld.UpNfzVf/.1T8JQ0COUKu4o6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-13 23:12:11', '2023-11-13 23:12:11'),
(12, 'profe3', 'profe3@gmail.com', NULL, '$2y$10$wygzvgCSAJO6.jpnEd/fIuTACEJKlegYxz0m.Q0Sqg7JdxMbLFjxS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-13 23:50:57', '2023-11-13 23:50:57'),
(13, 'ernesto', 'ernestosolanoballena@hotmail.com', NULL, '$2y$10$1y46sWJkj3E7/6ou/17MuuC6nfATpaLvgz5wvLpqIT04mx30GgMfq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-19 22:46:26', '2023-11-20 00:22:01'),
(14, 'pruebaaaaa', 'pruebaaaaaa@gmail.com', NULL, '$2y$10$kXyfkT9MXtWAT1LefLJuIexMYSfJLMvJRUu34oGYTaGIrtgBWuQAS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-20 03:42:07', '2023-11-20 03:42:07'),
(15, 'asdas', 'asdaasdas@gmail.com', NULL, '$2y$10$Z4PCIt6WWw4MxUCXJg0k8eYZwr9I6RodmgeZ0hZlG7R/ndsE0CdJG', NULL, NULL, NULL, NULL, NULL, NULL, '2023-11-20 03:49:29', '2023-11-20 03:49:29');

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
-- Indexes for table `asignaciones_curso`
--
ALTER TABLE `asignaciones_curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignaciones_curso_alumno_id_foreign` (`alumno_id`),
  ADD KEY `asignaciones_curso_curso_id_foreign` (`curso_id`);

--
-- Indexes for table `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asistencias_alumno_id_foreign` (`alumno_id`);

--
-- Indexes for table `conducta`
--
ALTER TABLE `conducta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conducta_alumno_id_foreign` (`alumno_id`),
  ADD KEY `conducta_profesor_id_foreign` (`profesor_id`);

--
-- Indexes for table `conductas`
--
ALTER TABLE `conductas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conductas_alumno_id_foreign` (`alumno_id`),
  ADD KEY `conductas_profesor_id_foreign` (`profesor_id`);

--
-- Indexes for table `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cursos_profesor_id_foreign` (`profesor_id`);

--
-- Indexes for table `curso_profesor`
--
ALTER TABLE `curso_profesor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_profesor_curso_id_foreign` (`curso_id`),
  ADD KEY `curso_profesor_profesor_id_foreign` (`profesor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `justificaciones`
--
ALTER TABLE `justificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `justificaciones_alumno_id_foreign` (`alumno_id`),
  ADD KEY `justificaciones_profesor_id_foreign` (`profesor_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_alumno_id_foreign` (`alumno_id`),
  ADD KEY `notas_curso_id_foreign` (`curso_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `profesores_dni_unique` (`dni`),
  ADD UNIQUE KEY `profesores_email_unique` (`email`),
  ADD UNIQUE KEY `profesores_telefono_unique` (`telefono`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `asignaciones_curso`
--
ALTER TABLE `asignaciones_curso`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `conducta`
--
ALTER TABLE `conducta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `conductas`
--
ALTER TABLE `conductas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `curso_profesor`
--
ALTER TABLE `curso_profesor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `justificaciones`
--
ALTER TABLE `justificaciones`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profesores`
--
ALTER TABLE `profesores`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `asignaciones_curso`
--
ALTER TABLE `asignaciones_curso`
  ADD CONSTRAINT `asignaciones_curso_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `asignaciones_curso_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`);

--
-- Constraints for table `conducta`
--
ALTER TABLE `conducta`
  ADD CONSTRAINT `conducta_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conducta_profesor_id_foreign` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `conductas`
--
ALTER TABLE `conductas`
  ADD CONSTRAINT `conductas_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `conductas_profesor_id_foreign` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_profesor_id_foreign` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`);

--
-- Constraints for table `curso_profesor`
--
ALTER TABLE `curso_profesor`
  ADD CONSTRAINT `curso_profesor_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `curso_profesor_profesor_id_foreign` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`);

--
-- Constraints for table `justificaciones`
--
ALTER TABLE `justificaciones`
  ADD CONSTRAINT `justificaciones_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `justificaciones_profesor_id_foreign` FOREIGN KEY (`profesor_id`) REFERENCES `profesores` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
