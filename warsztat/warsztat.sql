-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Maj 2019, 14:57
-- Wersja serwera: 10.1.37-MariaDB
-- Wersja PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `warsztat`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `etaty`
--

CREATE TABLE `etaty` (
  `Id_etatu` int(11) NOT NULL,
  `Nazwa` varchar(100) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `etaty`
--

INSERT INTO `etaty` (`Id_etatu`, `Nazwa`) VALUES
(1, 'cały etat'),
(2, '3/4 etatu'),
(3, 'pól etatu');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `mechanicy`
--

CREATE TABLE `mechanicy` (
  `Id_mechanika` int(11) NOT NULL,
  `Nazwisko` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `Id_etatu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `mechanicy`
--

INSERT INTO `mechanicy` (`Id_mechanika`, `Nazwisko`, `Id_etatu`) VALUES
(1, 'Kowalski', 1),
(2, 'Nowak', 1),
(3, 'Pietruszka', 3),
(4, 'Gruszka', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `naprawy`
--

CREATE TABLE `naprawy` (
  `Id_naprawy` int(11) NOT NULL,
  `Id_pojazdu` int(11) NOT NULL,
  `Id_mechanika` int(11) NOT NULL,
  `Data` date NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Czas_naprawy` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `naprawy`
--

INSERT INTO `naprawy` (`Id_naprawy`, `Id_pojazdu`, `Id_mechanika`, `Data`, `Status`, `Czas_naprawy`) VALUES
(1, 1, 1, '2019-03-10', 1, '2019-03-24'),
(2, 2, 4, '2019-03-20', 0, '2019-04-03'),
(5, 3, 2, '2019-03-17', 1, '2019-03-24'),
(8, 4, 3, '2019-03-28', 0, '2019-04-11'),
(9, 3, 1, '2019-03-06', 0, '2019-03-20'),
(10, 3, 1, '2019-03-06', 0, '2019-03-20');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pojazdy`
--

CREATE TABLE `pojazdy` (
  `Id_pojazdu` int(11) NOT NULL,
  `Numer_rej` varchar(10) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `pojazdy`
--

INSERT INTO `pojazdy` (`Id_pojazdu`, `Numer_rej`) VALUES
(1, 'PO265F8'),
(2, 'DW856G7'),
(3, 'WR85441'),
(4, 'DWR5716');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `etaty`
--
ALTER TABLE `etaty`
  ADD PRIMARY KEY (`Id_etatu`);

--
-- Indeksy dla tabeli `mechanicy`
--
ALTER TABLE `mechanicy`
  ADD PRIMARY KEY (`Id_mechanika`),
  ADD KEY `Id_etatu` (`Id_etatu`);

--
-- Indeksy dla tabeli `naprawy`
--
ALTER TABLE `naprawy`
  ADD PRIMARY KEY (`Id_naprawy`),
  ADD KEY `Id_pojazdu` (`Id_pojazdu`),
  ADD KEY `Id_mechanika` (`Id_mechanika`);

--
-- Indeksy dla tabeli `pojazdy`
--
ALTER TABLE `pojazdy`
  ADD PRIMARY KEY (`Id_pojazdu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `etaty`
--
ALTER TABLE `etaty`
  MODIFY `Id_etatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `mechanicy`
--
ALTER TABLE `mechanicy`
  MODIFY `Id_mechanika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `naprawy`
--
ALTER TABLE `naprawy`
  MODIFY `Id_naprawy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT dla tabeli `pojazdy`
--
ALTER TABLE `pojazdy`
  MODIFY `Id_pojazdu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `mechanicy`
--
ALTER TABLE `mechanicy`
  ADD CONSTRAINT `mechanicy_ibfk_1` FOREIGN KEY (`Id_etatu`) REFERENCES `etaty` (`Id_etatu`);

--
-- Ograniczenia dla tabeli `naprawy`
--
ALTER TABLE `naprawy`
  ADD CONSTRAINT `naprawy_ibfk_1` FOREIGN KEY (`Id_pojazdu`) REFERENCES `pojazdy` (`Id_pojazdu`),
  ADD CONSTRAINT `naprawy_ibfk_2` FOREIGN KEY (`Id_mechanika`) REFERENCES `mechanicy` (`Id_mechanika`),
  ADD CONSTRAINT `naprawy_ibfk_3` FOREIGN KEY (`Id_pojazdu`) REFERENCES `pojazdy` (`Id_pojazdu`),
  ADD CONSTRAINT `naprawy_ibfk_4` FOREIGN KEY (`Id_mechanika`) REFERENCES `mechanicy` (`Id_mechanika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
