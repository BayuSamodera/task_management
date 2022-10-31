-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Okt 2022 pada 12.11
-- Versi Server: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_management`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `finish_date` date NOT NULL,
  `status` enum('New','On Progress','Finish','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tasks`
--

INSERT INTO `tasks` (`id`, `category_id`, `title`, `description`, `start_date`, `finish_date`, `status`) VALUES
(1, 1, 'Assignment HTML', 'Create Crud using PHP Native', '2022-10-28', '2022-10-30', 'New'),
(3, 3, 'Assignment PHP', 'Create Crud using PHP Native', '2022-10-28', '2022-10-31', 'New'),
(5, 9, 'Assignment PHP', 'Create Crud using PHP Native', '2022-10-28', '2022-10-31', 'New');

-- --------------------------------------------------------

--
-- Struktur dari tabel `task_categories`
--

CREATE TABLE `task_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `task_categories`
--

INSERT INTO `task_categories` (`id`, `name`) VALUES
(1, 'Armando'),
(3, 'Bayu S'),
(4, 'Akifah Nailah'),
(5, 'Alayya Akifah Gavaputri'),
(6, 'Callista Balqis Maharani'),
(7, 'Cherika Nayyara Nazifa'),
(8, 'Fadiyah Jalilah'),
(9, 'Ghina Qalbul Karimah'),
(10, 'Halwah Inayah Raqiqah'),
(11, 'Kanza Auliya'),
(12, 'Mia Wulandari'),
(15, 'Bayu Sam'),
(16, 'Nia Ramadhani'),
(17, 'Nia Ramadhani');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_category_id` (`category_id`);

--
-- Indexes for table `task_categories`
--
ALTER TABLE `task_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `task_categories`
--
ALTER TABLE `task_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `fk_id_category_id` FOREIGN KEY (`category_id`) REFERENCES `task_categories` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
