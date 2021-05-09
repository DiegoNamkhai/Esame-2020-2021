-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 12:54 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sensoristica_esame`
--

-- --------------------------------------------------------

--
-- Table structure for table `campionamento`
--

CREATE TABLE `campionamento` (
  `postazione` int(11) NOT NULL,
  `IDcamp` int(11) NOT NULL,
  `dato` varchar(32) NOT NULL,
  `valore` double NOT NULL,
  `dataRil` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `intervento`
--

CREATE TABLE `intervento` (
  `utenteInt` varchar(64) NOT NULL,
  `IDpostazioneInt` int(11) NOT NULL,
  `dataInt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `postazione`
--

CREATE TABLE `postazione` (
  `IDp` int(11) NOT NULL,
  `superU` varchar(64) NOT NULL,
  `lngt` float NOT NULL,
  `lttd` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisione`
--

CREATE TABLE `supervisione` (
  `utente` varchar(64) NOT NULL,
  `IDpostazione` int(11) NOT NULL,
  `dataIni` date NOT NULL,
  `dataFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `utente`
--

CREATE TABLE `utente` (
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `cognome` varchar(32) NOT NULL,
  `ruolo` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utente`
--

INSERT INTO `utente` (`email`, `password`, `nome`, `cognome`, `ruolo`) VALUES
('diego.namkhai@gmail.com', '$2y$10$eQLlJzdPpEUs1q6OjwgVxu7PyuDah78fuT1ZwfvCiAMOwAwvTfu9e', 'NAMKHAI', 'DIEGO', 'cittadino');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campionamento`
--
ALTER TABLE `campionamento`
  ADD PRIMARY KEY (`IDcamp`,`postazione`),
  ADD KEY `postazione` (`postazione`);

--
-- Indexes for table `intervento`
--
ALTER TABLE `intervento`
  ADD PRIMARY KEY (`utenteInt`,`IDpostazioneInt`);

--
-- Indexes for table `postazione`
--
ALTER TABLE `postazione`
  ADD PRIMARY KEY (`IDp`,`superU`),
  ADD KEY `superU` (`superU`);

--
-- Indexes for table `supervisione`
--
ALTER TABLE `supervisione`
  ADD PRIMARY KEY (`utente`,`IDpostazione`),
  ADD KEY `IDpostazione` (`IDpostazione`);

--
-- Indexes for table `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campionamento`
--
ALTER TABLE `campionamento`
  MODIFY `IDcamp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postazione`
--
ALTER TABLE `postazione`
  MODIFY `IDp` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campionamento`
--
ALTER TABLE `campionamento`
  ADD CONSTRAINT `campionamento_ibfk_1` FOREIGN KEY (`postazione`) REFERENCES `postazione` (`IDp`);

--
-- Constraints for table `intervento`
--
ALTER TABLE `intervento`
  ADD CONSTRAINT `intervento_ibfk_1` FOREIGN KEY (`utenteInt`) REFERENCES `utente` (`email`);

--
-- Constraints for table `postazione`
--
ALTER TABLE `postazione`
  ADD CONSTRAINT `postazione_ibfk_1` FOREIGN KEY (`superU`) REFERENCES `utente` (`email`);

--
-- Constraints for table `supervisione`
--
ALTER TABLE `supervisione`
  ADD CONSTRAINT `supervisione_ibfk_2` FOREIGN KEY (`IDpostazione`) REFERENCES `postazione` (`IDp`),
  ADD CONSTRAINT `supervisione_ibfk_3` FOREIGN KEY (`utente`) REFERENCES `utente` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
