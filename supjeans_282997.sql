-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 05 mai 2019 à 15:21
-- Version du serveur :  5.7.21
-- Version de PHP :  7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `supjeans_282997`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_ref` varchar(25) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` smallint(4) NOT NULL,
  `user` varchar(255) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `billing_address` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `receipt_ref`, `product_name`, `price`, `user`, `transaction_date`, `billing_address`, `delivery_address`) VALUES
(126, '453693433', 'First shoes kids product', 5, 'angemanou99@gmail.com', '2019-05-02 12:50:12', '4 rÃ©sidence du parc de petit bourg 91000', '4 rÃ©sidence du parc de petit bourg'),
(125, '453693433', 'First clothing kids product', 42, 'angemanou99@gmail.com', '2019-05-02 12:50:12', '4 rÃ©sidence du parc de petit bourg 91000', '4 rÃ©sidence du parc de petit bourg');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `billing_address` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `billing_address`, `delivery_address`, `password`, `status`) VALUES
(8, 'angemanou99@gmail.com', '4 rÃ©sidence du parc de petit bourg 91000', '4 rÃ©sidence du parc de petit bourg', '768957a081cf27da9c4ddab74aadc7d2', 'admin'),
(9, '282997@supinfo.com', NULL, NULL, '768957a081cf27da9c4ddab74aadc7d2', 'admin');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
