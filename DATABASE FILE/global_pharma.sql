-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 12:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `global_pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `status`) VALUES
(5, 'No Brand', 'Active'),
(6, 'Beximco', 'Active'),
(7, 'Square', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `on_hold`
--

CREATE TABLE `on_hold` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(13) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `expire_date` date NOT NULL,
  `qty` bigint(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `cost` bigint(11) NOT NULL,
  `amount` bigint(11) NOT NULL,
  `profit_amount` bigint(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `on_hold`
--

INSERT INTO `on_hold` (`id`, `invoice_number`, `medicine_name`, `category`, `expire_date`, `qty`, `type`, `cost`, `amount`, `profit_amount`, `date`) VALUES
(147, 'CA-0932032', 'Napa Extra', 'Tablet', '2025-03-07', 3, 'Pics', 3, 9, 3, '03/09/2023'),
(159, 'CA-0232290', 'Napa Extra', 'Tablet', '2025-03-07', 10, 'Pics', 3, 30, 10, '03/12/2023'),
(161, 'CA-2020993', 'Napa Extra', 'Tablet', '2025-03-07', 10, 'Pics', 3, 30, 10, '03/13/2023'),
(163, 'CA-2299009', 'Napa Extra', 'Tablet', '2025-03-07', 10, 'Pics', 3, 30, 10, '03/14/2023'),
(164, 'CA-2299009', 'Diclofenac', 'Tablet', '2025-03-07', 6, 'Pics', 15, 90, 30, '03/14/2023');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_details`
--

CREATE TABLE `purchase_details` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(13) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `medicine_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `expire_date` date NOT NULL,
  `qty` bigint(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `cost` bigint(11) NOT NULL,
  `amount` bigint(11) NOT NULL,
  `profit_amount` bigint(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_details`
--

INSERT INTO `purchase_details` (`id`, `invoice_number`, `supplier`, `company`, `medicine_name`, `category`, `expire_date`, `qty`, `type`, `cost`, `amount`, `profit_amount`, `date`) VALUES
(162, 'CA-2299009', 'No Supplier', 'No Brand', 'Napa Extra', 'Tablet', '2025-03-07', 10, 'Pics', 2, 20, 10, '03/14/2023'),
(163, 'CA-2299009', 'Supplier-1', 'Square', 'Diclofenac', 'Tablet', '2025-03-07', 3, 'Pics', 10, 30, 15, '03/14/2023');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(15) NOT NULL,
  `supplier` varchar(30) NOT NULL,
  `company` varchar(30) NOT NULL,
  `total_qty` varchar(10) NOT NULL,
  `discount` varchar(10) NOT NULL,
  `paid` varchar(10) NOT NULL,
  `due` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`id`, `invoice_number`, `supplier`, `company`, `total_qty`, `discount`, `paid`, `due`, `date`, `status`) VALUES
(1, 'CA-9909399', 'Supplier-1', 'Beximco', '', 'Napa Extra', '', '', '0000-00-00', ''),
(2, 'CA-9909399', 'Supplier-1', 'Beximco', '', 'Napa Extra', '', '', '0000-00-00', ''),
(3, 'CA-9909399', 'Supplier-1', 'Beximco', '', 'Napa Extra', '', '', '0000-00-00', 'Hold'),
(4, 'CA-9909399', 'Supplier-1', 'Beximco', '', 'Napa Extra', '', '', '0000-00-00', 'Hold'),
(5, 'CA-9909399', 'Supplier-1', 'Beximco', '', 'Napa Extra', '', '', '0000-00-00', 'Hold'),
(6, 'CA-9909399', 'No Supplier', 'No Brand', '', 'Napa Extra', '', '', '0000-00-00', 'Hold'),
(7, 'CA-9909399', 'No Supplier', 'No Brand', '', 'Napa Extra', '', '', '0000-00-00', 'Hold');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `invoice_number` varchar(13) NOT NULL,
  `medicines` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `total_amount` bigint(11) NOT NULL,
  `total_profit` bigint(11) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_number`, `medicines`, `quantity`, `total_amount`, `total_profit`, `Date`) VALUES
(32, 'CA-2909002', 'Napa Extra', '10(Pics)', 30, 10, '2023-03-09'),
(33, 'CA-2090939', 'Napa Extra', '10(Pics)', 30, 10, '2023-03-09'),
(34, 'CA-0932032', 'Napa Extra', '3(Pics)', 9, 3, '2023-03-09'),
(35, 'CA-3000990', 'Diclofenac', '5(Pics)', 75, 25, '2023-03-09'),
(36, 'CA-0220929', 'Diclofenac', '2(Pics)', 30, 10, '2023-03-09');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(100) NOT NULL,
  `bar_code` varchar(255) NOT NULL,
  `medicine_name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `used_quantity` int(100) NOT NULL,
  `remain_quantity` int(100) NOT NULL,
  `act_remain_quantity` int(10) NOT NULL,
  `register_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `company` varchar(100) NOT NULL,
  `sell_type` varchar(100) NOT NULL,
  `actual_price` int(100) NOT NULL,
  `selling_price` int(100) NOT NULL,
  `profit_price` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `bar_code`, `medicine_name`, `category`, `quantity`, `used_quantity`, `remain_quantity`, `act_remain_quantity`, `register_date`, `expire_date`, `company`, `sell_type`, `actual_price`, `selling_price`, `profit_price`, `status`) VALUES
(38, '123', 'Napa Extra', 'Tablet', 1000, 40, 1130, 970, '2023-03-07', '2025-03-07', 'com1', 'Pics', 2, 3, '1(50%)', 'Available'),
(39, '321', 'Diclofenac', 'Tablet', 500, 13, 500, 493, '2023-03-07', '2025-03-07', 'com2', 'Pics', 10, 15, '5(50%)', 'Available'),
(40, '234', 'Test', 'Tablet', 12, 0, 12, 12, '2023-03-01', '2025-03-06', 'com1', 'Pics', 5, 7, '2(40%)', 'Available');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `address`, `phone`, `status`) VALUES
(4, 'No Supplier', '-', '-', 'Active'),
(5, 'Supplier-1', '-', '-', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on_hold`
--
ALTER TABLE `on_hold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_details`
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `on_hold`
--
ALTER TABLE `on_hold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
