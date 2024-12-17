-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 04:24 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `members_goot`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `psword` varchar(65) NOT NULL,
  `registration_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_level` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `psword`, `registration_date`, `user_level`) VALUES
(2, 'Jed', 'Cruz', 'jcruz@gmail.com', '$2y$10$i3zTLd0Fme8xrFeSdI/DxeXWQxORKuwMsFu0bp7qlFNYcJBCYv7HK', '2024-10-16 10:14:45', 0),
(3, 'Timothy', 'Fetesio', 'olfu@gmail.com', '$2y$10$2MyVGoYdFKZSsIkk.gicP.trAspMnipxr.9hAj.BsOPjMuDpgK.ly', '2024-10-16 10:21:32', 0),
(4, 'J', 'Fajarillo', 'witterz@gmail.com', '$2y$10$6n2AerjtmMfemuKkez9lvOR64BeWstjBQrD2eq07o4FA6Zn3r/usq', '2024-10-16 11:43:45', 0),
(5, 'Mark', 'Cadiz', 'markcadiz@gmail.com', '$2y$10$3./dFRr1VqIjdZuPKgeoVOQmK4CszbeSsxqn2IQXySt1VuBbneTP2', '2024-10-16 12:06:24', 0),
(6, 'Don', 'Catli', 'pred@gmail.com', '$2y$10$CPosV35aZn2lJdeuWLnxYOuXIn0Iq3.UE0TfQLKcnWjyrIQWklDXS', '2024-10-16 12:19:26', 0),
(8, 'Josh', 'Sindayen', 'josh@gmail.com', '$2y$10$/hgEfr2flyW8hdgEl6D9yOrUVnfw9l07IJp36pSddMXLLwFestg66', '2024-10-30 12:06:10', 0),
(9, 'Miguel', 'Cosino', 'caseoh@gmail.com', '$2y$10$fvsxW/z6jlxGMzHRThxEIOIVp3ih6APAekQ/u.GntWefgbJfscox6', '2024-10-30 12:06:26', 0),
(10, 'Angela', 'Salitorno', 'mau@gmail.com', '$2y$10$cp.6kD73mqKMuvAIdOA8wuf2cZHwEb7rJ8oDkqWMdO4P.DX3SGrxC', '2024-10-30 12:07:07', 0),
(11, 'NJ', 'Dillo', 'swagapino@gmail.com', '$2y$10$wG8ocHJEU/LHzo6kkWXdhenmz9JhxtFH4gcb1DR1tYT1mbUuT8WlO', '2024-10-30 12:07:49', 0),
(12, 'Joshlee', 'Empresse', 'babycakes@gmail.com', '$2y$10$REmTYqP8BuNqKxU32oPKIeHi722/cVyZWEHuNsdPIhzLTcJK5oWTq', '2024-10-30 12:08:47', 0),
(13, 'Jayne', 'Marin', 'madam12@gmail.com', '$2y$10$2TnvUOb/ZCdpEP9FoyUKmO15LsNjYuKYro.dQgQeffFx/kDxz6LjK', '2024-10-30 12:19:43', 0),
(14, 'Rancel', 'Booc', 'SK@gmail.com', '$2y$10$34C6FaLqi/xuLv1RchV1EeJb7G.o6tBz2ju7Jskt7VqQz/vUD9fX6', '2024-10-30 12:21:14', 0),
(15, 'Admin', 'Doe', 'admin@gmail.com', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', '2024-12-17 19:47:08', 1),
(16, 'New', 'User', 'new@gmail.com', '4d17fcbde3767e77a11f173cd1a1b2a6959b3cc2075d553759528e6be4149475', '2024-12-17 20:13:05', 0),
(17, 'Another', 'One', 'qqq@gmail.com', '2ac9a6746aca543af8dff39894cfe8173afba21eb01c6fae33d52947222855ef', '2024-12-17 22:51:33', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
