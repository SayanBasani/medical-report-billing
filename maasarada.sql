-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2025 at 06:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maasarada`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice_order`
--

CREATE TABLE `invoice_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_receiver_name` varchar(250) NOT NULL,
  `order_receiver_address` text NOT NULL,
  `order_total_before_tax` decimal(10,2) NOT NULL,
  `order_total_tax` decimal(10,2) NOT NULL,
  `order_tax_per` varchar(250) NOT NULL,
  `order_total_after_tax` double(10,2) NOT NULL,
  `order_amount_paid` decimal(10,2) NOT NULL,
  `order_total_amount_due` decimal(10,2) NOT NULL,
  `note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoice_order`
--

INSERT INTO `invoice_order` (`order_id`, `user_id`, `order_date`, `order_receiver_name`, `order_receiver_address`, `order_total_before_tax`, `order_total_tax`, `order_tax_per`, `order_total_after_tax`, `order_amount_paid`, `order_total_amount_due`, `note`) VALUES
(685, 123456, '2025-04-28 11:58:09', 'swatrt', 'faefeewrfca', 55.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(692, 123456, '2025-06-07 17:49:56', 'aaa', '', 55.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(693, 123456, '2025-06-10 05:32:43', 'sayan', 'bishnupur', 10.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(694, 123456, '2025-06-11 21:41:08', 'ss', 'sss', 55.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(695, 123456, '2025-06-14 18:47:04', 'efewfas', 'fewfacwfeefaw', -100.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(696, 123456, '2025-06-14 18:55:11', 'swattick bhowmick', 'bajkul', 50.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(697, 123456, '2025-06-28 10:44:44', 'swattick bhowmick', 'artw4za', 54.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(698, 123456, '2025-08-28 04:14:33', 'swattick bhowmick', 'rgohi ', 0.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(699, 123456, '2025-08-28 04:14:46', 'swattick bhowmick', 'rgohi ', 0.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(700, 123456, '2025-08-28 04:14:49', 'swattick bhowmick', 'rgohi ', 0.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(701, 123456, '2025-08-28 04:15:13', 'swattick bhowmick', 'dgaer', 64.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(702, 123456, '2025-09-01 19:26:58', 'hxx', 'xdh ', 20.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(703, 123456, '2025-09-01 19:27:27', 'hxx', '', 20.00, 0.00, '', 0.00, 0.00, 0.00, ''),
(704, 123456, '2025-09-01 19:32:33', 'hxx', '', 20.00, 0.00, '', 0.00, 0.00, 0.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_order_item`
--

CREATE TABLE `invoice_order_item` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `item_code` varchar(250) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `order_item_quantity` decimal(10,2) NOT NULL,
  `order_item_price` decimal(10,2) NOT NULL,
  `order_item_final_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoice_order_item`
--

INSERT INTO `invoice_order_item` (`order_item_id`, `order_id`, `item_code`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_final_amount`) VALUES
(4387, 685, '1', 'abcddddd', 1.00, 55.00, 55.00),
(4388, 692, '2', 'b', 1.00, 11.00, 11.00),
(4389, 692, '2', 'v', 1.00, 44.00, 44.00),
(4395, 693, '4', '40', 4.00, 4.00, 16.00),
(4396, 693, '1', '1', 1.00, 1.00, 1.00),
(4397, 693, '1', '1', 1.00, 1.00, 1.00),
(4398, 693, '2', '2', 33.00, 0.00, 0.00),
(4399, 693, '464', '44', 644.00, 48.00, 46.00),
(4414, 694, 's', 's', 0.00, 55.00, 55.00),
(4415, 694, '12', '', 0.00, 0.00, 0.00),
(4416, 694, '2', '', 0.00, 0.00, 0.00),
(4417, 694, '3', '', 0.00, 0.00, 0.00),
(4418, 694, '4', '', 0.00, 0.00, 0.00),
(4419, 694, '5', '', 0.00, 0.00, 0.00),
(4420, 694, '6', '', 0.00, 0.00, 0.00),
(4421, 694, '7', '', 0.00, 0.00, 0.00),
(4422, 694, '8', '', 0.00, 0.00, 0.00),
(4423, 694, '9', '', 0.00, 0.00, 0.00),
(4424, 694, '10', '', 0.00, 0.00, 0.00),
(4425, 694, '11', '', 0.00, 0.00, 0.00),
(4426, 694, '12', '', 0.00, 0.00, 0.00),
(4427, 694, '13', '', 0.00, 0.00, 0.00),
(4428, 694, '14', '', 0.00, 0.00, 0.00),
(4429, 694, '15', '', 0.00, 0.00, 0.00),
(4430, 694, '16', '', 0.00, 0.00, 0.00),
(4431, 694, '17', '', 0.00, 0.00, 0.00),
(4432, 694, '18', '', 0.00, 0.00, 0.00),
(4433, 694, '19', '', 0.00, 0.00, 0.00),
(4434, 694, '20', '', 0.00, 0.00, 0.00),
(4435, 694, '', '', 0.00, 0.00, 0.00),
(4439, 696, '1', 'dsffgk', 1.00, 25.00, 25.00),
(4440, 696, '2', 'vsv', 1.00, 25.00, 25.00),
(4441, 0, '', '', 0.00, 0.00, 0.00),
(4442, 697, '1', 'dsffgk', 2.00, 22.00, 44.00),
(4443, 697, '22', 'dsffgk', 2.00, 5.00, 10.00),
(4444, 695, '1', 'dsffgk', 5.00, 55.00, 55.00),
(4445, 701, '1', 'dsffgk', 8.00, 8.00, 64.00),
(4446, 702, '1', 'xgnf', 4.00, 5.00, 20.00),
(4447, 703, '1', 'xgnf', 4.00, 5.00, 20.00),
(4448, 704, '1', 'xgnf', 4.00, 5.00, 20.00),
(4449, 704, '', '', 0.00, 0.00, 0.00),
(4450, 704, '', '', 0.00, 0.00, 0.00),
(4451, 704, '', '', 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_user`
--

CREATE TABLE `invoice_user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `invoice_user`
--

INSERT INTO `invoice_user` (`id`, `email`, `password`, `first_name`, `last_name`, `mobile`, `address`) VALUES
(123456, 'admin@gmail.com', '12345', 'Admin', '', 1234567890, 'Medinipur');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `clientName` varchar(30) NOT NULL,
  `age` int(11) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `reffering_doctor` varchar(100) NOT NULL,
  `date_of_recipt` date NOT NULL,
  `date_of_report` date NOT NULL,
  `delete_status` int(11) NOT NULL,
  `invoice` int(11) NOT NULL,
  `reportNo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `user_id`, `clientName`, `age`, `sex`, `reffering_doctor`, `date_of_recipt`, `date_of_report`, `delete_status`, `invoice`, `reportNo`) VALUES
(176, '123456', 'rony', 56, 'Male', 'swattickbhowmick', '2025-09-02', '2025-09-02', 0, 285903, NULL),
(181, '123456', 'Swattick bhowmick', 22, 'Male', 'Dr S.Bhowmick sfhqog rlr', '2025-09-02', '2025-09-02', 0, 577366, NULL),
(182, '123456', 'Swattick Bhowmick', 22, 'Male', 'Dr S.Bhowmick sfhqog rlr', '2025-09-02', '2025-09-02', 0, 571339, NULL),
(183, '123456', 'Swattick Bhowmick', 23, 'Male', 'Dr S.Bhowmick sfhqog rlr', '2025-09-02', '2025-09-02', 0, 529461, NULL);

--
-- Triggers `report`
--
DELIMITER $$
CREATE TRIGGER `before_insert_invoice` BEFORE INSERT ON `report` FOR EACH ROW BEGIN
  DECLARE new_invoice VARCHAR(6);
  SET new_invoice = LPAD(FLOOR(1 + RAND() * 999999), 6, '0');

  WHILE EXISTS (SELECT 1 FROM report WHERE invoice = new_invoice) DO
    SET new_invoice = LPAD(FLOOR(1 + RAND() * 999999), 6, '0');
  END WHILE;

  SET NEW.invoice = new_invoice;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `report_item`
--

CREATE TABLE `report_item` (
  `test_name` varchar(255) NOT NULL,
  `result` varchar(255) NOT NULL,
  `normal_value` varchar(255) NOT NULL,
  `report_item_id` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `report_no` varchar(255) NOT NULL,
  `EXAMINATION_name` varchar(255) DEFAULT NULL,
  `extrafield` varchar(255) DEFAULT NULL,
  `mainexamination` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `report_item`
--

INSERT INTO `report_item` (`test_name`, `result`, `normal_value`, `report_item_id`, `id`, `report_no`, `EXAMINATION_name`, `extrafield`, `mainexamination`) VALUES
('', '', '', '0', 550, '', '', NULL, NULL),
('Quantity', '', 'NIL', '0', 590, 'S1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Color', '', 'WHITISH', '0', 591, 'S2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Odor', '', 'NIL', '0', 592, 'S3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Ph', '', 'NIL', '0', 593, 'S4', 'CHEMICAL EXAMINATION', NULL, NULL),
('Sugar', '', 'NIL', '0', 594, 'S5', 'CHEMICAL EXAMINATION', NULL, NULL),
('Total count', '', 'NIL', '0', 595, 'S6', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('RBC', '', 'NIL', '0', 596, 'S7', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Epi Cell', '', 'NIL', '0', 597, 'S8', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Pus count', '', 'NIL', '0', 598, 'S9', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Mitility', '', 'NIL', '0', 599, 'S10', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Azithromycin', '', 'S', '0', 669, 's1', 'AntibioticSensitivity', NULL, NULL),
('Amikacin', '', 'S', '0', 670, 's2', 'AntibioticSensitivity', NULL, NULL),
('Amoxycillin', '', 'R', '0', 671, 's3', 'AntibioticSensitivity', NULL, NULL),
('Augmentin', '', 'null', '0', 672, 's4', 'AntibioticSensitivity', NULL, NULL),
('Cefadroxil', '', 'null', '0', 673, 's5', 'AntibioticSensitivity', NULL, NULL),
('Cefaclor', '', 'null', '0', 674, 's6', 'AntibioticSensitivity', NULL, NULL),
('Cefazolin', '', 'R', '0', 675, 's7', 'AntibioticSensitivity', NULL, NULL),
('Cefotaxime', '', 'MS', '0', 676, 's8', 'AntibioticSensitivity', NULL, NULL),
('Ceftazidime', '', 'null', '0', 677, 's9', 'AntibioticSensitivity', NULL, NULL),
('Ceftriaxone', '', 'null', '0', 678, 's10', 'AntibioticSensitivity', NULL, NULL),
('Cefuroxime sodium', '', 'R', '0', 679, 's11', 'AntibioticSensitivity', NULL, NULL),
('Cephalexin', '', 'null', '0', 680, 's12', 'AntibioticSensitivity', NULL, NULL),
('Cefdinir', '', 'null', '0', 681, 's13', 'AntibioticSensitivity', NULL, NULL),
('Ciprofloxacin', '', 'S', '0', 682, 's14', 'AntibioticSensitivity', NULL, NULL),
('Cefoperazone', '', 'S', '0', 683, 's15', 'AntibioticSensitivity', NULL, NULL),
('Cefixime', '', 'S', '0', 684, 's16', 'AntibioticSensitivity', NULL, NULL),
('Cotrimoxazole', '', 'null', '0', 685, 's17', 'AntibioticSensitivity', NULL, NULL),
('Erythromycin', '', 'null', '0', 686, 's18', 'AntibioticSensitivity', NULL, NULL),
('Gentamycin', '', 'S', '0', 687, 's19', 'AntibioticSensitivity', NULL, NULL),
('Levofloxacin', '', 'S', '0', 688, 's20', 'AntibioticSensitivity', NULL, NULL),
('Lomofloxacin', '', 'S', '0', 689, 's21', 'AntibioticSensitivity', NULL, NULL),
('Moxifloxacin', '', 'S', '0', 690, 's22', 'AntibioticSensitivity', NULL, NULL),
('Nitrofurantoin', '', 'null', '0', 691, 's23', 'AntibioticSensitivity', NULL, NULL),
('Norfloxacin', '', 'S', '0', 692, 's24', 'AntibioticSensitivity', NULL, NULL),
('Ofloxacin', '', 'S', '0', 693, 's25', 'AntibioticSensitivity', NULL, NULL),
('Roxithromycin', '', 'null', '0', 694, 's26', 'AntibioticSensitivity', NULL, NULL),
('Streptomyces', '', 'null', '0', 695, 's27', 'AntibioticSensitivity', NULL, NULL),
('Tetracycline', '', 'null', '0', 696, 's28', 'AntibioticSensitivity', NULL, NULL),
('Tobramycin', '', 'null', '0', 697, 's29', 'AntibioticSensitivity', NULL, NULL),
('Meropenem', '', 'null', '0', 698, 's30', 'AntibioticSensitivity', NULL, NULL),
('Ceftizoxime', '', 'null', '0', 699, 's31', 'AntibioticSensitivity', NULL, NULL),
('Lincomycin', '', 'null', '0', 700, 's32', 'AntibioticSensitivity', NULL, NULL),
('Quantity', '20 ml', 'NIL', '0', 720, 'U1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Appearance', 'HAZZY', 'Clear', '0', 721, 'U2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Colour', 'PALE YELLOW', 'Straw to yellow', '0', 722, 'U3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Sp. Gr', '1010', '1.005 - 1.030', '0', 723, 'U4', 'PHYSICAL EXAMINATION', NULL, NULL),
('Deposit', 'NIL', 'NIL', '0', 724, 'U5', 'PHYSICAL EXAMINATION', NULL, NULL),
('Reaction (pH)', '6.5', '4.6 - 8.0', '0', 725, 'U6', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Salt', 'Negative', 'Negative', '0', 726, 'U7', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Pigment', 'Negative', 'Negative', '0', 727, 'U8', 'CHEMICAL EXAMINATION', NULL, NULL),
('Urobilinogen', 'Normal', 'Normal', '0', 728, 'U9', 'CHEMICAL EXAMINATION', NULL, NULL),
('Sugar', 'NIL', 'Negative', '0', 729, 'U10', 'CHEMICAL EXAMINATION', NULL, NULL),
('Protein (Albumin)', 'TRACE', 'Negative', '0', 730, 'U11', 'CHEMICAL EXAMINATION', NULL, NULL),
('Ketone Bodies', 'NIL', 'Negative', '0', 731, 'U12', 'CHEMICAL EXAMINATION', NULL, NULL),
('Micro-organism', 'Present', 'Absent', '0', 732, 'U13', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('RBC', 'NIL', '0 - 2 /HPF', '0', 733, 'U14', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Pus Cell', '25 - 30 /HPF', '0 - 5 /HPF', '0', 734, 'U15', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Epithelial Cell', '3 - 4 /HPF', '0 - 5 /HPF', '0', 735, 'U16', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Fat Droplets', 'NIL', 'NIL', '0', 736, 'U17', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Mucus', 'NIL', 'NIL', '0', 737, 'U18', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Casts', 'NIL', 'NIL', '0', 738, 'U19', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Crystals', 'NIL', 'NIL', '0', 739, 'U20', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Parasite', 'NIL', 'NIL', '0', 740, 'U21', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Other', 'NIL', 'NIL', '0', 741, 'U22', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('HOME SAMPLE', 'Positive/Negative', '', '0', 742, 'U23', 'PREGNANCY TEST', NULL, NULL),
('Color', '', 'NIL', '0', 743, 'S1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Mucus', '', 'NIL', '0', 744, 'S2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Parasite if Found', '', 'NIL', '0', 745, 'S3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Blood', '', 'NIL', '0', 746, 'S4', 'PHYSICAL EXAMINATION', NULL, NULL),
('Appearance', '', 'NIL', '0', 747, 'S5', 'PHYSICAL EXAMINATION', NULL, NULL),
('Other', '', 'NIL', '0', 748, 'S6', 'PHYSICAL EXAMINATION', NULL, NULL),
('Vegetible Cell', '', 'NIL', '0', 749, 'S7', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Starch', '', 'NIL', '0', 750, 'S8', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Cyst', '', 'NIL', '0', 751, 'S9', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('R.C.B', '', 'NIL', '0', 752, 'S10', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Ova', '', 'NIL', '0', 753, 'S11', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('W.B.C', '', 'NIL', '0', 754, 'S12', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Undigested/Partices', '', 'NIL', '0', 755, 'S13', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Pus Cells', '', 'NIL', '0', 756, 'S14', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Other', '', 'NIL', '0', 757, 'S15', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Epithelial Call', '', 'NIL', '0', 758, 'S16', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('PH', '', 'NIL', '0', 759, 'S17', 'CHEMICAL EXAMINATION', NULL, NULL),
('OBT', '', 'NIL', '0', 760, 'S18', 'CHEMICAL EXAMINATION', NULL, NULL),
('Reducing Substance', '', 'NIL', '0', 761, 'S19', 'CHEMICAL EXAMINATION', NULL, NULL),
('S_Typhi_H', '', '1/160', '0', 762, 'n1', 'WIDAL TEST', NULL, NULL),
('S_Typhi_O', '', '1/80', '0', 763, 'n2', 'WIDAL TEST', NULL, NULL),
('S_Paratyphi_A', '', 'NEGATIVE', '0', 764, 'n3', 'WIDAL TEST', NULL, NULL),
('S_Paratyphi_B', '', 'NEGATIVE', '0', 765, 'n4', 'WIDAL TEST', NULL, NULL),
('DiagnosticTiterRange', '', '160 & 180', '0', 766, 'n5', 'WIDAL TEST', NULL, NULL),
('Interpretation', '', 'Suggested Positive Reaction', '0', 767, 'n6', 'WIDAL TEST', NULL, NULL),
('MalariaParasiteRapid', '', 'NON REACTIVE', '0', 768, 'n7', 'WIDAL TEST', NULL, NULL),
('Dengue_NS1', '', 'NON REACTIVE', '0', 769, 'n8', 'WIDAL TEST', NULL, NULL),
('Dengue_IgG', '', 'NON REACTIVE', '0', 770, 'n9', 'WIDAL TEST', NULL, NULL),
('Dengue_IgM', '', 'NON REACTIVE', '0', 771, 'n10', 'WIDAL TEST', NULL, NULL),
('ScrubTyphusAntibody', '', 'NON REACTIVE', '0', 772, 'n11', 'WIDAL TEST', NULL, NULL),
('CRP_Serum', '', 'Up to 6.0 mg/L', '0', 773, 'n12', 'WIDAL TEST', NULL, NULL),
('Quantity', '20 ml', 'NIL', '0', 799, 'U1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Appearance', 'HAZZY', 'Clear', '0', 800, 'U2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Colour', 'PALE YELLOW', 'Straw to yellow', '0', 801, 'U3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Sp. Gr', '1010', '1.005 - 1.030', '0', 802, 'U4', 'PHYSICAL EXAMINATION', NULL, NULL),
('Deposit', 'NIL', 'NIL', '0', 803, 'U5', 'PHYSICAL EXAMINATION', NULL, NULL),
('Reaction (pH)', '6.5', '4.6 - 8.0', '0', 804, 'U6', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Salt', 'Negative', 'Negative', '0', 805, 'U7', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Pigment', 'Negative', 'Negative', '0', 806, 'U8', 'CHEMICAL EXAMINATION', NULL, NULL),
('Urobilinogen', 'Normal', 'Normal', '0', 807, 'U9', 'CHEMICAL EXAMINATION', NULL, NULL),
('Sugar', 'NIL', 'Negative', '0', 808, 'U10', 'CHEMICAL EXAMINATION', NULL, NULL),
('Protein (Albumin)', 'TRACE', 'Negative', '0', 809, 'U11', 'CHEMICAL EXAMINATION', NULL, NULL),
('Ketone Bodies', 'NIL', 'Negative', '0', 810, 'U12', 'CHEMICAL EXAMINATION', NULL, NULL),
('Micro-organism', 'Present', 'Absent', '0', 811, 'U13', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('RBC', 'NIL', '0 - 2 /HPF', '0', 812, 'U14', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Pus Cell', '25 - 30 /HPF', '0 - 5 /HPF', '0', 813, 'U15', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Epithelial Cell', '3 - 4 /HPF', '0 - 5 /HPF', '0', 814, 'U16', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Fat Droplets', 'NIL', 'NIL', '0', 815, 'U17', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Mucus', 'NIL', 'NIL', '0', 816, 'U18', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Casts', 'NIL', 'NIL', '0', 817, 'U19', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Crystals', 'NIL', 'NIL', '0', 818, 'U20', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Parasite', 'NIL', 'NIL', '0', 819, 'U21', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Other', 'NIL', 'NIL', '0', 820, 'U22', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('HOME SAMPLE', 'Positive/Negative', '', '0', 821, 'U23', 'PREGNANCY TEST', NULL, NULL),
('Quantity', '20 ml', 'NIL', '0', 822, 'U1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Appearance', 'HAZZY', 'Clear', '0', 823, 'U2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Colour', 'PALE YELLOW', 'Straw to yellow', '0', 824, 'U3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Sp. Gr', '1010', '1.005 - 1.030', '0', 825, 'U4', 'PHYSICAL EXAMINATION', NULL, NULL),
('Deposit', 'NIL', 'NIL', '0', 826, 'U5', 'PHYSICAL EXAMINATION', NULL, NULL),
('Reaction (pH)', '6.5', '4.6 - 8.0', '0', 827, 'U6', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Salt', 'Negative', 'Negative', '0', 828, 'U7', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Pigment', 'Negative', 'Negative', '0', 829, 'U8', 'CHEMICAL EXAMINATION', NULL, NULL),
('Urobilinogen', 'Normal', 'Normal', '0', 830, 'U9', 'CHEMICAL EXAMINATION', NULL, NULL),
('Sugar', 'NIL', 'Negative', '0', 831, 'U10', 'CHEMICAL EXAMINATION', NULL, NULL),
('Protein (Albumin)', 'TRACE', 'Negative', '0', 832, 'U11', 'CHEMICAL EXAMINATION', NULL, NULL),
('Ketone Bodies', 'NIL', 'Negative', '0', 833, 'U12', 'CHEMICAL EXAMINATION', NULL, NULL),
('Micro-organism', 'Present', 'Absent', '0', 834, 'U13', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('RBC', 'NIL', '0 - 2 /HPF', '0', 835, 'U14', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Pus Cell', '25 - 30 /HPF', '0 - 5 /HPF', '0', 836, 'U15', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Epithelial Cell', '3 - 4 /HPF', '0 - 5 /HPF', '0', 837, 'U16', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Fat Droplets', 'NIL', 'NIL', '0', 838, 'U17', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Mucus', 'NIL', 'NIL', '0', 839, 'U18', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Casts', 'NIL', 'NIL', '0', 840, 'U19', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Crystals', 'NIL', 'NIL', '0', 841, 'U20', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Parasite', 'NIL', 'NIL', '0', 842, 'U21', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Other', 'NIL', 'NIL', '0', 843, 'U22', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('HOME SAMPLE', 'Positive/Negative', '', '0', 844, 'U23', 'PREGNANCY TEST', NULL, NULL),
('Quantity', '20 ml', 'NIL', '0', 858, 'U1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Appearance', 'HAZZY', 'Clear', '0', 859, 'U2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Colour', 'PALE YELLOW', 'Straw to yellow', '0', 860, 'U3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Sp. Gr', '1010', '1.005 - 1.030', '0', 861, 'U4', 'PHYSICAL EXAMINATION', NULL, NULL),
('Deposit', 'NIL', 'NIL', '0', 862, 'U5', 'PHYSICAL EXAMINATION', NULL, NULL),
('Reaction (pH)', '6.5', '4.6 - 8.0', '0', 863, 'U6', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Salt', 'Negative', 'Negative', '0', 864, 'U7', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Pigment', 'Negative', 'Negative', '0', 865, 'U8', 'CHEMICAL EXAMINATION', NULL, NULL),
('Urobilinogen', 'Normal', 'Normal', '0', 866, 'U9', 'CHEMICAL EXAMINATION', NULL, NULL),
('Sugar', 'NIL', 'Negative', '0', 867, 'U10', 'CHEMICAL EXAMINATION', NULL, NULL),
('Protein (Albumin)', 'TRACE', 'Negative', '0', 868, 'U11', 'CHEMICAL EXAMINATION', NULL, NULL),
('Ketone Bodies', 'NIL', 'Negative', '0', 869, 'U12', 'CHEMICAL EXAMINATION', NULL, NULL),
('Micro-organism', 'Present', 'Absent', '0', 870, 'U13', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('RBC', 'NIL', '0 - 2 /HPF', '0', 871, 'U14', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Pus Cell', '25 - 30 /HPF', '0 - 5 /HPF', '0', 872, 'U15', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Epithelial Cell', '3 - 4 /HPF', '0 - 5 /HPF', '0', 873, 'U16', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Fat Droplets', 'NIL', 'NIL', '0', 874, 'U17', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Mucus', 'NIL', 'NIL', '0', 875, 'U18', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Casts', 'NIL', 'NIL', '0', 876, 'U19', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Crystals', 'NIL', 'NIL', '0', 877, 'U20', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Parasite', 'NIL', 'NIL', '0', 878, 'U21', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Other', 'NIL', 'NIL', '0', 879, 'U22', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('PREGNANCY TEST', 'Positive/Negative', '', '0', 880, 'U23', 'PREGNANCY TEST', NULL, NULL),
('HOME SAMPLE', '', '', '0', 881, 'U24', 'PREGNANCY TEST', NULL, NULL),
('Quantity', '20 ml', 'NIL', '0', 882, 'U1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Appearance', 'HAZZY', 'Clear', '0', 883, 'U2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Colour', 'PALE YELLOW', 'Straw to yellow', '0', 884, 'U3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Sp. Gr', '1010', '1.005 - 1.030', '0', 885, 'U4', 'PHYSICAL EXAMINATION', NULL, NULL),
('Deposit', 'NIL', 'NIL', '0', 886, 'U5', 'PHYSICAL EXAMINATION', NULL, NULL),
('Reaction (pH)', '6.5', '4.6 - 8.0', '0', 887, 'U6', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Salt', 'Negative', 'Negative', '0', 888, 'U7', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Pigment', 'Negative', 'Negative', '0', 889, 'U8', 'CHEMICAL EXAMINATION', NULL, NULL),
('Urobilinogen', 'Normal', 'Normal', '0', 890, 'U9', 'CHEMICAL EXAMINATION', NULL, NULL),
('Sugar', 'NIL', 'Negative', '0', 891, 'U10', 'CHEMICAL EXAMINATION', NULL, NULL),
('Protein (Albumin)', 'TRACE', 'Negative', '0', 892, 'U11', 'CHEMICAL EXAMINATION', NULL, NULL),
('Ketone Bodies', 'NIL', 'Negative', '0', 893, 'U12', 'CHEMICAL EXAMINATION', NULL, NULL),
('Micro-organism', 'Present', 'Absent', '0', 894, 'U13', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('RBC', 'NIL', '0 - 2 /HPF', '0', 895, 'U14', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Pus Cell', '25 - 30 /HPF', '0 - 5 /HPF', '0', 896, 'U15', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Epithelial Cell', '3 - 4 /HPF', '0 - 5 /HPF', '0', 897, 'U16', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Fat Droplets', 'NIL', 'NIL', '0', 898, 'U17', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Mucus', 'NIL', 'NIL', '0', 899, 'U18', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Casts', 'NIL', 'NIL', '0', 900, 'U19', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Crystals', 'NIL', 'NIL', '0', 901, 'U20', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Parasite', 'NIL', 'NIL', '0', 902, 'U21', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Other', 'NIL', 'NIL', '0', 903, 'U22', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('PREGNANCY TEST', 'Positive/Negative', '', '0', 904, 'U23', 'PREGNANCY TEST', NULL, NULL),
('HOME SAMPLE', '', '', '0', 905, 'U24', 'PREGNANCY TEST', NULL, NULL),
('Total Cholesterol', '', 'Up to 200 mg/dL', '0', 930, 'L1', 'undefined', NULL, NULL),
('HDL', '', '30 - 60 mg/dL', '0', 931, 'L2', 'undefined', NULL, NULL),
('LDL', '', '110 - 160 mg/dL', '0', 932, 'L3', 'undefined', NULL, NULL),
('VLDL', '', '18 - 20 mg/dL', '0', 933, 'L4', 'undefined', NULL, NULL),
('TRIGLYCERIDE(SERUM)', '', 'Up to 170 mg/dL', '0', 934, 'L5', 'undefined', NULL, NULL),
('SUGAR(FASTING)', '', '(65-110) mg%', '0', 935, 'L6', 'undefined', NULL, NULL),
('SUGAR(P.P)L', '', '(80 - 140) mg%', '0', 936, 'L7', 'undefined', NULL, NULL),
('UREA(SERUM)', '', 'Up to 45 mg/dL', '0', 937, 'L8', 'undefined', NULL, NULL),
('CREATININE(SERUM)', '', '(0.6-1.4) mg/dL', '0', 938, 'L9', 'undefined', NULL, NULL),
('AMYLASE(SERUM)', '', '(Up to 90) U/I', '0', 939, 'L10', 'undefined', NULL, NULL),
('LIPASE(SERUM)', '', '13 - 60 IU/L', '0', 940, 'L11', 'undefined', NULL, NULL),
('Sugar (Fasting)', '', '65 - 110 mg%', '0', 989, 'K1', 'undefined', NULL, NULL),
('Sugar (Post-Prandial)', '', '80 - 140 mg%', '0', 990, 'K2', 'undefined', NULL, NULL),
('Sodium', '', '135 - 155 mmol/L', '0', 991, 'K3', 'undefined', NULL, NULL),
('Potassium', '', '3.5 - 5.5 mmol/L', '0', 992, 'K4', 'undefined', NULL, NULL),
('Urea', '', 'Up to 45 mg/dL', '0', 993, 'K5', 'undefined', NULL, NULL),
('Creatinine', '', '0.6 - 1.2 mg/dL', '0', 994, 'K6', 'undefined', NULL, NULL),
('Uric Acid', '', '3.6 - 7.2 mg/dL', '0', 995, 'K7', 'undefined', NULL, NULL),
('Chloride', '', '98 - 115 mmol/L', '0', 996, 'K8', 'undefined', NULL, NULL),
('Sugar (Fasting)', '', '65 - 110 mg%', '0', 997, 'K1', 'undefined', NULL, NULL),
('Sugar (Post-Prandial)', '', '80 - 140 mg%', '0', 998, 'K2', 'undefined', NULL, NULL),
('Sodium', '', '135 - 155 mmol/L', '0', 999, 'K3', 'undefined', NULL, NULL),
('Potassium', '', '3.5 - 5.5 mmol/L', '0', 1000, 'K4', 'undefined', NULL, NULL),
('Urea', '', 'Up to 45 mg/dL', '0', 1001, 'K5', 'undefined', NULL, NULL),
('Creatinine', '', '0.6 - 1.2 mg/dL', '0', 1002, 'K6', 'undefined', NULL, NULL),
('Uric Acid', '', '3.6 - 7.2 mg/dL', '0', 1003, 'K7', 'undefined', NULL, NULL),
('Chloride', '', '98 - 115 mmol/L', '0', 1004, 'K8', 'undefined', NULL, NULL),
('Quantity', '', 'NIL', '0', 1013, 'S1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Color', '', 'WHITISH', '0', 1014, 'S2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Odor', '', 'NIL', '0', 1015, 'S3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Ph', '', 'NIL', '0', 1016, 'S4', 'CHEMICAL EXAMINATION', NULL, NULL),
('Sugar', '', 'NIL', '0', 1017, 'S5', 'CHEMICAL EXAMINATION', NULL, NULL),
('Total count', '', 'NIL', '0', 1018, 'S6', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('RBC', '', 'NIL', '0', 1019, 'S7', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Epi Cell', '', 'NIL', '0', 1020, 'S8', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Pus count', '', 'NIL', '0', 1021, 'S9', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Mitility', '', 'NIL', '0', 1022, 'S10', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Quantity', '', 'NIL', '0', 1023, 'S1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Color', '', 'WHITISH', '0', 1024, 'S2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Odor', '', 'NIL', '0', 1025, 'S3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Ph', '', 'NIL', '0', 1026, 'S4', 'CHEMICAL EXAMINATION', NULL, NULL),
('Sugar', '', 'NIL', '0', 1027, 'S5', 'CHEMICAL EXAMINATION', NULL, NULL),
('Total count', '', 'NIL', '0', 1028, 'S6', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('RBC', '', 'NIL', '0', 1029, 'S7', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Epi Cell', '', 'NIL', '0', 1030, 'S8', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Pus count', '', 'NIL', '0', 1031, 'S9', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Mitility', '', 'NIL', '0', 1032, 'S10', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Total WBC (TC)', '', '5000 - 10000 cells/cmm', '0', 1033, 'B1', 'undefined', NULL, NULL),
('Neutrophils %', '', '40 - 75%', '0', 1034, 'B2', 'undefined', NULL, NULL),
('Lymphocytes %', '', '20 - 45%', '0', 1035, 'B3', 'undefined', NULL, NULL),
('Eosinophils %', '', '1 - 6%', '0', 1036, 'B4', 'undefined', NULL, NULL),
('Monocytes %', '', '2 - 10%', '0', 1037, 'B5', 'undefined', NULL, NULL),
('Basophils %', '', '0 - 0.5%', '0', 1038, 'B6', 'undefined', NULL, NULL),
('Hemoglobin (Hb%)', '', 'M: 13-18, F: 11-16 gm%', '0', 1039, 'B7', 'undefined', NULL, NULL),
('ESR (1st hr)', '', '5 - 10 mm', '0', 1040, 'B8', 'undefined', NULL, NULL),
('ESR (2nd hr)', '', '10 - 20 mm', '0', 1041, 'B9', 'undefined', NULL, NULL),
('Platelet Count', '', '1.5 - 4.0 lakh/cumm', '0', 1042, 'B10', 'undefined', NULL, NULL),
('RBC Count', '', 'M: 4.5 - 6.0, F: 4.0 - 5.5 ×10⁶/cumm', '0', 1043, 'B11', 'undefined', NULL, NULL),
('PCV', '', 'M: 40-54%, F: 36-47%', '0', 1044, 'B12', 'undefined', NULL, NULL),
('MCV', '', '86 - 100 fL', '0', 1045, 'B13', 'undefined', NULL, NULL),
('MCH', '', '29 ± 2.5 pg', '0', 1046, 'B14', 'undefined', NULL, NULL),
('MCHC', '', '32.5 ± 2 g/dL', '0', 1047, 'B15', 'undefined', NULL, NULL),
('RBC Morphology', '', 'Normal', '0', 1048, 'B16', 'undefined', NULL, NULL),
('Malaria Parasite', '', 'Negative', '0', 1049, 'B17', 'undefined', NULL, NULL),
('Bleeding Time (BT)', '', '1 - 3 min', '0', 1050, 'B18', 'undefined', NULL, NULL),
('Clotting Time (CT)', '', '3 - 8 min', '0', 1051, 'B19', 'undefined', NULL, NULL),
('Color', '', 'NIL', '0', 1090, 'S1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Mucus', '', 'NIL', '0', 1091, 'S2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Parasite if Found', '', 'NIL', '0', 1092, 'S3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Blood', '', 'NIL', '0', 1093, 'S4', 'PHYSICAL EXAMINATION', NULL, NULL),
('Appearance', '', 'NIL', '0', 1094, 'S5', 'PHYSICAL EXAMINATION', NULL, NULL),
('Other', '', 'NIL', '0', 1095, 'S6', 'PHYSICAL EXAMINATION', NULL, NULL),
('Vegetible Cell', '', 'NIL', '0', 1096, 'S7', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Starch', '', 'NIL', '0', 1097, 'S8', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Cyst', '', 'NIL', '0', 1098, 'S9', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('R.C.B', '', 'NIL', '0', 1099, 'S10', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Ova', '', 'NIL', '0', 1100, 'S11', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('W.B.C', '', 'NIL', '0', 1101, 'S12', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Undigested/Partices', '', 'NIL', '0', 1102, 'S13', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Pus Cells', '', 'NIL', '0', 1103, 'S14', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Other', '', 'NIL', '0', 1104, 'S15', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('Epithelial Call', '', 'NIL', '0', 1105, 'S16', 'MICROSCOPICAL EXAMINATION', NULL, NULL),
('PH', '', 'NIL', '0', 1106, 'S17', 'CHEMICAL EXAMINATION', NULL, NULL),
('OBT', '', 'NIL', '0', 1107, 'S18', 'CHEMICAL EXAMINATION', NULL, NULL),
('Reducing Substance', '', 'NIL', '0', 1108, 'S19', 'CHEMICAL EXAMINATION', NULL, NULL),
('Quantity', '20 ml', 'NIL', '0', 1254, 'U1', 'PHYSICAL EXAMINATION', NULL, NULL),
('Appearance', 'HAZZY', 'Clear', '0', 1255, 'U2', 'PHYSICAL EXAMINATION', NULL, NULL),
('Colour', 'PALE YELLOW', 'Straw to yellow', '0', 1256, 'U3', 'PHYSICAL EXAMINATION', NULL, NULL),
('Sp. Gr', '1010', '1.005 - 1.030', '0', 1257, 'U4', 'PHYSICAL EXAMINATION', NULL, NULL),
('Deposit', 'NIL', 'NIL', '0', 1258, 'U5', 'PHYSICAL EXAMINATION', NULL, NULL),
('Reaction (pH)', '6.5', '4.6 - 8.0', '0', 1259, 'U6', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Salt', 'Negative', 'Negative', '0', 1260, 'U7', 'CHEMICAL EXAMINATION', NULL, NULL),
('Bile Pigment', 'Negative', 'Negative', '0', 1261, 'U8', 'CHEMICAL EXAMINATION', NULL, NULL),
('Urobilinogen', 'Normal', 'Normal', '0', 1262, 'U9', 'CHEMICAL EXAMINATION', NULL, NULL),
('Sugar', 'NIL', 'Negative', '0', 1263, 'U10', 'CHEMICAL EXAMINATION', NULL, NULL),
('Protein (Albumin)', 'TRACE', 'Negative', '0', 1264, 'U11', 'CHEMICAL EXAMINATION', NULL, NULL),
('Ketone Bodies', 'NIL', 'Negative', '0', 1265, 'U12', 'CHEMICAL EXAMINATION', NULL, NULL),
('Micro-organism', 'Present', 'Absent', '0', 1266, 'U13', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('RBC', 'NIL', '0 - 2 /HPF', '0', 1267, 'U14', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Pus Cell', '25 - 30 /HPF', '0 - 5 /HPF', '0', 1268, 'U15', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Epithelial Cell', '3 - 4 /HPF', '0 - 5 /HPF', '0', 1269, 'U16', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Fat Droplets', 'NIL', 'NIL', '0', 1270, 'U17', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Mucus', 'NIL', 'NIL', '0', 1271, 'U18', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Casts', 'NIL', 'NIL', '0', 1272, 'U19', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Crystals', 'NIL', 'NIL', '0', 1273, 'U20', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Parasite', 'NIL', 'NIL', '0', 1274, 'U21', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('Other', 'NIL', 'NIL', '0', 1275, 'U22', 'MICROSCOPIC EXAMINATION', NULL, NULL),
('PERGNANCY TEST', '', '', '0', 1276, 'U23', 'PREGNANCY TEST', NULL, NULL),
('HOME SAMPLE', '', '', '0', 1277, 'U23', 'PREGNANCY TEST', NULL, NULL),
('Sugar (Fasting)', '', '65 - 110 mg%', '0', 1278, 'K1', 'undefined', NULL, NULL),
('Sugar (Post-Prandial)', '', '80 - 140 mg%', '0', 1279, 'K2', 'undefined', NULL, NULL),
('Sodium', '', '135 - 155 mmol/L', '0', 1280, 'K3', 'undefined', NULL, NULL),
('Potassium', '', '3.5 - 5.5 mmol/L', '0', 1281, 'K4', 'undefined', NULL, NULL),
('Urea', '', 'Up to 45 mg/dL', '0', 1282, 'K5', 'undefined', NULL, NULL),
('Creatinine', '', '0.6 - 1.2 mg/dL', '0', 1283, 'K6', 'undefined', NULL, NULL),
('Uric Acid', '', '3.6 - 7.2 mg/dL', '0', 1284, 'K7', 'undefined', NULL, NULL),
('Chloride', '', '98 - 115 mmol/L', '0', 1285, 'K8', 'undefined', NULL, NULL),
('HAEMOGLOBIN(HB%)', 'Gm%', '(11-16) Gm%.', '176', 1672, 'P1', 'undefined', '', 'Pregnancy Profile'),
('SUGAR (FASTING )', 'Mg%', '(65 -110) Mg%', '176', 1673, 'P2', 'undefined', '', 'Pregnancy Profile'),
('SUGAR (P.P.)', 'Mg%', '(80-140) Mg%.', '176', 1674, 'P3', 'undefined', '', 'LipidProfile'),
('A BO GROUPING', '', '', '176', 1675, 'P4', 'undefined', '', 'LipidProfile'),
('RH TYPING', 'Positive/Negative', 'NULL', '176', 1676, 'P5', 'undefined', '', 'LipidProfile'),
('VDRL (SERUM)', 'NON REACTIVE/REACTIVE', 'NULL', '176', 1677, 'P6', 'undefined', '', 'LipidProfile'),
('HB s A g(SERUM)', 'NON REACTIVE/REACTIVE', 'NULL', '176', 1678, 'P7', 'undefined', '', 'LipidProfile'),
('HIV(I&II) (SERUM)', 'NON REACTIVE/REACTIVE', 'NULL', '176', 1679, 'P8', 'undefined', '', 'LipidProfile'),
('HCV (SERUM)', 'NON REACTIVE/REACTIVE', 'NULL', '176', 1680, 'P9', 'undefined', '', 'LipidProfile'),
('MESERMENT IN MM', '', '', '181', 1701, 'M1', 'MANTU TEST', '', 'WidalAndInfectionPanel'),
('ERYTHEMA IN MM', '', '', '181', 1702, 'M2', 'MANTU TEST', '', 'WidalAndInfectionPanel'),
('INDURATION IN MM', '', '', '181', 1703, 'M3', 'MANTU TEST', '', 'WidalAndInfectionPanel'),
('REMARK', 'NON REACTIVE/REACTIVE', '', '181', 1704, 'M4', 'MANTU TEST', '', 'WidalAndInfectionPanel'),
('CULTURE & SENSITIVITY OF URINE', 'CULTURE SHOWED NO GROWTH AFTER 48 HOURS INCUBATION AT 37 DEG.C', '', '182', 1705, 'n1', 'URINE CULTURE TEST', '', 'WidalAndInfectionPanel'),
('MESERMENT IN MM', '', '', '183', 1706, 'M1', 'MANTU TEST', '', 'WidalAndInfectionPanel'),
('ERYTHEMA IN MM', '', '', '183', 1707, 'M2', 'MANTU TEST', '', 'WidalAndInfectionPanel'),
('INDURATION IN MM', '', '', '183', 1708, 'M3', 'MANTU TEST', '', 'WidalAndInfectionPanel'),
('REMARK', 'NON REACTIVE/REACTIVE', '', '183', 1709, 'M4', 'MANTU TEST', '', 'WidalAndInfectionPanel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice_order`
--
ALTER TABLE `invoice_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `invoice_order_item`
--
ALTER TABLE `invoice_order_item`
  ADD PRIMARY KEY (`order_item_id`);

--
-- Indexes for table `invoice_user`
--
ALTER TABLE `invoice_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reportNo` (`reportNo`);

--
-- Indexes for table `report_item`
--
ALTER TABLE `report_item`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice_order`
--
ALTER TABLE `invoice_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=705;

--
-- AUTO_INCREMENT for table `invoice_order_item`
--
ALTER TABLE `invoice_order_item`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4452;

--
-- AUTO_INCREMENT for table `invoice_user`
--
ALTER TABLE `invoice_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123457;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT for table `report_item`
--
ALTER TABLE `report_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1710;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
