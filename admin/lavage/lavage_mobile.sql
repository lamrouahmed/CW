-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2020 at 11:19 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carwash`
--

-- --------------------------------------------------------

--
-- Table structure for table `lavage_mobile`
--

DROP TABLE IF EXISTS `lavage_mobile`;
CREATE TABLE IF NOT EXISTS `lavage_mobile` (
  `lavage_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `nom` varchar(32) COLLATE utf8_bin NOT NULL,
  `tel` varchar(32) COLLATE utf8_bin NOT NULL,
  `addresse` varchar(128) COLLATE utf8_bin NOT NULL,
  `longtitude` double NOT NULL,
  `latitude` double NOT NULL,
  PRIMARY KEY (`lavage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `lavage_mobile`
--

INSERT INTO `lavage_mobile` (`lavage_id`, `username`, `password`, `nom`, `tel`, `addresse`, `longtitude`, `latitude`) VALUES
(1, 'hami', 'hami196', 'HAMI LAVAGE', '0662241020', 'Derb sultan, 196, rue 1, Casablanca', -7.5800701, 33.5718397),
(2, 'Lavauto', 'auto', 'Lav Auto', '0522964586', 'Hay Erajaa 2, N°96 Had Soualem', -7.5919785, 33.5730434),
(3, 'Ghsalni', 'ghsa', 'Ghsalni', '0664-645652', 'N° 220 Magasin N°1, Boulevard de la Résistance', -7.6131184, 33.5839128),
(5, 'autopower', 'power', 'Auto power', '', 'Avenue 2 Mars, Casablanca', -7.6038936, 33.5469455),
(6, 'anouar', 'anouarauto', 'Anouar Auto Service', '067686708', '3 angle Bd bouchaib doukalli et rue 21 pres souk korea', -7.6038473, 33.5616619),
(7, 'trocado', 'troca', 'TROCADO LAVAGE', '', '65, Bd Moulay Ismail N1', -7.5946796, 33.5967654),
(8, 'tarik', 'tariklav', 'Lavage Tarik', '05222-09353', '', -7.6463191, 33.5557599),
(9, 'vireo', 'virelav', 'VIREO Car wash', '05222-62610', 'Résidence Titrit 2. Rue Hadj Omar Riffi Benjdia', -7.6146056, 33.5849766),
(10, 'ktiri', 'ktirilav', 'Lavage Ktiri Auto El Maarif', '0661-30339', 'Rue des Camélias', -7.6456325, 33.5740446),
(11, 'ainborja', 'borjalav', 'Lavage Ain Borja', '0638-931572', '18 George Hay Lahcen Ben Ahmed Toto Ain Borja, Rue Rakib Mohamed Al Moussaoui', -7.5964987, 33.5834916),
(12, 'easywash', 'easy', 'Easy Wash', '0690-998818', '', -7.5878735, 33.5312524),
(13, 'lavageautovap', 'vapeur', 'Lavage Auto a la vapeur', '0770-107854', '21Bis Sidi Abderrahmane', -7.6557255, 33.5313802),
(14, 'brooklyn', 'brookcw', 'Brooklyn Car Wash', '0699-146282', '', -7.564042287071777, 33.605308823587684),
(15, 'royal', 'royalcw', 'Royal Car Wash', '05226-48268', 'Morocco Mall', -7.725117303955078, 33.55163254031068),
(16, 'jamallav', 'jamalcw', 'LAVAGE Jamal', '0677-639430', 'Nr B2, Boulevard Ibn Rochd, Âïn-Harrouda', -7.471860127647949, 33.62346430526351),
(17, 'fiveclean', 'fivecw', 'Five clean', '05223-56560', 'BD CHEFCHAOUNI ETG rd RTE 110 12.500', -7.553055958946777, 33.58686351417405),
(18, 'redoneway', 'redonewaycw', 'red one way', '0661-599312', 'Hay Moulay Abdellah rue 161 N 5 Ainchok', -7.479756550987792, 33.55096250134655),
(19, 'amisclasse', 'amiscw', 'Amis Classe Auto', '05227-25076', 'Avenue Abdelkader essahraoui lot 111 N°4', -7.462762074669433, 33.54223529946488),
(20, 'tim', 'timcw', 'Car Wash Tim', '0645-269795', '', -7.667210774620605, 33.533650306667816),
(21, 'dinar', 'dinarcw', 'Lavage Dinar', '0663-656229', 'Rue Jabal Oukaimeden, Casablanca', -7.648671345909667, 33.51647776342899),
(22, 'badr', 'badrcw', 'LAVAGE Badr', '0661-427447', '', -7.7298671772084955, 33.47983161040274),
(23, 'arrahma', 'arrahmacw', 'Lavage Arrahma', '', 'Boulevard Cadi Ayad, Arrahma', -7.724717335899902, 33.502880415320305),
(24, 'bouahim', 'bouahimcw', 'Lavage BOUAHIM', '0655-175424', ' Route du complexe Administratif', -7.6818019916616205, 33.550032595562094),
(25, 'oulfa', 'oulfacw', 'Lavage El Oulfa', '', 'Bd des Facultées', -7.669785695274902, 33.535653547916716),
(26, 'almassira', 'almassiracw', 'Lavage almassira', '0657-134117', ' Route du complexe Administratif, Casablanca', -7.669785695274902, 33.535653547916716);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
