-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Lut 2022, 19:43
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `test2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `isActive` enum('true','false') NOT NULL,
  `age` int(11) NOT NULL,
  `first_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `last_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `cars`
--

INSERT INTO `cars` (`id`, `isActive`, `age`, `first_name`, `last_name`) VALUES
(1, 'true', 12, 'Adam', 'Nowak'),
(2, 'false', 32, 'Piotr', 'Zieliński'),
(3, 'true', 41, 'Karol', 'Kowalski'),
(4, 'false', 17, 'Stanisław', 'Pawłoski'),
(5, 'true', 40, 'Adam', 'Garncarek'),
(8, 'true', 15, 'Stanisław', 'Pawłoski'),
(10, 'false', 33, 'Piotr', 'Zieliński');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `numer_nadwozia` varchar(12) NOT NULL,
  `imie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `nazwisko_wlasciciela` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `model` varchar(12) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `marka` varchar(12) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `rocznik` int(11) NOT NULL,
  `cena` int(11) NOT NULL,
  `kolor` varchar(12) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `wyposazenie` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `samochody`
--

INSERT INTO `samochody` (`numer_nadwozia`, `imie`, `nazwisko_wlasciciela`, `model`, `marka`, `rocznik`, `cena`, `kolor`, `wyposazenie`) VALUES
('1213765', 'NIe', 'Kowalski', 'zx7', 'mazda', 2010, 40000, '#ff0000', 'ABS, TURBOTURBINA'),
('12334', 'Hałasz', 'Nowak', 'Seicento', 'Fiat', 1999, 2990, '#808040', 'skóra'),
('12443214', 'Bartrek', 'Niemiec', 'e76', 'bmw', 2004, 432435, '#ffffff', 'supertak'),
('194329', 'Krzysztof', 'Lewandowski', 'audi2', 'a61', 2012, 70500, '#ffff00', 'turbospreżarka'),
('1943431', 'Adam', 'Zieliński', 'a6', 'audi', 2011, 54321, '#004080', 'turbosprezarka'),
('3645645', 'Olek', 'Błaszczykowski', 'astra', 'opel', 2011, 25000, '#008040', 'ABS,TURBOTURBINA'),
('4457457', 'Kaarol', 'Duda', 'punto', 'fiat', 2013, 9000, '#800000', 'abs'),
('654326', 'Aleks', 'Wałęsa', 'corsa', 'opel', 1996, 43900, '#0080c0', 'kornel'),
('667777', 'Adam', 'Małysz', 'xs', 'jaguar', 2020, 6611, '#ff8080', 'Fotele z plastiku');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`numer_nadwozia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
