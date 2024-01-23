-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 23, 2024 at 08:58 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `system_io`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kierowcy`
--

CREATE TABLE `kierowcy` (
  `id_kierowcy` int(255) NOT NULL,
  `imię` varchar(999) NOT NULL,
  `nazwisko` varchar(999) NOT NULL,
  `rejestracja_pojazdu` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kierowcy`
--

INSERT INTO `kierowcy` (`id_kierowcy`, `imię`, `nazwisko`, `rejestracja_pojazdu`) VALUES
(1, 'Bartosz', 'Baraniak', '123457'),
(4, 'Kuba', 'Kurcz', 'KUB055'),
(5, 'Sylwester', 'Małomiasteczkowy', 'SYL MAŁ'),
(7, 'Imienin', 'Nazwiskowski', '09123 KL');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `miejsca`
--

CREATE TABLE `miejsca` (
  `id_miejsca` int(255) NOT NULL,
  `nazwa` varchar(999) NOT NULL,
  `państwo` varchar(999) NOT NULL,
  `miejscowość` varchar(999) NOT NULL,
  `ulica` varchar(999) NOT NULL,
  `nr_domu` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `miejsca`
--

INSERT INTO `miejsca` (`id_miejsca`, `nazwa`, `państwo`, `miejscowość`, `ulica`, `nr_domu`) VALUES
(1, 'Firma Transportowa', 'Polska', 'Warszawa', 'Uliczna', 13),
(4, 'Hussenburgessen', 'Niemcy', 'Berlin', 'Strassumstrasse', 2),
(5, 'BaguqteCRossoine', 'Francja', 'Paryż', 'Aiflaaleje', 5),
(14, 'LaNouraHasa', 'Hiszpania', 'Madryt', 'Mamastrita', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przystanki`
--

CREATE TABLE `przystanki` (
  `id_przystanku` int(255) NOT NULL,
  `rodzaj` varchar(999) DEFAULT NULL,
  `id_miejsca` int(255) DEFAULT NULL,
  `id_trasy` int(255) DEFAULT NULL,
  `notatki` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `przystanki`
--

INSERT INTO `przystanki` (`id_przystanku`, `rodzaj`, `id_miejsca`, `id_trasy`, `notatki`) VALUES
(3, 'Punkt startowy', 1, 1, '8.00 cośtam'),
(4, 'Załadunek towaru', 1, 1, 'zebrać dokumenty i blABLABLA'),
(10, 'GHG', 4, 3, 'dddddd'),
(36, 'Początkowy ', 4, 5, 'dddd'),
(39, '5', 5, 5, '5'),
(40, 'd', 1, 6, 'dferfwefer w'),
(46, '2224', 1, 1, ''),
(50, 'LaCasitaThePapaja', 14, 1, '');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `trasy`
--

CREATE TABLE `trasy` (
  `id_trasy` int(255) NOT NULL,
  `stan_zaawansowania` enum('planowana','w trakcie','ukończona') NOT NULL,
  `stan_rozliczenia` enum('do rozliczenia','rozliczona') NOT NULL,
  `id_kierowcy` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trasy`
--

INSERT INTO `trasy` (`id_trasy`, `stan_zaawansowania`, `stan_rozliczenia`, `id_kierowcy`) VALUES
(1, 'planowana', 'rozliczona', 5),
(2, 'w trakcie', 'do rozliczenia', 4),
(3, 'ukończona', 'do rozliczenia', 1),
(5, 'ukończona', 'rozliczona', 4),
(6, 'w trakcie', 'rozliczona', 1),
(7, 'w trakcie', 'do rozliczenia', 4);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kierowcy`
--
ALTER TABLE `kierowcy`
  ADD PRIMARY KEY (`id_kierowcy`);

--
-- Indeksy dla tabeli `miejsca`
--
ALTER TABLE `miejsca`
  ADD PRIMARY KEY (`id_miejsca`);

--
-- Indeksy dla tabeli `przystanki`
--
ALTER TABLE `przystanki`
  ADD PRIMARY KEY (`id_przystanku`),
  ADD KEY `id_miejsca` (`id_miejsca`),
  ADD KEY `id_trasy` (`id_trasy`);

--
-- Indeksy dla tabeli `trasy`
--
ALTER TABLE `trasy`
  ADD PRIMARY KEY (`id_trasy`),
  ADD KEY `id_kierowcy` (`id_kierowcy`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kierowcy`
--
ALTER TABLE `kierowcy`
  MODIFY `id_kierowcy` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `miejsca`
--
ALTER TABLE `miejsca`
  MODIFY `id_miejsca` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `przystanki`
--
ALTER TABLE `przystanki`
  MODIFY `id_przystanku` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `trasy`
--
ALTER TABLE `trasy`
  MODIFY `id_trasy` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `przystanki`
--
ALTER TABLE `przystanki`
  ADD CONSTRAINT `przystanki_ibfk_1` FOREIGN KEY (`id_miejsca`) REFERENCES `miejsca` (`id_miejsca`),
  ADD CONSTRAINT `przystanki_ibfk_2` FOREIGN KEY (`id_trasy`) REFERENCES `trasy` (`id_trasy`);

--
-- Constraints for table `trasy`
--
ALTER TABLE `trasy`
  ADD CONSTRAINT `trasy_ibfk_1` FOREIGN KEY (`id_kierowcy`) REFERENCES `kierowcy` (`id_kierowcy`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
