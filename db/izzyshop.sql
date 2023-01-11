-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table izzyshop. approvisionnements
CREATE TABLE IF NOT EXISTS `approvisionnements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL DEFAULT '0',
  `date_achat` date DEFAULT NULL,
  `idFournisseur` int(11) NOT NULL DEFAULT '0',
  `libelleProduit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `referenceProduit` int(11) NOT NULL DEFAULT '0',
  `prix_achat` double NOT NULL DEFAULT '0',
  `quantite_achetes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`referenceProduit`) USING BTREE,
  KEY `idFournisseur` (`idFournisseur`),
  CONSTRAINT `FK__fournisseur` FOREIGN KEY (`idFournisseur`) REFERENCES `fournisseur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table izzyshop.approvisionnements : ~4 rows (environ)
INSERT INTO `approvisionnements` (`id`, `numero`, `date_achat`, `idFournisseur`, `libelleProduit`, `referenceProduit`, `prix_achat`, `quantite_achetes`) VALUES
	(1, 1, '2022-12-24', 4, 'BlaCK', 121, 120, 20),
	(3, 12, '2022-11-27', 1, '12', 12, 12, 12),
	(4, 111, '2022-12-16', 1, '11', 11, 11, 11),
	(6, 12, '2022-12-01', 1, '12', 12, 12, 12),
	(7, 1, '2022-12-16', 1, '21', 21, 21, 11);

-- Listage de la structure de table izzyshop. caisse
CREATE TABLE IF NOT EXISTS `caisse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ReferenceProduit` int(11) NOT NULL,
  `NomProduit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Date_saisie` date NOT NULL,
  `Quantite` int(11) NOT NULL DEFAULT '1',
  `Prix` double NOT NULL,
  `Quantite_initial` double NOT NULL,
  `Total` double DEFAULT NULL,
  PRIMARY KEY (`id`,`ReferenceProduit`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table izzyshop.caisse : ~4 rows (environ)
INSERT INTO `caisse` (`id`, `ReferenceProduit`, `NomProduit`, `Date_saisie`, `Quantite`, `Prix`, `Quantite_initial`, `Total`) VALUES
	(3, 4432, ' advilCaps', '2022-12-23', 1, 197, 132, 197),
	(4, 322, ' PrimaDonna Soul', '2022-12-23', 3, 1999, 123, 5997),
	(6, 231, ' fourniture de bureau', '2022-12-23', 4, 20, 40, 80),
	(7, 231, ' fourniture de bureau', '2022-12-24', 3, 20, 40, 60),
	(8, 1235, ' efferalgan', '2022-12-24', 6, 95, 14, 570);

-- Listage de la structure de table izzyshop. categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table izzyshop.categories : ~6 rows (environ)
INSERT INTO `categories` (`id`, `photo`, `libelle`) VALUES
	(1, '639e10b63a6212.39292895.jpg', 'matériels informatique'),
	(2, '639e116186c8b9.59021289.png', 'médicaments'),
	(3, '639e128912f709.67291347.jpeg', 'produits cosmétiques'),
	(4, '639e13155bf9b2.11305621.jpg', ' électroménagers'),
	(5, '639e136fd82751.37821172.png', ' poterie'),
	(6, '639e13d34abfa9.41813994.png', 'fournitures alimentaires'),
	(7, '639e1a408d63f3.06072119.png', ' fournitures de bureaux');

-- Listage de la structure de table izzyshop. clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tele` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table izzyshop.clients : ~9 rows (environ)
INSERT INTO `clients` (`id`, `nom`, `tele`, `adresse`, `email`) VALUES
	(1, 'abdellah', '063545300', 'safi', 'abdellah@gmail.la'),
	(3, 'zaki', '0970999977 ', 'tanger', 'zaki@gmail.com'),
	(5, 'ahmed', '0970999977', 'agadir', 'ahmed@h.com'),
	(7, 'jawad', '0433564433', 'sale', 'jawad@h.com'),
	(9, 'ahlam', '0970999977', 'chemaia', 'ahlam@h.com'),
	(11, 'wissal', '0970999977', 'casa', 'wissal@h.com'),
	(21, 'yassine', '0356656445', 'rabat', 'yassine@gmail.com');

-- Listage de la structure de table izzyshop. fournisseur
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tele` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresse` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Listage des données de la table izzyshop.fournisseur : ~3 rows (environ)
INSERT INTO `fournisseur` (`id`, `nom`, `tele`, `adresse`, `email`) VALUES
	(1, 'saad', '0777777777', 'marrakech', 'saad@saad.ac'),
	(4, 'amine', '0970999977', 'safi', 'amine@gmail.com'),
	(5, 'devo', '066666666-', 'casa', 'devo@gmail.com');

-- Listage de la structure de table izzyshop. produits
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` int(11) NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `prix_unitaire` double NOT NULL DEFAULT '0',
  `prix_achat` double NOT NULL DEFAULT '0',
  `prix_vente` double NOT NULL DEFAULT '0',
  `quantite_stock` double NOT NULL DEFAULT '0',
  `idCategorie` int(11) NOT NULL,
  PRIMARY KEY (`id`,`idCategorie`,`reference`) USING BTREE,
  KEY `FK_produits_categories` (`idCategorie`),
  CONSTRAINT `FK_produits_categories` FOREIGN KEY (`idCategorie`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table izzyshop.produits : ~18 rows (environ)
INSERT INTO `produits` (`id`, `reference`, `photo`, `libelle`, `prix_unitaire`, `prix_achat`, `prix_vente`, `quantite_stock`, `idCategorie`) VALUES
	(2, 12, '63a1f2fd3ef186.21148413.png', 'laptop', 7000, 5000, 6087, 87, 1),
	(3, 234, '63a2142eb2d2b2.47332533.png', 'casque', 540, 500, 550, 29, 1),
	(4, 2443, '63a21881979af3.80550435.png', 'play station V', 8000, 7500, 7999, 10, 1),
	(5, 2132, '63a21972117e32.70178466.jpeg', 'iphone12', 12999, 11999, 13099, 26, 1),
	(6, 122, '63a37f7ddf1707.61079862.png', 'Cooking Chef Experience', 1599, 1500, 1699, 32, 4),
	(7, 322, '63a37feac27f81.69764742.png', 'PrimaDonna Soul', 1999, 1900, 2050, 123, 4),
	(9, 12, '63a382301df024.46446882.jpeg', 'doliprane', 22, 20, 22, 61, 2),
	(10, 132, '63a3825ea9e015.20390783.jpeg', 'efferalgan', 95, 94, 95, 13, 2),
	(11, 4432, '63a38280254435.46412820.png', 'advilCaps', 197, 196, 197, 132, 2),
	(12, 1767, '63a383da279422.99391227.jpeg', 'arrogance', 120, 110, 120, 140, 3),
	(13, 9778, '63a3840ab2d9e9.12994954.png', 'blikken', 299, 289, 299, 45, 3),
	(14, 565, '63a3843773af63.80486988.jpeg', 'OIL BIO', 150, 145, 150, 16, 3),
	(15, 33, '63a387fd4fce91.81778086.png', 'zlafa', 20, 18, 21, 24, 5),
	(17, 34, '63a389207afce1.23570938.png', 'colorado potter mary starosta', 32, 32, 32, 40, 5),
	(18, 54, '63a389fef37a76.33541214.jpg', 'talavera creamice servig plate', 99, 97, 99, 20, 5),
	(19, 231, '63a38bc321a6d4.34438132.png', 'fourniture de bureau', 20, 20, 20, 40, 7),
	(20, 2, '63a42aad905362.96420732.jpg', 'flor de calabaza', 23, 21, 23, 50, 6),
	(21, 21, '63a42cefb59ef1.76374207.jpg', 'nutella', 52, 50, 52, 120, 6);

-- Listage de la structure de table izzyshop. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '63a74deecb26b1.26340445.png',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Listage des données de la table izzyshop.users : ~2 rows (environ)
INSERT INTO `users` (`id`, `nom`, `email`, `password`, `photo`) VALUES
	(1, 'omar', 'omar@omar.com', 'd4466cce49457cfea18222f5a7cd3573', '63a74e229128e7.81398655.png'),
	(6, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '63a74e229128e7.81398655.png'),
	(8, 'admin1', 'admin1@admin1.com', 'e00cf25ad42683b3df678c61f42c6bda', 'round-account-button-with-user-inside.png');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
