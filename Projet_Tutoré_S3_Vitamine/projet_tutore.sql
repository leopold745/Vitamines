-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 18, 2021 at 01:58 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projet_tutore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorieproduit`
--

CREATE TABLE `categorieproduit` (
  `id_Cat` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `variete` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorieproduit`
--

INSERT INTO `categorieproduit` (`id_Cat`, `type`, `variete`) VALUES
(1, 'Fruit', 'Noyau'),
(2, 'Fruit', 'Pepin'),
(3, 'Fruit', 'Rouge'),
(4, 'Fruit', 'Agrume'),
(5, 'Fruit', 'Coque'),
(6, 'Fruit', 'Exotique'),
(7, 'Legume', 'Fleur'),
(8, 'Legume', 'Feuille'),
(9, 'Legume', 'Fruit'),
(10, 'Legume', 'Bulbe'),
(11, 'Legume', 'Tubercule'),
(12, 'Legume', 'Graine'),
(13, 'Legume', 'Racine'),
(14, 'Legume', 'Tige');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_Client` int(11) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `codePostale` varchar(50) NOT NULL,
  `localite` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_Commande` int(11) NOT NULL,
  `dateCommande` date NOT NULL,
  `hebdomadaire` tinyint(1) NOT NULL,
  `dateLivraison` date NOT NULL,
  `typeLivraison` varchar(50) NOT NULL,
  `typePaiement` varchar(50) NOT NULL,
  `id_Client` int(11) NOT NULL,
  `id_Panier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

CREATE TABLE `groupe` (
  `id_Groupe` int(11) NOT NULL,
  `id_Client` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `codePostale` varchar(50) NOT NULL,
  `localite` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inclu`
--

CREATE TABLE `inclu` (
  `id_Produit` int(11) NOT NULL,
  `id_Panier` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `panier`
--

CREATE TABLE `panier` (
  `id_Panier` int(11) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panier`
--

INSERT INTO `panier` (`id_Panier`, `description`) VALUES
(1, 'Panier_Hiver');

-- --------------------------------------------------------

--
-- Table structure for table `producteur`
--

CREATE TABLE `producteur` (
  `id_Producteur` int(11) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producteur`
--

INSERT INTO `producteur` (`id_Producteur`, `adresse`, `email`, `nom`) VALUES
(1, '12 rue du pole', 'francis.crema@gmail.com', 'francis');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_Produit` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prixAuKilo` double NOT NULL,
  `stock` int(11) NOT NULL,
  `poids` float NOT NULL,
  `id_ProdSub` int(11) DEFAULT NULL,
  `id_Cat` int(11) NOT NULL,
  `id_Producteur` int(11) DEFAULT NULL,
  `saison` varchar(50) NOT NULL,
  `imageProduit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_Produit`, `nom`, `prixAuKilo`, `stock`, `poids`, `id_ProdSub`, `id_Cat`, `id_Producteur`, `saison`, `imageProduit`) VALUES
(1, 'Abricot ', 1.89, 88, 45, 2, 1, 1, 'Ete', 'abricot.png'),
(2, 'Peche', 1.31, 40, 150, 3, 1, 1, 'Ete', 'peche.png'),
(3, 'Prune', 1.36, 64, 30, 4, 1, 1, 'Ete', 'prune.png'),
(4, 'Cerise', 3.98, 267, 5, NULL, 1, 1, 'Ete', 'cerise.png'),
(5, 'Poire', 1.36, 24, 120, NULL, 2, 1, 'Automne', 'poire.png'),
(6, 'Pomme', 0.83, 58, 150, 5, 2, 1, 'Toute', 'pomme.png'),
(7, 'Myrtille', 2.51, 79, 10, NULL, 3, 1, 'Ete', 'myrtille.png'),
(8, 'Mandarine', 3.98, 267, 60, NULL, 3, 1, 'Automne', 'mandarine.png'),
(9, 'Raisin', 2.89, 50, 100, NULL, 2, 1, 'Ete', 'raisin.png'),
(10, 'Orange', 4.59, 215, 120, NULL, 4, 1, 'Hiver', 'orange.png'),
(11, 'Poireau', 5.43, 56, 263, NULL, 14, 1, 'Hiver', 'poireau.png'),
(12, 'Potimarron', 9.45, 43, 600, NULL, 13, 1, 'Hiver', 'potimarron.png'),
(13, 'Epinard', 3.56, 423, 12, NULL, 8, 1, 'Ete', 'epinard.png'),
(14, 'Haricot Vert', 3.21, 862, 20, NULL, 12, 1, 'Toute', 'haricotvert.png'),
(15, 'Pattate Douce', 8.56, 43, 310, NULL, 11, 1, 'Toute', 'pattatedouce.png'),
(16, 'Carotte', 3.48, 76, 45, NULL, 13, 1, 'Hiver', 'carotte.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorieproduit`
--
ALTER TABLE `categorieproduit`
  ADD PRIMARY KEY (`id_Cat`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_Client`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_Commande`),
  ADD KEY `id_Client` (`id_Client`),
  ADD KEY `id_Panier` (`id_Panier`);

--
-- Indexes for table `groupe`
--
ALTER TABLE `groupe`
  ADD PRIMARY KEY (`id_Groupe`,`id_Client`),
  ADD KEY `id_Client` (`id_Client`);

--
-- Indexes for table `inclu`
--
ALTER TABLE `inclu`
  ADD PRIMARY KEY (`id_Produit`,`id_Panier`),
  ADD KEY `id_Panier` (`id_Panier`);

--
-- Indexes for table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id_Panier`);

--
-- Indexes for table `producteur`
--
ALTER TABLE `producteur`
  ADD PRIMARY KEY (`id_Producteur`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_Produit`),
  ADD UNIQUE KEY `Produit_AK` (`id_ProdSub`),
  ADD KEY `id_Cat` (`id_Cat`),
  ADD KEY `id_Producteur` (`id_Producteur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorieproduit`
--
ALTER TABLE `categorieproduit`
  MODIFY `id_Cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_Client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_Commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groupe`
--
ALTER TABLE `groupe`
  MODIFY `id_Groupe` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `panier`
--
ALTER TABLE `panier`
  MODIFY `id_Panier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `producteur`
--
ALTER TABLE `producteur`
  MODIFY `id_Producteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_Produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `Commande_ibfk_1` FOREIGN KEY (`id_Client`) REFERENCES `client` (`id_Client`),
  ADD CONSTRAINT `Commande_ibfk_2` FOREIGN KEY (`id_Panier`) REFERENCES `panier` (`id_Panier`);

--
-- Constraints for table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `Groupe_ibfk_1` FOREIGN KEY (`id_Client`) REFERENCES `client` (`id_Client`);

--
-- Constraints for table `inclu`
--
ALTER TABLE `inclu`
  ADD CONSTRAINT `inclu_ibfk_1` FOREIGN KEY (`id_Produit`) REFERENCES `produit` (`id_Produit`),
  ADD CONSTRAINT `inclu_ibfk_2` FOREIGN KEY (`id_Panier`) REFERENCES `panier` (`id_Panier`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_ibfk_1` FOREIGN KEY (`id_Cat`) REFERENCES `categorieproduit` (`id_Cat`),
  ADD CONSTRAINT `Produit_ibfk_2` FOREIGN KEY (`id_Producteur`) REFERENCES `producteur` (`id_Producteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
