-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 22, 2021 at 07:25 AM
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
-- Database: `aden-bdd8`
--

-- --------------------------------------------------------

--
-- Table structure for table `vehicules`
--

CREATE TABLE `vehicules` (
  `id` varchar(20) NOT NULL,
  `marque` varchar(30) NOT NULL,
  `modele` varchar(30) NOT NULL,
  `puissanceFiscale` int(11) NOT NULL,
  `poids` float NOT NULL,
  `vitesse` float NOT NULL,
  `cargaison` int(11) DEFAULT NULL,
  `capaStockage` int(11) DEFAULT NULL,
  `nbrPassagers` int(11) DEFAULT NULL,
  `tailleCoffre` int(11) DEFAULT NULL,
  `vehicType` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicules`
--

INSERT INTO `vehicules` (`id`, `marque`, `modele`, `puissanceFiscale`, `poids`, `vitesse`, `cargaison`, `capaStockage`, `nbrPassagers`, `tailleCoffre`, `vehicType`) VALUES
('321-ytr-15A', 'lambo', 'power', 156, 654, 6564, NULL, NULL, 1, 0, 'voiture'),
('654-thf-41', 'renault', 't460', 25, 5123, 160, 6541, 321, NULL, NULL, 'camion'),
('dsfmj-31232dsf', 'freightliner', 'cascadia', 548, 654, 32118, 4784, 21548, NULL, NULL, 'camion'),
('hb-542-53', 'peugeot', '306', 8, 280, 200, NULL, NULL, 5, 3, 'voiture'),
('IIIII', 'renault', 'xsara', 8, 500, 300, NULL, NULL, 6, 9, 'voiture'),
('ijhkdf-321sd-f', 'scania', 'truck', 5, 5, 450, 3500, 2000, NULL, NULL, 'camion'),
('lskdfjv-4-sdc', 'renault', 'magnum', 354, 1234, 6546, 654654, 65465, NULL, NULL, 'camion'),
('poi-654-21-44', 'dacia', 'sandero', 8, 165, 321, NULL, NULL, 8, 4, 'voiture'),
('sldkvjq-654', 'freightliner', 'columbia', 5465, 3213, 321321, 487, 3216, NULL, NULL, 'camion');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
