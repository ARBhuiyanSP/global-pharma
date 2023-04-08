-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2023 at 06:41 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

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
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'SYRUP/LIQUID'),
(2, 'TABLET/PILLS'),
(3, 'CAPSUL'),
(4, 'INJECTION'),
(5, 'INHALER'),
(6, 'EYE DROP'),
(7, 'NASAL SPRAY'),
(8, 'CREAM/OINMENT'),
(9, 'SUPPOSITORIES'),
(10, 'BABY FOOD'),
(11, 'INFUSION'),
(12, 'NAPKIN'),
(13, 'POWDER'),
(14, 'SHUTA'),
(15, 'O T .ITEM'),
(16, 'DROP'),
(17, 'SALINE'),
(18, 'SPRAY'),
(19, 'INSULIN'),
(20, 'MINERAL WATER'),
(21, 'SURGICAL'),
(22, 'TISSUE'),
(23, 'SHAMPOO');

-- --------------------------------------------------------

--
-- Table structure for table `inv_buyer`
--

CREATE TABLE `inv_buyer` (
  `BuyerID` varchar(12) NOT NULL,
  `BuyerCompany` varchar(50) DEFAULT NULL,
  `BuyerAddress1` varchar(100) DEFAULT NULL,
  `BuyerAddress2` varchar(50) DEFAULT NULL,
  `BuyerCity` varchar(25) DEFAULT NULL,
  `BuyerCountry` varchar(30) DEFAULT NULL,
  `ContactPerson` varchar(30) DEFAULT NULL,
  `BPosition` varchar(25) DEFAULT NULL,
  `BuyerPhone1` varchar(15) DEFAULT NULL,
  `BuyerPhone2` varchar(50) DEFAULT NULL,
  `BuyerFax1` varchar(50) DEFAULT NULL,
  `BuyerFax2` varchar(50) DEFAULT NULL,
  `BuyerEmail` varchar(50) DEFAULT NULL,
  `BuyerOpBalance` float DEFAULT NULL,
  `BuyerBalanceType` varchar(3) DEFAULT NULL,
  `OpBalanceDate` timestamp(6) NULL DEFAULT NULL,
  `BuyerOpBalanceAu` float DEFAULT NULL,
  `BuyerBalanceTypeAu` varchar(3) DEFAULT NULL,
  `OpBalanceDateAu` timestamp(6) NULL DEFAULT NULL,
  `SPO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_buyerbalance`
--

CREATE TABLE `inv_buyerbalance` (
  `BBRefID` varchar(50) DEFAULT NULL,
  `BBDate` timestamp(6) NULL DEFAULT NULL,
  `BBBuyerID` varchar(50) DEFAULT NULL,
  `BBDrAmount` float DEFAULT NULL,
  `BBCrAmount` float DEFAULT NULL,
  `BBRemark` varchar(255) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_customer`
--

CREATE TABLE `inv_customer` (
  `id` int(15) NOT NULL,
  `customername` varchar(150) NOT NULL,
  `Address` int(150) NOT NULL,
  `Phone` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `inv_issue`
--

CREATE TABLE `inv_issue` (
  `id` int(11) NOT NULL,
  `IssueID` varchar(20) NOT NULL,
  `IssueDate` date DEFAULT NULL,
  `BuyerID` varchar(12) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IssueType` varchar(50) DEFAULT NULL,
  `InWord` varchar(255) DEFAULT NULL,
  `TotalPrice` float DEFAULT NULL,
  `DiscountAmt` float DEFAULT NULL,
  `PaidAmt` float DEFAULT NULL,
  `Due` float DEFAULT NULL,
  `GrandAmt` float DEFAULT NULL,
  `TotalProfit` float DEFAULT NULL,
  `CName` varchar(50) DEFAULT 'Nill',
  `Mob` varchar(50) DEFAULT NULL,
  `GoDownIss` varchar(50) DEFAULT NULL,
  `PID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inv_issue`
--

INSERT INTO `inv_issue` (`id`, `IssueID`, `IssueDate`, `BuyerID`, `Remarks`, `IssueType`, `InWord`, `TotalPrice`, `DiscountAmt`, `PaidAmt`, `Due`, `GrandAmt`, `TotalProfit`, `CName`, `Mob`, `GoDownIss`, `PID`) VALUES
(15, 'INV-001', '2023-04-07', '1', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(16, 'INV-002', '2023-04-07', '2', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(17, 'INV-003', '2023-04-07', '3', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(18, 'INV-004', '2023-04-07', '5', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(25, 'INV-005', '2023-04-07', '2', '', '', '', 0, 0, 0, 0, 0, 0, '', '', '', ''),
(26, 'INV-006', '2023-04-08', '', '', '', '', 3310, 10, 3000, 300, 0, 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `inv_issuedetail`
--

CREATE TABLE `inv_issuedetail` (
  `id` int(11) NOT NULL,
  `IssueID` varchar(20) DEFAULT NULL,
  `MaterialID` varchar(9) DEFAULT NULL,
  `IssueQty` float DEFAULT NULL,
  `IssuePrice` float DEFAULT NULL,
  `IFree` float DEFAULT NULL,
  `TotalIssue` float DEFAULT NULL,
  `ProfitItem` float DEFAULT NULL,
  `QtyCtnwise` float DEFAULT NULL,
  `CartonRate` float DEFAULT NULL,
  `SupplierID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inv_issuedetail`
--

INSERT INTO `inv_issuedetail` (`id`, `IssueID`, `MaterialID`, `IssueQty`, `IssuePrice`, `IFree`, `TotalIssue`, `ProfitItem`, `QtyCtnwise`, `CartonRate`, `SupplierID`) VALUES
(28, 'INV-001', 'FIBRELAX ', 5, 400, 0, 2000, 280, 0, 0, ''),
(29, 'INV-001', 'HIMALAYA ', 1, 220, 0, 220, 22, 0, 0, ''),
(30, 'INV-002', 'FIBRELAX ', 5, 400, 0, 2000, 280, 0, 0, ''),
(31, 'INV-002', 'FIBRELAX ', 2, 400, 0, 800, 112, 0, 0, ''),
(32, 'INV-003', 'FIBRELAX ', 3, 400, 0, 1200, 168, 0, 0, ''),
(33, 'INV-004', 'FIBRELAX ', 5, 400, 0, 2000, 280, 0, 0, ''),
(34, 'INV-005', 'FIBRELAX ', 2, 400, 0, 800, 112, 0, 0, ''),
(35, 'INV-006', 'FIBRELAX ', 8, 400, 0, 3200, 448, 0, 0, ''),
(36, 'INV-006', 'ENGLISH A', 1, 110, 0, 110, 15, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `inv_materialbalance`
--

CREATE TABLE `inv_materialbalance` (
  `id` int(11) NOT NULL,
  `MBRefID` varchar(20) DEFAULT NULL,
  `MBMaterialID` varchar(15) DEFAULT NULL,
  `MBDate` timestamp(6) NULL DEFAULT NULL,
  `MBInQty` float DEFAULT NULL,
  `MBInVal` float DEFAULT NULL,
  `MBInFree` float DEFAULT NULL,
  `MBOutQty` float DEFAULT NULL,
  `MBOutVal` float DEFAULT NULL,
  `MBOutFree` float DEFAULT NULL,
  `MBPrice` float DEFAULT NULL,
  `MBPriceUnit` float DEFAULT NULL,
  `MBType` varchar(50) DEFAULT NULL,
  `GoDown` varchar(30) DEFAULT NULL,
  `MBPcs` float DEFAULT NULL,
  `MBPcsIn` float DEFAULT NULL,
  `MBPcsOut` float DEFAULT NULL,
  `SupplierID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inv_materialbalance`
--

INSERT INTO `inv_materialbalance` (`id`, `MBRefID`, `MBMaterialID`, `MBDate`, `MBInQty`, `MBInVal`, `MBInFree`, `MBOutQty`, `MBOutVal`, `MBOutFree`, `MBPrice`, `MBPriceUnit`, `MBType`, `GoDown`, `MBPcs`, `MBPcsIn`, `MBPcsOut`, `SupplierID`) VALUES
(44, 'OP', 'FIBRELAX 130MG', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(45, 'OP', 'NATLAX 100MG', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(46, 'OP', 'FIBERLAX ULTRA', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(47, 'OP', 'HIMALAYA SHAMPO', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(48, 'OP', 'ENGLISH ANTILIC', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(49, 'OP', 'ENGLISH ANTILIC', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(50, 'OP', 'ENGLISH ANTILIC', '2023-04-04 18:00:00.000000', 0, 0, 0, 1, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(51, 'OP', 'FECILAX POWDER', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(52, 'OP', 'RADIGEL 120MG', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(53, 'OP', 'DAY CREAM', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(54, 'OP', 'GASTRAOLAX', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(55, 'OP', 'GASTRAOLAX SACH', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(56, 'OP', 'GASTRAOLAX SACH', '2023-04-04 18:00:00.000000', 0, 0, 0, 1, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(57, 'OP', 'NIZIDER 2% SHAM', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(58, 'OP', 'CLOPIROX SHAMPO', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(59, 'OP', 'XEROSOFT', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(60, 'OP', 'DAN-K SHAMPOO', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(61, 'OP', 'DAN-K SHAMPOO', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(62, 'OP', 'DAN-K SHAMPOO', '2023-04-04 18:00:00.000000', 0, 0, 0, 2, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(63, 'OP', 'DAN-K SHAMPOO', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(64, 'OP', 'DAN-K SHAMPOO', '2023-04-04 18:00:00.000000', 0, 0, 0, 2, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(65, 'OP', 'NATLAX 100MG', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(66, 'OP', 'NATLAX 100MG', '2023-04-04 18:00:00.000000', 0, 0, 0, 1, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(67, 'OP', 'NATLAX 100MG', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(68, 'OP', 'NATLAX 100MG', '2023-04-04 18:00:00.000000', 0, 0, 0, 1, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(69, 'OP', 'DANCEL SHAMPOO', '2023-04-04 18:00:00.000000', 3, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(70, 'OP', 'KERASOL FCL LOT', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(71, 'OP', 'SELECT PLUS SHA', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(72, 'OP', 'CEFTRON 250MG', '2023-04-04 18:00:00.000000', 6, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(73, 'OP', 'AFRIN', '2023-04-04 18:00:00.000000', 50, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(74, 'OP', 'BETAMESON-N CRE', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(75, 'OP', 'CLOSALIC OINTME', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(76, 'OP', 'HIMALAYA SHAMPO', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(77, 'OP', 'HIMALAYA SHAMPO', '2023-04-04 18:00:00.000000', 0, 0, 0, 2, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(78, 'OP', 'CURAFIN CREAM', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(79, 'OP', 'BURNA CREAM', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(80, 'OP', 'BETSON-N CREAM', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(81, 'OP', 'METALONE PLUS', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(82, 'OP', 'LOTEPRO DS', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(83, 'OP', 'LEVOXIN TS', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(84, 'OP', 'GENTOSEP CREAM', '2023-04-04 18:00:00.000000', 5, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(85, 'OP', 'FACID CREAM', '2023-04-04 18:00:00.000000', 4, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(86, 'OP', 'TERMIDER', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(87, 'OP', 'ZOLCORT', '2023-04-04 18:00:00.000000', 3, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(88, 'OP', 'GENTIN CREAM', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(89, 'OP', 'ECLO CREAM', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(90, 'OP', 'FUNGIN B CREAM', '2023-04-04 18:00:00.000000', 3, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(91, 'OP', 'TROPICOLO OINTM', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(92, 'OP', 'TROPICOLO NN', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(93, 'OP', 'ARISTODERM CREA', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(94, 'OP', 'COSMOTRIN CREAM', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(95, 'OP', 'TERBIFIN 10G', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(96, 'OP', 'GENACYN 0.1% ', '2023-04-04 18:00:00.000000', 5, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(97, 'OP', 'NAFGAL', '2023-04-04 18:00:00.000000', 3, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(98, 'OP', 'CLOSALIC OINTME', '2023-04-04 18:00:00.000000', 5, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(99, 'OP', 'UNIGAL CREAM10G', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(100, 'OP', 'UNIGAL HC CREAM', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(101, 'OP', 'LOTEBA 5ML', '2023-04-04 18:00:00.000000', 3, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(102, 'OP', 'CIPRO A5ML', '2023-04-04 18:00:00.000000', 3, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(103, 'OP', 'CIPRO A 5ML', '2023-04-04 18:00:00.000000', 4, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(104, 'OP', 'CIPRO A 5ML', '2023-04-04 18:00:00.000000', 0, 0, 0, 3, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(105, 'OP', 'CANDISTIN', '2023-04-04 18:00:00.000000', 2, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(106, 'OP', 'LOTEFLAM T 5ML', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(107, 'OP', 'INVENTI-D 5ML', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(108, 'OP', 'FIBRELAX 130MG', '2023-04-04 18:00:00.000000', 1, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(109, 'OP', 'FIBRELAX 130MG', '2023-04-04 18:00:00.000000', 0, 0, 0, 1, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(110, 'OP', 'FIBRELAX 130MG', '2023-04-04 18:00:00.000000', 100, 0, 0, 0, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(111, 'OP', 'FIBRELAX 130MG', '2023-04-04 18:00:00.000000', 0, 0, 0, 1, 0, 0, 0, 0, 'OP', '', 0, 0, 0, ''),
(112, 'INV-001', 'FIBRELAX 130MG', '0000-00-00 00:00:00.000000', 0, 0, 0, 5, 400, 0, 0, 0, 'Issue', '', 0, 0, 0, ''),
(113, 'INV-001', 'HIMALAYA SHAMPO', '0000-00-00 00:00:00.000000', 0, 0, 0, 1, 220, 0, 0, 0, 'Issue', '', 0, 0, 0, ''),
(114, 'INV-002', 'FIBRELAX 130MG', '0000-00-00 00:00:00.000000', 0, 0, 0, 5, 400, 0, 0, 0, 'Issue', '', 0, 0, 0, ''),
(115, 'INV-002', 'FIBRELAX 130MG', '0000-00-00 00:00:00.000000', 0, 0, 0, 2, 400, 0, 0, 0, 'Issue', '', 0, 0, 0, ''),
(116, 'INV-003', 'FIBRELAX 130MG', '0000-00-00 00:00:00.000000', 0, 0, 0, 3, 400, 0, 0, 0, 'Issue', '', 0, 0, 0, ''),
(117, 'INV-004', 'FIBRELAX 130MG', '0000-00-00 00:00:00.000000', 0, 0, 0, 5, 400, 0, 0, 0, 'Issue', '', 0, 0, 0, ''),
(118, 'INV-005', 'FIBRELAX 130MG', '0000-00-00 00:00:00.000000', 0, 0, 0, 2, 400, 0, 0, 0, 'Issue', '', 0, 0, 0, ''),
(119, 'INV-006', 'FIBRELAX 130MG', '0000-00-00 00:00:00.000000', 0, 0, 0, 8, 400, 0, 0, 0, 'Issue', '', 0, 0, 0, ''),
(120, 'INV-006', 'ENGLISH ANTILIC', '0000-00-00 00:00:00.000000', 0, 0, 0, 1, 110, 0, 0, 0, 'Issue', '', 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `inv_paymentfrom`
--

CREATE TABLE `inv_paymentfrom` (
  `MRNo` varchar(20) NOT NULL,
  `DDate` timestamp(6) NULL DEFAULT NULL,
  `DID` varchar(12) DEFAULT NULL,
  `PayType` varchar(12) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `Amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_purchasereturn`
--

CREATE TABLE `inv_purchasereturn` (
  `MRRNo` varchar(12) NOT NULL,
  `MRRDate` timestamp(6) NULL DEFAULT NULL,
  `SupplierID` varchar(12) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `ReceiveType` varchar(50) DEFAULT NULL,
  `ReceiveTotal` float DEFAULT NULL,
  `InWord` varchar(255) DEFAULT NULL,
  `GoDownA` varchar(30) DEFAULT NULL,
  `DiscountRate` float DEFAULT NULL,
  `DiscountAmount` float DEFAULT NULL,
  `GrandTotAfrDis` float DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_purchasereturndetail`
--

CREATE TABLE `inv_purchasereturndetail` (
  `MRRNo` varchar(12) DEFAULT NULL,
  `MaterialID` varchar(9) DEFAULT NULL,
  `ReceiveQty` float DEFAULT NULL,
  `UnitPrice` float DEFAULT NULL,
  `Free` float DEFAULT NULL,
  `TotalReceive` float DEFAULT NULL,
  `TotalPCS` float DEFAULT NULL,
  `ItemName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_receive`
--

CREATE TABLE `inv_receive` (
  `id` int(11) NOT NULL,
  `MRRNo` varchar(12) NOT NULL,
  `MRRDate` timestamp(6) NULL DEFAULT NULL,
  `SupplierID` varchar(12) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `ReceiveType` varchar(50) DEFAULT NULL,
  `ReceiveTotal` float DEFAULT NULL,
  `InWord` varchar(255) DEFAULT NULL,
  `GoDownA` varchar(30) DEFAULT NULL,
  `DiscountRate` float DEFAULT NULL,
  `DiscountAmount` float DEFAULT NULL,
  `GrandTotAfrDis` float DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_receivedetail`
--

CREATE TABLE `inv_receivedetail` (
  `id` int(11) NOT NULL,
  `MRRNo` varchar(12) DEFAULT NULL,
  `MaterialID` varchar(9) DEFAULT NULL,
  `ReceiveQty` float DEFAULT NULL,
  `UnitPrice` float DEFAULT NULL,
  `Free` float DEFAULT NULL,
  `TotalReceive` float DEFAULT NULL,
  `TotalPCS` float DEFAULT NULL,
  `ItemName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_returnout`
--

CREATE TABLE `inv_returnout` (
  `ReturnOutID` varchar(20) NOT NULL,
  `ReturnOutDate` timestamp(6) NULL DEFAULT NULL,
  `ROSupplierID` varchar(10) DEFAULT NULL,
  `ReturnOutTotal` float DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_returnoutdetail`
--

CREATE TABLE `inv_returnoutdetail` (
  `RODReturnID` varchar(20) DEFAULT NULL,
  `RODMaterialID` varchar(15) DEFAULT NULL,
  `ReturnQty` float DEFAULT NULL,
  `ReturnPrice` float DEFAULT NULL,
  `RFree` float DEFAULT NULL,
  `RODReturnTotal` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_salesreturn`
--

CREATE TABLE `inv_salesreturn` (
  `IssueID` varchar(20) NOT NULL,
  `IssueDate` timestamp(6) NULL DEFAULT NULL,
  `BuyerID` varchar(12) DEFAULT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `IssueType` varchar(50) DEFAULT NULL,
  `InWord` varchar(255) DEFAULT NULL,
  `TotalPrice` float DEFAULT NULL,
  `PaidAmt` float DEFAULT NULL,
  `Due` float DEFAULT NULL,
  `GrandAmt` float DEFAULT NULL,
  `TotalProfit` float DEFAULT NULL,
  `CName` varchar(50) DEFAULT NULL,
  `Mob` varchar(50) DEFAULT NULL,
  `DiscountPer` float DEFAULT NULL,
  `DiscountAmt` float DEFAULT NULL,
  `GoDownIss` varchar(50) DEFAULT NULL,
  `PID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_salesreturndetail`
--

CREATE TABLE `inv_salesreturndetail` (
  `IssueID` varchar(20) DEFAULT NULL,
  `MaterialID` varchar(9) DEFAULT NULL,
  `IssueQty` float DEFAULT NULL,
  `IssuePrice` float DEFAULT NULL,
  `IFree` float DEFAULT NULL,
  `TotalIssue` float DEFAULT NULL,
  `ProfitItem` float DEFAULT NULL,
  `QtyCtnwise` float DEFAULT NULL,
  `CartonRate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_supplier`
--

CREATE TABLE `inv_supplier` (
  `id` int(11) NOT NULL,
  `SupplierID` varchar(12) DEFAULT NULL,
  `SupplierCompany` varchar(50) DEFAULT NULL,
  `SupplierAddress1` varchar(150) DEFAULT NULL,
  `SupplierAddress2` varchar(80) DEFAULT NULL,
  `SupplierCity` varchar(25) DEFAULT NULL,
  `SupplierCountry` varchar(30) DEFAULT NULL,
  `ContactPerson` varchar(30) DEFAULT NULL,
  `SPosition` varchar(25) DEFAULT NULL,
  `SupplierPhone1` varchar(80) DEFAULT NULL,
  `SupplierPhone2` varchar(50) DEFAULT NULL,
  `SupplierFax1` varchar(50) DEFAULT NULL,
  `SupplierFax2` varchar(50) DEFAULT NULL,
  `SupplierEmail` varchar(50) DEFAULT NULL,
  `SupplierType` varchar(8) DEFAULT NULL,
  `SupplierOpBalance` float DEFAULT NULL,
  `SupplierBalanceType` varchar(5) DEFAULT NULL,
  `OpBalanceDate` timestamp(6) NULL DEFAULT NULL,
  `SupplierOpBalanceAu` float DEFAULT NULL,
  `SupplierBalanceTypeAu` varchar(5) DEFAULT NULL,
  `OpBalanceDateAu` timestamp(6) NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inv_supplier`
--

INSERT INTO `inv_supplier` (`id`, `SupplierID`, `SupplierCompany`, `SupplierAddress1`, `SupplierAddress2`, `SupplierCity`, `SupplierCountry`, `ContactPerson`, `SPosition`, `SupplierPhone1`, `SupplierPhone2`, `SupplierFax1`, `SupplierFax2`, `SupplierEmail`, `SupplierType`, `SupplierOpBalance`, `SupplierBalanceType`, `OpBalanceDate`, `SupplierOpBalanceAu`, `SupplierBalanceTypeAu`, `OpBalanceDateAu`) VALUES
(1, 'SUL-00001', 'BEXIMCO PHARMACEUTICALS LTD.', '19 Dhanmondi R/A, Road No. 7, Dhaka-1205', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02-8619 151 (5 lines)', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(2, 'SUL-00002', 'ESKAYEF BANGLADESH LIMITED', 'Gulshan Tower, Plot No. 31 Road No. 53, Gulshan North C/A', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 8818327, 8814662', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(3, 'SUL-00003', 'ACME LABORATORIES LTD.', 'Court de la ACME 1/4, Mirpur Road, Kallayanpur, Dhaka-1207', 'NA', 'NA', 'NA', 'NA', 'NA', '+88-02-9004194-6', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(4, 'SUL-00004', 'ARISTOPHARMA LTD.', '7, Purana Paltan Line, Dhaka-1000', 'NA', 'NA', 'NA', 'NA', 'NA', '+88-02-9351691-3, 88-02-7445284', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Cr.', NULL, NULL, NULL, NULL),
(5, 'SUL-00005', 'DRUG INTERNATIONAL LTD.', 'KHWAJA ENAYETPURI (R) TOWER, 17, Green Road, Dhaka-1205', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 9662611, +88 02 9626112', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(6, 'SUL-00047', 'SANDOZ', '110 TAJGON , DHAKA\r\n01670925684', NULL, 'NA', 'NA', 'NA', 'NA', '01670925684', NULL, 'NA', NULL, 'NA', 'Local', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(7, 'SUL-00048', 'VERITAS PHARMACEUTICALS LTD', 'H/101 HAZRAT SHAHJALAL INT. ARIPROT ROAD\r\nBANANI Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '01755635910', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(8, 'SUL-00006', 'DELTA PHARMA LIMITED', 'House # 501, Road # 34,New DOHS, Mohakhali, Dhaka-1205', 'NA', 'NA', 'NA', 'NA', 'NA', '+88-02 9892192, 8711645-7', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(9, 'SUL-00007', 'ACI LIMITED', 'ACI Centre 245, Tejgaon Industrial Area Dhaka-1208', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', 'NA', 'NA', 'NA', 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(10, 'SUL-00049', 'SHARIF PHARMACEUTICALS LTD', 'HOUSE 15/C, ROAD - 33 DHANMONDI \r\nDHAKA\r\n', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(11, 'SUL-00050', 'LIBRA INFUSIONS LID', 'DHAKA', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(12, 'SUL-00008', 'INCEPTA PHARMACEUTICALS LTD.', '40 Shahid Tajuddin Ahmed Sarani Tejgaon I/A, Dhaka-1208', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 8891688 - 703', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(13, 'SUL-00009', 'SQUARE PHARMACEUTICALS LTD.', 'SQUARE Centre, 48, Mohakhali C/A,Dhaka - 1212', 'NA', 'NA', 'NA', 'NA', 'NA', '+88-02-8859007, +88-02-8833047', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(14, 'SUL-00010', 'APEX PHARMA LIMITED.', 'House # 06, Road # 137,Block # SE (D), Gulshan, Dhaka-1212', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 9863026, 8856717', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Cr.', NULL, NULL, NULL, NULL),
(15, 'SUL-00011', 'GENERAL PHARMACEUTICALS LTD.', 'House No. 48A , Road No. 11A Dhanmondi R/A , Dhaka 1209', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02-9132594, 8120243', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(16, 'SUL-00012', 'HEALTHCARE PHARMACEUTICALS LIMITED', '71-72 Old Elephant Road Wage Earners Complex, Eskaton Dhaka-1000', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 9360877, 8311190', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(17, 'SUL-00013', 'SANOFI-AVENTIS BANGLADESH LIMITED.', '6/2A Segunbagicha Dhaka 1000', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02-9562893', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(18, 'SUL-00051', 'PHARMACIL LIMITED', '22/1 DHANMONDI DHAKA\r\n', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(19, 'SUL-00052', 'REMEX LABORATORIRS', 'DHAKA', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(20, 'SUL-00014', 'GLAXOSMITHKLINE(GSK) BANGLADESH LIMITED', 'House # 2A, Road # 138 Gulshan # 1, Dhaka - 1212', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 885 8870', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(21, 'SUL-00054', 'CHU CHU COMPANY', 'GAZIPUR', NULL, 'NA', 'NA', 'NA', 'NA', '01716815230', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(22, 'SUL-00015', 'GLOBE PHARMACEUTICALS LTD.', 'House 251/L,Road 13/A, Dhanmondi R/A Dhaka-1209', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02-8110460,8128018,9140848,9121562', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(23, 'SUL-00016', 'GATCO PHARMACEUTICALS LTD', 'Gaco House, 65, Dilkusha C/A, (1st Floor), Dhaka -1000', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 9557142, 9551405', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(24, 'SUL-00055', 'ASTRO PHARMACEUTICALS LTD', 'Dhaka BANGLADESH\r\n', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(25, 'SUL-00057', 'ETLAB INDUSTRIES (UNANI)', 'Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(26, 'SUL-00059', 'PHARMA CURE BD', 'DHAKA\r\n', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(27, 'SUL-00060', 'MANSONS PHARMACEUTICALS [UNANI]', 'DHAKA\r\n', NULL, 'NA', 'NA', 'NA', 'NA', '01712-774380', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(28, 'SUL-00017', 'IBN SINA PHARMACEUTICAL INDUSTRY LTD.', 'H # 41, Road # 10/A, Dhanmondi R/A Dhaka-1209', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 9114710, 9117496, 9138617, 9132521', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(29, 'SUL-00018', 'JAYSON PHARMACEUTICALS LTD.', '5/9, Block-A, Lalmatia, Dhaka-1207', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 9137038, 9143898', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(30, 'SUL-00019', 'KUMUDINI PHARMA LTD. (KPL)', '72, Sirajuddowla Road Narayanganj-1400', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 9716520, 9716815, 9713640', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(31, 'SUL-00020', 'RADIANT PHARMACEUTICALS LIMITED.', '22/1 Dhanmondi, Road No. 2 Dhaka-1205', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 9612481-6', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(32, 'SUL-00021', 'POPULAR PHARMACEUTICALS LTD.', 'Sheltech Panthokunjo 17 Shukrabad, West Panthopath Dhaka 1207', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 9128976, 9101730-32, 9102850-53', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(33, 'SUL-00022', 'BEACON PHARMACEUTICALS LIMITED', '153-154, Tejgaon l/A Dhaka-1208', 'NA', 'NA', 'NA', 'NA', 'NA', '+88-02-8870133, 8870134', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(34, 'SUL-00023', 'CONCORD PHARMACEUTICALS LIMITED', 'Baitul Hossain Building ( 1st Floor ) 27, Dilkusha C/A Dhaka-1000', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02-7173300 , +88 027172554', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(35, 'SUL-00024', 'LABAID PHARMACEUTICALS LIMITED', '12 Green Square, Green Road, Dhaka – 1205', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 8617066', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(36, 'SUL-00025', 'NIPRO JMI PHARMA LIMITED', '7/A Shantibag Dhaka 1217', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 9346630, 8318375, 9333102, 8318733', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(37, 'SUL-00026', 'NOVARTIS (BANGLADESH) LIMITED', 'AHN Tower (7th to 9th Floor), 13 Biponon C/A Bir Uttam CR Dutta Rd, Dhaka', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 8615302', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(38, 'SUL-00027', 'NUVISTA PHARMA LIMITED', 'Mascot Plaza, 8th Floor 107/A, Sonargaon Janapath Sector – 7, Uttara C.A Dhaka-1230', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 891 9811', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(39, 'SUL-00028', 'RENATA LIMITED', 'Renata Limited, Plot No. 1, Milk Vita Road, Section-7, Mirpur, Dhaka-1216', 'NA', 'NA', 'NA', 'Md Abdullah Al Mamun', 'NA', '+88 02 8011012, 8011013', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(40, 'SUL-00029', 'ZENITH PHARMACEUTICALS LIMITED', '42, Dilkusha C/A (5th floor), Dhaka-1000', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 7176357, 7172980', 'NA', 'NA', 'NA', 'NA', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(41, 'SUL-00030', 'UNIMED & UNIHEALTH MANUFACTURERS LTD.', '5/8, Bloci-C, Lalmatia, Dhaka-1207', 'NA', 'NA', 'NA', 'NA', 'NA', '+88 02 8120718, 9128192-3', 'NA', 'NA', 'NA', 'unihealth@gmail.com', 'Local', 0, 'Dr.', NULL, NULL, NULL, NULL),
(42, 'SUL-00031', 'OPSONIN', 'N/A\r\nN/A', NULL, '', '', 'N/A', '', 'N/A', NULL, '', NULL, 'N/A', '', 0, 'Cr.', '2013-11-30 18:00:00.000000', NULL, NULL, NULL),
(43, 'SUL-00061', 'ACI CONSUMER LTD', 'ACI Centre 245, Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(44, 'SUL-00032', 'ALCO PHARMA LTD', 'N/A', NULL, '', '', '', '', '', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(45, 'SUL-00033', 'ORION PHARMA LTD', 'N/A', NULL, '', '', '', '', '', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(46, 'SUL-00062', 'P & G M/S SOUMIC STORES', 'DHAKA', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(47, 'SUL-00034', 'PACIFIC PHARMACITICALS LTD', 'N/A', NULL, '', '', '', '', '', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(48, 'SUL-00063', 'HAMDARD LABORATORIES (WAQF)', 'NA', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(49, 'SUL-00064', 'NIPA PHARMACEUTICALS', 'Dhaka-1216', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(50, 'SUL-00065', 'INTERNATIONAL AGENCIES BD LIMITED', 'Dhaka-1000\r\n', NULL, 'NA', 'NA', 'NA', 'NA', '+88 08311830', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(51, 'SUL-00035', 'ZISKA PHARMACEUTICALS', 'N/A', NULL, '', '', '', '', '', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(52, 'SUL-00036', 'R A K PHARMACEUTICALS L T D', 'N/A', NULL, '', '', '', '', '', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(53, 'SUL-00037', 'LEON PHARMACEUTICALS LTD', 'HOUSE. 15 ROAD 02 SECTOR- 4\r\nUTTARA , DHAKA', NULL, '', '', '', '', '01847051027', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(54, 'SUL-00038', 'KEMIKO PHARMACEUTICALS L T D', 'N/A', NULL, '', '', '', '', '', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(55, 'SUL-00039', 'ORION INFUSION', 'N/A', NULL, '', '', '', '', '', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(56, 'SUL-00040', 'PRINCE PHARMA', 'N/A', NULL, '', '', '', '', '', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(57, 'SUL-00041', 'NAVANA PHARMACEUTICALS LTD', 'N/A', NULL, '', '', '', '', '', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(58, 'SUL-00042', 'DENEX INTERNATIONAL', 'REFER NUR SURGICAL, DHAKA', NULL, '', '', 'MD ABDULLAH AL MAMUN', '', '01714-395485', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(59, 'SUL-00043', 'BIOPHARMA LTD', '7/16 BLOCK-B LALMATIA DHAKA-1207', NULL, '', '', '01714047155', '', '01714047155', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(60, 'SUL-00044', 'SOMATEC PHARMACEUTICALS LTD', 'SEGUN BAGICHA, DHAKA- 1000', NULL, '', '', '', '', '01966600129', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(61, 'SUL-00045', 'RANGS PHARMACEUTICALS LTD', '42.SHAHID TAJUDDIN AHMED SWARANI\r\nTEJGON , DHAKA', NULL, '', '', 'MEHEDI HASAN SHOHAG', '', '01799297557', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(62, 'SUL-00046', 'OPEN MARKET', 'NA', NULL, '', '', 'NA', '', '01', NULL, '', NULL, '', '', 0, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(63, 'SUL-00053', 'SQUARE TOILETRISE LTD', 'DHAKA', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(64, 'SUL-00056', 'PHARMATECH CORPORATION', '1/2 NURJAHAN ROAD , Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(65, 'SUL-00058', 'SUN PHARMACEUTICAL (BANGLADESH) LIMITED', 'Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(66, 'SUL-00066', 'MINERAL WATER', 'Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(67, 'SUL-00067', 'SUMAYA SURGICAL', 'Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', 'NA', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(68, 'SUL-00068', 'RECKITT BENCKISER BD LTD', 'Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(69, 'SUL-00069', 'BIOTAC INTERNATIONAL', 'Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(70, 'SUL-00070', 'PERSONAL TISSUE', 'Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(71, 'SUL-00071', 'FAY COTTON BUDS', 'Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(72, 'SUL-00072', 'KALLOL INDUSTRIES LTD', 'ACI Centre 245, Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(73, 'SUL-00073', 'GLAXO CONSUMER LTD', 'NA', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(74, 'SUL-00074', 'DAYEE PHARMACEUTICAS LED', 'Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(75, 'SUL-00075', 'BIO CARE PHARMA', 'ACI Centre 245, Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(76, 'SUL-00076', 'OPSO SALINE LIMITED', 'Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(77, 'SUL-00077', 'MULTI BRANDS LTD', 'ACI Centre 245, Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(78, 'SUL-00078', 'ANFORDS BANGLADESH LTD', 'ACI Centre 245, Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(79, 'SUL-00079', 'MEDINET PHARMA', 'ACI Centre 245, Tejgaon Industrial Area Dhaka-1208', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(80, 'SUL-00080', 'BANGLADESH PHARMACEUTICALS (AYU)', 'NA', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL),
(81, 'SUL-00081', 'ARISTOCRAT CARE LTD', 'N/A\r\n\r\n\r\n', NULL, 'NA', 'NA', 'NA', 'NA', '+88 02 8878517', NULL, 'NA', NULL, 'NA', 'Local', 100, 'Cr.', '2005-10-24 18:00:00.000000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inv_supplierbalance`
--

CREATE TABLE `inv_supplierbalance` (
  `id` int(11) NOT NULL,
  `SBRefID` varchar(50) DEFAULT NULL,
  `SBDate` date DEFAULT NULL,
  `SBSupplierID` varchar(50) DEFAULT NULL,
  `SBDrAmount` float DEFAULT NULL,
  `SBCrAmount` float DEFAULT NULL,
  `SBRemark` varchar(255) DEFAULT NULL,
  `Type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_supplierpayment`
--

CREATE TABLE `inv_supplierpayment` (
  `id` int(11) NOT NULL,
  `voucherid` varchar(20) NOT NULL,
  `voucherdate` date NOT NULL,
  `supplierid` varchar(20) NOT NULL,
  `paymenttype` varchar(20) NOT NULL,
  `amount` float NOT NULL,
  `receivermode` varchar(30) NOT NULL,
  `remarks` longtext NOT NULL,
  `entry_by` varchar(30) NOT NULL,
  `updated_by` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `inv_warehosueinfo`
--

CREATE TABLE `inv_warehosueinfo` (
  `id` int(11) NOT NULL,
  `warehouse_id` varchar(100) NOT NULL,
  `name` varchar(75) CHARACTER SET utf8 NOT NULL,
  `short_name` varchar(100) NOT NULL,
  `project_id` varchar(100) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inv_warehosueinfo`
--

INSERT INTO `inv_warehosueinfo` (`id`, `warehouse_id`, `name`, `short_name`, `project_id`, `address`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'WH-001', 'CENTRAL WAREHOUSE', 'CW', '2', '', NULL, 0, '2020-09-09 05:04:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `on_hold`
--

CREATE TABLE `on_hold` (
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
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `item_id` varchar(12) DEFAULT NULL,
  `product_code` varchar(12) NOT NULL,
  `bar_code` varchar(20) NOT NULL,
  `medicine_name` varchar(150) DEFAULT NULL,
  `generic_name` varchar(80) DEFAULT NULL,
  `pack_size` varchar(15) DEFAULT NULL,
  `pcs_per_pack` float DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `used_quantity` int(11) NOT NULL,
  `remain_quantity` int(11) NOT NULL,
  `act_remain_quantity` int(11) NOT NULL,
  `unit_buy_price` float DEFAULT NULL,
  `unit_sale_price` float DEFAULT NULL,
  `sale_per_pcs` float DEFAULT NULL,
  `price_date` date DEFAULT NULL,
  `supplier` varchar(50) DEFAULT NULL,
  `supplier_id` varchar(12) DEFAULT NULL,
  `item_category` varchar(50) DEFAULT NULL,
  `active_prod` varchar(5) DEFAULT NULL,
  `op_qty` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `item_id`, `product_code`, `bar_code`, `medicine_name`, `generic_name`, `pack_size`, `pcs_per_pack`, `quantity`, `used_quantity`, `remain_quantity`, `act_remain_quantity`, `unit_buy_price`, `unit_sale_price`, `sale_per_pcs`, `price_date`, `supplier`, `supplier_id`, `item_category`, `active_prod`, `op_qty`) VALUES
(4547, NULL, '', '123', 'FIBRELAX 130MG', 'ISPALNGE HUSK', 'PCS', 1, 100, 30, 70, 70, 344, 400, 400, '2023-04-05', 'INCEPTA PHARMACEUTICALS LTD.', NULL, 'SYRUP/LIQUID', 'YES', 100),
(4548, NULL, '', '2', 'NATLAX 100MG', 'PSYLLIUM & SENNA EXTRACT', 'NOS', 1, 1, 0, 1, 1, 361, 400, 400, '2023-04-05', 'RADIANT PHARMACEUTICALS LIMITED.', NULL, 'SYRUP/LIQUID', 'YES', 1),
(4549, NULL, '', '3', 'FIBERLAX ULTRA', 'ISPAGHULA HUSK', 'NOS', 1, 1, 0, 1, 1, 360, 400, 400, '2023-04-05', 'INCEPTA PHARMACEUTICALS LTD.', NULL, 'SYRUP/LIQUID', 'YES', 1),
(4550, NULL, '', '8908008142284', 'HIMALAYA SHAMPOO 180MG', 'ANTI HAIR FALL', 'NOS', 1, 2, 1, 1, 1, 198, 220, 220, '2023-04-05', 'HAMDARD LABORATORIES (WAQF)', NULL, 'SHAMPOO', 'YES', 2),
(4551, NULL, '', '859875003124', 'ENGLISH ANTILICE SHAMPOO', 'ANTILICE', 'NOS', 1, 1, 1, 0, 0, 95, 110, 110, '2023-04-05', 'GENERAL PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 1),
(4552, NULL, '', '4', 'FECILAX POWDER', 'P&S HERBAL', 'NOS', 1, 2, 0, 2, 2, 301, 350, 350, '2023-04-05', 'ACME LABORATORIES LTD.', NULL, 'SYRUP/LIQUID', 'YES', 2),
(4553, NULL, '', '7117217311744', 'RADIGEL 120MG', 'PSYLLIUM POWDER', 'PCS', 1, 1, 0, 1, 1, 365, 415, 415, '2023-04-05', 'RADIANT PHARMACEUTICALS LIMITED.', NULL, 'SYRUP/LIQUID', 'YES', 1),
(4554, NULL, '', '8906133000332', 'DAY CREAM', 'CREAM', 'NOS', 1, 1, 0, 1, 1, 748, 850, 850, '2023-04-05', 'MULTI BRANDS LTD', NULL, 'CREAM/OINMENT', 'YES', 1),
(4555, NULL, '', '5', 'GASTRAOLAX SACHETS', 'ISPAGHULA HUSK', 'NOS', 1, 1, 0, 1, 1, 344, 400, 400, '2023-04-05', 'INCEPTA PHARMACEUTICALS LTD.', NULL, 'SYRUP/LIQUID', 'YES', 1),
(4556, NULL, '', 'WK271', 'NIZIDER 2% SHAMPOO', 'KETOCONAZOLE 2%', 'NOS', 1, 2, 2, 2, 2, 258, 300, 300, '2023-04-05', 'UNIMED & UNIHEALTH MANUFACTURERS LTD.', NULL, 'CREAM/OINMENT', 'YES', 2),
(4557, NULL, '', '8940001284264', 'CLOPIROX SHAMPOO', 'CICLOPIROX OLAMINE USP1%', 'NOS', 1, 2, 2, 2, 2, 301, 350, 350, '2023-04-05', 'SQUARE PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 2),
(4558, NULL, '', 'XL043', 'XEROSOFT', 'EMOLLIENT', 'NOS', 1, 2, 0, 2, 2, 156, 180, 180, '2023-04-05', 'UNIMED & UNIHEALTH MANUFACTURERS LTD.', NULL, 'CREAM/OINMENT', 'YES', 2),
(4559, NULL, '', '6', 'DAN-K SHAMPOO', 'KETOCONAZOLE & ZINC', 'NOS', 1, 2, 0, 2, 2, 530, 590, 590, '2023-04-05', 'INTERNATIONAL AGENCIES BD LIMITED', NULL, 'CREAM/OINMENT', 'YES', 2),
(4560, NULL, '', '22200', 'DANCEL SHAMPOO', 'KETOCONAZOLE 2%', 'NOS', 1, 3, 0, 3, 3, 199, 230, 230, '2023-04-05', 'INCEPTA PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 3),
(4561, NULL, '', '22022', 'KERASOL FCL LOTION', 'SALICYLIC', 'NOS', 1, 1, 0, 1, 1, 258, 300, 300, '2023-04-05', 'INCEPTA PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 1),
(4562, NULL, '', '8941100500705', 'SELECT PLUS SHAMPOO', 'ANTI-DENRUFF SHAMPOO', 'NOS', 1, 1, 0, 1, 1, 150, 175, 175, '2023-04-05', 'SQUARE PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 1),
(4563, NULL, '', '8940001240628', 'CEFTRON 250MG', 'CEFTRIAXON 250MG', 'NOS', 1, 6, 0, 6, 6, 106, 120, 120, '2023-04-05', 'SQUARE PHARMACEUTICALS LTD.', NULL, 'INJECTION', 'YES', 6),
(4564, NULL, '', '745125269856', 'AFRIN', 'OXYMETAZOLINE HCI .025%', 'NOS', 1, 50, 0, 50, 50, 35, 40, 40, '2023-04-05', 'ARISTOPHARMA LTD.', NULL, 'DROP', 'YES', 50),
(4565, NULL, '', '8940001284387', 'BETAMESON-N CREAM', 'BET .1% & NEO SULPHATE 0.5%', 'NOS', 1, 2, 0, 2, 2, 30, 35, 35, '2023-04-05', 'SQUARE PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 2),
(4566, NULL, '', '020821', 'CLOSALIC OINTMENT', 'C&P BP 0.05%', 'NOS', 1, 2, 0, 2, 2, 132, 150, 150, '2023-04-05', 'ZISKA PHARMACEUTICALS', NULL, 'CREAM/OINMENT', 'YES', 2),
(4567, NULL, '', '811022', 'CURAFIN CREAM', 'AMOROLFIN BP0.25%', 'NOS', 1, 2, 0, 2, 2, 243, 280, 280, '2023-04-05', 'NAVANA PHARMACEUTICALS LTD', NULL, 'CREAM/OINMENT', 'YES', 2),
(4568, NULL, '', '8940001279499', 'BURNA CREAM', 'SILVER SULFADIAZINE USP1%', 'NOS', 1, 1, 0, 1, 1, 53, 60, 60, '2023-04-05', 'SQUARE PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 1),
(4569, NULL, '', '019', 'BETSON-N CREAM', 'BETA 0.1% & NEOMYCIN SUL BP 0.5%', 'NOS', 1, 1, 0, 1, 1, 21, 24, 24, '2023-04-05', 'OPEN MARKET', NULL, 'CREAM/OINMENT', 'YES', 1),
(4570, NULL, '', '22005', 'METALONE PLUS', 'FLURONE METALON 0.1%', 'NOS', 1, 1, 0, 1, 1, 95, 110, 110, '2023-04-05', 'INCEPTA PHARMACEUTICALS LTD.', NULL, 'INHALER', 'YES', 1),
(4571, NULL, '', '22006', 'LOTEPRO DS', 'LOT E 1%', 'NOS', 1, 1, 0, 1, 1, 199, 230, 230, '2023-04-05', 'INCEPTA PHARMACEUTICALS LTD.', NULL, 'EYE DROP', 'YES', 1),
(4572, NULL, '', '22002', 'LEVOXIN TS', 'LEVOFLUXACIN 1.5%', 'NOS', 1, 1, 0, 1, 1, 112, 130, 130, '2023-04-05', 'INCEPTA PHARMACEUTICALS LTD.', NULL, 'EYE DROP', 'YES', 1),
(4573, NULL, '', '8941100351086', 'GENTOSEP CREAM', 'GENTAMICIN', 'NOS', 1, 5, 0, 5, 5, 16, 18, 18, '2023-04-05', 'BEXIMCO PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 5),
(4574, NULL, '', 'AMS2009', 'FACID CREAM', 'FUCIDIC ACID BP', 'NOS', 1, 4, 0, 4, 4, 79, 90, 90, '2023-04-05', 'OPEN MARKET', NULL, 'CREAM/OINMENT', 'YES', 4),
(4575, NULL, '', '061', 'TERMIDER', 'TERMINAFINE HCI', 'NOS', 1, 1, 0, 1, 1, 43, 50, 50, '2023-04-05', 'BIOPHARMA LTD', NULL, 'CREAM/OINMENT', 'YES', 1),
(4576, NULL, '', 'CL004', 'ZOLCORT', 'HYDROCOT', 'NOS', 1, 3, 0, 3, 3, 33, 38, 38, '2023-04-05', 'ACI LIMITED', NULL, 'CREAM/OINMENT', 'YES', 3),
(4577, NULL, '', '22', 'GENTIN CREAM', 'GENTANICINE', 'NOS', 1, 1, 0, 1, 1, 11, 13, 13, '2023-04-05', 'OPSONIN', NULL, 'CREAM/OINMENT', 'YES', 1),
(4578, NULL, '', '22', 'ECLO CREAM', 'CLOBETASOL P 0.05%', 'NOS', 1, 1, 0, 1, 1, 59, 68, 68, '2023-04-05', 'GENERAL PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 1),
(4579, NULL, '', '23', 'FUNGIN B CREAM', 'CLO ', 'NOS', 1, 3, 0, 3, 3, 31, 35, 35, '2023-04-05', 'IBN SINA PHARMACEUTICAL INDUSTRY LTD.', NULL, 'CREAM/OINMENT', 'YES', 3),
(4580, NULL, '', '33', 'TROPICOLO OINTMENT', 'SS', 'NOS', 1, 1, 0, 1, 1, 62, 70, 70, '2023-04-05', 'ESKAYEF BANGLADESH LIMITED', NULL, 'CREAM/OINMENT', 'YES', 1),
(4581, NULL, '', '2', 'TROPICOLO NN', 'CLOBETAZOL', 'NOS', 1, 2, 0, 2, 2, 58, 65, 65, '2023-04-05', 'ESKAYEF BANGLADESH LIMITED', NULL, 'CREAM/OINMENT', 'YES', 2),
(4582, NULL, '', '22', 'ARISTODERM CREAM', 'ARISTODERM CREAM', 'NOS', 1, 1, 0, 1, 1, 65, 75, 75, '2023-04-05', 'ARISTOPHARMA LTD.', NULL, 'CREAM/OINMENT', 'YES', 1),
(4583, NULL, '', '8941100350706', 'COSMOTRIN CREAM 10MG', 'COS', 'NOS', 1, 1, 0, 1, 1, 40, 45, 45, '2023-04-05', 'BEXIMCO PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 1),
(4584, NULL, '', '22', 'TERBIFIN 10G', 'TER', 'NOS', 1, 2, 0, 2, 2, 69, 80, 80, '2023-04-05', 'ARISTOPHARMA LTD.', NULL, 'CREAM/OINMENT', 'YES', 2),
(4585, NULL, '', '8940001276788', 'GENACYN 0.1% ', 'GENTAMYCIN', 'NOS', 1, 5, 0, 5, 5, 10, 12, 12, '2023-04-05', 'SQUARE PHARMACEUTICALS LTD.', NULL, 'CREAM/OINMENT', 'YES', 5),
(4586, NULL, '', '22', 'NAFGAL', 'NAFTIFINE', 'NOS', 1, 3, 0, 3, 3, 69, 80, 80, '2023-04-05', 'NAVANA PHARMACEUTICALS LTD', NULL, 'CREAM/OINMENT', 'YES', 3),
(4587, NULL, '', '22', 'CLOSALIC OINTMENT 10G', 'CLOBETAZOL', 'NOS', 1, 5, 0, 5, 5, 61, 70, 70, '2023-04-05', 'ZISKA PHARMACEUTICALS', NULL, 'CREAM/OINMENT', 'YES', 5),
(4588, NULL, '', '22', 'UNIGAL CREAM10G', 'MICRONAZOL', 'NOS', 1, 1, 0, 1, 1, 31, 35, 35, '2023-04-05', 'OPSONIN', NULL, 'CREAM/OINMENT', 'YES', 1),
(4589, NULL, '', '22', 'UNIGAL HC CREAM ', 'MICRONAZOL', 'NOS', 1, 2, 0, 2, 2, 35, 40, 40, '2023-04-05', 'OPSONIN', NULL, 'CREAM/OINMENT', 'YES', 2),
(4590, NULL, '', '22', 'LOTEBA 5ML', 'LOT', 'NOS', 1, 3, 0, 3, 3, 174, 201, 201, '2023-04-05', 'NAVANA PHARMACEUTICALS LTD', NULL, 'EYE DROP', 'YES', 3),
(4591, NULL, '', '22', 'CIPRO A 5ML', 'CIPROMYCIN', 'NOS', 1, 4, 0, 4, 4, 40, 46, 46, '2023-04-05', 'ACME LABORATORIES LTD.', NULL, 'EYE DROP', 'YES', 4),
(4592, NULL, '', '168', 'CANDISTIN', 'ANTOBAC', 'NOS', 1, 2, 0, 2, 2, 132, 150, 150, '2023-04-05', 'UNIMED & UNIHEALTH MANUFACTURERS LTD.', NULL, 'DROP', 'YES', 2),
(4593, NULL, '', '2022', 'LOTEFLAM T 5ML', 'LOTEPREDONEL', 'NOS', 1, 1, 0, 1, 1, 176, 200, 200, '2023-04-05', 'GENERAL PHARMACEUTICALS LTD.', NULL, 'DROP', 'YES', 1),
(4594, NULL, '', '551', 'INVENTI-D 5ML', 'MOXIFLOXACIN', 'NOS', 1, 1, 0, 1, 1, 176, 200, 200, '2023-04-05', 'SQUARE PHARMACEUTICALS LTD.', NULL, 'EYE DROP', 'YES', 1);

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

-- --------------------------------------------------------

--
-- Table structure for table `sa_returnin`
--

CREATE TABLE `sa_returnin` (
  `ReturnInID` varchar(50) DEFAULT NULL,
  `ReturnInDate` timestamp(6) NULL DEFAULT NULL,
  `ReturnCustomerID` varchar(50) DEFAULT NULL,
  `ReturnInType` varchar(50) DEFAULT NULL,
  `Remarks` varchar(50) DEFAULT NULL,
  `TotalReturnIn` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sa_returnindetail`
--

CREATE TABLE `sa_returnindetail` (
  `ReturnInID` varchar(50) DEFAULT NULL,
  `ProductID` varchar(50) DEFAULT NULL,
  `ReturnInQty` float DEFAULT NULL,
  `ReturnInPrice` float DEFAULT NULL,
  `ReturnInTotal` float DEFAULT NULL,
  `RFree` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_issue`
--
ALTER TABLE `inv_issue`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_issuedetail`
--
ALTER TABLE `inv_issuedetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_materialbalance`
--
ALTER TABLE `inv_materialbalance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_receive`
--
ALTER TABLE `inv_receive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_receivedetail`
--
ALTER TABLE `inv_receivedetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_supplier`
--
ALTER TABLE `inv_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_supplierbalance`
--
ALTER TABLE `inv_supplierbalance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_supplierpayment`
--
ALTER TABLE `inv_supplierpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inv_warehosueinfo`
--
ALTER TABLE `inv_warehosueinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on_hold`
--
ALTER TABLE `on_hold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `inv_issue`
--
ALTER TABLE `inv_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `inv_issuedetail`
--
ALTER TABLE `inv_issuedetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `inv_materialbalance`
--
ALTER TABLE `inv_materialbalance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `inv_receive`
--
ALTER TABLE `inv_receive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inv_receivedetail`
--
ALTER TABLE `inv_receivedetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `inv_supplier`
--
ALTER TABLE `inv_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `inv_supplierbalance`
--
ALTER TABLE `inv_supplierbalance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inv_supplierpayment`
--
ALTER TABLE `inv_supplierpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `inv_warehosueinfo`
--
ALTER TABLE `inv_warehosueinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `on_hold`
--
ALTER TABLE `on_hold`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=328;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4595;

--
-- AUTO_INCREMENT for table `purchase_details`
--
ALTER TABLE `purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
