-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Creato il: Nov 23, 2016 alle 23:01
-- Versione del server: 10.1.13-MariaDB
-- Versione PHP: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwm`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `drink`
--

CREATE TABLE `drink` (
  `id_drink` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `size` double NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `plate`
--

CREATE TABLE `plate` (
  `id_plate` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'not-available.png',
  `available` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `plate`
--

INSERT INTO `plate` (`id_plate`, `name`, `description`, `price`, `image`, `available`) VALUES
(1, 'Primo piatto', 'Descrizione primo piatto', 1, '../images/not-available.png', 1),
(2, 'Secondo piatto', 'Descrizione secondo piatto', 2, '../images/not-available.png', 1),
(3, 'Terzo piatto', 'Descrizione terzo piatto', 3, '../images/miss-italia-2-1000x600.jpg', 0),
(4, 'Quarto Piatto', 'Scrivi una descrizione sul quarto prodotto', 4, '../images/not-available.png', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(50) NOT NULL,
  `telephone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id_user`, `name`, `surname`, `email`, `password`, `telephone`) VALUES
(1, 'Antonio', 'Orlando', 'test@test.it', '05a671c66aefea124cc08b76ea6d30bb', '3285422585'),
(2, 'Alfredo', 'Forte', 'fo.alfredo@gmail.com', '5c2bf15004e661d7b7c9394617143d07', '3256687863');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`id_drink`);

--
-- Indici per le tabelle `plate`
--
ALTER TABLE `plate`
  ADD PRIMARY KEY (`id_plate`),
  ADD UNIQUE KEY `id_plate` (`id_plate`);

--
-- Indici per le tabelle `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `id` (`id_user`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `drink`
--
ALTER TABLE `drink`
  MODIFY `id_drink` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `plate`
--
ALTER TABLE `plate`
  MODIFY `id_plate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT per la tabella `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
