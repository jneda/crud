-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 15 déc. 2022 à 16:58
-- Version du serveur : 5.7.36
-- Version de PHP : 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_formation`
--

DROP TABLE IF EXISTS `t_formation`;
CREATE TABLE IF NOT EXISTS `t_formation` (
  `idFormation` int(11) NOT NULL AUTO_INCREMENT,
  `titreFormation` varchar(255) NOT NULL,
  `acronyme` varchar(60) NOT NULL,
  PRIMARY KEY (`idFormation`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_formation`
--

INSERT INTO `t_formation` (`idFormation`, `titreFormation`, `acronyme`) VALUES
(1, 'Développeur Web et Web Mobile', 'DWWM'),
(2, 'Concepteur Développeur d\'Applications', 'CDA');

-- --------------------------------------------------------

--
-- Structure de la table `t_stagiaire`
--

DROP TABLE IF EXISTS `t_stagiaire`;
CREATE TABLE IF NOT EXISTS `t_stagiaire` (
  `idStagiaire` int(11) NOT NULL AUTO_INCREMENT,
  `nomStagiaire` varchar(100) NOT NULL,
  `prenomStagiaire` varchar(100) NOT NULL,
  `dateNaisStagiaire` date NOT NULL,
  `civiliteStagiaire` varchar(15) NOT NULL,
  `adressStagiaire` varchar(255) NOT NULL,
  `idVille` int(11) NOT NULL,
  `mailStagiaire` varchar(20) NOT NULL,
  `idformation` int(11) NOT NULL,
  PRIMARY KEY (`idStagiaire`),
  KEY `idVille_fk` (`idVille`),
  KEY `idFormation` (`idformation`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_stagiaire`
--

INSERT INTO `t_stagiaire` (`idStagiaire`, `nomStagiaire`, `prenomStagiaire`, `dateNaisStagiaire`, `civiliteStagiaire`, `adressStagiaire`, `idVille`, `mailStagiaire`, `idformation`) VALUES
(1, 'Houlala', 'Anthony', '2000-09-06', 'M.', '24 rue des Ferrailleurs', 1, 'toto77@houlala.org', 2),
(2, 'Totov', 'Toto Totovitch', '1989-01-01', 'M.', '42 impasse des Petits Chiens', 2, 'toto@totallylegit.ru', 1),
(9, 'De Vil', 'Satanas', '1988-09-06', 'M.', '666 avenue du Désespoir', 1, 'satanas@dtc.lol', 1),
(10, 'Démonte-Pneu', 'Marceline', '2001-08-13', 'Mme', '321 place Immense', 2, 'marceline@gg.fr', 2),
(11, 'Chouquette', 'Louison-Adélaïde', '1999-03-21', 'Mme', '9 rue Haute', 1, 'loulou@youpi.fr', 1),
(12, 'Capsule', 'Barbara', '1997-08-14', 'Mme', '77 rue de la Chance', 2, 'barb@destroy.com', 2),
(13, 'Camus', 'Serge-Henri', '1945-01-02', 'M.', '2 place de l\'Univers', 1, 'riri@camus.org', 1),
(14, 'Sandale', 'Frédérique', '1988-04-16', 'Mme', '36 quai des Éboueurs', 1, 'fred@nologo.net', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_ville`
--

DROP TABLE IF EXISTS `t_ville`;
CREATE TABLE IF NOT EXISTS `t_ville` (
  `idVille` int(11) NOT NULL AUTO_INCREMENT,
  `nomVille` varchar(100) NOT NULL,
  `cpVille` int(11) NOT NULL,
  PRIMARY KEY (`idVille`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_ville`
--

INSERT INTO `t_ville` (`idVille`, `nomVille`, `cpVille`) VALUES
(1, 'Melun', 77000),
(2, 'Montcucq', 46201);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_stagiaire`
--
ALTER TABLE `t_stagiaire`
  ADD CONSTRAINT `idFormation` FOREIGN KEY (`idformation`) REFERENCES `t_formation` (`idFormation`),
  ADD CONSTRAINT `idVille_fk` FOREIGN KEY (`idVille`) REFERENCES `t_ville` (`idVille`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
