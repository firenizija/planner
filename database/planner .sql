-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 31 Sie 2019, 01:38
-- Wersja serwera: 10.3.16-MariaDB
-- Wersja PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `planner`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `module` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `modules`
--

INSERT INTO `modules` (`id`, `module`) VALUES
(1, 'Organizer'),
(2, 'Timetable'),
(3, 'in progress');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plans`
--

CREATE TABLE `plans` (
  `id` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `groupName` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `color` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `type` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `day` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `month` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `hour` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `minute` varchar(5) COLLATE utf8_polish_ci NOT NULL,
  `year` varchar(5) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `plans`
--

INSERT INTO `plans` (`id`, `idusers`, `name`, `groupName`, `color`, `type`, `day`, `month`, `hour`, `minute`, `year`) VALUES
(87, 64, 'Test z PHP nazwa', 'Test z PHP grupa', '#00ff40', 'Test z PHP typ', '01', '08', '12', '12', '2019'),
(88, 64, 'Test z PHP nazwa', 'Test z PHP grupa', '#400040', 'Tam&lt;&gt;\'\'', '17', '08', '13', '44', '2019'),
(89, 66, 'Przyjedzie dyziek', '', '#80ff00', 'Super', '26', '08', '12', '00', '2019');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `setmodules`
--

CREATE TABLE `setmodules` (
  `id` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idmodule` int(11) NOT NULL,
  `position` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `setmodules`
--

INSERT INTO `setmodules` (`id`, `iduser`, `idmodule`, `position`) VALUES
(40, 66, 1, '0'),
(41, 66, 2, '1'),
(42, 71, 1, '0'),
(43, 71, 2, '1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `rejestracja` int(10) NOT NULL,
  `logowanie` int(10) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `session` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `email`, `rejestracja`, `logowanie`, `ip`, `session`) VALUES
(71, 'piotrrrrrr', '0f9d54dfc27075af40586bc83313ac46', '', 1567205254, 1567205292, '::1', ''),
(70, 'piotrrrr', '0f9d54dfc27075af40586bc83313ac46', '', 1567205036, 0, '::1', ''),
(69, 'piotre', '0f9d54dfc27075af40586bc83313ac46', '', 1567204883, 0, '::1', ''),
(68, 'piotrrr', '0f9d54dfc27075af40586bc83313ac46', '', 1567204790, 0, '::1', ''),
(67, '123', '0f9d54dfc27075af40586bc83313ac46', '', 1567204548, 0, '::1', ''),
(66, 'piotrr', '0f9d54dfc27075af40586bc83313ac46', 'asd@wp.pl', 1566593467, 1567106241, '::1', '88c7b08f'),
(65, 'Firek', '0f9d54dfc27075af40586bc83313ac46', 'kata6966@gmail.com', 1566335745, 1566335773, '192.168.8.171', '363b28c9'),
(64, 'piotr', '0f9d54dfc27075af40586bc83313ac46', '123@wp.pl', 1566249062, 1566981648, '::1', '');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `setmodules`
--
ALTER TABLE `setmodules`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `plans`
--
ALTER TABLE `plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT dla tabeli `setmodules`
--
ALTER TABLE `setmodules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
