-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 25. Jul 2020 um 16:56
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_gloriaprantner_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_gloriaprantner_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_gloriaprantner_petadoption`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animal`
--

CREATE TABLE `animal` (
  `animal_id` int(11) NOT NULL,
  `animal_name` varchar(25) NOT NULL,
  `animal_age` int(11) NOT NULL,
  `animal_description` varchar(500) NOT NULL,
  `animal_type` enum('small','large') NOT NULL,
  `animal_hobbies` varchar(250) NOT NULL,
  `animal_img` varchar(250) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animal`
--

INSERT INTO `animal` (`animal_id`, `animal_name`, `animal_age`, `animal_description`, `animal_type`, `animal_hobbies`, `animal_img`, `location_id`) VALUES
(1, 'Wookie', 8, 'sooo fluffy', 'large', 'sleeping', 'https://images.unsplash.com/photo-1574144611937-0df059b5ef3e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1300&q=80', 1),
(2, 'Mini', 2, 'White, fluffy, sweet', 'small', 'sleeeping', 'https://images.unsplash.com/photo-1561948955-570b270e7c36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1118&q=80', 1),
(6, 'test3', 0, 'bla', 'large', 'bla', '', 1),
(10, 'asfds', 12, 'afaga', 'large', 'sadfs', 'https://images.unsplash.com/photo-1543852786-1cf6624b9987?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80', 1),
(11, 'Wookie2', 8, 'sooo fluffy', 'large', 'sleeping', 'https://images.unsplash.com/photo-1574144611937-0df059b5ef3e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1300&q=80', 1),
(12, 'Wookie3', 8, 'sooo fluffy', 'large', 'sleeping', 'https://images.unsplash.com/photo-1574144611937-0df059b5ef3e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1300&q=80', 1),
(13, 'Wookie4', 8, 'sooo fluffy', 'large', 'sleeping', 'https://images.unsplash.com/photo-1574144611937-0df059b5ef3e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1300&q=80', 1),
(14, 'Mini2', 2, 'White, fluffy, sweet', 'small', 'sleeeping', 'https://images.unsplash.com/photo-1561948955-570b270e7c36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1118&q=80', 1),
(15, 'Mini3', 2, 'White, fluffy, sweet', 'small', 'sleeeping', 'https://images.unsplash.com/photo-1561948955-570b270e7c36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1118&q=80', 1),
(16, 'Mini4', 2, 'White, fluffy, sweet', 'small', 'sleeeping', 'https://images.unsplash.com/photo-1561948955-570b270e7c36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1118&q=80', 1),
(17, 'Mini5', 2, 'White, fluffy, sweet', 'small', 'sleeeping', 'https://images.unsplash.com/photo-1561948955-570b270e7c36?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1118&q=80', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_city` varchar(50) NOT NULL,
  `location_zip` int(11) NOT NULL,
  `location_address` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `location`
--

INSERT INTO `location` (`location_id`, `location_city`, `location_zip`, `location_address`) VALUES
(1, 'Vienna', 1220, 'An der alten Donau');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_status` enum('user','admin','superadmin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_status`) VALUES
(4, 'admin1', 'admin1@admin.com', 'ffe501c223fd93d5e2302148546ae441', 'admin'),
(5, 'user2', 'user2@user.com', 'ffe501c223fd93d5e2302148546ae441', 'user'),
(7, 'superadmin', 'superadmin@admin.com', 'ffe501c223fd93d5e2302148546ae441', 'superadmin'),
(9, 'user3', 'user3@user.com', 'ffe501c223fd93d5e2302148546ae441', 'user'),
(11, 'user4', 'user4@user.com', 'ffe501c223fd93d5e2302148546ae441', 'user'),
(12, 'user5', 'user5@user.com', 'ffe501c223fd93d5e2302148546ae441', 'user'),
(13, 'user6', 'user6@user.com', 'ffe501c223fd93d5e2302148546ae441', 'user'),
(14, 'userisuser', 'user7@user.com', 'ffe501c223fd93d5e2302148546ae441', 'user');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`animal_id`),
  ADD KEY `location_id` (`location_id`);

--
-- Indizes für die Tabelle `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animal`
--
ALTER TABLE `animal`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT für Tabelle `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `location` (`location_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
