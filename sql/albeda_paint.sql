-- phpMyAdmin SQL Dump
-- version 4.5.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Gegenereerd op: 21 mrt 2016 om 12:05
-- Serverversie: 5.7.10
-- PHP-versie: 5.6.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `albeda_paint`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `accounts`
--

CREATE TABLE `accounts` (
  `accounts_id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `accounts`
--

INSERT INTO `accounts` (`accounts_id`, `username`, `password`) VALUES
(1, 'admin', 'easyphp'),
(2, 'keesgoed', 'kees1111');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `addresses`
--

CREATE TABLE `addresses` (
  `addresses_id` int(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `country` varchar(25) NOT NULL,
  `postal_code` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `addresses`
--

INSERT INTO `addresses` (`addresses_id`, `address`, `city`, `country`, `postal_code`) VALUES
(1, 'Stolwijkstraat', 'Rotterdam', 'Nederland', '3079 DN');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `customers`
--

CREATE TABLE `customers` (
  `customers_id` int(10) NOT NULL,
  `company` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `customers`
--

INSERT INTO `customers` (`customers_id`, `company`, `firstname`, `lastname`, `email`, `phone`) VALUES
(1, 'PARTICULIER', 'Test', 'Test123', 'test123@test.com', '1234567890');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(10) NOT NULL,
  `offer_date` date NOT NULL,
  `offer_version` varchar(5) NOT NULL,
  `offer_description` varchar(2000) NOT NULL,
  `offer_template` varchar(3) NOT NULL,
  `offer_subtotal_price` int(15) NOT NULL,
  `offer_total_price` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`addresses_id`);

--
-- Indexen voor tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Indexen voor tabel `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `addresses`
--
ALTER TABLE `addresses`
  MODIFY `addresses_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customers_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT voor een tabel `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(10) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
