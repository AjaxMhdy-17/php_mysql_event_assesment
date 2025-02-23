-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 30, 2025 at 07:01 PM
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
-- Database: `event_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `seat_limit` int(11) DEFAULT NULL,
  `start_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `user_id`, `topic`, `name`, `description`, `seat_limit`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(1, 2, 'soft skills', 'discussion about soft skills ', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Facilis a quo, vero facere architecto eaque hic quaerat reiciendis vitae. Nobis totam eius vitae architecto aspernatur quas. Enim quod molestias suscipit?\r\n', 2, '2025-01-30 15:00', '2025-01-30 18:00', '2025-01-30 15:48:50', '2025-01-30 15:48:50'),
(3, 4, 'technology', 'ted talk about technology', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia adipisci rem iure quos doloremque debitis consectetur earum nemo sequi illo, consequatur vero at eaque tempora accusantium aut, culpa, impedit officiis?\r\n', 2, ' 17:00', ' 20:00', '2025-01-30 15:51:46', '2025-01-30 15:52:14'),
(4, 5, 'remote job ', 'find a remote job ', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laboriosam libero odit sint quae. Nostrum labore veritatis adipisci, dicta rem iste ad dolorum exercitationem sint expedita eaque eligendi pariatur enim hic?\r\n', 3, '2025-01-30 15:00', '2025-01-30 18:00', '2025-01-30 15:53:20', '2025-01-30 15:53:20'),
(5, 1, 'programming ', 'php talking ', '            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem tempora aut amet esse soluta voluptatum quia sed officiis cupiditate dolor. Maxime nulla iste beatae architecto quibusdam perferendis ut praesentium similique.\r\n', 3, '2025-01-30 15:00', '2025-01-30 18:00', '2025-01-30 16:22:19', '2025-01-30 16:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `join_record`
--

CREATE TABLE `join_record` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `event_id` int(11) DEFAULT NULL,
  `approve` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `join_record`
--

INSERT INTO `join_record` (`id`, `user_id`, `event_id`, `approve`, `created_at`) VALUES
(10, 3, 3, 1, '2025-01-30 17:19:13'),
(11, 7, 3, 1, '2025-01-30 17:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','event_maker','attendee') NOT NULL DEFAULT 'attendee',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$t4R5k.E7LCeVttavDsX15.KEsnVdXkOYzV91fa0eQVXaOceOvlPty', 'admin', '2025-01-30 15:22:45'),
(2, 'event_maker_1', 'event1@gmail.com', '$2y$10$mDW7nSC.x4AOKpXn0PkpPeDQ1jengWhk/Cm4Wsb8z6aZrNn136xN6', 'event_maker', '2025-01-30 15:31:07'),
(3, 'attendee_1', 'attendee1@gmail.com', '$2y$10$tGyD4m0fMVRAlIKEfVagpOb/v5ajDX4gOi4r3RRibw6FdoCraDmSm', 'attendee', '2025-01-30 15:33:22'),
(4, 'event_maker_2', 'event2@gmail.com', '$2y$10$q0J.bSEKi9rW.e3UTEKg5.Qdej8Z1YTnlbGBBF4ojA35Sw0BfNHNe', 'event_maker', '2025-01-30 15:38:26'),
(5, 'event_maker_3', 'event3@gmail.com', '$2y$10$HcCByHonFtTdxZNMQ4h20.KL/KNmRYULtlJ01NXV1PsLPx1d0T4w2', 'event_maker', '2025-01-30 15:38:44'),
(6, 'attendee2', 'attendee2@gmail.com', '$2y$10$Gn2eUaf43MTliuQLlKvidunlaVPZ4ztI0kzkzOzWDt0Ftj.HhLpEm', 'attendee', '2025-01-30 15:39:04'),
(7, 'attendee3', 'attendee3@gmail.com', '$2y$10$pnIf5hHejTJzhY0HT/JfUeSAcAXYYj9ZWNcUm.IEQP7hU.Q3kR95.', 'attendee', '2025-01-30 15:39:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_topic` (`topic`);

--
-- Indexes for table `join_record`
--
ALTER TABLE `join_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_user_id` (`user_id`),
  ADD KEY `idx_event_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idx_role` (`role`),
  ADD KEY `idx_name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `join_record`
--
ALTER TABLE `join_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `join_record`
--
ALTER TABLE `join_record`
  ADD CONSTRAINT `join_record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `join_record_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
