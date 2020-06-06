-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 06, 2020 at 11:25 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thinktrash`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_notifications`
--

CREATE TABLE `tbl_admin_notifications` (
  `fld_an_id` int(11) NOT NULL,
  `fld_user_id` int(11) DEFAULT NULL,
  `fld_ad_notification_type` int(11) DEFAULT NULL,
  `fld_ad_message` text DEFAULT NULL,
  `fld_ad_datetime` datetime DEFAULT NULL,
  `fld_is_read_by_admin` tinyint(4) DEFAULT NULL,
  `fld_ad_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_approvals`
--

CREATE TABLE `tbl_approvals` (
  `fld_approval_id` int(11) NOT NULL,
  `fld_pickup_uq_id` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_assign_unique_id` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_processor_id` varchar(35) COLLATE utf8_bin NOT NULL,
  `fld_assigned_by` int(11) NOT NULL,
  `fld_is_admin_assign` int(11) NOT NULL,
  `fld_material_name` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_assigned_qty` varchar(10) COLLATE utf8_bin NOT NULL,
  `fld_notes` text COLLATE utf8_bin NOT NULL,
  `fld_assigned_date` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_approvals`
--

INSERT INTO `tbl_approvals` (`fld_approval_id`, `fld_pickup_uq_id`, `fld_assign_unique_id`, `fld_processor_id`, `fld_assigned_by`, `fld_is_admin_assign`, `fld_material_name`, `fld_assigned_qty`, `fld_notes`, `fld_assigned_date`, `fld_status`) VALUES
(1, '58fa546a30b2bec61d54848500ce3dc5', '4580a03ef3fa670c4fdde854501d6af2', '7662527e48a9f4a5ce0c4664ee735a1d', 1, 0, 'PAPER WASTE', '30', 'Assigned', '2019-11-20 18:58:45', 1),
(3, '58fa546a30b2bec61d54848500ce3dc5', '2bbfc22c664a92e49ff56a337ed6d503', '4be29d7adde4d049f87770133c45ef40', 1, 0, 'Card board', '20', '', '2019-11-27 18:08:44', 1),
(4, 'fae3d47c975ef22c6dc13432884c6796', '12668c3888dd0608a3e032984cde3049', '7662527e48a9f4a5ce0c4664ee735a1d', 1, 0, 'Paper', '30', '', '2019-12-24 17:29:15', 1),
(5, 'a4b038083ade6a05cbeb2c7e5409dd05', '4ef776f46760b5ef6bd1449f0552ddfb', '4be29d7adde4d049f87770133c45ef40', 1, 0, 'Card Board', '90', '', '2020-01-04 16:57:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_business_process`
--

CREATE TABLE `tbl_business_process` (
  `fld_id` int(11) NOT NULL,
  `fld_processor_id` int(11) NOT NULL,
  `fld_business_process_id` int(11) NOT NULL,
  `fld_date_created` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_business_process`
--

INSERT INTO `tbl_business_process` (`fld_id`, `fld_processor_id`, `fld_business_process_id`, `fld_date_created`, `fld_status`) VALUES
(2, 1, 4, '2019-11-14 13:50:19', 1),
(3, 2, 1, '2019-11-14 20:55:06', 1),
(4, 2, 4, '2019-11-14 20:55:06', 1),
(5, 3, 3, '2019-11-27 17:07:37', 1),
(6, 3, 4, '2019-11-27 17:07:37', 1),
(7, 3, 5, '2019-11-27 17:07:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carbon_footprints`
--

CREATE TABLE `tbl_carbon_footprints` (
  `fld_cf_id` int(11) NOT NULL,
  `fld_assign_id` varchar(45) DEFAULT NULL,
  `fld_qty` varchar(45) DEFAULT NULL,
  `fld_distance_travelled` varchar(45) DEFAULT NULL,
  `fld_trucks` int(11) DEFAULT NULL,
  `fld_transport_cf` varchar(45) DEFAULT NULL,
  `fld_balling_cf` varchar(45) DEFAULT NULL,
  `fld_recycling_cf` varchar(45) DEFAULT NULL,
  `fld_total_cf` varchar(45) DEFAULT NULL,
  `fld_date_added` datetime DEFAULT NULL,
  `fld_date_modified` datetime DEFAULT NULL,
  `fld_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_carbon_footprints`
--

INSERT INTO `tbl_carbon_footprints` (`fld_cf_id`, `fld_assign_id`, `fld_qty`, `fld_distance_travelled`, `fld_trucks`, `fld_transport_cf`, `fld_balling_cf`, `fld_recycling_cf`, `fld_total_cf`, `fld_date_added`, `fld_date_modified`, `fld_status`) VALUES
(1, '4580a03ef3fa670c4fdde854501d6af2', '30', '45', 2, '0.0572', '0.045', '0.042', '0.1442', '2019-12-24 14:12:57', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `fld_id` int(11) NOT NULL,
  `fld_client_id` int(11) NOT NULL,
  `fld_site_id` int(11) NOT NULL,
  `fld_firstname` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_lastname` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_address1` text COLLATE utf8_bin NOT NULL,
  `fld_address2` text COLLATE utf8_bin NOT NULL,
  `fld_designation` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_email` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `fld_notes` text COLLATE utf8_bin NOT NULL,
  `fld_is_deleted` tinyint(4) NOT NULL,
  `fld_image_path` text COLLATE utf8_bin NOT NULL,
  `fld_color_hex` varchar(10) COLLATE utf8_bin NOT NULL,
  `fld_date_created` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`fld_id`, `fld_client_id`, `fld_site_id`, `fld_firstname`, `fld_lastname`, `fld_address1`, `fld_address2`, `fld_designation`, `fld_email`, `fld_phone`, `fld_notes`, `fld_is_deleted`, `fld_image_path`, `fld_color_hex`, `fld_date_created`, `fld_status`) VALUES
(1, 2, 0, 'Virat', 'Kholi', 'Banglore', '', 'Processing Head', 'virat@gmail.com', '9921324578', 'Can handle waste management process', 0, '', '#e380fe', '2019-11-14 14:21:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manifests`
--

CREATE TABLE `tbl_manifests` (
  `fld_manifest_id` int(11) NOT NULL,
  `fld_manifest_uq_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_processor_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_assign_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_pickup_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_file` varchar(99) COLLATE utf8_bin DEFAULT NULL,
  `fld_transport_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_manifest_date` date NOT NULL,
  `fld_manifest_type` int(11) NOT NULL COMMENT '1-Collector,  2-Processor',
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_manifests`
--

INSERT INTO `tbl_manifests` (`fld_manifest_id`, `fld_manifest_uq_id`, `fld_processor_id`, `fld_assign_id`, `fld_pickup_id`, `fld_file`, `fld_transport_id`, `fld_manifest_date`, `fld_manifest_type`, `fld_status`) VALUES
(1, '914384a753c7a4935e8c2700affac4b8', '7662527e48a9f4a5ce0c4664ee735a1d', '4580a03ef3fa670c4fdde854501d6af2', '58fa546a30b2bec61d54848500ce3dc5', '20f4e87090bb801f449f3c4d4937a861.jpeg', '', '2019-12-11', 1, 1),
(2, '2acaaa5b4b80c14e8c9cce9d23234ddf', '4be29d7adde4d049f87770133c45ef40', '2bbfc22c664a92e49ff56a337ed6d503', '58fa546a30b2bec61d54848500ce3dc5', 'b2ee41d262454b263e01fc1008563d5d.jpeg', '', '2019-12-11', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pickup_requests`
--

CREATE TABLE `tbl_pickup_requests` (
  `fld_id` int(11) NOT NULL,
  `fld_uniq_token` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_client_id` int(11) NOT NULL,
  `fld_site_id` int(11) NOT NULL,
  `fld_qty` double NOT NULL,
  `fld_is_loadingman_req` tinyint(4) NOT NULL,
  `fld_inchg_person` int(11) NOT NULL COMMENT 'Assigned person',
  `fld_inchg_email` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_inchg_phone` double NOT NULL,
  `fld_created_by` int(11) NOT NULL COMMENT 'Logged Person',
  `fld_created_date` date NOT NULL,
  `fld_created_time` varchar(20) COLLATE utf8_bin NOT NULL,
  `fld_current_status` tinyint(4) NOT NULL COMMENT '1 - Generated, 2 - Approved',
  `fld_is_images` tinyint(4) NOT NULL,
  `fld_date_created` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_pickup_requests`
--

INSERT INTO `tbl_pickup_requests` (`fld_id`, `fld_uniq_token`, `fld_client_id`, `fld_site_id`, `fld_qty`, `fld_is_loadingman_req`, `fld_inchg_person`, `fld_inchg_email`, `fld_inchg_phone`, `fld_created_by`, `fld_created_date`, `fld_created_time`, `fld_current_status`, `fld_is_images`, `fld_date_created`, `fld_status`) VALUES
(1, '58fa546a30b2bec61d54848500ce3dc5', 2, 1, 50, 1, 1, 'virat@gmail.com', 9921324578, 2, '2019-11-14', '20:37:42', 1, 1, '2019-11-14 20:37:42', 1),
(2, 'fae3d47c975ef22c6dc13432884c6796', 2, 1, 60, 1, 1, 'virat@gmail.com', 9921324578, 2, '2019-12-24', '16:49:33', 1, 0, '2019-12-24 16:49:33', 1),
(3, 'ac323c211cfcffb47cb5ab7775ac6032', 2, 1, 30, 1, 1, 'virat@gmail.com', 9921324578, 2, '2020-01-04', '13:46:35', 1, 0, '2020-01-04 13:46:35', 1),
(4, '5c3567d59e981b37bb8d135567afe5e9', 2, 1, 75, 1, 1, 'virat@gmail.com', 9921324578, 2, '2020-01-04', '16:26:57', 1, 1, '2020-01-04 16:26:57', 1),
(5, 'a4b038083ade6a05cbeb2c7e5409dd05', 2, 1, 90, 1, 1, 'virat@gmail.com', 9921324578, 2, '2020-01-04', '16:51:41', 1, 1, '2020-01-04 16:51:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pickup_wastes`
--

CREATE TABLE `tbl_pickup_wastes` (
  `fld_id` int(11) NOT NULL,
  `fld_pickup_id` int(11) NOT NULL,
  `fld_waste_type_id` int(11) NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_pickup_wastes`
--

INSERT INTO `tbl_pickup_wastes` (`fld_id`, `fld_pickup_id`, `fld_waste_type_id`, `fld_status`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 2, 2, 1),
(4, 3, 1, 1),
(5, 4, 1, 1),
(6, 5, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_processing_status`
--

CREATE TABLE `tbl_processing_status` (
  `fld_id` int(11) NOT NULL,
  `fld_processing_status_uq_id` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_pickup_uq_id` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_processor_id` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_assign_id` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_current_status` int(11) NOT NULL COMMENT '1-Assigned, 2-Collected, 3-received,4-processing, 5-dispatched',
  `fld_status_notes` text COLLATE utf8_bin NOT NULL,
  `fld_transport_id` int(11) NOT NULL DEFAULT 0,
  `fld_initiated_by` int(11) NOT NULL,
  `fld_date_added` datetime NOT NULL,
  `fld_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_processing_status`
--

INSERT INTO `tbl_processing_status` (`fld_id`, `fld_processing_status_uq_id`, `fld_pickup_uq_id`, `fld_processor_id`, `fld_assign_id`, `fld_current_status`, `fld_status_notes`, `fld_transport_id`, `fld_initiated_by`, `fld_date_added`, `fld_status`) VALUES
(1, '7e8866908acbdf726e14556ccf6c1aeb', '58fa546a30b2bec61d54848500ce3dc5', '4be29d7adde4d049f87770133c45ef40', '2bbfc22c664a92e49ff56a337ed6d503', 1, 'Notes', 1, 5, '2019-11-28 15:22:33', 1),
(2, 'b2d2e5605cc5bea22ef1841ef1e5cd9f', '58fa546a30b2bec61d54848500ce3dc5', '7662527e48a9f4a5ce0c4664ee735a1d', '4580a03ef3fa670c4fdde854501d6af2', 1, 'Pickup approved and assigned driver', 2, 3, '2019-11-28 15:32:02', 1),
(11, '65cd617e940d9a71f7c15d4a0078b71e', '58fa546a30b2bec61d54848500ce3dc5', '7662527e48a9f4a5ce0c4664ee735a1d', '4580a03ef3fa670c4fdde854501d6af2', 2, 'Waste collected', 0, 3, '2019-12-11 11:46:34', 1),
(12, 'b1cb05e07f8200371a23a4da8a7c7f1f', '58fa546a30b2bec61d54848500ce3dc5', '4be29d7adde4d049f87770133c45ef40', '2bbfc22c664a92e49ff56a337ed6d503', 2, 'PIckup Collected', 0, 5, '2019-12-11 12:03:21', 1),
(16, 'f7c6dad4604dcf41abd24070ca2111aa', '58fa546a30b2bec61d54848500ce3dc5', '4be29d7adde4d049f87770133c45ef40', '2bbfc22c664a92e49ff56a337ed6d503', 3, 'Load received', 0, 5, '2019-12-11 13:20:43', 1),
(17, '2deaeea2e1fcee60e17fbe681be2210a', '58fa546a30b2bec61d54848500ce3dc5', '7662527e48a9f4a5ce0c4664ee735a1d', '4580a03ef3fa670c4fdde854501d6af2', 3, 'Received load ', 0, 3, '2019-12-11 13:21:19', 1),
(18, '372ba9d68e5bde7032a20274e815e4fa', '58fa546a30b2bec61d54848500ce3dc5', '7662527e48a9f4a5ce0c4664ee735a1d', '4580a03ef3fa670c4fdde854501d6af2', 4, 'Processing started', 0, 3, '2019-12-11 13:47:28', 1),
(19, '69f380252dc7fdd5bdc8cb7c1d0556c8', '58fa546a30b2bec61d54848500ce3dc5', '7662527e48a9f4a5ce0c4664ee735a1d', '4580a03ef3fa670c4fdde854501d6af2', 5, 'Item Dispached to warehouse', 0, 3, '2019-12-11 17:18:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_processors`
--

CREATE TABLE `tbl_processors` (
  `fld_processor_id` int(11) NOT NULL,
  `fld_processor_log_id` int(11) NOT NULL,
  `fld_processor_uniq_id` varchar(50) COLLATE utf8_bin NOT NULL,
  `fld_dealer_name` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_address` text COLLATE utf8_bin NOT NULL,
  `fld_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `fld_contact_number` double NOT NULL,
  `fld_reg_number` varchar(50) COLLATE utf8_bin NOT NULL,
  `fld_gst_number` varchar(60) COLLATE utf8_bin NOT NULL,
  `fld_lat` varchar(20) COLLATE utf8_bin NOT NULL,
  `fld_lng` varchar(20) COLLATE utf8_bin NOT NULL,
  `fld_date_added` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_processors`
--

INSERT INTO `tbl_processors` (`fld_processor_id`, `fld_processor_log_id`, `fld_processor_uniq_id`, `fld_dealer_name`, `fld_address`, `fld_email`, `fld_contact_number`, `fld_reg_number`, `fld_gst_number`, `fld_lat`, `fld_lng`, `fld_date_added`, `fld_status`) VALUES
(1, 3, '7662527e48a9f4a5ce0c4664ee735a1d', 'Duro Processors Pvt Ltd', 'Pebble Beach Karnataka', 'duroprocess@gmail.com', 9965415457, 'ASD54478855E4F4445DD', 'A044S4D4444E521', '12.761296357028513', '77.83092128470548', '2019-11-14 13:50:19', 1),
(2, 4, 'f858a34fbf0f8debaf8a32cc91b7888d', 'Payless Cashways', 'Jayanagar 4th T Block, Banglore, Karnataka', 'client@payless.com', 9120214785, 'SD745511444RT11202', '3AS42R554121Q', '13.349057313734185', '77.05852265384351', '2019-11-14 20:55:05', 1),
(3, 5, '4be29d7adde4d049f87770133c45ef40', 'Alfa Recyclers Pvt Ltd', '8, Rachel Villas, Hinjewadi Hisar, Kartnataka - 539616', 'alfarecycler@gmail.com', 9601234478, 'RRT11D554SF44R54T41', 'GA21554E54R51', '12.7720394753854', '77.84134048037117', '2019-11-27 17:07:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_process_activity`
--

CREATE TABLE `tbl_process_activity` (
  `fld_id` int(11) NOT NULL,
  `fld_pickup_uniq_id` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_activity_title` text COLLATE utf8_bin NOT NULL,
  `fld_initiated_by` int(11) NOT NULL,
  `fld_decription` text COLLATE utf8_bin NOT NULL,
  `fld_manifest_id` int(11) NOT NULL DEFAULT 0,
  `fld_date_added` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_process_activity`
--

INSERT INTO `tbl_process_activity` (`fld_id`, `fld_pickup_uniq_id`, `fld_activity_title`, `fld_initiated_by`, `fld_decription`, `fld_manifest_id`, `fld_date_added`, `fld_status`) VALUES
(1, '58fa546a30b2bec61d54848500ce3dc5', 'New Pickup Request has been added', 2, 'A new pickup request has been added. Awaiting for the administrator approval.', 0, '2019-11-14 20:37:42', 1),
(2, '58fa546a30b2bec61d54848500ce3dc5', 'Images has been upload', 2, 'Images are uploaded for the new pickup request.', 0, '2019-11-14 20:38:53', 1),
(5, '58fa546a30b2bec61d54848500ce3dc5', 'Pickup has been assigned to processor', 1, 'The 30 tons of waste has been assigned to the processor fro pickup.', 0, '2019-11-20 18:58:45', 1),
(7, '58fa546a30b2bec61d54848500ce3dc5', 'Pickup has been assigned to processor | Alfa Recyclers Pvt Ltd', 1, 'The 20 tons of waste has been assigned to the processor fro pickup.', 0, '2019-11-27 18:08:44', 1),
(8, '58fa546a30b2bec61d54848500ce3dc5', 'Pickup approved and Transporter assigned by Alfa Recyclers Pvt Ltd', 5, 'The 20(CARD BOARD) tons of waste is approved for pickup and assigned transporterSATHISH (TN47AU6045)', 0, '2019-11-28 15:22:33', 1),
(9, '58fa546a30b2bec61d54848500ce3dc5', 'Pickup approved and Transporter assigned by Duro Processors Pvt Ltd', 3, 'The 30() tons of waste is approved for pickup and assigned transporterSIRANJEEVI (TN45AU1637)', 0, '2019-11-28 15:32:02', 1),
(10, '58fa546a30b2bec61d54848500ce3dc5', 'Pickup has been Collected from the Generator place', 3, 'The 30 (PAPER WASTE) tons pickup status has been changed into Collected', 1, '2019-12-11 11:46:34', 1),
(11, '58fa546a30b2bec61d54848500ce3dc5', 'Pickup has been Collected from the Generator place', 5, 'The 20 (CARD BOARD) tons pickup status has been changed into Collected', 2, '2019-12-11 12:03:22', 1),
(12, '58fa546a30b2bec61d54848500ce3dc5', 'Waste deliverd into the Processing Unit', 5, 'The 20 (CARD BOARD) tons delivered into the Processing Unit ALFA RECYCLERS PVT LTD, 8, Rachel Villas, Hinjewadi Hisar, Kartnataka - 539616', 0, '2019-12-11 13:20:43', 1),
(13, '58fa546a30b2bec61d54848500ce3dc5', 'Waste deliverd into the Processing Unit', 3, 'The 30 (PAPER WASTE) tons delivered into the Processing Unit DURO PROCESSORS PVT LTD, Pebble Beach Karnataka', 0, '2019-12-11 13:21:19', 1),
(14, '58fa546a30b2bec61d54848500ce3dc5', 'Processing Started', 3, 'The 30 (PAPER WASTE) tons Started Processing at DURO PROCESSORS PVT LTD, Pebble Beach Karnataka', 0, '2019-12-11 13:47:28', 1),
(15, '58fa546a30b2bec61d54848500ce3dc5', 'Item Dispatched / Process Completed', 3, 'The 30 (PAPER WASTE) tons Dispached or Process Completed at DURO PROCESSORS PVT LTD, Pebble Beach Karnataka', 0, '2019-12-11 17:18:07', 1),
(16, '58fa546a30b2bec61d54848500ce3dc5', 'Carbon foot print added by admin', 1, 'The 30 tons of process carbon foot prints has been added by Pepaa Administrator.', 0, '2019-12-24 14:12:57', 1),
(17, 'fae3d47c975ef22c6dc13432884c6796', 'New Pickup Request has been added', 2, 'A new pickup request has been added. Awaiting for the administrator approval.', 0, '2019-12-24 16:49:33', 1),
(18, 'fae3d47c975ef22c6dc13432884c6796', 'Pickup has been assigned to processor | Duro Processors Pvt Ltd', 1, 'The 30 tons of waste has been assigned to the processor fro pickup.', 0, '2019-12-24 17:29:16', 1),
(19, 'ac323c211cfcffb47cb5ab7775ac6032', 'New Pickup Request has been added', 2, 'A new pickup request has been added. Awaiting for the administrator approval.', 0, '2020-01-04 13:46:35', 1),
(20, '5c3567d59e981b37bb8d135567afe5e9', 'New Pickup Request has been added', 2, 'A new pickup request has been added. Awaiting for the administrator approval.', 0, '2020-01-04 16:26:57', 1),
(21, 'a4b038083ade6a05cbeb2c7e5409dd05', 'New Pickup Request has been added', 2, 'A new pickup request has been added. Awaiting for the administrator approval.', 0, '2020-01-04 16:51:41', 1),
(22, 'a4b038083ade6a05cbeb2c7e5409dd05', 'Images has been upload', 2, 'Images are uploaded for the new pickup request.', 0, '2020-01-04 16:51:41', 1),
(23, 'a4b038083ade6a05cbeb2c7e5409dd05', 'Pickup has been assigned to processor | Alfa Recyclers Pvt Ltd', 1, 'The 90 tons of waste has been assigned to the processor fro pickup.', 0, '2020-01-04 16:57:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_process_status_timeline`
--

CREATE TABLE `tbl_process_status_timeline` (
  `fld_process_st_id` int(11) NOT NULL,
  `fld_pickup_id` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_processor_id` varchar(35) COLLATE utf8_bin NOT NULL,
  `fld_processing_status` int(11) NOT NULL COMMENT '1-Assigned, 2-Accepted, 3-Collected, 4-Processing, 5-Completed, 6-Dispatched, 7-Reassigned,8-Added into stock',
  `fld_processed_by` int(11) NOT NULL,
  `fld_process_notes` text COLLATE utf8_bin NOT NULL,
  `fld_date_processed` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_process_status_timeline`
--

INSERT INTO `tbl_process_status_timeline` (`fld_process_st_id`, `fld_pickup_id`, `fld_processor_id`, `fld_processing_status`, `fld_processed_by`, `fld_process_notes`, `fld_date_processed`) VALUES
(1, '58fa546a30b2bec61d54848500ce3dc5', '7662527e48a9f4a5ce0c4664ee735a1d', 1, 1, 'PIckup Notes', '2019-11-20 18:58:45'),
(3, '58fa546a30b2bec61d54848500ce3dc5', '4be29d7adde4d049f87770133c45ef40', 1, 1, 'Assigned for recycling', '2019-11-27 18:08:44'),
(4, 'fae3d47c975ef22c6dc13432884c6796', '7662527e48a9f4a5ce0c4664ee735a1d', 1, 1, 'Assigned', '2019-12-24 17:29:16'),
(5, 'a4b038083ade6a05cbeb2c7e5409dd05', '4be29d7adde4d049f87770133c45ef40', 1, 1, 'New Request has been added here', '2020-01-04 16:57:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sites`
--

CREATE TABLE `tbl_sites` (
  `fld_id` int(11) NOT NULL,
  `fld_client_id` int(11) NOT NULL,
  `fld_category` int(11) NOT NULL,
  `fld_location` text COLLATE utf8_bin NOT NULL,
  `fld_geo_district` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_latitide` varchar(30) COLLATE utf8_bin NOT NULL,
  `fld_longitude` varchar(30) COLLATE utf8_bin NOT NULL,
  `fld_site_address` text COLLATE utf8_bin NOT NULL,
  `fld_quatity_annum` int(11) NOT NULL,
  `fld_incharge_person` int(11) NOT NULL,
  `fld_work_mail` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_phone_number` varchar(20) COLLATE utf8_bin NOT NULL,
  `fld_date_created` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_sites`
--

INSERT INTO `tbl_sites` (`fld_id`, `fld_client_id`, `fld_category`, `fld_location`, `fld_geo_district`, `fld_latitide`, `fld_longitude`, `fld_site_address`, `fld_quatity_annum`, `fld_incharge_person`, `fld_work_mail`, `fld_phone_number`, `fld_date_created`, `fld_status`) VALUES
(1, 2, 1, 'SIPCOT Industrial Complex, Sipcot Ph. I, Hosur, Tamil Nadu, India', '', '12.776074695579819', '77.84534902487167', 'No. 450/12H SIPCOT Industrial Complex, Sipcot Ph. I, Hosur, Tamil Nadu, India', 600, 1, 'site1@drole.com', '7512302124', '2019-11-14 14:24:08', 1),
(2, 2, 1, 'Bangalore, Karnataka, India', '', '13.007115961878585', '77.42149177609292', 'Banerkata road Banglore', 100, 1, 'virat@gmail.com', '8854125478', '2020-01-04 20:48:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_categories`
--

CREATE TABLE `tbl_site_categories` (
  `fld_cat_id` int(11) NOT NULL,
  `fld_name` varchar(90) DEFAULT NULL,
  `fld_date_created` datetime DEFAULT NULL,
  `fld_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_site_categories`
--

INSERT INTO `tbl_site_categories` (`fld_cat_id`, `fld_name`, `fld_date_created`, `fld_status`) VALUES
(1, 'Office', '2020-01-06 13:04:28', 1),
(2, 'Store', '2020-01-06 13:04:28', 1),
(3, 'Kitchen', '2020-01-06 13:04:28', 1),
(4, 'Factory', '2020-01-06 13:04:28', 1),
(5, 'Warehouse', '2020-01-06 13:04:28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_site_wastes`
--

CREATE TABLE `tbl_site_wastes` (
  `fld_client_id` int(11) NOT NULL,
  `fld_site_id` int(11) NOT NULL,
  `fld_waste_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_site_wastes`
--

INSERT INTO `tbl_site_wastes` (`fld_client_id`, `fld_site_id`, `fld_waste_type`) VALUES
(2, 1, 1),
(2, 1, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transports`
--

CREATE TABLE `tbl_transports` (
  `fld_transport_id` int(11) NOT NULL,
  `fld_driver_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `fld_licence_number` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_vehicle_number` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_diver_phone` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_processor_id` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_loading_mens_count` int(11) NOT NULL,
  `fld_date_created` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_transports`
--

INSERT INTO `tbl_transports` (`fld_transport_id`, `fld_driver_name`, `fld_licence_number`, `fld_vehicle_number`, `fld_diver_phone`, `fld_processor_id`, `fld_loading_mens_count`, `fld_date_created`, `fld_status`) VALUES
(1, 'SATHISH', '554584S5E4', 'TN47AU6045', '9651112457', '4be29d7adde4d049f87770133c45ef40', 2, '2019-11-28 15:22:32', 1),
(2, 'SIRANJEEVI', 'EA445544D154F1120', 'TN45AU1637', '7032120124', '7662527e48a9f4a5ce0c4664ee735a1d', 1, '2019-11-28 15:32:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_log`
--

CREATE TABLE `tbl_user_log` (
  `fld_id` int(11) NOT NULL,
  `fld_userid` int(11) NOT NULL,
  `fld_user_login` varchar(50) COLLATE utf8_bin NOT NULL,
  `fld_password` varchar(50) COLLATE utf8_bin NOT NULL,
  `fld_usertype` tinyint(4) NOT NULL,
  `fld_token` longtext COLLATE utf8_bin NOT NULL,
  `fld_notification_token` varchar(99) COLLATE utf8_bin DEFAULT NULL,
  `fld_last_login` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_user_log`
--

INSERT INTO `tbl_user_log` (`fld_id`, `fld_userid`, `fld_user_login`, `fld_password`, `fld_usertype`, `fld_token`, `fld_notification_token`, `fld_last_login`, `fld_status`) VALUES
(1, 1, 'admin@thinktrash.com', '21232f297a57a5a743894a0e4a801fc3', 1, '281062ad99bd02facfac3cf9187dd0b0f9b73d5c1f22c0e850d7c3fc1f6684c5eb84957947c3aa02536faf6cf6abb5727928583d062eb48e575b1fe52e56e097BBDxlFXIcABL+Ibna03vDryWB1Ia+CEjny/Pf1av6ZQ=', '6d7674e089d1bf0a2d7a2fcd38ad4fb5', '2020-02-21 09:45:30', 1),
(2, 2, 'client@drole.com', '21232f297a57a5a743894a0e4a801fc3', 2, '3ff9bc69cd0285b930973773ddaa02758522646a6a55f7b6220cbefebcde653d7a9cc99d5e7372ec57d736801f6ce8b23f6f4e86523c9fa76adf8b23f4d18aecptYYJLYvdpI8Blb1M7WUhG2SJxU6QGfeQRQyDX2yRNU=', 'b6472b8b8b6f7e6e16f4696e10afc425', '2020-02-21 09:45:56', 1),
(3, 3, 'duroprocess@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 4, 'ca07466818d630c25ea3cdb95063fc38f5d69300d7329a79006906af305a4b722cb7c849395d811a11a50f6e7fa18165a5f142bc260f210184463b6622c16a7bTSDgZ9Doa7Exr0LG3WPrcssxf/XLGM+Ye8FuUJ1Ix30=', '5ce3f440430e685fa17dbbd76953401f', '2019-12-26 17:19:30', 1),
(4, 4, 'client@payless.com', '21232f297a57a5a743894a0e4a801fc3', 4, 'b58368bbc0baf6ff522c2e1a233643f7616b60ee3eefe3df601be1198640ad6b15b57c6e18acdc9a4348c9fa444b105bfb6afe5fb9cdf11101bfcb9a0dcd8a9bj1/GDDih8t/WhilJd/UE0xL71nHm00onYcMZxOZgAJM=', 'b066fc51cdab1def0b94b87f7c82e53a', '2019-12-24 16:46:22', 1),
(5, 5, 'alfarecycler@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 4, 'd326a0063aa931d292f95efbcbef7ff23ec89361e6778411ec773008cf4171bb67a942c4aa5d40db87d428d7ff19e117b467fc7724d35d90b51d8e61eacf7bc7BAABnc0kpkB7bNQs+/F9suwhRaoTbyUqB9zRM9rhiZY=', '56aed7e7485ff03d5605b885b86e947e', '2019-12-11 14:02:23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_notifications`
--

CREATE TABLE `tbl_user_notifications` (
  `fld_notification_id` int(11) NOT NULL,
  `fld_user_id` int(11) DEFAULT NULL,
  `fld_notification_type` int(11) DEFAULT NULL COMMENT '1-pickup,',
  `fld_message` text DEFAULT NULL,
  `fld_datetime` datetime DEFAULT NULL,
  `fld_is_read` tinyint(4) DEFAULT NULL,
  `fld_status` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_personal`
--

CREATE TABLE `tbl_user_personal` (
  `fld_id` int(11) NOT NULL,
  `fld_firstname` varchar(50) COLLATE utf8_bin NOT NULL,
  `fld_lastname` varchar(50) COLLATE utf8_bin NOT NULL,
  `fld_company` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_designation` varchar(50) COLLATE utf8_bin NOT NULL,
  `fld_workmail` varchar(50) COLLATE utf8_bin NOT NULL,
  `fld_usertype` tinyint(4) NOT NULL,
  `fld_is_terms_accepted` tinyint(4) NOT NULL,
  `fld_steps_completed` tinyint(4) NOT NULL,
  `fld_request_mail_sent` tinyint(4) NOT NULL,
  `fld_date_added` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_user_personal`
--

INSERT INTO `tbl_user_personal` (`fld_id`, `fld_firstname`, `fld_lastname`, `fld_company`, `fld_designation`, `fld_workmail`, `fld_usertype`, `fld_is_terms_accepted`, `fld_steps_completed`, `fld_request_mail_sent`, `fld_date_added`, `fld_status`) VALUES
(1, 'Pepaa', 'Admin', 'Think Trash', 'Management', 'admin@thinktrash.com', 1, 1, 1, 0, '2019-10-22 12:39:54', 1),
(2, 'Kevin', 'Karthik', 'DROLE TECHNOLOGIES PVT LTD', 'Human Resource Manager', 'dev@drole.com', 2, 1, 1, 0, '2019-10-22 12:39:54', 1),
(3, 'Steve', 'Smith', 'Duro Processors Pvt Ltd', 'Managing Head', 'duroprocess@gmail.com', 4, 1, 1, 0, '2019-11-14 13:45:16', 1),
(4, '', '', 'Payless Cashways', '', 'client@payless.com', 4, 1, 1, 0, '2019-11-14 20:55:05', 1),
(5, '', '', 'Alfa Recyclers Pvt Ltd', '', 'alfarecycler@gmail.com', 4, 1, 1, 0, '2019-11-27 17:07:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_types`
--

CREATE TABLE `tbl_user_types` (
  `fld_id` int(11) NOT NULL,
  `fld_usert_type` varchar(20) COLLATE utf8_bin NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_user_types`
--

INSERT INTO `tbl_user_types` (`fld_id`, `fld_usert_type`, `fld_status`) VALUES
(1, 'admin', 1),
(2, 'generator', 1),
(3, 'pre_processor', 1),
(4, 'processor', 1),
(5, 'transporter', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_waste_handling`
--

CREATE TABLE `tbl_waste_handling` (
  `fld_id` int(11) NOT NULL,
  `fld_processor_id` int(11) NOT NULL,
  `fld_waste_type_id` int(11) NOT NULL,
  `fld_date_created` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_waste_handling`
--

INSERT INTO `tbl_waste_handling` (`fld_id`, `fld_processor_id`, `fld_waste_type_id`, `fld_date_created`, `fld_status`) VALUES
(1, 1, 1, '2019-11-14 13:50:19', 1),
(2, 2, 1, '2019-11-14 20:55:06', 1),
(3, 2, 2, '2019-11-14 20:55:06', 1),
(4, 3, 1, '2019-11-27 17:07:37', 1),
(5, 3, 2, '2019-11-27 17:07:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_waste_images`
--

CREATE TABLE `tbl_waste_images` (
  `fld_id` int(11) NOT NULL,
  `fld_pickup_key` varchar(99) COLLATE utf8_bin NOT NULL,
  `fld_image_path` text COLLATE utf8_bin NOT NULL,
  `fld_date_uploaded` datetime NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_waste_images`
--

INSERT INTO `tbl_waste_images` (`fld_id`, `fld_pickup_key`, `fld_image_path`, `fld_date_uploaded`, `fld_status`) VALUES
(1, '58fa546a30b2bec61d54848500ce3dc5', '16cb18b8663aefa0931ce4d606d2fadb.jpg', '2019-11-14 20:38:53', 1),
(2, '5c3567d59e981b37bb8d135567afe5e9', '4dfd53aecc802823eb481fbce1ac0cd6.png', '2020-01-04 16:26:58', 1),
(3, '5c3567d59e981b37bb8d135567afe5e9', '4080bc43876ea67872ac00a2704402d7.jpg', '2020-01-04 16:26:58', 1),
(4, 'a4b038083ade6a05cbeb2c7e5409dd05', '969eb24678966558b269c09c4e6c94c3.jpeg', '2020-01-04 16:51:41', 1),
(5, 'a4b038083ade6a05cbeb2c7e5409dd05', '0fd0a8200c26d96cdb9cc1a2ade2be63.png', '2020-01-04 16:51:41', 1),
(6, 'a4b038083ade6a05cbeb2c7e5409dd05', '5564dcc99e8252e425f4e062461fec91.jpg', '2020-01-04 16:51:41', 1),
(7, 'a4b038083ade6a05cbeb2c7e5409dd05', 'c', '2020-01-04 16:52:59', 1),
(8, 'a4b038083ade6a05cbeb2c7e5409dd05', 'i', '2020-01-04 16:52:59', 1),
(9, 'a4b038083ade6a05cbeb2c7e5409dd05', '/', '2020-01-04 16:52:59', 1),
(10, 'a4b038083ade6a05cbeb2c7e5409dd05', '/', '2020-01-04 16:52:59', 1),
(11, 'a4b038083ade6a05cbeb2c7e5409dd05', 'c', '2020-01-04 16:52:59', 1),
(12, 'a4b038083ade6a05cbeb2c7e5409dd05', 'p', '2020-01-04 16:52:59', 1),
(13, 'a4b038083ade6a05cbeb2c7e5409dd05', 'p', '2020-01-04 16:52:59', 1),
(14, 'a4b038083ade6a05cbeb2c7e5409dd05', '.', '2020-01-04 16:52:59', 1),
(15, 'a4b038083ade6a05cbeb2c7e5409dd05', '6ce855463012ac86d7c021900f38c3ea.jpeg', '2020-01-04 16:54:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_waste_types`
--

CREATE TABLE `tbl_waste_types` (
  `fld_id` int(11) NOT NULL,
  `fld_name` varchar(45) COLLATE utf8_bin NOT NULL,
  `fld_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tbl_waste_types`
--

INSERT INTO `tbl_waste_types` (`fld_id`, `fld_name`, `fld_status`) VALUES
(1, 'Paper', 1),
(2, 'Plastic', 1),
(3, 'Glass', 1),
(4, 'Metal', 1),
(5, 'Food', 1),
(6, 'Textile', 1),
(7, 'E-Waste', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin_notifications`
--
ALTER TABLE `tbl_admin_notifications`
  ADD PRIMARY KEY (`fld_an_id`);

--
-- Indexes for table `tbl_approvals`
--
ALTER TABLE `tbl_approvals`
  ADD PRIMARY KEY (`fld_approval_id`);

--
-- Indexes for table `tbl_business_process`
--
ALTER TABLE `tbl_business_process`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_carbon_footprints`
--
ALTER TABLE `tbl_carbon_footprints`
  ADD PRIMARY KEY (`fld_cf_id`);

--
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_manifests`
--
ALTER TABLE `tbl_manifests`
  ADD PRIMARY KEY (`fld_manifest_id`);

--
-- Indexes for table `tbl_pickup_requests`
--
ALTER TABLE `tbl_pickup_requests`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_pickup_wastes`
--
ALTER TABLE `tbl_pickup_wastes`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_processing_status`
--
ALTER TABLE `tbl_processing_status`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_processors`
--
ALTER TABLE `tbl_processors`
  ADD PRIMARY KEY (`fld_processor_id`);

--
-- Indexes for table `tbl_process_activity`
--
ALTER TABLE `tbl_process_activity`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_process_status_timeline`
--
ALTER TABLE `tbl_process_status_timeline`
  ADD PRIMARY KEY (`fld_process_st_id`);

--
-- Indexes for table `tbl_sites`
--
ALTER TABLE `tbl_sites`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_site_categories`
--
ALTER TABLE `tbl_site_categories`
  ADD PRIMARY KEY (`fld_cat_id`);

--
-- Indexes for table `tbl_site_wastes`
--
ALTER TABLE `tbl_site_wastes`
  ADD KEY `fld_client_id` (`fld_client_id`);

--
-- Indexes for table `tbl_transports`
--
ALTER TABLE `tbl_transports`
  ADD PRIMARY KEY (`fld_transport_id`);

--
-- Indexes for table `tbl_user_log`
--
ALTER TABLE `tbl_user_log`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_user_notifications`
--
ALTER TABLE `tbl_user_notifications`
  ADD PRIMARY KEY (`fld_notification_id`);

--
-- Indexes for table `tbl_user_personal`
--
ALTER TABLE `tbl_user_personal`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_user_types`
--
ALTER TABLE `tbl_user_types`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_waste_handling`
--
ALTER TABLE `tbl_waste_handling`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_waste_images`
--
ALTER TABLE `tbl_waste_images`
  ADD PRIMARY KEY (`fld_id`);

--
-- Indexes for table `tbl_waste_types`
--
ALTER TABLE `tbl_waste_types`
  ADD PRIMARY KEY (`fld_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin_notifications`
--
ALTER TABLE `tbl_admin_notifications`
  MODIFY `fld_an_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_approvals`
--
ALTER TABLE `tbl_approvals`
  MODIFY `fld_approval_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_business_process`
--
ALTER TABLE `tbl_business_process`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_carbon_footprints`
--
ALTER TABLE `tbl_carbon_footprints`
  MODIFY `fld_cf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_manifests`
--
ALTER TABLE `tbl_manifests`
  MODIFY `fld_manifest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_pickup_requests`
--
ALTER TABLE `tbl_pickup_requests`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_pickup_wastes`
--
ALTER TABLE `tbl_pickup_wastes`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_processing_status`
--
ALTER TABLE `tbl_processing_status`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_processors`
--
ALTER TABLE `tbl_processors`
  MODIFY `fld_processor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_process_activity`
--
ALTER TABLE `tbl_process_activity`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_process_status_timeline`
--
ALTER TABLE `tbl_process_status_timeline`
  MODIFY `fld_process_st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_sites`
--
ALTER TABLE `tbl_sites`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_site_categories`
--
ALTER TABLE `tbl_site_categories`
  MODIFY `fld_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_transports`
--
ALTER TABLE `tbl_transports`
  MODIFY `fld_transport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_user_log`
--
ALTER TABLE `tbl_user_log`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_notifications`
--
ALTER TABLE `tbl_user_notifications`
  MODIFY `fld_notification_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user_personal`
--
ALTER TABLE `tbl_user_personal`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_user_types`
--
ALTER TABLE `tbl_user_types`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_waste_handling`
--
ALTER TABLE `tbl_waste_handling`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_waste_images`
--
ALTER TABLE `tbl_waste_images`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_waste_types`
--
ALTER TABLE `tbl_waste_types`
  MODIFY `fld_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
