-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jun 03, 2026 at 05:48 PM
-- Server version: 8.0.45
-- PHP Version: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `catalogo`
--

-- --------------------------------------------------------

--
-- Table structure for table `fabricante`
--

CREATE TABLE `fabricante` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fabricante`
--

INSERT INTO `fabricante` (`id`, `nombre`) VALUES
(1, 'blacjhduhduhud'),
(2, 'Apple'),
(3, 'Sony'),
(5, 'Windows');

-- --------------------------------------------------------

--
-- Table structure for table `producto`
--

CREATE TABLE `producto` (
  `id` int UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `precio` double NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_fabricante` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `precio`, `imagen`, `id_fabricante`) VALUES
(3, 'Smart TV 55', 'Televisor 4K con tecnología QLED', 900, 'tv_samsung.jpg', 5),
(4, 'Auriculares WH-1000XM6', 'Cancelación de ruido líder en la industria', 200, 'sony_wh.jpg', 3),
(6, 'Portátil - HP OmniBook 3 ', 'Simplifica tu día con el portátil HP OmniBook 3 Laptop 16-by0016ns de 16 pulgadas. Disfruta de un rendimiento fluido con el procesador AMD Ryzen™ 5-40 , un espacioso monitor de 16 pulgadas y una batería que dura todo el día, diseñado para hacer frente a cualquier tarea, desde navegar por Internet hasta realizar transmisiones. Equipado con varios puertos que te ayudan a mantenerte conectado y hacer más cosas, dondequiera que te lleve el día.', 599.45, 'HP-omnibook.jpg', 1),
(7, 'iPhonee 15', 'El último modelo de Apple con el potente chip A16 Bionic. Cuenta con la innovadora Dynamic Island que te muestra alertas en tiempo real, una cámara principal de 48 Mpx para fotos en súper alta resolución y la nueva conexión USB-C. Diseño resistente de aluminio y vidrio tintado en masa con pantalla Super Retina XDR de 6.1 pulgadas.', 600.12, 'iphone15.jpg', 2),
(10, 'auricolares', 'hjbhuvh jcbjuHVUHvi kiue8ue', 500, 'sony_wh.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido1` varchar(100) NOT NULL,
  `apellido2` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido1`, `apellido2`, `email`, `login`, `password`) VALUES
(1, 'Abdel', 'Elmach', '', 'abdel101@gmail.com', 'admin', 'd12rn0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fabricante` (`id_fabricante`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_fabricante`) REFERENCES `fabricante` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
