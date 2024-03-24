-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 24 Mars 2024 à 03:01
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `taski`
--

-- --------------------------------------------------------

--
-- Structure de la table `contenus`
--

CREATE TABLE IF NOT EXISTS `contenus` (
  `username` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL,
  `checki` int(1) NOT NULL,
  PRIMARY KEY (`title`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contenus`
--

INSERT INTO `contenus` (`username`, `title`, `text`, `checki`) VALUES
('ray', 'azerty', 'zzzzzzzzzzz', 0),
('ray', 'ytreza', 'zzzzzzzzzzz', 1),
('ray', '', '', 0),
('mohamed', 'n1', 'ivujdv', 1),
('dd', 'New 1', 'hgigihbihiyigi', 1);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `profile_image` varchar(255) DEFAULT 'default.jpg',
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`username`, `email`, `profile_image`, `password`) VALUES
('mohamed', 'abc@mail.exp', 'compressi.PNG', 'ab4f63f9ac65152575886860dde480a1'),
('saif', 'abc@mail.exp', '1.PNG', 'ab4f63f9ac65152575886860dde480a1'),
('ray', 'abc@mail.exp', '1.PNG', 'ab4f63f9ac65152575886860dde480a1'),
('dd', 'abc@mail.exp', 'logoo1.PNG', 'e10adc3949ba59abbe56e057f20f883e'),
('mariem', 'abc@mail.exp', '1.PNG', 'cdaa6716746fb685734abde87f1b08ad');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
