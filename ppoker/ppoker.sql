-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 10. Dez 2020 um 19:16
-- Server-Version: 10.1.37-MariaDB
-- PHP-Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ppoker`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `benutzer`
--

CREATE TABLE `benutzer` (
  `Reg-Datum` date NOT NULL,
  `Passwort` text NOT NULL,
  `ID` int(11) NOT NULL,
  `Vorname` text NOT NULL,
  `Nachname` text NOT NULL,
  `Mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `benutzer`
--

INSERT INTO `benutzer` (`Reg-Datum`, `Passwort`, `ID`, `Vorname`, `Nachname`, `Mail`) VALUES
('2020-12-10', 'passwort', 24, 'John', 'Doe', 'ElegantSelbstloserPanda@tonne.to');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `einladung`
--

CREATE TABLE `einladung` (
  `Sender` int(11) NOT NULL,
  `Empfaenger` int(11) NOT NULL,
  `Spiel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `einladung`
--

INSERT INTO `einladung` (`Sender`, `Empfaenger`, `Spiel`) VALUES
(24, 24, 11);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `nimmtteil`
--

CREATE TABLE `nimmtteil` (
  `Benutzer` int(11) NOT NULL,
  `Planungsspiel` int(11) NOT NULL,
  `Datum` date NOT NULL,
  `Karte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `nimmtteil`
--

INSERT INTO `nimmtteil` (`Benutzer`, `Planungsspiel`, `Datum`, `Karte`) VALUES
(24, 11, '2020-12-10', 80);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `planungsspiel`
--

CREATE TABLE `planungsspiel` (
  `Beschreibung` text NOT NULL,
  `Einrichtungsdatum` date NOT NULL,
  `Taskname` text NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `planungsspiel`
--

INSERT INTO `planungsspiel` (`Beschreibung`, `Einrichtungsdatum`, `Taskname`, `ID`) VALUES
('Wir wollen Weltfrieden. MÃ¶glichst schnell.', '2020-12-10', 'Weltfrieden', 11);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `einladung`
--
ALTER TABLE `einladung`
  ADD PRIMARY KEY (`Sender`,`Empfaenger`,`Spiel`);

--
-- Indizes für die Tabelle `planungsspiel`
--
ALTER TABLE `planungsspiel`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `benutzer`
--
ALTER TABLE `benutzer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT für Tabelle `planungsspiel`
--
ALTER TABLE `planungsspiel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
