-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Mar 2019, 19:54
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `magazyn`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `czesci_motoryzacyjne`
--

CREATE TABLE `czesci_motoryzacyjne` (
  `id_czesci` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL,
  `nazwa` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `czesci_motoryzacyjne`
--

INSERT INTO `czesci_motoryzacyjne` (`id_czesci`, `id_kategorii`, `nazwa`, `opis`) VALUES
(1, 1, 'Tarcza hamulcowa', 'do hamowania'),
(2, 1, 'Klocki hamulcowe', 'do hamowania'),
(3, 1, 'Akcesoria', 'akcesoria do układu hamulcowego'),
(4, 2, 'Filtr Oleju', 'do filtrowania oleju'),
(5, 2, 'Filtr powietrza', 'do filtrowania powietrza'),
(6, 2, 'Filtr powietrza kabinowy', 'do filtrowania powietrza w kabinie'),
(7, 3, 'Amortyzatory', 'do amortyzowania'),
(8, 3, 'Mocowanie amortyzatorów', 'do mocowania amortyzatorów'),
(9, 5, 'Akumulator', 'element elektryczny'),
(10, 5, 'Akcelerator', 'element elektryczny'),
(11, 4, 'Olej silnikowy', 'olej do silnika'),
(12, 4, 'Płyn do spryskiwaczy', 'płyn do spryskiwaczy (zimnowy)');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie_czesci`
--

CREATE TABLE `kategorie_czesci` (
  `id_kategorii` int(11) NOT NULL,
  `nazwa` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategorie_czesci`
--

INSERT INTO `kategorie_czesci` (`id_kategorii`, `nazwa`) VALUES
(1, 'uklad hamulcowy'),
(2, 'filtry'),
(3, 'amortyzacja'),
(4, 'oleje i plyny'),
(5, 'elektryka');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `czesci_motoryzacyjne`
--
ALTER TABLE `czesci_motoryzacyjne`
  ADD PRIMARY KEY (`id_czesci`),
  ADD KEY `id_kategorii` (`id_kategorii`);

--
-- Indeksy dla tabeli `kategorie_czesci`
--
ALTER TABLE `kategorie_czesci`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `czesci_motoryzacyjne`
--
ALTER TABLE `czesci_motoryzacyjne`
  MODIFY `id_czesci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `kategorie_czesci`
--
ALTER TABLE `kategorie_czesci`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `czesci_motoryzacyjne`
--
ALTER TABLE `czesci_motoryzacyjne`
  ADD CONSTRAINT `czesci_motoryzacyjne_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategorie_czesci` (`id_kategorii`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
