-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2022 at 10:11 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpi_mgx_dbfields`
--
CREATE DATABASE IF NOT EXISTS `tpi_mgx_dbfields` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tpi_mgx_dbfields`;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
CREATE TABLE IF NOT EXISTS `fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `width` varchar(3) NOT NULL,
  `length` varchar(3) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `id_towns` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fields_towns_FK` (`id_towns`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `width`, `length`, `comment`, `id_towns`) VALUES
(20, 'Stade Berlin', '90', '120', 'salut', 5),
(21, 'Stade Barcelonoe', '90', '120', '', 6),
(22, 'Stade Madrid', '90', '120', '', 7),
(23, 'Stade Porto', '120', '90', '', 5),
(24, 'Stade PSG', '90', '120', '', 11),
(25, 'Stade Marseille', '90', '120', '', 21),
(26, 'Stade Lyon', '90', '120', '', 20),
(27, 'Stade Liverpool', '90', '120', '', 9),
(28, 'Stade Milan', '90', '120', '', 10),
(30, 'Stade Manchester', '90', '120', '', 13),
(31, 'Stade Lisbonne', '90', '120', '', 14),
(32, 'Stade Rome', '90', '120', '', 17),
(33, 'Stade Wolfsburg', '90', '120', '', NULL),
(35, 'Stade Turin', '90', '120', '', 8),
(36, 'Stade Dortmund', '90', '120', '', 15);
-- --------------------------------------------------------

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `idLocalTeam` int(11) DEFAULT NULL,
  `idVisitorTeam` tinyint(4) NOT NULL,
  `id_fields` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `games_teams_FK` (`idLocalTeam`),
  KEY `games_fields0_FK` (`id_fields`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `games` (`id`, `date`, `startTime`, `endTime`, `idLocalTeam`, `idVisitorTeam`, `id_fields`) VALUES
(1, '2022-05-04', '10:35:00', '11:35:00', 8, 3, 21),
(2, '2022-02-02', '08:22:00', '10:22:00', 5, 4, 20),
(3, '2022-02-02', '14:22:00', '16:22:00', 5, 4, 20);


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Information` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `Information`, `date`, `title`) VALUES
(10, 'Favoris de la finale, les Reds sont portés par une marée rouge qui se soucie moins de trouver un billet que de voir leur équipe triompher. Les joueurs, qui ne peuvent que faire aussi bien que ceux qui les ont devancés, ressentent cette responsabilité', '2022-05-25', 'Pour Liverpool, un immense soutien populaire et une énorme pression'),
(11, 'Le gardien belge du Real Madrid a atteint sa plénitude cette saison et porté son équipe jusqu’en finale de Ligue des champions, ce samedi contre Liverpool au Stade de France, en travaillant sur de petits détails tactiques avec le Genevois Thierry Barnerat', '2022-05-25', 'Thibaut Courtois, infiniment grand dans l’infiniment petit'),
(15, 'Les Reds, qui disputent leur troisième finale en cinq ans, nourrissent une relation spéciale avec la Coupe d’Europe au point d’être le club anglais le plus titré, devant Manchester United', '2022-05-29', 'Liverpool et l’Europe, une histoire d’amour qui ne s’arrête jamais'),
(16, 'Le syndicat Fifpro représentant les joueurs de football professionnels du monde entier demande une «réforme urgente» des calendriers sportifs. Les matches s\'enchaînent et mettent la pression sur les corps et les têtes des athlètes', '2022-05-29', '«Nous sommes des athlètes, pas des machines»: les footballeurs dénoncent des cadences infernales'),
(17, 'L’équipe de Suisse disputera quatre matchs de prestige en onze jours début juin, dont deux à Genève contre l’Espagne et le Portugal. La liste des joueurs convoqués démontre l’ouverture d’esprit du sélectionneur à tous les types de profil', '2022-05-29', 'A six mois de la Coupe du monde, Murat Yakin n’oublie personne');;
-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `id_users` int(11) DEFAULT NULL,
  `id_towns` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teams_users_FK` (`id_users`),
  KEY `teams_towns0_FK` (`id_towns`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `id_users`, `id_towns`) VALUES
(4, 'Liverpool', 42, 9),
(5, 'FC Barcelone', 1, 6),
(6, 'Real Madrid', NULL, 7),
(7, 'Juventus', NULL, 8),
(8, 'Atletico Madrid', NULL, 7),
(9, 'Séville FC', NULL, 18),
(10, 'VfL Wolfburg', NULL, 19),
(11, 'Olympique de Marseille', NULL, 21),
(12, 'Olympique de Lyon', NULL, 20),
(13, 'Paris Saint-Germain', NULL, 11),
(14, 'FC Porto', NULL, 16),
(15, 'Borussia Dortmund', NULL, 15),
(16, 'Juventus', NULL, 8),
(17, 'Manchester United', NULL, 13),
(18, 'Manchester City', NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `towns`
--

DROP TABLE IF EXISTS `towns`;
CREATE TABLE IF NOT EXISTS `towns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `towns`
--

INSERT INTO `towns` (`id`, `name`) VALUES
(5, 'Berlin'),
(6, 'Barcelone'),
(7, 'Madrid'),
(8, 'Turin'),
(9, 'Liverpool'),
(10, 'Milan'),
(11, 'Paris'),
(13, 'Manchester'),
(14, 'Lisbonne'),
(15, 'Dortmund'),
(16, 'Porto'),
(17, 'Rome'),
(18, 'Séville'),
(19, 'Wolfsburg'),
(20, 'Lyon'),
(21, 'Marseille');
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `surname` varchar(40) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `pseudo` varchar(40) NOT NULL,
  `phoneNumber` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `userActivated` tinyint(1) NOT NULL,
  `adminActivated` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `surname`, `firstname`, `pseudo`, `phoneNumber`, `email`, `password`, `admin`, `userActivated`, `adminActivated`) VALUES
(1, 'Mathias', 'Mathias', 'Mathias', 'Mathias', 'Mathias', '1234', 1, 1, 1),
(17, 'Messi', 'Lionel', 'Messi', '078000000', 'messi@messi.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(18, 'Ronaldo', 'Cristiano', 'Ronaldo', '0780000000', 'Ronaldo@Ronaldo.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(19, 'Modrić', 'Luka', 'Modrić', '0780000000', 'Modrić@Modrić.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(20, 'Izecson dos Santos Leite', 'Ricardo', ' Kaká', '0780000000', 'Kaká@Kaká.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(21, 'Cannavaro', 'Fabio', 'Cannavaro', '0780000000', 'Cannavaro@Cannavaro.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(22, 'de Assis Moreira', 'Ronaldo', 'Ronaldinho', '078000000', 'Ronaldo@Ronaldo.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(23, 'Chevtchenko', 'Andriy', 'Chevtchenko', '0780000000', 'Chevtchenko@Chevtchenko.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(24, 'Nedvěd', 'Pavel', 'Nedvěd', '0780000000', 'Nedvěd@Nedvěd.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(25, 'Luís Nazário de Lima', 'Ronaldo', 'Ronaldo', '0780000000', 'Ronaldo@Ronaldo.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(26, 'Andriy', 'Chevtchenko', 'Chevtchenko', '0780000000', 'Chevtchenko@Chevtchenko.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(27, 'Owen', 'Michael', 'Owen', '0780000000', 'Owen@Owen.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(28, 'Figo', 'Luís', 'Figo', '0780000000', 'Figo@Figo.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(29, 'Vítor Borba Ferreira', 'Rivaldo', 'Rivaldo', '0780000000', 'Rivaldo@Rivaldo.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(30, 'Zidane', ' Zinédine', 'Zidane', '0780000000', 'Zidane@Zidane.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(31, 'Sammer', 'Mathias', 'Sammer', '0780000000', 'Sammer@Sammer.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(32, 'Weah', 'George ', 'Weah', '0780000000', 'Weah@Weah.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(33, 'Stoichkov', 'Hristo', 'Stoichkov', '0780000000', 'Stoichkov@Stoichkov.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(34, 'Baggio', 'Roberto', 'Baggio', '0780000000', 'Baggio@Baggio.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(35, 'van Basten', 'Marco', 'van Basten', '0780000000', 'Basten@Basten.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(36, 'Papin', 'Jean-Pierre', 'Papin', '0780000000', 'Papin@Papin.com', '$2y$10$X2GQvelxhtkDm8oEsmuerO4bFbaRPV9JL5jqYBIIeDScajAfB9Gg6', 0, 1, 1),
(38, '', '', '', '', 'thierry@henry.com', '', 0, 0, 1),
(42, '', '', 'Jean', '', '', '1234', 1, 1, 1);


--
-- Constraints for dumped tables
--

--
-- Constraints for table `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `fields_towns_FK` FOREIGN KEY (`id_towns`) REFERENCES `towns` (`id`);

--
-- Constraints for table `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_fields0_FK` FOREIGN KEY (`id_fields`) REFERENCES `fields` (`id`),
  ADD CONSTRAINT `games_teams_FK` FOREIGN KEY (`idLocalTeam`) REFERENCES `teams` (`id`);

--
-- Constraints for table `teams`
--
ALTER TABLE `teams`
  ADD CONSTRAINT `teams_towns0_FK` FOREIGN KEY (`id_towns`) REFERENCES `towns` (`id`),
  ADD CONSTRAINT `teams_users_FK` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
