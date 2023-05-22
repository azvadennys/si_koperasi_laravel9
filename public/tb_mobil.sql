-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 03:19 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rentalmobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--


--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`id_mobil`, `Merk_Mobil`, `Jenis_Mobil`, `Tahun`, `Warna`, `Harga_Sewa`, `gambar`, `status`) VALUES
('BD 1 A', 'Rolls Royce', 'Rolls Royce Ghost', 2019, 'Black', 45000000, '1673593078toyota-all-new-avanza-2015-tangkapan-layar_169.jpeg', 'Tersedia'),
('BD 10 J', 'Lamborghini', 'Lamborghini Aventado', 2019, 'Yellow', 43000000, '', ''),
('BD 11 K', 'Bentley', 'Bentley Continental', 2019, 'Gold', 25000000, '', ''),
('BD 12 L', 'Bentley', 'Bentley Mulsanne', 2019, 'Grey', 35000000, '', ''),
('BD 13 M', 'Ferrari', 'Ferrari 488 GTB', 2019, 'Red', 38000000, '', ''),
('BD 14 N', 'Ferrari', 'Ferrari 812 Superfas', 2019, 'Red', 42000000, '', ''),
('BD 16 P', 'Aston Martin', 'Aston Martin Vantage', 2019, 'Lime Green', 40000000, '', ''),
('BD 17 Q', 'Aston Martin', 'Aston Martin Rapide ', 2019, 'Lightning Silver', 45000000, '', ''),
('BD 18 R', 'Lexus', 'Lexus ES', 2019, 'Sonic Quartz', 20000000, '', ''),
('BD 19 S', 'Lexus ', 'Lexus LC', 2019, 'Deep Blue', 25000000, '', ''),
('BD 2 B', 'Rolls Royce', 'Rolls Royce Phantom', 2019, 'Blue', 65000000, '', ''),
('BD 20 T', 'Porsche', 'Porsche 718', 2019, 'White', 28000000, '', ''),
('BD 21 U', 'Porsche', 'Porsche Panamera', 2019, 'Black', 32000000, '', ''),
('BD 3 C', 'Rolls Royce', 'Rolls Royce Wraith', 2019, 'Black Badge', 60000000, '', ''),
('BD 4 D', 'BMW', 'BMW X1', 2021, 'Alpine White', 13000000, '', ''),
('BD 5 E', 'BMW', 'BMW X2', 2019, 'Yellow', 12000000, '', ''),
('BD 6 F', 'BMW', 'BMW M3', 2021, 'Green', 14000000, '', ''),
('BD 7 G', 'Mercedes-Bens', 'Mercedes-Bens A-Clas', 2019, 'Jupiter Red', 12500000, '', ''),
('BD 8 H', 'Mercedes-Bens', 'Mercedes-Benz GLA-Cl', 2019, 'Mountain Grey', 13000000, '', ''),
('BD 9 I', 'Lamborghini', 'Lamborghini Huracan', 2019, 'Orange', 45000000, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_mobil`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
