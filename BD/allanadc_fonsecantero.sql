-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-08-2024 a las 15:40:14
-- Versión del servidor: 10.6.18-MariaDB-cll-lve-log
-- Versión de PHP: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `allanadc_fonsecantero`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_predefined_routes`
--

CREATE TABLE `sys_predefined_routes` (
  `Id` int(11) NOT NULL,
  `route` varchar(200) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sys_predefined_routes`
--

INSERT INTO `sys_predefined_routes` (`Id`, `route`, `active`) VALUES
(1, 'https://allanad.com/FonseCantero', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_register_users`
--

CREATE TABLE `sys_register_users` (
  `Id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_register` date NOT NULL,
  `hour_register` time NOT NULL,
  `ip_user` varchar(20) NOT NULL,
  `demo` varchar(3) NOT NULL,
  `expiration_date_demo` date NOT NULL,
  `confirm_email` varchar(3) NOT NULL,
  `tokenUser` varchar(255) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sys_register_users`
--

INSERT INTO `sys_register_users` (`Id`, `name`, `last_name`, `email`, `password`, `date_register`, `hour_register`, `ip_user`, `demo`, `expiration_date_demo`, `confirm_email`, `tokenUser`, `active`) VALUES
(47, 'Jesus Betuel', 'Garza Sendejo', 'jesus.betuel@gmail.com', '354b95fc99cf34c24aca448e4893f1885001fa0bca0d666072589b9ab402074ab2a0fbcef9f6a6a4a0d41b1d44ffa0b30ee9dce0bdf17df6bb1f8af1fa17aa88', '2024-08-26', '15:18:53', '187.189.150.139', 'Si', '2024-09-09', 'Si', 'cc8f7b593863d2098f22de007de0ed736f41e8925a4dff5e491a6780380e9d7bb829647fa8b473583859947de3195e87e51233d75f03100c1247f5db5c155c26', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_tasks`
--

CREATE TABLE `sys_tasks` (
  `Id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `user_create` int(11) NOT NULL,
  `date_create` date NOT NULL,
  `hour_create` time NOT NULL,
  `user_modified` int(11) NOT NULL,
  `date_modified` date NOT NULL,
  `hour_modified` time NOT NULL,
  `user_deactivate` int(11) NOT NULL,
  `date_deactivate` date NOT NULL,
  `hour_deactivate` time NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `sys_tasks`
--

INSERT INTO `sys_tasks` (`Id`, `title`, `description`, `status`, `user_create`, `date_create`, `hour_create`, `user_modified`, `date_modified`, `hour_modified`, `user_deactivate`, `date_deactivate`, `hour_deactivate`, `active`) VALUES
(6, 'Prueba 2', 'Prueba 2', 'Completada', 47, '2024-08-26', '15:22:20', 47, '2024-08-26', '15:22:41', 0, '0000-00-00', '00:00:00', 1),
(5, 'Prueba 1', 'Descripcion de Prueba', 'Pendiente', 47, '2024-08-26', '15:20:52', 47, '2024-08-26', '15:22:05', 47, '2024-08-26', '15:22:59', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sys_predefined_routes`
--
ALTER TABLE `sys_predefined_routes`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `route` (`route`,`active`);

--
-- Indices de la tabla `sys_register_users`
--
ALTER TABLE `sys_register_users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `email` (`email`,`password`,`date_register`,`hour_register`,`ip_user`,`expiration_date_demo`,`tokenUser`,`active`);

--
-- Indices de la tabla `sys_tasks`
--
ALTER TABLE `sys_tasks`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `status` (`status`,`user_create`,`date_create`,`user_modified`,`date_modified`,`user_deactivate`,`date_deactivate`,`active`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sys_predefined_routes`
--
ALTER TABLE `sys_predefined_routes`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sys_register_users`
--
ALTER TABLE `sys_register_users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `sys_tasks`
--
ALTER TABLE `sys_tasks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
