-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 06 Maj 2022, 12:58
-- Wersja serwera: 10.4.21-MariaDB
-- Wersja PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `todoapp`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_polish_ci NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `czas_wst` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `czas_upt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `todos`
--

INSERT INTO `todos` (`id`, `title`, `content`, `created_by`, `czas_wst`, `czas_upt`) VALUES
(36, 'wesdfarfhserth', 'wtrvqwegty4135ybuijehgd4wfeds6uvcjhr6td5ew4q%FEdthcvre6w54qaesdtybrne56wazERThjyng7654e3dsxzsdfgbn mhujkyftr cdxrgthujytfdcrxsrfghtjnuymk f rryhbweyesybreayasdtxcgestgcqerysv ytvayvhrstyvhetrsvetrsevarhtevrthasverthaveyrtaveyratregvhrvge', 3, '2022-05-05 15:24:58', '2022-05-05 15:24:58'),
(37, 'asfasdfgherhsdtfhjrtjrsjrtyjtyjswyrtjsfgyjrtyfhjgfjhf', 'adsgfqewfayhter', 3, '2022-05-05 15:28:18', '2022-05-05 15:28:18'),
(38, 'wyrewolwerowany', 'asddasdsa', 3, '2022-05-06 12:56:48', '2022-05-06 12:56:48');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`) VALUES
(2, 'asddsa', '$2y$10$DWI2MGDcpiWWe4/H1r1KfertiLhyMxOAnIKaauP7InzObG016dG5G', 'Staraptor09@gmail.com'),
(3, 'kacper111', '$2y$10$iVTPfrTAFM7WDytww8sbHekjhmPNZt72vwoyZXVym32tj7WfGfqG2', 'Staraptor69@gmail.com'),
(4, 'kuba', '$2y$10$reLVB0BkzCEcLipdreXlG.Zd7YkzYBlB89HzD5EaP3CcDACz9SOU.', 'sjdabjksd@gmail.com'),
(5, 'saddsa', '$2y$10$6rm0vegXapdiI0eV9pDJ5uZAZLDgRwfElI66sbjZlRRqOYZMH9rGS', 'asddsa@asddsa.pl'),
(6, 'adam1', '$2y$10$smKImXVmUqpXQc6cP.6NrelX8P/udlc2MXlFAfXYxu4kmrCkJayUO', 'waqsdadsa@dsas.pl'),
(7, 'adam1221', '$2y$10$p5VZDDq6wegYzpYEyjio.ebR/LSLINlpGg/oPL2gIDSOVQus.2pja', 'asddas@saddsa.pl'),
(8, 'sadFsdaf', '$2y$10$TGwfBJ9ig0f7lh/O0aqIge4DXhbKR2/gfOmEQMs6dBCMGfOT4UqO.', 'dsadsa@hmail.com'),
(9, 'asdf', '$2y$10$9t.NWEtptPM3KEBf9WO8ie57XJdjU5WLwwGvMuRz93F96q8Qkp73W', 'asdf@afssdf.cm');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
