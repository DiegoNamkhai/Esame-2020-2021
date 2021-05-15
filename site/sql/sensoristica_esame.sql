-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 15, 2021 alle 09:20
-- Versione del server: 10.4.18-MariaDB
-- Versione PHP: 8.0.5

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
-- Struttura della tabella `campionamento`
--

CREATE TABLE `campionamento` (
  `postazione` int(11) NOT NULL,
  `IDcamp` int(11) NOT NULL,
  `dato` varchar(32) NOT NULL,
  `valore` double NOT NULL,
  `unita` varchar(16) NOT NULL,
  `dataRil` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `campionamento`
--

INSERT INTO `campionamento` (`postazione`, `IDcamp`, `dato`, `valore`, `unita`, `dataRil`) VALUES
(8, 2, 'CO2', 440, 'PPM', '2021-05-14 20:22:37'),
(8, 3, 'CO2', 440, 'PPM', '2021-05-14 22:33:31');

-- --------------------------------------------------------

--
-- Struttura della tabella `intervento`
--

CREATE TABLE `intervento` (
  `utenteInt` varchar(64) NOT NULL,
  `IDpostazioneInt` int(11) NOT NULL,
  `dataInt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `postazione`
--

CREATE TABLE `postazione` (
  `IDp` int(11) NOT NULL,
  `superU` varchar(64) NOT NULL,
  `lngt` float NOT NULL,
  `lttd` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `postazione`
--

INSERT INTO `postazione` (`IDp`, `superU`, `lngt`, `lttd`) VALUES
(8, 'marco.bianchi@enel.it', 43.7633, 11.2835);

-- --------------------------------------------------------

--
-- Struttura della tabella `supervisione`
--

CREATE TABLE `supervisione` (
  `utente` varchar(64) NOT NULL,
  `IDpostazione` int(11) NOT NULL,
  `dataIni` date NOT NULL,
  `dataFin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `cognome` varchar(32) NOT NULL,
  `ruolo` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`email`, `password`, `nome`, `cognome`, `ruolo`) VALUES
('diego.namkhai@gmail.com', '$2y$10$P3H2DLdOjSja2YiKjoSK1eRnwty68VN6GmMYo.Ewndka9rAkJ5FQ.', 'Diego', 'Namkhai', 'cittadino'),
('marco.bianchi@enel.it', '$2y$10$wnKscUXHXoj92cAmmzfh9uGeC6mjpn.h6EzTxWitRn2JWUg2ttbWS', 'Marco', 'Bianchi', 'Manutentore');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `campionamento`
--
ALTER TABLE `campionamento`
  ADD PRIMARY KEY (`IDcamp`,`postazione`),
  ADD KEY `postazione` (`postazione`);

--
-- Indici per le tabelle `intervento`
--
ALTER TABLE `intervento`
  ADD PRIMARY KEY (`utenteInt`,`IDpostazioneInt`);

--
-- Indici per le tabelle `postazione`
--
ALTER TABLE `postazione`
  ADD PRIMARY KEY (`IDp`,`superU`),
  ADD KEY `superU` (`superU`);

--
-- Indici per le tabelle `supervisione`
--
ALTER TABLE `supervisione`
  ADD PRIMARY KEY (`utente`,`IDpostazione`),
  ADD KEY `IDpostazione` (`IDpostazione`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`email`) USING BTREE;

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `campionamento`
--
ALTER TABLE `campionamento`
  MODIFY `IDcamp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `postazione`
--
ALTER TABLE `postazione`
  MODIFY `IDp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `campionamento`
--
ALTER TABLE `campionamento`
  ADD CONSTRAINT `campionamento_ibfk_1` FOREIGN KEY (`postazione`) REFERENCES `postazione` (`IDp`);

--
-- Limiti per la tabella `intervento`
--
ALTER TABLE `intervento`
  ADD CONSTRAINT `intervento_ibfk_1` FOREIGN KEY (`utenteInt`) REFERENCES `utente` (`email`);

--
-- Limiti per la tabella `postazione`
--
ALTER TABLE `postazione`
  ADD CONSTRAINT `postazione_ibfk_1` FOREIGN KEY (`superU`) REFERENCES `utente` (`email`);

--
-- Limiti per la tabella `supervisione`
--
ALTER TABLE `supervisione`
  ADD CONSTRAINT `supervisione_ibfk_2` FOREIGN KEY (`IDpostazione`) REFERENCES `postazione` (`IDp`),
  ADD CONSTRAINT `supervisione_ibfk_3` FOREIGN KEY (`utente`) REFERENCES `utente` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
