-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2023 at 01:34 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jsph`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` varchar(11) NOT NULL,
  `admin_password` varchar(45) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_cause` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_password`, `admin_email`, `admin_cause`) VALUES
('JSPH', 'c90c5ada466af81cb6e7a67dedd72b42', 'JSPH@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `arrears`
--

CREATE TABLE `arrears` (
  `arr_id` int(11) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `arr_date` date DEFAULT NULL,
  `arr_cause` text NOT NULL,
  `user_sell_us_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `arrears`
--

INSERT INTO `arrears` (`arr_id`, `money`, `arr_date`, `arr_cause`, `user_sell_us_id`) VALUES
(2, '350000.00', '2023-01-16', '', 51),
(3, '250000.00', '2023-01-16', '', 52),
(4, '7500.00', '2023-01-16', '', 53);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dis_id` int(11) NOT NULL,
  `dis_name` varchar(45) NOT NULL,
  `dis_cause` text NOT NULL,
  `province_pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dis_id`, `dis_name`, `dis_cause`, `province_pro_id`) VALUES
(4, 'ໄຊຍະບູລີ', '111111111111', 1),
(5, 'ພຽງ', '', 1),
(6, 'ວຽງຄຳ', '', 2),
(15, 'ຫົງສາ', '', 1),
(16, 'ປາກລາຍ', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `import`
--

CREATE TABLE `import` (
  `im_id` int(11) NOT NULL,
  `im_image` varchar(100) NOT NULL,
  `im_sprice` decimal(12,2) DEFAULT NULL,
  `im_date` date DEFAULT NULL,
  `im_time` time DEFAULT NULL,
  `on_or_off` varchar(100) DEFAULT NULL,
  `im_cause` text DEFAULT NULL,
  `merchandise_mer_id` int(11) NOT NULL,
  `type_type_id` int(11) NOT NULL,
  `user_sell_us_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `import`
--

INSERT INTO `import` (`im_id`, `im_image`, `im_sprice`, `im_date`, `im_time`, `on_or_off`, `im_cause`, `merchandise_mer_id`, `type_type_id`, `user_sell_us_id`) VALUES
(15, '0r1s5v.jpg', '180000.00', '2023-01-14', '00:01:55', 'on', 'ຫູຟັງ ແລະ ເມົາເກມມິ່ງ ສະພາບນາງຟ້າ', 2, 3, 51),
(16, 'อุปกรณ์-it-คอมพิวเตอร์.jpg', '7000000.00', '2023-01-14', '00:03:27', 'off', 'ຄອມຕັ້ງໂຕະ ສະພາບຍັງດີ ຄາລາບໍ່ແພງ', 1, 3, 51),
(17, '0ce09a3c-dff5-4fb5-acc8-131347105321.jpg', '5000000.00', '2023-01-14', '00:05:50', 'off', 'ເຄືອງຊັກຜ້າສຳລັບທ່ານຍິງທີ່ຮັບຮ້ອງໄດ້ວ່າຈະຕ້ອງຖືກໃຈທ່ານແນ່ນອນ ມີປະກັນ 1 ປີເຕັມໆ', 2, 6, 52),
(18, '130018924-10.jpg', '100000.00', '2023-01-14', '00:08:05', 'on', 'ຫມໍ່ຫົງເຂົ້າ', 2, 6, 51),
(19, 'a9b86b24-fd18-4e76-9b01-cd4a273d312c.jpg', '150000.00', '2023-01-14', '00:10:59', 'off', 'ສົ່ງຟີຣຈຮາສົນໃຈສັ່ງໄດ້ ເບີ', 2, 2, 53),
(20, 'P7yk513612.jpg', '15000.00', '2023-01-14', '02:10:43', 'on', 'ສັ່ງຊື້ອາຫານຕອນນີ້ສັ່ງຟຮີເດີຕິດຕໍ່ມາທາງອີເມວ', 2, 2, 52),
(21, 'maxresdefault.jpg', '5000.00', '2023-01-16', '19:41:52', 'on', 'ຊື່ເລີຍບໍ່ແພງ', 1, 1, 51);

-- --------------------------------------------------------

--
-- Table structure for table `merchandise`
--

CREATE TABLE `merchandise` (
  `mer_id` int(11) NOT NULL,
  `mer_name` varchar(255) NOT NULL,
  `mer_cause` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `merchandise`
--

INSERT INTO `merchandise` (`mer_id`, `mer_name`, `mer_cause`) VALUES
(1, 'ມື2', '200111111'),
(2, 'ມື1', '20');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `o_date` date NOT NULL,
  `o_time` time NOT NULL,
  `province_pro_id` int(11) NOT NULL,
  `district_dis_id` int(11) NOT NULL,
  `o_vill` varchar(255) NOT NULL,
  `transpoortation_tp_id` int(11) NOT NULL,
  `o_cause` text DEFAULT NULL,
  `users_users_id` int(11) NOT NULL,
  `import_im_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_date`, `o_time`, `province_pro_id`, `district_dis_id`, `o_vill`, `transpoortation_tp_id`, `o_cause`, `users_users_id`, `import_im_id`) VALUES
(8, '2023-01-16', '01:14:24', 2, 6, 'ໂນນສະຫວ່າງ', 1, NULL, 12, 16),
(9, '2023-01-16', '01:18:01', 2, 6, 'ນາເຄືອ', 1, NULL, 13, 17),
(10, '2023-01-16', '19:47:06', 1, 5, 'ນາຕໍນ້ອຍ', 2, NULL, 14, 19);

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `pro_id` int(11) NOT NULL,
  `pro_name` varchar(45) NOT NULL,
  `pro_cause` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`pro_id`, `pro_name`, `pro_cause`) VALUES
(1, 'ໄຊຍະບູລີ', '4444'),
(2, 'ວຽງຈັນ', '100'),
(5, 'ນະຄອນຫຼວງ', '0002'),
(6, 'ບໍແກ້ວ', 'ຸຸຸຸຸຸຸຸຸຸ444444');

-- --------------------------------------------------------

--
-- Table structure for table `transportation`
--

CREATE TABLE `transportation` (
  `tp_id` int(11) NOT NULL,
  `tp_name` varchar(255) NOT NULL,
  `tp_cause` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transportation`
--

INSERT INTO `transportation` (`tp_id`, `tp_name`, `tp_cause`) VALUES
(1, 'ຮຸງອາລຸນ', ''),
(2, 'ອານຸສິດ', '');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `type_cause` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`type_id`, `type_name`, `type_cause`) VALUES
(1, 'ເຄື້ອງດື້ມ', '10444444444'),
(2, 'ອາຫານ', '120'),
(3, 'ອຸປະກອນຄອມພິວເຕີ', '1245'),
(6, 'ເຄືອງໃຊ້ໃນບ້ານ', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `u_fname` varchar(45) NOT NULL,
  `u_lname` varchar(45) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `u_email` varchar(45) NOT NULL,
  `u_Tel` varchar(45) NOT NULL,
  `u_vill` varchar(45) NOT NULL,
  `users_cause` text NOT NULL,
  `province_pro_id` int(11) NOT NULL,
  `district_dis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `u_fname`, `u_lname`, `gender`, `u_email`, `u_Tel`, `u_vill`, `users_cause`, `province_pro_id`, `district_dis_id`) VALUES
(12, 'Saiyald', 'Ps', 'M', 'jay@email.com', '1', 'ໂນນສະຫວ່າງ', '', 2, 6),
(13, 'ສົມຊາຍ', 'ແສນພະວົງ', 'M', 'jayj28222@gmail.com', '2', 'ນາຕໍນ້ອຍ', '', 1, 4),
(14, 'ເຈ', 'lee', 'M', 'saiyaladjay4445555@gmail.com', '20', 'f', '', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_sell`
--

CREATE TABLE `user_sell` (
  `us_id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `image` varchar(100) NOT NULL,
  `weighing` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `us_staus` varchar(45) NOT NULL,
  `together` decimal(12,2) NOT NULL,
  `us_vill` varchar(100) NOT NULL,
  `stust` int(1) NOT NULL,
  `us_cause` text NOT NULL,
  `province_pro_id` int(11) NOT NULL,
  `district_dis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_sell`
--

INSERT INTO `user_sell` (`us_id`, `fname`, `lname`, `image`, `weighing`, `email`, `password`, `us_staus`, `together`, `us_vill`, `stust`, `us_cause`, `province_pro_id`, `district_dis_id`) VALUES
(51, 'ສົມຊາຍ', 'ແສນພະວົງ', 'young-and-successful-business-man-cartoon-employee-vector-15281659.jpg', '2023-01-13', 'mai472740@gmali.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user_sell', '6650000.00', 'ນາຕໍນ້ອຍ', 0, '', 1, 4),
(52, 'ນິວ', 'ລຸງເສລີ', 'business-woman-standing-cartoon-employee-vector-15325127.jpg', '2023-01-13', 'dddddddd@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user_sell', '4750000.00', 'ໄຊຍະມຸງຄຸນ', 1673874693, '', 1, 16),
(53, 'ເພັດລາກອນ', 'ສິງພະຫັດ', 'young-and-successful-business-man-cartoon-employee-vector-15281649.jpg', '2023-01-13', 'phos@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 'user_sell', '142500.00', 'ລອງປໍ', 1673630019, '', 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `arrears`
--
ALTER TABLE `arrears`
  ADD PRIMARY KEY (`arr_id`),
  ADD KEY `fk_arrears_user_sell1_idx` (`user_sell_us_id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dis_id`),
  ADD KEY `province_pro_id` (`province_pro_id`);

--
-- Indexes for table `import`
--
ALTER TABLE `import`
  ADD PRIMARY KEY (`im_id`,`user_sell_us_id`),
  ADD KEY `fk_import_ merchandise1_idx` (`merchandise_mer_id`),
  ADD KEY `fk_import_type1_idx` (`type_type_id`),
  ADD KEY `fk_import_user_sell1_idx` (`user_sell_us_id`);

--
-- Indexes for table `merchandise`
--
ALTER TABLE `merchandise`
  ADD PRIMARY KEY (`mer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`),
  ADD KEY `fk_orders_users1_idx` (`users_users_id`),
  ADD KEY `import_im_id` (`import_im_id`),
  ADD KEY `district_dis_id` (`district_dis_id`),
  ADD KEY `province_pro_id` (`province_pro_id`),
  ADD KEY `transpoortation_tp_id` (`transpoortation_tp_id`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `transportation`
--
ALTER TABLE `transportation`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `fk_users_province1_idx` (`province_pro_id`),
  ADD KEY `fk_users_district1_idx` (`district_dis_id`);

--
-- Indexes for table `user_sell`
--
ALTER TABLE `user_sell`
  ADD PRIMARY KEY (`us_id`),
  ADD KEY `fk_user_sell_province1_idx` (`province_pro_id`),
  ADD KEY `fk_user_sell_district1_idx` (`district_dis_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arrears`
--
ALTER TABLE `arrears`
  MODIFY `arr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `import`
--
ALTER TABLE `import`
  MODIFY `im_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `merchandise`
--
ALTER TABLE `merchandise`
  MODIFY `mer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transportation`
--
ALTER TABLE `transportation`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_sell`
--
ALTER TABLE `user_sell`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `arrears`
--
ALTER TABLE `arrears`
  ADD CONSTRAINT `fk_arrears_user_sell1` FOREIGN KEY (`user_sell_us_id`) REFERENCES `user_sell` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`province_pro_id`) REFERENCES `province` (`pro_id`);

--
-- Constraints for table `import`
--
ALTER TABLE `import`
  ADD CONSTRAINT `fk_import_ merchandise1` FOREIGN KEY (`merchandise_mer_id`) REFERENCES `merchandise` (`mer_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_import_type1` FOREIGN KEY (`type_type_id`) REFERENCES `type` (`type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_import_user_sell1` FOREIGN KEY (`user_sell_us_id`) REFERENCES `user_sell` (`us_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`import_im_id`) REFERENCES `import` (`im_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`users_users_id`) REFERENCES `users` (`users_id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`district_dis_id`) REFERENCES `district` (`dis_id`),
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`province_pro_id`) REFERENCES `province` (`pro_id`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`transpoortation_tp_id`) REFERENCES `transportation` (`tp_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_district1` FOREIGN KEY (`district_dis_id`) REFERENCES `district` (`dis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_province1` FOREIGN KEY (`province_pro_id`) REFERENCES `province` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_sell`
--
ALTER TABLE `user_sell`
  ADD CONSTRAINT `fk_user_sell_district1` FOREIGN KEY (`district_dis_id`) REFERENCES `district` (`dis_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_sell_province1` FOREIGN KEY (`province_pro_id`) REFERENCES `province` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
