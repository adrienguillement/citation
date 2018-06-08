-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2018 at 09:37 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `citation`
--

-- --------------------------------------------------------

--
-- Table structure for table `auteurs`
--

CREATE TABLE IF NOT EXISTS `auteurs` (
  `idauteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL DEFAULT '',
  `prenom` varchar(30) DEFAULT '',
  `siecle` tinyint(2) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`idauteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `auteurs`
--

INSERT INTO `auteurs` (`idauteur`, `nom`, `prenom`, `siecle`, `image`) VALUES
(1, 'Van Damme', 'Jean-Claude', 17, 'oui.jpg'),
(2, 'Norris', 'Chuck', 20, 'chuck-norris.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `citation`
--

CREATE TABLE IF NOT EXISTS `citation` (
  `idcit` int(11) NOT NULL AUTO_INCREMENT,
  `texte` mediumtext NOT NULL,
  `idauteur` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcit`),
  KEY `FK_citation_auteur` (`idauteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `citation`
--

INSERT INTO `citation` (`idcit`, `texte`, `idauteur`) VALUES
(2, 'Chuck Norris fait pleurer les oignons.\r\n', 2),
(3, 'Chuck Norris comprend Jean-Claude Van Damme.\r\n', 1),
(4, 'Chuck Norris joue à la roulette russe avec un chargeur plein.\r\n', 2),
(5, 'Quand Google ne trouve pas quelque chose, il demande à Chuck Norris.\r\n', 2),
(6, 'Chuck Norris est contre les radars automatiques : ça l''éblouit lorsqu''il fait du vélo\r\n', 2),
(7, 'Chuck Norris peut taguer le mur du son.\r\n', 2),
(8, 'Quand la tartine de Chuck Norris tombe, la confiture change de côté.\r\n', 2),
(9, 'A l''école, c''est le professeur qui devait lever la main pour parler a Chuck Norris.\r\n', 2),
(10, 'Chuck Norris a fini son forfait illimité.\r\n', 2),
(11, 'Quand Chuck Norris utilise Windows, il ne plante pas.\r\n', 2),
(12, 'Windows ne demande jamais à Chuck Norris d''envoyer le rapport d''erreur. Bill Gates vient le chercher lui même, avec toutes ses excuses.\r\n', 2),
(13, 'Danette se lève pour Chuck Norris.\r\n', 2),
(14, 'Chuck Norris grave ses CDs avec un compas.\r\n', 2),
(15, 'Un jour Hulk a voulu se battre contre Chuck Norris, depuis il fait de la pub pour du maïs.\r\n', 1),
(16, 'Quand Chuck Norris se présente à un entretien d''embauche, c''est Chuck Norris qui pose les questions.\r\n', 2),
(17, 'Le 9 novembre 1989 Chuck Norris a voulu aller s''approvisionner en Vodka dans Berlin Est. Il a rencontré un mur... la suite appartient à l''Histoire.\r\n', 2),
(18, 'Certains disent : "La violence ne résout rien"\r\nChuck Norris leur répond "C''est que t''as pas tapé assez fort"\r\n', 2),
(19, 'Quand Chuck Norris dit qu''il a inventé les Ricolas, les suisses confirment.\r\n', 2),
(20, 'Chuck Norris décode Canal+ avec les yeux.\r\n', 2),
(21, 'Chuck Norris peut rembobiner un DVD.\r\n', 2),
(22, 'Neil Armstrong est le premier homme à avoir marché sur la Lune. Mais Chuck Norris y était déjà allé courir.\r\n', 2),
(23, 'Si la terre est ronde, c''est pour que Chuck Norris n''aie pas à faire demi-tour lorsqu''il fait son footing.\r\n', 2),
(24, 'Quand Chuck Norris joue au Scrabble, l''Académie Française prend des notes.\r\n', 2),
(25, 'Bill Gates vit dans la terreur permanente du plantage du PC de Chuck Norris.\r\n', 2),
(26, 'Quand Chuck Norris grimpe l''Alpe d''Huez en vélo, il doit freiner dans les virages.\r\n', 2),
(27, 'Quand Chuck Norris s''aperçoit qu''il a sauté de l''avion sans son parachute, il remonte le chercher.\r\n', 2),
(28, 'Lorsque Chuck Norris n''arrive pas à dormir, les moutons lui disent combien ils sont.\r\n', 2),
(29, 'Quand il était bébé, les parents de Chuck Norris venaient dormir dans son lit quand ils avaient peur.\r\n', 2),
(30, 'Chuck Norris peut faire rentrer 3 litres d''eau dans une bouteille d''un litre. En tassant bien.\r\n', 2),
(31, 'Quand Chuck Norris joue à "Qui veut gagner des millions" on lui pose une seule question: "en liquide ou un chèque ?".\r\n', 2),
(32, 'Un jour, Chuck Norris a lancé un javelot pour s''amuser. Amstrong l''a retrouvé en 1969.\r\n', 2),
(33, 'Chuck Norris a déjà vu Derrick faire une cascade.\r\n', 2),
(34, 'Chuck Norris peut cultiver des champs magnétiques.\r\n', 2),
(35, 'Chuck Norris ne prend pas l''avion... Il n''a pas peur, mais c''est plus rapide à pied.\r\n', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citation`
--
ALTER TABLE `citation`
  ADD CONSTRAINT `FK_citation_auteur` FOREIGN KEY (`idauteur`) REFERENCES `auteurs` (`idauteur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
