-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2018 at 10:39 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_bandara`
--

CREATE TABLE `t_bandara` (
  `id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abbr` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_bandara`
--

INSERT INTO `t_bandara` (`id`, `nama`, `city`, `abbr`) VALUES
('BDBDO001', 'Husein Sastranegara', 'Bandung', 'BDO'),
('BDSUB001', 'Juanda', 'Surabaya', 'SUB');

-- --------------------------------------------------------

--
-- Table structure for table `t_customer`
--

CREATE TABLE `t_customer` (
  `id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gander` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_customer`
--

INSERT INTO `t_customer` (`id`, `name`, `address`, `phone`, `gander`) VALUES
('PEN201802001', 'Jaja', 'Cianjur', '0842124', '1'),
('PEN201802002', 'Lambda', 'Cianjur', '084213412', '1'),
('PEN201802003', 'Murbawisesa', 'Cianjur', '0842131', '1'),
('PEN201802004', 'Lambda', 'Cianjur', '0842113', '1'),
('PEN201802005', 'Sangkala', 'Cianjur', '08423125', '1'),
('PEN201802006', 'Murbawisesa', 'Cianjur', '084214241', '1');

-- --------------------------------------------------------

--
-- Table structure for table `t_reservation`
--

CREATE TABLE `t_reservation` (
  `id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reservation_code` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reservation_at` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reservation_date` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerid` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat_code` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruteid` int(11) DEFAULT NULL,
  `depart_at` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_reservation`
--

INSERT INTO `t_reservation` (`id`, `reservation_code`, `reservation_at`, `reservation_date`, `customerid`, `seat_code`, `ruteid`, `depart_at`, `price`, `userid`) VALUES
('TIKARG201802146815A', 'DEVTIKETU001', 'Tiketu', '2018-02-14', 'PEN201802002', '15A', 68, '07:22', '160000', 1),
('TIKARG201802146815B', 'DEVTIKETU001', 'Tiketu', '2018-02-14', 'PEN201802003', '15B', 68, '07:22', '160000', 1),
('TIKARG201802156814A', 'DEVTIKETU001', 'Tiketu', '2018-02-15', 'PEN201802001', '14A', 68, '01:39', '160000', 1),
('TIKARG201802176812A', 'DEVTIKETU001', 'Tiketu', '2018-02-17', 'PEN201802004', '12A', 68, '07:25', '160000', 1),
('TIKARG201802176813B', 'DEVTIKETU001', 'Tiketu', '2018-02-17', 'PEN201802005', '13B', 68, '07:25', '160000', 1),
('TIKARG201802176814A', 'DEVTIKETU001', 'Tiketu', '2018-02-17', 'PEN201802006', '14A', 68, '07:25', '160000', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_rute`
--

CREATE TABLE `t_rute` (
  `id` int(11) NOT NULL,
  `depart_at` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rute_from` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rute_to` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transportationid` int(11) DEFAULT NULL,
  `estp` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idstasiun` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_rute`
--

INSERT INTO `t_rute` (`id`, `depart_at`, `rute_from`, `rute_to`, `price`, `transportationid`, `estp`, `idstasiun`) VALUES
(66, '08:00', 'BDBDO001', 'BDSUB001', '450000', 9, '09:30', 'BDBDO001'),
(67, '10:00', 'BDSUB001', 'BDBDO001', '500000', 10, '13:00', 'BDSUB001'),
(68, '01:00', 'STBDG001', 'STBDG002', '150000', 11, '02:00', 'STBDG001'),
(69, '08:00', 'STBDG002', 'STBDG001', '350000', 13, '10:00', 'STBDG002');

-- --------------------------------------------------------

--
-- Table structure for table `t_stasiun`
--

CREATE TABLE `t_stasiun` (
  `id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abbr` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_stasiun`
--

INSERT INTO `t_stasiun` (`id`, `nama`, `city`, `abbr`) VALUES
('STBDG001', 'Argo Parahiyangan', 'Bandung', 'BDG'),
('STBDG002', 'Argo Bromo Anggrek', 'Bandung', 'BDG');

-- --------------------------------------------------------

--
-- Table structure for table `t_transportation`
--

CREATE TABLE `t_transportation` (
  `id` int(11) NOT NULL,
  `code` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seat_qty` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transportation_typeid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_transportation`
--

INSERT INTO `t_transportation` (`id`, `code`, `description`, `seat_qty`, `transportation_typeid`) VALUES
(9, 'PGAR2018001', 'Garuda Indonesia', '127', 1),
(10, 'PEMI2018001', 'Emirates Airlines', '63', 1),
(11, 'KARG2018005', 'Argo Bromo Anggrek', '63', 2),
(12, 'KARG2018002', 'Argo Dwipangga', '127', 2),
(13, 'KARG2018003', 'Argo Parahyangan', '127', 2),
(14, 'KARG2018004', 'Argo Bromo', '64', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_transportation_type`
--

CREATE TABLE `t_transportation_type` (
  `id` int(11) NOT NULL,
  `description` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_transportation_type`
--

INSERT INTO `t_transportation_type` (`id`, `description`) VALUES
(1, 'Pesawat'),
(2, 'Kereta Api');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fullname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `fullname`, `level`) VALUES
(1, 'admin', 'admin', 'Lambda Sangkala', '1'),
(4, 'op', 'op', 'Sangkala', '2');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_getkereta`
-- (See below for the actual view)
--
CREATE TABLE `v_getkereta` (
`id` int(11)
,`depart_at` varchar(25)
,`rute_from` varchar(100)
,`rute_to` varchar(100)
,`price` varchar(25)
,`description` varchar(30)
,`estp` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_getnmt`
-- (See below for the actual view)
--
CREATE TABLE `v_getnmt` (
`id` int(11)
,`depart_at` varchar(25)
,`rute_from` varchar(100)
,`rute_to` varchar(100)
,`price` varchar(25)
,`transportationid` int(11)
,`description` varchar(30)
,`estp` varchar(25)
,`transportation_typeid` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_getpesawat`
-- (See below for the actual view)
--
CREATE TABLE `v_getpesawat` (
`id` int(11)
,`depart_at` varchar(25)
,`rute_from` varchar(100)
,`rute_to` varchar(100)
,`price` varchar(25)
,`description` varchar(30)
,`estp` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemberangkatan`
-- (See below for the actual view)
--
CREATE TABLE `v_pemberangkatan` (
`rute_from` varchar(100)
,`description` varchar(30)
,`rute_to` varchar(100)
,`depart_at` varchar(25)
,`price` varchar(25)
,`seat_qty` varchar(25)
,`reserved` bigint(21)
,`transportation_typeid` int(11)
,`reservation_date` varchar(25)
,`estp` varchar(25)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pendapatan`
-- (See below for the actual view)
--
CREATE TABLE `v_pendapatan` (
`reservation_date` varchar(25)
,`rute_from` varchar(100)
,`rute_to` varchar(100)
,`name` varchar(25)
,`description` varchar(30)
,`price` varchar(25)
,`transportation_typeid` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `v_getkereta`
--
DROP TABLE IF EXISTS `v_getkereta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_getkereta`  AS  select `r`.`id` AS `id`,`r`.`depart_at` AS `depart_at`,`r`.`rute_from` AS `rute_from`,`r`.`rute_to` AS `rute_to`,`r`.`price` AS `price`,`t`.`description` AS `description`,`r`.`estp` AS `estp` from (`t_rute` `r` join `t_transportation` `t` on((`t`.`id` = `r`.`transportationid`))) where (`t`.`transportation_typeid` = 2) ;

-- --------------------------------------------------------

--
-- Structure for view `v_getnmt`
--
DROP TABLE IF EXISTS `v_getnmt`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_getnmt`  AS  select `r`.`id` AS `id`,`r`.`depart_at` AS `depart_at`,`r`.`rute_from` AS `rute_from`,`r`.`rute_to` AS `rute_to`,`r`.`price` AS `price`,`r`.`transportationid` AS `transportationid`,`t`.`description` AS `description`,`r`.`estp` AS `estp`,`t`.`transportation_typeid` AS `transportation_typeid` from (`t_rute` `r` join `t_transportation` `t` on((`r`.`transportationid` = `t`.`id`))) ;

-- --------------------------------------------------------

--
-- Structure for view `v_getpesawat`
--
DROP TABLE IF EXISTS `v_getpesawat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_getpesawat`  AS  select `r`.`id` AS `id`,`r`.`depart_at` AS `depart_at`,`r`.`rute_from` AS `rute_from`,`r`.`rute_to` AS `rute_to`,`r`.`price` AS `price`,`t`.`description` AS `description`,`r`.`estp` AS `estp` from (`t_rute` `r` join `t_transportation` `t` on((`r`.`transportationid` = `t`.`id`))) where (`t`.`transportation_typeid` = 1) ;

-- --------------------------------------------------------

--
-- Structure for view `v_pemberangkatan`
--
DROP TABLE IF EXISTS `v_pemberangkatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pemberangkatan`  AS  select `tr`.`rute_from` AS `rute_from`,`tt`.`description` AS `description`,`tr`.`rute_to` AS `rute_to`,`tr`.`depart_at` AS `depart_at`,`ts`.`price` AS `price`,`tt`.`seat_qty` AS `seat_qty`,count(`tr`.`id`) AS `reserved`,`tt`.`transportation_typeid` AS `transportation_typeid`,`ts`.`reservation_date` AS `reservation_date`,`tr`.`estp` AS `estp` from ((`t_rute` `tr` join `t_reservation` `ts` on((`tr`.`id` = `ts`.`ruteid`))) join `t_transportation` `tt` on((`tt`.`id` = `tr`.`transportationid`))) group by `tt`.`description`,`tr`.`rute_from`,`tr`.`rute_to` ;

-- --------------------------------------------------------

--
-- Structure for view `v_pendapatan`
--
DROP TABLE IF EXISTS `v_pendapatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pendapatan`  AS  select `ts`.`reservation_date` AS `reservation_date`,`tr`.`rute_from` AS `rute_from`,`tr`.`rute_to` AS `rute_to`,`tc`.`name` AS `name`,`tt`.`description` AS `description`,`ts`.`price` AS `price`,`tt`.`transportation_typeid` AS `transportation_typeid` from (((`t_reservation` `ts` join `t_rute` `tr` on((`ts`.`ruteid` = `tr`.`id`))) join `t_customer` `tc` on((`tc`.`id` = `ts`.`customerid`))) join `t_transportation` `tt` on((`tt`.`id` = `tr`.`transportationid`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_bandara`
--
ALTER TABLE `t_bandara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_customer`
--
ALTER TABLE `t_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_reservation`
--
ALTER TABLE `t_reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruteid` (`ruteid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `costumerid` (`customerid`);

--
-- Indexes for table `t_rute`
--
ALTER TABLE `t_rute`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transportationid` (`transportationid`);

--
-- Indexes for table `t_stasiun`
--
ALTER TABLE `t_stasiun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_transportation`
--
ALTER TABLE `t_transportation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transportation_typeid` (`transportation_typeid`);

--
-- Indexes for table `t_transportation_type`
--
ALTER TABLE `t_transportation_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_rute`
--
ALTER TABLE `t_rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `t_transportation`
--
ALTER TABLE `t_transportation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `t_transportation_type`
--
ALTER TABLE `t_transportation_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_reservation`
--
ALTER TABLE `t_reservation`
  ADD CONSTRAINT `costumerid` FOREIGN KEY (`customerid`) REFERENCES `t_customer` (`id`),
  ADD CONSTRAINT `t_reservation_ibfk_2` FOREIGN KEY (`ruteid`) REFERENCES `t_rute` (`id`),
  ADD CONSTRAINT `t_reservation_ibfk_3` FOREIGN KEY (`userid`) REFERENCES `t_user` (`id`);

--
-- Constraints for table `t_rute`
--
ALTER TABLE `t_rute`
  ADD CONSTRAINT `t_rute_ibfk_1` FOREIGN KEY (`transportationid`) REFERENCES `t_transportation` (`id`);

--
-- Constraints for table `t_transportation`
--
ALTER TABLE `t_transportation`
  ADD CONSTRAINT `t_transportation_ibfk_1` FOREIGN KEY (`transportation_typeid`) REFERENCES `t_transportation_type` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
