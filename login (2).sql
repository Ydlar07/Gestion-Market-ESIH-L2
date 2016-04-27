-- phpMyAdmin SQL Dump
-- version 4.4.3
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 05 Juin 2015 à 10:56
-- Version du serveur :  5.6.24
-- Version de PHP :  5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `login`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `codeArticle` mediumint(9) NOT NULL,
  `referenceArticle` varchar(20) NOT NULL,
  `designationArticle` varchar(20) NOT NULL,
  `nomArticle` varchar(30) NOT NULL,
  `prixArticle` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`codeArticle`, `referenceArticle`, `designationArticle`, `nomArticle`, `prixArticle`) VALUES
(1234567, 'article1234567', 'papierRAM', 'papierA4', 7000),
(1234568, 'article1234568', 'portemine05', 'portemine', 1250);

-- --------------------------------------------------------

--
-- Structure de la table `caissier`
--

CREATE TABLE IF NOT EXISTS `caissier` (
  `idCaissier` mediumint(9) NOT NULL,
  `passwordCaissier` varchar(20) NOT NULL,
  `nomCaissier` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `caissier`
--

INSERT INTO `caissier` (`idCaissier`, `passwordCaissier`, `nomCaissier`) VALUES
(111111, 'caissier111111', 'Ahmed'),
(111112, 'caissier111112', 'Bachir'),
(111113, 'caissier111113', 'Salah'),
(111114, 'caissier111114', 'Khaled'),
(111115, 'caissier111115', 'Ali');

-- --------------------------------------------------------

--
-- Structure de la table `lot`
--

CREATE TABLE IF NOT EXISTS `lot` (
  `codeLot` mediumint(9) NOT NULL,
  `referenceLot` varchar(20) NOT NULL,
  `designationLot` varchar(20) NOT NULL,
  `nomLot` varchar(30) NOT NULL,
  `prixLot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `lot`
--

INSERT INTO `lot` (`codeLot`, `referenceLot`, `designationLot`, `nomLot`, `prixLot`) VALUES
(123456, 'lot1234567', 'stylotbic', 'stylot', 5000),
(123457, 'lot1234568', 'stylotpointfine', 'stylot', 6000);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `code_produit` int(12) NOT NULL,
  `libelle_produit` varchar(30) NOT NULL,
  `code_type` int(12) NOT NULL,
  `prix_unite` double NOT NULL,
  `qte_en_stock` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1145 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`code_produit`, `libelle_produit`, `code_type`, `prix_unite`, `qte_en_stock`) VALUES
(1003, 'king-kola', 11, 25, 295),
(1004, 'atomik', 11, 40, 900),
(1005, 'toro', 11, 40, 60),
(1006, 'ragaman', 11, 35, 178),
(1007, 'couronne', 11, 25, 113),
(1008, 'fanta', 11, 25, 22),
(1009, 'tampico', 11, 20, 408),
(1013, 'yahoot', 10, 30, 33),
(1014, 'lait_a_gogo', 10, 25, 3),
(1015, 'sportshake', 10, 75, 15),
(1016, 'ensure', 10, 100, 20),
(1017, 'shake_bongu', 10, 60, 200),
(1018, 'big_chake', 10, 75, 40),
(1019, 'lait_alaska', 10, 20, 800),
(1020, 'lait_bongu', 10, 20, 900),
(1021, 'soja', 10, 125, 35),
(1022, 'fromage_la_vache_qui_rit', 10, 80, 600),
(1023, 'chaudiere', 12, 430, 17),
(1024, 'assiette', 12, 150, 100),
(1025, 'girlandes', 13, 120, 554),
(1026, 'biblot', 13, 250, 29),
(1027, 'encadrement', 13, 275, 45),
(1028, 'pot_fleur', 13, 900, 14),
(1029, 'cerpilliere', 15, 45, 600),
(1030, 'balai', 15, 40, 13),
(1031, 'mistoline', 15, 100, 2999),
(1032, 'clorox', 15, 50, 390),
(1033, 'fabouloso', 15, 35, 396),
(1034, 'pinodor', 15, 60, 150),
(1035, 'couchettes', 16, 35, 495),
(1036, 'biberon', 16, 70, 368),
(1037, 'trotinette', 16, 1000, 159),
(1038, 'tetine', 16, 45, 555),
(1039, 'berceau', 16, 10400, 25),
(1040, 'tete_cabri', 17, 400, 4),
(1041, 'pied_de_porc', 17, 600, 12),
(1042, 'filet_de_boeuf', 17, 700, 45),
(1043, 'cote_de_porc', 17, 930, 39),
(1044, 'poulet', 17, 500, 290),
(1045, 'poupee', 18, 240, 899),
(1046, 'domino', 18, 50, 290),
(1047, 'jeux_cartes', 18, 75, 500),
(1048, 'echec', 18, 200, 300),
(1049, 'spalding_ball', 18, 900, 520),
(1050, 'mangues', 19, 15, 1300),
(1051, 'oranges', 19, 10, 600),
(1052, 'pomme', 19, 35, 800),
(1053, 'poire', 19, 50, 700),
(1054, 'raisin', 19, 105, 1197),
(1055, 'fraise', 19, 75, 300),
(1056, 'carotte', 19, 20, 300),
(1057, 'epinard', 19, 40, 2000),
(1058, 'bannanes', 19, 25, 4500),
(1059, 'laitue', 19, 5, 400),
(1060, 'lesse', 20, 190, 300),
(1061, 'eat_dogs', 20, 1200, 13),
(1062, 'plumes', 21, 10, 1),
(1063, 'crayons', 21, 5, 1300),
(1064, 'cahiers', 21, 15, 4000),
(1065, 'classeur', 21, 45, 322),
(1066, 'boite_geometrique', 21, 25, 2455),
(1070, 'gatorate', 11, 75, 110),
(1098, 'cuisse poul', 17, 65, 33),
(1099, 'climatiseur', 11, 1250, 6),
(1100, 'wer', 11, 234, 650),
(1101, 'jus', 11, 12, 333),
(1102, 'juna', 11, 5, 27),
(1103, 'red', 11, 25, 150),
(1130, 'jeans', 11, 500, 100),
(1135, 'sprit', 11, 25, 12),
(1136, 'toro', 11, 40, 88),
(1138, 'ta ', 11, 6, 1500),
(1140, 'googoo', 11, 50, 1290),
(1141, 'fiesta', 11, 25, 25),
(1142, 'fiesta', 11, 20, 25),
(1143, 'chikolac', 11, 30, 2600),
(1144, 'V8 splach', 11, 16, 450);

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `idStock` int(11) NOT NULL,
  `stockU` int(11) NOT NULL,
  `stockLot` int(11) NOT NULL,
  `chiffreArticle` double NOT NULL,
  `chiffreLot` double NOT NULL,
  `chiffreAffaire` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `stock`
--

INSERT INTO `stock` (`idStock`, `stockU`, `stockLot`, `chiffreArticle`, `chiffreLot`, `chiffreAffaire`) VALUES
(123456, 1000, 50, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_produit`
--

CREATE TABLE IF NOT EXISTS `type_produit` (
  `code_type` int(12) NOT NULL,
  `libelle_type` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_produit`
--

INSERT INTO `type_produit` (`code_type`, `libelle_type`) VALUES
(10, 'produits laitiers'),
(11, 'boissons'),
(12, 'vaisselles'),
(13, 'decoration'),
(14, 'boulangerie'),
(15, 'nettoyage'),
(16, 'pour bebe'),
(17, 'viande'),
(18, 'jouet'),
(19, 'fruits et legumes'),
(20, 'pour annimaux'),
(21, 'pour l''ecole'),
(22, 'autre');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL,
  `username` varchar(555) NOT NULL,
  `mdp` varchar(555) NOT NULL,
  `sexe` varchar(11) NOT NULL,
  `mail` varchar(555) NOT NULL,
  `role` varchar(555) NOT NULL,
  `adresse` varchar(55) NOT NULL,
  `naissance` date NOT NULL,
  `telephone` varchar(555) NOT NULL,
  `nom` varchar(555) NOT NULL,
  `prenom` varchar(555) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `mdp`, `sexe`, `mail`, `role`, `adresse`, `naissance`, `telephone`, `nom`, `prenom`) VALUES
(24, 'Alhdo', '1111', 'homme', 'castro@gmail.com', 'CAISSIER', 'delmas', '2014-04-09', '2314-9630', 'Valbrune', 'Claudel'),
(25, 'harsain', '0000', 'homme', 'raldy@gmail.com', 'ADMIN', 'delmas', '1990-10-16', '3679-4550', 'Saint-Preux', 'Hans'),
(26, 'ikee', '1111', 'homme', 'mike@edu.com', 'SUPERVISEUR', 'delmas', '2013-06-19', '4710-9633', 'Morin', 'Mike'),
(31, 'jimmy', '2222', '', 'ralflex1@hot.com', 'SUPERVISEUR', 'delmas 29', '1990-12-06', '3018-3232', 'Hans', 'Morin'),
(34, 'oooooo', 'qwerty', 'homme', 'ooo@gg.com', 'CAISSIER', 'nazon', '2015-06-25', '33333333', 'ooo', 'ooo'),
(37, 'jkli', 'qwerty12', 'homme', 'jkl@ghg.com', 'CAISSIER', 'nazon', '2015-06-10', '33333333', 'jkl', 'jkl'),
(38, 'hh', 'qw12', 'feminin', 'je@df.com', 'SUPERVISEUR', 'nazon', '2015-06-16', '33333333', 'j', 'je');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

CREATE TABLE IF NOT EXISTS `vente` (
  `Code_produit` int(11) NOT NULL,
  `Quantite` int(11) NOT NULL,
  `Date_de_vente` date NOT NULL,
  `Nom_utilisateur` varchar(10) NOT NULL,
  `Prix_total` int(255) NOT NULL,
  `code_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `vente`
--

INSERT INTO `vente` (`Code_produit`, `Quantite`, `Date_de_vente`, `Nom_utilisateur`, `Prix_total`, `code_type`) VALUES
(1054, 3, '2015-06-05', 'ikee', 315, 19),
(1005, 12, '2015-06-05', 'harsain', 480, 11),
(1008, 3, '2015-06-05', 'harsain', 75, 11),
(1023, 23, '2015-06-05', 'harsain', 9890, 12),
(1043, 4, '2015-06-05', 'harsain', 3720, 17),
(1008, 2, '2015-06-05', 'harsain', 50, 11),
(1003, 10, '2015-06-05', 'harsain', 250, 11),
(1005, 15, '2015-06-05', 'harsain', 600, 11),
(1003, 15, '2015-06-05', 'Alhdo', 375, 11),
(1003, 15, '2015-06-05', 'Alhdo', 375, 11);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`codeArticle`);

--
-- Index pour la table `caissier`
--
ALTER TABLE `caissier`
  ADD PRIMARY KEY (`idCaissier`);

--
-- Index pour la table `lot`
--
ALTER TABLE `lot`
  ADD PRIMARY KEY (`codeLot`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`code_produit`,`code_type`),
  ADD KEY `code_type` (`code_type`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idStock`);

--
-- Index pour la table `type_produit`
--
ALTER TABLE `type_produit`
  ADD PRIMARY KEY (`code_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `code_produit` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1145;
--
-- AUTO_INCREMENT pour la table `type_produit`
--
ALTER TABLE `type_produit`
  MODIFY `code_type` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
